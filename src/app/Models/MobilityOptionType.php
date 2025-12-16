<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilityOptionType extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "mobility_option_types";

    public const PARENT_IDS = [
        'Geographic_mobilitys' => 1,
        'work_modes' => 6,
        'working_hours' => 10,
        'availabilitys' => 13,
    ];

    public function jobOffers() {
        return $this->belonsToMany(JobOffer::class, 'mobility_options', 'mobility_option_type_id', 'job_offer_id')
            ->withPivot('is_active', 'weight', 'notice_period_per_month')
            ->withTimestamps();
    }

    public function mobilityOptions()
    {
        return $this->hasMany(MobilityOption::class, 'mobility_option_type_id');
    }

    public function parent()
    {
        return $this->belongsTo(MobilityOptionType::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MobilityOptionType::class, 'parent_id');
    }
}
