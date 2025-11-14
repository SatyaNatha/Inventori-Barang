@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-600 text-sm">Total Barang</h3>
            <p class="text-3xl font-semibold text-blue-600 mt-2">{{ $totalItems ?? 0 }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-600 text-sm">Total Pengguna</h3>
            <p class="text-3xl font-semibold text-green-600 mt-2">{{ $totalUsers ?? 0 }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-600 text-sm">Role Anda</h3>
            <p class="text-3xl font-semibold text-gray-800 mt-2">{{ Auth::user()->role }}</p>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Selamat Datang, {{ Auth::user()->name }} 👋</h2>
        <p class="text-gray-600">Gunakan menu di sebelah kiri untuk mengelola barang atau pengguna.</p>
    </div>
@endsection
