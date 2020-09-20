@php
    $properties = getProperties();
@endphp


<aside class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-3 col_over">

    @if(\Route::current()->getName() == 'categories')
        @include('frontend.pages.products.components.category-nav-bar')
    @endif

    <span id="sfilter-line-container">
									<form name="_form" action="#" method="get" class="smartfilter">
										<div class="catalog-filter">
											<div class="wrp">
                                                @foreach($properties as $property)
												    <div class="filter-box">
													<div class="filter-box-title"><i class="fa fa-caret-down"></i>{{$currentLocale == 'uk' ? $property->title_ua : $property->title_ru}}<span class="sep">:</span> <span class="value"></span> <a href="#" class="remove"></a></div>
													<div class="filter-box-popup big">
														<div class="filtered-list">
															<div class="filtered-list-scroller-wrap">
																<div class="filtered-list-scroller">
																	<ul>
                                                                        @foreach($property->propertyValues as $value)
																		    <li>
                                                                                <input type="checkbox" class="" value="Y" name="arrFilter_438_528970892" id="{{$value->id}}" value_name="{{$currentLocale == 'uk' ? $value->value_ua : $value->value_ru}}" data_cat="belyy" data_code="tsvet_tsvetka" />
                                                                                <label for="{{$value->id}}" data-code="belyy">
                                                                                    <div class="over4"><i class="fa fa-check-square"></i></div>
                                                                                </label>
                                                                                {{$currentLocale == 'uk' ? $value->value_ua : $value->value_ru}}
																		    </li>
                                                                        @endforeach
																	</ul>
																</div>
																<div class="scrollbar">
																	<div class="handle"><div class="mousearea"></div></div>
																</div>
															</div>
														</div>
													</div>
												</div>
                                                @endforeach
											</div>
										</div>
									</form>

{{--									<a href="" id="fake_link" style="display: none;"></a>--}}
        {{--									<div class="rate" style="background: #fff; border: 1px solid #e4e4e4;">--}}
        {{--										<span>Семена</span>--}}
        {{--										<div class="rating-view"><span style="width: 98.2%;"></span></div>--}}
        {{--										<div class="text"><span class="rate-sp">4.9</span><span class="rate-sp">/</span><span class="rate-sp">5</span> <span class="rev">17803 отзывов</span></div>--}}
        {{--									</div>--}}
								</span>
</aside>






