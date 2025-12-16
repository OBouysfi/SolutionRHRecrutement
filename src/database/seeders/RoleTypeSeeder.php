<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleType;
use Spatie\Permission\Models\Role;

class RoleTypeSeeder extends Seeder
{
    public function run()
    {
        // Types et rôles associés
        $typesAndRoles = [
            'ByteIT' => [
                'Super admin',
            ],
            'Super administrateur' => [
                'Super administrateur système',
                'Super administrateur de la sécurité',
                'Super administrateur des utilisateurs',
                'Super administrateur des données',
                'Super administrateur des rapports',
                'Super administrateur de la conformité',
            ],
            'Administrateur' => [
                'Administrateur de recrutement',
                'Administrateur de la conformité',
                'Administrateur système',
                'Administrateur des données',
                'Administrateur des rapports',
                'Administrateur de l\'assistance',
                'Administrateur des politiques de la sécurité',
            ],
            'Recrutement' => [
                'Consultant en recrutement',
                'Chargé de recrutement',
                'Talent acquisition specialist',
                'Chargé de sourcing',
                'Responsable des relations clients',
                'Coordinateur de projet recrutement',
                'Assistant(e) de recrutement',
                'Directeur Général',
            ],
            'Repporting' => [
                'Responsable reporting et analyses',
                'Responsable des relations',
            ],
            'Finance' => [
                'Directeur financier',
                'Contrôleur de gestion',
                'Responsable comptabilité',
                'Comptable',
                'Trésorier',
            ],
            'Système d\'Information' => [
                'Administrateur reseaux',
                'Chef de projet IT',
                'Auditeur IT',
                'Développeur système',
                'Chargé de la gestion des flux',
            ],
            'Sécurité' => [
                'Responsable de la sécurité du système d\'information',
                'Administrateur sécurité',
                'Ingénieur sécurité',
                'Analyste sécurité',
                'Consultant sécurité',
                'Responsable conformité',
                'Technicien support sécurité',
                'Responsable gestion des risques',
                'Auditeur sécurité',
                'Architecte sécurité',
                'portail candidat',
                'portal client'
            ],
        ];

        foreach ($typesAndRoles as $typeName => $roles) {
            // Créer le type
            $roleType = RoleType::create([
                'name' => $typeName,
                'description' => "Type de rôle pour {$typeName}",
            ]);

            // Associer les rôles au type
            foreach ($roles as $roleName) {
                Role::create([
                    'name' => $roleName,
                    'role_type_id' => $roleType->id,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
