<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class CompanySizeEnum
{
    public const PETITE_ENTREPRISE = 'Petite entreprise';
    public const PETITE_ET_MOYENNE_ENTREPRISE = 'Petite et moyenne entreprise';
    public const GRANDE_ENTREPRISE = 'Grande entreprise';
    public const ADMINISTRATION_PUBLIQUE = 'Administration publique';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::PETITE_ENTREPRISE             => __('generated.petite_entreprise'),
            self::PETITE_ET_MOYENNE_ENTREPRISE  => __('generated.petite_et_moyenne_entreprise'),
            self::GRANDE_ENTREPRISE             => __('generated.grande_entreprise'),
            self::ADMINISTRATION_PUBLIQUE       => __('generated.administration_publique'),
        ]);
    }

    public static function getAbbrAll(): Collection
    {
        return Collection::make([
            self::PETITE_ENTREPRISE             => __('generated.petite_entreprise'),
            self::PETITE_ET_MOYENNE_ENTREPRISE  => __('generated.pme'),
            self::GRANDE_ENTREPRISE             => __('generated.grande_entreprise'),
            self::ADMINISTRATION_PUBLIQUE       => __('generated.admin_publique'),
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

    public static function getAbbrValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getAbbrAll();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }
}
