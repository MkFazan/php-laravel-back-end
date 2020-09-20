<nav class="catalog-nav">
    <div class="catalog-nav-header">{{$currentLocale == 'uk' ? $category->title_ua : $category->title_ru}}</div>
    <div class="catalog-nav-content">
        <ul>
            <li class="opening opened">
                <span class="next-lvl"></span>
                <ul class="hide-lvl">
                    @foreach($category->children as $cat)
                        <li class=""><a href="{{route('catalog', $cat)}}">{{$currentLocale == 'uk' ? $cat->title_ua : $cat->title_ru}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</nav>
