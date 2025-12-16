<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchingDetail extends Model
{
    protected $fillable = [
        'match_id',
        'skill_id',
        'profile_score',
        'job_offer_score',
        'skill_match_score',
        'type',
        'relate_id'
    ];

    public function matching()
    {
        return $this->belongsTo(Matching::class, 'match_id');
    }

    /**
     * Relation avec la compétence.
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
