<?php

namespace App\Enums\QuizQuestion;

use Illuminate\Support\Collection;

class SupportTypeQuizQuestionEnum
{
    public const IMAGE = 1;
    public const VIDEO = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::IMAGE => __('generated.support_image'),
            self::VIDEO => __('generated.support_video'),
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