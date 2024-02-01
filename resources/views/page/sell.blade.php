@extends('page.buysell')

@section('content_buysell')


                    <script type="text/javascript" src="/static/home/js/sell.js"></script>
                    <script type="text/javascript">
                        window.onload = function() {
                        var formall = document.getElementById('formall');
                        formall.scrollIntoView();

                    };
                    $(document).ready(function(){
                        $("#submit").click(function(){
                        if ((flagbank==1)&&(flagam==1))
                          document.getElementById('submit').style.display = 'none';
                        });
                    });
                    var flagbank;var flagam;
                    function feechange(fee){
                        var min=document.getElementById("inputValidam").min;
                        var value=document.getElementById("inputValidam").value;
                        var valueusd=document.querySelector('input[id="inputValidusdt"]');

                        if (value - min>=0){
                            var price=document.getElementById("pricename").value;
                            var inputValidam=document.getElementById("inputValidam");
                            var amount=inputValidam.value;
                            var min=parseInt(inputValidam.min);
                            var max=parseInt(inputValidam.max);
                            // $("#shownamebank").html(" "+data['result']['name']+" ");
                            discount=document.getElementById('discount').value;
                            // discount=data['result']['discount'];
                            if ((amount >= min)&&(amount <= max))
                            {bonus=discount*amount*2;
                            result= amount*price + bonus;
                            showinputValidam.style.color = "green";
                            showinputValidam.className = 'form-control is-valid';
                            inputValidam.className = 'form-control is-valid';
                            $('#showinputValidam').html("Bạn nhận: "+commaSeparatedNumber(result.toFixed(0))+"VND");
                            $('#infoshowinputValidam').html("Thông tin chi tiết: "+commaSeparatedNumber(price)+" x " +amount+" + "+commaSeparatedNumber(bonus)+" = "+commaSeparatedNumber(result.toFixed(0))+" VND | Công thức: Price*Amount + Bonus = Total");
                            flagam=1;
                            if ((flagbank==1)&&(flagam==1)){submit.disabled=false;$("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");}}
                            // submit.disabled=false;
                            else{inputValidam.className = 'form-control is-invalid';
                                        showinputValidam.className = 'form-control is-invalid';
                                        showinputValidam.style.color = "red";
                                        $('#showinputValidam').html("Lỗi: Số lượng thấp nhất "+min+"$");
                                        $('#infoshowinputValidam').html("");
                                        $("#shownoti").html("");
                                    }
                        }

                    }
                    function getnamebank(value2){
                        var value = document.getElementById('accountbank').value;

                        if (value.length >5)
                        {   $('#shownamebank').html('loading...');
                            $('#bankdevice').html('loading...');
                            $.ajaxSetup({
                                data: {csrfmiddlewaretoken: 'qfvVKRUo7CNdEHOsGLs6o9TzdyOXWlZVK6SGcEzYp5BAEPUWjd0OozvyJhZFA61h' },
                            });
                            $.ajax({
                                url: 'https://autopaypm.com/custom_bank?account='+value+'&bankcode='+value2+'&chosse=1',
                                type: 'GET',

                                success: function(data) {
                                    result=data['result'];
                                    if (result['flag']==0){submit.disabled=true;flagbank=0;$("#shownoti").html("");$("#bankdevice").html(" "+data['result']['name']+" ")}
                                    else flagbank=1;
                                    var price=document.getElementById("pricename").value;
                                    var inputValidam=document.querySelector('input[id="inputValidam"]');
                                    var amount=inputValidam.value;
                                    var min=parseInt(inputValidam.min);
                                    var max=parseInt(inputValidam.max);
                                    $("#shownamebank").html(" "+data['result']['name']+" ");
                                    $("#bankdevice").html(" "+data['result']['name']+" ");
                                    document.getElementById('discount').value=(data['result']['discount']);
                                    discount=data['result']['discount'];
                                    if ((amount - min >=0 )&&(max - amount >=0 ))
                                        {
                                        bonus=discount*amount*2;
                                        result= amount*price + bonus;
                                        showinputValidam.style.color = "green";
                                        showinputValidam.className = 'form-control is-valid';
                                        inputValidam.className = 'form-control is-valid';
                                        $('#showinputValidam').html("Bạn nhận: "+commaSeparatedNumber(result.toFixed(0))+"VND");
                                        $('#infoshowinputValidam').html("Thông tin chi tiết: "+commaSeparatedNumber(price)+" x " +amount+" + "+commaSeparatedNumber(bonus)+" = "+commaSeparatedNumber(result.toFixed(0))+" VND | Công thức: Price*Amount + Bonus = Total");
                                        if ((flagbank==1)&&(flagam==1)){submit.disabled=false;$("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");}
                                    }
                                    // submit.disabled=false;
                                    else{
                                        inputValidam.className = 'form-control is-invalid';
                                        showinputValidam.className = 'form-control is-invalid';
                                        showinputValidam.style.color = "red";
                                        $('#showinputValidam').html("Lỗi: Số lượng thấp nhất "+min+"$");
                                        $('#infoshowinputValidam').html("");
                                        $("#shownoti").html("");
                                    }

                                }
                            });
                        }
                        else {
                                $("#shownamebank").html("Số tài khoản không chính xác, hãy thử lại!");
                                submit.disabled=true;$("#shownoti").html("");}
                    }
                    function onchangeinfo(value_){
                        a=document.getElementById('typechosse').innerHTML = value_;
                        b=document.getElementById('choicename').value = value_;

                        }
                    </script>
                    <h1 style="border: 1px dashed #eaeaea;font-size: 16px; padding: 3px; width:100%; text-align: center;">
                    Bán USDT BEP20 - TRC20 - ERC20 - PayID/BinaceID
                    <span style="color:rgb(255, 144, 130);" id="inffo">| Giá: {{ $priceSell }} vnđ | Tối Đa: 29,848.22 $
                    <p></p>
                    </span></h1>
                    <form action="" id="formall" method="post" style="padding: 10px;">
                    <input type="hidden" name="csrfmiddlewaretoken" value="qfvVKRUo7CNdEHOsGLs6o9TzdyOXWlZVK6SGcEzYp5BAEPUWjd0OozvyJhZFA61h">
                    <input type="hidden" id="balance" value="29848.215633205415">
                    <input type="hidden" id="pricename" value="24755">
                    <input type="hidden" id="discount" value="0">
                    <input type="hidden" id="bonus" value="0">
                    <div id="menu_exp">
                    <div class="row" id="row-amount">
                    <div class="label" id="label-amount">Nhập số lượng USDT bạn muốn bán:</div>
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="typechosse">TRC20</span>
                    <input type="text" class="form-control" id="inputValidam" autocomplete="off" spellcheck="false" min="10" max="29848.215633205415" name="amountp" placeholder="Min 10$ | Max 29,848.22$" required="" fdprocessedid="u6gkwm">
                    <span class="input-group-text" id="showinputValidam">0.00$</span>
                    <span class="valid-feedback" id="infoshowinputValidam" style="color:#78967a;font-style:italic;"></span>
                    </div>
                    </div>
                    <div class="row" id="row-net" style="border-color: rgb(255, 255, 255);">
                    <div class="label" id="label-net"></div>
                    <fieldset>
                    <legend><h1>Chọn loại network USDT:</h1></legend>
                    <div id="radiotype">
                    <input type="hidden" name="choicename" id="choicename" value="TRC20">
                    <input type="radio" id="TRC20" class="choice" name="choice" value="0.0" onchange="if (!window.__cfRLUnblockHandlers) return false; onchangeinfo('TRC20');feechange(this.value);" checked="">
                    <label onclick="if (!window.__cfRLUnblockHandlers) return false; document.getElementById(&quot;TRC20&quot;).checked = true;onchangeinfo(&quot;TRC20&quot;);feechange(this.value);" class="sweezy-custom-cursor-default-hover"><img src="/static/home/img/site/TRC20.png" width="24" height="24" alt="TRX Network"> TRC20 - Tron (TRX) Network <span style="color:rgb(255, 144, 130);"> (fee=0.0)</span></label><br>
                    <input type="radio" id="BEP20" class="choice" name="choice" value="0.0" onchange="if (!window.__cfRLUnblockHandlers) return false; onchangeinfo('BEP20');feechange(this.value);">
                    <label onclick="if (!window.__cfRLUnblockHandlers) return false; document.getElementById(&quot;BEP20&quot;).checked = true;onchangeinfo(&quot;BEP20&quot;);feechange(this.value);" class="sweezy-custom-cursor-default-hover"><img src="/static/home/img/site/BEP20.png" width="24" height="24" alt="BSC Network"> BEP20 - Smart Chain Network <span style="color:rgb(255, 144, 130);"> (fee=0.0)</span></label><br>
                    <input type="radio" id="ERC20" class="choice" name="choice" value="0.0" onchange="if (!window.__cfRLUnblockHandlers) return false; onchangeinfo('ERC20');feechange(this.value);">
                    <label onclick="if (!window.__cfRLUnblockHandlers) return false; document.getElementById(&quot;ERC20&quot;).checked = true;onchangeinfo(&quot;ERC20&quot;);feechange(this.value);"><img src="/static/home/img/site/ERC20.png" width="24" height="24" alt="ETH Network"> ERC20 - Ethereum Network <span style="color:rgb(255, 144, 130);"> (fee=0.0)</span></label><br>
                    </div>
                    </fieldset>
                    </div>
                    <div class="row" id="row-to">
                    <div class="label" id="label-from">Chọn loại Ngân hàng và Nhập số TK của bạn dùng để nhận tiền:</div>
                    <div class="form-group">
                    <div class="input-group mb-3">
                    <span class="input-group-text">
                     <input type="hidden" name="csrfmiddlewaretoken" value="qfvVKRUo7CNdEHOsGLs6o9TzdyOXWlZVK6SGcEzYp5BAEPUWjd0OozvyJhZFA61h">
                    <select class="form-select" name="banktt" id="exampleSelect1" onchange="if (!window.__cfRLUnblockHandlers) return false; getnamebank(this.value)" fdprocessedid="cpxfon">
                    <option id="bankt" name="bankt" value="970415">VietinBank</option>
                    <option id="bankt" name="bankt" value="970436" selected="">VietcomBank</option>
                    <option id="bankt" name="bankt" value="970433">Vietbank</option>
                    <option id="bankt" name="bankt" value="970427">VietABank</option>
                    <option id="bankt" name="bankt" value="970432">VPBank</option>
                    <option id="bankt" name="bankt" value="970441">VIB</option>
                    <option id="bankt" name="bankt" value="970407">Techcombank</option>
                    <option id="bankt" name="bankt" value="970423">TP Bank</option>
                    <option id="bankt" name="bankt" value="970440">SeABank</option>
                    <option id="bankt" name="bankt" value="970400">Saigon Bank</option>
                    <option id="bankt" name="bankt" value="970403">Sacombank</option>
                    <option id="bankt" name="bankt" value="970424">SHINHAN Bank</option>
                    <option id="bankt" name="bankt" value="970443">SHB</option>
                    <option id="bankt" name="bankt" value="970429">SCB</option>
                    <option id="bankt" name="bankt" value="970412">PVcomBank</option>
                    <option id="bankt" name="bankt" value="970430">PG Bank</option>
                    <option id="bankt" name="bankt" value="970414">OceanBank</option>
                    <option id="bankt" name="bankt" value="970448">OCB</option>
                    <option id="bankt" name="bankt" value="970428">NamABank</option>
                    <option id="bankt" name="bankt" value="970426">MSB</option>
                    <option id="bankt" name="bankt" value="970422">MBBank</option>
                    <option id="bankt" name="bankt" value="970449">LienVietPostBank</option>
                    <option id="bankt" name="bankt" value="970452">Kienlongbank</option>
                    <option id="bankt" name="bankt" value="458761">HSBC</option>
                    <option id="bankt" name="bankt" value="970437">HDBank</option>
                    <option id="bankt" name="bankt" value="970431">Eximbank</option>
                    <option id="bankt" name="bankt" value="970406">DongA Bank</option>
                    <option id="bankt" name="bankt" value="970438">BaoViet Bank</option>
                    <option id="bankt" name="bankt" value="970409">BacA Bank</option>
                    <option id="bankt" name="bankt" value="970418">BIDV</option>
                    <option id="bankt" name="bankt" value="970405">Agribank</option>
                    <option id="bankt" name="bankt" value="970416">ACB</option>
                    <option id="bankt" name="bankt" value="970425">ABBank</option>
                    </select>

                    </span>
                    <input id="accountbank" class="form-control" type="text" placeholder="Nhập số tài khoản ngân hàng nhận tiền của bạn..." name="bankr" required="" fdprocessedid="zxmnjd">
                    <span class="input-group-text" id="shownamebank" name="shownamebank" style="color:rgb(247, 103, 84);"></span>
                    </div>
                    <span id="bankdevice" name="bankdevice" style="color:rgb(248, 121, 104);float: right;"></span>
                    </div>
                    </div>
                    <div class="row" id="row-to">
                    <div class="input-group mb-3">
                    <input id="sdt" type="text" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập số điện thoại của bạn..." name="sdt" fdprocessedid="b4q6zp">
                    <span class="invalid-feedback" id="infoshowinputValid"></span>
                    </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                    <input type="radio" class="custom-control-input" id="customCheck1" checked=""> Tôi cam kết tài khoản ngân hàng của tôi là chính chủ, tiền của tôi dùng để thực hiện giao dịch là hoàn toàn hợp pháp!
                    </div>
                    <div style="padding: 10px 0px;"><button class="button" id="submit" fdprocessedid="6prjfi">Tiếp Tục</button></div>
                    <span id="shownoti" style="color:rgb(247, 244, 114); text-align: center;"> </span>
                    </div></form>

                    </div>
            </div>
        </div>


    </section>
@endsection
