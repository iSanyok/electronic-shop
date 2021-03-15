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
    public function index(Product $product): Renderable
    {
        $products = $product->get();

        return view('index', compact('products'));
    }

    // выбор всех категорий
    public function categories(): Renderable
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    // выбор товаров определенной категории
    public function show(Category $category): Renderable
    {
        $products = Product::where('category_id', $category->id)->get();

        return view('homepage', [
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function login(): Renderable
    {
        return view('auth.login');
    }

    public function register(): Renderable
    {
        return view('auth.register');
    }

    public function profile(): Renderable
    {
        if(Gate::allows('admin')) {
            return view('admin.panel');
        } else {
            $orders = Order::where('user_id', Auth::user()->id);
            return view('home', compact('orders'));
        }
    }
}
