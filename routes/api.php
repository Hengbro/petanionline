<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlamattokoController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\KeranjangController;
use App\Http\Controllers\Api\ProdukHomeController;
use App\Http\Controllers\Api\CategoryController;
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

Route::middleware('auth: sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

Route::post('login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('registrasi', [App\Http\Controllers\Api\UserController::class, 'registrasi']);

Route::get('produk-baru', [ProdukHomeController::class, 'newproduct']);
Route::get('produk-homecari/{cari}', [ProdukHomeController::class, 'cari']);

Route::get('promomp', [App\Http\Controllers\Api\PromompController::class, 'promomp']);
Route::post('chekout', [App\Http\Controllers\Api\TransaksiController::class, 'store']);
Route::get('chekout/user/{id}', [App\Http\Controllers\Api\TransaksiController::class, 'history']);

Route::resource('keranjang-user', KeranjangController::class);
Route::resource('produk-home', ProdukHomeController::class);

Route::middleware('user')->group(function(){

   Route::put('update-user/{id}', [App\Http\Controllers\Api\UserController::class, 'update']);
   Route::post('upload-user/{id}', [App\Http\Controllers\Api\UserController::class, 'upload']);

   Route::post('toko', [App\Http\Controllers\Api\TokoController::class, 'upload']);
   Route::get('toko-user/{id}', [App\Http\Controllers\Api\TokoController::class, 'cekToko']);

   Route::resource('alamat-toko', AlamattokoController::class);

   Route::resource('produk-toko', ProdukController::class);
   Route::post('upload/produk', [ProdukController::class, 'upload']);

});

Route::middleware('admin')->group(function(){

   Route::resource('category', CategoryController::class);

});
