<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function createPermission(array $data)
    {
        return Permission::create([
            'name' => $data['name'],
            'guard_name' => 'web'
        ]);
    }

    public function updatePermission(Permission $permission, array $data)
    {
        return $permission->update([
            'name' => $data['name']
        ]);
    }
}