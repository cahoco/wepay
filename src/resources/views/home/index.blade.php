@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ① 合計支出額 --}}
    <section class="box">
        <h2 class="subtitle">{{ now()->format('Y年n月') }}の合計支出額</h2>
        <p class="text amount">¥{{ number_format($totalAmount ?? 12345) }}</p>
    </section>

    {{-- ② AさんがBさんにいくら渡す --}}
    <section class="box">
        <p class="text">
            Aさん → Bさん に渡す金額：
            <span class="highlight">¥{{ number_format($settlementAmount ?? 2345) }}</span>
        </p>
    </section>

    {{-- ③ メモ --}}
    <section class="box">
        <h2 class="subtitle">メモ</h2>
        <form id="memo-form" action="{{ route('memo.update') }}" method="POST">
            @csrf
            <textarea name="memo" id="memo" class="memo-textarea" placeholder="メモを入力..." rows="4">{{ $memo }}</textarea>
            <p id="memo-status" class="memo-status"></p>
        </form>
    </section>

    {{-- メモ自動保存用のJSを読み込み --}}
    <script src="{{ mix('js/home/memo.js') }}" defer></script>

    {{-- ④ 履歴 --}}
    <section class="box">
        <h2 class="subtitle">支出履歴</h2>
        <ul class="history-list">
            <li class="history-item">
                <div class="left">
                    <div class="record-title">ランチ</div>
                    <div class="record-date">2025年6月20日</div>
                </div>
                <div class="right">
                    <div class="record-amount">¥1,200</div>
                    <div class="record-payer">Aさんが支払</div>
                </div>
            </li>
            <li class="history-item">
                <div class="left">
                    <div class="record-title">電車代</div>
                    <div class="record-date">2025年6月19日</div>
                </div>
                <div class="right">
                    <div class="record-amount">¥800</div>
                    <div class="record-payer">Bさんが支払</div>
                </div>
            </li>
        </ul>
    </section>
</div>
@endsection

