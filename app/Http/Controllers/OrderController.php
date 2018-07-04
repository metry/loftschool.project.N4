<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Order;
use App\Mail as UserMail;
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

        $order = new Order();
        $order->user_id = Auth::id();
        $order->product_id = $product_id;
        $order->save();
        $newOrderId = $order->id;


        if (UserMail::count() > 0) {
            Mail::to(UserMail::all())->send(new NewOrder(['id' => $newOrderId]));
        }

        return response()->json([
            'result' => 'true',
            'id' => $newOrderId
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
        return view('order', $data);
    }
}