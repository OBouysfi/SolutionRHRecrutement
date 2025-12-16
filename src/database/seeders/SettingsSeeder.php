<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [

            // Authentification
            ['key' => 'security.captcha', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_auth', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.sms', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.email', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.authenticator', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.biometric', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.hardware_key', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.push_notification', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.qr_code', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.time_based_otp', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.two_factor_type.event_based_otp', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.sso', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.blockchain_storage', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.hash_algorithm', 'value' => 'SHA-256', 'type' => 'string'],
            ['key' => 'security.blockchain_verification', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.verification_algorithm', 'value' => 'ECDSA', 'type' => 'string'],

            // Session settings
            ['key' => 'security.expiration_time', 'value' => 30, 'type' => 'integer'],
            ['key' => 'security.auto_lock', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.ip_limit', 'value' => '', 'type' => 'string'],
            ['key' => 'security.country_limit', 'value' => '', 'type' => 'string'],

            // Password settings
            ['key' => 'security.min_length', 'value' => 8, 'type' => 'integer'],
            ['key' => 'security.min_uppercase', 'value' => 1, 'type' => 'integer'],
            ['key' => 'security.min_numbers', 'value' => 1, 'type' => 'integer'],
            ['key' => 'security.min_special', 'value' => 1, 'type' => 'integer'],
            ['key' => 'security.force_reset_days', 'value' => 90, 'type' => 'integer'],

            // File settings
            ['key' => 'security.max_size_mb', 'value' => 20, 'type' => 'integer'],
            ['key' => 'security.allowed_extensions', 'value' => 'pdf,docx,xlsx', 'type' => 'string'],
            ['key' => 'security.qr_on_download', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.digital_signature_enabled', 'value' => false, 'type' => 'boolean'],
            ['key' => 'security.blockchain_traceability_enabled', 'value' => false, 'type' => 'boolean'],

        ];

        foreach ($defaults as $item) {
            Setting::updateOrCreate(
                ['key' => $item['key']],
                ['value' => $item['value'], 'type' => $item['type']]
            );
        }
    }
}
