<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestTechniqueSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['id' => 2576, 'language' => 2, 'test_name' => 'Anglais languageue étrangère- Compétences écrites et orales (EN)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2108, 'language' => 1, 'test_name' => 'Cobol- Intermédiaire', 'description' => null, 'gra_type_id' => 4],
            ['id' => 2303, 'language' => 2, 'test_name' => 'Evaluation adaptative Adobe Premiere Pro (EN)', 'description' => '725 : Environnement et montage du projet;726 : Éléments visuels;727 : Structure et industrie du projet vidéo;728 : Publication des médias numériques', 'gra_type_id' => 1],
            ['id' => 2305, 'language' => 2, 'test_name' => 'Adobe Premiere Pro-Débutant (EN)', 'description' => '725 : Environnement et montage du projet;726 : Éléments visuels;727 : Structure et industrie du projet vidéo;728 : Publication des médias numériques', 'gra_type_id' => 15],
            ['id' => 2306, 'language' => 2, 'test_name' => 'Adobe Premiere Pro-Intermédiaire (EN)', 'description' => '725 : Environnement et montage du projet;726 : Éléments visuels;727 : Structure et industrie du projet vidéo;728 : Publication des médias numériques', 'gra_type_id' => 15],
            ['id' => 2307, 'language' => 2, 'test_name' => 'Adobe Premiere Pro-Avancé (EN)', 'description' => '725 : Environnement et montage du projet;726 : Éléments visuels;727 : Structure et industrie du projet vidéo;728 : Publication des médias numériques', 'gra_type_id' => 15],
            ['id' => 2353, 'language' => 1, 'test_name' => 'Google Docs-Avancé', 'description' => '638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d\'édition;641 : Objets graphiques et tableaux', 'gra_type_id' => 15],

            ['id' => 2354, 'language' => 2, 'test_name' => 'Google Docs-Avancé (EN)', 'description' => '638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d\'édition;641 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 2546, 'language' => 1, 'test_name' => 'Français languageue étrangère- Compétences écrites', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2547, 'language' => 1, 'test_name' => 'Principes fondamentaux du service client', 'description' => '756 : Savoir-être;757 : Résolution de problèmes;758 : Techniques de base;759 : Orientation vers la clientèle', 'gra_type_id' => 15],
            ['id' => 2572, 'language' => 2, 'test_name' => 'Anglais languageue étrangère- Compétences écrites (EN)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2573, 'language' => 1, 'test_name' => 'Français languageue étrangère- Compétences orales', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2574, 'language' => 2, 'test_name' => 'Anglais languageue étrangère- Compétences orales (EN)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2575, 'language' => 1, 'test_name' => 'Français languageue étrangère- Compétences écrites et Orales', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2106, 'language' => 1, 'test_name' => 'Cobol- Débutant', 'description' => null, 'gra_type_id' => 4],
            ['id' => 2592, 'language' => 1, 'test_name' => 'Évaluation adaptative Power BI', 'description' => '751 : Environnements, outils et méthodes;752 : Modèle de données;753 : Visualisation des données;754 : Plateformes collaboratives', 'gra_type_id' => 1],
            ['id' => 2601, 'language' => 1, 'test_name' => 'Évaluation adaptative Revit Architecture', 'description' => '634 : Utilisation fondamentale;635 : Maîtrise de la modélisation;636 : Documentation du projet;637 : Présentation et communication du projet;673 : Echange  et collaboration', 'gra_type_id' => 1],
            ['id' => 2652, 'language' => 1, 'test_name' => 'Évaluation adaptative Salesforce', 'description' => '645 : Environnement de l\'outil;646 : Gestion de la relation client;647 : Organisation de l\'activité;648 : Gestion des processus de vente', 'gra_type_id' => 1],
            ['id' => 2793, 'language' => 3, 'test_name' => 'Allemand languageue étrangère- Compétences orales (DE)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2795, 'language' => 3, 'test_name' => 'Allemand languageue étrangère- Compétences écrites et orales (DE)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2796, 'language' => 3, 'test_name' => 'Allemand languageue étrangère- Compétences écrites (DE)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2797, 'language' => 5, 'test_name' => 'Espagnol languageue étrangère- Compétences orales (ES)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2798, 'language' => 5, 'test_name' => 'Espagnol languageue étrangère- Compétences écrites (ES)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2799, 'language' => 5, 'test_name' => 'Espagnol languageue étrangère- Compétences écrites et Orales (ES)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2862, 'language' => 4, 'test_name' => 'Néerlandais languageue étrangère- Compétences orales (NL)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2863, 'language' => 4, 'test_name' => 'Néerlandais languageue étrangère- Compétences écrites (NL)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 2864, 'language' => 4, 'test_name' => 'Néerlandais languageue étrangère- Compétences écrites et orales (NL)', 'description' => '766 : Production écrite CECRL;767 : Compréhension de l\'oral CECRL;768 : Compréhension de l\'écrit CECRL;769 : Production orale CECRL', 'gra_type_id' => 28],
            ['id' => 1882, 'language' => 2, 'test_name' => 'WordPress-Intermédiaire (EN)', 'description' => '578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets', 'gra_type_id' => 15],
            ['id' => 1794, 'language' => 2, 'test_name' => 'Évaluation adaptative Développeur Web (EN)', 'description' => null, 'gra_type_id' => 26],
            ['id' => 1797, 'language' => 2, 'test_name' => 'Gestion de l\'environnement Windows niveau débutant (EN)', 'description' => '729 : Configuration de l\'environnement Windows;730 : Utilisation du poste de travail;731 : Gestion des paramètres de sécurité;732 : Résolution des problèmes sur Windows', 'gra_type_id' => 15],
            ['id' => 1798, 'language' => 2, 'test_name' => 'Gestion de l\'environnement Windows niveau intermédiaire (EN)', 'description' => '729 : Configuration de l\'environnement Windows;730 : Utilisation du poste de travail;731 : Gestion des paramètres de sécurité;732 : Résolution des problèmes sur Windows', 'gra_type_id' => 15],
            ['id' => 1799, 'language' => 2, 'test_name' => 'Gestion de l\'environnement Windows niveau avancé (EN)', 'description' => '729 : Configuration de l\'environnement Windows;730 : Utilisation du poste de travail;731 : Gestion des paramètres de sécurité;732 : Résolution des problèmes sur Windows', 'gra_type_id' => 15],
            ['id' => 1803, 'language' => 1, 'test_name' => 'Calcul et raisonnement mathématique -Intermédiaire', 'description' => '711 : Algèbre;712 : Analyse;713 : Calcul;714 : Géométrie;715 : Probabilités statistiques;722 : Logique', 'gra_type_id' => 15],
            ['id' => 1822, 'language' => 1, 'test_name' => 'JavaScript - Débutant', 'description' => '692 : languageage et syntaxe;693 : Structures de données et objets;694 : Packages et API;695 : JavaScript appliqué', 'gra_type_id' => 4],
            ['id' => 1823, 'language' => 2, 'test_name' => 'JavaScript - Débutant (EN)', 'description' => '692 : languageage et syntaxe;693 : Structures de données et objets;694 : Packages et API;695 : JavaScript appliqué', 'gra_type_id' => 4],
            ['id' => 1824, 'language' => 1, 'test_name' => 'JavaScript - Intermédiaire', 'description' => '692 : languageage et syntaxe;693 : Structures de données et objets;694 : Packages et API;695 : JavaScript appliqué', 'gra_type_id' => 4],
            ['id' => 1825, 'language' => 2, 'test_name' => 'JavaScript - Intermédiaire (EN)', 'description' => '692 : languageage et syntaxe;693 : Structures de données et objets;694 : Packages et API;695 : JavaScript appliqué', 'gra_type_id' => 4],
            ['id' => 1826, 'language' => 1, 'test_name' => 'JavaScript - Avancé', 'description' => '692 : languageage et syntaxe;693 : Structures de données et objets;694 : Packages et API;695 : JavaScript appliqué', 'gra_type_id' => 4],
            ['id' => 1827, 'language' => 2, 'test_name' => 'JavaScript - Avancé (EN)', 'description' => '692 : languageage et syntaxe;693 : Structures de données et objets;694 : Packages et API;695 : JavaScript appliqué', 'gra_type_id' => 4],
            ['id' => 1839, 'language' => 2, 'test_name' => 'Évaluation adaptative WordPress (EN)', 'description' => '578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets', 'gra_type_id' => 1],
            ['id' => 1881, 'language' => 2, 'test_name' => 'WordPress-Débutant (EN)', 'description' => '578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets', 'gra_type_id' => 15],
            ['id' => 1793, 'language' => 1, 'test_name' => 'Évaluation adaptative Développeur Web', 'description' => null, 'gra_type_id' => 26],
            ['id' => 1883, 'language' => 2, 'test_name' => 'WordPress-Avancé (EN)', 'description' => '578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets', 'gra_type_id' => 15],
            ['id' => 1906, 'language' => 1, 'test_name' => 'Test de saisie de données numériques', 'description' => null, 'gra_type_id' => 15],
            ['id' => 1925, 'language' => 1, 'test_name' => 'Test de saisie de données alphanumériques', 'description' => null, 'gra_type_id' => 15],
            ['id' => 1926, 'language' => 1, 'test_name' => 'Test de saisie de données numériques (contexte canadien)', 'description' => null, 'gra_type_id' => 15],
            ['id' => 1927, 'language' => 1, 'test_name' => 'Test de saisie de données alphanumériques (contexte canadien)', 'description' => null, 'gra_type_id' => 15],
            ['id' => 1928, 'language' => 2, 'test_name' => 'Test de saisie de données numériques (EN)', 'description' => null, 'gra_type_id' => 15],
            ['id' => 1929, 'language' => 2, 'test_name' => 'Test de saisie de données alphanumériques (EN)', 'description' => null, 'gra_type_id' => 15],
            ['id' => 1943, 'language' => 2, 'test_name' => 'Attention aux détails: texte (EN)', 'description' => null, 'gra_type_id' => 4],
            ['id' => 1944, 'language' => 2, 'test_name' => 'Attention aux détails: visuels (EN)', 'description' => null, 'gra_type_id' => 4],
            ['id' => 1952, 'language' => 2, 'test_name' => 'Classement numérique (EN)', 'description' => null, 'gra_type_id' => 19],
            ['id' => 1953, 'language' => 2, 'test_name' => 'Classement alphabétique (EN)', 'description' => null, 'gra_type_id' => 19],
            ['id' => 1954, 'language' => 2, 'test_name' => 'Classement chronologique (EN)', 'description' => null, 'gra_type_id' => 19],
            ['id' => 1256, 'language' => 5, 'test_name' => 'PowerPoint 2016- Intermédiaire (ES)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],
            ['id' => 1257, 'language' => 1, 'test_name' => 'Word 2016-Avancé', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1258, 'language' => 2, 'test_name' => 'Word 2016 - Avancé (EN)', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1259, 'language' => 4, 'test_name' => 'Word 2016-Avancé  (NL)', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1260, 'language' => 5, 'test_name' => 'Word 2016- Avancé (ES)', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1261, 'language' => 6, 'test_name' => 'Word 2016- Avancé (IT)', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1262, 'language' => 1, 'test_name' => 'Word 2019-Débutant', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1263, 'language' => 2, 'test_name' => 'Word 2019 - Débutant (EN)', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1264, 'language' => 3, 'test_name' => 'Word 2019-Débutant (DE)', 'description' => '570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d\'édition;573 : Objets graphiques et tableaux', 'gra_type_id' => 15],
            ['id' => 1265, 'language' => 5, 'test_name' => 'PowerPoint 2016- Avancé (ES)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],
            ['id' => 1266, 'language' => 6, 'test_name' => 'PowerPoint 2016- Avancé (IT)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],
            ['id' => 1267, 'language' => 4, 'test_name' => 'PowerPoint 2016-Avancé (NL)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],
            ['id' => 1268, 'language' => 4, 'test_name' => 'PowerPoint 2013-Avancé (NL)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],
            ['id' => 1269, 'language' => 2, 'test_name' => 'PowerPoint 2016 - Avancé (EN)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],
            ['id' => 1270, 'language' => 2, 'test_name' => 'PowerPoint 2019 - Avancé (EN)', 'description' => '566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama', 'gra_type_id' => 15],



            [
                'id' => 1271,
                'language' => 2,
                'test_name' => "PowerPoint 2013 - Avancé (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1272,
                'language' => 1,
                'test_name' => "PowerPoint 2019-Avancé",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1273,
                'language' => 1,
                'test_name' => "PowerPoint 2016-Avancé",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1274,
                'language' => 1,
                'test_name' => "PowerPoint 2013-Avancé",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1275,
                'language' => 3,
                'test_name' => "PowerPoint 2019-Avancé (DE)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1276,
                'language' => 1,
                'test_name' => "Word 2019-Intermédiaire",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1277,
                'language' => 2,
                'test_name' => "Word 2019 - Intermédiaire (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1278,
                'language' => 3,
                'test_name' => "Word 2019-Intermédiaire (DE)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1279,
                'language' => 1,
                'test_name' => "Word 2019-Avancé",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1280,
                'language' => 2,
                'test_name' => "Word 2019 - Avancé (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1281,
                'language' => 3,
                'test_name' => "Word 2019-Avancé (DE)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1282,
                'language' => 1,
                'test_name' => "Word 2013-Débutant",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1283,
                'language' => 2,
                'test_name' => "Word 2013 - Débutant (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1284,
                'language' => 4,
                'test_name' => "Word 2013-Débutant (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1285,
                'language' => 1,
                'test_name' => "Word 2013-Intermédiaire",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1286,
                'language' => 2,
                'test_name' => "Word 2013 - Intermédiaire (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1287,
                'language' => 4,
                'test_name' => "Word 2013-Intermédiaire (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1288,
                'language' => 1,
                'test_name' => "Word 2013-Avancé",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1289,
                'language' => 2,
                'test_name' => "Word 2013 - Avancé (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1290,
                'language' => 4,
                'test_name' => "Word 2013-Avancé (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1295,
                'language' => 1,
                'test_name' => "Excel 2016-Débutant - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1296,
                'language' => 1,
                'test_name' => "Word 2016-Débutant - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1297,
                'language' => 1,
                'test_name' => "Word 2016-Intermédiaire - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1298,
                'language' => 1,
                'test_name' => "Word 2016-Avancé - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1300,
                'language' => 1,
                'test_name' => "Word 2019-Débutant - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1301,
                'language' => 1,
                'test_name' => "Excel 2016-Intermédiaire - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1302,
                'language' => 1,
                'test_name' => "Word 2019-Intermédiaire - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1303,
                'language' => 1,
                'test_name' => "Word 2019-Avancé - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1304,
                'language' => 1,
                'test_name' => "Excel 2016-Avancé - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1305,
                'language' => 1,
                'test_name' => "Excel 2019-Débutant - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1306,
                'language' => 1,
                'test_name' => "Excel 2019-Intermédiaire - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1307,
                'language' => 1,
                'test_name' => "DigComp-Débutant - Français canadien",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1308,
                'language' => 1,
                'test_name' => "DigComp-Intermédiaire - Français canadien",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1309,
                'language' => 1,
                'test_name' => "Excel 2019-Avancé - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1310,
                'language' => 1,
                'test_name' => "DigComp-Avancé - Français canadien",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1327,
                'language' => 2,
                'test_name' => "Python - Débutant (EN)",
                'description' => "614 : languageage et syntaxe;615 : Structures de données et objets;616 : Modules et packages;617 : Optimisation de code",
                'gra_type_id' => 4
            ],
            [
                'id' => 1331,
                'language' => 1,
                'test_name' => "Python - Intermédiaire",
                'description' => "614 : languageage et syntaxe;615 : Structures de données et objets;616 : Modules et packages;617 : Optimisation de code",
                'gra_type_id' => 4
            ],
            [
                'id' => 1332,
                'language' => 2,
                'test_name' => "Python - Intermédiaire (EN)",
                'description' => "614 : languageage et syntaxe;615 : Structures de données et objets;616 : Modules et packages;617 : Optimisation de code",
                'gra_type_id' => 4
            ],
            [
                'id' => 1333,
                'language' => 1,
                'test_name' => "Python - Avancé",
                'description' => "614 : languageage et syntaxe;615 : Structures de données et objets;616 : Modules et packages;617 : Optimisation de code",
                'gra_type_id' => 4
            ],
            [
                'id' => 1334,
                'language' => 2,
                'test_name' => "Python - Avancé (EN)",
                'description' => "614 : languageage et syntaxe;615 : Structures de données et objets;616 : Modules et packages;617 : Optimisation de code",
                'gra_type_id' => 4
            ],
            [
                'id' => 1335,
                'language' => 2,
                'test_name' => "Classement numérique (EN)",
                'description' => "221 : 1. Se repérer dans l'univers des nombres;222 : 2. Résoudre un problème mettant en jeu une ou plusieurs opérations;223 : 3. Lire et calculer les unités de mesures, de temps et des quantités;224 : 4. Se repérer dans l’espace;225 : 5. Restituer oralement un raisonnement mathématique",
                'gra_type_id' => 14
            ],
            [
                'id' => 1336,
                'language' => 2,
                'test_name' => "Classement chronologique (EN)",
                'description' => "221 : 1. Se repérer dans l'univers des nombres;222 : 2. Résoudre un problème mettant en jeu une ou plusieurs opérations;223 : 3. Lire et calculer les unités de mesures, de temps et des quantités;224 : 4. Se repérer dans l’espace;225 : 5. Restituer oralement un raisonnement mathématique",
                'gra_type_id' => 14
            ],
            [
                'id' => 1337,
                'language' => 1,
                'test_name' => "Classement numérique",
                'description' => "",
                'gra_type_id' => 19
            ],
            [
                'id' => 1338,
                'language' => 1,
                'test_name' => "Classement chronologique",
                'description' => "",
                'gra_type_id' => 19
            ],
            [
                'id' => 1340,
                'language' => 1,
                'test_name' => "Python - Débutant",
                'description' => "614 : languageage et syntaxe;615 : Structures de données et objets;616 : Modules et packages;617 : Optimisation de code",
                'gra_type_id' => 4
            ],
            [
                'id' => 1341,
                'language' => 1,
                'test_name' => "Java - Avancé",
                'description' => "45 : Algorithmique;53 : languageage et syntaxe;54 : Java appliqué;55 : Les objets Java et l'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1342,
                'language' => 2,
                'test_name' => "Java - Avancé (EN)",
                'description' => "45 : Algorithmique;53 : languageage et syntaxe;54 : Java appliqué;55 : Les objets Java et l'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1343,
                'language' => 1,
                'test_name' => "Évaluation adaptative Excel 2010",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1346,
                'language' => 2,
                'test_name' => "Google Docs-Débutant (EN)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1347,
                'language' => 2,
                'test_name' => "Google Docs-Intermédiaire (EN)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1349,
                'language' => 2,
                'test_name' => "Evaluation adaptative Google Docs (EN)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1356,
                'language' => 1,
                'test_name' => "Photoshop-Débutant (sans manipulation)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1357,
                'language' => 1,
                'test_name' => "Photoshop-Intermédiaire",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1358,
                'language' => 1,
                'test_name' => "Photoshop-Débutant",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1360,
                'language' => 1,
                'test_name' => "Photoshop-Intermédiaire (sans manipulation)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1361,
                'language' => 1,
                'test_name' => "Photoshop-Avancé (sans manipulation)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1362,
                'language' => 1,
                'test_name' => "Evaluation adaptative Photoshop avec manipulation",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 1
            ],
            [
                'id' => 1363,
                'language' => 1,
                'test_name' => "Evaluation adaptative Photoshop sans manipulation",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 1
            ],
            [
                'id' => 1364,
                'language' => 1,
                'test_name' => "Photoshop-Avancé",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1371,
                'language' => 1,
                'test_name' => "React - Facile",
                'description' => "687 : Culture générale et bonnes pratiques;688 : React appliqué;689 : Fonctionnement théorique de React",
                'gra_type_id' => 4
            ],
            [
                'id' => 1372,
                'language' => 2,
                'test_name' => "React - Facile (EN)",
                'description' => "687 : Culture générale et bonnes pratiques;688 : React appliqué;689 : Fonctionnement théorique de React",
                'gra_type_id' => 4
            ],
            [
                'id' => 1373,
                'language' => 1,
                'test_name' => "React - Intermédiaire",
                'description' => "687 : Culture générale et bonnes pratiques;688 : React appliqué;689 : Fonctionnement théorique de React",
                'gra_type_id' => 4
            ],
            [
                'id' => 1374,
                'language' => 2,
                'test_name' => "React - Intermédiaire (EN)",
                'description' => "687 : Culture générale et bonnes pratiques;688 : React appliqué;689 : Fonctionnement théorique de React",
                'gra_type_id' => 4
            ],
            [
                'id' => 1376,
                'language' => 2,
                'test_name' => "Web : HTML, CSS, JS - Easy (EN)",
                'description' => "67 : HTML;68 : CSS;69 : Javascript;70 : JQuery;71 : Intégration Développeur Web;702 : Intégration",
                'gra_type_id' => 4
            ],
            [
                'id' => 1385,
                'language' => 5,
                'test_name' => "Evaluation adaptative Excel 2019 (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1386,
                'language' => 5,
                'test_name' => "Excel 2019- Débutant (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1387,
                'language' => 5,
                'test_name' => "Excel 2019- Intermédiaire (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1388,
                'language' => 5,
                'test_name' => "Excel 2019- Avancé (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1389,
                'language' => 5,
                'test_name' => "Évaluation TOSA Word 2019 (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1392,
                'language' => 5,
                'test_name' => "Evaluation adaptative Word 2019 (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1396,
                'language' => 2,
                'test_name' => "C# - Avancé (EN)",
                'description' => "58 : Bases du C# et fonctions C#;59 : C# appliqué;60 : Les objets C# et l'organisation des classes;61 : Algorithmie",
                'gra_type_id' => 4
            ],
            [
                'id' => 1397,
                'language' => 1,
                'test_name' => "C# - Avancé",
                'description' => "58 : Bases du C# et fonctions C#;59 : C# appliqué;60 : Les objets C# et l'organisation des classes;61 : Algorithmie",
                'gra_type_id' => 4
            ],
            [
                'id' => 1399,
                'language' => 2,
                'test_name' => "PHP - Facile (EN)",
                'description' => "44 : Bases du PHP et fonctions PHP;45 : Algorithmique;46 : PHP appliqué;47 : Objets php et méthodologie d'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1400,
                'language' => 1,
                'test_name' => "PHP - Intermédiaire",
                'description' => "44 : Bases du PHP et fonctions PHP;45 : Algorithmique;46 : PHP appliqué;47 : Objets php et méthodologie d'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1401,
                'language' => 1,
                'test_name' => "PHP - Avancé",
                'description' => "44 : Bases du PHP et fonctions PHP;45 : Algorithmique;46 : PHP appliqué;47 : Objets php et méthodologie d'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1402,
                'language' => 2,
                'test_name' => "PHP - Intermédiaire (EN)",
                'description' => "44 : Bases du PHP et fonctions PHP;45 : Algorithmique;46 : PHP appliqué;47 : Objets php et méthodologie d'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1403,
                'language' => 2,
                'test_name' => "PHP - Avancé (EN)",
                'description' => "44 : Bases du PHP et fonctions PHP;45 : Algorithmique;46 : PHP appliqué;47 : Objets php et méthodologie d'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1404,
                'language' => 1,
                'test_name' => "PHP - Facile",
                'description' => "44 : Bases du PHP et fonctions PHP;45 : Algorithmique;46 : PHP appliqué;47 : Objets php et méthodologie d'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 1413,
                'language' => 5,
                'test_name' => "Word 2019- Débutant (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1414,
                'language' => 5,
                'test_name' => "Word 2019- Intermédiaire (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1415,
                'language' => 5,
                'test_name' => "Word 2019- Avancé (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],

            [
                'id' => 1424,
                'language' => 5,
                'test_name' => "Evaluation adaptative PowerPoint 2019 (ES)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1432,
                'language' => 5,
                'test_name' => "PowerPoint 2019- Débutant (ES)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1433,
                'language' => 5,
                'test_name' => "PowerPoint 2019- Intermédiaire (ES)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1434,
                'language' => 5,
                'test_name' => "PowerPoint 2019- Avancé (ES)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1447,
                'language' => 2,
                'test_name' => "Evaluation adaptative Photoshop 2021 (anglais)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 1
            ],
            [
                'id' => 1448,
                'language' => 2,
                'test_name' => "Evaluation adaptative Photoshop 2021 avec manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 1
            ],
            [
                'id' => 1450,
                'language' => 2,
                'test_name' => "Photoshop-Débutant (sans manip) (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1453,
                'language' => 2,
                'test_name' => "Photoshop-Intermédiaire (sans manip) (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1454,
                'language' => 2,
                'test_name' => "Photoshop-Avancé sans manip (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1465,
                'language' => 1,
                'test_name' => "Evaluation adaptative CyberCitizen",
                'description' => "659 : Le monde de la cybersécurité;660 : La sécurité au bureau;661 : La sécurité en déplacement;662 : La sécurité à la maison",
                'gra_type_id' => 1
            ],
            [
                'id' => 1466,
                'language' => 2,
                'test_name' => "Evaluation adaptative CyberCitizen (EN)",
                'description' => "659 : Le monde de la cybersécurité;660 : La sécurité au bureau;661 : La sécurité en déplacement;662 : La sécurité à la maison",
                'gra_type_id' => 1
            ],
            [
                'id' => 1468,
                'language' => 1,
                'test_name' => "Rédaction d'un courriel professionnel",
                'description' => "426 : Accord sujet verbe;427 : Homophones;428 : Accord des participes passés;429 : Orthographe;430 : Anglicismes;431 : Accord du groupe nom;432 : Ponctuation;513 : Compréhension écrite;524 : Genre;525 : Conjugaison;534 : Vocabulaire;555 : Syntaxe;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;696 : Grammaire;737 : Règles de lisibilité;738 : Formulation efficace et convaincante;739 : E-mails professionnels;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1469,
                'language' => 2,
                'test_name' => "Rédaction d'un courriel professionnel (EN)",
                'description' => "434 : Grammaire;435 : Orthographe;436 : Conjugaison;513 : Compréhension écrite;514 : Vocabulaire;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;698 : Syntaxe;718 : Catalogues Isograd;719 : Contenus Isograd;720 : Plateformes Isograd;721 : Communication avec les équipes - Isograd;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1470,
                'language' => 1,
                'test_name' => "Compréhension de l'écrit",
                'description' => "426 : Accord sujet verbe;427 : Homophones;428 : Accord des participes passés;429 : Orthographe;430 : Anglicismes;431 : Accord du groupe nom;432 : Ponctuation;513 : Compréhension écrite;524 : Genre;525 : Conjugaison;534 : Vocabulaire;555 : Syntaxe;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;696 : Grammaire;737 : Règles de lisibilité;738 : Formulation efficace et convaincante;739 : E-mails professionnels;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1471,
                'language' => 2,
                'test_name' => "Compréhension de l'écrit (EN)",
                'description' => "434 : Grammaire;435 : Orthographe;436 : Conjugaison;513 : Compréhension écrite;514 : Vocabulaire;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;698 : Syntaxe;718 : Catalogues Isograd;719 : Contenus Isograd;720 : Plateformes Isograd;721 : Communication avec les équipes - Isograd;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1476,
                'language' => 1,
                'test_name' => "Se présenter dans un contexte professionnel",
                'description' => "426 : Accord sujet verbe;427 : Homophones;428 : Accord des participes passés;429 : Orthographe;430 : Anglicismes;431 : Accord du groupe nom;432 : Ponctuation;513 : Compréhension écrite;524 : Genre;525 : Conjugaison;534 : Vocabulaire;555 : Syntaxe;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;696 : Grammaire;737 : Règles de lisibilité;738 : Formulation efficace et convaincante;739 : E-mails professionnels;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1477,
                'language' => 2,
                'test_name' => "Se présenter dans un contexte professionnel",
                'description' => "434 : Grammaire;435 : Orthographe;436 : Conjugaison;513 : Compréhension écrite;514 : Vocabulaire;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;698 : Syntaxe;718 : Catalogues Isograd;719 : Contenus Isograd;720 : Plateformes Isograd;721 : Communication avec les équipes - Isograd;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1478,
                'language' => 1,
                'test_name' => "Maîtrise de l'écrit professionnel",
                'description' => "426 : Accord sujet verbe;427 : Homophones;428 : Accord des participes passés;429 : Orthographe;430 : Anglicismes;431 : Accord du groupe nom;432 : Ponctuation;513 : Compréhension écrite;524 : Genre;525 : Conjugaison;534 : Vocabulaire;555 : Syntaxe;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;696 : Grammaire;737 : Règles de lisibilité;738 : Formulation efficace et convaincante;739 : E-mails professionnels;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1479,
                'language' => 2,
                'test_name' => "Maîtrise de l'écrit professionnel (EN)",
                'description' => "434 : Grammaire;435 : Orthographe;436 : Conjugaison;513 : Compréhension écrite;514 : Vocabulaire;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;698 : Syntaxe;718 : Catalogues Isograd;719 : Contenus Isograd;720 : Plateformes Isograd;721 : Communication avec les équipes - Isograd;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 15
            ],
            [
                'id' => 1480,
                'language' => 2,
                'test_name' => "Google Slides-Débutant (EN)",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 1481,
                'language' => 2,
                'test_name' => "Google Slides-Intermédiaire (EN)",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 1482,
                'language' => 2,
                'test_name' => "Google Slides-Avancé (EN)",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 1483,
                'language' => 1,
                'test_name' => "Français professionnel intermédiaire",
                'description' => "426 : Accord sujet verbe;427 : Homophones;428 : Accord des participes passés;429 : Orthographe;430 : Anglicismes;431 : Accord du groupe nom;432 : Ponctuation;513 : Compréhension écrite;524 : Genre;525 : Conjugaison;534 : Vocabulaire;555 : Syntaxe;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;696 : Grammaire;737 : Règles de lisibilité;738 : Formulation efficace et convaincante;739 : E-mails professionnels;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 25
            ],
            [
                'id' => 1485,
                'language' => 3,
                'test_name' => "Evaluation adaptative DigComp (Allemand)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1486,
                'language' => 3,
                'test_name' => "DigComp-Débutant (DE)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1487,
                'language' => 3,
                'test_name' => "DigComp-Intermédiaire (DE)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1488,
                'language' => 3,
                'test_name' => "DigComp-Avancé (DE)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1491,
                'language' => 2,
                'test_name' => "Anglais professionnel intermédiaire (EN)",
                'description' => "434 : Grammaire;435 : Orthographe;436 : Conjugaison;513 : Compréhension écrite;514 : Vocabulaire;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;698 : Syntaxe;718 : Catalogues Isograd;719 : Contenus Isograd;720 : Plateformes Isograd;721 : Communication avec les équipes - Isograd;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 25
            ],
            [
                'id' => 1496,
                'language' => 2,
                'test_name' => "Photoshop 2021-Avancé (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1497,
                'language' => 2,
                'test_name' => "Photoshop 2021-Intermédiaire (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1498,
                'language' => 2,
                'test_name' => "Photoshop 2021-Débutant (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 1505,
                'language' => 1,
                'test_name' => "Calcul et raisonnement mathématique - Débutant",
                'description' => "711 : Algèbre;712 : Analyse;713 : Calcul;714 : Géométrie;715 : Probabilités statistiques;722 : Logique",
                'gra_type_id' => 15
            ],
            [
                'id' => 1506,
                'language' => 1,
                'test_name' => "Sécurité, hygiène et posture - Débutant",
                'description' => "",
                'gra_type_id' => 15
            ],
            [
                'id' => 1532,
                'language' => 4,
                'test_name' => "Evaluation adaptative Excel 2021 (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1533,
                'language' => 4,
                'test_name' => "Excel 2021-Débutant (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1534,
                'language' => 4,
                'test_name' => "Excel 2021-Avancé (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1536,
                'language' => 4,
                'test_name' => "Excel 2021-Intermédiaire (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1548,
                'language' => 4,
                'test_name' => "Evaluation adaptative Word 2021 (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1552,
                'language' => 1,
                'test_name' => "Evaluation adaptative Access 2019",
                'description' => "299 : Tables et requêtes;305 : Formulaires et états;306 : Macros & VBA",
                'gra_type_id' => 1
            ],
            [
                'id' => 1554,
                'language' => 1,
                'test_name' => "Access 2019-Intermédiaire",
                'description' => "299 : Tables et requêtes;305 : Formulaires et états;306 : Macros & VBA",
                'gra_type_id' => 15
            ],
            [
                'id' => 1566,
                'language' => 1,
                'test_name' => "Collecte et analyse des pièces justificatives comptables (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1569,
                'language' => 1,
                'test_name' => "Enregistrement des écritures de régularisations (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1570,
                'language' => 1,
                'test_name' => "Production des états financiers (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1571,
                'language' => 1,
                'test_name' => "Repérage d'erreurs et correction (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1572,
                'language' => 1,
                'test_name' => "Réalisation d'analyse financière (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1573,
                'language' => 1,
                'test_name' => "Soutien à la fiscalité (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1580,
                'language' => 1,
                'test_name' => "Evaluation adaptative Google Sheets",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1581,
                'language' => 2,
                'test_name' => "Calcul et raisonnement mathématique (EN)- Débutant",
                'description' => "711 : Algèbre;712 : Analyse;713 : Calcul;714 : Géométrie;715 : Probabilités statistiques;722 : Logique",
                'gra_type_id' => 15
            ],
            [
                'id' => 1582,
                'language' => 2,
                'test_name' => "Sécurité, hygiène et posture - Débutant (EN)",
                'description' => "",
                'gra_type_id' => 15
            ],
            [
                'id' => 1583,
                'language' => 1,
                'test_name' => "Google Sheets-Débutant",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1584,
                'language' => 1,
                'test_name' => "Google Sheets-Intermédiaire",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1585,
                'language' => 1,
                'test_name' => "Google Sheets-Avancé",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1589,
                'language' => 4,
                'test_name' => "Evaluation adaptative PowerPoint 2021 (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1594,
                'language' => 1,
                'test_name' => "Évaluation Adaptative Plateforme Collaborative 365",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 1
            ],
            [
                'id' => 1604,
                'language' => 1,
                'test_name' => "Plateforme Collaborative Office 365-Débutant",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 15
            ],
            [
                'id' => 1605,
                'language' => 1,
                'test_name' => "Plateforme Collaborative Office 365-Intermédiaire",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 15
            ],
            [
                'id' => 1606,
                'language' => 1,
                'test_name' => "Plateforme Collaborative Office 365-Avancé",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 15
            ],
            [
                'id' => 1607,
                'language' => 2,
                'test_name' => "Évaluation adaptative AutoCAD (EN)",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 1
            ],
            [
                'id' => 1615,
                'language' => 4,
                'test_name' => "PowerPoint 2021-Débutant (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1616,
                'language' => 4,
                'test_name' => "PowerPoint 2021-Intermédiaire (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1617,
                'language' => 4,
                'test_name' => "PowerPoint 2021-Avancé (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1618,
                'language' => 2,
                'test_name' => "AutoCAD-Avancé (EN)",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1619,
                'language' => 2,
                'test_name' => "AutoCAD-Intermédiaire (EN)",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1620,
                'language' => 2,
                'test_name' => "AutoCAD-Débutant (EN)",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1634,
                'language' => 2,
                'test_name' => "Évaluation Adaptative Plateforme Collaborative 365 (EN)",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 1
            ],
            [
                'id' => 1636,
                'language' => 2,
                'test_name' => "Plateforme Collaborative Office 365-Débutant (EN)",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 15
            ],
            [
                'id' => 1637,
                'language' => 2,
                'test_name' => "Plateforme Collaborative Office 365-Intermédiaire (EN)",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 15
            ],
            [
                'id' => 1638,
                'language' => 2,
                'test_name' => "Plateforme Collaborative Office 365-Avancé (EN)",
                'description' => "622 : Environnement 365;623 : Partage et stockage de fichiers;624 : Organisation;625 : Communication",
                'gra_type_id' => 15
            ],
            [
                'id' => 1645,
                'language' => 4,
                'test_name' => "Word 2021-Débutant (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1646,
                'language' => 4,
                'test_name' => "Word 2021-Intermédiaire (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1647,
                'language' => 4,
                'test_name' => "Word 2021-Avancé (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1652,
                'language' => 1,
                'test_name' => "Evaluation adaptative Google Docs",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1654,
                'language' => 1,
                'test_name' => "Google Docs-Débutant",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1655,
                'language' => 1,
                'test_name' => "Google Docs-Intermédiaire",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1658,
                'language' => 1,
                'test_name' => "Google Slides-Avancé",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 1659,
                'language' => 1,
                'test_name' => "Google Slides-Débutant",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 1660,
                'language' => 1,
                'test_name' => "Google Slides-Intermédiaire",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 1662,
                'language' => 1,
                'test_name' => "Évaluation adaptative Google Slides",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 1
            ],
            [
                'id' => 1688,
                'language' => 1,
                'test_name' => "SharePoint-Intermédiaire",
                'description' => "19",
                'gra_type_id' => 15
            ],
            [
                'id' => 1689,
                'language' => 1,
                'test_name' => "Teams-Intermédiaire",
                'description' => "19",
                'gra_type_id' => 15
            ],
            [
                'id' => 1690,
                'language' => 1,
                'test_name' => "OneDrive-Intermédiaire",
                'description' => "19",
                'gra_type_id' => 15
            ],
            [
                'id' => 1696,
                'language' => 1,
                'test_name' => "Test de terminologie médicale",
                'description' => "733 : Démarches administratives;734 : Personnel médical;735 : Pharmacologie;736 : Terminologie médicale",
                'gra_type_id' => 15
            ],
            [
                'id' => 1697,
                'language' => 1,
                'test_name' => "Gestion de la paie (CA)",
                'description' => "703 : Collecte et analyse des pièces justificatives;704 : Enregistrement des transactions au journal général;705 : Enregistrement des écritures de régularisation;706 : Production des états financiers;707 : Repérage d'erreurs et correction;708 : Réalisation d'analyse financière;709 : Soutien à la fiscalité;742 : Gestion de la paie",
                'gra_type_id' => 15
            ],
            [
                'id' => 1698,
                'language' => 2,
                'test_name' => "Teams-Intermédiaire (EN)",
                'description' => "19",
                'gra_type_id' => 15
            ],
            [
                'id' => 1699,
                'language' => 2,
                'test_name' => "SharePoint-Intermédiaire (EN)",
                'description' => "19",
                'gra_type_id' => 15
            ],
            [
                'id' => 1702,
                'language' => 2,
                'test_name' => "OneDrive-Intermédiaire (EN)",
                'description' => "19",
                'gra_type_id' => 15
            ],
            [
                'id' => 1710,
                'language' => 3,
                'test_name' => "Évaluation adaptative Outlook 2016 (DE)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1718,
                'language' => 1,
                'test_name' => "Test de languageue française (contexte canadien)",
                'description' => "426 : Accord sujet verbe;427 : Homophones;428 : Accord des participes passés;429 : Orthographe;430 : Anglicismes;431 : Accord du groupe nom;432 : Ponctuation;513 : Compréhension écrite;524 : Genre;525 : Conjugaison;534 : Vocabulaire;555 : Syntaxe;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;696 : Grammaire;737 : Règles de lisibilité;738 : Formulation efficace et convaincante;739 : E-mails professionnels;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 25
            ],
            [
                'id' => 1723,
                'language' => 1,
                'test_name' => "Gestion de l'environnement Windows niveau débutant",
                'description' => "729 : Configuration de l'environnement Windows;730 : Utilisation du poste de travail;731 : Gestion des paramètres de sécurité;732 : Résolution des problèmes sur Windows",
                'gra_type_id' => 15
            ],
            [
                'id' => 1724,
                'language' => 1,
                'test_name' => "Gestion de l'environnement Windows niveau intermédiaire",
                'description' => "729 : Configuration de l'environnement Windows;730 : Utilisation du poste de travail;731 : Gestion des paramètres de sécurité;732 : Résolution des problèmes sur Windows",
                'gra_type_id' => 15
            ],
            [
                'id' => 1726,
                'language' => 1,
                'test_name' => "Rédaction Professionnelle",
                'description' => "",
                'gra_type_id' => 25
            ],
            [
                'id' => 1733,
                'language' => 1,
                'test_name' => "Gestion de l'environnement Windows niveau avancé",
                'description' => "729 : Configuration de l'environnement Windows;730 : Utilisation du poste de travail;731 : Gestion des paramètres de sécurité;732 : Résolution des problèmes sur Windows",
                'gra_type_id' => 15
            ],
            [
                'id' => 181,
                'language' => 1,
                'test_name' => "Web (HTML, CSS, JS) - Facile",
                'description' => "67 : HTML;68 : CSS;69 : Javascript;70 : JQuery;71 : Intégration Développeur Web;702 : Intégration",
                'gra_type_id' => 4
            ],
            [
                'id' => 171,
                'language' => 1,
                'test_name' => "C# - Intermédiaire",
                'description' => "58 : Bases du C# et fonctions C#;59 : C# appliqué;60 : Les objets C# et l'organisation des classes;61 : Algorithmie",
                'gra_type_id' => 4
            ],
            [
                'id' => 170,
                'language' => 2,
                'test_name' => "C# - Facile (EN)",
                'description' => "58 : Bases du C# et fonctions C#;59 : C# appliqué;60 : Les objets C# et l'organisation des classes;61 : Algorithmie",
                'gra_type_id' => 4
            ],
            [
                'id' => 168,
                'language' => 1,
                'test_name' => "C# - Facile",
                'description' => "58 : Bases du C# et fonctions C#;59 : C# appliqué;60 : Les objets C# et l'organisation des classes;61 : Algorithmie",
                'gra_type_id' => 4
            ],
            [
                'id' => 165,
                'language' => 2,
                'test_name' => "Java - Débutant (EN)",
                'description' => "45 : Algorithmique;53 : languageage et syntaxe;54 : Java appliqué;55 : Les objets Java et l'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 164,
                'language' => 1,
                'test_name' => "Java - Débutant",
                'description' => "45 : Algorithmique;53 : languageage et syntaxe;54 : Java appliqué;55 : Les objets Java et l'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 205,
                'language' => 1,
                'test_name' => "Java - Intermédiaire",
                'description' => "45 : Algorithmique;53 : languageage et syntaxe;54 : Java appliqué;55 : Les objets Java et l'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 318,
                'language' => 2,
                'test_name' => "C# - Intermédiaire (EN)",
                'description' => "58 : Bases du C# et fonctions C#;59 : C# appliqué;60 : Les objets C# et l'organisation des classes;61 : Algorithmie",
                'gra_type_id' => 4
            ],
            [
                'id' => 451,
                'language' => 2,
                'test_name' => "Java - Intermédiaire (EN)",
                'description' => "45 : Algorithmique;53 : languageage et syntaxe;54 : Java appliqué;55 : Les objets Java et l'organisation des classes",
                'gra_type_id' => 4
            ],
            [
                'id' => 552,
                'language' => 1,
                'test_name' => "Évaluation Angular (QCM)",
                'description' => "494 : Généralités;495 : Architecture, components directives et pipes;496 : Injection de dépendance et modules;502 : TypeScript (surensemble Javascript)",
                'gra_type_id' => 4
            ],
            [
                'id' => 563,
                'language' => 2,
                'test_name' => "Test de frappe (EN)",
                'description' => "",
                'gra_type_id' => 15
            ],
            [
                'id' => 564,
                'language' => 1,
                'test_name' => "Test de frappe",
                'description' => "",
                'gra_type_id' => 15
            ],
            [
                'id' => 840,
                'language' => 1,
                'test_name' => "Dactylographie",
                'description' => "",
                'gra_type_id' => 16
            ],
            [
                'id' => 841,
                'language' => 2,
                'test_name' => "Dactylographie (EN)",
                'description' => "",
                'gra_type_id' => 16
            ],
            [
                'id' => 844,
                'language' => 1,
                'test_name' => "Classement alphabétique",
                'description' => "",
                'gra_type_id' => 19
            ],
            [
                'id' => 847,
                'language' => 2,
                'test_name' => "Classement alphabétique (EN)",
                'description' => "221 : 1. Se repérer dans l'univers des nombres;222 : 2. Résoudre un problème mettant en jeu une ou plusieurs opérations;223 : 3. Lire et calculer les unités de mesures, de temps et des quantités;224 : 4. Se repérer dans l’espace;225 : 5. Restituer oralement un raisonnement mathématique",
                'gra_type_id' => 14
            ],
            [
                'id' => 849,
                'language' => 2,
                'test_name' => "Rédaction Professionnelle (EN)",
                'description' => "",
                'gra_type_id' => 15
            ],
            [
                'id' => 926,
                'language' => 2,
                'test_name' => "languageue : Anglais - intermédiaire (EN)",
                'description' => "434 : Grammaire;435 : Orthographe;436 : Conjugaison;513 : Compréhension écrite;514 : Vocabulaire;582 : Expression écrite;583 : Transcription d'un audio;613 : Expression orale;698 : Syntaxe;718 : Catalogues Isograd;719 : Contenus Isograd;720 : Plateformes Isograd;721 : Communication avec les équipes - Isograd;750 : IRT et algorithme adaptatif;770 : Accords",
                'gra_type_id' => 25
            ],
            [
                'id' => 1010,
                'language' => 1,
                'test_name' => "SQL - Débutant",
                'description' => "642 : Séléctionner et afficher la donnée;643 : Aggréger des données;644 : Mettre à jour les données",
                'gra_type_id' => 4
            ],
            [
                'id' => 1011,
                'language' => 2,
                'test_name' => "SQL - Débutant (EN)",
                'description' => "642 : Séléctionner et afficher la donnée;643 : Aggréger des données;644 : Mettre à jour les données",
                'gra_type_id' => 4
            ],
            [
                'id' => 1012,
                'language' => 1,
                'test_name' => "SQL - Intermédiaire",
                'description' => "642 : Séléctionner et afficher la donnée;643 : Aggréger des données;644 : Mettre à jour les données",
                'gra_type_id' => 4
            ],
            [
                'id' => 1013,
                'language' => 2,
                'test_name' => "SQL - Intermédiaire (EN)",
                'description' => "642 : Séléctionner et afficher la donnée;643 : Aggréger des données;644 : Mettre à jour les données",
                'gra_type_id' => 4
            ],
            [
                'id' => 1019,
                'language' => 3,
                'test_name' => "Évaluation adaptative Excel 2019 (DE)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1020,
                'language' => 3,
                'test_name' => "Évaluation adaptative Word 2019 (DE)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1021,
                'language' => 3,
                'test_name' => "Évaluation adaptative PowerPoint 2019 (DE)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1022,
                'language' => 2,
                'test_name' => "Evaluation adaptative DigComp (EN)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1026,
                'language' => 2,
                'test_name' => "Evaluation adaptative Excel 2016 (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1027,
                'language' => 2,
                'test_name' => "Evaluation adaptative Excel 365 (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1029,
                'language' => 2,
                'test_name' => "Evaluation adaptative Google Sheets (EN)",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1030,
                'language' => 2,
                'test_name' => "Evaluation adaptative Illustrator (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 1
            ],
            [
                'id' => 1031,
                'language' => 2,
                'test_name' => "Evaluation adaptative InDesign (anglais)",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 1
            ],
            [
                'id' => 1033,
                'language' => 2,
                'test_name' => "Evaluation adaptative Outlook 2016 (EN)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1038,
                'language' => 2,
                'test_name' => "Evaluation adaptative PowerPoint 2013 (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1039,
                'language' => 2,
                'test_name' => "Evaluation adaptative PowerPoint 2016 (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1040,
                'language' => 2,
                'test_name' => "Evaluation adaptative PowerPoint 365 (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1041,
                'language' => 2,
                'test_name' => "Evaluation adaptative VBA Excel 2019 (EN)",
                'description' => "289 : Objets;290 : Procédures;291 : Boîtes de dialogue, formulaires et contrôles ActiveX;292 : Environnement et outils de débogage",
                'gra_type_id' => 1
            ],
            [
                'id' => 1044,
                'language' => 2,
                'test_name' => "Evaluation adaptative Word 2013 (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1045,
                'language' => 2,
                'test_name' => "Evaluation adaptative Word 2016 (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1046,
                'language' => 2,
                'test_name' => "Evaluation adaptative Word 365 (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1047,
                'language' => 5,
                'test_name' => "Evaluation adaptative Excel 2016 (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1048,
                'language' => 5,
                'test_name' => "Evaluation adaptative PowerPoint 2016 (ES)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1049,
                'language' => 5,
                'test_name' => "Evaluation adaptative Word 2016 (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1050,
                'language' => 5,
                'test_name' => "Evaluation adaptative Outlook 2016 (ES)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1051,
                'language' => 5,
                'test_name' => "Evaluation adaptative DigComp (ES)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1053,
                'language' => 1,
                'test_name' => "Evaluation adaptative AutoCAD",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 1
            ],
            [
                'id' => 1054,
                'language' => 1,
                'test_name' => "Evaluation adaptative DigComp",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1055,
                'language' => 1,
                'test_name' => "Evaluation adaptative DigComp - Français Belgique",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1056,
                'language' => 1,
                'test_name' => "Evaluation adaptative DigComp - Français canadien",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1059,
                'language' => 1,
                'test_name' => "Evaluation adaptative Excel 2016",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1060,
                'language' => 1,
                'test_name' => "Evaluation adaptative Excel 2016 - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1061,
                'language' => 1,
                'test_name' => "Evaluation adaptative Excel 2019",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1062,
                'language' => 1,
                'test_name' => "Evaluation adaptative Excel 2019 - Français canadien",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1063,
                'language' => 1,
                'test_name' => "Evaluation adaptative Illustrator sans manipulation",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 1
            ],
            [
                'id' => 1064,
                'language' => 1,
                'test_name' => "Evaluation adaptative InDesign",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 1
            ],
            [
                'id' => 1065,
                'language' => 1,
                'test_name' => "Evaluation adaptative LibreOffice Calc",
                'description' => "63 : Environnement / Méthodes;64 : Gestion des données;65 : Calculs (formules, fonctions);66 : Mise en forme",
                'gra_type_id' => 1
            ],
            [
                'id' => 1066,
                'language' => 1,
                'test_name' => "Evaluation adaptative LibreOffice Impress",
                'description' => "441 : Environnement / Méthodes / Diaporama;442 : Gestion du texte;443 : Gestion des objets",
                'gra_type_id' => 1
            ],
            [
                'id' => 1067,
                'language' => 1,
                'test_name' => "Evaluation adaptative LibreOffice Writer",
                'description' => "349 : Environnement / Méthodes;350 : Mise en page et mise en forme;351 : Outils édition;352 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1069,
                'language' => 1,
                'test_name' => "Evaluation adaptative Outlook 2013 (manipulation 2016)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1070,
                'language' => 1,
                'test_name' => "Evaluation adaptative Outlook 2016",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1076,
                'language' => 1,
                'test_name' => "Evaluation adaptative PowerPoint 2013",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1077,
                'language' => 1,
                'test_name' => "Evaluation adaptative PowerPoint 2016",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1078,
                'language' => 1,
                'test_name' => "Evaluation adaptative PowerPoint 2019",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1080,
                'language' => 1,
                'test_name' => "Evaluation adaptative VBA Excel 2019",
                'description' => "289 : Objets;290 : Procédures;291 : Boîtes de dialogue, formulaires et contrôles ActiveX;292 : Environnement et outils de débogage",
                'gra_type_id' => 1
            ],
            [
                'id' => 1084,
                'language' => 1,
                'test_name' => "Evaluation adaptative Word 2013",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1085,
                'language' => 1,
                'test_name' => "Evaluation adaptative Word 2016",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1086,
                'language' => 1,
                'test_name' => "Evaluation adaptative Word 2016 - Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1087,
                'language' => 1,
                'test_name' => "Evaluation adaptative Word 2019",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1088,
                'language' => 1,
                'test_name' => "Evaluation adaptative Word 2019- Français canadien",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1089,
                'language' => 1,
                'test_name' => "Evaluation adaptative WordPress",
                'description' => "578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets",
                'gra_type_id' => 1
            ],
            [
                'id' => 1090,
                'language' => 6,
                'test_name' => "Evaluation adaptative PowerPoint 2016 (IT)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1091,
                'language' => 6,
                'test_name' => "Evaluation adaptative Word 2016 (IT)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1092,
                'language' => 6,
                'test_name' => "Evaluation adaptative Excel 2016 (IT)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1093,
                'language' => 6,
                'test_name' => "Evaluation adaptative Outlook 2016 (IT)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1094,
                'language' => 4,
                'test_name' => "Evaluation adaptative PowerPoint 2016 (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1096,
                'language' => 4,
                'test_name' => "Evaluation adaptative PowerPoint 2013 (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 1
            ],
            [
                'id' => 1097,
                'language' => 4,
                'test_name' => "Evaluation adaptative DigComp (NL)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1098,
                'language' => 4,
                'test_name' => "Evaluation adaptative Outlook 2016 (NL)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 1
            ],
            [
                'id' => 1099,
                'language' => 4,
                'test_name' => "Évaluation adaptative Excel 2016 (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 1
            ],
            [
                'id' => 1100,
                'language' => 4,
                'test_name' => "Évaluation adaptative Word 2013 (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1102,
                'language' => 4,
                'test_name' => "Évaluation adaptative Word 2016 (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 1
            ],
            [
                'id' => 1111,
                'language' => 1,
                'test_name' => "LibreOffice Impress 7.0-Débutant",
                'description' => "441 : Environnement / Méthodes / Diaporama;442 : Gestion du texte;443 : Gestion des objets",
                'gra_type_id' => 15
            ],
            [
                'id' => 1112,
                'language' => 1,
                'test_name' => "LibreOffice Impress 7.0-Intermédiaire",
                'description' => "441 : Environnement / Méthodes / Diaporama;442 : Gestion du texte;443 : Gestion des objets",
                'gra_type_id' => 15
            ],
            [
                'id' => 1113,
                'language' => 1,
                'test_name' => "LibreOffice Impress 7.0-Avancé",
                'description' => "441 : Environnement / Méthodes / Diaporama;442 : Gestion du texte;443 : Gestion des objets",
                'gra_type_id' => 15
            ],
            [
                'id' => 1114,
                'language' => 1,
                'test_name' => "LibreOffice Writer 7.0-Débutant",
                'description' => "349 : Environnement / Méthodes;350 : Mise en page et mise en forme;351 : Outils édition;352 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1115,
                'language' => 1,
                'test_name' => "LibreOffice Writer 7.0-Intermédiaire",
                'description' => "349 : Environnement / Méthodes;350 : Mise en page et mise en forme;351 : Outils édition;352 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],

            [
                'id' => 1117,
                'language' => 1,
                'test_name' => "LibreOffice Calc 7.0-Débutant",
                'description' => "63 : Environnement / Méthodes;64 : Gestion des données;65 : Calculs (formules, fonctions);66 : Mise en forme",
                'gra_type_id' => 15
            ],
            [
                'id' => 1118,
                'language' => 1,
                'test_name' => "LibreOffice Calc 7.0-Intermédiaire",
                'description' => "63 : Environnement / Méthodes;64 : Gestion des données;65 : Calculs (formules, fonctions);66 : Mise en forme",
                'gra_type_id' => 15
            ],
            [
                'id' => 1119,
                'language' => 1,
                'test_name' => "LibreOffice Calc 7.0-Avancé",
                'description' => "63 : Environnement / Méthodes;64 : Gestion des données;65 : Calculs (formules, fonctions);66 : Mise en forme",
                'gra_type_id' => 15
            ],
            [
                'id' => 1120,
                'language' => 2,
                'test_name' => "Google Sheets-Débutant (EN)",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1121,
                'language' => 2,
                'test_name' => "Google Sheets-Intermédiaire (EN)",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1122,
                'language' => 2,
                'test_name' => "Google Sheets-Avancé (EN)",
                'description' => "618 : Environnement et méthodes;619 : Calculs et Formules;620 : Mise en forme;621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1127,
                'language' => 1,
                'test_name' => "VBA 2019-Intermédiaire",
                'description' => "289 : Objets;290 : Procédures;291 : Boîtes de dialogue, formulaires et contrôles ActiveX;292 : Environnement et outils de débogage",
                'gra_type_id' => 15
            ],
            [
                'id' => 1128,
                'language' => 2,
                'test_name' => "VBA 2019-Intermédiaire (EN)",
                'description' => "289 : Objets;290 : Procédures;291 : Boîtes de dialogue, formulaires et contrôles ActiveX;292 : Environnement et outils de débogage",
                'gra_type_id' => 15
            ],
            [
                'id' => 1129,
                'language' => 2,
                'test_name' => "VBA 2019-Avancé (EN)",
                'description' => "289 : Objets;290 : Procédures;291 : Boîtes de dialogue, formulaires et contrôles ActiveX;292 : Environnement et outils de débogage",
                'gra_type_id' => 15
            ],
            [
                'id' => 1130,
                'language' => 1,
                'test_name' => "VBA 2019-Avancé",
                'description' => "289 : Objets;290 : Procédures;291 : Boîtes de dialogue, formulaires et contrôles ActiveX;292 : Environnement et outils de débogage",
                'gra_type_id' => 15
            ],
            [
                'id' => 1131,
                'language' => 1,
                'test_name' => "InDesign-Intermédiaire",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1132,
                'language' => 2,
                'test_name' => "InDesign-Intermédiaire (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1133,
                'language' => 1,
                'test_name' => "InDesign-Débutant",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1134,
                'language' => 2,
                'test_name' => "InDesign-Débutant (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1135,
                'language' => 1,
                'test_name' => "InDesign-Avancé",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1136,
                'language' => 2,
                'test_name' => "InDesign-Avancé (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux;438 : Texte;439 : Images et objets graphiques;440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1137,
                'language' => 1,
                'test_name' => "Illustrator-Débutant",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 1138,
                'language' => 2,
                'test_name' => "Illustrator-Débutant (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 1139,
                'language' => 1,
                'test_name' => "Illustrator-Intermédiaire",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 1140,
                'language' => 2,
                'test_name' => "Illustrator-Intermédiaire (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 1141,
                'language' => 1,
                'test_name' => "AutoCAD-Débutant",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1142,
                'language' => 1,
                'test_name' => "AutoCAD-Intermédiaire",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1143,
                'language' => 1,
                'test_name' => "AutoCAD-Avancé",
                'description' => "487 : Interface et réglages;488 : Outils de dessin et modifications;489 : Habillage et annotations;490 : Impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 1144,
                'language' => 2,
                'test_name' => "Illustrator-Avancé (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 1145,
                'language' => 1,
                'test_name' => "Illustrator-Avancé",
                'description' => "483 : Interface, espace de travail et fondamentaux;484 : Travail sur les objets;485 : Fonctions spécifiques;486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 1146,
                'language' => 1,
                'test_name' => "WordPress-Débutant (FR)",
                'description' => "578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets",
                'gra_type_id' => 15
            ],
            [
                'id' => 1147,
                'language' => 1,
                'test_name' => "WordPress-Intermédiaire (FR)",
                'description' => "578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets",
                'gra_type_id' => 15
            ],
            [
                'id' => 1148,
                'language' => 1,
                'test_name' => "WordPress-Avancé (FR)",
                'description' => "578 : Administration et configuration;579 : Rédaction et intégration de contenu;580 : Thèmes;581 : Extensions et Widgets",
                'gra_type_id' => 15
            ],
            [
                'id' => 1150,
                'language' => 2,
                'test_name' => "Évaluation adaptative Google Slides (EN)",
                'description' => "654 : Environnement et méthodes;655 : Objets graphiques;656 : Gestion du texte;657 : Thèmes et modèles",
                'gra_type_id' => 1
            ],
            [
                'id' => 1157,
                'language' => 1,
                'test_name' => "Excel 2016-Débutant",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1158,
                'language' => 1,
                'test_name' => "Excel 2019-Débutant",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1160,
                'language' => 1,
                'test_name' => "Excel 2016-Intermédiaire",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1161,
                'language' => 1,
                'test_name' => "Excel 2019-Intermédiaire",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1163,
                'language' => 1,
                'test_name' => "Excel 2016-Avancé",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1164,
                'language' => 1,
                'test_name' => "Excel 2019-Avancé",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1175,
                'language' => 1,
                'test_name' => "Outlook 2016- Débutant",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1176,
                'language' => 2,
                'test_name' => "Outlook 2016- Débutant (EN)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1177,
                'language' => 4,
                'test_name' => "Outlook 2016-Débutant (NL)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1178,
                'language' => 5,
                'test_name' => "Outlook 2016- Débutant (ES)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1179,
                'language' => 6,
                'test_name' => "Outlook 2016- Débutant (IT)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1180,
                'language' => 1,
                'test_name' => "Outlook 2016- Intermédiaire",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1181,
                'language' => 2,
                'test_name' => "Outlook 2016- Intermédiaire (EN)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1182,
                'language' => 4,
                'test_name' => "Outlook 2016-Intermédiaire (NL)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1183,
                'language' => 5,
                'test_name' => "Outlook 2016- Intermédiaire (ES)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1184,
                'language' => 6,
                'test_name' => "Outlook 2016- Intermédiaire (IT)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1185,
                'language' => 1,
                'test_name' => "Outlook 2016- Avancé",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1186,
                'language' => 2,
                'test_name' => "Outlook 2016- Avancé (EN)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1187,
                'language' => 4,
                'test_name' => "Outlook 2016-Avancé (NL)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1188,
                'language' => 5,
                'test_name' => "Outlook 2016- Avancé (ES)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1189,
                'language' => 6,
                'test_name' => "Outlook 2016- Avancé (IT)",
                'description' => "574 : Environnement / Configuration;575 : Messagerie;576 : Calendrier et tâches;577 : Gestion des contacts et notes",
                'gra_type_id' => 15
            ],

            [
                'id' => 1116,
                'language' => 1,
                'test_name' => "LibreOffice Writer 7.0-Avancé",
                'description' => "349 : Environnement / Méthodes;350 : Mise en page et mise en forme;351 : Outils édition;352 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1191,
                'language' => 2,
                'test_name' => "Excel 2016 - Débutant (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1192,
                'language' => 2,
                'test_name' => "Excel 2019 - Débutant (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1195,
                'language' => 2,
                'test_name' => "Excel 2016 - Intermédiaire (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1196,
                'language' => 2,
                'test_name' => "Excel 2019 - Intermédiaire (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1199,
                'language' => 2,
                'test_name' => "Excel 2016- Avancé (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1200,
                'language' => 2,
                'test_name' => "Excel 2019-Avancé (EN)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1201,
                'language' => 1,
                'test_name' => "DigComp-Débutant",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1202,
                'language' => 2,
                'test_name' => "DigComp-Débutant (EN)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1203,
                'language' => 4,
                'test_name' => "DigComp-Débutant (NL)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1204,
                'language' => 5,
                'test_name' => "DigComp-Débutant (ES)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1205,
                'language' => 3,
                'test_name' => "Excel 2019-Débutant (DE)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1206,
                'language' => 3,
                'test_name' => "Excel 2019-Intermédiaire (DE)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1207,
                'language' => 3,
                'test_name' => "Excel 2019-Avancé (DE)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1208,
                'language' => 4,
                'test_name' => "Excel 2016-Débutant (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1209,
                'language' => 4,
                'test_name' => "Excel 2016-Intermédiaire (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1210,
                'language' => 4,
                'test_name' => "Excel 2016-Avancé (NL)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1211,
                'language' => 1,
                'test_name' => "DigComp-Intermédiaire",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1212,
                'language' => 2,
                'test_name' => "DigComp-Intermédiaire (EN)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1213,
                'language' => 4,
                'test_name' => "DigComp-Intermédiaire (NL)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1214,
                'language' => 5,
                'test_name' => "DigComp-Intermédiaire (ES)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1215,
                'language' => 1,
                'test_name' => "DigComp-Avancé",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1216,
                'language' => 2,
                'test_name' => "DigComp-Avancé (EN)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1217,
                'language' => 4,
                'test_name' => "DigComp-Avancé (NL)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1218,
                'language' => 5,
                'test_name' => "DigComp-Avancé (ES)",
                'description' => "308 : Informations et données;309 : Communication et collaboration;310 : Création de contenu numérique;311 : Sécurité numérique;312 : Résolution des problèmes",
                'gra_type_id' => 15
            ],
            [
                'id' => 1219,
                'language' => 1,
                'test_name' => "PowerPoint 2019-Débutant",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1220,
                'language' => 1,
                'test_name' => "PowerPoint 2016-Débutant",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1221,
                'language' => 1,
                'test_name' => "PowerPoint 2013-Débutant",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1222,
                'language' => 2,
                'test_name' => "PowerPoint 2019 - Débutant (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1223,
                'language' => 2,
                'test_name' => "PowerPoint 2016 - Débutant (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1224,
                'language' => 2,
                'test_name' => "PowerPoint 2013 - Débutant (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1225,
                'language' => 3,
                'test_name' => "PowerPoint 2019-Débutant (DE)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1226,
                'language' => 5,
                'test_name' => "Excel 2016- Débutant (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1227,
                'language' => 5,
                'test_name' => "Excel 2016- Intermédiaire (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1228,
                'language' => 5,
                'test_name' => "Excel 2016- Avancé (ES)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1229,
                'language' => 4,
                'test_name' => "PowerPoint 2016-Débutant (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1230,
                'language' => 6,
                'test_name' => "Excel 2016- Débutant (IT)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1231,
                'language' => 6,
                'test_name' => "Excel 2016- Intermédiaire (IT)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1232,
                'language' => 4,
                'test_name' => "PowerPoint 2013-Débutant (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1233,
                'language' => 6,
                'test_name' => "Excel 2016- Avancé (IT)",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 1234,
                'language' => 5,
                'test_name' => "PowerPoint 2016- Débutant (ES)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1235,
                'language' => 6,
                'test_name' => "PowerPoint 2016- Débutant (IT)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1236,
                'language' => 1,
                'test_name' => "Word 2016-Débutant",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1237,
                'language' => 2,
                'test_name' => "Word 2016-Débutant (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1238,
                'language' => 4,
                'test_name' => "Word 2016-Débutant (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1239,
                'language' => 5,
                'test_name' => "Word 2016- Débutant (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1240,
                'language' => 6,
                'test_name' => "Word 2016- Débutant (IT)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1241,
                'language' => 1,
                'test_name' => "PowerPoint 2019-Intermédiaire",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1242,
                'language' => 1,
                'test_name' => "PowerPoint 2016-Intermédiaire",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1243,
                'language' => 1,
                'test_name' => "PowerPoint 2013-Intermédiaire",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1244,
                'language' => 2,
                'test_name' => "PowerPoint 2019 - Intermédiaire (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1245,
                'language' => 2,
                'test_name' => "PowerPoint 2016 - Intermédiaire (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1246,
                'language' => 2,
                'test_name' => "PowerPoint 2013 - Intermédiaire (EN)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1247,
                'language' => 3,
                'test_name' => "PowerPoint 2019-Intermédiaire (DE)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1248,
                'language' => 4,
                'test_name' => "PowerPoint 2016-Intermédiaire (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1249,
                'language' => 1,
                'test_name' => "Word 2016-Intermédiaire",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1250,
                'language' => 2,
                'test_name' => "Word 2016 - Intermédiaire (EN)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1251,
                'language' => 4,
                'test_name' => "Word 2016-Intermédiaire (NL)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1252,
                'language' => 4,
                'test_name' => "PowerPoint 2013-Intermédiaire (NL)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 1253,
                'language' => 5,
                'test_name' => "Word 2016- Intermédiaire (ES)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1254,
                'language' => 6,
                'test_name' => "Word 2016- Intermédiaire (IT)",
                'description' => "570 : Environnement et Méthodes;571 : Mise en page et mise en forme;572 : Outils d'édition;573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 1255,
                'language' => 6,
                'test_name' => "PowerPoint 2016- Intermédiaire (IT)",
                'description' => "566 : Thèmes et modèles;567 : Gestion des objets;568 : Gestion du texte;569 : Environnement / Méthodes / Diaporama",
                'gra_type_id' => 15
            ],
            [
                'id' => 2898,
                'language' => 1,
                'test_name' => "Evaluation adaptative Excel 365",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 2899,
                'language' => 1,
                'test_name' => "Excel 365 -Débutant",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 2900,
                'language' => 1,
                'test_name' => "Excel 365-Intermédiaire",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 2901,
                'language' => 1,
                'test_name' => "Excel 365-Avancé",
                'description' => "562 : Environnement et Méthodes;563 : Calculs;564 : Mise en forme;565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3023,
                'language' => 2,
                'test_name' => "Évaluation Adaptative Salesforce (EN)",
                'description' => "645 : Environnement de l'outil;646 : Gestion de la relation client;647 : Organisation de l'activité;648 : Gestion des processus de vente",
                'gra_type_id' => 15
            ],
            [
                'id' => 3049,
                'language' => 2,
                'test_name' => "Évaluation Adaptative Adobe Photoshop 2024 sans manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3050,
                'language' => 2,
                'test_name' => "Évaluation Adaptative Adobe Photoshop 2024 avec manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3052,
                'language' => 2,
                'test_name' => "Adobe Photoshop 2024-Débutant avec manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3053,
                'language' => 2,
                'test_name' => "Adobe Photoshop 2024-Intermédiaire avec manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3054,
                'language' => 2,
                'test_name' => "Adobe Photoshop 2024-Avancé avec manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3055,
                'language' => 2,
                'test_name' => "Adobe Photoshop 2024-Débutant sans manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3056,
                'language' => 2,
                'test_name' => "Adobe Photoshop 2024-Intermédiaire sans manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3057,
                'language' => 2,
                'test_name' => "Adobe Photoshop 2024-Avancé sans manipulation (EN)",
                'description' => "387 : Interface, espace de travail et fondamentaux;388 : Géométrie et corrections de l'image;389 : Détourages, masques et photomontages;390 : Fonctions graphiques et effets, exportation et automatisation",
                'gra_type_id' => 15
            ],
            [
                'id' => 3064,
                'language' => 5,
                'test_name' => "Évaluation Adaptative Google Docs (ES)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3065,
                'language' => 5,
                'test_name' => "Google Docs-Débutant (ES)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3066,
                'language' => 5,
                'test_name' => "Google Docs-Intermédiaire (ES)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3067,
                'language' => 5,
                'test_name' => "Google Docs-Avancé (ES)",
                'description' => "638 : Environnement et méthodes;639 : Mise en page et mise en forme;640 : Outils d'édition;641 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3109,
                'language' => 2,
                'test_name' => "Évaluation adaptative Adobe Illustrator 2024 (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux; 484 : Travail sur les objets; 485 : Fonctions spécifiques; 486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 3159,
                'language' => 2,
                'test_name' => "Adobe Illustrator 2024-Débutant (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux; 484 : Travail sur les objets; 485 : Fonctions spécifiques; 486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 3160,
                'language' => 2,
                'test_name' => "Adobe Illustrator 2024 -Intermédiaire (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux; 484 : Travail sur les objets; 485 : Fonctions spécifiques; 486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 3161,
                'language' => 2,
                'test_name' => "Adobe Illustrator 2024-Avancé (EN)",
                'description' => "483 : Interface, espace de travail et fondamentaux; 484 : Travail sur les objets; 485 : Fonctions spécifiques; 486 : Production",
                'gra_type_id' => 15
            ],
            [
                'id' => 3172,
                'language' => 5,
                'test_name' => "Évaluation Adaptative Google Slides (ES)",
                'description' => "654 : Environnement et méthodes; 655 : Objets graphiques; 656 : Gestion du texte; 657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 3289,
                'language' => 2,
                'test_name' => "Évaluation adaptative Adobe InDesign 2024 (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux; 438 : Texte; 439 : Images et objets graphiques; 440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 3293,
                'language' => 2,
                'test_name' => "Adobe InDesign 2024 -Débutant (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux; 438 : Texte; 439 : Images et objets graphiques; 440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 3297,
                'language' => 2,
                'test_name' => "Adobe InDesign 2024 -Avancé (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux; 438 : Texte; 439 : Images et objets graphiques; 440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 3299,
                'language' => 2,
                'test_name' => "Adobe InDesign 2024-Intermédiaire (EN)",
                'description' => "437 : Interface, espace de travail et fondamentaux; 438 : Texte; 439 : Images et objets graphiques; 440 : Préparation pour l'impression",
                'gra_type_id' => 15
            ],
            [
                'id' => 3337,
                'language' => 5,
                'test_name' => "Évaluation adaptative Google Sheets (ES)",
                'description' => "618 : Environnement et méthodes; 619 : Calculs et Formules; 620 : Mise en forme; 621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3343,
                'language' => 5,
                'test_name' => "Google Sheets-Débutant (ES)",
                'description' => "618 : Environnement et méthodes; 619 : Calculs et Formules; 620 : Mise en forme; 621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3345,
                'language' => 5,
                'test_name' => "Google Sheets-Intermédiaire (ES)",
                'description' => "618 : Environnement et méthodes; 619 : Calculs et Formules; 620 : Mise en forme; 621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3347,
                'language' => 5,
                'test_name' => "Google Sheets-Avancé (ES)",
                'description' => "618 : Environnement et méthodes; 619 : Calculs et Formules; 620 : Mise en forme; 621 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3445,
                'language' => 5,
                'test_name' => "Google Slides-Débutant (ES)",
                'description' => "654 : Environnement et méthodes; 655 : Objets graphiques; 656 : Gestion du texte; 657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 3447,
                'language' => 5,
                'test_name' => "Google Slides-Intermédiaire (ES)",
                'description' => "654 : Environnement et méthodes; 655 : Objets graphiques; 656 : Gestion du texte; 657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 3449,
                'language' => 5,
                'test_name' => "Google Slides-Avancé (ES)",
                'description' => "654 : Environnement et méthodes; 655 : Objets graphiques; 656 : Gestion du texte; 657 : Thèmes et modèles",
                'gra_type_id' => 15
            ],
            [
                'id' => 3675,
                'language' => 1,
                'test_name' => "Règlement IA Act",
                'description' => "777 : Connaissances; 781 : Compétences; 782 : Compréhension; 783 : Transparence; 784 : Dangers de l'IA; 785 : IA Responsable",
                'gra_type_id' => 15
            ],
            [
                'id' => 3729,
                'language' => 1,
                'test_name' => "Word 2019-Débutant",
                'description' => "570 : Environnement et Méthodes; 571 : Mise en page et mise en forme; 572 : Outils d'édition; 573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3731,
                'language' => 1,
                'test_name' => "Word 365-Débutant",
                'description' => "570 : Environnement et Méthodes; 571 : Mise en page et mise en forme; 572 : Outils d'édition; 573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3733,
                'language' => 1,
                'test_name' => "Word 365-Intermédiaire",
                'description' => "570 : Environnement et Méthodes; 571 : Mise en page et mise en forme; 572 : Outils d'édition; 573 : Objets graphiques et tableaux",
                'gra_type_id' => 15
            ],
            [
                'id' => 3787,
                'language' => 2,
                'test_name' => "Evaluation adaptative Excel 365 (EN)",
                'description' => "562 : Environnement et Méthodes; 563 : Calculs; 564 : Mise en forme; 565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3789,
                'language' => 2,
                'test_name' => "Excel 365-Avancé (EN)",
                'description' => "562 : Environnement et Méthodes; 563 : Calculs; 564 : Mise en forme; 565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3791,
                'language' => 2,
                'test_name' => "Excel 365-Intermédiaire (EN)",
                'description' => "562 : Environnement et Méthodes; 563 : Calculs; 564 : Mise en forme; 565 : Gestion des données",
                'gra_type_id' => 15
            ],
            [
                'id' => 3793,
                'language' => 2,
                'test_name' => "Excel 365 - Débutant (EN)",
                'description' => "562 : Environnement et Méthodes; 563 : Calculs; 564 : Mise en forme; 565 : Gestion des données",
                'gra_type_id' => 15
            ],


        ];

        DB::table('test_techniques')->insert($data);

    }
}
