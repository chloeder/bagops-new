<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  function login()
  {
    return view('auth.login');
  }

  function login_auth(Request $request)
  {
    $credentials = $request->validate([
      'username' => ['required', 'min:5'],
      'password' => ['required'],
    ], [
      'username.required' => 'Username tidak boleh kosong',
      'password.required' => 'Password tidak boleh kosong',
    ]);

    if (Auth::attempt($credentials)) {
      if (Auth::user()->status != 'active') {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('login')->with('error', 'Akun anda tidak aktif');
      }
      $request->session()->regenerate();
      return redirect()->intended('/')->with('success', 'Selamat datang, ' . Auth::user()->nama . '.');
    }
    return back()->with('error', 'Username atau password salah');
  }

  function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Berhasil logout');
  }
}
