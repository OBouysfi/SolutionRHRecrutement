<?php

namespace App\Http\Controllers\Web\ClientPortal;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\JobOffer;
use App\Models\Profile;
use App\Models\TrackingApplication;
use App\Models\User;
use App\Services\ClientPortal\TrackingApplicationClientService;
use App\Services\TrackingApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TrackingApplicationClientController extends Controller
{

    /**
     * Instance du service de suivi des candidatures.
     *
     * @var \App\Services\ClientPortal\TrackingApplicationClientService
     */
    protected $trackingApplicationClientService;

    /**
     * Constructeur avec injection du service.
     *
     * @param  \App\Services\ClientPortal\TrackingApplicationClientService  $trackingApplicationClientService
     */
    public function __construct(TrackingApplicationClientService $trackingApplicationClientService)
    {
        $this->trackingApplicationClientService = $trackingApplicationClientService;
        $this->middleware('permission:client-portal-access')->only(['listing']);
    }

    /**
     * Affiche la page de listing avec les statistiques.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function listing(Request $request)
    {
        // Récupération du client connecté
        $userId = Auth::id();
        $clientId = Client::where('user_id', $userId)->first()->id ?? null;
        // $clientId = null;

        if ($clientId) {
            $applications = TrackingApplication::with('profile', 'jobOffer')
                ->when($clientId, function ($query, $clientId) {
                    $query->whereHas('jobOffer', function ($q) use ($clientId) {
                        $q->where('client_id', $clientId);
                    });
                })
                ->get();
        } else {
            $applications = TrackingApplication::where('id',false)->get();
        }


        // $clients = Client::all();
        $userId = Auth::id();
        $clients = Client::where('user_id', $userId)->get() ?? [];
        // $jobOffers = JobOffer::with('client')->get();
        $jobOffers = JobOffer::whereHas('client', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('client')->get();

        $statuses = [
            ['id' => 1, 'label' => 'Shortlist', 'color' => '#f1c40f', 'icon' => 'bi-list-task'],
            ['id' => 2, 'label' => 'Évaluation', 'color' => '#fb6800', 'icon' => 'bi-person-gear'],
            ['id' => 3, 'label' => 'Entretien', 'color' => '#005dc7', 'icon' => 'bi-people'],
            ['id' => 4, 'label' => 'Retenu', 'color' => '#2e9c65', 'icon' => 'bi-person-check'],
            ['id' => 5, 'label' => 'Embauché', 'color' => '#7b84ab', 'icon' => 'bi-briefcase'],
            ['id' => 6, 'label' => 'Rejeté', 'color' => '#da2d6f', 'icon' => 'bi-person-x'],
        ];

        $grouped = $applications->groupBy('status_id');


        $totals = $this->trackingApplicationClientService->getTotalsByStatus();

        // Récupérer les statistiques pour chaque carte
        $acceptanceStats = $this->trackingApplicationClientService->getAcceptanceStats();
        $clientSelectionStats = $this->trackingApplicationClientService->getClientSelectionStats();
        $conversionStats = $this->trackingApplicationClientService->getConversionStats();
        $recruitmentTimeStats = $this->trackingApplicationClientService->getRecruitmentTimeStats();

        $userEmails = User::pluck('email', 'id')->toArray();
        $profileEmails = Profile::pluck('email', 'id')->toArray();

        $members = [];
        foreach ($userEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'user'];
        }
        foreach ($profileEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
        }

        $members = array_unique($members, SORT_REGULAR);


        return view('client_portal.trackingApplication.listing', compact(
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
        ));
    }
}
