@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>ログイン</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" required autofocus>
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">ログイン</button>
    </form>
    <p>アカウントをお持ちでない方は <a href="{{ route('register') }}">こちら</a></p>
</div>
@endsection
