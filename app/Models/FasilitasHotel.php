<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasHotel extends Model
{
    protected $table = 'fasilitas_hotel';

    protected $fillable = [
        'nama_fasilitas',
        'deskripsi_fasilitas',
        'foto1',
        'foto2',
        'foto3'
    ];
}
