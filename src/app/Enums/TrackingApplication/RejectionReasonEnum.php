<?php

namespace App\Enums\TrackingApplication;

use Illuminate\Support\Collection;

class RejectionReasonEnum 
{
    public const REASON_1 = 'Compétences insuffisantes';
    public const REASON_2 = 'Manque d\'expérience pertinente';
    public const REASON_3 = 'Formation inadaptée';
    public const REASON_4 = 'Compétences techniques non maîtrisées';
    public const REASON_5 = 'Compétences comportementales insuffisantes';
    public const REASON_6 = 'Difficulté d\'adaptation au poste';
    public const REASON_7 = 'Résultats insuffisants aux tests techniques';
    public const REASON_8 = 'Résultats insuffisants aux tests psychométriques';
    public const REASON_9 = 'Manque de motivation';
    public const REASON_10 = 'Attentes salariales trop élevées';
    public const REASON_11 = 'Non-disponibilité à la date requise';
    public const REASON_12 = 'Refus des conditions de travail (horaires, télétravail, mobilité, etc.)';
    public const REASON_13 = 'Absence aux entretiens';
    public const REASON_14 = 'Retrait volontaire de la candidature';
    public const REASON_15 = 'Gel du recrutement';
    public const REASON_16 = 'Modification du besoin';
    public const REASON_17 = 'Changement de stratégie de l\'entreprise';
    public const REASON_18 = 'Priorité donnée à un candidat interne';
    public const REASON_19 = 'Incohérences dans le CV ou les expériences';
    public const REASON_20 = 'Références professionnelles non concluantes';
    public const REASON_21 = 'Vérifications administratives non satisfaisantes';
    public const REASON_22 = 'Non-conformité avec les exigences légales ou internes';
    public const REASON_23 = 'Mauvaise performance en entretien';
    public const REASON_24 = 'Mauvaise impression donnée aux recruteurs';
    public const REASON_25 = 'Manque de sérieux lors des échanges';
    public const OTHER = 'Autre';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::REASON_1  => __('generated.rejection_reason_1'),
            self::REASON_2  => __('generated.rejection_reason_2'),
            self::REASON_3  => __('generated.rejection_reason_3'),
            self::REASON_4  => __('generated.rejection_reason_4'),
            self::REASON_5  => __('generated.rejection_reason_5'),
            self::REASON_6  => __('generated.rejection_reason_6'),
            self::REASON_7  => __('generated.rejection_reason_7'),
            self::REASON_8  => __('generated.rejection_reason_8'),
            self::REASON_9  => __('generated.rejection_reason_9'),
            self::REASON_10 => __('generated.rejection_reason_10'),
            self::REASON_11 => __('generated.rejection_reason_11'),
            self::REASON_12 => __('generated.rejection_reason_12'),
            self::REASON_13 => __('generated.rejection_reason_13'),
            self::REASON_14 => __('generated.rejection_reason_14'),
            self::REASON_15 => __('generated.rejection_reason_15'),
            self::REASON_16 => __('generated.rejection_reason_16'),
            self::REASON_17 => __('generated.rejection_reason_17'),
            self::REASON_18 => __('generated.rejection_reason_18'),
            self::REASON_19 => __('generated.rejection_reason_19'),
            self::REASON_20 => __('generated.rejection_reason_20'),
            self::REASON_21 => __('generated.rejection_reason_21'),
            self::REASON_22 => __('generated.rejection_reason_22'),
            self::REASON_23 => __('generated.rejection_reason_23'),
            self::REASON_24 => __('generated.rejection_reason_24'),
            self::REASON_25 => __('generated.rejection_reason_25'),
            self::OTHER     => __('generated.rejection_reason_other'),
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getAll();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }

    public static function getReasonLabel(string $reasonKey): string
    {
        return self::getAll()->get($reasonKey, 'Inconnu');
    }
}