<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Auth::routes([
    'verify'=>true,
]);

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('contact', function () {
    return view('contact');
})->name('contact');


Route::middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::resource('product',ProductController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('delivery',DeliveryController::class);
    Route::resource('detail',DetailController::class);
    Route::resource('payment',PaymentController::class);
    Route::resource('review',ReviewController::class);
});
Route::middleware(['auth','verified'])->group(function () {
    route::resource('profile',ProfileController::class);
    Route::resource('troli',CartController::class);
});
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('category', [CategoryController::class, 'index'])->name('category.index');