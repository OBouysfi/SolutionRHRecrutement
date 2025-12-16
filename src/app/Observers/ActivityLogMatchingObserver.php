<?php

namespace App\Observers;

use App\Models\Matching;
use App\Models\ActivityLog;

class ActivityLogMatchingObserver
{
    public function created(Matching $matching)
    {
        ActivityLog::create([
            'log_type' => 'match',
            'action' => 'created',
            'user_id' => auth()->id(),
            'match_id' => $matching->id,
            'profile_id' => $matching->profile_id,
            'job_offer_id' => $matching->job_offer_id,
            'match_date' => now(),
        ]);
    }

    public function updated(Matching $matching)
    {
        ActivityLog::create([
            'log_type' => 'match',
            'action' => 'updated',
            'user_id' => auth()->id(),
            'match_id' => $matching->id,
            'profile_id' => $matching->profile_id,
            'job_offer_id' => $matching->job_offer_id,
            'match_date' => now(),
            'details' => json_encode([
                'old_ratio' => $matching->getOriginal('ratio'),
                'new_ratio' => $matching->ratio,
            ]),
        ]);
    }

    // public function deleted(Matching $matching)
    // {
    //     ActivityLog::create([
    //         'log_type' => 'match',
    //         'action' => 'deleted',
    //         'user_id' => auth()->id(),
    //         'match_id' => $matching->id,
    //         'profile_id' => $matching->profile_id,
    //         'job_offer_id' => $matching->job_offer_id,
    //         'match_date' => now(),
    //     ]);
    // }
}