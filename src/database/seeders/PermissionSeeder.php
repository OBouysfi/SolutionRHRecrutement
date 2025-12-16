<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $guardName = 'web';

        $permissions = [
            //Dashboard
            ['parent' => 'dashboard', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au tableau de bord'],
            ]],
            // Vivier Talent
            [
                'parent' => 'vivierTalent',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au vivier de talents'],
                    ['name' => 'dossier-create', 'action' => 'Créer', 'task' => 'Créer un profil candidat'],
                    ['name' => 'preview', 'action' => 'Prévisualiser', 'task' => 'Prévisualiser un profil'],
                    ['name' => 'share', 'action' => 'Partager', 'task' => 'Partager un profil'],
                    ['name' => 'download', 'action' => 'Télécharger', 'task' => 'Télécharger un profil'],
                    ['name' => 'print', 'action' => 'Imprimer', 'task' => 'Imprimer un profil'],
                    ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des candidats'],
                ]
            ],

            // Profile
            ['parent' => 'profile', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au module des profils'],
                ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des profils'],
                ['name' => 'create', 'action' => 'Créer', 'task' => 'Créer un nouveau profil'],
                ['name' => 'detail', 'action' => 'Voir', 'task' => 'Voir les détails d’un profil'],
                ['name' => 'edit', 'action' => 'Modifier', 'task' => 'Modifier un profil'],
                ['name' => 'delete', 'action' => 'Supprimer', 'task' => 'Supprimer un profil'],
                ['name' => 'ajouter-au-vivier', 'action' => 'Ajouter au vivier', 'task' => 'Ajouter le profil au vivier'],
                ['name' => 'desactiver-profile', 'action' => 'Désactiver', 'task' => 'Désactiver le profil'],
                ['name' => 'dequalifier-profile', 'action' => 'Déqualifier', 'task' => 'Déqualifier le profil'],
                ['name' => 'activer-profile', 'action' => 'Activer', 'task' => 'Activer le profil'],
                ['name' => 'qualifier-profile', 'action' => 'Qualifier', 'task' => 'Qualifier le profil'],
                ['name' => 'preview', 'action' => 'Aperçu', 'task' => 'Aperçu du profil'],
                ['name' => 'export', 'action' => 'Exporter', 'task' => 'Exporter le profil'],
                ['name' => 'print', 'action' => 'Imprimer', 'task' => 'Imprimer le profil'],
                ['name' => 'share', 'action' => 'Partager', 'task' => 'Partager le profil'],
            ]],

            // Client
            [
                'parent' => 'client',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des clients'],
                    ['name' => 'create', 'action' => 'Créer', 'task' => 'Ajouter un nouveau client'],
                    ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des clients'],
                    ['name' => 'listing-update', 'action' => 'Modifier', 'task' => 'Modifier les informations d’un client'],
                    ['name' => 'listing-detail', 'action' => 'Consulter', 'task' => 'Consulter les détails d’un client'],
                    ['name' => 'listing-delete', 'action' => 'Supprimer', 'task' => 'Supprimer un client'],
                ]
            ],

            // Mission
            [
                'parent' => 'mission',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des missions'],
                    ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des missions'],

                    ['name' => 'preview', 'action' => 'Prévisualiser', 'task' => 'Prévisualiser des missions'],
                    ['name' => 'share', 'action' => 'Partager', 'task' => 'Partager des missions'],
                    ['name' => 'download', 'action' => 'Télécharger', 'task' => 'Télécharger des missions'],
                    ['name' => 'print', 'action' => 'Imprimer', 'task' => 'Imprimer des missions'],

                    ['name' => 'create-offer', 'action' => 'Créer', 'task' => 'Créer une nouvelle mission'],
                    ['name' => 'detail', 'action' => 'Consulter', 'task' => 'Consulter les détails d’une mission'],
                    ['name' => 'edit', 'action' => 'Modifier', 'task' => 'Modifier une mission'],
                    ['name' => 'delete', 'action' => 'Supprimer', 'task' => 'Supprimer une mission'],
                    ['name' => 'status-annuler', 'action' => 'Annuler', 'task' => 'Annuler une mission'],
                    ['name' => 'status-suspendre', 'action' => 'Suspendre', 'task' => 'Suspendre une mission'],
                    ['name' => 'status-cloturer', 'action' => 'Clôturer', 'task' => 'Clôturer une mission'],
                    ['name' => 'status-reactiver', 'action' => 'Réactiver', 'task' => 'Réactiver une mission'],
                    ['name' => 'status-recouvrir', 'action' => 'Recouvrir', 'task' => 'Recouvrir une mission'],
                    ['name' => 'indicators-show', 'action' => 'Afficher les indicateurs', 'task' => 'Afficher les indicateurs de mission'],
                ]
            ],


            // Matching
            [
                'parent' => 'matching',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des matchings'],
                    ['name' => 'add-shortlist', 'action' => 'Ajouter à la shortlist', 'task' => 'Ajouter un profil à la shortlist'],
                    ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des matchings'],
                    ['name' => 'detail', 'action' => 'Consulter', 'task' => 'Consulter les détails d’un matching'],
                ]
            ],

            // ATS
            [
                'parent' => 'ats',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à ATS'],
                    ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher les candidats dans ATS'],
                    ['name' => 'Shortlist', 'action' => 'Ajouter à la shortlist', 'task' => 'Ajouter un candidat à la shortlist'],
                    ['name' => 'Évaluation', 'action' => 'Évaluer', 'task' => 'Inviter un candidat à une évaluation'],
                    ['name' => 'Entretien', 'action' => 'Programmer un entretien', 'task' => 'Programmer un entretien pour un candidat'],
                    ['name' => 'Retenu', 'action' => 'Retenir', 'task' => 'Marquer un candidat comme retenu'],
                    ['name' => 'Embauché', 'action' => 'Embaucher', 'task' => 'Marquer un candidat comme embauché'],
                    ['name' => 'Rejeté', 'action' => 'Rejeter', 'task' => 'Rejeter un candidat'],
                    ['name' => 'SendEmail', 'action' => 'Envoyer un email', 'task' => 'Envoyer un email au candidat'],
                    ['name' => 'MakeEvent', 'action' => 'Créer un événement', 'task' => 'Créer un événement pour un candidat'],
                ]
            ],

            // Test Technique
            [
                'parent' => 'test-technique',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au module de test technique'],

                    ['name' => 'listing-gestion-candidats', 'action' => 'Afficher', 'task' => 'Afficher la liste des candidats'],
                    ['name' => 'create-candidats', 'action' => 'Créer', 'task' => 'Créer un nouveau candidat'],
                    ['name' => 'delete-candidats', 'action' => 'Supprimer', 'task' => 'Supprimer un candidat'],
                    ['name' => 'edit-candidats', 'action' => 'Modifier', 'task' => 'Modifier les informations d\'un candidat'],
                    ['name' => 'detail-candidats', 'action' => 'Consulter', 'task' => 'Consulter les détails d\'un candidat'],

                    ['name' => 'listing-fiche-candidat', 'action' => 'Afficher', 'task' => 'Afficher la liste des fiches candidats'],
                    ['name' => 'create-test-fiche-candidat', 'action' => 'Créer', 'task' => 'Créer un test pour une fiche candidat'],
                    ['name' => 'create-tests-Métier-fiche-candidat', 'action' => 'Créer', 'task' => 'Créer un test métier pour une fiche candidat'],
                    ['name' => 'edit-details-candidat-fiche-candidat', 'action' => 'Modifier', 'task' => 'Modifier les détails d\'une fiche candidat'],
                    ['name' => 'envoyer-test-candidat-fiche-candidat', 'action' => 'Envoyer', 'task' => 'Envoyer un test à un candidat'],

                    ['name' => 'listing-gestion-tests', 'action' => 'Afficher', 'task' => 'Afficher la liste des tests'],
                    ['name' => 'create-gestion-tests', 'action' => 'Créer', 'task' => 'Créer un test'],
                    ['name' => 'edit-gestion-tests', 'action' => 'Modifier', 'task' => 'Modifier un test'],
                    ['name' => 'delete-gestion-tests', 'action' => 'Supprimer', 'task' => 'Supprimer un test'],
                ]
            ],

            [
                'parent' => 'event',
                'permissions' => [
                    ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au module des événements'],
                    ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des événements'],
                    ['name' => 'create', 'action' => 'Créer', 'task' => 'Créer un nouvel événement'],
                    ['name' => 'edit', 'action' => 'Modifier', 'task' => 'Modifier un événement'],
                    ['name' => 'detail', 'action' => 'Consulter', 'task' => 'Voir les détails d’un événement'],
                    ['name' => 'delete', 'action' => 'Supprimer', 'task' => 'Supprimer un événement'],
                ]
            ],

            // Paramètre
            ['parent' => 'Paramètre', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux paramètres'],
            ]],

            ['parent' => 'utilisateur', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des utilisateurs'],
            ]],

            ['parent' => 'Rôles-permissions', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux rôles et permissions'],
            ]],

            ['parent' => 'evaluateurs', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux évaluateurs'],
            ]],

            ['parent' => 'personnalisation', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux options de personnalisation'],
            ]],

            ['parent' => 'prametrage', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au paramétrage'],
            ]],

            ['parent' => 'intégration-(API)', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux intégrations (API)'],
            ]],

            ['parent' => 'sécurité', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la sécurité'],
            ]],

            ['parent' => 'notifications', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux notifications'],
            ]],

            ['parent' => 'Sauvegarde', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux sauvegardes'],
            ]],

            ['parent' => 'emails', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des emails'],
            ]],

            ['parent' => 'logs', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux logs système'],
            ]],

            ['parent' => 'candidate-portal', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au portail candidat'],
            ]],

            ['parent' => 'client-portal', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au portail client'],
            ]],

            ['parent' => 'filiale', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des filiales'],
            ]],

            ['parent' => 'agence', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des agences'],
            ]],

            ['parent' => 'companie', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des compagnies'],
            ]],

            ['parent' => 'activityArea', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux domaines d’activité'],
            ]],

            ['parent' => 'profession', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder à la gestion des professions'],
            ]],

            ['parent' => 'talentFolder', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder au vivier de talents'],
            ]],

            ['parent' => 'competence-linguistique', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux compétences linguistiques'],
            ]],

            ['parent' => 'competence-technique', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux compétences techniques'],
            ]],

            ['parent' => 'competence-personnelle', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux compétences personnelles'],
            ]],

            ['parent' => 'diplomaoption', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux options de diplômes'],
            ]],

            ['parent' => 'test-personnelle', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux tests de personnalité'],
            ]],

            ['parent' => 'contact-test-personnelle', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux candidats invités au test'],
                ['name' => 'create', 'action' => 'Inviter', 'task' => 'Inviter un(e) candidat(e)'],
                ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher les candidats invités'],
                ['name' => 'show', 'action' => 'Afficher', 'task' => 'Afficher les détails du/de la candidat(e)'],
            ]],


            ['parent' => 'modele-predictif', 'permissions' => [
                ['name' => 'access', 'action' => 'Accéder', 'task' => 'Accéder aux modèles prédictifs'],
                ['name' => 'create', 'action' => 'Créer', 'task' => 'Créer un modèle prédictif'],
                ['name' => 'listing', 'action' => 'Afficher', 'task' => 'Afficher la liste des modèles prédictifs'],
            ]],
        ];


        $parentToModule = [
            'dashboard' => 'Tableau de bord',
            'vivierTalent' => 'Vivier de talents',
            'profile' => 'Profils',
            'client' => 'Clients',
            'mission' => 'Missions',
            'matching' => 'Matching',
            'ats' => 'ATS',
            'test-technique' => 'Tests techniques',
            'event' => 'Événements',
            'Paramètre' => 'Paramètres',
            'utilisateur' => 'Utilisateurs',
            'Rôles-permissions' => 'Rôles et permissions',
            'evaluateurs' => 'Évaluateurs',
            'personnalisation' => 'Personnalisation',
            'prametrage' => 'Paramètres',
            'intégration-(API)' => 'Paramètres',
            'sécurité' => 'Paramètres',
            'notifications' => 'Paramètres',
            'Sauvegarde' => 'Paramètres',
            'emails' => 'Paramètres',
            'logs' => 'Paramètres',
            'candidate-portal' => 'Portail candidat',
            'filiale' => 'Paramètres',
            'agence' => 'Paramètres',
            'companie' => 'Paramètres',
            'activityArea' => 'Paramètres',
            'profession' => 'Paramètres',
            'talentFolder' => 'Paramètres',
            'competence-linguistique' => 'Paramètres',
            'competence-technique' => 'Paramètres',
            'competence-personnelle' => 'Paramètres',
            'diplomaoption' => 'Paramètres',
            'test-personnelle' => 'Tests de personnalité',
            'contact-test-personnelle' => 'Candidats test de personnalité',
            'modele-predictif' => 'Paramètres',
        ];

        foreach ($permissions as $group) {
            $moduleName = $parentToModule[$group['parent']] ?? ucfirst($group['parent']);

            foreach ($group['permissions'] as $permission) {
                Permission::firstOrCreate([
                    'name' => $group['parent'] . '-' . $permission['name'],
                    'parent' => $group['parent'],
                    'module' => $moduleName,
                    'action' => $permission['action'],
                    'task' => $permission['task'],
                    'guard_name' => $guardName,
                ]);
            }
        }
    }
}
