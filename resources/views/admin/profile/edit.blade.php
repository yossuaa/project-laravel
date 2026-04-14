@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Edit Profile</h1>

<form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data"
      class="space-y-4 bg-gray-900 text-white p-6 rounded-xl">
    @csrf
    @method('PUT')

    <div>
        <label>Headline Profile</label>
        <input type="text" name="headline" value="{{ $profile->headline }}"
               class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label>Deskripsi Profile</label>
        <textarea name="deskripsi" rows="3"
                  class="w-full p-2 rounded bg-gray-800 border border-gray-700">{{ $profile->deskripsi }}</textarea>
    </div>

    <div>
        <label>Gambar Profile</label><br>
        <img src="{{ asset('profile/' . $profile->gambar_profile) }}" class="h-24 mb-2 rounded">
        <input type="file" name="gambar_profile" class="w-full text-white">
    </div>

    <hr class="border-gray-700">

    <div>
        <label>Headline Visi</label>
        <input type="text" name="headline_visi" value="{{ $profile->headline_visi }}"
               class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label>Deskripsi Visi</label>
        <textarea name="deskripsi_visi" rows="3"
                  class="w-full p-2 rounded bg-gray-800 border border-gray-700">{{ $profile->deskripsi_visi }}</textarea>
    </div>

    <div>
        <label>Gambar Visi</label><br>
        <img src="{{ asset('profile/' . $profile->gambar_visi) }}" class="h-24 mb-2 rounded">
        <input type="file" name="gambar_visi" class="w-full text-white">
    </div>

    <hr class="border-gray-700">

    <div>
        <label>Headline Misi</label>
        <input type="text" name="headline_misi" value="{{ $profile->headline_misi }}"
               class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label>Deskripsi Misi</label>
        <textarea name="deskripsi_misi" rows="3"
                  class="w-full p-2 rounded bg-gray-800 border border-gray-700">{{ $profile->deskripsi_misi }}</textarea>
    </div>

    <div>
        <label>Gambar Misi</label><br>
        <img src="{{ asset('profile/' . $profile->gambar_misi) }}" class="h-24 mb-2 rounded">
        <input type="file" name="gambar_misi" class="w-full text-white">
    </div>

    <button class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 rounded">Update</button>
</form>
@endsection
