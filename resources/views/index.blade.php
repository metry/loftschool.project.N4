@extends('layouts.site')

@section('content')
    <div class="content-main__container">
        <div class="products-columns">
            @if ($products->count() > 0)
                @foreach($products as $product)
                    @include('includes.item')
                @endforeach
            @else
                <span class="products-columns__item__title-product__link">Извините, но продуктов пока нет</span>
            @endif
        </div>
    </div>
    <div class="content-footer__container">
        {{ $products->links() }}
    </div>
@endsection

@section('title')
    {{$title}}
@endsection

@section('orders_count')
    {{$ordersCount}}
@endsection