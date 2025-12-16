<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Créer l'utilisateur
        $user = User::create([
            'name' => 'Othman BOUYSFI',
            'email' => 'bouysfi.othman@gmail.com',
            'password' => Hash::make('123456789'),
            'user_image' => null,
            'status' => true,
        ]);
    }
}
