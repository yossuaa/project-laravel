@include('layout.navbar')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>{{ $profile->headline }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body
    class="relative bg-[#511314] text-white overflow-x-hidden
           opacity-0 translate-y-6
           transition-all duration-1000 ease-out"
    onload="document.body.classList.remove('opacity-0','translate-y-6')">

    
    <div class="pointer-events-none fixed inset-0 -z-10">
        <div class="absolute inset-0 bg-gradient-to-br from-[#6b1b1c] via-[#511314] to-[#2a0a0a]"></div>
        <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-[#8b2a2a]/30 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-[#3a0d0d]/40 rounded-full blur-[120px]"></div>
    </div>

    
    <section class="min-h-screen py-10 md:px-12 text-white bg-cover bg-center bg-no-repeat observe parallax"
        data-speed="0.15" style="background-image: url('/profile/{{ $profile->background }}');">

        <br><br><br><br>

        <div class="mt-5 flex flex-col md:flex-row items-start gap-6">

            <div class="flex-2 max-w-[680px]">
                <h1
                    class="text-6xl md:text-5xl font-bold whitespace-pre-line
                           opacity-0 translate-y-6
                           transition-all duration-1000 ease-out observe"
                    style="font-family: 'Space Grotesk';">
                    {{ $profile->headline }}
                </h1>

                <div
                    class="mt-5 text-justify leading-relaxed
                           opacity-0 translate-y-6
                           transition-all duration-1000 ease-out delay-200 observe">
                    {{ $profile->deskripsi }}
                </div>
            </div>

            <img
                src="/profile/{{ $profile->gambar_profile }}"
                data-speed="0.25"
                class="w-[400px] h-[300] mt-16 ml-16 object-cover rounded-xl shadow-6xl
                       opacity-0 translate-y-10 scale-95
                       transition-all duration-1000 ease-out delay-300
                       observe parallax
                       hover:scale-[1.03]
                       hover:shadow-[0_25px_60px_rgba(0,0,0,0.45)]" />
        </div>
    </section>
    <div class="px-6 py-4 bg-gray-50" data-aos="fade-up">
        <p class="text-gray-900 max-w-4xl mx-auto text-center text-sm font-bold md:text-[18px]">
            Visi dan Misi
        </p>
    </div>
    <br>
    
    <section
        class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start
               border border-[#3b0e10] bg-[#3b0e10]
               rounded-xl mx-8 py-6">

        <!-- VISI (kiri → kanan) -->
        <div
            class="flex flex-col
                   opacity-0 -translate-x-8
                   transition-all duration-1000 ease-out
                   observe parallax"
            data-speed="0.1">

            <h2 class="text-xl md:text-2xl font-bold mb-2 ml-20" style="font-family: 'Space Grotesk';">
                {{ $profile->headline_visi }}
            </h2>

            <p class="text-[10px] md:text-[12px] leading-relaxed text-justify ml-20">
                {{ $profile->deskripsi_visi }}
            </p>
        </div>

        <!-- FOTO TENGAH (bawah + zoom) -->
        <div
            class="flex justify-start
                   opacity-0 translate-y-8 scale-95
                   transition-all duration-1000 ease-out delay-150
                   observe parallax ml-[-10px]"
            data-speed="0.2">

            <img
                src="/profile/{{ $profile->gambar_visi }}"
                class="w-full max-w-[260px] h-[260px] rounded-xl object-cover shadow-xl
                       transition duration-300 hover:scale-[1.03]
                       hover:shadow-[0_25px_60px_rgba(0,0,0,0.45)]" />
        </div>

        <!-- MISI (kanan → kiri) -->
        <div
            class="flex flex-col items-start
                   opacity-0 translate-x-8
                   transition-all duration-1000 ease-out delay-300
                   observe parallax"
            data-speed="0.15">

            <div class="self-start -ml-36">
                <img
                    src="/profile/{{ $profile->gambar_misi }}"
                    class="w-[350px] h-[150px] object-cover rounded-xl mb-3 shadow-lg
                           transition duration-300 hover:scale-[1.03]
                           hover:shadow-[0_25px_60px_rgba(0,0,0,0.45)]" />
            </div>

            <h2 class="text-xl md:text-2xl font-bold mb-2 -ml-36" style="font-family: 'Space Grotesk';">
                {{ $profile->headline_misi }}
            </h2>

            <p class="text-[10px] leading-relaxed text-justify max-w-[500px] pr-12 -ml-36">
                {{ $profile->deskripsi_misi }}
            </p>
        </div>
    </section>

    <br><br><br>

    <!-- ================= SCRIPT ================= -->
    <script>
        /* ===== CINEMATIC SCROLL ANIMATION ===== */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove(
                        'opacity-0',
                        'translate-y-6',
                        'translate-y-8',
                        'translate-y-10',
                        '-translate-x-8',
                        'translate-x-8',
                        'scale-95'
                    );
                    entry.target.classList.add(
                        'opacity-100',
                        'translate-y-0',
                        'translate-x-0',
                        'scale-100'
                    );
                } else {
                    entry.target.classList.add('opacity-0');
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.observe').forEach(el => observer.observe(el));

    </script>

</body>
</html>
