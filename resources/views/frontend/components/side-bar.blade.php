<div class="l-col">
    <nav class="static-nav">
        <ul>
            @php
                $pages = getPages();
                $currentLocale = getCurrentLocale();
            @endphp

            @foreach($pages as $page)
                @if($page->is_sidebar)
                    @php
                        $urlIcon = 'img/icon-' . $page->slug . ($page->id == $currentPage->id ? "-w" : "") . '.png';
                    @endphp

                    <li class="{{$page->id == $currentPage->id ? "active" : ""}}">
                        <a href="{{route('get.page.for.slug', $page->slug)}}">
                            <span class="icon">
                                <img src="{{asset($urlIcon)}}" alt="{{$currentLocale == 'uk' ? $page->title_ua : $page->title_ru}}" title="{{$currentLocale == 'uk' ? $page->title_ua : $page->title_ru}}" />
                            </span>
                            {{$currentLocale == 'uk' ? $page->title_ua : $page->title_ru}}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
