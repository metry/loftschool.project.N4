<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    const PRODUCTS_ON_PAGE = 3;

    public function index($id)
    {
        $product = Product::find($id);
        $data['product'] = $product;
        $data['title'] = $product->name . ' в разделе ' . $product->category->name;
        $data['products'] = Product::inRandomOrder()->limit(self::PRODUCTS_ON_PAGE)->get();
        $data['ordersCount'] = Order::where('user_id', Auth::id())->count();
        return view('product', $data);
    }
}
