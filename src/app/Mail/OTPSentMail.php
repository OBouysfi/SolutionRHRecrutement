<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPSentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp; // Code OTP
    public $user; // Données utilisateur

    /**
     * Create a new message instance.
     *
     * @param string $otp
     * @param object $user
     */
    public function __construct($otp, $user)
    {
        $this->otp = $otp;
        $this->user = $user;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Votre code OTP - HumanJobs')
            ->view('emails.otp');
    }
}
