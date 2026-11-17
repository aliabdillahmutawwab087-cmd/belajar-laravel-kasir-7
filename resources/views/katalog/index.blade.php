@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/kasir.css') }}">

    <a href="{{ route('katalog.index') }}">Katalog</a>

    <h1>Katalog Produk</h1>
    <p>Harga dan stok toko</p>

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('katalog.index') }}">
        <label for="q">Nama produk</label>
        <input id="q" name="q" value="{{ $q ?? '' }}" placeholder="Contoh: kopi">
        <button type="submit">Cari</button>
    </form>

    <hr>

    {{-- Daftar Produk --}}
    @forelse ($produk as $item)
        <div>
            <p><strong>{{ $item['nama'] }}</strong> ({{ $item['kategori'] }})</p>
            <p>Rp {{ number_format($item['harga'], 0, ',', '.') }} | Stok: {{ $item['stok'] }}</p>
        </div>
    @empty
    @endforelse
        <p>Produk tidak ditemukan.</p>
@endsection
