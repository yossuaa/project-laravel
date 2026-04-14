@extends('admin.layout.master')

@section('content')
<div class="space-y-4">
    <h1 class="text-2xl font-bold">Admin Dashboard</h1>
    <p class="text-gray-600">Selamat datang di halaman admin.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

        {{-- HOMEPAGE INFO --}}
        <a href="{{ route('homepage-info.index') }}"
           class="p-6 bg-blue-500 text-white rounded-xl shadow hover:bg-blue-600 transition">
            <h3 class="text-xl font-semibold">Homepage Info</h3>
            <p class="text-sm mt-1">Kelola headline, subheadline, dan background.</p>
        </a>

        {{-- HOMEPAGE FEATURES --}}
        <a href="{{ route('homepage-features.index') }}"
           class="p-6 bg-green-500 text-white rounded-xl shadow hover:bg-green-600 transition">
            <h3 class="text-xl font-semibold">Homepage Features</h3>
            <p class="text-sm mt-1">Kelola fitur–fitur homepage.</p>
        </a>

        {{-- PROFILE --}}
        <a href="{{ route('profile.index') }}"
           class="p-6 bg-purple-500 text-white rounded-xl shadow hover:bg-purple-600 transition">
            <h3 class="text-xl font-semibold">Profile</h3>
            <p class="text-sm mt-1">Kelola profile, visi, dan misi.</p>
        </a>
         {{-- Event--}}
        <a href="{{ route('event.index') }}"
           class="p-6 bg-purple-500 text-white rounded-xl shadow hover:bg-purple-600 transition">
            <h3 class="text-xl font-semibold">Event</h3>
            <p class="text-sm mt-1">Kelola Event Lebih Menarik</p>
        </a>

         {{-- Galeri --}}
        <a href="{{ route('galeri.index') }}"
           class="p-6 bg-purple-500 text-white rounded-xl shadow hover:bg-purple-600 transition">
            <h3 class="text-xl font-semibold">Galeri</h3>
            <p class="text-sm mt-1">Ubah Galery Foto dan User dari Fitur Galeri</p>
        </a>

         {{-- Lokasi --}}
        <a href="{{ route('location.index') }}"
           class="p-6 bg-purple-500 text-white rounded-xl shadow hover:bg-purple-600 transition">
            <h3 class="text-xl font-semibold">Lokasi & Kontak</h3>
            <p class="text-sm mt-1">Sesuaikan Kontak dan Lokasi Anda</p>
        </a>

         {{-- Reservasi --}}
        <a href="{{ route('reservation.index') }}"
           class="p-6 bg-purple-500 text-white rounded-xl shadow hover:bg-purple-600 transition">
            <h3 class="text-xl font-semibold">Reservasi</h3>
            <p class="text-sm mt-1">Sesuaikan Data Kunjungan Anda</p>
        </a>

    </div>
</div>
@endsection
