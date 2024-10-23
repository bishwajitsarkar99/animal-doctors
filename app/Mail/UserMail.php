<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $attachments;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $attachments = [])
    {
        $this->details = $details;
        $this->attachments = is_array($attachments) ? $attachments : [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->details['subject'])
                  ->view('sendingEmails.user_send_email')
                  ->with('content', $this->details['main_content']);

        // Attach files if any
        if (is_array($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                if (isset($attachment['file']) && is_string($attachment['file'])) {
                    // Attach the file with its options
                    $email->attach($attachment['file'], $attachment['options']);
                }
            }
        }
        return $email;
    }
}
