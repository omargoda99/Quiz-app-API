<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;
    protected $table = "quiz_answers";

    protected $fillable = [
        'question_id',
        'quiz_id',
        'correct',
        'content',
    ];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function takeQuizAnswers()
    {
        return $this->hasMany(TakeQuizAnswer::class, 'answer_id');
    }
}

