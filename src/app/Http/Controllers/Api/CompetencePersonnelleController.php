<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\CompetencePersonnelleRequest;
use App\Http\Resources\CompetencePersonnelleResource;
use Yajra\DataTables\Facades\DataTables;


class CompetencePersonnelleController extends Controller
{   
    public function index(Request $request)
    {
        $idskilltype = SkillType::where('parent_id', 2)->pluck('id'); 
    
        $skill_personnelle = Skill::whereIn('skill_type_id', $idskilltype)
            ->select('id', 'label', 'skill_type_id')
            ->with('skillType');
    
        if ($request->ajax()) {
            $search = $request->get('search');
            
            // Filter table data by search input
            if (!empty($search)) {
                if (!is_array($search)) {
                    $search = preg_split('/\s+/', trim($search));
                }

                $search = array_filter($search, fn($term) => !empty($term));

                $skill_personnelle->where(function ($query) use ($search) {
                    foreach ($search as $term) {
                        $query->orWhere('label', 'like', '%' . $term . '%')
                            ->orWhereHas('skillType', function ($q) use ($term) {
                                $q->where('label', 'like', '%' . $term . '%');
                            });
                    }
                });
            }
            return DataTables::of($skill_personnelle) 
                ->addColumn('personnelle', fn($skill_personnelle) => __($skill_personnelle->label) ?: ' - ')
                ->addColumn('category', fn($skill) => __($skill->skillType->label) ?? ' - ') 
                ->addColumn('action', function ($skill_personnelle) {
                    return '
                        <div class="dropdown" style="text-align: right;margin-right: 20px;">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewperso(' . $skill_personnelle->id . ')">
                                        '. __("generated.Détails") 
                                        .'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item edit-btn" href="javascript:void(0)" data-id="' . $skill_personnelle->id . '">
                                        '.__("generated.Modifier").'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" onclick="deleteperso(' . $skill_personnelle->id . ')">
                                        '.__("generated.Supprimer").'
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
            'data' => $skill_personnelle->get() 
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(CompetencePersonnelleRequest $request)
    {
        try {
            DB::beginTransaction();
    
            Log::info('Incoming Data:', $request->all());
    
            $validatedData = $request->validated();
    
            // Vérifier si l'utilisateur a sélectionné un skill_type_id, sinon garder la valeur par défaut
            $validatedData['skill_type_id'] = $validatedData['skill_type_id'] ?? null;
    
            // Créer la compétence avec le skill_type_id sélectionné (ou null si non fourni)
            $skill = Skill::create($validatedData);
    
            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'message' => __('generated.Compétence Personnelle ajoutée avec succès.'),
                'data' => new CompetencePersonnelleResource($skill),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
    
            Log::error( __('generated.Erreur lors de l’ajout de la compétence Personnelle'), [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return response()->json([
                'status' => 'error',
                'message' => __('generated.Une erreur s’est produite lors de l’ajout de la compétence Personnelle.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function destroy($id)
    {
        try {
            $skill_personnelle = Skill::findOrFail($id); 
            $skill_personnelle->delete();
            return response()->json(['message' => __('generated.Compétence Personnelle supprimée avec succès.')], 200);
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la suppression de la compétence Personnelle.') . $e->getMessage());
            return response()->json(['message' => __('generated.Erreur lors de la suppression de la compétence Personnelle.')], 500);
        }
    }

    public function show($id)
    {
        try {
            $skill_personnelle = Skill::with('skillType')->findOrFail($id);
    
            return response()->json([
                'label' => __($skill_personnelle->label), 
                'perso_skill_type_id' =>  $skill_personnelle->skillType->label ?? ' - ',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la récupération de la compétence Personnelle.') . $e->getMessage());
            return response()->json([
                'message' => __('generated.Erreur lors de la récupération de la compétence Personnelle.')
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
       

        $skill_personnelle = Skill::find($id);

        if (!$skill_personnelle) {
            return response()->json(['message' => ' Compétence non trouvé.'], 404);
        }

        $skill_personnelle->update([
            'label' => $request->input('label'),
            'skill_type_id' => $request->input('skill_type_id')
        ]);

        return response()->json([
            'message' => __('generated.Compétence  mis à jour avec succès'),
            'data' => $skill_personnelle
        ]);
    }
    
    
}
