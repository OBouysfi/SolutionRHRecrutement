<?php

namespace App\Enums\Client;

use Illuminate\Support\Collection;

class JuridicalFormEnum
{
    public const SARL = 1;
    public const SARLAU = 2;
    public const SA = 3;
    public const SNC = 4;
    public const SCS = 5;
    public const SEP = 6;
    public const EI = 7; 
    public const COOP = 8; 
    public const GIE = 9; 
    public const FOND = 10; 
    public const ASSOCI = 11; 
    public const PP = 12; 
    public const SYNDIC = 13; 

    public static function getAll(): Collection
    {
        return Collection::make([
            self::SARL    => __('generated.sarl'),
            self::SARLAU  => __('generated.sarlau'),
            self::SA      => __('generated.sa'),
            self::SNC     => __('generated.snc'),
            self::SCS     => __('generated.scs'),
            self::SEP     => __('generated.sep'),
            self::EI      => __('generated.ei'),
            self::COOP    => __('generated.coop'),
            self::GIE     => __('generated.gie'),
            self::FOND    => __('generated.fond'),
            self::ASSOCI  => __('generated.associ'),
            self::PP      => __('generated.pp'),
            self::SYNDIC  => __('generated.syndic'),
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

    public static function getKey($value): ?string
    {
        if ($value == null || $value == '') {
            return null;
        }
    
        $values = self::getAll();
    
        $key = $values->search($value);
        
        return $key !== false ? $key : null;
    }
}
