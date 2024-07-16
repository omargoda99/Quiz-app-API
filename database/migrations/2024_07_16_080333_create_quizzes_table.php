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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('host_id')->constrained('users');
            $table->string('title');
            $table->string('meta_data')->nullable();
            $table->string('score');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
