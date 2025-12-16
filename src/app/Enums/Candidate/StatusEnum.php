<?php

namespace App\Enums\Candidate;

use Illuminate\Support\Collection;

class StatusEnum
{
    public const SALARIE  = 'salarie';
    public const CANDIDAT = 'candidat';
    public const ETUDIANT = 'etudiant';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::SALARIE  => __('generated.Salarié'),
            self::CANDIDAT => __('generated.Candidat'),
            self::ETUDIANT => __('generated.Etudiant'),
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