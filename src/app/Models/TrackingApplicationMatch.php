<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingApplicationMatch extends Model
{
    protected $table = 'tracking_applications_matches';

    protected $fillable = [
        'job_offer_id',
        'profile_id',
        'sum_weight_job_offer_skills',
        'sum_ratio_profile_skill',
        'sum_ratio_profile_skill_x_weight_criteria',
        'ratio',
    ];

    /**
     * Relation vers le modèle JobOffer.
     */
    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class, 'job_offer_id');
    }

    /**
     * Relation vers le modèle Profile.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
