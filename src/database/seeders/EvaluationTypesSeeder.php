<?php

namespace Database\Seeders;

use App\Models\EvaluationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EvaluationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Define evaluation types
        $evaluationTypes = [
            ['name' => 'Compétences techniques'],
            ['name' => 'Compétences personnelles'],
            ['name' => 'Adaptabilité'],
            ['name' => 'Leadership'],
            ['name' => 'Résolution de problèmes'],
            ['name' => 'Communication'],
            ['name' => 'Innovation'],
            ['name' => 'Motivation'],
            ['name' => 'Référence professionnelle'],
        ];

        foreach($evaluationTypes as $type){
            EvaluationType::create($type);
        }

    }
}
