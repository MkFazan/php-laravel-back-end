<div class="rg_line3" style="width: 100%; background: #76aa6f52; margin-top: 30px">
    <div id="line3" class="line" style="background: none" >Характеристики</div>
    <div class="inline">
        <div class="tab all_props_tab" id="tab3" data-parent="#tab_all_props">
            {{--<div class="product-info">--}}
            <ul>
                @foreach($product->properties as $property)
                    <li>
						<span class="lbl">
					    	<span class="icon"></span> {{$currentLocale == 'uk' ? $property->title_ua : $property->title_ru}}:
						</span>
                        {{--@foreach($property->propertyValues as $propertyValue)--}}
                        <span class="val" >{{$currentLocale == 'uk' ? $property->propertyValues[0]->value_ua : $property->propertyValues[0]->value_ru}}</span>
                        {{--@endforeach--}}
                    </li>
                @endforeach
            </ul>
            {{--</div>--}}
        </div>
    </div>
</div>
