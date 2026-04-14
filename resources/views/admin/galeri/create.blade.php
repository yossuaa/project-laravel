@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Tambah Galeri</h1>

<a href="{{ route('galeri.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="text-sm">Headline</label>
        <input type="text" name="headline" class="w-full p-2 bg-gray-800 rounded" required>
    </div>

    <div>
        <label class="text-sm">Quotes / Subheadline</label>
        <input type="text" name="quotes" class="w-full p-2 bg-gray-800 rounded">
    </div>

    <div>
        <label class="text-sm">Gambar (opsional)</label>
        <input type="file" name="gambar" class="w-full p-2 bg-gray-800 rounded">
    </div>

    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
        Simpan Galeri
    </button>
</form>
@endsection
