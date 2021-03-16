<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validateAttributes = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = new Category($validateAttributes);
        $category->save();

        return redirect(route('panel'));
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
        $data = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image',
        ]);

        if ($data->fails()) {
            return redirect(route('addProduct'))->withErrors($data->errors());
        }

        $request->file('photo')->store('public');
        $product = new Product($data->validated());
        $product->photo = $request->file('photo')->hashName();
        $product->save();

        return redirect(route('panel'));
    }

    /**
     * Открыть страницу со списком всех заказов
     *
     * @return Renderable
     */
    public function orders(): Renderable
    {
        $orders = Order::get();
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

    public function addCoupon()
    {

    }
}
