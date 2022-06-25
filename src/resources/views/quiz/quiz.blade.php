@extends('quiz.layout')
@section('title')
quizy
@endsection
@section('css')
{{ asset('css/quiz.css') }}
@endsection
@section('go_back_to_list')
<a href="{{ route('quiz.question_lists') }}">一覧に戻る</a>
@endsection
@section('content')
    <h1>{{ $quiz_title }}</h1>
    <div class="main">
        @foreach ($question_lists as $question)
            <div class="quiz" id="question{{ $loop->iteration }}">
                <h1>{{ $loop->iteration }}. この地名はなんて読む？</h1>
                <img alt="{{ $correct_answers_array[$loop->iteration - 1]->choice_name }}の画像"
                    src="{{ asset('img/' . $pictures[$loop->iteration - 1]->picture_url) }}">
                <ul>
                    @foreach($question as $choice)
                    <a href="#question{{ $loop->parent->iteration + 1 }}" class="link_style_none">
                        <li id="answerlist_{{ $loop->parent->iteration }}_{{ $loop->iteration }}" name="answerlist_{{ $loop->parent->iteration }}"
                            class="answerlist"
                            onclick="check({{ $loop->parent->iteration }},{{ $loop->iteration }}, '{{ $correct_answers_array[$loop->parent->iteration - 1]->choice_name }}')">
                            {{ $choice->choice_name }}
                        </li>
                    </a>
                    @endforeach
                    <li id="answerbox_{{ $loop->iteration }}" class="answerbox">
                        <span id="answertext_{{ $loop->iteration }}"></span><br>
                        <span>正解は「{{ $correct_answers_array[$loop->iteration - 1]->choice_name }}」です！</span>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
<script src="{{ asset('/js/quiz.js') }}"></script>
@endsection