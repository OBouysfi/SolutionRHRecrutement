<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Filiale;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\FilialeResource;
use App\Http\Requests\FilialeRequest;
use App\Models\City;


class FilialeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filiale = Filiale::select('id', 'name', 'city_id');

        if ($request->ajax()) {
            return DataTables::of($filiale)
                ->addColumn('filiale', fn($filiale) => $filiale->name ?? ' - ')
                ->addColumn('ville', fn($filiale) => $filiale->city ? __($filiale->city->name) : ' - ')
                ->addColumn('action', function ($filiale) {
                    return '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewDetails(' . $filiale->id . ')">
                                        Détails
                                    </a>
                                </li>
                                <li>
                                      <a class="dropdown-item  edit-btn" id="edit-btn" href="javascript:void(0)" data-id="' . $filiale->id . '">
                                        Modifier
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" onclick="deletefiliale(' . $filiale->id . ')">
                                        Supprimer
                                    </a>
                                </li>
                            </ul>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Ensure $filiale is still defined here for the JSON response
        return response()->json([
            'status' => 'success',
            'data' => FilialeResource::collection(
                $filiale->with(['city'])->get()
            ),
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(FilialeRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            $filialeData = $request->validated();

            $filiale = Filiale::create($filialeData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Filiale ajouté avec succès.',
                'data' => new FilialeResource($filiale),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de Filiale : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors Filiale.');
        }
    }

    /**
     * Show Filiale
     */
    public function show($id)
    {
        try {
            $filiale = Filiale::with('city')->findOrFail($id);
    
            return response()->json([
                'name' => $filiale->name,  
                'city_name' => $filiale->city ? $filiale->city->name : ' - ',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération du Filiale : ' . $e->getMessage());
            return response()->json([
                'message' => 'Erreur lors de la récupération du Filiale.'
            ], 500);
        }
    }

    public function destroy(Filiale $filiale)
    {
        try {
            $filiale->delete();
            return response()->json(['message' => 'Filiale supprimé avec succès.'], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de Filiale : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la suppression de Filiale.'], 500);
        }
    }

    public function update(Request $request, Filiale $filiale)
    {
        if (!$filiale) {
            return response()->json(['message' => 'Filiale non trouvée.'], 404);
        }
    
       
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id', 
        ]);
    
        $city = City::find($request->input('city_id'));
    
        if (!$city) {
            return response()->json(['message' => 'Ville non trouvée.'], 404);
        }
    
        $filiale->update([
            'name' => $request->input('name'),
            'city_id' => $request->input('city_id'),
            'city_name' => $city->name, 
        ]);
    
        return response()->json([
            'message' => 'Filiale mise à jour avec succès',
            'data' => $filiale
        ]);
    }
    
    
    


}