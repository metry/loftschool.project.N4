<?php

namespace App\Http\Controllers;

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
        return view('index', $data);
    }

    public function search(Request $request)
    {
        $searchString = $request->get('q');
        $products = Product::where('name', 'LIKE', "%". $searchString ."%")
            ->orWhere('description', 'LIKE', "%". $searchString ."%")
            ->orderBy('id', 'desc')
            ->paginate(self::PRODUCTS_ON_PAGE);
        $data['products'] = $products;
        $data['title'] = 'Результаты поиска';
        $data['ordersCount'] = Order::where('user_id', Auth::id())->count();
        return view('search', $data);
    }
}
