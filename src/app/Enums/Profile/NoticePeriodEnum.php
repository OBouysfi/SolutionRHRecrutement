<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class NoticePeriodEnum
{
    // public const NO_NOTICE = 0;
    public const ONE_DAY = 1;
    public const TWO_DAYS = 2;
    public const THREE_DAYS = 3;
    public const ONE_WEEK = 4;
    public const TWO_WEEKS = 5;
    public const THREE_WEEKS = 6;
    public const ONE_MONTH = 7;
    public const TWO_MONTHS = 8;
    public const THREE_MONTHS = 9;
    // public const OTHER = 10;

    public static function getAll(): Collection
    {
        return Collection::make([
            // self::NO_NOTICE    => __('generated.no_notice'),
            self::ONE_DAY      => __('generated.one_day'),
            self::TWO_DAYS     => __('generated.two_days'),
            self::THREE_DAYS   => __('generated.three_days'),
            self::ONE_WEEK     => __('generated.one_week'),
            self::TWO_WEEKS    => __('generated.two_weeks'),
            self::THREE_WEEKS  => __('generated.three_weeks'),
            self::ONE_MONTH    => __('generated.one_month'),
            self::TWO_MONTHS   => __('generated.two_months'),
            self::THREE_MONTHS => __('generated.three_months'),
            // self::OTHER        => __('generated.other_notice'),
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key === null || $key === '') {
            return null;
        }
        $values = self::getAll();
        return $values->get($key, null);
    }

    public static function getLabel(int $noticePeriodId): string
    {
        return self::getAll()->get($noticePeriodId, 'Inconnu');
    }
}