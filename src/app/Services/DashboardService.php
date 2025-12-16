<?php

namespace App\Services;

use App\Enums\Profile\SourceProfileEnum;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Models\ActivityArea;
use App\Models\City;
use App\Models\JobOffer;
use App\Models\Matching;
use App\Models\Profile;
use App\Models\Region;
use App\Models\TrackingApplication;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardService
{
    public function getDashboardStats(?string $startDate = null, ?string $endDate = null): array
    {
        // Convert dates if provided
        // $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay() : null;
        // $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay() : null;

        $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay() : Carbon::now()->startOfYear();
        $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay() : Carbon::now()->endOfYear();


        /*******************************************************************************************
         * Calcul pour une partie des profils actifs (CVthèque)
         *******************************************************************************************/
        // $countActive    = Profile::where('is_active', 1)->count();

        // Base query for profiles
        $profileQueryActive = Profile::query();
        if ($startDateTime && $endDateTime) {
            $profileQueryActive->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        // Statistiques de la CVthèque globales
        $countActive = $profileQueryActive->where('is_active', 1)->count();

        // Déterminer la période précédente
        $previousCountActive = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountActive = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->where('is_active', 1)
                ->count();
        }

        // Calcul du taux d'évolution (Taux de croissance simple)
        $growthRateIsActive = $previousCountActive > 0 ? (($countActive - $previousCountActive) / $previousCountActive) * 100 : ($countActive > 0 ? 100 : 0); // Évite la division par zéro et gère le cas où il y a une première croissance.


        /*******************************************************************************************
         * Calcul pour une partie des Profils qualifiés (CVthèque)
         *******************************************************************************************/
        // Nombre de profils qualifiés pour la période actuelle
        $profileQueryQualified = Profile::query();
        if ($startDateTime && $endDateTime) {
            $profileQueryQualified->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        $countQualified = (clone $profileQueryQualified)->where('is_qualified', 1)->count();

        // Déterminer le nombre de profils qualifiés pour la période précédente
        $previousCountQualified = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountQualified = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->where('is_qualified', 1)
                ->count();
        }

        // Calcul du taux d'évolution pour les profils qualifiés
        $growthRateQualified = $previousCountQualified > 0
            ? (($countQualified - $previousCountQualified) / $previousCountQualified) * 100
            : ($countQualified > 0 ? 100 : 0); // Évite la division par zéro et gère une première croissance.


        /*******************************************************************************************
         * Calcul pour une partie des Profils pertinents (CVthèque)
         *******************************************************************************************/
        // $countPertinent = Profile::where('has_driving_license', true)->count();

        $profileQueryPertinent = Profile::query();
        if ($startDateTime && $endDateTime) {
            $profileQueryPertinent->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        // Nombre de profils pertinents pour la période actuelle
        $countPertinent = (clone $profileQueryPertinent)->where('has_driving_license', true)->count();

        // Déterminer le nombre de profils pertinents pour la période précédente
        $previousCountPertinent = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountPertinent = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->where('has_driving_license', true)
                ->count();
        }

        // Calcul du taux d'évolution pour les profils pertinents
        $growthRatePertinent = $previousCountPertinent > 0
            ? (($countPertinent - $previousCountPertinent) / $previousCountPertinent) * 100
            : ($countPertinent > 0 ? 100 : 0); // Gère la division par zéro et la première croissance.


        /*******************************************************************************************
         * Calcul pour une partie Total CVs (CVthèque)
         *******************************************************************************************/
        // $countTotal = Profile::count();

        // Nombre de profils TotalProfile pour la période actuelle
        $profileQueryTotalProfile = Profile::query();
        if ($startDateTime && $endDateTime) {
            $profileQueryTotalProfile->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        $countTotalProfile = (clone $profileQueryTotalProfile)->count();

        // Use count all pour afficher le taux global sur circle
        $countTotal = Profile::count();
        $globalRateProfile = $countTotal > 0 ? ($countTotalProfile / $countTotal) * 100 : 0;

        // Déterminer le nombre de profils qualifiés pour la période précédente
        $previousCountTotalProfile = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountTotalProfile = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->count();
        }

        // Calcul du taux d'évolution pour les profils qualifiés
        $growthRateTotalProfile = $previousCountTotalProfile > 0
            ? (($countTotalProfile - $previousCountTotalProfile) / $previousCountTotalProfile) * 100
            : ($countTotalProfile > 0 ? 100 : 0); // Évite la division par zéro et gère une première croissance.

        /*******************************************************************************************
         * Calcul pour une partie des Profils actifs (Vivier talent)
         *******************************************************************************************/
        // $talentActive    = Profile::where('is_active', 1)->where('is_talented', 1)->count();

        // Base query for profiles
        $talentQueryActive = Profile::query();
        if ($startDateTime && $endDateTime) {
            $talentQueryActive->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        // Statistiques de la Vivier talent globales
        $countActiveTalent = $talentQueryActive->where('is_active', 1)->where('is_talented', 1)->count();

        // Déterminer la période précédente
        $previousCountActiveTalent = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountActiveTalent = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->where('is_active', 1)
                ->where('is_talented', 1)
                ->count();
        }

        // Calcul du taux d'évolution (Taux de croissance simple)
        $growthRateIsActiveTalent = $previousCountActiveTalent > 0 ? (($countActiveTalent - $previousCountActiveTalent) / $previousCountActiveTalent) * 100 : ($countActiveTalent > 0 ? 100 : 0); // Évite la division par zéro et gère le cas où il y a une première croissance.


        /*******************************************************************************************
         * Calcul pour une partie des Profils qualifiés (Vivier talent)
         *******************************************************************************************/
        // $talentQualified = Profile::where('is_qualified', 1)->where('is_talented', 1)->count();

        // Base query for profiles
        $talentQueryQualified = Profile::query();
        if ($startDateTime && $endDateTime) {
            $talentQueryQualified->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        // Statistiques de la Vivier talent globales
        $countQualifiedTalent = $talentQueryQualified->where('is_qualified', 1)->where('is_talented', 1)->count();

        // Déterminer la période précédente
        $previousCountQualifiedTalent = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountQualifiedTalent = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->where('is_qualified', 1)
                ->where('is_talented', 1)
                ->count();
        }

        // Calcul du taux d'évolution (Taux de croissance simple)
        $growthRateIsQualifiedTalent = $previousCountQualifiedTalent > 0 ? (($countQualifiedTalent - $previousCountQualifiedTalent) / $previousCountQualifiedTalent) * 100 : ($countQualifiedTalent > 0 ? 100 : 0); // Évite la division par zéro et gère le cas où il y a une première croissance.

        /*******************************************************************************************
         * Calcul pour une partie des Profils pertinents (Vivier talent)
         *******************************************************************************************/
        // $talentPertinent = Profile::where('has_driving_license', true)->where('is_talented', 1)->count();

        // Base query for profiles
        $talentQueryPertinent = Profile::query();
        if ($startDateTime && $endDateTime) {
            $talentQueryPertinent->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        // Statistiques de la Vivier talent globales
        $countPertinentTalent = $talentQueryPertinent->where('has_driving_license', true)->where('is_talented', 1)->count();

        // Déterminer la période précédente
        $previousCountPertinentTalent = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountPertinentTalent = Profile::whereBetween('created_at', [$previousStart, $previousEnd])
                ->where('has_driving_license', true)
                ->where('is_talented', 1)
                ->count();
        }

        // Calcul du taux d'évolution (Taux de croissance simple)
        $growthRateIsPertinentTalent = $previousCountPertinentTalent > 0 ? (($countPertinentTalent - $previousCountPertinentTalent) / $previousCountPertinentTalent) * 100 : ($countPertinentTalent > 0 ? 100 : 0); // Évite la division par zéro et gère le cas où il y a une première croissance.


        /*******************************************************************************************
         * Calcul pour une partie Total CVs (Vivier talent)
         *******************************************************************************************/

        // $talentTotal     = Profile::where('is_talented', 1)->count();
        // $countTotal = Profile::count();

        // Nombre de profils TotalProfile pour la période actuelle
        $profileQueryTotalTalent = Profile::query();
        if ($startDateTime && $endDateTime) {
            $profileQueryTotalTalent->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }


        $countTotalTalentByDate = (clone $profileQueryTotalTalent)->where('is_talented', 1)->count();

        // Use count all pour afficher le taux global sur circle
        $countTotalTalent = Profile::where('is_talented', 1)->count();
        $globalRateProfileTalent = $countTotalTalent > 0 ? ($countTotalTalentByDate / $countTotalTalent) * 100 : 0;
        // dd($globalRateProfileTalent);

        // Déterminer le nombre de profils qualifiés pour la période précédente
        $previousCountTotalProfileTalent = 0;
        if ($startDateTime && $endDateTime) {
            $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
            $previousStart = $startDateTime->copy()->subDays($daysDiff);
            $previousEnd = $endDateTime->copy()->subDays($daysDiff);

            $previousCountTotalProfileTalent = Profile::where('is_talented', 1)->whereBetween('created_at', [$previousStart, $previousEnd])->count();
        }

        // Calcul du taux d'évolution pour les profils qualifiés
        $growthRateTotalProfileTalent = $previousCountTotalProfileTalent > 0 ? (($countTotalTalentByDate - $previousCountTotalProfileTalent) / $previousCountTotalProfileTalent) * 100 : ($countTotalTalentByDate > 0 ? 100 : 0); // Évite la division par zéro et gère une première croissance.


        /*******************************************************************************************
         * Calcul Taux d'interaction Cvthèque
         *******************************************************************************************/
        // Nombre total de recruteurs (ou missions) – ajustez cette valeur selon votre contexte
        // $totalRecruiters = 100;

        // // Calcul du taux d'interaction pour l'ensemble de la CVthèque par mois
        // $interactionRates = [];
        // for ($month = 1; $month <= 12; $month++) {
        //     $totalViews = Profile::whereMonth('updated_at', $month)->sum('total_views');
        //     // Offres d'emploi
        //      $jobOffers = JobOffer::whereMonth('created_at', $month)->count();

        //     $rate = $totalRecruiters > 0 ? round(($totalViews / $totalRecruiters) * 100, 2) : 0;
        //     $interactionRates[$month] = $rate;

        // }



        // $year = request()->input('year', $startDateTime->year);

        // $interactionRates = [];

        //     for ($month = 1; $month <= 12; $month++) {
        //     $CvthequeProfiles = DB::table('profiles')
        //         ->whereYear('updated_at', $year)
        //         ->whereMonth('updated_at', $month)
        //         ->count();

        //     $jobOffers = DB::table('job_offers')
        //         ->whereYear('created_at', $year)
        //         ->whereMonth('created_at', $month)
        //         ->count();

        //     $rateCvtheque = $CvthequeProfiles > 0 ? round(($jobOffers / $CvthequeProfiles) * 100) : 0;

        //     $interactionRates[$month] = $rateCvtheque;
        // }
        $startDateTime = $startDate
            ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay()
            : Carbon::now()->startOfYear();

        $endDateTime = $endDate
            ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay()
            : Carbon::now()->endOfYear();

        $year = request()->input('year', $startDateTime->year);

        $interactionRates = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthStart = Carbon::create($year, $month, 1)->startOfDay();
            $monthEnd = Carbon::create($year, $month, 1)->endOfMonth()->endOfDay();

            // profiles: created OR updated this month
            $CvthequeProfiles = DB::table('profiles')
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            // job_offers: created OR updated this month
            $jobOffers = DB::table('job_offers')
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            $rateCvtheque = $CvthequeProfiles > 0
                ? round(($jobOffers / $CvthequeProfiles) * 100)
                : 0;

            $interactionRates[$month] = $rateCvtheque;
        }






        /*******************************************************************************************
         * Calcul Taux d'interaction vivier talents
         *******************************************************************************************/

        // Calcul du taux d'interaction pour le vivier talents (is_talented = 1) par mois
        // $interactionRatesTalent = [];
        // for ($month = 1; $month <= 12; $month++) {
        //     $totalViewsTalent = Profile::where('is_talented', 1)
        //         ->whereMonth('updated_at', $month)
        //         ->sum('total_views');

        //     $rateTalent = $totalRecruiters > 0 ? round(($totalViewsTalent / $totalRecruiters) * 100, 0) : 0;
        //     $interactionRatesTalent[$month] = $rateTalent;
        // }

        // $year = request()->input('year', $startDateTime->year);

        // $interactionRatesTalent = [];

        //     for ($month = 1; $month <= 12; $month++) {
        //     $talentedProfiles = DB::table('profiles')
        //         ->where('is_talented', 1)
        //         ->whereYear('updated_at', $year)
        //         ->whereMonth('updated_at', $month)
        //         ->count();

        //     $jobOffers = DB::table('job_offers')
        //         ->whereYear('created_at', $year)
        //         ->whereMonth('created_at', $month)
        //         ->count();

        //     $rateTalent = $talentedProfiles > 0 ? round(($jobOffers / $talentedProfiles) * 100) : 0;

        //     $interactionRatesTalent[$month] = $rateTalent;
        // }
        $startDateTime = $startDate
            ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay()
            : Carbon::now()->startOfYear();

        $endDateTime = $endDate
            ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay()
            : Carbon::now()->endOfYear();

        $year = request()->input('year', $startDateTime->year);

        $interactionRatesTalent = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthStart = Carbon::create($year, $month, 1)->startOfDay();
            $monthEnd = Carbon::create($year, $month, 1)->endOfMonth()->endOfDay();

            // talented profiles: created OR updated
            $talentedProfiles = DB::table('profiles')
                ->where('is_talented', 1)
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            // job offers: created OR updated
            $jobOffers = DB::table('job_offers')
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            $rateTalent = $talentedProfiles > 0
                ? round(($jobOffers / $talentedProfiles) * 100)
                : 0;

            $interactionRatesTalent[$month] = $rateTalent;
        }




        // /*******************************************************************************************
        //  * Taux de réussite : CVthèque vs. sourcing externe
        // /*******************************************************************************************/

        // // Nombre total de candidats (toutes sources confondues)
        // $totalApplications = TrackingApplication::count();

        // // Nombre de recrutements issus de la CVthèque
        // $internalHired = TrackingApplication::whereHas('profile', function ($query) {
        //     $query->where('source', 'CVthèque Humanjobs'); // Filtre pour les candidats de la CVthèque
        // })->where('status_id', StatusTrackingApplicationEnum::HIRING)->count();

        // // Nombre de recrutements externes
        // $externalHired = TrackingApplication::whereDoesntHave('profile', function ($query) {
        //     $query->where('source', 'CVthèque Humanjobs'); // Filtre pour les candidats externes
        // })->where('status_id', StatusTrackingApplicationEnum::HIRING)->count();

        // // Calcul du taux de réussite interne
        // $internalSuccessRate = $totalApplications > 0 ? ($internalHired / $totalApplications) * 100 : 0;

        // // Calcul du taux de réussite externe
        // $externalSuccessRate = $totalApplications > 0 ? ($externalHired / $totalApplications) * 100 : 0;

        // // Calcul du total des recrutements internes + externes en pourcentage
        // // C'est la somme des recrutements internes et externes en pourcentage, basée sur le nombre total de recrutements
        // $totalSuccessRate = $totalApplications > 0 ? (($internalHired + $externalHired) / $totalApplications) * 100 : 0;


        // Nombre total de candidatures sur la période
        $totalApplications = TrackingApplication::whereBetween('created_at', [$startDateTime, $endDateTime])->count();

        // Nombre de recrutements issus de la CVthèque dans la période
        $internalHired = TrackingApplication::whereHas('profile', function ($query) {
            $query->where('source', 'CVthèque Humanjobs');
        })->where('status_id', StatusTrackingApplicationEnum::HIRING)
            ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->count();

        // Nombre de recrutements externes dans la période
        $externalHired = TrackingApplication::whereDoesntHave('profile', function ($query) {
            $query->where('source', 'CVthèque Humanjobs');
        })->where('status_id', StatusTrackingApplicationEnum::HIRING)
            ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->count();
        // Calcul du taux de réussite interne pour la période
        $internalSuccessRate = $totalApplications > 0 ? ($internalHired / $totalApplications) * 100 : 0;

        // Calcul du taux de réussite externe pour la période
        $externalSuccessRate = $totalApplications > 0 ? ($externalHired / $totalApplications) * 100 : 0;

        // Calcul du taux de réussite total (internes + externes)
        $totalSuccessRate = $totalApplications > 0 ? (($internalHired + $externalHired) / $totalApplications) * 100 : 0;

        // Taux d'évolution (comparaison avec la période précédente)
        // Calcul de la différence en jours
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1; // +1 pour inclure le jour de départ

        // Période précédente en soustrayant la différence en jours
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // Nombre total de candidatures sur la période précédente
        // $previousTotalApplications = TrackingApplication::whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])->count();

        // Nombre de recrutements issus de la CVthèque dans la période précédente
        $previousInternalHired = TrackingApplication::whereHas('profile', function ($query) {
            $query->where('source', 'CVthèque Humanjobs');
        })->where('status_id', StatusTrackingApplicationEnum::HIRING)
            ->whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])
            ->count();

        // Nombre de recrutements externes dans la période précédente
        $previousExternalHired = TrackingApplication::whereDoesntHave('profile', function ($query) {
            $query->where('source', 'CVthèque Humanjobs');
        })->where('status_id', StatusTrackingApplicationEnum::HIRING)
            ->whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])
            ->count();

        // Nombre total de recrutements pour la période actuelle
        $totalHired = $internalHired + $externalHired;

        // Nombre total de recrutements pour la période précédente
        $previousTotalHired = $previousInternalHired + $previousExternalHired;

        // Calcul de l'évolution interne en % (nombre de recrutements internes)
        // $evolutionInternalCount = $previousInternalHired > 0 ? (($internalHired - $previousInternalHired) / $previousInternalHired) * 100 : 0;

        // Calcul de l'évolution externe en % (nombre de recrutements externes)
        // $evolutionExternalCount = $previousExternalHired > 0 ? (($externalHired - $previousExternalHired) / $previousExternalHired) * 100 : 0;

        // Calcul de l'évolution totale en % (nombre total de recrutements)
        $evolutionTotalCount = $previousTotalHired > 0 ? (($totalHired - $previousTotalHired) / $previousTotalHired) * 100 : 0;

        /*******************************************************************************************
         * Taux d’obsolescence des CVs (old)
        /*******************************************************************************************/

        // // dump(Carbon::now()->subDays(90));

        // Nombre total de CVs
        $totalCVs = Profile::count();
        // dump("Nombre total de CVs: ". $totalCVs);


        // Nombre de CVs obsolètes (dernière mise à jour il y a plus de 3 mois)
        $obsoleteCVs = Profile::where('updated_at', '<', Carbon::now()->subDays(180))->count();
        // dump("Nombre de CVs obsolètes: ". $obsoleteCVs);

        // Nombre de CVs à jour
        $updatedCVs = $totalCVs - $obsoleteCVs;
        // dump("Nombre de CVs à jour: ". $updatedCVs);


        // Calcul du taux d’obsolescence et de mise à jour
        $obsoleteRate = $totalCVs > 0 ? ($obsoleteCVs / $totalCVs) * 100 : 0;
        $updatedRate = $totalCVs > 0 ? ($updatedCVs / $totalCVs) * 100 : 0;


        // Définition de la période précédente (même durée que la période actuelle)
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1; // +1 pour inclure le jour de départ
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        /*******************************************************************************************
         * Taux d’obsolescence des CVs (avec filtrage par date)
         *******************************************************************************************/
        // Nombre total de CVs dans la période actuelle
        $totalCVs = Profile::whereBetween('updated_at', [$startDateTime, $endDateTime])->count();

        // Nombre de CVs obsolètes (mise à jour il y a plus de 3 mois)
        $obsoleteCVs = Profile::where('updated_at', '<', Carbon::now()->subDays(180))
            ->whereBetween('updated_at', [$startDateTime, $endDateTime])
            ->count();

        // Nombre de CVs à jour dans la période actuelle
        $updatedCVs = $totalCVs - $obsoleteCVs;

        // dump($obsoleteCVs);
        // dump($updatedCVs);

        // Calcul des taux en pourcentage
        $obsoleteRate = $totalCVs > 0 ? round(($obsoleteCVs / $totalCVs) * 100, 2) : 0;
        $updatedRate = $totalCVs > 0 ? round(($updatedCVs / $totalCVs) * 100, 2) : 0;

        // Tableau pour stocker les résultats par mois
        $obsolescenceData = [];
        $currentYear = now()->year;

        // $totalCVsByMonth = Profile::selectRaw('DATE_FORMAT(updated_at, "%Y-%m") as month, COUNT(*) as total')
        // ->whereBetween('updated_at', [$startDateTime, $endDateTime])
        // ->groupBy('month')
        // ->orderBy('month')
        // ->get();

        // $obsoleteCVsByMonth = Profile::selectRaw('DATE_FORMAT(updated_at, "%Y-%m") as month, COUNT(*) as total')
        // ->where('updated_at', '<', Carbon::now()->subDays(90))
        // ->whereBetween('updated_at', [$startDateTime, $endDateTime])
        // ->groupBy('month')
        // ->orderBy('month')
        // ->get();

        // dump($totalCVsByMonth);
        // dump($obsoleteCVsByMonth);

        /*******************************************************************************************
         * Taux d’évolution globale
         *******************************************************************************************/

        // Nombre total de CVs dans la période précédente
        $previousTotalCVs = Profile::whereBetween('updated_at', [$previousStartDateTime, $previousEndDateTime])->count();

        // Calcul du taux d'évolution globale (% d'augmentation ou de diminution)
        $evolutionRate = $previousTotalCVs > 0 ? round((($totalCVs - $previousTotalCVs) / $previousTotalCVs) * 100, 2) : ($totalCVs > 0 ? 100 : 0); // Si aucun CV auparavant et des CV maintenant, c'est une croissance de 100%

        /*******************************************************************************************
         * Calcule le taux Performance des canaux de sourcing.
        /*******************************************************************************************/

        // // Obtenir toutes les sources uniques à partir de SourceProfileEnum
        // $sources = SourceProfileEnum::getAll()->keys();

        // $sourcingPerformance = []; // Contiendra les taux de conversion pour chaque source
        // $labels_for_sourcing_performance_chart = []; // Labels pour le graphique (noms des sources)

        // foreach ($sources as $source) {
        //     // Nombre total de candidats
        //     $totalApplications = TrackingApplication::count();

        //     // Nombre de candidats embauchés pour chaque source
        //     $hiredApplications = TrackingApplication::whereHas('profile', function ($query) use ($source) {
        //         $query->where('source', $source);
        //     })->where('status_id', StatusTrackingApplicationEnum::HIRING)->count();

        //     // Calcul du taux de conversion
        //     $conversionRate = $totalApplications > 0 ? ($hiredApplications / $totalApplications) * 100 : 0;

        //     // Filtrer les taux de conversion > 0
        //     if ($conversionRate > 0) {
        //         // Ajouter les données au graphique
        //         $labels_for_sourcing_performance_chart[] = $source;
        //         $sourcingPerformance[] = round($conversionRate, 2); // Arrondi à 2 décimales
        //     }
        // }


        /*******************************************************************************************
         * Calcule le taux de performance des canaux de sourcing avec filtrage par date.
         *******************************************************************************************/

        // Obtenir toutes les sources uniques à partir de SourceProfileEnum
        $sources = SourceProfileEnum::getAll()->keys();

        $sourcingPerformance = []; // Contiendra les taux de conversion pour chaque source
        $labels_for_sourcing_performance_chart = []; // Labels pour le graphique (noms des sources)
        $sourceData = []; // Contiendra les données à afficher dans le tableau

        // Nombre total de candidatures sur la période sélectionnée
        $totalApplications = TrackingApplication::whereBetween('created_at', [$startDateTime, $endDateTime])->count();

        foreach ($sources as $source) {
            // Nombre de candidats embauchés pour chaque source dans la période sélectionnée
            $hiredApplications = TrackingApplication::whereHas('profile', function ($query) use ($source) {
                $query->where('source', $source);
            })->whereBetween('created_at', [$startDateTime, $endDateTime])
                ->where('status_id', StatusTrackingApplicationEnum::HIRING)
                ->count();

            // Nombre total d'offres d'emploi pour chaque source
            // $totalJobOffers = JobOffer::whereHas('trackingApplications.profile', function ($query) use ($source) {
            //     $query->where('source', $source);
            // })->count();

            // Calcul du taux de conversion
            $conversionRate = $totalApplications > 0 ? ($hiredApplications / $totalApplications) * 100 : 0;

            // Filtrer les taux de conversion > 0
            if ($conversionRate > 0) {
                // // Ajouter les données au tableau
                // $sourceData[] = [
                //     'source' => $source,
                //     'hiredApplication' => $hiredApplications,
                //     'conversion_rate' => round($conversionRate, 2)
                // ];

                // Ajouter les données au graphique
                $labels_for_sourcing_performance_chart[] = $source;
                $sourcingPerformance[] = round($conversionRate, 2);
            }
        }


        /*******************************************************************************************
         * Nombre de missions par poste (title) en pourcentage (Top 20)
         *******************************************************************************************/

        // // Nombre total de missions
        // $totalMissions = JobOffer::count();

        // // Récupérer les 20 titres les plus fréquents avec leur pourcentage
        // $missionsByTitle = JobOffer::select('title', DB::raw('COUNT(*) as total'))
        //     ->groupBy('title')
        //     ->orderByDesc('total') // Trier par ordre décroissant
        //     ->take(20) // Prendre les 20 premiers
        //     ->get()
        //     ->mapWithKeys(function ($item) use ($totalMissions) {
        //         $percentage = $totalMissions > 0 ? ($item->total / $totalMissions) * 100 : 0;
        //         return [$item->title => round($percentage, 2)]; // Arrondi à 2 décimales
        //     })
        //     ->toArray();

        // // Calculer le total des pourcentages
        // $totalMissionsByTitle = array_sum($missionsByTitle);


        // Calcul de la période précédente avant tout
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1; // +1 pour inclure le jour de départ
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // Nombre total de missions dans la période actuelle
        $totalMissions = JobOffer::whereBetween('created_at', [$startDateTime, $endDateTime])->count();

        // Nombre total de missions dans la période précédente
        $previousTotalMissionsByTitle = JobOffer::whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])->count();


        // Calcul du taux d'évolution avec arrondi
        $tauxEvolution = $previousTotalMissionsByTitle > 0
            ? round((($totalMissions - $previousTotalMissionsByTitle) / $previousTotalMissionsByTitle) * 100, 2)
            : 0; // 0% si période précédente vide

        // Récupération des 20 titres les plus fréquents avec filtrage par date

        // $missionsByTitle = JobOffer::select('title', DB::raw('COUNT(*) as total'))
        //     ->whereBetween('created_at', [$startDateTime, $endDateTime])
        //     ->groupBy('title')
        //     ->orderByDesc('total')
        //     ->take(20)
        //     ->get()
        //     ->mapWithKeys(function ($item) use ($totalMissions) {
        //         $percentage = $totalMissions > 0 ? ($item->total / $totalMissions) * 100 : 0;
        //         return [$item->title => round($percentage, 2)];
        //     })
        //     ->toArray();

        $missionsByTitle = JobOffer::select('professions.label', DB::raw('COUNT(*) as total'))
            ->join('professions', 'job_offers.profession_id', '=', 'professions.id')
            ->whereBetween('job_offers.created_at', [$startDateTime, $endDateTime])
            ->groupBy('professions.label')
            ->orderByDesc('total')
            ->take(20)
            ->get()
            ->mapWithKeys(function ($item) use ($totalMissions) {
                $percentage = $totalMissions > 0 ? ($item->total / $totalMissions) * 100 : 0;
                return [$item->label => round($percentage, 2)];
            })
            ->toArray();
        // Total des pourcentages actuels
        // $totalMissionsByTitle = array_sum($missionsByTitle);
        $totalMissionsByTitle = count($missionsByTitle);



        // Récupère les professions les plus demandées dans les offres d’emploi sur une période donnée,
        // avec le nombre total d’offres et le pourcentage que chaque profession représente par rapport
        // au nombre total d’offres ($totalMissions).
        $missionsData = JobOffer::select('professions.label', DB::raw('COUNT(*) as total'))
            ->join('professions', 'job_offers.profession_id', '=', 'professions.id')
            ->whereBetween('job_offers.created_at', [$startDateTime, $endDateTime])
            ->groupBy('professions.label')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) use ($totalMissions) {
                $percentage = $totalMissions > 0 ? ($item->total / $totalMissions) * 100 : 0;
                return [
                    'label' => $item->label,
                    'total' => $item->total,
                    'percentage' => round($percentage, 2)
                ];
            })
            ->toArray();


        // /*******************************************************************************************
        //  * Nombre de missions par région en pourcentage avec filtrage par date et taux d'évolution global
        //  *******************************************************************************************/

        // // Définition de la période précédente (même durée)
        // $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
        // $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        // $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // // Récupération des régions avec les villes et les missions filtrées par date (période actuelle)
        // $regions = Region::with(['cities.jobOffers' => function ($query) use ($startDateTime, $endDateTime) {
        //     $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        // }])->get();
        // // Nombre total de missions dans la période actuelle
        // $totalMissions = $regions->flatMap(
        //     fn($region) =>
        //     $region->cities->flatMap(fn($city) => $city->jobOffers)
        // )->count();

        // // Récupération des missions pour la période précédente
        // $previousTotalMissionsByRegion = Region::with(['cities.jobOffers' => function ($query) use ($previousStartDateTime, $previousEndDateTime) {
        //     $query->whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime]);
        // }])->get()->flatMap(
        //     fn($region) =>
        //     $region->cities->flatMap(fn($city) => $city->jobOffers)
        // )->count();
        // // Calcul du taux d'évolution global
        // $tauxEvolutionGlobalRegion = $previousTotalMissionsByRegion > 0 ? (($totalMissions - $previousTotalMissionsByRegion) / $previousTotalMissionsByRegion) * 100 : 0;
        // // Initialisation des données pour les graphiques
        // $labels_region = [];
        // $percentages_data_region = [];
        // $tableData = [];

        // foreach ($regions as $region) {
        //     // Calcul du nombre de missions pour chaque région
        //     $missionsCount = $region->cities->flatMap(fn($city) => $city->jobOffers)->count();
        //     $percentage = $totalMissions > 0 ? ($missionsCount / $totalMissions) * 100 : 0;
        //     if ($missionsCount > 0) {
        //         $percentage = $totalMissions > 0 ? ($missionsCount / $totalMissions) * 100 : 0;


        //         // Ajout des données dans les tableaux respectifs
        //         $labels_region[] = $region->label;
        //         $percentages_data_region[] = round($percentage, 2);
        //         $tableData[] = [
        //             'region' => $region->label,
        //             'count' => $missionsCount,
        //             'percentage' => $percentage,
        //         ];

        //     }

        // }

        // // Total des pourcentages actuels
        // // $totalPercentage = array_sum($percentages_data_region);
        // $totalPercentage = count($percentages_data_region);

        /*******************************************************************************************
         * Nombre de missions par ville en pourcentage avec filtrage par date et taux d'évolution global
         *******************************************************************************************/

        // Définir la période précédente (même durée)
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // Récupération des villes avec leurs missions pour la période actuelle
        $cities = City::with(['jobOffers' => function ($query) use ($startDateTime, $endDateTime) {
            $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }])->get();

        // Nombre total de missions (période actuelle)
        $totalMissions = $cities->flatMap(fn($city) => $city->jobOffers)->count();

        // Récupération du total de missions pour la période précédente
        $previousTotalMissionsByRegion = City::with(['jobOffers' => function ($query) use ($previousStartDateTime, $previousEndDateTime) {
            $query->whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime]);
        }])->get()->flatMap(fn($city) => $city->jobOffers)->count();

        // Calcul du taux d'évolution global
        $tauxEvolutionGlobalRegion = $previousTotalMissionsByRegion > 0
            ? (($totalMissions - $previousTotalMissionsByRegion) / $previousTotalMissionsByRegion) * 100
            : 0;

        // Initialisation des données pour les graphiques
        $labels_region = [];
        $percentages_data_region = [];
        $tableData = [];

        foreach ($cities as $city) {
            $missionsCount = $city->jobOffers->count();
            if ($missionsCount > 0) {
                $percentage = ($missionsCount / $totalMissions) * 100;

                $labels_region[] = $city->name; // ou name selon ta structure
                $percentages_data_region[] = round($percentage, 2);
                $tableData[] = [
                    'city' => $city->name,
                    'count' => $missionsCount,
                    'percentage' => round($percentage, 2),
                ];
            }
        }

        // Total des pourcentages actuels (si nécessaire)
        $totalPercentage = count($percentages_data_region);




        /*******************************************************************************************
         * Nombre de missions par secteur (activity_areas) en pourcentage (Top 20)
         *******************************************************************************************/

        // // Récupérer les secteurs d'activité et le nombre d'offres par secteur
        // $missionsByActivityArea = JobOffer::select('activity_area_id', DB::raw('COUNT(*) as total'))
        //     ->groupBy('activity_area_id')
        //     ->get();

        // // Récupérer les labels des secteurs d'activité (par exemple, depuis la table activity_areas)
        // $activity_areas = ActivityArea::pluck('label', 'id')->toArray();

        // // Mapper les secteurs et leur pourcentage
        // $missionsByActivityAreaPercentages = $missionsByActivityArea->mapWithKeys(function ($item) use ($totalMissions, $activity_areas) {
        //     $percentage = $totalMissions > 0 ? ($item->total / $totalMissions) * 100 : 0;

        //     // Vérifier si la clé existe dans $activity_areas
        //     if (isset($activity_areas[$item->activity_area_id])) {
        //         return [$activity_areas[$item->activity_area_id] => round($percentage, 2)]; // Arrondi à 2 décimales
        //     }

        //     // Retourner une valeur par défaut si l'ID n'existe pas
        //     return ['Inconnu' => round($percentage, 2)];
        // });

        // // Calculer le total des pourcentages
        // $totalMissionsByActivityArea = array_sum($missionsByActivityAreaPercentages->toArray());

        /*******************************************************************************************
         * Nombre de missions par secteur (activity_areas) en pourcentage (Top 20)
         *******************************************************************************************/

        // Définition de la période actuelle (en utilisant les variables $startDateTime et $endDateTime)
        //Nombre total de missions pour la période actuelle
        // $totalMissionsCurrent = JobOffer::whereBetween('created_at', [$startDateTime, $endDateTime])->count();

        // dump($totalMissionsCurrent);

        // // Récupérer les secteurs d'activité et le nombre d'offres par secteur pour la période actuelle
        // $missionsByActivityAreaCurrent = JobOffer::select('activity_area_id', DB::raw('COUNT(*) as total'))
        //     ->whereBetween('created_at', [$startDateTime, $endDateTime])
        //     ->groupBy('activity_area_id')
        //     ->get();

        // // Récupérer les secteurs d'activité (labels)
        // $activity_areas = ActivityArea::pluck('label', 'id')->toArray();

        // // Mapper les secteurs d'activité et leur pourcentage pour la période actuelle
        // $missionsByActivityAreaPercentagesCurrent = $missionsByActivityAreaCurrent->mapWithKeys(function ($item) use ($totalMissionsCurrent, $activity_areas) {
        //     $percentage = $totalMissionsCurrent > 0 ? ($item->total / $totalMissionsCurrent) * 100 : 0;

        //     // Si le secteur est trouvé, on l'ajoute, sinon on marque "Inconnu"
        //     return [isset($activity_areas[$item->activity_area_id])
        //         ? $activity_areas[$item->activity_area_id]
        //         : 'Inconnu' => round($percentage, 2)];
        // });

        // // Calcul du total des pourcentages pour la période actuelle
        // $totalMissionsByActivityAreaCurrent = array_sum($missionsByActivityAreaPercentagesCurrent->toArray());


        // // Filtrage pour la période précédente (même durée)
        // $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
        // $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        // $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // // Nombre total de missions pour la période précédente
        // $totalMissionsPrevious = JobOffer::whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])->count();

        // // Calcul du taux d'évolution global
        // $tauxEvolutionGlobalActivityArea = $totalMissionsPrevious > 0 ? (($totalMissionsCurrent - $totalMissionsPrevious) / $totalMissionsPrevious) * 100 : 0;


        // // Mapper les résultats pour associer chaque secteur d'activité à son nombre total d'offres d'emploi.
        // // On remplace les IDs par les labels (noms) des secteurs pour un affichage plus lisible.
        // // Si un secteur n'existe pas dans la liste des labels, on utilise "Inconnu" comme libellé par défaut.
        // $jobOffersByActivityArea = $missionsByActivityAreaCurrent->mapWithKeys(function ($item) use ($activity_areas, $totalMissionsCurrent) {
        //     $label = $activity_areas[$item->activity_area_id] ?? 'Inconnu';
        //     $percentage = $totalMissionsCurrent > 0 ? round(($item->total / $totalMissionsCurrent) * 100, 2) : 0;

        //     return [
        //         $label => [
        //             'total' => $item->total,
        //             'percentage' => $percentage
        //         ]
        //     ];
        // });

        // Définir la période (par défaut : les 30 derniers jours si aucune date n’est fournie)
        // $startDateTime = $startDate
        // ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay()
        // : now()->subDays(30);

        // $endDateTime = $endDate
        // ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay()
        // : now();


        //  Récupérer le nombre total d’offres d’emploi créées pendant la période actuelle
        $totalMissionsCurrent = JobOffer::whereBetween('created_at', [$startDateTime, $endDateTime])->count();

        //  Récupérer le nombre d’offres par secteur d’activité pendant la période actuelle
        $missionsByActivityAreaCurrent = JobOffer::select('activity_area_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->groupBy('activity_area_id')
            ->get();

        // Récupérer les libellés des secteurs d’activité
        $activity_areas = ActivityArea::pluck('label', 'id')->toArray();

        //  Calculer le pourcentage d’offres pour chaque secteur
        $missionsByActivityAreaPercentagesCurrent = $missionsByActivityAreaCurrent->mapWithKeys(function ($item) use ($totalMissionsCurrent, $activity_areas) {
            $percentage = $totalMissionsCurrent > 0 ? ($item->total / $totalMissionsCurrent) * 100 : 0;
            $key = $activity_areas[$item->activity_area_id] ?? 'Inconnu';

            return [
                $key => round($percentage, 2)
            ];
        });

        //  Calculer la somme totale des pourcentages (doit approcher 100%)
        // $totalMissionsByActivityAreaCurrent = array_sum($missionsByActivityAreaPercentagesCurrent->toArray());
        $totalMissionsByActivityAreaCurrent = $missionsByActivityAreaCurrent->count();

        //  Calculer la période précédente (même durée)
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        //  Compter le nombre total d’offres pendant la période précédente
        $totalMissionsPrevious = JobOffer::whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])->count();

        //  Calculer le taux d’évolution global entre les deux périodes
        $tauxEvolutionGlobalActivityArea = $totalMissionsPrevious > 0
            ? (($totalMissionsCurrent - $totalMissionsPrevious) / $totalMissionsPrevious) * 100
            : 0;

        //  Créer un tableau associatif secteur => [total, pourcentage]
        $jobOffersByActivityArea = $missionsByActivityAreaCurrent->mapWithKeys(function ($item) use ($activity_areas, $totalMissionsCurrent) {
            $label = $activity_areas[$item->activity_area_id] ?? 'Inconnu';
            $percentage = $totalMissionsCurrent > 0 ? round(($item->total / $totalMissionsCurrent) * 100, 2) : 0;

            return [
                $label => [
                    'total' => $item->total,
                    'percentage' => $percentage
                ]
            ];
        });





        /*******************************************************************************************
         * Calcul du pourcentage de femmes et d'hommes dans la base de données des profils.
         *******************************************************************************************/

        // // Compte le nombre de profils féminins dans la base de données
        // $femaleCount = Profile::where('sexe', 'Female')->count();

        // // Compte le nombre de profils masculins dans la base de données
        // $maleCount = Profile::where('sexe', 'Male')->count();


        // // Calcule le total des profils masculins et féminins
        // $totalMaleFemale = $maleCount + $femaleCount;

        // // Éviter la division par zéro en vérifiant si le total est supérieur à zéro
        // // Calcule le pourcentage de femmes, arrondi à 2 décimales
        // $femalePercentage = $totalMaleFemale > 0 ? round(($femaleCount / $totalMaleFemale) * 100, 2) : 0;

        // // Calcule le pourcentage d'hommes, arrondi à 2 décimales
        // $malePercentage = $totalMaleFemale > 0 ? round(($maleCount / $totalMaleFemale) * 100, 2) : 0;

        /*******************************************************************************************
         * Calcul du pourcentage de femmes et d'hommes dans la base de données des profils
         * avec filtrage par date et calcul du taux d'évolution
         *******************************************************************************************/

        // Compter les profils masculins et féminins pour la période actuelle en une seule requête
        $genderCountsCurrent = Profile::select(DB::raw('sexe, count(*) as total'))
            ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->groupBy('sexe')
            ->pluck('total', 'sexe')
            ->toArray();

        // Nombre de profils féminins et masculins pour la période actuelle
        $femaleCountCurrent = $genderCountsCurrent['Femme'] ?? 0;
        $maleCountCurrent = $genderCountsCurrent['Homme'] ?? 0;

        // Calcule le total des profils masculins et féminins pour la période actuelle
        $totalMaleFemaleCurrent = $maleCountCurrent + $femaleCountCurrent;
        // dump($totalMaleFemaleCurrent);

        // Calcule le pourcentage de femmes et d'hommes pour la période actuelle
        $femalePercentageCurrent = $totalMaleFemaleCurrent > 0 ? round(($femaleCountCurrent / $totalMaleFemaleCurrent) * 100, 2) : 0;
        $malePercentageCurrent = $totalMaleFemaleCurrent > 0 ? round(($maleCountCurrent / $totalMaleFemaleCurrent) * 100, 2) : 0;

        // Filtrage pour la période précédente (même durée)
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1; // +1 pour inclure le jour de départ
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // Compter les profils masculins et féminins pour la période précédente en une seule requête
        $genderCountsPrevious = Profile::select(DB::raw('sexe, count(*) as total'))
            ->whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])
            ->groupBy('sexe')
            ->pluck('total', 'sexe')
            ->toArray();

        // Nombre de profils féminins et masculins pour la période précédente
        $femaleCountPrevious = $genderCountsPrevious['Femme'] ?? 0;
        $maleCountPrevious = $genderCountsPrevious['Homme'] ?? 0;

        // Calcule le total des profils masculins et féminins pour la période précédente
        $totalMaleFemalePrevious = $maleCountPrevious + $femaleCountPrevious;
        // dump($totalMaleFemalePrevious);

        // Calcul du taux d'évolution global pour le pourcentage de femmes
        $tauxEvolutionFemale = $femaleCountPrevious > 0 ? (($femaleCountCurrent - $femaleCountPrevious) / $femaleCountPrevious) * 100 : 0;

        // Calcul du taux d'évolution global pour le pourcentage d'hommes
        $tauxEvolutionMale = $maleCountPrevious > 0 ? (($maleCountCurrent - $maleCountPrevious) / $maleCountPrevious) * 100 : 0;

        // Calcul du taux d'évolution global
        $tauxEvolutionMaleFemale = $totalMaleFemalePrevious > 0 ? (($totalMaleFemaleCurrent - $totalMaleFemalePrevious) / $totalMaleFemalePrevious) * 100 : 0;
        // dump($tauxEvolutionMaleFemale);

        /*******************************************************************************************
         * Calcul et récupération des données pour le taux de complétude des CVs par catégorie
         *******************************************************************************************/

        // $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay() : Carbon::now()->startOfMonth();
        // $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay() : Carbon::now()->endOfMonth();

        // // Récupération des CVs complets par catégorie socio-professionnelle
        // $completedCVsByCategory = Profile::select('categorie_socio_professionnelle', DB::raw('COUNT(*) as total_complets'))->whereNotNull('first_name')
        //     ->whereNotNull('last_name')
        //     ->whereNotNull('sexe')
        //     ->whereNotNull('email')
        //     ->whereNotNull('phone_primary')
        //     ->whereNotNull('profession_id')
        //     ->whereNotNull('categorie_socio_professionnelle')
        //     ->whereNotNull('activity_area_id')
        //     // Ajouter ici tous les autres champs obligatoires si nécessaire
        //     ->groupBy('categorie_socio_professionnelle')
        //     ->get()
        //     ->keyBy('categorie_socio_professionnelle');

        // // Récupération du nombre total de CVs par catégorie socio-professionnelle
        // $categories = Profile::select('categorie_socio_professionnelle', DB::raw('COUNT(*) as total'))
        //     ->groupBy('categorie_socio_professionnelle')
        //     ->get();

        // $labels_categorie_socio_professionnelle = []; // Contiendra les noms des catégories
        // $data_categorie_socio_professionnelle = []; // Contiendra les taux de complétude associés

        // $totalCompletedCVs = 0; // Total des CVs complets
        // $totalCVs = 0; // Total des CVs

        // foreach ($categories as $category) {
        //     $labels_categorie_socio_professionnelle[] = $category->categorie_socio_professionnelle;

        //     // Récupérer le nombre de CVs complets pour cette catégorie
        //     $completedCVs = $completedCVsByCategory[$category->categorie_socio_professionnelle]->total_complets ?? 0;

        //     // Calcul du taux de complétude (éviter la division par zéro)
        //     $tauxCompletude = $category->total > 0 ? ($completedCVs / $category->total) * 100 : 0;
        //     $data_categorie_socio_professionnelle[] = round($tauxCompletude, 2);

        //     // Accumuler les totaux
        //     $totalCompletedCVs += $completedCVs;
        //     $totalCVs += $category->total;
        // }

        // // Calcul du taux total de complétude
        // $totalCompletionRate = $totalCVs > 0 ? ($totalCompletedCVs / $totalCVs) * 100 : 0;


        // Filtrage pour la période précédente (même durée)
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1; // +1 pour inclure le jour de départ
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // Récupération des CVs complets par catégorie socio-professionnelle avec filtrage par date
        $completedCVsByCategory = Profile::select('categorie_socio_professionnelle', DB::raw('COUNT(*) as total_complets'))
            ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->whereNotNull('first_name')
            ->whereNotNull('last_name')
            ->whereNotNull('sexe')
            ->whereNotNull('email')
            ->whereNotNull('phone_primary')
            ->whereNotNull('profession_id')
            ->whereNotNull('categorie_socio_professionnelle')
            ->whereNotNull('activity_area_id')
            ->groupBy('categorie_socio_professionnelle')
            ->get()
            ->keyBy('categorie_socio_professionnelle');

        // Récupération du nombre total de CVs par catégorie socio-professionnelle
        $categories = Profile::select('categorie_socio_professionnelle', DB::raw('COUNT(*) as total'))
            // ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->groupBy('categorie_socio_professionnelle')
            ->get();

        $labels_categorie_socio_professionnelle = [];
        $data_categorie_socio_professionnelle = [];
        $totalCompletedCVs = 0;
        $totalCVs = 0;
        $totalCompletedCVsArray = [];
        $totalCVsArray = [];

        foreach ($categories as $category) {
            $labels_categorie_socio_professionnelle[] = $category->categorie_socio_professionnelle;

            $completedCVs = $completedCVsByCategory[$category->categorie_socio_professionnelle]->total_complets ?? 0;

            $tauxCompletude = $category->total > 0 ? ($completedCVs / $category->total) * 100 : 0;
            $data_categorie_socio_professionnelle[] = round($tauxCompletude, 2);

            $totalCompletedCVsArray[] = $completedCVs;
            $totalCVsArray[] = $category->total;

            $totalCompletedCVs += $completedCVs;
            $totalCVs += $category->total;
        }

        // Calcul du taux total de complétude arrondi
        // $totalCompletionRate = $totalCVs > 0 ? round(($totalCompletedCVs / $totalCVs) * 100, 2) : 0;

        // Calcul du taux total de complétude arrondi
        $totalCompletionRate = $totalCVs > 0 ? round(($totalCompletedCVs / $totalCVs) * 100, 2) : 0;

        // ======= CALCUL DU TAUX D'ÉVOLUTION GLOBAL =======
        // Récupération des données de la période précédente
        $previousTotalCVs = Profile::whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])->count();
        $previousCompletedCVs = Profile::whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime])
            ->whereNotNull('first_name')
            ->whereNotNull('last_name')
            ->whereNotNull('sexe')
            ->whereNotNull('email')
            ->whereNotNull('phone_primary')
            ->whereNotNull('profession_id')
            ->whereNotNull('categorie_socio_professionnelle')
            ->whereNotNull('activity_area_id')
            ->count();

        // Calcul du taux de complétude précédent
        $previousCompletionRate = $previousTotalCVs > 0 ? ($previousCompletedCVs / $previousTotalCVs) * 100 : 0;

        // Calcul du taux d'évolution global
        $completionRateEvolution = $previousTotalCVs > 0 ? (($totalCompletedCVs - $previousTotalCVs) / $previousTotalCVs) * 100 : 0;

        /*******************************************************************************************
         * Récupération et préparation des données pour le graphique des candidatures / entretiens
         *******************************************************************************************/

        // Récupération du nombre de candidatures par mois et indexation par le mois
        $candidatures = Matching::selectRaw('MONTH(created_at) as month, COUNT(*) as total_candidatures')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Récupération du nombre d'entretiens (status_id = 3) par mois et indexation par le mois
        $entretiens = TrackingApplication::selectRaw('MONTH(created_at) as month, COUNT(*) as total_entretiens')
            ->where('status_id', 3) // Statut "Entretien"
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Initialisation des tableaux pour le graphique
        $months = [];             // Labels des mois
        $candidaturesData = [];   // Données des candidatures
        $entretiensData = [];     // Données des entretiens

        // Boucle sur les 12 mois de l'année
        for ($i = 1; $i <= 12; $i++) {
            // Récupération du nom abrégé du mois en français (ex: "Janv.", "Févr.")
            $monthName = Carbon::create()->month($i)->locale('fr')->shortMonthName;

            // Extraction des données (0 si aucune valeur trouvée)
            $totalCandidatures = $candidatures[$i]->total_candidatures ?? 0;
            $totalEntretiens = $entretiens[$i]->total_entretiens ?? 0;

            // Remplissage des tableaux
            $months[] = $monthName;
            $candidaturesData[] = $totalCandidatures;
            $entretiensData[] = $totalEntretiens;
        }

        /*********************************************
         * Calcul circle 1: Candidature à entretien
         *********************************************/

        // Nombre total de candidatures
        $totalMatching = Matching::count();
        $totalTrackingApplication = TrackingApplication::count();

        // Calcul du taux de conversion des candidatures en entretiens
        $tauxCandidatureEntretien = ($totalMatching > 0) ? round(($totalTrackingApplication / $totalMatching) * 100, 2) : 0;

        /*********************************************
         * Calcul circle 2: Entretien à offre
         *********************************************/
        // Nombre d'entretiens ayant abouti à une offre (status_id = 2)
        $totalOfferAccepted = TrackingApplication::where('status_id', 2)->count();

        // Calcul du taux d'entretiens convertis en offres
        $tauxEntretienOffre = ($totalTrackingApplication > 0) ? round(($totalOfferAccepted / $totalTrackingApplication) * 100, 2) : 0;

        /*********************************************
         * Calcul circle 3: Présélection
         *********************************************/

        // Nombre de candidatures présélectionnées (status_id = 4)
        $totalPreSelection = TrackingApplication::where('status_id', 4)->count();

        // Calcul du taux de présélection
        $tauxPreSelection = ($totalTrackingApplication > 0) ? round(($totalPreSelection / $totalTrackingApplication) * 100, 2) : 0;

        /*********************************************
         * Calcul circle 4: Acceptation d'offre
         *********************************************/

        // Nombre de candidatures ayant accepté l'offre (status_id = 5)
        $totalOfferAcceptedStatusId5 = TrackingApplication::where('status_id', 5)->count();

        // Calcul du taux d'acceptation d'offre
        $tauxOfferAccepted = ($totalTrackingApplication > 0) ? round(($totalOfferAcceptedStatusId5 / $totalTrackingApplication) * 100, 2) : 0;

        /*********************************************
         * Calcul de la Qualité d'Embauche
         *********************************************/

        $data_qualite_embauche = [];
        $labels_qualite_embauche = [];


        // Obtenir les 12 derniers mois
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('Y-m');
            // $labels_qualite_embauche[] = $date->format('M. Y');
            $labels_qualite_embauche[] = $date->translatedFormat('F.Y');

            // Définir les bornes du mois
            $startDate = $date->copy()->startOfMonth();
            $endDate = $date->copy()->endOfMonth();

            // Nombre total de besoins pour le mois
            $totalBesoins = JobOffer::where('status_id', 4)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            // Nombre d'offres acceptées pour le mois
            $totalOffresAcceptees = TrackingApplication::where('status_id', 5)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            // Score de performance
            $scorePerformance = ($totalBesoins > 0) ? round(($totalOffresAcceptees / $totalBesoins) * 100, 2) : 0;

            // Nombre total de missions pour le mois
            $totalMissions = JobOffer::whereBetween('created_at', [$startDate, $endDate])->count();

            // Nombre de missions rouvertes pour le mois
            $totalMissionsRouverte = JobOffer::where('status_id', 6)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            // Taux de rétention
            $tauxRetention = ($totalMissions > 0) ? round((1 - ($totalMissionsRouverte / $totalMissions)) * 100, 2) : 0;

            // Calcul de la qualité d'embauche
            $qualiteEmbauche = round(($scorePerformance + $tauxRetention) / 2, 2);

            // Stocker les résultats du mois
            $data_qualite_embauche[] = $qualiteEmbauche;
        }


        return [

            'countActive'                   => $countActive,
            'growthRateIsActive'            => $growthRateIsActive,
            'previousCountActive'           => $previousCountActive,

            'countQualified'                => $countQualified,
            'growthRateQualified'           => $growthRateQualified,
            'previousCountQualified'        => $previousCountQualified,

            'countPertinent'                => $countPertinent,
            'growthRatePertinent'           => $growthRatePertinent,
            'previousCountPertinent'        => $previousCountPertinent,

            'countTotalProfile'             => $countTotalProfile,
            'growthRateTotalProfile'        => $growthRateTotalProfile,
            'previousCountTotalProfile'     => $previousCountTotalProfile,
            'globalRateProfile'             => $globalRateProfile,

            // 'talent_active'             => $talentActive,
            'countActiveTalent'                 => $countActiveTalent,
            'growthRateIsActiveTalent'          => $growthRateIsActiveTalent,
            'previousCountActiveTalent'         => $previousCountActiveTalent,

            // 'talent_qualified'              => $talentQualified,
            'countQualifiedTalent'              => $countQualifiedTalent,
            'growthRateIsQualifiedTalent'       => $growthRateIsQualifiedTalent,
            'previousCountQualifiedTalent'      => $previousCountQualifiedTalent,

            // 'talent_pertinent'              => $talentPertinent,
            'countPertinentTalent'              => $countPertinentTalent,
            'growthRateIsPertinentTalent'       => $growthRateIsPertinentTalent,
            'previousCountPertinentTalent'      => $previousCountPertinentTalent,

            // 'talent_total'                      => $talentTotal,
            'countTotalTalentByDate'            => $countTotalTalentByDate,
            'growthRateTotalProfileTalent'      => $growthRateTotalProfileTalent,
            'previousCountTotalProfileTalent'   => $previousCountTotalProfileTalent,
            'globalRateProfileTalent'           => $globalRateProfileTalent,

            'interactionRates'          => $interactionRates,
            'interactionRatesTalent'    => $interactionRatesTalent,                                     // Pour le vivier talents

            'internalSuccessRate'       => $internalSuccessRate,                                        // Pour Calcule le taux de réussite CVthèque vs. sourcing interne
            'externalSuccessRate'       => $externalSuccessRate,                                        // Pour Calcule le taux de réussite CVthèque vs. sourcing externe
            'totalSuccessRate'          => $totalSuccessRate,                                           // Pour Calcule le taux de réussite CVthèque vs. sourcing Total
            // 'evolutionInternalCount' => $evolutionInternalCount,                                     // Pour Calcule le taux de réussite CVthèque vs. sourcing evolution interne
            // 'evolutionExternalCount' => $evolutionExternalCount,                                     // Pour Calcule le taux de réussite CVthèque vs. sourcing evolution externe
            'evolutionTotalCount' => $evolutionTotalCount,                                              // Pour Calcule le taux de réussite CVthèque vs. sourcing evolution Total
            'previousTotalHired' => $previousTotalHired,                                                // Pour check previousTotalHired != 0 sur Calcule le taux de réussite CVthèque vs. sourcing

            'sourcingPerformance' => $sourcingPerformance,                                              // Pour Performance des canaux de sourcing
            'labels_for_sourcing_performance_chart' => $labels_for_sourcing_performance_chart,          // Pour Performance des canaux de sourcing
            // 'sourceData' =>$sourceData,                                                                 // Contiendra les données à afficher dans le tableau

            'obsoleteRate' => round($obsoleteRate, 2),                                  // Pour Taux d’obsolescence des CVs
            'updatedRate' => round($updatedRate, 2),                                    // Pour Taux d’obsolescence des CVs
            'evolutionRate' => $evolutionRate,                                                          // Pour Taux d’obsolescence des CVs
            'previousTotalCVs' => $previousTotalCVs,                                                    // Pour Taux d’obsolescence des CVs

            'missionsByTitle' => $missionsByTitle,                                                      // Pour Recrutement par poste
            'totalMissionsByTitle' => $totalMissionsByTitle,                                            // Pour Recrutement total du poste
            'tauxEvolution' => $tauxEvolution,                                                          // Pour Recrutement taux Evolution
            'previousTotalMissionsByTitle' => $previousTotalMissionsByTitle,                            // Pour Recrutement previous Total Missions
            'missionsData' => $missionsData,                                                             //contient les données des missions actuelles par profession, incluant les pourcentages et les totaux.

            // 'missionsByActivityAreaPercentages' => $missionsByActivityAreaPercentages,               // Pour Recrutement Percentages par Activity Area Current (old)
            'missionsByActivityAreaPercentagesCurrent' => $missionsByActivityAreaPercentagesCurrent,    // Pour Recrutement Percentages par Activity Area Current
            'totalMissionsByActivityArea' => $totalMissionsByActivityAreaCurrent,                       // Pour Recrutement total Missions Percentages Activity Area Current
            'tauxEvolutionGlobalActivityArea' => $tauxEvolutionGlobalActivityArea,                      // Pour Recrutement taux Evolution Global ActivityArea
            'totalMissionsPrevious' => $totalMissionsPrevious,                                          // Pour Recrutement total Missions Previous
            'jobOffersByActivityArea'           => $jobOffersByActivityArea,
            'totalCVsArray'                    => $totalCVsArray,                                                // Pour afficher le total des CV dans le détail de la complétude
            'totalCompletedCVsArray'           => $totalCompletedCVsArray,                                      // Pour afficher le total des CV complétés dans le détail de la complétude

            'femaleCount' => $femaleCountCurrent,                                                              // Pour Calcul du pourcentage de femmes et d'hommes
            'maleCount' => $maleCountCurrent,                                                                  // Pour Calcul du pourcentage de femmes et d'hommes
            'femalePercentage' => $femalePercentageCurrent,                                                    // Pour Calcul du pourcentage de femmes et d'hommes
            'malePercentage' => $malePercentageCurrent,                                                        // Pour Calcul du pourcentage de femmes et d'hommes

            'tauxEvolutionFemale' => $tauxEvolutionFemale,                                                        // Pour Calcul du pourcentage de femmes et d'hommes
            'tauxEvolutionMale' => $tauxEvolutionMale,                                                        // Pour Calcul du pourcentage de femmes et d'hommes
            'femaleCountPrevious' => $femaleCountPrevious,                                                        // Pour Calcul du pourcentage de femmes et d'hommes
            'maleCountPrevious' => $maleCountPrevious,                                                        // Pour Calcul du pourcentage de femmes et d'hommes
            'tauxEvolutionMaleFemale' => $tauxEvolutionMaleFemale,                                                        // Pour Calcul du pourcentage de femmes et d'hommes
            'totalMaleFemalePrevious' => $totalMaleFemalePrevious,                                                        // Pour Calcul du pourcentage de femmes et d'hommes

            'labels_categorie_socio_professionnelle' => $labels_categorie_socio_professionnelle,        // Pour le taux de complétude des CVs par catégorie
            'data_categorie_socio_professionnelle' => $data_categorie_socio_professionnelle,            // Pour le taux de complétude des CVs par catégorie
            'totalCompletionRate' => $totalCompletionRate,                                              // Pour le taux de complétude des CVs par catégorie
            'completionRateEvolution' => $completionRateEvolution,                                              // Pour le taux de complétude des CVs par catégorie
            'previousCompletionRate' => $previousCompletionRate,                                              // Pour le taux de complétude des CVs par catégorie

            'months' => $months,                                                                        // Pour Calcul le taux de conversion Candidature / Entretien
            'candidatures' => $candidaturesData,                                                        // Pour Calcul le taux de conversion Candidature / Entretien
            'entretiens' => $entretiensData,                                                            // Pour Calcul le taux de conversion Candidature / Entretien
            // 'tauxConversionData' => $tauxConversionData,                                                // Pour Calcul le taux de conversion Candidature / Entretien
            // 'entretiens' => $entretiens,

            'totalMatching' => $totalMatching,                                                          // Pour Calcul circle 1: Candidature à entretien
            'tauxCandidatureEntretien' => $tauxCandidatureEntretien,                                    // Pour Calcul circle 1: Candidature à entretien

            'totalOfferAccepted' => $totalOfferAccepted,                                                //Pour Calcul circle 2: Entretien à offre
            'tauxEntretienOffre' => $tauxEntretienOffre,                                                //Pour Calcul circle 2: Entretien à offre

            'totalPreSelection' => $totalPreSelection,                                                  // Pour Calcul circle 3: Présélection
            'tauxPreSelection' => $tauxPreSelection,                                                    // Pour Calcul circle 3: Présélection

            'totalOfferAcceptedStatusId5' => $totalOfferAcceptedStatusId5,                              // Pour Calcul circle 4: Acceptation d'offre
            'tauxOfferAccepted' => $tauxOfferAccepted,                                                  // Pour Calcul circle 4: Acceptation d'offre

            'data_qualite_embauche' => $data_qualite_embauche,                                          // Pour Calcul de la Qualité d'Embauche
            'labels_qualite_embauche' => $labels_qualite_embauche,                                      // Pour Calcul de la Qualité d'Embauche
            // 'qualite'=>  $qualite,


            'tableData' => $tableData,                                                                   //Données du tableau affichant le nombre de recrutements et le pourcentage par région
            'labels_region' => $labels_region,                                                          // Pour Recrutement par région labels_region
            'percentages_data_region' => $percentages_data_region,                                      // Pour Recrutement par région percentages_data_region
            'total_percentage' => round($totalPercentage, 2),                                           // Pour Recrutement par région total_percentage
            'tauxEvolutionGlobalRegion' => $tauxEvolutionGlobalRegion,                                  // Pour Recrutement par région tauxEvolutionGlobal
            'previousTotalMissionsByRegion' => $previousTotalMissionsByRegion,                          // Pour Recrutement par région previousTotalMissionsByRegion

        ];
    }


    /*******************************************************************************************
     * Calcul et récupération des données pour le taux de complétude des CVs par catégorie
     *******************************************************************************************/
    public function getCompletudeCvs($year = null)
    {
        // Default to current year if none is provided
        $year = $year ?? now()->year;

        // Get total and completed CVs by category
        $completedCVsByCategory = Profile::select('categorie_socio_professionnelle', DB::raw('COUNT(*) as total_complets'))
            ->whereYear('created_at', $year)
            ->whereNotNull('first_name')
            ->whereNotNull('last_name')
            ->whereNotNull('sexe')
            ->whereNotNull('email')
            ->whereNotNull('phone_primary')
            ->whereNotNull('profession_id')
            ->whereNotNull('categorie_socio_professionnelle')
            ->whereNotNull('activity_area_id')
            ->groupBy('categorie_socio_professionnelle')
            ->get()
            ->keyBy('categorie_socio_professionnelle');

        $categories = Profile::select('categorie_socio_professionnelle', DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', $year)
            ->groupBy('categorie_socio_professionnelle')
            ->get();

        $data = $categories->map(function ($category) use ($completedCVsByCategory) {
            $cat = $category->categorie_socio_professionnelle;
            $total = $category->total;
            $completed = $completedCVsByCategory[$cat]->total_complets ?? 0;
            $taux = $total > 0 ? ($completed / $total) * 100 : 0;

            return [
                'categorie_socio_professionnelle' => $cat,
                'total_cvs' => $total,
                'total_cvs_complets' => $completed,
                'taux_completude' => round($taux, 2) . "%",
            ];
        });

        return DataTables::of($data)->make(true);
    }


    /*******************************************************************************************
     * Taux d’obsolescence des CVs (avec filtrage par date)
     *******************************************************************************************/

    public function obsolescence($year = null)
    {
        $year = $year ?? now()->year;
        $obsolescenceData = [];

        // dump(Carbon::now()->subDays(90));

        for ($month = 1; $month <= 12; $month++) {
            $monthName = Carbon::create()->month($month)->locale('fr_FR')->isoFormat('MMMM');

            $startMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

            $ninetyDaysAgo = Carbon::now()->subDays(180);

            $profiles = Profile::whereBetween('updated_at', [$startMonth, $endMonth])->get();

            $totalCVs = $profiles->count();

            $obsoleteCVs = $profiles->filter(function ($profile) use ($ninetyDaysAgo) {
                return $profile->updated_at < $ninetyDaysAgo;
            })->count();

            $updatedCVs = $totalCVs - $obsoleteCVs;

            $obsoleteRate = $totalCVs > 0 ? round(($obsoleteCVs / $totalCVs) * 100, 2) : 0;
            $updatedRate = $totalCVs > 0 ? round(($updatedCVs / $totalCVs) * 100, 2) : 0;

            $obsolescenceData[] = [
                'mois' => ucfirst($monthName),
                'total_cvs' => $totalCVs,
                'obsolete_cvs' => $obsoleteCVs,
                'obsolete_rate' => $obsoleteRate,
            ];
        }
        return DataTables::of($obsolescenceData)->make(true);
    }


    /*******************************************************************************************
     * Taux de réussite : CVthèque vs. sourcing externe
     *******************************************************************************************/
    public function reussite($year = null)
    {
        $recruitmentStatsByMonth = [];

        $year = $year ?? Carbon::now()->year;
        setlocale(LC_TIME, 'fr_FR.UTF-8');

        for ($month = 1; $month <= 12; $month++) {
            // Définir les dates de début et de fin du mois
            $startDateTime = Carbon::create($year, $month, 1)->startOfMonth();
            $endDateTime = Carbon::create($year, $month, 1)->endOfMonth();

            // Nombre de recrutements issus de la CVthèque Humanjobs
            $internalHired = TrackingApplication::whereHas('profile', function ($query) {
                $query->where('source', 'CVthèque Humanjobs');
            })
                ->where('status_id', StatusTrackingApplicationEnum::HIRING)
                ->whereBetween('created_at', [$startDateTime, $endDateTime])
                ->count();

            // Nombre de recrutements externes (hors CVthèque Humanjobs)
            $externalHired = TrackingApplication::whereDoesntHave('profile', function ($query) {
                $query->where('source', 'CVthèque Humanjobs');
            })
                ->where('status_id', StatusTrackingApplicationEnum::HIRING)
                ->whereBetween('created_at', [$startDateTime, $endDateTime])
                ->count();

            // Total des recrutements pour le mois courant
            $totalHired = $internalHired + $externalHired;

            // Calcul des taux de réussite
            $internalRate = $totalHired > 0 ? ($internalHired / $totalHired) * 100 : 0;
            $externalRate = $totalHired > 0 ? ($externalHired / $totalHired) * 100 : 0;

            // Ajouter les statistiques du mois courant au tableau principal
            $recruitmentStatsByMonth[] = [
                'month' => Carbon::create($year, $month, 1)
                    ->locale('fr')
                    ->translatedFormat('F'),
                'internal' => $internalHired,
                'external' => $externalHired,
                'total' => $totalHired,
                'internalRate' => number_format($internalRate, 0),
                'externalRate' => number_format($externalRate, 0),
            ];
        }

        return DataTables::of($recruitmentStatsByMonth)->make(true);
    }



    /*********************************************
     * Calcul de la Qualité d'Embauche
     *********************************************/
    public function embauche($year)
    {
        // Si l'année n'est pas spécifiée, on utilise l'année en cours
        $year = $year ?? Carbon::now()->year;

        // Tableau qui va contenir les statistiques de chaque mois
        $qualite = [];

        // Boucle sur les 12 mois de l'année
        for ($month = 1; $month <= 12; $month++) {
            // Création d'un objet date pour le mois courant
            $date = Carbon::create($year, $month, 1);
            // $date = Carbon::create($year, 4, 1);

            // Définir la date de début et de fin du mois
            $startDatett = $date->copy()->startOfMonth()->startOfDay();
            $endDatett = $date->copy()->endOfMonth()->endOfDay();


            // Récupération du nombre total de besoins (offres publiées avec status_id = 4) durant le mois
            $totalBesoins = JobOffer::where('status_id', 4)
                ->whereBetween('created_at', [$startDatett, $endDatett])
                ->count();


            // Récupération du nombre total d'offres acceptées (status_id = 5) durant le mois
            $totalOffresAcceptees = TrackingApplication::where('status_id', 5)
                ->whereBetween('created_at', [$startDatett, $endDatett])
                ->count();
            // Calcul du score de performance = (offres acceptées / besoins) * 100
            $scorePerformance = ($totalBesoins > 0)
                ? round(($totalOffresAcceptees / $totalBesoins) * 100, 1)
                : 0;



            // Récupération du nombre total de missions créées durant le mois
            $totalMissions = JobOffer::whereBetween('created_at', [$startDatett, $endDatett])
                ->count();

            // Récupération du nombre de missions réouvertes (status_id = 6) durant le mois
            $totalMissionsRouverte = JobOffer::where('status_id', 6)
                ->whereBetween('created_at', [$startDatett, $endDatett])
                ->count();

            // Calcul du taux de rétention = (1 - (missions réouvertes / missions totales)) * 100
            $tauxRetention = ($totalMissions > 0)
                ? round((1 - ($totalMissionsRouverte / $totalMissions)) * 100, 0)
                : 0;

            // Calcul de la qualité d'embauche = moyenne entre score de performance et taux de rétention
            $qualiteEmbauche = round(($scorePerformance + $tauxRetention) / 2, 0);


            // Ajout des données du mois dans le tableau
            if ($scorePerformance > 0 || $tauxRetention > 0 || $qualiteEmbauche > 0) {
                $qualite[] = [
                    'month' => $date->translatedFormat('F'), // Nom du mois en français
                    'score_performance' => $scorePerformance,
                    'taux_retention' => $tauxRetention,
                    'qualite_embauche' => $qualiteEmbauche
                ];
            }
        }


        // Retour des résultats au format DataTables (utilisé dans l'interface)
        return DataTables::of($qualite)->make(true);
    }


    /*******************************************************************************************
     * Nombre de missions par secteur (activity_areas) en pourcentage (Top 20)
     *******************************************************************************************/
    public function jobOffersByActivityArea($year = null)
    {

        $year = $year ?? now()->year;

        $totalMissionsCurrent = JobOffer::whereYear('created_at', $year)->count();

        $missionsByActivityAreaCurrent = JobOffer::select('activity_area_id', DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', $year)
            ->groupBy('activity_area_id')
            ->get();

        $activity_areas = ActivityArea::pluck('label', 'id')->toArray();

        $jobOffersByActivityArea = $missionsByActivityAreaCurrent->map(function ($item) use ($activity_areas, $totalMissionsCurrent) {
            $label = $activity_areas[$item->activity_area_id] ?? 'Inconnu';
            $percentage = $totalMissionsCurrent > 0 ? round(($item->total / $totalMissionsCurrent) * 100, 2) : 0;

            return [
                'secteur' => $label,
                'total' => $item->total,
                'pourcentage' => $percentage
            ];
        });

        return DataTables::of($jobOffersByActivityArea)->make(true);
    }


    /*******************************************************************************************
     * Nombre de missions par région en pourcentage avec filtrage par date et taux d'évolution global
     *******************************************************************************************/
    public function jobOffersByRegion($year = null)
    {
        $year = $year ?? now()->year;

        $regions = Region::with(['cities.jobOffers' => function ($query) use ($year) {
            $query->whereYear('created_at', $year);
        }])->get();

        $totalMissions = $regions->flatMap(
            fn($region) => $region->cities->flatMap(fn($city) => $city->jobOffers)
        )->count();

        $tableData = [];

        foreach ($regions as $region) {
            $missionsCount = $region->cities->flatMap(fn($city) => $city->jobOffers)->count();
            $percentage = $totalMissions > 0 ? ($missionsCount / $totalMissions) * 100 : 0;

            if ($missionsCount > 0) {
                $tableData[] = [
                    'region' => $region->label,
                    'count' => $missionsCount,
                    'percentage' => round($percentage, 2),
                ];
            }
        }

        return DataTables::of($tableData)->make(true);
    }

    /*******************************************************************************************
     * Nombre de missions par poste (title) en pourcentage (Top 20)
     *******************************************************************************************/
    public function jobOffersByPost($year = null)
    {
        $year = $year ?? now()->year;


        // Nombre total de missions dans la période actuelle
        $totalMissions = JobOffer::whereYear('created_at', $year)->count();

        $missionsData = JobOffer::select('professions.label', DB::raw('COUNT(*) as total'))
            ->join('professions', 'job_offers.profession_id', '=', 'professions.id')
            ->whereYear('job_offers.created_at', $year)
            ->groupBy('professions.label')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) use ($totalMissions) {
                $percentage = $totalMissions > 0 ? ($item->total / $totalMissions) * 100 : 0;
                return [
                    'label' => $item->label,
                    'total' => $item->total,
                    'percentage' => round($percentage, 2)
                ];
            })
            ->toArray();

        return DataTables::of($missionsData)->make(true);
    }


    /*******************************************************************************************
     * Calcule le taux de performance des canaux de sourcing avec filtrage par date.
     *******************************************************************************************/
    public function sourceData($year = null)
    {
        $year = $year ?? now()->year;

        // Obtenir toutes les sources uniques à partir de SourceProfileEnum
        $sources = SourceProfileEnum::getAll()->keys();

        $sourceData = []; // Contiendra les données à afficher dans le tableau

        // Nombre total de candidatures sur la période sélectionnée
        $totalApplications = TrackingApplication::whereYear('created_at', $year)->count();

        foreach ($sources as $source) {

            $hiredApplications = TrackingApplication::whereHas('profile', function ($query) use ($source) {
                $query->where('source', $source);
            })->whereYear('created_at', $year)
                ->where('status_id', StatusTrackingApplicationEnum::HIRING)
                ->count();

            // Calcul du taux de conversion
            $conversionRate = $totalApplications > 0 ? ($hiredApplications / $totalApplications) * 100 : 0;

            // Filtrer les taux de conversion > 0
            if ($conversionRate > 0) {

                $sourceData[] = [
                    'source' => $source,
                    'hiredApplication' => $hiredApplications,
                    'conversion_rate' => round($conversionRate, 2)
                ];
            }
        }

        return DataTables::of($sourceData)->make(true);
    }


    /*******************************************************************************************
     * Calcul Taux d'interaction Cvthèque
     *******************************************************************************************/
    // public function getCvthequeMatch($year = null, ?string $startDate = null, ?string $endDate = null)
    //  {

    //     $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)
    //     ->startOfDay() : Carbon::now()->startOfYear();
    //     $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)
    //     ->endOfDay() : Carbon::now()->endOfYear();
    //    $year = request()->input('year', $startDateTime->year);

    //     $monthlyStats = [];

    //          $months = range(1, 12);

    //     foreach ($months as $month) {
    //         $CvthequeProfiles = DB::table('profiles')
    //             ->whereYear('updated_at', $year)
    //             ->whereMonth('updated_at', $month)
    //             ->count();

    //         $jobOffers = DB::table('job_offers')
    //             ->whereYear('created_at', $year)
    //             ->whereMonth('created_at', $month)
    //             ->count();

    //         $rateCvtheque = $CvthequeProfiles > 0 ? round(($jobOffers / $CvthequeProfiles) * 100) : 0;

    //             $formattedMonth = \Carbon\Carbon::createFromFormat('Y-m', sprintf('%04d-%02d', $year, $month))
    //             ->locale('fr')
    //             ->translatedFormat('F');
    //              if ($CvthequeProfiles > 0 && $jobOffers > 0 && $rateCvtheque > 0) {
    //             $monthlyStats[] = [
    //                 'mois' => ucfirst($formattedMonth),
    //                 'consultations' => $CvthequeProfiles,
    //                 'job_offres' => $jobOffers,
    //                 'taux_interaction' => $rateCvtheque,
    //             ];
    //         }


    //     }

    //     return DataTables::of($monthlyStats)->make(true);

    // }
    public function getCvthequeMatch($year = null, ?string $startDate = null, ?string $endDate = null)
    {

        $startDateTime = $startDate
            ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay()
            : Carbon::now()->startOfYear();

        $endDateTime = $endDate
            ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay()
            : Carbon::now()->endOfYear();

        $year = request()->input('year', $startDateTime->year);

        $monthlyStats = [];

        $months = range(1, 12);

        foreach ($months as $month) {
            $monthStart = Carbon::create($year, $month, 1)->startOfDay();
            $monthEnd = Carbon::create($year, $month, 1)->endOfMonth()->endOfDay();

            // Profiles: created_at OR updated_at in month
            $CvthequeProfiles = DB::table('profiles')
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            // Job Offers: created_at OR updated_at in month
            $jobOffers = DB::table('job_offers')
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            $rateCvtheque = $CvthequeProfiles > 0 ? round(($jobOffers / $CvthequeProfiles) * 100) : 0;

            $formattedMonth = \Carbon\Carbon::createFromFormat('Y-m', sprintf('%04d-%02d', $year, $month))
                ->locale('fr')
                ->translatedFormat('F');
            if ($CvthequeProfiles > 0 && $jobOffers > 0 && $rateCvtheque > 0) {
                $monthlyStats[] = [
                    'mois' => ucfirst($formattedMonth),
                    'consultations' => $CvthequeProfiles,
                    'job_offres' => $jobOffers,
                    'taux_interaction' => $rateCvtheque,
                ];
            }
        }

        return DataTables::of($monthlyStats)->make(true);
    }

    /*******************************************************************************************
     * Calcul Taux d'interaction vivier talents
     *******************************************************************************************/
    // public function getVivierMatch($year = null, ?string $startDate = null, ?string $endDate = null)
    // {
    //     $vivierStats = [];

    //     $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)
    //     ->startOfDay() : Carbon::now()->startOfYear();
    //     $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)
    //     ->endOfDay() : Carbon::now()->endOfYear();

    //     $year = request()->input('year', $startDateTime->year);


    //     $months = range(1, 12);

    //     foreach ($months as $month) {
    //         $talentedProfiles = DB::table('profiles')
    //             ->where('is_talented', 1)
    //             ->whereYear('updated_at', $year)
    //             ->whereMonth('updated_at', $month)
    //             ->count();

    //         $jobOffers = DB::table('job_offers')
    //             ->whereYear('created_at', $year)
    //             ->whereMonth('created_at', $month)
    //             ->count();

    //           $rateTalent = $talentedProfiles > 0 ? round(($jobOffers / $talentedProfiles) * 100) : 0;

    //         $formattedMonth = \Carbon\Carbon::createFromFormat('Y-m', sprintf('%04d-%02d', $year, $month))
    //             ->locale('fr')
    //             ->translatedFormat('F');

    //     if ($talentedProfiles > 0 && $jobOffers > 0 && $rateTalent > 0) {
    //             $vivierStats[] = [
    //                 'mois' => ucfirst($formattedMonth),
    //                 'consultation' => $talentedProfiles,
    //                 'job_offre' => $jobOffers,
    //                 'taux_interactions' => $rateTalent,
    //             ];
    //         }
    //     }

    //     return DataTables::of($vivierStats)->make(true);
    // }

    public function getVivierMatch($year = null, ?string $startDate = null, ?string $endDate = null)
    {
        $vivierStats = [];

        $startDateTime = $startDate
            ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay()
            : Carbon::now()->startOfYear();

        $endDateTime = $endDate
            ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay()
            : Carbon::now()->endOfYear();

        $year = request()->input('year', $startDateTime->year);

        $months = range(1, 12);

        foreach ($months as $month) {
            $monthStart = Carbon::create($year, $month, 1)->startOfDay();
            $monthEnd = Carbon::create($year, $month, 1)->endOfMonth()->endOfDay();

            // Talented profiles: created OR updated this month
            $talentedProfiles = DB::table('profiles')
                ->where('is_talented', 1)
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            // Job offers: created OR updated this month
            $jobOffers = DB::table('job_offers')
                ->where(function ($query) use ($monthStart, $monthEnd) {
                    $query->whereBetween('created_at', [$monthStart, $monthEnd])
                        ->orWhereBetween('updated_at', [$monthStart, $monthEnd]);
                })
                ->count();

            $rateTalent = $talentedProfiles > 0
                ? round(($jobOffers / $talentedProfiles) * 100)
                : 0;

            $formattedMonth = Carbon::createFromFormat('Y-m', sprintf('%04d-%02d', $year, $month))
                ->locale('fr')
                ->translatedFormat('F');

            if ($talentedProfiles > 0 && $jobOffers > 0 && $rateTalent > 0) {
                $vivierStats[] = [
                    'mois' => ucfirst($formattedMonth),
                    'consultation' => $talentedProfiles,
                    'job_offre' => $jobOffers,
                    'taux_interactions' => $rateTalent,
                ];
            }
        }

        return DataTables::of($vivierStats)->make(true);
    }

    /*******************************************************************************************
     * Récupération et préparation des données pour le graphique des candidatures / entretiens
     *******************************************************************************************/
    public function getcandidate(int $year = null)
    {
        $year = $year ?? date('Y');
        $candidateData = [];

        for ($i = 1; $i <= 12; $i++) {
            $months = Carbon::create()->month($i)->locale('fr')->shortMonthName;

            $candidatures = Matching::selectRaw('MONTH(created_at) as month, COUNT(*) as total_candidatures')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->keyBy('month');

            $entretiens = TrackingApplication::selectRaw('MONTH(created_at) as month, COUNT(*) as total_entretiens')
                ->where('status_id', 3)
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->keyBy('month');

            $candidaturesData = optional($candidatures[$i] ?? null)->total_candidatures ?? 0;
            $totalEntretiens = optional($entretiens[$i] ?? null)->total_entretiens ?? 0;

            $tauxConversion = $candidaturesData > 0
                ? round(($totalEntretiens / $candidaturesData) * 100, 0)
                : 0;
            if ($candidaturesData  > 0 || $totalEntretiens  > 0 || $tauxConversion  > 0) {
                $candidateData[] = [
                    'monthName' => $months,
                    'totalCandidatures' => $candidaturesData,
                    'totalEntretiens' => $totalEntretiens,
                    'tauxConversion' => $tauxConversion,
                ];
            }
        }


        return DataTables::of($candidateData)->make(true);
    }

    /*******************************************************************************************
     * Calcul du pourcentage de femmes et d'hommes dans la base de données des profils
     * avec filtrage par date et calcul du taux d'évolution
     *******************************************************************************************/
    public function getdiversite(int $year = null)
    {
        Carbon::setLocale('fr');

        $genderStatsPerMonth = [];
        $startDateTime = Carbon::create($year ?? date('Y'), 1, 1)->startOfMonth();
        $endDateTime = Carbon::create($year ?? date('Y'), 12, 31)->endOfMonth();
        $start = Carbon::parse($startDateTime)->startOfMonth();
        $end = Carbon::parse($endDateTime)->endOfMonth();

        // Créer une période mensuelle entre les deux dates
        $period = CarbonPeriod::create($start, '1 month', $end);

        // Boucle sur chaque mois de la période
        foreach ($period as $month) {
            $monthStart = $month->copy()->startOfMonth();
            $monthEnd = $month->copy()->endOfMonth();

            // Récupérer le nombre total de candidatures avec un genre défini (Homme ou Femme) pendant ce mois
            $total = TrackingApplication::whereBetween('created_at', [$monthStart, $monthEnd])
                ->whereHas('profile', function ($q) {
                    $q->whereIn('sexe', ['Homme', 'Femme']);
                })->count();

            // Récupérer le nombre de candidatures d'hommes pour ce mois
            $homme = TrackingApplication::whereBetween('created_at', [$monthStart, $monthEnd])
                ->whereHas('profile', function ($q) {
                    $q->where('sexe', 'Homme');
                })->count();

            // Calculer le nombre de femmes (total - hommes)
            $femme = $total - $homme;

            // Ajouter les statistiques dans le tableau de résultats
            $genderStatsPerMonth[] = [
                // Nom du mois en français (ex: Janvier, Février)
                'month' => ucfirst($month->translatedFormat('F')),

                // Pourcentage d'hommes (arrondi à 2 décimales)
                'pourcentage_homme' => $total > 0 ? round(($homme / $total) * 100, 0) : 0,

                // Pourcentage de femmes (arrondi à 2 décimales)
                'pourcentage_femme' => $total > 0 ? round(($femme / $total) * 100, 0) : 0,
            ];
        }

        return DataTables::of($genderStatsPerMonth)->make(true);
    }
}
