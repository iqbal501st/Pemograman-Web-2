@extends('layouts.data')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('barang.index') }}">List Products</a>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="nama" class="form-control" value="{{ $barang->name }}" disabled>
    </div>
    <div class="form-group">
        <label>Warna</label>
        <input type="color" name="warna" class="form-control" value="{{ $barang->color }}" disabled>
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="ukuran" class="form-control" value="{{ $barang->weight }}" disabled>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="5" placeholder="product description" class="form-control" disabled>{{ $barang->description }}</textarea>
    </div>
@endsection
