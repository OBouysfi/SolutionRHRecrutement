<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingApplicationSkill extends Model
{
    protected $table = 'tracking_applications_skills';

    protected $fillable = [
        'tracking_application_id',
        'skill_id',
        'level',
    ];

    public function trackingApplication()
    {
        return $this->belongsTo(TrackingApplication::class, 'tracking_application_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
