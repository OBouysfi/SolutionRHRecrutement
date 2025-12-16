<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\newPredictiveModelCreated;
use App\Models\Company;
use App\Models\PredictiveModel;
use App\Services\PersonalityTestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
class PersonalityTestController extends Controller
{
    public $personalityTestService;

    // constructor
    public function __construct( PersonalityTestService $personalityTestService )
    {

        $this->personalityTestService = $personalityTestService;
        $this->middleware('permission:contact-test-personnelle-create')->only(['inviteCondidats']);
        $this->middleware('permission:contact-test-personnelle-listing')->only(['listingCondidats']);
        $this->middleware('permission:modele-predictif-create')->only(['createPredictiveModel']);
        $this->middleware('permission:modele-predictif-listing')->only(['listingPredictiveModels']); 
        
    }


    // listingPredictiveModels
    public function listingPredictiveModels(Request $request)
    {
        $predictiveModels = $this->personalityTestService->getPredictiveModels();

        return DataTables::of($predictiveModels)
                ->addColumn('label', function ($model) {
                    return $model['label']; // Adjust according to the API response structure
                })
                ->addColumn('status', function ($model) {
                    return $model['status']; // Adjust according to the API response structure
                })
                ->make(true);

    }

    // listingCondidats
    public function listingCondidats(Request $request)
    {

        $candidates = $this->personalityTestService->listingCandidate( $request );

        return $candidates;
    }


    // create PredictiveModel
    public function createPredictiveModel( Request $request )
    {
        try {

            $request->validate([
                'label' => 'required',
                'data' => 'required',
                'profession' => 'required',
            ]);

            // get auth user
            $user = auth()->user();
            // get first company
            $company = Company::first();
            $company_name = $company ? $company->business_name : 'No Company';
            $company_id = $company ? $company->id : null;

            $label = $request->label ;
            $data = $request->data;
            $profession = $request->profession;

            $predictiveModel = PredictiveModel::create([
                'label' => $label,
                'data' => $data,
                'profession' => $profession,
                'company_id' => $company_id,
                'user_id' => $user->id,
            ]);


            // Envoyer l'email
            Mail::to(explode(',', 'support@humanjobs.ma'))
                ->send(new newPredictiveModelCreated(  $label, $profession, $company_name , $predictiveModel->id ,  $data ));

            return response()->json([
                'message' => 'Predictive Model created successfully',
                'data' => $predictiveModel
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    // VALIDATE PredictiveModel
    public function validatePredictiveModel( Request $request )
    {
        try {

            $request->validate([
                'predictiveModelId' => 'required',
            ]);

            $predictiveModel = PredictiveModel::find($request->predictiveModelId);

            if (!$predictiveModel) {
                return response()->json([
                    'message' => 'Predictive Model not found',
                ], 404);
            }
            $result = $this->personalityTestService->validatePredictiveModel( $predictiveModel );


            // call route
            return route('personalityTest.predictiveModel.listing');

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


    // inviteCondidats
    public function inviteCondidats(Request $request)
    {
        try {

            $request->validate([
                'collaborators' => 'required|array',
            ],[
                'collaborators.required' => __('generated.Veuillez fournir une liste de collaborateurs'),
            ]);

            $result = $this->personalityTestService->inviteCondidats($request->all());

            return response()->json([
                'message' => __('generated.Candidats ont invité avec succès'),
                'data' => $result
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => __('generated.Erreur lors de linvitation des candidats'),
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    // get Condidat matching with predictive model
    public function getCondidatMatchingWithPredictiveModels(Request $request)
    {
        $request->validate([
            'candidate_token' => 'required|string',
        ]);

        $result = $this->personalityTestService->getCondidatMatchingWithPredictiveModels($request->candidate_token);

        return response()->json([
            'predictiveModels' => $result['predictiveModels'],
            'data' => $result['data']
        ], 200);
    }

}