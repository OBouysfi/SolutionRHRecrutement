<?php

namespace App\Http\Controllers\Api;

use App\Models\ClientFiliale;
use App\Models\ClientSite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\Client\ClientSiteResource;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Requests\Client\ClientSiteRequest;

class ClientSiteController extends Controller
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
    public function store(ClientSiteRequest $request)
    {
        try {

            DB::beginTransaction();
            $validated = $request->validated();
            $siteData = [];
            foreach ($validated['site_name'] as $index => $siteName) {
                $siteData = [
                    'site_name' => $siteName,
                    'client_id' => $validated['client_id'],
                    'city_id' => $validated['city_id'][$index],
                    'address' => $validated['address'][$index],
                    'phone' => $validated['phone'][$index],
                    'email' => $validated['email'][$index],
                    'responsable_name' => $validated['responsable_name'][$index],
//                    'description' => $validated['description'][$index],
//                    'work_days_nbr' => $validated['work_days_nbr'][$index],
//                    'work_day_period' => $validated['work_day_period'][$index],
//                    'observation' => $validated['observation'][$index],
//                    'is_active' => isset($validated['is_active'][$index]) ? $validated['is_active'][$index] : null,
                ];
                $site = ClientSite::create($siteData);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Client Site ajouté avec succès.',
                'data' => new ClientSiteResource($site),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de site client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de site client.');
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ClientSiteRequest $request)
    {
        //
        DB::beginTransaction();
        $validated = $request->validated();

        $siteData = [];
        foreach ($validated['site_name'] as $index => $siteName) {
            if(empty($validated['site_name'][$index])){
                continue;
            }

            $siteId = $validated['site_id'][$index] ?? null;
            $siteData = [
                'site_name' => $validated['site_name'][$index],
                'client_id' => $validated['client_id'],
                'city_id' => $validated['city_id'][$index],
                'address' => $validated['address'][$index],
                'phone' => $validated['phone'][$index],
                'email' => $validated['email'][$index],
                'responsable_name' => $validated['responsable_name'][$index],

            ];

            if(!empty($siteId)){
                $site = ClientSite::findOrFail($siteId);
                $site->update($siteData);
            }
            else{
                $site = ClientSite::create($siteData);
            }

        }

        $site = $site ?? null;

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Client Site ajouté avec succès.',
            'data' => new ClientSiteResource($site),
        ], 201);
        try {

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de site client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de site client.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {

            DB::beginTransaction();
            $site = ClientSite::findOrFail($id);
            $site->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Site supprimé avec succès.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la suppression de site : ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Erreur lors de la suppression de site.',
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
