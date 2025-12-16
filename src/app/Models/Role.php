<?php

namespace App\Models;

use App\Models\RoleType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(RoleType::class, 'role_type_id');
    }
}
