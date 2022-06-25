@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <p>USER:{{ $user->name . ' (' . $user->email . ')' }}</p>
    @else
        <p>ログインしていません(<a href="/login">ログイン</a>|<a href="/register">登録</a>)
        </p>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>クイズタイトル編集</div>
    <table>
        <tr>
            <th>ID</th>
            <th>フォーム</th>
        </tr>
        @foreach ($quiz_titles as $quiz_title)
            <tr>
                <td>{{ $quiz_title->id }}</td>
                <td>
                    <form action="/edit_title" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="title" value="{{ $quiz_title->title }}" required>
                            <input type="hidden" name="id" value="{{ $quiz_title->id }}">
                            <input type="submit" value="編集確定">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>タイトル追加</div>
    <form action="/add_title" method="POST">
        @csrf
        <input name="title" type="text" required>
        <input type="submit" value="追加">
    </form>
    <div>タイトル削除</div>
    <table>
        <tr>
            <th>ID</th>
            <th>タイトル</th>
            <th>フォーム</th>
        </tr>
        @foreach ($quiz_titles as $quiz_title)
            <tr>
                <td>{{ $quiz_title->id }}</td>
                <td>{{ $quiz_title->title }}</td>
                <td>
                    <form action="/delete_title" method="POST">
                        @csrf
                        <input hidden type="text" name="id" value="{{ $quiz_title->id }}">
                        <input type="submit" value="削除する">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>タイトルの順序入れ替え</div>
    <form action="switch_titles" method="POST">
        @csrf
        <div style="display:flex;">
            <div>
                <select name="from_id">
                    @foreach ($quiz_titles as $quiz_title)
                        <option value="{{ $quiz_title->id }}">{{ $quiz_title->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>⇔</div>
            <div>
                <select name="to_id">
                    @foreach ($quiz_titles as $quiz_title)
                        <option value="{{ $quiz_title->id }}">{{ $quiz_title->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" value="入れ替える">
    </form>
    <div>クイズ編集画面へのリンク一覧</div>
    <ul>
        @foreach($quiz_titles as $quiz_title)
        <li><a href="/edit_quiz/{{ $quiz_title->id }}">{{ $quiz_title->title }}</a></li>
        @endforeach
    </ul>
@endsection
