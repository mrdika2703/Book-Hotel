<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kamar' => 'required|string|max:100|unique:kamar,jenis_kamar',
            'jumlah_kamar' => 'required|numeric',
            'fasilitas' => 'required|string',
            'deskripsi_kamar' => 'required|string',
            'harga_kamar' => 'required|numeric',
            'foto_kamar1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kamar2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kamar3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto_kamar1.required' => 'Foto kamar 1 wajib diunggah.',
            'foto_kamar2.required' => 'Foto kamar 2 wajib diunggah.',
            'foto_kamar3.required' => 'Foto kamar 3 wajib diunggah.',
            'jenis_kamar.unique' => 'Jenis sudah ada.',
        ]);

        $fotoPath1 = $request->file('foto_kamar1')->store('images/kamar', 'public');
        $fotoPath2 = $request->file('foto_kamar2')->store('images/kamar', 'public');
        $fotoPath3 = $request->file('foto_kamar3')->store('images/kamar', 'public');

        Kamar::create([
            'jenis_kamar' => $request->jenis_kamar,
            'jumlah_kamar' => $request->jumlah_kamar,
            'fasilitas' => $request->fasilitas,
            'deskripsi_kamar' => $request->deskripsi_kamar,
            'harga_kamar' => $request->harga_kamar,
            'foto1' => $fotoPath1,
            'foto2' => $fotoPath2,
            'foto3' => $fotoPath3,
        ]);


        session()->flash('success', 'Data berhasil ditambahkan!');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        try {
            $kamar = Kamar::findOrFail($id);

            $request->validate([
                'jenis_kamar' => 'required|string|max:100|unique:kamar,jenis_kamar,' . $id,
                'jumlah_kamar' => 'required|numeric',
                'fasilitas' => 'required|string',
                'deskripsi_kamar' => 'required|string',
                'harga_kamar' => 'required|numeric',
                'foto_kamar1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'foto_kamar2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'foto_kamar3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'jenis_kamar.unique' => 'Jenis kamar sudah ada.',
            ]);

            // Gambar 1
            $fotoPath1 = $kamar->foto1;
            if ($request->hasFile('foto_kamar1')) {
                if ($fotoPath1) {
                    Storage::disk('public')->delete($fotoPath1);
                }
                $fotoPath1 = $request->file('foto_kamar1')->store('images/kamar', 'public');
            }

            // Gambar 2
            $fotoPath2 = $kamar->foto2;
            if ($request->hasFile('foto_kamar2')) {
                if ($fotoPath2) {
                    Storage::disk('public')->delete($fotoPath2);
                }
                $fotoPath2 = $request->file('foto_kamar2')->store('images/kamar', 'public');
            }

            // Gambar 3
            $fotoPath3 = $kamar->foto3;
            if ($request->hasFile('foto_kamar3')) {
                if ($fotoPath3) {
                    Storage::disk('public')->delete($fotoPath3);
                }
                $fotoPath3 = $request->file('foto_kamar3')->store('images/kamar', 'public');
            }


            $kamar->update([
                'jenis_kamar' => $request->jenis_kamar,
                'jumlah_kamar' => $request->jumlah_kamar,
                'fasilitas' => $request->fasilitas,
                'deskripsi_kamar' => $request->deskripsi_kamar,
                'harga_kamar' => $request->harga_kamar,
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
        $kamar = Kamar::findOrFail($id);

        // Hapus foto jika ada
        if ($kamar->foto1) {
            Storage::disk('public')->delete($kamar->foto1);
        }

        if ($kamar->foto2) {
            Storage::disk('public')->delete($kamar->foto2);
        }

        if ($kamar->foto3) {
            Storage::disk('public')->delete($kamar->foto3);
        }

        $kamar->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }
}
