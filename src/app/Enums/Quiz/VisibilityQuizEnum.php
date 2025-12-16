<?php

namespace App\Enums\Quiz;

use Illuminate\Support\Collection;

class VisibilityQuizEnum
{
    public const PUBLIC = 1;
    public const PRIVATE = 2;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::PUBLIC  => __('generated.quiz_public'),
            self::PRIVATE => __('generated.quiz_private'),
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