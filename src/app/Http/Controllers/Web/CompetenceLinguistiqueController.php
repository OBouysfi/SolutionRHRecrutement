<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SkillType;
use App\Models\Skill;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompetenceLinguistiqueExport;


class CompetenceLinguistiqueController extends Controller
{
    protected $skill_linguistique;

    public function __construct(SkillType $skill_linguistique)
    {
        $this->skill_linguistique = $skill_linguistique;
        $this->middleware('permission:competence-linguistique-access')->only(['listing']);
    }

    public function listing()
    {
        $skillTypes = SkillType::where('parent_id', 3)->get(); 

        return view('setting.competenceLinguistique.listing',compact('skillTypes'));

    }

    public function edit($id)
    {
        $skill_linguistique = Skill::find($id);

        if (!$skill_linguistique) {
            return response()->json(['error' => 'competence Linguistique non trouvé.'], 404);
        }

        return response()->json($skill_linguistique);
    }
    
    public function exportcomplang(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new CompetenceLinguistiqueExport, 'competence_linguistique.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new CompetenceLinguistiqueExport, 'competence_linguistique.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}
