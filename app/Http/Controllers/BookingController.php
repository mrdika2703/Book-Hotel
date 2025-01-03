<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\People;
use App\Models\Kamar;
use App\Models\Booking;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function indexx()
    {
        $user = auth()->user(); // Ambil user yang sedang login

        // Ambil semua booking berdasarkan id_user_tamu yang sama dengan id user yang sedang login
        $booking = Booking::where('id_user_tamu', $user->id)->get();

        // Ambil semua data kamar
        $rooms = Kamar::all();

        // Kirim data ke view
        return view('home.bookingku.index', compact('user', 'booking', 'rooms'));
    }


    public function index()
    {
        $user = auth()->user(); // Get logged-in user
        $people = People::whereIn('id', [$user->add_people1, $user->add_people2, $user->add_people3, $user->add_people4, $user->add_people5, $user->add_people6, $user->add_people7, $user->add_people8, $user->add_people9, $user->add_people10])->get(); // Adjust as needed
        $rooms = Kamar::all();

        return view('home.booking.index', compact('user', 'people', 'rooms'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal_checkin' => 'required|date|after_or_equal:today',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
            'id_people' => 'required|exists:people,id',
            'id_kamar' => 'required|exists:kamar,id',
            'pembayaran' => 'required|in:cash,transfer',
        ]);

        $room = Kamar::find($request->id_kamar);
        if ($room->jumlah_kamar <= 0) {
            return redirect()->back()->withErrors(['message' => 'Kamar tidak tersedia!']);
        }

        $days = Carbon::parse($request->tanggal_checkin)->diffInDays(Carbon::parse($request->tanggal_checkout));
        $totalPrice = $days * $room->harga_kamar;

        $booking = Booking::create([
            'id_user_tamu' => auth()->id(),
            'id_people' => $request->id_people,
            'tanggal_book' => now(),
            'tanggal_checkin' => Carbon::parse($request->tanggal_checkin)->setTime(12, 0),
            'tanggal_checkout' => Carbon::parse($request->tanggal_checkout)->setTime(12, 0),
            'id_kamar' => $request->id_kamar,
            'pembayaran' => $request->pembayaran,
            'total_harga' => $totalPrice,
            'status' => 'booking',
        ]);

        $room->update(['jumlah_kamar' => $room->jumlah_kamar - 1]);

        return redirect()->route('booking.index')->with([
            'success' => 'Booking berhasil dibuat!',
            'booking_id' => $booking->id,
        ]);
    }


    public function generatePdf($id)
    {
        $booking = Booking::with(['user', 'kamar', 'people'])->findOrFail($id);

        $pdf = Pdf::loadView('home.booking.pdf', compact('booking'));
        return $pdf->stream('booking.pdf');
    }
}
