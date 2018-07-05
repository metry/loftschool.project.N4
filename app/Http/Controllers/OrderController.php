<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\NewOrder;
use App\Order;
use App\Mail as UserMail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    const ORDERS_ON_PAGE = 4;

    public function store($product_id, Request $request)
    {
        if (!auth()->user()) {
            return response()->json([
                'errors' => 'not logged'
            ]);
        }

        $validator = Validator::make(
            ['product_id' => $product_id],
            ['product_id' => 'bail|required|exists:products,id']
        );
        if (!$validator->passes()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $order = Order::add([
            'user_id' => Auth::id(),
            'product_id' => $product_id
        ]);

        if (UserMail::count() > 0) {
            Mail::to(UserMail::all())->send(new NewOrder(['id' => $order->id]));
        }

        return response()->json([
            'result' => 'true',
            'id' => $order->id
        ]);
    }

    public function index()
    {
        $data['title'] = 'Результаты поиска';
        $data['orders'] = Order::with('product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(self::ORDERS_ON_PAGE);
        $data['ordersCount'] = Order::where('user_id', Auth::id())->count();
        $data['categories'] = Category::all()->sortBy('id');
        $data['randomProduct'] = Product::inRandomOrder()->first();
        return view('order', $data);
    }
}
