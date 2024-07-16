<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions')->get();
        return response()->json($quizzes, 200);
    }

    public function add(Request $request)
    {
        $question = Quiz::create($request->all());
        return response()->json($question, 201);
    }

    public function store(Request $request)
    {
        $quiz = QuizController::create($request->all());
        return response()->json($quiz, 201);
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions.answers')->find($id);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        return response()->json($quiz, 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'string',
            'description' => 'string',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($validatedData);

        return response()->json($quiz, 200);
    }

    public function destroy($id)
    {
        Quiz::destroy($id);
        return response()->json(null, 204);
    }
}
