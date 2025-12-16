<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'log_type',
        'user_id',
        'ats_id',
        'match_id',
        'profile_id',
        'job_offer_id',
        'new_status_id',
        'match_date',
        'job_offer_modified_date',
        'profile_modified_date',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array
     */
    protected $casts = [
        'match_date' => 'date',
        'job_offer_modified_date' => 'date',
        'profile_modified_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ats()
    {
        return $this->belongsTo(TrackingApplication::class);
    }

    public function match()
    {
        return $this->belongsTo(Matching::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }
}