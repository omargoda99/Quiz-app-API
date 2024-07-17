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
        Schema::create('take_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->integer('score');
            $table->text('content');
            $table->timestamps();
            $table->boolean('passed_or_not');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('take_quiz');
    }
    
};
