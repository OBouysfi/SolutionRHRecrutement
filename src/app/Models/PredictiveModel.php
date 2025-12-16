<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictiveModel extends Model
{
    use HasFactory;

    // table name
    protected $table = 'predictive_model';

    // fillable fields
    protected $fillable = [
        'label',
        'data',
        'status',
        'assessfirst_uuid',
        'profession',
        'company_id',
        'user_id',
    ];
}
