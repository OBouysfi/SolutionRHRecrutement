<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class FavoriteProfileEnum
{
    public const YES = 1;
    public const NO = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::YES => __('generated.yes'),
            self::NO  => __('generated.no'),
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