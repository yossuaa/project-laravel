@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-6">Edit Feature</h1>

<form action="{{ route('homepage-features.update', $feature->id_feature) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1">Nama Fitur</label>
        <input type="text" name="nama_fitur" value="{{ $feature->nama_fitur }}"
               class="w-full p-3 bg-gray-700 rounded text-white">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Keterangan</label>
        <textarea name="keterangan"
                  class="w-full p-3 bg-gray-700 rounded text-white">{{ $feature->keterangan }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Nama File Gambar</label>
        <input type="text" name="gambar" value="{{ $feature->gambar }}"
               class="w-full p-3 bg-gray-700 rounded text-white">
    </div>

    <div class="flex gap-3">
        <button class="px-6 py-2 bg-yellow-600 hover:bg-yellow-700 rounded text-white">
            Update
        </button>

        <a href="{{ route('homepage-features.index') }}"
           class="px-6 py-2 bg-gray-600 hover:bg-gray-700 rounded text-white">
            Kembali
        </a>
    </div>

</form>

@endsection
