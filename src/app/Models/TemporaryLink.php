<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryLink extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

     public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function isExpired()
    {
        return $this->expires_at->isPast() || $this->used;
    }
}
