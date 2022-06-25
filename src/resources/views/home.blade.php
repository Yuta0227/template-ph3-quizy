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
    @foreach ($quiz_titles as $quiz_title)
        <form action="/edit_title" method="POST">
            @csrf
            <div>
                <label>クイズタイトル：</label><input type="text" name="title" value="{{ $quiz_title->title }}" required>
                <input type="hidden" name="id" value="{{ $quiz_title->id }}">
                <input type="submit" value="send">
            </div>
        </form>
    @endforeach
    <form action="/add_title" method="POST">
    @csrf
    <div>タイトル追加</div>
    <input name="title" type="text" required>
    <input type="submit" value="send">
    </form>
@endsection
