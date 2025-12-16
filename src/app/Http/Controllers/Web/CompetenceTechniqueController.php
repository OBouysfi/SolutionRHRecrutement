<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SkillType;
use App\Models\Skill;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompetenceTechniqueExport;



class CompetenceTechniqueController extends Controller
{
    protected $skill_technique;

    public function __construct(SkillType $skill_technique)
    {
        $this->skill_technique = $skill_technique;
        $this->middleware('permission:competence-technique-access')->only(['listing']);
    }

    public function listing()
    {
        $skillTypes = SkillType::where('parent_id', 1)->get(); 

        return view('setting.competenceTechnique.listing',compact('skillTypes'));
    }

    public function edit($id)
    {
        $skill_technique = Skill::find($id);

        if (!$skill_technique) {
            return response()->json(['error' => 'competence technique non trouvé.'], 404);
        }

        return response()->json($skill_technique);
    }

    public function exportcomptech(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new CompetenceTechniqueExport, 'competence_technique.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new CompetenceTechniqueExport, 'competence_technique.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}
