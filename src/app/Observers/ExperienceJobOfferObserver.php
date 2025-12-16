<?php

namespace App\Observers;

use App\Models\Experience;
use App\Models\JobOffer;
use App\Models\JobOfferExperience;
use App\Models\Profile;
use App\Services\MatchingService;

class ExperienceJobOfferObserver
{
    public function created(JobOfferExperience $jobOfferExperience)
    {
        $this->recalculateMatching($jobOfferExperience);
    }

    public function updated(JobOfferExperience $jobOfferExperience)
    {
        $this->recalculateMatching($jobOfferExperience);
    }

    protected function recalculateMatching(JobOfferExperience $jobOfferExperience)
    {
        $jobOffer = JobOffer::find($jobOfferExperience->profile_id);
        if ($jobOffer) {
            $profiles = Profile::all();

            $service = new MatchingService();
            foreach ($profiles as $profile) {
                $service->matchProfileToJobOffer($profile, $jobOffer);
            }
        }
    }

}
