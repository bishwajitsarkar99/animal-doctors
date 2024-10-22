<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $loginLink = setting('login_link');
        return $this->from('superadmin@gmail.com', 'GST-Medicine-Center')
                    ->subject('Email Verification')
                    ->markdown('emails.AdminMail')
                    ->with([
                        'loginLink' => $loginLink,
                    ]);
    }
}
