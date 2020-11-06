<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index() {

        return view('admin.panel');
    }

    public function add_category() {

        return view('admin.add_category');
    }

    public function store_category(Request $request) {

        $validateAttributes = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = new Category($validateAttributes);
        $category->save();

        return redirect('/admin');
    }

    public function add_product() {

        $categories = Category::get();
        return view('admin.add_product', compact('categories'));
    }

    public function store_product(Request $request) {

        $validateAttributes = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|alpha_num',
            'photo' => 'required',
        ]);

        if($validateAttributes->fails()) {
            return redirect('/admin/add/product')->withErrors($validateAttributes->errors());
        }


        $path = $request->file('photo')->store('public/images');
        $path = explode('/', $path);
       //$photo = $request->photo->move(public_path('images'), time().'_'.$request->photo->getClientOriginalName());
//        dd($request->photo);

        $product = new Product($validateAttributes->validated());
        $product->category_id = $request->category;
        $product->photo = $path[2];
        $product->save();

        return redirect('/admin');
    }

    public function orders() {

        $orders = Order::get();
        return view('admin.orders', compact('orders'));
    }

    public function order(Order $order) {

        return view('admin.order', compact('order'));
    }

    public function confirm(Order $order) {

        $order->status = 1;
        $order->save();

        return redirect('/admin/orders');
    }

    public function add_coupon() {

    }
}
