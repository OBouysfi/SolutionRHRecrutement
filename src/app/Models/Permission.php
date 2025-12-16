<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    // Vous pouvez ajouter des méthodes personnalisées ici si nécessaire

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'permissions';

    public $timestamps = true;

    protected $guarded = [];
}
