<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Web method
    public function index()
    {
        $barang = Barang::simplePaginate(5);
        return view('barang.index', compact('barang'));
    }

    // Web methods
    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Barang::create($request->all());

        return redirect()->back()->with('success', 'Barang berhasil disimpan.');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $barang->update($request->all());

        return redirect()->back()->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus.');
    }

    // API methods
    public function apiIndex()
    {
        $barang = Barang::simplePaginate(5);
        return response()->json($barang, 200);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $barang = Barang::create($request->all());
        return response()->json($barang, 201);
    }

    public function apiShow($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    public function apiUpdate(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $barang->update($request->all());
        return response()->json($barang);
    }

    public function apiDestroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(null, 204);
    }
}
