<?php

namespace App\Models;

use App\Enums\JobOffer\StatusJobOfferEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "job_offers";

    protected $casts = [
        'client_evaluator'   => 'array',
        'company_evaluator'   => 'array',
        // 'license_types'   => 'array',
        // 'recruitment_officers' => 'array',
        'mission_started_at'   => 'datetime',
        'mission_finished_at'  => 'datetime',
    ];

    // 1::DRAFT             => 'Brouillon',
    // 2::NOT_STARTED       => 'Ne pas démarrer', //'Non démarrée',
    // 3::IN_PROGRESS       => 'En cours',
    // 4::CLOSED            => 'Clôturer',
    // 5::SUSPENDED         => 'Suspendre',
    // 6::REOPENED          => 'Réouvrir',
    // 7::CANCELLED         => 'Annuler',
    // 8::REACTIVATED       => 'Réactiver'

    public const DISABLED_STATUS_MAPPING = [
        StatusJobOfferEnum::DRAFT => [
            StatusJobOfferEnum::CLOSED,
            StatusJobOfferEnum::SUSPENDED,
            StatusJobOfferEnum::REOPENED,
            StatusJobOfferEnum::CANCELLED,
            StatusJobOfferEnum::REACTIVATED,
        ],

        StatusJobOfferEnum::NOT_STARTED => [
            StatusJobOfferEnum::CLOSED,
            StatusJobOfferEnum::SUSPENDED,
            StatusJobOfferEnum::REOPENED,
            StatusJobOfferEnum::CANCELLED,
            StatusJobOfferEnum::REACTIVATED,
        ],

        StatusJobOfferEnum::IN_PROGRESS => [
            StatusJobOfferEnum::REOPENED,
            StatusJobOfferEnum::REACTIVATED,
        ],

        // - Annuler
        // * En cliquant sur annuler dans les actions du listing des missions: => statut "Annulée" puis les actions d'éditer, réactiver, suspendre et clôturer sont disabled, les actions possibles restantes seront supprimer, rouvrir, .
        StatusJobOfferEnum::CANCELLED => [
            StatusJobOfferEnum::CANCELLED,
            StatusJobOfferEnum::CLOSED,
            StatusJobOfferEnum::SUSPENDED,
            StatusJobOfferEnum::REACTIVATED
        ],

        // - Suspendre:
        // * En cliquant sur suspendre: la mission sera en statut "Suspendue" les actions, éditer rouvrir seront disabled, les actions possibles restantes seront supprimer, -r-o-u-v-r-i-r-, réactiver annuler
        StatusJobOfferEnum::SUSPENDED => [
            StatusJobOfferEnum::SUSPENDED,
            StatusJobOfferEnum::REOPENED,
        ],

        // - Clôturer:
        // * En cliquant sur clôturer: la mission sera en statut "Clôturée" les actions, éditer, annuler, suspendre, réactiver seront disabled, les actions possibles restantes seront , supprimer, rouvrir
        StatusJobOfferEnum::CLOSED => [
            StatusJobOfferEnum::CLOSED,
            StatusJobOfferEnum::CANCELLED,
            StatusJobOfferEnum::SUSPENDED,
            StatusJobOfferEnum::REACTIVATED,
        ],

        //  - Réactiver (possible seulement quand le statut de la mission est suspendue):
        // 	* En cliquant sur activer: la mission sera en statut "En cours" comme avant de la suspendre: les actions, toutes les actions sont possible après avoir activer une mission (considérée comme mission normale)
        // 	* Condition une fois on clique sur activer, j'ai l'affiche de la date de fin avec un calcul de la période de pause qui sera ajoutée sur cetet date de fin: exemple :
        // Date de début mission X: 01/03/2025
        // Date de fin mission X: 30/04/2025
        // Date de pause X: 15/03/2025
        // Date d'activation X: 30/03/2025
        // Nouvelle date de fin de la mission X: 15/05/2025
        StatusJobOfferEnum::REACTIVATED => [
            StatusJobOfferEnum::REACTIVATED,
            StatusJobOfferEnum::REOPENED,
        ],

        // - Rouvrir: (possible seulement quand le statut de la mission est clôturée et annulée):
        // * En cliquant sur Rouvrir: la mission sera en statut "Réouverte": les actions, toutes les actions sont possible après avoir activer une mission (considérée comme mission normale)
        // * En cliquant sur Rouvrir: ouvrir le form d'edit et l'enregistrer  avec statut Réouverte une fois l'edit terminé
        StatusJobOfferEnum::REOPENED => [
            StatusJobOfferEnum::REOPENED,
            StatusJobOfferEnum::REACTIVATED,
        ],
    ];

    public const DISABLED_CRUD_MAPPING = [
        "edit" => [
            StatusJobOfferEnum::CANCELLED,
            StatusJobOfferEnum::SUSPENDED,
            StatusJobOfferEnum::CLOSED,
        ],
        "remove" => [
            StatusJobOfferEnum::CANCELLED,
        ]
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }



    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_offers_skills', 'job_offer_id', 'skill_id')
            ->withPivot('level', 'weight')
            ->withTimestamps();
    }

    public function mobilityOptionTypes()
    {
        return $this->belongsToMany(MobilityOptionType::class, 'mobility_options', 'job_offer_id', 'mobility_option_type_id')
            ->withPivot('is_active', 'weight', 'notice_period_per_month')
            ->withTimestamps();
    }

    public function diplomas()
    {
        return $this->belongsToMany(Diploma::class, 'job_offer_formations', 'job_offer_id', 'diploma_id')
            // ->withPivot('weight')
            ->withPivot('weight_formation', 'weight_option')
            ->withTimestamps();
    }

    public function diploma_option()
    {
        return $this->belongsToMany(DiplomaOption::class, 'job_offer_formations', 'job_offer_id', 'option_id')
            // ->withPivot('weight')
            ->withPivot('weight_formation', 'weight_option')
            ->withTimestamps();
    }

    public function jobOfferFormation()
    {
        return $this->hasMany(JobOfferFormation::class);
    }

    public function jobOfferExperience()
    {
        return $this->hasMany(JobOfferExperience::class, 'job_offer_id');
    }

    public function trackingApplications()
    {
        return $this->hasMany(TrackingApplication::class, 'job_offer_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id');
    }

    public function salaryExpectation()
    {
        return $this->hasOne(JobOfferSalaryExpectation::class);
    }
}
