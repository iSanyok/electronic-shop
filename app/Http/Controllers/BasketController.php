<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BasketController extends Controller
{
    /**
     * Открыть страницу корзины
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $products = session()->get('products');

        // высчитывается цена всех товаров в корзине
        $summary_price = 0;
        if ($products) {
            foreach ($products as list('product' => $product, 'count' => $count)) {
                $summary_price = $summary_price + $product->price * $count;
            }
        } else {
            $products = [];
        }
        return view('basket', [
            'products' => $products,
            'summary_price' => $summary_price
        ]);
    }

    /**
     * Добавление товара в корзину
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function add(Product $product): RedirectResponse
    {
        $order = ['product' => $product, 'count' => 1];

        if ($products = session()->get('products')) {

            foreach ($products as $key => $item) {
                if ($item['product']->id == $order['product']->id) {
                    $products[$key]['count'] += 1;

                    session(['products' => $products]);
                    session()->save();

                    return back();
                }
            }
            session()->push('products', $order);
            session()->save();
        } else {
            session()->push('products', $order);
            session()->save();
        }
        return back();
    }

    /**
     * Удаление товара из корзины
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $products = session()->get('products');

        foreach ($products as $key => $item) {
            if ($item['product']->id == $product->id) {
                $products[$key]['count'] -= 1;

                if ($products[$key]['count'] < 1)
                {
                    unset($products[$key]);
                }

                session(['products' => $products]);
                session()->save();

                return redirect('/basket');
            }
        }
    }

    /**
     * Открыть страницу подтверждения заказа
     *
     * @return Renderable
     */
    public function checkout(): Renderable
    {
        return view('checkout');
    }

    /**
     * Создание заказа и сохранение его в базу данных
     * @param Request $request
     * @return RedirectResponse
     */
    public function payoff(Request $request): RedirectResponse
    {
        $order = new Order();
        $products = session()->get('products');

        if (Auth::user()) {
            $order->user_id = Auth::user()->id;

        } else {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric'
            ]);
            $customer = new Customer($data);
            $customer->save();

            $order->customer_id = $customer->id;
        }

        $order->price = $this->index()->summary_price;
        $order->save();

        foreach ($products as list('product' => $product, 'count' => $count)) {
            $order->products()->attach($product, ['count' => $count]);
        }

        session()->forget('products');
        return redirect(route('index'))->with('message', 'Заказ оформлен. Спасибо за покупку!');
    }
}
