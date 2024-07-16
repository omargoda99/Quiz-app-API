<?php

namespace App\Http\Controllers\Quiz;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuizQuestion;


class QuizQuestionController extends Controller
{
    public function index()
    {
        $quizQuestions = QuizQuestion::with('answers')->get();
        return response()->json($quizQuestions, 200);
    }

    public function add(Request $request)
    {
        $question = QuizQuestion::create($request->all());
        return response()->json($question, 201);
    }

    public function show($id)
    {
        $quizQuestion = QuizQuestion::with('answers')->find($id);
        if (!$quizQuestion) {
            return response()->json(['message' => 'Quiz question not found'], 404);
        }
        return response()->json($quizQuestion, 200);
    }

    public function update(Request $request, $id)
    {
        $quizQuestion = QuizQuestion::findOrFail($id);
        $quizQuestion->update($request->all());
        return response()->json($quizQuestion, 200);
    }

    public function destroy($id)
    {
        QuizQuestion::destroy($id);
        return response()->json(null, 204);
    }
}
