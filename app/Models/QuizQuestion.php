<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $table = "quiz_questions";

    protected $fillable = [
        'quiz_id',
        'level',
        'score',
        'content',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'question_id');
    }

    public function takeQuizAnswers()
    {
        return $this->hasMany(TakeQuizAnswer::class, 'question_id');
    }
}
