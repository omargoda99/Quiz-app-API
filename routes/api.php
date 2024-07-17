<?php

use App\Http\Controllers\Quiz\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Quiz\QuizQuestionController;
use App\Http\Controllers\Quiz\QuizAnswerController;
use App\Http\Controllers\Quiz\TakeQuizController;
use App\Http\Controllers\Quiz\TakeQuizAnswerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('quiz', [QuizController::class, 'add']);
Route::get('quiz', [QuizController::class, 'index']);
Route::get('quiz/{id}', [QuizController::class, 'show']);
Route::put('quiz/{id}', [QuizController::class, 'update']);
Route::delete('quiz/{id}', [QuizController::class, 'destroy']);


Route::get('question', [QuizQuestionController::class, 'index']);
Route::post('question', [QuizQuestionController::class, 'add']);
Route::get('question/{id}', [QuizQuestionController::class, 'show']);
Route::put('question/{id}', [QuizQuestionController::class, 'update']);
Route::delete('question/{id}', [QuizQuestionController::class, 'destroy']);


Route::get('answer', [QuizAnswerController::class, 'index']);
Route::get('answer/{id}', [QuizAnswerController::class, 'show']);
Route::delete('answer/{id}', [QuizAnswerController::class, 'destroy']);
Route::post('answer', [QuizAnswerController::class, 'add']);


Route::get('take-quizze', [TakeQuizController::class, 'index']);
Route::post('take-quizze', [TakeQuizController::class, 'store']);
Route::get('take-quizze/{id}', [TakeQuizController::class, 'show']);
Route::put('take-quizze/{id}', [TakeQuizController::class, 'update']);
Route::delete('take-quizze/{id}', [TakeQuizController::class, 'destroy']);


Route::get('take-quiz-answer', [TakeQuizAnswerController::class, 'index']);
Route::get('take-quiz-answer/{id}', [TakeQuizAnswerController::class, 'show']);
Route::delete('take-quiz-answer/{id}', [TakeQuizAnswerController::class, 'destroy']);