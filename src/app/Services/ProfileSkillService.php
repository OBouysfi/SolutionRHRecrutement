<?php

namespace App\Services;

use App\Models\ProfileSkill;
use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Http\JsonResponse;

class ProfileSkillService
{
    public function storeLanguage($profile_id, $skills): JsonResponse
    {
        foreach ($skills as $skillData) {
            if (ProfileSkill::where("skill_id", $skillData['skill'])->where("profile_id", $profile_id)->exists()) {
                continue;
            }

            ProfileSkill::updateOrCreate([
                'profile_id' => $profile_id,
                'skill_id' => $skillData['skill'],
                'weight' => $skillData['weight'],
                'level' => $skillData['level'],
            ]);
        }

        // Ensure that at least one skill was processed
        if (empty($skillData)) {
            return response()->json(['message' => __('No skills provided.')], 400);
        }

        $skill = Skill::where("id", $skillData['skill'])->with("skillType")->first();
        $language = SkillType::find($skill->skill_type_id);

        // Get languages linked to the profile
        $languages = ProfileSkill::where('profile_id', $profile_id)
            ->whereHas('skill.skillType', function ($query) {
                $query->where('parent_id', 3);
            })
            ->with('skill.skillType')
            ->get()
            ->pluck('skill.skillType')
            ->unique()
            ->values()->map(function ($skillType) {
                
                $attributes = $skillType->toArray();
                $attributes['label'] = __( $skillType->label );
                
                return $attributes;

            });


        if ($languages->isEmpty()) {
            $languages = SkillType::where("id", $skill->skill_type_id)->get();
        }

        return response()->json([
            'message' => __('Language saved successfully!'),
            'language' => $language,
            'languages' => $languages,
            'profile_id' => $profile_id
        ]);
    }
    public function updateLanguages($profile)
    {
        $skillTypeIds = ProfileSkill::where('profile_id', $profile->id)
            ->whereHas('skill')
            ->with('skill')
            ->get()
            ->pluck('skill.skill_type_id')
            ->unique();

        return SkillType::whereIn('id', $skillTypeIds)
            ->where('parent_id', 3)
            ->with(['skills' => function ($query) use ($skillTypeIds) {
                $query->whereIn('skill_type_id', $skillTypeIds);
            }])
            ->get();
    }

    public function updateSkills($profileId, $technicalSkills, $personalSkills)
    {
        $skills = [];
        // Update technical skills
        // if (is_array($technicalSkills)) {
        //     foreach ($technicalSkills as $skill) {
        //         $skillEntry = ProfileSkill::updateOrCreate(
        //             ['profile_id' => $profileId, 'skill_id' => $skill['skill']],
        //             ['level' => $skill['level'], 'weight' => $skill['weight']]
        //         );

        //         $skills[] = $skillEntry;
        //     }
        // }
        // // Update personal skills
        // if (is_array($personalSkills)) {
        //     foreach ($personalSkills as $skill) {
        //         $skillEntry = ProfileSkill::updateOrCreate(
        //             ['profile_id' => $profileId, 'skill_id' => $skill['skill']],
        //             ['level' => $skill['level'], 'weight' => $skill['weight']]
        //         );

        //         $skills[] = $skillEntry;
        //     }
        // }

        // Delete only technical skills (SkillType with parent_id = 1)
        ProfileSkill::where('profile_id', $profileId)
            ->whereHas('skill.skillType', function ($query) {
                $query->where('parent_id', 1);
            })->delete();

        // Delete only personal skills (SkillType with parent_id = 2)
        ProfileSkill::where('profile_id', $profileId)
            ->whereHas('skill.skillType', function ($query) {
                $query->where('parent_id', 2);
            })->delete();

        $skills = [];

        // Add new technical skills
        if (is_array($technicalSkills)) {
            foreach ($technicalSkills as $skill) {
                $skillEntry = ProfileSkill::create([
                    'profile_id' => $profileId,
                    'skill_id' => $skill['skill'],
                    'level' => $skill['level'],
                    'weight' => $skill['weight'],
                ]);

                $skills[] = $skillEntry;
            }
        }

        // Add new personal skills
        if (is_array($personalSkills)) {
            foreach ($personalSkills as $skill) {
                $skillEntry = ProfileSkill::create([
                    'profile_id' => $profileId,
                    'skill_id' => $skill['skill'],
                    'level' => $skill['level'],
                    'weight' => $skill['weight'],
                ]);

                $skills[] = $skillEntry;
            }
        }
            return response()->json([
                'message' => __('Skills updated successfully!'),
                'profile_id' => $profileId,
                'updated_skills' => $skills
            ], 200);
        }
    }
