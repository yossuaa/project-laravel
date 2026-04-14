@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Edit Galeri</h1>

<a href="{{ route('galeri.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<form action="{{ route('galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="text-sm">Headline</label>
        <input type="text" name="headline" value="{{ $galeri->headline }}" class="w-full p-2 bg-gray-800 rounded" required>
    </div>

    <div>
        <label class="text-sm">Quotes / Subheadline</label>
        <input type="text" name="quotes" value="{{ $galeri->quotes }}" class="w-full p-2 bg-gray-800 rounded">
    </div>

    <div>
        <label class="text-sm">Gambar Saat Ini</label><br>
        @if($galeri->gambar)
        <img src="{{ asset('galeri/' . $galeri->gambar) }}" class="h-24 rounded mt-2 mb-3 border border-gray-700">
        @endif
    </div>

    <div>
        <label class="text-sm">Upload Gambar Baru (opsional)</label>
        <input type="file" name="gambar" class="w-full p-2 bg-gray-800 rounded">
        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
    </div>

    <button class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg">
        Update Galeri
    </button>
</form>
@endsection
