<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    public function run()
    {
        $templates = [
            [
                'status_id' => 1,
                'name' => 'Confirmation de candidature',
                'subject' => 'Confirmation de candidature',
                'content' => "Bonjour [Nom du candidat],\n\nNous avons bien reçu votre candidature pour le poste de [Nom du poste] chez [Nom de l'entreprise].\nNotre équipe de recrutement va examiner votre profil et vous tiendra informé(e) de la suite du processus.\n\nEn attendant, n'hésitez pas à consulter notre site pour découvrir d'autres opportunités.\n\nCordialement,\n[Nom du recruteur]\n[Nom de l'entreprise]",
                'is_active' => true,
            ],
            [
                'status_id' => 3,
                'name' => 'Convocation à un entretien',
                'subject' => 'Invitation à un entretien – [Nom du poste]',
                'content' => "Bonjour [Nom du candidat],\n\nSuite à l'examen de votre candidature pour le poste de [Nom du poste], nous souhaitons vous convier à un entretien.\n\nDate : [Date de l'entretien]\nHeure : [Heure de l'entretien]\nLieu / Lien visio : [Lieu ou lien Zoom/Teams]\n\nMerci de confirmer votre disponibilité en répondant à cet email.\n\nCordialement,\n[Nom du recruteur]\n[Nom de l'entreprise]",
                'is_active' => true,
            ],
            [
                'status_id' => 2,
                'name' => 'Relance après entretien',
                'subject' => 'Suivi de votre entretien pour [Nom du poste]',
                'content' => "Bonjour [Nom du candidat],\n\nNous vous remercions pour votre temps lors de l’entretien pour le poste de [Nom du poste]. Nous souhaitons vous informer que notre processus de sélection est en cours et nous reviendrons vers vous bientôt.\n\nN'hésitez pas à nous contacter si vous avez des questions.\n\nCordialement,\n[Nom du recruteur]\n[Nom de l'entreprise]",
                'is_active' => true,
            ],
            [
                'status_id' => 6,
                'name' => 'Rejet de candidature',
                'subject' => "Votre candidature pour [Nom du poste] n'a pas été retenue",
                'content' => "Bonjour [Nom du candidat],\n\nNous vous remercions pour votre intérêt pour le poste de [Nom du poste] chez [Nom de l'entreprise]. Après une étude approfondie de votre candidature, nous avons décidé de ne pas donner suite.\n\nNous vous souhaitons plein succès dans vos recherches.\n\nCordialement,\n[Nom du recruteur]\n[Nom de l'entreprise]",
                'is_active' => true,
            ],
            [
                'status_id' => 6,
                'name' => 'Rejet après entretien',
                'subject' => "Suite à votre entretien pour [Nom du poste]",
                'content' => "Bonjour [Nom du candidat],\n\nNous vous remercions pour le temps que vous nous avez accordé lors de l’entretien pour le poste de [Nom du poste]. Après évaluation, nous avons décidé de poursuivre avec d'autres candidats dont les profils correspondent davantage à nos besoins.\n\nNous espérons avoir l’occasion de collaborer à l’avenir.\n\nCordialement,\n[Nom du recruteur]\n[Nom de l'entreprise]",
                'is_active' => true,
            ],
            [
                'status_id' => 5,
                'name' => 'Offre d\'emploi acceptée',
                'subject' => "Félicitations ! Votre offre pour [Nom du poste] a été acceptée",
                'content' => "Bonjour [Nom du candidat],\n\nFélicitations ! Nous sommes ravis de vous accueillir chez [Nom de l'entreprise] pour le poste de [Nom du poste].\n\nVous trouverez en pièce jointe votre contrat ainsi que les informations nécessaires à votre intégration.\n\nN'hésitez pas à nous contacter si vous avez des questions.\n\nCordialement,\n[Nom du recruteur]\n[Nom de l'entreprise]",
                'is_active' => true,
            ],
              [
                'status_id' => 3,
                'name' => 'Convocation à un entretien physique',
                'subject' => "Convocation à un entretien en présentiel – [Nom] [Prénom] - [Nom du poste]",
                'content' => "Bonjour [Prénom],\n\nNous vous invitons à un entretien en présentiel dans le cadre de votre recrutement pour le poste [Nom du poste].\n\nDate : [Date de l'entretien]\nHeure : [Heure de début]\nLieu : [Lieu de l'entretien]\n\nMerci de bien vouloir confirmer votre présence en réponse à cet email.\n\nPour toute question ou difficulté technique, merci de nous écrire à support@humanjobs.ma.\n\nBien cordialement,\nL'équipe Humanjobs.",
                'is_active' => true,
            ],
            [
                'status_id' => 3,
                'name' => 'Convocation à un entretien distanciel',
                'subject' => "Convocation à un entretien en visioconférence – [Nom] [Prénom] - [Nom du poste]",
                'content' => "Bonjour [Prénom],\n\nNous vous invitons à un entretien à distance dans le cadre de votre recrutement pour le poste [Nom du poste].\n\nDate : [Date de l'entretien]\nHeure : [Heure de début]\nLien : [Lien de visioconférence]\n\nMerci de bien vouloir confirmer votre présence en réponse à cet email.\n\nPour toute question ou difficulté technique, merci de nous écrire à support@humanjobs.ma.\n\nBien cordialement,\nL'équipe Humanjobs.",
                'is_active' => true,
            ],
            [
                'status_id' => 3,
                'name' => 'Convocation à un entretien téléphonique',
                'subject' => "Convocation à un entretien téléphonique – [Nom] [Prénom] - [Nom du poste]",
                'content' => "Bonjour [Prénom],\n\nNous vous invitons à un entretien téléphonique dans le cadre de votre recrutement pour le poste [Nom du poste].\n\nDate : [Date de l'entretien]\nHeure : [Heure de début]\n\nMerci de bien vouloir confirmer votre présence en réponse à cet email.\n\nPour toute question ou difficulté technique, merci de nous écrire à support@humanjobs.ma.\n\nBien cordialement,\nL'équipe Humanjobs.",
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::create($template);
        }
    }

}
