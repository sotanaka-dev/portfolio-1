<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('message', __('messages.complete.logout'));
    }

    public function withdrawal()
    {
        Auth::user()->forceDelete();
        Auth::logout();

        return redirect()->route('login')
            ->with('message', __('messages.complete.withdrawal'));
    }
}
