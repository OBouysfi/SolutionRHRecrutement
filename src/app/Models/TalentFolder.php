<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TalentFolder extends Model
{
    protected $guarded = [];

    // Relation avec les profils
    public function profiles()
    {
        return $this->hasMany(Profile::class, 'talent_folder_id');
    }

    public function parent()
    {
        return $this->belongsTo(TalentFolder::class, 'parent_id');
    }

    public function subFolders()
    {
        return $this->hasMany(TalentFolder::class, 'parent_id')->with('subFolders');
    }
}
