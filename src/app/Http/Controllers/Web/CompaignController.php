<?php

namespace App\Http\Controllers\Web;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\PredictiveModel;
use App\Services\CampaignService;
use App\Services\PersonalityTestService;

class CompaignController extends Controller
{
    
    public $campaignService;
    public $personalityTestService;

    // constructor
    public function __construct( CampaignService $campaignService, PersonalityTestService $personalityTestService )
    {

        $this->campaignService = $campaignService;
        $this->personalityTestService = $personalityTestService;
        
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $campaigns = Campaign::with('city', 'predictiveModel')->get();

        // get predictive models
        $predictiveModels = PredictiveModel::where('status', 'validated')->get();

        $assessfirstUsers = $this->personalityTestService->getAssessfirstUsers();
        
        // dd($assessfirstUsers);
        // get cities
        $cities = City::all();

        return view('personalityTest.campaign.listing', compact('campaigns' , 'cities' , 'predictiveModels' , 'assessfirstUsers'));

    }
    
    // create
    public function create()
    {
        // get predictive models
        $predictiveModels = PredictiveModel::where('status', 'validated')->get();

        return view('personalityTest.campaign.create' , compact('predictiveModels'));
    }
   
    // add_to_campaign
    public function add_to_campaign(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaign,assessfirst_id',
        ]);
        
        $assessfirstUsers = $this->personalityTestService->getAssessfirstUsers();

        $campaign = Campaign::where('assessfirst_id', $request->campaign_id)->first();

        return view('personalityTest.campaign.add_to_campaign' , compact('assessfirstUsers', 'campaign'));
    }

}  