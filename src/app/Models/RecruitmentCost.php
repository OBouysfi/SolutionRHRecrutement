<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RecruitmentCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'platform', 'logo', 'budget', 'amount', 'invoice', 'difference', 'devise','updated_at','created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function getLogoUrl()
    {
        return $this->logo ? Storage::url($this->logo) : asset('assets/img/icon/empty-logo.png');
    }
}
