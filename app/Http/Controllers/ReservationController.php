<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationPage;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Ambil konten halaman
        $page = ReservationPage::first();
        return view('frontend.reservation', compact('page'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'nama' => 'required|string',
            'nomor_telepon' => 'required|string',
            'instansi' => 'nullable|string',
            'jenis_kunjungan' => 'required|string',
            'waktu_kunjungan' => 'required|date',
        ]);

        // ❗ CEK WAKTU RESERVASI YANG SAMA
        $sudahAda = Reservation::where('waktu_kunjungan', $data['waktu_kunjungan'])->exists();

        if ($sudahAda) {
            return back()
                ->withErrors([
                    'waktu_kunjungan' => 'Waktu reservasi sudah terisi, silakan pilih waktu lain.'
                ])
                ->withInput();
        }

        // Simpan ke database
        Reservation::create($data);

        // Kembalikan ke halaman dengan data sukses
        return back()->with('success', $data);
    }
}
