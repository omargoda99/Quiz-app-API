<!-- resources/views/quizzes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">All Quizzes</h2>
                    </div>
                    <div class="card-body">
                        @forelse($quizzes as $quiz)
                            <div class="quiz-item mb-3">
                                <h3>{{ $quiz->title }}</h3>
                                <p>{{ $quiz->description }}</p>
                                <a href="{{ route('quiz.show', ['id' => $quiz->id]) }}" class="btn btn-primary">Start Quiz</a>
                            </div>
                        @empty
                            <p>No quizzes found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
