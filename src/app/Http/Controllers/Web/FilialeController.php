<?php

namespace App\Http\Controllers\Web;

use App\Models\Filiale;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FilialeExport;


class FilialeController extends Controller
{
    protected $filiale;

    public function __construct(Filiale $filiale)
    {
        $this->filiale = $filiale;
        $this->middleware('permission:filiale-access')->only(['listing']);
    }

    public function listing(){
        
        $cities = City::All();  
        return view('setting.filiale.listing',compact('cities'));
    }

    public function edit($id)
    {
        $filiale = Filiale::find($id);

        if (!$filiale) {
            return response()->json(['error' => 'Filiale non trouvé.'], 404);
        }

        return response()->json($filiale);
    }

    public function exportfiliale(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new FilialeExport, 'Filiale.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new FilialeExport, 'Filiale.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}  