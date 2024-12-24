<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_fasilitas' => 'required|string|max:100|unique:fasilitas_hotel,nama_fasilitas',
                'deskripsi_fasilitas' => 'required|string',
                'foto_fasilitas1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'foto_fasilitas2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'foto_fasilitas3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'foto_fasilitas1.required' => 'Foto fasilitas 1 wajib diunggah.',
                'foto_fasilitas2.required' => 'Foto fasilitas 2 wajib diunggah.',
                'foto_fasilitas3.required' => 'Foto fasilitas 3 wajib diunggah.',
                'nama_fasilitas.unique' => 'Nama sudah ada.',
            ]);

            $fotoPath1 = $request->file('foto_fasilitas1')->store('images/fasilitas', 'public');
            $fotoPath2 = $request->file('foto_fasilitas2')->store('images/fasilitas', 'public');
            $fotoPath3 = $request->file('foto_fasilitas3')->store('images/fasilitas', 'public');

            FasilitasHotel::create([
                'nama_fasilitas' => $request->nama_fasilitas,
                'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
                'foto1' => $fotoPath1,
                'foto2' => $fotoPath2,
                'foto3' => $fotoPath3,
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->first());
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        try {
            $hotel = FasilitasHotel::findOrFail($id);

            $request->validate([
                'nama_fasilitas' => 'required|string|max:100|unique:fasilitas_hotel,nama_fasilitas,' . $id,
                'deskripsi_fasilitas' => 'required|string',
                'foto_fasilitas1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'foto_fasilitas2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'foto_fasilitas3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'nama_fasilitas.unique' => 'Nama sudah ada.',
            ]);

            // Gambar 1
            $fotoPath1 = $hotel->foto1;
            if ($request->hasFile('foto_fasilitas1')) {
                if ($fotoPath1) {
                    Storage::disk('public')->delete($fotoPath1);
                }
                $fotoPath1 = $request->file('foto_fasilitas1')->store('images/fasilitas', 'public');
            }

            // Gambar 2
            $fotoPath2 = $hotel->foto2;
            if ($request->hasFile('foto_fasilitas2')) {
                if ($fotoPath2) {
                    Storage::disk('public')->delete($fotoPath2);
                }
                $fotoPath2 = $request->file('foto_fasilitas2')->store('images/fasilitas', 'public');
            }

            // Gambar 3
            $fotoPath3 = $hotel->foto3;
            if ($request->hasFile('foto_fasilitas3')) {
                if ($fotoPath3) {
                    Storage::disk('public')->delete($fotoPath3);
                }
                $fotoPath3 = $request->file('foto_fasilitas3')->store('images/fasilitas', 'public');
            }


            $hotel->update([
                'nama_fasilitas' => $request->nama_fasilitas,
                'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
                'foto1' => $fotoPath1,
                'foto2' => $fotoPath2,
                'foto3' => $fotoPath3,
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->first());
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $hotel = FasilitasHotel::findOrFail($id);

        // Hapus foto jika ada
        if ($hotel->foto1) {
            Storage::disk('public')->delete($hotel->foto1);
        }

        if ($hotel->foto2) {
            Storage::disk('public')->delete($hotel->foto2);
        }

        if ($hotel->foto3) {
            Storage::disk('public')->delete($hotel->foto3);
        }

        $hotel->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }
}
