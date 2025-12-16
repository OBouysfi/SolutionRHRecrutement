<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class SituationEnum
{
    public const CELIBATAIRE  = 'celibataire';
    public const MARIE        = 'marie';
    public const DIVORCE      = 'divorce';
    public const VEUF         = 'veuf';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::CELIBATAIRE => __('generated.celibataire'),
            self::MARIE       => __('generated.marie'),
            self::DIVORCE     => __('generated.divorce'),
            self::VEUF        => __('generated.veuf'),
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