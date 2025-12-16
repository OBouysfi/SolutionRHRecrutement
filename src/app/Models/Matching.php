<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Matching extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'job_offer_id',
        'profile_id',
        'ratio',
    ];

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function scopeFiltered($query, $filters)
    {
        return $query->when($filters['ratio'] ?? null, function($q, $ratio) {
            return $q->where('ratio', '>=', $ratio);
        });
    }

    public function getAvatarUrl()
    {
        if ($this->path_picture) {
            return Storage::url($this->path_picture);
        }

        if ($this->sexe == 'Homme') {
            return asset('assets/img/cvtheque/male.jpg');
        } elseif ($this->sexe == 'Femme') {
            return asset('assets/img/cvtheque/female.jpg');
        }

        return asset('assets/img/cvtheque/male.jpg');
    }

    public function details()
    {
        return $this->hasMany(MatchingDetail::class, 'match_id');
    }
}
