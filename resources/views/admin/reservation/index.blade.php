@extends('admin.layout.master')

@section('content')
<h1 class="text-2xl font-bold mb-5">Data Reservasi</h1>

<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center mb-6 text-indigo-300 hover:text-indigo-200 transition font-medium">
    ← Kembali ke Dashboard
</a>

{{-- KONTEN HALAMAN RESERVATION --}}
@if($page)
<div class="bg-gray-900 border border-gray-700 p-5 rounded-xl text-white mb-8">
    <h2 class="text-xl font-semibold">{{ $page->headline }}</h2>
    <p class="text-gray-400 text-sm mt-1">{{ $page->subheadline }}</p>
    <p class="text-gray-300 mt-3">{{ $page->deskripsi }}</p>

    <a href="{{ route('reservation.editPage', $page->id) }}"
       class="inline-block mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-white text-sm">
        Edit Konten Halaman
    </a>
</div>
@endif

{{-- TABEL RESERVASI --}}
<div class="bg-gray-900 border border-gray-700 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-300">
            <thead class="text-xs uppercase bg-gray-800 text-gray-400">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">No. Telepon</th>
                    <th class="px-4 py-3">Instansi</th>
                    <th class="px-4 py-3">Jenis Kunjungan</th>
                    <th class="px-4 py-3">Waktu Kunjungan</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $item)
                <tr class="border-b border-gray-700 hover:bg-gray-800">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-medium text-white">
                        {{ $item->nama }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $item->nomor_telepon }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $item->instansi ?? '-' }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $item->jenis_kunjungan }}
                    </td>
                    <td class="px-4 py-3">
                        {{ \Carbon\Carbon::parse($item->waktu_kunjungan)->format('d M Y H:i') }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('reservation.edit', $item->id) }}"
                               class="px-3 py-1 bg-yellow-500 hover:bg-yellow-400 rounded-lg text-white text-xs">
                                Edit
                            </a>

                            <form action="{{ route('reservation.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus data reservasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-500 rounded-lg text-white text-xs">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-400">
                        Belum ada data reservasi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
