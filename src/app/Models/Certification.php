<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Certification extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = "certifications";

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getLogoUrl()
    {
        return $this->logo ? Storage::url($this->logo) : asset('assets/img/icon/empty-logo.png');
    }
}
