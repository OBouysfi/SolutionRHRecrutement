<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'civility', 
        'first_name',
        'last_name',
        'sexe',
        'nationality',
        'group',
        'address',
        'postal_code',
        'city_id',
        'family_situation',
        'birth_place',
        'email',
        'phone_number',
        'status',
        'language',
        'path_picture',
        'cover_photo',
        'user_id',
        'overtime',
        'birth_date'
    ];

   
    protected $casts = [
        'birth_date' => 'datetime',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
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

    public function getCoverUrl()
    {
        return $this->cover_photo ? Storage::url($this->cover_photo) : asset('assets/img/icon/auth-bg-cover.jpg');
    }

    // AssessfirstInvitationHistory relation with one to one
    public function assessfirstInvitationHistory()
    {
        return $this->hasOne(AssessfirstInvitationHistory::class);
    }
    
}
