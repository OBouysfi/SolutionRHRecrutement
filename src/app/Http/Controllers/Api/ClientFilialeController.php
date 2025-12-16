<?php

namespace App\Http\Controllers\Api;

use App\Models\ClientFiliale;
use App\Models\Evaluator;
use App\Models\EvaluatorTypeCoefficent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\Client\ClientFilialeRequest;
use App\Http\Resources\Client\ClientFilialeResource;

class ClientFilialeController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientFilialeRequest $request)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $filialeData = [];
            foreach ($validated['name'] as $index => $filialeName) {
                $filialeName = $filialeName ?? 'filialeName';

                // Handle logo upload
                // $logo = null;
                // if ($request->hasFile('logo')) {
                //     $imageName = time() . '.' . $request->logo->extension();
                //     $request->logo->move(public_path('img'), $imageName);
                //     $logo = 'img/' . $imageName;
                // }

                // Create client with validated data

                // Prepare the filiale data for insertion
                $filialeData = [
                    'name' => $filialeName,
                    'client_id' => $validated['client_id'], // Assuming `client_id` array aligns with `name`
                    // 'logo' => $logo,
                    // Add other fields like country_id, city_id, etc., as necessary
                    'city_id' => isset($validated['city_id'][$index]) ? $validated['city_id'][$index] : null,
                    'juridical_form' => isset($validated['juridical_form'][$index]) ? $validated['juridical_form'][$index] : null,
                    'tax_regime' => isset($validated['tax_regime'][$index]) ? $validated['tax_regime'][$index] : null,
                    'workforce' => isset($validated['workforce'][$index]) ? $validated['workforce'][$index] : null,
                    'activity' => isset($validated['activity'][$index]) ? $validated['activity'][$index] : null,
                    'adresse' => isset($validated['adresse'][$index]) ? $validated['adresse'][$index] : null,
                    'code_postal' => isset($validated['code_postal'][$index]) ? $validated['code_postal'][$index] : null,
                ];
                // $clientData['logo'] = $logo;
                $filiale = ClientFiliale::create($filialeData);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Client ajouté avec succès.',
                'data' => new ClientFilialeResource($filiale),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de client.');
        }
    }


    public function update(ClientFilialeRequest $request)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();

            $filialeData = [];
            foreach ($validated['filiale_id'] as $index => $filialeId) {


                // Prepare the filiale data for insertion
                $filialaeId = $validated['filiale_id'][$index] ?? null;
                $filialeData = [
                    'name' => $validated['name'][$index] ?? null,
                    'client_id' => $validated['client_id'], // Assuming `client_id` array aligns with `name`
                    'city_id' => isset($validated['city_id'][$index]) ? $validated['city_id'][$index] : null,
                    'juridical_form' => isset($validated['juridical_form'][$index]) ? $validated['juridical_form'][$index] : null,
                    'tax_regime' => isset($validated['tax_regime'][$index]) ? $validated['tax_regime'][$index] : null,
                    'workforce' => isset($validated['workforce'][$index]) ? $validated['workforce'][$index] : null,
                    'activity' => isset($validated['activity'][$index]) ? $validated['activity'][$index] : null,
                    'adresse' => isset($validated['adresse'][$index]) ? $validated['adresse'][$index] : null,
                    'code_postal' => isset($validated['code_postal'][$index]) ? $validated['code_postal'][$index] : null,
                ];

                if(!empty($filialaeId)){
                    $filiale = ClientFiliale::findOrFail($filialaeId);
                    $filiale->update($filialeData);
                }
                elseif(empty($filialaeId) && $filialeData['name']){
                    $filiale = ClientFiliale::create($filialeData);
                }
                else{
                    return;
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Client ajouté avec succès.',
                'data' => new ClientFilialeResource($filiale),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de client.');
        }
    }


    public function destroy(int $filialeId){
        try {

            DB::beginTransaction();
            $filiale = ClientFiliale::findOrFail($filialeId);
            $filiale->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Filiale supprimé avec succès.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la suppression de la filiale : ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Erreur lors de la suppression de la filiale.',
            ], 500);
        }

    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    private function errorResponse(string $message, int $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}
