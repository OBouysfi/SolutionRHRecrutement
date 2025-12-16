<?php

namespace App\Http\Controllers\Web\CandidatePortal;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Diploma;
use App\Models\Level;
use App\Models\Profession;
use App\Models\ActivityArea;
use Illuminate\Http\Request;
use App\Models\Profile;

class MatchingCandidateController extends Controller
{
    public function listing()
    {
        $niveaux = Level::get();
        $diplomas = Diploma::get();
        $countries = Country::get();
        $posts = Profession::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();
        $activityareas = ActivityArea::get();

        return view('candidate_portal.matching.listing', compact('countries', 'cities', 'posts', 'clients', 'diplomas', 'status_jobOffres','activityareas'));
    }

    public function coverLetter(Profile $profile){

        return view('candidate_portal.matching.inc.coverLetter', compact('profile'));
    }

    public function showCV(Profile $profile){

        $skillsgroup = $profile->skills->groupBy('skill_type_id');

        return view('candidate_portal.matching.inc.generate-cv', compact('profile', 'skillsgroup'));
    }

    public function print($id)
    {
        $profile = Profile::with(['experiences', 'formations', 'skills'])->find($id);
        $skillsgroup = $profile->skills->groupBy('skill_type_id');

        return view('candidate_portal.matching.inc.generated-cv', compact('profile', 'skillsgroup'));
    }

}
