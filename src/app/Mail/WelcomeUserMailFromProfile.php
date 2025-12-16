<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class WelcomeUserMailFromProfile extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $loginUrl;

    public function __construct(User $user)
    {
        $this->user = $user;
        // Generate a signed URL for first login (optional for security)
        $this->loginUrl = URL::signedRoute('candidate-portal.profiles.listing', [], now()->addDays(7));
        // Or simply use your login URL
        // $this->loginUrl = route('login');
    }

    public function build()
    {
        return $this->subject('Création de votre compte candidat - Humanjobs')
                    ->view('emails.user.welcome-user');
    }
}