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



Route::post('quizzes', [QuizController::class, 'add']);
Route::get('quizzes', [QuizController::class, 'index']);
Route::get('quizzes/{id}', [QuizController::class, 'show']);
Route::put('quizzes/{id}', [QuizController::class, 'update']);
Route::delete('quizzes/{id}', [QuizController::class, 'destroy']);


Route::get('questions', [QuizQuestionController::class, 'index']);
Route::post('questions', [QuizQuestionController::class, 'add']);
Route::get('questions/{id}', [QuizQuestionController::class, 'show']);
Route::put('questions/{id}', [QuizQuestionController::class, 'update']);
Route::delete('questions/{id}', [QuizQuestionController::class, 'destroy']);


Route::get('answers', [QuizAnswerController::class, 'index']);
Route::get('answers/{id}', [QuizAnswerController::class, 'show']);
Route::delete('answers/{id}', [QuizAnswerController::class, 'destroy']);
Route::post('answers', [QuizAnswerController::class, 'add']);


Route::get('take-quizzes', [TakeQuizController::class, 'index']);
Route::post('take-quizzes', [TakeQuizController::class, 'store']);
Route::get('take-quizzes/{id}', [TakeQuizController::class, 'show']);
Route::put('take-quizzes/{id}', [TakeQuizController::class, 'update']);
Route::delete('take-quizzes/{id}', [TakeQuizController::class, 'destroy']);


Route::get('take-quiz-answers', [TakeQuizAnswerController::class, 'index']);
Route::get('take-quiz-answers/{id}', [TakeQuizAnswerController::class, 'show']);
Route::delete('take-quiz-answers/{id}', [TakeQuizAnswerController::class, 'destroy']);