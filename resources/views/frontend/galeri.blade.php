@include('layout.navbar')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Space Grotesk CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- HERO SECTION -->
    <section class="relative w-full h-[250px] overflow-hidden" data-aos="fade-up">
        <img src="{{ asset('galeri/'.$galeri->background) }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <h1 class="text-white text-3xl font-bold text-center whitespace-pre-line"
                style="font-family: 'Space Grotesk', sans-serif;">
                {{ $galeri->headline }}
            </h1>
        </div>
    </section>

    <!-- QUOTES OUTSIDE HERO -->
    <div class="px-6 py-2 bg-gray-50" data-aos="fade-up">
        <p class="text-gray-800 max-w-3xl mx-auto text-center text-sm whitespace-pre-line">
            {{ $galeri->quotes }}
        </p>
    </div>

    <!-- FOTO GRID -->
    <section class="px-6 py-8 bg-[linear-gradient(90deg,#511314,#ffffff)]" data-aos="fade-up">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
            @foreach ($fotos as $foto)
                <div class="rounded-lg overflow-hidden shadow" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset('galeri/'.$foto->gambar) }}" class="w-full h-[100px] object-cover">
                </div>
            @endforeach
        </div>
    </section>

    <!-- GALERI USER -->
    <section class="py-12 px-4 md:px-12 text-white bg-[#511314] w-full relative overflow-hidden min-h-screen">

        <!-- Elemen background tanpa terganggu opacity -->
        <img src="{{ url('galeri/'.$galeriUser->elemen) }}"
             alt="Elemen background"
             class="absolute inset-0 w-full h-full object-cover opacity-20 z-0 pointer-events-none select-none"
             data-aos="slide-up"
             style="opacity:0.2 !important;">
        <br>
        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-start justify-between relative z-10">
            <!-- TEKS -->
            <div class="w-full md:w-1/2" data-aos="fade-right">
                <h1 class="text-3xl md:text-4xl font-bold whitespace-pre-line" style="font-family: 'Space Grotesk';">
                    {{ $galeriUser->headline }}
                </h1>
                <p class="md:text-[14px] mt-4 mb-4 text-justify">
                    {{ $galeriUser->deskripsi }}
                </p>
            </div>

            <div class="w-full md:w-1/2 flex justify-center items-center mt-8 md:mt-0" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('galeri/'.$galeriUser->gambar) }}"
                     class="w-full md:w-[1100px] max-w-none drop-shadow-2xl relative top-20 mx-auto -ml-73">
            </div>

        </div>
    </section>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1000, // durasi animasi ms
        once: true,     // animasi hanya sekali saat scroll
      });
    </script>

</body>
</html>
