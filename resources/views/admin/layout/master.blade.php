<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Glow premium */
        .glow {
            box-shadow: 0 0 12px rgba(99, 102, 241, 0.4);
        }
        .sidebar-glass {
            background: rgba(30, 30, 30, 0.75);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-[#0f0f0f] text-gray-200">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 h-screen fixed sidebar-glass border-r border-gray-700/60">
        <div class="p-5 font-bold text-2xl text-indigo-300 border-b border-gray-700/60">
            Admin Dashboard
        </div>
        <!-- User Info -->
        <div class="p-4 border-b border-gray-700/60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center font-bold text-white">
                    A
                </div>
                <div>
                    <p class="text-sm font-semibold text-white">Admin</p>
                    <p class="text-xs text-gray-400">Administrator</p>
                </div>
            </div>
        </div>

        <nav class="p-4 space-y-2">
             <a href="{{ route('admin.dashboard') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Beranda
            </a>
            <a href="{{ route('homepage-info.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Homepage Info
            </a>

            <a href="{{ route('homepage-features.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Homepage Features
            </a>
            
            <a href="{{ route('profile.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Profile
            </a>
            <a href="{{ route('event.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Event
            </a>
            <a href="{{ route('galeri.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Galeri
            </a> 
            <a href="{{ route('location.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Kontak & Lokasi
            </a>
              <a href="{{ route('reservation.index') }}"
               class="block p-1 rounded-lg bg-gray-800/50 border border-gray-700/60 hover:bg-gray-700 hover:border-indigo-400 hover:text-white transition">
                Reservation
            </a>
            
            <!-- Tambahkan menu lain di sini -->
        </nav>
         <!-- Logout -->
        <div class="p-1 border-t border-gray-700/60">
            <form action="/admin/logout" method="POST">
                @csrf
                <button
                    class="w-full p-1 rounded-lg bg-red-600/20 border border-red-600/40 text-red-400 hover:bg-red-600 hover:text-white transition font-medium">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 w-full p-8">
        <div class="bg-gray-900/80 rounded-2xl shadow-xl border border-gray-700/60 p-8 glow">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
