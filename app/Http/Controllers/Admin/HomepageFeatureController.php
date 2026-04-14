<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageFeature;
use Illuminate\Http\Request;

class HomepageFeatureController extends Controller
{
    public function index()
    {
        $features = HomepageFeature::all();
        return view('admin.feature.index', compact('features'));
    }

    public function create()
    {
        return view('admin.feature.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fitur' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required'   // pakai gambar yang sudah ada di public/homepage
        ]);

        HomepageFeature::create([
            'nama_fitur' => $request->nama_fitur,
            'keterangan' => $request->keterangan,
            'gambar' => $request->gambar
        ]);

        return redirect()->route('homepage-features.index')
            ->with('success', 'Feature created successfully!');
    }

    public function edit($id)
    {
        $feature = HomepageFeature::findOrFail($id);
        return view('admin.feature.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $feature = HomepageFeature::findOrFail($id);

        $feature->nama_fitur = $request->nama_fitur;
        $feature->keterangan = $request->keterangan;

        if ($request->gambar) {
            $feature->gambar = $request->gambar;
        }

        $feature->save();

        return redirect()->route('homepage-features.index')
            ->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        HomepageFeature::destroy($id);
        return back()->with('success', 'Feature deleted!');
    }
}
