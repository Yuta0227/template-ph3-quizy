@extends('layouts.app')
@section('content')
    {{ $quiz_title }}
    <div>設問一覧</div>
    @foreach ($questions as $question)
        <img src="{{ asset('img/' . $pictures[$loop->iteration - 1]->picture_url) }}">
        <table>
            <tr>
                <th>選択肢編集</th>
                <th>正誤</th>
                <th>選択肢削除</th>
            </tr>
            @foreach ($question as $choice)
                <tr>
                    <td>
                        <form action="/edit_choice/{{ $big_question_id }}" method="POST">
                            @csrf
                            <input hidden name="id" value="{{ $choice->id }}">
                            <input type="text" value="{{ $choice->choice_name }}" name="choice_name">
                            <input type="submit" value="編集確定">
                        </form>
                    </td>
                    <td>
                        @if ($choice->valid == 1)
                            正解
                        @else
                            不正解
                        @endif
                    </td>
                    <td>
                        <form action="/delete_choice/{{ $big_question_id }}" method="POST"> 
                            @csrf
                            <input hidden name="id" value="{{ $choice->id }}">
                            @if ($choice->valid == 0)
                                <input type="submit" value="削除する">
                            @else
                                <input type="submit" value="削除できない" disabled>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <form action="/add_choice/{{ $big_question_id }}" method="POST">
                @csrf
                <div>正解を変更したい場合は正解の選択肢の内容を編集してください</div>
                <input hidden name="big_question_id" value="{{ $big_question_id }}">
                <input hidden name="question_id" value="{{ $question->first()->question_id }}">
                <input type="text" name="choice_name">
                <input type="submit" value="選択肢追加">
            </form>
    @endforeach
@endsection
