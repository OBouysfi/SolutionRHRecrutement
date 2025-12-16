<?php

namespace App\Enums\TrackingApplication;

use Illuminate\Support\Collection;

class TypeTagTrackingApplicationEnum
{
    public const ORANGE = 'orange';
    public const GREEN = 'green';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::ORANGE => 'Orange',
            self::GREEN => 'Vert',
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