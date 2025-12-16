<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiplomaOptionRequest;
use App\Http\Resources\DiplomaOptionResource;
use App\Models\DiplomaOption;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class DiplomaOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $search = $request->get('search');

        $diplomaOptions = DiplomaOption::query()->select('id', 'label');

        // Filter table data by search input
        if (!empty($search) && is_string($search)) {
            $diplomaOptions->where('label', 'like', '%' . $search . '%');
        }
            
            return DataTables::of($diplomaOptions)

                ->addColumn('Intitulé du diplome', function ($diplomaOption) {
                    return __($diplomaOption->label) ?? '-';
                })

                ->addColumn('action', function ($diplomaOption) {
                    return '
                        <div class="dropdown" style="text-align: right;margin-right: 20px;">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;" class="d-flex justify-content-End"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)"  onclick="viewDiplomaOption(' . $diplomaOption->id . ')">
                                        '. __("generated.Détails") 
                                        .'
                                    </a>
                                </li>
                                 <li>
                                     <a class="dropdown-item  edit-btn" id="edit-btn" href="javascript:void(0)" data-id="' . $diplomaOption->id . '">
                                       '.__("generated.Modifier").'
                                    </a>
                                  </li>
                                 <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" 
                                    onclick="deletediplomaOption('. $diplomaOption->id .')">
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
    public function store(DiplomaOptionRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            $diplomaOptionData = $request->validated();

            $diplomaOption = DiplomaOption::create($diplomaOptionData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('generated.Option ajouté avec succès.'),
                'data' => new DiplomaOptionResource($diplomaOption),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error( __("generated.Erreur lors de l’ajout d’option") . $e->getMessage());
            return $this->errorResponse(__("generated.Erreur lors de l’ajout d’option"));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $diplomaOption = DiplomaOption::find($id);
        if (!$diplomaOption) {
            return response()->json(['error' => __('generated.Diploma option not found')], 404);
        }
        return response()->json([
            __('generated.Options du diplôme') => __($diplomaOption->label),
        ]);
    }
    
    public function update(Request $request, $id)
    {
       
        $diplomaOption = DiplomaOption::find($id);

        if (!$diplomaOption) {
            return response()->json(['message' => __('generated.Options du diplome non trouvé.')], 404);
        }

        $diplomaOption->update([
            'label' => $request->input('label')
        ]);

        return response()->json([
            'message' => __('generated.Options du diplome mis à jour avec succès'),
            'data' => $diplomaOption
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $diplomaoption)
    {
        try {
          
            $diplomaOption = DiplomaOption::find($diplomaoption);
    
            if ($diplomaOption) {

                $diplomaOption->delete();

                return response()->json(['message' => __('generated.Option supprimée avec succès.')], 200);
            }
    
            return response()->json(['message' => __('generated.Option introuvable.')], 404);
            
        } catch (\Exception $e) {
           
            Log::error( __('generated.Erreur lors de la suppression d’option') . $e->getMessage());
            return response()->json(['message' => __('generated.Erreur lors de la suppression d’option.')], 500);
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
