<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceMission extends Model
{
    use HasFactory;

    protected $table = 'missions'; 

    public function experience()
    {
        return $this->belongsTo(Experience::class); 
    }
}
