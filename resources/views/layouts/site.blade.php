<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body>
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container"><a href="{{ route('index') }}" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="{{ route('index') }}" class="nav-list__item__link">Главная</a></li>
                @auth
                    <li class="nav-list__item"><a href="{{ route('orders.index') }}" class="nav-list__item__link">Мои заказы</a></li>
                @endauth
                <!--<li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>-->
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                    <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">@yield('orders_count')</span><span class="payment-basket__status__basket-value-descr">заказов</span></div>
                </div>
            </div>
            <div class="authorization-block">
                @guest
                <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a>
                <a href="{{ route('login') }}" class="authorization-block__link">Войти</a>
                @else

                 @if (Auth::user()->role == 1)
                      <span class="authorization-block__link">{{ Auth::user()->name }}</span>
                      <a href="{{ route('admin.index') }}" class="authorization-block__link">Панель администратора</a>
                 @else
                      <span class="authorization-block__link">{{ Auth::user()->name }}</span>
                 @endif


                <a class="authorization-block__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выйти
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
                @endguest
            </div>
        </div>
    </header>
    <div class="middle">
        <div class="sidebar">
            @include('includes.categories')
            <!--<div class="sidebar-item">
                <div class="sidebar-item__title">Последние новости</div>
                <div class="sidebar-item__content">
                    <div class="sidebar-news">
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
            </div>
            <div class="content-middle">
                <div class="content-head__container">
                    <div class="content-head__title-wrap">
                        <div class="content-head__title-wrap__title bcg-title">@yield('title')</div>
                    </div>
                    <div class="content-head__search-block">
                        <div class="search-container">
                            <form class="search-container__form" action="{{route('search')}}" method="get">
                                <input type="text" class="search-container__form__input"  name="q">
                                <button class="search-container__form__btn">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            <div class="content-bottom">
                @yield('content_bottom')
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__footer-content">
            @if ($randomProduct)
            <div class="random-product-container">
                <div class="random-product-container__head">Случайный товар</div>
                <div class="random-product-container__content">
                    <div class="item-product">
                        <div class="item-product__title-product"><a href="{{route('products.index', ['id' => $randomProduct->id])}}" class="item-product__title-product__link">{{$randomProduct->name}}</a></div>
                        <div class="item-product__thumbnail"><a href="{{route('products.index', ['id' => $randomProduct->id])}}" class="item-product__thumbnail__link"><img src="/upload/products/{{$randomProduct->img}}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                        <div class="item-product__description">
                            <div class="item-product__description__products-price"><span class="products-price">{{ floatval($randomProduct->price) }} руб</span></div>
                            <div class="item-product__description__btn-block">
                                @guest
                                    <a title="Для того чтобы купить, войдите" href="{{ route('login') }}" class="btn btn-blue">Купить</a>
                                @else
                                    <a href="{{ route('orders.store', ['product_id' => $randomProduct->id]) }}" class="btn btn-blue addToCart">Купить</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="footer__footer-content__main-content">
                <p>
                    Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                    онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                    У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                    и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                    коды продления и многое друго. Также здесь всегда можно узнать последние новости
                    из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                    актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                    что немаловажно, выгодно!
                </p>
            </div>
        </div>
        <div class="footer__social-block">
            <ul class="social-block__list bcg-social">
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/main.js"></script>

<!-- Modal -->
<div class="modal-form" id="modal">
    <div class="modal-content">
        <span class="close" id="modal_close">&times;</span>
        <p id="modal_content"></p>
    </div>
</div>

</body>
</html>