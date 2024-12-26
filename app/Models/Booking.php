<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    protected $fillable = [
        'id_user_tamu',
        'id_people',
        'tanggal_book',
        'tanggal_checkin',
        'tanggal_checkout',
        'id_kamar',
        'pembayaran',
        'total_harga',
        'status',
        'id_user_accept',
        'jumlah_kamar',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_tamu');
    }

    public function accuser()
    {
        return $this->belongsTo(User::class, 'id_user_accept');
    }


    // Relasi ke model People
    public function people()
    {
        return $this->belongsTo(People::class, 'id_people');
    }

    public function peoplee()
    {
        return $this->belongsTo(People::class, 'id_people', 'id');
    }

    // Relasi ke model Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }

    public function kamarr()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id');
    }
}
