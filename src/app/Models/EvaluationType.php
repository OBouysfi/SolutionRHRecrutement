<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationType extends Model
{
    protected $fillable = [
        'name', 
        'description'
    ];

    public function evaluatorCoefficients()
    {
        return $this->hasMany(EvaluatorTypeCoefficent::class);
    }

    
}