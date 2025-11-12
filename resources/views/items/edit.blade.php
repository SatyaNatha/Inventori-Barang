@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Barang</h1>

<form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf @method('PUT')
    <div>
        <label class="block font-semibold">Kode Barang</label>
        <input type="text" name="code" value="{{ old('code', $item->code) }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-semibold">Nama Barang</label>
        <input type="text" name="name" value="{{ old('name', $item->name) }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-semibold">Deskripsi</label>
        <textarea name="description" class="w-full border rounded p-2">{{ old('description', $item->description) }}</textarea>
    </div>
    <div class="flex gap-4">
        <div>
            <label class="block font-semibold">Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity', $item->quantity) }}" class="border rounded p-2 w-32">
        </div>
        <div>
            <label class="block font-semibold">Harga</label>
            <input type="number" name="price" value="{{ old('price', $item->price) }}" class="border rounded p-2 w-40">
        </div>
    </div>
    <div>
        <label class="block font-semibold">Gambar (opsional)</label><br>
        @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}" class="w-32 h-32 object-cover mb-2">
        @endif
        <input type="file" name="image" class="border p-2 w-full">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
