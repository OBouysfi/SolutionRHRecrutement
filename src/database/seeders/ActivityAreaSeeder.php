<?php

namespace Database\Seeders;

use App\Models\ActivityArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['label' => 'Activités juridiques et comptables'],
            ['label' => 'Agriculture et élevage'],
            ['label' => 'Architecture, études et normes'],
            ['label' => 'Artisanat d’art, audiovisuel et spectacle'],
            ['label' => 'Automobile'],
            ['label' => 'Bâtiment et travaux publics (BTP)'],
            ['label' => 'Commerce et distribution'],
            ['label' => 'Communication et marketing'],
            ['label' => 'Culture et patrimoine'],
            ['label' => 'Édition'],
            ['label' => 'Énergie'],
            ['label' => 'Enseignement et formation'],
            ['label' => 'Environnement'],
            ['label' => 'Finance, banque et assurance'],
            ['label' => 'Gestion administrative et ressources humaines'],
            ['label' => 'Hôtellerie et restauration'],
            ['label' => 'Immobilier'],
            ['label' => 'Industrie - Alimentaire'],
            ['label' => 'Industrie - Bois'],
            ['label' => 'Industrie - Chimie'],
            ['label' => 'Industrie - Électronique'],
            ['label' => 'Industrie - Métallurgie'],
            ['label' => 'Industrie - Papier et imprimerie'],
            ['label' => 'Industrie - Textile et mode'],
            ['label' => 'Industries'],
            ['label' => 'Informatique et télécommunication'],
            ['label' => 'Logistique et transport'],
            ['label' => 'Maintenance, entretien et nettoyage'],
            ['label' => 'Recherche'],
            ['label' => 'Santé'],
            ['label' => 'Service à la personne'],
            ['label' => 'Service public, défense et sécurité'],
            ['label' => 'Social'],
            ['label' => 'Sport, animation et loisir'],
            ['label' => 'Tourisme'],
        ];

        DB::table('activity_areas')->insert($data);
    }
}

    

