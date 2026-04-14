@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Profile Website</h1>

  <!-- BACK BUTTON -->
    <a href="{{ route('admin.dashboard') }}"
       class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
        ← Kembali ke Dashboard
    </a>
<br>

{{-- Jika belum ada data, tidak perlu tampilkan detail --}}
@if ($profile)
<div class="mt-6 bg-gray-900 border border-gray-700 p-5 rounded-xl text-white">

    {{-- HEADLINE PROFILE --}}
    <h2 class="text-xl font-semibold">{{ $profile->headline }}</h2>
    <p class="text-gray-400 text-sm mt-1">{{ $profile->deskripsi }}</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

        {{-- GAMBAR PROFILE --}}
        <div>
            <h3 class="font-semibold mb-1">Gambar Profile</h3>
            <img src="{{ asset('profile/' . $profile->gambar_profile) }}" class="rounded-lg shadow">
        </div>

        {{-- VISI --}}
        <div>
            <h3 class="font-semibold">{{ $profile->headline_visi }}</h3>
            <p class="text-gray-400 text-sm mt-1">{{ $profile->deskripsi_visi }}</p>
            <img src="{{ asset('profile/' . $profile->gambar_visi) }}" class="rounded-lg mt-2 shadow">
        </div>

        {{-- MISI --}}
        <div>
            <h3 class="font-semibold">{{ $profile->headline_misi }}</h3>
            <p class="text-gray-400 text-sm mt-1">{{ $profile->deskripsi_misi }}</p>
            <img src="{{ asset('profile/' . $profile->gambar_misi) }}" class="rounded-lg mt-2 shadow">
        </div>

    </div>
{{-- Jika belum ada data, tombol tambah --}}
@if (!$profile)
    <a href="{{ route('admin.profile.create') }}"
       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white ml-2">
       + Tambah Profile
    </a>
@else
   <!-- ACTION BUTTONS -->
<div class="mt-8 flex gap-4">

    <!-- EDIT BUTTON -->
    <a href="{{ route('profile.edit', $profile->id) }}"
       class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow-lg
              hover:bg-indigo-500 hover:shadow-indigo-500/40 transition">
        Edit
    </a>

    <!-- DELETE BUTTON -->
    <form action="{{ route('profile.destroy', $profile->id) }}"
          method="POST"
          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')

        <button class="px-6 py-3 rounded-xl bg-red-600 text-white font-semibold shadow-lg
                       hover:bg-red-500 hover:shadow-red-500/40 transition">
            Hapus
        </button>
    </form>

</div>

@endif

</div>
@endif
@endsection
