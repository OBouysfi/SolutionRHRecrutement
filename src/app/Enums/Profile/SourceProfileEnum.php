<?php

namespace App\Enums\Profile;

use Illuminate\Support\Collection;

class SourceProfileEnum
{
    public const CVTHEQUE_HUMANJOBS = 'CVthèque Humanjobs';
    public const VIVIER_DE_TALENTS = 'Vivier de talents';
    public const SITE_WEB_DE_LENTREPRISE = 'Site Web de l\'entreprise';
    public const RESEAUX_SOCIAUX_PROFESSIONNELS = 'Réseaux sociaux professionnels';
    public const LINKEDIN = 'LinkedIn';
    public const INDEED = 'Indeed';
    public const GLASSDOOR = 'Glassdoor';
    public const REKRUTE = 'Rekrute';
    public const BAYT = 'Bayt';
    public const EMPLOI_MA = 'Emploi.ma';
    public const JOBBOARDS = 'Jobboards';
    public const RESEAUX_SOCIAUX_GRAND_PUBLIC = 'Réseaux sociaux grand public';
    public const RESEAUX_ACADEMIQUES = 'Réseaux académiques';
    public const REPERTOIRES_PROFESSIONNELS_SPECIFIQUES = 'Répertoires professionnels spécifiques';
    public const GROUPES_ET_FORUMS_PROFESSIONNELS_EN_LIGNE = 'Groupes et forums professionnels en ligne';
    public const PARRAINAGE = 'Parrainage';
    public const BOUCHE_A_OREILLE = 'Bouche à oreille';
    public const REFERENCE_PROFESSIONNELLE = 'Référence professionnelle';
    public const SALONS_PROFESSIONNELS = 'Salons professionnels';
    public const CONFERENCES = 'Conférences';
    public const EVENEMENTS_DE_RESEAUX = 'Événements de réseautage';
    public const ASSOCIATIONS_PROFESSIONNELLES = 'Associations professionnelles';
    public const ANCIENS_COLLEGUES = 'Anciens collègues';
    public const ANCIENS_CAMARADES_DE_CLASSE = 'Anciens camarades de classe';
    public const RECOMMANDATIONS_EN_LIGNE = 'Recommandations en ligne';
    public const ARTICLES_DE_PRESSE = 'Articles de presse';
    public const PUBLICATIONS_SPECIALISEES = 'Publications spécialisées';

    public static function getAll(): Collection
    {
        return Collection::make([
            self::CVTHEQUE_HUMANJOBS                    => __('generated.cvtheque_humanjobs'),
            self::VIVIER_DE_TALENTS                     => __('generated.vivier_de_talents'),
            self::SITE_WEB_DE_LENTREPRISE               => __('generated.site_web_de_lentreprise'),
            self::RESEAUX_SOCIAUX_PROFESSIONNELS        => __('generated.reseaux_sociaux_professionnels'),
            self::LINKEDIN                              => __('generated.linkedin'),
            self::INDEED                                => __('generated.indeed'),
            self::GLASSDOOR                             => __('generated.glassdoor'),
            self::REKRUTE                               => __('generated.rekrute'),
            self::BAYT                                  => __('generated.bayt'),
            self::EMPLOI_MA                             => __('generated.emploi_ma'),
            self::JOBBOARDS                             => __('generated.jobboards'),
            self::RESEAUX_SOCIAUX_GRAND_PUBLIC          => __('generated.reseaux_sociaux_grand_public'),
            self::RESEAUX_ACADEMIQUES                   => __('generated.reseaux_academiques'),
            self::REPERTOIRES_PROFESSIONNELS_SPECIFIQUES=> __('generated.repertoires_professionnels_specifiques'),
            self::GROUPES_ET_FORUMS_PROFESSIONNELS_EN_LIGNE => __('generated.groupes_et_forums_professionnels_en_ligne'),
            self::PARRAINAGE                            => __('generated.parrainage'),
            self::BOUCHE_A_OREILLE                      => __('generated.bouche_a_oreille'),
            self::REFERENCE_PROFESSIONNELLE             => __('generated.reference_professionnelle'),
            self::SALONS_PROFESSIONNELS                 => __('generated.salons_professionnels'),
            self::CONFERENCES                           => __('generated.conferences'),
            self::EVENEMENTS_DE_RESEAUX                 => __('generated.evenements_de_reseaux'),
            self::ASSOCIATIONS_PROFESSIONNELLES         => __('generated.associations_professionnelles'),
            self::ANCIENS_COLLEGUES                     => __('generated.anciens_collegues'),
            self::ANCIENS_CAMARADES_DE_CLASSE           => __('generated.anciens_camarades_de_classe'),
            self::RECOMMANDATIONS_EN_LIGNE              => __('generated.recommandations_en_ligne'),
            self::ARTICLES_DE_PRESSE                    => __('generated.articles_de_presse'),
            self::PUBLICATIONS_SPECIALISEES             => __('generated.publications_specialisees'),
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
}