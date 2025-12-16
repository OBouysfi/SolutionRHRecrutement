<?php

namespace App\Http\Controllers\Web;

use App\Enums\Candidate\LanguageEnum;
use App\Enums\TechnicalTest\CategoryEnum;
use App\Enums\TechnicalTest\GroupeEnum;
use App\Http\Controllers\Controller;
use App\Mail\candidateTrackingOverview;
use App\Models\Client;
use App\Models\JobOffer;
use App\Models\Matching;
use App\Models\Profile;
use App\Models\TrackingApplication;
use App\Models\User;
use App\Services\TrackingApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TrackingApplicationController extends Controller
{


    /**
     * Instance du service de suivi des candidatures.
     *
     * @var \App\Services\TrackingApplicationService
     */
    protected $trackingApplicationService;

    /**
     * Constructeur avec injection du service.
     *
     * @param  \App\Services\TrackingApplicationService  $trackingApplicationService
     */
    public function __construct(TrackingApplicationService $trackingApplicationService)
    {
        $this->trackingApplicationService = $trackingApplicationService;
        $this->middleware('permission:ats-listing')->only(['listing']);
        $this->middleware('permission:ats-SendEmail')->only(['sendEmail']);
    }

    /**
     * Affiche la page de listing avec les statistiques.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function listing(Request $request)
    {

        $clients = Client::all();
        $jobOffers = JobOffer::with('client')->get();
        $languages = LanguageEnum::getAll();
        $groups = GroupeEnum::getAll();
        $categories = CategoryEnum::getAll();
        $statuses = [
            ['id' => 1, 'label' => 'Shortlist', 'color' => '#f1c40f', 'icon' => 'bi-list-task'],
            ['id' => 2, 'label' => 'Évaluation', 'color' => '#fb6800', 'icon' => 'bi-person-gear'],
            ['id' => 3, 'label' => 'Entretien', 'color' => '#005dc7', 'icon' => 'bi-people'],
            ['id' => 4, 'label' => 'Retenu', 'color' => '#2e9c65', 'icon' => 'bi-person-check'],
            ['id' => 5, 'label' => 'Embauché', 'color' => '#7b84ab', 'icon' => 'bi-briefcase'],
            ['id' => 6, 'label' => 'Rejeté', 'color' => '#da2d6f', 'icon' => 'bi-person-x'],
        ];

        $initialLoadCount = 3; // Number of applications to show initially per status

        foreach ($statuses as $status) {
            $applications = TrackingApplication::with(['profile', 'jobOffer', 'match','jobOffer.client.evaluators'])
                ->where('status_id', $status['id'])
                ->orderBy('created_at', 'desc')
                ->take($initialLoadCount)
                ->get();

            $grouped[$status['id']] = $applications;
        }


        // $grouped = $applications->groupBy('status_id');

        foreach ($grouped as $statusId => $applications) {
            foreach ($applications as $application) {
                $match =Matching::where('profile_id', $application->profile_id)
                    ->where( 'job_offer_id', $application->job_offer_id)
                    ->first();
                $application->match = $match;
            }
        }

        $totals = $this->trackingApplicationService->getTotalsByStatus();

        // Récupérer les statistiques pour chaque carte
        $acceptanceStats = $this->trackingApplicationService->getAcceptanceStats();
        $clientSelectionStats = $this->trackingApplicationService->getClientSelectionStats();
        $conversionStats = $this->trackingApplicationService->getConversionStats();
        $recruitmentTimeStats = $this->trackingApplicationService->getRecruitmentTimeStats();

        $userEmails = User::pluck('email', 'id')->toArray();
        $profileEmails = Profile::pluck('email', 'id')->toArray();

        $members = [];
        foreach ($userEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'user'];
        }
        foreach ($profileEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
        }

        // Make sure we have unique members
        $members = array_unique($members, SORT_REGULAR);



        return view('trackingApplication.listing', compact(
            'statuses',
            'grouped',
            'totals',
            'acceptanceStats',
            'clientSelectionStats',
            'conversionStats',
            'recruitmentTimeStats',
            'clients',
            'jobOffers',
            'members',
            'languages',
            'groups',
            'categories',
        ));
    }

    /**
     * Send candidate Tracking ( ATS )
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request)
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
}
