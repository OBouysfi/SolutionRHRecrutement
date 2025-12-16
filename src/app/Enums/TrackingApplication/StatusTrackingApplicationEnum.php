<?php

namespace App\Enums\TrackingApplication;

use Illuminate\Support\Collection;

class StatusTrackingApplicationEnum
{
    public const SHORTLIST = 1;
    public const EVALUATION = 2;
    public const INTERVIEW = 3;
    public const RETAINED = 4;
    public const HIRING = 5;
    public const DISCARDED = 6;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::SHORTLIST  => __('generated.status_shortlist'),
            self::EVALUATION => __('generated.status_evaluation'),
            self::INTERVIEW  => __('generated.status_interview'),
            self::RETAINED   => __('generated.status_retained'),
            self::HIRING     => __('generated.status_hiring'),
            self::DISCARDED  => __('generated.status_discarded'),
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

    public static function getStatusLabel(int $statusId): string
    {
        return self::getAll()->get($statusId, 'Inconnu');
    }
}