<?php

namespace App\Observers;

use App\Models\Formation;
use App\Models\JobOffer;
use App\Models\JobOfferFormation;
use App\Models\MobilityOption;
use App\Models\Profile;
use App\Models\ProfileSkill;
use App\Services\MatchingService;

class FormationJobOfferObserver
{
    public function created(JobOfferFormation $jobOfferFormation)
    {
        $this->recalculateMatching($jobOfferFormation);
    }

    public function updated(JobOfferFormation $jobOfferFormation)
    {
        $this->recalculateMatching($jobOfferFormation);
    }

    protected function recalculateMatching(JobOfferFormation $jobOfferFormation)
    {
        $jobOffer = JobOffer::find($jobOfferFormation->job_offer_id);
        if ($jobOffer) {
            $profiles = Profile::all();

            $service = new MatchingService();
            foreach ($profiles as $profile) {
                $service->matchProfileToJobOffer($profile, $jobOffer);
            }
        }
    }

}
