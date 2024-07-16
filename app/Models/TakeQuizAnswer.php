<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeQuizAnswer extends Model
{
    use HasFactory;
    protected $table = "take_quiz_answers";

    protected $fillable = [
        'take_quiz_id',
        'question_id',
        'answer_id',
    ];

    public function takeQuiz()
    {
        return $this->belongsTo(TakeQuiz::class, 'take_quiz_id');
    }

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }

    public function answer()
    {
        return $this->belongsTo(QuizAnswer::class, 'answer_id');
    }
}

