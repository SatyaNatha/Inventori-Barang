@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<h1 class="text-2xl font-semibold mb-4">{{ $item->name }}</h1>

<div class="bg-white p-4 rounded shadow space-y-3">
    <p><strong>Kode:</strong> {{ $item->code }}</p>
    <p><strong>Deskripsi:</strong> {{ $item->description ?? '-' }}</p>
    <p><strong>Jumlah:</strong> {{ $item->quantity }}</p>
    <p><strong>Harga:</strong> Rp{{ number_format($item->price, 0, ',', '.') }}</p>
    @if($item->image)
        <img src="{{ asset('storage/'.$item->image) }}" class="w-48 h-48 object-cover rounded">
    @endif
</div>

<a href="{{ route('items.index') }}" class="inline-block mt-4 text-blue-700 hover:underline">← Kembali ke Daftar Barang</a>
@endsection
