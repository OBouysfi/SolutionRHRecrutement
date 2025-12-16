<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    // table
    protected $table = 'campaign';

    // fillable
    protected $fillable = [
        'label',
        'assessfirst_id',
        'predictive_model_id',
        'location',     // will be city_id 
    ];

    // relationships
    // location
    public function city()
    {
        return $this->belongsTo(City::class, 'location', 'id');
    }

    // predictive model
    public function predictiveModel()
    {
        return $this->belongsTo(PredictiveModel::class);
    }
}
