<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventori')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <nav class="bg-blue-700 text-white p-4 flex justify-between items-center">
        <div class="font-bold text-lg">
            <a href="{{ url('/') }}">Inventori</a>
        </div>
        <div class="space-x-4">
            <a href="{{ route('items.index') }}" class="hover:underline">Items</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}" class="hover:underline">Manage Users</a>
            @endif
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
