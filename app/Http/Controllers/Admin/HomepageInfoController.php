<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageInfo;
use Illuminate\Http\Request;

class HomepageInfoController extends Controller
{
    public function index()
    {
        $info = HomepageInfo::first();
        return view('admin.info.index', compact('info'));
    }

    public function create()
    {
        return view('admin.info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'subheadline' => 'required',
            'background_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // UPLOAD GAMBAR
        $filename = time() . '.' . $request->background_image->extension();
        $request->background_image->move(public_path('homepage'), $filename);

        HomepageInfo::create([
            'headline' => $request->headline,
            'subheadline' => $request->subheadline,
            'background_image' => $filename,
        ]);

        return redirect()->route('homepage-info.index')
            ->with('success', 'Homepage Info berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $info = HomepageInfo::findOrFail($id);
        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'headline' => 'required',
            'subheadline' => 'required',
            'background_image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $info = HomepageInfo::findOrFail($id);

        // UPLOAD GAMBAR JIKA ADA
        if ($request->hasFile('background_image')) {
            $filename = time() . '.' . $request->background_image->extension();
            $request->background_image->move(public_path('homepage'), $filename);
            $info->background_image = $filename;
        }

        $info->headline = $request->headline;
        $info->subheadline = $request->subheadline;
        $info->save();

        return redirect()->route('homepage-info.index')
            ->with('success', 'Homepage Info berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $info = HomepageInfo::findOrFail($id);
        $info->delete();

        return redirect()->route('homepage-info.index')
            ->with('success', 'Homepage Info berhasil dihapus!');
    }
}
