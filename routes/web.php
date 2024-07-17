<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Quiz\TakeQuizController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('quiz');
});


Route::get('/quiz/{id}', [QuizController::class, 'showQuiz'])->name('quiz.show');
Route::post('/quiz/{id}', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('quiz-results/{id}', [TakeQuizController::class, 'showResults'])->name('quiz.results');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.index');