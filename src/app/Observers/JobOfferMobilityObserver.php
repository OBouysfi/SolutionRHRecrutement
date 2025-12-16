<?php

namespace App\Observers;

use App\Models\JobOffer;
use App\Models\MobilityOption;
use App\Models\Profile;
use App\Models\ProfileSkill;
use App\Services\MatchingService;

class JobOfferMobilityObserver
{
    public function created(MobilityOption $jobOfferMobility)
    {
        $this->recalculateMatching($jobOfferMobility);
    }

    public function updated(MobilityOption $jobOfferMobility)
    {
        $this->recalculateMatching($jobOfferMobility);
    }

    protected function recalculateMatching(MobilityOption $jobOfferMobility)
    {
        $jobOffer = JobOffer::find($jobOfferMobility->job_offer_id);
        if ($jobOffer) {
            $profiles = Profile::all();

            $service = new MatchingService();
            foreach ($profiles as $profile) {
                $service->matchProfileToJobOffer($profile, $jobOffer);
            }
        }
    }

}
