<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Inventori Barang') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-900">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-6 border-b">
                <h1 class="text-xl font-semibold text-blue-600">Inventori Barang</h1>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : 'text-gray-600' }}">📊 Dashboard</a>
                <a href="{{ route('items.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('items.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600' }}">📦 Barang</a>
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600' }}">👥 Pengguna</a>
                @endif
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                    <h2 class="font-semibold text-lg text-gray-800 capitalize">
                        {{ $title ?? 'Dashboard' }}
                    </h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
