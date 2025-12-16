<?php

namespace App\Observers;

use App\Models\Profile;
use App\Models\JobOffer;
use App\Services\MatchingService;

class JobOfferObserver
{
    public function created(JobOffer $offer)
    {
        $this->recalculate($offer);
    }

    public function updated(JobOffer $offer)
    {
        $this->recalculate($offer);
    }

    protected function recalculate(JobOffer $offer)
    {
        $profiles = Profile::all();

        $service = new MatchingService();
        foreach ($profiles as $profile) {
            $service->matchProfileToJobOffer($profile, $offer);
        }
    }
}
