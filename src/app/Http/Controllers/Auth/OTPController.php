<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPSentMail;
use App\Models\AuditLog;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OTPController extends Controller
{
    public function showForm()
    {
        $email = session('otp_email');

        if (!$email) {
            return redirect()->route('login-email-form')->withErrors(['email' => 'Veuillez saisir votre email d\'abord.']);
        }

        return view('auth.otp', compact('email'));
    }


    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp_code' => 'required|digits:4',
        ]);

        $user = User::where('email', $request->email)->first();

        // Vérifier si l'OTP est correct et non expiré
        if (
            $user->otp_code === $request->otp_code &&
            $user->otp_expires_at && $user->otp_expires_at->greaterThan(now())
        ) {
            // Réinitialisation de l'OTP après vérification et logger sa dérniere connexion
            $user->update(['otp_code' => null, 'otp_expires_at' => null, 'last_login_at' => now()]);

            // Connexion automatique de l'utilisateur
            auth()->login($user);

            // Log de la vérification réussie
            AuditLog::create([
                'user_id' => $user->id,
                'action' => 'OTP vérifié',
                'details' => json_encode(['email' => $user->email]),
                'ip' => $request->ip(),
            ]);

            return redirect()->route('dashboard')->with('success', 'OTP vérifié avec succès !');
        } else {
            DB::table('users')->where('id', $user->id)->increment('otp_attempts');
            // Log de l'échec de vérification
            AuditLog::create([
                'user_id' => $user->id ?? null,
                'action' => 'Échec de vérification OTP',
                'details' => json_encode([
                    'email' => $request->email,
                    'entered_otp' => $request->otp_code,
                    'expected_otp' => $user->otp_code ?? 'non défini',
                ]),
                'ip' => $request->ip(),
            ]);

            return back()->with('error', 'OTP invalide ou expiré.');
        }
    }

    /**
     * Envoie un nouvel OTP à l'utilisateur.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function ResendOTP(Request $request, SettingService $settingService)
    {
        $settings = $settingService->getSecuritySettings();
        $user = Auth::user();

        if ($settings['two_factor_auth'] && $user->otp_attempts <= 2) {
            // Si 2FA est activé, on génère un OTP, l'enregistre et l'envoie par email,
            // puis on redirige vers la page OTP pour la vérification.
            $otp = random_int(1000, 9999);
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                'otp_code'       => $otp,
                'otp_expires_at' => Carbon::now()->addMinutes(3),
                'otp_attempts'   =>  (int)$user->otp_attempts + 1
                 ]);  
            
            session(['otp_email' => $user->email]);

            Mail::to($user->email)->send(new OTPSentMail($otp, $user));

            return redirect()->route('otp-form')
                ->with('success', 'OTP envoyé avec succès. Vérifiez votre email.');
        } else {
            return back()->with('error', 'Vous avez atteint le nombre maximum d\'essais. Veuillez contacter l\'administrateur.');
        }
    }
}
