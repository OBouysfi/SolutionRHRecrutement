<?php

namespace App\Http\Controllers\Web;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Evaluator;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Models\EvaluationType;
use App\Http\Controllers\Controller;
use App\Enums\Evaluator\EvaluationTypesEnum;
use App\Http\Resources\Evaluator\EvaluatorResource;

class EvaluateursController extends Controller
{
    protected $evaluator;

    public function __construct(Evaluator $evaluator)
    {
        $this->evaluator = $evaluator;
        $this->middleware('permission:evaluateurs-access')->only(['create']);
    }

    // Show a data of evaluator
    public function view(int $id)
    {
        $evaluator = new EvaluatorResource(Evaluator::find($id));
        return view('evaluator.view', compact('evaluator'));
    }
    public function edit(int $id)
    {
        $evaluator = Evaluator::find($id);
        $cities = City::get();
        $countries = Country::get();
        $professions = Profession::orderBy('label', 'asc')->get();
        $types_evaluations = EvaluationType::get();

        return view('evaluator.edit', compact('evaluator', 'cities', 'countries', 'professions', 'types_evaluations'));
    }

    public function listing(){

        return view('evaluator.listing');

    }

    public function create()
    {
      
        $company = Company::first();
        $cities = City::get();
        $countries = Country::get();
        $professions = Profession::orderBy('label', 'asc')->get();
        $types_evaluations = EvaluationType::get();

        return view('evaluator.create', compact('company', 'cities', 'countries', 'professions', 'types_evaluations'));
    }
}
