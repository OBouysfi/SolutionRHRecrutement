<?php

namespace App\Observers;

use App\Models\JobOffer;
use App\Models\MobilityOption;
use App\Models\Profile;
use App\Models\ProfileSkill;
use App\Services\MatchingService;

class ProfileMobilityObserver
{
    public function created(MobilityOption $profileMobility)
    {
        $this->recalculateMatching($profileMobility);
    }

    public function updated(MobilityOption $profileMobility)
    {
        $this->recalculateMatching($profileMobility);
    }

    protected function recalculateMatching(MobilityOption $profileMobility)
    {
        $profile = Profile::find($profileMobility->profile_id);
        if ($profile) {
            $offers = JobOffer::all();

            $service = new MatchingService();
            foreach ($offers as $offer) {
                $service->matchProfileToJobOffer($profile, $offer);
            }
        }
    }

}
