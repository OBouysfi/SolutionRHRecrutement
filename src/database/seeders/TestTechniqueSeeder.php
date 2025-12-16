<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestTechniqueSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [

            [
                'id' => 1343,
                'test_name' => 'Évaluation adaptative Excel 2010',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory. Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2010',
                'duration' => 40,
                'questions_number' => 25
            ],
            [
                'id' => 1059,
                'test_name' => 'Evaluation adaptative Excel 2016',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation. Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory. Rapport avec sous-niveaux par compétence. Description : ce test permet de définir le niveau du candidat en posant des questions pertinentes sélectionnées par un algorithme prenant en compte son niveau.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1060,
                'test_name' => 'Evaluation adaptative Excel 2016 - Français canadien',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation. Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory. Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1163,
                'test_name' => 'Excel 2016-Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation. Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences. Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1304,
                'test_name' => 'Excel 2016-Avancé - Français canadien',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation. Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences. Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1157,
                'test_name' => 'Excel 2016-Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1295,
                'test_name' => 'Excel 2016-Débutant - Français canadien',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1160,
                'test_name' => 'Excel 2016-Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1301,
                'test_name' => 'Excel 2016-Intermédiaire - Français canadien',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1085,
                'test_name' => 'Evaluation adaptative Word 2016',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test permet de définir le niveau du candidat en posant des questions pertinentes sélectionnées par un algorithme prenant en compte son niveau.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1086,
                'test_name' => 'Evaluation adaptative Word 2016 - Français canadien',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1257,
                'test_name' => 'Word 2016-Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1298,
                'test_name' => 'Word 2016-Avancé - Français canadien',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1236,
                'test_name' => 'Word 2016-Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1296,
                'test_name' => 'Word 2016-Débutant - Français canadien',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1249,
                'test_name' => 'Word 2016-Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1297,
                'test_name' => 'Word 2016-Intermédiaire - Français canadien',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1077,
                'test_name' => 'Evaluation adaptative PowerPoint 2016',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test permet de définir le niveau du candidat en posant des questions pertinentes sélectionnées par un algorithme prenant en compte son niveau.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2016',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1273,
                'test_name' => 'PowerPoint 2016-Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1220,
                'test_name' => 'PowerPoint 2016-Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1242,
                'test_name' => 'PowerPoint 2016-Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2016',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1070,
                'test_name' => 'Evaluation adaptative Outlook 2016',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test permet de définir le niveau du candidat en posant des questions pertinentes sélectionnées par un algorithme prenant en compte son niveau.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Outlook 2016',
                'duration' => 40,
                'questions_number' => 15,
            ],
            [
                'id' => 1185,
                'test_name' => 'Outlook 2016- Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Outlook 2016',
                'duration' => 30,
                'questions_number' => 16,
            ],
            [
                'id' => 1175,
                'test_name' => 'Outlook 2016- Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Outlook 2016',
                'duration' => 30,
                'questions_number' => 16,
            ],
            [
                'id' => 1180,
                'test_name' => 'Outlook 2016- Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Outlook 2016',
                'duration' => 30,
                'questions_number' => 16,
            ],
            [
                'id' => 1061,
                'test_name' => 'Evaluation adaptative Excel 2019',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1062,
                'test_name' => 'Evaluation adaptative Excel 2019 - Français canadien',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1164,
                'test_name' => 'Excel 2019-Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1309,
                'test_name' => 'Excel 2019-Avancé - Français canadien',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1158,
                'test_name' => 'Excel 2019-Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1305,
                'test_name' => 'Excel 2019-Débutant - Français canadien',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1161,
                'test_name' => 'Excel 2019-Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1306,
                'test_name' => 'Excel 2019-Intermédiaire - Français canadien',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Excel 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1078,
                'test_name' => 'Evaluation adaptative PowerPoint 2019',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test permet de définir le niveau du candidat en posant des questions pertinentes sélectionnées par un algorithme prenant en compte son niveau.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2019',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1272,
                'test_name' => 'PowerPoint 2019-Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1219,
                'test_name' => 'PowerPoint 2019-Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1241,
                'test_name' => 'PowerPoint 2019-Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'PowerPoint 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1087,
                'test_name' => 'Evaluation adaptative Word 2019',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test permet de définir le niveau du candidat en posant des questions pertinentes sélectionnées par un algorithme prenant en compte son niveau.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1088,
                'test_name' => 'Evaluation adaptative Word 2019 - Français canadien',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Rapport avec sous-niveaux par compétence.
                                    Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français canadien',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1279,
                'test_name' => 'Word 2019-Avancé',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1303,
                'test_name' => 'Word 2019-Avancé - Français canadien',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.',
                'language' => 'Français canadien',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1262,
                'test_name' => 'Word 2019-Débutant',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1300,
                'test_name' => 'Word 2019-Débutant - Français canadien',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.',
                'language' => 'Français canadien',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1276,
                'test_name' => 'Word 2019-Intermédiaire',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1302,
                'test_name' => 'Word 2019-Intermédiaire - Français canadien',
                'description' => 'Type de test : Intermédiaire – niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français canadien',
                'group' => 'Bureautique',
                'category' => 'Word 2019',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1089,
                'test_name' => 'Evaluation adaptative WordPress',
                'description' => 'Type de test : Adaptatif – le niveau de difficulté des questions s\'adapte en fonction des réponses du candidat avec une récurrence définie pour les questions de manipulation.
                                    Résultat : niveau sur une échelle de 1 à 5 calculé à l\'aide d\'un modèle basé sur l\'Item Response Theory.
                                    Description : ce test d’évaluation comporte cinq niveaux d\'initial à expert.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'WordPress',
                'duration' => 40,
                'questions_number' => 25,
            ],
            [
                'id' => 1148,
                'test_name' => 'WordPress-Avancé (FR)',
                'description' => 'Type de test : Avancé – niveau de difficulté des questions avancé avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau avancé permettant une productivité optimale dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'WordPress',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1146,
                'test_name' => 'WordPress-Débutant (FR)',
                'description' => 'Type de test : Débutant – niveau de difficulté des questions débutant avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau débutant permettant la réalisation de tâches simples dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'WordPress',
                'duration' => 30,
                'questions_number' => 20,
            ],
            [
                'id' => 1147,
                'test_name' => 'WordPress-Intermédiaire (FR)',
                'description' => 'Type de test : Intermédiaire– niveau de difficulté des questions intermédiaire avec une récurrence définie pour les questions de manipulation.
                                    Résultat : rapport avec nombre de points par question, score sur 100 et histogrammes par compétences.
                                    Description : ce test couvre les compétences les plus utilisées à un niveau intermédiaire permettant l\'autonomie sur les opérations courantes dans l\'environnement professionnel.',
                'language' => 'Français',
                'group' => 'Bureautique',
                'category' => 'WordPress',
                'duration' => 30,
                'questions_number' => 20,
            ],

            [
                'id' => 1333,
                'test_name' => 'Python - Avancé',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par question. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec plus de 3 ans d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'Python 3',
                'duration' => 45,
                'questions_number' => 10,
            ],
            [
                'id' => 1340,
                'test_name' => 'Python - Débutant',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par question. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec moins d\'un an d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'Python 3',
                'duration' => 45,
                'questions_number' => 10,
            ],
            [
                'id' => 1331,
                'test_name' => 'Python - Intermédiaire',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par question. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec 1 à 3 ans d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'Python 3',
                'duration' => 45,
                'questions_number' => 10,
            ],
            [
                'id' => 1404,
                'test_name' => 'PHP - Facile',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par questions. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec moins d\'un an d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'PHP',
                'duration' => 45,
                'questions_number' => 10,
            ],
            [
                'id' => 1400,
                'test_name' => 'PHP - Intermédiaire',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par questions. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec 1 à 3 ans d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'PHP',
                'duration' => 45,
                'questions_number' => 10,
            ],
            [
                'id' => 1341,
                'test_name' => 'Java - Avancé',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par questions. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec 3 à 5 ans d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'Java',
                'duration' => 60,
                'questions_number' => 10,
            ],
            //            [
            //                'id' => -164,
            //                'test_name' => 'Java - Débutant',
            //                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
            //                                    Résultat : 100 points par questions. Score total sur 1000.
            //                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
            //                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
            //                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec moins d\'un an d\'expérience.',
            //                'language' => 'Français',
            //                'group' => 'Codage',
            //                'category' => 'Java',
            //                'duration' => 60,
            //                'questions_number' => 10,
            //            ],
            [
                'id' => 205,
                'test_name' => 'Java - Intermédiaire',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par questions. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec 1 à 3 ans d\'expérience.',
                'language' => 'Français',
                'group' => 'Codage',
                'category' => 'Java',
                'duration' => 60,
                'questions_number' => 10,
            ],
            //            [
            //                'id' => -181,
            //                'test_name' => 'Web (HTML, CSS, JS) - Facile',
            //                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
            //                                    Résultat : 100 points par questions. Score total sur 1000.
            //                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
            //                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
            //                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec moins d\'un an d\'expérience.',
            //                'language' => 'Français',
            //                'group' => 'Codage',
            //                'category' => 'HTML',
            //                'duration' => 45,
            //                'questions_number' => 10,
            //            ],
            [
                'id' => 1397,
                'test_name' => 'C# - Avancé',
                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
                                    Résultat : 100 points par questions. Score total sur 1000.
                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec 3 à 5 ans d\'expérience.',
                'language' => 'Français',
                'group' => 'Autre',
                'category' => 'C#',
                'duration' => 45,
                'questions_number' => 10,
            ],
            //            [
            //                'id' => -168,
            //                'test_name' => 'C# - Facile',
            //                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
            //                                    Résultat : 100 points par questions. Score total sur 1000.
            //                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
            //                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
            //                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec moins d\'un an d\'expérience.',
            //                'language' => 'Français',
            //                'group' => 'Autre',
            //                'category' => 'C#',
            //                'duration' => 45,
            //                'questions_number' => 10,
            //            ],
            //            [
            //                'id' => -171,
            //                'test_name' => 'C# - Intermédiaire',
            //                'description' => 'Type de test : Séquentiel ordonné – Séquence de questions posées systématiquement dans le même ordre.
            //                                    Résultat : 100 points par questions. Score total sur 1000.
            //                                    Description : Cette évaluation développeur permet de déterminer rapidement et avec précision les compétences techniques d\'un développeur.
            //                                    Les évaluations incluent un environnement de développement dans lequel le candidat peut écrire du code, l\'exécuter et analyser les résultats.
            //                                    Les exercices correspondent à une utilisation professionnelle du langage pour des développeurs avec 1 à 3 ans d\'expérience.',
            //                'language' => 'Français',
            //                'group' => 'Autre',
            //                'category' => 'C#',
            //                'duration' => 45,
            //                'questions_number' => 10,
            //            ],


        ];

        DB::table('test_techniques')->insert($data);
    }
}
