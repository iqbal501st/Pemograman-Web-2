<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalBarang = Barang::count();

        return view('dashboard', compact('totalProducts', 'totalBarang'));
    }
}
