<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignAllPermissionsToRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Get the role with ID 1
        $role = Role::find(1);

        if (!$role) {
            $this->command->error('Role with ID 1 not found.');
            return;
        }

        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to the role
        $role->syncPermissions($permissions);

        // $user = User::find(1);

        // if ($user) {
        //     $user->syncPermissions(Permission::all());
        // }

        $user = User::find(1);

        if ($user) {
            $user->syncRoles(Role::all());
        }

        $this->command->info("All rolles assigned to role '{$role->name}'.");
    }
}