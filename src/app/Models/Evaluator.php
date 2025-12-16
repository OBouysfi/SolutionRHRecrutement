<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Evaluator extends Model
{
    protected $fillable = [
        'path_logo',
        'first_name',
        'last_name',
        'email',
        'profession_id',
        'client_id',
        'company_id',
        'user_related_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_related_id');
    }


    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function getLogoUrl()
    {
        if ($this->path_logo) {
            return Storage::url($this->path_logo);
        }
        return asset('assets/img/cvtheque/male.jpg');
    }
    public function typeCoefficients()
    {
        return $this->hasMany(EvaluatorTypeCoefficent::class);
    }

    public function evaluationTypes()
    {
        return $this->belongsToMany(
            EvaluationType::class,
            'evaluator_type_coefficients', 
            'evaluator_id',
            'evaluation_type_id'
        );
    }
}
