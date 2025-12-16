<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    const CACHE_KEY = 'security_settings';
    const CACHE_TTL = 3600; // 1 heure

    public function getSecuritySettings()
    {
        return [
            'captcha' => $this->getSetting('security.captcha', false),
            'two_factor_auth' => $this->getSetting('security.two_factor_auth', false),
            'two_factor_type' => [
                'sms' => $this->getSetting('security.two_factor_type.sms', false),
                'email' => $this->getSetting('security.two_factor_type.email', false),
                'authenticator' => $this->getSetting('security.two_factor_type.authenticator', false),
                'biometric' => $this->getSetting('security.two_factor_type.biometric', false),
                'hardware_key' => $this->getSetting('security.two_factor_type.hardware_key', false),
                'push_notification' => $this->getSetting('security.two_factor_type.push_notification', false),
                'qr_code' => $this->getSetting('security.two_factor_type.qr_code', false),
                'time_based_otp' => $this->getSetting('security.two_factor_type.time_based_otp', false),
                'event_based_otp' => $this->getSetting('security.two_factor_type.event_based_otp', false),
            ],
            'sso' => $this->getSetting('security.sso', false),
            'blockchain_storage' => $this->getSetting('security.blockchain_storage', false),
            'hash_algorithm' => $this->getSetting('security.hash_algorithm', 'SHA-256'),
            'blockchain_verification' => $this->getSetting('security.blockchain_verification', false),
            'verification_algorithm' => $this->getSetting('security.verification_algorithm', 'ECDSA'),

            // Session settings
            'session' => [
                'expiration_time' => $this->getSetting('security.expiration_time', 30),
                'auto_lock' => $this->getSetting('security.auto_lock', false),
                'ip_limit' => $this->getSetting('security.ip_limit', ''),
                'country_limit' => $this->getSetting('security.country_limit', ''),
            ],

            // Mot de passe settings
            'password' => [
                'min_length'       => $this->getSetting('security.min_length', 8),
                'min_uppercase'    => $this->getSetting('security.min_uppercase', 1),
                'min_numbers'      => $this->getSetting('security.min_numbers', 1),
                'min_special'      => $this->getSetting('security.min_special', 1),
                'force_reset_days' => $this->getSetting('security.force_reset_days', 90),
            ],

            // Fichiers settings
           'files' => [
                'max_size_mb' => $this->getSetting('security.max_size_mb', 20),
                'allowed_extensions' => $this->getSetting('security.allowed_extensions', 'pdf,docx,xlsx'),
                'qr_on_download' => $this->getSetting('security.qr_on_download', false),
                'digital_signature_enabled' => $this->getSetting('security.digital_signature_enabled', false),
                'blockchain_traceability_enabled' => $this->getSetting('security.blockchain_traceability_enabled', false),
            ],

        ];
    }

    public function updateSecuritySettings(array $settings)
    {
        foreach ($settings as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    $this->setSetting("security.{$key}.{$subKey}", $subValue);
                }
            } else {
                $this->setSetting("security.{$key}", $value);
            }
        }

        Cache::forget(self::CACHE_KEY);
    }


    protected function getSetting(string $key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? $this->castValue($setting->value, $setting->type) : $default;
    }

    protected function setSetting(string $key, $value)
    {
        if (is_null($value)) {
            $value = '';
        }

        $type = is_bool($value) ? 'boolean' :
            (is_numeric($value) ? 'integer' : 'string');

        Setting::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type
            ]
        );
    }


    protected function castValue($value, string $type)
    {
        switch ($type) {
            case 'boolean':
                return filter_var($value, FILTER_VALIDATE_BOOLEAN);
            case 'integer':
                return (int) $value;
            case 'array':
                return json_decode($value, true);
            default:
                return $value;
        }
    }
}