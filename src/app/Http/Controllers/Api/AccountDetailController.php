<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;


class AccountDetailController extends Controller
{
    protected $userService;

    // service UserService
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    // Méthode pour Modifiers les détails de l'utilisateur connecté
    public function updateAccountDetails(Request $request)
    {
        try {
            $user = auth()->user();
    
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Utilisateur non connecté.'
                ], 401);
            }
    
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'user_image' => 'nullable|image|max:2048',
            ], [
                'name.required' => 'Le nom est obligatoire.',
                'email.required' => 'L\'adresse email est obligatoire.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'user_image.image' => 'Le fichier doit être une image.',
                'user_image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
            ]);
    
            $data = $request->all();

            if ($request->hasFile('user_image')) {
                $imagePath = $request->file('user_image')->store('img/user', 'public');
                // \Log::info('Image uploaded: ' . $imagePath);
                $data['user_image'] = $imagePath;
            }
    
            $updatedUser = $this->userService->updateUserDetails($user->id, $data);
            
            if ($updatedUser) {
                return redirect()->route('get.Account.Detail')->with('success', 'Profil mis à jour avec succès.');
            } else {
                return redirect()->route('get.Account.Detail')->with('error', 'Erreur lors de la mise à jour des informations de l\'utilisateur.');
            }
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la mise à jour du profil utilisateur: ' . $e->getMessage());
        
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Erreur serveur: ' . $e->getMessage(),
                ], 500);
            }
            if (config('app.debug')) {
                return back()->withInput()->with('error', 'Erreur: ' . $e->getMessage());
            }
            return redirect()->route('get.Account.Detail')->with('error', 'Une erreur s\'est produite: ' . $e->getMessage());
        }
        
    }
    
    
    
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Mot de passe incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Mot de passe changé avec succès.');
    }
}
