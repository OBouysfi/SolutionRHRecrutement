<?php

namespace App\Enums\Event;

use Illuminate\Support\Collection;

class ReminderBeforeEventEnum
{
    public const FIVE_MINUTES = 1;
    public const FIFTEEN_MINUTES = 2;
    public const THIRTY_MINUTES = 3;
    public const ONE_HOUR = 4;
    public const TWO_HOURS = 5;
    public const TWELVE_HOURS = 6;
    public const ONE_DAY = 7;
    public const ONE_WEEK = 8;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::FIVE_MINUTES    => __('generated.5_minutes_before'),
            self::FIFTEEN_MINUTES => __('generated.15_minutes_before'),
            self::THIRTY_MINUTES  => __('generated.30_minutes_before'),
            self::ONE_HOUR        => __('generated.1_hour_before'),
            self::TWO_HOURS       => __('generated.2_hours_before'),
            self::TWELVE_HOURS    => __('generated.12_hours_before'),
            self::ONE_DAY         => __('generated.1_day_before'),
            self::ONE_WEEK        => __('generated.1_week_before'),
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $data = self::getAll();
        if (!$data->has($key)) {
            return null;
        }
        return $data->get($key);
    }
}