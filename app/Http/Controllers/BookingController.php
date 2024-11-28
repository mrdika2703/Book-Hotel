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
    public function index()
    {
        $user = auth()->user(); // Get logged-in user
        $people = People::whereIn('id', [$user->add_people1, $user->add_people2])->get(); // Adjust as needed
        $rooms = Kamar::all();

        return view('home.booking.index', compact('user', 'people', 'rooms'));
    }

    public function index2()
    {
        $user = auth()->user(); // Get logged-in user
        $people = People::whereIn('id', [$user->add_people1, $user->add_people2])->get(); // Adjust as needed
        $rooms = Kamar::all();

        return view('home.bookingku.index', compact('user', 'people', 'rooms'));
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
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'id_kamar' => $request->id_kamar,
            'pembayaran' => $request->pembayaran,
            'total_harga' => $totalPrice,
            'status' => 'booking',
        ]);

        // $room->update(['jumlah_kamar' => $room->jumlah_kamar - 1]);

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
