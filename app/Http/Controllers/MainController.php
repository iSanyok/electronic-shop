<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MainController extends Controller
{
    /**
     * Открыть главную страницу магазина
     *
     * @param Product $product
     * @return Renderable
     */
    public function index(Product $product): Renderable
    {
        $products = $product->latest()->paginate(9);

        return view('index', compact('products'));
    }

    /**
     * Открыть страницу категорий
     *
     * @return Renderable
     */
    public function categories(): Renderable
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    /**
     * Открыть страницу товаров определенной категории
     *
     * @param Category $category
     * @return Renderable
     */
    public function show(Category $category): Renderable
    {
        $products = Product::where('category_id', $category->id)->latest()->paginate(9);

        return view('index', compact('category', 'products'));
    }

    /**
     * Открыть страницу логина пользователей
     *
     * @return Renderable
     */
    public function login(): Renderable
    {
        return view('auth.login');
    }

    /**
     * Открыть страницу регистрации пользователей
     *
     * @return Renderable
     */
    public function register(): Renderable
    {
        return view('auth.register');
    }

    /**
     * Отрыть страницу профиля пользователя
     *
     * @return Renderable
     */
    public function profile(): Renderable
    {
        $orders = Order::where('user_id', Auth::user()->id);
        return view('home', compact('orders'));
    }
}
