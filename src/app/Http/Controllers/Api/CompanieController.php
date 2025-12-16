<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\CompanyResource; 
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;


class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $company = Company::select('id', 'path_logo', 'business_name', 'address', 'postal_code', 'city_id');
           
        if ($request->ajax()) {
            return DataTables::of($company)
                 ->addColumn('picture', function ($company) {
                    return '<img src="' . $company->getLogoUrl() . '" alt="Picture" width="50px" style="max-width: none;">';
                })
                ->addColumn('business_name', fn($company) => $company->business_name ?? ' - ')
                ->addColumn('address', fn($company) => $company->address ?? ' - ')
                ->addColumn('postal_code', fn($company) => $company->postal_code ?? ' - ')
                ->addColumn('ville', fn($company) => $company->city ? __($company->city->name) : ' - ')
                ->addColumn('action', function ($company) {
                    return '
                        <div class="dropdown text-center">
                            <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots" style="font-size: 19px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item edit-btn" data-id="' . $company->id . '" href="javascript:void(0)">
                                        '.__("generated.Modifier").'
                                    </a>
                                </li>
                            </ul>
                        </div>
                    ';
                })
                ->rawColumns(['action','picture']) 
                ->make(true); 
        }
        return response()->json([
            'status' => 'success',
            'data' => CompanyResource::collection(
                $company->with(['city'])->get() 
            ),
        ]);
    }

    public function update(CompanyRequest $request, $id)
    {
        try {
            DB::beginTransaction();
    
            $validatedData = $request->validated();
    
            $company = Company::findOrFail($id);

            if ($request->hasFile('path_logo')) {
                if ($company->path_logo) {
                    Storage::delete('public/' . $company->path_logo);
                }
            
                $path = $request->file('path_logo')->store('public/companies'); 
            
                $company->path_logo = str_replace('public/', '', $path);
            }
            
            $company->update($validatedData);
            
            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'message' => __('generated.Entreprise modifiée avec succès.'),
                'data' => new CompanyResource($company),
            ], 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
     
            return response()->json([
                'status' => 'error',
                'message' => __('generated.Erreur lors de la modification de l’entreprise.'),
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}