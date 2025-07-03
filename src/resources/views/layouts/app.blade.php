<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>家計簿アプリ</title>

    {{-- Laravel Mix 用に CSS と JS を読み込む --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}?t={{ time() }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    @unless (Request::is('login') || Request::is('register') || Request::is('register/*'))
    <header style="background: #f8f8f8; padding: 1em;">
        <nav style="display: flex; justify-content: space-between; align-items: center;">
            <div><strong>WEPAY</strong></div>
            <ul style="display: flex; gap: 1em; list-style: none; margin: 0;">
                <li><a href="{{ route('home') }}">ホーム</a></li>
                <li><a href="{{ route('invite.show') }}">パートナー招待</a></li>
                {{-- 必要なら他のメニュー項目も追加 --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: blue; cursor: pointer;">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    @endunless

    <main style="padding: 2em;">
        @yield('content')
    </main>
</body>
</html>
