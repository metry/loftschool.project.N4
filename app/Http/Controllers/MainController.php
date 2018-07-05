<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    const PRODUCTS_ON_PAGE = 6;

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(self::PRODUCTS_ON_PAGE);
        $data['products'] = $products;
        $data['title'] = 'Последние товары';
        $data['ordersCount'] = Order::where('user_id', Auth::id())->count();
        $data['categories'] = Category::all()->sortBy('id');
        $data['randomProduct'] = Product::inRandomOrder()->first();
        return view('index', $data);
    }

    public function search(Request $request)
    {
        $data['products'] = Product::searchProducts($request->get('q'), self::PRODUCTS_ON_PAGE);
        $data['title'] = 'Результаты поиска';
        $data['ordersCount'] = Order::where('user_id', Auth::id())->count();
        $data['categories'] = Category::all()->sortBy('id');
        $data['randomProduct'] = Product::inRandomOrder()->first();
        return view('search', $data);
    }
}
