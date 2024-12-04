<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseController extends Controller
{
    public function checkConnection()
    {
        try {
            // Memeriksa koneksi database
            DB::connection()->getPdo();

            // Memeriksa apakah tabel 'users' ada
            $tables = Schema::hasTable('users') ? 'Tabel users ditemukan' : 'Tabel users tidak ditemukan';

            return view('database.connection', [
                'message' => 'Koneksi ke database berhasil.',
                'tables' => $tables,
            ]);
        } catch (\Exception $e) {
            return view('database.connection', [
                'message' => 'Koneksi ke database gagal: ' . $e->getMessage(),
                'tables' => 'Tidak dapat memeriksa tabel.',
            ]);
        }
    }
}
