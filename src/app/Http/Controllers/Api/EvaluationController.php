<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Evaluator\EvaluationRequest;
use App\Http\Resources\Evaluator\EvaluationResource;
use App\Models\Evaluation;
use App\Models\EvaluationType;
use App\Models\EvaluatorTypeCoefficent;
use App\Services\EvaluationService;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
           $evaluation = Evaluation::select('id', 'evaluator_id','evaluation_type_id','profile_id','mark','ponderation','evaluation');
            return DataTables::of($evaluation)
                ->addColumn('evaluation_type', function ($evaluation) {
                    return __($evaluation->evaluationType->name) ?? '-';
                })

                ->addColumn('evaluator', function ($evaluation) {
                    return $evaluation->Evaluator ? $evaluation->Evaluator->first_name . ' ' . $evaluation->Evaluator->last_name : '-';
                })

                ->addColumn('date', function ($evaluation) {
                    return $evaluation->created_at ?? '-' ;
                })

                ->addColumn('mark', function ($evaluation) {
                    return $evaluation->mark ?? '-' ;
                })

                ->addColumn('coefficient', function ($evaluation) {
                    $coefficient = EvaluationService::getCoefficient($evaluation->evaluator_id, $evaluation->evaluation_type_id);
                    $coefficient != null ? $coef = $coefficient[0]['coefficient'] : $coef = 1;
                    return $coef;
                })

                ->addColumn('ponderation', function ($evaluation) {
                    return $evaluation->ponderation ?? '-' ;
                })

                ->addColumn('appreciation', function ($evaluation) {
                    return $evaluation->evaluation ?? '-' ;
                })

                ->addColumn('action', function ($Evaluation) {
                    return '
                                                                <button class="btn btn-warning" id="editEvaluation' . $Evaluation->id . '" onClick="enableEdit(' . $Evaluation->id . ')">
                                                                <i class="bi bi-pen  light "
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Modifier"
                                                                    id="editEv' . $Evaluation->id . '"></i>
                                                                     <i class="bi bi-floppy light d-none"  data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Enregistrer"    id="saveEv' . $Evaluation->id . '"></i>
                                                                </button>

                           ';
                })

                ->rawColumns(['action'])

                // ->with([
                //     'evaluator_id' => $$evaluation->Evaluator->id,

                // ])

                ->make(true);
        }


        return response()->json(['error' => 'Invalid request'], 400);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EvaluationRequest $request)
    {
        DB::beginTransaction();

        $EvaluationData = $request->validated();

        $data = $EvaluationData;

        $coefficient = EvaluationService::getCoefficient($EvaluationData['evaluator_id'],$EvaluationData['evaluation_type_id']);

        $coefficient != null ? $ponderation = (int)$EvaluationData['mark'] * (int)$coefficient[0]['coefficient'] : $ponderation = (int)$EvaluationData['mark'];

        $data['ponderation'] = $ponderation;

        $evaluation = Evaluation::updateOrCreate(
            [
                'evaluator_id' => $data['evaluator_id'],
                'evaluation_type_id' => $data['evaluation_type_id'],
                'profile_id' => $data['profile_id']
            ],
            $data
        );


        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Evaluation ajoutée avec succés.',
            'data' => new EvaluationResource($evaluation),
        ], 201);
        try {


        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout d\'évaluation : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout d\'évaluation ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $Evaluation)
    {
        return new EvaluationResource($Evaluation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $Evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EvaluationRequest $request, Evaluation $Evaluation)
    {
        try {

            DB::beginTransaction();

            $EvaluationData = $request->validated();

            $evaluation = Evaluation::find($EvaluationData['id']);


            if (!$evaluation) {
            return response()->json(['message' => 'Evaluation non trouvé.'], 404);
            }


            $coefficient = EvaluationService::getCoefficient($EvaluationData['evaluator_id'],$EvaluationData['evaluation_type_id']);


            $coefficient != null ? $ponderation = (int)$EvaluationData['mark'] * (int)$coefficient[0]['coefficient'] : $ponderation = (int)$EvaluationData['mark'];

            $EvaluationData['ponderation'] = $ponderation;

            $evaluation->update($EvaluationData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Evaluation ajoutée avec succés.',
                'data' => new EvaluationResource($evaluation),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout d\'évaluation : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout d\'évaluation ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $Evaluation)
    {
        try {
            $EToDelete = Evaluation::find($Evaluation);
            $EToDelete->delete();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression d\'évaluation : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de la suppression d\'évaluation.');
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
