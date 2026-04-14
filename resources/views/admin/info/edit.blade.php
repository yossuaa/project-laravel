@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-indigo-300">Edit Homepage Info</h1>

<form action="{{ route('homepage-info.update', $info->id_homepage) }}"
      method="POST" enctype="multipart/form-data"
      class="space-y-5">

    @csrf
    @method('PUT')

    <!-- Headline -->
    <div>
        <label class="block mb-1 text-gray-300 font-semibold">Headline</label>
        <input type="text" name="headline" value="{{ $info->headline }}"
               class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-gray-200
                      focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400">
    </div>

    <!-- Subheadline -->
    <div>
        <label class="block mb-1 text-gray-300 font-semibold">Subheadline</label>
        <input type="text" name="subheadline" value="{{ $info->subheadline }}"
               class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-gray-200
                      focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400">
    </div>

    <!-- Background Image -->
    <div>
        <label class="block mb-1 text-gray-300 font-semibold">Background Image</label>

        @if ($info->background_image)
            <div class="mb-3">
                <img src="{{ asset('homepage/' . $info->background_image) }}"
                     class="w-64 rounded shadow border border-gray-700">
            </div>
        @endif

        <input type="file" name="background_image"
               class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-gray-200
                      focus:border-indigo-400 focus:ring-1 focus:ring-indigo-400">
    </div>

    <!-- Button -->
    <button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-lg text-white font-semibold transition">
        Simpan Perubahan
    </button>

</form>
@endsection
