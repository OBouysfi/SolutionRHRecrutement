<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "skill_types";

    public const PARENT_IDS = [
        'technical' => 1,
        'personal' => 2,
        'linguistic' => 3,
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class, 'skill_type_id');
    }


    // public function getAllSkills()
    // {
    //     $skills = $this->skills;

    //     foreach ($this->childSkillTypes as $childType) {
    //         $skills = $skills->merge($childType->getAllSkills());
    //     }

    //     return $skills;
    // }

}
