@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between align-items-left mb-4">
        <h3>Barang Masuk</h3>
        <a class="btn btn-success btn-sm" href="{{ route('create') }}">Tambah Barang Masuk</a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal Pembuatan</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->created_at->format('d/m/Y') }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Tindakan">
                            <a href="{{ route('edit', ['id' => $product->id]) }}" class="btn btn-info btn-md mx-2"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('show', ['id' => $product->id]) }}" class="btn btn-primary btn-md mx-2"><i class="bi bi-grid"></i></a>
                            <form action="{{ route('delete', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                            <button type="submit" class="btn btn-danger btn-md mx-2 " onclick="return confirm('Anda yakin ingin menghapus barang ini?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>

@endsection
