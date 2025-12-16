<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityAreaRequest;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ActivityAreaResource;
use App\Models\ActivityArea;
use Yajra\DataTables\Facades\DataTables;

class ActivityAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $search = $request->get('search');
            $activityAreas = ActivityArea::select('id', 'label');

            // Filter table data by search input
            if (!empty($search)) {
            $activityAreas->where('label', 'like', '%' . $search . '%');
            }

            return DataTables::of($activityAreas)

                ->addColumn('Secteur d\'activité' , function ($activityArea) {
                    return $activityArea->label ?? '-';
                })

                ->addColumn('action', function ($activityArea) {
                    return '
                        <div class="dropdown"  style="text-align: right;margin-right: 20px;">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewDetails(' . $activityArea->id . ')">
                                         '. __("generated.Détails") 
                                        .'
                                    </a>
                                </li>
                                 <li>
                                    <a class="dropdown-item  edit-btn" id="edit-btn" href="javascript:void(0)" data-id="' . $activityArea->id . '">
                                        '.__("generated.Modifier").'
                                    </a>

                                  </li>
                                 <li>
                                     <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)"
                                    onclick="deleteArea(' . $activityArea->id . ')">
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
    public function store(ActivityAreaRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            $activityAreaData = $request->validated();

            $activityArea = ActivityArea::create($activityAreaData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __("generated.Secteur d’activité ajouté avec succès."),
                'data' => new ActivityAreaResource($activityArea),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__("generated.Erreur lors de l\'ajout de secteur d\'activité : ") . $e->getMessage());
            return $this->errorResponse(__("generated.Erreur lors de l\'ajout de secteur d\'activité : "));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityArea $activityArea)
    {
        try {
            // The $activityArea is already the model instance, no need to find it again
            return response()->json([
                __('generated.Secteur d\'activité') => __($activityArea->label), // Use the model's properties directly
            ], 200);
        } catch (\Exception $e) {
            Log::error(__("generated.Erreur lors de la récupération du secteur d\'activité : ") . $e->getMessage());
            return response()->json([
                'message' => __("generated.Erreur lors de la récupération du secteur d\'activité : ")
            ], 500); // Return 500 status code for server error
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityArea $activityArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'activityArea' => 'required|string|max:255',
        // ]);

        $activityArea = ActivityArea::find($id);

        if (!$activityArea) {
            return response()->json(['message' => __("generated.Secteur non trouvé.")], 404);
        }

        $activityArea->update([
            'label' => $request->input('label')
        ]);

        return response()->json([
            'message' => __("generated.Secteur mis à jour avec succès"),
            'data' => $activityArea
        ]);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $AAToDelete = ActivityArea::find($id);
            $AAToDelete->delete();
        } catch (\Exception $e) {
            Log::error(__("generated.Erreur lors de la suppression de secteur d\'activité : ") . $e->getMessage());
            return $this->errorResponse(__("generated.Erreur lors de la suppression de secteur d\'activité."));
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
