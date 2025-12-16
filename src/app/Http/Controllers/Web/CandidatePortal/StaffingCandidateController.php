<?php

namespace App\Http\Controllers\Web\CandidatePortal;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\PersonalityTestService;
use Illuminate\Http\Request;

class StaffingCandidateController extends Controller
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
        $this->middleware('permission:candidate-portal-access');
    }
    public function presence()
    {
        return view('candidate_portal.staffing.presence');
    }

}
