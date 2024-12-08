<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

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
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'resepsionis') {
                return redirect()->route('resepsionis');
            } else {
                Auth::logout();
                return redirect()->route('loginadm')->withErrors(['username' => 'Username bukan admin.']);
            }
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
    
}
