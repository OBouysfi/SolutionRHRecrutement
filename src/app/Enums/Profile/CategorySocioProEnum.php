<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class CategorySocioProEnum
{
    public const OUVRIERS = 'ouvriers';
    public const EMPLOYES = 'employes';
    public const FONCTIONNAIRES = 'fonctionnaires';
    public const AGENTS_DE_MAITRISE = 'agents_de_maitrise';
    public const TECHNICIENS = 'techniciens';
    public const COMMERCANTS_ARTISANS = 'commercants_artisans';
    public const INDEPENDANTS_FREELANCES = 'independants_freelances';
    public const CADRES = 'cadres';
    public const CADRES_SUPERIEURS = 'cadres_superieurs';
    public const DIRIGEANTS_ENTREPRISE = 'dirigeants_entreprise';
    public const DIRECTEURS = 'directeurs';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::OUVRIERS                => __('generated.ouvriers'),
            self::EMPLOYES                => __('generated.employes'),
            self::FONCTIONNAIRES          => __('generated.fonctionnaires'),
            self::AGENTS_DE_MAITRISE      => __('generated.agents_de_maitrise'),
            self::TECHNICIENS             => __('generated.techniciens'),
            self::COMMERCANTS_ARTISANS    => __('generated.commercants_artisans'),
            self::INDEPENDANTS_FREELANCES => __('generated.independants_freelances'),
            self::CADRES                  => __('generated.cadres'),
            self::CADRES_SUPERIEURS       => __('generated.cadres_superieurs'),
            self::DIRIGEANTS_ENTREPRISE   => __('generated.dirigeants_entreprise'),
            self::DIRECTEURS              => __('generated.directeurs'),
        ]);
    }

    public static function getAbbrAll(): Collection
    {
        return Collection::make([
            self::OUVRIERS => 'O',
            self::EMPLOYES => 'E',
            self::FONCTIONNAIRES => 'F',
            self::AGENTS_DE_MAITRISE => 'AM',
            self::TECHNICIENS => 'T',
            self::COMMERCANTS_ARTISANS => 'CA',
            self::INDEPENDANTS_FREELANCES => 'IF',
            self::CADRES => 'C',
            self::CADRES_SUPERIEURS => 'CS',
            self::DIRIGEANTS_ENTREPRISE => 'DE',
            self::DIRECTEURS => 'D',
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
