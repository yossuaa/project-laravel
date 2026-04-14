@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Kontak & Lokasi</h1>

<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali ke Dashboard
</a>

@if($location)
<div class="bg-gray-900 border border-gray-700 p-5 rounded-xl text-white">

    <h2 class="text-xl font-semibold">{{ $location->headline }}</h2>
    <p class="text-gray-400 text-sm mt-1">{{ $location->subheadline }}</p>
    <p class="text-gray-400 text-sm mt-1">{{ $location->deskripsi }}</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

        {{-- MAPS --}}
        <div>
            <h3 class="font-semibold mb-1">Maps</h3>
            <img src="{{ asset('lokasi/'.$location->maps) }}" class="rounded-lg shadow">
        </div>

        {{-- FOTO --}}
        <div>
            <h3 class="font-semibold mb-1">Foto Lokasi</h3>
            <img src="{{ asset('lokasi/'.$location->foto) }}" class="rounded-lg shadow">
        </div>

        {{-- ELEMEN --}}
        <div>
            <h3 class="font-semibold mb-1">Elemen</h3>
            <img src="{{ asset('lokasi/'.$location->elemen) }}" class="rounded-lg shadow">
        </div>

    </div>

    <div class="mt-8 flex gap-4">
        <a href="{{ route('location.edit', $location->id) }}"
           class="px-6 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-xl text-white">
           Edit
        </a>

        <form action="{{ route('location.destroy', $location->id) }}" method="POST"
              onsubmit="return confirm('Hapus data ini?')">
            @csrf
            @method('DELETE')
            <button class="px-6 py-2 bg-red-600 hover:bg-red-500 rounded-xl text-white">
                Hapus
            </button>
        </form>
    </div>

</div>
@else
<a href="{{ route('location.create') }}"
   class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white">
   + Tambah Lokasi
</a>
@endif
@endsection
