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

// главная страница магазина
Route::get('/', [MainController::class, 'index'])->name('index');
// страница для логина пользователей
Route::get('/login', [MainController::class, 'login'])->name('login');
// страница для регистрации пользователей
Route::get('/register', [MainController::class, 'register'])->name('register');
// страница профиля пользователей
Route::get('/profile', [MainController::class, 'profile'])->name('profile')->middleware('auth');

// страница со списком категорий
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
// страница с товарами определенной категории
Route::get('/categories/{category}', [MainController::class, 'show'])->name('category');

// страница определенного товара
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');
// добавление товара в корзину
Route::post('/products/add/{product}', [BasketController::class, 'add'])->name('add');

Route::prefix('/basket')->group(function() {
    // страница корзины
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    // увеличить количество опредеделенного товара в корзине
    Route::post('/add/{product}', [BasketController::class, 'add'])->name('add');
    // уменьшить количество определенного товара в корзине
    Route::delete('/destroy/{product}', [BasketController::class, 'destroy'])->name('destroy');
    // открыть страницу оформления заказа
    Route::get('/checkout', [BasketController::class, 'checkout'])->name('checkout');
    // оформить заказ
    Route::post('/checkout/payoff', [BasketController::class, 'payoff'])->name('payoff');
});

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    // открыть страницу панели админа
    Route::get('/', [AdminController::class, 'index'])->name('panel');

    // открыть страницу для добавления новой категории
    Route::get('/add/category', [AdminController::class, 'addCategory'])->name('addCategory');
    // сохранить новую категорию в базе данных
    Route::post('/add/category/store', [AdminController::class, 'storeCategory'])->name('storeCategory');

    // открыть страницу для добавления нового товара
    Route::get('/add/product', [AdminController::class, 'addProduct'])->name('addProduct');
    // сохранить новый товар в базе данных
    Route::post('/add/product/store', [AdminController::class, 'storeProduct'])->name('storeProduct');

    // открыть страницу добавления нового купона
    Route::get('add/coupon', [AdminController::class, 'addCoupon'])->name('addCoupon');

    Route::prefix('/orders')->group(function () {
        // открыть страницу с новыми заказами
        Route::get('/', [AdminController::class, 'orders'])->name('orders');
        // открыть страницу с найденым в базе данных заказом
        Route::post('/order/', [AdminController::class, 'find'])->name('find');
        // отрыть страницу с обработанными заказами
        Route::get('/completed', [AdminController::class, 'completedOrders'])->name('completedOrders');
        // открыть страницу определенного заказа
        Route::get('/{order}', [AdminController::class, 'order'])->name('order');
        // подтвердить определенный заказ
        Route::post('/confirm/{order}', [AdminController::class, 'confirm'])->name('confirm');
    });

});
