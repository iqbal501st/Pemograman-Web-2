@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('index') }}">List Products</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('api.product.update', ['id' => $product->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="nama" class="form-control" placeholder="product name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Warna</label>
            <input type="color" name="warna" class="form-control" placeholder="product color" value="{{ $product->color }}">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control" placeholder="product weight" value="{{ $product->stok }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="product price" value="{{ $product->price }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="5" placeholder="product description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
