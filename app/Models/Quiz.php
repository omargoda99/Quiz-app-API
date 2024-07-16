<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizzes";
    protected $fillable = [
        'host_id',
        'title',
        'meta_data',
        'score',
    ];


    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }

    public function takeQuizzes()
    {
        return $this->hasMany(TakeQuiz::class);
    }
}
