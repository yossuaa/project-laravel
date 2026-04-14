<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\GaleriFoto;
use App\Models\GaleriUser;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // ===============================
    // INDEX DASHBOARD
    // ===============================
    public function index()
    {
        $galeri = Galeri::orderBy('id_galeri', 'desc')->get();
        $fotos  = GaleriFoto::orderBy('urutan', 'asc')->get();
        $galeriUser = GaleriUser::first();

        return view('admin.galeri.index', compact('galeri', 'fotos', 'galeriUser'));
    }

    // ===============================
    // GALERI CRUD
    // ===============================
    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required|max:255',
            'quotes'   => 'nullable|max:255',
            'gambar'   => 'nullable|image|max:2048'
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('galeri'), $filename);
        }

        Galeri::create([
            'headline' => $request->headline,
            'quotes'   => $request->quotes,
            'gambar'   => $filename,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dibuat!');
    }

    public function edit($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);

        $request->validate([
            'headline' => 'required|max:255',
            'quotes'   => 'nullable|max:255',
            'gambar'   => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && file_exists(public_path('galeri/' . $galeri->gambar))) {
                unlink(public_path('galeri/' . $galeri->gambar));
            }
            $file = $request->file('gambar');
            $galeri->gambar = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('galeri'), $galeri->gambar);
        }

        $galeri->headline = $request->headline;
        $galeri->quotes   = $request->quotes;
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);

        if ($galeri->gambar && file_exists(public_path('galeri/' . $galeri->gambar))) {
            unlink(public_path('galeri/' . $galeri->gambar));
        }

        $galeri->delete();
        return back()->with('success', 'Galeri berhasil dihapus!');
    }

    // ===============================
    // GALERI FOTO CRUD
    // ===============================
    public function storeFoto(Request $request)
    {
        $request->validate([
            'id_galeri' => 'required',
            'gambar'    => 'required|image|max:2048',
            'caption'   => 'nullable|max:255',
            'urutan'    => 'nullable|integer'
        ]);

        $filename = time() . '-' . $request->gambar->getClientOriginalName();
        $request->gambar->move(public_path('galeri'), $filename);

        GaleriFoto::create([
            'id_galeri' => $request->id_galeri,
            'gambar'    => $filename,
            'caption'   => $request->caption,
            'urutan'    => $request->urutan ?? 0
        ]);

        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

    public function destroyFoto($id_foto)
    {
        $foto = GaleriFoto::findOrFail($id_foto);

        if ($foto->gambar && file_exists(public_path('galeri/' . $foto->gambar))) {
            unlink(public_path('galeri/' . $foto->gambar));
        }

        $foto->delete();
        return back()->with('success', 'Foto berhasil dihapus!');
    }

    // ===============================
    // GALERI USER EDIT
    // ===============================
    public function editUser($id_galeriuser)
    {
        $user = GaleriUser::findOrFail($id_galeriuser);
        return view('admin.galeri.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id_galeriuser)
    {
        $request->validate([
            'headline' => 'required|max:255',
            'deskripsi' => 'nullable',
            'elemen'   => 'nullable|image|max:2048',
            'gambar'   => 'nullable|image|max:2048',
        ]);

        $user = GaleriUser::findOrFail($id_galeriuser);

        if ($request->hasFile('elemen')) {
            if ($user->elemen && file_exists(public_path('galeri/' . $user->elemen))) {
                unlink(public_path('galeri/' . $user->elemen));
            }
            $file = $request->file('elemen');
            $user->elemen = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('galeri'), $user->elemen);
        }

        if ($request->hasFile('gambar')) {
            if ($user->gambar && file_exists(public_path('galeri/' . $user->gambar))) {
                unlink(public_path('galeri/' . $user->gambar));
            }
            $file = $request->file('gambar');
            $user->gambar = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('galeri'), $user->gambar);
        }

        $user->headline  = $request->headline;
        $user->deskripsi = $request->deskripsi;
        $user->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri User berhasil diperbarui!');
    }
    public function updateUrutanFoto(Request $request)
    {
        $ids    = $request->id_foto;
        $urutan = $request->urutan;

        foreach ($ids as $index => $id) {
            $foto = GaleriFoto::find($id);
            if ($foto) {
                $foto->urutan = $urutan[$index];
                $foto->save();
            }
        }

        return back()->with('success', 'Urutan foto berhasil diperbarui!');
    }
}
