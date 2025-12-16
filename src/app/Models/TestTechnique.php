<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestTechnique extends Model
{
    use HasFactory;


    protected $fillable = [
        'test_name',
        'description',
        'start_message',
        'end_message',
        'language',
        'algorithm',
        'duration',
        'questions_number',
        'subject',
        'type',
        'ordered_questions',
        'random_questions',
        'question_navigation',
        'show_question_list',
        'show_read_question_button',
        'is_active',
        'group',
        'category',
        'tag',
        'global_score',
        'average_score',
    ];

    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class, 'test_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'candidate_id', 'id');
    }
}
