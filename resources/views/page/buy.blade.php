@extends('page.buysell')

@section('content_buysell')
    <script type="text/javascript" src="/static/home/js/buy.js"></script>
    <script type="text/javascript">
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
            document.getElementById('choicename').value = value_;
            console.log('====================================');
            console.log('onchangeinfo ', value_);
            console.log('====================================');
        }

        function feechange(fee) {
            var min = document.getElementById("inputValidam").min;
            var value = document.getElementById("inputValidam").value;
            var valueusd = document.querySelector('input[id="inputValidusdt"]');
            console.log('====================================');
            console.log('feechange ', fee);
            console.log('====================================');
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
                    if ((flagbank == 1) && (flagam == 1)) {
                        submit.disabled = false;
                        $("#shownoti").html(
                            "<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                    }
                }
                // submit.disabled=false;
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
        <span style="color:rgb(255, 144, 130);" id="inffo">| Giá: {{ $priceBuy }} vnđ| Tối Đa:
            10,000.00 $
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
                    <input type="text" class="form-control " id="inputValidam" autocomplete="off" spellcheck="false"
                        min="10" max="14074.0" name="amountr" placeholder="Min 10$ | Max 14,074.00$" required=""
                        fdprocessedid="hboe2a">
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
                        <input type="hidden" name="choicename" id="choicename" value="TRC20">
                        <input type="radio" id="TRC20" class="choice" name="choice" value="1.0"
                            onchange=" onchangeinfo('TRC20');feechange(this.value);" checked="">
                        <label
                            onclick=" document.getElementById(&quot;TRC20&quot;).checked = true;onchangeinfo(&quot;TRC20&quot;);feechange(&quot;1.0&quot;);"><img
                                src="/static/home/img/site/TRC20.png" width="24" height="24" alt="TRX Network"> TRC20
                            - Tron (TRX) Network<span style="color:rgb(255, 144, 130);"> (fee=1.0)</span></label><br>
                        <input type="radio" id="BEP20" class="choice" name="choice" value="0.19"
                            onchange=" onchangeinfo('BEP20');feechange(this.value);">
                        <label
                            onclick=" document.getElementById(&quot;BEP20&quot;).checked = true;onchangeinfo(&quot;BEP20&quot;);feechange(&quot;0.19&quot;);"><img
                                src="/static/home/img/site/BEP20.png" width="24" height="24" alt="BSC Network"> BEP20
                            - Smart Chain Network<span style="color:rgb(255, 144, 130);"> (fee=0.19)</span></label><br>
                        <input type="radio" id="ERC20" class="choice" name="choice" value="6.0"
                            onchange=" onchangeinfo('ERC20');feechange(this.value); ">
                        <label
                            onclick=" document.getElementById(&quot;ERC20&quot;).checked = true;onchangeinfo(&quot;ERC20&quot;);feechange(&quot;6.0&quot;);"><img
                                src="/static/home/img/site/ERC20.png" width="24" height="24" alt="ETH Network"> ERC20
                            - Ethereum Network<span style="color:rgb(255, 144, 130);"> (fee=6.0)</span></label><br>
                    </div>
                </fieldset>
            </div>
            <div class="row" id="row-to">
                <div class="label" id="label-from">Chọn loại Ngân hàng và Nhập số TK của bạn dùng để
                    thanh toán:</div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text">

                            <select class="form-select" name="banktt" id="exampleSelect1" {{-- onchange=" getnamebank(this.value)" fdprocessedid="edi0o" --}}>
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
                            placeholder="Nhập số tài khoản ngân hàng bạn thanh toán..." name="bankp" required=""
                            fdprocessedid="ukhh9">
                        <span class="input-group-text" id="shownamebank" name="shownamebank"
                            style="color:rgb(248, 121, 104);"> </span>
                    </div>
                    <span id="bankdevice" name="bankdevice" style="color:rgb(248, 121, 104);float: right;"></span>
                </div>
            </div>
            <div class="row" id="row-to">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inputValidusdt" name="walletr"
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
