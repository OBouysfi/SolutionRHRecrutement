<?php


namespace App\Observers;

use App\Models\JobOffer;
use App\Models\ActivityLog;

class ActivityLogJobOfferObserver
{
    public function created(JobOffer $jobOffer)
    {
        ActivityLog::create([
            'log_type' => 'job_offer',
            'action' => 'created',
            'user_id' => auth()->id(),
            'job_offer_id' => $jobOffer->id,
            'profile_id'=> $jobOffer->profile_id,
            'job_offer_modified_date' => now(),
        ]);
    }

    public function updated(JobOffer $jobOffer)
    {
        ActivityLog::create([
            'log_type' => 'job_offer',
            'action' => 'updated',
            'user_id' => auth()->id(),
            'job_offer_id' => $jobOffer->id,
            'profile_id' => $jobOffer->profile_id,
            'job_offer_modified_date' => now(),
            'details' => json_encode([
                'old_title' => $jobOffer->getOriginal('title'),
                'new_title' => $jobOffer->title,
            ]),
        ]);
    }

    public function deleted(JobOffer $jobOffer)
    {
        ActivityLog::create([
            'log_type' => 'job_offer',
            'action' => 'deleted',
            'user_id' => auth()->id(),
            'job_offer_id' => $jobOffer->id,
            'profile_id' => $jobOffer->profile_id,
            'job_offer_modified_date' => now(),
        ]);
    }
}