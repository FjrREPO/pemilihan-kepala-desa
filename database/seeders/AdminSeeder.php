<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nik' => '1234567890123456', // NIK unik
            'nama' => 'Admin Desa',
            'tanggal_lahir' => '1980-01-01', // Contoh tanggal lahir
            'alamat' => 'Jl. Admin Desa No. 1',
            'email' => 'admin@desa.com', // Email untuk login
            'password' => Hash::make('passwordadmin'), // Password hashed
            'role' => 'admin', // Role sebagai admin
        ]);
    }
}
