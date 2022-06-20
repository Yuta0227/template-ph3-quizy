@foreach($quiz_titles as $quiz_title)
<a href="{{ route('quiz.quiz',['big_question_id'=>$quiz_title->big_question_id]) }}">{{ $quiz_title->big_question_title }}</a><br>
@endforeach