<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            [ 'skill_type_id' => 1, 'label' => 'Sourcing fournisseurs' ],
            [ 'skill_type_id' => 1, 'label' => 'Négociation des tarifs et contrats' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion des appels d\'offres' ],
            [ 'skill_type_id' => 1, 'label' => 'Analyse du marché fournisseurs' ],
            [ 'skill_type_id' => 1, 'label' => 'Stratégie d\'achats' ],
            [ 'skill_type_id' => 1, 'label' => 'Évaluation et sélection des fournisseurs' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion des commandes d\'achats' ],
            [ 'skill_type_id' => 1, 'label' => 'Relations fournisseurs (Supplier Relationship Management)' ],
            [ 'skill_type_id' => 1, 'label' => 'Contrôle de la qualité des fournitures' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion des délais de livraison' ],
            [ 'skill_type_id' => 1, 'label' => 'Techniques de cost killing' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion des pénalités de retard' ],
            [ 'skill_type_id' => 1, 'label' => 'Coordination avec la production' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion du risque fournisseur' ],
            [ 'skill_type_id' => 1, 'label' => 'Analyse de la valeur' ],
            [ 'skill_type_id' => 1, 'label' => 'Marchés publics' ],
            [ 'skill_type_id' => 1, 'label' => 'Approvisionnement international' ],
            [ 'skill_type_id' => 1, 'label' => 'Incoterms appliqués aux achats' ],
            [ 'skill_type_id' => 1, 'label' => 'Contrats-cadres' ],
            [ 'skill_type_id' => 1, 'label' => 'Pilotage du panel fournisseurs' ],
            [ 'skill_type_id' => 1, 'label' => 'Outils e-procurement' ],
            [ 'skill_type_id' => 1, 'label' => 'Benchmarking achats' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion des appels d’offres électroniques' ],
            [ 'skill_type_id' => 1, 'label' => 'Approche TCO (Total Cost of Ownership)' ],
            [ 'skill_type_id' => 1, 'label' => 'KPI achats (OTIF, etc.)' ],
            [ 'skill_type_id' => 1, 'label' => 'Évaluation de la performance fournisseurs' ],
            [ 'skill_type_id' => 1, 'label' => 'Respect des normes ISO (qualité, env.)' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion collaborative des prévisions' ],
            [ 'skill_type_id' => 1, 'label' => 'Contract Management' ],
            [ 'skill_type_id' => 1, 'label' => 'Gestion des litiges fournisseurs' ],
            [ 'skill_type_id' => 2, 'label' => 'Rédaction de courriers professionnels' ],
            [ 'skill_type_id' => 2, 'label' => 'Gestion d\'agendas et de plannings' ],
            [ 'skill_type_id' => 2, 'label' => 'Organisation de réunions' ],
            [ 'skill_type_id' => 2, 'label' => 'Accueil physique et téléphonique' ],
            [ 'skill_type_id' => 2, 'label' => 'Prise de notes et comptes-rendus' ],
            [ 'skill_type_id' => 2, 'label' => 'Classement et archivage de documents' ],
            [ 'skill_type_id' => 2, 'label' => 'Suivi de dossiers administratifs' ],
            [ 'skill_type_id' => 2, 'label' => 'Traitement du courrier (entrant/sortant)' ],
            [ 'skill_type_id' => 2, 'label' => 'Maîtrise du pack Office (Word, Excel, etc.)' ],
            [ 'skill_type_id' => 2, 'label' => 'Gestion des fournitures de bureau' ],
            [ 'skill_type_id' => 2, 'label' => 'Organisation de déplacements professionnels' ],
            [ 'skill_type_id' => 2, 'label' => 'Bonne orthographe et grammaire' ],
            [ 'skill_type_id' => 2, 'label' => 'Vérification et mise en forme de documents' ],
            [ 'skill_type_id' => 2, 'label' => 'Gestion de bases de données (contacts, etc.)' ],
            [ 'skill_type_id' => 2, 'label' => 'Connaissance des procédures administratives' ],
            [ 'skill_type_id' => 2, 'label' => 'Coordination interservices' ],
            [ 'skill_type_id' => 2, 'label' => 'Accueil en plusieurs langues' ],
            [ 'skill_type_id' => 2, 'label' => 'Facturation et suivi des paiements' ],
            [ 'skill_type_id' => 2, 'label' => 'Gestion des priorités et deadlines' ],
            [ 'skill_type_id' => 2, 'label' => 'Classement numérique (GED)' ],
            [ 'skill_type_id' => 2, 'label' => 'Gestion du standard téléphonique' ],
            [ 'skill_type_id' => 2, 'label' => 'Préparation de présentations (PowerPoint)' ],
            [ 'skill_type_id' => 2, 'label' => 'Planification logistique d\'événements internes' ],
            [ 'skill_type_id' => 2, 'label' => 'Constitution de dossiers administratifs' ],
            [ 'skill_type_id' => 2, 'label' => 'Techniques de prise de notes rapide' ],
            [ 'skill_type_id' => 2, 'label' => 'Rédaction de comptes-rendus de réunions' ],
            [ 'skill_type_id' => 2, 'label' => 'Maîtrise des outils collaboratifs (SharePoint, Teams)' ],
            [ 'skill_type_id' => 2, 'label' => 'Saisie et actualisation de données' ],
            [ 'skill_type_id' => 2, 'label' => 'Gestion des réclamations de premier niveau' ],
            [ 'skill_type_id' => 2, 'label' => 'Sens de l\'organisation' ],
            [ 'skill_type_id' => 3, 'label' => 'Photomontage et retouche avancée (Photoshop, GIMP)' ],
            [ 'skill_type_id' => 3, 'label' => 'Illustration vectorielle (Illustrator, Inkscape)' ],
            [ 'skill_type_id' => 3, 'label' => 'Concept Art (jeux vidéo, cinéma)' ],
            [ 'skill_type_id' => 3, 'label' => 'Webdesign Responsive' ],
            [ 'skill_type_id' => 3, 'label' => 'Design d’interfaces mobiles (UI)' ],
            [ 'skill_type_id' => 3, 'label' => 'Conception d’icônes et pictogrammes' ],
            [ 'skill_type_id' => 3, 'label' => 'Colorimétrie et theory design' ],
            [ 'skill_type_id' => 3, 'label' => 'Typographie et lettrage' ],
            [ 'skill_type_id' => 3, 'label' => 'Motion design (After Effects)' ],
            [ 'skill_type_id' => 3, 'label' => 'Création de storyboard' ],
            [ 'skill_type_id' => 3, 'label' => 'Réalité augmentée (créations graphiques)' ],
            [ 'skill_type_id' => 3, 'label' => 'Infographie 3D (Blender, 3ds Max, Maya)' ],
            [ 'skill_type_id' => 3, 'label' => 'Texturing et UV mapping' ],
            [ 'skill_type_id' => 3, 'label' => 'Rendu photoréaliste (V-Ray, Cycles)' ],
            [ 'skill_type_id' => 3, 'label' => 'Création de maquettes (Figma, XD, Sketch)' ],
            [ 'skill_type_id' => 3, 'label' => 'Sérigraphie et impression' ],
            [ 'skill_type_id' => 3, 'label' => 'Gravure laser et découpe numérique' ],
            [ 'skill_type_id' => 3, 'label' => 'DAO artistique (Illustrator, CorelDRAW)' ],
            [ 'skill_type_id' => 3, 'label' => 'Création de patterns (motifs répétitifs)' ],
            [ 'skill_type_id' => 3, 'label' => 'Montage vidéo (Premiere Pro, Final Cut)' ],
            [ 'skill_type_id' => 3, 'label' => 'Photographie HDR, panoramas' ],
            [ 'skill_type_id' => 3, 'label' => 'Installation artistique multimédia' ],
            [ 'skill_type_id' => 3, 'label' => 'Conception d’éclairages scéniques' ],
            [ 'skill_type_id' => 3, 'label' => 'Peinture numérique (Krita, Procreate)' ],
            [ 'skill_type_id' => 3, 'label' => 'Illustration jeunesse' ],
            [ 'skill_type_id' => 3, 'label' => 'Maîtrise d’une tablette graphique (Wacom, etc.)' ],
            [ 'skill_type_id' => 3, 'label' => 'Création d’affiches événementielles' ],
            [ 'skill_type_id' => 3, 'label' => 'Graphisme publicitaire (flyers, brochures)' ],
            [ 'skill_type_id' => 3, 'label' => 'Packaging design (mise en volume)' ],
            [ 'skill_type_id' => 3, 'label' => 'Techniques d’impression 3D et prototypage rapide' ],
            [ 'skill_type_id' => 4, 'label' => 'Dessin et illustration' ],
            [ 'skill_type_id' => 4, 'label' => 'Peinture (acrylique, huile)' ],
            [ 'skill_type_id' => 4, 'label' => 'Sculpture' ],
            [ 'skill_type_id' => 4, 'label' => 'Photographie' ],
            [ 'skill_type_id' => 4, 'label' => 'Mise en scène (théâtre)' ],
            [ 'skill_type_id' => 4, 'label' => 'Muséographie' ],
            [ 'skill_type_id' => 4, 'label' => 'Organisation d\'expositions' ],
            [ 'skill_type_id' => 4, 'label' => 'Conservation du patrimoine' ],
            [ 'skill_type_id' => 4, 'label' => 'Patrimoine immatériel' ],
            [ 'skill_type_id' => 4, 'label' => 'Technique de restauration d’œuvres' ],
            [ 'skill_type_id' => 4, 'label' => 'Création musicale' ],
            [ 'skill_type_id' => 4, 'label' => 'Réalisation audiovisuelle' ],
            [ 'skill_type_id' => 4, 'label' => 'Écriture scénaristique' ],
            [ 'skill_type_id' => 4, 'label' => 'Chorégraphie' ],
            [ 'skill_type_id' => 4, 'label' => 'Stylisme et design de mode' ],
            [ 'skill_type_id' => 4, 'label' => 'Moulage et modelage' ],
            [ 'skill_type_id' => 4, 'label' => 'Techniques de gravure' ],
            [ 'skill_type_id' => 4, 'label' => 'Calligraphie' ],
            [ 'skill_type_id' => 4, 'label' => 'Management culturel' ],
            [ 'skill_type_id' => 4, 'label' => 'Animation d\'ateliers artistiques' ],
            [ 'skill_type_id' => 4, 'label' => 'Décors et scénographie' ],
            [ 'skill_type_id' => 4, 'label' => 'Costumier / costume design' ],
            [ 'skill_type_id' => 4, 'label' => 'Sonorisation et lumières' ],
            [ 'skill_type_id' => 4, 'label' => 'Rédaction critique (journalisme culturel)' ],
            [ 'skill_type_id' => 4, 'label' => 'Recherche de subventions culturelles' ],
            [ 'skill_type_id' => 4, 'label' => 'Collaboration avec artistes et producteurs' ],
            [ 'skill_type_id' => 4, 'label' => 'Exposition virtuelle / digitale' ],
            [ 'skill_type_id' => 4, 'label' => 'Organisation de festivals' ],
            [ 'skill_type_id' => 4, 'label' => 'Coordination technique (spectacles vivants)' ],
            [ 'skill_type_id' => 4, 'label' => 'Administration d\'équipements culturels' ],
            [ 'skill_type_id' => 5, 'label' => 'Lecture de plans' ],
            [ 'skill_type_id' => 5, 'label' => 'Maçonnerie' ],
            [ 'skill_type_id' => 5, 'label' => 'Charpente et couverture' ],
            [ 'skill_type_id' => 5, 'label' => 'Électricité du bâtiment' ],
            [ 'skill_type_id' => 5, 'label' => 'Plomberie et chauffage' ],
            [ 'skill_type_id' => 5, 'label' => 'Pose de carrelage' ],
            [ 'skill_type_id' => 5, 'label' => 'Peinture et enduit' ],
            [ 'skill_type_id' => 5, 'label' => 'Plâtrerie' ],
            [ 'skill_type_id' => 5, 'label' => 'Isolation thermique et phonique' ],
            [ 'skill_type_id' => 5, 'label' => 'Construction métallique' ],
            [ 'skill_type_id' => 5, 'label' => 'Conduite d\'engins de chantier' ],
            [ 'skill_type_id' => 5, 'label' => 'Terrassement' ],
            [ 'skill_type_id' => 5, 'label' => 'Voirie et réseaux divers (VRD)' ],
            [ 'skill_type_id' => 5, 'label' => 'Gestion de chantier' ],
            [ 'skill_type_id' => 5, 'label' => 'Sécurité et prévention (port d\'EPI)' ],
            [ 'skill_type_id' => 5, 'label' => 'Topographie' ],
            [ 'skill_type_id' => 5, 'label' => 'Calcul des métrés et devis' ],
            [ 'skill_type_id' => 5, 'label' => 'Connaissance des normes de construction' ],
            [ 'skill_type_id' => 5, 'label' => 'Coordination des corps de métier' ],
            [ 'skill_type_id' => 5, 'label' => 'Lecture de schémas électriques' ],
            [ 'skill_type_id' => 5, 'label' => 'Rénovation énergétique' ],
            [ 'skill_type_id' => 5, 'label' => 'Gestion des approvisionnements en matériaux' ],
            [ 'skill_type_id' => 5, 'label' => 'Menuiserie et agencement' ],
            [ 'skill_type_id' => 5, 'label' => 'Montage d\'échafaudages' ],
            [ 'skill_type_id' => 5, 'label' => 'Maîtrise des logiciels de DAO (AutoCAD)' ],
            [ 'skill_type_id' => 5, 'label' => 'Contrôle de la qualité des ouvrages' ],
            [ 'skill_type_id' => 5, 'label' => 'Étanchéité' ],
            [ 'skill_type_id' => 5, 'label' => 'Bardage et façades' ],
            [ 'skill_type_id' => 5, 'label' => 'Coordination SPS (Sécurité Protection de la Santé)' ],
            [ 'skill_type_id' => 5, 'label' => 'Gestion des déchets de chantier' ], 
            [ 'skill_type_id' => 6, 'label' => 'Prospection commerciale' ],
            [ 'skill_type_id' => 6, 'label' => 'Gestion de portefeuille clients' ],
            [ 'skill_type_id' => 6, 'label' => 'Négociation commerciale' ],
            [ 'skill_type_id' => 6, 'label' => 'Établissement de devis et propositions commerciales' ],
            [ 'skill_type_id' => 6, 'label' => 'Fidélisation de la clientèle' ],
            [ 'skill_type_id' => 6, 'label' => 'Techniques de vente B2B' ],
            [ 'skill_type_id' => 6, 'label' => 'Techniques de vente B2C' ],
            [ 'skill_type_id' => 6, 'label' => 'Closing commercial' ],
            [ 'skill_type_id' => 6, 'label' => 'Gestion des grands comptes (Key Account Management)' ],
            [ 'skill_type_id' => 6, 'label' => 'Élaboration de stratégies de vente' ],
            [ 'skill_type_id' => 6, 'label' => 'Vente en ligne (e-commerce)' ],
            [ 'skill_type_id' => 6, 'label' => 'CRM (Salesforce, HubSpot)' ],
            [ 'skill_type_id' => 6, 'label' => 'Gestion d\'équipe commerciale' ],
            [ 'skill_type_id' => 6, 'label' => 'Merchandising' ],
            [ 'skill_type_id' => 6, 'label' => 'Mise en place d\'actions promotionnelles' ],
            [ 'skill_type_id' => 6, 'label' => 'Analyse des KPIs de ventes' ],
            [ 'skill_type_id' => 6, 'label' => 'Définition des objectifs commerciaux' ],
            [ 'skill_type_id' => 6, 'label' => 'Formation des forces de vente' ],
            [ 'skill_type_id' => 6, 'label' => 'Préparation et participation à des salons professionnels' ],
            [ 'skill_type_id' => 6, 'label' => 'Techniques de négociation avancées' ],
            [ 'skill_type_id' => 6, 'label' => 'Gestion des litiges clients' ],
            [ 'skill_type_id' => 6, 'label' => 'Stratégies d\'upselling et cross-selling' ],
            [ 'skill_type_id' => 6, 'label' => 'Mise en place d\'un pipeline de ventes' ],
            [ 'skill_type_id' => 6, 'label' => 'Prévision des ventes (forecasting)' ],
            [ 'skill_type_id' => 6, 'label' => 'Analyse concurrentielle (offres et prix)' ],
            [ 'skill_type_id' => 6, 'label' => 'Techniques de closing au téléphone' ],
            [ 'skill_type_id' => 6, 'label' => 'Vente en marketplace (Amazon, etc.)' ],
            [ 'skill_type_id' => 6, 'label' => 'Prospection digitale (LinkedIn, email)' ],
            [ 'skill_type_id' => 6, 'label' => 'Suivi post-vente' ],
            [ 'skill_type_id' => 6, 'label' => 'Gestion d\'appels d\'offres' ],
            [ 'skill_type_id' => 7, 'label' => 'Tenue de la comptabilité générale' ],
            [ 'skill_type_id' => 7, 'label' => 'Comptabilité clients/fournisseurs' ],
            [ 'skill_type_id' => 7, 'label' => 'Saisie des factures' ],
            [ 'skill_type_id' => 7, 'label' => 'Rapprochements bancaires' ],
            [ 'skill_type_id' => 7, 'label' => 'Clôtures mensuelles et annuelles' ],
            [ 'skill_type_id' => 7, 'label' => 'Analyse financière' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion de trésorerie' ],
            [ 'skill_type_id' => 7, 'label' => 'Déclarations fiscales (TVA, IS, etc.)' ],
            [ 'skill_type_id' => 7, 'label' => 'Fiscalité des entreprises' ],
            [ 'skill_type_id' => 7, 'label' => 'Établissement du bilan et compte de résultat' ],
            [ 'skill_type_id' => 7, 'label' => 'Audit interne' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrôle de gestion' ],
            [ 'skill_type_id' => 7, 'label' => 'Comptabilité analytique' ],
            [ 'skill_type_id' => 7, 'label' => 'Tableaux de bord financiers' ],
            [ 'skill_type_id' => 7, 'label' => 'Reporting financier' ],
            [ 'skill_type_id' => 7, 'label' => 'Facturation et relances clients' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des immobilisations' ],
            [ 'skill_type_id' => 7, 'label' => 'Préparation des budgets' ],
            [ 'skill_type_id' => 7, 'label' => 'Analyse des écarts budgétaires' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrôle de la marge' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des risques financiers' ],
            [ 'skill_type_id' => 7, 'label' => 'Cash-flow management' ],
            [ 'skill_type_id' => 7, 'label' => 'Logiciels comptables (Sage, Ciel, EBP)' ],
            [ 'skill_type_id' => 7, 'label' => 'Normes IFRS' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrôle interne (procédures, SOX)' ],
            [ 'skill_type_id' => 7, 'label' => 'Évaluation d\'entreprises' ],
            [ 'skill_type_id' => 7, 'label' => 'Connaissance des marchés financiers' ],
            [ 'skill_type_id' => 7, 'label' => 'Comptabilité de groupe' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des emprunts et financements' ],
            [ 'skill_type_id' => 7, 'label' => 'Préparation de la liasse fiscale' ],
            [ 'skill_type_id' => 7, 'label' => 'Établissement du tableau des flux de trésorerie (CFS)' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des provisions et amortissements' ],
            [ 'skill_type_id' => 7, 'label' => 'Évaluation et suivi des immobilisations incorporelles' ],
            [ 'skill_type_id' => 7, 'label' => 'Techniques d’affacturage' ],
            [ 'skill_type_id' => 7, 'label' => 'Analyse du besoin en fonds de roulement (BFR)' ],
            [ 'skill_type_id' => 7, 'label' => 'Comptabilisation des stocks' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrat de crédit-bail (leasing)' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion de la trésorerie en devises étrangères' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrôle budgétaire pluriannuel' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion de la fiscalité locale (CFE, CVAE)' ],
            [ 'skill_type_id' => 7, 'label' => 'Reporting sous BI (Business Intelligence)' ],
            [ 'skill_type_id' => 7, 'label' => 'Révision comptable (cycle clients/fournisseurs)' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrôle des écritures de clôture' ],
            [ 'skill_type_id' => 7, 'label' => 'Budgétisation prévisionnelle détaillée' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des flux intragroupes' ],
            [ 'skill_type_id' => 7, 'label' => 'Maîtrise d’un ERP financier (SAP FI, Oracle Fin)' ],
            [ 'skill_type_id' => 7, 'label' => 'Évaluation du risque crédit client' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des placements de trésorerie' ],
            [ 'skill_type_id' => 7, 'label' => 'Pilotage des campagnes de relance' ],
            [ 'skill_type_id' => 7, 'label' => 'Élaboration des comptes consolidés' ],
            [ 'skill_type_id' => 7, 'label' => 'Mesure de la performance financière (EVA, ROCE…)' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des couvertures de change (hedging)' ],
            [ 'skill_type_id' => 7, 'label' => 'Montage de dossiers de subvention' ],
            [ 'skill_type_id' => 7, 'label' => 'Contrôle externe / Commissariat aux comptes' ],
            [ 'skill_type_id' => 7, 'label' => 'Connaissance de la fiscalité internationale' ],
            [ 'skill_type_id' => 7, 'label' => 'Analyse des indicateurs macroéconomiques' ],
            [ 'skill_type_id' => 7, 'label' => 'Calcul et suivi du point mort (break-even)' ],
            [ 'skill_type_id' => 7, 'label' => 'Structuration des emprunts obligataires' ],
            [ 'skill_type_id' => 7, 'label' => 'Suivi des covenants bancaires' ],
            [ 'skill_type_id' => 7, 'label' => 'Gestion des audits (internes/externes)' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit des sociétés' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit commercial' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit du travail' ],
            [ 'skill_type_id' => 8, 'label' => 'Rédaction de contrats' ],
            [ 'skill_type_id' => 8, 'label' => 'Contentieux et litiges' ],
            [ 'skill_type_id' => 8, 'label' => 'Veille juridique' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit fiscal' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit immobilier' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit de la propriété intellectuelle' ],
            [ 'skill_type_id' => 8, 'label' => 'Règlement des litiges (médiation, arbitrage)' ],
            [ 'skill_type_id' => 8, 'label' => 'Procédure civile' ],
            [ 'skill_type_id' => 8, 'label' => 'Rédaction d\'actes juridiques' ],
            [ 'skill_type_id' => 8, 'label' => 'Conseils en conformité réglementaire' ],
            [ 'skill_type_id' => 8, 'label' => 'Secrétariat juridique' ],
            [ 'skill_type_id' => 8, 'label' => 'Gestion des formalités (Kbis, greffe)' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit de la concurrence' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit européen' ],
            [ 'skill_type_id' => 8, 'label' => 'RGPD / Protection des données' ],
            [ 'skill_type_id' => 8, 'label' => 'Due diligence' ],
            [ 'skill_type_id' => 8, 'label' => 'Compliance Officer' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit environnemental' ],
            [ 'skill_type_id' => 8, 'label' => 'Rédaction de contrats internationaux' ],
            [ 'skill_type_id' => 8, 'label' => 'Gestion de brevets et marques' ],
            [ 'skill_type_id' => 8, 'label' => 'Audit légal' ],
            [ 'skill_type_id' => 8, 'label' => 'Plaidoirie (avocat)' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit des assurances' ],
            [ 'skill_type_id' => 8, 'label' => 'Procédures collectives (faillite, redressement)' ],
            [ 'skill_type_id' => 8, 'label' => 'Droit de la consommation' ],
            [ 'skill_type_id' => 8, 'label' => 'Gestion du précontentieux' ],
            [ 'skill_type_id' => 8, 'label' => 'Rédaction de statuts' ],
            [ 'skill_type_id' => 9, 'label' => 'Préparation de cours et supports pédagogiques' ],
            [ 'skill_type_id' => 9, 'label' => 'Techniques d\'animation de groupe' ],
            [ 'skill_type_id' => 9, 'label' => 'Évaluation des acquis' ],
            [ 'skill_type_id' => 9, 'label' => 'Pédagogie différenciée' ],
            [ 'skill_type_id' => 9, 'label' => 'Utilisation des TICE (Technologies de l\'Information)' ],
            [ 'skill_type_id' => 9, 'label' => 'Méthodes actives d\'enseignement' ],
            [ 'skill_type_id' => 9, 'label' => 'Formation pour adultes' ],
            [ 'skill_type_id' => 9, 'label' => 'Gestion de classe' ],
            [ 'skill_type_id' => 9, 'label' => 'Tutorat et mentorat' ],
            [ 'skill_type_id' => 9, 'label' => 'Élaboration d\'examens et de quiz' ],
            [ 'skill_type_id' => 9, 'label' => 'Ingénierie pédagogique' ],
            [ 'skill_type_id' => 9, 'label' => 'Planification des progressions' ],
            [ 'skill_type_id' => 9, 'label' => 'Gestion des élèves en difficulté' ],
            [ 'skill_type_id' => 9, 'label' => 'Création de ressources e-learning' ],
            [ 'skill_type_id' => 9, 'label' => 'Utilisation de plateformes LMS (Moodle, etc.)' ],
            [ 'skill_type_id' => 9, 'label' => 'Éducation inclusive' ],
            [ 'skill_type_id' => 9, 'label' => 'Techniques de remédiation' ],
            [ 'skill_type_id' => 9, 'label' => 'Suivi individualisé des apprenants' ],
            [ 'skill_type_id' => 9, 'label' => 'Connaissances didactiques (didactique disciplinaire)' ],
            [ 'skill_type_id' => 9, 'label' => 'Évaluation par compétences' ],
            [ 'skill_type_id' => 9, 'label' => 'Techniques d\'animation ludopédagogique' ],
            [ 'skill_type_id' => 9, 'label' => 'Accompagnement d\'apprentis' ],
            [ 'skill_type_id' => 9, 'label' => 'Gestion de projets éducatifs' ],
            [ 'skill_type_id' => 9, 'label' => 'Organisation de sorties pédagogiques' ],
            [ 'skill_type_id' => 9, 'label' => 'Analyse des pratiques professionnelles' ],
            [ 'skill_type_id' => 9, 'label' => 'Communication avec les familles' ],
            [ 'skill_type_id' => 9, 'label' => 'Pédagogie Montessori (ou autres)' ],
            [ 'skill_type_id' => 9, 'label' => 'Préparation aux examens officiels' ],
            [ 'skill_type_id' => 9, 'label' => 'Formation en ligne (classes virtuelles)' ],
            [ 'skill_type_id' => 9, 'label' => 'Évaluation continue et formative' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion de l\'eau et de l\'irrigation' ],
            [ 'skill_type_id' => 10, 'label' => 'Agroécologie' ],
            [ 'skill_type_id' => 10, 'label' => 'Agriculture biologique' ],
            [ 'skill_type_id' => 10, 'label' => 'Permaculture' ],
            [ 'skill_type_id' => 10, 'label' => 'Entretien des cultures (semis, récolte)' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion d\'élevage' ],
            [ 'skill_type_id' => 10, 'label' => 'Transformation des produits agricoles' ],
            [ 'skill_type_id' => 10, 'label' => 'Connaissance des normes sanitaires (phyto)' ],
            [ 'skill_type_id' => 10, 'label' => 'Pilotage de machines agricoles' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion d\'une coopérative agricole' ],
            [ 'skill_type_id' => 10, 'label' => 'Viticulture et œnologie' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion des sols et fertilisation' ],
            [ 'skill_type_id' => 10, 'label' => 'Techniques de rotation des cultures' ],
            [ 'skill_type_id' => 10, 'label' => 'Élevage de volailles' ],
            [ 'skill_type_id' => 10, 'label' => 'Apiculture' ],
            [ 'skill_type_id' => 10, 'label' => 'Connaissance des circuits courts' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion de la biodiversité' ],
            [ 'skill_type_id' => 10, 'label' => 'Protection intégrée des cultures' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion des déchets agricoles' ],
            [ 'skill_type_id' => 10, 'label' => 'Études d\'impact environnemental' ],
            [ 'skill_type_id' => 10, 'label' => 'Audit environnemental (ISO 14001)' ],
            [ 'skill_type_id' => 10, 'label' => 'Traitement des eaux usées' ],
            [ 'skill_type_id' => 10, 'label' => 'Techniques de compostage' ],
            [ 'skill_type_id' => 10, 'label' => 'Connaissance des subventions PAC' ],
            [ 'skill_type_id' => 10, 'label' => 'Produits phytosanitaires (manipulation)' ],
            [ 'skill_type_id' => 10, 'label' => 'Contrôle qualité en production agricole' ],
            [ 'skill_type_id' => 10, 'label' => 'Installation de serres et tunnels' ],
            [ 'skill_type_id' => 10, 'label' => 'Utilisation d\'outils de cartographie (SIG)' ],
            [ 'skill_type_id' => 10, 'label' => 'Agriculture de précision (GPS, drones)' ],
            [ 'skill_type_id' => 10, 'label' => 'Gestion de l\'exploitation agricole' ],
            [ 'skill_type_id' => 11, 'label' => 'Planification de projet (Gantt)' ],
            [ 'skill_type_id' => 11, 'label' => 'Coordination d\'équipe' ],
            [ 'skill_type_id' => 11, 'label' => 'Méthodes Agile (Scrum, Kanban)' ],
            [ 'skill_type_id' => 11, 'label' => 'Gestion du budget projet' ],
            [ 'skill_type_id' => 11, 'label' => 'Suivi des jalons (milestones)' ],
            [ 'skill_type_id' => 11, 'label' => 'Leadership et motivation' ],
            [ 'skill_type_id' => 11, 'label' => 'Communication interservices' ],
            [ 'skill_type_id' => 11, 'label' => 'Conduite du changement' ],
            [ 'skill_type_id' => 11, 'label' => 'Analyse des risques' ],
            [ 'skill_type_id' => 11, 'label' => 'MS Project' ],
            [ 'skill_type_id' => 11, 'label' => 'Reporting et tableaux de bord' ],
            [ 'skill_type_id' => 11, 'label' => 'Animation de réunions' ],
            [ 'skill_type_id' => 11, 'label' => 'Méthode Prince2' ],
            [ 'skill_type_id' => 11, 'label' => 'Pilotage de la performance' ],
            [ 'skill_type_id' => 11, 'label' => 'Management interculturel' ],
            [ 'skill_type_id' => 11, 'label' => 'Gestion des conflits' ],
            [ 'skill_type_id' => 11, 'label' => 'Lean Management' ],
            [ 'skill_type_id' => 11, 'label' => 'Six Sigma (DMAIC)' ],
            [ 'skill_type_id' => 11, 'label' => 'Management visuel (Obeya)' ],
            [ 'skill_type_id' => 11, 'label' => 'Soft skills (écoute active, empathie)' ],
            [ 'skill_type_id' => 11, 'label' => 'KPI de performance projet' ],
            [ 'skill_type_id' => 11, 'label' => 'Management d\'équipes à distance' ],
            [ 'skill_type_id' => 11, 'label' => 'Techniques de négociation' ],
            [ 'skill_type_id' => 11, 'label' => 'Organisation matricielle' ],
            [ 'skill_type_id' => 11, 'label' => 'Contrôle de qualité (QC, QA)' ],
            [ 'skill_type_id' => 11, 'label' => 'Documentation projet' ],
            [ 'skill_type_id' => 11, 'label' => 'Capitalisation des connaissances (KM)' ],
            [ 'skill_type_id' => 11, 'label' => 'Management de programme (PGM)' ],
            [ 'skill_type_id' => 11, 'label' => 'Pilotage agile à grande échelle (SAFe)' ],
            [ 'skill_type_id' => 11, 'label' => 'Méthodes hybrides (Agile + V-cycle)' ],
            [ 'skill_type_id' => 11, 'label' => 'Implémentation de la méthode OKR (Objectives & Key Results)' ],
            [ 'skill_type_id' => 11, 'label' => 'Management par délégation' ],
            [ 'skill_type_id' => 11, 'label' => 'Business Process Management (BPM)' ],
            [ 'skill_type_id' => 11, 'label' => 'Management visuel digital (outils virtuels)' ],
            [ 'skill_type_id' => 11, 'label' => 'Retrospective agile avancée' ],
            [ 'skill_type_id' => 11, 'label' => 'Management d\'équipes multi-sites' ],
            [ 'skill_type_id' => 11, 'label' => 'Analyse de la valeur acquise (Earned Value)' ],
            [ 'skill_type_id' => 11, 'label' => 'Plan de gestion documentaire' ],
            [ 'skill_type_id' => 11, 'label' => 'Mise en place d’un PMO (Project Management Office)' ],
            [ 'skill_type_id' => 11, 'label' => 'Méthode 8D (résolution de problèmes)' ],
            [ 'skill_type_id' => 11, 'label' => 'Coordination en mode matriciel' ],
            [ 'skill_type_id' => 11, 'label' => 'RACI (responsabilités, rôles)' ],
            [ 'skill_type_id' => 11, 'label' => 'Agile Scaling Framework (LeSS, Nexus)' ],
            [ 'skill_type_id' => 11, 'label' => 'Gestion de projet événementiel' ],
            [ 'skill_type_id' => 11, 'label' => 'Établissement d’un registre des risques' ],
            [ 'skill_type_id' => 11, 'label' => 'Stakeholder mapping (cartographie parties prenantes)' ],
            [ 'skill_type_id' => 11, 'label' => 'Management participatif' ],
            [ 'skill_type_id' => 11, 'label' => 'Méthodes de brainstorming et créativité' ],
            [ 'skill_type_id' => 11, 'label' => 'Pilotage d’un centre de profits (BU)' ],
            [ 'skill_type_id' => 11, 'label' => 'Évaluation de la maturité projet (CMMI, etc.)' ],
            [ 'skill_type_id' => 11, 'label' => 'Coaching d’équipes pluridisciplinaires' ],
            [ 'skill_type_id' => 11, 'label' => 'Roadmap stratégique sur plusieurs années' ],
            [ 'skill_type_id' => 11, 'label' => 'Mise en place de KPI collaboratifs' ],
            [ 'skill_type_id' => 11, 'label' => 'Organisation d’événements / kick-offs' ],
            [ 'skill_type_id' => 11, 'label' => 'Approche PDCA (Plan-Do-Check-Act)' ],
            [ 'skill_type_id' => 11, 'label' => 'Réunions stand-up quotidiennes (Daily Scrum)' ],
            [ 'skill_type_id' => 11, 'label' => 'Management de projets hybrides (Waterfall + Agile)' ],
            [ 'skill_type_id' => 11, 'label' => 'Charte projet et SLA (Service Level Agreement)' ],
            [ 'skill_type_id' => 11, 'label' => 'Outils collaboratifs intégrés (Teams, Slack, Notion)' ],
            [ 'skill_type_id' => 11, 'label' => 'Culture du feedback continu' ],
            [ 'skill_type_id' => 12, 'label' => 'Accueil client et service en salle' ],
            [ 'skill_type_id' => 12, 'label' => 'Prise de commande et conseil client' ],
            [ 'skill_type_id' => 12, 'label' => 'Techniques de dressage de table' ],
            [ 'skill_type_id' => 12, 'label' => 'Élaboration de menus' ],
            [ 'skill_type_id' => 12, 'label' => 'Cuisine gastronomique' ],
            [ 'skill_type_id' => 12, 'label' => 'Cuisine collective' ],
            [ 'skill_type_id' => 12, 'label' => 'Gestion des approvisionnements alimentaires' ],
            [ 'skill_type_id' => 12, 'label' => 'Maîtrise des normes HACCP' ],
            [ 'skill_type_id' => 12, 'label' => 'Connaissance œnologique (sommelier)' ],
            [ 'skill_type_id' => 12, 'label' => 'Mixologie (cocktails)' ],
            [ 'skill_type_id' => 12, 'label' => 'Gestion de l\'encaissement' ],
            [ 'skill_type_id' => 12, 'label' => 'Gestion des réservations' ],
            [ 'skill_type_id' => 12, 'label' => 'Mise en place (restaurant)' ],
            [ 'skill_type_id' => 12, 'label' => 'Entretien et hygiène de la salle' ],
            [ 'skill_type_id' => 12, 'label' => 'Management d\'équipe en restauration' ],
            [ 'skill_type_id' => 12, 'label' => 'Organisation de banquets et événements' ],
            [ 'skill_type_id' => 12, 'label' => 'Gestion de la relation client (CRM)' ],
            [ 'skill_type_id' => 12, 'label' => 'Négociation avec les fournisseurs' ],
            [ 'skill_type_id' => 12, 'label' => 'Contrôle des stocks alimentaires' ],
            [ 'skill_type_id' => 12, 'label' => 'Nettoyage et désinfection du matériel' ],
            [ 'skill_type_id' => 12, 'label' => 'Élaboration de cocktails' ],
            [ 'skill_type_id' => 12, 'label' => 'Techniques de découpe (viandes, poissons)' ],
            [ 'skill_type_id' => 12, 'label' => 'Préparation de buffets' ],
            [ 'skill_type_id' => 12, 'label' => 'Organisation du travail en cuisine (postes)' ],
            [ 'skill_type_id' => 12, 'label' => 'Maitrise d\'un logiciel de caisse (POS)' ],
            [ 'skill_type_id' => 12, 'label' => 'Contrôle de la qualité des plats' ],
            [ 'skill_type_id' => 12, 'label' => 'Gestion du room service' ],
            [ 'skill_type_id' => 12, 'label' => 'Superviser le service d\'étage (housekeeping)' ],
            [ 'skill_type_id' => 12, 'label' => 'Mise en place d\'animations culinaires' ],
            [ 'skill_type_id' => 12, 'label' => 'Gestion des avis clients et e-réputation' ],
            [ 'skill_type_id' => 13, 'label' => 'Développement Web (HTML, CSS, JS)' ],
            [ 'skill_type_id' => 13, 'label' => 'Développement Front-End (React, Angular)' ],
            [ 'skill_type_id' => 13, 'label' => 'Développement Back-End (PHP, Node.js, Python)' ],
            [ 'skill_type_id' => 13, 'label' => 'Développement Mobile (iOS, Android)' ],
            [ 'skill_type_id' => 13, 'label' => 'Développement Full Stack' ],
            [ 'skill_type_id' => 13, 'label' => 'Gestion de bases de données (SQL, NoSQL)' ],
            [ 'skill_type_id' => 13, 'label' => 'Git et gestion de versions' ],
            [ 'skill_type_id' => 13, 'label' => 'Intégration continue (CI/CD)' ],
            [ 'skill_type_id' => 13, 'label' => 'Cloud computing (AWS, Azure, GCP)' ],
            [ 'skill_type_id' => 13, 'label' => 'DevOps (Docker, Kubernetes)' ],
            [ 'skill_type_id' => 13, 'label' => 'Tests unitaires (JUnit, pytest)' ],
            [ 'skill_type_id' => 13, 'label' => 'Frameworks web (Laravel, Django, Spring)' ],
            [ 'skill_type_id' => 13, 'label' => 'Programmation orientée objet' ],
            [ 'skill_type_id' => 13, 'label' => 'Méthodes de cryptographie' ],
            [ 'skill_type_id' => 13, 'label' => 'API REST et GraphQL' ],
            [ 'skill_type_id' => 13, 'label' => 'UI/UX basique' ],
            [ 'skill_type_id' => 13, 'label' => 'Sécurité applicative (OWASP)' ],
            [ 'skill_type_id' => 13, 'label' => 'Développement Agile (Scrum)' ],
            [ 'skill_type_id' => 13, 'label' => 'Réalisation de tests automatiques' ],
            [ 'skill_type_id' => 13, 'label' => 'Optimisation des performances web' ],
            [ 'skill_type_id' => 13, 'label' => 'Linux (administration basique)' ],
            [ 'skill_type_id' => 13, 'label' => 'Virtualisation (VMware, Hyper-V)' ],
            [ 'skill_type_id' => 13, 'label' => 'Architecture microservices' ],
            [ 'skill_type_id' => 13, 'label' => 'Debugging et profiling d\'applications' ],
            [ 'skill_type_id' => 13, 'label' => 'Utilisation de services externes (API, SDK)' ],
            [ 'skill_type_id' => 13, 'label' => 'Mise en production et déploiement' ],
            [ 'skill_type_id' => 13, 'label' => 'Sécurisation de serveurs web' ],
            [ 'skill_type_id' => 13, 'label' => 'Gestion de projet web' ],
            [ 'skill_type_id' => 13, 'label' => 'Programmation concurrente' ],
            [ 'skill_type_id' => 13, 'label' => 'Conception UML' ],
            [ 'skill_type_id' => 14, 'label' => 'ABAP' ],
            [ 'skill_type_id' => 14, 'label' => 'ABC' ],
            [ 'skill_type_id' => 14, 'label' => 'ActionScript' ],
            [ 'skill_type_id' => 14, 'label' => 'Ada' ],
            [ 'skill_type_id' => 14, 'label' => 'Agda' ],
            [ 'skill_type_id' => 14, 'label' => 'AL (Business Central)' ],
            [ 'skill_type_id' => 14, 'label' => 'Albion' ],
            [ 'skill_type_id' => 14, 'label' => 'Alice' ],
            [ 'skill_type_id' => 14, 'label' => 'AmbientTalk' ],
            [ 'skill_type_id' => 14, 'label' => 'AMPL' ],
            [ 'skill_type_id' => 14, 'label' => 'AngelScript' ],
            [ 'skill_type_id' => 14, 'label' => 'Apex (Salesforce)' ],
            [ 'skill_type_id' => 14, 'label' => 'APL' ],
            [ 'skill_type_id' => 14, 'label' => 'AppleScript' ],
            [ 'skill_type_id' => 14, 'label' => 'Arc' ],
            [ 'skill_type_id' => 14, 'label' => 'Arduino (sketch)' ],
            [ 'skill_type_id' => 14, 'label' => 'AutoHotkey' ],
            [ 'skill_type_id' => 14, 'label' => 'AutoIt' ],
            [ 'skill_type_id' => 14, 'label' => 'AWK' ],
            [ 'skill_type_id' => 14, 'label' => 'B (ancêtre de C)' ],
            [ 'skill_type_id' => 14, 'label' => 'Ballerina' ],
            [ 'skill_type_id' => 14, 'label' => 'BASIC' ],
            [ 'skill_type_id' => 14, 'label' => 'bc (calculatrice Unix)' ],
            [ 'skill_type_id' => 14, 'label' => 'BeanShell' ],
            [ 'skill_type_id' => 14, 'label' => 'Beta' ],
            [ 'skill_type_id' => 14, 'label' => 'BLISS' ],
            [ 'skill_type_id' => 14, 'label' => 'BlitzMax' ],
            [ 'skill_type_id' => 14, 'label' => 'Boo' ],
            [ 'skill_type_id' => 14, 'label' => 'Bourne Shell (sh)' ],
            [ 'skill_type_id' => 14, 'label' => 'Bracmat' ],
            [ 'skill_type_id' => 15, 'label' => 'C' ],
            [ 'skill_type_id' => 15, 'label' => 'C++' ],
            [ 'skill_type_id' => 15, 'label' => 'C#' ],
            [ 'skill_type_id' => 15, 'label' => 'C--' ],
            [ 'skill_type_id' => 15, 'label' => 'C/AL (Microsoft Dynamics)' ],
            [ 'skill_type_id' => 15, 'label' => 'Caché ObjectScript' ],
            [ 'skill_type_id' => 15, 'label' => 'Caml' ],
            [ 'skill_type_id' => 15, 'label' => 'Cat' ],
            [ 'skill_type_id' => 15, 'label' => 'CCML' ],
            [ 'skill_type_id' => 15, 'label' => 'CDuce' ],
            [ 'skill_type_id' => 15, 'label' => 'Cecil' ],
            [ 'skill_type_id' => 15, 'label' => 'Cesil' ],
            [ 'skill_type_id' => 15, 'label' => 'Ch (interpréteur C)' ],
            [ 'skill_type_id' => 15, 'label' => 'Chapel' ],
            [ 'skill_type_id' => 15, 'label' => 'Charm' ],
            [ 'skill_type_id' => 15, 'label' => 'ChucK' ],
            [ 'skill_type_id' => 15, 'label' => 'CL (OS/400)' ],
            [ 'skill_type_id' => 15, 'label' => 'Clean' ],
            [ 'skill_type_id' => 15, 'label' => 'Clip' ],
            [ 'skill_type_id' => 15, 'label' => 'CLIPS' ],
            [ 'skill_type_id' => 15, 'label' => 'CLU' ],
            [ 'skill_type_id' => 15, 'label' => 'Cobra' ],
            [ 'skill_type_id' => 15, 'label' => 'Cobol' ],
            [ 'skill_type_id' => 15, 'label' => 'CoffeeScript' ],
            [ 'skill_type_id' => 15, 'label' => 'ColdFusion' ],
            [ 'skill_type_id' => 15, 'label' => 'COMAL' ],
            [ 'skill_type_id' => 15, 'label' => 'Common Lisp' ],
            [ 'skill_type_id' => 15, 'label' => 'Coq' ],
            [ 'skill_type_id' => 15, 'label' => 'CPL (Cambridge)' ],
            [ 'skill_type_id' => 16, 'label' => 'D' ],
            [ 'skill_type_id' => 16, 'label' => 'Dart' ],
            [ 'skill_type_id' => 16, 'label' => 'DASL (Datapoint)' ],
            [ 'skill_type_id' => 16, 'label' => 'DCAL' ],
            [ 'skill_type_id' => 16, 'label' => 'dBase' ],
            [ 'skill_type_id' => 16, 'label' => 'DCG (Prolog extension)' ],
            [ 'skill_type_id' => 16, 'label' => 'Delphi (Object Pascal)' ],
            [ 'skill_type_id' => 16, 'label' => 'Diana' ],
            [ 'skill_type_id' => 16, 'label' => 'Dylan' ],
            [ 'skill_type_id' => 16, 'label' => 'E (Secure distributed)' ],
            [ 'skill_type_id' => 16, 'label' => 'Easy PL/I' ],
            [ 'skill_type_id' => 16, 'label' => 'Eiffel' ],
            [ 'skill_type_id' => 16, 'label' => 'Elixir' ],
            [ 'skill_type_id' => 16, 'label' => 'Elm' ],
            [ 'skill_type_id' => 16, 'label' => 'Emacs Lisp' ],
            [ 'skill_type_id' => 16, 'label' => 'Erlang' ],
            [ 'skill_type_id' => 16, 'label' => 'ES (Edinburgh IMP)' ],
            [ 'skill_type_id' => 16, 'label' => 'Esterel' ],
            [ 'skill_type_id' => 16, 'label' => 'Etoys (Squeak)' ],
            [ 'skill_type_id' => 16, 'label' => 'F#' ],
            [ 'skill_type_id' => 16, 'label' => 'Factor' ],
            [ 'skill_type_id' => 16, 'label' => 'Fantom' ],
            [ 'skill_type_id' => 16, 'label' => 'Fausto' ],
            [ 'skill_type_id' => 16, 'label' => 'Felix' ],
            [ 'skill_type_id' => 16, 'label' => 'Flix' ],
            [ 'skill_type_id' => 16, 'label' => 'FLOW-MATIC' ],
            [ 'skill_type_id' => 16, 'label' => 'Fortran' ],
            [ 'skill_type_id' => 16, 'label' => 'Fortress' ],
            [ 'skill_type_id' => 16, 'label' => 'FoxPro' ],
            [ 'skill_type_id' => 17, 'label' => 'ALGOL 58/60/68' ],
            [ 'skill_type_id' => 17, 'label' => 'APT (Automatic Programmed Tools)' ],
            [ 'skill_type_id' => 17, 'label' => 'Atlas Autocode' ],
            [ 'skill_type_id' => 17, 'label' => 'Brainfuck (esolang)' ],
            [ 'skill_type_id' => 17, 'label' => 'Chef (esolang)' ],
            [ 'skill_type_id' => 17, 'label' => 'Cleopatra (langage combinatoire)' ],
            [ 'skill_type_id' => 17, 'label' => 'COME FROM (humour)' ],
            [ 'skill_type_id' => 17, 'label' => 'CORAL 66' ],
            [ 'skill_type_id' => 17, 'label' => 'ELAN (educational)' ],
            [ 'skill_type_id' => 17, 'label' => 'FOCAL (DEC)' ],
            [ 'skill_type_id' => 17, 'label' => 'G-code (CNC)' ],
            [ 'skill_type_id' => 17, 'label' => 'HyperTalk' ],
            [ 'skill_type_id' => 17, 'label' => 'INTERCAL (esolang)' ],
            [ 'skill_type_id' => 17, 'label' => 'LYaPAS (Soviet)' ],
            [ 'skill_type_id' => 17, 'label' => 'MaryScript (éso)' ],
            [ 'skill_type_id' => 17, 'label' => 'MIIS (medical)' ],
            [ 'skill_type_id' => 17, 'label' => 'MQL4/MQL5 (MetaTrader)' ],
            [ 'skill_type_id' => 17, 'label' => 'Nial (Nested Interactive Array)' ],
            [ 'skill_type_id' => 17, 'label' => 'OPL (Psion)' ],
            [ 'skill_type_id' => 17, 'label' => 'Piet (esolang basé images)' ],
            [ 'skill_type_id' => 17, 'label' => 'PRO-IV' ],
            [ 'skill_type_id' => 17, 'label' => 'Qore' ],
            [ 'skill_type_id' => 17, 'label' => 'Shakespeare (esolang)' ],
            [ 'skill_type_id' => 17, 'label' => 'SuperTalk (3DO)' ],
            [ 'skill_type_id' => 17, 'label' => 'TIE (Text Interactive)' ],
            [ 'skill_type_id' => 17, 'label' => 'UnReal Script (Unreal Engine)' ],
            [ 'skill_type_id' => 17, 'label' => 'Visual DialogScript' ],
            [ 'skill_type_id' => 17, 'label' => 'WIPL (Western Instruments)' ],
            [ 'skill_type_id' => 17, 'label' => 'XIL (historique)' ],
            [ 'skill_type_id' => 17, 'label' => 'Yuck (esolang)' ],
            [ 'skill_type_id' => 18, 'label' => 'G (Erlang extension)' ],
            [ 'skill_type_id' => 18, 'label' => 'GAMS (Math. modeling)' ],
            [ 'skill_type_id' => 18, 'label' => 'GAP (Group theory)' ],
            [ 'skill_type_id' => 18, 'label' => 'GDScript (Godot Engine)' ],
            [ 'skill_type_id' => 18, 'label' => 'Genie (Vala-based)' ],
            [ 'skill_type_id' => 18, 'label' => 'GF (Grammatical Framework)' ],
            [ 'skill_type_id' => 18, 'label' => 'Golo' ],
            [ 'skill_type_id' => 18, 'label' => 'Go (Golang)' ],
            [ 'skill_type_id' => 18, 'label' => 'Gosu' ],
            [ 'skill_type_id' => 18, 'label' => 'GPSS (Simulation)' ],
            [ 'skill_type_id' => 18, 'label' => 'GraphTalk' ],
            [ 'skill_type_id' => 18, 'label' => 'Groovy' ],
            [ 'skill_type_id' => 18, 'label' => 'Hack (Meta/Facebook)' ],
            [ 'skill_type_id' => 18, 'label' => 'Haggis' ],
            [ 'skill_type_id' => 18, 'label' => 'HAL/S (NASA)' ],
            [ 'skill_type_id' => 18, 'label' => 'Haskell' ],
            [ 'skill_type_id' => 18, 'label' => 'Haxe' ],
            [ 'skill_type_id' => 18, 'label' => 'Hermes' ],
            [ 'skill_type_id' => 18, 'label' => 'High Level Assembly' ],
            [ 'skill_type_id' => 18, 'label' => 'Hope' ],
            [ 'skill_type_id' => 18, 'label' => 'Hot. . . (esolang)' ],
            [ 'skill_type_id' => 18, 'label' => 'HPGL (plotter language)' ],
            [ 'skill_type_id' => 18, 'label' => 'HTML (HyperText Markup)' ],
            [ 'skill_type_id' => 18, 'label' => 'Hugo (domain-specific)' ],
            [ 'skill_type_id' => 18, 'label' => 'HyperTalk (Apple)' ],
            [ 'skill_type_id' => 18, 'label' => 'Icon' ],
            [ 'skill_type_id' => 18, 'label' => 'IDL (Interface Definition Language)' ],
            [ 'skill_type_id' => 18, 'label' => 'Idris' ],
            [ 'skill_type_id' => 18, 'label' => 'IML (symbolic math)' ],
            [ 'skill_type_id' => 19, 'label' => 'Inform (fiction)' ],
            [ 'skill_type_id' => 19, 'label' => 'Io' ],
            [ 'skill_type_id' => 19, 'label' => 'Ioke' ],
            [ 'skill_type_id' => 19, 'label' => 'IPL (Information Processing Language)' ],
            [ 'skill_type_id' => 19, 'label' => 'ISLISP' ],
            [ 'skill_type_id' => 19, 'label' => 'J' ],
            [ 'skill_type_id' => 19, 'label' => 'J# (Microsoft)' ],
            [ 'skill_type_id' => 19, 'label' => 'JAL (Just Another Language)' ],
            [ 'skill_type_id' => 19, 'label' => 'Janus' ],
            [ 'skill_type_id' => 19, 'label' => 'Java' ],
            [ 'skill_type_id' => 19, 'label' => 'JavaScript' ],
            [ 'skill_type_id' => 19, 'label' => 'Julia' ],
            [ 'skill_type_id' => 19, 'label' => 'Kaya' ],
            [ 'skill_type_id' => 19, 'label' => 'Kermit (scripting)' ],
            [ 'skill_type_id' => 19, 'label' => 'Kite' ],
            [ 'skill_type_id' => 19, 'label' => 'Kotlin' ],
            [ 'skill_type_id' => 19, 'label' => 'KRL (smart data)' ],
            [ 'skill_type_id' => 19, 'label' => 'LabVIEW' ],
            [ 'skill_type_id' => 19, 'label' => 'Ladder Logic (Automates)' ],
            [ 'skill_type_id' => 19, 'label' => 'Lasso' ],
            [ 'skill_type_id' => 19, 'label' => 'Lava' ],
            [ 'skill_type_id' => 19, 'label' => 'LC-3 Assembly' ],
            [ 'skill_type_id' => 19, 'label' => 'Ledger (blockchain DSL)' ],
            [ 'skill_type_id' => 19, 'label' => 'Leg (compiler language)' ],
            [ 'skill_type_id' => 19, 'label' => 'LemonScript' ],
            [ 'skill_type_id' => 19, 'label' => 'Lily (scripting)' ],
            [ 'skill_type_id' => 19, 'label' => 'Limbo (Inferno OS)' ],
            [ 'skill_type_id' => 19, 'label' => 'Lisp' ],
            [ 'skill_type_id' => 19, 'label' => 'Logo' ],
            [ 'skill_type_id' => 19, 'label' => 'Lua' ],
            [ 'skill_type_id' => 20, 'label' => 'M (MUMPS)' ],
            [ 'skill_type_id' => 20, 'label' => 'Magik (Smallworld)' ],
            [ 'skill_type_id' => 20, 'label' => 'Maple' ],
            [ 'skill_type_id' => 20, 'label' => 'Mary (exolang)' ],
            [ 'skill_type_id' => 20, 'label' => 'Matlab' ],
            [ 'skill_type_id' => 20, 'label' => 'Max/MSP' ],
            [ 'skill_type_id' => 20, 'label' => 'Mercury' ],
            [ 'skill_type_id' => 20, 'label' => 'Metapost' ],
            [ 'skill_type_id' => 20, 'label' => 'ML (Standard ML, SML)' ],
            [ 'skill_type_id' => 20, 'label' => 'Modula-2' ],
            [ 'skill_type_id' => 20, 'label' => 'Mojo (IA compile)' ],
            [ 'skill_type_id' => 20, 'label' => 'Monkey X' ],
            [ 'skill_type_id' => 20, 'label' => 'MSIL (intermediate .NET)' ],
            [ 'skill_type_id' => 20, 'label' => 'Neko' ],
            [ 'skill_type_id' => 20, 'label' => 'Neruat (esolang)' ],
            [ 'skill_type_id' => 20, 'label' => 'NewtonScript' ],
            [ 'skill_type_id' => 20, 'label' => 'Nim' ],
            [ 'skill_type_id' => 20, 'label' => 'Oberon' ],
            [ 'skill_type_id' => 20, 'label' => 'Objective-C' ],
            [ 'skill_type_id' => 20, 'label' => 'OCaml' ],
            [ 'skill_type_id' => 20, 'label' => 'Occam' ],
            [ 'skill_type_id' => 20, 'label' => 'Octave' ],
            [ 'skill_type_id' => 20, 'label' => 'Odin' ],
            [ 'skill_type_id' => 20, 'label' => 'Opa (Web)' ],
            [ 'skill_type_id' => 20, 'label' => 'OPS5' ],
            [ 'skill_type_id' => 20, 'label' => 'Pascal' ],
            [ 'skill_type_id' => 20, 'label' => 'Perl' ],
            [ 'skill_type_id' => 20, 'label' => 'Pharo (Smalltalk)' ],
            [ 'skill_type_id' => 20, 'label' => 'PHP' ],
            [ 'skill_type_id' => 20, 'label' => 'Pike' ],
            [ 'skill_type_id' => 21, 'label' => 'PL/I' ],
            [ 'skill_type_id' => 21, 'label' => 'PL/SQL' ],
            [ 'skill_type_id' => 21, 'label' => 'PostScript' ],
            [ 'skill_type_id' => 21, 'label' => 'PowerBuilder' ],
            [ 'skill_type_id' => 21, 'label' => 'PowerShell' ],
            [ 'skill_type_id' => 21, 'label' => 'Processing' ],
            [ 'skill_type_id' => 21, 'label' => 'Prolog' ],
            [ 'skill_type_id' => 21, 'label' => 'Pure Data' ],
            [ 'skill_type_id' => 21, 'label' => 'Pyg (esolang)' ],
            [ 'skill_type_id' => 21, 'label' => 'Python' ],
            [ 'skill_type_id' => 21, 'label' => 'Q# (Quantum Microsoft)' ],
            [ 'skill_type_id' => 21, 'label' => 'Q (Kx Systems)' ],
            [ 'skill_type_id' => 21, 'label' => 'Quartz (graphic tool)' ],
            [ 'skill_type_id' => 21, 'label' => 'R (statistiques)' ],
            [ 'skill_type_id' => 21, 'label' => 'Racket' ],
            [ 'skill_type_id' => 21, 'label' => 'RAPID (ABB robots)' ],
            [ 'skill_type_id' => 21, 'label' => 'Ratfor (Rational Fortran)' ],
            [ 'skill_type_id' => 21, 'label' => 'RC (Plan 9 shell)' ],
            [ 'skill_type_id' => 21, 'label' => 'Red (inspiré de Rebol)' ],
            [ 'skill_type_id' => 21, 'label' => 'Redcode (Core War)' ],
            [ 'skill_type_id' => 21, 'label' => 'Reia' ],
            [ 'skill_type_id' => 21, 'label' => 'Rexx' ],
            [ 'skill_type_id' => 21, 'label' => 'Ring' ],
            [ 'skill_type_id' => 21, 'label' => 'REX (Regular Expression Executor)' ],
            [ 'skill_type_id' => 21, 'label' => 'ROOP (AI rule-based)' ],
            [ 'skill_type_id' => 21, 'label' => 'RPG (Report Program Generator)' ],
            [ 'skill_type_id' => 21, 'label' => 'RTL/2' ],
            [ 'skill_type_id' => 21, 'label' => 'Ruby' ],
            [ 'skill_type_id' => 21, 'label' => 'Rust' ],
            [ 'skill_type_id' => 22, 'label' => 'S (Statistical)' ],
            [ 'skill_type_id' => 22, 'label' => 'SAS' ],
            [ 'skill_type_id' => 22, 'label' => 'Scala' ],
            [ 'skill_type_id' => 22, 'label' => 'Scheme' ],
            [ 'skill_type_id' => 22, 'label' => 'Scilab' ],
            [ 'skill_type_id' => 22, 'label' => 'Scratch' ],
            [ 'skill_type_id' => 22, 'label' => 'sed' ],
            [ 'skill_type_id' => 22, 'label' => 'Seed7' ],
            [ 'skill_type_id' => 22, 'label' => 'Self' ],
            [ 'skill_type_id' => 22, 'label' => 'Shan (Erlang DSL)' ],
            [ 'skill_type_id' => 22, 'label' => 'Simula' ],
            [ 'skill_type_id' => 22, 'label' => 'SLIP (list proc)' ],
            [ 'skill_type_id' => 22, 'label' => 'Smalltalk' ],
            [ 'skill_type_id' => 22, 'label' => 'SNOBOL' ],
            [ 'skill_type_id' => 22, 'label' => 'Solidity (Ethereum)' ],
            [ 'skill_type_id' => 22, 'label' => 'Spark (ADA subset)' ],
            [ 'skill_type_id' => 22, 'label' => 'SPIN (Promela)' ],
            [ 'skill_type_id' => 22, 'label' => 'SP/k (teaching)' ],
            [ 'skill_type_id' => 22, 'label' => 'SQL' ],
            [ 'skill_type_id' => 22, 'label' => 'Squirrel' ],
            [ 'skill_type_id' => 22, 'label' => 'SRecode (GNU)' ],
            [ 'skill_type_id' => 22, 'label' => 'S Lang (stats)' ],
            [ 'skill_type_id' => 22, 'label' => 'Swift' ],
            [ 'skill_type_id' => 22, 'label' => 'TACL (HP NonStop)' ],
            [ 'skill_type_id' => 22, 'label' => 'TADS (Interactive Fiction)' ],
            [ 'skill_type_id' => 22, 'label' => 'TCL (Tool Command Language)' ],
            [ 'skill_type_id' => 22, 'label' => 'Tea' ],
            [ 'skill_type_id' => 22, 'label' => 'TECO' ],
            [ 'skill_type_id' => 22, 'label' => 'Terra' ],
            [ 'skill_type_id' => 23, 'label' => 'Ubercode' ],
            [ 'skill_type_id' => 23, 'label' => 'Unicon' ],
            [ 'skill_type_id' => 23, 'label' => 'Unlambda' ],
            [ 'skill_type_id' => 23, 'label' => 'V (langage sim. à Go)' ],
            [ 'skill_type_id' => 23, 'label' => 'Visual Basic' ],
            [ 'skill_type_id' => 23, 'label' => 'Visual Basic .NET' ],
            [ 'skill_type_id' => 23, 'label' => 'Visual DialogScript' ],
            [ 'skill_type_id' => 23, 'label' => 'Visual FoxPro' ],
            [ 'skill_type_id' => 23, 'label' => 'WATFIV (Fortran)' ],
            [ 'skill_type_id' => 23, 'label' => 'WebAssembly (Wasm)' ],
            [ 'skill_type_id' => 23, 'label' => 'Whiley' ],
            [ 'skill_type_id' => 23, 'label' => 'Whitespace (esolang)' ],
            [ 'skill_type_id' => 23, 'label' => 'Wolfram Language' ],
            [ 'skill_type_id' => 23, 'label' => 'X++ (Dynamics AX)' ],
            [ 'skill_type_id' => 23, 'label' => 'X# (XSharp)' ],
            [ 'skill_type_id' => 23, 'label' => 'XBL (Mozilla)' ],
            [ 'skill_type_id' => 23, 'label' => 'xc (Occam dialect)' ],
            [ 'skill_type_id' => 23, 'label' => 'Xojo (REALbasic)' ],
            [ 'skill_type_id' => 23, 'label' => 'XOTcl' ],
            [ 'skill_type_id' => 23, 'label' => 'XQuery (XML)' ],
            [ 'skill_type_id' => 23, 'label' => 'XSLT (transformation)' ],
            [ 'skill_type_id' => 23, 'label' => 'Y (esolang)' ],
            [ 'skill_type_id' => 23, 'label' => 'Yorick' ],
            [ 'skill_type_id' => 23, 'label' => 'YQL (Yahoo Query)' ],
            [ 'skill_type_id' => 23, 'label' => 'Z (Z notation)' ],
            [ 'skill_type_id' => 23, 'label' => 'Z shell (zsh)' ],
            [ 'skill_type_id' => 23, 'label' => 'ZetaLisp' ],
            [ 'skill_type_id' => 23, 'label' => 'Zig' ],
            [ 'skill_type_id' => 23, 'label' => 'ZPL (parallel)' ],
            [ 'skill_type_id' => 24, 'label' => 'Conception assistée par ordinateur (CAO)' ],
            [ 'skill_type_id' => 24, 'label' => 'DAO (Dessin assisté par ordinateur)' ],
            [ 'skill_type_id' => 24, 'label' => 'Logiciels CAD (AutoCAD, SolidWorks)' ],
            [ 'skill_type_id' => 24, 'label' => 'Gestion de la production (MRP, ERP)' ],
            [ 'skill_type_id' => 24, 'label' => 'Maintenance industrielle' ],
            [ 'skill_type_id' => 24, 'label' => 'Gestion de la qualité (ISO 9001)' ],
            [ 'skill_type_id' => 24, 'label' => 'Lean Manufacturing' ],
            [ 'skill_type_id' => 24, 'label' => 'Méthodes 5S' ],
            [ 'skill_type_id' => 24, 'label' => 'Connaissance en mécanique' ],
            [ 'skill_type_id' => 24, 'label' => 'Connaissance en électricité' ],
            [ 'skill_type_id' => 24, 'label' => 'Connaissance en électronique' ],
            [ 'skill_type_id' => 24, 'label' => 'Automatisme (API, PLC)' ],
            [ 'skill_type_id' => 24, 'label' => 'Robotique industrielle' ],
            [ 'skill_type_id' => 24, 'label' => 'Usinage (CNC)' ],
            [ 'skill_type_id' => 24, 'label' => 'Calcul de structures' ],
            [ 'skill_type_id' => 24, 'label' => 'Ingénierie de la fiabilité' ],
            [ 'skill_type_id' => 24, 'label' => 'Gestion de projet industriel' ],
            [ 'skill_type_id' => 24, 'label' => 'Rédaction de cahier des charges techniques' ],
            [ 'skill_type_id' => 24, 'label' => 'Contrôle non destructif (CND)' ],
            [ 'skill_type_id' => 24, 'label' => 'Sécurité en milieu industriel' ],
            [ 'skill_type_id' => 24, 'label' => 'Gestion de l\'énergie' ],
            [ 'skill_type_id' => 24, 'label' => 'Conception de prototypes' ],
            [ 'skill_type_id' => 24, 'label' => 'Planification de production' ],
            [ 'skill_type_id' => 24, 'label' => 'Méthodes Kanban' ],
            [ 'skill_type_id' => 24, 'label' => 'Ingénierie de la valeur' ],
            [ 'skill_type_id' => 24, 'label' => 'Sûreté de fonctionnement (SIL, CE)' ],
            [ 'skill_type_id' => 24, 'label' => 'Gestion de la logistique industrielle' ],
            [ 'skill_type_id' => 24, 'label' => 'Normes environnementales (ISO 14001)' ],
            [ 'skill_type_id' => 24, 'label' => 'Réalisation de plans et schémas' ],
            [ 'skill_type_id' => 24, 'label' => 'Calcul de coûts industriels' ],
            [ 'skill_type_id' => 25, 'label' => 'Level design (conception de niveaux)' ],
            [ 'skill_type_id' => 25, 'label' => 'Game design document (GDD)' ],
            [ 'skill_type_id' => 25, 'label' => 'Mécaniques de jeu (gameplay loops)' ],
            [ 'skill_type_id' => 25, 'label' => 'Programmation des comportements IA (NPCs, pathfinding)' ],
            [ 'skill_type_id' => 25, 'label' => 'Intégration assets (Unity, Unreal Engine)' ],
            [ 'skill_type_id' => 25, 'label' => 'Cinematics (séquences animées)' ],
            [ 'skill_type_id' => 25, 'label' => 'Rigging de personnages 3D' ],
            [ 'skill_type_id' => 25, 'label' => 'Animation 2D (Spine, Toon Boom)' ],
            [ 'skill_type_id' => 25, 'label' => 'Animation 3D (Maya, 3ds Max)' ],
            [ 'skill_type_id' => 25, 'label' => 'Éclairage en temps réel (light baking)' ],
            [ 'skill_type_id' => 25, 'label' => 'Audio middleware (FMOD, Wwise)' ],
            [ 'skill_type_id' => 25, 'label' => 'VFX (effets spéciaux en jeu, particules)' ],
            [ 'skill_type_id' => 25, 'label' => 'Shading et PBR (Substance, Quixel)' ],
            [ 'skill_type_id' => 25, 'label' => 'Multijoueur en réseau (netcode)' ],
            [ 'skill_type_id' => 25, 'label' => 'Gestion du versioning (Perforce, Plastic SCM)' ],
            [ 'skill_type_id' => 25, 'label' => 'Programmation des inputs (controllers, VR)' ],
            [ 'skill_type_id' => 25, 'label' => 'Profiling des performances (framerate, memory)' ],
            [ 'skill_type_id' => 25, 'label' => 'Gestion du pipeline build (CI pour jeux)' ],
            [ 'skill_type_id' => 25, 'label' => 'Création d’interfaces HUD / UI en jeu' ],
            [ 'skill_type_id' => 25, 'label' => 'Documentation technique de gameplay' ],
            [ 'skill_type_id' => 25, 'label' => 'Testing fonctionnel et focus group' ],
            [ 'skill_type_id' => 25, 'label' => 'Playtest et QA management' ],
            [ 'skill_type_id' => 25, 'label' => 'Localisation et LQA (linguistic QA)' ],
            [ 'skill_type_id' => 25, 'label' => 'Réalisation de trailers et teasers' ],
            [ 'skill_type_id' => 25, 'label' => 'Gestion des DLC / contenu additionnel' ],
            [ 'skill_type_id' => 25, 'label' => 'Monétisation (F2P, microtransactions)' ],
            [ 'skill_type_id' => 25, 'label' => 'App store submission (console, mobile)' ],
            [ 'skill_type_id' => 25, 'label' => 'Scripting visual (Blueprints, Bolt)' ],
            [ 'skill_type_id' => 25, 'label' => 'Implémentation VR/AR (Oculus, Hololens)' ],
            [ 'skill_type_id' => 25, 'label' => 'Intégration cross-platform (PC, console, mobile)' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des stocks' ],
            [ 'skill_type_id' => 26, 'label' => 'Approvisionnement' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des flux' ],
            [ 'skill_type_id' => 26, 'label' => 'Planification de la demande (Demand Planning)' ],
            [ 'skill_type_id' => 26, 'label' => 'Organisation du transport' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion d\'entrepôt' ],
            [ 'skill_type_id' => 26, 'label' => 'Techniques d\'emballage et conditionnement' ],
            [ 'skill_type_id' => 26, 'label' => 'Optimisation des tournées' ],
            [ 'skill_type_id' => 26, 'label' => 'Incoterms' ],
            [ 'skill_type_id' => 26, 'label' => 'Douanes et déclarations import/export' ],
            [ 'skill_type_id' => 26, 'label' => 'Outils WMS (Warehouse Management System)' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des prestataires logistiques' ],
            [ 'skill_type_id' => 26, 'label' => 'Prévision des ventes et de la demande' ],
            [ 'skill_type_id' => 26, 'label' => 'Cross-docking' ],
            [ 'skill_type_id' => 26, 'label' => 'Picking et packing' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des retours (reverse logistics)' ],
            [ 'skill_type_id' => 26, 'label' => 'Traçabilité des produits' ],
            [ 'skill_type_id' => 26, 'label' => 'ERP logistiques (SAP, Oracle)' ],
            [ 'skill_type_id' => 26, 'label' => 'Lean Supply Chain' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des risques logistiques' ],
            [ 'skill_type_id' => 26, 'label' => 'Optimisation des coûts de transport' ],
            [ 'skill_type_id' => 26, 'label' => 'Sécurité des marchandises (ADR)' ],
            [ 'skill_type_id' => 26, 'label' => 'Planification MRP' ],
            [ 'skill_type_id' => 26, 'label' => 'Suivi des indicateurs logistiques (OTD, fill rate)' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion de la relation fournisseurs' ],
            [ 'skill_type_id' => 26, 'label' => 'Négociation des contrats de transport' ],
            [ 'skill_type_id' => 26, 'label' => 'EDI (Échange de données informatisées)' ],
            [ 'skill_type_id' => 26, 'label' => 'Stratégie omnicanale' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des inventaires périodiques' ],
            [ 'skill_type_id' => 26, 'label' => 'Modèles de stock (juste-à-temps)' ],
            [ 'skill_type_id' => 26, 'label' => 'Évaluation de la performance transport (indicateurs OTIF, etc.)' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des flux tendus' ],
            [ 'skill_type_id' => 26, 'label' => 'Optimisation de l’espace d’entreposage' ],
            [ 'skill_type_id' => 26, 'label' => 'Prévision de la demande saisonnière' ],
            [ 'skill_type_id' => 26, 'label' => 'Méthodes de cross docking avancées' ],
            [ 'skill_type_id' => 26, 'label' => 'Pilotage par l’indicateur de niveau de service' ],
            [ 'skill_type_id' => 26, 'label' => 'Approvisionnement piloté par le fournisseur (VMI)' ],
            [ 'skill_type_id' => 26, 'label' => 'Stock picking automatisé (robots, AGV)' ],
            [ 'skill_type_id' => 26, 'label' => 'Mise en place d’entrepôts automatisés (AS/RS)' ],
            [ 'skill_type_id' => 26, 'label' => 'Systèmes de code-barres et RFID' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des litiges transporteurs' ],
            [ 'skill_type_id' => 26, 'label' => 'Analyse ABC (pareto)' ],
            [ 'skill_type_id' => 26, 'label' => 'Collaboration logistique avec clients/fournisseurs' ],
            [ 'skill_type_id' => 26, 'label' => 'Distribution multicanale (magasin, e-commerce)' ],
            [ 'skill_type_id' => 26, 'label' => 'Pilotage de la reverse logistics (retours SAV)' ],
            [ 'skill_type_id' => 26, 'label' => 'Consolidation de chargements (Groupage)' ],
            [ 'skill_type_id' => 26, 'label' => 'Planification transport multimodal' ],
            [ 'skill_type_id' => 26, 'label' => 'Application des normes de sûreté (OEA, etc.)' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des incoterms complexes (DDP, EXW…)' ],
            [ 'skill_type_id' => 26, 'label' => 'Analyse des lead times critiques' ],
            [ 'skill_type_id' => 26, 'label' => 'Choix d’emballages écologiques' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion des pics d’activité (Black Friday, soldes)' ],
            [ 'skill_type_id' => 26, 'label' => 'Mise en œuvre d’un TMS (Transport Management System)' ],
            [ 'skill_type_id' => 26, 'label' => 'Calcul du taux de service logistique' ],
            [ 'skill_type_id' => 26, 'label' => 'Stratégie de routage (pick-up & delivery)' ],
            [ 'skill_type_id' => 26, 'label' => 'Maîtrise des KPIs : fill rate, lead time, CFR' ],
            [ 'skill_type_id' => 26, 'label' => 'Audit logistique global (flux, stockage, transport)' ],
            [ 'skill_type_id' => 26, 'label' => 'Pilotage d’une supply chain internationale' ],
            [ 'skill_type_id' => 26, 'label' => 'Mise en place de tournées vertes (réduction CO₂)' ],
            [ 'skill_type_id' => 26, 'label' => 'Gestion de la pénurie (backorder)' ],
            [ 'skill_type_id' => 27, 'label' => 'Élaboration de plan marketing' ],
            [ 'skill_type_id' => 27, 'label' => 'Études de marché' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing digital' ],
            [ 'skill_type_id' => 27, 'label' => 'SEO (Référencement naturel)' ],
            [ 'skill_type_id' => 27, 'label' => 'SEA (Référencement payant)' ],
            [ 'skill_type_id' => 27, 'label' => 'Community management' ],
            [ 'skill_type_id' => 27, 'label' => 'Stratégie de marque (branding)' ],
            [ 'skill_type_id' => 27, 'label' => 'Rédaction de contenus' ],
            [ 'skill_type_id' => 27, 'label' => 'Publicité en ligne (Google Ads, Facebook Ads)' ],
            [ 'skill_type_id' => 27, 'label' => 'Email marketing' ],
            [ 'skill_type_id' => 27, 'label' => 'Inbound marketing' ],
            [ 'skill_type_id' => 27, 'label' => 'Analyse d\'audience (Google Analytics)' ],
            [ 'skill_type_id' => 27, 'label' => 'Veille concurrentielle' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing d\'influence' ],
            [ 'skill_type_id' => 27, 'label' => 'Gestion des réseaux sociaux' ],
            [ 'skill_type_id' => 27, 'label' => 'Élaboration de supports de communication' ],
            [ 'skill_type_id' => 27, 'label' => 'Relations presse' ],
            [ 'skill_type_id' => 27, 'label' => 'Organisation d\'événements' ],
            [ 'skill_type_id' => 27, 'label' => 'Gestion de partenariats' ],
            [ 'skill_type_id' => 27, 'label' => 'Communication de crise' ],
            [ 'skill_type_id' => 27, 'label' => 'Storytelling' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing Automation' ],
            [ 'skill_type_id' => 27, 'label' => 'Growth hacking' ],
            [ 'skill_type_id' => 27, 'label' => 'Web design de base' ],
            [ 'skill_type_id' => 27, 'label' => 'UX writing' ],
            [ 'skill_type_id' => 27, 'label' => 'Création de newsletters' ],
            [ 'skill_type_id' => 27, 'label' => 'Stratégie marketing multicanale' ],
            [ 'skill_type_id' => 27, 'label' => 'Mesure du ROI marketing' ],
            [ 'skill_type_id' => 27, 'label' => 'Création de plan média' ],
            [ 'skill_type_id' => 27, 'label' => 'Copywriting' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing B2B avancé' ],
            [ 'skill_type_id' => 27, 'label' => 'AB Testing Marketing' ],
            [ 'skill_type_id' => 27, 'label' => 'UX Research (entretiens utilisateurs)' ],
            [ 'skill_type_id' => 27, 'label' => 'Benchmarking concurrentiel approfondi' ],
            [ 'skill_type_id' => 27, 'label' => 'Community Management temps réel' ],
            [ 'skill_type_id' => 27, 'label' => 'Pilotage de campagnes d’affiliation' ],
            [ 'skill_type_id' => 27, 'label' => 'Création de Landing Pages performantes' ],
            [ 'skill_type_id' => 27, 'label' => 'Stratégie de brand content' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing audio (podcasts, spots radio)' ],
            [ 'skill_type_id' => 27, 'label' => 'Publicité programmatique (DSP, SSP)' ],
            [ 'skill_type_id' => 27, 'label' => 'Gestion de budgets publicitaires multi-plateformes' ],
            [ 'skill_type_id' => 27, 'label' => 'CRM automation (HubSpot, Pardot)' ],
            [ 'skill_type_id' => 27, 'label' => 'Copywriting persuasif (techniques AIDA, PAS)' ],
            [ 'skill_type_id' => 27, 'label' => 'Influence Marketing (TikTok, Instagram)' ],
            [ 'skill_type_id' => 27, 'label' => 'Content spinning / spin-tax' ],
            [ 'skill_type_id' => 27, 'label' => 'CRM analytique (segmentation, RFM)' ],
            [ 'skill_type_id' => 27, 'label' => 'Webinaires & Live Streams (organisation, promo)' ],
            [ 'skill_type_id' => 27, 'label' => 'Gestion de l’e-réputation (avis en ligne)' ],
            [ 'skill_type_id' => 27, 'label' => 'Growth marketing (expérimentation rapide)' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing mobile (ASO, push notifications)' ],
            [ 'skill_type_id' => 27, 'label' => 'Publicité vidéo (YouTube Ads, programmatique vidéo)' ],
            [ 'skill_type_id' => 27, 'label' => 'Automatisation marketing (scénarios d’emailing)' ],
            [ 'skill_type_id' => 27, 'label' => 'Segmentation psychographique' ],
            [ 'skill_type_id' => 27, 'label' => 'Stratégie de gamification' ],
            [ 'skill_type_id' => 27, 'label' => 'Pilotage d’agences externes (brief, suivi)' ],
            [ 'skill_type_id' => 27, 'label' => 'Marketing sensoriel (point de vente)' ],
            [ 'skill_type_id' => 27, 'label' => 'Personnalisation en temps réel (site, email)' ],
            [ 'skill_type_id' => 27, 'label' => 'Retargeting / Remarketing avancé' ],
            [ 'skill_type_id' => 27, 'label' => 'Élaboration de persona marketing' ],
            [ 'skill_type_id' => 27, 'label' => 'Optimisation taux de conversion (CRO)' ],
            [ 'skill_type_id' => 28, 'label' => 'Connaissance des normes ISO 9001 (qualité)' ],
            [ 'skill_type_id' => 28, 'label' => 'Maîtrise de la norme ISO 14001 (environnement)' ],
            [ 'skill_type_id' => 28, 'label' => 'Norme ISO 45001 (sécurité au travail)' ],
            [ 'skill_type_id' => 28, 'label' => 'Audit HSE et plan d’action correctif' ],
            [ 'skill_type_id' => 28, 'label' => 'Gestion des risques chimiques (fiches sécurité)' ],
            [ 'skill_type_id' => 28, 'label' => 'Évaluation des risques professionnels (DUERP)' ],
            [ 'skill_type_id' => 28, 'label' => 'Analyse environnementale (bilan carbone)' ],
            [ 'skill_type_id' => 28, 'label' => 'Techniques de tri et valorisation des déchets' ],
            [ 'skill_type_id' => 28, 'label' => 'Validation des procédures de nettoyage et désinfection' ],
            [ 'skill_type_id' => 28, 'label' => 'Mise en place du 5S en atelier' ],
            [ 'skill_type_id' => 28, 'label' => 'Management visuel de la performance QHSE' ],
            [ 'skill_type_id' => 28, 'label' => 'Vérification des conformités légales et réglementaires' ],
            [ 'skill_type_id' => 28, 'label' => 'Gestion des accidents du travail et maladies pro' ],
            [ 'skill_type_id' => 28, 'label' => 'Implémentation du Lean Six Sigma en production' ],
            [ 'skill_type_id' => 28, 'label' => 'Mise en place d’une culture sécurité' ],
            [ 'skill_type_id' => 28, 'label' => 'Évaluation des impacts environnementaux (EIE)' ],
            [ 'skill_type_id' => 28, 'label' => 'Gestion des situations d’urgence (plans d’évacuation)' ],
            [ 'skill_type_id' => 28, 'label' => 'Formation du personnel aux règles QHSE' ],
            [ 'skill_type_id' => 28, 'label' => 'Système de management intégré (SMI)' ],
            [ 'skill_type_id' => 28, 'label' => 'Mesure du bruit et vibrations' ],
            [ 'skill_type_id' => 28, 'label' => 'Étude de dangers (Seveso)' ],
            [ 'skill_type_id' => 28, 'label' => 'Communication QHSE (affichage, sensibilisation)' ],
            [ 'skill_type_id' => 28, 'label' => 'Audit interne qualité (Check-list ISO)' ],
            [ 'skill_type_id' => 28, 'label' => 'Validation des procédures HACCP (agroalimentaire)' ],
            [ 'skill_type_id' => 28, 'label' => 'Pilotage de la RSE (Responsabilité Sociétale)' ],
            [ 'skill_type_id' => 28, 'label' => 'Évaluation du cycle de vie (ACV)' ],
            [ 'skill_type_id' => 28, 'label' => 'Gestion des EPC/EPI (équipements de protection)' ],
            [ 'skill_type_id' => 28, 'label' => 'Simulation d’incendie et exercice d’évacuation' ],
            [ 'skill_type_id' => 28, 'label' => 'Conception de protocoles de sécurité chimique' ],
            [ 'skill_type_id' => 28, 'label' => 'Mise en place d’un Système documentaire QHSE' ],
            [ 'skill_type_id' => 29, 'label' => 'Recrutement et sélection de candidats' ],
            [ 'skill_type_id' => 29, 'label' => 'Administration du personnel' ],
            [ 'skill_type_id' => 29, 'label' => 'Élaboration de contrats de travail' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion de la paie' ],
            [ 'skill_type_id' => 29, 'label' => 'Établissement des déclarations sociales' ],
            [ 'skill_type_id' => 29, 'label' => 'Mise en place de plans de formation' ],
            [ 'skill_type_id' => 29, 'label' => 'Entretien annuel d\'évaluation' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des carrières et mobilité interne' ],
            [ 'skill_type_id' => 29, 'label' => 'Communication interne' ],
            [ 'skill_type_id' => 29, 'label' => 'Élaboration d\'organigrammes' ],
            [ 'skill_type_id' => 29, 'label' => 'Élaboration de fiches de poste' ],
            [ 'skill_type_id' => 29, 'label' => 'Rédaction d\'offres d\'emploi' ],
            [ 'skill_type_id' => 29, 'label' => 'Maîtrise des outils SIRH (Systèmes d\'Information RH)' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des absences et congés' ],
            [ 'skill_type_id' => 29, 'label' => 'Connaissance de la législation du travail' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion de la relation avec les partenaires sociaux' ],
            [ 'skill_type_id' => 29, 'label' => 'Négociation collective' ],
            [ 'skill_type_id' => 29, 'label' => 'Pilotage des indicateurs RH (KPI)' ],
            [ 'skill_type_id' => 29, 'label' => 'Onboarding et intégration des nouveaux collaborateurs' ],
            [ 'skill_type_id' => 29, 'label' => 'Élaboration du budget RH' ],
            [ 'skill_type_id' => 29, 'label' => 'Conduite d\'entretiens de départ' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des conflits' ],
            [ 'skill_type_id' => 29, 'label' => 'Accompagnement du changement' ],
            [ 'skill_type_id' => 29, 'label' => 'Communication RH sur Intranet' ],
            [ 'skill_type_id' => 29, 'label' => 'Mise en place de la GPEC' ],
            [ 'skill_type_id' => 29, 'label' => 'RSE (Responsabilité Sociétale des Entreprises) en RH' ],
            [ 'skill_type_id' => 29, 'label' => 'Sourcing de candidats sur réseaux sociaux' ],
            [ 'skill_type_id' => 29, 'label' => 'Technique de recrutement en entretien collectif' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion du climat social' ],
            [ 'skill_type_id' => 29, 'label' => 'Superviser la qualité de vie au travail (QVT)' ],
            [ 'skill_type_id' => 29, 'label' => 'Diagnostic RH (audit social)' ],
            [ 'skill_type_id' => 29, 'label' => 'Pilotage de la masse salariale' ],
            [ 'skill_type_id' => 29, 'label' => 'Conception d’un référentiel de compétences' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion de projets RH (digitalisation, SIRH)' ],
            [ 'skill_type_id' => 29, 'label' => 'Analyse d’indicateurs de turnover' ],
            [ 'skill_type_id' => 29, 'label' => 'Communication marque employeur' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des expatriations / détachements' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des conflits collectifs' ],
            [ 'skill_type_id' => 29, 'label' => 'Techniques d’entretien structuré / semi-directif' ],
            [ 'skill_type_id' => 29, 'label' => 'Élaboration de plans de succession' ],
            [ 'skill_type_id' => 29, 'label' => 'Audit paie (vérification bulletins)' ],
            [ 'skill_type_id' => 29, 'label' => 'Administration des avantages sociaux (prévoyance, mutuelle)' ],
            [ 'skill_type_id' => 29, 'label' => 'Mise en place de politiques d’égalité / diversité' ],
            [ 'skill_type_id' => 29, 'label' => 'Pilotage du dialogue social (CSE, syndicats)' ],
            [ 'skill_type_id' => 29, 'label' => 'Coordination d’équipes RH multi-sites' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des sanctions disciplinaires' ],
            [ 'skill_type_id' => 29, 'label' => 'Entretien professionnel (loi en France)' ],
            [ 'skill_type_id' => 29, 'label' => 'Connaissance de la formation professionnelle (OPCO)' ],
            [ 'skill_type_id' => 29, 'label' => 'Geste métier (harcèlement, RPS, etc.)' ],
            [ 'skill_type_id' => 29, 'label' => 'Recrutement via assessment center' ],
            [ 'skill_type_id' => 29, 'label' => 'Plan d’action pour la QVT (Qualité de Vie au Travail)' ],
            [ 'skill_type_id' => 29, 'label' => 'Développement d’une politique de télétravail' ],
            [ 'skill_type_id' => 29, 'label' => 'Pilotage des plans d’actions suite à baromètre social' ],
            [ 'skill_type_id' => 29, 'label' => 'Management d’équipes RH à distance' ],
            [ 'skill_type_id' => 29, 'label' => 'Gestion des référendums internes (consultation salariés)' ],
            [ 'skill_type_id' => 29, 'label' => 'Techniques de sourcing innovant (job boards, hackathons)' ],
            [ 'skill_type_id' => 29, 'label' => 'Processus d’onboarding digital' ],
            [ 'skill_type_id' => 29, 'label' => 'Conception d’un plan d’intégration multi-parcours' ],
            [ 'skill_type_id' => 29, 'label' => 'Pilotage budgétaire RH' ],
            [ 'skill_type_id' => 29, 'label' => 'Utilisation d’outils d’analytique RH (People Analytics)' ],
            [ 'skill_type_id' => 30, 'label' => 'Soins infirmiers' ],
            [ 'skill_type_id' => 30, 'label' => 'Préparation et administration de médicaments' ],
            [ 'skill_type_id' => 30, 'label' => 'Techniques de pansements' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion des dossiers patients' ],
            [ 'skill_type_id' => 30, 'label' => 'Assistance au médecin (bloc opératoire)' ],
            [ 'skill_type_id' => 30, 'label' => 'Prélèvements sanguins' ],
            [ 'skill_type_id' => 30, 'label' => 'Urgences et premiers secours' ],
            [ 'skill_type_id' => 30, 'label' => 'Relation d\'aide et écoute active' ],
            [ 'skill_type_id' => 30, 'label' => 'Éducation thérapeutique' ],
            [ 'skill_type_id' => 30, 'label' => 'Orthophonie' ],
            [ 'skill_type_id' => 30, 'label' => 'Kinésithérapie' ],
            [ 'skill_type_id' => 30, 'label' => 'Ergothérapie' ],
            [ 'skill_type_id' => 30, 'label' => 'Diététique et nutrition' ],
            [ 'skill_type_id' => 30, 'label' => 'Psychomotricité' ],
            [ 'skill_type_id' => 30, 'label' => 'Suivi de rééducation' ],
            [ 'skill_type_id' => 30, 'label' => 'Manipulations radiologiques' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion du stress en milieu hospitalier' ],
            [ 'skill_type_id' => 30, 'label' => 'Coordination de soins' ],
            [ 'skill_type_id' => 30, 'label' => 'Techniques de relaxation' ],
            [ 'skill_type_id' => 30, 'label' => 'Soins palliatifs' ],
            [ 'skill_type_id' => 30, 'label' => 'Assistance en gérontologie' ],
            [ 'skill_type_id' => 30, 'label' => 'Vaccination' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion du matériel médical' ],
            [ 'skill_type_id' => 30, 'label' => 'Administration d\'anesthésie (IADE)' ],
            [ 'skill_type_id' => 30, 'label' => 'Conseil hygiène de vie' ],
            [ 'skill_type_id' => 30, 'label' => 'Téléconsultation' ],
            [ 'skill_type_id' => 30, 'label' => 'Analyse de laboratoire (technicien)' ],
            [ 'skill_type_id' => 30, 'label' => 'Préparation de dispositifs médicaux' ],
            [ 'skill_type_id' => 30, 'label' => 'Maîtrise des normes d\'hygiène (HACCP)' ],
            [ 'skill_type_id' => 30, 'label' => 'Aide à la mobilité et prévention des chutes' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion des urgences vitales (arrêt cardio-respiratoire)' ],
            [ 'skill_type_id' => 30, 'label' => 'Dialyse et soins néphrologiques' ],
            [ 'skill_type_id' => 30, 'label' => 'Techniques de réanimation néonatale' ],
            [ 'skill_type_id' => 30, 'label' => 'Surveillance post-opératoire avancée' ],
            [ 'skill_type_id' => 30, 'label' => 'Éducation nutritionnelle spécifique (diabète, cholestérol)' ],
            [ 'skill_type_id' => 30, 'label' => 'Orthoptie (rééducation visuelle)' ],
            [ 'skill_type_id' => 30, 'label' => 'Orthèse / prothèse (conception et ajustement)' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion de la douleur (échelle EVA, protocoles)' ],
            [ 'skill_type_id' => 30, 'label' => 'Prise en charge des patients polyhandicapés' ],
            [ 'skill_type_id' => 30, 'label' => 'Coordination interprofessionnelle (médecins, kinés, etc.)' ],
            [ 'skill_type_id' => 30, 'label' => 'Hygiène en bloc opératoire (protocoles aseptiques)' ],
            [ 'skill_type_id' => 30, 'label' => 'Soins en psychiatrie (prévention, contention)' ],
            [ 'skill_type_id' => 30, 'label' => 'Recherche clinique (protocoles, essais)' ],
            [ 'skill_type_id' => 30, 'label' => 'Préparation des doses chimiothérapiques' ],
            [ 'skill_type_id' => 30, 'label' => 'Prise en charge de la détresse respiratoire' ],
            [ 'skill_type_id' => 30, 'label' => 'Soins en gériatrie (Alzheimer, démence)' ],
            [ 'skill_type_id' => 30, 'label' => 'Matériel médico-chirurgical (installation, stérilisation)' ],
            [ 'skill_type_id' => 30, 'label' => 'Télé-suivi des pathologies chroniques' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion de la fin de vie (soutien, éthique)' ],
            [ 'skill_type_id' => 30, 'label' => 'Prescription infirmière (selon cadre légal)' ],
            [ 'skill_type_id' => 30, 'label' => 'Écoute active du patient en souffrance psychique' ],
            [ 'skill_type_id' => 30, 'label' => 'Intervention en addictologie' ],
            [ 'skill_type_id' => 30, 'label' => 'Évaluation gériatrique globale' ],
            [ 'skill_type_id' => 30, 'label' => 'Adaptation de l’environnement (ergothérapeute)' ],
            [ 'skill_type_id' => 30, 'label' => 'Techniques de rééducation post-AVC' ],
            [ 'skill_type_id' => 30, 'label' => 'Accompagnement à la parentalité (puériculture)' ],
            [ 'skill_type_id' => 30, 'label' => 'Évaluation des troubles du langage et de la parole' ],
            [ 'skill_type_id' => 30, 'label' => 'Gestion des plaies complexes (VAC thérapie)' ],
            [ 'skill_type_id' => 30, 'label' => 'Prévention des TMS (Troubles musculosquelettiques)' ],
            [ 'skill_type_id' => 30, 'label' => 'Prophylaxie et éducation à la santé (vaccination)' ],
            [ 'skill_type_id' => 31, 'label' => 'Méthodologie de recherche' ],
            [ 'skill_type_id' => 31, 'label' => 'Analyse statistique' ],
            [ 'skill_type_id' => 31, 'label' => 'Conduite d\'expérimentations' ],
            [ 'skill_type_id' => 31, 'label' => 'Publication d\'articles scientifiques' ],
            [ 'skill_type_id' => 31, 'label' => 'Rédaction de projets de recherche' ],
            [ 'skill_type_id' => 31, 'label' => 'Revue de littérature (bibliographie)' ],
            [ 'skill_type_id' => 31, 'label' => 'Utilisation de logiciels d\'analyse (SPSS, R)' ],
            [ 'skill_type_id' => 31, 'label' => 'Conception de protocoles expérimentaux' ],
            [ 'skill_type_id' => 31, 'label' => 'Présentation de résultats en colloque' ],
            [ 'skill_type_id' => 31, 'label' => 'Recherche bibliographique (bases de données)' ],
            [ 'skill_type_id' => 31, 'label' => 'Gestion de laboratoires' ],
            [ 'skill_type_id' => 31, 'label' => 'Éthique de la recherche' ],
            [ 'skill_type_id' => 31, 'label' => 'Statistiques multivariées' ],
            [ 'skill_type_id' => 31, 'label' => 'Analyse de données qualitatives' ],
            [ 'skill_type_id' => 31, 'label' => 'Structuration de bases de données scientifiques' ],
            [ 'skill_type_id' => 31, 'label' => 'Évaluation par les pairs (peer review)' ],
            [ 'skill_type_id' => 31, 'label' => 'Rédaction d\'articles académiques en anglais' ],
            [ 'skill_type_id' => 31, 'label' => 'Veille scientifique' ],
            [ 'skill_type_id' => 31, 'label' => 'Techniques de modélisation (mathématique, simulation)' ],
            [ 'skill_type_id' => 31, 'label' => 'Réalisation de brevets' ],
            [ 'skill_type_id' => 31, 'label' => 'Communication scientifique vulgarisée' ],
            [ 'skill_type_id' => 31, 'label' => 'Analyse spectroscopique (physique, chimie)' ],
            [ 'skill_type_id' => 31, 'label' => 'Biologie moléculaire (PCR, clonage)' ],
            [ 'skill_type_id' => 31, 'label' => 'Études d\'impact environnemental' ],
            [ 'skill_type_id' => 31, 'label' => 'Microscopie électronique' ],
            [ 'skill_type_id' => 31, 'label' => 'Expérimentation animale (règles éthiques)' ],
            [ 'skill_type_id' => 31, 'label' => 'Mécanique des fluides avancée' ],
            [ 'skill_type_id' => 31, 'label' => 'Robotique expérimentale' ],
            [ 'skill_type_id' => 31, 'label' => 'Collaborations internationales de recherche' ],
            [ 'skill_type_id' => 31, 'label' => 'Collecte de fonds (appels à projets)' ],
            [ 'skill_type_id' => 32, 'label' => 'Accompagnement d\'adultes dépendants' ],
            [ 'skill_type_id' => 32, 'label' => 'Assistance aux personnes âgées' ],
            [ 'skill_type_id' => 32, 'label' => 'Accompagnement d\'enfants handicapés' ],
            [ 'skill_type_id' => 32, 'label' => 'Écoute et soutien psychologique' ],
            [ 'skill_type_id' => 32, 'label' => 'Aide à la toilette et aux repas' ],
            [ 'skill_type_id' => 32, 'label' => 'Animation d\'activités socio-culturelles' ],
            [ 'skill_type_id' => 32, 'label' => 'Planification d\'activités éducatives' ],
            [ 'skill_type_id' => 32, 'label' => 'Prévention de la maltraitance' ],
            [ 'skill_type_id' => 32, 'label' => 'Médiation familiale' ],
            [ 'skill_type_id' => 32, 'label' => 'Tutorat d\'adolescents' ],
            [ 'skill_type_id' => 32, 'label' => 'Gestion des conflits familiaux' ],
            [ 'skill_type_id' => 32, 'label' => 'Techniques d\'entretien d\'aide' ],
            [ 'skill_type_id' => 32, 'label' => 'Aide aux devoirs et soutien scolaire' ],
            [ 'skill_type_id' => 32, 'label' => 'Interventions à domicile' ],
            [ 'skill_type_id' => 32, 'label' => 'Gestion des documents administratifs (aide)' ],
            [ 'skill_type_id' => 32, 'label' => 'Orientation vers services spécialisés' ],
            [ 'skill_type_id' => 32, 'label' => 'Distribution de repas' ],
            [ 'skill_type_id' => 32, 'label' => 'Maintien de l\'autonomie' ],
            [ 'skill_type_id' => 32, 'label' => 'Aide à l\'insertion sociale' ],
            [ 'skill_type_id' => 32, 'label' => 'Communication bienveillante' ],
            [ 'skill_type_id' => 32, 'label' => 'Accompagnement de fin de vie' ],
            [ 'skill_type_id' => 32, 'label' => 'Coordination avec travailleurs sociaux' ],
            [ 'skill_type_id' => 32, 'label' => 'Mise en place de projets sociaux' ],
            [ 'skill_type_id' => 32, 'label' => 'Soutien aux aidants familiaux' ],
            [ 'skill_type_id' => 32, 'label' => 'Connaissance des politiques sociales' ],
            [ 'skill_type_id' => 32, 'label' => 'Aide à la gestion du budget' ],
            [ 'skill_type_id' => 32, 'label' => 'Promotion de la santé' ],
            [ 'skill_type_id' => 32, 'label' => 'Planification d\'activités ludiques' ],
            [ 'skill_type_id' => 32, 'label' => 'Repérage des situations à risque' ],
            [ 'skill_type_id' => 32, 'label' => 'Techniques de médiation culturelle' ],
            [ 'skill_type_id' => 33, 'label' => 'Préparation physique générale (PPG)' ],
            [ 'skill_type_id' => 33, 'label' => 'Coaching sportif personnalisé (objectifs, plans)' ],
            [ 'skill_type_id' => 33, 'label' => 'Biomécanique et analyse du mouvement' ],
            [ 'skill_type_id' => 33, 'label' => 'Nutrition sportive spécifique' ],
            [ 'skill_type_id' => 33, 'label' => 'Entraînement en résistance (force, hypertrophie)' ],
            [ 'skill_type_id' => 33, 'label' => 'Techniques de stretching et souplesse' ],
            [ 'skill_type_id' => 33, 'label' => 'Préparation mentale et gestion du stress' ],
            [ 'skill_type_id' => 33, 'label' => 'Coaching en sports collectifs (tactique, stratégie)' ],
            [ 'skill_type_id' => 33, 'label' => 'Coaching en sports individuels (tennis, athlé, etc.)' ],
            [ 'skill_type_id' => 33, 'label' => 'Planification d’entraînement cyclique (périodisation)' ],
            [ 'skill_type_id' => 33, 'label' => 'Analyse vidéo (performance, gestes techniques)' ],
            [ 'skill_type_id' => 33, 'label' => 'Préparation aux compétitions officielles' ],
            [ 'skill_type_id' => 33, 'label' => 'Gestion de la récupération (cryothérapie, etc.)' ],
            [ 'skill_type_id' => 33, 'label' => 'Accompagnement en réathlétisation' ],
            [ 'skill_type_id' => 33, 'label' => 'Évaluation des qualités physiques (VMA, VO2max)' ],
            [ 'skill_type_id' => 33, 'label' => 'Prévention des blessures (exos correctifs)' ],
            [ 'skill_type_id' => 33, 'label' => 'Outils connectés (montres GPS, capteurs cardio)' ],
            [ 'skill_type_id' => 33, 'label' => 'Coaching en e-sport (réaction, stratégie)' ],
            [ 'skill_type_id' => 33, 'label' => 'Encadrement d’événements sportifs (tournois, stages)' ],
            [ 'skill_type_id' => 33, 'label' => 'Gestion de la relation coach-entraîné' ],
            [ 'skill_type_id' => 33, 'label' => 'Préparation physique pour sports d’endurance (marathon)' ],
            [ 'skill_type_id' => 33, 'label' => 'Préparation physique pour sports de force (powerlifting)' ],
            [ 'skill_type_id' => 33, 'label' => 'Analyse du style de nage (natation)' ],
            [ 'skill_type_id' => 33, 'label' => 'Coaching en altitude (hypoxie, adaptation)' ],
            [ 'skill_type_id' => 33, 'label' => 'Planification diététique (prise/perte de poids)' ],
            [ 'skill_type_id' => 33, 'label' => 'Tech. motivationnelles (PNL, mental coaching)' ],
            [ 'skill_type_id' => 33, 'label' => 'Communication au sein d\'une équipe sportive' ],
            [ 'skill_type_id' => 33, 'label' => 'Gestion des émotions en compétition' ],
            [ 'skill_type_id' => 33, 'label' => 'Préparation aux tests physiques (concours, sélections)' ],
            [ 'skill_type_id' => 33, 'label' => 'Management d’un club sportif (licences, sponsors)' ],
            [ 'skill_type_id' => 34, 'label' => 'Conduite de chariot élévateur (CACES)' ],
            [ 'skill_type_id' => 34, 'label' => 'Conduite de poids lourds' ],
            [ 'skill_type_id' => 34, 'label' => 'Gestion de flotte de véhicules' ],
            [ 'skill_type_id' => 34, 'label' => 'Planification de tournées de livraison' ],
            [ 'skill_type_id' => 34, 'label' => 'Réglementation du transport routier' ],
            [ 'skill_type_id' => 34, 'label' => 'Sécurité aéroportuaire' ],
            [ 'skill_type_id' => 34, 'label' => 'Conduite de train (permis ferroviaire)' ],
            [ 'skill_type_id' => 34, 'label' => 'Sûreté portuaire' ],
            [ 'skill_type_id' => 34, 'label' => 'Gestion du fret maritime' ],
            [ 'skill_type_id' => 34, 'label' => 'Conduite sur route de montagne' ],
            [ 'skill_type_id' => 34, 'label' => 'Expertise en transports dangereux (ADR)' ],
            [ 'skill_type_id' => 34, 'label' => 'Plan de sûreté (PSR)' ],
            [ 'skill_type_id' => 34, 'label' => 'Contrôle technique des véhicules' ],
            [ 'skill_type_id' => 34, 'label' => 'Logistique douanière' ],
            [ 'skill_type_id' => 34, 'label' => 'Utilisation des tachygraphes' ],
            [ 'skill_type_id' => 34, 'label' => 'Gestion des contrôles routiers' ],
            [ 'skill_type_id' => 34, 'label' => 'Formation continue des conducteurs (FIMO, FCOS)' ],
            [ 'skill_type_id' => 34, 'label' => 'Gestion des assurances transport' ],
            [ 'skill_type_id' => 34, 'label' => 'Connaissance des itinéraires internationaux' ],
            [ 'skill_type_id' => 34, 'label' => 'Manutention et port de charges' ],
            [ 'skill_type_id' => 34, 'label' => 'Protocoles de sécurité en entrepôt' ],
            [ 'skill_type_id' => 34, 'label' => 'Vidéosurveillance' ],
            [ 'skill_type_id' => 34, 'label' => 'Sécurité incendie (EPI)' ],
            [ 'skill_type_id' => 34, 'label' => 'Gestion des accès (contrôle d\'entrée)' ],
            [ 'skill_type_id' => 34, 'label' => 'Plan Vigipirate' ],
            [ 'skill_type_id' => 34, 'label' => 'Rondes de sécurité' ],
            [ 'skill_type_id' => 34, 'label' => 'Garde statique et filtrage' ],
            [ 'skill_type_id' => 34, 'label' => 'Prévention des risques professionnels' ],
            [ 'skill_type_id' => 34, 'label' => 'Sûreté aéroportuaire (contrôle passagers, bagages)' ],
            [ 'skill_type_id' => 34, 'label' => 'Premiers secours (SST)' ],
            [ 'skill_type_id' => 35, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 35, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 35, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 35, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 35, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 35, 'label' => 'Expression écrite' ],
            [ 'skill_type_id' => 36, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 36, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 36, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 36, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 36, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 36, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 37
            [ 'skill_type_id' => 37, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 37, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 37, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 37, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 37, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 37, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 38
            [ 'skill_type_id' => 38, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 38, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 38, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 38, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 38, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 38, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 39
            [ 'skill_type_id' => 39, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 39, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 39, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 39, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 39, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 39, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 40
            [ 'skill_type_id' => 40, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 40, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 40, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 40, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 40, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 40, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 41
            [ 'skill_type_id' => 41, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 41, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 41, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 41, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 41, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 41, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 42
            [ 'skill_type_id' => 42, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 42, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 42, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 42, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 42, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 42, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 43
            [ 'skill_type_id' => 43, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 43, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 43, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 43, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 43, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 43, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 44
            [ 'skill_type_id' => 44, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 44, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 44, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 44, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 44, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 44, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 45
            [ 'skill_type_id' => 45, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 45, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 45, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 45, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 45, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 45, 'label' => 'Expression écrite' ],
            [ 'skill_type_id' => 46, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 46, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 46, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 46, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 46, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 46, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 47
            [ 'skill_type_id' => 47, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 47, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 47, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 47, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 47, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 47, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 48
            [ 'skill_type_id' => 48, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 48, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 48, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 48, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 48, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 48, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 49
            [ 'skill_type_id' => 49, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 49, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 49, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 49, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 49, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 49, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 50
            [ 'skill_type_id' => 50, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 50, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 50, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 50, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 50, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 50, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 51
            [ 'skill_type_id' => 51, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 51, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 51, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 51, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 51, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 51, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 52
            [ 'skill_type_id' => 52, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 52, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 52, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 52, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 52, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 52, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 53
            [ 'skill_type_id' => 53, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 53, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 53, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 53, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 53, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 53, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 54
            [ 'skill_type_id' => 54, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 54, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 54, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 54, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 54, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 54, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 55
            [ 'skill_type_id' => 55, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 55, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 55, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 55, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 55, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 55, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 56
            [ 'skill_type_id' => 56, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 56, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 56, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 56, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 56, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 56, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 57
            [ 'skill_type_id' => 57, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 57, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 57, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 57, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 57, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 57, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 58
            [ 'skill_type_id' => 58, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 58, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 58, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 58, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 58, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 58, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 59
            [ 'skill_type_id' => 59, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 59, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 59, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 59, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 59, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 59, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 60
            [ 'skill_type_id' => 60, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 60, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 60, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 60, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 60, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 60, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 61
            [ 'skill_type_id' => 61, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 61, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 61, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 61, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 61, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 61, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 62
            [ 'skill_type_id' => 62, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 62, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 62, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 62, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 62, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 62, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 63
            [ 'skill_type_id' => 63, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 63, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 63, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 63, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 63, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 63, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 64
            [ 'skill_type_id' => 64, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 64, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 64, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 64, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 64, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 64, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 65
            [ 'skill_type_id' => 65, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 65, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 65, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 65, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 65, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 65, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 66
            [ 'skill_type_id' => 66, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 66, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 66, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 66, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 66, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 66, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 67
            [ 'skill_type_id' => 67, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 67, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 67, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 67, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 67, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 67, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 68
            [ 'skill_type_id' => 68, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 68, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 68, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 68, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 68, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 68, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 69
            [ 'skill_type_id' => 69, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 69, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 69, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 69, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 69, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 69, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 70
            [ 'skill_type_id' => 70, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 70, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 70, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 70, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 70, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 70, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 71
            [ 'skill_type_id' => 71, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 71, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 71, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 71, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 71, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 71, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 72
            [ 'skill_type_id' => 72, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 72, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 72, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 72, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 72, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 72, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 73
            [ 'skill_type_id' => 73, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 73, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 73, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 73, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 73, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 73, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 74
            [ 'skill_type_id' => 74, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 74, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 74, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 74, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 74, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 74, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 75
            [ 'skill_type_id' => 75, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 75, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 75, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 75, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 75, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 75, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 76
            [ 'skill_type_id' => 76, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 76, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 76, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 76, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 76, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 76, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 77
            [ 'skill_type_id' => 77, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 77, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 77, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 77, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 77, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 77, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 78
            [ 'skill_type_id' => 78, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 78, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 78, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 78, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 78, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 78, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 79
            [ 'skill_type_id' => 79, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 79, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 79, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 79, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 79, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 79, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 80
            [ 'skill_type_id' => 80, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 80, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 80, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 80, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 80, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 80, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 81
            [ 'skill_type_id' => 81, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 81, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 81, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 81, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 81, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 81, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 82
            [ 'skill_type_id' => 82, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 82, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 82, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 82, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 82, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 82, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 83
            [ 'skill_type_id' => 83, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 83, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 83, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 83, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 83, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 83, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 84
            [ 'skill_type_id' => 84, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 84, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 84, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 84, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 84, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 84, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 85
            [ 'skill_type_id' => 85, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 85, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 85, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 85, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 85, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 85, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 86
            [ 'skill_type_id' => 86, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 86, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 86, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 86, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 86, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 86, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 87
            [ 'skill_type_id' => 87, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 87, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 87, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 87, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 87, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 87, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 88
            [ 'skill_type_id' => 88, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 88, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 88, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 88, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 88, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 88, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 89
            [ 'skill_type_id' => 89, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 89, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 89, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 89, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 89, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 89, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 90
            [ 'skill_type_id' => 90, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 90, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 90, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 90, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 90, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 90, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 91
            [ 'skill_type_id' => 91, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 91, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 91, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 91, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 91, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 91, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 92
            [ 'skill_type_id' => 92, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 92, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 92, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 92, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 92, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 92, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 93
            [ 'skill_type_id' => 93, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 93, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 93, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 93, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 93, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 93, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 94
            [ 'skill_type_id' => 94, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 94, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 94, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 94, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 94, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 94, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 95
            [ 'skill_type_id' => 95, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 95, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 95, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 95, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 95, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 95, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 96
            [ 'skill_type_id' => 96, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 96, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 96, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 96, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 96, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 96, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 97
            [ 'skill_type_id' => 97, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 97, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 97, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 97, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 97, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 97, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 98
            [ 'skill_type_id' => 98, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 98, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 98, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 98, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 98, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 98, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 99
            [ 'skill_type_id' => 99, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 99, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 99, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 99, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 99, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 99, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 100
            [ 'skill_type_id' => 100, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 100, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 100, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 100, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 100, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 100, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 101
            [ 'skill_type_id' => 101, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 101, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 101, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 101, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 101, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 101, 'label' => 'Expression écrite' ],
        
            // skill_type_id = 102
            [ 'skill_type_id' => 102, 'label' => 'Compréhension orale' ],
            [ 'skill_type_id' => 102, 'label' => 'Expression orale' ],
            [ 'skill_type_id' => 102, 'label' => 'Compréhension écrite' ],
            [ 'skill_type_id' => 102, 'label' => 'Syntaxe' ],
            [ 'skill_type_id' => 102, 'label' => 'Règles linguistique' ],
            [ 'skill_type_id' => 102, 'label' => 'Expression écrite' ]
        ]; 
        
        $personal_skills = [            //  103
            //Communication (ID = 103)
            [
                'skill_type_id' => 103,
                'level'         => 1,
                'label'         => 'Transmet des infos basiques'
            ],
            [
                'skill_type_id' => 103,
                'level'         => 2,
                'label'         => 'Échange clairement dans l\'équipe'
            ],
            [
                'skill_type_id' => 103,
                'level'         => 3,
                'label'         => 'Adapte son langage à l\'audience'
            ],
            [
                'skill_type_id' => 103,
                'level'         => 4,
                'label'         => 'Gère des messages complexes et sensibles'
            ],

            // Gestion du temps (ID = 105, example)
            [
                'skill_type_id' => 104,
                'level'         => 1,
                'label'         => 'Respecte les délais'
            ],
            [
                'skill_type_id' => 104,
                'level'         => 2,
                'label'         => 'Planifie selon les priorités'
            ],
            [
                'skill_type_id' => 104,
                'level'         => 3,
                'label'         => 'Anticipe les imprévus'
            ],
            [
                'skill_type_id' => 104,
                'level'         => 4,
                'label'         => 'Gère plusieurs projets simultanément'
            ],

            // Adaptabilité (ID = 106, example)
            [
                'skill_type_id' => 105,
                'level'         => 1,
                'label'         => 'S’adapte à un nouveau contexte avec aide'
            ],
            [
                'skill_type_id' => 105,
                'level'         => 2,
                'label'         => 'Accepte le changement et apprend vite'
            ],
            [
                'skill_type_id' => 105,
                'level'         => 3,
                'label'         => 'S’adapte rapidement à divers environnements'
            ],
            [
                'skill_type_id' => 105,
                'level'         => 4,
                'label'         => 'Pilote le changement de manière proactive'
            ],

             [
                'skill_type_id' => 106,
                'level'         => 1,
                'label'         => 'Donne le bon exemple à petite échelle'
            ],
            [
                'skill_type_id' => 106,
                'level'         => 2,
                'label'         => 'Motive un groupe pour atteindre un objectif'
            ],
            [
                'skill_type_id' => 106,
                'level'         => 3,
                'label'         => 'Définit une vision et entraîne l\'adhésion'
            ],
            [
                'skill_type_id' => 106,
                'level'         => 4,
                'label'         => 'Inspire et dirige des équipes pluridisciplinaires'
            ],
            [
                'skill_type_id' => 107,
                'level'         => 1,
                'label'         => 'Montre de l’écoute basique'
            ],
            [
                'skill_type_id' => 107,
                'level'         => 2,
                'label'         => 'Perçoit les émotions des autres'
            ],
            [
                'skill_type_id' => 107,
                'level'         => 3,
                'label'         => 'Offre un soutien adapté aux besoins'
            ],
            [
                'skill_type_id' => 107,
                'level'         => 4,
                'label'         => 'Gère des situations délicates avec grande sensibilités'
            ],
            [
                'skill_type_id' => 108,
                'level'         => 1,
                'label'         => 'Accomplit des tâches simples malgré le stresse'
            ],
            [
                'skill_type_id' => 108,
                'level'         => 2,
                'label'         => 'Présente des idées avec assurance'
            ],
            [
                'skill_type_id' => 108,
                'level'         => 3,
                'label'         => 'Prend des décisions fermes et assumées'
            ],
            [
                'skill_type_id' => 108,
                'level'         => 4,
                'label'         => 'Rebondit face aux critiques et continue de progresser'
            ],
            [
                'skill_type_id' => 109,
                'level'         => 1,
                'label'         => 'Discute le prix ou conditions à un niveau basique'
            ],
            [
                'skill_type_id' => 109,
                'level'         => 2,
                'label'         => 'Défend ses intérêts sans agressivité'
            ],
            [
                'skill_type_id' => 109,
                'level'         => 3,
                'label'         => 'Recherche des compromis gagnant-gagnant'
            ],
            [
                'skill_type_id' => 109,
                'level'         => 4,
                'label'         => 'Conclut des accords complexes en préservant les relations'
            ],
            [
                'skill_type_id' => 110,
                'level'         => 1,
                'label'         => 'Propose des idées simples'
            ],
            [
                'skill_type_id' => 110,
                'level'         => 2,
                'label'         => 'Trouve des solutions originales à des problèmes'
            ],
            [
                'skill_type_id' => 110,
                'level'         => 3,
                'label'         => 'Associe des concepts variés pour innover'
            ],
            [
                'skill_type_id' => 110,
                'level'         => 4,
                'label'         => 'Initie des approches novatrices dans différents domaines'
            ],
            [
                'skill_type_id' => 111,
                'level'         => 1,
                'label'         => 'Collabore sur de petites tâches'
            ],
            [
                'skill_type_id' => 111,
                'level'         => 2,
                'label'         => 'Partage l’information et aide ses collègues'
            ],
            [
                'skill_type_id' => 111,
                'level'         => 3,
                'label'         => 'Fait émerger la cohésion et la solidarité'
            ],
            [
                'skill_type_id' => 111,
                'level'         => 4,
                'label'         => 'Fédère des équipes larges autour d’objectifs communs'
            ],
            [
                'skill_type_id' => 112,
                'level'         => 1,
                'label'         => 'Suit une to-do list'
            ],
            [
                'skill_type_id' => 112,
                'level'         => 2,
                'label'         => 'Classe ses activités par importance'
            ],
            [
                'skill_type_id' => 112,
                'level'         => 3,
                'label'         => 'Met en place des processus efficaces'
            ],
            [
                'skill_type_id' => 112,
                'level'         => 4,
                'label'         => 'Orchestre simultanément plusieurs plans complexes'
            ],
            [
                'skill_type_id' => 113,
                'level'         => 1,
                'label'         => 'Diagnostique un souci simple'
            ],
            [
                'skill_type_id' => 113,
                'level'         => 2,
                'label'         => 'Analyse les causes et propose une solution'
            ],
            [
                'skill_type_id' => 113,
                'level'         => 3,
                'label'         => 'Utilise des méthodes structurées (ex. 5 Pourquoi)'
            ],
            [
                'skill_type_id' => 113,
                'level'         => 4,
                'label'         => 'Manage des crises et apporte des solutions durables'
            ],
            [
                'skill_type_id' => 114,
                'level'         => 1,
                'label'         => 'Remet légèrement en question les idées reçues'
            ],
            [
                'skill_type_id' => 114,
                'level'         => 2,
                'label'         => 'Compare différentes sources avant de conclure'
            ],
            [
                'skill_type_id' => 114,
                'level'         => 3,
                'label'         => 'Évalue logiquement arguments et faits'
            ],
            [
                'skill_type_id' => 114,
                'level'         => 4,
                'label'         => 'Formule des analyses approfondies et nuancées'
            ],
            [
                'skill_type_id' => 115,
                'level'         => 1,
                'label'         => 'Tient bon sous une petite pression'
            ],
            [
                'skill_type_id' => 115,
                'level'         => 2,
                'label'         => 'Emploie des techniques simples de relaxation'
            ],
            [
                'skill_type_id' => 115,
                'level'         => 3,
                'label'         => 'Garde le sang-froid en situation tendue'
            ],
            [
                'skill_type_id' => 115,
                'level'         => 4,
                'label'         => 'Gère plusieurs situations critiques sereinement'
            ],
            [
                'skill_type_id' => 116,
                'level'         => 1,
                'label'         => 'Ne se décourage pas rapidement'
            ],
            [
                'skill_type_id' => 116,
                'level'         => 2,
                'label'         => 'Poursuit ses objectifs malgré des obstacles'
            ],
            [
                'skill_type_id' => 116,
                'level'         => 3,
                'label'         => 'Surmonte les échecs et apprend de ses erreurs'
            ],
            [
                'skill_type_id' => 116,
                'level'         => 4,
                'label'         => 'Se fixe des challenges ambitieux et les accomplit'
            ],
            [
                'skill_type_id' => 117,
                'level'         => 1,
                'label'         => 'Tient ses promesses basiques'
            ],
            [
                'skill_type_id' => 117,
                'level'         => 2,
                'label'         => 'Respecte engagements et horaires'
            ],
            [
                'skill_type_id' => 117,
                'level'         => 3,
                'label'         => 'Délivre un travail constant et régulier'
            ],
            [
                'skill_type_id' => 117,
                'level'         => 4,
                'label'         => 'Est reconnu pour sa solidité à toute épreuve'
            ],
            [
                'skill_type_id' => 118,
                'level'         => 1,
                'label'         => 'Fait des propositions limitées'
            ],
            [
                'skill_type_id' => 118,
                'level'         => 2,
                'label'         => 'Lance des idées nouvelles sans y être forcé'
            ],
            [
                'skill_type_id' => 118,
                'level'         => 3,
                'label'         => 'Crée de nouveaux projets spontanément'
            ],
            [
                'skill_type_id' => 118,
                'level'         => 4,
                'label'         => 'Transforme proactivement l’organisation'
            ],
            [
                'skill_type_id' => 119,
                'level'         => 1,
                'label'         => 'Pose des questions pour comprendre'
            ],
            [
                'skill_type_id' => 119,
                'level'         => 2,
                'label'         => 'Explore différentes sources d’information'
            ],
            [
                'skill_type_id' => 119,
                'level'         => 3,
                'label'         => 'Cherche constamment de nouvelles connaissances'
            ],
            [
                'skill_type_id' => 119,
                'level'         => 4,
                'label'         => 'Acquiert et transmet un savoir étendu dans divers domaines'
            ],
            [
                'skill_type_id' => 120,
                'level'         => 1,
                'label'         => 'Corrige des erreurs simples'
            ],
            [
                'skill_type_id' => 120,
                'level'         => 2,
                'label'         => 'Vérifie consciencieusement le travail accompli'
            ],
            [
                'skill_type_id' => 120,
                'level'         => 3,
                'label'         => 'Repère des micro-défauts ou incohérences'
            ],
            [
                'skill_type_id' => 120,
                'level'         => 4,
                'label'         => 'Garantit une précision quasi-parfaite'
            ],
            [
                'skill_type_id' => 121,
                'level'         => 1,
                'label'         => 'Évite les conflits frontaux'
            ],
            [
                'skill_type_id' => 121,
                'level'         => 2,
                'label'         => 'Use de tact pour arrondir les angles'
            ],
            [
                'skill_type_id' => 121,
                'level'         => 3,
                'label'         => 'Règle des désaccords sensibles avec courtoisie'
            ],
            [
                'skill_type_id' => 121,
                'level'         => 4,
                'label'         => 'Gère des négociations complexes de haute diplomatie'
            ],
            [
                'skill_type_id' => 122,
                'level'         => 1,
                'label'         => 'Respecte des standards simples'
            ],
            [
                'skill_type_id' => 122,
                'level'         => 2,
                'label'         => 'Vérifie la conformité aux normes'
            ],
            [
                'skill_type_id' => 122,
                'level'         => 3,
                'label'         => 'Met en place des procédures d’amélioration'
            ],
            [
                'skill_type_id' => 122,
                'level'         => 4,
                'label'         => 'Impulse une culture d’excellence globale'
            ],
            [
                'skill_type_id' => 123,
                'level'         => 1,
                'label'         => 'Choisit entre options basiques'
            ],
            [
                'skill_type_id' => 123,
                'level'         => 2,
                'label'         => 'Analyse avantages/inconvénients avant de trancher'
            ],
            [
                'skill_type_id' => 123,
                'level'         => 3,
                'label'         => 'S’appuie sur des données pour décider rapidement'
            ],
            [
                'skill_type_id' => 123,
                'level'         => 4,
                'label'         => 'Assume pleinement la responsabilité de choix complexes'
            ],
            [
                'skill_type_id' => 124,
                'level'         => 1,
                'label'         => 'Travaille en binôme sur de petites tâches'
            ],
            [
                'skill_type_id' => 124,
                'level'         => 2,
                'label'         => 'Partage les infos et s’entraide au sein d’un groupe'
            ],
            [
                'skill_type_id' => 124,
                'level'         => 3,
                'label'         => 'Coordonne différentes parties prenantes'
            ],
            [
                'skill_type_id' => 124,
                'level'         => 4,
                'label'         => 'Fait coopérer plusieurs équipes/entités'
            ],
            [
                'skill_type_id' => 125,
                'level'         => 1,
                'label'         => 'Fait quelques suggestions'
            ],
            [
                'skill_type_id' => 125,
                'level'         => 2,
                'label'         => 'Propose régulièrement des solutions concrètes'
            ],
            [
                'skill_type_id' => 125,
                'level'         => 3,
                'label'         => 'Anticipe les besoins et innove'
            ],
            [
                'skill_type_id' => 125,
                'level'         => 4,
                'label'         => 'Oriente stratégiquement l’évolution de projets'
            ],
            [
                'skill_type_id' => 126,
                'level'         => 1,
                'label'         => 'Laisse l’autre s’exprimer'
            ],
            [
                'skill_type_id' => 126,
                'level'         => 2,
                'label'         => 'Reformule pour vérifier sa compréhension'
            ],
            [
                'skill_type_id' => 126,
                'level'         => 3,
                'label'         => 'Saisit les non-dits et émotions'
            ],
            [
                'skill_type_id' => 126,
                'level'         => 4,
                'label'         => 'Facilite la parole de chacun dans un débat'
            ],
            [
                'skill_type_id' => 127,
                'level'         => 1,
                'label'         => 'Argumente sur des points simples'
            ],
            [
                'skill_type_id' => 127,
                'level'         => 2,
                'label'         => 'Convainc grâce à des exemples concrets'
            ],
            [
                'skill_type_id' => 127,
                'level'         => 3,
                'label'         => 'Manie différents leviers d’influence'
            ],
            [
                'skill_type_id' => 127,
                'level'         => 4,
                'label'         => 'Fait adhérer des publics variés à une vision'
            ],
            [
                'skill_type_id' => 128,
                'level'         => 1,
                'label'         => 'Salue et échange poliment'
            ],
            [
                'skill_type_id' => 128,
                'level'         => 2,
                'label'         => 'Met à l’aise son interlocuteur'
            ],
            [
                'skill_type_id' => 128,
                'level'         => 3,
                'label'         => 'Crée des contacts durables facilement'
            ],
            [
                'skill_type_id' => 128,
                'level'         => 4,
                'label'         => 'Évolue avec aisance dans tout type de réseau'
            ],
            [
                'skill_type_id' => 129,
                'level'         => 1,
                'label'         => 'Communique sur ses difficultés'
            ],
            [
                'skill_type_id' => 129,
                'level'         => 2,
                'label'         => 'Partage honnêtement ses avancées'
            ],
            [
                'skill_type_id' => 129,
                'level'         => 3,
                'label'         => 'Fournit des retours constructifs'
            ],
            [
                'skill_type_id' => 129,
                'level'         => 4,
                'label'         => 'Développe un climat de confiance total'
            ],
            [
                'skill_type_id' => 130,
                'level'         => 1,
                'label'         => 'S’engage dans ses tâches courantes'
            ],
            [
                'skill_type_id' => 130,
                'level'         => 2,
                'label'         => 'Recherche des défis stimulants'
            ],
            [
                'skill_type_id' => 130,
                'level'         => 3,
                'label'         => 'Fait preuve d’énergie dans l’adversité'
            ],
            [
                'skill_type_id' => 130,
                'level'         => 4,
                'label'         => 'Entraîne les autres à viser l’excellence'
            ],
            [
                'skill_type_id' => 131,
                'level'         => 1,
                'label'         => 'Traite une liste de tâches simple'
            ],
            [
                'skill_type_id' => 131,
                'level'         => 2,
                'label'         => 'Classe les actions par urgence/importances'
            ],
            [
                'skill_type_id' => 131,
                'level'         => 3,
                'label'         => 'Réorganise rapidement en cas d’imprévu'
            ],
            [
                'skill_type_id' => 131,
                'level'         => 4,
                'label'         => 'Pilote plusieurs projets aux priorités mouvantes'
            ],
            [
                'skill_type_id' => 132,
                'level'         => 1,
                'label'         => 'Demande un minimum d’encadrement'
            ],
            [
                'skill_type_id' => 132,
                'level'         => 2,
                'label'         => 'Gère seul ses tâches habituelles'
            ],
            [
                'skill_type_id' => 132,
                'level'         => 3,
                'label'         => 'Propose lui-même des solutions'
            ],
            [
                'skill_type_id' => 132,
                'level'         => 4,
                'label'         => 'Assume entièrement la réalisation d’un projet'
            ],
            [
                'skill_type_id' => 133,
                'level'         => 1,
                'label'         => 'Réalise le travail de base avec soin'
            ],
            [
                'skill_type_id' => 133,
                'level'         => 2,
                'label'         => 'Détecte les erreurs courantes'
            ],
            [
                'skill_type_id' => 133,
                'level'         => 3,
                'label'         => 'Garantit la justesse et la stabilité des livrables'
            ],
            [
                'skill_type_id' => 133,
                'level'         => 4,
                'label'         => 'Est reconnu comme un point de référence sûr'
            ],
            [
                'skill_type_id' => 134,
                'level'         => 1,
                'label'         => 'Reste posé dans des situations banales'
            ],
            [
                'skill_type_id' => 134,
                'level'         => 2,
                'label'         => 'Ne s’énerve pas sous légère tension'
            ],
            [
                'skill_type_id' => 134,
                'level'         => 3,
                'label'         => 'Garde un contrôle émotionnel en toute circonstance'
            ],
            [
                'skill_type_id' => 134,
                'level'         => 4,
                'label'         => 'Apaise l’entourage dans des situations de crise'
            ],
            [
                'skill_type_id' => 135,
                'level'         => 1,
                'label'         => 'Suit des tutos pour s’améliorer'
            ],
            [
                'skill_type_id' => 135,
                'level'         => 2,
                'label'         => 'Cherche activement des formations'
            ],
            [
                'skill_type_id' => 135,
                'level'         => 3,
                'label'         => 'Met à jour régulièrement ses compétences'
            ],
            [
                'skill_type_id' => 135,
                'level'         => 4,
                'label'         => 'Innove et diffuse les nouvelles pratiques'
            ],
            [
                'skill_type_id' => 136,
                'level'         => 1,
                'label'         => 'Respecte les demandes clés'
            ],
            [
                'skill_type_id' => 136,
                'level'         => 2,
                'label'         => 'Vérifie la satisfaction obtenue'
            ],
            [
                'skill_type_id' => 136,
                'level'         => 3,
                'label'         => 'Fait des retours et propose des améliorations'
            ],
            [
                'skill_type_id' => 136,
                'level'         => 4,
                'label'         => 'Crée une expérience client remarquable'
            ],
            [
                'skill_type_id' => 137,
                'level'         => 1,
                'label'         => 'Réalise différentes tâches basiques'
            ],
            [
                'skill_type_id' => 137,
                'level'         => 2,
                'label'         => 'Sait basculer d’une mission à l’autre'
            ],
            [
                'skill_type_id' => 137,
                'level'         => 3,
                'label'         => 'Maîtrise divers domaines adjacents'
            ],
            [
                'skill_type_id' => 137,
                'level'         => 4,
                'label'         => 'Intervient en tant que « couteau suisse »'
            ],
            [
                'skill_type_id' => 138,
                'level'         => 1,
                'label'         => 'Suit des règles simples'
            ],
            [
                'skill_type_id' => 138,
                'level'         => 2,
                'label'         => 'S’en tient aux process établis'
            ],
            [
                'skill_type_id' => 138,
                'level'         => 3,
                'label'         => 'Respecte rigoureusement les protocoles'
            ],
            [
                'skill_type_id' => 138,
                'level'         => 4,
                'label'         => 'Définit et fait respecter la discipline au sein d\'une équipe'
            ],
            [
                'skill_type_id' => 139,
                'level'         => 1,
                'label'         => 'Observe et décrit la situation'
            ],
            [
                'skill_type_id' => 139,
                'level'         => 2,
                'label'         => 'Établit un diagnostic basé sur des données'
            ],
            [
                'skill_type_id' => 139,
                'level'         => 3,
                'label'         => 'Croise différents indicateurs pour conclure'
            ],
            [
                'skill_type_id' => 139,
                'level'         => 4,
                'label'         => 'Met en place des analyses complexes et propose des stratégies'
            ],
            [
                'skill_type_id' => 140,
                'level'         => 1,
                'label'         => 'Repère des détails évidents'
            ],
            [
                'skill_type_id' => 140,
                'level'         => 2,
                'label'         => 'Scrute l’environnement pour collecter des infos'
            ],
            [
                'skill_type_id' => 140,
                'level'         => 3,
                'label'         => 'Détecte des signaux faibles'
            ],
            [
                'skill_type_id' => 140,
                'level'         => 4,
                'label'         => 'Réalise une veille approfondie et proactive'
            ],
            [
                'skill_type_id' => 141,
                'level'         => 1,
                'label'         => 'Traite les autres poliment'
            ],
            [
                'skill_type_id' => 141,
                'level'         => 2,
                'label'         => 'Écoute sans juger immédiatement'
            ],
            [
                'skill_type_id' => 141,
                'level'         => 3,
                'label'         => 'Valorise chaque membre de l’équipe'
            ],
            [
                'skill_type_id' => 141,
                'level'         => 4,
                'label'         => 'Défend les principes de dignité et d’équité'
            ],
            [
                'skill_type_id' => 142,
                'level'         => 1,
                'label'         => 'Exprime calmement son ressenti'
            ],
            [
                'skill_type_id' => 142,
                'level'         => 2,
                'label'         => 'Utilise des techniques de maîtrise émotionnelle'
            ],
            [
                'skill_type_id' => 142,
                'level'         => 3,
                'label'         => 'Contrôle ses réactions sous forte pression'
            ],
            [
                'skill_type_id' => 142,
                'level'         => 4,
                'label'         => 'Accompagne aussi les émotions des autres'
            ],
            [
                'skill_type_id' => 143,
                'level'         => 1,
                'label'         => 'Apprécie quelques traits d’esprit simples'
            ],
            [
                'skill_type_id' => 143,
                'level'         => 2,
                'label'         => 'Allège l’atmosphère avec un humour mesuré'
            ],
            [
                'skill_type_id' => 143,
                'level'         => 3,
                'label'         => 'Utilise l’humour pour dédramatiser des conflits'
            ],
            [
                'skill_type_id' => 143,
                'level'         => 4,
                'label'         => 'Manie l’humour finement même dans des réunions importantes'
            ],
            [
                'skill_type_id' => 144,
                'level'         => 1,
                'label'         => 'Entrevoit l’objectif général'
            ],
            [
                'skill_type_id' => 144,
                'level'         => 2,
                'label'         => 'Replace ses tâches dans le contexte global'
            ],
            [
                'skill_type_id' => 144,
                'level'         => 3,
                'label'         => 'Identifie les interconnexions entre projets'
            ],
            [
                'skill_type_id' => 144,
                'level'         => 4,
                'label'         => 'Anticipe les impacts à long terme'
            ],
            [
                'skill_type_id' => 145,
                'level'         => 1,
                'label'         => 'Évite de réagir sous l’impulsion immédiate'
            ],
            [
                'skill_type_id' => 145,
                'level'         => 2,
                'label'         => 'Fait preuve d’autocontrôle dans la discussion'
            ],
            [
                'skill_type_id' => 145,
                'level'         => 3,
                'label'         => 'Reste stable face aux critiques ou tensions'
            ],
            [
                'skill_type_id' => 145,
                'level'         => 4,
                'label'         => 'Montre un comportement exemplaire dans toutes situations'
            ],
            [
                'skill_type_id' => 146,
                'level'         => 1,
                'label'         => 'Respecte les différences'
            ],
            [
                'skill_type_id' => 146,
                'level'         => 2,
                'label'         => 'Adapte sa communication aux codes locaux'
            ],
            [
                'skill_type_id' => 146,
                'level'         => 3,
                'label'         => 'Travaille aisément avec des équipes internationales'
            ],
            [
                'skill_type_id' => 146,
                'level'         => 4,
                'label'         => 'Assume un rôle de médiateur entre différentes cultures'
            ],
            [
                'skill_type_id' => 147,
                'level'         => 1,
                'label'         => 'Identifie un désaccord naissant'
            ],
            [
                'skill_type_id' => 147,
                'level'         => 2,
                'label'         => 'Dialogue pour trouver un compromis'
            ],
            [
                'skill_type_id' => 147,
                'level'         => 3,
                'label'         => 'Utilise des méthodes de médiation'
            ],
            [
                'skill_type_id' => 147,
                'level'         => 4,
                'label'         => 'Résout des conflits profonds en préservant la relation'
            ],
            [
                'skill_type_id' => 148,
                'level'         => 1,
                'label'         => 'Donne quelques conseils de base'
            ],
            [
                'skill_type_id' => 148,
                'level'         => 2,
                'label'         => 'Suit un collaborateur dans sa progression'
            ],
            [
                'skill_type_id' => 148,
                'level'         => 3,
                'label'         => 'Met en place un plan de développement ciblé'
            ],
            [
                'skill_type_id' => 148,
                'level'         => 4,
                'label'         => 'Fait émerger le potentiel d’équipes entières'
            ],
            [
                'skill_type_id' => 149,
                'level'         => 1,
                'label'         => 'Sait utiliser des outils courants (emails, etc.)'
            ],
            [
                'skill_type_id' => 149,
                'level'         => 2,
                'label'         => 'Exploite diverses plateformes collaboratives'
            ],
            [
                'skill_type_id' => 149,
                'level'         => 3,
                'label'         => 'Pilote des projets numériques complexes'
            ],
            [
                'skill_type_id' => 149,
                'level'         => 4,
                'label'         => 'Anticipe les tendances technologiques'
            ],
            [
                'skill_type_id' => 150,
                'level'         => 1,
                'label'         => 'Évite les affrontements directs'
            ],
            [
                'skill_type_id' => 150,
                'level'         => 2,
                'label'         => 'Sait négocier avec différents départements'
            ],
            [
                'skill_type_id' => 150,
                'level'         => 3,
                'label'         => 'Apaise les tensions entre services'
            ],
            [
                'skill_type_id' => 150,
                'level'         => 4,
                'label'         => 'Construit des ponts de collaboration durable'
            ],
            [
                'skill_type_id' => 151,
                'level'         => 1,
                'label'         => 'Exprime fermement ses opinions'
            ],
            [
                'skill_type_id' => 151,
                'level'         => 2,
                'label'         => 'Soutient ses idées face aux objections'
            ],
            [
                'skill_type_id' => 151,
                'level'         => 3,
                'label'         => 'Rassemble autour d’une vision'
            ],
            [
                'skill_type_id' => 151,
                'level'         => 4,
                'label'         => 'Embarque différents acteurs dans un projet commun'
            ],
            [
                'skill_type_id' => 152,
                'level'         => 1,
                'label'         => 'S’adapte aux modifications d’horaires'
            ],
            [
                'skill_type_id' => 152,
                'level'         => 2,
                'label'         => 'Réorganise ses priorités sans difficulté'
            ],
            [
                'skill_type_id' => 152,
                'level'         => 3,
                'label'         => 'Change de méthode si nécessaire'
            ],
            [
                'skill_type_id' => 152,
                'level'         => 4,
                'label'         => 'Transforme le mode de fonctionnement pour répondre à l’imprévu'
            ],
            [
                'skill_type_id' => 153,
                'level'         => 1,
                'label'         => 'Évalue sommairement les dangers'
            ],
            [
                'skill_type_id' => 153,
                'level'         => 2,
                'label'         => 'Identifie les zones à risque et propose des actions'
            ],
            [
                'skill_type_id' => 153,
                'level'         => 3,
                'label'         => 'Met en place des plans de mitigation'
            ],
            [
                'skill_type_id' => 153,
                'level'         => 4,
                'label'         => 'Gère des matrices de risques complexes'
            ],
            [
                'skill_type_id' => 154,
                'level'         => 1,
                'label'         => 'Fait des comptes simples'
            ],
            [
                'skill_type_id' => 154,
                'level'         => 2,
                'label'         => 'Répartit les dépenses selon un plan'
            ],
            [
                'skill_type_id' => 154,
                'level'         => 3,
                'label'         => 'Optimise l’usage des ressources financières'
            ],
            [
                'skill_type_id' => 154,
                'level'         => 4,
                'label'         => 'Dirige un budget important sur plusieurs projets'
            ],
            [
                'skill_type_id' => 155,
                'level'         => 1,
                'label'         => 'Termine ses tâches dans les temps'
            ],
            [
                'skill_type_id' => 155,
                'level'         => 2,
                'label'         => 'Utilise des to-do lists et check-lists'
            ],
            [
                'skill_type_id' => 155,
                'level'         => 3,
                'label'         => 'Automatisation partielle de ses routines'
            ],
            [
                'skill_type_id' => 155,
                'level'         => 4,
                'label'         => 'Atteint une productivité très élevée'
            ],
            [
                'skill_type_id' => 156,
                'level'         => 1,
                'label'         => 'Range correctement les dossiers'
            ],
            [
                'skill_type_id' => 156,
                'level'         => 2,
                'label'         => 'Utilise un système de classement cohérent'
            ],
            [
                'skill_type_id' => 156,
                'level'         => 3,
                'label'         => 'Gère des archives physiques et numériques'
            ],
            [
                'skill_type_id' => 156,
                'level'         => 4,
                'label'         => 'Définit une politique documentaire générale'
            ],
            [
                'skill_type_id' => 157,
                'level'         => 1,
                'label'         => 'Suit un process qualité établi'
            ],
            [
                'skill_type_id' => 157,
                'level'         => 2,
                'label'         => 'Signale les écarts et corrige'
            ],
            [
                'skill_type_id' => 157,
                'level'         => 3,
                'label'         => 'Améliore en continu les standards'
            ],
            [
                'skill_type_id' => 157,
                'level'         => 4,
                'label'         => 'Supervise des audits qualité et déploie les bonnes pratiques'
            ],
            [
                'skill_type_id' => 158,
                'level'         => 1,
                'label'         => 'Accepte les opinions différentes'
            ],
            [
                'skill_type_id' => 158,
                'level'         => 2,
                'label'         => 'Recherche des points de vue variés'
            ],
            [
                'skill_type_id' => 158,
                'level'         => 3,
                'label'         => 'S’intéresse aux cultures et idées éloignées'
            ],
            [
                'skill_type_id' => 158,
                'level'         => 4,
                'label'         => 'Favorise la diversité intellectuelle dans l’équipe'
            ],
            [
                'skill_type_id' => 159,
                'level'         => 1,
                'label'         => 'Rédige des documents simples'
            ],
            [
                'skill_type_id' => 159,
                'level'         => 2,
                'label'         => 'Structure ses écrits avec clarté'
            ],
            [
                'skill_type_id' => 159,
                'level'         => 3,
                'label'         => 'Soigne le style et l’argumentation'
            ],
            [
                'skill_type_id' => 159,
                'level'         => 4,
                'label'         => 'Produit des documents convaincants et bien référencés'
            ],
            [
                'skill_type_id' => 160,
                'level'         => 1,
                'label'         => 'S’exprime avec des phrases claires'
            ],
            [
                'skill_type_id' => 160,
                'level'         => 2,
                'label'         => 'Varie le ton et le vocabulaire'
            ],
            [
                'skill_type_id' => 160,
                'level'         => 3,
                'label'         => 'Capte l’attention d’un auditoire'
            ],
            [
                'skill_type_id' => 160,
                'level'         => 4,
                'label'         => 'Maîtrise parfaitement l’art oratoire'
            ],
            [
                'skill_type_id' => 161,
                'level'         => 1,
                'label'         => 'Suit un plan de base'
            ],
            [
                'skill_type_id' => 161,
                'level'         => 2,
                'label'         => 'Utilise un diagramme simple (Gantt)'
            ],
            [
                'skill_type_id' => 161,
                'level'         => 3,
                'label'         => 'Anticipe les risques et gère les ressources'
            ],
            [
                'skill_type_id' => 161,
                'level'         => 4,
                'label'         => 'Supervise plusieurs projets complexes en parallèle'
            ],
            [
                'skill_type_id' => 162,
                'level'         => 1,
                'label'         => 'Fait l’intermédiaire sur des problèmes mineurs'
            ],
            [
                'skill_type_id' => 162,
                'level'         => 2,
                'label'         => 'Facilite la compréhension entre parties opposées'
            ],
            [
                'skill_type_id' => 162,
                'level'         => 3,
                'label'         => 'Structure des discussions pour parvenir à un accord'
            ],
            [
                'skill_type_id' => 162,
                'level'         => 4,
                'label'         => 'Gère des conflits complexes en maintenant la relation'
            ],
            [
                'skill_type_id' => 163,
                'level'         => 1,
                'label'         => 'Connaît quelques formules basiques (ex. Anglais A1)',
            ],
            [
                'skill_type_id' => 163,
                'level'         => 2,
                'label'         => 'Communique simplement à l’oral (ex. B1)',
            ],
            [
                'skill_type_id' => 163,
                'level'         => 3,
                'label'         => 'Rédige et discute couramment (ex. C1)',
            ],
            [
                'skill_type_id' => 163,
                'level'         => 4,
                'label'         => 'Manie avec aisance et nuance (ex. C2)',
            ],
            [
                'skill_type_id' => 164,
                'level'         => 1,
                'label'         => 'Participe aux réunions de groupe',
            ],
            [
                'skill_type_id' => 164,
                'level'         => 2,
                'label'         => 'Contribue activement aux objectifs partagés',
            ],
            [
                'skill_type_id' => 164,
                'level'         => 3,
                'label'         => 'Coordonne les rôles et stimule la coopération',
            ],
            [
                'skill_type_id' => 164,
                'level'         => 4,
                'label'         => 'Crée une synergie forte entre divers profils',
            ],
            [
                'skill_type_id' => 165,
                'level'         => 1,
                'label'         => 'Entrevoit les grandes lignes du futur',
            ],
            [
                'skill_type_id' => 165,
                'level'         => 2,
                'label'         => 'Élabore des objectifs à moyen terme',
            ],
            [
                'skill_type_id' => 165,
                'level'         => 3,
                'label'         => 'Décline la stratégie en plans d’actions',
            ],
            [
                'skill_type_id' => 165,
                'level'         => 4,
                'label'         => 'Anticipe les tendances longues et oriente toute l’organisation',
            ],
            [
                'skill_type_id' => 166,
                'level'         => 1,
                'label'         => 'Reste concentré sur une tâche prolongée',
            ],
            [
                'skill_type_id' => 166,
                'level'         => 2,
                'label'         => 'Supporte un rythme soutenu dans la durée',
            ],
            [
                'skill_type_id' => 166,
                'level'         => 3,
                'label'         => 'Enchaîne plusieurs missions intenses',
            ],
            [
                'skill_type_id' => 166,
                'level'         => 4,
                'label'         => 'Maintient un haut niveau d’énergie sur le long terme',
            ],
            [
                'skill_type_id' => 167,
                'level'         => 1,
                'label'         => 'Fournit l’effort nécessaire',
            ],
            [
                'skill_type_id' => 167,
                'level'         => 2,
                'label'         => 'Travaille avec constance',
            ],
            [
                'skill_type_id' => 167,
                'level'         => 3,
                'label'         => 'Peut produire un volume important dans des délais serrés',
            ],
            [
                'skill_type_id' => 167,
                'level'         => 4,
                'label'         => 'Soutient un rythme de travail très élevé en restant efficace',
            ],
            [
                'skill_type_id' => 168,
                'level'         => 1,
                'label'         => 'Utilise les outils basiques (mail, suite Office)',
            ],
            [
                'skill_type_id' => 168,
                'level'         => 2,
                'label'         => 'Explore des solutions nouvelles (apps, plateformes)',
            ],
            [
                'skill_type_id' => 168,
                'level'         => 3,
                'label'         => 'Met en place des outils digitaux pour l’équipe',
            ],
            [
                'skill_type_id' => 168,
                'level'         => 4,
                'label'         => 'Anticipe les évolutions tech et forme les autres',
            ],
            [
                'skill_type_id' => 169,
                'level'         => 1,
                'label'         => 'Produit des documents lisibles pour tous',
            ],
            [
                'skill_type_id' => 169,
                'level'         => 2,
                'label'         => 'Applique quelques règles (contraste, typographie)',
            ],
            [
                'skill_type_id' => 169,
                'level'         => 3,
                'label'         => 'Connaît les normes (WCAG) et les bonnes pratiques',
            ],
            [
                'skill_type_id' => 169,
                'level'         => 4,
                'label'         => 'Intègre l’accessibilité dans tous les projets',
            ],
            [
                'skill_type_id' => 170,
                'level'         => 1,
                'label'         => 'Se fixe des buts minimaux',
            ],
            [
                'skill_type_id' => 170,
                'level'         => 2,
                'label'         => 'Suit des objectifs chiffrés',
            ],
            [
                'skill_type_id' => 170,
                'level'         => 3,
                'label'         => 'Optimise l’efficacité pour atteindre les cibles',
            ],
            [
                'skill_type_id' => 170,
                'level'         => 4,
                'label'         => 'Surpasse régulièrement les objectifs fixés',
            ],
            [
                'skill_type_id' => 171,
                'level'         => 1,
                'label'         => 'Respecte les règles de base',
            ],
            [
                'skill_type_id' => 171,
                'level'         => 2,
                'label'         => 'Agit de manière intègre dans son travail',
            ],
            [
                'skill_type_id' => 171,
                'level'         => 3,
                'label'         => 'Détecte et signale les manquements',
            ],
            [
                'skill_type_id' => 171,
                'level'         => 4,
                'label'         => 'Défend les principes éthiques et les fait appliquer',
            ],
            [
                'skill_type_id' => 172,
                'level'         => 1,
                'label'         => 'Accepte le feedback des autres',
            ],
            [
                'skill_type_id' => 172,
                'level'         => 2,
                'label'         => 'Reconnaît ses erreurs',
            ],
            [
                'skill_type_id' => 172,
                'level'         => 3,
                'label'         => 'Analyse ses limites et s’améliore',
            ],
            [
                'skill_type_id' => 172,
                'level'         => 4,
                'label'         => 'Provoque des remises en question constructives',
            ],
            [
                'skill_type_id' => 173,
                'level'         => 1,
                'label'         => 'Gère 2 petits projets à la fois',
            ],
            [
                'skill_type_id' => 173,
                'level'         => 2,
                'label'         => 'Passe d’un projet à l’autre sans confusion',
            ],
            [
                'skill_type_id' => 173,
                'level'         => 3,
                'label'         => 'Priorise et répartit les ressources entre plusieurs projets',
            ],
            [
                'skill_type_id' => 173,
                'level'         => 4,
                'label'         => 'Coordonne un portefeuille de projets stratégiques',
            ],
            [
                'skill_type_id' => 174,
                'level'         => 1,
                'label'         => 'Évalue rapidement une situation',
            ],
            [
                'skill_type_id' => 174,
                'level'         => 2,
                'label'         => 'Compare options avant de décider',
            ],
            [
                'skill_type_id' => 174,
                'level'         => 3,
                'label'         => 'Pèse conséquences et risques',
            ],
            [
                'skill_type_id' => 174,
                'level'         => 4,
                'label'         => 'Démontre un discernement exceptionnel',
            ],
            [
                'skill_type_id' => 175,
                'level'         => 1,
                'label'         => 'S’entend avec la plupart des profils',
            ],
            [
                'skill_type_id' => 175,
                'level'         => 2,
                'label'         => 'Ajuste son attitude selon l’interlocuteur',
            ],
            [
                'skill_type_id' => 175,
                'level'         => 3,
                'label'         => 'Maintient une bonne entente malgré divergences',
            ],
            [
                'skill_type_id' => 175,
                'level'         => 4,
                'label'         => 'Excelle à rapprocher des profils très différents',
            ],
            [
                'skill_type_id' => 176,
                'level'         => 1,
                'label'         => 'Fournit une aide ponctuelle en cas de problème simple',
            ],
            [
                'skill_type_id' => 176,
                'level'         => 2,
                'label'         => 'Diagnostique et résout des dysfonctionnements standard',
            ],
            [
                'skill_type_id' => 176,
                'level'         => 3,
                'label'         => 'Conseille et forme les collègues sur des aspects complexes',
            ],
            [
                'skill_type_id' => 176,
                'level'         => 4,
                'label'         => 'Assume une responsabilité de référent technique',
            ],
            [
                'skill_type_id' => 177,
                'level'         => 1,
                'label'         => 'A quelques connaissances variées',
            ],
            [
                'skill_type_id' => 177,
                'level'         => 2,
                'label'         => 'Possède un socle culturel solide',
            ],
            [
                'skill_type_id' => 177,
                'level'         => 3,
                'label'         => 'Fait des liens entre différents domaines',
            ],
            [
                'skill_type_id' => 177,
                'level'         => 4,
                'label'         => 'Dispose d’une culture large et approfondie',
            ],
            [
                'skill_type_id' => 178,
                'level'         => 1,
                'label'         => 'Voit le côté positif basique',
            ],
            [
                'skill_type_id' => 178,
                'level'         => 2,
                'label'         => 'Encourage l’espoir dans l’équipe',
            ],
            [
                'skill_type_id' => 178,
                'level'         => 3,
                'label'         => 'Transforme un échec en opportunité',
            ],
            [
                'skill_type_id' => 178,
                'level'         => 4,
                'label'         => 'Entraîne autrui à garder un état d’esprit constructif',
            ],
            [
                'skill_type_id' => 179,
                'level'         => 1,
                'label'         => 'Accueille poliment le client',
            ],
            [
                'skill_type_id' => 179,
                'level'         => 2,
                'label'         => 'Cerne ses besoins et oriente la réponse',
            ],
            [
                'skill_type_id' => 179,
                'level'         => 3,
                'label'         => 'Noue des liens de confiance durables',
            ],
            [
                'skill_type_id' => 179,
                'level'         => 4,
                'label'         => 'Fidélise et développe la satisfaction client',
            ],
            [
                'skill_type_id' => 180,
                'level'         => 1,
                'label'         => 'Montre de l’enthousiasme ponctuel',
            ],
            [
                'skill_type_id' => 180,
                'level'         => 2,
                'label'         => 'Maintient un niveau d’énergie constant',
            ],
            [
                'skill_type_id' => 180,
                'level'         => 3,
                'label'         => 'Insuffle un élan dans l’équipe',
            ],
            [
                'skill_type_id' => 180,
                'level'         => 4,
                'label'         => 'Donne l’impulsion pour atteindre des objectifs ambitieux',
            ],
            [
                'skill_type_id' => 181,
                'level'         => 1,
                'label'         => 'Évite des approximations grossières',
            ],
            [
                'skill_type_id' => 181,
                'level'         => 2,
                'label'         => 'Veille à l’exactitude dans les données',
            ],
            [
                'skill_type_id' => 181,
                'level'         => 3,
                'label'         => 'Contrôle la validité des informations',
            ],
            [
                'skill_type_id' => 181,
                'level'         => 4,
                'label'         => 'Garantit un haut degré de justesse systématiquement',
            ],
            [
                'skill_type_id' => 182,
                'level'         => 1,
                'label'         => 'Aime relever des défis simples',
            ],
            [
                'skill_type_id' => 182,
                'level'         => 2,
                'label'         => 'Se fixe des objectifs ambitieux',
            ],
            [
                'skill_type_id' => 182,
                'level'         => 3,
                'label'         => 'Persévère face à la difficulté',
            ],
            [
                'skill_type_id' => 182,
                'level'         => 4,
                'label'         => 'Dépasse régulièrement ses propres limites',
            ],
            [
                'skill_type_id' => 183,
                'level'         => 1,
                'label'         => 'Échange les coordonnées avec quelques personnes',
            ],
            [
                'skill_type_id' => 183,
                'level'         => 2,
                'label'         => 'Participe à des événements pour élargir son réseau',
            ],
            [
                'skill_type_id' => 183,
                'level'         => 3,
                'label'         => 'Entretient activement des contacts utiles',
            ],
            [
                'skill_type_id' => 183,
                'level'         => 4,
                'label'         => 'Dispose d’un large réseau national/international',
            ],
            [
                'skill_type_id' => 184,
                'level'         => 1,
                'label'         => 'S’investit dans ses tâches principales',
            ],
            [
                'skill_type_id' => 184,
                'level'         => 2,
                'label'         => 'Montre de la détermination sur la durée',
            ],
            [
                'skill_type_id' => 184,
                'level'         => 3,
                'label'         => 'N’hésite pas à prendre des responsabilités',
            ],
            [
                'skill_type_id' => 184,
                'level'         => 4,
                'label'         => 'Se montre disponible et très engagé dans la réussite globale',
            ],
            [
                'skill_type_id' => 185,
                'level'         => 1,
                'label'         => 'Respecte les codes de base (ponctualité, politesse)',
            ],
            [
                'skill_type_id' => 185,
                'level'         => 2,
                'label'         => 'Tient compte des standards de son domaine',
            ],
            [
                'skill_type_id' => 185,
                'level'         => 3,
                'label'         => 'Évolue avec rigueur et déontologie',
            ],
            [
                'skill_type_id' => 185,
                'level'         => 4,
                'label'          => 'Représente un modèle de référence dans son milieu',
            ],
                [
                    'skill_type_id' => 186,
                    'level'         => 1,
                    'label'         => 'Accepte des tâches un peu exigeantes',
                ],
                [
                    'skill_type_id' => 186,
                    'level'         => 2,
                    'label'         => 'Travaille dur pour atteindre un but',
                ],
                [
                    'skill_type_id' => 186,
                    'level'         => 3,
                    'label'         => 'Ne fuit pas la difficulté et y consacre l’énergie nécessaire',
                ],
                [
                    'skill_type_id' => 186,
                    'level'         => 4,
                    'label'         => 'Pousse régulièrement ses propres limites physiques ou mentales',
                ],
                [
                    'skill_type_id' => 187,
                    'level'         => 1,
                    'label'         => 'Pose des questions pour en savoir plus',
                ],
                [
                    'skill_type_id' => 187,
                    'level'         => 2,
                    'label'         => 'Lit et se renseigne activement',
                ],
                [
                    'skill_type_id' => 187,
                    'level'         => 3,
                    'label'         => 'Cherche à comprendre les fondements et contextes',
                ],
                [
                    'skill_type_id' => 187,
                    'level'         => 4,
                    'label'         => 'Explore en profondeur plusieurs domaines pointus',
                ],
                [
                    'skill_type_id' => 188,
                    'level'         => 1,
                    'label'         => 'Veille à la présentation propre et ordonnée',
                ],
                [
                    'skill_type_id' => 188,
                    'level'         => 2,
                    'label'         => 'Ajuste des détails pour un rendu plus soigné',
                ],
                [
                    'skill_type_id' => 188,
                    'level'         => 3,
                    'label'         => 'Respecte des principes esthétiques (harmonie, couleurs)',
                ],
                [
                    'skill_type_id' => 188,
                    'level'         => 4,
                    'label'         => 'Crée un univers visuel cohérent et impactant',
                ],
                [
                    'skill_type_id' => 189,
                    'level'         => 1,
                    'label'         => 'Accepte qu’il manque certaines infos',
                ],
                [
                    'skill_type_id' => 189,
                    'level'         => 2,
                    'label'         => 'Tente des approches et s’adapte en cours de route',
                ],
                [
                    'skill_type_id' => 189,
                    'level'         => 3,
                    'label'         => 'Calcule des scénarios et minimise les risques',
                ],
                [
                    'skill_type_id' => 189,
                    'level'         => 4,
                    'label'         => 'Prend des décisions éclairées même avec peu de certitudes',
                ],
                [
                    'skill_type_id' => 190,
                    'level'         => 1,
                    'label'         => 'Résiste à la pression modérée',
                ],
                [
                    'skill_type_id' => 190,
                    'level'         => 2,
                    'label'         => 'Tient bon face aux difficultés',
                ],
                [
                    'skill_type_id' => 190,
                    'level'         => 3,
                    'label'         => 'Défend ses convictions malgré l’adversité',
                ],
                [
                    'skill_type_id' => 190,
                    'level'         => 4,
                    'label'         => 'Fait preuve d’une résilience exemplaire',
                ],
            
    [
        'skill_type_id' => 191,
        'level'         => 1,
        'label'         => 'Agit sans attendre qu’on le lui demande',
    ],
    [
        'skill_type_id' => 191,
        'level'         => 2,
        'label'         => 'Identifie des axes d’amélioration',
    ],
    [
        'skill_type_id' => 191,
        'level'         => 3,
        'label'         => 'Lance des initiatives à moyen terme',
    ],
    [
        'skill_type_id' => 191,
        'level'         => 4,
        'label'         => 'Transforme en profondeur les méthodes de travail',
    ],
    [
        'skill_type_id' => 192,
        'level'         => 1,
        'label'         => 'Connaît les règles de base (EPI, consignes)',
    ],
    [
        'skill_type_id' => 192,
        'level'         => 2,
        'label'         => 'Respecte scrupuleusement les protocoles',
    ],
    [
        'skill_type_id' => 192,
        'level'         => 3,
        'label'         => 'Signale tout risque et forme les collègues',
    ],
    [
        'skill_type_id' => 192,
        'level'         => 4,
        'label'         => 'Établit une véritable culture sécurité dans l’organisation',
    ],
    [
        'skill_type_id' => 193,
        'level'         => 1,
        'label'         => 'Salue, remercie, utilise les formules de politesse',
    ],
    [
        'skill_type_id' => 193,
        'level'         => 2,
        'label'         => 'Montre du respect envers tous',
    ],
    [
        'skill_type_id' => 193,
        'level'         => 3,
        'label'         => 'Adopte une politesse constante en toute situation',
    ],
    [
        'skill_type_id' => 193,
        'level'         => 4,
        'label'         => 'Diffuse des valeurs de politesse exemplaires',
    ],
    [
        'skill_type_id' => 194,
        'level'         => 1,
        'label'         => 'Inspire un minimum de confiance par son comportement',
    ],
    [
        'skill_type_id' => 194,
        'level'         => 2,
        'label'         => 'Reste cohérent entre ses mots et ses actes',
    ],
    [
        'skill_type_id' => 194,
        'level'         => 3,
        'label'         => 'Fidélise autour de lui par la constance et la sincérité',
    ],
    [
        'skill_type_id' => 194,
        'level'         => 4,
        'label'         => 'Est perçu comme un « repère » fiable à haut niveau',
    ],
    [
        'skill_type_id' => 195,
        'level'         => 1,
        'label'         => 'Utilise rationnellement le matériel',
    ],
    [
        'skill_type_id' => 195,
        'level'         => 2,
        'label'         => 'Évite le gaspillage et planifie les commandes',
    ],
    [
        'skill_type_id' => 195,
        'level'         => 3,
        'label'         => 'Alloue efficacement les ressources selon les besoins',
    ],
    [
        'skill_type_id' => 195,
        'level'         => 4,
        'label'         => 'Optimise et sécurise tous les moyens mis en œuvre',
    ],
    [
        'skill_type_id' => 196,
        'level'         => 1,
        'label'         => 'Rédige des notes pour garder une trace',
    ],
    [
        'skill_type_id' => 196,
        'level'         => 2,
        'label'         => 'Met à jour régulièrement les supports',
    ],
    [
        'skill_type_id' => 196,
        'level'         => 3,
        'label'         => 'Suit une structure claire et partagée',
    ],
    [
        'skill_type_id' => 196,
        'level'         => 4,
        'label'         => 'Crée une base de connaissances organisée',
    ],
    [
        'skill_type_id' => 197,
        'level'         => 1,
        'label'         => 'Participe à la logistique de petits événements',
    ],
    [
        'skill_type_id' => 197,
        'level'         => 2,
        'label'         => 'Coordonne les prestataires et invitations',
    ],
    [
        'skill_type_id' => 197,
        'level'         => 3,
        'label'         => 'Supervise tout le planning et le budget',
    ],
    [
        'skill_type_id' => 197,
        'level'         => 4,
        'label'         => 'Orchestration d’événements majeurs (congrès, forums)',
    ],
    [
        'skill_type_id' => 198,
        'level'         => 1,
        'label'         => 'Ne trompe pas volontairement autrui',
    ],
    [
        'skill_type_id' => 198,
        'level'         => 2,
        'label'         => 'Avoue ses erreurs quand elles arrivent',
    ],
    [
        'skill_type_id' => 198,
        'level'         => 3,
        'label'         => 'Pratique la transparence au quotidien',
    ],
    [
        'skill_type_id' => 198,
        'level'         => 4,
        'label'         => 'Reconnue pour son intégrité morale infaillible',
    ],
    [
        'skill_type_id' => 199,
        'level'         => 1,
        'label'         => 'Se met en mouvement quand un objectif émerge',
    ],
    [
        'skill_type_id' => 199,
        'level'         => 2,
        'label'         => 'Stimule l’énergie du groupe sur un projet',
    ],
    [
        'skill_type_id' => 199,
        'level'         => 3,
        'label'         => 'Fait monter en puissance l’équipe rapidement',
    ],
    [
        'skill_type_id' => 199,
        'level'         => 4,
        'label'         => 'Rassemble de larges communautés autour d’une cause',
    ],
    [
        'skill_type_id' => 200,
        'level'         => 1,
        'label'         => 'Gère les plaintes simples',
    ],
    [
        'skill_type_id' => 200,
        'level'         => 2,
        'label'         => 'Rassure un client insatisfait',
    ],
    [
        'skill_type_id' => 200,
        'level'         => 3,
        'label'         => 'Trouve des solutions en situation conflictuelle',
    ],
    [
        'skill_type_id' => 200,
        'level'         => 4,
        'label'         => 'Résout les cas critiques en préservant la relation',
    ],
    [
        'skill_type_id' => 201,
        'level'         => 1,
        'label'         => 'Traite les priorités soudaines',
    ],
    [
        'skill_type_id' => 201,
        'level'         => 2,
        'label'         => 'Réagit rapidement pour éviter l’aggravation',
    ],
    [
        'skill_type_id' => 201,
        'level'         => 3,
        'label'         => 'Met en place un plan d’urgence structuré',
    ],
    [
        'skill_type_id' => 201,
        'level'         => 4,
        'label'         => 'Pilote simultanément plusieurs urgences critiques',
    ],
    [
        'skill_type_id' => 202,
        'level'         => 1,
        'label'         => 'Cerne globalement ses points forts et faibles',
    ],
    [
        'skill_type_id' => 202,
        'level'         => 2,
        'label'         => 'Reconnaît les émotions et les limites personnelles',
    ],
    [
        'skill_type_id' => 202,
        'level'         => 3,
        'label'         => 'Travaille sur ses axes d’amélioration',
    ],
    [
        'skill_type_id' => 202,
        'level'         => 4,
        'label'         => 'Atteint un haut niveau de lucidité et d’auto-maîtrise',
    ],
        [
            'skill_type_id' => 203,
            'level'         => 1,
            'label'         => 'Participe à la logistique de petits événements',
        ],
        [
            'skill_type_id' => 203,
            'level'         => 2,
            'label'         => 'Coordonne les prestataires et invitations',
        ],
        [
            'skill_type_id' => 203,
            'level'         => 3,
            'label'         => 'Supervise tout le planning et le budget',
        ],
        [
            'skill_type_id' => 203,
            'level'         => 4,
            'label'         => 'Orchestration d’événements majeurs (congrès, forums)',
        ],
        [
            'skill_type_id' => 204,
            'level'         => 1,
            'label'         => 'Ne trompe pas volontairement autrui',
        ],
        [
            'skill_type_id' => 204,
            'level'         => 2,
            'label'         => 'Avoue ses erreurs quand elles arrivent',
        ],
        [
            'skill_type_id' => 204,
            'level'         => 3,
            'label'         => 'Pratique la transparence au quotidien',
        ],
        [
            'skill_type_id' => 204,
            'level'         => 4,
            'label'         => 'Reconnue pour son intégrité morale infaillible',
        ],
        [
            'skill_type_id' => 205,
            'level'         => 1,
            'label'         => 'Se met en mouvement quand un objectif émerge',
        ],
        [
            'skill_type_id' => 205,
            'level'         => 2,
            'label'         => 'Stimule l’énergie du groupe sur un projet',
        ],
        [
            'skill_type_id' => 205,
            'level'         => 3,
            'label'         => 'Fait monter en puissance l’équipe rapidement',
        ],
        [
            'skill_type_id' => 205,
            'level'         => 4,
            'label'         => 'Rassemble de larges communautés autour d’une cause',
        ],
        [
            'skill_type_id' => 206,
            'level'         => 1,
            'label'         => 'Gère les plaintes simples',
        ],
        [
            'skill_type_id' => 206,
            'level'         => 2,
            'label'         => 'Rassure un client insatisfait',
        ],
        [
            'skill_type_id' => 206,
            'level'         => 3,
            'label'         => 'Trouve des solutions en situation conflictuelle',
        ],
        [
            'skill_type_id' => 206,
            'level'         => 4,
            'label'         => 'Résout les cas critiques en préservant la relation',
        ],
        [
            'skill_type_id' => 207,
            'level'         => 1,
            'label'         => 'Traite les priorités soudaines',
        ],
        [
            'skill_type_id' => 207,
            'level'         => 2,
            'label'         => 'Réagit rapidement pour éviter l’aggravation',
        ],
        [
            'skill_type_id' => 207,
            'level'         => 3,
            'label'         => 'Met en place un plan d’urgence structuré',
        ],
        [
            'skill_type_id' => 207,
            'level'         => 4,
            'label'         => 'Pilote simultanément plusieurs urgences critiques',
        ],
        [
            'skill_type_id' => 208,
            'level'         => 1,
            'label'         => 'Cerne globalement ses points forts et faibles',
        ],
        [
            'skill_type_id' => 208,
            'level'         => 2,
            'label'         => 'Reconnaît les émotions et les limites personnelles',
        ],
        [
            'skill_type_id' => 208,
            'level'         => 3,
            'label'         => 'Travaille sur ses axes d’amélioration',
        ],
        [
            'skill_type_id' => 208,
            'level'         => 4,
            'label'         => 'Atteint un haut niveau de lucidité et d’auto-maîtrise',
        ],
        [
            'skill_type_id' => 209,
            'level'         => 1,
            'label'         => 'Improvise une solution de secours',
        ],
        [
            'skill_type_id' => 209,
            'level'         => 2,
            'label'         => 'Adapte le plan initial face aux aléas',
        ],
        [
            'skill_type_id' => 209,
            'level'         => 3,
            'label'         => 'Prévoit toujours une marge et un plan B',
        ],
        [
            'skill_type_id' => 209,
            'level'         => 4,
            'label'         => 'Transforme l’imprévu en opportunité',
        ],
        [
            'skill_type_id' => 210,
            'level'         => 1,
            'label'         => 'Imagine ce que sera la suite à moyen terme',
        ],
        [
            'skill_type_id' => 210,
            'level'         => 2,
            'label'         => 'Planifie au-delà de l’échéance immédiate',
        ],
        [
            'skill_type_id' => 210,
            'level'         => 3,
            'label'         => 'Oriente ses choix en fonction de perspectives durables',
        ],
        [
            'skill_type_id' => 210,
            'level'         => 4,
            'label'         => 'Bâtit une stratégie solide sur plusieurs années',
        ],
        [
            'skill_type_id' => 211,
            'level'         => 1,
            'label'         => 'Utilise Word/Excel pour des tâches basiques',
        ],
        [
            'skill_type_id' => 211,
            'level'         => 2,
            'label'         => 'Exploite des formules ou modèles plus avancés',
        ],
        [
            'skill_type_id' => 211,
            'level'         => 3,
            'label'         => 'Automatise par macros ou fonctions complexes',
        ],
        [
            'skill_type_id' => 211,
            'level'         => 4,
            'label'         => 'Développe des solutions bureautiques structurées (VBA, etc.)',
        ],
        [
            'skill_type_id' => 212,
            'level'         => 1,
            'label'         => 'Attend son tour calmement',
        ],
        [
            'skill_type_id' => 212,
            'level'         => 2,
            'label'         => 'Supporte la lenteur de certains processus',
        ],
        [
            'skill_type_id' => 212,
            'level'         => 3,
            'label'         => 'Gère la frustration sur le long terme',
        ],
        [
            'skill_type_id' => 212,
            'level'         => 4,
            'label'         => 'Accompagne les autres sur la durée sans se lasser',
        ],
        [
            'skill_type_id' => 213,
            'level'         => 1,
            'label'         => 'Partage équitablement les moyens disponibles',
        ],
        [
            'skill_type_id' => 213,
            'level'         => 2,
            'label'         => 'Priorise selon l’importance des tâches',
        ],
        [
            'skill_type_id' => 213,
            'level'         => 3,
            'label'         => 'Affecte chaque ressource à un usage optimisé',
        ],
        [
            'skill_type_id' => 213,
            'level'         => 4,
            'label'         => 'Orchestre plusieurs budgets/ressources à haut niveau',
        ],
        [
            'skill_type_id' => 214,
            'level'         => 1,
            'label'         => 'Entretient un contact poli et chaleureux',
        ],
        [
            'skill_type_id' => 214,
            'level'         => 2,
            'label'         => 'Fait preuve de tact et de respect mutuel',
        ],
        [
            'skill_type_id' => 214,
            'level'         => 3,
            'label'         => 'Bâtit une confiance réciproque',
        ],
        [
            'skill_type_id' => 214,
            'level'         => 4,
            'label'         => 'Résout délicatement les tensions interpersonnelles',
        ],
        [
            'skill_type_id' => 215,
            'level'         => 1,
            'label'         => 'Regarde l’interlocuteur, adopte une posture ouverte',
        ],
        [
            'skill_type_id' => 215,
            'level'         => 2,
            'label'         => 'Ajuste son intonation et son langage corporel',
        ],
        [
            'skill_type_id' => 215,
            'level'         => 3,
            'label'         => 'Décode les signaux non verbaux chez autrui',
        ],
        [
            'skill_type_id' => 215,
            'level'         => 4,
            'label'         => 'Gère parfaitement l’impact visuel et corporel en public'
        ],
        [
            'skill_type_id' => 216,
            'level'         => 1,
            'label'         => 'Partage son point de vue dans l’équipe',
        ],
        [
            'skill_type_id' => 216,
            'level'         => 2,
            'label'         => 'Défend ses idées en interne',
        ],
        [
            'skill_type_id' => 216,
            'level'         => 3,
            'label'         => 'Fait autorité sur un sujet par son expertise',
        ],
        [
            'skill_type_id' => 216,
            'level'         => 4,
            'label'         => 'Influence la direction globale grâce à ses analyses',
        ],
        [
            'skill_type_id' => 217,
            'level'         => 1,
            'label'         => 'Relie rapidement deux faits simples',
        ],
        [
            'skill_type_id' => 217,
            'level'         => 2,
            'label'         => 'Identifie la cause réelle d’un problème',
        ],
        [
            'skill_type_id' => 217,
            'level'         => 3,
            'label'         => 'Discernement poussé dans des situations complexes',
        ],
        [
            'skill_type_id' => 217,
            'level'         => 4,
            'label'         => 'Capacité de voir au-delà des évidences',
        ],
        [
            'skill_type_id' => 218,
            'level'         => 1,
            'label'         => 'Supervise 1 ou 2 personnes',
        ],
        [
            'skill_type_id' => 218,
            'level'         => 2,
            'label'         => 'Assure la répartition des tâches pour un petit groupe',
        ],
        [
            'skill_type_id' => 218,
            'level'         => 3,
            'label'         => 'Encadre et motive une équipe plus large',
        ],
        [
            'skill_type_id' => 218,
            'level'         => 4,
            'label'         => 'Fait grandir et réussit la cohésion d’équipes multiples',
        ],
        [
            'skill_type_id' => 219,
            'level'         => 1,
            'label'         => 'Stocke quelques données dans un dossier',
        ],
        [
            'skill_type_id' => 219,
            'level'         => 2,
            'label'         => 'Utilise des répertoires et classements logiques',
        ],
        [
            'skill_type_id' => 219,
            'level'         => 3,
            'label'         => 'Met en place une base de connaissances partagée',
        ],
        [
            'skill_type_id' => 219,
            'level'         => 4,
            'label'         => 'Ordonne les flux d’info à l’échelle d’une organisation',
        ],
        [
            'skill_type_id' => 220,
            'level'         => 1,
            'label'         => 'Exprime ses besoins sans agresser',
        ],
        [
            'skill_type_id' => 220,
            'level'         => 2,
            'label'         => 'Défend ses droits tout en respectant ceux d’autrui',
        ],
        [
            'skill_type_id' => 220,
            'level'         => 3,
            'label'         => 'Négocie avec assurance et calme',
        ],
        [
            'skill_type_id' => 220,
            'level'         => 4,
            'label'         => 'S’affirme de manière constructive dans toutes situations',
        ],
        [
            'skill_type_id' => 221,
            'level'         => 1,
            'label'         => 'Répond aux demandes basiques',
        ],
        [
            'skill_type_id' => 221,
            'level'         => 2,
            'label'         => 'Adapte son offre ou son discours',
        ],
        [
            'skill_type_id' => 221,
            'level'         => 3,
            'label'         => 'Identifie les vraies attentes pour mieux y répondre',
        ],
        [
            'skill_type_id' => 221,
            'level'         => 4,
            'label'         => 'Fait de la satisfaction client un levier de croissance'
        ],
        [
            'skill_type_id' => 222,
            'level'         => 1,
            'label'         => 'Partage son point de vue dans l’équipe',
        ],
        [
            'skill_type_id' => 222,
            'level'         => 2,
            'label'         => 'Défend ses idées en interne',
        ],
        [
            'skill_type_id' => 222,
            'level'         => 3,
            'label'         => 'Fait autorité sur un sujet par son expertise',
        ],
        [
            'skill_type_id' => 222,
            'level'         => 4,
            'label'         => 'Influence la direction globale grâce à ses analyses',
        ],
        [
            'skill_type_id' => 223,
            'level'         => 1,
            'label'         => 'Relie rapidement deux faits simples',
        ],
        [
            'skill_type_id' => 223,
            'level'         => 2,
            'label'         => 'Identifie la cause réelle d’un problème',
        ],
        [
            'skill_type_id' => 223,
            'level'         => 3,
            'label'         => 'Discernement poussé dans des situations complexes',
        ],
        [
            'skill_type_id' => 223,
            'level'         => 4,
            'label'         => 'Capacité de voir au-delà des évidences',
        ],
        [
            'skill_type_id' => 224,
            'level'         => 1,
            'label'         => 'Supervise 1 ou 2 personnes',
        ],
        [
            'skill_type_id' => 224,
            'level'         => 2,
            'label'         => 'Assure la répartition des tâches pour un petit groupe',
        ],
        [
            'skill_type_id' => 224,
            'level'         => 3,
            'label'         => 'Encadre et motive une équipe plus large',
        ],
        [
            'skill_type_id' => 224,
            'level'         => 4,
            'label'         => 'Fait grandir et réussit la cohésion d’équipes multiples',
        ],
        [
            'skill_type_id' => 225,
            'level'         => 1,
            'label'         => 'Stocke quelques données dans un dossier',
        ],
        [
            'skill_type_id' => 225,
            'level'         => 2,
            'label'         => 'Utilise des répertoires et classements logiques',
        ],
        [
            'skill_type_id' => 225,
            'level'         => 3,
            'label'         => 'Met en place une base de connaissances partagée',
        ],
        [
            'skill_type_id' => 225,
            'level'         => 4,
            'label'         => 'Ordonne les flux d’info à l’échelle d’une organisation',
        ],
        [
            'skill_type_id' => 226,
            'level'         => 1,
            'label'         => 'Exprime ses besoins sans agresser',
        ],
        [
            'skill_type_id' => 226,
            'level'         => 2,
            'label'         => 'Défend ses droits tout en respectant ceux d’autrui',
        ],
        [
            'skill_type_id' => 226,
            'level'         => 3,
            'label'         => 'Négocie avec assurance et calme',
        ],
        [
            'skill_type_id' => 226,
            'level'         => 4,
            'label'         => 'S’affirme de manière constructive dans toutes situations',
        ],
        [
            'skill_type_id' => 227,
            'level'         => 1,
            'label'         => 'Répond aux demandes basiques',
        ],
        [
            'skill_type_id' => 227,
            'level'         => 2,
            'label'         => 'Adapte son offre ou son discours',
        ],
        [
            'skill_type_id' => 227,
            'level'         => 3,
            'label'         => 'Identifie les vraies attentes pour mieux y répondre',
        ],
        [
            'skill_type_id' => 227,
            'level'         => 4,
            'label'         => 'Fait de la satisfaction client un levier de croissance',
        ],

    [
        'skill_type_id' => 228,
        'level'         => 1,
        'label'         => 'Prévoit un minimum de risques',
    ],
    [
        'skill_type_id' => 228,
        'level'         => 2,
        'label'         => 'Planifie un plan B en cas de souci',
    ],
    [
        'skill_type_id' => 228,
        'level'         => 3,
        'label'         => 'Identifie les signaux d’alarme en avance',
    ],
    [
        'skill_type_id' => 228,
        'level'         => 4,
        'label'         => 'Élabore différents scénarios et choisit le meilleur',
    ],
    [
        'skill_type_id' => 229,
        'level'         => 1,
        'label'         => 'Aide un pair sur une tâche simple',
    ],
    [
        'skill_type_id' => 229,
        'level'         => 2,
        'label'         => 'Accompagne un junior sur des missions',
    ],
    [
        'skill_type_id' => 229,
        'level'         => 3,
        'label'         => 'Développe réellement les compétences d’un protégé',
    ],
    [
        'skill_type_id' => 229,
        'level'         => 4,
        'label'         => 'Sait transmettre un savoir-faire stratégique',
    ],
    [
        'skill_type_id' => 230,
        'level'         => 1,
        'label'         => 'Assure un minimum de limites',
    ],
    [
        'skill_type_id' => 230,
        'level'         => 2,
        'label'         => 'Planifie ses horaires pour éviter la surcharge',
    ],
    [
        'skill_type_id' => 230,
        'level'         => 3,
        'label'         => 'Gère efficacement temps de travail et repos',
    ],
    [
        'skill_type_id' => 230,
        'level'         => 4,
        'label'         => 'Maintient un équilibre solide malgré de fortes responsabilités',
    ],
    [
        'skill_type_id' => 231,
        'level'         => 1,
        'label'         => 'Supporte une pression intellectuelle modérée',
    ],
    [
        'skill_type_id' => 231,
        'level'         => 2,
        'label'         => 'Travaille de façon soutenue sur la durée',
    ],
    [
        'skill_type_id' => 231,
        'level'         => 3,
        'label'         => 'Reste concentré malgré des contraintes fortes',
    ],
    [
        'skill_type_id' => 231,
        'level'         => 4,
        'label'         => 'Maintient une haute performance malgré un stress élevé',
    ],
    [
        'skill_type_id' => 232,
        'level'         => 1,
        'label'         => 'Calme une discussion tendue',
    ],
    [
        'skill_type_id' => 232,
        'level'         => 2,
        'label'         => 'Fait preuve d’empathie vis-à-vis d’un groupe',
    ],
    [
        'skill_type_id' => 232,
        'level'         => 3,
        'label'         => 'Canalise les tensions affectives communes',
    ],
    [
        'skill_type_id' => 232,
        'level'         => 4,
        'label'         => 'Influence positivement le climat émotionnel global',
    ],
    [
        'skill_type_id' => 233,
        'level'         => 1,
        'label'         => 'Découvre différentes disciplines',
    ],
    [
        'skill_type_id' => 233,
        'level'         => 2,
        'label'         => 'Est curieux d’autres champs (arts, sciences…)',
    ],
    [
        'skill_type_id' => 233,
        'level'         => 3,
        'label'         => 'Fait des ponts entre divers domaines',
    ],
    [
        'skill_type_id' => 233,
        'level'      => 4,
        'label'         => 'Manifeste une grande culture transversale',
    ],
    [
        'skill_type_id' => 234,
        'level'         => 1,
        'label'         => 'Tient une posture correcte',
    ],
    [
        'skill_type_id' => 234,
        'level'         => 2,
        'label'         => 'Soigne ses gestes lors des présentations',
    ],
    [
        'skill_type_id' => 234,
        'level'         => 3,
        'label'         => 'Ajuste le contact visuel et l’attitude selon la situation',
    ],
    [
        'skill_type_id' => 234,
        'level'         => 4,
        'label'         => 'Maîtrise parfaitement sa gestuelle pour impacter son public',
    ],
    [
        'skill_type_id' => 235,
        'level'         => 1,
        'label'         => 'Lance de petites initiatives internes',
    ],
    [
        'skill_type_id' => 235,
        'level'         => 2,
        'label'         => 'Identifie des opportunités d’affaires',
    ],
    [
        'skill_type_id' => 235,
        'level'         => 3,
        'label'         => 'Structure un modèle économique pertinent',
    ],
    [
        'skill_type_id' => 235,
        'level'         => 4,
        'label'         => 'Crée et développe des projets innovants sur le marché',
    ],
    [
        'skill_type_id' => 236,
        'level'         => 1,
        'label'         => 'Encourage ses pairs à essayer',
    ],
    [
        'skill_type_id' => 236,
        'level'         => 2,
        'label'         => 'Donne de l’autonomie et de la confiance',
    ],
    [
        'skill_type_id' => 236,
        'level'         => 3,
        'label'         => 'Développe la responsabilité collective',
    ],
    [
        'skill_type_id' => 236,
        'level'         => 4,
        'label'         => 'Fait émerger une équipe auto-dirigée',
    ],
    [
        'skill_type_id' => 237,
        'level'         => 1,
        'label'         => 'Respecte les différences culturelles ou sociales',
    ],
    [
        'skill_type_id' => 237,
        'level'         => 2,
        'label'         => 'Favorise l’inclusion dans le groupe',
    ],
    [
        'skill_type_id' => 237,
        'level'         => 3,
        'label'         => 'Met en place des pratiques anti-discrimination',
    ],
    [
        'skill_type_id' => 237,
        'level'         => 4,
        'label'         => 'Valorise et capitalise sur la richesse multiculturelle',
    ],
    [
        'skill_type_id' => 238,
        'level'         => 1,
        'label'         => 'Reconnaît qu’il ne sait pas tout',
    ],
    [
        'skill_type_id' => 238,
        'level'         => 2,
        'label'         => 'Accepte le feedback sans se vexer',
    ],
    [
        'skill_type_id' => 238,
        'level'         => 3,
        'label'         => 'Laisse la place à d’autres experts',
    ],
    [
        'skill_type_id' => 238,
        'level'         => 4,
        'label'         => 'Apprend en continu et valorise le collectif',
    ],
    [
        'skill_type_id' => 239,
        'level'         => 1,
        'label'         => 'Réagit rapidement à un incident isolé',
    ],
    [
        'skill_type_id' => 239,
        'level'         => 2,
        'label'         => 'Rassemble les infos pour limiter l’impact',
    ],
    [
        'skill_type_id' => 239,
        'level'         => 3,
        'label'         => 'Met en œuvre un plan de contingence efficace',
    ],
    [
        'skill_type_id' => 239,
        'level'         => 4,
        'label'         => 'Pilote et communique sur des crises majeures',
    ],
       
            
            
            
            
        ];

        DB::beginTransaction(); // Begin transaction

        try {
            DB::table('skills')->insert($skills);

            DB::table('skills')->insert($personal_skills);

            DB::commit();
            
            print('Skills inserted successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            print('Error: ' . $e->getMessage());
        }
    
    }
}
