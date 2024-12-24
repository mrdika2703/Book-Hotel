<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLogin()
    {
        return view('login.index');
    }

    // Menampilkan form register
    public function showRegister()
    {
        return view('login.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'nama_lengkap' => 'required|string|max:100',
            'nama_panggilan' => 'required|string|max:25',
            'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
            'email' => 'required|email|max:100|unique:users,email',
            'no_telepon' => 'required|string|max:50',
        ], [
            'username.unique' => 'Username sudah ada.',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'tamu', // Default role
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('home');
        }

        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function logoutadm()
    {
        Auth::logout();
        return redirect()->route('loginadm');
    }
}
