<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function country()
    {
        return $this->hasOneThrough(
            Country::class,
            Region::class,
            'id',
            'id',
            'region_id',
            'country_id'
        );
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function filiales()
    {
        return $this->hasMany(Filiale::class);
    }

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'location');
    }
}
