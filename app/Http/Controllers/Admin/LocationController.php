<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index()
    {
        $location = Location::first(); // hanya 1 data
        return view('admin.location.index', compact('location'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        return view('admin.location.create');
    }

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'headline'     => 'required|max:255',
            'subheadline'  => 'nullable|max:255',
            'deskripsi'    => 'nullable',
            'alamat'       => 'nullable',
            'open'         => 'nullable',
            'instagram'    => 'nullable',
            'maps'         => 'nullable|image|max:2048',
            'foto'         => 'nullable|image|max:2048',
            'elemen'       => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['maps', 'foto', 'elemen']);

        // MAPS
        if ($request->hasFile('maps')) {
            $file = $request->file('maps');
            $data['maps'] = time() . '_maps_' . $file->getClientOriginalName();
            $file->move(public_path('lokasi'), $data['maps']);
        }

        // FOTO
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $data['foto'] = time() . '_foto_' . $file->getClientOriginalName();
            $file->move(public_path('lokasi'), $data['foto']);
        }

        // ✅ ELEMEN
        if ($request->hasFile('elemen')) {
            $file = $request->file('elemen');
            $data['elemen'] = time() . '_elemen_' . $file->getClientOriginalName();
            $file->move(public_path('lokasi'), $data['elemen']);
        }

        Location::create($data);

        return redirect()->route('location.index')
            ->with('success', 'Kontak & Lokasi berhasil ditambahkan');
    }

    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'headline'     => 'required|max:255',
            'subheadline'  => 'nullable|max:255',
            'deskripsi'    => 'nullable',
            'alamat'       => 'nullable',
            'open'         => 'nullable',
            'instagram'    => 'nullable',
            'maps'         => 'nullable|image|max:2048',
            'foto'         => 'nullable|image|max:2048',
            'elemen'       => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['maps', 'foto', 'elemen']);

        // MAPS
        if ($request->hasFile('maps')) {
            if ($location->maps && file_exists(public_path('lokasi/' . $location->maps))) {
                unlink(public_path('lokasi/' . $location->maps));
            }
            $file = $request->file('maps');
            $data['maps'] = time() . '_maps_' . $file->getClientOriginalName();
            $file->move(public_path('lokasi'), $data['maps']);
        }

        // FOTO
        if ($request->hasFile('foto')) {
            if ($location->foto && file_exists(public_path('lokasi/' . $location->foto))) {
                unlink(public_path('lokasi/' . $location->foto));
            }
            $file = $request->file('foto');
            $data['foto'] = time() . '_foto_' . $file->getClientOriginalName();
            $file->move(public_path('lokasi'), $data['foto']);
        }

        // ✅ ELEMEN UPDATE
        if ($request->hasFile('elemen')) {
            if ($location->elemen && file_exists(public_path('lokasi/' . $location->elemen))) {
                unlink(public_path('lokasi/' . $location->elemen));
            }
            $file = $request->file('elemen');
            $data['elemen'] = time() . '_elemen_' . $file->getClientOriginalName();
            $file->move(public_path('lokasi'), $data['elemen']);
        }

        $location->update($data);

        return redirect()->route('location.index')
            ->with('success', 'Kontak & Lokasi berhasil diperbarui');
    }

    // ===============================
    // DELETE
    // ===============================
    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        foreach (['maps', 'foto', 'elemen'] as $file) {
            if ($location->$file && file_exists(public_path('lokasi/' . $location->$file))) {
                unlink(public_path('lokasi/' . $location->$file));
            }
        }

        $location->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
