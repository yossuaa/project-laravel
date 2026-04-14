<nav class="fixed top-0 left-0 w-full flex justify-between items-center px-10 py-3 z-50
    bg-black/40 backdrop-blur-md shadow-md">


    <!-- Logo & Title -->
    <div class="flex items-center space-x-3 text-white text-xs font-marcellus leading-tight">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
        <div class="flex flex-col items-start">
            <p class="font-bold">Memberi Makna</p>
            <p>Pada Budaya</p>
        </div>
    </div>

    <!-- Menu -->
    <div class="flex space-x-10 text-white text-sm font-marcellus">
        <a href="{{ route('homepage') }}"
        class="{{ Route::currentRouteName() == 'homepage' ? 'text-yellow-300' : 'text-white' }} hover:text-red-700 transition duration-200">
        Home
        </a>

        <a href="{{ route('profile') }}"
        class="{{ Route::currentRouteName() == 'profile' ? 'text-yellow-300' : 'text-white' }} hover:text-red-700 transition duration-200">
        Profile
        </a>

        <a href="{{ route('event') }}"
        class="{{ Route::currentRouteName() == 'event' ? 'text-yellow-300' : 'text-white' }} hover:text-red-700 transition duration-200">
        Event
        </a>

        <a href="{{ route('galeri') }}"
        class="{{ Route::currentRouteName() == 'galeri' ? 'text-yellow-300' : 'text-white' }} hover:text-red-700 transition duration-200">
        Galeri
        </a>

        <a href="{{ route('kontaklokasi') }}"
        class="{{ Route::currentRouteName() == 'kontaklokasi' ? 'text-yellow-300' : 'text-white' }} hover:text-red-700 transition duration-200">
        Kontak & Lokasi
        </a>

        <a href="{{ route('reservation') }}"
        class="{{ Route::currentRouteName() == 'reservation' ? 'text-yellow-300' : 'text-white' }} hover:text-red-700 transition duration-200">
        Reservation
        </a>
    </div>

    <!-- Search -->
    <div class="flex items-center space-x-2">
        <input
            id="searchInput"
            type="text"
            placeholder="Cari halaman..."
            class="bg-white/30 border-none rounded-full px-4 py-1 text-sm text-white
                   focus:outline-none w-50 placeholder-white/70"
            onkeydown="if(event.key==='Enter'){goSearch()}"
        >

        <button onclick="goSearch()" class="text-white hover:text-red-700 p-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </button>
    </div>

</nav>

<!-- SEARCH SCRIPT -->
<script>
function goSearch() {
    const q = document.getElementById('searchInput').value.toLowerCase().trim();

    if (!q) return;

    const routes = {
        'home': "{{ route('homepage') }}",
        'beranda': "{{ route('homepage') }}",

        'profile': "{{ route('profile') }}",
        'profil': "{{ route('profile') }}",

        'event': "{{ route('event') }}",
        'acara': "{{ route('event') }}",

        'galeri': "{{ route('galeri') }}",
        'gallery': "{{ route('galeri') }}",

        'kontak': "{{ route('kontaklokasi') }}",
        'lokasi': "{{ route('kontaklokasi') }}",

        'reservasi': "{{ route('reservation') }}",
        'reservation': "{{ route('reservation') }}"
    };

    for (const key in routes) {
        if (q.includes(key)) {
            window.location.href = routes[key];
            return;
        }
    }

    alert('Halaman tidak ditemukan');
}
</script>
