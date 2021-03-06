<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Открыть страницу панель админа
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('admin.panel');
    }

    /**
     * Открыть страницу добавления категории
     *
     * @return Renderable
     */
    public function addCategory(): Renderable
    {
        return view('admin.addCategory');
    }

    /**
     * Сохранить новую категорию в базе данных
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeCategory(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = new Category($data);
        $category->save();

        return redirect(route('panel'))->with('message', 'Категория успешно добавлена.');
    }

    /**
     * Открыть страницу добавления товара
     *
     * @return Renderable
     */
    public function addProduct(): Renderable
    {
        $categories = Category::get();
        return view('admin.addProduct', compact('categories'));
    }

    /**
     * Сохранить новый товар в базе данных
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeProduct(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => 'required|numeric',
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image',
        ]);

        $request->file('photo')->store('public');
        $product = new Product($data);
        $product->photo = $request->file('photo')->hashName();
        $product->save();

        return redirect(route('panel'))->with('message', 'Товар успешно добавлен.');
    }

    /**
     * Открыть страницу со списком не обработанных заказов
     *
     * @return Renderable
     */
    public function orders(Request $request): Renderable
    {
        $orders = Order::where('status', 0)->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function completedOrders()
    {
        $orders = Order::where('status', 1)->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    /**
     * Открыть страницу определенного заказа
     *
     * @param Order $order
     * @return Renderable
     */
    public function order(Order $order): Renderable
    {
        return view('admin.order', compact('order'));
    }

    /**
     * Подтвердить определенный заказ
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function confirm(Order $order): RedirectResponse
    {
        $order->status = 1;
        $order->save();
        return redirect(route('orders'));
    }

    /**
     * Найти заказ в базе данных
     *
     * @param Request $request
     * @return Renderable
     */
    public function find(Request $request): Renderable
    {
        $order = Order::find($request['order']);
        return view('admin.order', compact('order'));
    }

    public function addCoupon()
    {

    }
}
