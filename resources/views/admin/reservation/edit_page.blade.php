@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Edit Halaman Reservation</h1>

<a href="{{ route('reservation.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<div class="bg-gray-900 border border-gray-700 p-6 rounded-xl text-white max-w-3xl">

    <form action="{{ route('reservation.updatePage', $page->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        {{-- HEADLINE --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Headline</label>
            <input type="text" name="headline"
                   value="{{ old('headline', $page->headline) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700"
                   required>
        </div>

        {{-- SUBHEADLINE --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Subheadline</label>
            <input type="text" name="subheadline"
                   value="{{ old('subheadline', $page->subheadline) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700">
        </div>

        {{-- HEADLINE FORM --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Headline Form</label>
            <input type="text" name="headline_form"
                   value="{{ old('headline_form', $page->headline_form) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700">
        </div>

        {{-- SUBHEADLINE FORM --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Subheadline Form</label>
            <input type="text" name="subheadline_form"
                   value="{{ old('subheadline_form', $page->subheadline_form) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700">
        </div>

        {{-- BACKGROUND --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Background</label>
            @if($page->background)
                <img src="{{ asset('reservasi/'.$page->background) }}"
                     class="w-full max-h-48 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="background"
                   class="w-full text-sm text-gray-300">
        </div>

        {{-- MOCKUP --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Mockup</label>
            @if($page->mockup)
                <img src="{{ asset('reservasi/'.$page->mockup) }}"
                     class="w-full max-h-48 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="mockup"
                   class="w-full text-sm text-gray-300">
        </div>

        <div class="flex gap-3 pt-4">
            <button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg">
                Simpan Perubahan
            </button>
            <a href="{{ route('reservation.index') }}"
               class="px-6 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection
