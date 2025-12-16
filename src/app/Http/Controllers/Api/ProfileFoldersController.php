<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TalentFolderRequest;
use App\Models\TalentFolder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\{Request, JsonResponse};
use Yajra\DataTables\Facades\DataTables;


class ProfileFoldersController extends Controller
{
    protected $talentFolder;

    public function __construct(TalentFolder $talentFolder) {

        $this->talentFolder = $talentFolder;

        $this->middleware('permission:vivierTalent-dossier-create')->only(['store']);

    }
    public function index(Request $request)
    {
        $folder = TalentFolder::query(); 

        if ($request->ajax()) {
            $search = $request->get('search');
            
            // Apply search filter to name or parent name
            if (!empty($search)) {
                $folder->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('parent', function ($q2) use ($search) {
                        $q2->where('name', 'like', '%' . $search . '%');
                    });
                });
            }
            return DataTables::of($folder)
                ->addColumn('name', fn($folder) => $folder->name ?: ' - ')
                ->addColumn('parent', fn($folder) => $folder->parent->name ?? ' - ')
                ->addColumn('action', function ($folder) {
                    return '
                        <div class="dropdown " style="text-align: right;margin-right: 20px;>
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item edit-btn" href="javascript:void(0)" data-id="' . $folder->id . '">
                                        '.__("generated.Modifier").'
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger delete-btn" href="javascript:void(0)" onclick="deletefolder(' . $folder->id . ')">
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
            'data' => $folder->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TalentFolderRequest $request)
    {
        try {
            $folder = new TalentFolder();
            $folder->name = $request->name;
            $folder->parent_id = $request->parent_id;
            $folder->save();

            return response()->json([
                'status' => 'success',
                'message' => __('generated.Dossier de profil supprimée avec succès.'),
                'data' => new ProfileResource($folder),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error(__('generated.Erreur lors de l’ajout de la Dossier de profil'), [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => __('Une erreur s’est produite lors de l’ajout de la Dossier de profil.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $folder = TalentFolder::findOrFail($id);
            $folder->delete();
            return response()->json(['message' => __('generated.Dossier de profil supprimée avec succès.')], 200);
        } catch (\Exception $e) {
            Log::error( __('Erreur lors de la suppression de la Dossier de profil :') . $e->getMessage());
            return response()->json(['message' => __('generated.Erreur lors de la suppression de la Dossier.')], 500);
        }
    }


    public function show($id)
    {
        try {
            $folder = TalentFolder::findOrFail($id);

            return response()->json([
                'name' => $folder->name,
                'parent_id' =>  $folder->parent_id,
            ], 200);
        } catch (\Exception $e) {
            Log::error( __('generated.Erreur lors de la récupération de la Dossier de profil :') . $e->getMessage());
            return response()->json([
                'message' => __('generated.Erreur lors de la récupération de la Dossier de profil.')
            ], 500);
        }
    }

    public function update(TalentFolderRequest $request, $id)
    {

        $folder = TalentFolder::find($id);

        if (!$folder) {
            return response()->json(['message' => __('generated.Dossier non trouvé.')], 404);
        }

        $folder->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id')
        ]);

        return response()->json([
            'message' => __('generated.Dossier mis à jour avec succès'),
            'data' => $folder
        ]);
    }
}
