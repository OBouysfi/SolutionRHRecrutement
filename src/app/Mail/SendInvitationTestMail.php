<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvitationTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $test;
    public $url;

    public function __construct($user, $test, $url)
    {
        $this->user = $user;
        $this->test = $test;
        $this->url = $url;
    }

    public function build()
    {
        return $this->subject('Invitation à passer un test – ' . $this->test->test_name)
                    ->view('emails.send-invitation-test')
                    ->with([
                        'name' => $this->user->firstname . ' ' . $this->user->lastname,
                        'testName' => $this->test->test_name,
                        'inviteUrl' => $this->url,
                    ]);
    }

}
