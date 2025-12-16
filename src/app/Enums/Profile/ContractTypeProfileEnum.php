<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class ContractTypeProfileEnum
{
    public const ANAPEC = 1;
    public const CTI = 2;
    public const CTP = 3;
    public const CDD = 4;
    public const CDI = 5;
    public const CTE = 6;
    public const CTA = 7;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::ANAPEC => __('generated.contract_anapec'),
            self::CTI    => __('generated.contract_cti'),
            self::CTP    => __('generated.contract_ctp'),
            self::CDD    => __('generated.contract_cdd'),
            self::CDI    => __('generated.contract_cdi'),
            self::CTE    => __('generated.contract_cte'),
            self::CTA    => __('generated.contract_cta'),
        ]);
    }

    public static function getAbbrAll(): Collection
    {
        return Collection::make([
            self::ANAPEC => __('generated.abbr_anapec'),
            self::CTI    => __('generated.abbr_cti'),
            self::CTP    => __('generated.abbr_ctp'),
            self::CDD    => __('generated.abbr_cdd'),
            self::CDI    => __('generated.abbr_cdi'),
            self::CTE    => __('generated.abbr_cte'),
            self::CTA    => __('generated.abbr_cta'),
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