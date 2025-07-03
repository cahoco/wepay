<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string',
        ]);

        $shareId = Auth::user()->share_id;

        if (!$shareId) {
            return response()->json(['error' => '共有スペースが見つかりません'], 403);
        }

        $memo = Memo::firstOrCreate(['share_id' => $shareId]);
        $memo->content = $request->input('content');
        $memo->save();

        return response()->json(['message' => '保存しました']);
    }
}
