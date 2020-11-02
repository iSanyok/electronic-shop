<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Product $product)
    {
        $products = $product->get();

        return view('homepage', compact('products'));
    }

    // выбор всех категорий
    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    // выбор товаров определенной категории
    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();

        return view('homepage', [
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function profile()
    {
    }

}
