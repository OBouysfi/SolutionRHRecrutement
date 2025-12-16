<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFiliale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'juridical_form',
        'tax_regime',
        'workforce',
        'activity',
        'adresse',
        'code_postal',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
