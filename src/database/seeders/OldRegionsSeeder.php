<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OldRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            ['label' => "L'Oriental", 'country_id' => 12],
            ['label' => 'Marrakech-Safi', 'country_id' => 12],
            ['label' => 'Drâa-Tafilalet', 'country_id' => 12],
            ['label' => 'Fès-Meknès', 'country_id' => 12],
            ['label' => 'Guelmim-oued Noun', 'country_id' => 12],
            ['label' => 'Tanger-Tétouan-Al Hoceima', 'country_id' => 12],
            ['label' => 'Souss-Massa', 'country_id' => 12],
            ['label' => 'Casablanca-Settat', 'country_id' => 12],
            ['label' => 'Dakhla-Oued Eddahab', 'country_id' => 12],
            ['label' => 'Beni Mellal-Khénifra', 'country_id' => 12],
            ['label' => 'Rabat-Salé-Kénitra', 'country_id' => 12],
            ['label' => 'Laâyoune-Sakia Al Hamra', 'country_id' => 12],
        ]);
    }
}
