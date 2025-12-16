<?php

namespace App\Enums\JobOffer;

use Illuminate\Support\Collection;

class MatcheStatusJobOfferEnum
{
    public const IN_QUEUE = 1;
    public const IN_PROGRESS = 2;
    public const COMPLETE = 3;
    public const FAILED = 4;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::IN_QUEUE    => __('generated.in_queue'),
            self::IN_PROGRESS => __('generated.in_progress'),
            self::COMPLETE    => __('generated.complete'),
            self::FAILED      => __('generated.failed'),
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