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
        $booking = Booking::all();

        // Kirim data ke view
        return view('admin.booking.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user,
            'booking' => $booking
        ]);
    }
    
    public function checkin(Request $request, Booking $booking)
{
    $booking->update([
        'status' => 'checked-in',
        'tanggal_checkin' => Carbon::now(),
    ]);

    return redirect()->route('booking')->with('success', 'Booking berhasil di-Check-in.');
}

public function checkout(Request $request, Booking $booking)
{
    $booking->update([
        'status' => 'checked-out',
        'tanggal_checkout' => Carbon::now(),
    ]);

    // Tambahkan jumlah kamar
    $room = $booking->kamar; // Relasi dengan model Kamar
    $room->update([
        'jumlah_kamar' => $room->jumlah_kamar + 1,
    ]);

    return redirect()->route('booking')->with('success', 'Booking berhasil di-Check-out. Jumlah kamar telah diperbarui.');
}

public function cancel(Request $request, Booking $booking)
{
    $booking->update([
        'status' => 'cancelled',
    ]);

    // Tambahkan jumlah kamar
    $room = $booking->kamar; // Relasi dengan model Kamar
    $room->update([
        'jumlah_kamar' => $room->jumlah_kamar + 1,
    ]);

    return redirect()->route('booking')->with('success', 'Booking berhasil dibatalkan. Jumlah kamar telah diperbarui.');
}


    
}
