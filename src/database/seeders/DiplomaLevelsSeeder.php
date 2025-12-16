<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class DiplomaLevelsSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Non scolarisé',
            'Primaire',
            'Brevet',
            'Lycée',
            'Bac',
            'Bac +1',
            'Bac +2',
            'Bac +3',
            'Bac +4',
            'Bac +5',
            'Bac >+5',
        ];

        foreach ($levels as $index => $label) {
            Level::create([
                'label' => $label,
                'weight' => $index + 1, // Assign weight incrementally
            ]);
        }
    }
}
