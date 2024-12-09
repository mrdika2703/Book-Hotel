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

class AdminUsers extends Controller
{
    public function users(Request $request)
    {
        $title = $request->query('title', 'Data Users');
        $user = User::all();
        $authh = Auth::user();

        // Kirim data ke view
        return view('admin.users.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user,
            'users' => $user
        ]);
    }
}