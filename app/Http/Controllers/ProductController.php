<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Web method
    public function index()
    {
        $products = Product::simplePaginate(5);
        return view('index', compact('products'));
    }

    // API method
    public function apiIndex()
    {
        $products = Product::simplePaginate(5);
        return response()->json($products, 200);
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

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function apiShow($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function apiUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    public function apiDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }

    // Web methods remain unchanged
    public function create()
    {
        return view('create');
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

        $product = Product::create($request->all());

        return redirect()->back()->with('success', 'Product successfully stored.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->back()->with('success', 'Product successfully updated.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product successfully deleted.');
    }
}
