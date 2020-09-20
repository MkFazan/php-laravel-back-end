<nav class="breadcrumbs col-lg-12 col-md-12 col-sm-12 col-xs-12 col_over" >
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="row"> <a href="{{redirect()->getUrlGenerator()->previous()}}">Назад</a>
        <li itemprop="itemListElement">
            <a itemprop="item" href="{{route('home')}}">
									<span itemprop="name" content="Agro-Market">
										<i class="fas fa-home"></i>
									</span>
            </a>
        </li>
        <li itemprop="itemListElement">
            <a itemprop="item" href="{{route('products', $product->id)}}">
                <span itemprop="name">{{$currentLocale == 'uk' ? $product->title_ua : $product->title_ru}}</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ul>
</nav>
