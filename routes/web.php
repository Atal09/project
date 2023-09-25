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

Route::get('about',[AboutController::class, 'show'])->name('about');
Route::get('product',[ProductController::class,'show'])->name('product');
Route::get('contact',[ContactController::class,'show'])->name('contact');
