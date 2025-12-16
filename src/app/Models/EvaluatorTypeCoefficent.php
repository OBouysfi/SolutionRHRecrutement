<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluatorTypeCoefficent extends Model
{

    protected $table = 'evaluator_type_coefficients';
    protected $fillable = [
        'evaluator_id',
        'evaluation_type_id',
        'coefficient'
    ];

    public function evaluator()
    {
        return $this->belongsTo(Evaluator::class, 'evaluator_id');
    }

    public function evaluationType()
    {
        return $this->belongsTo(EvaluationType::class, 'evaluation_type_id');
    }
}
