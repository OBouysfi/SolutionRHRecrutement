<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;

class NewProfessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $professions = [
                    
        // 🖥️ IT (Development, AI, Networks, Cybersecurity)
        ['label' => 'Développeur Web'],
        ['label' => 'Développeur Mobile'],
        ['label' => 'Développeur Front-End'],
        ['label' => 'Développeur Back-End'],
        ['label' => 'Développeur Full Stack'],
        ['label' => 'Ingénieur IA'],
        ['label' => 'Data Scientist'],
        ['label' => 'Data Analyst'],
        ['label' => 'Ingénieur en Machine Learning'],
        ['label' => 'Architecte Cloud'],
        ['label' => 'DevOps Engineer'],
        ['label' => 'Ingénieur Réseaux'],
        ['label' => 'Administrateur Systèmes'],
        ['label' => 'Administrateur Base de Données'],
        ['label' => 'Spécialiste en Cybersécurité'],
        ['label' => 'Pentester'],
        ['label' => 'Responsable Sécurité Informatique'],
        ['label' => 'Chef de projet informatique'],
        ['label' => 'Ingénieur en génie logiciel'],
        ['label' => 'Technicien support IT'],
        ['label' => 'UX/UI Designer'],
        ['label' => 'Testeur QA'],
        ['label' => 'Scrum Master'],
        ['label' => 'Consultant ERP'],
        ['label' => 'Analyste Fonctionnel'],
        ['label' => 'Développeur Python/Java/JS/PHP/etc.'],

        // 📣 Marketing
        ['label' => 'Responsable Marketing'],
        ['label' => 'Chargé de Communication'],
        ['label' => 'Community Manager'],
        ['label' => 'Chef de Produit'],
        ['label' => 'Growth Hacker'],
        ['label' => 'Responsable SEO/SEA'],
        ['label' => 'Spécialiste en Marketing Digital'],
        ['label' => 'Responsable e-commerce'],
        ['label' => 'Content Manager'],
        ['label' => 'Rédacteur Web'],
        ['label' => 'Graphiste'],
        ['label' => 'Webdesigner'],
        ['label' => 'Chargé d’études marketing'],
        ['label' => 'Brand Manager'],
        ['label' => 'Traffic Manager'],
        ['label' => 'Responsable CRM'],
        ['label' => 'Directeur Marketing'],

        // 🧑‍💼 Management / RH
        ['label' => 'Responsable RH'],
        ['label' => 'Chargé de recrutement'],
        ['label' => 'Responsable formation'],
        ['label' => 'Gestionnaire de paie'],
        ['label' => 'HR Business Partner'],
        ['label' => 'Directeur des Ressources Humaines'],
        ['label' => 'Responsable administratif'],
        ['label' => 'Assistant RH'],
        ['label' => 'Chef de projet'],
        ['label' => 'Responsable d’équipe'],
        ['label' => 'Office Manager'],
        ['label' => 'Coach Agile'],
        ['label' => 'Consultant en transformation digitale'],
        ['label' => 'Responsable Qualité'],
        ['label' => 'Responsable de site'],

        // 🛡️ Assurance (Insurance)
        ['label' => 'Conseiller en assurance'],
        ['label' => 'Chargé de clientèle assurance'],
        ['label' => 'Agent général d’assurance'],
        ['label' => 'Gestionnaire de sinistres'],
        ['label' => 'Actuaire'],
        ['label' => 'Souscripteur'],
        ['label' => 'Courtier en assurance'],
        ['label' => 'Chargé de recouvrement'],
        ['label' => 'Expert en indemnisation'],
        ['label' => 'Responsable réseau d’assurance'],
        ['label' => 'Analyste risques assurance'],

        // 💰 Finance
        ['label' => 'Comptable'],
        ['label' => 'Chef comptable'],
        ['label' => 'Auditeur financier'],
        ['label' => 'Contrôleur de gestion'],
        ['label' => 'Analyste financier'],
        ['label' => 'Consultant fiscal'],
        ['label' => 'Trésorier'],
        ['label' => 'Responsable comptabilité fournisseurs'],
        ['label' => 'Responsable comptabilité clients'],
        ['label' => 'Directeur Financier'],
        ['label' => 'Conseiller fiscal'],
        ['label' => 'Analyste de crédit'],

        // 🏛️ Secteur Public
        ['label' => 'Fonctionnaire d’État'],
        ['label' => 'Contrôleur des finances publiques'],
        ['label' => 'Inspecteur du travail'],
        ['label' => 'Administrateur territorial'],
        ['label' => 'Agent communal'],
        ['label' => 'Agent administratif'],
        ['label' => 'Technicien des services publics'],
        ['label' => 'Enseignant fonction publique'],
        ['label' => 'Responsable des affaires sociales'],
        ['label' => 'Inspecteur des douanes'],
        ['label' => 'Secrétaire général de commune'],
        ['label' => 'Chef de division'],

        // 🏦 Banque
        ['label' => 'Chargé de clientèle bancaire'],
        ['label' => 'Conseiller financier'],
        ['label' => 'Gestionnaire de portefeuille'],
        ['label' => 'Analyste de crédit'],
        ['label' => 'Chargé d’accueil en agence'],
        ['label' => 'Directeur d’agence bancaire'],
        ['label' => 'Contrôleur conformité bancaire'],
        ['label' => 'Auditeur bancaire'],
        ['label' => 'Spécialiste produits bancaires'],
        ['label' => 'Trader / Opérateur de marché'],
        ['label' => 'Responsable risques bancaires'],
        ['label' => 'Back-office bancaire'],

        ];



        foreach ($professions as $profession) {
            Profession::create($profession);
        }
    }
}
