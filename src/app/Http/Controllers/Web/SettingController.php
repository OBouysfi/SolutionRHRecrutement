<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
        $this->middleware('permission:personnalisation-access')->only(['personnalisation']);
        $this->middleware('permission:sécurité-access')->only(['index']);
        $this->middleware('permission:notifications-access')->only(['notification']);
        $this->middleware('permission:Sauvegarde-access')->only(['sauvegarde']);
    }

    public function index()
    {
        $settings = $this->settingService->getSecuritySettings();
        // dd($settings);
        return view('setting.security', compact('settings'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'captcha' => 'boolean',
            'two_factor_auth' => 'boolean',
            'two_factor_type' => 'array',
            'two_factor_type.*' => 'boolean',
            'sso' => 'boolean',
            'blockchain_storage' => 'boolean',
            'hash_algorithm' => 'string|in:SHA-256,SHA-3,bcrypt,Argon2,PBKDF2,Scrypt',
            'blockchain_verification' => 'boolean',
            'verification_algorithm' => 'string|in:ECDSA,RSA,HMAC,DSA,EdDSA,AES'
        ]);

        $this->settingService->updateSecuritySettings($validatedData);
        return redirect()->back()->with('success', 'Paramètres de sécurité mis à jour avec succès');
    }

    /**
     * Setting - updateSession
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSession(Request $request)
    {
        $validated = $request->validate([
            'session.expiration_time' => 'required|integer|min:1|max:720',
            'session.auto_lock' => 'nullable|boolean',
            'session.ip_limit' => 'nullable|string|max:255',
            'session.country_limit' => 'nullable|string|max:255',
        ]);

        $this->settingService->updateSecuritySettings($request->input('session'));

        return redirect()->route('settings.security')
            ->with('success', 'Paramètres mis à jour avec succès');

    }

    /**
     * Setting - updatePasswordSettings
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePasswordSettings(Request $request)
    {
        $validated = $request->validate([
            'password.min_length' => 'required|integer|min:6|max:64',
            'password.min_uppercase' => 'required|integer|min:0|max:10',
            'password.min_numbers' => 'required|integer|min:0|max:10',
            'password.min_special' => 'required|integer|min:0|max:10',
            'password.force_reset_days' => 'required|integer|min:0|max:365',
        ]);

        $this->settingService->updateSecuritySettings($request->input('password'));

        return redirect()->route('settings.security', ['#tab3'])
            ->with('success', 'Règles du mot de passe mises à jour avec succès.');
    }

    /**
     * Setting - updateFileSettings
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFileSettings(Request $request)
    {
        $validated = $request->validate([
            'files.max_size_mb' => 'required|integer|min:1|max:200',
            'files.allowed_extensions' => 'required|string',
            'files.qr_on_download' => 'nullable|boolean',
            'files.digital_signature_enabled' => 'nullable|boolean',
            'files.blockchain_traceability_enabled' => 'nullable|boolean',
        ]);

        $this->settingService->updateSecuritySettings($request->input('files'));

        return redirect()->route('settings.security', ['#tab4'])
            ->with('success', 'Paramètres des fichiers mis à jour avec succès.');
    }


    public function personnalisation()
    {
        return view('setting.personalization');
    }

    public function sauvegarde()
    {
        return view('setting.backup');
    }

    public function notification()
    {
        return view('setting.notification');
    }

    public function api()
    {
        return view('setting.api');
    }

    public function apiDetail()
    {
        return view('setting.apiDetail');
    }

    public function permission()
    {
        $users = User::all();
        return view('setting.rolesPermissions', compact('users'));
    }

}
