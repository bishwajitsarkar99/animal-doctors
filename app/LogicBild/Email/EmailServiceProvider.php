<?php
namespace App\LogicBild\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use HTMLPurifier;
use HTMLPurifier_Config;
use App\Mail\UserMail;
use App\Models\User;
use App\Models\UserEmail;
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
        $user_email = Auth::user()->email;
        $user_id = Auth::user()->id;
        // Total Email
        $userEmails = User::count();
        // Total inbox Email
        $total_emails = UserEmail::whereNotNull('user_to')
                                    ->where('user_to', 'LIKE', "%$user_email")
                                    ->orWhere('user_cc', 'LIKE', "%$user_email")
                                    ->orWhere('user_bcc', 'LIKE', "%$user_email")
                                    ->count();

        // Total Send User Email According to Month
        $total_send_emails = UserEmail::whereNotNull('user_to')->where('sender_user', '=', $user_id)->count();

        // Calculate the percentage of total inbox email
        $inbox_email_percentage = $total_emails > 0 ? ($total_emails / $userEmails) * 100 : 0;
        // Calculate the percentage of total send email
        $send_email_percentage = $total_send_emails > 0 ? ($total_send_emails / $userEmails) * 100 : 0;

        return view('sendingEmails.index', compact('inbox_email_percentage', 'send_email_percentage'));
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
            $attachmentFolder = $request->attachment_type == 'attachments' ? 'attachments' : 'user_message';
        
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
        $authID = Auth::user()->id;
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
            'months' => $months,
            'years' => array_values($years),
        ], 200);
    }
    /**
     * Handle Send Forward Email 
    */
    public function sendForwardUserEmail(Request $request, $id)
    {
        //
    }
    /**
     * Handle Inbox Fetch Email
    */
    public function inboxFetchUserEmail(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
        $attachment_type = $request->input('attachment_type');
        $status = $request->input('status');
        $read_mail = $request->input('read_mail');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $user_to = $request->input('user_to');
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
        $authEmail = Auth::user()->email;
        $query = UserEmail::whereNotNull('user_to')
            ->where(function($q) use ($authEmail) {
                $q->where('user_to', 'LIKE', "%$authEmail")
                  ->orWhere('user_cc', 'LIKE', "%$authEmail")
                  ->orWhere('user_bcc', 'LIKE', "%$authEmail");
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
        if ($user_to) {
            $query->where('user_to', 'LIKE', '%' . $user_to . '%');
        }
        // Apply email status filters
        if ($status !== null) {
            $query->where('status', $status);
        }
        // Apply read or unread email filters
        if ($read_mail !== null) {
            $query->where('read_mail', $read_mail);
        }
        
        // Auth Users id
        $userId = Auth::user()->id;
        // Auth User Email
        $user_email = Auth::user()->email;
        // Total User Email / Inbox
        $total_emails = UserEmail::whereNotNull('user_to')
                                ->where('user_to', 'LIKE', "%$user_email")
                                ->orWhere('user_cc', 'LIKE', "%$user_email")
                                ->orWhere('user_bcc', 'LIKE', "%$user_email")
                                ->count();
        // Total Draft User Email
        $total_draft_emails = UserEmail::whereNull('user_to')->where('sender_user', '=', $userId)->count();
        // Total New Email
        $total_new_emails = UserEmail::whereNotNull('user_to')
                                        ->where('user_to', 'LIKE', "%$user_email")
                                        ->orWhere('user_cc', 'LIKE', "%$user_email")
                                        ->orWhere('user_bcc', 'LIKE', "%$user_email")
                                        ->where('status','=', 0)
                                        ->count();
        // Total Send User Email According to Month
        $total_send_emails = UserEmail::whereNotNull('user_to')->where('sender_user', '=', $userId)->count();
        
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
            'months' => $months,
            'years' => array_values($years)

        ], 200);
    }
    /**
     * Handle Inbox Forward Email 
    */
    public function inboxForwardUserEmail(Request $request, $id)
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
     * Handle Draft List Fetch
    */
    public function getDraftFetchUserEmail(Request $request)
    {
        //
    }
    /**
     * Handle Draft Forward Mail
    */
    public function draftForwardUserEmail(Request $request, $id)
    {
        //
    }
    /**
     * Handle Draft Update Mail
    */
    public function draftUpdateUserEmail(Request $request, $id)
    {
        //
    }
    /**
     * Handle Delete Email
    */
    public function deleteUserEmail(Request $request)
    {
        //
    }
    
}
