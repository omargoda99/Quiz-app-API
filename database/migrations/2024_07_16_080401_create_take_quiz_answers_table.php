<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('take_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('take_quiz_id')->constrained('take_quiz');
            $table->foreignId('question_id')->constrained('quiz_questions');
            $table->foreignId('answer_id')->constrained('quiz_answers');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('take_quiz_answers');
    }
    
};
