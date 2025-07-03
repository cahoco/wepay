@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>新規登録</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- ▼ 招待リンクからの登録である場合の表示 --}}
        @if (!empty($uuid))
            <div class="invite-message" style="color: green; margin-bottom: 1em;">
                この登録はパートナーの共有コードに紐づいています 🎉
            </div>
        @endif
        <input type="hidden" name="share_uuid" value="{{ $uuid }}">

        <div>
            <label for="name">お名前</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" required>
        </div>

        <div style="position: relative; width: fit-content;">
            <label for="password">パスワード</label><br>
            <input
                type="password"
                name="password"
                id="password"
                required
                style="padding-right: 2.5em;"
            >
            <button
                type="button"
                id="toggle-password"
                aria-label="パスワード表示切替"
                style="
                    position: absolute;
                    right: 0.5em;
                    top: 50%;
                    transform: translateY(-50%);
                    background: transparent;
                    border: none;
                    cursor: pointer;
                "
            >👁</button>
        </div>

        <div style="position: relative; width: fit-content;">
            <label for="password_confirmation">パスワード確認</label><br>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required
                style="padding-right: 2.5em;"
            >
            <button
                type="button"
                id="toggle-password-confirmation"
                aria-label="パスワード確認表示切替"
                style="
                    position: absolute;
                    right: 0.5em;
                    top: 50%;
                    transform: translateY(-50%);
                    background: transparent;
                    border: none;
                    cursor: pointer;
                "
            >👁</button>
        </div>

        <button type="submit">登録</button>
    </form>
    <p>すでにアカウントをお持ちの方は <a href="{{ route('login') }}">ログイン</a></p>
</div>
@endsection

<!-- 既存のフォームの下にそのまま追記 -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById("toggle-password");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
        });

        const toggleConfirmation = document.getElementById("toggle-password-confirmation");
        const confirmInput = document.getElementById("password_confirmation");

        toggleConfirmation.addEventListener("click", function () {
            const type = confirmInput.getAttribute("type") === "password" ? "text" : "password";
            confirmInput.setAttribute("type", type);
        });
    });
</script>
