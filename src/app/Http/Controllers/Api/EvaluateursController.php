<?php

namespace App\Http\Controllers\Api;

use App\Models\Evaluator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\EvaluatorTypeCoefficent;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\Evaluator\EvaluatorRequest;
use App\Http\Resources\Evaluator\EvaluatorResource;
use Yajra\DataTables\Facades\DataTables;

class EvaluateursController extends Controller
{

    //
       /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $evaluators = Evaluator::with([
                'profession'
            ]);

            if ($request->has('first_name') && $request->first_name !== 'Tous') {
                $evaluators->where('first_name', $request->first_name);
            }
            if ($request->has('last_name') && $request->last_name !== 'Tous') {
                $evaluators->where('last_name', $request->last_name);
            }

            if ($request->has('profession') && $request->profession !== 'Tous') {
                $evaluators->whereHas('profession', function ($query) use ($request) {
                    $query->where('id', $request->profession);
                });
            }


            if ($request->has('client') && $request->client !== 'Tous') {
                $evaluators->whereHas('client', function ($query) use ($request) {
                    $query->where('id', 'like', '%' . $request->client . '%');
                });
            }

            if ($request->has('company') && $request->company !== 'Tous') {
                $evaluators->whereHas('company', function ($query) use ($request) {
                    $query->where('id', 'like', '%' . $request->company . '%');
                });
            }




            return DataTables::of($evaluators)
                // 1) Logo (#)
                ->addColumn('logo', function ($evaluator) {
                    $logo = $evaluator->path_logo
                        ? asset($evaluator->path_logo)
                        : asset('assets/img/logo-entreprise/VECTORIA%20LLC.png');
                    return '<img src="' . $logo . '" alt="Logo" style="width:40px;">';
                })

                ->addColumn('client', function ($evaluator) {
                    return $evaluator->client ? $evaluator->client->name : '--';
                })

                ->addColumn('company', function ($evaluator) {
                    return $evaluator->company ? $evaluator->company->business_name : '--';
                })

                ->addColumn('profession', function ($evaluator) {
                    return $evaluator->profession ? __($evaluator->profession->label) : '--';
                })

                ->addColumn('first_name', function ($evaluator) {
                    return $evaluator->first_name;
                })
                ->addColumn('last_name', function ($evaluator) {
                    return $evaluator->last_name;
                })

                ->addColumn('action', function ($evaluator) {
                    return view('evaluator.inc.action', compact('evaluator'))->render();
                })

                // Autoriser HTML
                ->rawColumns(['logo', 'action'])

                ->make(true);
        }

        // Pas AJAX -> ...
        return response()->json(['error' => 'Invalid request'], 400);
    }

    /**
     * Display a listing of the resource for evaluators.
     */
    public function evaluator_index(Request $request)
    {
        if ($request->ajax()) {
            $evaluators = Evaluator::with(['profession', 'evaluationTypes'])
                ->whereNull('client_id');

            return DataTables::of($evaluators)
                ->addColumn('logo', function ($evaluator) {
                return '<img src="' . $evaluator->getLogoUrl() . '" alt="Logo" style="width:60px;">';
                })
                ->addColumn('first_name', function ($evaluator) {
                    return $evaluator->first_name;
                })
                ->addColumn('last_name', function ($evaluator) {
                    return $evaluator->last_name;
                })
                ->addColumn('email', function ($evaluator) {
                    return $evaluator->email;
                })
                ->addColumn('profession', function ($evaluator) {
                    return $evaluator->profession ? __($evaluator->profession->label) : '--';
                })
                ->addColumn('evaluation_types', function ($evaluator) {
                    if ($evaluator->evaluationTypes->isEmpty()) {
                        return '--';
                    }
                    return $evaluator->evaluationTypes->pluck('name')->join(', ');
                })
                ->addColumn('coefficient', function ($evaluator) {
                    $coefficients = $evaluator->typeCoefficients->map(function ($typeCoefficient) {
                        return $typeCoefficient->coefficient;
                    })->join(', ');
                    return $coefficients ?: '--';
                })
                ->addColumn('action', function ($evaluator) {
                    return view('evaluator.inc.action', compact('evaluator'))->render();
                })
                ->rawColumns(['logo', 'action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function store(EvaluatorRequest $request)
    {
    DB::beginTransaction();

    try {
        $validated = $request->validated();
        $evaluators = [];

        foreach ($validated['first_name'] as $index => $evaluatorName) {
            if (empty($evaluatorName)) {
                continue;
            }

            $path_logo = null;
            if ($request->hasFile("path_logo") && is_array($request->file("path_logo"))) {
                if (isset($request->file("path_logo")[$index])) {
                    $path_logo = $request->file("path_logo")[$index]->store('evaluators/logos', 'public');
                }
            } else {
                $path_logo = $validated['path_logo'][$index] ?? null;
            }

            $email = $validated['email'][$index] ?? null;

            //  Vérifie si l'email est déjà pris
            if ($email && User::where('email', $email)->exists()) {
                throw new \Exception("L'email $email est déjà utilisé.");
            }

            $user = User::create([
                'name' => $evaluatorName . ' ' . $validated['last_name'][$index],
                'email' => $email,
                'password' => bcrypt('defaultpassword'),
                // 'role_id' => 47
            ]);

            $evaluatorData = [
                'first_name' => $evaluatorName,
                'last_name' => $validated['last_name'][$index],
                'email' => $email,
                'client_id' => $validated['client_id'] ?? null,
                'profession_id' => $validated['profession_id'][$index],
                'company_id' => $validated['company_id'] ?? null,
                'path_logo' => $path_logo,
                'user_related_id' => $user->id,
            ];

            $evaluator = Evaluator::create($evaluatorData);
            $evaluators[] = $evaluator;

            // Coefficients
            if (!empty($validated['evaluation_type_id'][$index])) {
                foreach ($validated['evaluation_type_id'][$index] as $key => $evaluationTypeId) {
                    EvaluatorTypeCoefficent::create([
                        'evaluator_id' => $evaluator->id,
                        'evaluation_type_id' => $evaluationTypeId,
                        'coefficient' => $validated['coefficient'][$index][$key] ?? null,
                    ]);
                }
            }
        }

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Évaluateurs ajoutés avec succès.',
            'data' => EvaluatorResource::collection($evaluators),
        ], 201);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Erreur lors de l\'ajout des évaluateurs : ' . $e->getMessage());

        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(), // Pour retour plus clair
        ], 500);
    }
}


    public function update(EvaluatorRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $updatedEvaluators = [];

            // On boucle sur chaque évaluateur indépendamment
            foreach ($validated['first_name'] as $evaluatorIndex => $evaluatorName) {
                if (empty($evaluatorName)) {
                    continue;
                }

                // Gestion du fichier logo lié à cet évaluateur
                $path_logo = null;
                if ($request->hasFile("path_logo")) {
                    $files = $request->file("path_logo");
                    if (isset($files[$evaluatorIndex])) {
                        $path_logo = $files[$evaluatorIndex]->store('evaluators/logos', 'public');
                    }
                }

                // Vérification si l'évaluateur existe ou doit être créé
                $evaluatorId = $validated['evaluatorId'][$evaluatorIndex] ?? null;

                if ($evaluatorId) {
                    // Si l'évaluateur existe, on le met à jour
                    $evaluator = Evaluator::findOrFail($evaluatorId);

                    if (!$path_logo) {
                        $path_logo = $evaluator->path_logo;
                    }

                    $evaluatorData = [
                        'first_name' => $evaluatorName,
                        'last_name' => $validated['last_name'][$evaluatorIndex],
                        'email' => $validated['email'][$evaluatorIndex],
                        'client_id' => $validated['client_id'] ?? null,
                        'profession_id' => $validated['profession_id'][$evaluatorIndex],
                        'company_id' => $validated['company_id'] ?? null,
                        'path_logo' => $path_logo,
                    ];

                    $evaluator->update($evaluatorData);
                } else {
                    // Sinon, on crée un nouvel évaluateur
                    $evaluatorData = [
                        'first_name' => $evaluatorName,
                        'last_name' => $validated['last_name'][$evaluatorIndex],
                        'email' => $validated['email'][$evaluatorIndex],
                        'client_id' => $validated['client_id'] ?? null,
                        'profession_id' => $validated['profession_id'][$evaluatorIndex],
                        'company_id' => $validated['company_id'] ?? null,
                        'path_logo' => $path_logo ?? ($validated['path_logo'][$evaluatorIndex] ?? null),
                    ];

                    $evaluator = Evaluator::create($evaluatorData);
                }

                $updatedEvaluators[] = $evaluator;

                // **Isoler correctement les coefficients du type pour cet évaluateur**
                if (!empty($validated['evaluation_type_id'][$evaluatorIndex])) {
                    // Récupération pour *cet* évaluateur uniquement
                    $evaluationTypeIds = $validated['evaluation_type_id'][$evaluatorIndex];
                    $coefficients = $validated['coefficient'][$evaluatorIndex];

                    // Supprimer les coefficients existants pour l'évaluateur
                    EvaluatorTypeCoefficent::where('evaluator_id', $evaluator->id)->delete();

                    // Associer chaque type d'évaluation et son coefficient
                    foreach ($evaluationTypeIds as $key => $evaluationTypeId) {
                        EvaluatorTypeCoefficent::create([
                            'evaluator_id' => $evaluator->id,
                            'evaluation_type_id' => $evaluationTypeId,
                            'coefficient' => $coefficients[$key] ?? null, // Alignement par indice dans l'array imbriqué
                        ]);
                    }
                }
            }

            DB::commit();

            // Réponse après succès
            return response()->json([
                'status' => 'success',
                'message' => 'Les évaluateurs ont été mis à jour avec succès.',
                'data' => EvaluatorResource::collection($updatedEvaluators),
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la mise à jour des évaluateurs : ' . $e->getMessage());

            // Réponse en cas d'erreur
            return response()->json([
                'status' => 'error',
                'message' => 'Erreur lors de la mise à jour des évaluateurs.',
            ], 500);
        }
    }





    public function deleteEvaluator($evaluatorId)
    {

        try {

            DB::beginTransaction();
            $evaluator = Evaluator::findOrFail($evaluatorId);
            EvaluatorTypeCoefficent::where('evaluator_id', $evaluatorId)->delete();
            $evaluator->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Évaluateur supprimé avec succès.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la suppression de l\'évaluateur : ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Erreur lors de la suppression de l\'évaluateur.',
            ], 500);
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
