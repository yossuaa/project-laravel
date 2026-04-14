@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Dashboard Galeri</h1>

<!-- BACK BUTTON -->
<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali ke Dashboard
</a>

{{-- ================= GALERI UTAMA ================= --}}
<h2 class="text-2xl font-bold mt-8 mb-4">Galeri Utama</h2>
<a href="{{ route('galeri.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white mb-4 inline-block">+ Tambah Galeri</a>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($galeri as $g)
    <div class="bg-gray-900 border border-gray-700 rounded-xl p-4 shadow hover:shadow-xl transition">
        @if($g->gambar)
        <img src="{{ asset('galeri/'.$g->gambar) }}" class="h-28 w-full object-cover rounded mb-2">
        @endif
        <h3 class="text-lg font-semibold">{{ $g->headline }}</h3>
        <p class="text-gray-400 text-sm">{{ $g->quotes }}</p>

        <div class="flex gap-2 mt-3">
            <a href="{{ route('galeri.edit', $g->id_galeri) }}" class="px-2 py-1 bg-yellow-600 hover:bg-yellow-700 text-white text-xs rounded">Edit</a>

            <form action="{{ route('galeri.destroy', $g->id_galeri) }}" method="POST" onsubmit="return confirm('Hapus galeri ini?')">
                @csrf
                @method('DELETE')
                <button class="px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded">Hapus</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

{{-- ================= FOTO GALERI ================= --}}
<h2 class="text-2xl font-bold mt-10 mb-4">Foto Galeri</h2>

<form action="{{ route('galeriFoto.store') }}" method="POST" enctype="multipart/form-data" class="mb-4 space-y-2">
    @csrf
    <div>
        <label class="text-sm">Pilih Galeri</label>
        <select name="id_galeri" class="w-full p-2 bg-gray-800 rounded">
            @foreach($galeri as $g)
            <option value="{{ $g->id_galeri }}">{{ $g->headline }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="text-sm">Foto</label>
        <input type="file" name="gambar" class="w-full p-2 bg-gray-800 rounded" required>
    </div>
    <div>
        <label class="text-sm">Caption (opsional)</label>
        <input type="text" name="caption" class="w-full p-2 bg-gray-800 rounded">
    </div>
    <div>
        <label class="text-sm">Urutan (opsional)</label>
        <input type="number" name="urutan" class="w-full p-2 bg-gray-800 rounded">
    </div>
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Upload Foto</button>
</form>

<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
    @foreach($fotos as $foto)
    <div class="bg-gray-900 p-2 rounded shadow">
        <img src="{{ asset('galeri/'.$foto->gambar) }}" class="h-32 w-full object-cover rounded mb-1">
        <p class="text-gray-400 text-sm">{{ $foto->caption ?? '-' }}</p>
        <form action="{{ route('galeriFoto.destroy', $foto->id_foto) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
            @csrf
            @method('DELETE')
            <button class="px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded mt-1">Hapus</button>
        </form>
    </div>
    @endforeach
</div>

{{-- ================= GALERI USER ================= --}}
<h2 class="text-2xl font-bold mt-10 mb-4">Galeri User</h2>
<div class="bg-gray-900 p-4 rounded shadow mb-4">
    <h3 class="text-lg font-semibold">{{ $galeriUser->headline }}</h3>
    <p class="text-gray-400">{{ $galeriUser->deskripsi }}</p>
    @if($galeriUser->gambar)
    <img src="{{ asset('galeri/'.$galeriUser->gambar) }}" class="h-32 mt-2 rounded">
    @endif
    @if($galeriUser->elemen)
    <img src="{{ asset('galeri/'.$galeriUser->elemen) }}" class="h-32 mt-2 rounded">
    @endif

    <a href="{{ route('galeriUser.edit', $galeriUser->id_galeriuser) }}" class="px-3 py-1 bg-yellow-600 hover:bg-yellow-700 text-white rounded text-xs mt-2 inline-block">Edit Galeri User</a>
</div>
{{-- FORM UNTUK MENGUBAH URUTAN FOTO --}}
<h3 class="text-lg font-semibold mt-6 mb-2">Atur Urutan Foto</h3>
<form action="{{ route('galeriFoto.updateUrutan') }}" method="POST" class="space-y-2">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        @foreach($fotos as $foto)
        <div class="bg-gray-800 p-2 rounded">
            <img src="{{ asset('galeri/'.$foto->gambar) }}" class="h-28 w-full object-cover rounded mb-1">
            <input type="hidden" name="id_foto[]" value="{{ $foto->id_foto }}">
            <label class="text-xs text-gray-300">Urutan</label>
            <input type="number" name="urutan[]" value="{{ $foto->urutan }}" class="w-full p-1 rounded bg-gray-700 text-white text-xs">
        </div>
        @endforeach
    </div>
    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded mt-3">Update Urutan</button>
</form>
@endsection
