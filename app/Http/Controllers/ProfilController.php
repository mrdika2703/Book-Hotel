<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ambil user yang sedang login

        // Kirim data ke view
        return view('home.profil.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Mencari data user berdasarkan ID
            $user = User::findOrFail($id);

            // Validasi input request
            $request->validate([
                'username' => 'required|string|max:50|unique:users,username,' . $id,
                'nama_lengkap' => 'required|string|max:100',
                'nama_panggilan' => 'required|string|max:25',
                'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
                'email' => 'required|email|max:100|unique:users,email,' . $id,
                'no_telepon' => 'required|string|max:14',
                'password_confirmation' => 'required|string',
            ], [
                'username.unique' => 'Username sudah ada.',
                'email.unique' => 'Email sudah ada.',
                'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            ]);

            // Verifikasi password lama
            if (!Hash::check($request->password_confirmation, $user->password)) {
                return redirect()->back()->withErrors(['password_confirmation' => 'Password salah.'])->withInput();
            }

            // Siapkan data untuk diupdate
            $dataToUpdate = [
                'username' => $request->username,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
            ];

            // Perbarui data user
            $user->update($dataToUpdate);

            // Kirim flash message sukses
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function password(Request $request, $id)
    {
        try {
            // Cari user berdasarkan ID
            $user = User::findOrFail($id);

            // Validasi input
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:8|confirmed',
            ], [
                'current_password.required' => 'Password saat ini wajib diisi.',
                'new_password.required' => 'Password baru wajib diisi.',
                'new_password.min' => 'Password baru minimal 8 karakter.',
                'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            ]);

            // Verifikasi password saat ini
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }

            // Update password baru
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Validasi input
            $request->validate([
                'password_confirmation' => 'required|string',
            ], [
                'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            ]);

            // Verifikasi password lama
            if (!Hash::check($request->password_confirmation, $user->password)) {
                return redirect()->back()->withErrors(['password_confirmation' => 'Password salah.'])->withInput();
            }

            // Hapus data pengguna
            $user->delete();

            // Kirim flash message sukses
            return redirect()->route('login')->with('success', 'Akun berhasil dihapus');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
