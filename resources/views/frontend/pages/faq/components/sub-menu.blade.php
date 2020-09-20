<nav class="breadcrumbs col-lg-12 col-md-12 col-sm-12 col-xs-12 col_over">
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="row">
        <a href="/">Назад</a>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/">
                <span itemprop="name" content="Agro-Market"><i class="fas fa-home"></i></span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/faq/"><span itemprop="name">{{$currentLocale == 'uk' ? $currentPage->title_ua : $currentPage->title_ru}}</span></a><meta itemprop="position" content="2" />
        </li>
    </ul>
</nav>
