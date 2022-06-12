<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy1</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
</head>

<body>
    <h1>{{ $quiz_title[$big_question_index] }}</h1>
    <div class="main">
        <!-- ここから1問目 -->
        @foreach($question_list[$big_question_index] as $question)
        {{-- @for($loop->iteration=1;$loop->iteration<=count($question_list[$big_question_index]);$loop->iteration++) --}}
        <div class="quiz">
            <h1>{{ $loop->iteration }}. この地名はなんて読む？</h1>
            {{-- {{ var_dump($question_list) }} --}}
            <img src="img/{{ $loop->iteration }}.png">
            <ul>
                <li id="answerlist_{{ $loop->iteration }}_1" name="answerlist_{{ $loop->iteration }}" class="answerlist" onclick="check({{ $loop->iteration }}, 1, 2)">{{ $question[0] }}</li>
                <li id="answerlist_{{ $loop->iteration }}_2" name="answerlist_{{ $loop->iteration }}" class="answerlist" onclick="check({{ $loop->iteration }}, 2, 2)">{{ $question[1] }}</li>
                <li id="answerlist_{{ $loop->iteration }}_3" name="answerlist_{{ $loop->iteration }}" class="answerlist" onclick="check({{ $loop->iteration }}, 3, 2)">{{ $question[2] }}</li>
                {{-- checkの第三引数を正解の選択肢のindexに置き換える --}}
                <li id="answerbox_{{ $loop->iteration }}" class="answerbox">
                    <span id="answertext_{{ $loop->iteration }}"></span><br>
                    <span>正解は「たかなわ」です！</span>
                    {{-- 正解の選択肢に置き換える --}}
                </li>
            </ul>
        </div>
        @endforeach
        <script src="{{ asset('/js/quiz.js') }}"></script>
    </div>
</body>
</html>