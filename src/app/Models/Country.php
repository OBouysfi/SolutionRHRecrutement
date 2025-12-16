<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'flag'];

    /**
     * Relation: Un pays a plusieurs villes.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
