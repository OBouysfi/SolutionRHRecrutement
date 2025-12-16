<?php

namespace App\Http\Controllers;

use App\Enums\RolePermission\ActionColorEnum;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SupportService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use \Illuminate\Support\Facades\DB;
use App\Models\Client;

class RolePermissionController extends Controller
{
    private $SupportService;
    protected $permission;

    public function __construct(Permission $permission)
    {

        $this->permission = $permission;

        $this->middleware('permission:Rôles-permissions-access')->only(['listing']);
    }

    public function listing()
    {
        $users = User::all();
        $roles = Role::all();
        $role_types = RoleType::with('roles')->get();
        $permissions = Permission::all()->groupBy('module');
        $modules = Permission::pluck('module')->unique()->toArray();
        $clients = Client::All();
        
        // get  rols for select input
        $permissionsTitles = array_keys( $permissions->toArray());


        return view('setting.rolesPermissions.listing', compact('users', 'roles', 'role_types', 'permissions', 'modules','clients','permissionsTitles'));
    }



    public function getActions(Request $request)
    {
        $modele = $request->modele;

        // Récupérer les actions et les tâches associées au modèle sélectionné (parent)
        $permissions = Permission::where('parent', $modele)->get();

        // Vous pouvez récupérer les actions et tâches dans un tableau
        // $actions = $permissions->pluck('action', 'id');
        $tasks = $permissions->pluck('task', 'id');

        // Retourner les données sous forme de JSON
        return response()->json([
            // 'actions' => $actions,
            'tasks' => $tasks
        ]);
    }

    /**
     * Enregistre les permissions assignées à un rôle.
     */
    public function storeRolesPermissions(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'task_permission' => 'required|array',
            'task_permission.*' => 'exists:permissions,id',
        ], [
            'role_id.required' => 'Veuillez sélectionner un rôle.',
            'task_permission.required' => 'Veuillez sélectionner au moins une tâche.',
            'task_permission.*.exists' => 'Une des tâches sélectionnées est invalide.',
        ]);

        $role = Role::findOrFail($request->role_id);

        // Récupérer les noms des permissions à partir des IDs
        $permissions = Permission::whereIn('id', $request->task_permission)->pluck('name')->toArray();

        // Appliquer les permissions au rôle
        // $role->syncPermissions($permissions);

        // Appliquer les permissions au rôle
        // Ajouter les nouvelles permissions sans écraser celles existantes
        $role->givePermissionTo($permissions);

        return response()->json(['success' => 'Permissions assignées avec succès !']);
    }

    /**
     * Cette fonction permet de gérer la suppression d'une permission pour un rôle spécifique.
     */
    public function detachPermission(Request $request)
    {
        try {
            // Récupération du rôle et de la permission à partir des IDs envoyés dans la requête
            $role = Role::find($request->role_id);
            $permission = Permission::find($request->permission_id);

            // Vérification si le rôle ou la permission n'existe pas
            if (!$role || !$permission) {
                return response()->json([
                    'success' => false,
                    'message' => 'Rôle ou permission non trouvée.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la suppression de la permission.'
            ], 500);
        }
    }

    public function updatePermission(Request $request)
    {
        try {
            $request->validate([
                'role_id' => 'required|exists:roles,id',
                'permission' => 'required|string',
                'enabled' => 'required|boolean'
            ]);

            $role = Role::findOrFail($request->role_id);
            $permissionName = $request->permission;

            // Get or create the permission
            $permission = Permission::firstOrCreate(['name' => $permissionName]);

            if ($request->enabled) {
                $role->givePermissionTo($permission);
            } else {
                $role->revokePermissionTo($permission);
            }

            return response()->json([
                'success' => true,
                'message' => 'Permission mise à jour avec succès'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la mise à jour de la permission',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    /**
     * Affiche la vue permettant d'assigner des rôles à des utilisateurs
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function assignRoleView()
    {
        $users = User::get();
        $roles = Role::all();
        return view('roles.assign', compact('users', 'roles'));
    }

    public function assignRole(Request $request)
    {
        try {
            $user = User::findOrFail($request->user_id);

            // Supprime tous les rôles existants et assigne les nouveaux
            $user->roles()->sync($request->roles);

            // Récupérer les rôles assignés et les retourner en JSON
            $roles = $user->roles;

            return response()->json([
                'success' => true,
                'roles' => $roles,
                'user_id' => $user->id,
            ]);
        } catch (\Exception $e) {
            // Si une erreur se produit, renvoyer le message d'erreur
            return response()->json([
                'success' => false,
                'error' => 'Une erreur s\'est produite lors de l\'assignation du rôle'
            ]);
        }
    }

    public function createRole(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'role_type_id' => 'nullable'
            ]);
            // dd($request);
            $role = new Role();
            $role->name = $request->name;
            $role->role_type_id = $request->role_type_id;
            $role->save();
            // $role = Role::create(['name' => $request->name, 'guard_name' => 'web', 'role_type_id' => $request->role_type_id]);
            return response()->json([
                'success' => true,
                'role' => $role,
            ]);
        } catch (\Exception $e) {
            // Si une erreur se produit, renvoyer le message d'erreur
            return response()->json([
                'success' => false,
                'error' => 'Une erreur s\'est produite lors de la création du rôle, ' . $e->getMessage()
            ]);
        }


        return redirect()->back();
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $role = Role::find($request->role_id);
        if (!$role)
            return response()->json([
                'error' => true,
                'role' => $role,
            ], 200);
        $role->update([
            'name' => $request->name,
            // 'role_type_id' => $request->role_type_id
        ]);

        return response()->json([
            'success' => true,
            'role' => $role,
        ], 200);
    }

    public function deleteRole($id): mixed
    {
        try {
            $role = Role::where("id", $id)->get()->first();
            $role->delete();

            return response()->json([
                'success' => true,
                'message' => "Le rôle a été supprimé avec succès."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Une erreur est survenue: " . $e->getMessage()
            ], 500);
        }
    }


    public function changeRolePermission(Request $request)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*.role_id' => 'required|exists:roles,id',
            'permissions.*.permission_id' => 'required|exists:permissions,id',
            'permissions.*.assign' => 'required|boolean'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->permissions as $permissionData) {
                $role = Role::findOrFail($permissionData['role_id']);
                $permission = Permission::findOrFail($permissionData['permission_id']);

                if ($permissionData['assign']) {
                    $role->givePermissionTo($permission);
                } else {
                    $role->revokePermissionTo($permission);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Permissions mises à jour avec succès']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'Erreur lors de la mise à jour des permissions'], 500);
        }
    }


    public function getRolesPermissions(Request $request)
    {
        $roles = Role::all();
        $permissions = Permission::all()->groupBy('module');
        $rolesPermissions = [];

        foreach ($roles as $role) {
            $rolePermissionIds = $role->permissions->pluck('id')->toArray();
            $groupedPermissions = [];

            foreach ($permissions as $parent => $perms) {
                $groupedPermissions[$parent] = $perms->map(function ($permission) use ($rolePermissionIds) {
                    return [
                        'id' => $permission->id,
                        'action' => $permission->action,
                        'task' => $permission->task,
                        'has_permission' => in_array($permission->id, $rolePermissionIds),
                    ];
                })->values();
            }

            $rolesPermissions[] = [
                'role_id' => $role->id,
                'role_name' => $role->name,
                'permissions' => $groupedPermissions,
            ];
        }

        return response()->json(['roles' => $rolesPermissions, 'permissions' => $permissions, 'allroles' => $roles]);
    }
}
