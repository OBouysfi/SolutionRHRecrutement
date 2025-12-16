<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferExperience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "job_offer_experiences";

    protected $fillable = [
        'job_offer_id',
        'profession_id',
        'years',
        'weight_profession',
        'weight_experience',
    ];

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class, 'job_offer_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id');
    }
}
