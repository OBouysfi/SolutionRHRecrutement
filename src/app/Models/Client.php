<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'juridical_form',
        'tax_regime',
        'path_logo',
        'workforce',
        'activity_area_id',
        'activity',
        'adresse',
        'code_postal',
        'city_id',
        'date_creation'
    ];


    protected $casts = [
        'date_creation' => 'datetime',
    ];

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }
    /**
     * Relation vers la table activity_areas
     */
    public function activityArea()
    {
        return $this->belongsTo(ActivityArea::class, 'activity_area_id');
    }

    /**
     * Relation vers la table cities
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }



    public function finance()
    {
        return $this->hasOne(ClientFinance::class, 'client_id');
    }

    public function clientSites()
    {
        return $this->hasMany(ClientSite::class, 'client_id');
    }


    public function getLogoUrl()
    {
        if ($this->path_logo) {
            return Storage::url($this->path_logo);
        }

        // return asset('assets/img/client/logo_client_1.jpg');
    }

    public function evaluators()
    {
        return $this->hasMany(Evaluator::class);
    }
}
