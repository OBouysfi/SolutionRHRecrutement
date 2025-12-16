<?php

namespace App\Enums\DrivingLicense;

use Illuminate\Support\Collection;

class TypeDrivingLicenseEnum
{
    public const A1 = 1;
    public const A = 2;
    public const B = 3;
    public const C = 4;
    public const D = 5;
    public const EB = 6;
    public const EC = 7;
    public const ED = 8;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::A1 => 'A1',
            self::A => 'A',
            self::B => 'B',
            self::C => 'C',
            self::D => 'D',
            self::EB => 'EB',
            self::EC => 'EC',
            self::ED => 'ED',
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        if (!self::getAll()->has($key)) {
            return null;
        }
        return self::getAll()->get($key);
    }
}