<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
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

Auth::routes();

Route::get('/', [LandingController::class, 'index'])->middleware('guest')->name('landing');

Route::middleware(['auth','verified'])->group(function () {
    Route::middleware(['user'])->group(function () {
        Route::resource('review',ReviewController::class);
        Route::get('home', [HomeController::class, 'index'])->name('home');
        route::resource('profile',ProfileController::class);
        Route::resource('order',PaymentController::class);
        Route::resource('troli',CartController::class);
        Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('product',ProductController::class);
        Route::resource('category',CategoryController::class);
    });
});
