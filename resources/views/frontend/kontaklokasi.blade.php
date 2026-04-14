<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak & Lokasi</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#511314] font-[Space_Grotesk] text-white overflow-x-hidden">

    @include('layout.navbar')

    <!-- BACKGROUND ORNAMENT (SAMA SEPERTI GALERI) -->
    @if($location->elemen)
    <img src="{{ asset('lokasi/'.$location->elemen) }}"
         class="pointer-events-none fixed inset-0 w-full h-full object-cover opacity-[0.07] blur-[1px]"
         data-aos="slide-up">
    @endif

    <main class="relative z-10 w-full">

        <!-- HERO -->
        <header class="pt-24 px-8 md:px-14" data-aos="fade-up">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl md:text-[32px] font-bold" style="font-family: 'Space Grotesk';">
                    {{ $location->headline }}
                </h2>
            </div>
        </header>

        <!-- MAP + INFO -->
        <section class="px-8 md:px-14 mt-10">
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                <!-- MAP -->
                <div data-aos="fade-right">
                    <a href="https://maps.app.goo.gl/AegCxDSs4p856Ywk8" target="_blank">
                        <div class="w-full h-[260px] rounded-xl overflow-hidden bg-white shadow-xl">
                            <img src="{{ asset('lokasi/'.$location->maps) }}"
                                 class="w-full h-full object-cover">
                        </div>
                    </a>
                </div>

                <!-- INFO -->
                <div class="space-y-5 text-gray-100"
                     data-aos="fade-up"
                     data-aos-delay="200">

                    <div class="flex gap-3">
                        <span class="text-lg">📍</span>
                        <p class="text-sm leading-relaxed">{{ $location->alamat }}</p>
                    </div>

                    <div class="flex gap-3">
                        <span class="text-lg">🕒</span>
                        <p class="text-sm">{{ $location->open }}</p>
                    </div>

                    @if($location->instagram)
                    <div class="flex gap-3">
                        <span class="text-lg">📷</span>
                        <a href="https://www.instagram.com/rumahbudayaratna"
                           target="_blank"
                           class="text-sm hover:underline">
                            {{ $location->instagram }}
                        </a>
                    </div>
                    @endif

                    <!-- ACTION -->
                    <div class="pt-6 grid grid-cols-3 gap-3">
                        <a href="https://wa.me/6281346514975" target="_blank"
                           class="bg-white/10 hover:bg-white/20 rounded-lg p-3 text-xs text-center transition"
                           data-aos="zoom-in"
                           data-aos-delay="300">
                            📞<br>WhatsApp
                        </a>

                        <a href="https://maps.app.goo.gl/AegCxDSs4p856Ywk8" target="_blank"
                           class="bg-white/10 hover:bg-white/20 rounded-lg p-3 text-xs text-center transition"
                           data-aos="zoom-in"
                           data-aos-delay="400">
                            📍<br>Maps
                        </a>

                        <a href="mailto:rumahbudayaratna@gmail.com"
                           class="bg-white/10 hover:bg-white/20 rounded-lg p-3 text-xs text-center transition"
                           data-aos="zoom-in"
                           data-aos-delay="500">
                            ✉️<br>Email
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!-- WHY VISIT -->
        <section class="px-8 md:px-14 pb-20 mt-16" data-aos="fade-up">
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white/10 rounded-xl p-5 backdrop-blur" data-aos="zoom-in">
                    🎭
                    <h4 class="mt-2 font-semibold">Event Budaya</h4>
                    <p class="text-sm text-gray-200/80 mt-1">
                        Pertunjukan seni & diskusi budaya rutin.
                    </p>
                </div>

                <div class="bg-white/10 rounded-xl p-5 backdrop-blur" data-aos="zoom-in" data-aos-delay="150">
                    🎨
                    <h4 class="mt-2 font-semibold">Ruang Kreatif</h4>
                    <p class="text-sm text-gray-200/80 mt-1">
                        Wadah seniman & komunitas berekspresi.
                    </p>
                </div>

                <div class="bg-white/10 rounded-xl p-5 backdrop-blur" data-aos="zoom-in" data-aos-delay="300">
                    🤝
                    <h4 class="mt-2 font-semibold">Komunitas Terbuka</h4>
                    <p class="text-sm text-gray-200/80 mt-1">
                        Terbuka untuk kolaborasi & literasi budaya.
                    </p>
                </div>

            </div>
        </section>

        <!-- BOTTOM -->
        <section class="bg-[#411012] rounded-t-2xl py-12" data-aos="fade-up">
            <div class="px-8 md:px-14">
                <div class="max-w-5xl mx-auto flex gap-10 items-start">

                    <div class="flex-1">
                        <div class="w-12 h-[2px] bg-white/30 mb-4"></div>
                        <h2 class="text-2xl md:text-3xl font-bold">
                            {{ $location->subheadline }}
                        </h2>

                        @if($location->deskripsi)
                        <p class="mt-3 text-sm text-gray-200 max-w-xl">
                            {{ $location->deskripsi }}
                        </p>
                        @endif
                    </div>

                    @if($location->foto)
                    <div class="hidden md:block w-40 h-28" data-aos="fade-left">
                        <img src="{{ asset('lokasi/'.$location->foto) }}"
                             class="w-full h-full object-cover rounded-lg">
                    </div>
                    @endif

                </div>
            </div>
        </section>

    </main>

    <footer class="bg-[#3b0e10] border-t border-white/10">
        <div class="text-center px-8 md:px-14 py-10 max-w-5xl mx-auto text-sm text-gray-300">
            © {{ date('Y') }} Rumah Budaya Ratna
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

</body>
</html>
