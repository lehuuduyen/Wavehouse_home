@extends('page.buysell')

@section('content_buysell')
    <script type="text/javascript" src="/static/home/js/buy.js"></script>
    <script type="text/javascript">
        var submit = document.getElementById("submit");

        function onchangeinfo(value_) {
            var balance = document.getElementById('balance').value;
            document.getElementById('typechosse').innerHTML = value_;
            if (value_ == "PAYID")
                document.getElementById('inputValidusdt').placeholder = 'Nhập số ví ' + value_ +
                '/BinanceID nhận của bạn...';
            else if (value_ == "ERC20") {
                document.getElementById('inputValidam').min = 10;
                document.getElementById('inputValidam').placeholder = "Min 10$ | Max " + balance + "$";

                document.getElementById('inputValidusdt').placeholder = 'Nhập địa chỉ ví ' + value_ + ' nhận của bạn...';
            } else {
                document.getElementById('inputValidam').min = 10;
                document.getElementById('inputValidam').placeholder = "Min 10$ | Max " + balance + "$";
                document.getElementById('inputValidusdt').placeholder = 'Nhập địa chỉ ví ' + value_ + ' nhận của bạn...';
            }
            $('#inputValidusdt').trigger("change");
            $('#sdt').trigger("change");

            document.getElementById('choicename').value = value_;

        }

        function feechange(fee) {
        var submit = document.getElementById("submit");

            var min = document.getElementById("inputValidam").min;
            var value = document.getElementById("inputValidam").value;
            var valueusd = document.querySelector('input[id="inputValidusdt"]');

            if (value - min >= 0) {
                var price = document.getElementById("pricename").value;
                var inputValidam = document.getElementById("inputValidam");
                var amount = inputValidam.value;
                var min = parseInt(inputValidam.min);
                var max = parseInt(inputValidam.max);
                // $("#shownamebank").html(" "+data['result']['name']+" ");
                discount = document.getElementById('discount').value;
                // discount=data['result']['discount'];
                if ((amount >= min) && (amount <= max)) {
                    console.log(submit);
                    bonus = discount * amount * 2;
                    result = amount * price + bonus;
                    showinputValidam.style.color = "green";
                    showinputValidam.className = 'form-control is-valid';
                    inputValidam.className = 'form-control is-valid';
                    $('#showinputValidam').html("Bạn nhận: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
                    $('#infoshowinputValidam').html("Thông tin chi tiết: " + commaSeparatedNumber(price) + " x " + amount +
                        " + " + commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) +
                        " VND | Công thức: Price*Amount + Bonus = Total");
                    submit.disabled = false;
                    $("#shownoti").html(
                        "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                }
                else {
                    inputValidam.className = 'form-control is-invalid';
                    showinputValidam.className = 'form-control is-invalid';
                    showinputValidam.style.color = "red";
                    $('#showinputValidam').html("Lỗi: Số lượng thấp nhất " + min + "$");
                    $('#infoshowinputValidam').html("");
                    $("#shownoti").html("");
                }
            }
            $("#inputValidam").change()

        }

        // function getnamebank(value2) {
        //     var value = document.getElementById('accountbank').value;

        //     if (value.length > 5) {
        //         $('#shownamebank').html('loading...');
        //         $('#bankdevice').html('loading...');
        //         $.ajaxSetup({
        //             data: {
        //                 csrfmiddlewaretoken: 'qfvVKRUo7CNdEHOsGLs6o9TzdyOXWlZVK6SGcEzYp5BAEPUWjd0OozvyJhZFA61h'
        //             },
        //         });
        //         $.ajax({
        //             url: 'https://autopaypm.com/custom_bank?account=' + value + '&bankcode=' + value2 + '&chosse=1',
        //             type: 'GET',

        //             success: function(data) {
        //                 result = data['result'];
        //                 if (result['flag'] == 0) {
        //                     submit.disabled = true;
        //                     flagbank = 0;
        //                     $("#shownoti").html("");
        //                     $("#bankdevice").html(" " + data['result']['name'] + " ")
        //                 } else flagbank = 1;
        //                 var price = document.getElementById("pricename").value;
        //                 var inputValidam = document.querySelector('input[id="inputValidam"]');
        //                 var amount = inputValidam.value;
        //                 var min = parseInt(inputValidam.min);
        //                 var max = parseInt(inputValidam.max);
        //                 $("#shownamebank").html(" " + data['result']['name'] + " ");
        //                 $("#bankdevice").html(" " + data['result']['name'] + " ");
        //                 document.getElementById('discount').value = (data['result']['discount']);
        //                 discount = data['result']['discount'];
        //                 if ((amount - min >= 0) && (max - amount >= 0)) {
        //                     bonus = discount * amount * 2;
        //                     result = amount * price + bonus;
        //                     showinputValidam.style.color = "green";
        //                     showinputValidam.className = 'form-control is-valid';
        //                     inputValidam.className = 'form-control is-valid';
        //                     $('#showinputValidam').html("Bạn nhận: " + commaSeparatedNumber(result.toFixed(0)) +
        //                         "VND");
        //                     $('#infoshowinputValidam').html("Thông tin chi tiết: " + commaSeparatedNumber(
        //                         price) + " x " + amount + " + " + commaSeparatedNumber(bonus) + " = " +
        //                         commaSeparatedNumber(result.toFixed(0)) +
        //                         " VND | Công thức: Price*Amount + Bonus = Total");
        //                     if ((flagbank == 1) && (flagam == 1)) {
        //                         submit.disabled = false;
        //                         $("#shownoti").html(
        //                             "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>"
        //                             );
        //                     }
        //                 }
        //                 // submit.disabled=false;
        //                 else {
        //                     inputValidam.className = 'form-control is-invalid';
        //                     showinputValidam.className = 'form-control is-invalid';
        //                     showinputValidam.style.color = "red";
        //                     $('#showinputValidam').html("Lỗi: Số lượng thấp nhất " + min + "$");
        //                     $('#infoshowinputValidam').html("");
        //                     $("#shownoti").html("");
        //                 }

        //             }
        //         });
        //     } else {
        //         $("#shownamebank").html("Số tài khoản không chính xác, hãy thử lại!");
        //         submit.disabled = true;
        //         $("#shownoti").html("");
        //     }
        // }
    </script>

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

    <h1 style="border: 1px dashed #eaeaea;font-size: 16px; padding: 3px; width:100%; text-align: center;">
        Mua USDT BEP20 - TRC20 - ERC20 - PayID/BinaceID
        <span style="color:rgb(255, 144, 130);" id="inffo">| Giá: {{ $priceBuy }} $| Tối Đa:
            <?= number_format($max) ?> $
        </span>
        <p></p>
    </h1>

    <form action="/buy" id="formall" method="post" style="padding: 10px;">
        @csrf
        <input type="hidden" name="csrfmiddlewaretoken"
            value="9EbIS3K7GY9kOa9Dj0AhVZKhLEC5UJbutvytkQpHYrXHOif7Ws8ZVpmghnNNyudQ">
        @foreach ($errors->all() as $error)
            <div style="color: red">{{ $error }}</div>
        @endforeach
        <?php
        if(session('result')){
            $result = session('result');
            ?>
                <h1 style="color: #21b72f">Mua thành công</h1>
                <h4 style=""><b style="color: blanchedalmond">Số lượng mua:</b> <span><?=$result['amount']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Network:</b> <span><?=$result['network']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Fee:</b> <span><?=$result['fee']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Tên ngân hàng:</b> <span><?=$result['bank']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Stk:</b> <span><?=$result['stk']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Địa chỉ ví:</b> <span><?=$result['wallet']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">SĐT:</b> <span><?=$result['sdt']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Price:</b> <span><?=$result['price']?></span></h4>
                <h4 style=""><b style="color: blanchedalmond">Total:</b> <span><?=$result['total']?></span></h4>
            <?php


        }else{
        ?>
        <div id="menu_exp">
            <div class="row" id="row-amount">
                <div class="label" id="label-amount">Nhập số lượng USDT bạn muốn mua:</div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="typechosse">TRC20</span>
                    <input type="text" class="form-control " id="inputValidam" autocomplete="off" spellcheck="false"
                        min="10" max="<?= $max ?>" name="amount"
                        placeholder="Min 10$ | Max <?= number_format($max) ?>$" required="" fdprocessedid="hboe2a">
                    <span class="form-control" id="showinputValidam" style="color: green;"></span>
                    <span class="valid-feedback" id="infoshowinputValidam" style="color:#78967a;font-style:italic;"></span>
                </div>
            </div>
            <div class="row" id="row-net" style="border-color: rgb(255, 255, 255);">
                <div class="label" id="label-net"></div>
                <fieldset>
                    <legend>
                        <h1>Chọn loại network USDT:</h1>
                    </legend>
                    <?php
                    $feeTRC20 = '1.0';
                    $feeBEP20 = '0.22';
                    $feeERC20 = '15.0';
                    ?>
                    <div id="radiotype">
                        <input type="hidden" name="network" id="choicename" value="TRC20">
                        <input type="radio" id="TRC20" class="choice" name="fee" value="<?=$feeTRC20?>"
                            onchange=" onchangeinfo('TRC20');feechange(this.value);" checked="">
                        <label
                            onclick=" document.getElementById(&quot;TRC20&quot;).checked = true;onchangeinfo(&quot;TRC20&quot;);feechange(&quot;<?=$feeTRC20?>&quot;);"><img
                                src="/static/home/img/site/TRC20.png" width="24" height="24" alt="TRX Network"> TRC20
                            - Tron (TRX) Network<span style="color:rgb(255, 144, 130);"> (fee=<?=$feeTRC20?>)</span></label><br>
                        <input type="radio" id="BEP20" class="choice" name="fee" value="<?=$feeBEP20?>"
                            onchange=" onchangeinfo('BEP20');feechange(this.value);">
                        <label
                            onclick=" document.getElementById(&quot;BEP20&quot;).checked = true;onchangeinfo(&quot;BEP20&quot;);feechange(&quot;<?=$feeBEP20?>&quot;);"><img
                                src="/static/home/img/site/BEP20.png" width="24" height="24" alt="BSC Network"> BEP20
                            - Smart Chain Network<span style="color:rgb(255, 144, 130);"> (fee=<?=$feeBEP20?>)</span></label><br>
                        <input type="radio" id="ERC20" class="choice" name="fee" value="<?=$feeERC20?>"
                            onchange=" onchangeinfo('ERC20');feechange(this.value); ">
                        <label
                            onclick=" document.getElementById(&quot;ERC20&quot;).checked = true;onchangeinfo(&quot;ERC20&quot;);feechange(&quot;<?=$feeERC20?>&quot;);"><img
                                src="/static/home/img/site/ERC20.png" width="24" height="24" alt="ETH Network"> ERC20
                            - Ethereum Network<span style="color:rgb(255, 144, 130);"> (fee=<?=$feeERC20?>)</span></label><br>
                    </div>
                </fieldset>
            </div>
            <div class="row" id="row-to">
                <div class="label" id="label-from">Chọn loại Ngân hàng và Nhập số TK của bạn dùng để
                    thanh toán:</div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text">

                            <select class="form-select" name="bank" id="exampleSelect1" {{-- onchange=" getnamebank(this.value)" fdprocessedid="edi0o" --}}>
                                <option id="bankt" name="bankt" value="VietinBank">VietinBank</option>
                                <option id="bankt" name="bankt" value="VietcomBank" selected> VietcomBank</option>
                                <option id="bankt" name="bankt" value="Vietbank">Vietbank</option>
                                <option id="bankt" name="bankt" value="VietABank">VietABank</option>
                                <option id="bankt" name="bankt" value="VPBank">VPBank</option>
                                <option id="bankt" name="bankt" value="VIB">VIB</option>
                                <option id="bankt" name="bankt" value="Techcombank">Techcombank</option>
                                <option id="bankt" name="bankt" value="TP Bank">TP Bank</option>
                                <option id="bankt" name="bankt" value="SeABank">SeABank</option>
                                <option id="bankt" name="bankt" value="Saigon Bank">Saigon Bank</option>
                                <option id="bankt" name="bankt" value="Sacombank">Sacombank</option>
                                <option id="bankt" name="bankt" value="SHINHAN Bank">SHINHAN Bank</option>
                                <option id="bankt" name="bankt" value="SHB">SHB</option>
                                <option id="bankt" name="bankt" value="SCB">SCB</option>
                                <option id="bankt" name="bankt" value="PVcomBank">PVcomBank</option>
                                <option id="bankt" name="bankt" value="PG Bank">PG Bank</option>
                                <option id="bankt" name="bankt" value="OceanBank">OceanBank</option>
                                <option id="bankt" name="bankt" value="OCB">OCB</option>
                                <option id="bankt" name="bankt" value="NamABank">NamABank</option>
                                <option id="bankt" name="bankt" value="MSB">MSB</option>
                                <option id="bankt" name="bankt" value="MBBank">MBBank</option>
                                <option id="bankt" name="bankt" value="LienVietPostBank">LienVietPostBank</option>
                                <option id="bankt" name="bankt" value="Kienlongbank">Kienlongbank</option>
                                <option id="bankt" name="bankt" value="HSBC">HSBC</option>
                                <option id="bankt" name="bankt" value="HDBank">HDBank</option>
                                <option id="bankt" name="bankt" value="Eximbank">Eximbank</option>
                                <option id="bankt" name="bankt" value="DongA Bank">DongA Bank</option>
                                <option id="bankt" name="bankt" value="BaoViet Bank">BaoViet Bank</option>
                                <option id="bankt" name="bankt" value="BacA Bank">BacA Bank</option>
                                <option id="bankt" name="bankt" value="BIDV">BIDV</option>
                                <option id="bankt" name="bankt" value="Agribank">Agribank</option>
                                <option id="bankt" name="bankt" value="ACB">ACB</option>
                                <option id="bankt" name="bankt" value="ABBank">ABBank</option>
                            </select>

                        </span>
                        <input id="accountbank" class="form-control" type="text"
                            placeholder="Nhập số tài khoản ngân hàng bạn thanh toán..." name="stk" required=""
                            fdprocessedid="ukhh9">
                        <span class="input-group-text" id="shownamebank" name="shownamebank"
                            style="color:rgb(248, 121, 104);"> </span>
                    </div>
                    <span id="bankdevice" name="bankdevice" style="color:rgb(248, 121, 104);float: right;"></span>
                </div>
            </div>
            <div class="row" id="row-to">
                <div class="input-group mb-3">@csrf
                    <input type="text" class="form-control" id="inputValidusdt" name="wallet"
                        placeholder="Nhập địa chỉ ví TRC20 nhận của bạn..." required="" fdprocessedid="3agd8j">
                    <input id="sdt" type="text" class="form-control"
                        placeholder="Nhập số điện thoại của bạn..." name="sdt" required=""
                        fdprocessedid="mklj8m">
                    <span class="invalid-feedback" id="infoshowinputValid"></span>
                </div>
            </div>
            <div id="xmconfirm" title="Tài khoản chưa xác minh!" style="display:none;color:#de4444;">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Hãy xác minh
                    tài khoản trước
                    khi thực hiện giao dịch. <br> Bạn có muốn tiếp tục xác minh tài khoản? <br> <u
                        style="color:#21b72f;font-size:x-small;">Nếu tài khản bạn đã được xác minh trước
                        đó, xin liên hệ để được hỗ trợ!</u> </p>
            </div>
            <input type="hidden" id="pricename" value="{{ filter_var($priceBuy, FILTER_SANITIZE_NUMBER_INT) }}">
            <input type="hidden" id="discount" value="0">
            <input type="hidden" id="bonus" value="0">
            <input type="hidden" id="balance" value="19,025">
            <div class="custom-control custom-checkbox">
                <input type="radio" class="custom-control-input" id="customCheck1" checked=""> Tôi
                cam kết tài khoản ngân hàng của tôi là chính chủ, tiền của tôi dùng để thực hiện giao dịch
                là hoàn toàn hợp pháp!
            </div>
            <div style="padding: 10px 0px;"><button class="button" id="submit">Tiếp
                    Tục</button>
            </div>
            <span id="shownoti" style="color:rgb(247, 244, 114); text-align: center;"> </span>
        </div>
        <?php
        }
        ?>

    </form>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" type="text/javascript"></script>
    </div>
    </div>
    </div>


    </section>
@endsection
