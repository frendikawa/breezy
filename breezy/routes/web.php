<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgreeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WayController;
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

// Auth::routes();

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('product',ProductController::class);
    Route::resource('category',CategoryController::class);
    Route::middleware(['user'])->group(function () {
        Route::resource('review',ReviewController::class);
        Route::get('home', [HomeController::class, 'index'])->name('home');
        route::resource('profile',ProfileController::class);
        Route::resource('order',PaymentController::class);
        Route::resource('troli',CartController::class);
        Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
        Route::put('cart/update-multiple', [CartController::class, 'updateMultiple'])->name('cart.updateMultiple');
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    });
    Route::resource('product',ProductController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('review',ReviewController::class);
    
    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('upload',CarouselController::class);
        Route::resource('confirmation', ConfirmationController::class);
        Route::patch('tolak/{payment}', [ConfirmationController::class, 'tolak'])->name('payment.reject');
        Route::patch('terima/{payment}', [ConfirmationController::class, 'terima'])->name('payment.terima');
        Route::resource('agree', AgreeController::class);
        Route::resource('reject', RejectController::class);
        Route::resource('way', WayController::class);
        Route::resource('done', DoneController::class);
    });
});
