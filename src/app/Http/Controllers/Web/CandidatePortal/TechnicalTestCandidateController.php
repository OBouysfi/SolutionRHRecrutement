<?php

namespace App\Http\Controllers\Web\CandidatePortal;

use App\Enums\TechnicalTest\CategoryEnum;
use App\Enums\TechnicalTest\GroupeEnum;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Enums\Candidate\LanguageEnum;
use App\Models\Profile;

class TechnicalTestCandidateController extends Controller
{
    protected $candidate;

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
        $this->middleware('permission:candidate-portal-access');
    }
    public function listing()
    {
        // $candidate = Candidate::findOrFail($id);
        $languages = LanguageEnum::getAll();
        $groups = GroupeEnum::getAll();
        $categories = CategoryEnum::getAll();
        $candidate = Profile::where('user_id', auth()->id())->first();


        // return view('candidate_portal.technicalTest.sheet', compact('candidate', 'languages', 'groups', 'categories'));
        return view('candidate_portal.technicalTest.sheet', compact( 'languages', 'groups', 'categories', 'candidate'));
    }

}
