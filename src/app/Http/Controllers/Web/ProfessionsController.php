<?php

namespace App\Http\Controllers\Web;

use App\Enums\Client\JuridicalFormEnum;
use App\Enums\Client\TaxRegimeEnum;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Profession;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProfessionsExport;

class ProfessionsController extends Controller
{
    protected $profession;

    public function __construct(Profession $profession)
    {
        $this->profession = $profession;
        $this->middleware('permission:profession-access')->only(['listing']);
    }

    public function listing()
    {
        return view('setting.profession.listing');
    }
    public function edit($id)
    {
        $profession = Profession::find($id);

        if (!$profession) {
            return response()->json(['error' => 'Métier non trouvé.'], 404);
        }

        return response()->json($profession);
    }
    public function exportprofession(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new ProfessionsExport, 'Métiers_postes.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new ProfessionsExport, 'Métiers_postes.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}