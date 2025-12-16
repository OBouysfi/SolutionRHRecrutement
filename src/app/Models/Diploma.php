<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = "diplomas";

    public function jobOffers()
    {
        return $this->belongsToMany(JobOffer::class, 'job_offer_formations', 'diploma_id', 'job_offer_id')
            // ->withPivot('weight')
            ->withPivot('weight_formation', 'weight_option')
            ->withTimestamps();
    }
}
