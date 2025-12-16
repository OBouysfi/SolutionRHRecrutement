<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diploma;

class DiplomasSeeder extends Seeder
{
    public function run(): void
    {
        $diplomas = [
            'Diplôme de Baccalauréat',
            'Brevet de Technicien Supérieur (BTS)',
            'Diplôme Universitaire de Technologie (DUT)',
            'Diplôme d’Études Universitaires Générales (DEUG)',
            'Diplôme de Technicien',
            'Diplôme de Technicien Spécialisé',
            'Licence',
            'Licence Professionnelle',
            'Master',
            'Master Spécialisé',
            'Doctorat',
            'Certificat de Qualification Professionnelle (CQP)',
            'Certificat de Formation Professionnelle',
        ];

        foreach ($diplomas as $label) {
            Diploma::create(['label' => $label]);
        }
    }
}
