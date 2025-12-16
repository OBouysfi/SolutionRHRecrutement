<?php

namespace App\Http\Controllers\Api;

use App\Enums\Experience\LevelExperienceEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AttentesRequest;
use App\Models\Formation;
use App\Models\MobilityOption;
use App\Models\MobilityOptionType;
use App\Models\Profile;
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
use App\Models\Certification;
use App\Models\CoverLetter;
use App\Models\Experience;
use App\Models\ProfileSkill;
use App\Models\Recommandation;
use App\Models\Skill;
use App\Models\TalentFolder;
use App\Models\SkillType;
use App\Services\ProfileService;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class OldProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService, )
    {
        $this->profileService = $profileService;
    }


    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($id == 1) {
                $profiles = Profile::select([
                    'id',
                    'matricule',
                    'first_name',
                    'last_name',
                    'path_picture',
                    'desired_profile',
                    'profession_id',
                    'is_favorite',
                    'total_experience_in_years',
                    'total_formation_in_months',
                    'is_active',
                    'is_qualified',
                    'created_at',
                    'updated_at'
                ])->with('profession', 'formations', 'formations.diploma', 'formations.option')->where("is_active", 1);
            } else if ($id == 2) {
                $profiles = Profile::select([
                    'id',
                    'matricule',
                    'first_name',
                    'last_name',
                    'path_picture',
                    'profession_id',
                    'desired_profile',
                    'is_favorite',
                    'total_experience_in_years',
                    'total_formation_in_months',
                    'is_active',
                    'is_qualified',
                    'created_at',
                    'updated_at'
                ])->with('profession', 'formations', 'formations.diploma', 'formations.option')->where("is_qualified", 1);
            } else if ($id == 3) {
                $profiles = Profile::select([
                    'id',
                    'matricule',
                    'first_name',
                    'last_name',
                    'path_picture',
                    'profession_id',
                    'desired_profile',
                    'is_favorite',
                    'total_experience_in_years',
                    'total_formation_in_months',
                    'is_active',
                    'is_qualified',
                    'created_at',
                    'updated_at'
                ])->with('profession', 'formations', 'formations.diploma', 'formations.option')->where("is_active", 0)->where("is_qualified", 0);
            } else {
                $profiles = Profile::select([
                    'id',
                    'matricule',
                    'first_name',
                    'last_name',
                    'path_picture',
                    'profession_id',
                    'desired_profile',
                    'is_favorite',
                    'total_experience_in_years',
                    'total_formation_in_months',
                    'is_active',
                    'is_qualified',
                    'created_at',
                    'updated_at'
                ])->with('profession', 'formations', 'formations.diploma', 'formations.option');
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

            if ($request->has('experience') && $request->experience !== 'Tous') {
                $experience = $request->experience;
                if ($experience) {
                    $profiles->where('total_experience_in_years', $experience);
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

            if ($request->has('pays') && $request->pays !== 'Tous') {
                $profiles->whereHas('city.country', function ($query) use ($request) {
                    $query->where('id', $request->pays);
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
                    return $profile->profession ? __($profile->profession->label) : 'Non défini';
                })

                ->addColumn('diploma_label', function ($profile) {
                    $formation = $profile->formations->first();
                    return $formation && $formation->diploma
                        ? __($formation->diploma->label)
                        : ' - ';
                })

                ->addColumn('total_experience', function ($profile) {

                    return $profile->total_experience_in_years . ' ans' . ' et ' . $profile->total_experience_in_months . ' mois';
                })

                ->addColumn('current_profession', function ($profile) {
                    return $profile->profession ? __($profile->profession->label) : 'Non défini';
                })
                ->addColumn('tab', function ($profile) {
                    return '';
                })

                ->addColumn('option', function ($profile) {
                    $formation = $profile->formations->first();

                    return $formation && $formation->option
                        ? __($formation->option->label)
                        : ' - ';
                })

                ->addColumn('desired_profession', function ($profile) {
                    return  $profile->profession ? __($profile->profession->label) :  'Non défini';
                })
                ->addColumn('is_active', function ($profile) {
                    $checked = $profile->is_active ? 'checked' : '';
                    return '
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-active" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
                        </div>
                    ';
                })
                ->addColumn('is_qualified', function ($profile) {
                    $checked = $profile->is_qualified ? 'checked' : '';
                    return '
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-qualified" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
                        </div>
                    ';
                })
                ->addColumn('action', function ($profile) {
                    $dropdown = '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="' . route('profile.show', $profile->id) . '" >Détail</a></li>
                                <li><a class="dropdown-item" href="' . route('profile.edit', $profile->id) . '">Éditer</a></li>
                                <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">Supprimer</a></li>';


                    if (!$profile->is_talented) {
                        $dropdown .= '<li><a class="dropdown-item" href="javascript:void(0)" onclick="confirmAddToVivier(' . $profile->id . ')">Ajouter au Vivier</a></li>';
                    }


                    $dropdown .= '</ul></div>';

                    return $dropdown;
                })
                ->editColumn('created_at', function ($profile) {
                    return $profile->created_at ? $profile->created_at->format('d/m/Y') : 'N/A';
                })
                ->editColumn('updated_at', function ($profile) {
                    return $profile->updated_at ? $profile->updated_at->format('d/m/Y') : 'N/A';
                })
                ->rawColumns(['picture', 'is_active', 'is_qualified', 'action'])
                ->make(true);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    public function main_index(Request $request)
    {
        $perPage = $request->get('perPage', 10);
        $currentPage = $request->get('page', 1);

        $profiles = Profile::with([
            'experiences',
            'formations',
            'formations.diploma',
            'formations.option',
            'talentFolder'
        ])
            ->select([
                'id',
                'first_name',
                'last_name',
                'total_experience_in_years',
                'total_experience_in_months',
                'created_at',
                'updated_at'
            ]);

        // Vérifier et appliquer les filtres de dates si fournis dans la requête
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // Vérifie que la date de début n'est pas après la date de fin
            if ($startDate <= $endDate) {
                $profiles->whereBetween('created_at', [$startDate, $endDate]);
            } else {
                // Si les dates sont inversées, on les corrige automatiquement
                $profiles->whereBetween('created_at', [$endDate, $startDate]);
            }
        } elseif ($request->filled('start_date')) {
            $profiles->whereDate('created_at', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $profiles->whereDate('created_at', '<=', $request->end_date);
        }

        // Pagination des résultats
        $profiles = $profiles->paginate($perPage, ['*'], 'page', $currentPage);

        // Grouper les profils par poste
        $groupedProfiles = $profiles->groupBy(function ($profile) {
            $latestExperience = $profile->experiences->sortByDesc('started_at')->first();
            return $latestExperience ? __($latestExperience->profession?->label) : "Pas d'experience";
        });

        $formattedData = [];
        $id = 0;

        foreach ($groupedProfiles as $poste => $profilesInPoste) {
            $groupedDiplomas = [];

            foreach ($profilesInPoste as $profile) {
                if (isset($profile->formations) && count($profile->formations) > 0) {
                    foreach ($profile->formations as $formation) {
                        if ($formation) {
                            $diplomaLabel = __($formation->diploma?->label) ?? "Sans diplôme";
                            $optionLabel = __($formation->option?->label) ?? "_";

                            if (!isset($groupedDiplomas[$diplomaLabel])) {
                                $groupedDiplomas[$diplomaLabel] = [
                                    'options' => [],
                                    'experiences' => [],
                                    'languages' => [],
                                    'profiles' => [],
                                ];
                            }

                            $experienceYears = $this->calculateTotalExperience($profile->experiences);
                            // dd($profile->languages());
                            $languages = $profile->languages()->toArray();
                            $groupedDiplomas[$diplomaLabel]['options'][] = $optionLabel;
                            $groupedDiplomas[$diplomaLabel]['experiences'][] = $experienceYears;
                            $groupedDiplomas[$diplomaLabel]['languages'] = array_merge($groupedDiplomas[$diplomaLabel]['languages'], $languages);
                            $groupedDiplomas[$diplomaLabel]['profiles'][] = $profile->id;
                        }
                    }
                } else {
                    // Profils sans formation
                    $diplomaLabel = "Sans diplôme";
                    $optionLabel = "_";

                    if (!isset($groupedDiplomas[$diplomaLabel])) {
                        $groupedDiplomas[$diplomaLabel] = [
                            'options' => [],
                            'experiences' => [],
                            'languages' => [],
                            'profiles' => [],
                        ];
                    }

                    $experienceYears = $this->calculateTotalExperience($profile->experiences);
                    $languages = $profile->languages()->pluck('name')->toArray();
                    $groupedDiplomas[$diplomaLabel]['options'][] = $optionLabel;
                    $groupedDiplomas[$diplomaLabel]['experiences'][] = $experienceYears;
                    $groupedDiplomas[$diplomaLabel]['languages'] = array_merge($groupedDiplomas[$diplomaLabel]['languages'], $languages);
                    $groupedDiplomas[$diplomaLabel]['profiles'][] = $profile->id;
                }
            }

            $posteData = [];
            foreach ($groupedDiplomas as $diplomaLabel => $diplomaData) {
                $uniqueOptions = array_unique($diplomaData['options']);
                $uniqueExperiences = array_unique($diplomaData['experiences']);
                $uniqueLanguages = array_unique($diplomaData['languages']);
                $uniqueProfiles = array_unique($diplomaData['profiles']);

                $posteData[] = [
                    'diploma' => $diplomaLabel,
                    'option' => $uniqueOptions,
                    'experiences' => $uniqueExperiences,
                    'languages' => $uniqueLanguages,
                    'profile_count' => count($uniqueProfiles),
                ];
            }



            $id++;

            $formattedData[] = [
                'poste' => $poste,
                'id' => $id,
                'diplomas' => $posteData,
            ];
        }

        // Pagination des données formatées
        // $collection = collect($formattedData);
        // $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
        // $paginatedData = new LengthAwarePaginator(
        //     $currentPageItems,
        //     $collection->count(),
        //     $perPage,
        //     $currentPage,
        //     ['path' => request()->url(), 'query' => request()->query()]
        // );

        // // Retourner la réponse JSON avec pagination
        // return response()->json([
        //     'draw' => $request->get('draw', 1),
        //     'recordsTotal' => $paginatedData->total(),
        //     'recordsFiltered' => $paginatedData->total(),
        //     'data' => $paginatedData->items(),
        //     'current_page' => $paginatedData->currentPage(),
        //     'last_page' => $paginatedData->lastPage()
        // ]);
        return response()->json([
            'draw' => $request->get('draw', 1),
            'recordsTotal' => $profiles->total(),
            'recordsFiltered' => $profiles->total(),
            'data' => $formattedData,
            'current_page' => $profiles->currentPage(),
            'last_page' => $profiles->lastPage()
        ]);
    }

    // 

    /**
     * Affecter un profil à un dossier du vivier de talents
     * @param \Illuminate\Http\Request $request
     * @param mixed $profileId
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function assignToTalentFolder(Request $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);
        $talentFolder = TalentFolder::findOrFail($request->talent_folder_id);

        $profile->talent_folder_id = $talentFolder->id;
        $profile->save();

        return response()->json(['message' => 'Profil affecté au dossier du vivier de talents avec succès']);
    }

    public function getChartData()
    {
        // Récupérer les 12 derniers mois
        $monthlyStats = Profile::selectRaw("
                YEAR(created_at) as year,
                MONTH(created_at) as month,
                SUM(is_active) as active_profiles,
                SUM(is_qualified) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 THEN 1 END) as validation_profiles
            ")
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->groupByRaw("YEAR(created_at), MONTH(created_at)")
            ->orderByRaw("YEAR(created_at) ASC, MONTH(created_at) ASC")
            ->get();

        // Générer les labels et les données
        $labels = [];
        $activeData = [];
        $qualifiedData = [];
        $validationData = [];

        foreach ($monthlyStats as $stat) {
            $labels[] = Carbon::createFromDate($stat->year, $stat->month, 1)->translatedFormat('F'); // Mois en français
            $activeData[] = $stat->active_profiles;
            $qualifiedData[] = $stat->qualified_profiles;
            $validationData[] = $stat->validation_profiles;
        }

        // Retourner les données sous format JSON
        return response()->json([
            'labels' => $labels,
            'active_profiles' => $activeData,
            'qualified_profiles' => $qualifiedData,
            'validation_profiles' => $validationData,
        ]);
    }
    // Main function that processes the request for custom date ranges
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
        $totalStats = $this->getTotal();
        $currentStats = $this->getProfileStats($startDate, $endDate);
        $previousStats = $this->getProfileStats($previousStartDate, $previousEndDate);

        // Compare stats and calculate percentage changes
        return $this->compareStats($totalStats, $currentStats, $previousStats);
    }

    // Function to get default stats (Current Year vs Last Year)
    public function defaultGetChartsStats()
    {
        $currentYear = now()->year;
        $lastYear = $currentYear - 1;

        // Fetch stats for current year and last year
        $totalStats = $this->getTotal();
        $currentStats = $this->getProfileStatsByYear($currentYear);
        $lastYearStats = $this->getProfileStatsByYear($lastYear);

        // Compare stats and calculate percentage changes
        return $this->compareStats($totalStats, $currentStats, $lastYearStats);
    }
    // Helper function to fetch profile stats for a given date range
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

    // Helper function to fetch profile stats for a specific year
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

    // Helper function to fetch total profile stats (regardless of date range)
    private function getTotal()
    {
        return Profile::selectRaw("
                COUNT(*) as total_profiles,
                COUNT(CASE WHEN is_active = 1 THEN 1 END) as active_profiles,
                COUNT(CASE WHEN is_qualified = 1 THEN 1 END) as qualified_profiles,
                COUNT(CASE WHEN is_active = 0 AND is_qualified = 0 THEN 1 END) as validation_profiles
            ")->first();
    }

    // Helper function to calculate percentage change
    private function calculateChange($current, $previous)
    {
        if ($previous == 0) {
            return $current == 0 ? 0 : null; // Return null if no previous data to compare
        }
        return round((($current - $previous) / $previous) * 100, 2);
    }

    // Helper function to compare the stats and calculate changes
    private function compareStats($totalStats, $currentStats, $previousStats)
    {
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
                'total' => $totalStats->validation_profiles,
                'change' => $this->calculateChange($currentStats->validation_profiles, $previousStats->validation_profiles),
            ],
        ];
    }

    public function getStats()
    {
        $totalProfiles = Profile::count();

        $activatedProfiles = Profile::where('is_active', 1)->count();

        $qualifiedProfiles = Profile::where('is_qualified', 1)->count();

        $validatedProfiles = Profile::where('is_active', 0)
            ->where('is_qualified', 0)
            ->count();

        // Calcul des pourcentages
        function calculatePercentage($count, $total)
        {
            return $total > 0 ? round(($count / $total) * 100, 2) : 0;
        }

        $statsComparison = [
            'total' => calculatePercentage($totalProfiles, $totalProfiles),
            'activated' => calculatePercentage($activatedProfiles, $totalProfiles),
            'qualified' => calculatePercentage($qualifiedProfiles, $totalProfiles),
            'validated' => calculatePercentage($validatedProfiles, $totalProfiles),
        ];

        return response()->json($statsComparison);
    }
    function calculateTotalExperience($experiences)
    {
        $totalYears = 0;
        $totalMonths = 0;

        // Loop through each experience and calculate its duration
        foreach ($experiences as $experience) {
            // Assuming each experience has a start and end date
            $startDate = new DateTime($experience['start_date']);
            $endDate = new DateTime($experience['end_date']);

            // Calculate the difference in months
            $interval = $startDate->diff($endDate);

            // Add the years and months to the totals
            $totalYears += $interval->y;
            $totalMonths += $interval->m;
        }

        // Convert months to years if greater than 12
        $totalYears += floor($totalMonths / 12);
        $totalMonths = $totalMonths % 12;

        // Now calculate the total experience in decimal years
        $totalExperienceInYears = $totalYears + ($totalMonths / 12);

        // Round to the nearest integer
        $totalExperienceInYears = round($totalExperienceInYears);

        return $totalExperienceInYears; // Return the rounded total experience in years
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
                    <li><a class="dropdown-item" href="' . route('profile.show', $profile->id) . '" >Détail</a></li>
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

    private function getOrCreateProfile()
    {
        $profileId = session('profile_id');
        if ($profileId) {
            $profile = Profile::find($profileId);
            if ($profile) {
                return $profile;
            }
        }

        // Create a new profile if no valid profile is found
        $profile = new Profile();
        $profile->sexe = 'Homme';
        $profile->first_name = "_";
        $profile->last_name = "_";
        $profile->email = time() . random_int(1, 100) . "@hj.com";
        $profile->phone_primary = time() . random_int(1, 100);
        $profile->save();
        session(['profile_id' => $profile->id]);
        return $profile;
    }

    public function uploadCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:5048',
        ], [
            'cv.required' => 'Le CV est obligatoire.',
            'cv.mimes' => 'Le CV doit être un fichier de type PDF, DOC ou DOCX.',
            'cv.max' => 'Le CV ne doit pas dépasser 2 Mo.',
        ]);
        $profileId = session("profile_id");

        $profile = $this->getOrCreateProfile();
        if ($profile->path_picture) {
            Storage::disk('public')->delete($profile->path_picture);
        }
        if (!$profile) {
            return response()->json([
                'error' => 'Vous devez insérer au moins les informations générales pour pouvoir télécharger le cv et la lettre de couverture.',
            ], 500);
        }
        $path = $request->file('cv')->store('profiles/cvs', 'public');
        $profile->path_picture = $path;
        $profile->update();

        return response()->json([
            'message' => 'CV updated successfully.',
            'cv_url' => Storage::url($path),
        ], 200);
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:51200',
        ], [
            'video.required' => 'Le video est obligatoire.',
            'video.mimes' => 'La vidéo doit être un fichier de type : mp4, mov, avi ou wmv.',
            'video.max' => 'La vidéo ne peut pas dépasser 50 Mo.',
        ]);
        $profile = $this->getOrCreateProfile();

        if ($profile->path_cv_video) {
            Storage::disk('public')->delete($profile->path_cv_video);
        }

        if (!$profile) {
            return response()->json([
                'error' => 'Vous devez insérer au moins les informations générales pour pouvoir télécharger le video et la lettre de couverture.',
            ], 500);
        }


        $path = $request->file('video')->store('profiles/videos', 'public');
        $profile->path_cv_video = $path;
        $profile->update();

        return response()->json([
            'message' => 'Vedio updated successfully.',
            'vedio_url' => Storage::url($path),
        ], 200);
    }

    public function uploadCoverLetter(Request $request)
    {
        $request->validate([
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:5048',
        ], [
            'cover_letter.required' => 'La lettre de motivation est obligatoire.',
            'cover_letter.mimes' => 'La lettre de motivation doit être un fichier de type PDF, DOC ou DOCX.',
            'cover_letter.max' => 'La lettre de motivation ne doit pas dépasser 2 Mo.',
        ]);
        $profile = $this->getOrCreateProfile();

        if ($profile->path_picture) {
            Storage::disk('public')->delete($profile->path_picture);
        }

        $path = $request->file('cover_letter')->store('profiles/cover_letters', 'public');
        $profile->path_picture = $path;
        $profile->update();

        return response()->json([
            'message' => 'Lettre de motivation updated successfully.',
            'cover_letter_url' => Storage::url($path),
        ], 200);
    }

    public function changeAvatar(Request $request)
    {
        $request->validate([
            'profile_avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $profile = $this->getOrCreateProfile();

        if ($profile->path_picture) {
            Storage::disk('public')->delete($profile->path_picture);
        }

        $path = $request->file('profile_avatar')->store('profiles/avatars', 'public');
        $profile->path_picture = $path;
        $profile->update();

        return response()->json([
            'message' => 'Avatar updated successfully.',
            'avatar_url' => Storage::url($path),
        ], 200);
    }

    public function changeCover(Request $request)
    {

        $request->validate([
            'profile_cover' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate file type and size
        ]);

        $profile = $this->getOrCreateProfile();

        if ($profile->cover_photo) {
            Storage::disk('public')->delete($profile->cover_photo);
        }
        $path = $request->file('profile_cover')->store('profiles/covers', 'public');
        $profile->cover_photo = $path;
        $profile->save();

        return response()->json([
            'message' => 'Cover photo updated successfully.',
            'cover_url' => Storage::url($path),
        ], 200);
    }
    function generateMatricule($profile)
    {
        if ($profile->id < 999) {
            $formattedId = str_pad($profile->id, 4, '0', STR_PAD_LEFT);  // Ex: 0012, 0999
        } else {
            $formattedId = $profile->id;  // Laisser l'ID tel quel s'il est >= 999
        }

        $matricule = "HJ" . $formattedId;

        $originalMatricule = $matricule;
        $counter = 1;

        while (\App\Models\Profile::where('matricule', $matricule)->exists()) {
            $matricule = $originalMatricule . '-' . $counter;
            $counter++;
        }

        return $matricule;
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

    // public function store_information(InformationsRequest $request)
    // {
    //     $profile = $this->getOrCreateProfile();
    //     $profile->sexe = $request->civility == 1 ? 'Homme' : 'Femme';
    //     $profile->matricule = $this->generateMatricule($profile);
    //     $profile->first_name = $request->first_name;
    //     $profile->last_name = $request->last_name;
    //     $profile->family_situation = $request->family_situation;
    //     $profile->birth_date = $request->birth_date;
    //     $profile->birth_place = $request->birth_place;
    //     $profile->nationality = $request->nationality;
    //     $profile->address = $request->address;
    //     $profile->postal_code = $request->postal_code;
    //     $profile->city_id = $request->city_id;
    //     $profile->phone_primary = $request->phone_primary;
    //     $profile->phone_secondary = $request->phone_secondary;
    //     $profile->email = $request->email;
    //     $profile->url_facebook = $request->url_facebook;
    //     $profile->url_linkedin = $request->url_linkedin;
    //     $profile->url_twitter = $request->url_twitter;
    //     $profile->source = $request->source;
    //     $profile->salary_expectation = $request->salary_expectation;
    //     $profile->contract_type = $request->contract_type;
    //     $profile->profession_id = $request->profession_id;

    //     // if ($request->hasFile('cv')) {
    //     //     $profile->path_cv_manual = $request->file('cv')->store('profiles/cvs', 'public');
    //     // }

    //     // if ($request->hasFile('cover_letter')) {
    //     //     $profile->path_cover_letter = $request->file('cover_letter')->store('profiles/cover_letters', 'public');
    //     // }

    //     // if ($request->hasFile('video')) {
    //     //     $profile->path_cv_video = $request->file('video')->store('profiles/videos', 'public');
    //     // }

    //     $profile->save();
    //     session(['profile_id' => $profile->id]);

    //     return response()->json([
    //         'message' => 'Profile created successfully.',
    //         'profile_id' => $profile->id,
    //         'profile' => $profile,
    //     ], 201);
    // }
    public function store_formation(FormationRequest $request)
    {
        $formation = new Formation();

        // Assign form inputs to the model
        if ($request->hasFile('logo')) {
            $formation->logo = $request->file('logo')->store('profiles/formations/formation_logos', 'public'); // Save the logo if uploaded
        }

        $profile_id = session('profile_id');
        $formation->profile_id = $profile_id;
        $formation->name = $request->name;
        $formation->city_id = $request->city_id;
        $formation->address = $request->address;
        $formation->phone = $request->phone;
        $formation->email = $request->email;
        $formation->date = $request->date;
        $formation->level_id = $request->level_id;
        $formation->diploma_id = $request->diploma_id;
        $formation->option_id = $request->option_id;
        $formation->description = $request->description;
        $formation->mention = $request->mention;
        $formation->started_at = $request->started_at;
        $formation->finished_at = $request->finished_at;

        // Save the record to the database
        $formation->save();
        $formation->load('diploma');
        $formation->load('option');
        $formation->load('level');
        $formation->load('city.country');

        $formations = Formation::where("profile_id", $this->getOrCreateProfile()->id)->with('level', 'diploma', 'city', 'option')->get();

        return response()->json(['message' => 'Formation saved successfully!', 'formation' => $formation, 'formations' => $formations, 'id' => $formation->id, 'profile_id' => $request->profile_id]);
    }
    public function store_certification(Request $request)
    {
        $certification = new Certification();

        // Save the logo if uploaded
        if ($request->hasFile('logo')) {
            $certification->logo = $request->file('logo')->store('profiles/formations/certification_logos', 'public');
        }
        $profile_id = session('profile_id');
        $certification->profile_id = $profile_id;
        $certification->organisme = $request->organisme;
        $certification->numero_accreditation = $request->numero_accreditation;
        $certification->adresse = $request->adresse;
        $certification->city_id = $request->city_id;
        $certification->telephone_1 = $request->telephone_1;
        $certification->telephone_2 = $request->telephone_2;
        $certification->email = $request->email;
        $certification->nom_certification = $request->nom_certification;
        $certification->criteres_evaluation = $request->criteres_evaluation;
        $certification->theme_certification = $request->theme_certification;
        $certification->score_resultat = $request->score_resultat;
        $certification->niveau_certification = $request->niveau_certification;
        $certification->date_obtention = $request->date_obtention;
        $certification->volume_horaire = $request->volume_horaire;
        $certification->date_expiration = $request->date_expiration;


        // Save to the database
        $certification->save();

        $certification->load('city');
        $certification->load('city.country');

        $certifications = Certification::where("profile_id", $this->getOrCreateProfile()->id)->with('city')->get();

        return response()->json(['message' => 'Formation saved successfully!', 'certification' => $certification, 'certifications' => $certifications, 'id' => $certification->id, 'profile_id' => $request->profile_id]);
    }

    public function store_experience(ExcperienceRequest $request)
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profiles/experience_logos', 'public');
        }
        // $formattedDate = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d');

        $profile_id = session('profile_id');

        // Save data to the database
        $experience = new Experience();
        $experience->profile_id = $profile_id;
        $experience->logo = $logoPath;
        $experience->company = $request->company;
        $experience->profession_id = $request->profession_id;
        $experience->started_at = $request->started_at;
        $experience->finished_at = $request->finished_at;
        $experience->project_name = $request->project;
        $experience->skills_tech = $request->skills_tech;
        $experience->date = $request->date;
        $experience->description = $request->description;
        $experience->save();

        $experiences = Experience::where("profile_id", $this->getOrCreateProfile()->id)->with('profession')->get();

        return response()->json(['message' => 'Formation saved successfully!', 'experience' => $experience, 'experiences' => $experiences, 'id' => $experience->id, 'profile_id' => $request->profile_id]);
    }

    public function store_skill(SkillRequest $request)
    {
        $profile_id = session('profile_id');
        foreach ($request->technical_skills as $skill) {
            ProfileSkill::updateOrCreate([
                'skill_id' => $skill['skill'],
                'level' => $skill['level'],
                'weight' => $skill['weight'],
                'profile_id' => $profile_id,
            ]);
        }

        // Save personal skills
        foreach ($request->personal_skills as $skill) {
            // Skill::where("id", $skill['skill'])->get()->level ?? null
            ProfileSkill::updateOrCreate([
                'skill_id' => $skill['skill'],
                'weight' => $skill['weight'],
                'level' => $skill['level'],
                'profile_id' => $profile_id,
            ]);
        }
        return response()->json(['message' => 'Formation saved successfully!',  'profile_id' => $profile_id]);
    }

    public function store_language(LanguagesRequest $request)
    {
        $profile_id = session('profile_id');

        foreach ($request->skills as $skillData) {
            if (ProfileSkill::where("skill_id", $skillData['skill'])->exists()) {
                continue;
            }

            ProfileSkill::updateOrCreate([
                'profile_id' => $profile_id,
                'skill_id' => $skillData['skill'],
                'weight' => $skillData['weight'],
                'level' => $skillData['level'],
            ]);
        }

        // Ensure the last skillData exists before proceeding
        if (empty($skillData)) {
            return response()->json(['message' => 'No skills provided.'], 400);
        }

        $skill = Skill::where("id", $skillData['skill'])->with("skillType")->first();

        if (!$skill) {
            return response()->json(['message' => 'Skill not found.'], 404);
        }

        $language = SkillType::find($skill->skill_type_id);

        $languages = ProfileSkill::where('profile_id', $profile_id)
            ->whereHas('skill.skillType', function ($query) {
                $query->where('parent_id', 3);
            })
            ->with('skill.skillType')
            ->get()
            ->pluck('skill.skillType')
            ->unique()
            ->values();

        if ($languages->isEmpty()) {
            $languages = SkillType::where("id", $skill->skill_type_id)->get();
        }

        return response()->json([
            'message' => 'Language saved successfully!',
            'language' => $language,
            'languages' => $languages,
            'profile_id' => $profile_id
        ]);
    }

    public function getLangSkills($langId)
    {
        // dd($this->getOrCreateProfile()->languagesSkills($langId));
        return response()->json(['message' => 'skills geted successfully!', 'skills' => $this->getOrCreateProfile()->languagesSkills($langId)]);
    }

    public function store_recommandation(RecommandationRequest $request)
    {
        $profile_id = session('profile_id');

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
        ]);
        $recommandations = $this->getOrCreateProfile()->recommandations;
        return response()->json(['message' => 'Language saved successfully!', 'recommandation' => $recommandation, 'recommandations' => $recommandations, 'profile_id' => $profile_id]);
    }

    public function store_cover_letter(CoverLetterRequest $request)
    {
        $profile_id = session('profile_id');

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

    public function store_attentes(Request $request)
    {
        $profile = $this->getOrCreateProfile();
        $profile->profession_id = $request->profession_id;
        $profile->contract_type = $request->contract_type;
        $profile->activity_area_id = $request->activity_area_id;
        $profile->categorie_socio_professionnelle = $request->categorie_socio_professionnelle;
        $profile->company_size = $request->company_size;
        $profile->license_types = $request->license_types;
        $profile->has_driving_license = filter_var($request->has_driving_license, FILTER_VALIDATE_BOOLEAN);
        $profile->update();

        foreach ($request->mobility as $type => $mobility) {
            $mobilityOptionType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $mobilityOptionType->id,
                ],
                [
                    'is_active' => filter_var($mobility['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $mobility['weight'],
                ]
            );
        }

        foreach ($request->work_mode as $type => $workMode) {
            $workModeType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $workModeType->id,
                ],
                [
                    'is_active' => filter_var($workMode['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $workMode['weight'],
                ]
            );
        }

        foreach ($request->availability as $type => $value) {
            $availabilityOptionType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $availabilityOptionType->id,
                ],
                [
                    'is_active' => $type === 'type' && $value === 'immediate',
                    'notice_period_per_month' => $type === 'notice_duration' ? (int) $value : null,
                ]
            );
        }


        foreach ($request->work_time as $type => $workTime) {
            if (isset($workTime['is_active']) && isset($workTime['weight'])) {
                $workTimeType = MobilityOptionType::firstOrCreate(
                    ['slug' => $type],
                    ['label' => ucfirst($type)]
                );
                MobilityOption::updateOrCreate(
                    [
                        'profile_id' => $profile->id,
                        'mobility_option_type_id' => $workTimeType->id,
                    ],
                    [
                        'is_active' => filter_var($workTime['is_active'], FILTER_VALIDATE_BOOLEAN),
                        'weight' => (int) $workTime['weight'],
                    ]
                );
            } else {
                Log::warning("Invalid work time data for type: {$type}");
            }
        }

        return response()->json(['message' => 'Mobility saved successfully!', 'profile_id' => $profile->id]);
    }

    public function delete_profile($id)
    {
        // Find the profile by ID
        $profile = Profile::findOrFail($id);

        // Delete associated data before deleting the profile
        $profile->formations()->delete();
        $profile->certifications()->delete();
        $profile->experiences()->delete();
        $profile->skills()->delete();
        $profile->recommandations()->delete();
        $profile->coverLetters()->delete();

        // Delete the profile
        $profile->delete();

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
            ])->where('is_talented', true)->with('profession', 'diploma', 'formations', 'formations.diploma', 'formations.option');

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
                $experienceYears = intval($request->experience);
                $profiles->where('total_experience_in_years', '>=', $experienceYears);
            }

            if ($request->has('poste') && $request->poste !== 'Tous') {
                $profiles->whereHas('profession', function ($query) use ($request) {
                    $query->where('id', $request->poste);
                });
            }

            if ($request->has('contract_type') && $request->contract_type !== 'Tous') {
                $profiles->where('contract_type', $request->contract_type);
            }

            if ($request->has('pays') && $request->pays !== 'Tous') {
                $profiles->whereHas('city.country', function ($query) use ($request) {
                    $query->where('id', $request->pays);
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
                        ? $formation->diploma->label
                        : ' - ';
                })

                ->addColumn('total_experience', function ($profile) {

                    return $profile->total_experience_in_years . ' ans' . ' et ' . $profile->total_experience_in_months . ' mois';
                })

                ->addColumn('current_profession', function ($profile) {
                    return $profile->profession ? $profile->profession->label : ' - ';
                })
                ->addColumn('tab', function ($profile) {
                    return '';
                })

                ->addColumn('option', function ($profile) {
                    $formation = $profile->formations->first();

                    return $formation && $formation->option
                        ? $formation->option->label
                        : ' - ';
                })


                ->addColumn('desired_profession', function ($profile) {
                    return  $profile->profession ? $profile->profession->label :  'Non défini';
                })

                ->addColumn('action', function ($profile) {
                    return '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="' . route('profile.show', $profile->id) . '" >Détail</a></li>
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
    public function update_information(InformationsRequest $request)
    {
        $profile = Profile::findOrFail($request->id);

        $profile->sexe = $request->civility == 1 ? 'Homme' : 'Femme';
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->family_situation = $request->family_situation;
        $profile->birth_date = $request->birth_date;
        $profile->birth_place = $request->birth_place;
        $profile->nationality = $request->nationality;
        $profile->address = $request->address;
        $profile->postal_code = $request->postal_code;
        $profile->city_id = $request->city_id;
        if ($request->phone_primary != $profile->phone_primary)
            $profile->phone_primary = $request->phone_primary;
        if ($request->phone_secondary != $profile->phone_secondary)
            $profile->phone_secondary = $request->phone_secondary;
        if ($request->email != $profile->email)
            $profile->email = $request->email;
        $profile->url_facebook = $request->url_facebook;
        $profile->url_linkedin = $request->url_linkedin;
        $profile->url_twitter = $request->url_twitter;
        $profile->salary_expectation = $request->salary_expectation;
        $profile->contract_type = $request->contract_type;
        $profile->profession_id = $request->profession_id;
        $profile->source = $request->source;

        if ($request->hasFile('cv')) {
            $profile->path_cv_manual = $request->file('cv')->store('profiles/cvs', 'public');
        }

        if ($request->hasFile('cover_letter')) {
            $profile->path_cover_letter = $request->file('cover_letter')->store('profiles/cover_letters', 'public');
        }

        if ($request->hasFile('video')) {
            $profile->path_cv_video = $request->file('video')->store('profiles/videos', 'public');
        }

        $profile->update();
        return response()->json(['message' => 'Profile updated successfully!', 'profile' => $profile]);
    }

    public function update_formation(FormationRequest $request)
    {
        $formation = Formation::findOrFail($request->id);

        if ($request->hasFile('logo')) {
            $formation->logo = $request->file('logo')->store('profiles/formation_logos', 'public');
        }

        $formation->profile_id = session('profile_id');
        $formation->name = $request->name;
        $formation->city_id = $request->city_id;
        $formation->address = $request->address;
        $formation->phone = $request->phone;
        $formation->email = $request->email;
        $formation->date = $request->date;
        $formation->level_id = $request->level_id;
        $formation->diploma_id = $request->diploma_id;
        $formation->option_id = $request->option_id;
        $formation->description = $request->description;
        $formation->mention = $request->mention;
        $formation->started_at = $request->started_at;
        $formation->finished_at = $request->finished_at;
        $formation->update();

        // $formations = $this->getOrCreateProfile()->formations;
        $formations = Formation::where("profile_id", $this->getOrCreateProfile()->id)->with('level', 'diploma', 'city', 'option')->get();

        return response()->json(['message' => 'Formation updated successfully!', 'formation' => $formation, 'formations' => $formations]);
    }
    public function update_certification(CertificationRequest $request)
    {
        $certification = Certification::findOrFail($request->id);

        if ($request->hasFile('logo')) {
            $certification->logo = $request->file('logo')->store('profiles/certification_logos', 'public');
        }

        $certification->profile_id = session('profile_id');
        $certification->organisme = $request->organisme;
        $certification->numero_accreditation = $request->numero_accreditation;
        $certification->adresse = $request->adresse;
        $certification->city_id = $request->city_id;
        // $certification->pays = $request->pays;
        $certification->telephone_1 = $request->telephone_1;
        $certification->telephone_2 = $request->telephone_2;
        $certification->email = $request->email;
        $certification->nom_certification = $request->nom_certification;
        $certification->criteres_evaluation = $request->criteres_evaluation;
        $certification->theme_certification = $request->theme_certification;
        $certification->score_resultat = $request->score_resultat;
        $certification->niveau_certification = $request->niveau_certification;
        $certification->date_obtention = $request->date_obtention;
        $certification->volume_horaire = $request->volume_horaire;
        $certification->date_expiration = $request->date_expiration;


        $certification->update();
        // $certifications = $this->getOrCreateProfile()->certifications;
        $certifications = Certification::where("profile_id", $this->getOrCreateProfile()->id)->with('city')->get();

        return response()->json(['message' => 'Certification updated successfully!', 'certification' => $certification, 'certifications' => $certifications]);
    }
    public function update_experience(CertificationRequest $request)
    {
        $experience = Experience::findOrFail($request->id);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profiles/experience_logos', 'public');
        }
        // $formattedDate = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d');

        $experience->logo = $logoPath;
        $experience->company = $request->company;
        $experience->profession_id = $request->profession_id;
        $experience->started_at = $request->started_at;
        $experience->finished_at = $request->finished_at;
        $experience->project_name = $request->project;
        $experience->skills_tech = $request->skills_tech;
        $experience->date = $request->date;
        $experience->description = $request->description;

        $experience->update();

        // $experiences = $this->getOrCreateProfile()->experiences;

        $experiences = Experience::where("profile_id", $this->getOrCreateProfile()->id)->with('profession')->get();

        return response()->json(['message' => 'Experience updated successfully!', 'experience' => $experience, 'experiences' => $experiences]);
    }

    public function update_skill(SkillRequest $request)
    {
        $profile_id = session('profile_id');

        // Update technical skills
        foreach ($request->technical_skills as $skill) {

            ProfileSkill::updateOrCreate(
                [
                    'profile_id' => $profile_id,
                    'skill_id' => $skill['skill'],
                ],
                [
                    'level' => $skill['level'],
                    'weight' => $skill['weight'],
                ]
            );
        }

        // Update personal skills
        foreach ($request->personal_skills as $skill) {

            ProfileSkill::updateOrCreate(
                [
                    'profile_id' => $profile_id,
                    'skill_id' => $skill['skill'],
                ],
                [
                    'level' => $skill['level'],
                    'weight' => $skill['weight'],
                ]
            );
        }

        return response()->json([
            'message' => 'Skills updated successfully!',
            'profile_id' => $profile_id,
        ]);
    }

    public function update_language(LanguagesRequest $request)
    {
        $profile_id = session('profile_id');

        foreach ($request->skills as $skillData) {
            ProfileSkill::updateOrCreate(
                [
                    'profile_id' => $this->getOrCreateProfile()->id,
                    'skill_id' => $skillData['skill'],
                ],
                [
                    'weight' => $skillData['weight'],
                    'level' => $skillData['level'],
                ]
            );
        }


        $skillTypeIds = ProfileSkill::where('profile_id', $this->getOrCreateProfile()->id)
            ->whereHas('skill')
            ->with('skill')
            ->get()
            ->pluck('skill.skill_type_id')
            ->unique();

        $languages = SkillType::whereIn('id', $skillTypeIds)
            ->where('parent_id', 3)
            ->with(['skills' => function ($query) use ($skillTypeIds) {
                $query->whereIn('skill_type_id', $skillTypeIds);
            }])
            ->get();

        return response()->json(['message' => 'Language updated successfully!', 'profile_id' => $profile_id, 'languages' => $languages]);
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

        $recommandation->update();

        $recommandations = $this->getOrCreateProfile()->recommandations;

        return response()->json(['message' => 'Recommendation updated successfully!', 'recommandation' => $recommandation, 'profile_id' => $profile_id, 'recommandations' => $recommandations]);
    }
    public function update_attentes(AttentesRequest $request)
    {
        $profileId = session('profile_id');
        $profile = Profile::findOrFail($profileId);

        $profile->profession_id = $request->profession_id;
        $profile->contract_type = $request->contract_type;
        $profile->activity_area_id = $request->activity_area_id;
        $profile->categorie_socio_professionnelle = $request->categorie_socio_professionnelle;
        $profile->company_size = $request->company_size;
        $profile->license_types = $request->license_types;
        $profile->has_driving_license = filter_var($request->has_driving_license, FILTER_VALIDATE_BOOLEAN);
        $profile->update();

        foreach ($request->mobility as $type => $mobility) {
            $mobilityOptionType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $mobilityOptionType->id,
                ],
                [
                    'is_active' => filter_var($mobility['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $mobility['weight'],
                ]
            );
        }

        foreach ($request->work_mode as $type => $workMode) {
            $workModeType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $workModeType->id,
                ],
                [
                    'is_active' => filter_var($workMode['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $workMode['weight'],
                ]
            );
        }

        foreach ($request->availability as $type => $value) {
            $availabilityOptionType = MobilityOptionType::firstOrCreate(['slug' => ucfirst($type)], [
                'label' => ucfirst($type),
            ]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $availabilityOptionType->id,
                ],
                [
                    'is_active' => $type === 'type' && $value === 'immediate',
                    'notice_period_per_month' => $type === 'notice_duration' ? (int) $value : null,
                ]
            );
        }

        foreach ($request->input('work_time', []) as $key => $data) {
            $mobilityOptionType = MobilityOptionType::where('slug', $key)->first();

            if ($mobilityOptionType) {
                MobilityOption::updateOrCreate(
                    [
                        'profile_id' => $profileId,
                        'mobility_option_type_id' => $mobilityOptionType->id,
                    ],
                    [
                        'is_active' => isset($data['is_active']) ? filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN) : false,
                        'weight' => isset($data['weight']) ? (int) $data['weight'] : null,
                    ]
                );
            }
        }


        return response()->json(['message' => 'Expectations updated successfully!', 'profile_id' => $profileId]);
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
            $formation->delete();
            $formations = Formation::where("profile_id", $this->getOrCreateProfile()->id)->with('level', 'diploma', 'city', 'option')->get();
            return response()->json(['message' => 'Formation deleted successfully.', 'formations' => $formations], 200);
        }
        return response()->json(['message' => 'Formation not found.'], 404);
    }
    public function delete_certification($id)
    {
        $certification = Certification::find($id);
        if ($certification) {
            $certification->delete();
            $certifications = Certification::where("profile_id", $this->getOrCreateProfile()->id)->with('city')->get();
            return response()->json(['message' => 'Certification deleted successfully.', 'certifications', $certifications], 200);
        }
        return response()->json(['message' => 'Certification not found.'], 404);
    }

    public function delete_experience($id)
    {
        $experience = Experience::find($id);
        if ($experience) {
            $experience->delete();
            $experiences = Experience::where("profile_id", $this->getOrCreateProfile()->id)->with('profession')->get();
            return response()->json(['message' => 'Experience deleted successfully.', 'experiences' => $experiences], 200);
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
            $skills = ProfileSkill::where('profile_id', $this->getOrCreateProfile()->id)
                ->whereHas('skill', function ($query) use ($id) {
                    $query->whereHas('skillType', function ($subQuery) use ($id) {
                        $subQuery->where('parent_id', 3)
                            ->where('id', $id);
                    });
                })
                ->delete();


            $skillTypeIds = ProfileSkill::where('profile_id', $this->getOrCreateProfile()->id)
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
            $recommandations = $this->getOrCreateProfile()->recommandations;
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
            $profile->talent_folder_id = $request->folder_id;
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
}