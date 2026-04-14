@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Homepage Info</h1>

<form action="{{ route('homepage-info.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label class="block mb-2">Headline</label>
    <input type="text" name="headline" class="w-full border p-2 mb-4">

    <label class="block mb-2">Subheadline</label>
    <input type="text" name="subheadline" class="w-full border p-2 mb-4">

    <label class="block mb-2">Background Image</label>
    <input type="file" name="background_image" class="mb-4">

    <button class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
</form>
@endsection
