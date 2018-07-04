<div class="sidebar-item">
    <div class="sidebar-item__title">Категории</div>
    <div class="sidebar-item__content">
        <ul class="sidebar-category">
            @if ($categories->count() > 0)
                @foreach($categories as $category)
                    <li class="sidebar-category__item"><a href="{{route('categories.index', ['id' => $category->id])}}" class="sidebar-category__item__link">{{$category->name}}</a></li>
                @endforeach
            @else
                <li class="sidebar-category__item"><span class="sidebar-category__item__link">Пока категорий нет</span></li>
            @endif
        </ul>
    </div>
</div>