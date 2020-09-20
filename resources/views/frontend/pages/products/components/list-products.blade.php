<div class="catalog_section" id="catalog_section" data-hover-effect="" data-quick-view-enabled="">
    <ul>
        @foreach($products as $product)
            @php
                $title = $currentLocale == 'uk' ? $product->title_ua : $product->title_ru;
                $dataId = $product->id + config('app.default_start_number_id_for_view');
            @endphp

            <li class="catalog-item opt" id="{{$product->id}}" data-id="{{$dataId}}">
            <div class="img-wrap">

{{--                Стікери для пробукта--}}
{{--                @include('frontend.pages.products.components.stickers-for-page')--}}

                <a data-pos="11" data-id="{{$dataId}}" data-name="{{$title}}" data-price="{{$product->price}}" href="{{route('products', $product->id)}}">
                    <img class="lazy" data-original="{{asset(config('app.default_image_for_product'))}}" alt='Редис "Богиня" ТМ "Весна" 2г12' src="{{asset(config('app.default_image_for_product'))}}"/>
                </a>
            </div>
            <div class="product-info-section">

{{--                Рейтинг продукта та кількість коментарів до нього--}}
{{--                @include('frontend.pages.products.components.stars-and-comments')--}}

                <div class="stat-line price-line">
                    <span class="status availiable">В наличии</span>
                    <span class="gr"> {{$dataId}}</span>
                </div>
                <div class="name">
                    <a data-pos="11" data-id="8667" data-name="{{$title}}" data-price="2.99" href="{{route('products', $product->id)}}">
                        {{$title}}
                    </a>
                </div>
                <div class="catalog-item-footer">
                    <div class="counter clearfix">
                        <div class="price-line">
                            <span class="price">{{$product->price}}<small>грн</small></span>
                        </div>
                        <div class="price-line">
                            <span class="counter-grid">
                                <div class="jq-number">
                                    <div class="jq-number__field"><input class="count_buy" type="number" min="1" value="1" /></div>
                                    <div class="jq-number__spin minus"></div>
                                    <div class="jq-number__spin plus"></div>
                                </div>
                            </span>
                            <input class="count_buy1" type="hidden" min="1" value="1" />
                            <div class="buy-wrap">
                                <a onclick="console.log('Add to cart')" class="buy-btn" >
                                    Купить
                                </a>
                                <span class="in-basket-counter item-8667" style="display: none;"> </span>
                            </div>

{{--                            Кількість бонусів при покупці даного продукту--}}
{{--                            @include('frontend.pages.products.components.bonus-for-product')--}}
                        </div>
                    </div>
                </div>

{{--                Знижки при покупці продукта більше ніж в одному екземплярі--}}
{{--                @include('frontend.pages.products.components.hover-for-product')--}}

            </div>
        </li>
        @endforeach

            <div class="row">
                <div class="col-auto" style="display: flex; align-items: center; justify-content: center;">
                    {{ $products->links() }}
                </div>
            </div>
    </ul>
</div>
