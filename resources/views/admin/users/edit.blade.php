@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit User</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
        <label class="block font-semibold">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-semibold">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-semibold">Role</label>
        <select name="role" class="border rounded p-2 w-40">
            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
