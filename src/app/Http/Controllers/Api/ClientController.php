<?php

namespace App\Http\Controllers\Api;

use App\Enums\Client\JuridicalFormEnum;
use App\Http\Requests\User\UserRequest;
use App\Mail\PasswordResetMail;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use Illuminate\Http\{Request, JsonResponse};
use App\Http\Resources\Client\ClientResource;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    protected $client;

    /**
     * Crée une nouvelle instance du contrôleur.
     * Injection du modèle Client et application des middlewares
     */
    public function __construct(Client $client)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::with([
                'city.country',
                'activityArea',
                'finance.country',
                'finance.city',
                'clientSites',
            ]);

            if($request->has('search')){
                $clients->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('activity', 'like', '%' . $request->search . '%')
                    ->orWhere('adresse', 'like', '%' . $request->search . '%')
                    ->orWhere('code_postal', 'like', '%' . $request->search . '%');
            }

            if ($request->has('start_date') && !empty($request->start_date)) {
                $clients->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->has('end_date') && !empty($request->end_date)) {
                $clients->whereDate('created_at', '<=', $request->end_date);
            }
            if ($request->has('name') && $request->name !== 'Tous') {
                $clients->where('id', $request->name);
            }

            if ($request->has('label') && $request->label !== 'Tous') {
                $clients->whereHas('activityArea', function ($query) use ($request) {
                    $query->where('id', $request->label);
                });
            }

            if ($request->has('status_job_offer') && $request->status_job_offer !== 'Tous') {
                $clients = $clients->whereHas('jobOffers', function ($query) use ($request) {
                    $query->where('status_id', $request->status_job_offer);
                });
            }


            if ($request->filled('ville') && $request->ville !== 'Tous') {
                $clients->whereHas('city', function ($query) use ($request) {
                    $query->where('id', 'like', '%' . $request->ville . '%');
                });
            }

            if ($request->filled('pays') && $request->pays !== 'Tous') {
                $clients->whereHas('city.region.country', function ($query) use ($request) {
                    $query->where('id', 'like', '%' . $request->pays . '%');
                });
            }

            if ($request->has('site_name') && $request->site_name !== 'Tous') {
                $clients->whereHas('clientSites', function ($query) use ($request) {
                    $query->where('site_name', 'like', '%' . $request->site_name . '%');
                });
            }




            return DataTables::of($clients)
                // 1) Logo (#)
                ->addColumn('logo', function ($client) {
                    if ($client->path_logo) {
                        return '<img src="' . $client->getLogoUrl() . '" alt="Picture" class="" width="40">';
                    }
                    return '-';
                })

                // 2) N° client
                ->addColumn('client_nbr', function ($client) {
                    return $client->id ?? '-';
                })

                // 3) Raison sociale => name
                ->addColumn('name', function ($client) {
                    return $client->name ?? '-';
                })

                // 4) Forme juridique => juridical_form
                ->addColumn('juridical_form', function ($client) {
                    return $client->juridical_form ? JuridicalFormEnum::getValue($client->juridical_form) : '-';
                })

                // 5) Régime fiscal => tax_regime
                ->addColumn('tax_regime', function ($client) {
                    return $client->tax_regime ?? '-';
                })

                // 6) Secteur d’activité => activityArea->label
                ->addColumn('activity_area', function ($client) {
                    return $client->activityArea && $client->activityArea->label
                        ? __($client->activityArea->label)
                        : '-';
                })

                // 7) Activité => activity
                ->addColumn('activity', function ($client) {
                    return __($client->activity) ?? '-';
                })

                // 8) Adresse => adresse
                ->addColumn('adresse', function ($client) {
                    return $client->adresse ?? '-';
                })

                // 9) Code postal => code_postal
                ->addColumn('code_postal', function ($client) {
                    return $client->code_postal ?? '-';
                })

                // 10) Ville => client->city->name
                ->addColumn('city_name', function ($client) {
                    return __(optional($client->city)->name) ?? '-';
                })

                // 11) Pays => client->city->country->name
                ->addColumn('country_name', function ($client) {
                    return ($client->city && $client->city->country)
                        ? __($client->city->country->name)
                        : '-';
                })

                // ********* PARTIE FISCALE *********
                // 3 colonnes "Registre du Commerce" => Dans client_finances => rc + city + country
                ->addColumn('rc_number', function ($client) {
                    return optional($client->finance)->rc ?? '-';
                })
                ->addColumn('rc_city', function ($client) {
                    // la ville du RC => finance.city->name
                    return ($client->finance && $client->finance->city)
                        ? __($client->finance->city->name)
                        : '-';
                })
                ->addColumn('rc_country', function ($client) {
                    // le pays du RC => finance.country->name
                    return ($client->finance && $client->finance->country)
                        ? __($client->finance->country->name)
                        : '-';
                })

                // ICE => finance.ice_siret
                ->addColumn('ice', function ($client) {
                    return optional($client->finance)->ice_siret ?? '-';
                })

                // Identifiant Fiscal => finance.unique_identifier
                ->addColumn('ident_fiscal', function ($client) {
                    return optional($client->finance)->unique_identifier ?? '-';
                })

                // Taxe Professionnelle => finance.taxe
                ->addColumn('taxe_prof', function ($client) {
                    return optional($client->finance)->taxe ?? '-';
                })

                // == Séparateur 2 : inutile en DataTables ==

                // ********* Contacts (client_sites) *********
                ->addColumn('telephone', function ($client) {
                    // Concatène tous les numéros de téléphone
                    $phones = $client->clientSites->pluck('phone')->filter()->unique()->join(', ');
                    return $phones ?: '-';
                })
                ->addColumn('email', function ($client) {
                    // Concatène tous les emails
                    $emails = $client->clientSites->pluck('email')->filter()->unique()->join(', ');
                    return $emails ?: '-';
                })
                ->addColumn('site_web', function ($client) {
                    // Concatène tous les noms de site
                    $sites = $client->clientSites->pluck('site_name')->filter()->unique()->join(', ');
                    return $sites ?: '-';
                })

                ->addColumn('action', function ($client) {
                    return view('client.inc.action', compact('client'))->render();
                })

                // Autoriser HTML
                ->rawColumns(['logo', 'action'])

                ->make(true);
        }

        // Pas AJAX -> ...
        return response()->json(['error' => 'Invalid request'], 400);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        try {
            DB::beginTransaction();

            // Handle logo upload
            $path_logo = null;
            if ($request->hasFile('path_logo')) {
                $path_logo = $request->file('path_logo')->store('clients/logos', 'public');
            }

            // Create client with validated data
            $clientData = $request->validated();
            $clientData['path_logo'] = $path_logo;

            $client = Client::create($clientData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Client ajouté avec succès.',
                'data' => new ClientResource($client),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'ajout de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de l\'ajout de client.');
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, int $id)
    {

        try {
            //
            DB::beginTransaction();
            $client = Client::findOrFail($id);
            $clientData = $request->validated();

            if ($request->hasFile('path_logo')) {
                $clientData['path_logo'] = $request->file('path_logo')->store('clients/logos', 'public');
            } else {
                $clientData['path_logo'] = $client->path_logo;
            }


            $client->update($clientData);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Client modifié avec succès.',
                'data' => new ClientResource($client),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la modification de client : ' . $e->getMessage());
            return $this->errorResponse('Erreur lors de la modification de client.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $client = Client::findOrfail($id);
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully']);
    }


   public function storeAccountUser(UserRequest $request)
    {  
        try {
            DB::beginTransaction();

            $userData = $request->validated();
            $password = Str::random(12);
            $userData['password'] = Hash::make($password);
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');

                if (!$file->isValid()) {
                    throw new \Exception("Échec de l'upload de l'image utilisateur.");
                }

                $path = $file->store('img/user', 'public'); 
                $userData['user_image'] = $path;
            }

            $userData['status'] = 1;

            $userData['role_id'] = $request->roles;

            $user = User::updateOrCreate(
                ['email' => $request->email], // Condition pour trouver ou créer
                $userData // Données à mettre à jour ou créer
            );

            if ($request->has('roles')) {
                $user->roles()->sync($request->roles);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' =>'Création de l\'utilisateur réussie.',

            ], 201);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'utilisateur : ' . $e->getMessage(), [
                'userData' => $userData ?? null,
                'request' => $request->all(),
            ]);


            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'utilisateur. ' . $e->getMessage());

        }
    }

    protected function sendPasswordResetEmail($user, $password)
    {
        // Générer  token
        $token = Password::createToken($user);
        \Log::info('Password reset token: ' . $token);
        // Générer l'URL correcte avec le token
        $resetLink = route('users.password.reset', ['token' => $token, 'email' => $user->email]);


        // Envoyer l'email avec le mot de passe temporaire et le lien de réinitialisation
        Mail::to($user->email)->send(new PasswordResetMail($user, $password, $resetLink));
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
