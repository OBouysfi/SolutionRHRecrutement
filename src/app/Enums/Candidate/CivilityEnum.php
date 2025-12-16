<?php

namespace App\Enums\Candidate;

use Illuminate\Support\Collection;

class CivilityEnum
{
    public const M  = 1;
    public const Mme = 2;
    public const Mlle = 3;
 

    public static function getAll(): Collection
    {
        return Collection::make([
            self::M => 'M.',
            self::Mme => 'Mme',
            self::Mlle => 'Mlle',
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