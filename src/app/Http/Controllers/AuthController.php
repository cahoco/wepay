<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // ログインフォーム表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/'); // ログイン後の遷移先
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが正しくありません。',
        ])->onlyInput('email');
    }

    // 登録フォーム表示（uuidを受け取れるように）
    public function showRegisterForm($uuid = null)
    {
        if ($uuid !== null) {
            $share = Share::where('uuid', $uuid)->first();

            if (!$share) {
                // 無効なUUIDなら404エラー
                abort(404);
            }

            // UUIDが有効なのでビューに渡す
            return view('auth.register', ['uuid' => $uuid]);
        }

        // 通常の新規登録
        return view('auth.register', ['uuid' => null]);
    }

    // 登録処理
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'share_uuid' => 'nullable|exists:shares,uuid',
        ]);

        // 👇 uuidが渡されていれば、そのshareを使う
        if ($request->filled('share_uuid')) {
            $share = Share::where('uuid', $request->share_uuid)->first();
        } else {
            // 👇 uuidを自動生成して新しいshareを作成
            $share = Share::create([
                'uuid' => Str::uuid(),
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'share_id' => $share->id,
        ]);

        Auth::login($user);

        return redirect('/');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
