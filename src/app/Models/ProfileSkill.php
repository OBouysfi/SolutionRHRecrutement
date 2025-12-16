<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSkill extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = "profiles_skills";

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
