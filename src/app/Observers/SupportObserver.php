<?php

namespace App\Observers;

use App\Models\Support;
use App\Mail\SupportMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SupportObserver
{
    /**
     * Handle the Support "created" event.
     *
     * @param  \App\Models\Support  $support
     * @return void
     */
    public function created(Support $support)
    {
        Log::info('Support request created: ', $support->toArray());

        try {
            
            $body = [
                'first_name' => $support->first_name,
                'last_name' => $support->last_name,
                'email' => $support->email,
                'message' => $support->message,
                'subject' => $support->subject,
            ];

            Mail::to('o.bouysfi@byteit.ma')->send(new SupportMail($body));

            Log::info('Support request email sent to: ' . $support->email);
        } catch (\Throwable $e) {
            Log::error('Error sending email in SupportObserver', [
                'error.message' => $e->getMessage(),
                'error.trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
