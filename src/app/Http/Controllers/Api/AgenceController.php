<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Agency;
use App\Models\Filiale;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\AgenceResource;
use App\Http\Requests\AgenceRequest;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $agence = Agency::select('id', 'name', 'filiale_id');

        if ($request->ajax()) {
            return DataTables::of($agence)
                ->addColumn('agence', fn($agence) => $agence->name ?? ' - ')
                ->addColumn('filiale', fn($agence) => $agence->filiale ? $agence->filiale->name : ' - ')
                ->addColumn('action', function ($agence) {
                    return '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewDetails(' . $agence->id . ')">
                                        Détails
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item edit-btn" data-id="' . $agence->id . '" href="javascript:void(0)">
                                        Modifier
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" onclick="deleteAgence(' . $agence->id . ')">
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

        return response()->json([
            'status' => 'success',
            'data' => AgenceResource::collection(
                $agence->with(['filiale'])->get()
            ),
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(AgenceRequest $request)
    {
    
        try {
            DB::beginTransaction();

            $agenceData = $request->validated();

            $agence = Agency::create($agenceData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Agence ajouté avec succès.',
                'data' => new AgenceResource($agence),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de Agence : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors Agence.');
        }
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function destroy(Agency $agence)
    {
        try {
            $agence->delete();
            return response()->json(['message' => 'Agence supprimé avec succès.'], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de Agence : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la suppression de Agence.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $agence = Agency::with('filiale')->findOrFail($id);
    
            return response()->json([
                'name' => $agence->name,  
                'show_name_filiale' => $agence->filiale ? $agence->filiale->name : ' - ',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération du Agence : ' . $e->getMessage());
            return response()->json([
                'message' => 'Erreur lors de la récupération du Agence.'
            ], 500);
        }
    }
        
    public function update(Request $request, Agency $agence)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'filiale_id' => 'required|exists:filiales,id', 
        ]);
    
        $filiale = Filiale::find($request->input('filiale_id'));
    
        if (!$filiale) {
            return response()->json(['message' => 'Filiale not found.'], 404);
        }
    
        $agence->update([
            'name' => $request->input('name'),
            'filiale_id' => $filiale->id, 
        ]);
    
        return response()->json([
            'message' => 'Agence updated successfully',
            'data' => $agence
        ]);
    }
    
}