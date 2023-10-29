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

//product

use App\Http\Controllers\ProductController;

Route::get('/product', [ProductController::class, 'products'])->name('product.product');






use App\Http\Controllers\ContactController;
Route::get('/contact',[ContactController::class,'index'])->name('contact');

use App\Http\Controllers\AboutController;
Route::get('/about', [AboutController::class, 'index'])->name('about');

Auth::routes();
use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home');


//profile
use App\Http\Controllers\ProfileController;
Route::get('/profile', [ProfileController::class, 'user'])->name('profile.home');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');


//product
Route::post('/product/{product}/dislike', [ProductController::class, 'dislike'])->name('product.dislike');
Route::get('/products/find', [ProductController::class, 'find'])->name('products.find');

//admin


Route::group(['middleware' => 'admin'], function () {
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/{product}', [ProductController::class,'destroy'])->name('product.destroy');
    Route::patch('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/{product}/toggleStatus', [ProductController::class,'toggleStatus'])->name('product.toggleStatus');

    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::delete('/product/delete/{product}', [ProductController::class,'destroy'])->name('product.destroy');

});
