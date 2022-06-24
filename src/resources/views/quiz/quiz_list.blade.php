@extends('quiz.layout')
@section('content')
@foreach($quiz_titles as $quiz_title)
<a href="{{ route('quiz.quiz',['big_question_id'=>$quiz_title->id]) }}">{{ $quiz_title->title }}</a><br>
@endforeach
@endsection