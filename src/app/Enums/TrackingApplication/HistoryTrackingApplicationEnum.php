<?php

namespace App\Enums\TrackingApplication;

use Illuminate\Support\Collection;

class HistoryTrackingApplicationEnum
{
    public const OLD_STATUS_ID = 'old_status_id';
    public const NEW_STATUS_ID = 'new_status_id';
    public const ADDED_SHORTLIST_AT = 'added_shortlist_at';
    public const ADDED_EVALUATION_AT = 'added_evaluation_at';
    public const ADDED_INTERVIEW_AT = 'added_interview_at';
    public const ACTION_USER_ID = 'action_user_id';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::OLD_STATUS_ID        => __('generated.old_status_id'),
            self::NEW_STATUS_ID        => __('generated.new_status_id'),
            self::ADDED_SHORTLIST_AT   => __('generated.added_shortlist_at'),
            self::ADDED_EVALUATION_AT  => __('generated.added_evaluation_at'),
            self::ADDED_INTERVIEW_AT   => __('generated.added_interview_at'),
            self::ACTION_USER_ID       => __('generated.action_user_id'),
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