<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminHome extends Controller
{
    // Menampilkan form login
    public function showLogin()
    {
        return view('admin.login.index');
    }

    // Proses login
    public function loginadm(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }

    public function dashboard(Request $request)
    {
        $title = $request->query('title', 'Dashboard');
        $authh = Auth::user();

        // Kirim data ke view
        return view('admin.dashboard.index', [
            'title' => $title,
            'authh' => $authh
        ]);
    }


    public function booking(Request $request)
    {
        $title = $request->query('title', 'Dashboard');
        $user = User::all();
        $authh = Auth::user();

        // Kirim data ke view
        return view('admin.booking.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user
        ]);
    }
    
}
