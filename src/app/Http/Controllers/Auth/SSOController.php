<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class SSOController extends Controller
{
    /**
     * Redirige vers le fournisseur SSO (ici, par exemple, Google).
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Gère le callback du fournisseur SSO.
     */
    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            // Rechercher l'utilisateur dans votre base par email
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Option : afficher une erreur ou créer automatiquement l'utilisateur
                return redirect()->route('login')->withErrors(['email' => 'Aucun compte associé à cet email.']);
            }

            Auth::login($user, true);
            return redirect()->route('dashboard')->with('success', 'Connexion réussie via SSO.');
        } catch (\Exception $e) {
            Log::error('Erreur SSO: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['error' => 'Une erreur SSO est survenue.']);
        }
    }
}
