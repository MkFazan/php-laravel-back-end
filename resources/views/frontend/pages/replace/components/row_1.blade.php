<div class="row">
    <div class="col-xs-12 col-sm-push-6  col-sm-6">
        <div class="block2">
            <div class="tittle-all">
                <span class="icn"></span>
                <p class="tittle">{{($currentLocale == 'uk' ? $replace->title_ua : $replace->title_ru)}}</p>
            </div>
            <p class="sm-tittle">{{($currentLocale == 'uk' ? $replace->header_ua : $replace->header_ru)}}</p>
            <p>{{($currentLocale == 'uk' ? $replace->description_ua : $replace->description_ru)}}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-pull-6 col-sm-6 img-r">
        <img width="460" alt="картинка 2-min.jpg" src="{{asset('storage/' . $replace->path)}}" height="385" title="картинка 2-min.jpg" /><br />
    </div>
</div>
