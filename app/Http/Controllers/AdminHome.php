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
        $user = User::all();
        $kamar = Kamar::all();
        $booking = Booking::all();
        $fasilitas = FasilitasHotel::all();

        // Kirim data ke view
        return view('admin.dashboard.index', [
            'title' => $title,
            'authh' => $authh,
            'user' => $user,
            'kamar' => $kamar,
            'booking' => $booking,
            'fasilitas' => $fasilitas
        ]);
    }

    public function getChartData()
    {
        // Ambil data booking dan jenis kamar
        $data = Booking::join('kamar', 'booking.id_kamar', '=', 'kamar.id')
            ->select(
                'kamar.jenis_kamar',
                'booking.status',
                \DB::raw('COUNT(*) as total')
            )
            ->groupBy('kamar.jenis_kamar', 'booking.status')
            ->get();

        // Buat array untuk labels dan datasets
        $labels = Kamar::pluck('jenis_kamar')->toArray();
        $statuses = ['booking', 'checkin', 'checkout', 'cancel'];
        $datasets = [];

        foreach ($statuses as $status) {
            $datasets[] = [
                'label' => ucfirst($status),
                'backgroundColor' => $this->getColor($status),
                'borderColor' => $this->getBorderColor($status),
                'data' => array_map(function ($label) use ($data, $status) {
                    return $data->where('jenis_kamar', $label)->where('status', $status)->sum('total') ?? 0;
                }, $labels),
            ];
        }

        return response()->json([
            'labels' => $labels,
            'datasets' => $datasets,
        ]);
    }

    public function getDoughnutData()
    {
        // Ambil data jumlah booking per jenis kamar
        $data = Booking::join('kamar', 'booking.id_kamar', '=', 'kamar.id')
            ->select('kamar.jenis_kamar', \DB::raw('COUNT(*) as total'))
            ->groupBy('kamar.jenis_kamar')
            ->get();

        // Susun data untuk chart
        $labels = $data->pluck('jenis_kamar')->toArray();
        $values = $data->pluck('total')->toArray();

        return response()->json([
            'labels' => $labels,
            'data' => $values,
            'backgroundColor' => [
                '#f56954',
                '#00a65a',
                '#f39c12',
                '#00c0ef',
                '#3c8dbc',
                '#d2d6de'
            ],
        ]);
    }


    private function getColor($status)
    {
        $colors = [
            'booking' => 'rgba(60,141,188,0.9)',
            'checkin' => 'rgba(40,167,69,0.9)',
            'checkout' => 'rgba(255,193,7,0.9)',
            'cancel' => 'rgba(220,53,69,0.9)',
        ];
        return $colors[$status] ?? 'rgba(210, 214, 222, 1)';
    }

    private function getBorderColor($status)
    {
        $colors = [
            'booking' => 'rgba(60,141,188,0.8)',
            'checkin' => 'rgba(40,167,69,0.8)',
            'checkout' => 'rgba(255,193,7,0.8)',
            'cancel' => 'rgba(220,53,69,0.8)',
        ];
        return $colors[$status] ?? 'rgba(210, 214, 222, 1)';
    }
}
