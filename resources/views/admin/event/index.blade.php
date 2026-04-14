@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Event</h1>

<!-- BACK BUTTON -->
<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali ke Dashboard
</a>

<br>

<a href="{{ route('event.create') }}"
   class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white">
   + Tambah Event
</a>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mt-6">

    @foreach ($events as $e)
    <div class="bg-gray-900 border border-gray-700 rounded-xl p-2 shadow hover:shadow-xl transition">

        <div class="w-full h-28 bg-gray-800 rounded-lg flex items-center justify-center mb-3 overflow-hidden">
            <img src="{{ asset('event/' . $e->image) }}"
                 alt="{{ $e->headline }}"
                 class="max-h-full max-w-full object-contain">
        </div>

        <span class="text-xs px-2 py-1 bg-indigo-700 rounded">{{ $e->category }}</span>

        <h2 class="text-base font-semibold mt-2">{{ $e->headline }}</h2>

        <p class="text-gray-400 text-xs mt-1 leading-tight">{{ $e->subheadline }}</p>

        <p class="text-gray-500 text-xs mt-1">
            📅 {{ $e->date }}
        </p>

        <div class="flex gap-2 mt-3">
            <a href="{{ route('event.edit', $e->id_event) }}"
               class="px-2 py-1 bg-yellow-600 hover:bg-yellow-700 rounded text-white text-xs">
                Edit
            </a>

            <form action="{{ route('event.destroy', $e->id_event) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus event ini?')">
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
