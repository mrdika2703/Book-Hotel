<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'role', 'nama_lengkap', 'nama_panggilan', 
        'jenis_kelamin', 'email', 'no_telepon', 'add_people1', 'add_people2', 'add_people3', 'add_people4', 'add_people5', 'add_people6', 'add_people7', 'add_people8', 'add_people9', 'add_people10'
    ];

    public function people1()
    {
        return $this->belongsTo(People::class, 'add_people1');
    }

    public function people2()
    {
        return $this->belongsTo(People::class, 'add_people2');
    }
    
    public function people3()
    {
        return $this->belongsTo(People::class, 'add_people3');
    }

    public function people4()
    {
        return $this->belongsTo(People::class, 'add_people4');
    }

    public function people5()
    {
        return $this->belongsTo(People::class, 'add_people5');
    }

    public function people6()
    {
        return $this->belongsTo(People::class, 'add_people6');
    }

    public function people7()
    {
        return $this->belongsTo(People::class, 'add_people7');
    }

    public function people8()
    {
        return $this->belongsTo(People::class, 'add_people8');
    }

    public function people9()
    {
        return $this->belongsTo(People::class, 'add_people9');
    }

    public function people10()
    {
        return $this->belongsTo(People::class, 'add_people10');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
