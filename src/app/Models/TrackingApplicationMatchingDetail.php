<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingApplicationMatchingDetail extends Model
{
    protected $table = 'tracking_applications_matching_details';

    protected $fillable = [
        'job_offer_id',
        'profile_id',
        'skill_id',
        'ratio_profile_skill',
        'ratio_profile_skill_x_weight_criteria',
    ];

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class, 'job_offer_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
