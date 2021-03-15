<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Открыть страницу определенного товара
     *
     * @param Product $product
     * @return Renderable
     */
    public function show(Product $product): Renderable
    {
        return view('product', compact('product'));
    }
}
