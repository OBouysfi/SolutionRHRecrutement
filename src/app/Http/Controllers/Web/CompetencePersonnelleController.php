<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SkillType;
use App\Models\Skill;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompetencePersonnelleExport;


class CompetencePersonnelleController extends Controller
{
    protected $skill_personnelle;

    public function __construct(SkillType $skill_personnelle)
    {
        $this->skill_personnelle = $skill_personnelle;
        $this->middleware('permission:competence-personnelle-access')->only(['listing']);
    }

    public function listing()
    {
        $skillTypes = SkillType::where('parent_id', 2)->get(); 

        return view('setting.competencePersonnelle.listing',compact('skillTypes'));
    }

    public function edit($id)
    {
        $skill_personnelle = Skill::find($id);

        if (!$skill_personnelle) {
            return response()->json(['error' => 'competence personnelle non trouvé.'], 404);
        }

        return response()->json($skill_personnelle);
    }

    public function exportcomperso(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new CompetencePersonnelleExport, 'competence_personnelle.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new CompetencePersonnelleExport, 'competence_personnelle.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}
