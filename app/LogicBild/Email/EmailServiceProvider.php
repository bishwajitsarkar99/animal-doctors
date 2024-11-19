<?php
namespace App\LogicBild\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use HTMLPurifier;
use HTMLPurifier_Config;
use App\Mail\UserMail;
use App\Models\User;
use App\Models\Role;
use App\Models\UserEmail;
use App\Models\UserEmailDeletePermission;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class EmailServiceProvider
{
    // ========================= Email =========================================
    // =========================================================================
    /**
     * Handle Email Template View
    */ 
    public function viewEmailTemplate(Request $request)
    {
        $roles = Role::whereIn('id', [0, 1, 2, 3, 4, 5, 6, 7])->get();
        $dataQuery = UserEmailDeletePermission::with('roles', 'users')->orderBy('id', 'desc');
    
        if ($query = $request->get('query')) {
            $dataQuery->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'LIKE', '%' . $query . '%');
            });
        }
        $perItem = $request->input('per_item', 10);
        $data = $dataQuery->paginate($perItem);

        if ($request->expectsJson()) {
            return response()->json([
                'roles' => $roles,
                'data' => $data->items(),
                'links' => $data->links(),
                'total' => $data->total(),
            ]);
        }
        $user_email = Auth::user()->email;
        $user_id = Auth::user()->id;
        // Total Email
        $userEmails = UserEmail::count();
        // Total inbox Email
        $total_emails = UserEmail::whereNotNull('user_to')
                                    ->orWhere('user_to', 'LIKE', "%$user_email")
                                    ->orWhere('user_cc', 'LIKE', "%$user_email")
                                    ->orWhere('user_bcc', 'LIKE', "%$user_email")
                                    ->count();

        // Total Send User Email According to Month
        $total_send_emails = UserEmail::whereNotNull('user_to')->where('sender_user', '=', $user_id)->count();
        // Total Draft Email According to Month
        $total_draft_emails = UserEmail::whereNotIn('attachment_type', ['report', 'message'])->orWhere('sender_user', '=', $user_id)->count();

        // Calculate the percentage of total inbox email
        $inbox_email_percentage = $total_emails > 0 ? ($total_emails / $userEmails) * 100 : 0;
        // Calculate the percentage of total send email
        $send_email_percentage = $total_send_emails > 0 ? ($total_send_emails / $userEmails) * 100 : 0;
        // Calculate the percentage of total send email
        $draft_email_percentage = $total_draft_emails > 0 ? ($total_draft_emails / $userEmails) * 100 : 0;

        return view('sendingEmails.index', compact('inbox_email_percentage', 'send_email_percentage', 'userEmails', 'draft_email_percentage'));
    }
    /**
     * Handle Fetch User Email
    */ 
    public function fetchUserEmail(Request $request, $selectedRole)
    {
        $users = User::whereHas('roles', function($query) use ($selectedRole) {
            $query->where('id', $selectedRole);
        })->get(['id', 'email']);
    
        return response()->json([
            'users' => $users
        ]);
    }
    /**
     * Handle Send Email
    */
    public function sending(Request $request)
    {
        $request->validate([
            'user_to' => 'nullable|string',
            'user_cc' => 'nullable|string',
            'user_bcc' => 'nullable|string',
            'subject' => 'nullable|string',
            'main_content' => 'nullable|string',
            'email_attachments.*' => 'nullable|file',
        ]);

        // Custom validation for multiple emails in To, CC, and BCC
        $to_emails = $request->user_to ? explode(',', $request->user_to) : [];
        foreach ($to_emails as $email) {
            if ($email && !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_to' => 'Invalid email format in CC field.']);
            }
        }

        $cc_emails = $request->user_cc ? explode(',', $request->user_cc) : [];
        foreach ($cc_emails as $email) {
            if ($email && !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_cc' => 'Invalid email format in CC field.']);
            }
        }

        $bcc_emails = $request->user_bcc ? explode(',', $request->user_bcc) : [];
        foreach ($bcc_emails as $email) {
            if ($email && !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_bcc' => 'Invalid email format in BCC field.']);
            }
        }

        $attachments = [];

        
        // Handle file attachments
        if ($request->hasFile('email_attachments')) {
            $attachmentFolder = $request->attachment_type == 'report' ? 'report' : ($request->attachment_type == 'message' ? 'message' : 'draft');
        
            foreach ($request->file('email_attachments') as $file) {
                $originalFilename = $file->getClientOriginalName();
                $filename = $originalFilename;
                $filePath = $attachmentFolder . '/' . $filename;
        
                // Check if the file already exists
                if (Storage::disk('public')->exists($filePath)) {
                    // If file exists, add it to attachments without re-uploading
                    $attachments[] = [
                        'file' => storage_path('app/public/' . $filePath),
                        'options' => [],
                    ];
                } else {
                    // Store the file with the final unique filename if it doesn't already exist
                    $storedFilePath = $file->storeAs($attachmentFolder, $filename, 'public');
                    $attachments[] = [
                        'file' => storage_path('app/public/' . $storedFilePath),
                        'options' => [],
                    ];
                }
            }
        }

        // [composer require ezyang/htmlpurifier] install for content clear from summary note
        $purifierConfig = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($purifierConfig);

        // Sanitize the main_content to remove unwanted HTML
        $content = $purifier->purify($request->main_content);
        // Prepare email content
        $details = [
            'user_to' => $request->user_to,
            'user_cc' => $request->user_cc ?? 'N/A',
            'user_bcc' => $request->user_bcc ?? 'N/A',
            'subject' => $request->subject ?? 'No Subject',
            'main_content' => $content ?? 'No Content',
        ];

        // Determine draft_mail status
        $draftMailStatus = $request->user_to ? ($request->draft_mail ? '1' : '0') : '1';
        // Store Email Data in DB
        DB::table('user_emails')->insert([
            'user_to' => $request->user_to,
            'user_cc' => $request->user_cc ?? 'N/A',
            'user_bcc' => $request->user_bcc ?? 'N/A',
            'subject' => $request->subject ?? 'No Subject',
            'main_content' => $content ?? 'No Content',
            'email_attachments' => json_encode($attachments),
            'attachment_type' => $request->attachment_type ?? 'other',
            'sender_email' => Auth::user()->email,
            'sender_user' => Auth::user()->id,
            'status' => $request->status ? '1' : '0',
            'read_mail' => $request->status ? '1' : '0',
            'draft_mail' => $draftMailStatus,
            'created_at' => now(),
        ]);

        try {
            // Send the email with attachments using the UserMail class
            Mail::to($to_emails)
            ->cc($cc_emails)
            ->bcc($bcc_emails)
            ->send(new UserMail($details, $attachments));

            return back()->with('success', 'Email has been sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please try again.');
        }
    }
    /**
     * Handle Send Email Fetch 
    */
    public function sendFetchUserEmail(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $authUser = Auth::user();
        $authID = $authUser->id;
        $authEmail = $authUser->email;
    
        // Input filters
        $attachment_type = $request->input('attachment_type');
        $status = $request->input('status');
        $send_start_date = $request->input('send_start_date');
        $send_end_date = $request->input('send_end_date');
        $user_to = $request->input('user_to');
    
        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        // Generate month and year filters if date range is provided
        if ($send_start_date && $send_end_date) {
            $start = Carbon::parse($send_start_date)->startOfMonth();
            $end = Carbon::parse($send_end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
    
            $years = array_unique(array_map(function ($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
    
        // Query setup
        $query = UserEmail::whereNotNull('user_to')
            ->where('sender_user', '=', $authID)
            ->with(['roles'])
            ->orderBy('id', 'desc');
    
        // Apply filters
        if ($send_start_date && $send_end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($send_start_date), 
                Carbon::parse($send_end_date)->endOfDay()
            ]);
        }
        if ($attachment_type) {
            $query->where('attachment_type', 'LIKE', '%' . $attachment_type . '%');
        }
        if ($user_to) {
            $query->where('user_to', 'LIKE', '%' . $user_to . '%');
        }
        if ($status !== null) {
            $query->where('status', $status);
        }

        // Get Permission For Delete
        $user_email_delete_permissions = UserEmailDeletePermission::where('user_roles_id', $authID)
                                                                ->orWhere('user_emails_id', $authEmail)
                                                                ->orderByDesc('id')
                                                                ->get();
    
        // Count total emails sent by the authenticated user
        $total_send_emails = UserEmail::whereNotNull('user_to')
            ->where('sender_user', '=', $authID)
            ->count();
    
        // Paginate results
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        // Return response
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'total_send_emails' => $total_send_emails,
            'user_email_delete_permissions' => $user_email_delete_permissions,
            'months' => $months,
            'years' => array_values($years),
        ], 200);
    }
    /**
     * Handle Inbox Fetch Email
    */
    public function inboxFetchUserEmail(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
        $authUser = Auth::user();
        $authID = $authUser->id;
        $authEmail = $authUser->email;

        $attachment_type = $request->input('attachment_type');
        $status = $request->input('status');
        $read_mail = $request->input('read_mail');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $sender_email = $request->input('sender_email');
        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
        // Users
        $query = UserEmail::whereNotNull('user_to')
            ->where(function($q) use ($authEmail) {
                $q->where('user_to', 'LIKE', "%$authEmail%")
                  ->orWhere('user_cc', 'LIKE', "%$authEmail%")
                  ->orWhere('user_bcc', 'LIKE', "%$authEmail%");
            })
            ->with(['roles'])
            ->orderBy('id', 'desc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply attachment_type filters
        if ($attachment_type) {
            $query->where('attachment_type', 'LIKE', '%' . $attachment_type . '%');
        }
        // Apply user email filters
        if ($sender_email) {
            $query->where('sender_email', 'LIKE', '%' . $sender_email . '%');
        }
        // Apply email status filters
        if ($status !== null) {
            $query->where('status', $status);
        }
        // Apply read or unread email filters
        if ($read_mail !== null) {
            $query->where('read_mail', $read_mail);
        }
        
        // Get Permission For Delete
        $user_email_delete_permissions = UserEmailDeletePermission::where('user_roles_id', $authID)
                                                                ->orWhere('user_emails_id', $authEmail)
                                                                ->orderByDesc('id')
                                                                ->get();
        // Total User Email / Inbox
        $total_emails = UserEmail::whereNotNull('user_to')
                                ->where('user_to', 'LIKE', "%$authEmail%")
                                ->orWhere('user_cc', 'LIKE', "%$authEmail%")
                                ->orWhere('user_bcc', 'LIKE', "%$authEmail%")
                                ->count();
        // Total Draft User Email
        $total_draft_emails = UserEmail::whereNull('user_to')->where('sender_user', '=', $authID)->count();
        // Total New Email
        $total_new_emails = UserEmail::whereNotNull('user_to')
                                        ->where(function($q) use ($authEmail) {
                                            $q->where('user_to', 'LIKE', "%$authEmail%")
                                            ->orWhere('user_cc', 'LIKE', "%$authEmail%")
                                            ->orWhere('user_bcc', 'LIKE', "%$authEmail%");
                                        })
                                        ->where('status', '=', 0)
                                        ->count();
        // Total Send User Email According to Month
        $total_send_emails = UserEmail::whereNotNull('user_to')->where('sender_user', '=', $authID)->count();
        
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'total_emails' => $total_emails,
            'total_draft_emails' => $total_draft_emails,
            'total_send_emails' => $total_send_emails,
            'total_new_emails' => $total_new_emails,
            'user_email_delete_permissions' => $user_email_delete_permissions,
            'months' => $months,
            'years' => array_values($years)

        ], 200);
    }
    /**
     * Handle Forward Email 
    */
    public function forwardUserEmail(Request $request, $id)
    {
        $forward_email = UserEmail::find($id);
        if($forward_email){
            return response()->json([
                'status' => 200,
                'messages' => $forward_email
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'messages' => 'The email not found.'
            ]);
        }
    }
    /**
     * Handle Forward Email Again Send
    */
    public function sendForwardedUserEmail(Request $request)
    {
        $request->validate([
            'user_to' => 'nullable|string',
            'user_cc' => 'nullable|string',
            'user_bcc' => 'nullable|string',
            'subject' => 'nullable|string',
            'main_content' => 'nullable|string',
            'email_attachments.*' => 'nullable|file',
        ]);

        // Custom validation for multiple emails in To, CC, and BCC
        $to_emails = $request->user_to ? explode(',', $request->user_to) : [];
        foreach ($to_emails as $email) {
            if ($email && !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_to' => 'Invalid email format in CC field.']);
            }
        }

        $cc_emails = $request->user_cc ? explode(',', $request->user_cc) : [];
        foreach ($cc_emails as $email) {
            if ($email && !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_cc' => 'Invalid email format in CC field.']);
            }
        }

        $bcc_emails = $request->user_bcc ? explode(',', $request->user_bcc) : [];
        foreach ($bcc_emails as $email) {
            if ($email && !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_bcc' => 'Invalid email format in BCC field.']);
            }
        }

        $attachments = [];

        
        // Handle file attachments
        if ($request->hasFile('email_attachments')) {
            $attachmentFolder = $request->attachment_type == 'report' ? 'report' : ($request->attachment_type == 'message' ? 'message' : 'draft');
        
            foreach ($request->file('email_attachments') as $file) {
                $originalFilename = $file->getClientOriginalName();
                $filename = $originalFilename;
                $filePath = $attachmentFolder . '/' . $filename;
        
                // Check if the file already exists
                if (Storage::disk('public')->exists($filePath)) {
                    // If file exists, add it to attachments without re-uploading
                    $attachments[] = [
                        'file' => storage_path('app/public/' . $filePath),
                        'options' => [],
                    ];
                } else {
                    // Store the file with the final unique filename if it doesn't already exist
                    $storedFilePath = $file->storeAs($attachmentFolder, $filename, 'public');
                    $attachments[] = [
                        'file' => storage_path('app/public/' . $storedFilePath),
                        'options' => [],
                    ];
                }
            }
        }

        // [composer require ezyang/htmlpurifier] install for content clear from summary note
        $purifierConfig = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($purifierConfig);

        // Sanitize the main_content to remove unwanted HTML
        $content = $purifier->purify($request->main_content);
        // Prepare email content
        $details = [
            'user_to' => $request->user_to,
            'user_cc' => $request->user_cc ?? 'N/A',
            'user_bcc' => $request->user_bcc ?? 'N/A',
            'subject' => $request->subject ?? 'No Subject',
            'main_content' => $content ?? 'No Content',
        ];

        // Determine draft_mail status
        $draftMailStatus = $request->user_to ? ($request->draft_mail ? '1' : '0') : '1';
        // Store Email Data in DB
        DB::table('user_emails')->insert([
            'user_to' => $request->user_to,
            'user_cc' => $request->user_cc ?? 'N/A',
            'user_bcc' => $request->user_bcc ?? 'N/A',
            'subject' => $request->subject ?? 'No Subject',
            'main_content' => $content ?? 'No Content',
            'email_attachments' => json_encode($attachments),
            'attachment_type' => $request->attachment_type ?? 'other',
            'sender_email' => Auth::user()->email,
            'sender_user' => Auth::user()->id,
            'status' => $request->status ? '1' : '0',
            'read_mail' => $request->status ? '1' : '0',
            'draft_mail' => $draftMailStatus,
            'created_at' => now(),
        ]);

        try {
            // Send the email with attachments using the UserMail class
            Mail::to($to_emails)
            ->cc($cc_emails)
            ->bcc($bcc_emails)
            ->send(new UserMail($details, $attachments));
            return response()->json([
                'status' => 200,
                'messages' => 'Email has been sent successfully.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please try again.');
        }
    }
    /**
     * Handle Draft Fetch
    */
    public function getDraftFetchUserEmail(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
    
        // Input filters
        $draft_start_date = $request->input('draft_start_date');
        $draft_end_date = $request->input('draft_end_date');
        $attachment_type = $request->input('attachment_type');
        $subject = $request->input('subject');
    
        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        // Generate month and year filters if date range is provided
        if ($draft_start_date && $draft_end_date) {
            $start = Carbon::parse($draft_start_date)->startOfMonth();
            $end = Carbon::parse($draft_end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
    
            $years = array_unique(array_map(function ($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
    
        // Query setup
        $authID = Auth::user()->id;
        $query = UserEmail::whereNotIn('attachment_type', ['report', 'message'])
            ->where('sender_user', '=', $authID)
            ->with(['roles'])
            ->orderBy('id', 'desc');
    
        // Apply filters
        if ($draft_start_date && $draft_end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($draft_start_date), 
                Carbon::parse($draft_end_date)->endOfDay()
            ]);
        }
        if ($attachment_type) {
            $query->where('attachment_type', 'LIKE', '%' . $attachment_type . '%');
        }
        if ($subject) {
            $query->where('subject', 'LIKE', '%' . $subject . '%');
        }
    
        // Count total emails sent by the authenticated user
        $total_draft_emails = UserEmail::whereNotIn('attachment_type', ['report', 'message'])
                                        ->where('sender_user', '=', $authID)
                                        ->count();
    
        // Paginate results
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        // Return response
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'total_draft_emails' => $total_draft_emails,
            'months' => $months,
            'years' => array_values($years),
        ], 200);
    }
    /**
     * Handle Draft Update Mail
    */
    public function viewStatusUserEmail(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = UserEmail::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The email has been view Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle Delete Email
    */
    public function deleteUserEmail(Request $request)
    {
        $email_ids = $request->input('ids');

        if (is_array($email_ids)) {
            UserEmail::whereIn('id', $email_ids)->delete();
        } else {
            UserEmail::find($email_ids)->delete();
        }

        return response()->json([
            'status' => 200,
            'messages' => 'The inbox email has deleted successfully.'
        ]);
    }
    /**
     * Handle Delete Email Permission Store
    */
    public function deleteUserEmailPermissionStore(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'user_roles_id' => 'required|exists:roles,id',
            'user_emails_id' => 'required|unique:user_email_delete_permissions,user_emails_id',
            'other_status' => 'required|in:0,1',
        ], [
            'user_roles_id.required' => 'Role is required',
            'user_roles_id.exists' => 'The selected role does not exist',
            'user_emails_id.unique' => 'This email has already taken.',
            'other_status.required' => 'other status field is required',
            'other_status.in' => 'other status must be true (1) or false (0)',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $userEmailDeletePermissions = new UserEmailDeletePermission;
            $userEmailDeletePermissions->user_roles_id = $request->input('user_roles_id');
            $userEmailDeletePermissions->user_emails_id = $request->input('user_emails_id');
            $userEmailDeletePermissions->report_status = $request->input('report_status');
            $userEmailDeletePermissions->message_status = $request->input('message_status');
            $userEmailDeletePermissions->darft_status = $request->input('darft_status');
            $userEmailDeletePermissions->other_status = $request->input('other_status');
            $userEmailDeletePermissions->email_service = $request->input('email_service');
            $userEmailDeletePermissions->report_email_forward = $request->input('report_email_forward');
            $userEmailDeletePermissions->message_email_forward = $request->input('message_email_forward');
            $userEmailDeletePermissions->save();
            return response()->json([
                'messages' => 'permission has been created.',
                'code' => 200,
            ]);
        }
    }
    /**
     * Handle Delete Email Permission Edit
    */
    public function deleteUserEmailPermissionEdit($id)
    {
        $userEmailDeletePermissions = UserEmailDeletePermission::find($id);
        if($userEmailDeletePermissions){
            return response()->json([
                'status'=> 200,
                'messages'=> $userEmailDeletePermissions,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Would yout like to change permission ?',
            ]);
        }
    }
    /**
     * Handle Delete Email Permission Update
    */
    public function deleteUserEmailPermissionUpdate(Request $request, $id)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'user_roles_id' => 'required|exists:roles,id',
            'user_emails_id' => [
                'required',
                Rule::unique('user_email_delete_permissions', 'user_emails_id')->ignore($id),
            ],
            'other_status' => 'required|in:0,1',
        ], [
            'user_roles_id.required' => 'Role is required',
            'user_roles_id.exists' => 'The selected role does not exist',
            'user_emails_id.required' => 'Email field is required',
            'user_emails_id.unique' => 'This email has already been taken.',
            'other_status.required' => 'Other status field is required',
            'other_status.in' => 'Other status must be true (1) or false (0)',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $userEmailDeletePermissions = UserEmailDeletePermission::find($id);
            if ($userEmailDeletePermissions) {
                $userEmailDeletePermissions->user_roles_id = $request->input('user_roles_id');
                $userEmailDeletePermissions->user_emails_id = $request->input('user_emails_id');
                $userEmailDeletePermissions->report_status = $request->input('report_status');
                $userEmailDeletePermissions->message_status = $request->input('message_status');
                $userEmailDeletePermissions->darft_status = $request->input('darft_status');
                $userEmailDeletePermissions->other_status = $request->input('other_status');
                $userEmailDeletePermissions->email_service = $request->input('email_service');
                $userEmailDeletePermissions->report_email_forward = $request->input('report_email_forward');
                $userEmailDeletePermissions->message_email_forward = $request->input('message_email_forward');
                $userEmailDeletePermissions->save();
    
                return response()->json([
                    'status' => 200,
                    'messages' => 'permission has been updated.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'permission not found.',
                ]);
            }
        }
    }
    /**
     * Handle Delete Email Permission Delete
    */
    public function deleteUserEmailPermissionDelete($id)
    {
        $userEmailDeletePermissions = UserEmailDeletePermission::find($id);
        $userEmailDeletePermissions->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Permission has deleted.',
        ]);
    }
}
