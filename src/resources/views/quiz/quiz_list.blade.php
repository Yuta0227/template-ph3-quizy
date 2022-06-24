@extends('quiz.layout')
@section('content')
@if(Auth::check())
<p>USER:{{ $user->name.' ('.$user->email.')' }}</p>
@else
<p>ログインしていません(<a href="/login">ログイン</a>|<a href="/register">登録</a>)
</p>
@endif
@foreach($quiz_titles as $quiz_title)
<a href="{{ route('quiz.quiz',['big_question_id'=>$quiz_title->id]) }}">{{ $quiz_title->title }}</a><br>
@endforeach
@endsection