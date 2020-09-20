@php
    $answer_title_ru='Более подробную информацию можно получить ';
    $answer_title_ua='Більш детальну інформацію можна отримати  ';
    $answer_title1_ru='перейдя на эту страницу ';
    $answer_title1_ua='перейшовши на цю сторінку ';

@endphp
<div class="contacts-block "  >
    @foreach($questionCategories as $questionCategory)
        @if($questionCategory)
            <div class="category" style="background-image: url({{asset('storage/' . $questionCategory->path)}}">
                <p>{{$currentLocale == 'uk' ? $questionCategory->title_ua : $questionCategory->title_ru}}</p>
            </div>
        @endif
        <br />
        @foreach($questionCategory->answer as $questionAnswer)
        <b>• </b><span style="color: #045f20;"><b>{{$currentLocale == 'uk' ? $questionAnswer->question_ua : $questionAnswer->question_ru}}</b><br /></span>
                <br />
              <p>{{$currentLocale == 'uk' ? $questionAnswer->question_ua : $questionAnswer->answer_ru}}</p> <br />
            @endforeach
                {{$currentLocale == 'uk' ? $answer_title_ua : $answer_title_ru}}<a href="https://agro-market.net/payments-and-deliveries/">{{$currentLocale == 'uk' ? $answer_title1_ua : $answer_title1_ru}}</a>.<br />
            <br />
    @endforeach
</div>


    <style>
        .category{
            background-image: url({{asset('storage/' . $questionCategory->path)}});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .category p{
            padding: 25px;
        }
    </style>

