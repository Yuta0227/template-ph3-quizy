<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy1</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
</head>
<a href="{{ route('quiz.quiz_list') }}">一覧</a>
<body>
    <h1>{{ $quiz_titles[0]->big_question_title }}</h1>
    <div class="main">
        @foreach ($question_list as $question)
            <div class="quiz">
                <h1>{{ $loop->iteration }}. この地名はなんて読む？</h1>
                <img alt="{{ $correct_answers[$loop->iteration-1]->choice_name }}の画像" src="{{ asset("img/".$pictures[$loop->iteration-1]->picture_url) }}">
                <ul>
                    <li id="answerlist_{{ $loop->iteration }}_1" name="answerlist_{{ $loop->iteration }}"
                        class="answerlist" onclick="check({{ $loop->iteration }}, 1, 2)">{{ $question[0]->choice_name }}
                    </li>
                    <li id="answerlist_{{ $loop->iteration }}_2" name="answerlist_{{ $loop->iteration }}"
                        class="answerlist" onclick="check({{ $loop->iteration }}, 2, 2)">{{ $question[1]->choice_name }}
                    </li>
                    <li id="answerlist_{{ $loop->iteration }}_3" name="answerlist_{{ $loop->iteration }}"
                        class="answerlist" onclick="check({{ $loop->iteration }}, 3, 2)">{{ $question[2]->choice_name }}
                    </li>
                    <li id="answerbox_{{ $loop->iteration }}" class="answerbox">
                        <span id="answertext_{{ $loop->iteration }}"></span><br>
                        <span>正解は「{{ $correct_answers[$loop->iteration-1]->choice_name }}」です！</span>
                    </li>
                </ul>
            </div>
        @endforeach
        <script src="{{ asset('/js/quiz.js') }}"></script>
    </div>
</body>

</html>
{{-- jsではcheck関数の引数をinnerhtmlと$correct_answers[$loop->iteration-1]->choice_nameにして一致するか否かで判定する --}}