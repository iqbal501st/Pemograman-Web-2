@extends('layouts.data')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('index') }}">List Products</a>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="nama" class="form-control" value="{{ $product->name }}" disabled>
    </div>
    <div class="form-group">
        <label>Warna</label>
        <input type="color" name="warna" class="form-control" value="{{ $product->color }}" disabled>
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="ukuran" class="form-control" value="{{ $product->weight }}" disabled>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="5" placeholder="product description" class="form-control" disabled>{{ $product->description }}</textarea>
    </div>
@endsection
