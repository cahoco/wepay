<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿アプリ</title>

    {{-- Laravel Mix 用に CSS と JS を読み込む --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <header">
        ヘッダー
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
