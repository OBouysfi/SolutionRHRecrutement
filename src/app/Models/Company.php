<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'logo_path', 
        'business_name', 
        'address', 
        'postal_code', 
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function evaluators()
    {
        return $this->hasMany(Evaluator::class, 'client_id');
    }

    public function getLogoUrl()
    {
        return $this->path_logo ? asset('storage/' . $this->path_logo) 
        : asset('storage/companies/img/company6.png');
    }
    
}