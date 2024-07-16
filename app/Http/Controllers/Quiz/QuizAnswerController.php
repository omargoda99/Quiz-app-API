<?php

namespace App\Http\Controllers\Quiz;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuizAnswer;

class QuizAnswerController extends Controller
{
    public function index()
    {
        return response()->json(QuizAnswer::all(), 200);
    }

    public function store(Request $request)
    {
        $quiz = QuizAnswer::create($request->all());
        return response()->json($quiz, 201);
    }

    public function add(Request $request)
    {
        $question = QuizAnswer::create($request->all());
        return response()->json($question, 201);
    }


    public function show($id)
    {
        return response()->json(QuizAnswer::find($id), 200);
    }

    public function update(Request $request, $id)
    {
        $quizQuestion = QuizAnswer::findOrFail($id);
        $quizQuestion->update($request->all());
        return response()->json($quizQuestion, 200);
    }

    public function destroy($id)
    {
        QuizAnswer::destroy($id);
        return response()->json(null, 204);
    }
}
