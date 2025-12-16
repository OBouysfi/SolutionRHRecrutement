<?php

namespace App\Http\Controllers\Web;

use App\Models\TalentFolder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SkillType;
use App\Models\Skill;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TalentFolderExport;



class ProfileFoldersController extends Controller
{
    protected $talentFolder;

    public function __construct(TalentFolder $talentFolder)
    {
        $this->talentFolder = $talentFolder;
        $this->middleware('permission:talentFolder-access')->only(['listing']);
    }

    public function listing()
    {
        $folders = TalentFolder::get(); 
        return view('setting.talentFolders.listing',compact('folders'));
    }

    public function edit($id)
    {
        $folder = TalentFolder::find($id);

        if (!$folder) {
            return response()->json(['error' => 'competence technique non trouvé.'], 404);
        }

        return response()->json($folder);
    }

    public function export(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new TalentFolderExport, 'TalentFolder.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new TalentFolderExport, 'TalentFolder.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}
