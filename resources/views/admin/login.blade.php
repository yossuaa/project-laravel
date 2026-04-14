<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1'
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-black flex items-center justify-center">

    <div class="w-full max-w-md bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl p-8">
        
        <h2 class="text-2xl font-bold text-white text-center mb-2">
            Admin Panel
        </h2>
        <p class="text-gray-400 text-center mb-6 text-sm">
            Masuk untuk mengelola dashboard
        </p>

        @if(session('error'))
            <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/30 text-red-400 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/admin/login" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm text-gray-400 mb-1">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Masukkan username"
                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary"
                    required
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary"
                    required
                >
            </div>

            <button 
                type="submit"
                class="w-full mt-2 py-3 bg-primary hover:bg-indigo-500 transition rounded-xl text-white font-semibold shadow-lg"
            >
                Login
            </button>
        </form>

        <p class="text-xs text-gray-500 text-center mt-6">
            © {{ date('Y') }} Admin System
        </p>
    </div>

</body>
</html>
