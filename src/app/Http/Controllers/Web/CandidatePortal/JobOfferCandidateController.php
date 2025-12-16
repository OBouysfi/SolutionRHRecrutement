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
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferCandidateController extends Controller
{ 
    protected $jobOffer;

    public function __construct(JobOffer $jobOffer)
    {
        $this->jobOffer = $jobOffer;
        $this->middleware('permission:candidate-portal-access');
    }

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

        return view('candidate_portal.jobOffer.listing', compact('countries', 'cities', 'posts', 'clients', 'diplomas', 'status_jobOffres','activityareas'));
    }
}
