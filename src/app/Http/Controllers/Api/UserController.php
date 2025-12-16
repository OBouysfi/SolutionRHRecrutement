<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{Request, JsonResponse};
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Carbon\Carbon;
use App\Models\Client;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Users = User::with([
                'roles', 'permissions'
            ]);
            // 4) Filtrer par permission 
            if ($request->filled('permission')) {
                $permissionName = $request->permission;
            
                $Users->whereHas('roles', function ($query) use ($permissionName) {
                    $query->whereHas('permissions', function ($subQuery) use ($permissionName) {
                        $subQuery->where('parent', $permissionName);
                    });
                });
            }
            // 2) Filtrer par rôle
            if ($request->filled('role') && $request->role !== 'Tous') {
                $Users->where('role_id', $request->role);
            }

            // 3) Filtrer par statut
            if ($request->filled('status') && $request->status !== 'Tous') {
             $Users->where('status', $request->status);
            }
            return DataTables::of($Users)
                // 1) Logo
                ->addColumn('logo', function ($User) {
                    return '<img src="' . $User->getAvatarUrl() . '" alt="Picture" width="40">';
                })
                // 2) User Number
                ->addColumn('User_nbr', function ($User) {
                    return $User->id ?? '-';
                })
                // 3) Name
                ->addColumn('name', function ($User) {
                    return $User->name ?? '-';
                })
                // 4) Email
                ->addColumn('email', function ($User) {
                    return $User->email ?? '-';
                }) 
                 // 4) status
                ->addColumn('status', function ($User) {

                    if (is_null($User->status)) {
                        return '-';
                    }
                
                    // Définition des couleurs t
                    $status_colors = [
                        0 => 'badge-cancelled',   // Inactive (Yellow)
                        1 => 'badge-in-progress',   // Active (Green)
                    ];
                
                    // définissez une couleur par défaut
                    $badge_color = $status_colors[$User->status] ?? 'badge-custom-color';
                    
                    // statut 
                    $status_name = $User->status == 1 ? 'Active' : 'Bloqué';
                
                    return '<span class="badge badge-sm ' . $badge_color . '">' . $status_name . '</span>';
                })
                ->addColumn('role', function ($user) {
                    // Access the first role for the user
                    return $user->roles->first()->name ?? '-'; 
                })
                ->addColumn('agence', function ($user) {
                    // Access the first role for the user
                    return $user->agency->name ?? '-'; 
                })
                ->addColumn('created_at', function ($user) {
                    $createdAt = Carbon::parse($user->created_at);
                    return $createdAt->diffForHumans(); // Ex : "il y a 2 jours"
                })
                ->addColumn('last_login_at', function ($user) {
                    $last_login_at = Carbon::parse($user->last_login_at);
                    return $last_login_at->diffForHumans(); // Ex : "il y a 2 jours"
                })
                
           
                // 5) Action
                ->addColumn('action', function ($User) {
                    return view('users.inc.action', compact('User'))->render();
                    
                })
                // Autoriser HTML
                ->rawColumns(['logo', 'action','status'])
                ->make(true);
        }
    
        // If not an AJAX request
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            // Log incoming request data
            Log::info('Incoming User Data: ', $request->all());
    
            DB::beginTransaction();
    
            $userData = $request->validated();

    
            // Pass aléatoire
            $password = Str::random(12); // 12 caractères
            $userData['password'] = Hash::make($password);
    
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
            
                if (!$file->isValid()) {
                    throw new \Exception("Échec de l'upload de l'image utilisateur.");
                }
            
                $path = $file->store('img/user', 'public');
                $userData['user_image'] = $path;
            }
            
            // Force status to 0 or 1
            $userData['created_at'] = now();
            $userData['role_id'] = $request->roles;
          
            // Création de l'utilisateur
            $user = User::create($userData);
            
            // Mise à jour des client  (si EXIST)

            if ($request->has('client_id')) {
                Client::where('id', $request->client_id)
                    ->update(['user_id' => $user->id]);
            }

    
            // Vérifier si des rôles sont envoyés
            if ($request->has('roles')) {
                $user->roles()->sync($request->roles);
            }

            if($userData['status'] == 1){
            // Envoyer l'email
              $this->sendPasswordResetEmail($user, $password);

            }
          

            DB::commit();
    
            // Log success
            Log::info('User created successfully', ['user' => $user]);
            $html = view('setting.rolesPermissions.listing')->render(); // actualise l'onglet

            return response()->json([
                'status' => 'success',
                'message' =>'Création de l\'utilisateur réussie.',
                'html' => $html,

            ], 201);
            // return redirect()->back()->with('success', 'Création de l\'utilisateur réussie.');
    
        } catch (\Exception $e) {
            // Log error details
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
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UserRequest $request, int $id)
    {
        try {
            DB::beginTransaction();
    
            $User = User::findOrFail($id); // il te manquait cette ligne !
    
            // Récupérer les données validées
            $UserData = $request->validated();
    
            // Mettre à jour le status (0 ou 1)
            $userData['updated_at'] = now();
            $userData['role_id'] = $request->roles;


    
            // Gestion du logo uniquement si un fichier est envoyé
            if ($request->hasFile('user_image')) {
                $path_logo = $request->file('user_image')->store('img/user', 'public');
                $UserData['user_image'] = $path_logo;
            } else {
                // Ne rien modifier : on supprime la clé pour qu'elle ne passe pas dans l'update
                unset($UserData['user_image']);
            }
    
            // Mise à jour de l'utilisateur
            $User->update($UserData);
            // Mise à jour des client  (si EXIST)
            if ($request->has('client_id')) {
                Client::where('id', $request->client_id)
                    ->update(['user_id' => $User->id]);
            }
            // Mise à jour des rôles (si envoyés)
            if ($request->has('roles')) {
                $User->roles()->sync($request->roles);
            }
    
            DB::commit();
            $html = view('setting.rolesPermissions.listing')->render(); // actualise l'onglet

            return response()->json([
                'status' => 'success',
                'message' =>'Création de l\'utilisateur réussie.',
                'html' => $html,

            ], 201);
            // return redirect()->back()->with('success', 'Modification de l\'utilisateur réussie.');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la modification de User : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la modification de l\'utilisateur. ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user=User::find($id);
            $user->delete();
            return response()->json(['message' => 'l\'utilisateur supprimé avec succès.'], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la suppression de l\'utilisateur.'], 500);
        }
    }


    public function failedValidation(Validator $userData)
    {
        Log::error('Erreur de validation lors de la création de l\'utilisateur :', [
            'errors' => $userData->errors()->all(),
            'request' => $this->all()
        ]);

        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($userData)
                ->withInput()
        );
}

}
