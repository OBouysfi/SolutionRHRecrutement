<?php

namespace App\Helpers;

class StatusHelper
{
    /**
     * Retourne la classe d'icône Bootstrap pour le statut donné.
     *
     * @param int $statusId
     * @return string
     */
    public static function icon(int $statusId): string
    {
        $icons = [
            1 => 'bi-list-task',      // Shortlist
            2 => 'bi-person-gear',      // Évaluation
            3 => 'bi-people',           // Entretien
            4 => 'bi-person-check',     // Retenu
            5 => 'bi-briefcase',        // Embauché
            6 => 'bi-person-x',         // Rejeté
        ];

        return $icons[$statusId] ?? 'bi-list-task';
    }
}
