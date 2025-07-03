<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class HomeController extends Controller
{
    public function index()
    {
        $memoContent = Memo::where('share_id', auth()->user()->share_id)->value('content') ?? '';

        return view('home.index', [
            'memo' => $memoContent,
        ]);
    }
}
