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
        <div style="display: flex">
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
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample" style="color: red;">
                                    <div class="accordion-body">
                                        <div class="he" id="he">Chúng tôi còn:<span
                                                style="font-size:15px;color: #ff0000" id="showprice"> Hơn 10,000.00
                                                $</span></div>
                                        <a style="text-decoration: none" href="/buy/usdt">
                                            <button id="bbuy" type="button" class="btn btn-outline-danger">Mua
                                                USDT<span class="sell">25,110 ₫</span><br>
                                            </button></a>
                                        <a style="text-decoration: none" href="/sell/usdt">
                                            <button id="bsell" type="button" class="btn btn-outline-success">Bán
                                                USDT<span class="buy">24,775 ₫</span>
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
            <div class="a2" style="    margin-left: 20px;">
                <div class="form" id="form" style="border: 0px;padding: 0px;">
                    <div id="empty" class="empty" style="display: none;">
                        <div class="trans">
                            <div class="header"
                                style="background-color: #0b1f39;color: #e6e5e5;border: 0px;    padding: 14px 10px;">Lịch
                                sử giao dịch khách hàng:</div>
                        </div>
                    </div>
                    <script type="text/javascript" src="/static/home/js/buy.js"></script>
                    <script type="text/javascript">
                        window.onload = function() {
                            var formall = document.getElementById('formall');
                            formall.scrollIntoView();
                        };
                        $(document).ready(function() {

                            $("#sdt").on("input", function() {
                                // Kiểm tra xem giá trị của input số điện thoại có tồn tại không
                                var phoneNumber = $(this).val().trim();

                                if ((phoneNumber.length > 11 && phoneNumber.charAt(0) == '+' && !isNaN(phoneNumber
                                        .substring(1))) || (phoneNumber.length > 9 && !isNaN(phoneNumber.substring(1)))) {
                                    // Nếu có giá trị, hiển thị nút Submit
                                    $("#submit").show();
                                } else {
                                    // Nếu không có giá trị, ẩn nút Submit
                                    $("#submit").hide();
                                }
                            });
                            $("#submit").click(function() {
                                if ((flagbank == 1) && (flagam == 1))
                                    document.getElementById('submit').style.display = 'none';
                            });
                        });
                        var flagbank;
                        var flagam;
                        var flagbankd;

                        function showInput() {

                            var radio1 = document.getElementById("radiopm1").checked;
                            var radio2 = document.getElementById("radiopm2").checked;
                            if (radio1) {
                                document.getElementById('inputValidpm').style.display = 'block';
                                document.getElementById('inputValidpm').value = '';
                                $("#showinputValidpm").html('...');
                                flagbankd = 0;
                                submit.disabled = true;
                            } else if (radio2) {
                                let valueam = document.getElementById("inputValidam").value;
                                let valuebank = document.getElementById("accountbank").value;
                                document.getElementById('inputValidpm').style.display = 'none';
                                $("#showinputValidpm").html('Bạn sẽ nhận bằng PM voucher');
                                $("#infoshowinputValid").html('');
                                flagbankd = 1;
                                if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
                                    submit.disabled = false;
                                    $("#shownoti").html(
                                        "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                                }
                                document.getElementById("inputValidpm").required = false;

                            }
                        }

                        function feechange(fee) {
                            if (parseFloat(fee) - 3 > 0) var min = 50;
                            else var min = parseInt(document.getElementById("inputValidam").min);
                            let value = document.getElementById("inputValidam").value;
                            var valueusd = document.querySelector('input[id="inputValidusdt"]');

                            if (value - min >= 0) {
                                let discount = document.getElementById("discount").value;
                                let bonus = document.getElementById("bonus").value;
                                var price = document.getElementById("pricename").value;
                                bonus = discount * value * 2;
                                result = value * price + fee * price - bonus;
                                showinputValidam.style.color = "green";
                                showinputValidam.className = 'form-control is-valid';
                                inputValidam.className = 'form-control is-valid';
                                $('#showinputValidam').html("Tổng thanh toán: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
                                $('#infoshowinputValidam').html("Thông tin: " + commaSeparatedNumber(price) + " x (" + value + "+" + (fee) +
                                    ") - " + commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) +
                                    " VND | Công thức: Price*(Amount+Fee) - Bonus = Total");
                                // submit.disabled=false;
                                flagam = 1;
                                if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
                                    submit.disabled = false;
                                    $("#shownoti").html(
                                        "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                                }
                            } else {
                                inputValidam.className = 'form-control is-invalid';
                                showinputValidam.className = 'form-control is-invalid';
                                showinputValidam.style.color = "red";
                                $('#showinputValidam').html("Lỗi: Số lượng thấp nhất " + min + "$");
                                $('#infoshowinputValidam').html("");
                                flagam = 0;
                                submit.disabled = true;
                                $("#shownoti").html("");
                            }
                            if (valueusd.value) {
                                var info = valueusd.placeholder;
                                var text = valueusd.value;
                                if (((info.includes('TRC20') && (text.length == 34)) || ((info.includes('BEP20') || (info.includes(
                                        'ERC20'))) && (text.length == 42))) || (info.includes('PAYID') && ((text.length == 8) || (text
                                        .length == 9)))) {
                                    inputValidusdt.className = 'form-control is-valid';
                                    $('#infoshowinputValid').html('');
                                    flagbankd = 1;
                                    if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
                                        submit.disabled = false;
                                        $("#shownoti").html(
                                            "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                                    }
                                    // submit.disabled=false;
                                } else {
                                    inputValidusdt.className = 'form-control is-invalid';
                                    $('#infoshowinputValid').html('Lỗi: Sai thông tin tài khoản USDT.');
                                    flagbankd = 0;
                                    submit.disabled = true;
                                    $("#shownoti").html("");
                                }
                            }
                        }

                        function getnamebank(value2) {
                            var value = document.getElementById('accountbank').value;
                            var select = document.getElementById('exampleSelect1');
                            if (value.length > 5) {
                                $("#shownamebank").html('loading...');
                                $.ajaxSetup({
                                    data: {
                                        csrfmiddlewaretoken: '9EbIS3K7GY9kOa9Dj0AhVZKhLEC5UJbutvytkQpHYrXHOif7Ws8ZVpmghnNNyudQ'
                                    },
                                });
                                $.ajax({
                                    url: '/custom_bank?account=' + value + '&bankcode=' + value2 + '&chosse=1',
                                    type: 'GET',

                                    success: function(data) {
                                        result = data['result'];
                                        select.value = data['result']['bankcode'];
                                        if (result['flag'] == 0) {
                                            submit.disabled = true;
                                            flagbank = 0;
                                            $("#shownamebank").html(" " + data['result']['name'] + " ");
                                            $("#shownoti").html("");
                                            $("#bankdevice").html(" " + data['result']['name'] + " ");
                                        } else if (result['flag'] == 1 && result['verify'] == 0) {
                                            flagbank = 0;
                                            $("#shownamebank").html(" " + data['result']['name'] + " ");
                                            $("#bankdevice").html(" " + data['result']['name'] + " ");
                                            document.getElementById('xmconfirm').style.display = 'block';
                                            $("#xmconfirm").dialog({
                                                resizable: false,
                                                height: "auto",
                                                width: 400,
                                                modal: true,
                                                buttons: {
                                                    "Tiếp Tục": function() {
                                                        value2 = data['result']['bankcode'];
                                                        window.location = '/verify?account=' + value +
                                                            '&bankcode=' + value2;

                                                    },
                                                    Cancel: function() {
                                                        window.location = '';
                                                    }
                                                }
                                            });
                                        } else if (result['flag'] == 1 && parseInt(result['verify']) == 1) {
                                            flagbank = 1;
                                            $("#shownamebank").html(" " + data['result']['name'] + " ");
                                            $("#bankdevice").html(" " + data['result']['name'] + " ");
                                        }
                                        let discount = document.getElementById("discount").value;
                                        let bonus = document.getElementById("bonus").value;
                                        let price = document.getElementById("pricename").value;
                                        let inputValidam = document.getElementById("inputValidam");
                                        let amount = inputValidam.value;
                                        var min = parseInt(inputValidam.min);
                                        var max = parseInt(inputValidam.max);
                                        if (min < 10) fee = amount * 0.5 / 100;
                                        else {
                                            checked = document.querySelector('input[name="choice"]:checked').value;
                                            fee = parseInt(checked)
                                        }

                                        document.getElementById('discount').value = (data['result']['discount']);
                                        discount = data['result']['discount'];
                                        if ((amount - min >= 0) && (max - amount >= 0)) {
                                            bonus = discount * amount * 2;
                                            result = amount * price + fee * price - bonus;
                                            showinputValidam.style.color = "green";
                                            showinputValidam.className = 'form-control is-valid';
                                            inputValidam.className = 'form-control is-valid';
                                            $('#showinputValidam').html("Tổng thanh toán: " + commaSeparatedNumber(result
                                                .toFixed(0)) + "VND");
                                            $('#infoshowinputValidam').html("Thông tin: " + commaSeparatedNumber(price) +
                                                " x (" + amount + "+" + commaSeparatedNumber(fee.toFixed(2)) + ") - " +
                                                commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(
                                                    0)) + " VND | Công thức: Price*(Amount+Fee) - Bonus = Total");
                                            flagam = 1;
                                            if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
                                                submit.disabled = false;
                                                $("#shownoti").html(
                                                    "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>"
                                                    );
                                            }
                                        } else {
                                            inputValidam.className = 'form-control is-invalid';
                                            showinputValidam.className = 'form-control is-invalid';
                                            showinputValidam.style.color = "red";
                                            $('#showinputValidam').html("Lỗi: Số lượng thấp nhất " + min + "$");
                                            $('#infoshowinputValidam').html("");
                                            flagam = 0;
                                            submit.disabled = true;
                                            $("#shownoti").html("");
                                        }
                                    }
                                });
                            } else {
                                $("#shownamebank").html("Số tài khoản không chính xác, hãy thử lại!");
                                flagbank = 0;
                                submit.disabled = true;
                                $("#shownoti").html("");
                            }
                        }

                        function onchangeinfo(value_) {
                            var balance = document.getElementById('balance').value;
                            document.getElementById('typechosse').innerHTML = value_;
                            if (value_ == "PAYID")
                                document.getElementById('inputValidusdt').placeholder = 'Nhập số ví ' + value_ +
                                '/BinanceID nhận của bạn...';
                            else if (value_ == "ERC20") {
                                document.getElementById('inputValidam').min = 50;
                                document.getElementById('inputValidam').placeholder = "Min 50$ | Max " + balance + "$";

                                document.getElementById('inputValidusdt').placeholder = 'Nhập địa chỉ ví ' + value_ + ' nhận của bạn...';
                            } else {
                                document.getElementById('inputValidam').min = 10;
                                document.getElementById('inputValidam').placeholder = "Min 10$ | Max " + balance + "$";
                                document.getElementById('inputValidusdt').placeholder = 'Nhập địa chỉ ví ' + value_ + ' nhận của bạn...';
                            }
                            document.getElementById('choicename').value = value_;

                        }
                    </script>
                    <h1 style="border: 1px dashed #eaeaea;font-size: 16px; padding: 3px; width:100%; text-align: center;">
                        Mua USDT BEP20 - TRC20 - ERC20 - PayID/BinaceID
                        <span style="color:rgb(255, 144, 130);" id="inffo">| Giá: 25,091 vnđ| Tối Đa: 10,000.00 $
                        </span>
                        <p></p>
                    </h1>
                    <form action="" id="formall" method="post" style="padding: 10px;">
                        <input type="hidden" name="csrfmiddlewaretoken"
                            value="9EbIS3K7GY9kOa9Dj0AhVZKhLEC5UJbutvytkQpHYrXHOif7Ws8ZVpmghnNNyudQ">
                        <div id="menu_exp">
                            <div class="row" id="row-amount">
                                <div class="label" id="label-amount">Nhập số lượng USDT bạn muốn mua:</div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="typechosse">TRC20</span>
                                    <input type="text" class="form-control" id="inputValidam" autocomplete="off"
                                        spellcheck="false" min="10" max="19025.0" name="amountr"
                                        placeholder="Min 10$ | Max 19,025.00$" required="" fdprocessedid="rangbc">
                                    <span class="input-group-text" id="showinputValidam">0.00$</span>
                                    <span class="valid-feedback" id="infoshowinputValidam"
                                        style="color:#78967a;font-style:italic;"></span>
                                </div>
                            </div>
                            <div class="row" id="row-net" style="border-color: rgb(255, 255, 255);">
                                <div class="label" id="label-net"></div>
                                <fieldset>
                                    <legend>
                                        <h1>Chọn loại network USDT:</h1>
                                    </legend>
                                    <div id="radiotype">
                                        <input type="hidden" name="choicename" id="choicename" value="TRC20">
                                        <input type="radio" id="TRC20" class="choice" name="choice"
                                            value="1.0"
                                            onchange="if (!window.__cfRLUnblockHandlers) return false; onchangeinfo('TRC20');feechange(this.value);"
                                            checked="">
                                        <label
                                            onclick="if (!window.__cfRLUnblockHandlers) return false; document.getElementById(&quot;TRC20&quot;).checked = true;onchangeinfo(&quot;TRC20&quot;);feechange(&quot;1.0&quot;);"><img
                                                src="/static/home/img/site/TRC20.png" width="24" height="24"
                                                alt="TRX Network"> TRC20 - Tron (TRX) Network<span
                                                style="color:rgb(255, 144, 130);"> (fee=1.0)</span></label><br>
                                        <input type="radio" id="BEP20" class="choice" name="choice"
                                            value="0.19"
                                            onchange="if (!window.__cfRLUnblockHandlers) return false; onchangeinfo('BEP20');feechange(this.value);">
                                        <label
                                            onclick="if (!window.__cfRLUnblockHandlers) return false; document.getElementById(&quot;BEP20&quot;).checked = true;onchangeinfo(&quot;BEP20&quot;);feechange(&quot;0.19&quot;);"><img
                                                src="/static/home/img/site/BEP20.png" width="24" height="24"
                                                alt="BSC Network"> BEP20 - Smart Chain Network<span
                                                style="color:rgb(255, 144, 130);"> (fee=0.19)</span></label><br>
                                        <input type="radio" id="ERC20" class="choice" name="choice"
                                            value="6.0"
                                            onchange="if (!window.__cfRLUnblockHandlers) return false; onchangeinfo('ERC20');feechange(this.value); ">
                                        <label
                                            onclick="if (!window.__cfRLUnblockHandlers) return false; document.getElementById(&quot;ERC20&quot;).checked = true;onchangeinfo(&quot;ERC20&quot;);feechange(&quot;6.0&quot;);"><img
                                                src="/static/home/img/site/ERC20.png" width="24" height="24"
                                                alt="ETH Network"> ERC20 - Ethereum Network<span
                                                style="color:rgb(255, 144, 130);"> (fee=6.0)</span></label><br>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row" id="row-to">
                                <div class="label" id="label-from">Chọn loại Ngân hàng và Nhập số TK của bạn dùng để
                                    thanh toán:</div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">

                                            <select class="form-select" name="banktt" id="exampleSelect1"
                                                onchange="if (!window.__cfRLUnblockHandlers) return false; getnamebank(this.value)"
                                                fdprocessedid="edi0o">
                                                <option id="bankt" name="bankt" value="970415">VietinBank</option>
                                                <option id="bankt" name="bankt" value="970436" selected="">
                                                    VietcomBank</option>
                                                <option id="bankt" name="bankt" value="970433">Vietbank</option>
                                                <option id="bankt" name="bankt" value="970427">VietABank</option>
                                                <option id="bankt" name="bankt" value="970432">VPBank</option>
                                                <option id="bankt" name="bankt" value="970441">VIB</option>
                                                <option id="bankt" name="bankt" value="970407">Techcombank</option>
                                                <option id="bankt" name="bankt" value="970423">TP Bank</option>
                                                <option id="bankt" name="bankt" value="970440">SeABank</option>
                                                <option id="bankt" name="bankt" value="970400">Saigon Bank</option>
                                                <option id="bankt" name="bankt" value="970403">Sacombank</option>
                                                <option id="bankt" name="bankt" value="970424">SHINHAN Bank
                                                </option>
                                                <option id="bankt" name="bankt" value="970443">SHB</option>
                                                <option id="bankt" name="bankt" value="970429">SCB</option>
                                                <option id="bankt" name="bankt" value="970412">PVcomBank</option>
                                                <option id="bankt" name="bankt" value="970430">PG Bank</option>
                                                <option id="bankt" name="bankt" value="970414">OceanBank</option>
                                                <option id="bankt" name="bankt" value="970448">OCB</option>
                                                <option id="bankt" name="bankt" value="970428">NamABank</option>
                                                <option id="bankt" name="bankt" value="970426">MSB</option>
                                                <option id="bankt" name="bankt" value="970422">MBBank</option>
                                                <option id="bankt" name="bankt" value="970449">LienVietPostBank
                                                </option>
                                                <option id="bankt" name="bankt" value="970452">Kienlongbank
                                                </option>
                                                <option id="bankt" name="bankt" value="458761">HSBC</option>
                                                <option id="bankt" name="bankt" value="970437">HDBank</option>
                                                <option id="bankt" name="bankt" value="970431">Eximbank</option>
                                                <option id="bankt" name="bankt" value="970406">DongA Bank</option>
                                                <option id="bankt" name="bankt" value="970438">BaoViet Bank
                                                </option>
                                                <option id="bankt" name="bankt" value="970409">BacA Bank</option>
                                                <option id="bankt" name="bankt" value="970418">BIDV</option>
                                                <option id="bankt" name="bankt" value="970405">Agribank</option>
                                                <option id="bankt" name="bankt" value="970416">ACB</option>
                                                <option id="bankt" name="bankt" value="970425">ABBank</option>
                                            </select>

                                        </span>
                                        <input id="accountbank" class="form-control" type="text"
                                            placeholder="Nhập số tài khoản ngân hàng bạn thanh toán..." name="bankp"
                                            required="" fdprocessedid="ukhh9">
                                        <span class="input-group-text" id="shownamebank" name="shownamebank"
                                            style="color:rgb(248, 121, 104);"> </span>
                                    </div>
                                    <span id="bankdevice" name="bankdevice"
                                        style="color:rgb(248, 121, 104);float: right;"></span>
                                </div>
                            </div>
                            <div class="row" id="row-to">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="inputValidusdt" name="walletr"
                                        placeholder="Nhập địa chỉ ví TRC20 nhận của bạn..." required=""
                                        fdprocessedid="3agd8j">
                                    <input id="sdt" type="text" class="form-control"
                                        placeholder="Nhập số điện thoại của bạn..." name="sdt" required=""
                                        fdprocessedid="mklj8m">
                                    <span class="invalid-feedback" id="infoshowinputValid"></span>
                                </div>
                            </div>
                            <div id="xmconfirm" title="Tài khoản chưa xác minh!" style="display:none;color:#de4444;">
                                <p><span class="ui-icon ui-icon-alert"
                                        style="float:left; margin:12px 12px 20px 0;"></span>Hãy xác minh tài khoản trước
                                    khi thực hiện giao dịch. <br> Bạn có muốn tiếp tục xác minh tài khoản? <br> <u
                                        style="color:#21b72f;font-size:x-small;">Nếu tài khản bạn đã được xác minh trước
                                        đó, xin liên hệ để được hỗ trợ!</u> </p>
                            </div>
                            <input type="hidden" id="pricename" value="25091">
                            <input type="hidden" id="discount" value="0">
                            <input type="hidden" id="bonus" value="0">
                            <input type="hidden" id="balance" value="19,025">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="customCheck1" checked=""> Tôi
                                cam kết tài khoản ngân hàng của tôi là chính chủ, tiền của tôi dùng để thực hiện giao dịch
                                là hoàn toàn hợp pháp!
                            </div>
                            <div style="padding: 10px 0px;"><button class="button" id="submit" disabled="">Tiếp
                                    Tục</button>
                            </div>
                            <span id="shownoti" style="color:rgb(247, 244, 114); text-align: center;"> </span>
                        </div>
                    </form>

                    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                    <script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
                    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" type="text/javascript"></script>
                </div>
            </div>
        </div>


    </section>
@endsection
