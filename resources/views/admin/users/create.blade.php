@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Tambah User Baru</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-semibold">Nama</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Password</label>
        <input type="password" name="password" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Role</label>
        <select name="role" class="border rounded p-2 w-40">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
