<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap');

        body {
            font-family: 'Outfit', Arial, sans-serif;
            background-image: radial-gradient(circle, #f44336, #e91e63, #9c27b0, #673ab7, #3f51b5);
            padding: 40px;
        }

        h1 {
            color: #fff;
            text-align: center;
            font-weight: 700;
            font-size: 48px;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .message {
            padding: 20px 25px;
            margin-bottom: 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .message.success {
            background-color: #a5d6a7;
            color: #1b5e20;
        }

        .message.error {
            background-color: #ef9a9a;
            color: #c62828;
        }

        .question {
            background-color: #fff;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .question p {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 400;
            color: #555;
        }

        input[type="radio"] {
            margin-right: 12px;
            appearance: none;
            width: 18px;
            height: 18px;
            border: 3px solid #9c27b0;
            border-radius: 50%;
            vertical-align: middle;
            cursor: pointer;
        }

        input[type="radio"]:checked {
            background-color: #9c27b0;
        }

        button[type="submit"] {
            background-color: #9c27b0;
            color: #fff;
            padding: 15px 35px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 700;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            display: block;
            margin: 0 auto;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #7b1fa2;
        }
    </style>
    <script>
        function validateForm() {
            const radioGroups = document.querySelectorAll('.question');
            let allChecked = true;
            radioGroups.forEach(group => {
                const radioInputs = group.querySelectorAll('input[type="radio"]');
                let anyChecked = false;

                radioInputs.forEach(input => {
                    if (input.checked) {
                        anyChecked = true;
                    }
                });

                if (!anyChecked) {
                    allChecked = false;
                    group.style.borderColor = 'red';
                } else {
                    group.style.borderColor = '';
                }
            });

            if (!allChecked) {
                alert('Please answer all questions before submitting.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>{{ $quiz->title }}</h1>

    @if(session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        @foreach($quiz->questions as $question)
            <div class="question">
                <p>{{ $question->content }}</p>
                @foreach($question->answers as $answer)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}][answer_id]" value="{{ $answer->id }}" required>
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
