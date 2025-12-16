<?php

namespace App\Enums\Skill;

use Illuminate\Support\Collection;

class LevelSkillEnum
{
    public const BEGINNER = 1;
    public const INTERMEDIATE = 2;
    public const ADVANCE = 3;
    public const EXPERT = 4;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::BEGINNER     => __('generated.skill_beginner'),
            self::INTERMEDIATE => __('generated.skill_intermediate'),
            self::ADVANCE      => __('generated.skill_advance'),
            self::EXPERT       => __('generated.skill_expert'),
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