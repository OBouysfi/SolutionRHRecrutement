<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class IdentityTypeEnum
{
    public const CIN  = 'Carte d\'Identité Nationale  (CIN)';
    public const PASSEPORT = 'Passeport';
    public const CARTE_DE_RESIDENCE = 'Carte de Résidence';
    public const VISA_TRAVAIL = 'Visa de Travail';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::CIN                => __('generated.cin'),
            self::PASSEPORT          => __('generated.passeport'),
            self::CARTE_DE_RESIDENCE => __('generated.carte_de_residence'),
            self::VISA_TRAVAIL       => __('generated.visa_travail'),
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
}