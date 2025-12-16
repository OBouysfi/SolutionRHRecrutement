<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class MentionEnum
{
    public const PASSABLE = 'passable';
    public const ASSEZ_BIEN = 'assez_bien';
    public const BIEN = 'bien';
    public const TRES_BIEN = 'tres_bien';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::PASSABLE    => __('generated.passable'),
            self::ASSEZ_BIEN  => __('generated.assez_bien'),
            self::BIEN        => __('generated.bien'),
            self::TRES_BIEN   => __('generated.tres_bien'),
        ]);
    }

    public static function getAbbrAll(): Collection
    {
        return Collection::make([
            self::PASSABLE    => __('generated.abbr_passable'),
            self::ASSEZ_BIEN  => __('generated.abbr_assez_bien'),
            self::BIEN        => __('generated.abbr_bien'),
            self::TRES_BIEN   => __('generated.abbr_tres_bien'),
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
