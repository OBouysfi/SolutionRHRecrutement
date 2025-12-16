<?php

namespace App\Http\Controllers\Api\CandidatePortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Http\Resources\JobOfferCandidateResource;
use App\Models\JobOfferApplication;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\JobOffer;


class JobOfferCandidateController extends Controller

{
    protected $jobOffer;

    public function __construct(JobOffer $jobOffer)
    {
        $this->jobOffer = $jobOffer;
        // $this->middleware('permission:candidate-Offres-postuler')->only(['apply']);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {

            $jobOffercandidate = JobOffer::with(['jobOfferExperience','client', 'city','diplomas','diploma_option','profession']);
             
            if ($request->has('poste') && $request->poste !== 'Tous') {
                $jobOffercandidate->whereHas('profession', function ($query) use ($request) {
                    $query->where('profession_id', $request->poste);
                });
            }
            
            if ($request->has('activityarea') && $request->activityarea !== 'Tous') {
                $jobOffercandidate->where('activity_area_id', $request->activityarea);
            }
        
            if ($request->has('pays') && $request->pays !== 'Tous') {
                $jobOffercandidate->whereHas('city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }

            if ($request->has('ville') && $request->ville !== 'Tous') {
                $jobOffercandidate->where('city_id', $request->ville);
            }

            if ($request->has('start_date') && !empty($request->start_date)) {
                $jobOffercandidate->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->has('end_date') && !empty($request->end_date)) {
                $jobOffercandidate->whereDate('created_at', '<=', $request->end_date);
            }


        /**
        * Filter For search
        */
        if ($request->has('search') && !empty($request->search)) {
                $rawSearch = $request->input('search');
                $search = is_string($rawSearch) ? trim($rawSearch) : '';

                $dateSearch = null;
                if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $search, $matches)) {
                    $dateSearch = $matches[3] . '-' . $matches[2] . '-' . $matches[1];
                }

                $jobOffercandidate = $jobOffercandidate->where(function ($query) use ($search, $dateSearch) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhereHas('client', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%")
                                ->orWhere('id', 'like', "%{$search}%");
                        })
                        ->orWhereHas('city', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        });

                    $jobOfferContractTypeIds = ContractTypeProfileEnum::getAbbrAll()
                        ->filter(fn($abbr) => stripos($abbr, $search) !== false)
                        ->keys()
                        ->toArray();

                    if (!empty($jobOfferContractTypeIds)) {
                        $query->orWhereIn('contract_type_id', $jobOfferContractTypeIds);
                    }

                    $query->orWhereHas('diplomas', function ($q) use ($search) {
                        $q->where('label', 'like', "%{$search}%");
                    });

                    $query->orWhereHas('diploma_option', function ($q) use ($search) {
                        $q->where('label', 'like', "%{$search}%");
                    });

                    if (is_numeric($search)) {
                        $query->orWhereHas('jobOfferExperience', function ($q) use ($search) {
                            $q->where('years', 'like', "%{$search}%");
                        });
                    }

                    if ($dateSearch) {
                        $query->orWhereDate('created_at', $dateSearch)
                            ->orWhereDate('updated_at', $dateSearch);
                    }
                });
            }
 
            return DataTables::of($jobOffercandidate)

                // Logo client
                ->addColumn('logo', function ($jobOffercandidate) {
                    if ($jobOffercandidate->client) {
                        $logoUrl = $jobOffercandidate->client->getLogoUrl();
                        return '<img src="' . htmlspecialchars($logoUrl) . '" alt="Logo" width="40" style="max-width:none;">';
                    }
                    return '-';
                })

                // N° client
                ->addColumn('client_number', function ($jobOffercandidate) {
                    return $jobOffercandidate->client->id ?? ' - ';
                })

                // Nom du client
                ->addColumn('client_name', function ($jobOffercandidate) {
                    return $jobOffercandidate->client->name ?? ' - ';
                })

                // Intitulé du poste
                ->addColumn('title', function ($jobOffercandidate) {
                    return __($jobOffercandidate->title) ?? '-';
                })

                // Type de contrat
                ->addColumn('contract_type', function ($jobOffercandidate) {
                    $abbr = ContractTypeProfileEnum::getAbbrValue($jobOffercandidate->contract_type_id);
                    return $abbr ?? '-';
                })

                // Localisation (ville)
                ->addColumn('city_name', function ($jobOffercandidate) {
                    return $jobOffercandidate->city->name ?? '-';
                })

                // diploma
               ->addColumn('diploma_label', function ($jobOffercandidate) {
                    return $jobOffercandidate->diplomas->isNotEmpty()
                        ? $jobOffercandidate->diplomas->map(function ($diploma) {
                            return __($diploma->label) ?? ' - ';
                        })->implode(' ') 
                        : ' - ';
                })

                // Option
                ->addColumn('diploma_option', function ($jobOffercandidate) {
                    $options = optional($jobOffercandidate)->diploma_option;

                    return $options && $options->isNotEmpty()
                        ? $options->map(fn($diploma) => __($diploma->label) ?? ' - ')->implode(' ')
                        : ' - ';
                })


                // experience_count
                ->addColumn('experience_count', function ($jobOffercandidate) {
                    return $jobOffercandidate->jobOfferExperience->sum('years') . ' ans';
                })

                // Date de début
                ->addColumn('start_date', function ($jobOffercandidate) {
                    return $jobOffercandidate->mission_started_at
                        ? $jobOffercandidate->mission_started_at->format('d/m/Y')
                        : ' - ';
                })

                // Date de fin
                ->addColumn('end_date', function ($jobOffercandidate) {
                    return $jobOffercandidate->mission_finished_at
                        ? $jobOffercandidate->mission_finished_at->format('d/m/Y')
                        : ' - ';
                })
                ->addColumn('action', function ($jobOffercandidate) {
                        $button = '<button type="button" class="btn btn-theme btn-sm" onclick="applyForJob(' . $jobOffercandidate->id . ')">'.__("generated.Postuler").'</button>';
                
                    return $button;
                })
                
                

                ->rawColumns(['logo','action'])
                ->make(true);
        }

        $jobOffercandidate = JobOffer::all();

        return response()->json([
            'status' => 'success',
            'data' => JobOfferCandidateResource::collection(
                $jobOffercandidate
            ),
        ]);
    }

    public function apply($id = null)
    {
        $profile = Profile::where("user_id", Auth::id())->first();
        $profile_id = $profile ? $profile->id : null;
        $job_offer_id = $id ?? null;
    
        if (!$profile_id) {
            return response()->json(['status' => 'error', 'message' => 'Profil introuvable.'], 400);
        }
    
        $alreadyApplied = JobOfferApplication::where('job_offer_id', $job_offer_id)
                            ->where('profile_id', $profile_id)
                            ->exists();
    
        if ($alreadyApplied) {
            return response()->json(['status' => 'error', 'message' => 'Vous avez déjà postulé pour cette offre.']);
        }
    
        JobOfferApplication::create([
            'job_offer_id' => $job_offer_id,
            'profile_id' => $profile_id,
        ]);
    
        return response()->json(['status' => 'success', 'message' => 'Vous êtes postulé avec succès.']);
    }
}