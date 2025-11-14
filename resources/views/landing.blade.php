<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Inventori Barang' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow-sm fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-blue-600">Inventori Barang</h1>
            <nav class="space-x-4">
                <a href="#fitur" class="text-gray-600 hover:text-blue-600">Fitur</a>
                <a href="#tentang" class="text-gray-600 hover:text-blue-600">Tentang</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Daftar</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-blue-50 to-blue-100">
        <div class="max-w-6xl mx-auto text-center px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Kelola Barang dengan Mudah & Cepat</h2>
            <p class="text-gray-600 text-lg mb-8">Sistem Inventori Barang modern untuk mencatat, mengontrol, dan memantau stok barang secara efisien.</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-semibold">Mulai Sekarang</a>
                <a href="#fitur" class="bg-white text-blue-600 border border-blue-600 px-6 py-3 rounded-lg hover:bg-blue-50 font-semibold">Lihat Fitur</a>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-10">Fitur Utama</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="text-blue-600 text-3xl mb-3">📦</div>
                    <h4 class="text-lg font-semibold mb-2">Manajemen Barang</h4>
                    <p class="text-gray-600 text-sm">Tambah, edit, dan hapus barang dengan antarmuka yang mudah digunakan.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="text-blue-600 text-3xl mb-3">👥</div>
                    <h4 class="text-lg font-semibold mb-2">Manajemen Pengguna</h4>
                    <p class="text-gray-600 text-sm">Admin dapat mengelola akun user dan menentukan hak akses mereka.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="text-blue-600 text-3xl mb-3">📊</div>
                    <h4 class="text-lg font-semibold mb-2">Dashboard Statistik</h4>
                    <p class="text-gray-600 text-sm">Pantau total barang, stok, dan aktivitas user secara real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-20 bg-blue-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold mb-6 text-gray-800">Tentang Sistem</h3>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Sistem Inventori Barang ini dibuat menggunakan Laravel 12 dan Tailwind CSS. 
                Dirancang untuk mempermudah pengelolaan stok, dengan antarmuka yang responsif dan user-friendly.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t py-6">
        <div class="max-w-6xl mx-auto px-6 text-center text-gray-500 text-sm">
            © {{ date('Y') }} Sistem Inventori Barang · Dibuat dengan ❤️ menggunakan Laravel & Tailwind
        </div>
    </footer>

</body>
</html>
