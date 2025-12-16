<?php

namespace App\Http\Controllers\Web;

use App\Models\Agency;
use App\Models\Filiale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgenceExport;

class AgenceController extends Controller
{
    protected $agency;

    public function __construct(Agency $agency)
    {
        $this->agency = $agency;
        $this->middleware('permission:agence-access')->only(['listing']);
    }

    public function listing()
    {
        $filiales = Filiale::ALL();
        return view('setting.agence.listing',compact('filiales'));
    }

    public function edit($id)
    {
        $agence = Agency::find($id);

        if (!$agence) {
            return response()->json(['error' => 'Agence non trouvé.'], 404);
        }

        return response()->json($agence);
    }


    public function exportagence(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new AgenceExport, 'Agence.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new AgenceExport, 'Agence.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}  