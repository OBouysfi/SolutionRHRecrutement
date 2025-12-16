<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferFormation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "job_offer_formations";

    protected $fillable = [
        'job_offer_id',
        'diploma_id',
        'option_id',
        'weight_formation',
        'weight_option',
    ];

    public function jobOffre()
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id');
    }

    public function diplomaOption(){

        return $this->belongsTo(DiplomaOption::class, 'option_id');
    }
}
