<div class="col-md-12">
    <div class="row">
        <div class="longlinesub">
            <div class="col-md-12">
                <div class="">
                    <p class="ss-title">ПОДПИШИСЬ НА РАССЫЛКУ</p>
                    <p class="ss-desc">Акции, подарки, скидки, распродажа</p>
                </div>
                <div class="rlsub">
                    <input type="text" placeholder="Ваш email" /> <button>подписаться</button>
                    <span class="oferta"><input type="checkbox" checked="checked" />Я <a href="oferta.html">соглашаюсь</a> на обработку персональных данных</span>
                </div>
            </div>
        </div>
    </div>
    <style>
        .oferta {
            color: #fff;
        }
        .oferta input {
            margin-right: 10px;
            width: 15px;
            height: 15px;
        }
        .oferta a {
            color: #0a4ba4;
        }
        .longlinesub {
            background-image: url({{asset('img/subscrible.webp')}});
            min-height: 333px;
            overflow: hidden;
            margin: 5px 0;
            background-size: cover;
            border: none;
            padding: 40px 0;
            margin-bottom: 20px;
            text-align: center;
            font-family: ProximaNova;
        }
        .ss-title {
            font-weight: 800;
            color: #0a4ba4;
            text-transform: uppercase;
            font-size: 30px;
        }
        .ss-desc {
            font-size: 20px;
            color: #373737;
            font-weight: 600;
        }
        .longlinesub input[type="text"] {
            background: #fff;
            color: #373737;
            font-weight: 600;
            width: 400px;
            height: 40px;
            line-height: 40px;
            font-size: 16px;
            padding: 0px 10px;
            border: none;
            border-radius: 5px;
            display: block;
            margin: 45px auto 15px;
        }
        .longlinesub .rlsub {
            color: #0a4ba4;
            text-align: center;
        }
        .longlinesub button {
            width: 230px;
            height: 45px;
            background-color: #0a4ba4;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            border: none;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
            transition: 500ms;
        }
        .longlinesub button:hover {
            background-color: #404b3f;
        }
        @media (max-width: 480px) {
            .longlinesub input {
                width: 255px;
            }
            .oferta input {
                width: unset;
            }
        }
    </style>
</div>
