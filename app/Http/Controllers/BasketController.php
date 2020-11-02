<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $products = session()->get('products');

        $summary_price = 0;
        if (isset($products)) {
            foreach ($products as $product) {
                $summary_price = $summary_price + $product['product']->price * $product['count'];
            }
        } else {
            $products = [];
        }
        return view('basket', [
            'products' => $products,
            'summary_price' => $summary_price
        ]);
    }

    //добавление товара в корзину
    public function add(Product $product, Request $request)
    {
        $order = ['product' => $product, 'count' => 1];

        if ($products = session()->get('products')) {

            foreach ($products as $key => $item) {
                if ($item['product']->id == $order['product']->id) {
                    $products[$key]['count'] += 1;

                    session(['products' => $products]);
                    session()->save();

                    return redirect($request->path() === '/product=' .$product->id
                        ? '/product=' . $product->id
                        : '/basket');
                }
            }

            session()->push('products', $order);
            session()->save();
        } else {

            session()->push('products', $order);
            session()->save();
        }
        return redirect('/product=' . $product->id);
    }

    //удаление товара из корзины
    public function remove(Product $product)
    {
        $products = session()->get('products');

        foreach ($products as $key => $item) {
            if ($item['product']->id == $product->id) {
                $products[$key]['count'] -= 1;

                if($products[$key]['count'] < 1)
                {
                    unset($products[$key]);
                }

                session(['products' => $products]);
                session()->save();

                return redirect('/basket');
            }
        }
    }

    public function checkout()
    {
        
    }
}
