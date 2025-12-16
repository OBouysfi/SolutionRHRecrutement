<?php

namespace App\Observers;

use App\Models\Experience;
use App\Models\JobOffer;
use App\Models\Profile;
use App\Services\MatchingService;

class ExperienceProfileObserver
{
    public function created(Experience $profileExperience)
    {
        $this->recalculateMatching($profileExperience);
    }

    public function updated(Experience $profileExperience)
    {
        $this->recalculateMatching($profileExperience);
    }

    protected function recalculateMatching(Experience $profileExperience)
    {
        $profile = Profile::find($profileExperience->profile_id);
        if ($profile) {
            $offers = JobOffer::all();

            $service = new MatchingService();
            foreach ($offers as $offer) {
                $service->matchProfileToJobOffer($profile, $offer);
            }
        }
    }

}
