<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});
Route::group(['middleware' => ['auth', 'role: admin']], function(){
    return 'admin';
}); 

Auth::routes([
    'verify'=>true
]);

Route::get('home', function () {
    return view('home');
})->name('home')->middleware('verified');

Route::get('category', function () {
    return view('category');
})->name('category');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('product', function () {
    return view('product');
})->name('product');

// Route::resource('product',ProductController::class);
// Route::resource('category',CategoryController::class);
// Route::resource('delivery',DeliveryController::class);
// Route::resource('detail',DetailController::class);
// Route::resource('order',OrderController::class);
// Route::resource('payment',PaymentController::class);
// Route::resource('review',ReviewController::class);