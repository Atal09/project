<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\HomePageController;
Route::get('/home_page', [HomePageController::class, 'index']);


Route::get('home_page/{naam}',[HomePageController::class,'index']);



use App\Http\Controllers\ProductController;
Route::get('/product', [ProductController::class, 'index'])->name('product.product');
Route::get('/product/create', [ProductController::class, 'create']);

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::delete('/product/{product}', [ProductController::class,'destroy'])->name('product.destroy');


use App\Http\Controllers\ContactController;
Route::get('/contact',[ContactController::class,'index']);

use App\Http\Controllers\AboutController;
Route::get('/about', [AboutController::class, 'index'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
