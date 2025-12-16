<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function createRoleWithPermissions(array $data)
    {
        $role = Role::create([
            'name' => $data['name'],
            'guard_name' => 'web'
        ]);

        if (!empty($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        }

        return $role;
    }

    public function updateRoleWithPermissions(Role $role, array $data)
    {
        $role->update([
            'name' => $data['name']
        ]);

        if (!empty($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        } else {
            $role->syncPermissions([]);
        }

        return $role;
    }
}