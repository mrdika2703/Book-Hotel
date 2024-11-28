<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'kamar';  // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'jenis_kamar',
        'jumlah_kamar',
        'fasilitas',
        'deskripsi_kamar',
        'harga_kamar',
        'foto1',
        'foto2',
        'foto3',
    ];
}
