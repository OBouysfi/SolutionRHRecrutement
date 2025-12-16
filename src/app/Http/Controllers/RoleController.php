<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Services\RoleService;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = Role::get();

        $permissions = Permission::with("role")->all()->groupBy('module');

        return view('setting.rolesPermissions.inc.role', compact('roles', 'permissions'));
    }


    public function permissionIds(Role $role)
    {
        return response()->json([
            'role_name' => $role->name,
            'permission_ids' => $role->permissions->pluck('id')->toArray()
        ]);
    }

    // public function getRolePermissions(Request $request)
    // {
    //     $role = Role::find($request->role_id);

    //     $allPermissions = Permission::all(); // get all permissions
    //     $rolePermissions = $role->permissions->pluck('id')->toArray(); // role's assigned permission IDs

    //     return response()->json([
    //         'role_name' => $role->name,
    //         'permissions' => $allPermissions->map(function ($permission) use ($rolePermissions) {
    //             return [
    //                 'id' => $permission->id,
    //                 'action' => $permission->action,
    //                 'task' => $permission->task,
    //                 'has_permission' => in_array($permission->id, $rolePermissions),
    //             ];
    //         }),
    //     ]);
    // }

    public function getRolePermissions(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        return response()->json([
            'permission_ids' => $role->permissions->pluck('id')
        ]);

        $rolePermissionIds = $role->permissions->pluck('id')->toArray();

        // Get all permissions grouped by parent
        $permissions = Permission::all()->groupBy('module');

        // Format grouped permissions
        $groupedPermissions = [];
        foreach ($permissions as $parent => $perms) {
            $groupedPermissions[$parent] = $perms->map(function ($permission) use ($rolePermissionIds) {
                return [
                    'id' => $permission->id,
                    'action' => $permission->action,
                    'task' => $permission->task,
                    'has_permission' => in_array($permission->id, $rolePermissionIds),
                ];
            })->values(); // reset keys
        }

        return response()->json([
            'role_name' => $role->name,
            'permissions' => $groupedPermissions,
        ]);
    }



    public function toggleRolePermission(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);

        if ($request->assign == "true") {
            // Add permission manually
            // dd($role, $permission,$request->assign);
            DB::table('role_has_permissions')->updateOrInsert([
                'permission_id' => $permission->id,
                // 'role_type' => $roleClass,
                'role_id' => $role->id,
            ]);
        } else {
            // Remove permission manually
            DB::table('role_has_permissions')->where([
                'permission_id' => $permission->id,
                // 'role_type' => $roleClass,
                'role_id' => $role->id,
            ])->delete();
        }

        // Always clear the permission cache after change
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        return response()->json(['status' => 'success']);
    }




    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array|nullable'
        ]);

        $role = $this->roleService->createRoleWithPermissions($validatedData);

        return response()->json(['status' => 'success', 'role' => $role]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array|nullable'
        ]);

        $this->roleService->updateRoleWithPermissions($role, $validatedData);

        return redirect()->route('roles.index')
            ->with('success', 'Rôle mis à jour avec succès');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['status' => 'success']);
    }
}
