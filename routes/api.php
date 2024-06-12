<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ProductController;

Route::apiResource('products', ProductController::class);


Route::get('products', [ProductController::class, 'apiIndex']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);

use App\Http\Controllers\BarangController;

Route::get('barang', [BarangController::class, 'apiIndex']);
Route::post('barang', [BarangController::class, 'store']);
Route::get('barang/{id}', [BarangController::class, 'apiShow']);
Route::put('barang/{id}', [BarangController::class, 'apiUpdate']);
Route::delete('barang/{id}', [BarangController::class, 'apiDestroy']);
