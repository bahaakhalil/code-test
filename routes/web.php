<?php


use App\Http\Controllers\ProductController;

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
Route::get('/', [ProductController::class,'getProducts']);

Route::get('/brands', [ProductController::class,'getBrands'])->name('brands');
Route::get('/products', [ProductController::class,'getProducts']);
Route::get('/productPrice', [ProductController::class,'getProductFilter']);
Route::get('/productSort', [ProductController::class,'getProductSort']);
Route::get('/productGender', [ProductController::class,'getProductGender']);
Route::get('/productSale', [ProductController::class,'getProductSale']);
Route::get('/productbrandManufacturer', [ProductController::class,'getProductBrandManufacturer']);
Route::get('/products-filter', [ProductController::class,'getAnyProducts']);


