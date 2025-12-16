<?php

namespace App\Http\Controllers\Web;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Enums\Profile\NoticePeriodEnum;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Exports\JobOffersExport;
use App\Exports\JobOffreExport;
use App\Http\Controllers\Controller;
use App\Mail\ShareListingJobOffreEmail;
use App\Mail\ShareListingProfileEmail;
use App\Models\ActivityArea;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Diploma;
use App\Models\DiplomaOption;
use App\Models\Evaluator;
use App\Models\JobOffer;
use App\Models\JobOfferExperience;
use App\Models\JobOfferFormation;
use App\Models\JobOfferSalaryExpectation;
use App\Models\Level;
use App\Models\Matching;
use App\Models\MobilityOptionType;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\SkillType;
use App\Models\TrackingApplication;
use App\Models\User;
use App\Services\JobOfferService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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
        $this->middleware('permission:mission-listing')->only(['listing']);
        $this->middleware('permission:mission-create-offer')->only(['create']);
        $this->middleware('permission:mission-edit')->only(['edit']);
        $this->middleware('permission:mission-detail')->only(['show']);
        $this->middleware('permission:mission-indicators-show')->only(['indicators']);
    }

    public function listing()
    {
        $niveaux = Level::get();
        $diplomas = Diploma::get();
        $countries = Country::get();
        $posts = Profession::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();

        // $JobOffers = JobOffer::latest()->paginate(20);
        $JobOffers = JobOffer::with(['client', 'city', 'diplomas', 'jobOfferExperience'])->latest()->paginate(20);
        
        return view('jobOffer.listing', compact('countries', 'cities', 'posts', 'clients', 'diplomas', 'status_jobOffres', 'JobOffers'));
    }

    public function create()
    {
        $cities = City::all();
        // $clients = Client::all();
        $clients = Client::with('evaluators')->get();
        $activityAreas = ActivityArea::all();
        $evaluators = Evaluator::whereNotNull('company_id')->get();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $status_jobOffers = StatusJobOfferEnum::getAll();
        $formations = Diploma::all();
        $formations_options = DiplomaOption::all();
        $professions = Profession::all();
        $skillType_technicals = SkillType::where('parent_id', SkillType::PARENT_IDS['technical'])->get();
        $skillType_personals = SkillType::where('parent_id', SkillType::PARENT_IDS['personal'])->get();
        $skillType_linguistiques = SkillType::where('parent_id', SkillType::PARENT_IDS['linguistic'])->get();
        $noticePeriodEnum = NoticePeriodEnum::getAll();
        $users = User::all();

        return view('jobOffer.create', compact('cities', 'clients', 'activityAreas', 'evaluators', 'contractsTypes', 'status_jobOffers', 'formations', 'formations_options', 'professions', 'skillType_technicals', 'skillType_personals', 'skillType_linguistiques', 'noticePeriodEnum', 'users'));
    }

    public function getClientEvaluators(Client $client)
    {
        return response()->json($client->evaluators);
    }

    public function getSkillsByCategory($categoryId)
    {
        $skills = Skill::where('skill_type_id', $categoryId)->get();
        return response()->json(['skills' => $skills]);
    }

    public function edit($id)
    {
        $jobOffer = JobOffer::findOrFail($id);
        $cities = City::all();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $status_jobOffers = StatusJobOfferEnum::getAll();
        // $clients = Client::all();
        $clients = Client::with('evaluators')->get();
        $activityAreas = ActivityArea::all();
        $evaluators = Evaluator::whereNotNull('company_id')->get();

        $formations = Diploma::all();
        $formations_options = DiplomaOption::all();
        $professions = Profession::all();

        $job_offer_salary_expectations = JobOfferSalaryExpectation::where('job_offer_id', $id)->get();
        $job_offer_formations = JobOfferFormation::where('job_offer_id', $id)->get();
        $job_offer_experiences = JobOfferExperience::where('job_offer_id', $id)->get();

        $skillType_technicals = SkillType::with(['skills'])->where('parent_id', SkillType::PARENT_IDS['technical'])->get();
        $technical_skills = $jobOffer->skills()->whereHas('skillType', function ($query) {
            $query->where('parent_id', SkillType::PARENT_IDS['technical']);
        })->get();

        $skillType_personals = SkillType::where('parent_id', SkillType::PARENT_IDS['personal'])->get();
        $personal_skills = $jobOffer->skills()->whereHas('skillType', function ($query) {
            $query->where('parent_id', SkillType::PARENT_IDS['personal']);
        })->get();


        $skillType_linguistiques = SkillType::with(['skills'])->where('parent_id', SkillType::PARENT_IDS['linguistic'])->get();
        $linguistic_skills = $jobOffer->skills()->whereHas('skillType', function ($query) {
            $query->where('parent_id', SkillType::PARENT_IDS['linguistic']);
        })->get()->groupBy(function ($skill) {
            return $skill->skillType->id;
        });

        $mobilityOptionsByParent = $jobOffer->mobilityOptionTypes()->whereIn('parent_id', array_values(MobilityOptionType::PARENT_IDS))
            ->get()->groupBy(function ($mobilityOptionType) {
                return $mobilityOptionType->parent_id;
            });

        $mobilitys_types_Geographic_mobilitys = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['Geographic_mobilitys'])->get();
        $mobilitys_types_work_modes = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['work_modes'])->get();
        $mobilitys_types_working_hours = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['working_hours'])->get();
        $mobilitys_types_availabilitys = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['availabilitys'])->get();

        $noticePeriodEnum = NoticePeriodEnum::getAll();

        return view(
            'jobOffer.edit',
            compact(
                'jobOffer',
                'cities',
                'contractsTypes',
                'status_jobOffers',
                'clients',
                'activityAreas',
                'evaluators',
                'formations',
                'formations_options',
                'professions',
                'job_offer_salary_expectations',
                'job_offer_formations',
                'job_offer_experiences',
                'skillType_technicals',
                'technical_skills',
                'skillType_personals',
                'personal_skills',
                'skillType_linguistiques',
                'linguistic_skills',
                'mobilitys_types_Geographic_mobilitys',
                'mobilitys_types_work_modes',
                'mobilitys_types_working_hours',
                'mobilitys_types_availabilitys',
                'mobilityOptionsByParent',
                'noticePeriodEnum',
            )
        );
    }

    public function show($id)
    {
        $jobOffer = JobOffer::findOrFail($id);
        $cities = City::all();
        $contractsTypes = ContractTypeProfileEnum::getAll();
        $status_jobOffers = StatusJobOfferEnum::getAll();
        // $clients = Client::all();
        $clients = Client::with('evaluators')->get();
        $activityAreas = ActivityArea::all();
        $evaluators = Evaluator::whereNotNull('company_id')->get();

        $formations = Diploma::all();
        $formations_options = DiplomaOption::all();
        $professions = Profession::all();

        $job_offer_salary_expectations = JobOfferSalaryExpectation::where('job_offer_id', $id)->get();
        $job_offer_formations = JobOfferFormation::where('job_offer_id', $id)->get();
        $job_offer_experiences = JobOfferExperience::where('job_offer_id', $id)->get();

        $skillType_technicals = SkillType::with(['skills'])->where('parent_id', SkillType::PARENT_IDS['technical'])->get();
        $technical_skills = $jobOffer->skills()->whereHas('skillType', function ($query) {
            $query->where('parent_id', SkillType::PARENT_IDS['technical']);
        })->get();

        $skillType_personals = SkillType::where('parent_id', SkillType::PARENT_IDS['personal'])->get();
        $personal_skills = $jobOffer->skills()->whereHas('skillType', function ($query) {
            $query->where('parent_id', SkillType::PARENT_IDS['personal']);
        })->get();

        $skillType_linguistiques = SkillType::with(['skills'])->where('parent_id', SkillType::PARENT_IDS['linguistic'])->get();
        $linguistic_skills = $jobOffer->skills()->whereHas('skillType', function ($query) {
            $query->where('parent_id', SkillType::PARENT_IDS['linguistic']);
        })->get()->groupBy(function ($skill) {
            return $skill->skillType->id;
        });

        $mobilityOptionsByParent = $jobOffer->mobilityOptionTypes()->whereIn('parent_id', array_values(MobilityOptionType::PARENT_IDS))
            ->get()->groupBy(function ($mobilityOptionType) {
                return $mobilityOptionType->parent_id;
            });

        $mobilitys_types_Geographic_mobilitys = MobilityOptionType::where('parent_id', operator: MobilityOptionType::PARENT_IDS['Geographic_mobilitys'])->get();
        $mobilitys_types_work_modes = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['work_modes'])->get();
        $mobilitys_types_working_hours = MobilityOptionType::where('parent_id', MobilityOptionType::PARENT_IDS['working_hours'])->get();
        $mobilitys_types_availabilitys = MobilityOptionType::where('parent_id', operator: MobilityOptionType::PARENT_IDS['availabilitys'])->get();

        $noticePeriodEnum = NoticePeriodEnum::getAll();

        return view(
            'jobOffer.show',
            compact(
                'jobOffer',
                'cities',
                'contractsTypes',
                'status_jobOffers',
                'clients',
                'activityAreas',
                'evaluators',
                'formations',
                'formations_options',
                'professions',
                'job_offer_salary_expectations',
                'job_offer_formations',
                'job_offer_experiences',
                'skillType_technicals',
                'technical_skills',
                'skillType_personals',
                'personal_skills',
                'skillType_linguistiques',
                'linguistic_skills',
                'mobilitys_types_Geographic_mobilitys',
                'mobilitys_types_work_modes',
                'mobilitys_types_working_hours',
                'mobilitys_types_availabilitys',
                'mobilityOptionsByParent',
                'noticePeriodEnum',
            )
        );
    }

    public function indicators(Request $request, JobOfferService $jobOfferService)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $countries = Country::get();
        $cities = City::with('country')->get();
        $clients = Client::get();
        $activityAreas = ActivityArea::all();
        $jobOffers = JobOffer::all();

        // Récupérer les filtres
        $country = $request->get('country');
        $city = $request->get('city');
        $client = $request->get('client');
        $activity_area = $request->get('activity_area');
        $job_offre = $request->get('job_offre');

        // Calcule le nombre total de missions par mois pour les 12 derniers mois.
        $jobOfferData = $jobOfferService->getJobOffersPerMonth($request, $country, $city, $client, $activity_area, $job_offre);

        // Calcule le nombre de candidatures par offre de mission pour les 12 derniers mois.
        $applicationsData = $jobOfferService->getNumberOfApplicationsPerOffer($request, $country, $city, $client, $activity_area, $job_offre);

        // Appeler le service pour obtenir les taux d'acceptation d'offre
        $getAcceptanceRateData = $jobOfferService->getAcceptanceRateData($request, $country, $city, $client, $activity_area, $job_offre);

        // Appeler le service pour obtenir les taux de matching
        $matchingRate = $jobOfferService->matchingRate($request, $startDate, $endDate, $country, $city, $client, $activity_area, $job_offre);

        // Récupère les données pour le taux de conversion Candidatures → Shortlist
        $chartData = $jobOfferService->getConversionChartData($request, $country, $city, $client, $activity_area, $job_offre);

        // Récupère les données pour le taux de conversion Shortlist → Embauches
        $hiringConversionData = $jobOfferService->getHiringConversionChartData($request, $country, $city, $client, $activity_area, $job_offre);

        // Appel à la méthode du service pour obtenir le taux d'acceptation
        $acceptanceRate = $jobOfferService->calculateAcceptanceRate($request, $startDate, $endDate, $country, $city, $client, $activity_area, $job_offre);

        // Appeler le service pour obtenir les taux d'abandon en cours de process
        $abandonRateData = $jobOfferService->getAbandonRateData($request, $country, $city, $client, $activity_area, $job_offre);

        // Appel de la méthode pour obtenir la performance des canaux de sourcing
        $sourcingPerformanceData = $jobOfferService->getSourcingPerformanceChartData($request, $startDate, $endDate, $country, $city, $client, $activity_area, $job_offre);

        $HiringTimeData = $jobOfferService->getHiringTimeData($request, $country, $city, $client, $activity_area, $job_offre);

        return view('jobOffer.indicators', [

            'countries' => $countries, // Ajout countries à la vue pour filter
            'cities' => $cities, // Ajout cities à la vue pour filter
            'clients' => $clients, // Ajout clients à la vue pour filter
            'activityAreas' => $activityAreas, // Ajout activityAreas à la vue pour filter
            'jobOffers' => $jobOffers, // Ajout jobOffers à la vue pour filter

            // Données pour le nombre total de missions
            'data_for_total_number_of_missions' => $jobOfferData['data_for_total_number_of_missions'],
            'labels_for_total_number_of_missions' => $jobOfferData['labels_for_total_number_of_missions'],
            'missions_by_client' => $jobOfferData['missions_by_client'] ?? [],

            // Données pour le nombre de candidatures par offre
            'data_number_of_applications_per_offer' => $applicationsData['data_number_of_applications_per_offer'],
            'labels_number_of_applications_per_offer' => $applicationsData['labels_number_of_applications_per_offer'],
            'applications_by_offer' => $applicationsData['applications_by_offer'] ?? [],

            // Données pour le taux de conversion Candidatures → Shortlist
            'conversionRates' => $chartData['conversionRates'],
            'totalApplications' => $chartData['totalApplications'],
            'shortlistedApplications' => $chartData['shortlistedApplications'],
            'labels_for_conversion_chart' => $chartData['labels_for_conversion_chart'],

            // Données mensuelles (année complète)
            'monthlyLabels' => $chartData['monthlyLabels'],
            'monthlyTotalApplications' => $chartData['monthlyTotalApplications'],
            'monthlyShortlistedApplications' => $chartData['monthlyShortlistedApplications'],
            'monthlyConversionRates' => $chartData['monthlyConversionRates'],

            // Données pour le taux de conversion Shortlist → Embauches
            'hiringConversionRates' => $hiringConversionData['conversionRates'],
            'shortlistedApplicationsForHiring' => $hiringConversionData['shortlistedApplications'],
            'hiredApplications' => $hiringConversionData['hiredApplications'],
            'labels_for_hiring_conversion_chart' => $hiringConversionData['labels_for_hiring_conversion_chart'],

            // Données mensuelles
            'monthlyShortlistForHiring_labels' => $hiringConversionData['monthlyShortlistForHiring_labels'],
            'monthlyShortlistForHiring_shortlisted' => $hiringConversionData['monthlyShortlistForHiring_shortlisted'],
            'monthlyShortlistForHiring_hired' => $hiringConversionData['monthlyShortlistForHiring_hired'],
            'monthlyShortlistForHiring_conversionRates' => $hiringConversionData['monthlyShortlistForHiring_conversionRates'],

            // Taux d'acceptation d'offre
            // 'acceptanceRate' => $acceptanceRate,

            'acceptanceRate' => $acceptanceRate['acceptanceRate'],
            'monthlyLabelsAcceptationOffre' => $acceptanceRate['monthlyLabelsAcceptationOffre'],
            'monthlyAcceptanceRates' => $acceptanceRate['monthlyAcceptanceRates'],

            // Données pour la performance des canaux de sourcing
            'sourcingPerformance' => $sourcingPerformanceData['sourcingPerformance'],
            'labels_for_sourcing_performance_chart' => $sourcingPerformanceData['labels_for_sourcing_performance_chart'],
            'tableData' => $sourcingPerformanceData['tableData'],

            // Appeler le service pour obtenir les Taux de matching (Profil / Offre)
            'matchingRate' => $matchingRate, // Passer les données à la vue
            'totalMatchingRate' => $matchingRate, // Passer les données à la vue
            'evolutionRate' => $matchingRate, // Passer les données à la vue
            'previousTotalMatchingRate' => $matchingRate, // Passer les données à la vue
            'CountDistinctPercentages' => $matchingRate['CountDistinctPercentages'],

            // Taux d'acceptation d'offre 23 jour
            'labels' => $getAcceptanceRateData['labels'],  // Assurez-vous d'accéder aux clés du tableau
            'offersEmitted' => $getAcceptanceRateData['offersEmitted'],
            'offersAccepted' => $getAcceptanceRateData['offersAccepted'],
            'monthlyData' => $getAcceptanceRateData['monthlyData'],

            // Taux d'abandon en cours de process
            'abandonRateData' => $abandonRateData,
            'monthlyDataAbandon' => $abandonRateData,

            // Temps d'embauche
            'data_temps_embauche' => $HiringTimeData['data'],
            'labels_temps_embauche' => $HiringTimeData['labels'],
            'details' => $HiringTimeData['details'],
        ]);
    }

    public function getChartData(Request $request, JobOfferService $jobOfferService)
    {
        $chartType = $request->get('chart_type');
        $country = $request->get('country');
        $city = $request->get('city');
        $client = $request->get('client');
        $activity_area = $request->get('activity_area');
        $job_offre = $request->get('job_offre');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        switch ($chartType) {
            case 'missions_by_client':
                $data = $jobOfferService->getJobOffersPerMonth($request, $country, $city, $client, $activity_area, $job_offre);
                return response()->json(['missions_by_client' => $data['missions_by_client'] ?? []]);

            case 'applications_by_offer':
                $data = $jobOfferService->getNumberOfApplicationsPerOffer($request, $country, $city, $client, $activity_area, $job_offre);
                return response()->json(['applications_by_offer' => $data['applications_by_offer'] ?? []]);

            case 'taux_acceptation_offre':
                $data = $jobOfferService->getAcceptanceRateData($request, $country, $city, $client, $activity_area, $job_offre);
                return response()->json(['taux_acceptation_offre' => $data['monthlyData'] ?? []]);

            case 'taux_matching':
                $data = $jobOfferService->matchingRate($request, $startDate, $endDate, $country, $city, $client, $activity_area, $job_offre);
                return response()->json(['taux_matching' => $data['CountDistinctPercentages'] ?? []]);

            case 'conversion_shortlist':
                $data = $jobOfferService->getConversionChartData($request, $country, $city, $client, $activity_area, $job_offre);
                // return response()->json(['conversion_shortlist' => $data['conversion_shortlist'] ?? []]);
                return response()->json([
                    'conversion_shortlist' => [
                        'monthlyLabels' => $data['monthlyLabels'],
                        'monthlyTotalApplications' => $data['monthlyTotalApplications'],
                        'monthlyShortlistedApplications' => $data['monthlyShortlistedApplications'],
                        'monthlyConversionRates' => $data['monthlyConversionRates'],
                    ]
                ]);

            case 'conversion_shortlist_embauches':
                $data = $jobOfferService->getHiringConversionChartData($request, $country, $city, $client, $activity_area, $job_offre);
                return response()->json([
                    'conversion_shortlist_embauches' => [
                        // Données mensuelles
                        'monthlyLabels' => $data['monthlyShortlistForHiring_labels'],
                        'monthlyShortlisted' => $data['monthlyShortlistForHiring_shortlisted'],
                        'monthlyHired' => $data['monthlyShortlistForHiring_hired'],
                        'monthlyConversionRates' => $data['monthlyShortlistForHiring_conversionRates'],
                    ]
                ]);

            case 'Taux_Acceptation_Offre_Demi_Cercles':
                $data = $jobOfferService->calculateAcceptanceRate($request, $startDate, $endDate, $country, $city, $client, $activity_area, $job_offre);
                return response()->json([
                    'Taux_Acceptation_Offre_Demi_Cercles' => [
                        // Données mensuelles
                        'monthlyLabelsAcceptationOffre' => $data['monthlyLabelsAcceptationOffre'],
                        'monthlyAcceptanceRates' => $data['monthlyAcceptanceRates'],
                    ]
                ]);

            case 'taux_abandon_en_cours_process':
                $data = $jobOfferService->getAbandonRateData($request, $country, $city, $client, $activity_area, $job_offre);
                return response()->json([
                    'taux_abandon_en_cours_process' => [
                        // Données mensuelles
                        'monthlyDataAbandon' => $data['monthlyDataAbandon'],
                    ]
                ]);

            case 'performance_canaux_sourcing':
                $data = $jobOfferService->getSourcingPerformanceChartData($request, $startDate, $endDate, $country, $city, $client, $activity_area, $job_offre);
                return response()->json([
                    'performance_canaux_sourcing' => [
                        // Données mensuelles
                        'tableData' => $data['tableData'],
                    ]
                ]);

            case 'temps_embauche':
                $data = $jobOfferService->getHiringTimeData($request, $country, $city, $client, $activity_area, $job_offre);
                return response()->json([
                    'temps_embauche' => [
                        // Données mensuelles
                        'details' => $data['details'],
                    ]
                ]);

                // Ajoute les autres charts ici...

            default:
                return response()->json(['error' => 'Type de graphique inconnu'], 400);
        }
    }

    public function jobOfferPreview()
    {
        $niveaux = Level::get();
        $diplomas = Diploma::get();
        $countries = Country::get();
        $posts = Profession::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();

        return view('jobOffer.preview', compact('countries', 'cities', 'posts', 'clients', 'diplomas', 'status_jobOffres'));
    }

    /**
     * sendShareEmail ( JobOffre )
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
        // Mail::to(explode(',', $request->input('to')))
        //     ->cc(explode(',', $request->input('cc')))
        //     ->send(new ShareListingJobOffreEmail($data));

        $toEmails = array_filter(array_map('trim', explode(',', $request->input('to'))));
        $ccEmails = $request->filled('cc') ? array_filter(array_map('trim', explode(',', $request->input('cc')))) : [];

        $mail = Mail::to($toEmails);

        if (!empty($ccEmails)) {
            $mail->cc($ccEmails);
        }

        $mail->send(new ShareListingJobOffreEmail($data));



        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Lien partagé avec succès !');
    }

    public function export_excel_jobOffre(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new JobOffreExport, 'JobOffre.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new JobOffreExport, 'JobOffre.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }

    public function getJobOffersHistory()
    {
        $countries = Country::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();
        return view('jobOffer.history', compact('countries', 'cities', 'clients', 'status_jobOffres'));
    }

    public function previewHistory()
    {
        $jobOffers = JobOffer::with(['client', 'trackingApplications'])->get();
        return view('jobOffer.inc.previewhistory', ['jobOffers' => $jobOffers]);
    }

    public function exportJobOffers()
    {
        return Excel::download(new JobOffersExport, 'job_offers.xlsx');
    }
}
