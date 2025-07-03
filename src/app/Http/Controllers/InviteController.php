<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $shareCode = $user->share->uuid ?? null;

        return view('invite.show', compact('shareCode'));
    }
}
