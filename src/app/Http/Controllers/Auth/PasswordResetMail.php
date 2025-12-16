<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Rules\PasswordPolicyRule;

class PasswordResetMail extends Controller
{
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');

        // Vérifier l'utilisateur par email
        $user = User::where('email', $email)->first();

        if ($user && $user->role_id == 46) {
            return view('emails.user.pass-portalCandidat', ['token' => $token, 'email' => $email]);
        }

        return view('emails.user.pass', ['token' => $token, 'email' => $email]);
    }
    
       /**
     * Met à jour le mot de passe.
     */
    public function reset(Request $request)
    {
        // Custom validation messages in French
        $messages = [
        'email.required' => 'L\'adresse e-mail est requise.',
        'email.email' => 'Veuillez entrer une adresse e-mail valide.',
        'email.exists' => 'Aucun utilisateur ne correspond à cette adresse e-mail.',
        'password.required' => 'Le mot de passe est requis.',
        'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];

        // Validate the request with custom messages
        $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => ['required', 'confirmed', new PasswordPolicyRule],
        ], $messages);
        
        \Log::info('Password reset request:', $request->all());

        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Aucun utilisateur ne correspond à cette adresse e-mail.']);
        }
    
        // Mise à jour du mot de passe
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Connexion automatique
        auth()->login($user);

         // Redirection selon le rôle
        if ($user->role_id == 46) {
            return redirect('client-portal/organisation')
                ->with('success', 'Connexion réussie !');
        }

        return redirect()->route('dashboard')->with('success', 'Mot de passe mis à jour.');
    }
    
}
