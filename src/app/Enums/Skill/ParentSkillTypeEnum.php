<?php 

namespace App\Enums\Skill;

use Illuminate\Support\Collection;

class ParentSkillTypeEnum
{
    public const TECHNIQUES = 1;
    public const PERSONAL = 2;
    public const LANGUAGE = 3;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::TECHNIQUES => __('generated.skill_techniques'),
            self::PERSONAL   => __('generated.skill_personal'),
            self::LANGUAGE   => __('generated.skill_language'),
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