<?php

namespace App\Http\Controllers\Web;

use App\Enums\Client\JuridicalFormEnum;
use App\Enums\Client\TaxRegimeEnum;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\DiplomaOption;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DiplomaOptionExport;

class DiplomaOptionsController extends Controller
{
    protected $diplomaOption;

    public function __construct(DiplomaOption $diplomaOption)
    {
        $this->diplomaOption = $diplomaOption;
        $this->middleware('permission:diplomaoption-access')->only(['listing']);
    }

    public function listing()
    {
        return view('setting.diplomaoption.listing');
    }

    public function edit($id)
    {
        $diplomaOption = DiplomaOption::find($id);

        if (!$diplomaOption) {
            return response()->json(['error' => 'Options du diplome non trouvé.'], 404);
        }

        return response()->json($diplomaOption);
    }
    public function exportExcel(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new DiplomaOptionExport, 'diplomaOption.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new DiplomaOptionExport, 'diplomaOption.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }

}