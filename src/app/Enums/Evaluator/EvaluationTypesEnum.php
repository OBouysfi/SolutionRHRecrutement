<?php

namespace App\Enums\Evaluator;

use Illuminate\Support\Collection;

class EvaluationTypesEnum
{
    public const TECHS_KILLS = 'Compétences techniques';
    public const PERSO_SKILLS = 'Compétences personnelles';
    public const ADAPTABILITY = 'Adaptabilité';
    public const LEADERSHIP = 'Leadership';
    public const PROBLEM_RESOLUTION = 'Résolution de problèmes';
    public const COMMUNICATION = 'Communication';
    public const INNOVATION = 'Innovation'; 
    public const MOTIVATION = 'Motivation'; 
    public const PERSONNEL_REERENCE = 'Référence professionnelle'; 

    public static function getAll(): Collection
    {
        return Collection::make([
            self::TECHS_KILLS         => __('generated.tech_skills'),
            self::PERSO_SKILLS        => __('generated.perso_skills'),
            self::ADAPTABILITY        => __('generated.adaptability'),
            self::LEADERSHIP          => __('generated.leadership'),
            self::PROBLEM_RESOLUTION  => __('generated.problem_resolution'),
            self::COMMUNICATION       => __('generated.communication'),
            self::INNOVATION          => __('generated.innovation'),
            self::MOTIVATION          => __('generated.motivation'),
            self::PERSONNEL_REERENCE  => __('generated.personnel_reference'),
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

    public static function getKey($value): ?string
    {
        if ($value == null || $value == '') {
            return null;
        }
    
        $values = self::getAll();
    
        $key = $values->search($value);
        
        return $key !== false ? $key : null;
    }
}
