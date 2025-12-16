<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "experiences";

    protected $casts = [
        'started_at'   => 'datetime',
        'finished_at'  => 'datetime',
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function getLogoUrl()
    {
        return $this->logo ? Storage::url($this->logo) : asset('assets/img/icon/empty-logo.png');
    }

    public function missions() 
    {
        return $this->hasMany(ExperienceMission::class); 
    }
}