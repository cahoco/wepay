<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InviteController;

// ホーム画面（ログイン後）
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

// メモ保存（ログイン必須）
Route::middleware(['auth'])->group(function () {
    Route::post('/memo/update', [MemoController::class, 'update'])->name('memo.update');
});

// ログイン・登録関連
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 招待リンク付きの登録画面
Route::get('/register/{uuid}', [AuthController::class, 'showRegisterForm'])->name('register.with.share');

Route::middleware(['auth'])->group(function () {
    Route::get('/invite', [InviteController::class, 'show'])->name('invite.show');
});