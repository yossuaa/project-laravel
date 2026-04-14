@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Edit Galeri User</h1>

<a href="{{ route('galeri.index') }}"
    class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<form action="{{ route('galeriUser.update', $user->id_galeriuser) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="text-sm">Headline</label>
        <input type="text" name="headline" value="{{ $user->headline }}" class="w-full p-2 bg-gray-800 rounded" required>
    </div>

    <div>
        <label class="text-sm">Deskripsi</label>
        <textarea name="deskripsi" class="w-full p-2 bg-gray-800 rounded" rows="4">{{ $user->deskripsi }}</textarea>
    </div>

    <div>
        <label class="text-sm">Gambar Saat Ini</label><br>
        @if($user->gambar)
        <img src="{{ asset('galeri/'.$user->gambar) }}" class="h-24 mt-2 mb-3 rounded border border-gray-700">
        @endif
    </div>

    <div>
        <label class="text-sm">Upload Gambar Baru (opsional)</label>
        <input type="file" name="gambar" class="w-full p-2 bg-gray-800 rounded">
        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
    </div>

    <div>
        <label class="text-sm">Elemen Saat Ini</label><br>
        @if($user->elemen)
        <img src="{{ asset('galeri/'.$user->elemen) }}" class="h-24 mt-2 mb-3 rounded border border-gray-700">
        @endif
    </div>

    <div>
        <label class="text-sm">Upload Elemen Baru (opsional)</label>
        <input type="file" name="elemen" class="w-full p-2 bg-gray-800 rounded">
        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti elemen.</p>
    </div>

    <button class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg">
        Update Galeri User
    </button>
</form>

@endsection