<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferSkill extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "job_offers_skills";

    protected $fillable = [
        'job_offer_id',
        'skill_id',
        'level',
        'weight',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }
}
