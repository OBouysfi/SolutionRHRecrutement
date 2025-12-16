<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessfirstInvitationHistory extends Model
{
    use HasFactory;

    protected $table = 'assessfirst_invitation_history';

    protected $fillable = [
        'user_id',
        'candidate_id',
        'assessfirst_uuid',
        'date',
        'status',
    ];

    public function candidate()
    {
        return $this->belongsTo(Profile::class, 'candidate_id', 'id');
    }

}
