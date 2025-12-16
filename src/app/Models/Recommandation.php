<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Recommandation extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = "recommandations";


    public function getLogoUrl()
    {
        return $this->photo ? Storage::url($this->photo) : asset('assets/img/icon/empty-logo.png');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'poste');
    }

}
