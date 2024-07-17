<!-- resources/views/welcome.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mt-5">Welcome to <span class="text-primary">QuizzyQuiz</span></h1>
                <p class="lead">Challenge your knowledge with fun quizzes on various topics!</p>
                <a href="/quizzes" class="btn btn-primary btn-lg mt-3">Start Quiz</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <i class="fas fa-book fa-4x text-primary"></i>
                <h2 class="mt-3">Wide Range of Topics</h2>
                <p>Explore quizzes on diverse topics to suit your interests.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-chart-line fa-4x text-primary"></i>
                <h2 class="mt-3">Track Your Progress</h2>
                <p>Monitor your quiz performance and see how you improve over time.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-comments fa-4x text-primary"></i>
                <h2 class="mt-3">Interactive Quizzes</h2>
                <p>Engage in quizzes with interactive features and instant feedback.</p>
            </div>
        </div>
    </div>
@endsection
