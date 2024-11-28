<?php

// app/Models/People.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'nik',
        'alamat_lengkap',
        'foto_ktp',
    ];
    // Menyediakan relasi jika diperlukan (misalnya ke tabel lain, jika ada).
}
