<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\ClientFinance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\Client\ClientFinanceRequest;
use App\Http\Resources\Client\ClientFinanceResource;

class ClientFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientFinanceRequest $request)
    {
        //
        try {
            DB::beginTransaction();
    
            // Create client with validated data
            $clientData = $request->validated();    
            $client = ClientFinance::create($clientData);
    
            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'message' => 'les données fiscales de client ajoutés avec succès.',
                'data' => new ClientFinanceResource($client),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout des données fiscales de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout des données fiscales de client.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ClientFinanceRequest $request, int $id)
    {
        try {

        //
        DB::beginTransaction();
    
        // Create client with validated data
        $clientData = $request->validated();    
        $client = ClientFinance::find($id);
        $client->update($clientData);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'les données fiscales de client modifiées avec succès.',
            'data' => new ClientFinanceResource($client),
        ], 201);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Erreur lors de la modification des données fiscales de client : ' . $e->getMessage());
        return $this->errorResponse('Erreur lors de la modiifcation des données fiscales de client.');
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientFinance $clientFinance)
    {
        //
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