@extends('admin.layout.master')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- BACK BUTTON -->
    <a href="{{ route('admin.dashboard') }}"
       class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
        ← Kembali ke Dashboard
    </a>

    <!-- CARD WRAPPER -->
    <div class="bg-gray-900 rounded-2xl shadow-xl border border-gray-700 p-8">

        <!-- HEADER -->
        <h1 class="text-3xl font-bold text-white mb-2">Homepage Info</h1>
        <p class="text-gray-400 mb-6">Informasi yang tampil pada halaman utama website.</p>

        @if ($info)

        <!-- CARD CONTENT -->
        <div class="grid grid-cols-1 gap-6">

            <!-- HEADLINE -->
            <div class="p-5 bg-gray-800/80 rounded-xl border border-gray-700 shadow-inner">
                <h2 class="text-lg font-semibold text-indigo-300 mb-1">Headline</h2>
                <p class="text-gray-200">{{ $info->headline }}</p>
            </div>

            <!-- SUBHEADLINE -->
            <div class="p-5 bg-gray-800/80 rounded-xl border border-gray-700 shadow-inner">
                <h2 class="text-lg font-semibold text-indigo-300 mb-1">Subheadline</h2>
                <p class="text-gray-200">{{ $info->subheadline }}</p>
            </div>

            <!-- BACKGROUND IMAGE -->
            <div class="p-5 bg-gray-800/80 rounded-xl border border-gray-700 shadow-inner">
                <h2 class="text-lg font-semibold text-indigo-300 mb-3">Background Image</h2>

                <img src="{{ asset('homepage/' . $info->background_image) }}"
                     class="rounded-xl shadow-lg border border-gray-600 w-full max-w-3xl">
            </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div class="mt-8 flex gap-4">

            <!-- EDIT BUTTON -->
            <a href="{{ route('homepage-info.edit', $info->id_homepage) }}"
               class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow-lg
                      hover:bg-indigo-500 hover:shadow-indigo-500/40 transition">
                Edit
            </a>

            <!-- DELETE BUTTON -->
            <form action="{{ route('homepage-info.destroy', $info->id_homepage) }}"
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

        @else
            <p class="text-gray-300">Tidak ada data tersedia.</p>
        @endif

    </div>
</div>

@endsection
