<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class OldCountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['name' => 'Arabie Saoudite', 'code' => 'SAU', 'flag' => 'assets/img/drap/saudi-arabia.png'],
            ['name' => 'Belgique', 'code' => 'BEL', 'flag' => 'assets/img/drap/Belgique.jpg'],
            ['name' => 'Canada', 'code' => 'CAN', 'flag' => 'assets/img/drap/Canada.png'],
            ['name' => 'Cameroun', 'code' => 'CMR', 'flag' => 'assets/img/drap/cameroon.jpg'],
            ['name' => 'Chine', 'code' => 'CHN', 'flag' => 'assets/img/drap/china.jpg'],
            ['name' => 'Côte d\'Ivoire', 'code' => 'CIV', 'flag' => 'assets/img/drap/Cote_d\'Ivoire.png'],
            ['name' => 'Espagne', 'code' => 'ESP', 'flag' => 'assets/img/drap/Spain.png'],
            ['name' => 'Émirats Arabes Unis', 'code' => 'ARE', 'flag' => 'assets/img/drap/united-arab-emirates.jpg'],
            ['name' => 'France', 'code' => 'FRA', 'flag' => 'assets/img/drap/France.png'],
            ['name' => 'Inde', 'code' => 'IND', 'flag' => 'assets/img/drap/india.jpg'],
            ['name' => 'Irlande', 'code' => 'IRL', 'flag' => 'assets/img/drap/Ireland.png'],
            ['name' => 'Maroc', 'code' => 'MAR', 'flag' => 'assets/img/drap/MAROC.jpg'],
            ['name' => 'Qatar', 'code' => 'QAT', 'flag' => 'assets/img/drap/QATAR.jpg'],
            ['name' => 'Sénégal', 'code' => 'SEN', 'flag' => 'assets/img/drap/senegal.jpg'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
