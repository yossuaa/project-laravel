@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Tambah Kontak & Lokasi</h1>

<a href="{{ route('location.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200">
    ← Kembali
</a>

<div class="bg-gray-900 border border-gray-700 p-6 rounded-xl text-white max-w-4xl">

<form action="{{ route('location.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">
@csrf

    <div>
        <label class="text-sm font-semibold">Headline</label>
        <input type="text" name="headline"
               class="w-full bg-gray-800 p-2 rounded"
               required>
    </div>

    <div>
        <label class="text-sm font-semibold">Sub Headline</label>
        <input type="text" name="subheadline"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    <div>
        <label class="text-sm font-semibold">Deskripsi</label>
        <textarea name="deskripsi"
                  class="w-full bg-gray-800 p-2 rounded"
                  rows="3"></textarea>
    </div>

    <div>
        <label class="text-sm font-semibold">Alamat</label>
        <textarea name="alamat"
                  class="w-full bg-gray-800 p-2 rounded"
                  rows="2"></textarea>
    </div>

    <div>
        <label class="text-sm font-semibold">Jam Operasional</label>
        <input type="text" name="open"
               class="w-full bg-gray-800 p-2 rounded"
               placeholder="Contoh: 08.00 - 22.00">
    </div>

    <div>
        <label class="text-sm font-semibold">Instagram</label>
        <input type="text" name="instagram"
               class="w-full bg-gray-800 p-2 rounded">
    </div>

    <div>
        <label class="text-sm font-semibold">Maps (Image)</label>
        <input type="file" name="maps"
               class="w-full bg-gray-800 p-2 rounded"
               required>
    </div>

    <div>
        <label class="text-sm font-semibold">Foto Lokasi</label>
        <input type="file" name="foto"
               class="w-full bg-gray-800 p-2 rounded"
               required>
    </div>

    <div>
        <label class="text-sm font-semibold">Elemen Dekorasi</label>
        <input type="file" name="elemen"
               class="w-full bg-gray-800 p-2 rounded"
               required>
    </div>

    <div class="flex gap-3 pt-4">
        <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-xl">
            Simpan
        </button>

        <a href="{{ route('location.index') }}"
           class="px-6 py-2 bg-gray-700 hover:bg-gray-600 rounded-xl">
           Batal
        </a>
    </div>

</form>
</div>
@endsection
