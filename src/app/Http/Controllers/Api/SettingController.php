<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
        // Pour protéger cet endpoint, on peut utiliser auth:sanctum ou un autre middleware
        $this->middleware('auth:sanctum');
    }

    /**
     * Met à jour un ou plusieurs réglages de sécurité via AJAX.
     */
    public function update(Request $request)
    {
        // On peut valider dynamiquement les clés attendues.
        // Ici, on accepte qu'une seule clé soit envoyée à la fois via AJAX.
        $validatedData = $request->validate([
            'captcha' => 'sometimes|boolean',
            'two_factor_auth' => 'sometimes|boolean',
            'two_factor_type' => 'sometimes|array',
            'two_factor_type.*' => 'boolean',
            'sso' => 'sometimes|boolean',
            'blockchain_storage' => 'sometimes|boolean',
            'hash_algorithm' => 'sometimes|string|in:SHA-256,SHA-3,bcrypt,Argon2,PBKDF2,Scrypt',
            'blockchain_verification' => 'sometimes|boolean',
            'verification_algorithm' => 'sometimes|string|in:ECDSA,RSA,HMAC,DSA,EdDSA,AES'
        ]);

        // Mise à jour des réglages (selon ce qui a été envoyé)
        $this->settingService->updateSecuritySettings($validatedData);

        return response()->json([
            'message' => 'Paramètres de sécurité mis à jour avec succès'
        ], Response::HTTP_OK);
    }
}
