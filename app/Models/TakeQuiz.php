<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeQuiz extends Model
{
    use HasFactory;
    protected $table = "take_quiz";

    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'content',
        'passed_or_not'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(TakeQuizAnswer::class, 'take_quiz_id');
    }
}
