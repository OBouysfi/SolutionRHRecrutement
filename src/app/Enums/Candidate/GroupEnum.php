<?php

namespace App\Enums\Candidate;

use Illuminate\Support\Collection;

class GroupEnum
{
    public const PRINCIPAL  = 'Groupe principal';
 

    public static function getAll(): Collection
    {
        return Collection::make([
            'Groupe principal' => self::PRINCIPAL,
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