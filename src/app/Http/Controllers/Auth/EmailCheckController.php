<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EmailCheckController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function showForm(SettingService $settingService)
    {
        if(!Auth::user()) :
            $settings = $settingService->getSecuritySettings(); 
            return view('auth.loginEmail', compact('settings'));
        else :
           return to_route('dashboard'); 
        endif; 
       
    }

    /**
     * Vérifie l'existence de l'email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkEmail(Request $request, SettingService $settingService)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()
                    ->withErrors(['email' => 'Cette adresse email n\'existe pas.'])
                    ->withInput();
            }

            // Récupérer les réglages de sécurité
            $settings = $settingService->getSecuritySettings();

            if ($settings['sso']) {
                // Si SSO est activé, rediriger vers le flux SSO
                return redirect()->route('login.sso');
            } else {
                session(['auth_email' => $request->email]);
                return redirect()->route('login-password-form');
            }

        } catch (\Exception $e) {
            Log::error('Erreur lors de la vérification email: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Une erreur est survenue. Merci de réessayer.'])
                ->withInput();
        }
    }
}