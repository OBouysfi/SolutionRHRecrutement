<?php

namespace App\Enums\Event;

use Illuminate\Support\Collection;

class StartDateEventEnum
{
    public const ALL = 1;
    public const WEEK = 2;
    public const TODAY = 3;
    public const MONTH = 4;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::ALL   => __('generated.all'),
            self::WEEK  => __('generated.this_week'),
            self::TODAY => __('generated.today'),
            self::MONTH => __('generated.this_month'),
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