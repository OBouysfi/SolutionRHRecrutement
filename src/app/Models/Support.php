<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    use softDeletes;
 

    protected $guarded = [];

    protected $table = "supports";

    
}
