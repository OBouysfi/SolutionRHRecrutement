<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AttentesRequest;
use App\Models\Formation;
use App\Models\MobilityOption;
use App\Models\Profile;
use App\Services\ProfileStatsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Profile\CertificationRequest;
use App\Http\Requests\Profile\CoverLetterRequest;
use App\Http\Requests\Profile\ExcperienceRequest;
use App\Http\Requests\Profile\FormationRequest;
use App\Http\Requests\Profile\InformationsRequest;
use App\Http\Requests\Profile\LanguagesRequest;
use App\Http\Requests\Profile\RecommandationRequest;
use App\Http\Requests\Profile\SkillRequest;
use App\Http\Resources\CertificationResource;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\FormationResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\RecommendationResource;
use App\Models\Certification;
use App\Models\CoverLetter;
use App\Models\Experience;
use App\Models\ProfileSkill;
use App\Models\Recommandation;
use App\Models\Skill;
use App\Models\TalentFolder;
use App\Models\SkillType;
use App\Services\CertificationService;
use App\Services\ExperienceService;
use App\Services\FileService;
use App\Services\FormationService;
use App\Services\ProfileAttentesService;
use App\Services\ProfileService;
use App\Services\ProfileSkillService;
use Carbon\Carbon;
use App\Models\Matching;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    protected $profile;

    protected $profileService;
    protected $experienceService;
    protected $certificationService;
    protected $formationService;
    protected $profileSkillService;
    protected $fileService;
    protected $profileAttentesService;
    protected $profileStatsService;


    public function __construct(
        ProfileService $profileService,
        ExperienceService $experienceService,
        CertificationService $certificationService,
        FormationService $formationService,
        ProfileSkillService $profileSkillService,
        FileService $fileService,
        ProfileAttentesService $profileAttentesService,
        ProfileStatsService $profileStatsService,
        Profile $profile,

    ) {
        $this->profileService = $profileService;
        $this->experienceService = $experienceService;
        $this->certificationService = $certificationService;
        $this->formationService = $formationService;
        $this->profileSkillService = $profileSkillService;
        $this->fileService = $fileService;
        $this->profileAttentesService = $profileAttentesService;
        $this->profileStatsService = $profileStatsService;
        $this->profile = $profile;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:profile-listing')->only(['index', 'main_index']);
        $this->middleware('permission:profile-create')->only(['store_information', 'store_attentes', 'store_cover_letter', 'store_recommandation', 'store_language', 'store_skill', 'store_experience', 'store_certification', 'store_formation']);
        $this->middleware('permission:profile-edit')->only(['update_information', 'update_attentes', 'update_cover_letter', 'update_recommandation', 'update_language', 'update_skill', 'update_experience', 'update_certification', 'update_formation']);
        $this->middleware('permission:profile-delete')->only(['delete_profile']);
        $this->middleware('permission:profile-ajouter-au-vivier')->only(['assignToTalentFolder']);
        $this->middleware('permission:profile-desactiver-profile')->only(['deactivate']);
        $this->middleware('permission:profile-dequalifier-profile')->only(['disqualify']);
        $this->middleware('permission:profile-activer-profile')->only(['activate']);
        $this->middleware('permission:profile-qualifier-profile')->only(['qualify']);
        $this->middleware('permission:profile-preview')->only(['preview']);
        $this->middleware('permission:profile-export')->only(['export']);
        $this->middleware('permission:profile-print')->only(['print']);
        $this->middleware('permission:profile-share')->only(['share']);
        $this->middleware('permission:vivierTalent-listing')->only(['index_vivier']);
    }

    public function index(Request $request, $id)
    {
        // condition pour pertinent
        if ($request->ajax()) {
            if ($id == 3) {
                $ids = Matching::distinct('profile_id')->get()->pluck('profile_id');
                return $this->profileService->getPertinents($request, $ids);
            } else {
                // dd($this->profileService->getProfilesIndex($request, $id));
                return $this->profileService->getProfilesIndex($request, $id);
            }
        } else {
            return response()->json(['error' => 'Invalid request'], 400);
        }
    }

    public function custom(Request $request)
    {
        if ($request->ajax()) {
            return $this->profileService->getCustomProfilesIndex($request);
        } else {
            return response()->json(['error' => 'Invalid request'], 400);
        }
    }

    public function main_index(Request $request, ProfileService $profileService)
    {
        $formattedData = $profileService->getProfilesMain($request);

        if (isset($formattedData['data']) && is_array($formattedData['data'])) {
            return response()->json([
                'draw' => $request->get('draw', 1),
                'recordsTotal' => $formattedData['recordsTotal'] ?? 0,
                'recordsFiltered' => $formattedData['recordsFiltered'] ?? 0,
                'data' => $formattedData['data'] ?? [],
                'current_page' => $formattedData['current_page'] ?? 1,
                'last_page' => $formattedData['last_page'] ?? 1
            ]);
        }

        return response()->json([
            'error' => 'Data not found or invalid structure'
        ], 400);
    }
    public function assignToTalentFolder(Request $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);
        $talentFolder = TalentFolder::findOrFail($request->talent_folder_id);

        $profile->talent_folder_id = $talentFolder->id;
        $profile->save();

        return response()->json(['message' => 'Profil affecté au dossier du vivier de talents avec succès', 'profile' => $profile]);
    }
    public function getChartData()
    {
        return response()->json($this->profileStatsService->getChartData());
    }
    public function getChartsStats(Request $request)
    {
        if (!$request->start_date || !$request->end_date) {
            return $this->defaultGetChartsStats(); // Default stats if no range provided
        }

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Calcul de la durée de la période sélectionnée
        $periodLength = $endDate->diffInDays($startDate);

        // Calcul de la période précédente
        $previousStartDate = $startDate->copy()->subDays($periodLength + 1);
        $previousEndDate = $startDate->copy()->subDay();

        // Fetch stats for the selected period and the previous one
        $totalStats = $this->getTotal($startDate, $endDate, $previousStartDate, $previousEndDate);
        // dd($totalStats);
        $currentStats = $this->getProfileStats($startDate, $endDate);
        $previousStats = $this->getProfileStats($previousStartDate, $previousEndDate);

        $currentYear = now()->year;
        $lastYear = $currentYear - 1;

        $currentStats = $this->getProfileStatsByYear($currentYear);
        $lastYearStats = $this->getProfileStatsByYear($lastYear);
        // Compare stats and calculate percentage changes
        return $this->compareStats($totalStats, $currentStats, $previousStats, $currentYear, $lastYear, $startDate, $endDate);
    }
    public function defaultGetChartsStats()
    {
        $endDate = now();
        $startDate = now()->subMonths(12)->startOfMonth();

        // Fetch stats for the last 12 months
        $totalStats = $this->getTotal(null, null, $startDate, $endDate);
        $currentStats = $this->getProfileStatsByRange($startDate, $endDate);
        $lastYearStats = $this->getProfileStatsByRange(
            $startDate->copy()->subYear(),
            $endDate->copy()->subYear()
        );

        // Compare stats and calculate percentage changes
        $comparison = $this->compareStats(
            $totalStats,
            $currentStats,
            $lastYearStats,
            $startDate,
            $endDate,
            null,
            null
        );
        return $comparison;
    }

    private function getProfileStats($startDate, $endDate)
    {
        return Profile::selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();
    }
    private function getProfileStatsByYear($year)
    {
        return Profile::selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")
            ->whereYear('created_at', $year)
            ->first();
    }

    private function getProfileStatsByRange($startDate, $endDate)
    {
        //     dd(Profile::selectRaw("
        //     COUNT(*) as total_profiles,
        //     COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
        //     COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
        //     COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
        // ")
        // ->whereBetween('created_at', [$startDate, $endDate])
        // ->first());
        return Profile::selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();
    }
    private function getTotal($startDate, $endDate, $previousStartDate = null, $previousEndDate = null)
    {
        $startDate = $startDate ? Carbon::parse($startDate) : now()->subMonths(12)->startOfMonth();
        $endDate = $endDate ? Carbon::parse($endDate) : now();

        return Profile::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")
            ->first();
    }

    private function calculateChange($current, $previous)
    {
        if ($previous == 0) {
            return $current == 0 ? 0 : null; // Return null if no previous data to compare
        }
        return round((($current - $previous) / $previous) * 100, 2);
    }
    // function getMatchingStats($year)
    // {
    //     return Matching::selectRaw("
    //         COUNT(DISTINCT profile_id) as total_matched_profiles
    //     ")->whereYear('created_at', $year)->first();
    // }

    function getMatchingStats($startDate, $endDate)
    {
        $profileIds = Profile::pluck('id');

        return Matching::selectRaw("
        COUNT(DISTINCT profile_id) as total_matched_profiles
    ")
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->whereIn('profile_id', $profileIds)
            ->first();
    }

    private function compareStats($totalStats, $currentStats, $previousStats, $currentYear, $lastYear, $startDate, $endDate)
    {
        if (!$startDate || !$endDate) {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
        } else {
            $startDate = Carbon::parse($startDate);
            $endDate = Carbon::parse($endDate);
        }

        $profiles_ids = Profile::pluck("id");

        $totalPertinent = Matching::whereIn('profile_id', $profiles_ids)
            ->distinct('profile_id')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count('profile_id');

        $periodLength = $endDate->diffInDays($startDate);
        $previousStartDate = $startDate->copy()->subDays($periodLength + 1);
        $previousEndDate = $startDate->copy()->subDay();

        $currentMatchingStats = $this->getMatchingStats($startDate, $endDate);
        $lastmatchingYearStats = $this->getMatchingStats($previousStartDate, $previousEndDate);

        return [
            'cvtheque' => [
                'total' => $totalStats->total_profiles,
                'change' => $this->calculateChange($currentStats->total_profiles, $previousStats->total_profiles),
            ],
            'active_profiles' => [
                'total' => $totalStats->active_profiles,
                'change' => $this->calculateChange($currentStats->active_profiles, $previousStats->active_profiles),
            ],
            'qualified_profiles' => [
                'total' => $totalStats->qualified_profiles,
                'change' => $this->calculateChange($currentStats->qualified_profiles, $previousStats->qualified_profiles),
            ],
            'validation_profiles' => [
                'total' => $totalPertinent,
                'change' => $this->calculateChange($currentMatchingStats->total_matched_profiles, $lastmatchingYearStats->total_matched_profiles),
            ],
        ];
    }

    public function getStats(Request $request)
    {

        if ($request->start_date && $request->end_date) {
            $totalProfiles = Profile::whereBetween('created_at', [$request->start_date, $request->end_date])->count();

            $activatedProfiles = Profile::whereBetween('created_at', [$request->start_date, $request->end_date])->where('is_active', 1)->count();

            $qualifiedProfiles = Profile::where('is_qualified', 1)->whereBetween('created_at', [$request->start_date, $request->end_date])->count();

            $validatedProfiles = Profile::where('is_active', 0)->whereBetween('created_at', [$request->start_date, $request->end_date])
                ->where('is_qualified', 0)
                ->count();

            $profileIds = Profile::pluck('id');
            $totalPertinent = Matching::distinct('profile_id')
                ->whereIn('profile_id', $profileIds)
                ->whereBetween('created_at', [$request->start_date, $request->end_date])
                ->count();
        } else {

            $totalProfiles = Profile::count();

            $activatedProfiles = Profile::where('is_active', 1)->count();

            $qualifiedProfiles = Profile::where('is_qualified', 1)->count();

            $validatedProfiles = Profile::where('is_active', 0)
                ->where('is_qualified', 0)
                ->count();

            $profileIds = Profile::pluck('id');
            $totalPertinent = Matching::distinct('profile_id')
                ->whereIn('profile_id', $profileIds)
                ->count();
        }
        function calculatePercentage($count, $total)
        {
            return $total > 0 ? round(($count / $total) * 100, 2) : 0;
        }

        $statsComparison = [
            'total' => calculatePercentage($totalProfiles, $totalProfiles),
            'activated' => calculatePercentage($activatedProfiles, $totalProfiles),
            'qualified' => calculatePercentage($qualifiedProfiles, $totalProfiles),
            'validated' => calculatePercentage($totalPertinent, $totalProfiles),
        ];

        return response()->json($statsComparison);
    }
    public function generateActionDropdown($profile)
    {
        // Example: generate HTML dropdown for actions
        $actions = '
             <div class="dropdown text-center">
                <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="' . route('detail.matching.cv.preview', $profile?->id) . '" >Détail</a></li>
                    <li><a class="dropdown-item text-info" href="' . route('profile.edit', $profile->id) . '">Éditer</a></li>
                    <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">Supprimer</a></li>
                        <li><a class="dropdown-item text-success" href="javascript:void(0)" onclick="confirmAddToVivier({{ $profile->id }})">Ajouter au Vivier</a></li>
                </ul>
            </div>';

        return $actions;
    }
    public function getLanguageSkills(Request $request)
    {
        $languageId = $request->get('language_id');
        $languagesSkills = Skill::where('skill_type_id', $languageId)->get();
        // $languagesSkills = $languagesSkills->map(function ($skill) {
        //     return [
        //         'id' => $skill->id,
        //         'label' => __($skill->label),
        //     ];
        // })->toArray();
        $html = '';
        foreach ($languagesSkills as $index => $skill) {
            $html .= view('profile.inc.language-skill-select', [
                'skill' => $skill,
                'index' => $index,
                'languagesSkills' => $languagesSkills
            ])->render();
        }
        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
    public function uploadCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:5048',
        ]);

        $profile = $this->profileService->getOrCreateProfile();
        if (!$profile) {
            return response()->json([
                'error' => 'Vous devez insérer au moins les informations générales pour pouvoir télécharger le CV.',
            ], 500);
        }

        $profile->path_cv_manual = $this->fileService->uploadFile($request->file('cv'), 'profiles/cvs', $profile->path_cv_manual);
        $profile->update();

        return response()->json([
            'message' => 'CV updated successfully.',
            'cv_url' => Storage::url($profile->path_cv_manual),
        ], 200);
    }
    public function uploadVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:51200',
        ]);

        $profile = $this->profileService->getOrCreateProfile();
        if (!$profile) {
            return response()->json([
                'error' => 'Vous devez insérer au moins les informations générales pour pouvoir télécharger la vidéo.',
            ], 500);
        }

        $profile->path_cv_video = $this->fileService->uploadFile($request->file('video'), 'profiles/videos', $profile->path_cv_video);
        $profile->update();

        return response()->json([
            'message' => 'Video updated successfully.',
            'video_url' => Storage::url($profile->path_cv_video),
        ], 200);
    }
    public function uploadCoverLetter(Request $request)
    {
        $request->validate([
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:5048',
        ]);

        $profile = $this->profileService->getOrCreateProfile();
        if (!$profile) {
            return response()->json([
                'error' => 'Vous devez insérer au moins les informations générales pour pouvoir télécharger la lettre de motivation.',
            ], 500);
        }

        $profile->path_cover_letter = $this->fileService->uploadFile($request->file('cover_letter'), 'profiles/cover_letters', $profile->path_cover_letter);
        $profile->update();

        return response()->json([
            'message' => 'Lettre de motivation updated successfully.',
            'cover_letter_url' => Storage::url($profile->path_cover_letter),
        ], 200);
    }
    public function changeAvatar(Request $request)
    {
        $request->validate([
            'profile_avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $profile = $this->profileService->getOrCreateProfile();
        $profile->path_picture = $this->fileService->uploadFile($request->file('profile_avatar'), 'profiles/avatars', $profile->path_picture);
        $profile->update();

        return response()->json([
            'message' => 'Avatar updated successfully.',
            'avatar_url' => Storage::url($profile->path_picture),
        ], 200);
    }
    public function changeCover(Request $request)
    {
        $request->validate([
            'profile_cover' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $profile = $this->profileService->getOrCreateProfile();
        $profile->cover_photo = $this->fileService->uploadFile($request->file('profile_cover'), 'profiles/covers', $profile->cover_photo);
        $profile->save();

        return response()->json([
            'message' => 'Cover photo updated successfully.',
            'cover_url' => Storage::url($profile->cover_photo),
        ], 200);
    }
    public function store_information(InformationsRequest $request): JsonResponse
    {
        $profile = $this->profileService->storeInformation($request);

        return response()->json([
            'message' => 'Profile created successfully.',
            'profile_id' => $profile->id,
            'profile' => $profile,
        ], 201);
    }
    public function store_formation(FormationRequest $request): JsonResponse
    {
        $profile_id = session('profile_id');
        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }
        $formation = $this->formationService->storeFormation($request, $profile_id);
        $formations = $this->formationService->getFormations($profile_id);

        return response()->json([
            'message' => 'Formation saved successfully!',
            'formation' => new FormationResource($formation),
            'formations' => FormationResource::collection($formations),
            'id' => $formation->id,
            'profile_id' => $profile_id
        ]);
    }
    public function store_certification(CertificationRequest $request): JsonResponse
    {
        $profile_id = session('profile_id');
        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }
        $certification = $this->certificationService->storeCertification($request, $profile_id);
        $certifications = $this->certificationService->getCertifications($profile_id);

        return response()->json([
            'message' => 'Certification saved successfully!',
            'certification' => new CertificationResource($certification),  // Wrap the single certification in the resource
            'certifications' => CertificationResource::collection($certifications),  // Wrap the collection of certifications in the resource
            'id' => $certification->id,
            'profile_id' => $profile_id
        ]);
    }
    public function store_experience(ExcperienceRequest $request): JsonResponse
    {
        $profile_id = session('profile_id');

        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }
        $experience = $this->experienceService->storeExperience($request, $profile_id);
        $experiences = $this->experienceService->getExperiences($profile_id);

        return response()->json([
            'message' => 'Experience saved successfully!',
            'experience' => new ExperienceResource($experience),  // Wrap the single experience in the resource
            'experiences' => ExperienceResource::collection($experiences),  // Wrap the collection of experiences in the resource
            'id' => $experience->id,
            'profile_id' => $profile_id
        ]);
    }
    public function store_skill(SkillRequest $request)
    {
        $profile_id = session('profile_id');
        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }

        if (!$profile_id) {
            return response()->json(['error' => 'Profile ID not found in session'], 400);
        }
        $skills = [];

        // Save technical skills
        if (is_array($request->technical_skills)) {
            foreach ($request->technical_skills as $skill) {
                $skillEntry = ProfileSkill::updateOrCreate(
                    ['profile_id' => $profile_id, 'skill_id' => $skill['skill']], // Unique keys
                    ['level' => $skill['level'], 'weight' => $skill['weight']] // Updatable fields
                );

                $skills[] = $skillEntry;
            }
        }

        // Save personal skills
        if (is_array($request->personal_skills)) {
            foreach ($request->personal_skills as $skill) {
                $skillEntry = ProfileSkill::updateOrCreate(
                    ['profile_id' => $profile_id, 'skill_id' => $skill['skill']], // Unique keys
                    ['level' => $skill['level'], 'weight' => $skill['weight']] // Updatable fields
                );

                $skills[] = $skillEntry;
            }
        }

        return response()->json([
            'message' => 'Skills saved successfully!',
            'profile_id' => $profile_id,
            'updated_skills' => $skills
        ], 200);
    }
    public function store_language(LanguagesRequest $request)
    {
        $profile_id = session('profile_id');

        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }

        return $this->profileSkillService->storeLanguage($profile_id, $request->skills);
    }
    public function getLangSkills($langId)
    {
        // dd($this->profileService->getOrCreateProfile()->languagesSkills($langId));
        return response()->json(['message' => 'skills geted successfully!', 'skills' => $this->profileService->getOrCreateProfile()->languagesSkills($langId)]);
    }
    public function store_recommandation(RecommandationRequest $request)
    {
        $profile_id = session('profile_id');

        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profiles/recommandation_photos', 'public');
        }

        // Save the data to the database
        $recommandation = Recommandation::create([
            'profile_id' => $profile_id,
            'photo' => $photoPath,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'poste' => $request->poste,
            'message' => $request->message,
            'company'=> $request->company,
        ]);
        $recommandations = $this->profileService->getOrCreateProfile()->recommandations;
        return response()->json([
            'message' => 'Recommendation saved successfully!',
            'recommandation' => new RecommendationResource($recommandation), // Single recommendation resource
            'recommandations' => RecommendationResource::collection($recommandations), // Collection of recommendations
            'profile_id' => $profile_id
        ]);
    }
    public function store_cover_letter(CoverLetterRequest $request)
    {
        $profile_id = session('profile_id');

        if (!$profile_id) {
            return response()->json(['error' => 'Veuillez compléter les informations générales avant de poursuivre.', 422]);
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profiles/recommandation_photos', 'public');
        }

        // Save the data to the database
        CoverLetter::create([
            'profile_id' => $profile_id,
            'subject' => $request->subject,
            'description' => $request->description,
        ]);
        return response()->json(['message' => 'Language saved successfully!', 'profile_id' => $profile_id]);
    }
    public function store_attentes(AttentesRequest $request)
    {
        return $this->profileAttentesService->storeAttentes($request);
    }
    public function delete_profile($id)
    {
        // Find the profile by ID
        $this->profileService->deleteProfile($id);
        // Redirect or return a response
        return response()->json(['message' => 'Le profil a été supprimé avec succès'], 201);
    }
    public function index_vivier(Request $request)
    {
        if ($request->ajax()) {
            $profiles = Profile::select([
                'id',
                'matricule',
                'first_name',
                'last_name',
                'path_picture',
                'profession_id',
                'talent_folder_id',
                'desired_profile',
                'is_favorite',
                'total_experience_in_years',
                'total_formation_in_months',
                'created_at',
                'updated_at'
            ])->where('is_talented', true)->with('profession', 'diploma', 'formations', 'formations.diploma', 'formations.option','experiences.profession');

            /**
            * Filter For search
            */
            if ($request->has('search') && !empty($request->search)) {
                $rawSearch = $request->input('search');
                $search = is_string($rawSearch) ? trim($rawSearch) : '';

                $dateSearch = null;
                if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $search, $matches)) {
                    $dateSearch = $matches[3] . '-' . $matches[2] . '-' . $matches[1];
                }

                $profiles->where(function ($query) use ($search, $dateSearch) {
                    $query->where('first_name', 'like', "%$search%")
                        ->orWhere('last_name', 'like', "%$search%")
                        ->orWhere('matricule', 'like', "%$search%")
                        ->orWhereRaw('CAST(total_experience_in_years AS CHAR) LIKE ?', ["%$search%"])
                        ->orWhereHas('experiences.profession', function ($q) use ($search) {
                            $q->where('label', 'like', "%$search%");
                        })
                        ->orWhereHas('profession', function ($q) use ($search) {
                            $q->where('label', 'like', "%$search%");
                        })
                        ->orWhereHas('formations', function ($q) use ($search) {
                            $q->where(function ($sub) use ($search) {
                                if (is_numeric($search)) {
                                    $sub->where('diploma_id', $search);
                                }

                                $sub->orWhereHas('diploma', function ($qq) use ($search) {
                                    $qq->where('label', 'like', "%$search%");
                                });
                            });
                        })
                        ->orWhereHas('formations', function ($q) use ($search) {
                            $q->whereHas('option', function ($qq) use ($search) {
                                $qq->where('label', 'like', "%$search%");
                            });
                        });

                    if ($dateSearch) {
                        $query->orWhereDate('created_at', $dateSearch)
                            ->orWhereDate('updated_at', $dateSearch);
                    }
                });
            }

            if ($request->has('start_date') && !empty($request->start_date)) {
                $profiles->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->has('end_date') && !empty($request->end_date)) {
                $profiles->whereDate('created_at', '<=', $request->end_date);
            }

            if ($request->has('diplome') && $request->diplome !== 'Tous') {
                $profiles->whereHas('formations.diploma', function ($query) use ($request) {
                    $query->where('id', $request->diplome);
                });
            }
            if ($request->has('niveau') && $request->niveau !== 'Tous') {
                $profiles->whereHas('formations.level', function ($query) use ($request) {
                    $query->where('id', $request->niveau);
                });
            }
            // dd($request->folder);
            if ($request->has('folder') && $request->folder !== 'Tous') {
                $profiles->where('talent_folder_id', $request->folder);
            }

            if ($request->has('experience') && $request->experience !== 'Tous') {
                $experience = $request->experience;

                // Vérifie si la valeur est bien définie, y compris 0
                if ($experience !== null && $experience !== '') {
                    $profiles->where('total_experience_in_years', '=', $experience);
                }
            }

            if ($request->has('poste') && $request->poste !== 'Tous') {
                $profiles->whereHas('profession', function ($query) use ($request) {
                    $query->where('id', $request->poste);
                });
            }

            if ($request->has('contract_type') && $request->contract_type !== 'Tous') {
                $profiles->where('contract_type', $request->contract_type);
            }

            if ($request->has('pays') && $request->pays !== 'Tous' && !empty($request->pays)) {
                $profiles->whereHas('city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }

            if ($request->has('ville') && $request->ville !== 'Tous') {
                $profiles->where('city_id', $request->ville);
            }

            return DataTables::of($profiles)

                ->addColumn('picture', function ($profile) {
                    return '<img src="' . $profile->getAvatarUrl() . '" alt="Picture" class="" width="40" style="max-width:none;">';
                })

                ->addColumn('profession_label', function ($profile): mixed {
                    return $profile->profession ? $profile->profession->label : ' - ';
                })

                ->addColumn('diploma_label', function ($profile) {
                    $formation = $profile->formations->first();
                    return $formation && $formation->diploma
                        ? __($formation->diploma->label)
                        : ' - ';
                })

                // ->addColumn('total_experience', function ($profile) {

                //     return $profile->total_experience_in_years . ' ans' . $profile->total_experience_in_months;
                // })

                // ->addColumn('current_profession', function ($profile) {
                //     return $profile->profession ? $profile->profession->label : ' - ';
                // })

                ->addColumn('total_experience', function ($profile) {

                    return $profile->getTotalExperienceInYearsAttribute() . ' '. __('generated.ans');
                })

                ->addColumn('desired_profession', function ($profile) {
                    return $profile->profession ? __($profile->profession->label) : __('generated.Non défini');
                })

                // ->addColumn('folder', function ($profile) {
                //     return $profile->talentFolder ? $profile->talentFolder->name : ' - ';
                // })
                ->addColumn('tab', function ($profile) {
                    return '';
                })

                ->addColumn('option', function ($profile) {
                    $formation = $profile->formations->first();

                    return $formation && $formation->option
                        ? __($formation->option->label)
                        : ' - ';
                })


                // ->addColumn('desired_profession', function ($profile) {
                //     return  $profile->desired_profile ?? ' - ';
                // })

                ->addColumn('current_profession', function ($profile) {
                    $lastExperience = $profile->experiences->sortByDesc('started_at')->first();
                    return $lastExperience && $lastExperience->profession
                        ? __($lastExperience->profession->label)
                        : ' - ';
                })

                ->addColumn('action', function ($profile) {
                    return '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item translated_text" href="' . route('detail.matching.cv.preview', $profile?->id) . '" >Détail</a></li>
                            </ul>
                        </div>
                    ';
                })

                ->editColumn('created_at', function ($profile) {
                    return $profile->created_at ? $profile->created_at->format('d/m/Y') : ' - ';
                })

                ->editColumn('updated_at', function ($profile) {
                    return $profile->updated_at ? $profile->updated_at->format('d/m/Y') : ' - ';
                })
                ->rawColumns(['picture', 'is_active', 'is_qualified', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
    public function update_information(InformationsRequest $request): JsonResponse
    {
        $profile = Profile::findOrFail($request->id);
        $updatedProfile = $this->profileService->updateProfileInformation($profile, $request);

        // Using ProfileResource to format the profile data
        return response()->json([
            'message' => 'Profile updated successfully!',
            'profile' => new ProfileResource($updatedProfile)
        ]);
    }
    public function update_formation(FormationRequest $request): JsonResponse
    {
        $data = $this->formationService->updateFormation($request);
        // Assuming $data contains the updated formation model
        return response()->json([
            'message' => 'Formation updated successfully!',
            'formation' => $data["formation"],
            'formations' => $data["formations"],
        ]);
    }
    public function update_certification(CertificationRequest $request): JsonResponse
    {
        $data = $this->certificationService->updateCertification($request);
        // Assuming $data contains the updated certification model
        return response()->json([
            'message' => 'Certification updated successfully!',
            'certification' => new CertificationResource($data["certification"]),
            'certifications' => CertificationResource::collection($data["certifications"]),
        ]);
    }
    public function update_experience(ExcperienceRequest $request): JsonResponse
    {
        $data = $this->experienceService->updateExperience($request);
        // Assuming $data contains the updated experience model
        return response()->json([
            'message' => 'Experience updated successfully!',
            'experience' => $data["experience"],
            'experiences' => $data["experiences"],
        ]);
    }
    public function update_skill(SkillRequest $request): JsonResponse
    {
        $profileId = session('profile_id');
        $data = $this->profileSkillService->updateSkills($profileId, $request->technical_skills, $request->personal_skills);
        return response()->json($data);
    }
    public function update_language(LanguagesRequest $request): JsonResponse
    {
        $profile = $this->profileService->getOrCreateProfile();

        foreach ($request->skills as $skillData) {
            ProfileSkill::updateOrCreate(
                ['profile_id' => $profile->id, 'skill_id' => $skillData['skill']],
                ['weight' => $skillData['weight'], 'level' => $skillData['level']]
            );
        }

        $languages = $this->profileSkillService->updateLanguages($profile);

        return response()->json(['message' => 'Language updated successfully!', 'profile_id' => session('profile_id'), 'languages' => $languages]);
    }
    public function update_recommandation(RecommandationRequest $request)
    {
        $profile_id = session('profile_id');

        $recommandation = Recommandation::findOrFail($request->id);

        if ($request->hasFile('photo')) {
            $recommandation->photo = $request->file('photo')->store('profiles/recommandation_photos', 'public');
        }

        $recommandation->first_name = $request->first_name;
        $recommandation->last_name = $request->last_name;
        $recommandation->poste = $request->poste;
        $recommandation->message = $request->message;
        $recommandation->company = $request->company;

        $recommandation->update();

        $recommandations = $this->profileService->getOrCreateProfile()->recommandations;

        return response()->json(['message' => 'Recommendation updated successfully!', 'recommandation' => $recommandation, 'profile_id' => $profile_id, 'recommandations' => $recommandations]);
    }
    public function update_attentes(AttentesRequest $request)
    {
        return $this->profileAttentesService->updateAttentes($request);
    }
    public function delete_information($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            $profile->delete();
            return response()->json(['message' => 'Profile deleted successfully.'], 200);
        }
        return response()->json(['message' => 'Profile not found.'], 404);
    }
    public function delete_formation($id)
    {
        $formation = Formation::find($id);
        if ($formation) {
            if ($formation->logo) {
                Storage::disk('public')->delete($formation->logo);
            }
            $formation->delete();
            $formations = $this->formationService->getFormations(session('profile_id'));
            return response()->json(['message' => 'Formation deleted successfully.', 'formations' => FormationResource::collection($formations)], 200);
        }
        return response()->json(['message' => 'Formation not found.'], 404);
    }
    public function delete_certification($id)
    {
        $certification = Certification::find($id);
        if ($certification) {
            if ($certification->logo) {
                Storage::disk('public')->delete($certification->logo);
            }
            $certification->delete();
            $certifications = $this->certificationService->getCertifications(session('profile_id'));
            return response()->json(['message' => 'Certification deleted successfully.', 'certifications'=> CertificationResource::collection($certifications)], 200);
        }
        return response()->json(['message' => 'Certification not found.'], 404);
    }
    public function delete_experience($id)
    {
        $experience = Experience::find($id);

        if ($experience) {
            $profile = Profile::where("id", $experience->profile_id)->first();
            $profile->total_experience_in_years = $profile->getTotalExperienceInYearsAttribute();
            $profile->update();
            if ($experience->logo) {
                Storage::disk('public')->delete($experience->logo);
            }
            $experience->delete();
            $experiences = $this->experienceService->getExperiences(session('profile_id'));
            return response()->json(['message' => 'Experience deleted successfully.', 'experiences' => ExperienceResource::collection($experiences),], 200);
        }
        return response()->json(['message' => 'Experience not found.'], 404);
    }
    public function delete_skill($id)
    {
        $profileSkill = ProfileSkill::find($id);
        if ($profileSkill) {
            $profileSkill->delete();
            return response()->json(['message' => 'Skill deleted successfully.'], 200);
        }
        return response()->json(['message' => 'Skill not found.'], 404);
    }
    public function delete_language($id)
    {
        try {
            $skills = ProfileSkill::where('profile_id', $this->profileService->getOrCreateProfile()->id)
                ->whereHas('skill', function ($query) use ($id) {
                    $query->whereHas('skillType', function ($subQuery) use ($id) {
                        $subQuery->where('parent_id', 3)
                            ->where('id', $id);
                    });
                })
                ->delete();


            $skillTypeIds = ProfileSkill::where('profile_id', $this->profileService->getOrCreateProfile()->id)
                ->whereHas('skill')
                ->with('skill')
                ->get()
                ->pluck('skill.skill_type_id')
                ->unique();

            $skillTypes = SkillType::whereIn('id', $skillTypeIds)
                ->where('parent_id', 3)
                ->with(['skills' => function ($query) use ($skillTypeIds) {
                    $query->whereIn('skill_type_id', $skillTypeIds);
                }])
                ->get();

            return response()->json(['message' => 'Language deleted successfully.', 'languages' => $skillTypes], 200);
        } catch (Exception $ex) {
            return response()->json(['message' => 'Language not found.'], 404);
        }
    }
    public function delete_recommandation($id)
    {
        $recommandation = Recommandation::find($id);
        if ($recommandation) {
            $recommandation->delete();
            $recommandations = $this->profileService->getOrCreateProfile()->recommandations;
            return response()->json(['message' => 'Recommandation deleted successfully.', 'recommandations' => $recommandations], 200);
        }
        return response()->json(['message' => 'Recommandation not found.'], 404);
    }
    public function delete_cover_letter($id)
    {
        $coverLetter = CoverLetter::find($id);
        if ($coverLetter) {
            $coverLetter->delete();
            return response()->json(['message' => 'Cover Letter deleted successfully.'], 200);
        }
        return response()->json(['message' => 'Cover Letter not found.'], 404);
    }
    public function delete_attentes($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            $profile->profession_id = null;
            $profile->contract_type = null;
            $profile->sector = null;
            $profile->company_size = null;
            $profile->license_types = null;
            $profile->has_driving_license = null;
            $profile->update();

            MobilityOption::where('profile_id', $id)->delete();

            return response()->json(['message' => 'Attentes deleted successfully.'], 200);
        }
        return response()->json(['message' => 'Profile not found.'], 404);
    }
    public function getPaginatedChartData(Request $request)
    {
        $perPage = 100;
        $data = VivierTalent::where('is_talented', true)
            ->paginate($perPage);

        return response()->json($data);
    }
    public function addToVivier(Request $request)
    {
        $profile = Profile::find($request->profile_id);
        if ($profile) {
            $profile->is_talented = true;
            if ($request->folder_id) {
                $profile->talent_folder_id = $request->folder_id;
            } else {
                $profile->talent_folder_id = $request->parent_folder_id;
            }
            $profile->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }
    public function subfolders($id)
    {
        if (!is_numeric($id)) {
            return response()->json(["error" => "Invalid folder ID"], 400);
        }
        $folders = TalentFolder::where("parent_id", $id)->get();
        return response()->json(["data" => $folders], 200);
    }
    public function activate($id): JsonResponse
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['error' => 'Profil introuvable.'], 404);
        }

        $profile->is_active = 1;
        $profile->save();

        return response()->json(['success' => 'Profil activé avec succès.']);
    }
    public function deactivate($id): JsonResponse
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['error' => 'Profil introuvable.'], 404);
        }

        $profile->is_active = 0;
        $profile->save();

        return response()->json(['success' => 'Profil désactivé avec succès.']);
    }
    public function qualify($id): JsonResponse
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['error' => 'Profil introuvable.'], 404);
        }

        $profile->is_qualified = 1;
        $profile->save();

        return response()->json(['success' => 'Profil qualifié avec succès.']);
    }
    public function disqualify($id): JsonResponse
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['error' => 'Profil introuvable.'], 404);
        }

        $profile->is_qualified = 0;
        $profile->save();

        return response()->json(['success' => 'Profil déqualifié avec succès.']);
    }
}
