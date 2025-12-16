<?php

namespace App\Observers;

use App\Mail\EventCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Profile;
use App\Models\User;

class EventObserver
{
public function created(Event $event): void
{
    $participants = [];
    $destinataires = [];

    // Collect participant and destinataire emails
    foreach ($event->participants as $participant) {
        $participants[] = $this->getEmailForParticipant($participant);
    }
    
    foreach ($event->destinataires as $destinataire) {
        $destinataires[] = $this->getEmailForDestinataire($destinataire);
    }

    // Filter out null values
    $participants = array_filter($participants);
    $destinataires = array_filter($destinataires);

    // Send confirmation email to creator
    Mail::to(Auth::user()->email)->send(new EventCreatedMail($event));

    // Send emails to destinataires with participants as CC
    foreach ($destinataires as $destinataireEmail) {
        $mail = new EventCreatedMail($event);
        
        // Only add CC if there are participants
        if (!empty($participants)) {
            $mail->cc($participants);
        }
        
        Mail::to($destinataireEmail)->send($mail);
    }

    // Also send separate emails to participants (if needed)
    if (empty($destinataires)) {
        foreach ($participants as $participantEmail) {
            Mail::to($participantEmail)->send(new EventCreatedMail($event));
        }
    }
}

private function getEmailForParticipant($participant)
{
    if ($user = User::find($participant->user_id)) {
        return $user->email;
    }
    return null;
}

private function getEmailForDestinataire($destinataire)
{
    if ($profile = Profile::find($destinataire->profile_id)) {
        return $profile->email;
    }
    return null;
}

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
}
