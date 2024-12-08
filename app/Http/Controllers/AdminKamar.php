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

class AdminKamar extends Controller
{
    public function kamar(Request $request)
    {
        $title = $request->query('title', 'Data Kamar');
        $user = User::all();
        $authh = Auth::user();
        $kamar = Kamar::all();

        // Kirim data ke view
        return view('admin.kamar.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user,
            'kamar' => $kamar
        ]);
    }
}
