<?php

namespace App\Enums\JobOffer;

use Illuminate\Support\Collection;

class CriteriaJobOfferEnum
{
    public const PARENT_SKILLS = 'skills';
    public const PARENT_GENERAL = 'general';
    public const PARENT_NATURE_WORK = 'nature_work';
    public const PARENT_LEVEL_FORMATION = 'level_formation';
    public const PARENT_LEVEL_EXPERIENCE = 'level_experience';

    public const POSITION = 1;
    public const SKILLS_TECHNICAL = 2;
    public const SKILLS_PERSONAL = 3;
    public const SKILLS_LANGUAGE = 4;

    public const REGION = 5;
    public const CONTRACT_TYPE = 6;
    public const AVAILABILITY_IMMEDIATE = 7;
    public const SALARY_EXPECTATION = 8;
    public const MONTHLY_REMUNERATION = 9;

    public const MOBILITY = 10;
    public const WORK_MODE = 11;
    public const ENGAGEMENT_TYPE = 12;
    public const DRIVING_LICENSE = 13;
    public const VEHICLE = 14;

    public const LEVEL_FORMATION_LESS_THAN_YEARS_3 = 15;
    public const LEVEL_FORMATION_BETWEEN_3_AND_YEARS_5 = 16;
    public const LEVEL_FORMATION_BETWEEN_5_AND_YEARS_10 = 17;
    public const LEVEL_FORMATION_GREATER_THAN_YEARS_10 = 18;

    public const LEVEL_EXPERIENCE_LESS_THAN_YEARS_2 = 19;
    public const LEVEL_EXPERIENCE_BETWEEN_2_AND_YEARS_5 = 20;
    public const LEVEL_EXPERIENCE_YEARS_2 = 21;
    public const LEVEL_EXPERIENCE_YEARS_3 = 22;
    public const LEVEL_EXPERIENCE_YEARS_4 = 23;
    public const LEVEL_EXPERIENCE_YEARS_5 = 24;
    public const LEVEL_EXPERIENCE_YEARS_6 = 25;
    public const LEVEL_EXPERIENCE_YEARS_7 = 26;
    public const LEVEL_EXPERIENCE_YEARS_8 = 27;
    public const LEVEL_EXPERIENCE_YEARS_9 = 28;
    public const LEVEL_EXPERIENCE_YEARS_10 = 29;
    public const LEVEL_EXPERIENCE_YEARS_11 = 30;
    public const LEVEL_EXPERIENCE_YEARS_12 = 31;
    public const LEVEL_EXPERIENCE_YEARS_13 = 32;
    public const LEVEL_EXPERIENCE_YEARS_14 = 33;
    public const LEVEL_EXPERIENCE_YEARS_15 = 34;
    public const LEVEL_EXPERIENCE_YEARS_16 = 35;
    public const LEVEL_EXPERIENCE_YEARS_17 = 36;
    public const LEVEL_EXPERIENCE_YEARS_18 = 37;
    public const LEVEL_EXPERIENCE_YEARS_19 = 38;
    public const LEVEL_EXPERIENCE_YEARS_20 = 39;
    public const LEVEL_EXPERIENCE_GREATER_THAN_YEARS_20 = 40;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::SKILLS_TECHNICAL => __('generated.skills_technical'),
            self::SKILLS_PERSONAL => __('generated.skills_personal'),
            self::SKILLS_LANGUAGE => __('generated.skills_language'),

            self::POSITION => __('generated.position'),
            self::REGION => __('generated.region'),
            self::CONTRACT_TYPE => __('generated.contract_type'),
            self::AVAILABILITY_IMMEDIATE => __('generated.availability_immediate'),
            self::SALARY_EXPECTATION => __('generated.salary_expectation'),
            self::MONTHLY_REMUNERATION => __('generated.monthly_remuneration'),

            self::MOBILITY => __('generated.mobility'),
            self::WORK_MODE => __('generated.work_mode'),
            self::ENGAGEMENT_TYPE => __('generated.engagement_type'),
            self::DRIVING_LICENSE => __('generated.driving_license'),
            self::VEHICLE => __('generated.vehicle'),

            self::LEVEL_FORMATION_LESS_THAN_YEARS_3 => __('generated.level_formation_less_than_3'),
            self::LEVEL_FORMATION_BETWEEN_3_AND_YEARS_5 => __('generated.level_formation_3_5'),
            self::LEVEL_FORMATION_BETWEEN_5_AND_YEARS_10 => __('generated.level_formation_5_10'),
            self::LEVEL_FORMATION_GREATER_THAN_YEARS_10 => __('generated.level_formation_greater_10'),

            self::LEVEL_EXPERIENCE_LESS_THAN_YEARS_2 => __('generated.level_experience_less_than_2'),
            self::LEVEL_EXPERIENCE_BETWEEN_2_AND_YEARS_5 => __('generated.level_experience_2_5'),
            self::LEVEL_EXPERIENCE_YEARS_2 => __('generated.level_experience_2'),
            self::LEVEL_EXPERIENCE_YEARS_3 => __('generated.level_experience_3'),
            self::LEVEL_EXPERIENCE_YEARS_4 => __('generated.level_experience_4'),
            self::LEVEL_EXPERIENCE_YEARS_5 => __('generated.level_experience_5'),
            self::LEVEL_EXPERIENCE_YEARS_6 => __('generated.level_experience_6'),
            self::LEVEL_EXPERIENCE_YEARS_7 => __('generated.level_experience_7'),
            self::LEVEL_EXPERIENCE_YEARS_8 => __('generated.level_experience_8'),
            self::LEVEL_EXPERIENCE_YEARS_9 => __('generated.level_experience_9'),
            self::LEVEL_EXPERIENCE_YEARS_10 => __('generated.level_experience_10'),
            self::LEVEL_EXPERIENCE_YEARS_11 => __('generated.level_experience_11'),
            self::LEVEL_EXPERIENCE_YEARS_12 => __('generated.level_experience_12'),
            self::LEVEL_EXPERIENCE_YEARS_13 => __('generated.level_experience_13'),
            self::LEVEL_EXPERIENCE_YEARS_14 => __('generated.level_experience_14'),
            self::LEVEL_EXPERIENCE_YEARS_15 => __('generated.level_experience_15'),
            self::LEVEL_EXPERIENCE_YEARS_16 => __('generated.level_experience_16'),
            self::LEVEL_EXPERIENCE_YEARS_17 => __('generated.level_experience_17'),
            self::LEVEL_EXPERIENCE_YEARS_18 => __('generated.level_experience_18'),
            self::LEVEL_EXPERIENCE_YEARS_19 => __('generated.level_experience_19'),
            self::LEVEL_EXPERIENCE_YEARS_20 => __('generated.level_experience_20'),
            self::LEVEL_EXPERIENCE_GREATER_THAN_YEARS_20 => __('generated.level_experience_greater_20'),
        ]);
    }

    public static function getParents(): Collection
    {
        return Collection::make([
            self::PARENT_SKILLS => __('generated.parent_skills'),
            self::PARENT_GENERAL => __('generated.parent_general'),
            self::PARENT_NATURE_WORK => __('generated.parent_nature_work'),
            self::PARENT_LEVEL_FORMATION => __('generated.parent_level_formation'),
            self::PARENT_LEVEL_EXPERIENCE => __('generated.parent_level_experience'),
        ]);
    }

    public static function getAllGrouped(): Collection
    {
        $parents = self::getParents();
        return Collection::make([
            $parents[self::PARENT_SKILLS] => [
                self::SKILLS_TECHNICAL => __('generated.skills_technical'),
                self::SKILLS_PERSONAL => __('generated.skills_personal'),
                self::SKILLS_LANGUAGE => __('generated.skills_language'),
            ],
            $parents[self::PARENT_GENERAL] => [
                self::POSITION => __('generated.position'),
                self::REGION => __('generated.region'),
                self::CONTRACT_TYPE => __('generated.contract_type'),
                self::AVAILABILITY_IMMEDIATE => __('generated.availability_immediate'),
                self::SALARY_EXPECTATION => __('generated.salary_expectation'),
                self::MONTHLY_REMUNERATION => __('generated.monthly_remuneration'),
            ],
            $parents[self::PARENT_NATURE_WORK] => [
                self::MOBILITY => __('generated.mobility'),
                self::WORK_MODE => __('generated.work_mode'),
                self::ENGAGEMENT_TYPE => __('generated.engagement_type'),
                self::DRIVING_LICENSE => __('generated.driving_license'),
                self::VEHICLE => __('generated.vehicle'),
            ],
            $parents[self::PARENT_LEVEL_FORMATION] => [
                self::LEVEL_FORMATION_LESS_THAN_YEARS_3 => __('generated.level_formation_less_than_3'),
                self::LEVEL_FORMATION_BETWEEN_3_AND_YEARS_5 => __('generated.level_formation_3_5'),
                self::LEVEL_FORMATION_BETWEEN_5_AND_YEARS_10 => __('generated.level_formation_5_10'),
                self::LEVEL_FORMATION_GREATER_THAN_YEARS_10 => __('generated.level_formation_greater_10'),
            ],
            $parents[self::PARENT_LEVEL_EXPERIENCE] => [
                self::LEVEL_EXPERIENCE_LESS_THAN_YEARS_2 => __('generated.level_experience_less_than_2'),
                self::LEVEL_EXPERIENCE_BETWEEN_2_AND_YEARS_5 => __('generated.level_experience_2_5'),
                self::LEVEL_EXPERIENCE_YEARS_2 => __('generated.level_experience_2'),
                self::LEVEL_EXPERIENCE_YEARS_3 => __('generated.level_experience_3'),
                self::LEVEL_EXPERIENCE_YEARS_4 => __('generated.level_experience_4'),
                self::LEVEL_EXPERIENCE_YEARS_5 => __('generated.level_experience_5'),
                self::LEVEL_EXPERIENCE_YEARS_6 => __('generated.level_experience_6'),
                self::LEVEL_EXPERIENCE_YEARS_7 => __('generated.level_experience_7'),
                self::LEVEL_EXPERIENCE_YEARS_8 => __('generated.level_experience_8'),
                self::LEVEL_EXPERIENCE_YEARS_9 => __('generated.level_experience_9'),
                self::LEVEL_EXPERIENCE_YEARS_10 => __('generated.level_experience_10'),
                self::LEVEL_EXPERIENCE_YEARS_11 => __('generated.level_experience_11'),
                self::LEVEL_EXPERIENCE_YEARS_12 => __('generated.level_experience_12'),
                self::LEVEL_EXPERIENCE_YEARS_13 => __('generated.level_experience_13'),
                self::LEVEL_EXPERIENCE_YEARS_14 => __('generated.level_experience_14'),
                self::LEVEL_EXPERIENCE_YEARS_15 => __('generated.level_experience_15'),
                self::LEVEL_EXPERIENCE_YEARS_16 => __('generated.level_experience_16'),
                self::LEVEL_EXPERIENCE_YEARS_17 => __('generated.level_experience_17'),
                self::LEVEL_EXPERIENCE_YEARS_18 => __('generated.level_experience_18'),
                self::LEVEL_EXPERIENCE_YEARS_19 => __('generated.level_experience_19'),
                self::LEVEL_EXPERIENCE_YEARS_20 => __('generated.level_experience_20'),
                self::LEVEL_EXPERIENCE_GREATER_THAN_YEARS_20 => __('generated.level_experience_greater_20'),
            ],
        ]);
    }

    public static function getParentSkills(): Collection
    {
        return Collection::make([
            self::SKILLS_TECHNICAL => __('generated.skills_technical'),
            self::SKILLS_PERSONAL => __('generated.skills_personal'),
            self::SKILLS_LANGUAGE => __('generated.skills_language'),
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

    public static function getParentValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getParents();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }

    public static function getChildByParent($key): ?Collection
    {
        $parentValue = self::getParentValue($key);
        $values = self::getAllGrouped()->get($parentValue);
        return Collection::make($values);
    }

    /**
     * @param $key
     * @return int|array
     */
    public static function getNumberYearsOfFormationByKey($key)
    {
        if (!self::getAll()->keys()->has($key)) {
            return 0;
        }
        $data = [
            self::LEVEL_FORMATION_LESS_THAN_YEARS_3 => 2,
            self::LEVEL_FORMATION_BETWEEN_3_AND_YEARS_5 => [3, 5],
            self::LEVEL_FORMATION_BETWEEN_5_AND_YEARS_10 => [5, 10],
            self::LEVEL_FORMATION_GREATER_THAN_YEARS_10 => 10,
        ];
        return $data[$key];
    }

    /**
     * @param $key
     * @return int|array
     */
    public static function getNumberYearsOfExperienceByKey($key)
    {
        if (!self::getAll()->keys()->has($key)) {
            return 0;
        }
        $data = [
            self::LEVEL_EXPERIENCE_LESS_THAN_YEARS_2 => 2,
            self::LEVEL_EXPERIENCE_BETWEEN_2_AND_YEARS_5 => [2, 5],
            self::LEVEL_EXPERIENCE_YEARS_2 => 2,
            self::LEVEL_EXPERIENCE_YEARS_3 => 3,
            self::LEVEL_EXPERIENCE_YEARS_4 => 4,
            self::LEVEL_EXPERIENCE_YEARS_5 => 5,
            self::LEVEL_EXPERIENCE_YEARS_6 => 6,
            self::LEVEL_EXPERIENCE_YEARS_7 => 7,
            self::LEVEL_EXPERIENCE_YEARS_8 => 8,
            self::LEVEL_EXPERIENCE_YEARS_9 => 9,
            self::LEVEL_EXPERIENCE_YEARS_10 => 10,
            self::LEVEL_EXPERIENCE_YEARS_11 => 11,
            self::LEVEL_EXPERIENCE_YEARS_12 => 12,
            self::LEVEL_EXPERIENCE_YEARS_13 => 13,
            self::LEVEL_EXPERIENCE_YEARS_14 => 14,
            self::LEVEL_EXPERIENCE_YEARS_15 => 15,
            self::LEVEL_EXPERIENCE_YEARS_16 => 16,
            self::LEVEL_EXPERIENCE_YEARS_17 => 17,
            self::LEVEL_EXPERIENCE_YEARS_18 => 18,
            self::LEVEL_EXPERIENCE_YEARS_19 => 19,
            self::LEVEL_EXPERIENCE_YEARS_20 => 20,
            self::LEVEL_EXPERIENCE_GREATER_THAN_YEARS_20 => 20,
        ];
        return $data[$key];
    }
}