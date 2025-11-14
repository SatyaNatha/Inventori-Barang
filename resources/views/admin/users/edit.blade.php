@extends('layouts.app')
@section('content')

<h1 class="text-2xl font-semibold mb-4">Edit Pengguna</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST" class="bg-white p-6 rounded shadow w-full max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700">Nama</label>
        <input type="text" name="name" class="border rounded w-full p-2" value="{{ old('name', $user->name) }}">
        @error('name') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" class="border rounded w-full p-2" value="{{ old('email', $user->email) }}">
        @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="border rounded w-full p-2">
        <input type="password" name="password_confirmation" class="border rounded w-full p-2 mt-2" placeholder="Konfirmasi password">
        @error('password') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Role</label>
        <select name="role" class="border rounded w-full p-2">
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
</form>

@endsection
