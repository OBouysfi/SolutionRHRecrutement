<?php

namespace App\Enums\RecruitmentCost;

use Illuminate\Support\Collection;

class DeviseEnum
{
    public const MAD = 1;
    public const DZD = 2;
    public const TND = 3;
    public const XOF = 4;
    public const XAF = 5;
    public const NGN = 6;
    public const ZAR = 7;
    public const KES = 8;
    public const GHS = 9;
    public const USD = 10;
    public const EUR = 11;
    public const GBP = 12;
    public const CAD = 13;
    public const CHF = 14;
    public const JPY = 15;
    public const CNY = 16;
    public const AED = 17;
    public const SAR = 18;

    public static function getAll(): Collection
    {
        return collect([
            self::MAD => ['code' => 'MAD', 'label' => __('generated.devise_mad')],
            self::DZD => ['code' => 'DZD', 'label' => __('generated.devise_dzd')],
            self::TND => ['code' => 'TND', 'label' => __('generated.devise_tnd')],
            self::XOF => ['code' => 'XOF', 'label' => __('generated.devise_xof')],
            self::XAF => ['code' => 'XAF', 'label' => __('generated.devise_xaf')],
            self::NGN => ['code' => 'NGN', 'label' => __('generated.devise_ngn')],
            self::ZAR => ['code' => 'ZAR', 'label' => __('generated.devise_zar')],
            self::KES => ['code' => 'KES', 'label' => __('generated.devise_kes')],
            self::GHS => ['code' => 'GHS', 'label' => __('generated.devise_ghs')],
            self::USD => ['code' => 'USD', 'label' => __('generated.devise_usd')],
            self::EUR => ['code' => 'EUR', 'label' => __('generated.devise_eur')],
            self::GBP => ['code' => 'GBP', 'label' => __('generated.devise_gbp')],
            self::CAD => ['code' => 'CAD', 'label' => __('generated.devise_cad')],
            self::CHF => ['code' => 'CHF', 'label' => __('generated.devise_chf')],
            self::JPY => ['code' => 'JPY', 'label' => __('generated.devise_jpy')],
            self::CNY => ['code' => 'CNY', 'label' => __('generated.devise_cny')],
            self::AED => ['code' => 'AED', 'label' => __('generated.devise_aed')],
            self::SAR => ['code' => 'SAR', 'label' => __('generated.devise_sar')],
        ]);
    }

    public static function getLabelByCode(string $code): ?string
    {
        $found = self::getAll()->firstWhere('code', $code);
        return $found ? $found['label'] : null;
    }

    public static function getCodeList(): array
    {
        return self::getAll()->pluck('code')->toArray();
    }
}