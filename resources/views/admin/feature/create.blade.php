@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-6">Tambah Feature</h1>

<form action="{{ route('homepage-features.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block mb-1">Nama Fitur</label>
        <input type="text" name="nama_fitur"
               class="w-full p-3 bg-gray-700 rounded text-white"
               required>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Keterangan</label>
        <textarea name="keterangan"
                  class="w-full p-3 bg-gray-700 rounded text-white"
                  required></textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Nama File Gambar</label>
        <input type="text" name="gambar"
               placeholder="contoh: 1.png"
               class="w-full p-3 bg-gray-700 rounded text-white"
               required>
    </div>

    <div class="flex gap-3">
        <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white">
            Simpan
        </button>

        <a href="{{ route('homepage-features.index') }}"
           class="px-6 py-2 bg-gray-600 hover:bg-gray-700 rounded text-white">
            Kembali
        </a>
    </div>

</form>
@endsection
