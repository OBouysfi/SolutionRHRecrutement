<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Log;

class LogFailedLogin
{
    public function handle(Failed $event)
    {
        Log::warning('Tentative de connexion échouée (événement global).', [
            'email' => $event->credentials['email'] ?? 'inconnu',
            'ip' => request()->ip(),
            'timestamp' => now()
        ]);
    }
}
