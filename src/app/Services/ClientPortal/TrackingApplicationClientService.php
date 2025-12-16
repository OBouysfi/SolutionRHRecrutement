<?php

namespace App\Services\ClientPortal;

use App\Models\TrackingApplication;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Models\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

// class TrackingApplicationClientService
// {
//     /**
//      * Récupère le total des candidatures groupées par statut.
//      *
//      * @return \Illuminate\Support\Collection  Collection avec pour clé le libellé du statut et pour valeur le total
//      */
//     public function getTotalsByStatus(): Collection
//     {
//         $totals = TrackingApplication::query()
//             ->select('status_id')
//             ->selectRaw('COUNT(*) as total')
//             ->groupBy('status_id')
//             ->get();

//         $allStatuses = StatusTrackingApplicationEnum::getAll()->toArray();

//         $results = collect();
//         foreach ($allStatuses as $id => $label) {
//             $totalEntry = $totals->firstWhere('status_id', $id);
//             $results->put($label, $totalEntry ? (int) $totalEntry->total : 0);
//         }
//         return $results;
//     }

//     public function getAcceptancePercentage(): float
//     {
//         $total = TrackingApplication::count();
//         if ($total === 0) {
//             return 0;
//         }

//         // le statut "Retenu" (id = 4) représente une offre acceptée
//         $accepted = TrackingApplication::where('status_id', 4)->count();
//         return round(($accepted / $total) * 100, 2);
//     }

//     public function getRejectionPercentage(): float
//     {
//         $total = TrackingApplication::count();
//         if ($total === 0) {
//             return 0;
//         }

//         // le statut "Rejeté" (id = 6) représente une offre refusée
//         $rejected = TrackingApplication::where('status_id', 6)->count();
//         return round(($rejected / $total) * 100, 2);
//     }

//     public function getAcceptanceStats(): array
//     {
//         return [
//             'acceptancePercentage' => $this->getAcceptancePercentage(),
//             'rejectionPercentage'  => $this->getRejectionPercentage(),
//             'acceptedCount'        => TrackingApplication::where('status_id', 4)->count(),
//             'rejectedCount'        => TrackingApplication::where('status_id', 6)->count(),
//         ];
//     }

//     // la sélection client
//     public function getClientSelectionStats(): array
//     {
//         $total = TrackingApplication::count();
//         if ($total === 0) {
//             return [
//                 'clientSelectionPercentage' => 0,
//                 'cabinetSelectionCount'     => 0,
//                 'clientSelectionCount'      => 0,
//             ];
//         }

//         // le statut "Évaluation" (id = 2) représente la sélection cabinet
//         $cabinetSelectionCount = TrackingApplication::where('status_id', 2)->count();

//         // le statut "Entretien" (id = 3) représente la sélection client
//         $clientSelectionCount = TrackingApplication::where('status_id', 3)->count();

//         $clientSelectionPercentage = round(($clientSelectionCount / $total) * 100, 2);

//         return [
//             'clientSelectionPercentage' => $clientSelectionPercentage,
//             'cabinetSelectionCount'     => $cabinetSelectionCount,
//             'clientSelectionCount'      => $clientSelectionCount,
//         ];
//     }

//     // pour la conversion à l'embauche
//     public function getConversionStats(): array
//     {
//         $total = TrackingApplication::count();
//         if ($total === 0) {
//             return [
//                 'conversionPercentage' => 0,
//                 'clientSelectionCount' => 0,
//                 'hiredCount'           => 0,
//             ];
//         }

//         // le statut "Entretien" (id = 3) représente la sélection client
//         $clientSelectionCount = TrackingApplication::where('status_id', 3)->count();

//         // le statut "Embauché" (id = 5) représente les candidats embauchés
//         $hiredCount = TrackingApplication::where('status_id', 5)->count();

//         $conversionPercentage = $clientSelectionCount > 0
//             ? round(($hiredCount / $clientSelectionCount) * 100, 2)
//             : 0;

//         return [
//             'conversionPercentage' => $conversionPercentage,
//             'clientSelectionCount' => $clientSelectionCount,
//             'hiredCount'           => $hiredCount,
//         ];
//     }

//     // pour le temps de recrutement
//     public function getRecruitmentTimeStats(): array
//     {
//         return [
//             'estimatedTime' => 60,
//             'realizedTime'  => 40,
//         ];
//     }

// }

class TrackingApplicationClientService
{

    private function filterQueryByClient($query)
    {
        if (request()->is('client-portal/*')) { // si on est dans le portail client
            // $clientId = auth()->user()->client_id;

            $userId = Auth::id();
            $clientId = Client::where('user_id', $userId)->first()->id ?? null;
            // $clientId = null;

            if ($clientId) {
                $query->whereHas('jobOffer', function ($q) use ($clientId) {
                    $q->where('client_id', $clientId);
                });
            }
        }

        return $query;
    }

    /**
     * Récupère le total des candidatures groupées par statut.
     *
     * @return \Illuminate\Support\Collection  Collection avec pour clé le libellé du statut et pour valeur le total
     */
    public function getTotalsByStatus(): Collection
    {
        $totals = $this->filterQueryByClient(TrackingApplication::query())
            ->select('status_id')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('status_id')
            ->get();


        $allStatuses = StatusTrackingApplicationEnum::getAll()->toArray();

        $results = collect();
        foreach ($allStatuses as $id => $label) {
            $totalEntry = $totals->firstWhere('status_id', $id);
            $results->put($label, $totalEntry ? (int) $totalEntry->total : 0);
        }
        return $results;
    }

    public function getAcceptancePercentage(): float
    {
        $total = $this->filterQueryByClient(TrackingApplication::query())->count();
        if ($total === 0) {
            return 0;
        }

        // le statut "Retenu" (id = 4) représente une offre acceptée
        $accepted = $this->filterQueryByClient(TrackingApplication::query())
        ->where('status_id', 4)
        ->count();
            return round(($accepted / $total) * 100, 2);
    }

    public function getRejectionPercentage(): float
    {
        $total = $this->filterQueryByClient(TrackingApplication::query())->count();
        if ($total === 0) {
            return 0;
        }

        // le statut "Rejeté" (id = 6) représente une offre refusée
        $rejected = $this->filterQueryByClient(TrackingApplication::query())
        ->where('status_id', 6)
        ->count();
            return round(($rejected / $total) * 100, 2);
    }

    public function getAcceptanceStats(): array
    {
        return [
            'acceptancePercentage' => $this->getAcceptancePercentage(),
            'rejectionPercentage'  => $this->getRejectionPercentage(),
            'acceptedCount' => $this->filterQueryByClient(TrackingApplication::query())
                ->where('status_id', 4)
                ->count(),
            'rejectedCount' => $this->filterQueryByClient(TrackingApplication::query())
                ->where('status_id', 6)
                ->count(),

        ];
    }

    // la sélection client
    public function getClientSelectionStats(): array
    {
        $total = $this->filterQueryByClient(TrackingApplication::query())->count();
        if ($total === 0) {
            return [
                'clientSelectionPercentage' => 0,
                'cabinetSelectionCount'     => 0,
                'clientSelectionCount'      => 0,
            ];
        }

        // le statut "Évaluation" (id = 2) représente la sélection cabinet
        $cabinetSelectionCount = $this->filterQueryByClient(TrackingApplication::query())
        ->where('status_id', 2)
        ->count();
        $clientSelectionCount = $this->filterQueryByClient(TrackingApplication::query())
            ->where('status_id', 3)
            ->count();


        $clientSelectionPercentage = round(($clientSelectionCount / $total) * 100, 2);

        return [
            'clientSelectionPercentage' => $clientSelectionPercentage,
            'cabinetSelectionCount'     => $cabinetSelectionCount,
            'clientSelectionCount'      => $clientSelectionCount,
        ];
    }

    // pour la conversion à l'embauche
    public function getConversionStats(): array
    {
        $total = $this->filterQueryByClient(TrackingApplication::query())->count();
        if ($total === 0) {
            return [
                'conversionPercentage' => 0,
                'clientSelectionCount' => 0,
                'hiredCount'           => 0,
            ];
        }

        // le statut "Entretien" (id = 3) représente la sélection client
        $clientSelectionCount = $this->filterQueryByClient(TrackingApplication::query())
            ->where('status_id', 3)
            ->count();
        $hiredCount = $this->filterQueryByClient(TrackingApplication::query())
            ->where('status_id', 5)
            ->count();


        $conversionPercentage = $clientSelectionCount > 0
            ? round(($hiredCount / $clientSelectionCount) * 100, 2)
            : 0;

        return [
            'conversionPercentage' => $conversionPercentage,
            'clientSelectionCount' => $clientSelectionCount,
            'hiredCount'           => $hiredCount,
        ];
    }

    // pour le temps de recrutement
    public function getRecruitmentTimeStats(): array
    {
        return [
            'estimatedTime' => 60,
            'realizedTime'  => 40,
        ];
    }

}
