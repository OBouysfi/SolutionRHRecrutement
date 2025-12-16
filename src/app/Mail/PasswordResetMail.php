<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $resetLink;
    
    /**
     * Create a new message instance.
     */
    public function __construct($user, $password, $resetLink)
    {
        $this->user = $user;
        $this->password = $password;
        $this->resetLink = $resetLink;
    }


    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->markdown('emails.user.password-reset')
                    ->with([
                        'name' => $this->user->name,
                        'password' => $this->password,
                        'resetLink' => $this->resetLink,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
