<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class EvaluationTypeEnum
{
    public const WRITTEN_TEST = 'written_test';
    public const PRACTICAL_EVALUATION = 'practical_evaluation';
    public const PROJECT = 'project';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::WRITTEN_TEST         => __('generated.written_test'),
            self::PRACTICAL_EVALUATION => __('generated.practical_evaluation'),
            self::PROJECT              => __('generated.project'),
        ]);
    }

    public static function getValue(?string $key): ?string
    {
        if (empty($key)) {
            return null;
        }

        return self::getAll()->get($key);
    }
}
