<?php

namespace App\Http\Controllers\Api;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobOffre\StoreJobOfferRequest;
use App\Http\Requests\JobOffre\UpdateJobOfferRequest;
use App\Http\Resources\JobOfferResource;
use App\Models\Client;
use App\Models\JobOffer;
use App\Models\JobOfferExperience;
use App\Models\JobOfferFormation;
use App\Models\JobOfferSalaryExpectation;
use App\Models\JobOfferSkill;
use App\Models\MobilityOption;
use App\Models\MobilityOptionType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class JobOfferController extends Controller
{
    protected $jobOffer;

    /**
     * Crée une nouvelle instance du contrôleur.
     * Injection du modèle JobOffer et application des middlewares
     */
    public function __construct(JobOffer $jobOffer)
    {
        // Injection du modèle JobOffer
        $this->jobOffer = $jobOffer;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:mission-listing')->only(['index']);
        $this->middleware('permission:mission-create-offer')->only(['storeJobOffer']);
        $this->middleware('permission:mission-edit')->only(['updateJobOffer']);
        $this->middleware('permission:mission-delete')->only(['destroy']);

        $this->middleware('permission:mission-status-annuler')->only(['changeStatus']);
        $this->middleware('permission:mission-status-suspendre')->only(['changeStatus']);
        $this->middleware('permission:mission-status-cloturer')->only(['changeStatus']);
        $this->middleware('permission:mission-status-reactiver')->only(['changeStatus']);
        $this->middleware('permission:mission-status-recouvrir')->only(['changeStatus']);

        // $this->middleware('permission:client-portal-access')->only(['jobOfferHistoryClientPortal']);
        // $this->middleware('permission:client-portal-access')->only(['listingClientPortal']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $jobOffers = JobOffer::with(['client', 'city', 'jobOfferFormation', 'jobOfferExperience', 'trackingApplications']);

            if ($request->has('start_date') && !empty($request->start_date)) {
                $jobOffers->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->has('end_date') && !empty($request->end_date)) {
                $jobOffers->whereDate('created_at', '<=', $request->end_date);
            }
            if ($request->has('pays') && $request->pays !== 'Tous') {
                $jobOffers->whereHas('city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }

            if ($request->has('ville') && $request->ville !== 'Tous') {
                $jobOffers->where('city_id', $request->ville);
            }

            if ($request->has('client') && $request->client !== 'Tous') {
                $jobOffers->where('client_id', $request->client);
            }

            if ($request->has('diploma') && $request->diploma !== 'Tous') {
                $jobOffers->whereHas('diplomas', function ($query) use ($request) {
                    $query->where('diploma_id', $request->diploma);
                });
            }

            if ($request->has('status_id') && $request->status_id !== 'Tous') {
                $jobOffers->where('status_id', $request->status_id);
            }

            return DataTables::of($jobOffers)

                // Logo client
                ->addColumn('logo', function ($jobOffer) {
                    if ($jobOffer->client && $jobOffer->client->getLogoUrl()) {
                        $logoUrl = $jobOffer->client->getLogoUrl();
                        return '<img src="' . htmlspecialchars($logoUrl) . '" alt="Logo" width="40" style="max-width:none;">';
                    }
                    return '-';
                })

                // N° client
                ->addColumn('client_number', function ($jobOffer) {
                    return $jobOffer->client->id ?? ' - ';
                })

                // Nom du client
                ->addColumn('client_name', function ($jobOffer) {
                    return $jobOffer->client->name ?? ' - ';
                })

                // Intitulé du poste
                ->addColumn('title', function ($jobOffer) {
                    return __($jobOffer->title) ?? '-';
                })

                // Type de contrat
                ->addColumn('contract_type', function ($jobOffer) {
                    $abbr = ContractTypeProfileEnum::getAbbrValue($jobOffer->contract_type_id);
                    return $abbr ?? '-';
                })

                // Localisation (ville)
                ->addColumn('city_name', function ($jobOffer) {
                    return __($jobOffer->city->name) ?? '-';
                })

                // diploma_label
                ->addColumn('diploma_label', function ($jobOffer) {
                    return $jobOffer->diplomas->isNotEmpty()
                        ? $jobOffer->diplomas->map(function ($diploma) {
                            return __($diploma->label) ?? ' - ';
                        })->implode('<br>')
                        : ' - ';
                })

                // experience_count
                ->addColumn('experience_count', function ($jobOffer) {
                    return $jobOffer->jobOfferExperience->sum('years') . ' ' . __('generated.ans');
                })

                // nbr_profiles
                ->addColumn('nbr_profiles', function ($jobOffer) {
                    return $jobOffer->nbr_profiles ?? '-';
                })

                // Date de début
                ->addColumn('start_date', function ($jobOffer) {
                    return $jobOffer->mission_started_at
                        ? $jobOffer->mission_started_at->format('d/m/Y')
                        : ' - ';
                })

                // Date de fin
                ->addColumn('end_date', function ($jobOffer) {
                    return $jobOffer->mission_finished_at
                        ? $jobOffer->mission_finished_at->format('d/m/Y')
                        : ' - ';
                })

                ->addColumn('action', function ($jobOffer) {
                    $disabled_items = JobOffer::DISABLED_STATUS_MAPPING[$jobOffer->status_id] ?? [];
                    $isEditDisabled = in_array($jobOffer->status_id, JobOffer::DISABLED_CRUD_MAPPING['edit']);

                    $actions = '<div class="dropdown text-center">
                                    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">';

                    // Vérification des permissions avec auth()->user()->can()
                    if (auth()->user()->can('mission-detail')) {
                        $actions .= '<li><a class="dropdown-item" href="' . route('jobOffer.show', $jobOffer->id) . '">' . __("generated.Détail") . '</a></li>';
                    }

                    if (auth()->user()->can('mission-edit')) {
                        $actions .= '<li><a class="dropdown-item ' . ($isEditDisabled ? 'disabled text-muted' : '') . '" href="' . route('jobOffer.edit', $jobOffer->id) . '">' . __("generated.Éditer") . '</a></li>';
                    }

                    if (auth()->user()->can('mission-delete')) {
                        $actions .= '<li>
                                        <form id="delete-form-' . $jobOffer->id . '" action="' . route('delete_jobOffer.destroy', $jobOffer->id) . '" method="POST" style="display: none;">
                                            ' . csrf_field() . method_field('DELETE') . '
                                        </form>
                                        <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="confirmDelete(' . $jobOffer->id . ')">' . __("generated.Supprimer") . '</a>
                                    </li>';
                    }

                    // Vérification des permissions pour les changements de statut
                    if (auth()->user()->can('mission-status-annuler')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::SUSPENDED, $disabled_items) ? 'disabled text-muted' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::CANCELLED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::CANCELLED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-suspendre')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::SUSPENDED, $disabled_items) ? 'disabled text-muted' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::SUSPENDED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::SUSPENDED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-cloturer')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::CLOSED, $disabled_items) ? 'disabled text-muted' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::CLOSED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::CLOSED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-reactiver')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::REACTIVATED, $disabled_items) ? 'disabled text-muted' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::REACTIVATED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::REACTIVATED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-recouvrir')) {
                        $actions .= '<li><a class="dropdown-item text-dark ' . (in_array(StatusJobOfferEnum::REOPENED, $disabled_items) ? 'disabled text-muted' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::REOPENED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::REOPENED] . '</a></li>';
                    }

                    $actions .= '</ul></div>';

                    return $actions;
                })



                ->addColumn('status_id', function ($jobOffer) {

                    // Vérification si le statut est null
                    if (is_null($jobOffer->status_id)) {
                        return '-';
                    }

                    $status_name = StatusJobOfferEnum::getStatusNameValue($jobOffer->status_id);

                    // Définition des couleurs en fonction du statut
                    $status_colors = [
                        StatusJobOfferEnum::DRAFT           => 'badge-draft',
                        StatusJobOfferEnum::NOT_STARTED     => 'badge-not-started',
                        StatusJobOfferEnum::IN_PROGRESS     => 'badge-in-progress',
                        StatusJobOfferEnum::CLOSED          => 'badge-closed',
                        StatusJobOfferEnum::SUSPENDED       => 'badge-suspended',
                        StatusJobOfferEnum::REOPENED        => 'badge-reopened',
                        StatusJobOfferEnum::CANCELLED       => 'badge-cancelled',
                        StatusJobOfferEnum::REACTIVATED     => 'badge-reactivated',
                    ];

                    $badge_color = $status_colors[$jobOffer->status_id] ?? 'badge-custom-color';

                    return '<span class="badge badge-sm ' . $badge_color . '">' . $status_name . '</span>';
                })


                ->rawColumns(['logo', 'action', 'diploma_label', 'status', 'status_id'])
                ->make(true);
        }

        $jobOffers = JobOffer::all();

        return response()->json([
            'status' => 'success',
            'data' => JobOfferResource::collection(
                $jobOffers
            ),
        ]);
    }

    public function changeStatus($id, $status, Request $request)
    {
        // $jobOffer->status_id = $status;

        // for change status to CANCELLED (Annuler)
        if ($status == StatusJobOfferEnum::CANCELLED) {
            $jobOffer = JobOffer::findOrFail($id);

            $jobOffer->status_id = StatusJobOfferEnum::CANCELLED;
        }

        // for change status to SUSPENDED (Suspendre ou Pause)
        else if ($status == StatusJobOfferEnum::SUSPENDED) {
            $jobOffer = JobOffer::findOrFail($id);
            $jobOffer->status_id = StatusJobOfferEnum::SUSPENDED;

            JobOffer::where('id', $id)->update([
                'closed_at' => Carbon::now(),
            ]);
        }

        // for change status to CLOSED (Clôturer)
        else if ($status == StatusJobOfferEnum::CLOSED) {
            $jobOffer = JobOffer::findOrFail($id);
            $jobOffer->status_id = StatusJobOfferEnum::CLOSED;
        }

        // for change status to REACTIVATED (Réactiver)
        else if ($status == StatusJobOfferEnum::REACTIVATED) {
            $jobOffer = JobOffer::findOrFail($id);
            $jobOffer->status_id = StatusJobOfferEnum::REACTIVATED;

            $closed_period = $jobOffer->closed_at ? Carbon::parse($jobOffer->closed_at)->diffInDays(Carbon::now()) : null;

            $closed_period_to_mission_finished_at = ($closed_period !== null && $jobOffer->mission_finished_at)
                ? Carbon::parse($jobOffer->mission_finished_at)->addDays($closed_period)
                : null;

            JobOffer::where('id', $id)->update([
                'mission_finished_at' => $closed_period_to_mission_finished_at,
            ]);
        }

        $jobOffer->save();

        return response()->json(['message' => 'Statut modifié avec succès'], 200);
    }


    public function storeJobOffer(StoreJobOfferRequest $request)
    {
        try {
            // dd($request->all());
            DB::beginTransaction();

            $startDate = Carbon::parse($request['mission_started_at']);
            $endDate = Carbon::parse($request['mission_finished_at']);
            $duration = $startDate->diffInDays($endDate);

            // Définir le statut par défaut comme Brouillon
            $status = StatusJobOfferEnum::DRAFT;

            // Vérifier le bouton cliqué
            if ($request->input('action') == 'publish') {
                if ($startDate->isFuture()) {
                    $status = StatusJobOfferEnum::NOT_STARTED;
                } elseif ($startDate->isPast() && $endDate->isFuture()) {
                    $status = StatusJobOfferEnum::IN_PROGRESS;
                }
            }

            $jobOffer = JobOffer::create([
                'client_id'                         => $request['client_id'],
                'city_id'                           => $request['city_id'],
                'activity_area_id'                  => $request['activity_area_id'],
                'contract_type_id'                  => $request['contract_type_id'],
                'status_id'                         => $status,
                // 'status_change_mode'                => $request['status_change_mode'],
                'title'                             => $request['title'],
                // 'recruitment_officers'              => $request->input('recruitment_officers', []),
                'profession_id'                     => $request['profession_id'],
                'company_info'                      => $request['company_info'],
                'formation_details'                 => $request['formation_details'],
                'experience_details'                => $request['experience_details'],
                'mission_details'                   => $request['mission_details'],
                'Responsibilities_details'          => $request['Responsibilities_details'],
                'technical_skills_details'          => $request['technical_skills_details'],
                'personal_skills_details'           => $request['personal_skills_details'],
                'nbr_profiles'                      => $request['nbr_profiles'],
                'mission_started_at'                => $request['mission_started_at'],
                'mission_finished_at'               => $request['mission_finished_at'],
                'duration'                          => $duration,
                'client_evaluator'                  => $request['client_evaluator'],
                'company_evaluator'                 => $request['company_evaluator'],
                'user_id'                           => Auth::id(),
            ]);

            $jobOffer_id = $jobOffer->id;

            // star prétentions salariales
            if ($request->has('salaires')) {
                foreach ($request->salaires as $salaire) {
                    JobOfferSalaryExpectation::create([
                        'job_offer_id' => $jobOffer_id,
                        'min_salary' => $salaire['montant_min'],
                        'max_salary' => $salaire['montant_max'],
                        'weight' => $salaire['weight'],
                    ]);
                }
            }
            // end prétentions salariales

            // star store_formation
            foreach ($request->formations as $key => $formation) {
                JobOfferFormation::create([
                    'job_offer_id' => $jobOffer_id,
                    'diploma_id' => $formation['diploma_id_job_offer_formations'],
                    'option_id' => $formation['option_id_job_offer_formations'],
                    'weight_formation' => $formation['weight_formation_job_offer_formations'],
                    'weight_option' => $formation['weight_option_job_offer_formations'],
                ]);
            }
            // end store_formation

            // star store_experiences
            foreach ($request->experiences as $key => $experience) {
                JobOfferExperience::create([
                    'job_offer_id' => $jobOffer_id,
                    'profession_id' => $experience['profession_id_job_offer_experiences'],
                    'years' => $experience['years_job_offer_experiences'],
                    'weight_profession' => $experience['weight_profession_job_offer_experiences'],
                    'weight_experience' => $experience['weight_experience_job_offer_experiences'],
                ]);
            }
            // end store_experiences

            // star store_competences_techniques
            foreach ($request->technical_skills as $key => $technical_skill) {
                JobOfferSkill::create([
                    'job_offer_id' => $jobOffer_id,
                    'skill_id' => $technical_skill['label_skills'],
                    'level' => $technical_skill['level_job_offers_skills'],
                    'weight' => $technical_skill['weight_job_offers_skills'],
                ]);
            }
            // end store_competences_techniques

            // star store_competences_personnelles
            foreach ($request->personal_skills as $key => $personal_skill) {
                JobOfferSkill::create([
                    'job_offer_id' => $jobOffer_id,
                    'skill_id' => $personal_skill['label_skills'],
                    'level' => $personal_skill['level_job_offers_skills'],
                    'weight' => $personal_skill['weight_job_offers_skills'],
                ]);
            }
            // end store_competences_personnelles

            // star store_compétences_linguistiques
            foreach ($request->language_skills as $key => $language_skill) {
                foreach ($language_skill['multiple_skills'] as $key => $label_skill) {
                    JobOfferSkill::create([
                        'job_offer_id' => $jobOffer_id,
                        'skill_id' => $label_skill['label_skills'],
                        'level' => $label_skill['level_job_offers_skills'],
                        'weight' => $label_skill['weight_job_offers_skills'],
                    ]);
                }
            }
            // end store_compétences_linguistiques

            // star store_Mobilité
            foreach ($request->mobilitys['with_echelle'] as $key => $items) {
                foreach ($items as $key => $details) {
                    $mobilityOptionType = MobilityOptionType::where('slug', $key)->first();

                    $show = MobilityOption::create([
                        'job_offer_id' => $jobOffer_id,
                        'mobility_option_type_id' => $mobilityOptionType->id,
                        'is_active' => isset($details['is_active']) && $details['is_active'] == 'on' ? 1 : 0,
                        'weight' => (isset($details['is_active']) && $details['is_active'] == 'on') && $details['weight'] ? $details['weight'] : null,
                    ]);
                }
            }

            // if (isset($request->mobilitys['availabilitys'])) {
            if ($request->mobilitys['availabilitys']) {
                $mobilityOptionType = MobilityOptionType::where('slug', $request->mobilitys['availabilitys']['type'])->first();
                $show = MobilityOption::create([
                    'job_offer_id' => $jobOffer_id,
                    'mobility_option_type_id' => $mobilityOptionType->id,
                    'is_active' => 1,

                    'notice_period_per_month' => $request->mobilitys['availabilitys']['type'] == "notice" ? $request->mobilitys['availabilitys']['notice_duration'] : null
                ]);
            }

            JobOffer::where('id', $jobOffer_id)->update([
                'has_driving_license' => $request->has_driving_license,
                'license_types' => $request->license_types
            ]);
            // end store_Mobilité


            DB::commit();
            // return back()->with('success', 'Offre emploi ajoutée avec succès!');
            // return back()->with('success',  __('generated.Offre emploi ajoutée avec succès!') );
            return back()->with('success', __('generated.Offre emploi ajoutée avec succès!'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'offre d\'emploi : ' . $e->getMessage());
            return redirect()->back()->with('danger', "An error occurred while creating the job offer.");
        }
    }

    public function updateJobOffer(UpdateJobOfferRequest $request, $id)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            $startDate = Carbon::parse($request['mission_started_at']);
            $endDate = Carbon::parse($request['mission_finished_at']);
            $duration = $startDate->diffInDays($endDate);

            $jobOffer = JobOffer::findOrFail($id);

            $jobOffer->update([
                'client_id'                         => $request['client_id'],
                'city_id'                           => $request['city_id'],
                'activity_area_id'                  => $request['activity_area_id'],
                'contract_type_id'                  => $request['contract_type_id'],
                // 'status_change_mode'                => $request['status_change_mode'],
                'title'                             => $request['title'],
                'profession_id'                     => $request['profession_id'],
                'company_info'                      => $request['company_info'],
                'formation_details'                 => $request['formation_details'],
                'experience_details'                => $request['experience_details'],
                'mission_details'                   => $request['mission_details'],
                'Responsibilities_details'          => $request['Responsibilities_details'],
                'technical_skills_details'          => $request['technical_skills_details'],
                'personal_skills_details'           => $request['personal_skills_details'],
                'nbr_profiles'                      => $request['nbr_profiles'],
                'mission_started_at'                => $request['mission_started_at'],
                'mission_finished_at'               => $request['mission_finished_at'],
                'duration'                          => $duration,
                'client_evaluator'                  => $request['client_evaluator'],
                'company_evaluator'                 => $request['company_evaluator'],
            ]);

            if ($request->input("status") == "reopen") {
                // Vérifie si la date actuelle est supérieure à la date de fin de mission
                if (Carbon::now()->gt($jobOffer->mission_finished_at)) {
                    return redirect()->back()->with('reopenAlert', 'Pour rouvrir la mission, vous devez saisir une date de fin valide.');
                } else {
                    $jobOffer->update([
                        'status_id' => 6,
                    ]);

                    // return redirect()->route('jobOffer.listing')->with('success', 'Le statut de la mission a été rouvert avec succès.');
                }
            }

            // star prétentions salariales
            foreach ($request->salaires as $key => $salairesData) {
                if (!empty($salairesData['salary_expectation_id'])) {
                    if (!empty($salairesData['deleted'])) {
                        JobOfferSalaryExpectation::destroy($salairesData['salary_expectation_id']);
                    } else {
                        JobOfferSalaryExpectation::where('id', $salairesData['salary_expectation_id'])
                            ->update([
                                'min_salary' => $salairesData['montant_min'],
                                'max_salary' => $salairesData['montant_max'],
                                'weight' => $salairesData['weight'],
                            ]);
                    }
                } else {
                    JobOfferSalaryExpectation::create([
                        'job_offer_id' => $id,
                        'min_salary' => $salairesData['montant_min'],
                        'max_salary' => $salairesData['montant_max'],
                        'weight' => $salairesData['weight'],
                    ]);
                }
            }
            // end prétentions salariales

            // star store_formation
            foreach ($request->formations as $key => $formationData) {
                if (!empty($formationData['job_offer_formation_id'])) {
                    if (!empty($formationData['deleted'])) {
                        JobOfferFormation::destroy($formationData['job_offer_formation_id']);
                    } else {
                        JobOfferFormation::where('id', $formationData['job_offer_formation_id'])
                            ->update([
                                'diploma_id' => $formationData['diploma_id_job_offer_formations'],
                                'option_id' => $formationData['option_id_job_offer_formations'],
                                'weight_formation' => $formationData['weight_formation_job_offer_formations'],
                                'weight_option' => $formationData['weight_option_job_offer_formations'],
                            ]);
                    }
                } else {
                    JobOfferFormation::create([
                        'job_offer_id' => $id,
                        'diploma_id' => $formationData['diploma_id_job_offer_formations'],
                        'option_id' => $formationData['option_id_job_offer_formations'],
                        'weight_formation' => $formationData['weight_formation_job_offer_formations'],
                        'weight_option' => $formationData['weight_option_job_offer_formations'],
                    ]);
                }
            }
            // end store_formation

            // star store_experiences
            foreach ($request->experiences as $key => $experienceData) {
                if (!empty($experienceData['job_offer_experience_id'])) {
                    if (!empty($experienceData['deleted'])) {
                        JobOfferExperience::destroy($experienceData['job_offer_experience_id']);
                    } else {
                        JobOfferExperience::where('id', $experienceData['job_offer_experience_id'])
                            ->update([
                                'profession_id' => $experienceData['profession_id_job_offer_experiences'],
                                'years' => $experienceData['years_job_offer_experiences'],
                                'weight_profession' => $experienceData['weight_profession_job_offer_experiences'],
                                'weight_experience' => $experienceData['weight_experience_job_offer_experiences'],
                            ]);
                    }
                } else {
                    JobOfferExperience::create([
                        'job_offer_id' => $id,
                        'profession_id' => $experienceData['profession_id_job_offer_experiences'],
                        'years' => $experienceData['years_job_offer_experiences'],
                        'weight_profession' => $experienceData['weight_profession_job_offer_experiences'],
                        'weight_experience' => $experienceData['weight_experience_job_offer_experiences'],
                    ]);
                }
            }
            // end store_experiences

            // star compétences_techniques
            foreach ($request->technical_skills as $technical_skill) {
                if (isset($technical_skill['skill_id']) && $technical_skill['skill_id']) {
                    if (isset($technical_skill['deleted']) && $technical_skill['deleted'] == '1') {
                        $jobOffer->skills()->detach($technical_skill['skill_id']);
                    } else {
                        JobOfferSkill::where('job_offer_id', $jobOffer->id)
                            ->where('skill_id', $technical_skill['skill_id'])
                            ->update([
                                'skill_id' => $technical_skill['label_skills'],
                                'level' => $technical_skill['level_job_offers_skills'],
                                'weight' => $technical_skill['weight_job_offers_skills'],
                            ]);
                    }
                } else {
                    $jobOffer->skills()->attach($technical_skill['label_skills'], [
                        'level' => $technical_skill['level_job_offers_skills'],
                        'weight' => $technical_skill['weight_job_offers_skills']
                    ]);
                }
            }
            // end compétences_techniques

            // star compétences_personnelles
            foreach ($request->personal_skills as $personal_skill) {
                if (isset($personal_skill['skill_id']) && $personal_skill['skill_id']) {
                    if (isset($personal_skill['deleted']) && $personal_skill['deleted'] == '1') {
                        $jobOffer->skills()->detach($personal_skill['skill_id']);
                    } else {
                        // $jobOffer->skills()->updateExistingPivot($personal_skill['skill_id'], [
                        //     'level' => $personal_skill['level_job_offers_skills'],
                        //     'weight' => $personal_skill['weight_job_offers_skills'],
                        // ]);
                        JobOfferSkill::where('job_offer_id', $jobOffer->id)
                            ->where('skill_id', $personal_skill['skill_id'])
                            ->update([
                                'skill_id' => $personal_skill['label_skills'],
                                'level' => $personal_skill['level_job_offers_skills'],
                                'weight' => $personal_skill['weight_job_offers_skills'],
                            ]);
                    }
                } else {
                    $jobOffer->skills()->attach($personal_skill['label_skills'], [
                        'level' => $personal_skill['level_job_offers_skills'],
                        'weight' => $personal_skill['weight_job_offers_skills']
                    ]);
                }
            }
            // end compétences_personnelles

            // star store_compétences_linguistiques
            foreach ($request->language_skills as $key => $language_skill) {
                if (isset($language_skill['job_offer_skills']) && $language_skill['job_offer_skills'] == 'true') {
                    if (isset($language_skill['deleted']) && $language_skill['deleted'] == '1') {
                        $jobOffer->skills()->detach(
                            collect($language_skill['multiple_skills'])->pluck('job_offer_skill_id')->toArray()
                        );
                    } else {
                        // $pivotData = [];
                        foreach ($language_skill['multiple_skills'] as $skillData) {
                            // $pivotData[$skillData['job_offer_skill_id']] = [
                            //     'level' => $skillData['level_job_offers_skills'],
                            //     'weight' => $skillData['weight_job_offers_skills'],
                            // ];

                            // $jobOffer->skills()->updateExistingPivot($skillData['job_offer_skill_id'], [
                            //     'level' => $skillData['level_job_offers_skills'],
                            //     'weight' => $skillData['weight_job_offers_skills'],
                            // ]);
                            JobOfferSkill::where('job_offer_id', $jobOffer->id)
                                ->where('skill_id', $skillData['job_offer_skill_id'])
                                ->update([
                                    'skill_id' => $skillData['job_offer_skill_id'],
                                    'level' => $skillData['level_job_offers_skills'],
                                    'weight' => $skillData['weight_job_offers_skills'],
                                ]);
                        }

                        // $jobOffer->skills()->updateExistingPivot($pivotData);
                    }
                } else {
                    foreach ($language_skill['multiple_skills'] as $skillData) {
                        $jobOffer->skills()->attach($skillData['label_skills'], [
                            'level' => $skillData['level_job_offers_skills'],
                            'weight' => $skillData['weight_job_offers_skills']
                        ]);
                    }
                }
            }
            // end store_compétences_linguistiques

            // foreach ($request->mobilitys['with_echelle'] as $key => $items) {
            //     foreach ($items as $key => $details) {
            //         $mobilityOptionType = MobilityOptionType::where('slug', $key)->first();
            //         $jobOffer->mobilityOptionTypes()->updateExistingPivot($mobilityOptionType->id, [
            //             'is_active' => isset($details['is_active']) && $details['is_active'] == 'on' ? 1 : 0,
            //             'weight' => (isset($details['is_active']) && $details['is_active'] == 'on') && $details['weight'] ? $details['weight'] : null,
            //         ]);
            //     }
            // }

            // if ($request->mobilitys['availabilitys']) {
            //     $availabilityMobilityOptionTypes = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['availabilitys'])->get();
            //     $jobOffer->mobilityOptionTypes()->detach($availabilityMobilityOptionTypes->pluck('id')->toArray());
            //     $jobOffer->mobilityOptionTypes()->attach($availabilityMobilityOptionTypes->where('slug', $request->mobilitys['availabilitys']['type'])->first()->id, [
            //         'is_active' => 1,
            //         'notice_period_per_month' => $request->mobilitys['availabilitys']['type'] == "notice" ? $request->mobilitys['availabilitys']['notice_duration'] : null
            //     ]);
            // }

            // JobOffer::where('id', $jobOffer->id)->update([
            //     'has_driving_license' => $request->has_driving_license,
            //     'license_types' => $request->driving_license_types
            // ]);

            // 1. Gestion de with_echelle (update ou insert selon existence)
            if (!empty($request->mobilitys['with_echelle'])) {
                foreach ($request->mobilitys['with_echelle'] as $categorySlug => $items) {
                    foreach ($items as $optionSlug => $details) {
                        $mobilityOptionType = MobilityOptionType::where('slug', $optionSlug)->first();

                        if ($mobilityOptionType) {
                            $jobOffer->mobilityOptionTypes()->syncWithoutDetaching([
                                $mobilityOptionType->id => [
                                    'is_active' => isset($details['is_active']) && $details['is_active'] === 'on' ? 1 : 0,
                                    'weight' => (isset($details['is_active']) && $details['is_active'] === 'on' && isset($details['weight'])) ? $details['weight'] : null,
                                ]
                            ]);
                        } else {
                            Log::warning("MobilityOptionType introuvable pour le slug : $optionSlug");
                        }
                    }
                }
            }

            // 2. Gestion de availabilitys
            if (!empty($request->mobilitys['availabilitys']) && isset($request->mobilitys['availabilitys']['type'])) {
                $availabilityMobilityOptionTypes = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['availabilitys'])->get();

                // On supprime les anciennes relations d’availability
                $jobOffer->mobilityOptionTypes()->detach($availabilityMobilityOptionTypes->pluck('id')->toArray());

                // On attache la nouvelle sélection
                $selectedType = $availabilityMobilityOptionTypes->where('slug', $request->mobilitys['availabilitys']['type'])->first();
                if ($selectedType) {
                    $jobOffer->mobilityOptionTypes()->attach($selectedType->id, [
                        'is_active' => 1,
                        'notice_period_per_month' => $request->mobilitys['availabilitys']['type'] === 'notice'
                            ? $request->mobilitys['availabilitys']['notice_duration']
                            : null,
                    ]);
                } else {
                    Log::warning("Type de disponibilité non trouvé : " . $request->mobilitys['availabilitys']['type']);
                }
            }

            // 3. Mise à jour des champs de permis de conduire
            JobOffer::where('id', $jobOffer->id)->update([
                'has_driving_license' => $request->has('has_driving_license') ? $request->has_driving_license : 0,
                'license_types' => $request->has('driving_license_types') ? $request->driving_license_types : null,
            ]);

            DB::commit();

            // return redirect()->back()->with('success', 'Offre emploi mise à jour avec succès.');
            return back()->with('success_update', __('generated.Offre emploi mise à jour avec succès.'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la modification de l\'offre d\'emploi : ' . $e->getMessage());
            return redirect()->back()->with('danger', "An error occurred while updating the job offer.");
        }
    }

    public function destroy($id)
    {
        $jobOffer = JobOffer::findOrFail($id);
        JobOfferFormation::where('job_offer_id', $jobOffer->id)->delete();
        JobOfferExperience::where('job_offer_id', $jobOffer->id)->delete();
        MobilityOption::where('job_offer_id', $jobOffer->id)->delete();
        JobOfferSkill::where('job_offer_id', $jobOffer->id)->delete();
        $jobOffer->delete();

        // return redirect()->back()->with('success', 'Offre supprimée avec succès.');
        return redirect()->back()->with('success_delete', __('generated.Offre emploi supprimée avec succès.'));
    }


    /**
     * Retourne le tableau des offres d'emploi enregistrées.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobOfferHistoryDataTable(Request $request)
    {
        $jobOffers = JobOffer::with(['client', 'trackingApplications']);

        if ($request->ajax()) :
            if ($request->has('pays') && $request->pays !== 'Tous') {
                $jobOffers->whereHas('city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }

            if ($request->has('ville') && $request->ville !== 'Tous') {
                $jobOffers->where('city_id', $request->ville);
            }

            if ($request->has('client') && $request->client !== 'Tous') {
                $jobOffers->where('client_id', $request->client);
            }

            if ($request->has('status_id') && $request->status_id !== 'Tous') {
                $jobOffers->where('status_id', $request->status_id);
            }

            return DataTables::of($jobOffers)


                ->addColumn('N', function ($jobOffer) {
                    return $jobOffer->id ?? ' - ';
                })

                ->addColumn('client_name', function ($jobOffer) {
                    return $jobOffer->client->name ?? ' - ';
                })

                // Intitulé du poste
                ->addColumn('title', function ($jobOffer) {
                    return __($jobOffer->title) ?? '-';
                })

                // Date de début
                ->addColumn('start_date', function ($jobOffer) {
                    return $jobOffer->mission_started_at
                        ? $jobOffer->mission_started_at->format('d/m/Y')
                        : ' - ';
                })

                // Date de fin
                ->addColumn('end_date', function ($jobOffer) {
                    return $jobOffer->mission_finished_at
                        ? $jobOffer->mission_finished_at->format('d/m/Y')
                        : ' - ';
                })

                ->addColumn('duration', function ($jobOffer) {
                    $duration = $jobOffer->duration;
                    if ($duration != null && $duration > 12) {
                        $years = floor($duration / 12);
                        $remainingMonths = $duration % 12;
                        return $years == 1 ? "$years an et $remainingMonths mois" : "$years ans et $remainingMonths mois";
                    } elseif ($duration != null && $duration <= 12) {
                        return "$duration mois";
                    } else {
                        return " - ";
                    }
                })

                ->addColumn('Prelesectionees', function ($jobOffer) {
                    return count($jobOffer->trackingApplications);
                })

                ->addColumn('in_interview', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::INTERVIEW));
                })

                ->addColumn('retained', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::RETAINED));
                })

                ->addColumn('hired', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::HIRING));
                })

                ->addColumn('discarded', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::DISCARDED));
                })

                ->make(true);

        endif;

        $jobOffers = JobOffer::with(['client', 'trackingApplications']);

        return response()->json([
            'status' => 'success',
            'data' => JobOfferResource::collection(
                $jobOffers
            ),
        ]);
    }




    public function jobOfferHistoryClientPortal(Request $request)
    {
        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();
        $jobOffers = isset($client) ? JobOffer::where('client_id', $client->id)->with(['client', 'trackingApplications']) : [];

        if ($request->ajax()) :
            if ($request->has('pays') && $request->pays !== 'Tous') {
                $jobOffers->whereHas('city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }

            if ($request->has('ville') && $request->ville !== 'Tous') {
                $jobOffers->where('city_id', $request->ville);
            }

            if ($request->has('client') && $request->client !== 'Tous') {
                $jobOffers->where('client_id', $request->client);
            }

            if ($request->has('status_id') && $request->status_id !== 'Tous') {
                $jobOffers->where('status_id', $request->status_id);
            }

            return DataTables::of($jobOffers)


                ->addColumn('N', function ($jobOffer) {
                    return $jobOffer->id ?? ' - ';
                })

                ->addColumn('client_name', function ($jobOffer) {
                    return $jobOffer->client->name ?? ' - ';
                })

                // Intitulé du poste
                ->addColumn('title', function ($jobOffer) {
                    return __($jobOffer->title) ?? '-';
                })

                // Date de début
                ->addColumn('start_date', function ($jobOffer) {
                    return $jobOffer->mission_started_at
                        ? $jobOffer->mission_started_at->format('d/m/Y')
                        : ' - ';
                })

                // Date de fin
                ->addColumn('end_date', function ($jobOffer) {
                    return $jobOffer->mission_finished_at
                        ? $jobOffer->mission_finished_at->format('d/m/Y')
                        : ' - ';
                })

                ->addColumn('duration', function ($jobOffer) {
                    $duration = $jobOffer->duration;
                    if ($duration != null && $duration > 12) {
                        $years = floor($duration / 12);
                        $remainingMonths = $duration % 12;
                        return $years == 1 ? "$years an et $remainingMonths mois" : "$years ans et $remainingMonths mois";
                    } elseif ($duration != null && $duration <= 12) {
                        return "$duration mois";
                    } else {
                        return " - ";
                    }
                })

                ->addColumn('Prelesectionees', function ($jobOffer) {
                    return count($jobOffer->trackingApplications);
                })

                ->addColumn('in_interview', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::INTERVIEW));
                })

                ->addColumn('retained', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::RETAINED));
                })

                ->addColumn('hired', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::HIRING));
                })

                ->addColumn('discarded', function ($jobOffer) {
                    return count($jobOffer->trackingApplications->where('status_id', StatusTrackingApplicationEnum::DISCARDED));
                })

                ->make(true);

        endif;

        $jobOffers = JobOffer::with(['client', 'trackingApplications']);

        return response()->json([
            'status' => 'success',
            'data' => JobOfferResource::collection(
                $jobOffers
            ),
        ]);
    }



    public function listingClientPortal(Request $request)
    {
        if ($request->ajax()) {

            $user = auth()->user();
            $client = Client::where('user_id', $user->id)->first();

            $jobOffers = JobOffer::with(['client', 'city', 'jobOfferFormation', 'jobOfferExperience', 'trackingApplications'])->where('client_id', $client->id);

            if ($request->has('start_date') && !empty($request->start_date)) {
                $jobOffers->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->has('end_date') && !empty($request->end_date)) {
                $jobOffers->whereDate('created_at', '<=', $request->end_date);
            }
            if ($request->has('pays') && $request->pays !== 'Tous') {
                $jobOffers->whereHas('city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }

            if ($request->has('ville') && $request->ville !== 'Tous') {
                $jobOffers->where('city_id', $request->ville);
            }

            if ($request->has('client') && $request->client !== 'Tous') {
                $jobOffers->where('client_id', $request->client);
            }

            if ($request->has('diploma') && $request->diploma !== 'Tous') {
                $jobOffers->whereHas('diplomas', function ($query) use ($request) {
                    $query->where('diploma_id', $request->diploma);
                });
            }

            if ($request->has('status_id') && $request->status_id !== 'Tous') {
                $jobOffers->where('status_id', $request->status_id);
            }

            return DataTables::of($jobOffers)

                // Logo client
                ->addColumn('logo', function ($jobOffer) {
                    if ($jobOffer->client && $jobOffer->client->getLogoUrl()) {
                        $logoUrl = $jobOffer->client->getLogoUrl();
                        return '<img src="' . htmlspecialchars($logoUrl) . '" alt="Logo" width="40" style="max-width:none;">';
                    }
                    return '-';
                })

                // N° client
                ->addColumn('client_number', function ($jobOffer) {
                    return $jobOffer->client->id ?? ' - ';
                })

                // Nom du client
                ->addColumn('client_name', function ($jobOffer) {
                    return $jobOffer->client->name ?? ' - ';
                })

                // Intitulé du poste
                ->addColumn('title', function ($jobOffer) {
                    return $jobOffer->title ?? '-';
                })

                // Type de contrat
                ->addColumn('contract_type', function ($jobOffer) {
                    $abbr = ContractTypeProfileEnum::getAbbrValue($jobOffer->contract_type_id);
                    return $abbr ?? '-';
                })

                // Localisation (ville)
                ->addColumn('city_name', function ($jobOffer) {
                    return __($jobOffer->city->name) ?? '-';
                })

                // diploma_label
                ->addColumn('diploma_label', function ($jobOffer) {
                    return $jobOffer->diplomas->isNotEmpty()
                        ? $jobOffer->diplomas->map(function ($diploma) {
                            return __($diploma->label) ?? ' - ';
                        })->implode('<br>')
                        : ' - ';
                })

                // experience_count
                ->addColumn('experience_count', function ($jobOffer) {
                    return $jobOffer->jobOfferExperience->sum('years') . ' ans';
                })

                // nbr_profiles
                ->addColumn('nbr_profiles', function ($jobOffer) {
                    return $jobOffer->nbr_profiles ?? '-';
                })

                // Date de début
                ->addColumn('start_date', function ($jobOffer) {
                    return $jobOffer->mission_started_at
                        ? $jobOffer->mission_started_at->format('d/m/Y')
                        : ' - ';
                })

                // Date de fin
                ->addColumn('end_date', function ($jobOffer) {
                    return $jobOffer->mission_finished_at
                        ? $jobOffer->mission_finished_at->format('d/m/Y')
                        : ' - ';
                })

                // Statut ATS
                // ->addColumn('status', function ($jobOffer) {
                //     $trackingApplication = $jobOffer->trackingApplications->first();
                //     if ($trackingApplication && $trackingApplication->status_id) {
                //         $statusName = StatusTrackingApplicationEnum::getValue($trackingApplication->status_id);

                //         // Map status to bootstrap badge colors
                //         $badgeColors = [
                //             'Shortlist' => 'bg-info',
                //             'Évaluation' => 'bg-warning',
                //             'Entretien' => 'bg-purple',
                //             'Retenu' => 'bg-success',
                //             'Embauché' => 'bg-primary',
                //             'Rejeté' => 'bg-danger'
                //         ];

                //         $color = $badgeColors[$statusName] ?? 'bg-secondary';

                //         return '<span class="badge badge-sm ' . $color . '">' . $statusName . '</span>';
                //     }
                //     return '-';
                // })

                ->addColumn('action', function ($jobOffer) {
                    $disabled_items = JobOffer::DISABLED_STATUS_MAPPING[$jobOffer->status_id] ?? [];
                    $isEditDisabled = in_array($jobOffer->status_id, JobOffer::DISABLED_CRUD_MAPPING['edit']);

                    $actions = '<div class="dropdown text-center">
                                    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">';

                    // Vérification des permissions avec auth()->user()->can()
                    if (auth()->user()->can('mission-detail')) {
                        $actions .= '<li><a class="dropdown-item" href="' . route('jobOffer.show', $jobOffer->id) . '">' . __("generated.Détail") . '</a></li>';
                    }

                    if (auth()->user()->can('mission-edit')) {
                        $actions .= '<li><a class="dropdown-item ' . ($isEditDisabled ? 'disabled text-muted bg-light' : '') . '" href="' . route('jobOffer.edit', $jobOffer->id) . '">Éditer</a></li>';
                    }

                    if (auth()->user()->can('mission-delete')) {
                        $actions .= '<li>
                                        <form id="delete-form-' . $jobOffer->id . '" action="' . route('delete_jobOffer.destroy', $jobOffer->id) . '" method="POST" style="display: none;">
                                            ' . csrf_field() . method_field('DELETE') . '
                                        </form>
                                        <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="confirmDelete(' . $jobOffer->id . ')">Supprimer</a>
                                    </li>';
                    }

                    // Vérification des permissions pour les changements de statut
                    if (auth()->user()->can('mission-status-annuler')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::SUSPENDED, $disabled_items) ? 'disabled text-muted bg-light' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::CANCELLED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::CANCELLED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-suspendre')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::SUSPENDED, $disabled_items) ? 'disabled text-muted bg-light' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::SUSPENDED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::SUSPENDED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-cloturer')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::CLOSED, $disabled_items) ? 'disabled text-muted bg-light' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::CLOSED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::CLOSED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-reactiver')) {
                        $actions .= '<li><a class="dropdown-item ' . (in_array(StatusJobOfferEnum::REACTIVATED, $disabled_items) ? 'disabled text-muted bg-light' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::REACTIVATED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::REACTIVATED] . '</a></li>';
                    }

                    if (auth()->user()->can('mission-status-recouvrir')) {
                        $actions .= '<li><a class="dropdown-item text-dark ' . (in_array(StatusJobOfferEnum::REOPENED, $disabled_items) ? 'disabled text-muted bg-light' : '') . '" href="javascript:void(0);" onclick="openStatusChangeModal(' . $jobOffer->id . ', ' . StatusJobOfferEnum::REOPENED . ')">' . StatusJobOfferEnum::getAll()[StatusJobOfferEnum::REOPENED] . '</a></li>';
                    }

                    $actions .= '</ul></div>';

                    return $actions;
                })



                ->addColumn('status_id', function ($jobOffer) {

                    // Vérification si le statut est null
                    if (is_null($jobOffer->status_id)) {
                        return '-';
                    }

                    $status_name = StatusJobOfferEnum::getStatusNameValue($jobOffer->status_id);

                    // Définition des couleurs en fonction du statut
                    $status_colors = [
                        StatusJobOfferEnum::DRAFT           => 'badge-draft',
                        StatusJobOfferEnum::NOT_STARTED     => 'badge-not-started',
                        StatusJobOfferEnum::IN_PROGRESS     => 'badge-in-progress',
                        StatusJobOfferEnum::CLOSED          => 'badge-closed',
                        StatusJobOfferEnum::SUSPENDED       => 'badge-suspended',
                        StatusJobOfferEnum::REOPENED        => 'badge-reopened',
                        StatusJobOfferEnum::CANCELLED       => 'badge-cancelled',
                        StatusJobOfferEnum::REACTIVATED     => 'badge-reactivated',
                    ];

                    $badge_color = $status_colors[$jobOffer->status_id] ?? 'badge-custom-color';

                    return '<span class="badge badge-sm ' . $badge_color . '">' . $status_name . '</span>';
                })


                ->rawColumns(['logo', 'action', 'diploma_label', 'status', 'status_id'])
                ->make(true);
        }

        $user = Auth::user();
        $client = Client::where('user_id', $user->id);

        $jobOffers = JobOffer::where('client_id', $client->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => JobOfferResource::collection(
                $jobOffers
            ),
        ]);
    }
}
