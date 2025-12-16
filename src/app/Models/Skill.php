<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = "skills";

    public function jobOfferSkills()
    {
        return $this->hasMany(JobOfferSkill::class);
    }

    public function skillType()
    {
        return $this->belongsTo(SkillType::class, 'skill_type_id');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profiles_skills', 'skill_id', 'profile_id');
    }

}
