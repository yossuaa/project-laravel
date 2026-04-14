@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Tambah Event</h1>

<a href="{{ route('event.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <label>Kategori</label>
    <select name="category" class="w-full p-2 bg-gray-800 rounded">
        <option value="top_event">Top Event</option>
        <option value="top_workshop">Top Workshop</option>
        <option value="sharing_session">Sharing Session</option>
    </select>

    <label>Headline</label>
    <input type="text" name="headline" class="w-full p-2 bg-gray-800 rounded" required>

    <label>Subheadline</label>
    <input type="text" name="subheadline" class="w-full p-2 bg-gray-800 rounded">

    <label>Tanggal</label>
    <input type="date" name="date" class="w-full p-2 bg-gray-800 rounded" required>

    <label>Deskripsi</label>
    <textarea name="description" rows="5" class="w-full p-2 bg-gray-800 rounded" required></textarea>

    <label>Gambar</label>
    <input type="file" name="image" class="w-full p-2 bg-gray-800 rounded" required>

    <label>Link Tujuan (opsional)</label>
    <input type="text" name="link_tujuan" class="w-full p-2 bg-gray-800 rounded">

    <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan Event</button>
</form>

@endsection
