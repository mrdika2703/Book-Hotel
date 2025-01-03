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

class AdminBooking extends Controller
{
    public function booking(Request $request)
    {
        $title = $request->query('title', 'Data Booking');
        $user = User::all();
        $authh = Auth::user();
        $booking = Booking::whereIn('status', ['booking', 'checkin'])->get();

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
        $authh = Auth::user();

        $booking->update([
            'status' => 'checkin',
            'tanggal_checkin' => Carbon::now(),
            'id_user_accept' => $authh->id,
        ]);

        return redirect()->route('booking')->with('success', 'Booking berhasil di-Check-in.');
    }

    public function checkout(Request $request, Booking $booking)
    {
        $authh = Auth::user();

        $booking->update([
            'status' => 'checkout',
            'tanggal_checkout' => Carbon::now(),
            'id_user_accept' => $authh->id,
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
        $authh = Auth::user();
        $booking->update([
            'status' => 'cancel',
        ]);

        // Tambahkan jumlah kamar
        $room = $booking->kamar; // Relasi dengan model Kamar
        $room->update([
            'jumlah_kamar' => $room->jumlah_kamar + 1,
            'id_user_accept' => $authh->id,
        ]);

        return redirect()->route('booking')->with('success', 'Booking berhasil dibatalkan. Jumlah kamar telah diperbarui.');
    }

    public function hbooking(Request $request)
    {
        $title = $request->query('title', 'Data Booking');
        $user = User::all();
        $authh = Auth::user();
        $booking = Booking::whereIn('status', ['checkout', 'cancel'])->get();

        // Kirim data ke view
        return view('admin.hbooking.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user,
            'booking' => $booking
        ]);
    }
}
