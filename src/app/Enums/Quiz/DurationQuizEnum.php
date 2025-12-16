<?php

namespace App\Enums\Quiz;

use Illuminate\Support\Collection;

class DurationQuizEnum
{
    public const MIN_10 = 1;
    public const MIN_20 = 2;
    public const MIN_30 = 3;
    public const MIN_60 = 4;
    public const MIN_120 = 5;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::MIN_10   => __('generated.duration_10_min'),
            self::MIN_20   => __('generated.duration_20_min'),
            self::MIN_30   => __('generated.duration_30_min'),
            self::MIN_60   => __('generated.duration_1h'),
            self::MIN_120  => __('generated.duration_2h'),
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