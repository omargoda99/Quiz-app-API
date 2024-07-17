<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(to right, #e2e8f0, #f1f5f9);
            color: #334155;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%;
            max-width: 800px;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1e293b;
        }

        p {
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 20px;
            color: #475569;
        }

        .answer {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: left;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .answer p {
            margin-bottom: 12px;
        }

        a {
            text-decoration: none;
            color: #2563eb;
            font-size: 1.2rem;
            font-weight: 600;
            display: block;
            margin-top: 30px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #1e40af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quiz Results</h1>
        <p>Score: <strong>{{ $score }}</strong> out of <strong>{{ $totalQuestions }}</strong></p>
        <p>Status: <strong>{{ $passedOrNot ? 'Passed' : 'Failed' }}</strong></p>
        <h2>Correct Answers:</h2>
        
        @foreach($takeQuiz->quiz->questions as $question)
            <div class="answer">
                <p><strong>Question:</strong> {{ $question->content }}</p>
                <p><strong>Your Answer:</strong> {{ $question->answers->find($takeQuiz->answers->where('question_id', $question->id)->first()->answer_id)->content }}</p>
                <p><strong>Correct Answer:</strong> {{ $correctAnswers[$question->id]->content }}</p>
            </div>
        @endforeach

        <a href="{{ route('quiz.index') }}">Back to Quizzes</a>
    </div>
</body>
</html>