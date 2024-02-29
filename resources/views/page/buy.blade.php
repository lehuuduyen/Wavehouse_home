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
                    <div id="radiotype">
                        <input type="hidden" name="network" id="choicename" value="TRC20">
                        <input type="radio" id="TRC20" class="choice" name="fee" value="1.0"
                            onchange=" onchangeinfo('TRC20');feechange(this.value);" checked="">
                        <label
                            onclick=" document.getElementById(&quot;TRC20&quot;).checked = true;onchangeinfo(&quot;TRC20&quot;);feechange(&quot;1.0&quot;);"><img
                                src="/static/home/img/site/TRC20.png" width="24" height="24" alt="TRX Network"> TRC20
                            - Tron (TRX) Network<span style="color:rgb(255, 144, 130);"> (fee=1.0)</span></label><br>
                        <input type="radio" id="BEP20" class="choice" name="fee" value="0.2"
                            onchange=" onchangeinfo('BEP20');feechange(this.value);">
                        <label
                            onclick=" document.getElementById(&quot;BEP20&quot;).checked = true;onchangeinfo(&quot;BEP20&quot;);feechange(&quot;0.2&quot;);"><img
                                src="/static/home/img/site/BEP20.png" width="24" height="24" alt="BSC Network"> BEP20
                            - Smart Chain Network<span style="color:rgb(255, 144, 130);"> (fee=0.2)</span></label><br>
                        <input type="radio" id="ERC20" class="choice" name="fee" value="13.0"
                            onchange=" onchangeinfo('ERC20');feechange(this.value); ">
                        <label
                            onclick=" document.getElementById(&quot;ERC20&quot;).checked = true;onchangeinfo(&quot;ERC20&quot;);feechange(&quot;13.0&quot;);"><img
                                src="/static/home/img/site/ERC20.png" width="24" height="24" alt="ETH Network"> ERC20
                            - Ethereum Network<span style="color:rgb(255, 144, 130);"> (fee=13.0)</span></label><br>
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