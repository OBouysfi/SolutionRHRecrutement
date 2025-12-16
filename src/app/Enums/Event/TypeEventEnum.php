<?php

namespace App\Enums\Event;

use Illuminate\Support\Collection;

class TypeEventEnum
{
    public const DEFAULT = 1;
    public const INTERVIEW = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::DEFAULT   => __('generated.default'),
            self::INTERVIEW => __('generated.interview'),
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