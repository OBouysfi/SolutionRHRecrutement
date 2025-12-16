<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Session;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Enums\Experience\LevelExperienceEnum;
use App\Enums\Profile\EvaluationTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\City;
use App\Models\Country;
use App\Models\CoverLetter;
use App\Models\Diploma;
use App\Models\DiplomaOption;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Level;
use App\Models\MobilityOption;
use App\Models\Profession;
use App\Models\Profile;
use App\Models\Recommandation;
use App\Models\SkillType;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\VivierTalentExport;
use App\Exports\CVthequeExport;
use App\Models\ProfileSkill;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShareListingProfileEmail;
use App\Mail\ShareListingVivierTalent;
use App\Models\ActivityArea;
use App\Models\Region;
use App\Models\TalentFolder;
use App\Services\VivierTalentService;
use App\Models\Timeline;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        // Injection du modèle Profile
        $this->profile = $profile;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:profile-create')->only(['create']);
        $this->middleware('permission:profile-listing')->only(['listing']);
        $this->middleware('permission:profile-edit')->only(['edit']);

        $this->middleware('permission:profile-share')->only(['sendShareEmail']);
        $this->middleware('permission:profile-export')->only(['ExcelCVtheque']);
        $this->middleware('permission:profile-preview')->only(['preview']);

        $this->middleware('permission:vivierTalent-download')->only(['exportExcel']);
        $this->middleware('permission:vivierTalent-preview')->only(['vivierpreview']);
        $this->middleware('permission:vivierTalent-share')->only(['sendShareVivierTalentEmail']);
        $this->middleware('permission:vivierTalent-access')->only(['vivierTalent']);
    }

    public function listing()
    {
        // $locale = Session::get('locale');
        // dd($locale,"jjjjjjjjjjjjj");
        // app()->setLocale($locale);

        $niveaux = Level::all();
        $diplomas = Diploma::all();
        $countries = Country::all();
        $contractsTypes = ContractTypeProfileEnum::getAll(); // Vérifie si c'est un enum PHP 8.1+
        $levelExperience = LevelExperienceEnum::getAll();
        $posts = Profession::all();
        $cities = City::with('region')->get();
        $regions = Region::with('country')->get();

        // Définition des dates
        $startDate = now()->startOfMonth()->toDateString();
        $endDate = now()->endOfMonth()->toDateString();

        // Récupération des profils (évite de charger toute la table si ce n'est pas nécessaire)
        $profiles = Profile::latest()->paginate(20); // Remplace `all()` par `paginate()`

        $talentFolders = TalentFolder::where("parent_id", null)->withCount('profiles', 'subFolders')->get();

        // Années pour les statistiques

        $statsComparison = $this->getChartsStats();
        return view('profile.listing', compact(
            'niveaux',
            'diplomas',
            'countries',
            'cities',
            'posts',
            'contractsTypes',
            'levelExperience',
            'startDate',
            'endDate',
            'profiles',
            'talentFolders',
            'regions',
        ))->with(['statsComparison' => $statsComparison]);
    }
    function getChartsStats()
    {
        $currentYear = now()->year;
        $lastYear = $currentYear - 1;

        // Fonction de récupération des statistiques
        function getProfileStats($year)
        {
            return Profile::selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")
            ->whereYear('created_at', $year)->first();
        }


        function getTotal()
        {
            return Profile::selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")
            ->first();
        }

        $totalStats = getTotal();
        $currentStats = getProfileStats($currentYear);
        $lastYearStats = getProfileStats($lastYear);

        // Fonction pour calculer les changements en pourcentage
        function calculateChange($current, $previous)
        {
            if ($previous == 0) {
                return $current == 0 ? 0 : null; // `null` peut signifier "pas de données comparables"
            }
            return round((($current - $previous) / $previous) * 100, 2);
        }

        // Comparaison des statistiques
        $statsComparison = [
            'cvtheque' => [
                'total' => $totalStats->total_profiles,
                'change' => calculateChange($currentStats->total_profiles, $lastYearStats->total_profiles),
            ],
            'active_profiles' => [
                'total' => $totalStats->active_profiles,
                'change' => calculateChange($currentStats->active_profiles, $lastYearStats->active_profiles),
            ],
            'qualified_profiles' => [
                'total' => $totalStats->qualified_profiles,
                'change' => calculateChange($currentStats->qualified_profiles, $lastYearStats->qualified_profiles),
            ],
            'validation_profiles' => [
                'total' => $totalStats->validation_profiles,
                'change' => calculateChange($currentStats->validation_profiles, $lastYearStats->validation_profiles),
            ],
        ];
        return $statsComparison;
    }
    public function vivierTalent(VivierTalentService $vivierTalentService)
    {
        $niveaux = Level::get();
        $diplomas = Diploma::get();
        $cities = City::with('country')->get();
        $countries = Country::get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $posts = Profession::get();
        $levelExperience = LevelExperienceEnum::getAll();
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->endOfMonth()->toDateString();

        $talentFolders = TalentFolder::where("parent_id", null)->withCount('profiles', 'subFolders')->get();
        // $profiles = Profile::paginate(100);
        $profiles = Profile::paginate(100); 
        $levels = Level::all();
        $diplomaOptions = DiplomaOption::all();

        $conversionRates = $vivierTalentService->calculateMonthlyConversionRates();
        $recruiterSatisfactionRates = $vivierTalentService->calculateRecruiterSatisfactionRates();

        return view('vivierTalent.listing', compact('niveaux', 'profiles', 'diplomas', 'levels', 'diplomaOptions', 'startDate', 'endDate', 'cities', 'countries', 'contractsTypes', 'posts', 'levelExperience', 'conversionRates', 'recruiterSatisfactionRates', 'talentFolders'));
    }

    /**
     * Créer un nouveau dossier pour le vivier de talents
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeTalentFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:talent_folders,id'
        ]);

        $talentFolder = new TalentFolder();
        $talentFolder->name = $request->name;
        $talentFolder->parent_id = $request->parent_id;
        $talentFolder->save();

        $talentFolders = TalentFolder::where("parent_id", null)->get();

        return response()->json([
            'success' => 'Dossier du vivier de talents créé avec succès.',
            'talentFolders' => $talentFolders
        ]);
    }

    public function exportExcel(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new VivierTalentExport, 'vivier_talents.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new VivierTalentExport, 'vivier_talents.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }

    public function ExcelCVtheque(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new CVthequeExport, 'CVtheque.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new CVthequeExport, 'CVtheque.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }

    public function skillsBytype($parentTypeId)
    {
        $typeIds = SkillType::where('parent_id', $parentTypeId)
            ->pluck('id');

        return Skill::whereIn('skill_type_id', $typeIds)->get();
    }

    public function create()
    {
        // $countries = Country::get();
        // $cities = City::with('country', 'region', 'region.country')->get();
        // $regions = Region::with('country')->get();
        // $posts = Profession::get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $evaluationTypes = EvaluationTypeEnum::getAll();
        // $levels = Level::get();
        // $diplomas = Diploma::get();
        // $diplomaOptions = DiplomaOption::get();
        // $activityArea = ActivityArea::get();

        // $technicalSubTypes   = SkillType::where('parent_id', 1)->get();
        // $personalSubTypes = SkillType::where('parent_id', 2)->get();
        // $languagesSubTypes = SkillType::where('parent_id', 3)->get();

        // $technicalSkills  =  $this->skillsBytype(1);
        // $personalSkills =  $this->skillsBytype(2);
        // $languagesSkills = $this->skillsBytype(3);

        $countries = Country::get()->map(function($item) {
            $item->name = __($item->name);
            return $item;
        });
        $cities = City::with('country', 'region', 'region.country')->get()->map(function($item) {
            $item->name = __($item->name);
            if ($item->country) $item->country->name = __($item->country->name);
            if ($item->region) {
                $item->region->name = __($item->region->name);
                if ($item->region->country) $item->region->country->name = __($item->region->country->name);
            }
            return $item;
        });
        $regions = Region::with('country')->get()->map(function($item) {
            $item->name = __($item->name);
            if ($item->country) $item->country->name = __($item->country->name);
            return $item;
        });
        $posts = Profession::get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        // $contractsTypes = collect(ContractTypeProfileEnum::getAll())->map(function($item) {
        //     return __($item);
        // });
        // $evaluationTypes = collect(EvaluationTypeEnum::getAll())->map(function($item) {
        //     return __($item);
        // });
        $levels = Level::get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $diplomas = Diploma::get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $diplomaOptions = DiplomaOption::get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $activityArea = ActivityArea::get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });

        $technicalSubTypes = SkillType::where('parent_id', 1)->get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $personalSubTypes = SkillType::where('parent_id', 2)->get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $languagesSubTypes = SkillType::where('parent_id', 3)->get()->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });

        $technicalSkills = $this->skillsBytype(1)->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $personalSkills = $this->skillsBytype(2)->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        $languagesSkills = $this->skillsBytype(3)->map(function($item) {
            $item->label = __($item->label);
            return $item;
        });
        
        Session::forget('profile_id');

        return view('profile.create', compact(
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
            'evaluationTypes',
        ));
    }

    public function edit($id)
    {
        ini_set('memory_limit', '1024M');

        $profile = Profile::find($id);
        if (!$profile) {
            return redirect()->route("profile.listing");
        }
        $countries = Country::get();
        $cities = City::with('country')->get();
        $posts = Profession::get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $levels = Level::get();
        $diplomas = Diploma::get();
        $diplomaOptions = DiplomaOption::get();
        $activityArea = ActivityArea::get();
        $evaluationTypes = EvaluationTypeEnum::getAll();


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
        // dd($languagesSkills);
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
                $type = $option->mobilityOptionType;
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
        return view('profile.edit', compact(
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
            'evaluationTypes'
        ))->with(['availability' => [
            'type' => $availability?->is_active ? 'immediate' : 'notice',
            'notice_duration' => $notice?->notice_period_per_month,
        ]]);
    }


    public function preview()
    {      ini_set('memory_limit', '1024M');
        // $profiles = Profile::orderBy("created_at", "Asc",)->get();
        $profiles = Profile::with('formations.option', 'formations.diploma')->orderBy("created_at", "Asc",)->paginate(1000);
        $startDate = $profiles->first()->created_at;
        $endDate = Carbon::now()->toDateString();
        // $levels = Level::get();
        // $diplomas = Diploma::get();
        

        $statsComparison = $this->getChartsStats();
      
        // $diplomaOptions = DiplomaOption::get();
        // with('formations.option', 'formations.diploma')->
       
        return view('profile.inc.cvPreview', compact('profiles', 'startDate', 'endDate', 'profiles'))->with(['statsComparison' => $statsComparison]);
    }

    public function vivierpreview()
    {      ini_set('memory_limit', '1024M');
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->endOfMonth()->toDateString();
        $profiles = Profile::with('formations.option', 'formations.diploma')
            ->where('is_talented', true)
            ->get();

        $levels = Level::get();
        $diplomas = Diploma::get();
        return view('vivierTalent.Preview', compact('profiles', 'diplomas', 'levels', 'startDate', 'endDate'));
    }

    /***
     * @param Request $request
     * @param $profile_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $profile_id)
    {
        $profile = Profile::with([
            'city',
            'experiences',
            'formations',
            'diploma',
            'profession',
        ])->findOrFail($profile_id);

        $profile = Profile::with(['city', 'experiences', 'formations', 'diploma', 'profession'])
            ->findOrFail($profile_id);

            $formations = $profile->formations->map(function ($formation) {
                if (!$formation->started_at || !$formation->finished_at) {
                    $formation->durationYears = 0;
                    $formation->durationMonths = 0;
                    $formation->yearsSinceFinished = null;
                    return $formation;
                }
            
                $startedAt = Carbon::parse($formation->started_at);
                $finishedAt = Carbon::parse($formation->finished_at);
            
                $diff = $startedAt->diff($finishedAt);
            
                $formation->durationYears = $diff->y;
                $formation->durationMonths = $diff->m;
            
                $formation->yearsSinceFinished = $finishedAt->diffInYears(now());
            
                return $formation;
            });
            
            

        $experiences = Experience::with('missions')->where('profile_id', $profile->id)->get();
        $recommendations = Recommandation::where('profile_id', $profile->id)->get();
        $mobility = $profile->activatedMobilityoptions();
        // $skillprofile = ProfileSkill::where('profile_id', $profile_id)->with('skill')->get();
        $grouped = $profile->skills->groupBy('skill_type_id');

        // Incrémenter le compteur de consultations ( ProfileViewObserver )
        $profile->increment('total_views');
        $coverLetters = CoverLetter::where('profile_id', $profile_id)->get();
         // Récupérer le terme de recherche & timelines
        $search = request('search');

        $timelines = Timeline::whereHas('activityLog', function ($query) use ($profile) {
            $query->where('profile_id', $profile->id);
        })
        ->when($search, function ($query) use ($search) {
            $query->where('description', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate(10);


        return view('profile.view', ['profile' => $profile, 'formations' => $formations, 'experiences' => $experiences, 'skillsgroup' => $grouped, 'recommendations' => $recommendations, 'mobility' => $mobility, 'coverLetters' => $coverLetters, 'search' => $search, 'timelines' => $timelines]);
          
    }

    /***
     * Apercu profile
     * @param Request $request
     * @param $profile_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showProfile(Request $request, $profile_id)
    {
        $profile = Profile::with([
            'city',
            'experiences',
            'formations',
            'diploma',
            'profession',
        ])->findOrFail($profile_id);

        $profile = Profile::with(['city', 'experiences', 'formations', 'diploma', 'profession'])
            ->findOrFail($profile_id);

            $formations = $profile->formations->map(function ($formation) {
                if (!$formation->started_at || !$formation->finished_at) {
                    $formation->durationYears = 0;
                    $formation->durationMonths = 0;
                    $formation->yearsSinceFinished = null;
                    return $formation;
                }
            
                $startedAt = Carbon::parse($formation->started_at);
                $finishedAt = Carbon::parse($formation->finished_at);
            
                $diff = $startedAt->diff($finishedAt);
            
                $formation->durationYears = $diff->y;
                $formation->durationMonths = $diff->m;
            
                $formation->yearsSinceFinished = $finishedAt->diffInYears(now());
            
                return $formation;
            });

            $experiences = Experience::with('missions')->where('profile_id', $profile->id)->get();
            $recommendations = Recommandation::where('profile_id', $profile->id)->get();
            $mobility = $profile->activatedMobilityoptions();
            $grouped = $profile->skills->groupBy('skill_type_id');

            // Récupérer le terme de recherche & timelines
            $search = request('search');
            $timelines = Timeline::whereHas('activityLog', function ($query) use ($profile) {
                $query->where('profile_id', $profile->id);
            })
            ->when($search, function ($query) use ($search) {
                $query->where('description', 'like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate(10);
            


        return view('profile.viewProfile', ['profile' => $profile, 'formations' => $formations, 'experiences' => $experiences, 'skillsgroup' => $grouped, 'recommendations' => $recommendations, 'mobility' => $mobility,'timelines'=>$timelines]);
    }





    /**
     * sendShareEmail ( Profile )
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendShareEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|string',
            'subject' => 'nullable|string',
            'message' => 'nullable|string',
            'page_url' => 'required|url',
        ]);

        $data = [
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'page_url' => $request->input('page_url'),
        ];

        // Envoyer l'email
        Mail::to(explode(',', $request->input('to')))
            ->cc(explode(',', $request->input('cc')))
            ->send(new ShareListingProfileEmail($data));

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Lien partagé avec succès !');
    }

    /**
     * sendShareEmail ( Vivier Talent )
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendShareVivierTalentEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|string',
            'subject' => 'nullable|string',
            'message' => 'nullable|string',
            'page_url' => 'required|url',
        ]);

        $data = [
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'page_url' => $request->input('page_url'),
        ];

        // Envoyer l'email
        Mail::to(explode(',', $request->input('to')))
            ->cc(explode(',', $request->input('cc')))
            ->send(new ShareListingVivierTalent($data));

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Lien partagé avec succès !');
    }
}
