<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email salah',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            if (Auth::user()->role == 'kasir') {
                // activity()->causedBy(Auth::user())->log('User ' . auth()->user()->name . ' melakukan login');
                return redirect('/dashboard')->with('success', 'Login berhasil sebagai kasir');
            } elseif (Auth::user()->role == 'admin') {
                // activity()->causedBy(Auth::user())->log('User ' . auth()->user()->name . ' melakukan login');
                return redirect('/dashboard')->with('success', 'Login berhasil sebagai admin');
            }
        }

        return back()->withInput($request->only('email', 'remember'))->with('loginError', 'Email atau password salah');
    }

    public function logout()
    {
        if (Auth::check()) {
            // activity()
            //     ->causedBy(Auth::user())
            //     ->log('User ' . Auth::user()->name . ' melakukan logout');
        }

        Auth::logout();

        request()->session()->invalidate();

        return redirect('/');
    }
}
