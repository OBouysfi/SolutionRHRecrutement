<?php

namespace App\Observers;

use App\Models\JobOffer;
use App\Models\JobOfferSkill;
use App\Models\Profile;
use App\Models\ProfileSkill;
use App\Services\MatchingService;

class JobOfferSkillObserver
{
    public function created(JobOfferSkill $jobOfferSkill)
    {
        $this->recalculateMatching($jobOfferSkill);
    }

    public function updated(JobOfferSkill $jobOfferSkill)
    {
        $this->recalculateMatching($jobOfferSkill);
    }

    protected function recalculateMatching(JobOfferSkill $jobOfferSkill)
    {
        $jobOffer = JobOffer::find($jobOfferSkill->job_offer_id);
        if ($jobOffer) {
            $profiles = Profile::all();

            $service = new MatchingService();
            foreach ($profiles as $profile) {
                $service->matchProfileToJobOffer($profile, $jobOffer);
            }
        }
    }

}
