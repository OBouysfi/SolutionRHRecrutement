<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    /**
     *
     * @var array
     */
    protected $fillable = [
        'activity_log_id',
        'action',
        'description',
    ];


    public function activityLog()
    {
        return $this->belongsTo(ActivityLog::class);
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            ActivityLog::class,
            'id',
            'id',
            'activity_log_id',
            'user_id'
        );
    }

    public function profile()
    {
        return $this->hasOneThrough(
            Profile::class,
            ActivityLog::class,
            'id',
            'id',
            'activity_log_id',
            'profile_id'
        );
    }

    public function jobOffer()
    {
        return $this->hasOneThrough(
            JobOffer::class,
            ActivityLog::class,
            'id',
            'id', 
            'activity_log_id',
            'job_offer_id'
        );
    }

    public function match()
    {
        return $this->hasOneThrough(
            Matching::class,
            ActivityLog::class,
            'id',
            'id',
            'activity_log_id',
            'match_id'
        );
    }
}