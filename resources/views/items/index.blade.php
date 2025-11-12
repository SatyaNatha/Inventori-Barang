@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold">Daftar Barang</h1>
    <a href="{{ route('items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Barang
    </a>
</div>

<table class="w-full bg-white shadow rounded overflow-hidden">
    <thead class="bg-blue-600 text-white">
        <tr>
            <th class="p-2">Kode</th>
            <th class="p-2">Nama</th>
            <th class="p-2">Qty</th>
            <th class="p-2">Harga</th>
            <th class="p-2">Gambar</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr class="border-b hover:bg-gray-50">
            <td class="p-2">{{ $item->code }}</td>
            <td class="p-2"><a href="{{ route('items.show', $item) }}" class="text-blue-700 hover:underline">{{ $item->name }}</a></td>
            <td class="p-2">{{ $item->quantity }}</td>
            <td class="p-2">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
            <td class="p-2">
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" class="w-16 h-16 object-cover rounded">
                @endif
            </td>
            <td class="p-2">
                <a href="{{ route('items.edit', $item) }}" class="text-yellow-600 hover:underline">Edit</a> |
                <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Hapus item ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center p-4">Belum ada barang.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">{{ $items->links() }}</div>
@endsection
