@extends('quiz.layout')
@section('title')
quizy
@endsection
@section('css')
{{ asset('css/quiz.css') }}
@endsection
@section('go_back_to_list')
<a href="{{ route('quiz.question_list') }}">一覧に戻る</a>
@endsection
@section('content')
    <h1>{{ $quiz_titles->big_question_title }}</h1>
    <div class="main">
        @foreach ($question_list as $question)
            <div class="quiz" id="question{{ $loop->iteration }}">
                <h1>{{ $loop->iteration }}. この地名はなんて読む？</h1>
                <img alt="{{ $correct_answers[$loop->iteration - 1]->choice_name }}の画像"
                    src="{{ asset('img/' . $pictures[$loop->iteration - 1]->picture_url) }}">
                <ul>
                    <a href="#question{{ $loop->iteration + 1 }}" class="link_style_none">
                        <li id="answerlist_{{ $loop->iteration }}_1" name="answerlist_{{ $loop->iteration }}"
                            class="answerlist"
                            onclick="check({{ $loop->iteration }},1, '{{ $correct_answers[$loop->iteration - 1]->choice_name }}')">
                            {{ $question[0]->choice_name }}
                        </li>
                    </a>
                    <a href="#question{{ $loop->iteration + 1 }}" class="link_style_none">
                        <li id="answerlist_{{ $loop->iteration }}_2" name="answerlist_{{ $loop->iteration }}"
                            class="answerlist"
                            onclick="check({{ $loop->iteration }},2, '{{ $correct_answers[$loop->iteration - 1]->choice_name }}')">
                            {{ $question[1]->choice_name }}
                        </li>
                    </a>
                    <a href="#question{{ $loop->iteration + 1 }}" class="link_style_none">
                        <li id="answerlist_{{ $loop->iteration }}_3" name="answerlist_{{ $loop->iteration }}"
                            class="answerlist"
                            onclick="check({{ $loop->iteration }},3, '{{ $correct_answers[$loop->iteration - 1]->choice_name }}')">
                            {{ $question[2]->choice_name }}
                        </li>
                    </a>
                    <li id="answerbox_{{ $loop->iteration }}" class="answerbox">
                        <span id="answertext_{{ $loop->iteration }}"></span><br>
                        <span>正解は「{{ $correct_answers[$loop->iteration - 1]->choice_name }}」です！</span>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
<script src="{{ asset('/js/quiz.js') }}"></script>
@endsection