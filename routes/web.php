<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[App\http\Controllers\AdminController::class, 'index']);
Route::get('pengguna',[App\http\Controllers\PenggunaController::class, 'index']);

Route::get('admin/master', [App\Http\Controllers\ProductController::class, 'index'])->name('master');

// Produk
Route::resource('/admin/produk', 'App\Http\Controllers\ProductController')->except([
    'index', 'create', 'show', 'edit', 'update', 'destroy'
]);
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::get('/show/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show');
Route::get('/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('api.product.store');
Route::post('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('delete');



// Barang
Route::resource('/admin/produk', 'App\Http\Controllers\BarangController')->except([
    'index', 'create', 'show', 'edit', 'update', 'destroy'
]);
Route::get('/admin/data', [App\Http\Controllers\BarangController::class, 'index'])->name('data');

Route::get('/barang/index', [\App\Http\Controllers\BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [\App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
Route::get('/barang/show/{id}', [\App\Http\Controllers\BarangController::class, 'show'])->name('barang.show');
Route::get('/barang/edit/{id}', [\App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update/{id}', [\App\Http\Controllers\BarangController::class, 'update'])->name('update');
Route::post('/barang/store', [\App\Http\Controllers\BarangController::class, 'store'])->name('api.product.store');
Route::post('/barang/delete/{id}', [\App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.delete');

// routes/web.php





use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\LoginController;

// Route for displaying the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route for handling the login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Admin dashboard route (no middleware)
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// User dashboard route (no middleware)
Route::get('/user', [PenggunaController::class, 'index'])->name('user.dashboard');

