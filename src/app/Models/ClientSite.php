<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSite extends Model
{
    use HasFactory;

        protected $fillable = [
        'site_id',
        'client_id',
        'city_id',
        'address',
        'code_postal',
        'site_name',
        'phone',
        'email',
        'responsable_name',
//        'description',
//        'work_days_nbr',
//        'work_day_period',
//        'observation',
//        'is_active'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
