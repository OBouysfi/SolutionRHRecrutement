<?php

namespace App\Http\Controllers\Web;

use App\Enums\Client\JuridicalFormEnum;
use App\Enums\Client\TaxRegimeEnum;
use App\Http\Controllers\Controller;
use App\Models\ActivityArea;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivityAreaExport;

class ActivityAreaController extends Controller
{
    protected $activityArea;

    public function __construct(ActivityArea $activityArea)
    {
        $this->activityArea = $activityArea;
        $this->middleware('permission:activityArea-access')->only(['listing']);
    }

    public function listing()
    {
        return view('setting.activityArea.listing');
    }

    public function edit($id)
    {
        $activityArea = ActivityArea::find($id);

        if (!$activityArea) {
            return response()->json(['error' => 'Secteur non trouvé.'], 404);
        }

        return response()->json($activityArea);
    }

    public function exportactivityArea(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new ActivityAreaExport, 'Secteurs_d\'activité.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new ActivityAreaExport, 'Secteurs_d\'activité.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }

}
