<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pemilih;
use App\Models\Candidate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin dengan data pemilih dan kandidat
    public function dashboard()
    {
        $pemilih = Pemilih::all(); // Mengambil data semua pemilih dari tabel pemilih
        $kandidat = Candidate::all(); // Mengambil data kandidat
        return view('admin.dashboard', compact('pemilih', 'kandidat'));
    }

    // Menambahkan kandidat dengan visi dan misi
    public function addCandidate(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        // Menyimpan data kandidat
        Candidate::create([
            'nama' => $request->nama,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->back()->with('success', 'Kandidat berhasil ditambahkan');
    }

    // Menghapus pemilih
    public function deletePemilih($id)
    {
        $pemilih = Pemilih::findOrFail($id); // Mencari pemilih berdasarkan ID dari tabel pemilih
        $pemilih->delete(); // Menghapus pemilih

        return redirect()->back()->with('success', 'Pemilih berhasil dihapus');
    }
}
