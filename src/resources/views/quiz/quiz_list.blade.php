@foreach($quiz_titles as $quiz_title)
<a href="{{ route('quiz.quiz',['prefecture_id'=>$loop->iteration]) }}">{{ $quiz_title->prefecture_title }}</a><br>
@endforeach