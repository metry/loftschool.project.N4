@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Orders</h1>
        <table class="table table-bordered">
            <tr>
                <td>Order ID</td>
                <td>User name</td>
                <td>User email</td>
                <td>Product id</td>
                <td>Product name</td>
                <td>Product price</td>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->product->id}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->product->price}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection