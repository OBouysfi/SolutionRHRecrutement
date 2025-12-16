<?php

namespace App\Enums\QuizProfile;

use Illuminate\Support\Collection;

class StatusQuizProfileEnum
{
    public const PENDING = 1;
    public const ACCOMPLISHED = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::PENDING      => __('generated.quiz_pending'),
            self::ACCOMPLISHED => __('generated.quiz_accomplished'),
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