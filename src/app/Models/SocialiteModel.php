<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialiteModel extends Model
{
    use HasFactory;

    protected $table = "socialite";

    protected $guarded = [];
}
