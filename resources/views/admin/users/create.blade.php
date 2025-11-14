@extends('layouts.app')
@section('content')

<h1 class="text-2xl font-semibold mb-4">Tambah Pengguna Baru</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded shadow w-full max-w-lg">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700">Nama</label>
        <input type="text" name="name" class="border rounded w-full p-2" value="{{ old('name') }}">
        @error('name') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" class="border rounded w-full p-2" value="{{ old('email') }}">
        @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" class="border rounded w-full p-2">
        @error('password') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Role</label>
        <select name="role" class="border rounded w-full p-2">
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
</form>

@endsection
