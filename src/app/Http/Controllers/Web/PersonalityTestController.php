<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PredictiveModel;
use App\Models\Profile;
use App\Services\PersonalityTestService;
use Illuminate\Http\Request;

class PersonalityTestController extends Controller
{
    public $personalityTestService;

    // constructor
    public function __construct( PersonalityTestService $personalityTestService )
    {

        $this->personalityTestService = $personalityTestService;
        $this->middleware('permission:contact-test-personnelle-access')->only(['listingCandidate']);
        $this->middleware('permission:contact-test-personnelle-show')->only(['getCandidateDetails']);
        $this->middleware('permission:modele-predictif-create')->only(['createPredictiveModel']);
         

    }

    public function listingCandidate()
    {
        try {
            $localCondidates = Profile::all();
    
            return view('personalityTest.candidate.listingCandidate' , compact('localCondidates' ));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function result()
    {
        return view('personalityTest.result');
    }

    public function createPredictiveModel()
    {
        return view('personalityTest.predictiveModel.createPredictiveModel');
    }

    public function campaign()
    {
        return view('personalityTest.campaign');
    }

    public function inviteContact()
    {
        return view('personalityTest.inviteContacts');
    }

    public function sheet()
    {
        return view('personalityTest.candidateSheetPersonalityTest');
    }


    // listing PredictiveModels
    public function listingPredictiveModel ()
    {

        $predictiveModels = $this->personalityTestService->getPredictiveModels();


        return view('personalityTest.predictiveModel.listing', compact('predictiveModels'));

    }

    // get condidat details
    public function getCandidateDetails( Request $request )
    {
        try {

            $request->validate([
                'candidate_id' => 'required|exists:assessfirst_invitation_history,candidate_id',
            ]);

            $response = $this->personalityTestService->getAndHydrateInvitedCandidate($request->candidate_id);

            $candidate = $response['candidate'];

            return view('personalityTest.candidate.details', compact('candidate', 'response'));

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


}
