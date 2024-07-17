<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Quiz Results</h1>

    <p>Score: {{ $score }}/{{ $totalQuestions }}</p>
    <p>Status: {{ $passedOrNot ? 'Passed' : 'Failed' }}</p>

    <h2>Correct Answers:</h2>
    @foreach($takeQuiz->quiz->questions as $question)
        <div>
            <p>Question: {{ $question->content }}</p>
            <p>Your Answer: {{ $question->answers->find($takeQuiz->answers->where('question_id', $question->id)->first()->answer_id)->content }}</p>
            <p>Correct Answer: {{ $correctAnswers[$question->id]->content }}</p>
        </div>
    @endforeach

    <a href="{{ route('quiz.index') }}">Back to Quizzes</a>
</body>
</html>
