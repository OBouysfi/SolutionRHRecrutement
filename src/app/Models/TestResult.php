<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $table = 'test_results';

    protected $fillable = ['test_id', 'score', 'status', 'language', 'date_test', 'add_pro', 'nee_ful_scr', 'profile_id', 'job_offer_id'];

    protected  $casts = [
        'date_test' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relation avec le modèle des tests
    public function test()
    {
        return $this->belongsTo(TestTechnique::class);
    }

    // Relation avec le modèle des candidats
    public function candidate()
    {
        return $this->belongsTo(Profile::class);
    }

    public function jobOffer(){
        return $this->belongsTo(JobOffer::class, 'job_offer_id', 'id');
    }


    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

}
