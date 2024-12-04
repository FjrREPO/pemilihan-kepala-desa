<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pemilih extends Authenticatable
{
    protected $table = 'pemilih'; // Nama tabel yang digunakan

    protected $fillable = [
        'nik', 'nama', 'tanggal_lahir', 'alamat', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
