<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CompaignController extends Controller
{


    public $campaignService;

    // constructor
    public function __construct( CampaignService $campaignService )
    {

        $this->campaignService = $campaignService;

    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $campaigns = $this->campaignService->listing();
        // return response()->json($campaigns);
    }

    // create
    public function create(Request $request)
    {
        try{

            // validate request
            $request->validate([
                'label' => 'required|string|max:255',
                'predictive_model_id' => 'required|exists:predictive_model,id',
                'location' => 'required',
            ]);

            $campaign = $this->campaignService->createCampaign($request->all());

            if( !isset($campaign) || !$campaign || !isset($campaign['data']) ){
                return response()->json(['error' => $campaign], 500);
            }

            return response()->json($campaign);

        }catch(ValidationException $ex){
            // back with errors
            return response()->json($ex->errors(), 422);
        }catch(\Exception $e){
            Log::error($e);
            // back with errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // update
    public function update(Request $request)
    {
        try{

            // validate request
            $request->validate([
                'assessfirst_id' => 'required|exists:campaign,assessfirst_id',
                'label' => 'required|string|max:255',
                'predictive_model_id' => 'required|exists:predictive_model,id',
                'location' => 'required',
            ]);

            $campaign = $this->campaignService->updateCampaign($request->all());

            return response()->json([
                'success' => true,
                'data' => $campaign
            ], 200);

        }catch(ValidationException $ex){
            // back with errors
            return response()->json($ex->errors(), 422);
        }catch(\Exception $e){
            Log::error($e);
            // back with errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // add_to_campaign
    public function add_to_campaign(Request $request)
    {
        try{

            $request->validate([
                'campaign_id' => 'required|exists:campaign,assessfirst_id',
                'collaborators' => 'required|array',
            ],[
                'collaborators.required' => 'Veuillez fournir une liste de collaborateurs',
                'campaign_id.required' => 'Veuillez fournir un ID de campagne',
                'campaign_id.exists' => 'Cette campagne n\'existe pas en local',
            ]
        );

            $added_users = $this->campaignService->addUsersToCampaign($request->all());

            return response()->json($added_users);

        }catch(ValidationException $ex){
            // back with errors
            return response()->json($ex->errors(), 422);
        }catch(\Exception $e){
            Log::error($e);
            // back with errors
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

}