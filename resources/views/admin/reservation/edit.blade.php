@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Edit Reservasi</h1>

<a href="{{ route('reservation.index') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali
</a>

<div class="bg-gray-900 border border-gray-700 p-6 rounded-xl text-white max-w-2xl">

    <form action="{{ route('reservation.update', $reservation->id) }}"
          method="POST"
          class="space-y-5">
        @csrf
        @method('PUT')

        {{-- NAMA --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Nama</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $reservation->nama) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700"
                   required>
        </div>

        {{-- NO TELP --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Nomor Telepon</label>
            <input type="text" name="nomor_telepon"
                   value="{{ old('nomor_telepon', $reservation->nomor_telepon) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700"
                   required>
        </div>

        {{-- INSTANSI --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Instansi</label>
            <input type="text" name="instansi"
                   value="{{ old('instansi', $reservation->instansi) }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700">
        </div>

        {{-- JENIS KUNJUNGAN --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Jenis Kunjungan</label>
            <select name="jenis_kunjungan"
                    class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700"
                    required>
                <option value="Kunjungan Umum"
                    {{ $reservation->jenis_kunjungan == 'Kunjungan Umum' ? 'selected' : '' }}>
                    Kunjungan Umum
                </option>
                <option value="Survey"
                    {{ $reservation->jenis_kunjungan == 'Survey' ? 'selected' : '' }}>
                    Survey
                </option>
                <option value="Meeting"
                    {{ $reservation->jenis_kunjungan == 'Meeting' ? 'selected' : '' }}>
                    Meeting
                </option>
            </select>
        </div>

        {{-- WAKTU --}}
        <div>
            <label class="block mb-1 text-sm font-medium">Waktu Kunjungan</label>
            <input type="datetime-local" name="waktu_kunjungan"
                   value="{{ \Carbon\Carbon::parse($reservation->waktu_kunjungan)->format('Y-m-d\TH:i') }}"
                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700"
                   required>
        </div>

        <div class="flex gap-3 pt-4">
            <button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg">
                Update
            </button>
            <a href="{{ route('reservation.index') }}"
               class="px-6 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection
