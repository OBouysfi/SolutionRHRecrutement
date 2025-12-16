<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\JobOffer;
use App\Models\Matching;
use App\Models\TrackingApplication;
use App\Services\MatchingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

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
        $this->middleware('permission:matching-listing')->only(['index']);
        $this->middleware('permission:matching-add-shortlist')->only(['addToShortlist']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $matches = Matching::select([
                'matches.id',
                'matches.ratio',
                'matches.job_offer_id',
                'job_offers.status_id as job_offer_status',
                'profiles.id as profile_id',
                'profiles.matricule',
                'profiles.first_name',
                'profiles.last_name',
                'profiles.path_picture',
                'profiles.profession_id',
                'profiles.total_experience_in_years',
                'profiles.total_formation_in_months',
                'profiles.created_at',
                'profiles.updated_at'
            ])
                ->join('profiles', 'profiles.id', '=', 'matches.profile_id')
                ->join('job_offers', 'job_offers.id', '=', 'matches.job_offer_id')
                ->where('matches.ratio', '>', 0)
                ->groupBy(
                    'matches.id',
                    'matches.job_offer_id',
                    'job_offers.status_id',
                    'matches.ratio',
                    'profiles.id',
                    'profiles.matricule',
                    'profiles.first_name',
                    'profiles.last_name',
                    'profiles.path_picture',
                    'profiles.profession_id',
                    'profiles.total_experience_in_years',
                    'profiles.total_formation_in_months',
                    'profiles.created_at',
                    'profiles.updated_at'
                )
                ->with(['profile' => function ($query) {
                    $query->with('profession', 'diploma', 'formations', 'formations.diploma', 'formations.option','experiences.profession');
                }, 'jobOffer']);

            /**
             * Filter For Input Search
             */
            if ($request->filled('search') && $request->search != '') {
                $search = is_array($request->search) ? '' : $request->search;

                $dateSearch = null;
                if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $search, $dateMatch)) {
                    $dateSearch = $dateMatch[3] . '-' . $dateMatch[2] . '-' . $dateMatch[1];
                }

                $matches->where(function ($query) use ($search, $dateSearch) {
                    $query->where('profiles.first_name', 'like', "%$search%")
                        ->orWhere('profiles.last_name', 'like', "%$search%")
                        ->orWhere('profiles.matricule', 'like', "%$search%")
                        ->orWhereHas('profile', function ($q) use ($search) {
                            $q->whereRaw('CAST(total_experience_in_years AS CHAR) LIKE ?', ["%$search%"]);
                        })
                        ->orWhereHas('profile.profession', function ($q) use ($search) {
                            $q->where('label', 'like', "%$search%");
                        })
                        ->orWhereHas('profile.formations', function ($q) use ($search) {
                            $q->whereHas('diploma', function ($q2) use ($search) {
                                $q2->where('label', 'like', "%$search%");
                            });
                        })
                        ->orWhereHas('profile.formations', function ($q) use ($search) {
                            $q->whereHas('option', function ($q2) use ($search) {
                                $q2->where('label', 'like', "%$search%");
                            });
                        })
                        ->orWhereHas('profile.experiences.profession', function ($q) use ($search) {
                            $q->where('label', 'like', "%$search%");
                        });

                    if ($dateSearch) {
                        $query->orWhereDate('profiles.created_at', $dateSearch)
                            ->orWhereDate('profiles.updated_at', $dateSearch);
                    }
                });
            }

            // Filtre par jobOfferId
            if ($request->filled('jobOfferId') && $request->jobOfferId !== 'Tous') {
                $matches->where('matches.job_offer_id', $request->jobOfferId);
            }

            // Filtre par status jobOfferId
            if ($request->filled('statusjobOfferId') && $request->statusjobOfferId !== 'Tous') {
                $matches->where('job_offers.status_id', $request->statusjobOfferId);
            }

            // Filtre par clientId
            if ($request->filled('clientId') && $request->clientId !== 'Tous') {
                $matches->whereHas('jobOffer', function ($query) use ($request) {
                    $query->where('client_id', $request->clientId);
                });
            }
            if ($request->filled('professionId') && $request->professionId !== 'Tous') {
                $matches->whereHas('profile', function ($query) use ($request) {
                    $query->where('profession_id', $request->professionId);
                });
            }

            // Filtre par ratio
            if ($request->filled('minRatio') && $request->filled('maxRatio')) {
                $matches->whereBetween('matches.ratio', [
                    (float) $request->minRatio / 100,
                    (float) $request->maxRatio / 100
                ]);
            }

            return DataTables::of($matches)
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

                // ->addColumn('diploma_label', function ($match) {
                //     return $match->profile->diploma ? $match->profile->diploma->label : ' - ';
                // })
                ->addColumn('diploma_label', function ($match) {
                    $firstFormation = $match->profile->formations->first();
                    return __(optional($firstFormation?->diploma)->label) ?? ' - ';
                })

                // ->addColumn('total_experience', function ($match) {
                //     return $match->total_experience_in_years . ' '. __('generated.ans');
                // })

                ->addColumn('total_experience', function ($match) {
                    return $match->profile->getTotalExperienceInYearsAttribute() . ' '. __('generated.ans');
                })
                // ->addColumn('current_profession', function ($match) {
                //     return $match->profile->profession ? __($match->profile->profession->label) : ' - ';
                // })
                ->addColumn('tab', function () {
                    return '';
                })
                // ->addColumn('option', function ($match) {
                //     $formationNames = $match->profile->formations->pluck('name');
                //     return $formationNames->isEmpty() ? ' ' : $formationNames->join(', ');
                // })
                ->addColumn('option', function ($match) {
                    $firstFormation = $match->profile->formations->first();
                    return __(optional($firstFormation?->option)->label) ?? ' - ';
                })
                // ->addColumn('desired_profession', function ($match) {
                //     return __($match->profile->desired_profile) ?? ' - ';
                // })
                ->addColumn('desired_profession', function ($match) {
                    return $match->profile->profession ? __($match->profile->profession->label) : __('generated.Non défini');
                })

                ->addColumn('current_profession', function ($match) {
                    $lastExperience = $match->profile->experiences->sortByDesc('started_at')->first();
                    return $lastExperience && $lastExperience->profession
                        ? __($lastExperience->profession->label)
                        : ' - ';
                })
                ->addColumn('match_score', function ($match) {

                    if ($match->ratio >= 0.75) {
                        $color = '#2e9c65'; // Vert
                    } elseif ($match->ratio >= 0.50) {
                        $color = '#fdba00'; // Jaune
                    } else {
                        $color = '#f03d4f'; // Rouge
                    }

                    return '<div class="circle-progress" data-ratio="' . $match->ratio . '" data-color="' . $color . '"></div>';
                })

                ->addColumn('shortlist_toggle', function ($match) {
                    $inAts = TrackingApplication::where('profile_id', $match->profile_id)
                        ->where('job_offer_id', $match->job_offer_id)
                        ->exists();

                    $checked = $inAts ? 'checked' : '';
                    $dataInAts = $inAts ? '1' : '0';

                    return '
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input
                                class="form-check-input toggle-shortlist"
                                type="checkbox"
                                value="' . $match->id . '"
                                data-id="' . $match->id . '"
                                data-in-ats="' . $dataInAts . '"
                                ' . $checked . '>
                        </div>
                    ';
                })

                ->addColumn('action', function ($match) {
                    $actions = '<div class="dropdown text-center">
                                    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">';

                    // Vérification de la permission
                    if (auth()->user()->can('matching-detail')) {
                        $actions .= '<li><a class="dropdown-item" href="' . route("matching.detail", [$match->id, $match->profile->id, $match->jobOffer->id]) . '">'.__("generated.Détail").'</a></li>';
                    }

                    $actions .= '</ul></div>'; // Fermeture des balises

                    return $actions; // Retourne le menu complet
                })


                ->editColumn('created_at', function ($match) {
                    return $match->created_at
                        ? date('d/m/Y', strtotime($match->created_at))
                        : ' - ';
                })
                ->editColumn('updated_at', function ($match) {
                    return $match->updated_at
                        ? date('d/m/Y', strtotime($match->updated_at))
                        : ' - ';
                })
                ->rawColumns(['picture', 'match_score', 'action', 'shortlist_toggle'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function toggleShortlist(Request $request)
    {
        $request->validate([
            'match_id' => 'required|integer|exists:matches,id',
            'add' => 'required|boolean'
        ]);

        $match = Matching::findOrFail($request->match_id);
        $match->is_shortlisted = $request->add;
        $match->save();

        return response()->json(['message' => $request->add ? 'Ajouté à la shortlist.' : 'Retiré de la shortlist.']);
    }

    public function matchOne($profileId, $jobOfferId)
    {
        $profile = Profile::findOrFail($profileId);
        $offer   = JobOffer::findOrFail($jobOfferId);

        $service = new MatchingService();
        $match = $service->matchProfileToJobOffer($profile, $offer);

        if (is_null($match)) {
            return response()->json([
                'message' => 'Aucun matching n\'a été enregistré car le ratio global est égal à 0.',
            ], 200);
        }


        return response()->json($match);
    }

    /**
     * Ajoute plusieurs candidats à la shortlist à partir de leurs IDs dans la table matching.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToShortlist(Request $request)
    {
        $selectedIds = $request->ids;
        $duplicates = [];

        foreach ($selectedIds as $id) {
            $match = Matching::find($id);

            if (!$match) continue;

            $exists = TrackingApplication::where('job_offer_id', $match->job_offer_id)
                ->where('profile_id', $match->profile_id)
                ->exists();

            if (!$exists) {
                TrackingApplication::create([
                    'job_offer_id' => $match->job_offer_id,
                    'profile_id' => $match->profile_id,
                    'status_id' => 1,
                ]);
            } else {
                $duplicates[] = $match->profile_id;
            }
        }

        return response()->json([
            'success' => true,
            'duplicates' => $duplicates,
        ]);
    }
}
