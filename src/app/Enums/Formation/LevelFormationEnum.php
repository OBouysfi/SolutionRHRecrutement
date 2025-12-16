<?php

namespace App\Enums\Formation;

use Illuminate\Support\Collection;

class LevelFormationEnum
{
    public const LESS_THAN_YEARS_3 = 1;
    public const BETWEEN_3_AND_YEARS_5 = 2;
    public const BETWEEN_5_AND_YEARS_10 = 3;
    public const GREATER_THAN_YEARS_10 = 4;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::LESS_THAN_YEARS_3      => __('generated.less_than_3_years'),
            self::BETWEEN_3_AND_YEARS_5  => __('generated.between_3_and_5_years'),
            self::BETWEEN_5_AND_YEARS_10 => __('generated.between_5_and_10_years'),
            self::GREATER_THAN_YEARS_10  => __('generated.greater_than_10_years'),
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
            self::LESS_THAN_YEARS_3 => 3,
            self::BETWEEN_3_AND_YEARS_5 => [3, 5],
            self::BETWEEN_5_AND_YEARS_10 => [5, 10],
            self::GREATER_THAN_YEARS_10 => 10,
        ];
        return $data[$key];
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