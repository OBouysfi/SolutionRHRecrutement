<?php

namespace App\Http\Controllers\Web\CandidatePortal;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\PersonalityTestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalityTestCandidateController extends Controller
{


    public $personalityTestService;

    // constructor
    public function __construct( PersonalityTestService $personalityTestService )
    {

        $this->personalityTestService = $personalityTestService;
        $this->middleware('permission:candidate-portal-access');

    }


    public function listing()
    {
        return view('candidate_portal.personalityTest.sheet');
    }

    public function showPersonalityTestResult( Request $request )
    {
        try {

            // get auth user
            $authUser = Auth::user();

            // get candidate
            $candidate = Profile::with('assessfirstInvitationHistory')->where('user_id', $authUser->id)->first();

            // If no candidate is found, return an error message or redirect
            if (!$candidate) {
                $message = 'No candidate found for the authenticated user.';
                return view('candidate_portal.personalityTest.noResultFound', compact('message'));
            }
            
            $candidate = $this->personalityTestService->getAndHydrateInvitedCandidate($candidate->id);

            // If no data is returned, return an error message or redirect
            if (isset($candidate["success"]) && !$candidate["success"]) {
                $message = $candidate["message"];
                return view('candidate_portal.personalityTest.noResultFound', compact('message'));
            }

            return view('candidate_portal.personalityTest.showResult', compact('candidate'));

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

}
