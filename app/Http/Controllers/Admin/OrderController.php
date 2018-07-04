<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::with('product')->with('user')->orderBy('id', 'desc')->get();
        return view('admin.orders.index', ['orders' => $data]);
    }
}
