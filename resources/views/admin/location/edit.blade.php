@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Edit Kontak & Lokasi</h1>

<a href="{{ route('location.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200">
    ← Kembali
</a>

<div class="bg-gray-900 border border-gray-700 p-6 rounded-xl text-white max-w-4xl">

<form action="{{ route('location.update', $location->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">
@csrf
@method('PUT')

    <div>
        <label class="text-sm font-semibold">Headline</label>
        <input type="text" name="headline"
               value="{{ $location->headline }}"
               class="w-full bg-gray-800 p-2 rounded"
               required>
    </div>

    <div>
        <label class="text-sm font-semibold">Sub Headline</label>
        <input type="text" name="subheadline"
               value="{{ $location->subheadline }}"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    <div>
        <label class="text-sm font-semibold">Deskripsi</label>
        <textarea name="deskripsi"
                  class="w-full bg-gray-800 p-2 rounded"
                  rows="3">{{ $location->deskripsi }}</textarea>
    </div>

    <div>
        <label class="text-sm font-semibold">Alamat</label>
        <textarea name="alamat"
                  class="w-full bg-gray-800 p-2 rounded"
                  rows="2">{{ $location->alamat }}</textarea>
    </div>

    <div>
        <label class="text-sm font-semibold">Jam Operasional</label>
        <input type="text" name="open"
               value="{{ $location->open }}"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    <div>
        <label class="text-sm font-semibold">Instagram</label>
        <input type="text" name="instagram"
               value="{{ $location->instagram }}"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    {{-- MAPS --}}
    <div>
        <label class="text-sm font-semibold">Maps</label>
        <img src="{{ asset('lokasi/'.$location->maps) }}"
             class="h-32 rounded mb-2">
        <input type="file" name="maps"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    {{-- FOTO --}}
    <div>
        <label class="text-sm font-semibold">Foto Lokasi</label>
        <img src="{{ asset('lokasi/'.$location->foto) }}"
             class="h-32 rounded mb-2">
        <input type="file" name="foto"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    {{-- ELEMEN --}}
    <div>
        <label class="text-sm font-semibold">Elemen Dekorasi</label>
        <img src="{{ asset('lokasi/'.$location->elemen) }}"
             class="h-32 rounded mb-2">

        <input type="file" name="elemen"
               class="w-full bg-gray-800 p-2 rounded">
        <p class="text-xs text-gray-400">
            Kosongkan jika tidak ingin mengganti elemen
        </p>
    </div>

    <div class="flex gap-3 pt-4">
        <button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-xl">
            Update
        </button>

        <a href="{{ route('location.index') }}"
           class="px-6 py-2 bg-gray-700 hover:bg-gray-600 rounded-xl">
           Batal
        </a>
    </div>

</form>
</div>
@endsection
