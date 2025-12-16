<?php

namespace App\Enums\Candidate;

use Illuminate\Support\Collection;

class SituationEnum
{
    public const CELIBATAIRE  = 'celibataire';
    public const MARIE = 'marie';
    public const DIVORCE = 'divorce';
    public const VEUF = 'veuf';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::CELIBATAIRE => __('generated.Célibataire'),
            self::MARIE => __('generated.Marié'),
            self::DIVORCE => __('generated.Divorcé'),
            self::VEUF => __('generated.Veuf'),
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