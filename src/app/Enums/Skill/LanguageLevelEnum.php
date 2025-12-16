<?php

namespace App\Enums\Skill;

use Illuminate\Support\Collection;

class LanguageLevelEnum
{
    public const A1 = 5;
    public const A2 = 6;
    public const B1 = 7;
    public const B2 = 8;
    public const C1 = 9;
    public const C2 = 10;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::A1 => __('generated.language_a1'),
            self::A2 => __('generated.language_a2'),
            self::B1 => __('generated.language_b1'),
            self::B2 => __('generated.language_b2'),
            self::C1 => __('generated.language_c1'),
            self::C2 => __('generated.language_c2'),
        ]);
    }

    public static function getAbbrAll(): Collection
    {
        return Collection::make([
            self::A1 => 'A1',
            self::A2 => 'A2',
            self::B1 => 'B1',
            self::B2 => 'B2',
            self::C1 => 'C1',
            self::C2 => 'C2',
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key === null || $key === '') {
            return null;
        }
        $values = self::getAll();
        return $values->get($key);
    }

    public static function getAbbrValue($key): ?string
    {
        if ($key === null || $key === '') {
            return null;
        }
        $values = self::getAbbrAll();
        return $values->get($key);
    }
}
