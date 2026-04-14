@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Tambah Profile</h1>

<form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data"
      class="space-y-4 bg-gray-900 text-white p-6 rounded-xl">
    @csrf

    <div>
        <label>Headline Profile</label>
        <input type="text" name="headline" class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label>Deskripsi Profile</label>
        <textarea name="deskripsi" rows="3" class="w-full p-2 rounded bg-gray-800 border border-gray-700"></textarea>
    </div>

    <div>
        <label>Gambar Profile</label>
        <input type="file" name="gambar_profile" class="w-full text-white">
    </div>

    <hr class="border-gray-700">

    <div>
        <label>Headline Visi</label>
        <input type="text" name="headline_visi" class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label>Deskripsi Visi</label>
        <textarea name="deskripsi_visi" rows="3" class="w-full p-2 rounded bg-gray-800 border border-gray-700"></textarea>
    </div>

    <div>
        <label>Gambar Visi</label>
        <input type="file" name="gambar_visi" class="w-full text-white">
    </div>

    <hr class="border-gray-700">

    <div>
        <label>Headline Misi</label>
        <input type="text" name="headline_misi" class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label>Deskripsi Misi</label>
        <textarea name="deskripsi_misi" rows="3" class="w-full p-2 rounded bg-gray-800 border border-gray-700"></textarea>
    </div>

    <div>
        <label>Gambar Misi</label>
        <input type="file" name="gambar_misi" class="w-full text-white">
    </div>

    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded">Simpan</button>
</form>
@endsection
