@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Barang</h1>
        <a href="{{ route('items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Barang</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
        <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
            <tr>
                <th class="p-2 border">Foto</th>
                <th class="p-2 border">Kode</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Deskripsi</th>
                <th class="p-2 border">Harga</th>
                <th class="p-2 border">Stok</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="p-2 border text-center">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-16 h-16 object-cover rounded mx-auto">
                        @else
                            <span class="text-gray-400 italic">-</span>
                        @endif
                    </td>
                    <td class="p-2 border text-center">{{ $item->code }}</td>
                    <td class="p-2 border">{{ $item->name }}</td>
                    <td class="p-2 border text-gray-700">{{ $item->description }}</td>
                    <td class="p-2 border text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="p-2 border text-center">{{ $item->quantity }}</td>
                    <td class="p-2 border text-center">
                        <a href="{{ route('items.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a> |
                        <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('Hapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
