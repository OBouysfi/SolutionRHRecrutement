<?php

namespace App\Http\Controllers\Web\CandidatePortal;

use App\Enums\Profile\EvaluationTypeEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Models\City;
use App\Models\Country;
use App\Models\Diploma;
use App\Models\DiplomaOption;
use App\Models\Level;
use App\Models\Profession;
use App\Models\SkillType;
use App\Models\ActivityArea;
use App\Models\Certification;
use App\Models\CoverLetter;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\MobilityOption;
use App\Models\Profile;
use App\Models\Recommandation;
use App\Models\Region;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;


class ProfileCandidateController extends Controller
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
        $this->middleware('permission:candidate-portal-access');
    }

    public function listing()
    {
        $profile = Profile::where("user_id", Auth::id())->orderBy("created_at", "Desc")->get()->first();
        if (!$profile) {
            return redirect()->route('candidate-portal.profiles.create');
        }
        $skillsgroup = $profile->skills->groupBy('skill_type_id');
        $countries = Country::get();
        $cities = City::with('country')->get();
        $posts = Profession::get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $levels = Level::get();
        $diplomas = Diploma::get();
        $diplomaOptions = DiplomaOption::get();
        $activityArea = ActivityArea::get();

        $id = $profile?->id;
        session(['profile_id' => $id]);

        $formations = Formation::where("profile_id", $id)->get();
        $experiences = Experience::where("profile_id", $id)->get();
        $certifications = Certification::where("profile_id", $id)->get();
        $coverLetter = CoverLetter::where("profile_id", $id)->get()->first();
        $recommandations = Recommandation::where("profile_id", $id)->get();

        $technicalSubTypes   = SkillType::where('parent_id', 1)->get();
        $personalSubTypes = SkillType::where('parent_id', 2)->get();
        $languagesSubTypes = SkillType::where('parent_id', 3)->get();

        $technicalSkills  =  $this->skillsBytype(1);
        $personalSkills =  $this->skillsBytype(2);
        $languagesSkills = $this->skillsBytype(3);

        $mobility = MobilityOption::where('profile_id', $profile->id)
            ->with('mobilityOptionType')
            ->get()
            ->mapWithKeys(function ($option) {
                $type = $option->mobilityOptionType; // Null-safe access
                return $type
                    ? [
                        $type->slug => [
                            'is_active' => $option->is_active,
                            'weight' => $option->weight,
                        ],
                    ]
                    : [];
            });

        $workMode = MobilityOption::where('profile_id', $profile->id)
            ->with('mobilityOptionType')
            ->get()
            ->mapWithKeys(function ($option) {
                $type = $option->mobilityOptionType; // Null-safe access
                return $type
                    ? [
                        $type->slug => [
                            'is_active' => $option->is_active,
                            'weight' => $option->weight,
                        ],
                    ]
                    : [];
            });

        $availability = MobilityOption::where('profile_id', $profile->id)
            ->whereHas('mobilityOptionType', function ($query) {
                $query->where('slug', 'availability');
            })
            ->first();



        $workTime = MobilityOption::where('profile_id', $profile->id)
            ->with('mobilityOptionType')
            ->get()
            ->mapWithKeys(function ($option) {
                $type = $option->mobilityOptionType;
                return $type ? [
                    $type->slug => [
                        'is_active' => $option->is_active,
                        'weight' => $option->weight,
                    ],
                ] : [];
            });
        return view('candidate_portal.profile.listing', compact(
            'countries',
            'cities',
            'posts',
            'diplomas',
            'levels',
            'diplomaOptions',
            'contractsTypes',
            'profile',
            'formations',
            'experiences',
            'certifications',
            'recommandations',
            'technicalSubTypes',
            'personalSubTypes',
            'languagesSubTypes',
            'technicalSkills',
            'personalSkills',
            'languagesSkills',
            'coverLetter',
            'activityArea',
            'mobility',
            'workMode',
            'workTime',
            'skillsgroup',

        ))->with(['availability' => [
            'type' => $availability?->is_active ? 'immediate' : 'notice',
            'notice_duration' => $availability?->notice_period_per_month,
        ]]);
    }

    public function create()
    {
        $profile = Profile::where("user_id", Auth::id())->get()->first();
        if ($profile)
            return redirect()->route("candidate-portal.profile.edit");
        $countries = Country::get();
        $cities = City::with('country', 'region', 'region.country')->get();
        $regions = Region::with('country')->get();
        $posts = Profession::get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $levels = Level::get();
        $diplomas = Diploma::get();
        $evaluationTypes = EvaluationTypeEnum::getAll();
        $diplomaOptions = DiplomaOption::get();
        $activityArea = ActivityArea::get();

        $technicalSubTypes   = SkillType::where('parent_id', 1)->get();
        $personalSubTypes = SkillType::where('parent_id', 2)->get();
        $languagesSubTypes = SkillType::where('parent_id', 3)->get();

        $technicalSkills  =  $this->skillsBytype(1);
        $personalSkills =  $this->skillsBytype(2);
        $languagesSkills = $this->skillsBytype(3);
        Session::forget('profile_id');



        return view('candidate_portal.profile.create', compact(
            'countries',
            'cities',
            'posts',
            'diplomas',
            'levels',
            'diplomaOptions',
            'contractsTypes',
            'technicalSubTypes',
            'personalSubTypes',
            'languagesSubTypes',
            'technicalSkills',
            'personalSkills',
            'activityArea',
            'languagesSkills',
            'regions',
            'evaluationTypes'
        ));
    }
    public function skillsBytype($parentTypeId)
    {
        $typeIds = SkillType::where('parent_id', $parentTypeId)
            ->pluck('id');

        return Skill::whereIn('skill_type_id', $typeIds)->get();
    }

    public function edit()
    {
        ini_set('memory_limit', '1024M');
        $profile = Profile::where("user_id", Auth::id())->orderBy("created_at", "DESC")->get()->first();
        if (!$profile) {
            return redirect()->route("candidate-portal.profiles.listing");
        }
        $id = $profile->id;
        $countries = Country::get();
        $cities = City::with('country')->get();
        $posts = Profession::get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $levels = Level::get();
        $diplomas = Diploma::get();
        $evaluationTypes = EvaluationTypeEnum::getAll();
        $diplomaOptions = DiplomaOption::get();
        $activityArea = ActivityArea::get();

        session(['profile_id' => $profile->id]);

        $formations = Formation::where("profile_id", $id)->get();
        $experiences = Experience::where("profile_id", $id)->get();
        $certifications = Certification::where("profile_id", $id)->get();
        $coverLetter = CoverLetter::where("profile_id", $id)->get()->first();
        $recommandations = Recommandation::where("profile_id", $id)->get();

        $technicalSubTypes   = SkillType::where('parent_id', 1)->get();
        $personalSubTypes = SkillType::where('parent_id', 2)->get();
        $languagesSubTypes = SkillType::where('parent_id', 3)->get();

        $technicalSkills  =  $this->skillsBytype(1);
        $personalSkills =  $this->skillsBytype(2);
        $languagesSkills = $this->skillsBytype(3);

        $mobility = MobilityOption::where('profile_id', $profile->id)
            ->with('mobilityOptionType')
            ->get()
            ->mapWithKeys(function ($option) {
                $type = $option->mobilityOptionType; // Null-safe access
                return $type
                    ? [
                        $type->slug => [
                            'is_active' => $option->is_active,
                            'weight' => $option->weight,
                        ],
                    ]
                    : [];
            });

        $workMode = MobilityOption::where('profile_id', $profile->id)
            ->with('mobilityOptionType')
            ->get()
            ->mapWithKeys(function ($option) {
                $type = $option->mobilityOptionType; // Null-safe access
                return $type
                    ? [
                        $type->slug => [
                            'is_active' => $option->is_active,
                            'weight' => $option->weight,
                        ],
                    ]
                    : [];
            });

        $notice = MobilityOption::where('profile_id', $profile->id)->where("weight", null)
            ->whereHas('mobilityOptionType', function ($query) {
                $query->where('slug', 'notice');
            })
            ->latest('created_at')->first();

        $availability = MobilityOption::where('profile_id', $profile->id)->where("weight", null)
            ->whereHas('mobilityOptionType', function ($query) {
                $query->where('slug', 'immediate');
            })
            ->latest('created_at')->first();
            

        $workTime = MobilityOption::where('profile_id', $profile->id)
            ->with('mobilityOptionType')
            ->get()
            ->mapWithKeys(function ($option) {
                $type = $option->mobilityOptionType;
                return $type ? [
                    $type->slug => [
                        'is_active' => $option->is_active,
                        'weight' => $option->weight,
                    ],
                ] : [];
            });
        $notice_duration = $notice?->notice_period_per_month;


        // dd($profile->getSkillsByType());
        return view('candidate_portal.profile.edit', compact(
            'countries',
            'cities',
            'posts',
            'diplomas',
            'levels',
            'diplomaOptions',
            'contractsTypes',
            'profile',
            'formations',
            'experiences',
            'certifications',
            'recommandations',
            'technicalSubTypes',
            'personalSubTypes',
            'languagesSubTypes',
            'technicalSkills',
            'personalSkills',
            'languagesSkills',
            'coverLetter',
            'activityArea',
            'mobility',
            'workMode',
            'workTime',
            'notice_duration',
            'evaluationTypes',
        ))->with(['availability' => [
            'type' => $availability?->is_active ? 'immediate' : 'notice',
            'notice_duration' => $notice?->notice_period_per_month,
        ]]);
    }
}
