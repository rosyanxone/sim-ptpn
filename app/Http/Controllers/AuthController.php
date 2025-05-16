<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginStore(LoginRequest $request)
    {
        if (Auth::Attempt($request->only(['email', 'password']), true)) {
            session()->flash('success', 'Berhasil login');

            return redirect()->intended(route('dashboard', absolute: false));
        }

        session()->flash('error', 'Email atau password Anda salah.');

        return redirect()->intended(route('login'));
    }
}
