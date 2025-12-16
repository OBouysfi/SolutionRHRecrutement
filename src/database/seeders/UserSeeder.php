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
            'email' => 'o.bouysfi@byteit.ma',
            'password' => Hash::make('Byteit2024@'),
            'user_image' => null,
            'status' => true,
        ]);
    }
}
