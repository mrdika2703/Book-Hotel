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


class ResDashboard extends Controller
{
    public function dashboard(Request $request)
    {
        $title = $request->query('title', 'Dashboard');
        $authh = Auth::user();

        // Kirim data ke view
        return view('admin.resepsionis.dashboard.index', [
            'title' => $title,
            'authh' => $authh
        ]);
    }
}
