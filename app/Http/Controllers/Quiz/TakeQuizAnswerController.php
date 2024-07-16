<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TakeQuizAnswer;

class TakeQuizAnswerController extends Controller
{
    public function index()
    {
        $takeQuizAnswers = TakeQuizAnswer::all();
        return response()->json($takeQuizAnswers, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'take_quiz_id' => 'required|integer',
            'question_id' => 'required|integer',
            'answer_id' => 'required|integer',
        ]);

        $takeQuizAnswer = TakeQuizAnswer::create($validatedData);

        return response()->json($takeQuizAnswer, 201);
    }

    public function show($id)
    {
        $takeQuizAnswer = TakeQuizAnswer::find($id);
        if (!$takeQuizAnswer) {
            return response()->json(['message' => 'Take quiz answer not found'], 404);
        }
        return response()->json($takeQuizAnswer, 200);
    }

    public function update(Request $request, $id)
    {
        $takeQuizAnswer = TakeQuizAnswer::findOrFail($id);
        $takeQuizAnswer->update($request->all());
        return response()->json($takeQuizAnswer, 200);
    }

    public function destroy($id)
    {
        TakeQuizAnswer::destroy($id);
        return response()->json(null, 204);
    }
}
