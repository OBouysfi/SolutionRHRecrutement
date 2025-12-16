<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluator_id',
        'evaluation_type_id',
        'mark',
        'profile_id',
        'evaluation',
        'ponderation'
    ]; 

    public function evaluator() 
    {
        return $this->belongsTo(Evaluator::class); 
    }

    public function evaluationType() 
    {
        return $this->belongsTo(EvaluationType::class); 
    }
}
