<?php

namespace App\Models;

use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use Illuminate\Database\Eloquent\Model;

class TrackingApplication extends Model
{

    protected $table = 'tracking_applications';

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'job_offer_id',
        'profile_id',
        'status_id',
        'reason',
        'comments',
        'tags',
        'histories',
    ];

    public $timestamps = true;

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class, 'job_offer_id');
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(TrackingApplicationSkill::class, 'tracking_application_id');
    }

    /**
     * Accesseur pour obtenir le libellé du statut.
     *
     * @return string|null
     */
    public function getStatusLabelAttribute()
    {
        return StatusTrackingApplicationEnum::getValue($this->status_id);
    }

    // Modèle TrackingApplication (App\Models\TrackingApplication)
    public function match()
    {
        return $this->hasOne(Matching::class, 'profile_id', 'profile_id')
            ->whereColumn('job_offer_id', 'job_offer_id');
    }

}
