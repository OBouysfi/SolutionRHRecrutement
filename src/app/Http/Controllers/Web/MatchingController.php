<?php

namespace App\Http\Controllers\Web;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\JobOfferSalaryExpectation;
use App\Models\MatchingDetail;
use App\Models\Profile;
use App\Models\JobOffer;
use App\Models\Matching;
use App\Services\MatchingService;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\candidateTrackingOverview;
use App\Models\ActivityLog;
use App\Models\EvaluationType;
use App\Models\Evaluator;
use App\Models\MobilityOption;
use App\Models\Recommandation;
use App\Models\Timeline;
use App\Models\Profession;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MatchingExport;
use function PHPSTORM_META\map;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MatchingController extends Controller
{
    protected $matching;

    /**
     * Crée une nouvelle instance du contrôleur.
     * Injection du modèle JobOffer et application des middlewares
     */
    public function __construct(Matching $matching)
    {
        // Injection du modèle Matching
        $this->matching = $matching;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:matching-listing')->only(['listing']);
        $this->middleware('permission:matching-detail')->only(['view']);
    }

    public function listing()
    {
        $clients = Client::all();
        $jobOffers = JobOffer::with('client','profession')->get();
        $professions = Profession::all();
        $matching = Matching::with('profile')->get();
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->endOfMonth()->toDateString();
        $status_jobOffres = StatusJobOfferEnum::getAll();


        return view('matching.listing', compact('clients', 'jobOffers','professions','startDate','endDate','matching','status_jobOffres'));
    }

    public function preview()
    {

        $matching = Matching::with('profile')->get();
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->endOfMonth()->toDateString();


        return view('matching.inc.preview', compact('matching','startDate','endDate'));
    }

    public function export(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new MatchingExport, 'Matching.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new MatchingExport, 'Matching.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }

    public function matchOne($profileId, $jobOfferId)
    {
        $profile = Profile::findOrFail($profileId);
        $offer = JobOffer::findOrFail($jobOfferId);


        $service = new MatchingService();
        $match = $service->matchProfileToJobOffer($profile, $offer);

        return view('matching.listing', compact('match'));
    }

    public function view(Matching $match, Profile $profile, JobOffer $jobOffer)
    {
        $match->ratio = round($match->ratio, 2);
        $grouped = $profile->skills->groupBy('skill_type_id');
        $recommendations = Recommandation::where('profile_id', $profile->id)->get();
        $mobility = $profile->activatedMobilityoptions();
        $evaluators = Evaluator::get();
        $types_evaluations = EvaluationType::get();

        // Récupérer le terme de recherche & timelines
        $search = request('search');

        $timelines = Timeline::whereHas('activityLog', function ($query) use ($profile) {
            $query->where('profile_id', $profile->id);
        })
        ->when($search, function ($query) use ($search) {
            $query->where('description', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate(10);



        $matchingDetails = MatchingDetail::where('match_id', $match->id)->get();
        $matchingFomationScore = $matchingDetails->where('type', 'formation')->sum('skill_match_score') * 100;
        $matchingFomationScore = round($matchingFomationScore, 2);

        $matchingExperienceScore = $matchingDetails->where('type', 'experience')->sum('skill_match_score') * 100;
        $matchingTypeContractScore = $matchingDetails->where('type', 'contract_type')->sum('skill_match_score') * 100;
        $matchingTypeContractScore = round($matchingTypeContractScore, 2);

        $matchingSalaryScore = $matchingDetails->where('type', 'salary')->sum('skill_match_score') * 100;
        $matchingSalaryScore = round($matchingSalaryScore, 2);

        $matchingMobilityScore = $matchingDetails->where('type', 'mobilite_geographique')->sum('skill_match_score') * 100;
        $matchingMobilityScore = round($matchingMobilityScore, 2);

        $matchingLocalScore = $matchingDetails->where('type', 'local')->sum('skill_match_score') * 100;
        $matchingRegionalScore = $matchingDetails->where('type', 'regional')->sum('skill_match_score') * 100;
        $matchingNationalScore = $matchingDetails->where('type', 'national')->sum('skill_match_score') * 100;
        $matchingInternationalScore = $matchingDetails->where('type', 'international')->sum('skill_match_score') * 100;


        $matchingModeTravailScore = $matchingDetails->where('type', 'mode_de_travail')->sum('skill_match_score') * 100;
        $matchingModeTravailScore = round($matchingModeTravailScore, 2);

        $matchingPresentielScore = $matchingDetails->where('type', 'onsite')->sum('skill_match_score') * 100;
        $matchingRemoteScore = $matchingDetails->where('type', 'remote')->sum('skill_match_score') * 100;
        $matchingHybridScore = $matchingDetails->where('type', 'hybrid')->sum('skill_match_score') * 100;

        $matchingTempsTravail = $matchingDetails->where('type', 'temps_de_travail')->sum('skill_match_score') * 100;
        $matchingTempsTravail = round($matchingTempsTravail, 2);

        $matchingFullTimeScore = $matchingDetails->where('type', 'full_time')->sum('skill_match_score') * 100;
        $matchingPartTimeScore = $matchingDetails->where('type', 'part_time')->sum('skill_match_score') * 100;
        $allMatchingSkills = MatchingDetail::where('match_id', $match->id)->with('skill.skillType') // Charge la relation skill
        ->whereNotNull('skill_id')
        ->get()
            ->groupBy(function ($detail) {
                return $detail->skill->skill_type_id; // Grouper par skill_type_id
            });

        $matchingSkills = $allMatchingSkills->filter(function ($skills, $skillTypeId) {
            // Exclure les compétences avec parent_id = 3
            return $skills->first()->skill->skillType->parent_id === 1;
        });

        $matchingPersonalSkills = $allMatchingSkills->filter(function ($skills, $skillTypeId) {
            // Exclure les compétences avec parent_id = 3
            return $skills->first()->skill->skillType->parent_id === 2;
        });

        $linguisticSkills = $allMatchingSkills->filter(function ($skills, $skillTypeId) {
            return optional($skills->first()->skill->skillType)->parent_id === 3;
        });


        $matchingDetailProfile = $matchingDetails->whereIn('type', ['profession', 'formation', 'contract_type', 'salary']);

        $matchingDetailProfile = $matchingDetailProfile->map(function ($detail) {
            $detail->match = $detail->matching;
            $profile = $detail->matching->profile->load(['experiences', 'formations']);
            $jobOffer = $detail->matching->jobOffer->load(['jobOfferFormation', 'jobOfferExperience']);
            if($detail->type === 'profession'){
                $professionIndicator = $profile->profession->label ?? '';
                $detail->profileIndicator = $professionIndicator;

                $experienceJobOffer = $jobOffer->jobOfferExperience->where('job_offer_id', $jobOffer->id)->first();
                $experienceJobOfferIndicator = $jobOffer?->profession?->label  ?? '';
                $detail->jobOfferIndicator = $experienceJobOfferIndicator;
                $detail->weight = $experienceJobOffer->weight_profession ?? '';
                $detail->ecart = $detail->jobOfferIndicator === $detail->profileIndicator ? 0 : 100;
                $detail->score = $detail->skill_match_score;
                $detail->name = 'Profession';
            }
            else if($detail->type === 'formation'){
                $formation = $profile->formations->where('profile_id', $profile->id)->first();
                $formationIndicator = $formation->diploma->label ?? '' ;
                $detail->profileIndicator = $formationIndicator;


                $formationJobOffer = $jobOffer->jobOfferFormation->where('job_offer_id', $jobOffer->id)->first();
                $formationJobOfferIndicator = $formationJobOffer->diploma->label ?? '';

                $detail->jobOfferIndicator = $formationJobOfferIndicator;
                $detail->weight = $formationJobOffer->weight_formation ?? '';
                $detail->score = $detail->skill_match_score;
                $detail->ecart = (1 - $detail->score)*100;
                $detail->name = 'Formation';
            }
            else if($detail->type === 'contract_type'){
                $contractType = ContractTypeProfileEnum::getValue($profile->contract_type);
                $detail->profileIndicator = $contractType;
                $jobOfferContractType = $jobOffer ? ContractTypeProfileEnum::getValue($jobOffer->contract_type_id) : null;
                $detail->jobOfferIndicator = $jobOfferContractType;
                $detail->weight = 0;
                $detail->ecart = $profile->contract_type == $jobOffer->contract_type_id ? 0 : 100;
                $detail->score = $detail->skill_match_score;
                $detail->name = 'Contrat de travail';

            }
            else if($detail->type === 'salary'){
                $detail->profileIndicator = $profile->min_expected_salary.' - '.$profile->max_expected_salary;
                $jobOfferSalary = $jobOffer && isset($jobOffer->salaryExpectation) ? $jobOffer->salaryExpectation->min_salary.' - '.$jobOffer->salaryExpectation->max_salary : null;
                $detail->jobOfferIndicator = $jobOfferSalary;
                $detail->weight = 0;
                $detail->score = $detail->skill_match_score;
                $detail->ecart = (1 - $detail->score)*100;
                $detail->name = 'Salaire';
            }
            $detail->profile = $profile;

            return $detail;
        });


        $matchingDetailSkills = $matchingDetails->whereNotNull('skill_id');

        $matchingDetailsTechnicalSkills = $matchingDetailSkills->filter(function ($detail) {
            return in_array(optional($detail->skill->skillType)->parent_id, [1]);
        });


        $matchingDetailsPersonalSkills = $matchingDetailSkills->filter(function ($detail) {
            return in_array(optional($detail->skill->skillType)->parent_id, [2]);
        });

        $matchingDetailsLinguistiqueSkills = $matchingDetailSkills->filter(function ($detail) {
            return $detail->skill->skillType->parent_id === 3;
        });



        $matchingDetailsTechnicalSkills = $matchingDetailsTechnicalSkills->map(function ($detail) {
            $detail->skillName = $detail->skill->label;
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;

            return $detail;
        })->groupBy(function ($detail) {
            return $detail->skill->skillType->label;
        });

        $matchingDetailsPersonalSkills = $matchingDetailsPersonalSkills->map(function ($detail) {
            $detail->skillName = $detail->skill->label;
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;

            return $detail;
        })->groupBy(function ($detail) {
            return $detail->skill->skillType->label;
        });



        $matchingDetailMobilityGeographique = $matchingDetails->whereIn('type', ['local', 'regional', 'national', 'international']);
        $matchingDetailMobilityGeographique = $matchingDetailMobilityGeographique->map(function ($detail) {
            $detail->mobility = $detail->type === 'local' ? 'Local' : ($detail->type === 'regional' ? 'Regional' : ($detail->type === 'national' ? 'National' : 'International'));
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;
            return $detail;
        });

        $matchingDetailsModeWork = $matchingDetails->whereIn('type', ['onsite', 'remote', 'hybrid']);
        $matchingDetailsModeWork = $matchingDetailsModeWork->map(function ($detail) {
            $detail->modeWork = $detail->type === 'onsite' ? 'Presentiel' : ($detail->type === 'remote' ? 'Remote' : ($detail->type === 'hybrid' ? 'Hybrid' : ''));
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;
            return $detail;
        });

        $matchingDetailsTimeWork = $matchingDetails->whereIn('type', ['full_time', 'part_time']);
        $matchingDetailsTimeWork = $matchingDetailsTimeWork->map(function ($detail) {
            $detail->timeWork = $detail->type === 'full_time' ? 'Full Time' : ($detail->type === 'part_time' ? 'Part Time' : '');
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;

            return $detail;
        });

        $matchingDetailsLinguistiqueSkills = $matchingDetailsLinguistiqueSkills->map(function ($detail) {
            $detail->skillName = $detail->skill->label;
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;
            return $detail;
        });
        $matchingDetailsLinguistiqueSkills = $matchingDetailsLinguistiqueSkills->groupBy(function ($detail) {
            return $detail->skill->skillType->label;
        });

        ActivityLog::updateOrInsert(
            [
                'log_type' => 'match',
                'user_id' => auth()->id(),
                'match_id' => $match->id,
                'profile_id' => $profile->id,
                'job_offer_id' => $jobOffer->id,
            ],
            [
                'match_date' => now(),
                'updated_at' => now(),
            ]
        );


        $clientEvaluators = is_array($jobOffer->client_evaluator) ? $jobOffer->client_evaluator : json_decode($jobOffer->client_evaluator, true);
        if (!is_array($clientEvaluators)) {
            $clientEvaluators = [];
        }

        $evaluatorAuthenticated = Auth::user()->evaluator;
        $evaluator = Evaluator::whereIn('id', $clientEvaluators)->get();
        $evaluators_evaluation = $evaluator->flatMap(function ($ev) {
            return $ev->typeCoefficients->map(function ($evaluator) {
                $evaluator->id = $evaluator->evaluator->id;
                $evaluator->coefficient = $evaluator->coefficient;
                $evaluator->evaluation_type = $evaluator->evaluationType->name;
                $evaluator->evaluation_type_id = $evaluator->evaluationType->id;

                $evaluation = Evaluation::where('evaluator_id', $evaluator->evaluator->id)
                    ->where('evaluation_type_id', $evaluator->evaluation_type_id)->first();

                $evaluator->path_logo = $evaluator->evaluator->path_logo;
                $evaluator->first_name = $evaluator->evaluator->first_name;
                $evaluator->last_name = $evaluator->evaluator->last_name;
                $evaluator->mark = $evaluation->mark ?? '';
                $evaluator->evaluation = $evaluation->evaluation ?? '';
                $evaluator->ponderation = $evaluation->ponderation ?? '';
                $evaluator->can_evaluate = isset($evaluatorAuthenticated) && $evaluator->evaluator->id == $evaluatorAuthenticated->id ? 1 : 0;
                return $evaluator;
            });
        });



        $evaluatorsCompany = Evaluator::whereNot('company_id', null)->get();
        $evaluatorsEvaluationCompany = $evaluatorsCompany->flatMap(function ($ev) {
            return $ev->typeCoefficients->map(function ($evaluator) {
                $evaluator->id = $evaluator->evaluator->id;
                $evaluator->coefficient = $evaluator->coefficient;
                $evaluator->evaluation_type = $evaluator->evaluationType->name;
                $evaluator->evaluation_type_id = $evaluator->evaluationType->id;

                $evaluation = Evaluation::where('evaluator_id', $evaluator->evaluator->id)
                    ->where('evaluation_type_id', $evaluator->evaluation_type_id)->first();

                $evaluator->path_logo = $evaluator->evaluator->path_logo;
                $evaluator->first_name = $evaluator->evaluator->first_name;
                $evaluator->last_name = $evaluator->evaluator->last_name;
                $evaluator->mark = $evaluation->mark ?? '';
                $evaluator->evaluation = $evaluation->evaluation ?? '';
                $evaluator->ponderation = $evaluation->ponderation ?? '';
                $evaluator->can_evaluate = isset($evaluatorAuthenticated) && $evaluator->evaluator->id == $evaluatorAuthenticated->id ? 1 : 0;

                return $evaluator;
            });
        });

        return view('matching.detailMatching', [
                'match' => $match,
                'profile' => $profile,
                'joboffer' => $jobOffer,
                'evaluators_evaluation' => $evaluators_evaluation,
                'evaluatorsEvaluationCompany' => $evaluatorsEvaluationCompany,
                'skillsgroup' => $grouped,
                'recommendations' => $recommendations,
                'mobility' => $mobility,
                'evaluators' => $evaluators,
                'types_evaluations' => $types_evaluations,
                'timelines' => $timelines,
                'matchingFomationScore' => $matchingFomationScore,
                'matchingExperienceScore' => $matchingExperienceScore,
                'matchingTypeContractScore' => $matchingTypeContractScore,
                'matchingMobilityScore' => $matchingMobilityScore,
                'matchingRegionalScore' => $matchingRegionalScore,
                'matchingLocalScore'=>$matchingLocalScore,
                'matchingNationalScore' => $matchingNationalScore,
                'matchingInternationalScore' => $matchingInternationalScore,
                'matchingModeTravailScore' => $matchingModeTravailScore,
                'matchingPresentielScore' => $matchingPresentielScore,
                'matchingRemoteScore' => $matchingRemoteScore,
                'matchingHybridScore' => $matchingHybridScore,
                'matchingTempsTravail' => $matchingTempsTravail,
                'matchingFullTimeScore' => $matchingFullTimeScore,
                'matchingPartTimeScore' => $matchingPartTimeScore,
                'matchingSkills' => $matchingSkills,
                'matchingPersonalSkills' => $matchingPersonalSkills,
                'linguisticSkills' => $linguisticSkills,
                'matchingDetailProfile' => $matchingDetailProfile,
                'matchingDetailsTechnicalSkills' => $matchingDetailsTechnicalSkills,
                'matchingDetailsLinguistiqueSkills' => $matchingDetailsLinguistiqueSkills,
                'matchingDetailMobilityGeographique' => $matchingDetailMobilityGeographique,
                'matchingDetailsModeWork' => $matchingDetailsModeWork,
                'matchingDetailsTimeWork' => $matchingDetailsTimeWork,
                'matchingDetailsPersonalSkills' => $matchingDetailsPersonalSkills,
                'matchingSalaryScore' => $matchingSalaryScore
                ]
        );
    }



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
            ->send(new candidateTrackingOverview($data));

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Lien partagé avec succès !');
    }


    public function detailMatchingPreview(Matching $match, Profile $profile, JobOffer $jobOffer)
    {
        $match->ratio = round($match->ratio, 2);
        $grouped = $profile->skills->groupBy('skill_type_id');
        $recommendations = Recommandation::where('profile_id', $profile->id)->get();
        $mobility = $profile->activatedMobilityoptions();
        $evaluators = Evaluator::get();
        $types_evaluations = EvaluationType::get();

        // Récupérer le terme de recherche & timelines
        $search = request('search');

        $timelines = Timeline::whereHas('activityLog', function ($query) use ($profile) {
            $query->where('profile_id', $profile->id);
        })
            ->when($search, function ($query) use ($search) {
                $query->where('description', 'like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate(10);



        $matchingDetails = MatchingDetail::where('match_id', $match->id)->get();
        $matchingFomationScore = $matchingDetails->where('type', 'formation')->sum('skill_match_score') * 100;
        $matchingFomationScore = round($matchingFomationScore, 2);

        $matchingExperienceScore = $matchingDetails->where('type', 'experience')->sum('skill_match_score') * 100;
        $matchingTypeContractScore = $matchingDetails->where('type', 'contract_type')->sum('skill_match_score') * 100;
        $matchingTypeContractScore = round($matchingTypeContractScore, 2);

        $matchingSalaryScore = $matchingDetails->where('type', 'salary')->sum('skill_match_score') * 100;
        $matchingSalaryScore = round($matchingSalaryScore, 2);

        $matchingMobilityScore = $matchingDetails->where('type', 'mobilite_geographique')->sum('skill_match_score') * 100;
        $matchingMobilityScore = round($matchingMobilityScore, 2);

        $matchingLocalScore = $matchingDetails->where('type', 'local')->sum('skill_match_score') * 100;
        $matchingRegionalScore = $matchingDetails->where('type', 'regional')->sum('skill_match_score') * 100;
        $matchingNationalScore = $matchingDetails->where('type', 'national')->sum('skill_match_score') * 100;
        $matchingInternationalScore = $matchingDetails->where('type', 'international')->sum('skill_match_score') * 100;


        $matchingModeTravailScore = $matchingDetails->where('type', 'mode_de_travail')->sum('skill_match_score') * 100;
        $matchingModeTravailScore = round($matchingModeTravailScore, 2);

        $matchingPresentielScore = $matchingDetails->where('type', 'onsite')->sum('skill_match_score') * 100;
        $matchingRemoteScore = $matchingDetails->where('type', 'remote')->sum('skill_match_score') * 100;
        $matchingHybridScore = $matchingDetails->where('type', 'hybrid')->sum('skill_match_score') * 100;

        $matchingTempsTravail = $matchingDetails->where('type', 'temps_de_travail')->sum('skill_match_score') * 100;
        $matchingTempsTravail = round($matchingTempsTravail, 2);

        $matchingFullTimeScore = $matchingDetails->where('type', 'full_time')->sum('skill_match_score') * 100;
        $matchingPartTimeScore = $matchingDetails->where('type', 'part_time')->sum('skill_match_score') * 100;
        $allMatchingSkills = MatchingDetail::where('match_id', $match->id)->with('skill.skillType') // Charge la relation skill
        ->whereNotNull('skill_id')
            ->get()
            ->groupBy(function ($detail) {
                return $detail->skill->skill_type_id; // Grouper par skill_type_id
            });

        $matchingSkills = $allMatchingSkills->filter(function ($skills, $skillTypeId) {
            // Exclure les compétences avec parent_id = 3
            return $skills->first()->skill->skillType->parent_id === 1;
        });

        $matchingPersonalSkills = $allMatchingSkills->filter(function ($skills, $skillTypeId) {
            // Exclure les compétences avec parent_id = 3
            return $skills->first()->skill->skillType->parent_id === 2;
        });

        $linguisticSkills = $allMatchingSkills->filter(function ($skills, $skillTypeId) {
            return optional($skills->first()->skill->skillType)->parent_id === 3;
        });


        $matchingDetailProfile = $matchingDetails->whereIn('type', ['profession', 'formation', 'contract_type', 'salary']);

        $matchingDetailProfile = $matchingDetailProfile->map(function ($detail) {
            $detail->match = $detail->matching;
            $profile = $detail->matching->profile->load(['experiences', 'formations']);
            $jobOffer = $detail->matching->jobOffer->load(['jobOfferFormation', 'jobOfferExperience']);
            if($detail->type === 'profession'){
                $professionIndicator = $profile->profession->label ?? '';
                $detail->profileIndicator = $professionIndicator;

                $experienceJobOffer = $jobOffer->jobOfferExperience->where('job_offer_id', $jobOffer->id)->first();
                $experienceJobOfferIndicator = $jobOffer?->profession?->label  ?? '';
                $detail->jobOfferIndicator = $experienceJobOfferIndicator;
                $detail->weight = $experienceJobOffer->weight_profession ?? '';
                $detail->ecart = $detail->jobOfferIndicator === $detail->profileIndicator ? 0 : 100;
                $detail->score = $detail->skill_match_score;
                $detail->name = 'Profession';
            }
            else if($detail->type === 'formation'){
                $formation = $profile->formations->where('profile_id', $profile->id)->first();
                $formationIndicator = $formation->diploma->label ?? '' ;
                $detail->profileIndicator = $formationIndicator;


                $formationJobOffer = $jobOffer->jobOfferFormation->where('job_offer_id', $jobOffer->id)->first();
                $formationJobOfferIndicator = $formationJobOffer->diploma->label ?? '';

                $detail->jobOfferIndicator = $formationJobOfferIndicator;
                $detail->weight = $formationJobOffer->weight_formation ?? '';
                $detail->score = $detail->skill_match_score;
                $detail->ecart = (1 - $detail->score)*100;
                $detail->name = 'Formation';
            }
            else if($detail->type === 'contract_type'){
                $contractType = ContractTypeProfileEnum::getValue($profile->contract_type);
                $detail->profileIndicator = $contractType;
                $jobOfferContractType = $jobOffer ? ContractTypeProfileEnum::getValue($jobOffer->contract_type_id) : null;
                $detail->jobOfferIndicator = $jobOfferContractType;
                $detail->weight = 0;
                $detail->ecart = $profile->contract_type == $jobOffer->contract_type_id ? 0 : 100;
                $detail->score = $detail->skill_match_score;
                $detail->name = 'Contrat de travail';

            }
            else if($detail->type === 'salary'){
                $detail->profileIndicator = $profile->min_expected_salary.' - '.$profile->max_expected_salary;
                $jobOfferSalary = $jobOffer && isset($jobOffer->salaryExpectation) ? $jobOffer->salaryExpectation->min_salary.' - '.$jobOffer->salaryExpectation->max_salary : null;
                $detail->jobOfferIndicator = $jobOfferSalary;
                $detail->weight = 0;
                $detail->score = $detail->skill_match_score;
                $detail->ecart = (1 - $detail->score)*100;
                $detail->name = 'Salaire';
            }
            $detail->profile = $profile;

            return $detail;
        });


        $matchingDetailSkills = $matchingDetails->whereNotNull('skill_id');

        $matchingDetailsTechnicalSkills = $matchingDetailSkills->filter(function ($detail) {
            return in_array(optional($detail->skill->skillType)->parent_id, [1]);
        });


        $matchingDetailsPersonalSkills = $matchingDetailSkills->filter(function ($detail) {
            return in_array(optional($detail->skill->skillType)->parent_id, [2]);
        });

        $matchingDetailsLinguistiqueSkills = $matchingDetailSkills->filter(function ($detail) {
            return $detail->skill->skillType->parent_id === 3;
        });



        $matchingDetailsTechnicalSkills = $matchingDetailsTechnicalSkills->map(function ($detail) {
            $detail->skillName = $detail->skill->label;
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;

            return $detail;
        })->groupBy(function ($detail) {
            return $detail->skill->skillType->label;
        });

        $matchingDetailsPersonalSkills = $matchingDetailsPersonalSkills->map(function ($detail) {
            $detail->skillName = $detail->skill->label;
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;

            return $detail;
        })->groupBy(function ($detail) {
            return $detail->skill->skillType->label;
        });



        $matchingDetailMobilityGeographique = $matchingDetails->whereIn('type', ['local', 'regional', 'national', 'international']);
        $matchingDetailMobilityGeographique = $matchingDetailMobilityGeographique->map(function ($detail) {
            $detail->mobility = $detail->type === 'local' ? 'Local' : ($detail->type === 'regional' ? 'Regional' : ($detail->type === 'national' ? 'National' : 'International'));
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;
            return $detail;
        });

        $matchingDetailsModeWork = $matchingDetails->whereIn('type', ['onsite', 'remote', 'hybrid']);
        $matchingDetailsModeWork = $matchingDetailsModeWork->map(function ($detail) {
            $detail->modeWork = $detail->type === 'onsite' ? 'Presentiel' : ($detail->type === 'remote' ? 'Remote' : ($detail->type === 'hybrid' ? 'Hybrid' : ''));
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;
            return $detail;
        });

        $matchingDetailsTimeWork = $matchingDetails->whereIn('type', ['full_time', 'part_time']);
        $matchingDetailsTimeWork = $matchingDetailsTimeWork->map(function ($detail) {
            $detail->timeWork = $detail->type === 'full_time' ? 'Full Time' : ($detail->type === 'part_time' ? 'Part Time' : '');
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;

            return $detail;
        });

        $matchingDetailsLinguistiqueSkills = $matchingDetailsLinguistiqueSkills->map(function ($detail) {
            $detail->skillName = $detail->skill->label;
            $detail->profileScore = $detail->profile_score * 100;
            $detail->jobOfferScore = $detail->job_offer_score * 100;
            $detail->score = $detail->skill_match_score * 100;
            $detail->ecart = 100 - $detail->score;
            return $detail;
        });
        $matchingDetailsLinguistiqueSkills = $matchingDetailsLinguistiqueSkills->groupBy(function ($detail) {
            return $detail->skill->skillType->label;
        });

        ActivityLog::updateOrInsert(
            [
                'log_type' => 'match',
                'user_id' => auth()->id(),
                'match_id' => $match->id,
                'profile_id' => $profile->id,
                'job_offer_id' => $jobOffer->id,
            ],
            [
                'match_date' => now(),
                'updated_at' => now(),
            ]
        );


        return view('matching.inc.previewRapport', [
                'match' => $match,
                'profile' => $profile,
                'joboffer' => $jobOffer,
                'skillsgroup' => $grouped,
                'recommendations' => $recommendations,
                'mobility' => $mobility,
                'evaluators' => $evaluators,
                'types_evaluations' => $types_evaluations,
                'timelines' => $timelines,
                'matchingFomationScore' => $matchingFomationScore,
                'matchingExperienceScore' => $matchingExperienceScore,
                'matchingTypeContractScore' => $matchingTypeContractScore,
                'matchingMobilityScore' => $matchingMobilityScore,
                'matchingRegionalScore' => $matchingRegionalScore,
                'matchingLocalScore'=>$matchingLocalScore,
                'matchingNationalScore' => $matchingNationalScore,
                'matchingInternationalScore' => $matchingInternationalScore,
                'matchingModeTravailScore' => $matchingModeTravailScore,
                'matchingPresentielScore' => $matchingPresentielScore,
                'matchingRemoteScore' => $matchingRemoteScore,
                'matchingHybridScore' => $matchingHybridScore,
                'matchingTempsTravail' => $matchingTempsTravail,
                'matchingFullTimeScore' => $matchingFullTimeScore,
                'matchingPartTimeScore' => $matchingPartTimeScore,
                'matchingSkills' => $matchingSkills,
                'matchingPersonalSkills' => $matchingPersonalSkills,
                'linguisticSkills' => $linguisticSkills,
                'matchingDetailProfile' => $matchingDetailProfile,
                'matchingDetailsTechnicalSkills' => $matchingDetailsTechnicalSkills,
                'matchingDetailsLinguistiqueSkills' => $matchingDetailsLinguistiqueSkills,
                'matchingDetailMobilityGeographique' => $matchingDetailMobilityGeographique,
                'matchingDetailsModeWork' => $matchingDetailsModeWork,
                'matchingDetailsTimeWork' => $matchingDetailsTimeWork,
                'matchingDetailsPersonalSkills' => $matchingDetailsPersonalSkills,
                'matchingSalaryScore' => $matchingSalaryScore
            ]
        );
    }


    public function showCV(Profile $profile){

        $skillsgroup = $profile->skills->groupBy('skill_type_id');

        return view('matching.inc.generate-cv', compact('profile', 'skillsgroup'));
    }

    public function print($id)
    {
        $profile = Profile::with(['experiences', 'formations', 'skills'])->find($id);
        $skillsgroup = $profile->skills->groupBy('skill_type_id');

        return view('matching.inc.generated-cv', compact('profile', 'skillsgroup'));
    }

    public function generatePDF($profileId)
    {
        $profile = Profile::with(['experiences', 'formations', 'skills'])->find($profileId);
        $skillsgroup = $profile->skills->groupBy('skill_type_id');

        $pdf = PDF::loadView('matching.inc.generated-cv', compact('profile', 'skillsgroup'));

        // Add CSS options
        $pdf->setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true
        ]);

        return $pdf->download('cv-' . $profile->first_name . '-' . $profile->last_name . '.pdf');
    }

    public function coverLetter(Profile $profile){

        return view('matching.inc.coverLetter', compact('profile'));
    }

    // public function showCV(Profile $profile){

    //     return view('matching.inc.cv', compact('profile'));
    // }

}
