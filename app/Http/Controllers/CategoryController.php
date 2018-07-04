<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    const PRODUCTS_ON_PAGE = 6;

    public function index($id)
    {
        $category = Category::find($id);
        $products = Product::orderBy('id', 'desc')
            ->where('category_id', $category->id)
            ->paginate(self::PRODUCTS_ON_PAGE);
        $data['products'] = $products;
        $data['title'] = 'Игры в разделе ' . $category->name;
        $data['description'] = $category->description;
        $data['ordersCount'] = Order::where('user_id', Auth::id())->count();
        $data['categories'] = Category::all()->sortBy('id');
        $data['randomProduct'] = Product::inRandomOrder()->first();
        return view('category', $data);
    }
}
