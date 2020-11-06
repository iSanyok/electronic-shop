<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
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
// главная страница, логин, регистрация и профиль пользователя
Route::get('/', [MainController::class, 'index'])->name('mainpage');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::get('/profile', [MainController::class, 'profile'])->name('profile')->middleware('auth');

// все катогории и выбор одной категории
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/categories/{category}', [MainController::class, 'show'])->name('category');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');
Route::post('/products/add/{product}', [BasketController::class, 'add'])->name('add');

Route::prefix('/basket')->group(function() {
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    Route::post('/add/{product}', [BasketController::class, 'add'])->name('add');
    Route::delete('/destroy/{product}', [BasketController::class, 'destroy'])->name('destroy');
    Route::get('/checkout', [BasketController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/payoff', [BasketController::class, 'payoff'])->name('payoff');
});

//добавить мидлварь
Route::prefix('/admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('panel');

    Route::get('/add/category', [AdminController::class, 'add_category'])->name('add_category');
    Route::post('/add/category/store', [AdminController::class, 'store_category'])->name('store_category');

    Route::get('/add/product', [AdminController::class, 'add_product'])->name('add_product');
    Route::post('/add/product/store', [AdminController::class, 'store_product'])->name('store_product');

    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{order}', [AdminController::class, 'order'])->name('order');
    Route::post('/orders/confirm/{order}', [AdminController::class, 'confirm'])->name('confirm');

    Route::get('add/coupon', [AdminController::class, 'add_coupon'])->name('add_coupon');
});
