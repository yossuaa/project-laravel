<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $info->headline }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        greatvibes: ['Great Vibes', 'cursive'],
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideDown: {
                            '0%': { opacity: '0', transform: 'translateY(-30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        zoomUp: {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                    },
                    animation: {
                        fade: 'fadeIn 1.2s ease-out forwards',
                        slide: 'slideDown 1s ease-out forwards',
                        zoom: 'zoomUp 0.8s ease-out forwards',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-cover bg-center bg-no-repeat h-screen overflow-hidden"
      style="background-image: url('/homepage/{{ $info->background_image }}')">

    <!-- OVERLAY -->
    <div class="bg-black/40 h-screen w-full opacity-0">

        <!-- HEADLINE -->
        <div class="text-center pt-12">
            <h1 class="text-[60px] font-greatvibes text-red-700 drop-shadow-xl leading-none opacity-0">
                {{ $info->headline }}
            </h1>

            <h2 class="mt-2 text-[30px] font-greatvibes text-white drop-shadow-xl leading-none opacity-0">
                {{ $info->subheadline }}
            </h2>
        </div>

        <!-- MENU -->
        <div class="w-full flex justify-center items-end gap-8 mt-10 pb-5 flex-wrap">
            @foreach($features as $f)
                <a href="{{ $f->link_tujuan }}" class="group flex flex-col items-center opacity-0">

                    <div class="w-[180px] h-[280px] rounded-xl overflow-hidden transition transform 
                                duration-300 group-hover:scale-105">
                        <img src="/homepage/{{ $f->gambar }}" class="w-full h-full object-cover">
                    </div>

                    <p class="text-center text-white font-semibold text-base mt-2
                             group-hover:text-yellow-300 transition">
                        {{ $f->nama_fitur }}
                    </p>

                </a>
            @endforeach
        </div>
    </div>

    <!-- LOAD ANIMATION -->
    <script>
        window.addEventListener('load', () => {
            // Overlay
            document.querySelector('.bg-black\\/40')
                ?.classList.add('animate-fade');

            // Headline
            document.querySelector('h1')
                ?.classList.add('animate-slide');
            document.querySelector('h2')
                ?.classList.add('animate-slide');

            // Menu stagger
            document.querySelectorAll('.group').forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('animate-zoom');
                }, index * 150);
            });
        });
    </script>

</body>
</html>
