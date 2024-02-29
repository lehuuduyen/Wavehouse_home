@extends('page.buysell')

@section('content_buysell')
    <script type="text/javascript" src="/static/home/js/sell.js"></script>
    <script type="text/javascript">
        var submit = document.getElementById("submit");

        window.onload = function() {
            var formall = document.getElementById('formall');
            formall.scrollIntoView();

        };
        $(document).ready(function() {
            $("#submit").click(function() {
                if ((flagbank == 1) && (flagam == 1))
                    document.getElementById('submit').style.display = 'none';
            });


        });
        var flagbank;
        var flagam;

        function onchangeinfo(value_) {
            console.log(value_);
            a = document.getElementById('typechosse').innerHTML = value_;
            b = document.getElementById('choicename').value = value_;

        }

        function feechange(fee) {
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
                    bonus = discount * amount * 2;
                    result = amount * price + bonus;
                    showinputValidam.style.color = "green";
                    showinputValidam.className = 'form-control is-valid';
                    inputValidam.className = 'form-control is-valid';
                    $('#showinputValidam').html("Bạn nhận: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
                    $('#infoshowinputValidam').html("Thông tin chi tiết: " + commaSeparatedNumber(price) + " x " + amount +
                        " + " + commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) +
                        " VND | Công thức: Price*Amount + Bonus = Total");
                    flagam = 1;

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
        //                             price) + " x " + amount + " + " + commaSeparatedNumber(bonus) + " = " +
        //                         commaSeparatedNumber(result.toFixed(0)) +
        //                         " VND | Công thức: Price*Amount + Bonus = Total");
        //                     if ((flagbank == 1) && (flagam == 1)) {
        //                         submit.disabled = false;
        //                         $("#shownoti").html(
        //                             "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>"
        //                         );
        //                     }
        //                 }
        //                 submit.disabled=false;
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
        Bán USDT BEP20 - TRC20 - ERC20 - PayID/BinaceID
        <span style="color:rgb(255, 144, 130);" id="inffo">| Giá: {{ $priceSell }} vnđ
            <p></p>
        </span>
    </h1>
    <form action="/sell" id="formall" method="post" style="padding: 10px;">
        @csrf

        <input type="hidden" name="csrfmiddlewaretoken"
            value="qfvVKRUo7CNdEHOsGLs6o9TzdyOXWlZVK6SGcEzYp5BAEPUWjd0OozvyJhZFA61h">
        <input type="hidden" id="balance" value="29848.215633205415">
        <input type="hidden" id="pricename" value="{{ filter_var($priceSell, FILTER_SANITIZE_NUMBER_INT) }}">
        <input type="hidden" id="discount" value="0">
        <input type="hidden" id="bonus" value="0">
        <?php
        if(session('result')){
            $result = session('result');
            ?>
        <h1 style="color: #21b72f">Mua thành công</h1>
        <h4 style=""><b style="color: blanchedalmond">Số lượng Bán:</b> <span><?= $result['amount'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">Network:</b> <span><?= $result['network'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">Địa chỉ ví cần gửi:</b> <span><?= $result['address'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">Tên ngân hàng:</b> <span><?= $result['bank'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">Stk:</b> <span><?= $result['stk'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">SĐT:</b> <span><?= $result['sdt'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">Price:</b> <span><?= $result['price'] ?></span></h4>
        <h4 style=""><b style="color: blanchedalmond">Total:</b> <span><?= $result['total'] ?></span></h4>
        <?php


        }else{
        ?>
        <div id="menu_exp">
            <div class="row" id="row-amount">
                <div class="label" id="label-amount">Nhập số lượng USDT bạn muốn bán:</div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="typechosse">TRC20</span>
                    <input type="text" class="form-control " id="inputValidam" autocomplete="off" spellcheck="false"
                        min="10" max="30119.582296553133" name="amount" placeholder="Min 10$ | Max 30,119.58$"
                        required="" fdprocessedid="neem8l">
                    <span class="form-control" id="showinputValidam" style="color: red;"></span>
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
                        <input type="radio" id="TRC20" class="choice" name="fee" value="0.0"
                            onchange="onchangeinfo('TRC20');feechange(this.value);" checked="">
                        <label onclick="onchangeinfo('TRC20');feechange(this.value);"><img
                                src="/static/home/img/site/TRC20.png" width="24" height="24" alt="TRX Network"> TRC20
                            - Tron (TRX) Network <span style="color:rgb(255, 144, 130);"> (fee=0.0)</span></label><br>
                        <input type="radio" id="BEP20" class="choice" name="fee" value="0.0"
                            onchange=" onchangeinfo('BEP20');feechange(this.value);">
                        <label onclick="onchangeinfo('BEP20');feechange(this.value);"><img
                                src="/static/home/img/site/BEP20.png" width="24" height="24" alt="BSC Network"> BEP20
                            - Smart Chain Network <span style="color:rgb(255, 144, 130);"> (fee=0.0)</span></label><br>
                        {{-- <input type="radio" id="PAYID" class="choice" name="choice" value="0.0"
                            onchange=" onchangeinfo('PAYID');feechange(this.value);"> --}}
                        {{-- <label
                            onclick="onchangeinfo(&quot;PAYID&quot;);feechange(this.value);"><img
                                src="/static/home/img/site/PAYID.png" width="24" height="24" alt="C2C Network"> PAYID
                            - C2C in Binance<span style="color:rgb(255, 144, 130);"> (fee=0.0)</span> </label><br> --}}
                        <input type="radio" id="ERC20" class="choice" name="fee" value="0.0"
                            onchange=" onchangeinfo('ERC20');feechange(this.value);">
                        <label onclick="onchangeinfo('ERC20');feechange(this.value);"><img
                                src="/static/home/img/site/ERC20.png" width="24" height="24" alt="ETH Network">
                            ERC20 - Ethereum Network <span style="color:rgb(255, 144, 130);"> (fee=0.0)</span></label><br>
                    </div>
                </fieldset>
            </div>
            <div class="row" id="row-to">
                <div class="label" id="label-from">Chọn loại Ngân hàng và Nhập số TK của bạn dùng để nhận tiền:</div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <input type="hidden" name="csrfmiddlewaretoken"
                                value="isWggm3UOwcqvoqKO15VPkQZNdcByYLGCjj1I9Iu6Z0NvwwertDDPKsYjWnjcJN2">
                            <select class="form-select" name="bank" id="exampleSelect1" {{-- onchange="if (!window.__cfRLUnblockHandlers) return false; getnamebank(this.value)" --}}
                                fdprocessedid="t66fut">
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
                            placeholder="Nhập số tài khoản ngân hàng nhận tiền của bạn..." name="stk" required=""
                            fdprocessedid="mkbwpm">
                        <span class="input-group-text" id="shownamebank" name="shownamebank"
                            style="color:rgb(247, 103, 84);"></span>
                    </div>
                    <span id="bankdevice" name="bankdevice" style="color:rgb(248, 121, 104);float: right;"></span>
                </div>
            </div>
            <div class="row" id="row-to">
                <div class="input-group mb-3">
                    <input id="sdt" type="text" class="form-control" autocomplete="off" spellcheck="false"
                        placeholder="Nhập số điện thoại của bạn..." name="sdt" fdprocessedid="217w">
                    <span class="invalid-feedback" id="infoshowinputValid"></span>
                </div>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="radio" class="custom-control-input" id="customCheck1" checked=""> Tôi cam kết tài
                khoản ngân hàng của tôi là chính chủ, tiền của tôi dùng để thực hiện giao dịch là hoàn toàn hợp pháp!
            </div>
            <div style="padding: 10px 0px;"><button class="button" id="submit" fdprocessedid="m6k8w"
                    disabled="">Tiếp Tục</button></div>
            <span id="shownoti" style="color:rgb(247, 244, 114); text-align: center;"></span>
        </div>
        <?php }?>
    </form>

    </div>
    </div>
    </div>


    </section>
@endsection
