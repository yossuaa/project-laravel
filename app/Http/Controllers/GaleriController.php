<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GaleriFoto;
use App\Models\GaleriUser;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        // Ambil data galeri utama
        $galeri = Galeri::first();

        // Ambil semua foto galeri
        $fotos = GaleriFoto::orderBy('urutan', 'asc')->get();

        // Ambil galeri user, termasuk kolom 'elemen'
        $galeriUser = GaleriUser::first();

        return view('frontend.galeri', compact('galeri', 'fotos', 'galeriUser'));
    }

    // Upload foto galeri biasa
    public function storeFoto(Request $request)
    {
        $request->validate([
            'id_galeri' => 'required',
            'gambar' => 'required|image'
        ]);

        $fileName = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('galeri'), $fileName);

        GaleriFoto::create([
            'id_galeri' => $request->id_galeri,
            'gambar' => $fileName
        ]);

        return back();
    }

    // Upload elemen untuk galeri user
    public function storeElemen(Request $request)
    {
        $request->validate([
            'id_galeri_user' => 'required',
            'elemen' => 'required|image'
        ]);

        $fileName = 'elemen_' . time() . '.' . $request->elemen->extension();

        $request->elemen->move(public_path('galeri'), $fileName);

        // Update kolom elemen di galeri user
        $galeriUser = GaleriUser::find($request->id_galeri_user);
        if ($galeriUser) {
            $galeriUser->update([
                'elemen' => $fileName
            ]);
        }

        return back();
    }
}
