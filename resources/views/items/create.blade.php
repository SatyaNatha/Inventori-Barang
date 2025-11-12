@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Tambah Barang</h1>

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label class="block font-semibold">Kode Barang</label>
        <input type="text" name="code" value="{{ old('code') }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Nama Barang</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-semibold">Deskripsi</label>
        <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
    </div>
    <div class="flex gap-4">
        <div>
            <label class="block font-semibold">Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity',0) }}" class="border rounded p-2 w-32" required>
        </div>
        <div>
            <label class="block font-semibold">Harga</label>
            <input type="number" name="price" value="{{ old('price',0) }}" class="border rounded p-2 w-40" required>
        </div>
    </div>
    <div>
        <label class="block font-semibold">Gambar (opsional)</label>
        <input type="file" name="image" class="border p-2 w-full">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
