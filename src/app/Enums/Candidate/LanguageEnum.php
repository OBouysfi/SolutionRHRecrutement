<?php

namespace App\Enums\Candidate;

use Illuminate\Support\Collection;

class LanguageEnum
{
    public const FRANCAIS  = 'Français';
    public const ANGLAIS = 'Anglais';

    public static function getAll(): Collection
    {
        return Collection::make([
            'Français' => self::FRANCAIS,
            'Anglais' => self::ANGLAIS,
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getAll();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }

    // Add this function for translation
    public static function getTranslated($key): ?string
    {
        $value = self::getValue($key);
        return $value ? __(sprintf('generated.%s', $value)) : null;
    }
}
