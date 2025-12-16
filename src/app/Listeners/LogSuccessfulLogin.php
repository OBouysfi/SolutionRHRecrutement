<?php 

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        Log::info('Connexion réussie (événement global).', [
            'email' => $event->user->email,
            'ip' => request()->ip(),
            'timestamp' => now()
        ]);
    }
}
