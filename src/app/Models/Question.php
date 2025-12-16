<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'type', 'question_text', 'correct_answer', 'point'];

    // Relation : Une question appartient à un test technique
    public function testTechnique()
    {
        return $this->belongsTo(TestTechnique::class);
    }

    // Relation : Une question a plusieurs réponses
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


}
