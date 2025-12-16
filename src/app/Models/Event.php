<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "events";

    public function members()
    {
        return $this->hasMany(EventParticipant::class, 'event_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->hasMany(EventParticipant::class, 'event_id')->where('role', 'participant');
    }

    public function attachments()
    {
        return $this->hasMany(EventAttachment::class, 'event_id');
    }

    public function destinataires()
    {
        return $this->hasMany(EventParticipant::class, 'event_id')->where('role', 'destinataire');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, EventParticipant::class, 'event_id', 'id', 'id', 'user_id')->whereNotNull('user_id');
    }

    public function profiles()
    {
        return $this->hasManyThrough(Profile::class, EventParticipant::class, 'event_id', 'id', 'id', 'profile_id')->whereNotNull('profile_id');
    }

    public function jobOffer(){
        return $this->belongsTo(JobOffer::class, 'job_offer_id');
    }
}
