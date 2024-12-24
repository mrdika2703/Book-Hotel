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

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:8',
            'role' => ['required', Rule::in(['admin', 'resepsionis', 'tamu'])],
            'nama_lengkap' => 'required|string|max:100',
            'nama_panggilan' => 'required|string|max:25',
            'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
            'email' => 'required|email|max:100|unique:users,email',
            'no_telepon' => 'required|string|max:50',
        ], [
            'username.unique' => 'Username sudah ada.',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        session()->flash('success', 'Data berhasil ditambah!');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        try {
            // Mencari data user berdasarkan ID
            $users = User::findOrFail($id);

            // Validasi input request
            $request->validate([
                'username' => 'required|string|max:50|unique:users,username,' . $id,
                'password' => 'nullable|string|min:8', // Password opsional
                'role' => ['required', Rule::in(['admin', 'resepsionis', 'tamu'])],
                'nama_lengkap' => 'required|string|max:100',
                'nama_panggilan' => 'required|string|max:25',
                'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
                'email' => 'required|email|max:100|unique:users,email,' . $id,
                'no_telepon' => 'required|string|max:50',
            ], [
                'username.unique' => 'Username sudah ada.',
                'email.unique' => 'Email sudah ada.',
                'password.min' => 'Password minimal 8 karakter.',
                'role.required' => 'Role harus dipilih.',
                'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            ]);

            // Siapkan data untuk diupdate
            $dataToUpdate = [
                'username' => $request->username,
                'role' => $request->role,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
            ];

            // Jika password diisi, update password user
            if ($request->filled('password')) {
                $dataToUpdate['password'] = Hash::make($request->password);
            }

            // Perbarui data user
            $users->update($dataToUpdate);

            // Kirim flash message sukses
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }
}
