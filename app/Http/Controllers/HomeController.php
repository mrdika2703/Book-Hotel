<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $authh = Auth::user();
        $kamar = Kamar::all();
        $fasilitas = FasilitasHotel::all();

        // Kirim data ke view
        return view('home.index', [
            'authh' => $authh,
            'kamar' => $kamar,
            'fasilitas' => $fasilitas
        ]);
    }

    public function about(Request $request)
    {
        $authh = Auth::user();
        $kamar = Kamar::all();
        $fasilitas = FasilitasHotel::all();

        // Kirim data ke view
        return view('home.about.index', [
            'authh' => $authh,
            'kamar' => $kamar,
            'fasilitas' => $fasilitas
        ]);
    }
}
