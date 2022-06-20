@foreach($quiz_titles as $quiz_title)
<a href="{{ route('quiz.quiz',['big_question_id'=>$quiz_title->getId()]) }}">{{ $quiz_title->getTitle() }}</a><br>
@endforeach