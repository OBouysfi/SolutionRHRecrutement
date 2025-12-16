<?php

namespace App\Http\Controllers\Api\CandidatePortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use App\Enums\Profile\ContractTypeProfileEnum;
use Illuminate\Support\Facades\Auth;
use App\Models\Matching;
use App\Http\Resources\JobOfferMatchingCandidateResource;




class MatchingCandidateController extends Controller

{
    public function indexMatching(Request $request)
    {
        if ($request->ajax()) {
            $profileId = Auth::user()?->profile?->id;
            $matches = Matching::select([
            'matches.id',
            'matches.ratio',
            'matches.job_offer_id',
            'matches.profile_id',
            'job_offers.title',
            'job_offers.mission_started_at',
            'job_offers.mission_finished_at',
            'job_offers.created_at',
            ])
            ->join('job_offers', 'matches.job_offer_id', '=', 'job_offers.id')
            ->leftJoin('clients', 'job_offers.client_id', '=', 'clients.id') 
            ->leftJoin('cities', 'job_offers.city_id', '=', 'cities.id')
            ->leftJoin('job_offer_experiences', 'job_offers.id', '=', 'job_offer_experiences.job_offer_id')
            ->leftJoin('job_offer_formations', 'job_offers.id', '=', 'job_offer_formations.job_offer_id')
            ->leftJoin('diplomas', 'job_offer_formations.diploma_id', '=', 'diplomas.id')
            ->leftJoin('diploma_options', 'job_offer_formations.option_id', '=', 'diploma_options.id')
            ->where('matches.ratio', '>', 0)
            ->where('matches.profile_id', $profileId);


            if ($request->has('pays') && $request->pays !== 'Tous') {
                $matches->whereHas('jobOffer.city.country', function ($query) use ($request) {
                    $query->where('countries.id', $request->pays);
                });
            }
            if ($request->has('poste') && $request->poste !== 'Tous') {
                $matches = $matches->whereHas('jobOffer.profession', function ($query) use ($request) {
                    $query->where('profession_id', $request->poste);
                });
            }

            if ($request->has('activityarea') && $request->activityarea !== 'Tous') {
                $matches->where('activity_area_id', $request->activityarea);
            }
    
           
    
            if ($request->has('ville') && $request->ville !== 'Tous') {
                $matches->where('city_id', $request->ville);
            }
    
            if ($request->has('start_date') && !empty($request->start_date)) {
                $matches->whereDate('matches.created_at', '>=', $request->start_date);
            }
    
            if ($request->has('end_date') && !empty($request->end_date)) {
                $matches->whereDate('matches.created_at', '<=', $request->end_date);
            }


            /**
            * Filter For search
            */
            if ($request->has('search') && !empty($request->search)) {
                $rawSearch = $request->input('search');
                $search = is_string($rawSearch) ? trim($rawSearch) : '';

                $dateSearch = null;
                if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $search, $matchesDate)) {
                    $dateSearch = $matchesDate[3] . '-' . $matchesDate[2] . '-' . $matchesDate[1];
                }

                $matches = $matches->where(function ($query) use ($search, $dateSearch) {
                    $query->where('job_offers.title', 'like', "%{$search}%")
                        ->orWhere('clients.name', 'like', "%{$search}%")
                        ->orWhere('clients.id', 'like', "%{$search}%")
                        ->orWhere('cities.name', 'like', "%{$search}%")
                        ->orWhere('diplomas.label', 'like', "%{$search}%")
                        ->orWhere('diploma_options.label', 'like', "%{$search}%");

                    if (is_numeric($search)) {
                        $query->orWhere('job_offer_experiences.years', 'like', "%{$search}%");
                    }
                    $matcheContractTypeIds = ContractTypeProfileEnum::getAbbrAll()
                        ->filter(fn($abbr) => stripos($abbr, $search) !== false)
                        ->keys()
                        ->toArray();

                    if (!empty($matcheContractTypeIds)) {
                        $query->orWhereIn('contract_type_id', $matcheContractTypeIds);
                    }

                    if ($dateSearch) {
                        $query->orWhereDate('job_offers.created_at', $dateSearch)
                            ->orWhereDate('job_offers.updated_at', $dateSearch);
                    }
                });
            }
 
            return DataTables::of($matches)
                // Logo client
                ->addColumn('logo', function ($matches) {
                    if ($matches->jobOffer->client) {
                        $logoUrl = $matches->jobOffer->client->getLogoUrl();
                        return '<img src="' . htmlspecialchars($logoUrl) . '" alt="Logo" width="40" style="max-width:none;">';
                    }
                    return '-';
                })
                // Client number
                ->addColumn('client_number', function ($matches) {
                    return $matches->jobOffer->client->id ?? ' - ';
                })
                // Client name
                ->addColumn('client_name', function ($matches) {
                    return $matches->jobOffer->client->name ?? ' - ';
                })
                // Job title
                ->addColumn('title', function ($matches) {
                    return __($matches->jobOffer->title) ?? '-';
                })
                // Contract type
                ->addColumn('contract_type', function ($matches) {
                    $abbr = ContractTypeProfileEnum::getAbbrValue($matches->jobOffer->contract_type_id);
                    return $abbr ?? '-';
                })
                // City name
                ->addColumn('city_name', function ($matches) {
                    return __($matches->jobOffer->city->name) ?? '-';
                })
                // Diploma labels
                ->addColumn('diploma_label', function ($matches) {
                    return $matches->jobOffer->diplomas->isNotEmpty()
                        ? $matches->jobOffer->diplomas->map(function ($diploma) {
                            return __($diploma->label) ?? ' - ';
                        })->implode(' ')
                        : ' - ';
                })
                // Diploma options
                ->addColumn('diploma_option', function ($matches) {
                    return $matches->jobOffer->diploma_option->isNotEmpty()
                        ? $matches->jobOffer->diploma_option->map(function ($diploma) {
                            return __($diploma->label) ?? ' - ';
                        })->implode(' ')
                        : ' - ';
                })
                // Experience count
                ->addColumn('experience_count', function ($matches) {
                    return $matches->jobOffer->jobOfferExperience->sum('years') . ' ans';
                })
                // Start date
                ->addColumn('start_date', function ($matches) {
                    return $matches->jobOffer->mission_started_at
                        ? $matches->jobOffer->mission_started_at->format('d/m/Y')
                        : ' - ';
                })
                // End date
                ->addColumn('end_date', function ($matches) {
                    return $matches->jobOffer->mission_finished_at
                        ? $matches->jobOffer->mission_finished_at->format('d/m/Y')
                        : ' - ';
                })
                // Score
                ->addColumn('score', function ($match) {

                    if ($match->ratio >= 0.75) {
                        $color = '#2e9c65'; // Vert
                    } elseif ($match->ratio >= 0.50) {
                        $color = '#fdba00'; // Jaune
                    } else {
                        $color = '#f03d4f'; // Rouge
                    }

                    return '<div class="circle-progress" data-ratio="' . $match->ratio . '" data-color="' . $color . '"></div>';
                })
                ->rawColumns(['logo', 'score'])
                ->make(true);
        }
    
        // Default response for non-AJAX requests
        $matches = Matching::all();
    
        return response()->json([
            'status' => 'success',
            'data' => MatchingCandidateResource::collection($matches),
        ]);
    }
    
}

