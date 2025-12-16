<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class GenderProfileEnum
{
    public const MR = 1;
    public const LADY = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::MR   => __('generated.mr'),
            self::LADY => __('generated.lady'),
        ]);
    }
}