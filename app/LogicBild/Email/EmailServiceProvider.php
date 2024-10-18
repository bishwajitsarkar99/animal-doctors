<?php
namespace App\LogicBild\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\UserMail;
use App\Models\User;

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

        $content = preg_replace('/<p[^>]*>(.*?)<\/p>/i', '$1', $request->main_content);
        // Prepare email content
        $details = [
            'subject' => $request->subject ?? 'No Subject',
            'title' => 'GST Medicine Center',
            'main_content' => $content ?? 'No Content',
        ];

        try {
            // Send email
            $mail = Mail::to($to_emails);

            if (!empty($cc_emails)) {
                $mail->cc($cc_emails);
            }

            if (!empty($bcc_emails)) {
                $mail->bcc($bcc_emails);
            }

            $mail->send(new UserMail($details));

            return back()->with('success', 'Email has been sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please try again.');
        }
    }
    
}
