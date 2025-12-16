<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfessionRequest;
use App\Http\Resources\ProfessionResource;
use App\Models\Profession;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ProfessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('search');
            $professions = Profession::select('id', 'label');

            // Filter table data by search input
            if (!empty($search)) {
            $professions->where('label', 'like', '%' . $search . '%');
            }

            return DataTables::of($professions)

                ->addColumn('Métier/poste', function ($profession) {
                    return __($profession->label) ?? '-';
                })

                ->addColumn('action', function ($profession) {
                    return '
                        <div class="dropdown"  style="text-align: right;margin-right: 20px;">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)"  onclick="viewDetails(' . $profession->id . ')">
                                        '. __("generated.Détails") 
                                        .'
                                    </a>
                                </li>
                                 <li>
                                    <a class="dropdown-item  edit-btn" id="edit-btn" href="javascript:void(0)" data-id="' . $profession->id . '">
                                        '.__("generated.Modifier").'
                                    </a>
                                  </li>
                                 <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" 
                                    onclick="deleteProfession('. $profession->id .')">
                                          '.__("generated.Supprimer").'
                                    </a>
                                </li>
                            </ul>
                        </div>

                       
        
                    ';
                })

                // Autoriser HTML
                ->rawColumns(['action'])

                ->make(true);
        }

        // Pas AJAX -> ...
        return response()->json(['error' => 'Invalid request'], 400);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessionRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            $professionData = $request->validated();

            $profession = Profession::create($professionData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('generated.Métier ajouté avec succès.'),
                'data' => new ProfessionResource($profession),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__('generated.Erreur lors de l\'ajout du métier.') . ' : ' . $e->getMessage());
            return $this->errorResponse(__('generated.Erreur lors de l\'ajout du métier.'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        try {
          
            return response()->json([
                __('generated.Métiers Postes') => $profession->label, 
            ], 200);
        } catch (\Exception $e) {
            Log::error(__('generated.Erreur lors de la récupération du Métiers Postes : ') . $e->getMessage());
            return response()->json([
                'message' => __('generated.Erreur lors de la récupération du Métiers Postes : ')
            ], 500); 
        }
    }

    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profession $profession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(ProfessionRequest $request, Profession $profession)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $professionData = $request->validated();
            
    //         $profession->update($professionData);

    //         DB::commit();

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'métier modifié avec succès.',
    //             'data' => new ProfessionResource($profession->refresh()),
    //         ], 201);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Erreur lors de la modification de métier : ' . $e->getMessage());
    //         return $this->errorResponse('Erreur lors de la modification de métier.');
    //     }
    // }
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'activityArea' => 'required|string|max:255',
        // ]);

        $profession = Profession::find($id);

        if (!$profession) {
            return response()->json(['message' => ' Métiers non trouvé.'], 404);
        }

        $profession->update([
            'label' => $request->input('label')
        ]);

        return response()->json([
            'message' =>__('generated.Métier modifiée avec succès.'),
            'data' => $profession
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        try {
            $profession->delete();
    
            return response()->json(['message' => __('generated.Métier supprimé avec succès.')], 200);
        } catch (\Exception $e) {
            Log::error(__('generated.Erreur lors de la suppression du métier') . ' : ' . $e->getMessage());
            return $this->errorResponse(__('generated.Erreur lors de la suppression du métier'), 500);
        }
    }
    


    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    private function errorResponse(string $message, int $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}
