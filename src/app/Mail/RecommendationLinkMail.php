<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class RecommendationLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $profile;
    public $url;
     public $nomDuContact;

    public function __construct($profile, $url, $nomDuContact)
    {
        $this->profile = $profile;
        $this->url = $url;
        $this->nomDuContact = $nomDuContact;
    }

    public function build()

    {
        $candidateName = $this->profile->first_name . ' ' . $this->profile->last_name;

        return $this->subject("Demande de recommandation – ($candidateName)")
                    ->view('emails.recommendation-link')
                     ->with(['nomDuContact' => $this->nomDuContact]);
    }

}
