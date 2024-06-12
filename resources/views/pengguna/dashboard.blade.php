@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Products</h2>
        <ul>
            @foreach($products as $product)
                <li>{{ $product->nama }} - Stok: {{ $product->stok }} - Harga: Rp {{ number_format($product->harga, 0, ',', '.') }}</li>
            @endforeach
        </ul>

        <h2>Barang</h2>
        <ul>
            @foreach($barang as $item)
                <li>{{ $item->nama }} - Stok: {{ $item->stok }} - Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</li>
            @endforeach
        </ul>
    </div>
@endsection
