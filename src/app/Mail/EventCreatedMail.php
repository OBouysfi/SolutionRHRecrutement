<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $toEmail;
    public $ccEmails;
    public $subjectLine;
    public $content;

    public function __construct($toEmail, $ccEmails, $subjectLine, $content)
    {
        $this->toEmail = $toEmail;
        $this->ccEmails = $ccEmails;
        $this->subjectLine = $subjectLine;
        $this->content = $content;
    }

    public function build()
    {
        $finalSubject = $this->subjectLine ?: 'Nouvel Événement Créé';

        return $this->view('emails.event-created')
            ->subject($finalSubject)
            ->with([
                'content' => $this->content
            ]);
    }
}
