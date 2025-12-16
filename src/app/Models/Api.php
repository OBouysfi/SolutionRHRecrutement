<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'system_name',
        'type',
        'connection_port',
        'protocol',
        'access_identifier',
        'access_password',
        'api_token',
        'status',
        'image_path'
    ];

    public function endpoints()
    {
        return $this->hasMany(ApiEndpoint::class, 'api_id');
    }
}
