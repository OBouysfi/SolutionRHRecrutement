<?php

namespace App\Enums\JobPosition;

use Illuminate\Support\Collection;

class ParentJobPositionEnum
{
    public const AEROSPACE = 'Aérospatiale';
    public const ENERGY = 'Énergie';
    public const TELECOMMUNICATIONS = 'Télécommunications';
    public const TRANSPORTATION = 'Transport';
    public const IMMOBILIER = 'Immobilier';
    public const MARKETING = 'Marketing';
    public const LEGAL = 'Juridique';
    public const GOVERNMENT = 'Gouvernement';
    public const FOOD_AND_BEVERAGE = 'Alimentation';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::AEROSPACE           => __('generated.aerospace'),
            self::ENERGY              => __('generated.energy'),
            self::TELECOMMUNICATIONS  => __('generated.telecommunications'),
            self::TRANSPORTATION      => __('generated.transportation'),
            self::IMMOBILIER          => __('generated.immobilier'),
            self::MARKETING           => __('generated.marketing'),
            self::LEGAL               => __('generated.legal'),
            self::GOVERNMENT          => __('generated.government'),
            self::FOOD_AND_BEVERAGE   => __('generated.food_and_beverage'),
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