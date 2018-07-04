@extends('layouts.site')

@section('content')
    <div class="content-main__container">
        <div class="products-columns">
            @if ($products->count() > 0)
                @foreach($products as $product)
                    @include('includes.item')
                @endforeach
            @else
                <span class="products-columns__item__title-product__link">Извините, но по вашему запросу ничего не найдено</span>
            @endif
        </div>
    </div>
    <div class="content-footer__container">
        {{ $products->appends(['q' => Request::get('q')])->links() }}
    </div>
@endsection

@section('title')
    {{$title}}
@endsection

@section('orders_count')
    {{$ordersCount}}
@endsection