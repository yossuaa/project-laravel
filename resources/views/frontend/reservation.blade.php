@include('layout.navbar')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>{{ $page->headline }}</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-[#511314]">

<!-- HERO -->
<section class="relative w-full h-[200px]" data-aos="fade-up">
  <img src="{{ asset('reservasi/'.$page->background) }}" class="w-full h-full object-cover">
  <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center">
    <br><br><br>
    <h1 class="text-black text-4xl font-bold" style="font-family: 'Space Grotesk';">
      {{ $page->headline }}
    </h1>
    <p class="text-black mt-2">{{ $page->subheadline }}</p>
  </div>
</section>

<!-- CONTENT -->
<section class="relative w-full py-8"
         style="background-image: url('/reservasi/{{ $page->background1 }}');"
         data-aos="fade-up">

  <div class="flex flex-col md:flex-row justify-center gap-12 px-6 md:px-16">

    <!-- FORM CARD (TIDAK DIUBAH) -->
    <div class="flex-shrink-0 w-full h-[330px] md:w-[650px] bg-[#f3e7d2] rounded-2xl p-8 shadow-xl relative md:ml-28">

      <h2 class="text-xl font-bold mb-4 text-center">📘 Buku Tamu Digital</h2>
      <p class="text-sm text-gray-600 mb-6 text-center">Isi data untuk reservasi kunjungan</p>

      <!-- FORM -->
      <form action="{{ route('reservation.store') }}" method="POST"
            class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
        @csrf

        <!-- KIRI -->
        <div class="flex flex-col gap-4">
          <div>
            <label class="text-xs font-medium">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                   class="w-full p-2 rounded border text-sm" required>
          </div>

          <div>
            <label class="text-xs font-medium">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                   class="w-full p-2 rounded border text-sm" required>
          </div>

          <div>
            <label class="text-xs font-medium">Instansi</label>
            <input type="text" name="instansi" value="{{ old('instansi') }}"
                   class="w-full p-2 rounded border text-sm">
          </div>
        </div>

        <!-- KANAN -->
        <div class="flex flex-col gap-4">
          <div>
            <label class="text-xs font-medium">Jenis Kunjungan</label>
            <select name="jenis_kunjungan"
                    class="w-full p-2 rounded border text-sm" required>
              <option value="">-- pilih --</option>
              <option value="Edukasi" {{ old('jenis_kunjungan')=='Edukasi'?'selected':'' }}>Edukasi</option>
              <option value="Wisata" {{ old('jenis_kunjungan')=='Wisata'?'selected':'' }}>Wisata</option>
              <option value="Penelitian" {{ old('jenis_kunjungan')=='Penelitian'?'selected':'' }}>Penelitian</option>
            </select>
          </div>

          <div>
            <label class="text-xs font-medium">Waktu Kunjungan</label>
            <input type="datetime-local"
                   name="waktu_kunjungan"
                   value="{{ old('waktu_kunjungan') }}"
                   class="w-full p-2 rounded border text-sm"
                   required>
          </div>

          <div class="flex gap-4 mt-auto">
            <button type="submit"
                    class="bg-[#511314] text-white px-6 py-2 rounded hover:bg-[#6b1c1c] text-sm">
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- MOCKUP -->
    <div class="flex-shrink-0 w-[450px] relative top-8 md:ml-30"
         data-aos="fade-left"
         data-aos-delay="200">
      <img src="{{ asset('reservasi/'.$page->mockup) }}" class="w-full drop-shadow-2xl">
    </div>
  </div>
</section>

<!-- ================= POPUP ERROR ================= -->
@if ($errors->has('waktu_kunjungan'))
<div id="notif-error"
     class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
  <div class="bg-[#f3e7d2] rounded-2xl p-8 shadow-xl w-[350px] flex flex-col items-center gap-4">
    <h3 class="text-[#511314] font-bold text-lg text-center">
      Waktu Tidak Tersedia
    </h3>

    <p class="text-sm text-center text-gray-700">
      {{ $errors->first('waktu_kunjungan') }}
    </p>

    <button onclick="closeError()"
            class="bg-[#511314] text-white px-6 py-2 rounded hover:bg-[#6b1c1c] text-sm w-full">
      Tutup
    </button>
  </div>
</div>

<script>
  function closeError() {
    document.getElementById('notif-error').remove();
  }
</script>
@endif
<!-- ============================================== -->

<!-- NOTIF SUKSES -->
@if(session('success'))
<div id="notif-success"
     class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
  <div class="bg-[#f3e7d2] rounded-2xl p-8 shadow-xl w-[350px] flex flex-col items-center gap-4">
    <h3 class="text-[#511314] font-bold text-lg text-center">
      Data Kunjungan Berhasil Disimpan
    </h3>

    <button onclick="closeSuccess()"
            class="bg-[#511314] text-white px-6 py-2 rounded hover:bg-[#6b1c1c] text-sm w-full">
      Tutup
    </button>
  </div>
</div>

<script>
  function closeSuccess() {
    document.getElementById('notif-success').remove();
  }
</script>
@endif

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000, once: true });
</script>

</body>
</html>
