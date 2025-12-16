<?php

namespace App\Enums\RolePermission;

use Illuminate\Support\Collection;

class ActionColorEnum
{
    // public const ACCESS = 'access';
    // public const CREATE = 'create';
    // public const EDIT = 'edit';
    // public const PREVIEW = 'preview';
    // public const SHARE = 'share';
    // public const DOWNLOAD = 'download';
    // public const PRINT = 'print';
    // public const EXPORT = 'export';
    // public const LISTING = 'listing';
    // public const UPDATE = 'update';
    // public const DETAIL = 'detail';
    // public const DELETE = 'delete';
    // public const ANNULER = 'annuler';
    // public const SUSPENDRE = 'suspendre';
    // public const CLOTURER = 'cloturer';
    // public const REACTIVER = 'reactiver';
    // public const RECOUVRIR = 'recouvrir';
    // public const SHOW = 'show';
    // public const ADD = 'add';
    // public const SHORTLIST = 'Shortlist';
    // public const EVALUATION = 'Evaluation';
    // public const INTERVIEW = 'Interview';
    // public const TAKEN = 'Taken';
    // public const HIRED = 'Hired';
    // public const REJECTED = 'Rejected';
    // public const SENDEMAIL = 'SendEmail';
    // public const MAKEEVENT = 'MakeEvent';
    // public const SEND = 'send';
    // public const AJOUTER_AU_VIVIER = 'ajouter-au-vivier';
    // public const DESACTIVER_PROFILE = 'desactiver-profile';
    // public const DEQUALIFIER_PROFILE = 'dequalifier-profile';
    // public const ACTIVER_PROFILE = 'activer-profile';
    // public const QUALIFIER_PROFILE = 'qualifier-profile';
    // public const EXPORTER = 'exporter';
    // public const IMPRIMER = 'imprimer';

    // public static function getAll(): Collection
    // {
    //     return collect([
    //         self::ACCESS => '#8BA503',
    //         self::LISTING => '#1dc717',
    //         self::CREATE => '#005dc7',
    //         self::ADD => '#005dc7',
    //         self::AJOUTER_AU_VIVIER => '#005dc7',

    //         self::EDIT => '#7D4FFE',
    //         self::UPDATE => '#7D4FFE',

    //         self::EXPORT => '#606f7d',
    //         self::EXPORTER => '#606f7d',

    //         self::PRINT => '#F6B12D',
    //         self::IMPRIMER => '#F6B12D',

    //         self::SHARE => '#BC632E',

    //         self::DELETE => '#dd2255',
    //         self::ANNULER => '#dd2255',
    //         self::SUSPENDRE => '#dd2255',
    //         self::CLOTURER => '#dd2255',

    //         self::SEND => '#26A69A',
    //         self::SENDEMAIL => '#26A69A',

    //         self::SHOW => '#607D8B',
    //         self::PREVIEW => '#607D8B',
    //         self::DETAIL => '#607D8B',

    //         self::SHORTLIST => '#9C27B0',
    //         self::EVALUATION => '#9C27B0',
    //         self::INTERVIEW => '#9C27B0',
    //         self::TAKEN => '#9C27B0',
    //         self::HIRED => '#4CAF50',
    //         self::REJECTED => '#f44336',

    //         self::MAKEEVENT => '#3F51B5',

    //         self::DESACTIVER_PROFILE => '#795548',
    //         self::DEQUALIFIER_PROFILE => '#795548',
    //         self::ACTIVER_PROFILE => '#4CAF50',
    //         self::QUALIFIER_PROFILE => '#4CAF50',
    //     ]);
    // }

    public const ACCESS = 'Accéder';
    public const CREATE = 'Créer';
    public const EDIT = 'Modifier';
    public const PREVIEW = 'Prévisualiser';
    public const SHARE = 'Partager';
    public const DOWNLOAD = 'Télécharger';
    public const PRINT = 'Imprimer';
    public const EXPORT = 'Exporter';
    public const LISTING = 'Afficher';
    public const DETAIL = 'Voir';
    public const DELETE = 'Supprimer';
    public const ANNULER = 'Annuler';
    public const SUSPENDRE = 'Suspendre';
    public const CLOTURER = 'Clôturer';
    public const REACTIVER = 'Réactiver';
    public const RECOUVRIR = 'Recouvrir';
    public const SHOW = 'Afficher les indicateurs';
    public const SHORTLIST = 'Ajouter à la shortlist';
    public const EVALUATION = 'Évaluer';
    public const INTERVIEW = 'Programmer un entretien';
    public const TAKEN = 'Retenir';
    public const HIRED = 'Embaucher';
    public const REJECTED = 'Rejeter';
    public const SENDEMAIL = 'Envoyer un email';
    public const MAKEEVENT = 'Créer un événement';
    public const SEND = 'Envoyer';
    public const CONSULT = 'Consulter';
    public const INVITE = 'Inviter';
    public const AJOUTER_AU_VIVIER = 'Ajouter au vivier';
    public const DESACTIVER_PROFILE = 'Désactiver';
    public const DEQUALIFIER_PROFILE = 'Déqualifier';
    public const ACTIVER_PROFILE = 'Activer';
    public const QUALIFIER_PROFILE = 'Qualifier';
    public const EXPORTER = 'Aperçu';

    public static function getAll(): Collection
    {
        return collect([
            self::ACCESS => '#4CAF50', // Green, for positive actions
            self::LISTING => '#8BC34A', // Lighter green for displaying listings
            self::CREATE => '#2196F3', // Blue, for creating new items
            self::DOWNLOAD => '#2196F3', // Same blue for downloading actions

            self::AJOUTER_AU_VIVIER => '#3F51B5', // Deep blue for adding to pool
            self::DESACTIVER_PROFILE => '#FF9800', // Orange for deactivating
            self::DEQUALIFIER_PROFILE => '#9C27B0', // Purple for disqualifying
            self::ACTIVER_PROFILE => '#4CAF50', // Green for activating
            self::QUALIFIER_PROFILE => '#4CAF50', // Green for qualifying

            self::EDIT => '#9C27B0', // Purple for editing
            self::EXPORT => '#607D8B', // Grey-blue for export
            self::PRINT => '#FF9800', // Orange for printing

            self::SHARE => '#FF5722', // Deep orange for sharing
            self::DELETE => '#F44336', // Red for deleting
            self::ANNULER => '#F44336', // Red for canceling
            self::SUSPENDRE => '#F44336', // Red for suspending
            self::CLOTURER => '#F44336', // Red for closing
            self::REACTIVER => '#607D8B', // Grey-blue for reactivating
            self::RECOUVRIR => '#9C27B0', // Purple for recovering

            self::SEND => '#26A69A', // Teal for sending
            self::SENDEMAIL => '#26A69A', // Same teal for sending email

            self::SHOW => '#607D8B', // Grey-blue for showing indicators
            self::PREVIEW => '#607D8B', // Grey-blue for preview
            self::DETAIL => '#607D8B', // Grey-blue for details

            self::SHORTLIST => '#9C27B0', // Purple for adding to shortlist
            self::EVALUATION => '#9C27B0', // Purple for evaluation
            self::INTERVIEW => '#9C27B0', // Purple for interview scheduling
            self::TAKEN => '#9C27B0', // Purple for taken actions
            self::HIRED => '#4CAF50', // Green for hired
            self::REJECTED => '#F44336', // Red for rejection

            self::MAKEEVENT => '#3F51B5', // Deep blue for creating events

            self::CONSULT => '#795548', // Brown for consulting
            self::INVITE => '#795548', // Brown for invitations
        ]);
    }

    public static function getColor(string $action): ?string
    {
        $colors = self::getAll();

        return $colors->get($action, '#4CAF50'); // default to "secondary" if action not found
    }
}
