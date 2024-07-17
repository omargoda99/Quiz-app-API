<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\TakeQuiz;
use App\Models\QuizAnswer;
use App\Models\TakeQuizAnswer;


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

    public function showQuiz($id)
    {
        $quiz = Quiz::with('questions.answers')->find($id);
    
        if (!$quiz) {
            return redirect()->back()->with('error', 'Quiz not found');
        }
    
        return view('quiz', compact('quiz'));
    }

    public function submitQuiz(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'quiz_id' => 'required|integer',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer',
            'answers.*.answer_id' => 'required|integer',
        ]);
    
        $score = 0;
        $totalQuestions = count($validatedData['answers']);
        $correctAnswers = [];
    
        foreach ($validatedData['answers'] as $answerData) {
            $quizAnswer = QuizAnswer::find($answerData['answer_id']);
            if ($quizAnswer && $quizAnswer->correct) {
                $score++;
            }
            $correctAnswers[$answerData['question_id']] = QuizAnswer::where('question_id', $answerData['question_id'])->where('correct', 1)->first();
        }
    
        $takeQuiz = TakeQuiz::create([
            'user_id' => $validatedData['user_id'],
            'quiz_id' => $validatedData['quiz_id'],
            'score' => $score,
            'content' => 'Quiz taken by user ID: ' . $validatedData['user_id'],
            'passed_or_not' => ($score / $totalQuestions) >= 0.5 ? 1 : 0,
        ]);
    
        foreach ($validatedData['answers'] as $answerData) {
            TakeQuizAnswer::create([
                'take_quiz_id' => $takeQuiz->id,
                'question_id' => $answerData['question_id'],
                'answer_id' => $answerData['answer_id']
            ]);
        }
    
        return redirect()->route('quiz.results', ['id' => $takeQuiz->id]);
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
