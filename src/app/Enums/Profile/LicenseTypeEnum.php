<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class LicenseTypeEnum
{
    public const A = 'A';
    public const A1 = 'A1';
    public const AM = 'AM';
    public const B = 'B';
    public const C = 'C';
    public const D = 'D';
    public const EB = 'EB';
    public const EC = 'EC';
    public const ED = 'ED';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::A  => __('generated.permis_a'),
            self::A1 => __('generated.permis_a1'),
            self::AM => __('generated.permis_am'),
            self::B  => __('generated.permis_b'),
            self::C  => __('generated.permis_c'),
            self::D  => __('generated.permis_d'),
            self::EB => __('generated.permis_eb'),
            self::EC => __('generated.permis_ec'),
            self::ED => __('generated.permis_ed'),
        ]);
    }

    public static function getAbbrAll(): Collection
    {
        return Collection::make([
            self::A  => __('generated.permis_a'),
            self::A1 => __('generated.permis_a1'),
            self::AM => __('generated.permis_am'),
            self::B  => __('generated.permis_b'),
            self::C  => __('generated.permis_c'),
            self::D  => __('generated.permis_d'),
            self::EB => __('generated.permis_eb'),
            self::EC => __('generated.permis_ec'),
            self::ED => __('generated.permis_ed'),
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

    public static function getAbbrValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getAbbrAll();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }
}
