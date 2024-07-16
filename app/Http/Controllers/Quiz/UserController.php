<?php

namespace App\Http\Controllers\Quiz;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function add(Request $request)
    {
        $quiz = User::create($request->all());
        return response()->json($quiz, 201);
    }

    public function show($id)
    {
        return response()->json(User::find($id), 200);
    }

    public function update(Request $request, $id)
    {
        $quizQuestion = User::findOrFail($id);
        $quizQuestion->update($request->all());
        return response()->json($quizQuestion, 200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}
