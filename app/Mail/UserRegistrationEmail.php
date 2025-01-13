<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\MailSetting;

class UserRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userRegistrionLink = route('register.loading');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.UserRegistraionMail');
        // $loginLink = setting('login_link');

        // Fetch the mail settings
        $mailSetting = MailSetting::first();

        // Use the mail_from value from the settings table
        $mailFrom = $mailSetting ? $mailSetting->mail_from : 'default@example.com';
        $companyName = setting('company_name');
        $companyLogo = asset('backend_asset/main_asset/img/' . setting('update_company_logo'));
        $companyAddress = setting('company_address');
        $date = now()->timezone('Asia/Dhaka')->format('d l M Y ; h:i:sA');

        return $this->from($mailFrom, $companyName)
                    ->subject('User Registrion')
                    ->markdown('emails.UserRegistraionMail')
                    ->with([
                        'companyName' => $companyName,
                        'companyLogo' => $companyLogo,
                        'companyAddress' => $companyAddress,
                        'currentDate' => $date,
                        'userRegistrionLink' => $this->userRegistrionLink,
                    ]);
    }
}
