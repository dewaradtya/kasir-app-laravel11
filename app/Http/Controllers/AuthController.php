<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);


        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
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

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        $data = $query->paginate(10);

        return view('admin.user.index', [
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'role' => 'in:admin,kasir',
        ]);

        $user = User::findOrFail($id);

        $user->role = $request->role;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('user')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('user')->with('success', 'User berhasil dihapus');
    }
}
