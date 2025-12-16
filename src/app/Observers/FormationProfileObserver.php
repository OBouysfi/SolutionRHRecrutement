<?php

namespace App\Observers;

use App\Models\Formation;
use App\Models\JobOffer;
use App\Models\MobilityOption;
use App\Models\Profile;
use App\Models\ProfileSkill;
use App\Services\MatchingService;

class FormationProfileObserver
{
    public function created(Formation $profileFormation)
    {
        $this->recalculateMatching($profileFormation);
    }

    public function updated(Formation $profileFormation)
    {
        $this->recalculateMatching($profileFormation);
    }

    protected function recalculateMatching(Formation $profileFormation)
    {
        $profile = Profile::find($profileFormation->profile_id);
        if ($profile) {
            $offers = JobOffer::all();

            $service = new MatchingService();
            foreach ($offers as $offer) {
                $service->matchProfileToJobOffer($profile, $offer);
            }
        }
    }

}
