<?php

namespace App\Observers;

use App\Models\JobOffer;
use App\Models\Profile;
use App\Models\ProfileSkill;
use App\Services\MatchingService;

class ProfileSkillObserver
{
    public function created(ProfileSkill $profileSkill)
    {
        $this->recalculateMatching($profileSkill);
    }

    public function updated(ProfileSkill $profileSkill)
    {
        $this->recalculateMatching($profileSkill);
    }

    protected function recalculateMatching(ProfileSkill $profileSkill)
    {
        $profile = Profile::find($profileSkill->profile_id);
        if ($profile) {
            $offers = JobOffer::all();

            $service = new MatchingService();
            foreach ($offers as $offer) {
                $service->matchProfileToJobOffer($profile, $offer);
            }
        }
    }

}
