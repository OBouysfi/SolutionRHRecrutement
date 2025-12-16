<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ClientFinance extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'rc',
        'unique_identifier',
        'ice_siret',
        'taxe',
        'city_id',
        'country_id'
    ];
        

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
