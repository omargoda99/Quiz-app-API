<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
</head>
<body>
    <h1>{{ $quiz->title }}</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        @foreach($quiz->questions as $question)
            <div>
                <p>{{ $question->content }}</p>
                @foreach($question->answers as $answer)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}][answer_id]" value="{{ $answer->id }}">
                        <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        {{ $answer->content }}
                    </label><br>
                @endforeach
            </div>
            <br>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>
