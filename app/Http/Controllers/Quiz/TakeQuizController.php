<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TakeQuiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use App\Models\TakeQuizAnswer;

class TakeQuizController extends Controller
{
    public function index()
    {
        $takeQuizzes = TakeQuiz::with('answers')->get();
        return response()->json($takeQuizzes, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'quiz_id' => 'required|integer',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer',
            'answers.*.answer_id' => 'required|integer',
        ]);

        // Calculate score
        $score = 0;
        $totalQuestions = count($validatedData['answers']);
        
        foreach ($validatedData['answers'] as $answerData) {
            $quizAnswer = QuizAnswer::find($answerData['answer_id']);
            if ($quizAnswer->correct) {
                $score++;
            }
        }

        // Determine pass or fail (assuming a 50% pass mark)
        $passMark = 0.5;
        $passedOrNot = ($score / $totalQuestions) >= $passMark ? 1 : 0;

        // Create TakeQuiz entry
        $takeQuiz = TakeQuiz::create([
            'user_id' => $validatedData['user_id'],
            'quiz_id' => $validatedData['quiz_id'],
            'score' => $score,
            'content' => 'Quiz taken by user ID: ' . $validatedData['user_id'],
            'passed_or_not' => $passedOrNot
        ]);

        // Create TakeQuizAnswer entries
        foreach ($validatedData['answers'] as $answerData) {
            TakeQuizAnswer::create([
                'take_quiz_id' => $takeQuiz->id,
                'question_id' => $answerData['question_id'],
                'answer_id' => $answerData['answer_id']
            ]);
        }

        return response()->json($takeQuiz->load('answers'), 201);
    }

    public function show($id)
    {
        $takeQuiz = TakeQuiz::with('answers')->find($id);
        if (!$takeQuiz) {
            return response()->json(['message' => 'Take quiz record not found'], 404);
        }
        return response()->json($takeQuiz, 200);
    }

    public function update(Request $request, $id)
    {
        $takeQuiz = TakeQuiz::findOrFail($id);
        $takeQuiz->update($request->all());
        return response()->json($takeQuiz, 200);
    }

    public function destroy($id)
    {
        TakeQuiz::destroy($id);
        return response()->json(null, 204);
    }
}