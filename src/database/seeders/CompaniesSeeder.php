<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompaniesSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->insert([
            'path_logo' => null,
            'business_name' => 'Byteit',
            'address' => '286 Bd. Yacoub El Mansour, Office Park, Immeuble C, 3eme Etage, Bureau N°12, Casablanca',
            'postal_code' => null,
            'city_id' => 40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
