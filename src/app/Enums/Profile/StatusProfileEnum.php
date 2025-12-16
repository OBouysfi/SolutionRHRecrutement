<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class StatusProfileEnum
{
    public const DISABLED = 1;
    public const ENABLED = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::DISABLED => __('generated.disabled'),
            self::ENABLED  => __('generated.enabled'),
        ]);
    }
}