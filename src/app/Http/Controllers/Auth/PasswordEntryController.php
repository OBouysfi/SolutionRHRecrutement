<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPSentMail;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Mail\ForgotPasswordMail;
use Illuminate\Auth\Notifications\ResetPassword;




class PasswordEntryController extends Controller
{
    public function showForm(SettingService $settingService)
    {

        if (!Auth::user()) :
            // Récupère l'email stocké en session
            $email = session('auth_email');
            $settings = $settingService->getSecuritySettings();

            if (!$email) {
                return redirect()
                    ->route('login-email-form')
                    ->withErrors(['email' => 'Veuillez d\'abord saisir votre email.']);
            }

            return view('auth.loginPassword', compact('email', 'settings'));
        else:
            return redirect()->back();
        endif;
    }

    public function login(Request $request, SettingService $settingService)
    {
        // Récupérer les réglages de sécurité
        $settings = $settingService->getSecuritySettings();

        // appliquer la validation de base (le reCAPTCHA peut être déjà validé ou non selon ta configuration)
        $rules = [
            'email'    => 'required|email|max:255',
            'password' => 'required|min:6',
        ];

        if ($settings['captcha']) {
            // Si le CAPTCHA est activé, on peut également vérifier le champ g-recaptcha-response
            $rules['g-recaptcha-response'] = 'required|recaptcha';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();

                if (!empty($settings['two_factor_auth']) && $settings['two_factor_auth']) {
                    if (!$user->otp_code || $user->otp_expires_at->isPast()) {
                        $otp = random_int(1000, 9999);

                        $user->update([
                            'otp_code' => $otp,
                            'otp_expires_at' => Carbon::now()->addMinutes(5),
                        ]);

                        session(['otp_email' => $user->email]);

                        try {
                            Mail::to($user->email)->send(new OTPSentMail($otp, $user));
                        } catch (\Exception $e) {
                            Log::error('Erreur lors de l\'envoi de l\'OTP : ' . $e->getMessage(), ['user_id' => $user->id]);

                            Auth::logout();

                            return back()->withErrors(['email' => 'Impossible d\'envoyer l\'OTP. Merci de réessayer.'])->withInput();
                        }

                        Auth::logout();

                        return redirect()->route('otp-form')->with('success', 'OTP envoyé avec succès. Vérifiez votre email.');
                    }
                    Auth::logout();
                    return redirect()->route('otp-form')->with('info', 'Un OTP valide existe déjà. Vérifiez votre email.');
                }

                $user->update(['last_login_at' => now()]);

                // Redirection selon le rôle
                // if ($user->role && $user->role->name === 'Portail Client') {
                //     return redirect('client-portal/missions')
                //         ->with('success', 'Connexion réussie !');
                // } elseif ($user->role && $user->role->name === 'portail candidat') {
                //     return redirect()->route('candidate-portal.profiles.listing')
                //         ->with('success', 'Connexion réussie !');
                // } else {
                //     return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
                // }
                
                if ($user->can('dashboard-access')) {
                    return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
                } elseif ($user->can('client-portal-access')) {
                    return redirect('client-portal/organisation')
                        ->with('success', 'Connexion réussie !');
                } elseif ($user->can('candidate-portal-access')) {
                    return redirect()->route('candidate-portal.profiles.listing')
                        ->with('success', 'Connexion réussie par permission !');
                }

            }

            return back()->withErrors(['password' => 'Identifiants incorrects.'])->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la connexion ou de l\'envoi de l\'OTP: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Une erreur est survenue. Merci de réessayer.'])->withInput();
        }
    }

    public function reset(Request $request, $token = null)
    {
        return view('auth.reset')->with([
            'email' => $request->email
        ]);
    }

    /**
     *  Update Password
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => __('Aucun utilisateur trouvé avec cette adresse e-mail.')]);
        }

        // Met à jour le mot de passe
        $user->password = Hash::make($request->password);
        $user->save();

        event(new PasswordReset($user)); // Déclenche l'événement de mise à jour du mot de passe

        return redirect()->route('login-email-form')->with('status', __('Votre mot de passe a été réinitialisé avec succès !'));
    }

    public function forget()
    {
        return view('auth.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->input('email');
        $resetUrl = url(route('password.request', ['email' => $email], false));

        Mail::to($email)->send(new ForgotPasswordMail($resetUrl));

        return back()->with('success', 'Un email de réinitialisation a été envoyé.');
    }
}
