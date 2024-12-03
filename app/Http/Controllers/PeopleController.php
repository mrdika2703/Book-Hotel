<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $people = People::whereIn('id', [
            $user->add_people1, $user->add_people2, $user->add_people3,
            $user->add_people4, $user->add_people5, $user->add_people6,
            $user->add_people7, $user->add_people8, $user->add_people9,
            $user->add_people10
        ])->get();

        return view('home.add.index', compact('people', 'user'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:100',
        'nama_panggilan' => 'required|string|max:25',
        'jenis_kelamin' => 'required|in:L,P',
        'nik' => 'required|numeric|digits:16|unique:people,nik',
        'alamat_lengkap' => 'required|string',
        'foto_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ], [
        'foto_ktp.required' => 'Foto KTP wajib diunggah.',
        'nik.unique' => 'NIK sudah digunakan.',
    ]);

    $fotoPath = $request->file('foto_ktp')->store('images/ktp', 'public');

    $people = People::create([
        'nama_lengkap' => $request->nama_lengkap,
        'nama_panggilan' => $request->nama_panggilan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'nik' => $request->nik,
        'alamat_lengkap' => $request->alamat_lengkap,
        'foto_ktp' => $fotoPath,
    ]);

    // Update kolom `add_people1-10` pada tabel `users`
    $user = Auth::user();
    for ($i = 1; $i <= 10; $i++) {
        $field = "add_people$i";
        if (is_null($user->$field)) {
            $user->$field = $people->id;
            $user->save();
            break;
        }
    }

    session()->flash('success', 'Data berhasil ditambahkan!');

    return redirect()->back();
}


    public function update(Request $request, $id)
    {
        try {
            $person = People::findOrFail($id);

            $request->validate([
                'nama_lengkap' => 'required|string|max:100',
                'nama_panggilan' => 'required|string|max:25',
                'jenis_kelamin' => 'required|in:L,P',
                'nik' => 'required|numeric|digits:16|unique:people,nik,' . $id,
                'alamat_lengkap' => 'required|string',
                'foto_ktp' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            ], [
                'nik.unique' => 'NIK sudah digunakan.',
            ]);

            $fotoPath = $person->foto_ktp;
            if ($request->hasFile('foto_ktp')) {
                if ($fotoPath) {
                    Storage::disk('public')->delete($fotoPath);
                }
                $fotoPath = $request->file('foto_ktp')->store('images/ktp', 'public');
            }

            $person->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nik' => $request->nik,
                'alamat_lengkap' => $request->alamat_lengkap,
                'foto_ktp' => $fotoPath,
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->first());
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $person = People::findOrFail($id);

        // Hapus relasi di tabel users
        $users = User::where(function ($query) use ($id) {
            for ($i = 1; $i <= 10; $i++) {
                $query->orWhere("add_people$i", $id);
            }
        })->get();

        foreach ($users as $user) {
            for ($i = 1; $i <= 10; $i++) {
                $field = "add_people$i";
                if ($user->$field == $id) {
                    $user->$field = null;
                    $user->save();
                }
            }
        }

        // Hapus foto jika ada
        if ($person->foto_ktp) {
            Storage::disk('public')->delete($person->foto_ktp);
        }

        $person->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }
}
