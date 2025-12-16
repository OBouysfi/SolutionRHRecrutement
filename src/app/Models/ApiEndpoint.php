<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiEndpoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_id',
        'endpoint',
        'source_url',
    ];

    public function api()
    {
        return $this->belongsTo(Api::class, 'api_id');
    }
}
