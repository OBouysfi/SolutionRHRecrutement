<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilityOption extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "mobility_options";

    public function mobilityOptionType()
    {
        return $this->belongsTo(MobilityOptionType::class, 'mobility_option_type_id');
    }
}
