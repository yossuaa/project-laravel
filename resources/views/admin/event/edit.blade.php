@extends('admin.layout.master')

@section('content')
<h1 class="text-3xl font-bold mb-5">Edit Event</h1>

<a href="{{ route('event.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<form action="{{ route('event.update', $event->id_event) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <label>Kategori</label>
    <select name="category" class="w-full p-2 bg-gray-800 rounded">
        <option value="top_event" @if($event->category=='top_event') selected @endif>Top Event</option>
        <option value="top_workshop" @if($event->category=='top_workshop') selected @endif>Top Workshop</option>
        <option value="sharing_session" @if($event->category=='sharing_session') selected @endif>Sharing Session</option>
    </select>

    <label>Headline</label>
    <input type="text" name="headline" value="{{ $event->headline }}" class="w-full p-2 bg-gray-800 rounded" required>

    <label>Subheadline</label>
    <input type="text" name="subheadline" value="{{ $event->subheadline }}" class="w-full p-2 bg-gray-800 rounded">

    <label>Tanggal</label>
    <input type="date" name="date" value="{{ $event->date }}" class="w-full p-2 bg-gray-800 rounded" required>

    <label>Deskripsi</label>
    <textarea name="description" rows="5" class="w-full p-2 bg-gray-800 rounded">{{ $event->description }}</textarea>

    <label>Gambar Saat Ini</label><br>
    <img src="{{ asset('event/' . $event->image) }}" class="h-24 rounded mt-2 mb-3 border border-gray-700">

    <label>Upload Gambar Baru (opsional)</label>
    <input type="file" name="image" class="w-full p-2 bg-gray-800 rounded">
    <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar</p>

    <label>Link Tujuan</label>
    <input type="text" name="link_tujuan" value="{{ $event->link_tujuan }}" class="w-full p-2 bg-gray-800 rounded">

    <button class="px-4 py-2 bg-yellow-600 text-white rounded">Update Event</button>
</form>

@endsection
