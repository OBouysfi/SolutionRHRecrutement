<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Models\Matching;
use App\Models\TrackingApplication;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusUpdateAtsMail;
use App\Models\EmailTemplate;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;

class TrackingApplicationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            if ($request->ajax()) {
                // Récupération des données de base + relations
                $trackingApplications = TrackingApplication::select([
                    'tracking_applications.id',
                    'tracking_applications.status_id',
                    'tracking_applications.job_offer_id',
                    'tracking_applications.profile_id',
                    'profiles.matricule',
                    'profiles.first_name',
                    'profiles.last_name',
                    'profiles.path_picture',
                    'profiles.profession_id',
                    'profiles.total_experience_in_years',
                    'profiles.total_formation_in_months'
                ])
                    ->join('profiles', 'profiles.id', '=', 'tracking_applications.profile_id')
                    ->join('job_offers', 'job_offers.id', '=', 'tracking_applications.job_offer_id')
                    ->with([
                        'profile' => function ($query) {
                            $query->with('profession', 'diploma', 'formations', 'formations.diploma', 'formations.option');
                        },
                        'jobOffer.profession',
                    ])
                    ->get(); // 👈 très important ici

                // Paires uniques profile_id + job_offer_id
                $pairs = $trackingApplications->map(function ($app) {
                    return [
                        'profile_id' => $app->profile_id,
                        'job_offer_id' => $app->job_offer_id
                    ];
                })->unique(function ($pair) {
                    return $pair['profile_id'] . '-' . $pair['job_offer_id'];
                })->values();

                // Récupération des matches correspondants
                $matches = Matching::where(function ($query) use ($pairs) {
                    foreach ($pairs as $pair) {
                        $query->orWhere(function ($q) use ($pair) {
                            $q->where('profile_id', $pair['profile_id'])
                                ->where('job_offer_id', $pair['job_offer_id']);
                        });
                    }
                })->get();

                // Indexation des matches
                $matchesByKey = $matches->keyBy(function ($match) {
                    return $match->profile_id . '-' . $match->job_offer_id;
                });

                // Association des matches à chaque tracking application
                foreach ($trackingApplications as $application) {
                    $key = $application->profile_id . '-' . $application->job_offer_id;
                    $application->match = $matchesByKey->get($key);
                }

                // ✅ À ce stade, $application->match est bien défini pour chaque ligne

                // Puis les éventuels filtres
                if ($request->filled('client')) {
                    $trackingApplications = $trackingApplications->filter(function ($app) use ($request) {
                        return $app->jobOffer?->client_id == $request->client;
                    })->values();
                }

                if ($request->filled('jobOffer')) {
                    session(['job_offer_id' => $request->jobOffer]);
                    $trackingApplications = $trackingApplications->filter(function ($app) use ($request) {
                        return $app->job_offer_id == $request->jobOffer;
                    })->values();
                }



            return DataTables::of($trackingApplications)
                // 1) Checkbox
                ->addColumn('select_check', function ($app) {
                    return '<input type="checkbox" class="to-email-2" value="' . $app->id . '">';
                })
                // 2) Picture
                ->addColumn('picture', function ($app) {
                    $picture = match (true) {
                        !empty($app->profile->path_picture) => asset('storage/' . $app->profile->path_picture),
                        $app->profile->sexe === 'Femme' => asset('assets/img/ats/female-default.jpg'),
                        default => asset('assets/img/ats/male-default.webp')
                    };

                    return sprintf(
                        '<img src="%s" alt="Photo de %s" class="" width="50" style="max-width:none;">',
                        $picture,
                        $app->profile->first_name
                    );
                })

                // 3) Référence (matricule)
                ->addColumn('matricule', function ($app) {
                    return $app->matricule ?? '—';
                })
                // 4) Prénom
                ->addColumn('first_name', function ($app) {
                    return optional($app->profile)->first_name ?? '—';
                })
                // 5) Nom
                ->addColumn('last_name', function ($app) {
                    return optional($app->profile)->last_name ?? '—';
                })
                // 6) Diplôme
                ->addColumn('diploma', function ($app) {
                    $firstFormation = $app->profile->formations->first();
                    return __(optional($firstFormation?->diploma)->label) ?? '—';
                })
                // 7) Option
                ->addColumn('option', function ($app) {
                    $firstFormation = $app->profile->formations->first();
                    return __(optional($firstFormation?->option)->label) ?? '—';
                })
                // 8) Expérience
                ->addColumn('experience', function ($app) {
                    return $app->profile->total_experience_in_years . ' ans';
                })
                // 9) Poste actuel
                ->addColumn('current_position', function ($app) {
                    return $app->profile->profession ? __($app->profile->profession->label) : '—';
                })
                // 10) Poste souhaité
                ->addColumn('desired_position', function ($app) {
                    return $app->profile->desired_profile ?? '—';
                })
                // 11) Score
                ->addColumn('score', function ($app) {
                    $match = $app->match;
                    $ratio = floatval($match->ratio);
//                    if ($match && $match->job_offer_id == $app->job_offer_id && $match->profile_id == $app->profile_id) {
//                        $ratio = floatval($match->ratio);
//                    } else {
//                        $ratio = 0;
//                    }

                    // Choix de la couleur
                    if ($ratio >= 0.75) {
                        $color = '#2e9c65';
                    } elseif ($ratio >= 0.50) {
                        $color = '#fdba00';
                    } else {
                        $color = '#f03d4f';
                    }
                    return '<div class="circle-progress" data-ratio="' . $ratio . '" data-color="' . $color . '"></div>';
                })

                // 12) Etapes (status)
                ->addColumn('status', function ($app) {
                    $currentStatus = $app->status_id;
                    $statuses = StatusTrackingApplicationEnum::getAll()->toArray();

                    $colors = [
                        StatusTrackingApplicationEnum::SHORTLIST => '#ebbb1f',
                        StatusTrackingApplicationEnum::EVALUATION => '#fc8938',
                        StatusTrackingApplicationEnum::INTERVIEW => '#005dc7',
                        StatusTrackingApplicationEnum::RETAINED => '#2e9c65',
                        StatusTrackingApplicationEnum::HIRING => '#7b84ab',
                        StatusTrackingApplicationEnum::DISCARDED => '#da2d6f',
                    ];

                    $selectedColor = $colors[$currentStatus] ?? '#2e9c65';

                    $html = '<select class="form-select status-select steps-chose" data-application-id="' . $app->id . '"
                                style="background-color: ' . $selectedColor . ' !important;
                                       color: #fff;
                                       height: 32px;
                                       padding: 2px 8px;
                                       font-size: 12px;
                                       width: auto;
                                       min-width: 120px;
                                       border: none;
                                       border-radius: 4px;">';

                    foreach ($statuses as $id => $label) {
                        $optionColor = $colors[$id] ?? '#2e9c65';
                        $selected = ($id == $currentStatus) ? 'selected' : '';

                        $html .= '<option style="background-color: ' . $optionColor . ' !important;" value="' . $id . '" ' . $selected . ' data-color="' . $optionColor . '">'
                            . $label . '</option>';
                    }
                    return $html;
                })



                // 13) Action
                ->addColumn('action', function ($app) {
                    return '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="min-width:74px;padding:0;">
                                <li><a class="dropdown-item translated_text" href="' . route("matching.detail", [$app->id, $app->profile_id, $app->job_offer_id]) . '"> ' . __("generated.Détail") . '</a></li>
                            </ul>
                        </div>
                    ';
                })
                ->rawColumns(['select_check', 'picture', 'score', 'status', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function loadMore(Request $request)
    {
        $statusId = $request->input('status_id');
        $page = $request->input('page', 2); // Default to page 2
        $perPage = $request->input('per_page', 3);

        $applications = TrackingApplication::with(['profile', 'jobOffer'])
            ->where('status_id', $statusId)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        foreach ($applications as $application) {
            $match = Matching::where('profile_id', $application->profile_id)
                ->where('job_offer_id', $application->job_offer_id)
                ->first();
            $application->match = $match;
        }


        $html = [];
        foreach ($applications as $application) {
            $html[] = view('trackingApplication.inc.application_card', [
                'application' => $application
            ])->render();
        }

        return response()->json([
            'success' => true,
            'data' => $html,
            'next_page' => $applications->hasMorePages() ? $page + 1 : null,
            'total' => $applications->total()
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required|integer',
            'reason' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        // Liste des labels de statut
        $statusLabels = [
            1 => 'Shortlist',
            2 => 'Évaluation',
            3 => 'Entretien',
            4 => 'Retenu',
            5 => 'Embauché',
            6 => 'Rejeté',
        ];

        if (auth()->user()->can('ats-' . $statusLabels[$request->status_id])) {
            // Trouver la candidature
            $application = TrackingApplication::findOrFail($id);

            // Vérifier si c'est un abandon volontaire (statut "Rejeté" + marque d'abandon)
            if ($request->status_id == StatusTrackingApplicationEnum::DISCARDED) {
                $application->is_abandon_candidature = 1; // Marquer comme abandonné
                $application->reason = $request->reason ?? 'Candidature abandonnée par le candidat';
            } // Si le statut n'est PAS "Rejeté", alors on restaure l'abandon
            elseif ($application->is_abandon_candidature == 1 && $request->status_id != StatusTrackingApplicationEnum::DISCARDED) {
                $application->is_abandon_candidature = 0; // Restaurer le candidat
            }

            // Mettre à jour le statut et les commentaires
            $application->status_id = $request->status_id;
            $application->comments = $request->comments ?? null;

            $application->save();

            // Récupérer le modèle d'e-mail associé au nouveau statut
            $emailTemplate = EmailTemplate::where('status_id', $application->status_id)->first();

            if ($emailTemplate) {
                // Remplacement des placeholders avec les données du candidat
                $placeholders = [
                    '[Nom du candidat]' => $application->profile->first_name . ' ' . $application->profile->last_name,
                    '[Nom du poste]' => $application->jobOffer->title,
                    '[Nom de l\'entreprise]' => $application->jobOffer?->client?->name,
                    // '[Nom du recruteur]' => $application->jobOffer?->client?->name,
                ];

                $subject = str_replace(array_keys($placeholders), array_values($placeholders), $emailTemplate->subject);
                $content = str_replace(array_keys($placeholders), array_values($placeholders), $emailTemplate->content);

                // Envoyer l'e-mail au candidat
                Mail::to($application->profile->email)->send(new StatusUpdateAtsMail([
                    'subject' => $subject,
                    'content' => $content,
                    'candidate_name' => $application->profile->first_name . ' ' . $application->profile->last_name,
                    'job_title' => $application->jobOffer->title,
                ]));
            }

            // Liste des labels de statut
            $statusLabels = [
                1 => 'Shortlist',
                2 => 'Évaluation',
                3 => 'Entretien',
                4 => 'Retenu',
                5 => 'Embauché',
                6 => 'Rejeté',
            ];

            return response()->json([
                'success' => true,
                'newStatusLabel' => $statusLabels[$application->status_id] ?? 'Inconnu',
                'isAbandoned' => $application->is_abandon_candidature,
            ]);
        } else {
            return throw new \Exception("vous ne pouvez pas performer cette action, manque de permissions nécessaires");
        }
    }


    public function filterKanban(Request $request)
    {
        $trackingApplications = TrackingApplication::select([
            'tracking_applications.id',
            'tracking_applications.status_id',
            'tracking_applications.job_offer_id',
            'tracking_applications.profile_id',
            'profiles.matricule',
            'profiles.first_name',
            'profiles.last_name',
            'profiles.path_picture',
            'profiles.profession_id',
            'profiles.total_experience_in_years',
            'profiles.total_formation_in_months'
        ])
            ->join('profiles', 'profiles.id', '=', 'tracking_applications.profile_id')
            ->join('job_offers', 'job_offers.id', '=', 'tracking_applications.job_offer_id')
            ->with(['profile' => function ($query) {
                $query->with('profession', 'diploma', 'formations', 'formations.diploma');
            }])
            ->with(['match' => function ($query) {
                $query->select('id', 'profile_id', 'job_offer_id', 'ratio');
            }]);

        // Filtres
        if ($request->filled('client')) {
            $trackingApplications->whereHas('jobOffer', function ($query) use ($request) {
                $query->where('client_id', $request->client);
            });
        }
        if ($request->filled('jobOffer')) {
            $trackingApplications->where('tracking_applications.job_offer_id', $request->jobOffer);
        }

        $applications = $trackingApplications->get();

        // Grouper les applications par statut
        $statuses = StatusTrackingApplicationEnum::getAll();
        $groupedApplications = [];

        foreach ($statuses as $statusId => $statusLabel) {
            $groupedApplications[] = [
                'id' => $statusId,
                'label' => $statusLabel,
                'applications' => $applications->where('status_id', $statusId)->map(function ($app) {
                    return [
                        'id' => $app->id,
                        'profile' => [
                            'first_name' => $app->profile->first_name,
                            'last_name' => $app->profile->last_name,
                            'matricule' => $app->profile->matricule,
                            'path_picture' => $app->profile->path_picture,
                            'profession' => [
                                'label' => $app->profile->profession->label
                            ]
                        ],
                        'jobOffer' => [
                            'title' => $app->jobOffer->title
                        ],
                        'ratio' => $app->match ? $app->match->ratio : 0
                    ];
                })->values()
            ];
        }

        return response()->json(['data' => $groupedApplications]);
    }

    public function getProfiles(Request $request)
    {
        $profiles = TrackingApplication::whereIn("id", $request->ids)
            ->with('profile')
            ->get()
            ->pluck('profile');

        $jobOfferId = TrackingApplication::whereIn("id", $request->ids)->first()->job_offer_id;
        session(['job_offer_id' => $jobOfferId]);
        return response()->json(['data' => $profiles, 'job_offer_id' => $jobOfferId]);
    }

    public function close(Request $request)
    {
        $request->validate([
            'job_offer_id' => 'required|exists:job_offers,id',
        ]);

        $jobOffer = JobOffer::findOrFail($request->job_offer_id);

        // l'offre est déjà clôturée
        if ($jobOffer->status_id == StatusJobOfferEnum::CLOSED) {
            return response()->json([
                'status' => 'already_closed',
                'message' => 'Cette mission est déjà clôturée.'
            ], 200);
        }

        // Sinon, on clôture
        $jobOffer->status_id = StatusJobOfferEnum::CLOSED;
        $jobOffer->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Mission clôturée avec succès.'
        ]);
    }


}
