<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationPage;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // ===============================
    // INDEX DASHBOARD
    // ===============================
    public function index()
    {
        $reservations = Reservation::latest()->get();
        $page = ReservationPage::first();

        return view('admin.reservation.index', compact('reservations', 'page'));
    }

    // ===============================
    // RESERVATION CRUD
    // ===============================
    public function create()
    {
        return view('admin.reservation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'            => 'required|max:255',
            'nomor_telepon'   => 'required|max:20',
            'instansi'        => 'nullable|max:255',
            'jenis_kunjungan' => 'required',
            'waktu_kunjungan' => 'required|date',
        ]);

        Reservation::create($request->only([
            'nama',
            'nomor_telepon',
            'instansi',
            'jenis_kunjungan',
            'waktu_kunjungan'
        ]));

        return redirect()
            ->route('reservation.index')
            ->with('success', 'Reservation berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate([
            'nama'            => 'required|max:255',
            'nomor_telepon'   => 'required|max:20',
            'instansi'        => 'nullable|max:255',
            'jenis_kunjungan' => 'required',
            'waktu_kunjungan' => 'required|date',
        ]);

        $reservation->update($request->only([
            'nama',
            'nomor_telepon',
            'instansi',
            'jenis_kunjungan',
            'waktu_kunjungan'
        ]));

        return redirect()
            ->route('reservation.index')
            ->with('success', 'Reservation berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();

        return back()->with('success', 'Reservation berhasil dihapus!');
    }

    // ===============================
    // RESERVATION PAGE EDIT
    // ===============================
    public function editPage($id)
    {
        $page = ReservationPage::findOrFail($id);
        return view('admin.reservation.edit_page', compact('page'));
    }

    public function updatePage(Request $request, $id)
    {
        $request->validate([
            'headline'         => 'required|max:255',
            'subheadline'      => 'nullable|max:255',
            'headline_form'    => 'nullable|max:255',
            'subheadline_form' => 'nullable|max:255',
            'background'       => 'nullable|image|max:2048',
            'mockup'           => 'nullable|image|max:2048',
        ]);

        $page = ReservationPage::findOrFail($id);

        foreach (['background', 'mockup'] as $field) {
            if ($request->hasFile($field)) {
                if ($page->$field && file_exists(public_path("reservasi/{$page->$field}"))) {
                    unlink(public_path("reservasi/{$page->$field}"));
                }

                $file = $request->file($field);
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('reservasi'), $filename);

                $page->$field = $filename;
            }
        }

        $page->update($request->only([
            'headline',
            'subheadline',
            'headline_form',
            'subheadline_form'
        ]));

        return redirect()
            ->route('reservation.index')
            ->with('success', 'Halaman Reservation berhasil diperbarui!');
    }
}
