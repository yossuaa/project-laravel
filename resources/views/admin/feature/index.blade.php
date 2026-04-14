@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Homepage Features</h1>

  <!-- BACK BUTTON -->
    <a href="{{ route('admin.dashboard') }}"
       class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
        ← Kembali ke Dashboard
    </a>
<br>
<a href="{{ route('homepage-features.create') }}"
   class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white">
   + Tambah Feature
</a>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mt-6">

    @foreach ($features as $f)
    <div class="bg-gray-900 border border-gray-700 rounded-xl p-2 shadow hover:shadow-xl transition">

        <div class="w-full h-20 bg-gray-800 rounded-lg flex items-center justify-center mb-2 overflow-hidden">
            <img src="{{ asset('homepage/' . $f->gambar) }}"
                 alt="{{ $f->nama_fitur }}"
                 class="max-h-full max-w-full object-contain">
        </div>

        <h2 class="text-base font-semibold">{{ $f->nama_fitur }}</h2>

        <p class="text-gray-400 text-xs mt-1 leading-tight">{{ $f->keterangan }}</p>

        <div class="flex gap-2 mt-2">

            <a href="{{ route('homepage-features.edit', $f->id_feature) }}"
               class="px-2 py-1 bg-yellow-600 hover:bg-yellow-700 rounded text-white text-xs">
                Edit
            </a>

            <form action="{{ route('homepage-features.destroy', $f->id_feature) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')

                <button class="px-2 py-1 bg-red-600 hover:bg-red-700 rounded text-white text-xs">
                    Hapus
                </button>
            </form>

        </div>

    </div>
    @endforeach

</div>

@endsection
