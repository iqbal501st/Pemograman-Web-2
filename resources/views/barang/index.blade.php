@extends('layouts.data')

@section('content')
    <!-- Konten untuk halaman data -->
    <div class="d-flex justify-content-between mb-4">
        <h3>Barang Keluar</h3>
        <a class="btn btn-success btn-sm" href="{{ route('create') }}">Create New</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Created At</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                <tr>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Tindakan">
                            <a href="{{ route('barang.edit', ['id' => $item->id]) }}" class="btn btn-info btn-md mx-2"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('barang.show', ['id' => $item->id]) }}" class="btn btn-primary btn-md mx-2"><i class="bi bi-grid"></i></a>
                            <form action="{{ route('barang.delete', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger btn-md mx-2" onclick="return confirm('Anda yakin ingin menghapus barang ini?')"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            {{ $barang->render() }}
        </div>
    </div>
@endsection
