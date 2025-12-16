<?php

namespace App\Enums\Quiz;

use Illuminate\Support\Collection;

class LevelQuizEnum
{
    public const EASY = 1;
    public const STANDARD = 2;
    public const HARD = 3;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::EASY     => __('generated.quiz_easy'),
            self::STANDARD => __('generated.quiz_standard'),
            self::HARD     => __('generated.quiz_hard'),
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