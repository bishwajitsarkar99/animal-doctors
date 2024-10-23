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
        //$users_emails = User::where('status', 0)->get(['id', 'email']);
        if ($request->expectsJson()){
            return response()->json([
                'emails' => $emails
            ]);
        }
        return view('sendingEmails.index');
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
    
}
