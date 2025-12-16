<?php

namespace App\Observers;

use App\Models\Profile;
use App\Models\JobOffer;
use App\Services\MatchingService;

class ProfileObserver
{
    public function created(Profile $profile)
    {
        $this->recalculate($profile);
    }

    public function updated(Profile $profile)
    {
        $this->recalculate($profile);
    }

    public function recalculate(Profile $profile)
    {
        $offers = JobOffer::all();

        $service = new MatchingService();
        foreach ($offers as $offer) {
            $service->matchProfileToJobOffer($profile, $offer);
        }
    }
}
