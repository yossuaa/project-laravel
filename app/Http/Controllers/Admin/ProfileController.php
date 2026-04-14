<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'deskripsi' => 'required',
            'headline_visi' => 'required',
            'deskripsi_visi' => 'required',
            'headline_misi' => 'required',
            'deskripsi_misi' => 'required',
            'gambar_profile' => 'image|mimes:jpg,jpeg,png|max:2048',
            'gambar_visi' => 'image|mimes:jpg,jpeg,png|max:2048',
            'gambar_misi' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar-gambar
        $data = $request->only([
            'headline',
            'deskripsi',
            'headline_visi',
            'deskripsi_visi',
            'headline_misi',
            'deskripsi_misi',
        ]);

        if ($request->hasFile('gambar_profile')) {
            $filename = time() . '_profile.' . $request->gambar_profile->extension();
            $request->gambar_profile->move(public_path('profile'), $filename);
            $data['gambar_profile'] = $filename;
        }

        if ($request->hasFile('gambar_visi')) {
            $filename = time() . '_visi.' . $request->gambar_visi->extension();
            $request->gambar_visi->move(public_path('profile'), $filename);
            $data['gambar_visi'] = $filename;
        }

        if ($request->hasFile('gambar_misi')) {
            $filename = time() . '_misi.' . $request->gambar_misi->extension();
            $request->gambar_misi->move(public_path('profile'), $filename);
            $data['gambar_misi'] = $filename;
        }

        Profile::create($data);

        return redirect()->route('profile.index')
            ->with('success', 'Profile berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'headline' => 'required',
            'deskripsi' => 'required',
            'headline_visi' => 'required',
            'deskripsi_visi' => 'required',
            'headline_misi' => 'required',
            'deskripsi_misi' => 'required',
            'gambar_profile' => 'image|mimes:jpg,jpeg,png|max:2048',
            'gambar_visi' => 'image|mimes:jpg,jpeg,png|max:2048',
            'gambar_misi' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profile::findOrFail($id);

        $profile->headline = $request->headline;
        $profile->deskripsi = $request->deskripsi;
        $profile->headline_visi = $request->headline_visi;
        $profile->deskripsi_visi = $request->deskripsi_visi;
        $profile->headline_misi = $request->headline_misi;
        $profile->deskripsi_misi = $request->deskripsi_misi;

        if ($request->hasFile('gambar_profile')) {
            $filename = time() . '_profile.' . $request->gambar_profile->extension();
            $request->gambar_profile->move(public_path('profile'), $filename);
            $profile->gambar_profile = $filename;
        }

        if ($request->hasFile('gambar_visi')) {
            $filename = time() . '_visi.' . $request->gambar_visi->extension();
            $request->gambar_visi->move(public_path('profile'), $filename);
            $profile->gambar_visi = $filename;
        }

        if ($request->hasFile('gambar_misi')) {
            $filename = time() . '_misi.' . $request->gambar_misi->extension();
            $request->gambar_misi->move(public_path('profile'), $filename);
            $profile->gambar_misi = $filename;
        }

        $profile->save();

        return redirect()->route('profile.index')
            ->with('success', 'Profile berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Profile berhasil dihapus!');
    }
}
