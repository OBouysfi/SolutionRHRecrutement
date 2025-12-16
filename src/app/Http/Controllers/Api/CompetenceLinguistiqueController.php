<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\CompetenceLinguistiqueRequest;
use App\Http\Resources\CompetenceLinguistiqueResource;
use Yajra\DataTables\Facades\DataTables;




class CompetenceLinguistiqueController extends Controller
{   
    public function index(Request $request)
    {
        $idskilltype = SkillType::where('parent_id',3 )->pluck('id'); 
    
        $skill_linguistique = Skill::whereIn('skill_type_id', $idskilltype)
            ->select('id', 'label', 'skill_type_id')
            ->with('skillType');
    
        if ($request->ajax()) {

            $search = $request->get('search');

            // Filter table data by search input
            if (!empty($search)) {
               $skill_linguistique->where(function ($query) use ($search) {
                $query->where('label', 'like', '%' . $search . '%')
                        ->orWhereHas('skillType', function ($q) use ($search) {
                            $q->where('label', 'like', '%' . $search . '%');
                        });
                    });
            }
            return DataTables::of($skill_linguistique) 
                ->addColumn('linguistique', fn($skill_linguistique) => __($skill_linguistique->label) ?: ' - ')
                ->addColumn('category', fn($skill) => __($skill->skillType->label) ?? ' - ') 
                ->addColumn('action', function ($skill_linguistique) {
                    return '
                        <div class="dropdown" style="text-align: right;margin-right: 20px;">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewlang(' . $skill_linguistique->id . ')">
                                        '. __("generated.Détails") 
                                        .'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item edit-btn" href="javascript:void(0)" data-id="' . $skill_linguistique->id . '">
                                       '.__("generated.Modifier").'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" onclick="deletelang(' . $skill_linguistique->id . ')">
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
            'data' => $skill_linguistique->get() 
        ]);
    }

    public function store(CompetenceLinguistiqueRequest $request)
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
                'message' => __('generated.Compétence Linguistique ajoutée avec succès.'),
                'data' => new CompetenceLinguistiqueResource($skill),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
    
            Log::error('Erreur lors de l\'ajout de la compétence linguistique', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return response()->json([
                'status' => 'error',
                'message' => __('generated.Une erreur s’est produite lors de l’ajout de la compétence linguistique.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
       

        $skill_linguistique = Skill::find($id);

        if (!$skill_linguistique) {
            return response()->json(['message' => __('generated.Compétence non trouvé.')], 404);
        }

        $skill_linguistique->update([
            'label' => $request->input('label'),
            'skill_type_id' => $request->input('skill_type_id')
        ]);

        return response()->json([
            'message' => __('generated.Compétence  mis à jour avec succès'),
            'data' => $skill_linguistique
        ]);
    }
    

    public function destroy($id)
    {
        try {
            $skill_linguistique = Skill::findOrFail($id); 
            $skill_linguistique->delete();
            return response()->json(['message' => __('generated.Compétence linguistique supprimée avec succès.')], 200);
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la suppression de la compétence linguistique.') . $e->getMessage());
            return response()->json(['message' => __('generated.Erreur lors de la suppression de la compétence linguistique.')], 500);
        }
    }

    public function show($id)
    {
        try {
            $skill_linguistique = Skill::with('skillType')->findOrFail($id);
    
            return response()->json([
                'label' => $skill_linguistique->label, 
                'show_skill_type_id' =>  __($skill_linguistique->skillType->label) ?? ' - ',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la récupération de la compétence linguistique.') . $e->getMessage());
            return response()->json([
                'message' => __('generated.Erreur lors de la récupération de la compétence linguistique.')
            ], 500);
        }
    }
    
   
    
    
    
    
    
}
