@extends('layouts.site')

@section('content')
    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="/upload/products/{{$product->img}}" class="image-wrap__image-product"></div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{$product->name}}</div>
                <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{ floatval($product->price) }}</b>
                        руб
                    </div>
                    @guest
                    <a title="Для того чтобы купить, войдите" href="{{ route('login') }}" class="btn btn-blue">Купить</a>
                    @else
                    <a href="{{ route('orders.store', ['product_id' => $product->id]) }}" class="btn btn-blue addToCart">Купить</a>
                    @endguest
                </div>
                <div class="product-container__content-text__description">
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content_bottom')
    @if ($products->count() > 0)
    <div class="line"></div>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($products as $product)
                @include('includes.item')
            @endforeach
        </div>
    </div>
    @endif
@endsection

@section('title')
    {{$title}}
@endsection

@section('orders_count')
    {{$ordersCount}}
@endsection