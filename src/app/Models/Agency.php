<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'filiale_id'];

    public function filiale()
    {
        return $this->belongsTo(Filiale::class);
    }
}
