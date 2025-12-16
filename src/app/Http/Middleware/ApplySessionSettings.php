<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ApplySessionSettings
{
    public function handle(Request $request, Closure $next)
    {
        // ✅ Appliquer dynamiquement la durée d'expiration de session
        $expirationTime = setting('security.expiration_time', 30);
        Config::set('session.lifetime', (int)$expirationTime);

        // ✅ Vérification IP (seulement si définie ET valide)
        $allowedIp = trim(setting('security.ip_limit', ''));

        if (!empty($allowedIp) && filter_var($allowedIp, FILTER_VALIDATE_IP)) {
            if ($request->ip() !== $allowedIp) {
                // 👉 Redirection propre vers la page paramètres, pas vers la route PUT
                return redirect()->route('settings.security')
                    ->withErrors(['Accès refusé : votre adresse IP n’est pas autorisée.']);
            }
        }

        // ✅ Verrouillage automatique de session (auto_lock)
        $autoLock = setting('security.auto_lock', false);
        $lastActivity = session('last_activity_time');
        $now = now()->timestamp;

        if ($autoLock && Auth::check()) {
            if ($lastActivity && ($now - $lastActivity) > ((int)$expirationTime * 60)) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();

                return redirect()->route('login')->withErrors([
                    'Votre session a été verrouillée pour inactivité.'
                ]);
            }

            // Met à jour le temps d'activité
            session(['last_activity_time' => $now]);
        }

        return $next($request);
    }
}
