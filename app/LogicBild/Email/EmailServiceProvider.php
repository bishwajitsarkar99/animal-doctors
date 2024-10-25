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
        $emails = User::where('status', 0)->pluck('email');
        $userEmails = User::count();
        $total_emails = UserEmail::count();
        // Calculate the percentage of total users
        $user_email_percentage = $total_emails > 0 ? ($total_emails / $userEmails) * 100 : 0;

        if ($request->expectsJson()){
            return response()->json([
                'emails' => $emails
            ]);
        }
        return view('sendingEmails.index', compact('user_email_percentage'));
    }
    /**
     * Handle Send Email
    */
    public function sending(Request $request)
    {
        $request->validate([
            'user_to' => 'required|string',
            'user_cc' => 'nullable|string',
            'user_bcc' => 'nullable|string',
            'subject' => 'required|string',
            'main_content' => 'nullable|string',
            'attachment_type' => 'nullable|string',
            'email_attachments.*' => 'nullable|file',
        ]);

        // Custom validation for multiple emails in To, CC, and BCC
        $to_emails = explode(',', $request->user_to);
        foreach ($to_emails as $email) {
            if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['user_to' => 'Invalid email format in To field.']);
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
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs($attachmentFolder, $filename, 'public');
                $attachments[] = [
                    'file' => storage_path('app/public/' . $filePath),
                    'options' => [],
                ];
            }
        }

        // [composer require ezyang/htmlpurifier] install for content clear from summary note
        $purifierConfig = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($purifierConfig);

        // Sanitize the main_content to remove unwanted HTML
        $content = $purifier->purify($request->main_content);
        // Prepare email content
        $details = [
            'user_to' => $request->user_to ?? 'No Email',
            'user_cc' => $request->user_cc ?? 'No CC',
            'user_bcc' => $request->user_bcc ?? 'No BCC',
            'subject' => $request->subject ?? 'No Subject',
            'main_content' => $content ?? 'No Content',
        ];

        // Store Email Data in DB
        DB::table('user_emails')->insert([
            'user_to' => $request->user_to,
            'user_cc' => $request->user_cc,
            'user_bcc' => $request->user_bcc,
            'subject' => $request->subject,
            'main_content' => $content,
            'email_attachments' => json_encode($attachments),
            'attachment_type' => $request->attachment_type,
            'sender_email' => Auth::user()->email,
            'sender_user' => Auth::user()->id,
            'status' => $request->status ? '1' : '0',
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
     * Handle Fetch Email
    */
    public function fetchUserEmail(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
        $attachment_type = $request->input('attachment_type');
        $status = $request->input('status');
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
    
        $query = UserEmail::with(['roles'])->orderBy('id', 'desc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($attachment_type) {
            $query->where('attachment_type', 'LIKE', '%' . $attachment_type . '%');
        }

        if ($user_to) {
            $query->where('user_to', 'LIKE', '%' . $user_to . '%');
        }
        if ($status !== null) {
            $query->where('status', $status);
        }
        // Clone the query for calculating totals
        // $totalUnreadQuery = clone $query;
        // $totalInvQty = $totalUnreadQuery->sum('quantity');
    
        // $totalInv = $query->sum('sub_total');
        
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            // 'totalInv' => $totalInv,
            // 'totalInvQty' => $totalInvQty,
            'months' => $months,
            'years' => array_values($years)

        ], 200);
    }
    /**
     * Handle View Email
    */
    public function viewUserEmail(Request $request)
    {
        
    }
    /**
     * Handle Delete Email
    */
    public function deleteUserEmail(Request $request)
    {
        
    }
    
}
