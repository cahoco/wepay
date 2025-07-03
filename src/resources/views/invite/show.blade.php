@extends('layouts.app')

@section('content')
<div class="container">
    <h2>パートナーを招待する</h2>

    <p>以下の共有コード付きURLをパートナーに送ってください。</p>

    <div style="margin: 1em 0; padding: 1em; background: #f4f4f4; border-radius: 8px;">
        <strong>招待URL:</strong><br>
        <input id="invite-url" type="text" readonly value="{{ url('/register/' . Auth::user()->share->uuid) }}" style="width: 100%; padding: 0.5em;">
    </div>

    <button onclick="copyUrl()" style="padding: 0.5em 1em;">コピーする</button>
    <p id="copy-status" style="color: green; margin-top: 0.5em;"></p>

    <div style="margin-top: 2em;">
        <a href="{{ route('home') }}" style="
            display: inline-block;
            padding: 0.5em 1em;
            background: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        ">戻る</a>
    </div>

</div>

<script>
    function copyUrl() {
        const input = document.getElementById('invite-url');
        input.select();
        input.setSelectionRange(0, 99999); // for mobile

        document.execCommand("copy");

        document.getElementById('copy-status').innerText = "招待URLをコピーしました！";
    }
</script>
@endsection
