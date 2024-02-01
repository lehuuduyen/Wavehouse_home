@extends('page.app')

@section('content')

<section class="home">
    <div class="welcome" name="showrate">
        <div id="exchangeDirections">
            <ul>
                <li style="margin-left: 0px;">
                    <div class="bar-rate_bar_item">
                        <div class="bar-rate_bar_item_icon">
                            <img src="/static/home/img/site/USDTERC20.png" alt="Tỷ giá USDT">
                            <div class="bar-rate_bar_item_detail">
                                <div class="bar-rate_bar_item_detail_name">Tether USDT</div>
                                <div class="bar-rate_bar_item_detail_symbol">USDT-VND</div>
                            </div>
                        </div>
                        <div class="bar-rate_bar_item_rate">
                            <div class="bar-rate_bar_item_rate_buy"><span>BÁN RA: 25,113 ₫</span></div>
                            <div class="bar-rate_bar_item_rate_sell"><span>MUA VÀO: 24,778 ₫</span></div>
                        </div>
                    </div>
                </li>
                <li style="margin-left: 0px;">
                    <div class="bar-rate_bar_item">
                        <div class="bar-rate_bar_item_icon">
                            <img src="/static/home/img/site/PerfectMoney.png" alt="Tỷ giá PM PerfectMoney">
                            <div class="bar-rate_bar_item_detail">
                                <div class="bar-rate_bar_item_detail_name">Perfect Money</div>
                                <div class="bar-rate_bar_item_detail_symbol">PM-VND</div>
                            </div>
                        </div>
                        <div class="bar-rate_bar_item_rate">
                            <div class="bar-rate_bar_item_rate_buy"><span>BÁN RA: 24,390 ₫</span></div>
                            <div class="bar-rate_bar_item_rate_sell"><span>MUA VÀO: 23,950 ₫</span></div>
                        </div>
                    </div>
                </li>
                <li style="margin-left: 0px;">
                    <div class="bar-rate_bar_item">
                        <div class="bar-rate_bar_item_icon">
                            <img src="/static/home/img/site/btc.png">
                            <div class="bar-rate_bar_item_detail">
                                <div class="bar-rate_bar_item_detail_name">AllCoin</div>
                                <div class="bar-rate_bar_item_detail_symbol">BTC-ETH-BNB-...</div>
                            </div>
                        </div>
                        <div class="bar-rate_bar_item_rate">
                            <div class="bar-rate_bar_item_rate_buy"><span>BÁN RA: ₫</span></div>
                            <div class="bar-rate_bar_item_rate_sell"><span>MUA VÀO: ₫</span></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="div-cha">
        <div class="a1" id="a1">
            <div class="header">CHỌN LOẠI BẠN MUỐN MUA BÁN:</div>
            <div class="menu" id="tab">
                <div class="tab">
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h1 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    fdprocessedid="25de8a">
                                    <li class="item" title="Mua Bán USDT">
                                        <div class="logo"><img src="/static/home/img/site/USDTERC20.png"
                                                width="35" height="35" alt="Giao dịch USDT"></div>
                                        <div id="nametitle" class="sweezy-custom-cursor-hover"
                                            style="null;cursor: url(&quot;data:image/png;base64,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&quot;) 8 2, pointer !important;">
                                            Giao Dịch USDT <br> <span style="font-size:smaller;color: #5bc16c"> TRC20 -
                                                BEP20 - ERC20 - PAYID</span></div>
                                    </li>
                                </button>
                            </h1>
                            <div id="collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="color: red;">
                                <div class="accordion-body">
                                    <div class="he" id="he">Chúng tôi còn:<span
                                            style="font-size:15px;color: #ff0000" id="showprice"> Hơn 10,000.00
                                            $</span></div>
                                    <a style="text-decoration: none" href="/buy/usdt">
                                        <button id="bbuy" type="button" class="btn btn-outline-danger">Mua
                                            USDT<span class="sell">{{ $priceBuy }} ₫</span><br>
                                        </button></a>
                                    <a style="text-decoration: none" href="/sell/usdt">
                                        <button id="bsell" type="button" class="btn btn-outline-success">Bán
                                            USDT<span class="buy">{{ $priceSell }} ₫</span>
                                        </button></a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="contact" class="box" style="display: block;">
                    <div class="pad">
                        <div class="header">LIÊN HỆ HỖ TRỢ:</div>
                        <div class="content">Liên hệ Chat Trực tiếp 24/24:
                            <br>E-mail: <span style="color: red;" class="selectall">admin@autopaypm.com</span>
                            <br>Skype: <span style="color: red;" class="selectall">autopaypm.com</span>
                            <br>Facebook: <u><a style="color: red;" class="selectall"
                                    href="https://www.facebook.com/autopaypm">Fanpage Autopaypm</a></u>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="a2" style="    ">
            <div class="form" id="form" style="border: 0px;padding: 0px;">
                <div id="empty" class="empty" style="display: none;">
                    <div class="trans">
                        <div class="header"
                            style="background-color: #0b1f39;color: #e6e5e5;border: 0px;    padding: 14px 10px;">Lịch
                            sử giao dịch khách hàng:</div>
                    </div>
                </div>


        @yield('content_buysell')
@endsection
