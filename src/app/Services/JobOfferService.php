<?php

namespace App\Services;

use App\Enums\Profile\SourceProfileEnum;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Models\ActivityLog;
use App\Models\Client;
use Carbon\Carbon;
use App\Models\JobOffer;
use App\Models\Matching;
use App\Models\TrackingApplication;
use GuzzleHttp\Psr7\Request;

class JobOfferService
{
    /**
     * getJobOffersPerMonth
     *
     * Calcule le nombre total de missions par mois pour les 12 derniers mois.
     */
    public function getJobOffersPerMonth($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        // Définir la période (12 derniers mois)
        $startDate = Carbon::now()->subMonths(11)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Requête pour récupérer les offres de missions par mois
        $query = JobOffer::selectRaw('DATE_FORMAT(mission_started_at, "%Y-%m") as month, COUNT(*) as total')
            ->whereBetween('mission_started_at', [$startDate, $endDate]);

        // Filtrage par pays via la relation entre City -> Region -> Country
        if ($country && $country !== 'all') {
            $query->whereHas('city.region.country', function ($query) use ($country) {
                $query->where('id', $country);  // Remplacez 'name' par le nom du champ correspondant au pays
            });
        }

        // Filtrage par ville si une ville est sélectionnée
        if ($city && $city !== 'all') {
            $query->where('city_id', $city);
        }

        // Filtrage par client
        if ($client && $client !== 'all') {
            $query->where('client_id', $client);
        }

        // Filtrage par secteur d'activité
        if ($activity_area && $activity_area !== 'all') {
            $query->where('activity_area_id', $activity_area);
        }

        // Filtrage par type d'offre d'emploi
        if ($job_offre && $job_offre !== 'all') {
            $query->where('id', $job_offre);
        }

        // Exécuter la requête
        $jobOfferPerMonth = $query->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Préparer les données pour le graphique
        $data_for_total_number_of_missions = [];
        $labels_for_total_number_of_missions = [];

        // Remplir les données pour chaque mois (12 derniers mois)
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthKey = $date->format('Y-m');
            $labels_for_total_number_of_missions[] = $date->format('M. Y');
            $data_for_total_number_of_missions[] = $jobOfferPerMonth[$monthKey] ?? 0;
        }


        // ✅ Données pour le tableau dans le modal : Nombre de mission par client
        $year = $request ? $request->input('year', date('Y')) : date('Y');
        $month = $request ? $request->input('month') : null;

        $missions_by_client = JobOffer::whereYear('mission_started_at', $year)
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('mission_started_at', $month);
            })

            ->when($country && $country !== 'all', function ($query) use ($country) {
                $query->whereHas('city.region.country', function ($q) use ($country) {
                    $q->where('id', $country);
                });
            })

            ->when($city && $city !== 'all', function ($query) use ($city) {
                $query->where('city_id', $city);
            })

            ->when($client && $client !== 'all', function ($query) use ($client) {
                $query->where('client_id', $client);
            })

            ->when($activity_area && $activity_area !== 'all', function ($query) use ($activity_area) {
                $query->where('activity_area_id', $activity_area);
            })

            ->when($job_offre && $job_offre !== 'all', function ($query) use ($job_offre) {
                $query->where('id', $job_offre);
            })

            ->selectRaw('client_id, COUNT(*) as total_missions')
            ->groupBy('client_id')
            ->orderBy('total_missions', 'desc')
            ->get();

        $clients = Client::pluck('name', 'id')->toArray();

        $missions_by_client->transform(function ($item) use ($clients) {
            $item->client_name = $clients[$item->client_id] ?? 'N/A';
            return $item;
        });

        // Debug
        // dump($missions_by_client);

        // Retourner les données pour le graphique
        return [
            'data_for_total_number_of_missions' => $data_for_total_number_of_missions,
            'labels_for_total_number_of_missions' => $labels_for_total_number_of_missions,
            'missions_by_client' => $missions_by_client
        ];
    }

    /**
     * getNumberOfApplicationsPerOffer
     *
     * Calcule le nombre de candidatures par offre de mission pour les 12 derniers mois.
     */
    public function getNumberOfApplicationsPerOffer($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        $data_number_of_applications_per_offer = [];
        $labels_number_of_applications_per_offer = [];

        // Obtenir les 12 derniers mois
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            // $month = $date->format('Y-m');
            $labels_number_of_applications_per_offer[] = $date->format('M. Y');

            // Nombre de candidatures par mois
            $query = TrackingApplication::whereHas('jobOffer', function ($query) {
                $query->whereNotNull('id');
            })
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month);

            // Filtrage par pays via la relation entre City -> Region -> Country
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            // Filtrage par ville si une ville est sélectionnée
            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($city) {
                    $query->where('city_id', $city);
                });
            }

            // Filtrage par client
            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($client) {
                    $query->where('client_id', $client);
                });
            }

            // Filtrage par secteur d'activité
            if (!empty($activity_area) && $activity_area !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($activity_area) {
                    $query->where('activity_area_id', $activity_area);
                });
            }

            // Filtrage par type d'offre d'emploi (ID au lieu de title)
            if (!empty($job_offre) && $job_offre !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($job_offre) {
                    $query->where('id', $job_offre);
                });
            }

            // Compter le nombre de candidatures pour ce mois
            $applicationsCount = $query->count();

            // Ajouter les résultats dans le tableau
            $data_number_of_applications_per_offer[] = $applicationsCount;
        }


        // ✅ Données pour le tableau dans le modal : Nombre de candidatures par offre
        $year = $request ? $request->input('year', date('Y')) : date('Y');
        $month = $request ? $request->input('month') : null;

        $applications_by_offer = TrackingApplication::whereYear('created_at', $year)
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month);
            })

            ->whereHas('jobOffer', function ($query) use ($country, $city, $client, $activity_area, $job_offre) {
                if (!empty($country) && $country !== 'all') {
                    $query->whereHas('city.region.country', function ($q) use ($country) {
                        $q->where('id', $country);
                    });
                }

                if (!empty($city) && $city !== 'all') {
                    $query->where('city_id', $city);
                }

                if (!empty($client) && $client !== 'all') {
                    $query->where('client_id', $client);
                }

                if (!empty($activity_area) && $activity_area !== 'all') {
                    $query->where('activity_area_id', $activity_area);
                }

                if (!empty($job_offre) && $job_offre !== 'all') {
                    $query->where('id', $job_offre);
                }
            })
            ->select('job_offer_id')
            ->selectRaw('COUNT(DISTINCT profile_id) as total_applications') // ✅ Unique profiles only
            ->groupBy('job_offer_id')
            ->with('jobOffer:id,title') // ✅ pour récupérer le titre à afficher
            ->orderByDesc('total_applications')
            ->get();

        // Retourner les données pour le graphique
        return [
            'data_number_of_applications_per_offer' => $data_number_of_applications_per_offer,
            'labels_number_of_applications_per_offer' => $labels_number_of_applications_per_offer,
            'applications_by_offer' => $applications_by_offer
        ];
    }

    /**
     * getAcceptanceRateData
     *
     * Cette fonction récupère les données nécessaires pour afficher le taux d'acceptation des offres
     * sur les 23 derniers jours. Elle compte les offres émises et celles qui ont été acceptées.
     *
     */
    public function getAcceptanceRateData($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        $dates = [];
        $offersEmitted = [];
        $offersAccepted = [];

        // Données pour le graphique (23 derniers jours)
        for ($i = 22; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $dates[] = now()->subDays($i)->format('d/m');

            $queryEmitted = TrackingApplication::whereDate('created_at', $date)
                ->where('status_id', StatusTrackingApplicationEnum::RETAINED);

            $queryAccepted = TrackingApplication::whereDate('created_at', $date)
                ->where('status_id', StatusTrackingApplicationEnum::HIRING);

            // Appliquer les filtres
            foreach ([$queryEmitted, $queryAccepted] as $query) {
                if (!empty($country) && $country !== 'all') {
                    $query->whereHas('jobOffer.city.region.country', fn($q) => $q->where('id', $country));
                }
                if (!empty($city) && $city !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('city_id', $city));
                }
                if (!empty($client) && $client !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('client_id', $client));
                }
                if (!empty($activity_area) && $activity_area !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('activity_area_id', $activity_area));
                }
                if (!empty($job_offre) && $job_offre !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('id', $job_offre));
                }
            }

            $offersEmitted[] = $queryEmitted->count();
            $offersAccepted[] = $queryAccepted->count();
        }

        // Données pour le tableau MENSUEL (12 derniers mois)
        $monthlyData = [];
        // $currentYear = now()->year;
        $currentYear = $request ? $request->input('year', date('Y')) : date('Y');

        for ($month = 1; $month <= 12; $month++) {
            $start = Carbon::create($currentYear, $month, 1)->startOfMonth()->toDateString();
            $end = Carbon::create($currentYear, $month, 1)->endOfMonth()->toDateString();

            $queryMonthEmitted = TrackingApplication::whereBetween('created_at', [$start, $end])
                ->where('status_id', StatusTrackingApplicationEnum::RETAINED);

            $queryMonthAccepted = TrackingApplication::whereBetween('created_at', [$start, $end])
                ->where('status_id', StatusTrackingApplicationEnum::HIRING);

            foreach ([$queryMonthEmitted, $queryMonthAccepted] as $query) {
                if (!empty($country) && $country !== 'all') {
                    $query->whereHas('jobOffer.city.region.country', fn($q) => $q->where('id', $country));
                }
                if (!empty($city) && $city !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('city_id', $city));
                }
                if (!empty($client) && $client !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('client_id', $client));
                }
                if (!empty($activity_area) && $activity_area !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('activity_area_id', $activity_area));
                }
                if (!empty($job_offre) && $job_offre !== 'all') {
                    $query->whereHas('jobOffer', fn($q) => $q->where('id', $job_offre));
                }
            }

            $emitted = $queryMonthEmitted->count();
            $accepted = $queryMonthAccepted->count();
            $rate = $emitted > 0 ? round(($accepted / $emitted) * 100, 1) : 0;

            $monthlyData[] = [
                'month' => Carbon::create($currentYear, $month)->locale('fr_FR')->translatedFormat('F'),
                'offers_emitted' => $emitted,
                'offers_accepted' => $accepted,
                'acceptance_rate' => $rate . '%',
            ];
        }


        return [
            'labels' => $dates,
            'offersEmitted' => $offersEmitted,
            'offersAccepted' => $offersAccepted,
            'monthlyData' => $monthlyData, // Ajout des données mensuelles
        ];
    }

    /**
     * Calcule le taux de correspondance (matching rate) sur une période donnée.
     *
     * Cette fonction analyse le nombre d'enregistrements de correspondance (`Matching`)
     * selon des intervalles de ratio spécifiques, pour une période actuelle et une période précédente de même durée.
     * Elle retourne les statistiques de correspondance et l'évolution du taux entre les deux périodes.
     */
    public function matchingRate($request, ?string $startDate = null, ?string $endDate = null, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        // Définition des dates
        $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay() : Carbon::now()->endOfMonth();

        // Définition de la période précédente
        $daysDiff = $endDateTime->diffInDays($startDateTime) + 1;
        $previousStartDateTime = $startDateTime->copy()->subDays($daysDiff);
        $previousEndDateTime = $endDateTime->copy()->subDays($daysDiff);

        // Définition des intervalles de score
        $ranges = [
            '0-10%' => [0, 0.1],
            '10-20%' => [0.1, 0.2],
            '20-30%' => [0.2, 0.3],
            '30-40%' => [0.3, 0.4],
            '40-50%' => [0.4, 0.5],
            '50-60%' => [0.5, 0.6],
            '60-70%' => [0.6, 0.7],
            '70-80%' => [0.7, 0.8],
            '80-90%' => [0.8, 0.9],
            '90-100%' => [0.9, 1],
        ];

        // Initialisation des variables pour stocker les résultats
        $matchesByRange = [];
        $totalMatchingRate = 0;
        $previousTotalMatchingRate = 0;

        // Création d'une requête pour la période actuelle
        $queryAccepted = Matching::query()->whereBetween('created_at', [$startDateTime, $endDateTime]);
        $previousQuery = Matching::query()->whereBetween('created_at', [$previousStartDateTime, $previousEndDateTime]);

        // ✅ Appliquer tous les filtres ensemble
        $filters = function ($query) use ($country, $city, $client, $activity_area, $job_offre) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($q) use ($country) {
                    $q->where('id', $country);
                });
            }
            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($q) use ($city) {
                    $q->where('city_id', $city);
                });
            }
            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($q) use ($client) {
                    $q->where('client_id', $client);
                });
            }
            if (!empty($activity_area) && $activity_area !== 'all') {
                $query->whereHas('jobOffer', function ($q) use ($activity_area) {
                    $q->where('activity_area_id', $activity_area);
                });
            }
            if (!empty($job_offre) && $job_offre !== 'all') {
                $query->whereHas('jobOffer', function ($q) use ($job_offre) {
                    $q->where('id', $job_offre);
                });
            }
        };

        // Appliquer les filtres à la requête principale et à la requête précédente
        $queryAccepted->where($filters);
        $previousQuery->where($filters);

        // Boucle sur chaque intervalle de ratio
        foreach ($ranges as $label => [$min, $max]) {
            $count = (clone $queryAccepted)
                ->where('ratio', '>=', $min)
                ->where('ratio', '<', $max)
                ->count();

            $previousCount = (clone $previousQuery)
                ->where('ratio', '>=', $min)
                ->where('ratio', '<', $max)
                ->count();

            // Stocker les résultats
            $matchesByRange[$label] = $count;
            $totalMatchingRate += $count;
            $previousTotalMatchingRate += $previousCount;
        }

        // Calcul du taux d'évolution
        $evolutionRate = ($previousTotalMatchingRate > 0)
            ? (($totalMatchingRate - $previousTotalMatchingRate) / $previousTotalMatchingRate) * 100
            : ($totalMatchingRate > 0 ? 100 : 0);


        // ✅ Ajout des pourcentages distincts : 0%, 10%, 40%, etc.

        $year = $request ? $request->input('year', date('Y')) : date('Y');
        $month = $request ? $request->input('month') : null;

        $CountDistinctPercentages = Matching::query()
            ->selectRaw('ROUND(ratio * 100) as percentage, COUNT(*) as count')
            ->when($year, function ($query) use ($year) {
                $query->whereYear('created_at', $year);
            })
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month);
            })
            ->where($filters)
            ->groupBy('percentage')
            ->orderBy('percentage')
            ->get();

        // dump($CountDistinctPercentages);

        // Retourner les résultats
        return [
            'labels' => array_keys($matchesByRange),
            'counts' => array_values($matchesByRange),
            'totalMatchingRate' => $totalMatchingRate,
            'evolutionRate' => round($evolutionRate, 2),
            'previousTotalMatchingRate' => round($previousTotalMatchingRate, 2),
            'CountDistinctPercentages' => $CountDistinctPercentages,
        ];
    }

    /**
     * getConversionChartData
     *
     * Calcule le taux de conversion des candidatures en shortlist.
     */
    public function getConversionChartData($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        $conversionRates = [];
        $totalApplications = [];
        $shortlistedApplications = [];
        $labels_for_conversion_chart = [];

        // Fonction pour appliquer les filtres
        $applyFilters = function ($query) use ($country, $city, $client, $activity_area, $job_offre) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($city) {
                    $query->where('city_id', $city);
                });
            }

            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($client) {
                    $query->where('client_id', $client);
                });
            }

            if (!empty($activity_area) && $activity_area !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($activity_area) {
                    $query->where('activity_area_id', $activity_area);
                });
            }

            if (!empty($job_offre) && $job_offre !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($job_offre) {
                    $query->where('id', $job_offre);
                });
            }

            return $query;
        };

        // Obtenir les 23 derniers jours
        for ($i = 22; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i)->format('Y-m-d');
            $labels_for_conversion_chart[] = Carbon::now()->subDays($i)->format('d/m');

            // Nombre total de candidatures par jour
            $totalApplicationsCount = $applyFilters(Matching::whereDate('created_at', Carbon::now()->subDays($i)->toDateString()))->count();
            $totalApplications[] = $totalApplicationsCount;

            // Nombre de candidatures en shortlist par jour
            $shortlistedApplicationsCount = $applyFilters(
                TrackingApplication::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())
                    ->where('status_id', StatusTrackingApplicationEnum::SHORTLIST)
            )->count();
            $shortlistedApplications[] = $shortlistedApplicationsCount;

            // Calcul du taux de conversion (en pourcentage)
            $conversionRate = $totalApplicationsCount > 0 ? ($shortlistedApplicationsCount / $totalApplicationsCount) * 100 : 0;
            $conversionRates[] = round($conversionRate, 2); // Arrondi à 2 décimales
        }


        // ============================================
        // CALCUL DES DONNÉES MENSUELLES (Pour Tableau)
        // ============================================

        // Récupération de l'année sélectionnée ou de l'année en cours si non précisée
        $year = $request ? $request->input('year', date('Y')) : date('Y');

        // Initialisation des tableaux pour les données mensuelles
        $monthlyLabels = [];
        $monthlyTotalApplications = [];
        $monthlyShortlistedApplications = [];
        $monthlyConversionRates = [];

        // Boucle sur les 12 mois de l'année
        for ($m = 1; $m <= 12; $m++) {
            // Définir les bornes du mois courant
            $startDate = Carbon::create($year, $m, 1)->startOfMonth();
            $endDate = Carbon::create($year, $m, 1)->endOfMonth();

            // Stocker le nom du mois (ex : "Janvier", "Février", ...)
            // $monthlyLabels[] = $startDate->format('F');
            $monthlyLabels[] = ucfirst($startDate->locale('fr_FR')->translatedFormat('F'));

            // Nombre total de candidatures déposées durant ce mois
            $monthlyTotal = $applyFilters(
                Matching::whereBetween('created_at', [$startDate, $endDate])
            )->count();
            $monthlyTotalApplications[] = $monthlyTotal;

            // Nombre de candidatures shortlistées durant ce mois
            $monthlyShortlisted = $applyFilters(
                TrackingApplication::whereBetween('created_at', [$startDate, $endDate])
                    ->where('status_id', StatusTrackingApplicationEnum::SHORTLIST)
            )->count();
            $monthlyShortlistedApplications[] = $monthlyShortlisted;

            // Calcul du taux de conversion (en %)
            $monthlyConversion = $monthlyTotal > 0 ? ($monthlyShortlisted / $monthlyTotal) * 100 : 0;
            $monthlyConversionRates[] = round($monthlyConversion, 2); // arrondi à 2 décimales
        }

        // Retour des données
        return [
            // Données quotidiennes sur 23 jours
            'conversionRates' => $conversionRates,
            'totalApplications' => $totalApplications,
            'shortlistedApplications' => $shortlistedApplications,
            'labels_for_conversion_chart' => $labels_for_conversion_chart,

            // 📊 Données mensuelles (année complète)
            'monthlyLabels' => $monthlyLabels,
            'monthlyTotalApplications' => $monthlyTotalApplications,
            'monthlyShortlistedApplications' => $monthlyShortlistedApplications,
            'monthlyConversionRates' => $monthlyConversionRates // ✅ Ajouté ici pour le tableau
        ];
    }

    /**
     * getHiringConversionChartData
     *
     * Calcule le taux de conversion des candidatures shortlistées en candidatures embauchées.
     */
    public function getHiringConversionChartData($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        $conversionRates = [];
        $shortlistedApplications = [];
        $hiredApplications = [];
        $labels_for_hiring_conversion_chart = [];

        // Fonction pour appliquer les filtres
        $applyFilters = function ($query) use ($country, $city, $client, $activity_area, $job_offre) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($city) {
                    $query->where('city_id', $city);
                });
            }

            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($client) {
                    $query->where('client_id', $client);
                });
            }

            if (!empty($activity_area) && $activity_area !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($activity_area) {
                    $query->where('activity_area_id', $activity_area);
                });
            }

            if (!empty($job_offre) && $job_offre !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($job_offre) {
                    $query->where('id', $job_offre);
                });
            }

            return $query;
        };

        // Obtenir les 23 derniers jours
        for ($i = 22; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i)->format('Y-m-d');
            $labels_for_hiring_conversion_chart[] = Carbon::now()->subDays($i)->format('d/m');

            // Nombre de candidatures en shortlist par jour
            $shortlistedApplicationsCount = $applyFilters(
                TrackingApplication::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())
                    ->where('status_id', StatusTrackingApplicationEnum::SHORTLIST)
            )->count();
            $shortlistedApplications[] = $shortlistedApplicationsCount;

            // Nombre de candidatures embauchées par jour
            $hiredApplicationsCount = $applyFilters(
                TrackingApplication::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())
                    ->where('status_id', StatusTrackingApplicationEnum::HIRING)
            )->count();
            $hiredApplications[] = $hiredApplicationsCount;

            // Calcul du taux de conversion (en pourcentage)
            $conversionRate = $shortlistedApplicationsCount > 0 ? ($hiredApplicationsCount / $shortlistedApplicationsCount) * 100 : 0;
            $conversionRates[] = round($conversionRate, 2); // Arrondi à 2 décimales
        }

        // ============================================
        // CALCUL DES DONNÉES MENSUELLES (Pour Tableau)
        // ============================================

        // Récupération de l'année sélectionnée ou de l'année en cours si non précisée
        $year = $request ? $request->input('year', date('Y')) : date('Y');

        // Initialisation des tableaux pour les données mensuelles
        $monthlyLabels = [];
        $monthlyShortlistedApplications = [];
        $monthlyHiredApplications = [];
        $monthlyConversionRates = [];

        // Boucle sur les 12 mois de l'année
        for ($m = 1; $m <= 12; $m++) {
            // Définir les bornes du mois courant
            $startDate = Carbon::create($year, $m, 1)->startOfMonth();
            $endDate = Carbon::create($year, $m, 1)->endOfMonth();

            // Stocker le nom du mois (ex : "Janvier", "Février", ...)
            $monthlyLabels[] = ucfirst($startDate->locale('fr_FR')->translatedFormat('F'));

            // Nombre de candidatures shortlistées durant ce mois
            $monthlyShortlisted = $applyFilters(
                TrackingApplication::whereBetween('created_at', [$startDate, $endDate])
                    ->where('status_id', StatusTrackingApplicationEnum::SHORTLIST)
            )->count();
            $monthlyShortlistedApplications[] = $monthlyShortlisted;

            // Nombre de candidatures embauchées durant ce mois
            $monthlyHired = $applyFilters(
                TrackingApplication::whereBetween('created_at', [$startDate, $endDate])
                    ->where('status_id', StatusTrackingApplicationEnum::HIRING)
            )->count();
            $monthlyHiredApplications[] = $monthlyHired;

            // Calcul du taux de conversion (en %)
            $monthlyConversion = $monthlyShortlisted > 0 ? ($monthlyHired / $monthlyShortlisted) * 100 : 0;
            $monthlyConversionRates[] = round($monthlyConversion, 2); // arrondi à 2 décimales
        }

        return [
            'conversionRates' => $conversionRates,
            'shortlistedApplications' => $shortlistedApplications,
            'hiredApplications' => $hiredApplications,
            'labels_for_hiring_conversion_chart' => $labels_for_hiring_conversion_chart,

            // 📊 Données mensuelles (année complète) - Shortlist > Hiring
            'monthlyShortlistForHiring_labels' => $monthlyLabels,
            'monthlyShortlistForHiring_shortlisted' => $monthlyShortlistedApplications,
            'monthlyShortlistForHiring_hired' => $monthlyHiredApplications,
            'monthlyShortlistForHiring_conversionRates' => $monthlyConversionRates,
        ];
    }

    /**
     * Calcule le taux d'acceptation d'offre.
     *
     */
    public function calculateAcceptanceRate($request, ?string $startDate = null, ?string $endDate = null, ?string $country = null, ?string $city = null, ?string $client = null, ?string $activityArea = null, ?string $jobOffer = null)
    {
        $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay() : Carbon::now()->endOfMonth();

        // Filtrer les offres en fonction des critères sélectionnés
        $query = TrackingApplication::whereBetween('created_at', [$startDateTime, $endDateTime]);

        // Définition du filtre
        $applyFilters = function ($query) use ($country, $city, $client, $activityArea, $jobOffer) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($city) {
                    $query->where('city_id', $city);
                });
            }

            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($client) {
                    $query->where('client_id', $client);
                });
            }

            if (!empty($activityArea) && $activityArea !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($activityArea) {
                    $query->where('activity_area_id', $activityArea);
                });
            }

            if (!empty($jobOffer) && $jobOffer !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($jobOffer) {
                    $query->where('id', $jobOffer);
                });
            }

            return $query;
        };

        // Appliquer les filtres sur la requête
        $query = $applyFilters($query);

        // Nombre total d'offres filtrées
        $totalOffers = $query->count();

        // Nombre d'offres acceptées (status_id = RETAINED)
        $acceptedOffers = (clone $query)->where('status_id', StatusTrackingApplicationEnum::RETAINED)->count();

        // Calcul du taux d'acceptation
        $acceptanceRate = ($totalOffers > 0) ? ($acceptedOffers / $totalOffers) * 100 : 0;

        // ============================================
        // CALCUL DES DONNÉES MENSUELLES (Pour Tableau)
        // ============================================

        // Récupération de l'année sélectionnée ou de l'année en cours si non précisée
        $year = $request ? $request->input('year', date('Y')) : date('Y');

        $monthlyLabels = [];
        $monthlyAcceptanceRates = [];

        for ($m = 1; $m <= 12; $m++) {
            $startMonth = Carbon::create($year, $m, 1)->startOfMonth();
            $endMonth = Carbon::create($year, $m, 1)->endOfMonth();

            // Nom du mois en français (ex: janvier, février, etc.)
            $monthlyLabels[] = ucfirst($startMonth->locale('fr_FR')->translatedFormat('F'));

            // Appliquer les filtres sur la période mensuelle
            $filteredQuery = $applyFilters(
                TrackingApplication::whereBetween('created_at', [$startMonth, $endMonth])
            );

            $monthlyTotal = $filteredQuery->count();
            $monthlyAccepted = (clone $filteredQuery)->where('status_id', StatusTrackingApplicationEnum::RETAINED)->count();

            $rate = ($monthlyTotal > 0) ? ($monthlyAccepted / $monthlyTotal) * 100 : 0;
            $monthlyAcceptanceRates[] = round($rate, 2);
        }

        return [
            'acceptanceRate' => round($acceptanceRate, 2), // Taux global
            'monthlyLabelsAcceptationOffre' => $monthlyLabels,
            'monthlyAcceptanceRates' => $monthlyAcceptanceRates,
        ];
    }


    public function getAbandonRateData($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        $dates = [];
        $abandonRates = [];

        // Fonction pour appliquer les filtres
        $applyFilters = function ($query) use ($country, $city, $client, $activity_area, $job_offre) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($city) {
                    $query->where('city_id', $city);
                });
            }

            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($client) {
                    $query->where('client_id', $client);
                });
            }

            if (!empty($activity_area) && $activity_area !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($activity_area) {
                    $query->where('activity_area_id', $activity_area);
                });
            }

            if (!empty($job_offre) && $job_offre !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($job_offre) {
                    $query->where('id', $job_offre);
                });
            }

            return $query;
        };

        // Appliquer les filtres au nombre total de candidats
        $totalCount = $applyFilters(TrackingApplication::query())->count();

        for ($i = 22; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString(); // Obtenir la date exacte
            $dates[] = now()->subDays($i)->format('d/m'); // Format de la date pour l'affichage

            // Appliquer les filtres pour les candidats abandonnés
            $abandonedCount = $applyFilters(
                TrackingApplication::whereDate('created_at', $date)
                    ->where('is_abandon_candidature', 1)
            )->count();

            // Calcul du taux d'abandon (éviter la division par 0)
            $abandonRate = ($totalCount > 0) ? round(($abandonedCount / $totalCount) * 100, 2) : 0;
            $abandonRates[] = $abandonRate;
        }

        // ============================================
        // CALCUL DES DONNÉES MENSUELLES (Pour Tableau)
        // ============================================

        $year = $request ? $request->input('year', date('Y')) : date('Y');

        $monthlyData = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthName = Carbon::create()->month($month)->locale('fr_FR')->isoFormat('MMMM');

            $total = $applyFilters(
                TrackingApplication::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
            )->count();

            $abandons = $applyFilters(
                TrackingApplication::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->where('is_abandon_candidature', 1)
            )->count();

            $taux = $total > 0 ? round(($abandons / $total) * 100, 1) : 0;

            $monthlyData[] = [
                'mois' => ucfirst($monthName),
                'candidatures' => $total,
                'abandons' => $abandons,
                'taux' => $taux . '%'
            ];
        }

        return [
            'labels' => $dates,
            'abandonRates' => $abandonRates,
            'monthlyDataAbandon' => $monthlyData, // 🆕 données pour tableau Blade
        ];
    }

    /**
     * Calcule le taux Performance des canaux de sourcing.
     *
     */
    public function getSourcingPerformanceChartData($request, ?string $startDate = null, ?string $endDate = null, ?string $country = null, ?string $city = null, ?string $client = null, ?string $activityArea = null, ?string $jobOffer = null)
    {
        $startDateTime = $startDate ? Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endDateTime = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay() : Carbon::now()->endOfMonth();

        // Obtenir toutes les sources uniques à partir de SourceProfileEnum
        $sources = SourceProfileEnum::getAll()->keys();

        $sourcingPerformance = []; // Contiendra les taux de conversion pour chaque source
        $labels_for_sourcing_performance_chart = []; // Labels pour le graphique (noms des sources)

        // Initialiser la requête de base avec les filtres de dates
        $query = TrackingApplication::whereBetween('created_at', [$startDateTime, $endDateTime]);

        // Appliquer les filtres dynamiques
        $applyFilters = function ($query) use ($country, $city, $client, $activityArea, $jobOffer) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('jobOffer.city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            if (!empty($city) && $city !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($city) {
                    $query->where('city_id', $city);
                });
            }

            if (!empty($client) && $client !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($client) {
                    $query->where('client_id', $client);
                });
            }

            if (!empty($activityArea) && $activityArea !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($activityArea) {
                    $query->where('activity_area_id', $activityArea);
                });
            }

            if (!empty($jobOffer) && $jobOffer !== 'all') {
                $query->whereHas('jobOffer', function ($query) use ($jobOffer) {
                    $query->where('id', $jobOffer);
                });
            }

            return $query;
        };

        // Appliquer les filtres à la requête de base
        $query = $applyFilters($query);

        // Nombre total de candidatures filtrées par date et autres filtres
        $totalApplications = $query->count();

        foreach ($sources as $source) {
            // Nombre de candidats embauchés pour chaque source et filtrés par date et autres critères
            $hiredApplications = (clone $query)->whereHas('profile', function ($query) use ($source) {
                $query->where('source', $source);
            })->where('status_id', StatusTrackingApplicationEnum::HIRING)
                ->count();

            // Calcul du taux de conversion
            $conversionRate = $totalApplications > 0 ? ($hiredApplications / $totalApplications) * 100 : 0;

            // Filtrer les taux de conversion > 0
            if ($conversionRate > 0) {
                // Ajouter les données au graphique
                $labels_for_sourcing_performance_chart[] = $source;
                $sourcingPerformance[] = round($conversionRate, 2); // Arrondi à 2 décimales
            }
        }

        // ============================================
        // CALCUL DES DONNÉES MENSUELLES (Pour Tableau)
        // ============================================

        // Récupérer l'année depuis la requête ou utiliser l'année actuelle par défaut
        $year = $request ? $request->input('year', date('Y')) : date('Y');
        $month = $request ? $request->input('month') : null;

        // Initialiser les tableaux pour le tableau HTML
        $tableData = [];

        $tableQuery = TrackingApplication::query();
        $tableQuery = $applyFilters($tableQuery);

        // appliquer year obligatoire
        $tableQuery = $tableQuery->whereYear('created_at', $year);

        // appliquer month si fourni
        if (!empty($month)) {
            $tableQuery = $tableQuery->whereMonth('created_at', $month);
        }

        $totalApplicationsForTable = $tableQuery->count();

        foreach ($sources as $source) {
            $hiredCount = (clone $tableQuery)
                ->whereHas('profile', function ($query) use ($source) {
                    $query->where('source', $source);
                })
                ->where('status_id', StatusTrackingApplicationEnum::HIRING)
                ->count();

            if ($hiredCount > 0) {
                $percentageOfTotal = $totalApplicationsForTable > 0 ? ($hiredCount / $totalApplicationsForTable) * 100 : 0;

                $tableData[] = [
                    'source' => $source,
                    'hired_count' => $hiredCount,
                    'percentage_of_total' => round($percentageOfTotal, 2),
                ];
            }
        }

        // dump($tableData);

        return [
            'sourcingPerformance' => $sourcingPerformance,
            'labels_for_sourcing_performance_chart' => $labels_for_sourcing_performance_chart,
            'tableData' => $tableData
        ];
    }

    /**
     * Méthode pour récupérer les données du temps d'embauche pour les 12 derniers mois
     *
     * @return array
     */
    public function getHiringTimeData($request, $country = null, $city = null, $client = null, $activity_area = null, $job_offre = null)
    {
        $labels = [];
        $data = [];

        // Fonction pour appliquer les filtres
        $applyFilters = function ($query) use ($country, $city, $client, $activity_area, $job_offre) {
            if (!empty($country) && $country !== 'all') {
                $query->whereHas('city.region.country', function ($query) use ($country) {
                    $query->where('id', $country);
                });
            }

            if (!empty($city) && $city !== 'all') {
                $query->where('city_id', $city);
            }

            if (!empty($client) && $client !== 'all') {
                $query->where('client_id', $client);
            }

            if (!empty($activity_area) && $activity_area !== 'all') {
                $query->where('activity_area_id', $activity_area);
            }

            if (!empty($job_offre) && $job_offre !== 'all') {
                $query->where('id', $job_offre);
            }

            return $query;
        };

        // Boucle pour les 12 derniers mois
        for ($i = 11; $i >= 0; $i--) {
            // Formatage du mois
            $month = Carbon::now()->subMonths($i)->format('Y-m');
            $labels[] = $month;

            // Récupérer les offres clôturées pour ce mois avec filtres
            $closedMissions = $applyFilters(
                JobOffer::where('status_id', 4)
                    ->whereYear('created_at', Carbon::now()->subMonths($i)->year)
                    ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
            )->get();

            $totalDays = 0;
            $countClosedMissions = $closedMissions->count();

            foreach ($closedMissions as $jobOffer) {
                // Récupérer la date de clôture depuis ActivityLog
                $closingDate = ActivityLog::where('log_type', 'job_offer')
                    ->where('job_offer_id', $jobOffer->id)
                    ->whereHas('jobOffer', function ($query) {
                        $query->where('status_job_offer', 4);
                    })
                    ->value('job_offer_modified_date');

                if ($closingDate && $jobOffer->mission_started_at) {
                    $startDate = Carbon::parse($jobOffer->mission_started_at);
                    $endDate = Carbon::parse($closingDate);
                    $totalDays += $startDate->diffInDays($endDate);
                }
            }

            // Calcul de la moyenne du temps d'embauche
            $averageTime = $countClosedMissions > 0 ? round($totalDays / $countClosedMissions, 2) : 0;
            $data[] = $averageTime;
        }

        // ============================================
        // CALCUL DES DONNÉES MENSUELLES (Pour Tableau)
        // ============================================

        // Récupérer l'année depuis la requête ou utiliser l'année actuelle par défaut
        $year = $request ? $request->input('year', date('Y')) : date('Y');

        // Boucle sur les 12 mois de l'année
        for ($month = 1; $month <= 12; $month++) {
            // Nouveaux compteurs globaux pour toute l'année
            $totalApplications = $applyFilters(TrackingApplication::whereYear('created_at', $year)
                ->whereMonth('created_at', $month))->count();

            // dump($totalApplicationsYear);

            $totalHires = $applyFilters(TrackingApplication::where('status_id', 4)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month))
                ->count();

            // dump($totalHiresYear);

            // Récupérer les missions clôturées pour le mois courant, avec application des filtres
            $closedMissions = $applyFilters(
                JobOffer::where('status_id', 4)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
            )->get();

            // Initialiser les compteurs
            $totalDays = 0;
            $countClosedMissions = $closedMissions->count();

            // Calcul du nombre total de jours entre début de mission et date de clôture
            foreach ($closedMissions as $jobOffer) {
                // Chercher la date de clôture dans ActivityLog
                $closingDate = ActivityLog::where('log_type', 'job_offer')
                    ->where('job_offer_id', $jobOffer->id)
                    ->whereHas('jobOffer', function ($query) {
                        $query->where('status_job_offer', 4);
                    })
                    ->value('job_offer_modified_date');

                // Si la date de clôture et de début de mission existent
                if ($closingDate && $jobOffer->mission_started_at) {
                    $startDate = Carbon::parse($jobOffer->mission_started_at);
                    $endDate = Carbon::parse($closingDate);
                    $totalDays += $startDate->diffInDays($endDate); // Ajouter la durée au total
                }
            }

            // Calcul du temps moyen d'embauche pour le mois
            $averageTime = $countClosedMissions > 0 ? round($totalDays / $countClosedMissions, 2) : 0;

            // Enregistrement des données dans le tableau de résultats
            $details[] = [
                'month' => Carbon::create()->month($month)->locale('fr_FR')->isoFormat('MMMM'), // Nom du mois en français
                // 'countClosedMissions' => $countClosedMissions, // Nombre de missions clôturées
                // 'totalDays' => $totalDays, // Nombre total de jours
                'totalApplications' => $totalApplications,
                'totalHires' => $totalHires,
                'averageTime' => $averageTime, // Temps moyen d'embauche en jours
            ];
        }


        // dump($details);

        return [
            'data' => $data,
            'labels' => $labels,
            'details' => $details, // <<< Renvoi du détail pour ton tableau
        ];
    }
}
