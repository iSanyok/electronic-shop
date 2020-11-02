<?php

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
Route::get('/categories={category}', [MainController::class, 'show'])->name('category');

// страница товара
Route::get('/product={product}', [ProductController::class, 'show'])->name('product');

// добавление товара в корзину со страницы товара
Route::post('/products={product}', [BasketController::class, 'add'])->name('add');

// увеличение количество товаров из корзины
Route::post('/basket={product}', [BasketController::class, 'add'])->name('add');

// удаление одного товара из корзины
Route::post('/basket={product}', [BasketController::class, 'remove'])->name('remove');

Route::get('/basket', [BasketController::class, 'index'])->name('basket');
