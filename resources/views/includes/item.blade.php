<div class="products-columns__item">
    <div class="products-columns__item__title-product"><a href="{{route('products.index', ['id' => $product->id])}}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
    <div class="products-columns__item__thumbnail"><a href="{{route('products.index', ['id' => $product->id])}}" class="products-columns__item__thumbnail__link"><img src="/upload/products/{{$product->img}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
    <div class="products-columns__item__description"><span class="products-price">{{ floatval($product->price) }} руб</span>
        @guest
            <a title="Для того чтобы купить, войдите" href="{{ route('login') }}" class="btn btn-blue">Купить</a>
        @else
            <a href="{{ route('orders.store', ['product_id' => $product->id]) }}" class="btn btn-blue addToCart">Купить</a>
        @endguest
    </div>
</div>