<?php

namespace App\Enums\JobOffer;

use Illuminate\Support\Collection;

class StatusJobOfferEnum
{
    public const DRAFT = 1;
    public const NOT_STARTED = 2;
    public const IN_PROGRESS = 3;
    public const CLOSED = 4;
    public const SUSPENDED = 5;
    public const REOPENED = 6;
    public const CANCELLED = 7;
    public const REACTIVATED = 8;


    public static function getAll(): Collection
    {
        return Collection::make([
            self::DRAFT       => __('generated.draft'),
            self::NOT_STARTED => __('generated.not_started'),
            self::IN_PROGRESS => __('generated.in_progress'),
            self::CLOSED      => __('generated.closed'),
            self::SUSPENDED   => __('generated.suspended'),
            self::REOPENED    => __('generated.reopened'),
            self::CANCELLED   => __('generated.cancelled'),
            self::REACTIVATED => __('generated.reactivated'),
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

    public static function getStatusName(): Collection
    {
        return Collection::make([
            self::DRAFT       => __('generated.draft'),
            self::NOT_STARTED => __('generated.not_started_full'),
            self::IN_PROGRESS => __('generated.in_progress'),
            self::CLOSED      => __('generated.closed_full'),
            self::SUSPENDED   => __('generated.suspended_full'),
            self::REOPENED    => __('generated.reopened_full'),
            self::CANCELLED   => __('generated.cancelled_full'),
            self::REACTIVATED => __('generated.reactivated_full'),
        ]);
    }

    public static function getStatusNameValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getStatusName();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }
}
