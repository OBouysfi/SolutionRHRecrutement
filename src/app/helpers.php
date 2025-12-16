<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Récupère une valeur de configuration stockée dans la table settings.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        try {
            $setting = Setting::where('key', $key)->first();

            if (!$setting) {
                return $default;
            }

            return match ($setting->type) {
                'boolean' => filter_var($setting->value, FILTER_VALIDATE_BOOLEAN),
                'integer' => (int) $setting->value,
                'array'   => json_decode($setting->value, true),
                default   => $setting->value,
            };
        } catch (\Throwable $e) {
            // En cas d'erreur (migration non faite, etc.), retourner le défaut sans bloquer
            return $default;
        }
    }
}

if (!function_exists('setting_set')) {
    /**
     * Enregistre ou met à jour une configuration dans la table settings.
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $type
     * @return \App\Models\Setting
     */
    function setting_set(string $key, $value, ?string $type = null)
    {
        $type = $type ?? match (true) {
            is_bool($value) => 'boolean',
            is_int($value) => 'integer',
            is_array($value) => 'array',
            default => 'string',
        };

        return Setting::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value) : $value,
                'type' => $type,
            ]
        );
    }
}
