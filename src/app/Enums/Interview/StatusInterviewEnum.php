<?php

namespace App\Enums\Interview;

use Illuminate\Support\Collection;

class StatusInterviewEnum
{
    public const OPENED = 1;
    public const CLOSED = 2;
    public const EXPIRED = 3;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::OPENED  => __('generated.opened'),
            self::CLOSED  => __('generated.closed'),
            self::EXPIRED => __('generated.expired'),
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