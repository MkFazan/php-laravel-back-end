<div class="product-gallery wrapper_gallery col-lg-4 col-md-4 col-sm-5 col-xs-6">
    <div class="row row_over">
        <div class="thumbs col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <ul class=" slick-slider slick-vertical">
                @foreach($product->images as $image)
                    <li onclick="choseImage(this)">
                        <a href="javascript:void(0);" tabindex="0">
                            <img src="{{asset('storage/' . $image->path)}}" data-src="{{asset('storage/' . $image->path)}}" alt=""   />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="big col-lg-9 col-md-9 col-sm-9 col-xs-9 open slick-initialized slick-slider slick-dotted" role="toolbar">
            <div aria-live="polite" class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 2840px;" role="listbox">
                    @for($i=0; $i<=$image->path; $i++)
                        <div class="item active slick-slide slick-current slick-active" data-slick-index="$i" aria-hidden="false" style="width: 355px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="-1" role="option" aria-describedby="slick-slide10">
							<span rel="gallery">
								<img src="{{asset('storage/' . $image->path)}}" class="prezent_image" alt="" />
{{--									<span class="shild_wrap">--}}
{{--									    <img class="shild-img" src="{{asset('storage/' . $image->path)}}" alt="sale" title="sale" />--}}
{{--                                    </span>--}}
{{--                                <div class="rg_left_stickers">--}}
{{--                                    <img class="shild-img" src="img/p-shildn.webp" alt="predzakaz" title="predzakaz" />--}}
{{--                                </div>--}}
                            </span>
                        </div>
                    @endfor

                </div>
            </div>

        </div>
    </div>
</div>
