<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

                    return redirect($request->path() === '/product/' .$product->id
                        ? '/product/' . $product->id
                        : '/basket');
                }
            }

            session()->push('products', $order);
            session()->save();
        } else {

            session()->push('products', $order);
            session()->save();
        }
        return redirect('/product/' . $product->id);
    }

    //удаление товара из корзины
    public function destroy(Product $product)
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
        return view('checkout');
    }

    public function payoff(Request $request)
    {
        $order = new Order();
        $products = session()->get('products');

        if(Auth::user()) {
            $order->user_id = Auth::user()->id;

        } else {

            $validateAttributes = $request->validate([
                'customer_name' => 'required',
            ]);
            $order->customer_name = $validateAttributes['customer_name'];
        }

        $order->price = $this->index()->summary_price;
        $order->save();

        foreach($products as $item) {
            $order->products()->attach($item['product'], ['count' => $item['count']]);
        }

        return redirect('/')->with('message', 'Заказ оформлен. Спасибо за покупку!');
    }
}
