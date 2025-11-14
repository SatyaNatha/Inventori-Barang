@extends('layouts.app')
@section('content')

<h1 class="text-2xl font-semibold mb-4">Manajemen Pengguna</h1>

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="bg-red-100 text-red-800 px-4 py-2 mb-4 rounded">{{ session('error') }}</div>
@endif

<a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah User</a>

<table class="w-full mt-6 bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-50 border-b text-gray-600">
        <tr>
            <th class="px-4 py-3 text-left">#</th>
            <th class="px-4 py-3 text-left">Nama</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-left">Role</th>
            <th class="px-4 py-3 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">{{ $loop->iteration }}</td>
            <td class="px-4 py-3">{{ $user->name }}</td>
            <td class="px-4 py-3">{{ $user->email }}</td>
            <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
            <td class="px-4 py-3">
                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline ml-2">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">{{ $users->links() }}</div>
@endsection
