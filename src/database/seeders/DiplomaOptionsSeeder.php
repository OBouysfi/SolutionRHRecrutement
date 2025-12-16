<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiplomaOptionsSeeder extends Seeder
{
    public function run()
    {
        // Here we store the full list as plain text (one option per line).
        // Make sure there are no trailing spaces after each line.
        $diplomaOptionsList = <<<'EOF'
Administration Publique & Politiques Publiques;Administration Territoriale
Administration Publique & Politiques Publiques;Affaires Sociales
Administration Publique & Politiques Publiques;Aménagement du Territoire
Administration Publique & Politiques Publiques;Analyse des Politiques Publiques
Administration Publique & Politiques Publiques;Commande Publique
Administration Publique & Politiques Publiques;Communication Publique
Administration Publique & Politiques Publiques;Contrôle de Gestion Public
Administration Publique & Politiques Publiques;Cyberadministration
Administration Publique & Politiques Publiques;Développement Local
Administration Publique & Politiques Publiques;Finances Publiques
Administration Publique & Politiques Publiques;Gestion de Crise
Administration Publique & Politiques Publiques;Gestion de Projet Public
Administration Publique & Politiques Publiques;Gestion des Collectivités
Administration Publique & Politiques Publiques;Gestion Publique
Administration Publique & Politiques Publiques;Institutions Européennes
Administration Publique & Politiques Publiques;Logistique Humanitaire
Administration Publique & Politiques Publiques;Management Public
Administration Publique & Politiques Publiques;Politique de la Ville
Administration Publique & Politiques Publiques;Politiques Culturelles
Administration Publique & Politiques Publiques;Politiques de l’Emploi
Administration Publique & Politiques Publiques;Politiques de Santé
Administration Publique & Politiques Publiques;Politiques Éducatives
Administration Publique & Politiques Publiques;Relations Internationales
Administration Publique & Politiques Publiques;Sécurité Intérieure
Administration Publique & Politiques Publiques;Sociologie de l’Action Publique
Agriculture & Agroalimentaire;Agriculture Biologique
Agriculture & Agroalimentaire;Agroécologie
Agriculture & Agroalimentaire;Agroéquipement
Agriculture & Agroalimentaire;Agroforesterie
Agriculture & Agroalimentaire;Agronomie
Agriculture & Agroalimentaire;Agrotourisme
Agriculture & Agroalimentaire;Bioénergies
Agriculture & Agroalimentaire;Biotechnologies Végétales
Agriculture & Agroalimentaire;Commercialisation des Produits Agricoles
Agriculture & Agroalimentaire;Développement Rural
Agriculture & Agroalimentaire;Distribution Agroalimentaire
Agriculture & Agroalimentaire;Économie Agricole
Agriculture & Agroalimentaire;Génie des Procédés Alimentaires
Agriculture & Agroalimentaire;Gestion de la Ressource en Eau
Agriculture & Agroalimentaire;Gestion des Exploitations Agricoles
Agriculture & Agroalimentaire;Industries Agroalimentaires
Agriculture & Agroalimentaire;Management de la Chaîne du Froid
Agriculture & Agroalimentaire;Pêche & Aquaculture
Agriculture & Agroalimentaire;Production Animale
Agriculture & Agroalimentaire;Production Végétale
Agriculture & Agroalimentaire;Qualité & Sécurité Alimentaire
Agriculture & Agroalimentaire;Sélection Variétale
Agriculture & Agroalimentaire;Transformation Alimentaire
Agriculture & Agroalimentaire;Viticulture & Œnologie
Agriculture & Agroalimentaire;Zootechnie
Agriculture, Agroalimentaire & Ressources Naturelles ;Agribusiness
Agriculture, Agroalimentaire & Ressources Naturelles ;Agriculture Urbaine
Agriculture, Agroalimentaire & Ressources Naturelles ;Agroclimatologie
Agriculture, Agroalimentaire & Ressources Naturelles ;Agroéquipements Connectés
Agriculture, Agroalimentaire & Ressources Naturelles ;Aquaponie
Agriculture, Agroalimentaire & Ressources Naturelles ;Bioingénierie des Plantes
Agriculture, Agroalimentaire & Ressources Naturelles ;Céréaliculture
Agriculture, Agroalimentaire & Ressources Naturelles ;Conduite d’Élevages Innovants
Agriculture, Agroalimentaire & Ressources Naturelles ;Contrôle Phytosanitaire
Agriculture, Agroalimentaire & Ressources Naturelles ;Économie Agricole Avancée
Agriculture, Agroalimentaire & Ressources Naturelles ;Entomologie Agricole
Agriculture, Agroalimentaire & Ressources Naturelles ;Fermentation Industrielle
Agriculture, Agroalimentaire & Ressources Naturelles ;Gestion Durable des Ressources Halieutiques
Agriculture, Agroalimentaire & Ressources Naturelles ;Gestion Intégrée des Ravageurs
Agriculture, Agroalimentaire & Ressources Naturelles ;Microbiologie des Aliments
Agriculture, Agroalimentaire & Ressources Naturelles ;Pathologie Végétale
Agriculture, Agroalimentaire & Ressources Naturelles ;Permaculture
Agriculture, Agroalimentaire & Ressources Naturelles ;Precision Farming (Agriculture de précision)
Agriculture, Agroalimentaire & Ressources Naturelles ;Production Avicole
Agriculture, Agroalimentaire & Ressources Naturelles ;Protection Intégrée des Cultures
Agriculture, Agroalimentaire & Ressources Naturelles ;Qualité des Sols
Agriculture, Agroalimentaire & Ressources Naturelles ;Sécurité & Traçabilité Alimentaire
Agriculture, Agroalimentaire & Ressources Naturelles ;Semences & Multiplication Végétale
Agriculture, Agroalimentaire & Ressources Naturelles ;Technologies Post-Récolte
Agriculture, Agroalimentaire & Ressources Naturelles ;Transformation Laitière
Architecture & Urbanisme;Acoustique du Bâtiment
Architecture & Urbanisme;Aménagement du Territoire
Architecture & Urbanisme;Architecture Bioclimatique
Architecture & Urbanisme;Architecture Intérieure
Architecture & Urbanisme;Architecture Paramétrique
Architecture & Urbanisme;Architecture Paysagère
Architecture & Urbanisme;Conception Assistée par Ordinateur (CAO) BTP
Architecture & Urbanisme;Construction Durable
Architecture & Urbanisme;Construction en Bois
Architecture & Urbanisme;Design Urbain
Architecture & Urbanisme;Éco-construction
Architecture & Urbanisme;Économie de la Construction
Architecture & Urbanisme;Génie Civil & Construction
Architecture & Urbanisme;Géomatique & Topographie
Architecture & Urbanisme;Gestion de Chantiers
Architecture & Urbanisme;Gestion des Risques Naturels
Architecture & Urbanisme;Ingénierie du Bâtiment
Architecture & Urbanisme;Maîtrise d’Ouvrage
Architecture & Urbanisme;Patrimoine & Restauration
Architecture & Urbanisme;Patrimoine Architectural
Architecture & Urbanisme;Planification Urbaine
Architecture & Urbanisme;Politiques de l’Habitat
Architecture & Urbanisme;Réhabilitation & Rénovation
Architecture & Urbanisme;Transport & Mobilité Urbaine
Architecture & Urbanisme;Urbanisme
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Art Floral
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Broderie Haute Couture
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Calligraphie
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Céramique & Poterie
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Dentelle
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Dorure sur Bois
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Ébénisterie d’Art
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Fabrication de Papier
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Fabrique de Parfum
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Ferronnerie d’Art
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Forge Coutelière
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Gravure
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Horlogerie
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Lutherie
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Maroquinerie de Luxe
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Mosaïque
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Orfèvrerie
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Peinture en Décors
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Reliure d’Art
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Restauration de Meubles Anciens
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Sculpture sur Bois
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Taille de Pierre
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Tapisserie d’Ameublement
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Tissage & Weaving
Artisanat, Métiers d’Art & Savoir-Faire traditionnels;Verrerie & Soufflage de Verre
Arts & Design;Animation 2D/3D
Arts & Design;Art Contemporain
Arts & Design;Art Numérique
Arts & Design;Arts Graphiques
Arts & Design;Arts Plastiques
Arts & Design;Bande Dessinée
Arts & Design;Cinéma & Audiovisuel
Arts & Design;Création Sonore
Arts & Design;Design d’Espace
Arts & Design;Design d’Interaction (UX)
Arts & Design;Design d’Interface (UI)
Arts & Design;Design Industriel
Arts & Design;Design Produit
Arts & Design;Design Textile
Arts & Design;Direction Artistique
Arts & Design;Graphisme Publicitaire
Arts & Design;Histoire de l’Art
Arts & Design;Illustration
Arts & Design;Jeu Vidéo & Game Design
Arts & Design;Mode & Stylisme
Arts & Design;Muséologie
Arts & Design;Peinture
Arts & Design;Photographie
Arts & Design;Scénographie
Arts & Design;Sculpture
Arts, Culture & Patrimoine ;Animation Stop Motion
Arts, Culture & Patrimoine ;Archéologie Sous-Marine
Arts, Culture & Patrimoine ;Architecture d’Intérieur
Arts, Culture & Patrimoine ;Art-thérapie
Arts, Culture & Patrimoine ;Arts du Spectacle Vivant
Arts, Culture & Patrimoine ;Bande Sonore & Sound Design
Arts, Culture & Patrimoine ;Chant Lyrique
Arts, Culture & Patrimoine ;Cirque & Arts du Cirque
Arts, Culture & Patrimoine ;Composition Musicale
Arts, Culture & Patrimoine ;Conception Sonore pour le Cinéma
Arts, Culture & Patrimoine ;Costumier & Scénographie
Arts, Culture & Patrimoine ;Culture Numérique
Arts, Culture & Patrimoine ;Danse Contemporaine
Arts, Culture & Patrimoine ;Écriture de Scénarios
Arts, Culture & Patrimoine ;Études Théâtrales
Arts, Culture & Patrimoine ;Graphisme Éditorial
Arts, Culture & Patrimoine ;Management Culturel
Arts, Culture & Patrimoine ;Marché de l’Art
Arts, Culture & Patrimoine ;Médiation Culturelle
Arts, Culture & Patrimoine ;Musicologie
Arts, Culture & Patrimoine ;Patrimoine Immatériel
Arts, Culture & Patrimoine ;Production Cinématographique
Arts, Culture & Patrimoine ;Réalisation Audiovisuelle
Arts, Culture & Patrimoine ;Restauration d’Oeuvres d’Art
Arts, Culture & Patrimoine ;Techniques du Son
Commerce & Distribution;Achat & Approvisionnement
Commerce & Distribution;Brand Management
Commerce & Distribution;Business Development
Commerce & Distribution;Category Management
Commerce & Distribution;Commerce International
Commerce & Distribution;Digital Merchandising
Commerce & Distribution;Distribution & Retail
Commerce & Distribution;E-Commerce
Commerce & Distribution;Franchise & Réseaux
Commerce & Distribution;Gestion d’Entrepôt
Commerce & Distribution;Gestion de Centre Commercial
Commerce & Distribution;Gestion de Rayons
Commerce & Distribution;Import-Export
Commerce & Distribution;Logistique Commerciale
Commerce & Distribution;Management d’Équipe Commerciale
Commerce & Distribution;Management des Forces de Vente
Commerce & Distribution;Marketing du Luxe
Commerce & Distribution;Merchandising
Commerce & Distribution;Négociation Grands Comptes
Commerce & Distribution;Relation Client & CRM
Commerce & Distribution;Retail Analytics
Commerce & Distribution;Service Après-Vente
Commerce & Distribution;Trade Marketing
Commerce & Distribution;Vente & Négociation
Commerce & Distribution;Vente en Ligne & Marketplace
Droit & Sciences Politiques;Administration Publique
Droit & Sciences Politiques;Comparaison des Systèmes Juridiques
Droit & Sciences Politiques;Criminologie
Droit & Sciences Politiques;Droit Administratif
Droit & Sciences Politiques;Droit Civil
Droit & Sciences Politiques;Droit de l’Environnement
Droit & Sciences Politiques;Droit de la Concurrence
Droit & Sciences Politiques;Droit de la Famille
Droit & Sciences Politiques;Droit de la Propriété Intellectuelle
Droit & Sciences Politiques;Droit des Affaires
Droit & Sciences Politiques;Droit du Numérique
Droit & Sciences Politiques;Droit Fiscal
Droit & Sciences Politiques;Droit Immobilier
Droit & Sciences Politiques;Droit International
Droit & Sciences Politiques;Droit Maritime
Droit & Sciences Politiques;Droit Pénal
Droit & Sciences Politiques;Droit Social
Droit & Sciences Politiques;Études Européennes
Droit & Sciences Politiques;Médiation & Arbitrage
Droit & Sciences Politiques;Philosophie du Droit
Droit & Sciences Politiques;Politique Internationale
Droit & Sciences Politiques;Politiques Publiques
Droit & Sciences Politiques;Procédure Civile
Droit & Sciences Politiques;Procédure Pénale
Droit & Sciences Politiques;Science Politique
Droit, Justice & Sécurité ;Criminologie Clinique
Droit, Justice & Sécurité ;Cyberdroit
Droit, Justice & Sécurité ;Douane & Réglementation
Droit, Justice & Sécurité ;Droit Comparé
Droit, Justice & Sécurité ;Droit de l’Arbitrage International
Droit, Justice & Sécurité ;Droit de la Cybersécurité
Droit, Justice & Sécurité ;Droit de la Santé
Droit, Justice & Sécurité ;Droit des Assurances
Droit, Justice & Sécurité ;Droit des Contrats Internationaux
Droit, Justice & Sécurité ;Droit des Énergies
Droit, Justice & Sécurité ;Droit des Libertés Publiques
Droit, Justice & Sécurité ;Droit des Médias & de la Presse
Droit, Justice & Sécurité ;Droit des Politiques Culturelles
Droit, Justice & Sécurité ;Droit des Produits Financiers
Droit, Justice & Sécurité ;Droit du Commerce Électronique
Droit, Justice & Sécurité ;Droit du Sport
Droit, Justice & Sécurité ;Droit Maritime Avancé
Droit, Justice & Sécurité ;Droit Minier
Droit, Justice & Sécurité ;Droit Pénitentiaire
Droit, Justice & Sécurité ;Police Scientifique
Droit, Justice & Sécurité ;Procédure Administrative Contentieuse
Droit, Justice & Sécurité ;Sécurité Civile
Droit, Justice & Sécurité ;Sécurité Diplomatique
Droit, Justice & Sécurité ;Sécurité Informatique Juridique
Droit, Justice & Sécurité ;Sécurité Privée
Écologie & Environnement;Agroécologie Tropicale
Écologie & Environnement;Agroforesterie Avancée
Écologie & Environnement;Bioindicateurs & Biomonitoring
Écologie & Environnement;Chimie Verte
Écologie & Environnement;Conservation de la Biodiversité
Écologie & Environnement;Développement Durable
Écologie & Environnement;Droit de l’Environnement
Écologie & Environnement;Éco-conception
Écologie & Environnement;Éco-ingénierie
Écologie & Environnement;Écologie des Sols
Écologie & Environnement;Écologie des Zones Humides
Écologie & Environnement;Écologie Paysagère
Écologie & Environnement;Écologie Urbaine
Écologie & Environnement;Économie Circulaire
Écologie & Environnement;Écotourisme
Écologie & Environnement;Écotoxicologie
Écologie & Environnement;Éducation à l’Environnement
Écologie & Environnement;Énergies Marines Renouvelables
Écologie & Environnement;Évaluations d’Impacts Environnementaux
Écologie & Environnement;Gestion de la Ressource en Eau Avancée
Écologie & Environnement;Gestion des Catastrophes Naturelles
Écologie & Environnement;Gestion des Déchets
Écologie & Environnement;Gestion des Espaces Naturels Protégés
Écologie & Environnement;Gouvernance Environnementale
Écologie & Environnement;Pollution Marine
Finance & Comptabilité;Analyse Financière
Finance & Comptabilité;Audit Interne
Finance & Comptabilité;Comptabilité Analytique
Finance & Comptabilité;Comptabilité Bancaire
Finance & Comptabilité;Comptabilité Générale
Finance & Comptabilité;Contrôle de Gestion Sociale
Finance & Comptabilité;Contrôle Financier
Finance & Comptabilité;Contrôle Interne
Finance & Comptabilité;Expertise Comptable
Finance & Comptabilité;Finance Internationale
Finance & Comptabilité;Finance Verte & Responsable
Finance & Comptabilité;Fiscalité d’Entreprise
Finance & Comptabilité;Fusions & Acquisitions
Finance & Comptabilité;Gestion Budgétaire
Finance & Comptabilité;Gestion d’Actifs
Finance & Comptabilité;Gestion de Portefeuille
Finance & Comptabilité;Gestion des Risques Financiers
Finance & Comptabilité;Gestion du Crédit Client
Finance & Comptabilité;Marchés Financiers
Finance & Comptabilité;Normes IFRS
Finance & Comptabilité;Notation Financière
Finance & Comptabilité;Planification Financière
Finance & Comptabilité;Private Equity
Finance & Comptabilité;Recouvrement de Créances
Finance & Comptabilité;Trésorerie
Finance, Assurance & Comptabilité ;Actuariat
Finance, Assurance & Comptabilité ;Analyse Macrofinancière
Finance, Assurance & Comptabilité ;Assurance IARD
Finance, Assurance & Comptabilité ;Assurance Vie
Finance, Assurance & Comptabilité ;Banque d’Investissement
Finance, Assurance & Comptabilité ;Banque Privée
Finance, Assurance & Comptabilité ;Conformité Bancaire
Finance, Assurance & Comptabilité ;Consolidation Comptable
Finance, Assurance & Comptabilité ;Contrôle & Audit Externe
Finance, Assurance & Comptabilité ;Contrôle Légal des Comptes
Finance, Assurance & Comptabilité ;Crédit-Bail & Leasing
Finance, Assurance & Comptabilité ;Crowdfunding & Financement Participatif
Finance, Assurance & Comptabilité ;Évaluation d’Entreprises
Finance, Assurance & Comptabilité ;Finance Islamique
Finance, Assurance & Comptabilité ;Finance Quantitative
Finance, Assurance & Comptabilité ;Finance Responsable (ESG)
Finance, Assurance & Comptabilité ;Gestion de Fortune
Finance, Assurance & Comptabilité ;Gestion de Patrimoine
Finance, Assurance & Comptabilité ;Gestion du Risque de Crédit
Finance, Assurance & Comptabilité ;Gestion du Risque de Taux
Finance, Assurance & Comptabilité ;Ingénierie Financière
Finance, Assurance & Comptabilité ;Microfinance
Finance, Assurance & Comptabilité ;Réglementation Bâle III / IV
Finance, Assurance & Comptabilité ;Stratégie Fiscale Internationale
Finance, Assurance & Comptabilité ;Trading Algorithmique
Histoire & Patrimoine;Anthropologie
Histoire & Patrimoine;Archéo-Anthropologie
Histoire & Patrimoine;Archéologie
Histoire & Patrimoine;Archivistique
Histoire & Patrimoine;Civilisations Orientales
Histoire & Patrimoine;Civilisations Précolombiennes
Histoire & Patrimoine;Conservation & Restauration
Histoire & Patrimoine;Documentation Historique
Histoire & Patrimoine;Ethnologie
Histoire & Patrimoine;Études Méditerranéennes
Histoire & Patrimoine;Généalogie
Histoire & Patrimoine;Histoire Ancienne
Histoire & Patrimoine;Histoire Contemporaine
Histoire & Patrimoine;Histoire de l’Art
Histoire & Patrimoine;Histoire des Religions
Histoire & Patrimoine;Histoire du Livre
Histoire & Patrimoine;Histoire Médiévale
Histoire & Patrimoine;Histoire Moderne
Histoire & Patrimoine;Histoire Urbaine
Histoire & Patrimoine;Historiographie
Histoire & Patrimoine;Muséologie
Histoire & Patrimoine;Patrimoine Culturel
Histoire & Patrimoine;Patrimoine Industriel
Histoire & Patrimoine;Sciences de l’Antiquité
Histoire & Patrimoine;Valorisation du Patrimoine
Hôtellerie, Restauration & Tourisme;Animation Touristique
Hôtellerie, Restauration & Tourisme;Arts de la Table
Hôtellerie, Restauration & Tourisme;Conception de Séjours Thématiques
Hôtellerie, Restauration & Tourisme;Croisières Fluviales
Hôtellerie, Restauration & Tourisme;Cuisine Diététique
Hôtellerie, Restauration & Tourisme;Cuisine du Monde
Hôtellerie, Restauration & Tourisme;Écotourisme Avancé
Hôtellerie, Restauration & Tourisme;Gestion des Événements (MICE)
Hôtellerie, Restauration & Tourisme;Gestion des Ressources en Restauration
Hôtellerie, Restauration & Tourisme;Guide Conférencier
Hôtellerie, Restauration & Tourisme;Hébergements Insolites
Hôtellerie, Restauration & Tourisme;Management de Croisières
Hôtellerie, Restauration & Tourisme;Management Hôtelier International
Hôtellerie, Restauration & Tourisme;Marketing Hôtelier
Hôtellerie, Restauration & Tourisme;Oenotourisme
Hôtellerie, Restauration & Tourisme;Restauration Gastronomique
Hôtellerie, Restauration & Tourisme;Sommellerie
Hôtellerie, Restauration & Tourisme;Street Food & Restauration Rapide
Hôtellerie, Restauration & Tourisme;Tourisme Culturel
Hôtellerie, Restauration & Tourisme;Tourisme d’Affaires
Hôtellerie, Restauration & Tourisme;Tourisme de Luxe
Hôtellerie, Restauration & Tourisme;Tourisme Durable
Hôtellerie, Restauration & Tourisme;Tourisme Santé & Bien-Être
Hôtellerie, Restauration & Tourisme;Tourisme Sportif
Hôtellerie, Restauration & Tourisme;Yield Management Hôtelier
Informatique & Télécommunications;Administration Réseaux
Informatique & Télécommunications;Administration Systèmes
Informatique & Télécommunications;Architecture Logicielle
Informatique & Télécommunications;Bases de Données
Informatique & Télécommunications;Big Data & Analytics
Informatique & Télécommunications;Blockchain & Cryptographie
Informatique & Télécommunications;Cloud Computing
Informatique & Télécommunications;Cybersécurité
Informatique & Télécommunications;Data Science
Informatique & Télécommunications;Développement Back-End
Informatique & Télécommunications;Développement Front-End
Informatique & Télécommunications;Développement Mobile
Informatique & Télécommunications;Développement Web
Informatique & Télécommunications;DevOps
Informatique & Télécommunications;Gestion de Projets Informatiques
Informatique & Télécommunications;Informatique Décisionnelle (BI)
Informatique & Télécommunications;Informatique Embarquée
Informatique & Télécommunications;Informatique Quantique
Informatique & Télécommunications;Intelligence Artificielle
Informatique & Télécommunications;IoT (Internet of Things)
Informatique & Télécommunications;Réalité Virtuelle & Augmentée
Informatique & Télécommunications;Sécurité Informatique Défensive
Informatique & Télécommunications;Sécurité Informatique Offensive
Informatique & Télécommunications;Systèmes d’Exploitation
Informatique & Télécommunications;Télécommunications & 5G
Informatique Avancée & Télécommunications ;6G & Réseaux du Futur
Informatique Avancée & Télécommunications ;Audio DSP (Digital Signal Processing)
Informatique Avancée & Télécommunications ;Calcul Scientifique & HPC
Informatique Avancée & Télécommunications ;Développement AR/VR Avancé
Informatique Avancée & Télécommunications ;Développement de Chatbots
Informatique Avancée & Télécommunications ;Développement de Microservices
Informatique Avancée & Télécommunications ;High Performance Computing (HPC)
Informatique Avancée & Télécommunications ;HPC Cloud
Informatique Avancée & Télécommunications ;Informatique Cognitive
Informatique Avancée & Télécommunications ;Informatique Décisionnelle en Temps Réel
Informatique Avancée & Télécommunications ;Informatique Distribuée
Informatique Avancée & Télécommunications ;Informatique Embarquée Avancée
Informatique Avancée & Télécommunications ;Informatique Forensique
Informatique Avancée & Télécommunications ;Informatique Musicale
Informatique Avancée & Télécommunications ;Ingénierie GPU
Informatique Avancée & Télécommunications ;Programmation Bas-Niveau (Assembleur)
Informatique Avancée & Télécommunications ;Programmation RUST
Informatique Avancée & Télécommunications ;Protocoles Réseau Avancés (SDN)
Informatique Avancée & Télécommunications ;Réseaux de Capteurs
Informatique Avancée & Télécommunications ;Réseaux Défensifs & Segmentaires
Informatique Avancée & Télécommunications ;Sécurité Cloud
Informatique Avancée & Télécommunications ;Systèmes d’Information Géographique (SIG)
Informatique Avancée & Télécommunications ;Télécommunications par Satellite
Informatique Avancée & Télécommunications ;Virtualisation & Conteneurisation
Informatique Avancée & Télécommunications ;Virtualisation Réseau (NFV)
Ingénierie & Industrie;Acoustique & Vibrations
Ingénierie & Industrie;Aéronautique
Ingénierie & Industrie;Aérospatiale
Ingénierie & Industrie;Automatisation & Contrôle
Ingénierie & Industrie;Conception Assistée par Ordinateur (CAO)
Ingénierie & Industrie;Énergies Renouvelables
Ingénierie & Industrie;Ergonomie Industrielle
Ingénierie & Industrie;Génie Chimique
Ingénierie & Industrie;Génie Civil
Ingénierie & Industrie;Génie des Procédés
Ingénierie & Industrie;Génie Électrique
Ingénierie & Industrie;Génie Industriel
Ingénierie & Industrie;Génie Mécanique
Ingénierie & Industrie;Génie Minier
Ingénierie & Industrie;Gestion de la Qualité
Ingénierie & Industrie;Gestion de Production
Ingénierie & Industrie;Hydraulique & Pneumatique
Ingénierie & Industrie;Lean Management
Ingénierie & Industrie;Logistique Industrielle
Ingénierie & Industrie;Maintenance Industrielle
Ingénierie & Industrie;Mécatronique
Ingénierie & Industrie;Plasturgie & Matériaux Composites
Ingénierie & Industrie;Robotique
Ingénierie & Industrie;Sécurité & Prévention des Risques
Ingénierie & Industrie;Soudage & Assemblage
Ingénierie & Technologies Émergentes ;Conception d’Équipements Médicaux
Ingénierie & Technologies Émergentes ;Conception d’Exosquelettes
Ingénierie & Technologies Émergentes ;Conception de Batteries & Stockage d’Énergie
Ingénierie & Technologies Émergentes ;Conception de Systèmes de Prototypage Rapide
Ingénierie & Technologies Émergentes ;Électronique de Puissance
Ingénierie & Technologies Émergentes ;Fabrication Additive (Impression 3D)
Ingénierie & Technologies Émergentes ;Ingénierie Biomécanique
Ingénierie & Technologies Émergentes ;Ingénierie Biomechatronique
Ingénierie & Technologies Émergentes ;Ingénierie Chimique Verte
Ingénierie & Technologies Émergentes ;Ingénierie de la Réalité Mixte
Ingénierie & Technologies Émergentes ;Ingénierie de la Vision Robotique
Ingénierie & Technologies Émergentes ;Ingénierie des Interfaces Cerveau-Machine
Ingénierie & Technologies Émergentes ;Ingénierie des Matériaux Intelligents
Ingénierie & Technologies Émergentes ;Ingénierie des Nanomatériaux
Ingénierie & Technologies Émergentes ;Ingénierie des Procédés Alimentaires
Ingénierie & Technologies Émergentes ;Ingénierie des Réseaux de Chaleur
Ingénierie & Technologies Émergentes ;Ingénierie des Réseaux Électriques Intelligents (Smart Grid)
Ingénierie & Technologies Émergentes ;Ingénierie des Réseaux Ferroviaires
Ingénierie & Technologies Émergentes ;Ingénierie Éolienne
Ingénierie & Technologies Émergentes ;Ingénierie Haptique
Ingénierie & Technologies Émergentes ;Ingénierie Hydroélectrique
Ingénierie & Technologies Émergentes ;Ingénierie Nucléaire Avancée
Ingénierie & Technologies Émergentes ;Ingénierie Photovoltaïque
Ingénierie & Technologies Émergentes ;Ingénierie Polymères Avancés
Ingénierie & Technologies Émergentes ;Ingénierie Subaquatique
Langues, Lettres & Linguistique ;Critique Textuelle
Langues, Lettres & Linguistique ;Didactique des Langues Rares
Langues, Lettres & Linguistique ;Didactique du FLE Avancée
Langues, Lettres & Linguistique ;Écriture Créative (Roman, Nouvelle)
Langues, Lettres & Linguistique ;Édition Digitale
Langues, Lettres & Linguistique ;Histoire de la Langue Française
Langues, Lettres & Linguistique ;Ingénierie Linguistique (NLP)
Langues, Lettres & Linguistique ;Interculturalité & Communication
Langues, Lettres & Linguistique ;Langues Africaines (Swahili, etc.)
Langues, Lettres & Linguistique ;Langues Asiatiques (Chinois, Japonais, Coréen)
Langues, Lettres & Linguistique ;Langues Celtiques
Langues, Lettres & Linguistique ;Langues Indigènes d’Amérique
Langues, Lettres & Linguistique ;Langues Romanes (Occitan, Catalan, etc.)
Langues, Lettres & Linguistique ;Langues Scandinaves
Langues, Lettres & Linguistique ;Langues Sémitiques (Arabe, Hébreu)
Langues, Lettres & Linguistique ;Langues Slaves (Russe, Polonais, etc.)
Langues, Lettres & Linguistique ;Lexicographie Électronique
Langues, Lettres & Linguistique ;Phonétique & Phonologie
Langues, Lettres & Linguistique ;Poétique & Versification
Langues, Lettres & Linguistique ;Pragmatique Linguistique
Langues, Lettres & Linguistique ;Sémiologie
Langues, Lettres & Linguistique ;Stylistique
Langues, Lettres & Linguistique ;Syntaxe Formelle
Langues, Lettres & Linguistique ;Terminologie Spécialisée
Langues, Lettres & Linguistique ;Traductologie
Lettres & Langues;Communication Multilingue
Lettres & Langues;Critique Littéraire
Lettres & Langues;Didactique des Langues
Lettres & Langues;Diplomatie Linguistique
Lettres & Langues;Édition & Publication
Lettres & Langues;Études Anglophones
Lettres & Langues;Études Germaniques
Lettres & Langues;Études Hispaniques
Lettres & Langues;Études Italiennes
Lettres & Langues;Français Langue Étrangère (FLE)
Lettres & Langues;Interprétation de Conférence
Lettres & Langues;Langue des Signes
Lettres & Langues;Langues Étrangères Appliquées
Lettres & Langues;Langues Orientales
Lettres & Langues;Langues Rares
Lettres & Langues;Linguistique
Lettres & Langues;Littérature Comparée
Lettres & Langues;Littérature Française
Lettres & Langues;Littératures Comparées
Lettres & Langues;Orthophonie
Lettres & Langues;Philologie
Lettres & Langues;Poésie & Écriture Créative
Lettres & Langues;Terminologie & Lexicographie
Lettres & Langues;Théorie Littéraire
Lettres & Langues;Traduction & Interprétation
Management & RH;Administration du Personnel
Management & RH;Coaching Professionnel
Management & RH;Dialogue Social
Management & RH;Formation & Développement des Compétences
Management & RH;Gestion de la Diversité
Management & RH;Gestion de la Paie
Management & RH;Gestion des Carrières
Management & RH;Gestion des Talents
Management & RH;Gestion du Changement
Management & RH;Gestion du Stress & Conflits
Management & RH;Gestion du Temps
Management & RH;Gestion Prévisionnelle des Emplois et des Compétences (GPEC)
Management & RH;Health & Safety at Work
Management & RH;Leadership & Coaching
Management & RH;Management d’Équipe
Management & RH;Management de la Performance
Management & RH;Management Interculturel
Management & RH;Management Transversal
Management & RH;Marque Employeur
Management & RH;Organisation & Méthodes
Management & RH;Recrutement & Sélection
Management & RH;Relations Sociales
Management & RH;Relations Syndicales
Management & RH;RSE & Développement Durable
Management & RH;SIRH (Systèmes d’Information RH)
Management, RH & Gestion d’Entreprise ;Accompagnement au Changement
Management, RH & Gestion d’Entreprise ;Coaching d’Équipe
Management, RH & Gestion d’Entreprise ;Conduite du Changement Organisationnel
Management, RH & Gestion d’Entreprise ;Culture d’Entreprise & Valeurs
Management, RH & Gestion d’Entreprise ;Design Organisationnel
Management, RH & Gestion d’Entreprise ;Finance d’Impact
Management, RH & Gestion d’Entreprise ;Gestion Multiculturelle
Management, RH & Gestion d’Entreprise ;Innovation Managériale
Management, RH & Gestion d’Entreprise ;Intelligence Collective
Management, RH & Gestion d’Entreprise ;Lean Startup
Management, RH & Gestion d’Entreprise ;Management Agile
Management, RH & Gestion d’Entreprise ;Management de l’Engagement Collaborateur
Management, RH & Gestion d’Entreprise ;Management de l’Innovation Sociale
Management, RH & Gestion d’Entreprise ;Management de la Diversité Culturelle
Management, RH & Gestion d’Entreprise ;Management de la Performance Sociale
Management, RH & Gestion d’Entreprise ;Management des Organisations Non Lucratives
Management, RH & Gestion d’Entreprise ;Management des Ressources Multiprojets
Management, RH & Gestion d’Entreprise ;Management Équitable
Management, RH & Gestion d’Entreprise ;Management Holacracy
Management, RH & Gestion d’Entreprise ;Management Intergénérationnel
Management, RH & Gestion d’Entreprise ;Négociation et Leadership
Management, RH & Gestion d’Entreprise ;Process Communication
Management, RH & Gestion d’Entreprise ;Responsabilité Sociétale des Entreprises (RSE)
Management, RH & Gestion d’Entreprise ;Sourcing & Acquisition de Talents
Management, RH & Gestion d’Entreprise ;Stratégie & Management d’Alliance
Marketing & Communication;Branding
Marketing & Communication;Communication Digitale
Marketing & Communication;Communication Institutionnelle
Marketing & Communication;Communication Interne
Marketing & Communication;Community Management
Marketing & Communication;Content Marketing
Marketing & Communication;Data Marketing
Marketing & Communication;Design Thinking
Marketing & Communication;Études de Marché
Marketing & Communication;Événementiel
Marketing & Communication;Growth Hacking
Marketing & Communication;Influence Marketing
Marketing & Communication;Marketing B2B
Marketing & Communication;Marketing B2C
Marketing & Communication;Marketing Opérationnel
Marketing & Communication;Marketing Sensoriel
Marketing & Communication;Marketing Stratégique
Marketing & Communication;Publicité & Création
Marketing & Communication;Relation Presse
Marketing & Communication;Relations Publiques
Marketing & Communication;SEO & SEA
Marketing & Communication;Social Media Management
Marketing & Communication;Storytelling
Marketing & Communication;Stratégie d’Influence
Marketing & Communication;Webmarketing
Marketing, Communication & Digital ;Commerce Conversationnel
Marketing, Communication & Digital ;Communication de Crise
Marketing, Communication & Digital ;Communication de Marque Employeur
Marketing, Communication & Digital ;Communication Politique
Marketing, Communication & Digital ;Community Building
Marketing, Communication & Digital ;Copywriting
Marketing, Communication & Digital ;Email Marketing
Marketing, Communication & Digital ;Expérience Client (CX)
Marketing, Communication & Digital ;Gamification Marketing
Marketing, Communication & Digital ;Growth Analytics
Marketing, Communication & Digital ;Inbound Marketing
Marketing, Communication & Digital ;Marketing Automation
Marketing, Communication & Digital ;Marketing d’Influence Avancée
Marketing, Communication & Digital ;Marketing Émotionnel
Marketing, Communication & Digital ;Marketing Expérientiel
Marketing, Communication & Digital ;Marketing Relationnel
Marketing, Communication & Digital ;Merchandising Digital
Marketing, Communication & Digital ;Mobile Marketing
Marketing, Communication & Digital ;Neuromarketing
Marketing, Communication & Digital ;Programmatic Advertising
Marketing, Communication & Digital ;Social Selling
Marketing, Communication & Digital ;Stratégie de Contenu Vidéo
Marketing, Communication & Digital ;Stratégie Omnicanale
Marketing, Communication & Digital ;UX Writing
Marketing, Communication & Digital ;Web Analytics Avancé
Mathématiques & Statistiques;Algèbre
Mathématiques & Statistiques;Analyse Fractale
Mathématiques & Statistiques;Analyse Mathématique
Mathématiques & Statistiques;Analyse Numérique
Mathématiques & Statistiques;Biostatistiques
Mathématiques & Statistiques;Calcul Formel
Mathématiques & Statistiques;Cryptographie Mathématique
Mathématiques & Statistiques;Équations Différentielles
Mathématiques & Statistiques;Géométrie
Mathématiques & Statistiques;Géostatistiques
Mathématiques & Statistiques;Logique Mathématique
Mathématiques & Statistiques;Mathématiques Appliquées
Mathématiques & Statistiques;Mathématiques de la Cryptologie Post-quantique
Mathématiques & Statistiques;Mathématiques Financières
Mathématiques & Statistiques;Modélisation Mathématique
Mathématiques & Statistiques;Optimisation Combinatoire
Mathématiques & Statistiques;Probabilités
Mathématiques & Statistiques;Recherche Opérationnelle
Mathématiques & Statistiques;Statistiques
Mathématiques & Statistiques;Statistiques de la Santé
Mathématiques & Statistiques;Statistiques Économiques
Mathématiques & Statistiques;Statistiques Sociales
Mathématiques & Statistiques;Théorie des Graphes
Mathématiques & Statistiques;Théorie du Contrôle
Mathématiques & Statistiques;Topologie
Paramédical & Soins;Aide Médico-Psychologique
Paramédical & Soins;Aphasiologie & Rééducation
Paramédical & Soins;Assistance Médicale en Vol
Paramédical & Soins;Assistance Médicale Humanitaire
Paramédical & Soins;Audioprothèse
Paramédical & Soins;Conseiller en Lactation
Paramédical & Soins;Cryothérapie
Paramédical & Soins;Diététique & Nutrition Thérapeutique
Paramédical & Soins;Équithérapie
Paramédical & Soins;Hygiène Hospitalière
Paramédical & Soins;Hypnothérapie
Paramédical & Soins;Infirmier Anesthésiste
Paramédical & Soins;Orthopédie (Orthèses & Prothèses)
Paramédical & Soins;Orthoptie
Paramédical & Soins;Ostéopathie
Paramédical & Soins;Podologie
Paramédical & Soins;Psychomotricité
Paramédical & Soins;Réflexologie
Paramédical & Soins;Santé Mentale en Milieu Pénitentiaire
Paramédical & Soins;Sociologie du Handicap
Paramédical & Soins;Soins Intensifs Infirmiers
Paramédical & Soins;Soins Palliatifs Infirmiers
Paramédical & Soins;Soins Préhospitaliers
Paramédical & Soins;Somatothérapie
Paramédical & Soins;Techniques de Soin en Gériatrie
Pédagogie, Formation & Éducation;Accompagnement des Apprentis
Pédagogie, Formation & Éducation;Administration Pédagogique
Pédagogie, Formation & Éducation;Conception de Modules E-Learning
Pédagogie, Formation & Éducation;Conseiller Principal d’Éducation
Pédagogie, Formation & Éducation;Développement Professionnel Enseignant
Pédagogie, Formation & Éducation;Didactique Disciplinaires
Pédagogie, Formation & Éducation;Éducation à la Citoyenneté
Pédagogie, Formation & Éducation;Éducation Inclusive
Pédagogie, Formation & Éducation;Éducation Populaire
Pédagogie, Formation & Éducation;Éducation Spécialisée (SEGPA, ULIS)
Pédagogie, Formation & Éducation;Éducation Thérapeutique
Pédagogie, Formation & Éducation;Enseignement Bilingue
Pédagogie, Formation & Éducation;Évaluation des Apprentissages
Pédagogie, Formation & Éducation;Formation Continue pour Adultes
Pédagogie, Formation & Éducation;Formation de Formateurs
Pédagogie, Formation & Éducation;Formation Professionnelle
Pédagogie, Formation & Éducation;Gestion de Classe
Pédagogie, Formation & Éducation;Instruction à Domicile
Pédagogie, Formation & Éducation;Neuroéducation
Pédagogie, Formation & Éducation;Orthodidaxie
Pédagogie, Formation & Éducation;Orthopédagogie
Pédagogie, Formation & Éducation;Pédagogie Freinet
Pédagogie, Formation & Éducation;Pédagogie Montessori
Pédagogie, Formation & Éducation;Pédagogie Numérique
Pédagogie, Formation & Éducation;Tutorat & Mentorat
Santé & Médecine;Anesthésie-Réanimation
Santé & Médecine;Cardiologie
Santé & Médecine;Chirurgie
Santé & Médecine;Dermatologie
Santé & Médecine;Ergothérapie
Santé & Médecine;Gastro-entérologie
Santé & Médecine;Gynécologie-Obstétrique
Santé & Médecine;Kinésithérapie
Santé & Médecine;Médecine du Sport
Santé & Médecine;Médecine du Travail
Santé & Médecine;Médecine Générale
Santé & Médecine;Médecine Légale
Santé & Médecine;Neurologie
Santé & Médecine;Odontologie
Santé & Médecine;Oncologie
Santé & Médecine;Ophtalmologie
Santé & Médecine;Orthophonie
Santé & Médecine;Oto-rhino-laryngologie (ORL)
Santé & Médecine;Pédiatrie
Santé & Médecine;Pharmacie
Santé & Médecine;Psychiatrie
Santé & Médecine;Radiologie
Santé & Médecine;Recherche Biomédicale
Santé & Médecine;Rhumatologie
Santé & Médecine;Sage-Femme
Sciences de la Santé & Recherche Médicale ;Addictologie
Sciences de la Santé & Recherche Médicale ;Bioéthique
Sciences de la Santé & Recherche Médicale ;Diabétologie
Sciences de la Santé & Recherche Médicale ;Endocrinologie
Sciences de la Santé & Recherche Médicale ;Épidémiologie Génétique
Sciences de la Santé & Recherche Médicale ;Génomique Médicale
Sciences de la Santé & Recherche Médicale ;Gériatrie
Sciences de la Santé & Recherche Médicale ;Hématologie
Sciences de la Santé & Recherche Médicale ;Immuno-Oncologie
Sciences de la Santé & Recherche Médicale ;Informatique Médicale
Sciences de la Santé & Recherche Médicale ;Ingénierie Tissulaire
Sciences de la Santé & Recherche Médicale ;Médecine Aérospatiale
Sciences de la Santé & Recherche Médicale ;Médecine d’Urgence
Sciences de la Santé & Recherche Médicale ;Médecine de Précision
Sciences de la Santé & Recherche Médicale ;Médecine Nucléaire
Sciences de la Santé & Recherche Médicale ;Médecine Palliative
Sciences de la Santé & Recherche Médicale ;Médecine Personnalisée
Sciences de la Santé & Recherche Médicale ;Médecine Physique & Réadaptation
Sciences de la Santé & Recherche Médicale ;Médecine Régénérative
Sciences de la Santé & Recherche Médicale ;Médecine Tropicale
Sciences de la Santé & Recherche Médicale ;Pharmacologie Clinique
Sciences de la Santé & Recherche Médicale ;Psychosomatique
Sciences de la Santé & Recherche Médicale ;Radiothérapie
Sciences de la Santé & Recherche Médicale ;Santé Publique Internationale
Sciences de la Santé & Recherche Médicale ;Thérapie Cellulaire & Génique
Sciences de la Terre & Espace;Astrobiologie
Sciences de la Terre & Espace;Astronomie Infrarouge
Sciences de la Terre & Espace;Astronomie Observatoire
Sciences de la Terre & Espace;Astroparticules
Sciences de la Terre & Espace;Cosmologie
Sciences de la Terre & Espace;Cryosphère
Sciences de la Terre & Espace;Exoplanétologie
Sciences de la Terre & Espace;Géochronologie
Sciences de la Terre & Espace;Géodésie
Sciences de la Terre & Espace;Géographie Littorale
Sciences de la Terre & Espace;Géographie Physique
Sciences de la Terre & Espace;Géomorphologie
Sciences de la Terre & Espace;Géotechnique
Sciences de la Terre & Espace;Heliosismologie
Sciences de la Terre & Espace;Hydrographie
Sciences de la Terre & Espace;Instrumentation Astronomique
Sciences de la Terre & Espace;Météorologie Spatiale
Sciences de la Terre & Espace;Océanographie Physique Avancée
Sciences de la Terre & Espace;Planétologie
Sciences de la Terre & Espace;Science des Pollutions Atmosphériques
Sciences de la Terre & Espace;Sémiotique Géographique
Sciences de la Terre & Espace;Sismologie
Sciences de la Terre & Espace;Spectroscopie Astronomique
Sciences de la Terre & Espace;Télédétection
Sciences de la Terre & Espace;Vulcanologie
Sciences de la Vie & de la Terre;Agroécologie
Sciences de la Vie & de la Terre;Agronomie
Sciences de la Vie & de la Terre;Bio-informatique
Sciences de la Vie & de la Terre;Biologie Cellulaire
Sciences de la Vie & de la Terre;Biologie Marine
Sciences de la Vie & de la Terre;Biologie Moléculaire
Sciences de la Vie & de la Terre;Biotechnologies
Sciences de la Vie & de la Terre;Botanique
Sciences de la Vie & de la Terre;Climatologie
Sciences de la Vie & de la Terre;Écologie
Sciences de la Vie & de la Terre;Évolution & Paléontologie
Sciences de la Vie & de la Terre;Génétique
Sciences de la Vie & de la Terre;Génie Biologique
Sciences de la Vie & de la Terre;Géochimie
Sciences de la Vie & de la Terre;Géologie
Sciences de la Vie & de la Terre;Géophysique
Sciences de la Vie & de la Terre;Immunologie
Sciences de la Vie & de la Terre;Microbiologie
Sciences de la Vie & de la Terre;Neurosciences
Sciences de la Vie & de la Terre;Océanographie
Sciences de la Vie & de la Terre;Phytopathologie
Sciences de la Vie & de la Terre;Sciences de la Terre
Sciences de la Vie & de la Terre;Toxicologie
Sciences de la Vie & de la Terre;Vétérinaire (sciences animales)
Sciences de la Vie & de la Terre;Zoologie
Sciences Économiques & Gestion;Banque & Assurance
Sciences Économiques & Gestion;Commerce International
Sciences Économiques & Gestion;Comptabilité & Audit
Sciences Économiques & Gestion;Contrôle de Gestion
Sciences Économiques & Gestion;Économétrie
Sciences Économiques & Gestion;Économie Comportementale
Sciences Économiques & Gestion;Économie du Développement
Sciences Économiques & Gestion;Économie Générale
Sciences Économiques & Gestion;Économie Internationale
Sciences Économiques & Gestion;Économie Publique
Sciences Économiques & Gestion;Entrepreneuriat
Sciences Économiques & Gestion;Finance d’Entreprise
Sciences Économiques & Gestion;Finance de Marché
Sciences Économiques & Gestion;Fiscalité
Sciences Économiques & Gestion;Gestion de Projets
Sciences Économiques & Gestion;Gestion des Conflits
Sciences Économiques & Gestion;Gestion des Ressources Humaines
Sciences Économiques & Gestion;Macroéconomie
Sciences Économiques & Gestion;Management de l’Innovation
Sciences Économiques & Gestion;Management des Systèmes d’Information
Sciences Économiques & Gestion;Management Stratégique
Sciences Économiques & Gestion;Marketing
Sciences Économiques & Gestion;Microéconomie
Sciences Économiques & Gestion;Recherche en Sciences de Gestion
Sciences Économiques & Gestion;Supply Chain Management
Sciences Humaines & Sociales ;Anthropologie de la Religion
Sciences Humaines & Sociales ;Anthropologie du Genre
Sciences Humaines & Sociales ;Anthropologie Médicale
Sciences Humaines & Sociales ;Anthropologie Numérique
Sciences Humaines & Sociales ;Cognition Animale
Sciences Humaines & Sociales ;Coopération Internationale
Sciences Humaines & Sociales ;Éthique & Philosophie Politique
Sciences Humaines & Sociales ;Études Postcoloniales
Sciences Humaines & Sociales ;Géographie Sociale
Sciences Humaines & Sociales ;Histoire de la Pensée Économique
Sciences Humaines & Sociales ;Philanthropie & Mécénat
Sciences Humaines & Sociales ;Philosophie Analytique
Sciences Humaines & Sociales ;Psychohistoire
Sciences Humaines & Sociales ;Psychologie du Travail
Sciences Humaines & Sociales ;Psychologie Évolutive
Sciences Humaines & Sociales ;Psychologie Expérimentale
Sciences Humaines & Sociales ;Religions Comparées
Sciences Humaines & Sociales ;Sciences de la Consommation
Sciences Humaines & Sociales ;Sciences des Conflits
Sciences Humaines & Sociales ;Sociolinguistique
Sciences Humaines & Sociales ;Sociologie de la Communication
Sciences Humaines & Sociales ;Sociologie de la Mode
Sciences Humaines & Sociales ;Sociologie des Médias
Sciences Humaines & Sociales ;Sociologie des Organisations
Sciences Humaines & Sociales ;Sociologie Politique
Sciences Humaines & Sociales;Anthropologie Sociale
Sciences Humaines & Sociales;Criminologie
Sciences Humaines & Sociales;Démographie
Sciences Humaines & Sociales;Ergonomie Cognitive
Sciences Humaines & Sociales;Ethnologie
Sciences Humaines & Sociales;Études de Genre
Sciences Humaines & Sociales;Géographie Humaine
Sciences Humaines & Sociales;Handicap & Inclusion
Sciences Humaines & Sociales;Médiation Familiale
Sciences Humaines & Sociales;Neuropsychologie
Sciences Humaines & Sociales;Philosophie
Sciences Humaines & Sociales;Politiques Sociales
Sciences Humaines & Sociales;Psychologie Clinique
Sciences Humaines & Sociales;Psychologie du Développement
Sciences Humaines & Sociales;Psychologie du Sport
Sciences Humaines & Sociales;Psychologie Sociale
Sciences Humaines & Sociales;Psychopédagogie
Sciences Humaines & Sociales;Sciences Cognitives
Sciences Humaines & Sociales;Sciences de l’Éducation
Sciences Humaines & Sociales;Sciences de la Famille
Sciences Humaines & Sociales;Sciences de la Religion
Sciences Humaines & Sociales;Sociologie
Sciences Humaines & Sociales;Sociologie du Travail
Sciences Humaines & Sociales;Sociologie Rurale
Sciences Humaines & Sociales;Sociologie Urbaine
Sciences Physiques & Chimie;Astrophysique
Sciences Physiques & Chimie;Chimie Analytique
Sciences Physiques & Chimie;Chimie des Matériaux
Sciences Physiques & Chimie;Chimie des Polymères
Sciences Physiques & Chimie;Chimie Industrielle
Sciences Physiques & Chimie;Chimie Minérale
Sciences Physiques & Chimie;Chimie Organique
Sciences Physiques & Chimie;Chimie Physique
Sciences Physiques & Chimie;Cosmétologie
Sciences Physiques & Chimie;Cristallographie
Sciences Physiques & Chimie;Electrochimie
Sciences Physiques & Chimie;Métallurgie
Sciences Physiques & Chimie;Optique & Photonique
Sciences Physiques & Chimie;Physico-Chimie des Interfaces
Sciences Physiques & Chimie;Physique Atomique
Sciences Physiques & Chimie;Physique de l’État Solide
Sciences Physiques & Chimie;Physique des Lasers
Sciences Physiques & Chimie;Physique des Particules
Sciences Physiques & Chimie;Physique Fondamentale
Sciences Physiques & Chimie;Physique Médicale
Sciences Physiques & Chimie;Physique Nucléaire
Sciences Physiques & Chimie;Physique Statistique
Sciences Physiques & Chimie;Radiochimie
Sciences Physiques & Chimie;Spectrométrie
Sciences Physiques & Chimie;Thermodynamique
Sécurité, Défense & Services d’Urgence;Communication de Crise Sécuritaire
Sécurité, Défense & Services d’Urgence;Cyberdéfense
Sécurité, Défense & Services d’Urgence;Défense Spatiale
Sécurité, Défense & Services d’Urgence;Diplomatie Préventive
Sécurité, Défense & Services d’Urgence;Douanes & Contrôle Frontières
Sécurité, Défense & Services d’Urgence;Droit International Humanitaire
Sécurité, Défense & Services d’Urgence;Drone & Robotique de Défense
Sécurité, Défense & Services d’Urgence;Géopolitique de la Défense
Sécurité, Défense & Services d’Urgence;Gestion de Crise & Plan ORSEC
Sécurité, Défense & Services d’Urgence;Gestion des Risques Terroristes
Sécurité, Défense & Services d’Urgence;Logistique Militaire
Sécurité, Défense & Services d’Urgence;Maintien de l’Ordre
Sécurité, Défense & Services d’Urgence;Missions de Maintien de la Paix
Sécurité, Défense & Services d’Urgence;NRBC (Nucléaire, Radiologique, Biologique, Chimique)
Sécurité, Défense & Services d’Urgence;Police Technique et Scientifique
Sécurité, Défense & Services d’Urgence;Protection des Hautes Personnalités
Sécurité, Défense & Services d’Urgence;Psychologie du Policier
Sécurité, Défense & Services d’Urgence;Renseignement et Analyse Stratégique
Sécurité, Défense & Services d’Urgence;Sapeurs-Pompiers Avancés
Sécurité, Défense & Services d’Urgence;Sécurité Aérienne
Sécurité, Défense & Services d’Urgence;Sécurité Civile Avancée
Sécurité, Défense & Services d’Urgence;Sécurité Hémisphérique
Sécurité, Défense & Services d’Urgence;Sécurité Incendie
Sécurité, Défense & Services d’Urgence;Sécurité Maritime
Sécurité, Défense & Services d’Urgence;Stratégie Militaire
Sport, Bien-être & Loisirs;Activités de Montagne & Outdoor
Sport, Bien-être & Loisirs;Activités Équestres
Sport, Bien-être & Loisirs;Activités Nautiques (Voile, Surf, etc.)
Sport, Bien-être & Loisirs;Arts Martiaux & Sports de Combat
Sport, Bien-être & Loisirs;Balnéothérapie
Sport, Bien-être & Loisirs;Biorhythmes & Performance
Sport, Bien-être & Loisirs;Coaching Mental
Sport, Bien-être & Loisirs;CrossFit & Functional Training
Sport, Bien-être & Loisirs;Danse Sportive
Sport, Bien-être & Loisirs;Diététique Sportive
Sport, Bien-être & Loisirs;Direction de Centre de Remise en Forme
Sport, Bien-être & Loisirs;E-Sport Management
Sport, Bien-être & Loisirs;Fitness & Remise en Forme
Sport, Bien-être & Loisirs;Gestion d’Événements de Loisirs
Sport, Bien-être & Loisirs;Management des Loisirs
Sport, Bien-être & Loisirs;Naturopathie
Sport, Bien-être & Loisirs;Personal Branding Sportif
Sport, Bien-être & Loisirs;Pilates
Sport, Bien-être & Loisirs;Relaxation & Sophrologie
Sport, Bien-être & Loisirs;Sport Adapté & Handicap Avancé
Sport, Bien-être & Loisirs;Sport Entreprise & Team Building
Sport, Bien-être & Loisirs;Sports d’Hiver
Sport, Bien-être & Loisirs;Sports Extrêmes
Sport, Bien-être & Loisirs;Thalassothérapie
Sport, Bien-être & Loisirs;Yoga & Méditation
Sports & Activités Physiques;Activités Aquatiques
Sports & Activités Physiques;Activités de Plein Air
Sports & Activités Physiques;Arbitrage & Officiating
Sports & Activités Physiques;Biomécanique du Sport
Sports & Activités Physiques;Coaching Sportif
Sports & Activités Physiques;Communication Sportive
Sports & Activités Physiques;E-sport & Compétition
Sports & Activités Physiques;Éducation Physique et Sportive
Sports & Activités Physiques;Entraînement Sportif
Sports & Activités Physiques;Gestion d’Installations Sportives
Sports & Activités Physiques;Gestion de Club
Sports & Activités Physiques;Journalisme Sportif
Sports & Activités Physiques;Kinésiologie
Sports & Activités Physiques;Management du Sport
Sports & Activités Physiques;Marketing Sportif
Sports & Activités Physiques;Nutrition Sportive
Sports & Activités Physiques;Organisation d’Événements Sportifs
Sports & Activités Physiques;Préparation Physique
Sports & Activités Physiques;Psychologie du Sport
Sports & Activités Physiques;Réathlétisation
Sports & Activités Physiques;Sciences du Mouvement Humain
Sports & Activités Physiques;Socio-économie du Sport
Sports & Activités Physiques;Sport Adapté & Handicap
Sports & Activités Physiques;Sport de Haut Niveau
Sports & Activités Physiques;Sport Santé
Transport, Logistique & Supply Chain;Achats & Approvisionnements Avancés
Transport, Logistique & Supply Chain;Chaîne du Froid & Réfrigération
Transport, Logistique & Supply Chain;Commissionnaire de Transport
Transport, Logistique & Supply Chain;Contrôle Qualité en Logistique
Transport, Logistique & Supply Chain;Distribution Omnicanale
Transport, Logistique & Supply Chain;Douane & Transit
Transport, Logistique & Supply Chain;ERP Logistique
Transport, Logistique & Supply Chain;Gestion de Flottes & Parc Véhicules
Transport, Logistique & Supply Chain;Gestion de la Demande (Demand Planning)
Transport, Logistique & Supply Chain;Gestion des Opérations de Transport
Transport, Logistique & Supply Chain;Gestion des Plates-formes Logistiques
Transport, Logistique & Supply Chain;Green Supply Chain
Transport, Logistique & Supply Chain;Logistique Hospitalière
Transport, Logistique & Supply Chain;Logistique Humanitaire Avancée
Transport, Logistique & Supply Chain;Logistique Internationale
Transport, Logistique & Supply Chain;Logistique Urbaine
Transport, Logistique & Supply Chain;Planification Logistique
Transport, Logistique & Supply Chain;Reverse Logistics
Transport, Logistique & Supply Chain;Stock Management Avancé
Transport, Logistique & Supply Chain;Supply Chain 4.0
Transport, Logistique & Supply Chain;Techniques d’Emballage & Packaging
Transport, Logistique & Supply Chain;Transport Aérien
Transport, Logistique & Supply Chain;Transport Ferroviaire
Transport, Logistique & Supply Chain;Transport Maritime
Transport, Logistique & Supply Chain;Transport Routier
EOF;

        // Convert each non-empty line into an array with 'label' key.
        $lines = array_filter(array_map('trim', explode("\n", $diplomaOptionsList)));
        $diplomaOptions = array_map(fn($line) => ['label' => $line], $lines);

        // Insert all at once.
        DB::table('diploma_options')->insert($diplomaOptions);
    }
}

