<?php

namespace App\Enums\Experience;

use Illuminate\Support\Collection;

class LevelExperienceEnum
{
    // public const LESS_THAN_YEARS_2 = 1;
    // public const BETWEEN_2_AND_YEARS_5 = 2;
    public const YEARS_0 = 0;
    public const YEARS_1 = 1;
    public const YEARS_2 = 2;
    public const YEARS_3 = 3;
    public const YEARS_4 = 4;
    public const YEARS_5 = 5;
    public const YEARS_6 = 6;
    public const YEARS_7 = 7;
    public const YEARS_8 = 8;
    public const YEARS_9 = 9;
    public const GREATER_THAN_YEARS_10 = 10;
    // public const YEARS_10 = 11;
    // public const YEARS_11 = 12;
    // public const YEARS_12 = 13;
    // public const YEARS_13 = 14;
    // public const YEARS_14 = 15;
    public const GREATER_THAN_YEARS_15 = 15;
    public const YEARS_15 = 15;
    public const YEARS_16 = 16;
    public const YEARS_17 = 17;
    public const YEARS_18 = 18;
    public const YEARS_19 = 19;
    public const YEARS_20 = 20;
    public const GREATER_THAN_YEARS_20 = 21;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::YEARS_0 => __('generated.years_0'),
            self::YEARS_1 => __('generated.years_1'),
            self::YEARS_2 => __('generated.years_2'),
            self::YEARS_3 => __('generated.years_3'),
            self::YEARS_4 => __('generated.years_4'),
            self::YEARS_5 => __('generated.years_5'),
            self::YEARS_6 => __('generated.years_6'),
            self::YEARS_7 => __('generated.years_7'),
            self::YEARS_8 => __('generated.years_8'),
            self::YEARS_9 => __('generated.years_9'),
            self::GREATER_THAN_YEARS_10 => __('generated.years_10'),
            self::GREATER_THAN_YEARS_15 => __('generated.years_15'),
            self::GREATER_THAN_YEARS_20 => __('generated.years_20'),
        ]);
    }

    /**
     * @param $key
     * @return int|array
     */
    public static function getNumberYearsByKey($key)
    {
        if (!self::getAll()->keys()->has($key)) {
            return 0;
        }
        $data = [
            // self::LESS_THAN_YEARS_2 => 2,
            // self::BETWEEN_2_AND_YEARS_5 => [2, 5],
            self::YEARS_0 => 0,
            self::YEARS_1 => 1,
            self::YEARS_2 => 2,
            self::YEARS_3 => 3,
            self::YEARS_4 => 4,
            self::YEARS_5 => 5,
            self::YEARS_6 => 6,
            self::YEARS_7 => 7,
            self::YEARS_8 => 8,
            self::YEARS_9 => 9,
            // self::YEARS_10 => 10,
            self::GREATER_THAN_YEARS_10 => 10,
            // self::YEARS_11 => 11,
            // self::YEARS_12 => 12,
            // self::YEARS_13 => 13,
            // self::YEARS_14 => 14,
            // self::YEARS_15 => 15,
            self::GREATER_THAN_YEARS_15 => 15,
            // self::YEARS_16 => 16,
            // self::YEARS_17 => 17,
            // self::YEARS_18 => 18,
            // self::YEARS_19 => 19,
            // self::YEARS_20 => 20,
            self::GREATER_THAN_YEARS_20 => 20,
        ];
        return $data[$key] ?? null;
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
