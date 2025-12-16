<?php

namespace App\Http\Controllers\Web;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CompanieController extends Controller
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
        $this->middleware('permission:companie-access')->only(['listing']);
    }

    public function listing()
    {
        $cities = City::all();
        return view('setting.companie.listing',compact('cities'));
    }
    public function edit($id)
    {
        $companie = Company::find($id);

        if (!$companie) {
            return response()->json(['error' => 'Entreprise non trouvé.'], 404);
        }

        return response()->json($companie);
    }

   
}  