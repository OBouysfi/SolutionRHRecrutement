<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Api;
use App\Models\ApiEndpoint;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ApiRequest;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;

class ApiIntegrationController extends Controller
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
        $this->middleware('permission:intégration-(API)-access')->only(['index']);
    }
    
    public function index()
    {
        $apis = Api::with('endpoints')->get();
        return view('setting.apis.index', compact('apis'));
    }

    public function show($id)
    {
        $api = Api::with('endpoints')->findOrFail($id);
        return view('setting.apis.detail', compact('api'));
    }

    public function toggleStatus(Request $request)
    {
        $api = Api::findOrFail($request->api_id);
        $api->status = !$api->status;
        $api->save();

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès !',
            'status' => $api->status,
        ]);
    }

    public function store(ApiRequest $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('apis', 'public');
            }

            $api = Api::create([
                'name' => $request->name,
                'system_name' => $request->system_name,
                'type' => $request->type,
                'connection_port' => $request->connection_port,
                'protocol' => $request->protocol,
                'access_identifier' => $request->access_identifier,
                'access_password' => bcrypt($request->access_password),
                'api_token' => $request->api_token,
                'status' => 1,
                'image_path' => $imagePath ? 'storage/' . $imagePath : null,
            ]);

            return new ApiResource($api);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue.'], 500);
        }
    }

    public function detail($apiKey)
    {
        $api = Api::with('endpoints')->where('api_key', $apiKey)->firstOrFail();

        if (!$api->status) {
            abort(403, 'Accès refusé : Cette API est désactivée.');
        }

        return view('setting.apis.detail', compact('api'));
    }

}
