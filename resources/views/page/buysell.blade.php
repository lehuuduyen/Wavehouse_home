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
                            <div class="bar-rate_bar_item_rate_buy"><span>BÁN RA: {{ $priceBuy }} ₫</span></div>
                            <div class="bar-rate_bar_item_rate_sell"><span>MUA VÀO: {{ $priceSell }} ₫</span></div>
                        </div>
                    </div>
                </li>
                {{-- <li style="margin-left: 0px;">
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
                </li> --}}
            </ul>
        </div>
    </div>


        @yield('content_buysell')
@endsection
