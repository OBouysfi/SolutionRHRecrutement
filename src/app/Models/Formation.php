<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Formation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "formations";

    protected $casts = [
        'started_at'   => 'datetime',
        'finished_at'  => 'datetime',
    ];

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function option()
    {
        return $this->belongsTo(DiplomaOption::class);
    }
    

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getLogoUrl()
    {
        return $this->logo ? Storage::url($this->logo) : asset('assets/img/icon/empty-logo.png');
    }
}
