<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\CompetenceTechniqueRequest;
use App\Http\Resources\CompetenceTechniqueResource;
use Yajra\DataTables\Facades\DataTables;




class CompetenceTechniqueController extends Controller
{   
    public function index(Request $request)
    {
        $idskilltype = SkillType::where('parent_id', 1)->pluck('id'); 
    
        $skill_technique = Skill::whereIn('skill_type_id', $idskilltype)
            ->select('id', 'label', 'skill_type_id')
            ->with('skillType');
        if ($request->ajax()) {

            $search = $request->get('search');

            // Filter table data by search input
            if (!empty($search)) {
               $skill_technique->where(function ($query) use ($search) {
                $query->where('label', 'like', '%' . $search . '%')
                        ->orWhereHas('skillType', function ($q) use ($search) {
                            $q->where('label', 'like', '%' . $search . '%');
                        });
                    });
            }
            return DataTables::of($skill_technique) 
                ->addColumn('technique', fn($skill_technique) => __($skill_technique->label) ?: ' - ')
                ->addColumn('category', fn($skill) => __($skill->skillType->label) ?? ' - ') 
                ->addColumn('action', function ($skill_technique) {
                    return '
                        <div class="dropdown"  style="text-align: right;margin-right: 20px;">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewtech(' . $skill_technique->id . ')">
                                         '. __("generated.Détails") 
                                        .'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item edit-btn" href="javascript:void(0)" data-id="' . $skill_technique->id . '">
                                       '.__("generated.Modifier").'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" onclick="deletetech(' . $skill_technique->id . ')">
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
            'data' => $skill_technique->get() 
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceTechniqueRequest $request)
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
                'message' => __('generated.Compétence Technique ajoutée avec succès.'),
                'data' => new CompetenceTechniqueResource($skill),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
    
            Log::error( __('generated.Erreur lors de l’ajout de la compétence technique'), [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return response()->json([
                'status' => 'error',
                'message' => __('generated.Une erreur s’est produite lors de l’ajout de la compétence technique.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $skill_technique = Skill::findOrFail($id); 
            $skill_technique->delete();
            return response()->json(['message' => __('generated.Compétence Technique supprimée avec succès.')], 200);
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la suppression de la compétence Technique :') . $e->getMessage());
            return response()->json(['message' => __('generated.Erreur lors de la suppression de la compétence linguistique.')], 500);
        }
    }


    public function show($id)
    {
        try {
            $skill_technique = Skill::with('skillType')->findOrFail($id);
    
            return response()->json([
                'label' => __($skill_technique->label), 
                'view_skill_type_id' =>  $skill_technique->skillType->label ?? ' - ',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la récupération de la compétence Technique.') . $e->getMessage());
            return response()->json([
                'message' => __('generated.Erreur lors de la récupération de la compétence Technique.')
            ], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
       

        $skill_technique = Skill::find($id);

        if (!$skill_technique) {
            return response()->json(['message' => __('generated.Compétence non trouvé.')], 404);
        }

        $skill_technique->update([
            'label' => $request->input('label'),
            'skill_type_id' => $request->input('skill_type_id')
        ]);

        return response()->json([
            'message' => __('generated.Compétence  mis à jour avec succès'),
            'data' => $skill_technique
        ]);
    }
}
