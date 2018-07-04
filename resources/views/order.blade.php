@extends('layouts.site')

@section('content')
    <div class="content-main__container">
        <div class="cart-product-list">
            @if ($ordersCount > 0)
                @foreach($orders as $order)
                    <div class="cart-product-list__item">
                        <div class="cart-product__item__product-photo"><img src="/upload/products/{{ $order->product->img }}" class="cart-product__item__product-photo__image"></div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content"><a href="{{route('products.index', ['id' => $order->product->id])}}">{{ $order->product->name }}</a></div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">{{ $order->created_at->format('Y-m-d') }}</div>
                        </div>
                        <div class="cart-product__item__product-price"><span class="product-price__value">{{ floatval($order->product->price) }} руб.</span></div>
                    </div>
                @endforeach
            @else
                <span class="products-columns__item__title-product__link">Извините, но вы еще ничего не купили</span>
            @endif
        </div>
    </div>
    <div class="content-footer__container">
        {{ $orders->links() }}
    </div>
@endsection

@section('title')
    {{$title}}
@endsection

@section('orders_count')
    {{$ordersCount}}
@endsection