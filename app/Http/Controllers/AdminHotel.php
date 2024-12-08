<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class AdminHotel extends Controller
{
    public function hotel(Request $request)
    {
        $title = $request->query('title', 'Data Faslitias Hotel');
        $user = User::all();
        $authh = Auth::user();
        $hotel = FasilitasHotel::all();

        // Kirim data ke view
        return view('admin.hotel.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user,
            'hotel' => $hotel
        ]);
    }
}
