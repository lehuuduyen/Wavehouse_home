


function commaSeparatedNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var flagbank;
var flagam;
var flagbankd;
$(document).ready(function () {

    var submit = document.getElementById("submit");
    var inputValidusdt = document.getElementById("inputValidusdt");
    var showinputValidam = document.getElementById("showinputValidam");
    var price = document.getElementById("pricename").value;
    var inputValidam = document.getElementById("inputValidam");
    var sdt = document.getElementById('sdt');
    var choice = document.getElementsByClassName('choice').checked;
    var value = document.getElementById("inputValidam").value;
    $("#inputValidam").on("change", function () {
        var discount = document.getElementById("discount").value;
        var bonus = document.getElementById("bonus").value;
        var value = this.value;

        var price = $('#pricename').val();
        var min = parseInt(inputValidam.min);
        var max = parseInt(inputValidam.max);
        if (min < 10) fee = value * 0.5 / 100;
        else {
            checked = document.querySelector('input[name="choice"]:checked').value;
            fee = parseFloat(checked)
        }
        if ((isNaN(value) == true)) {
            showinputValidam.style.color = "red";
            $('#showinputValidam').html('Lỗi: Hãy nhập số thực.');
            inputValidam.className = 'form-control is-invalid';
            flagam = 0;
            submit.disabled = true;
            $("#shownoti").html("");
        } else {
            if (value - min < 0) {
                inputValidam.className = 'form-control is-invalid';
                showinputValidam.className = 'form-control is-invalid';
                showinputValidam.style.color = "red";
                $('#showinputValidam').html("Lỗi: Số lượng thấp nhất " + min + "$");
                $('#infoshowinputValidam').html("");
                submit.disabled = true;
                flagam = 0;
                $("#shownoti").html("");
            } else {
                bonus = discount * value * 2;
                result = value * price + fee * price - bonus;
                if (value - max > 0) {
                    if (min == 3) fee = max * 0.5 / 100;
                    else {
                        checked = document.querySelector('input[name="choice"]:checked').value;
                        fee = parseFloat(checked)
                    }
                    value = max;
                    bonus = discount * value * 2;
                    result = value * price + fee * price - bonus;
                    document.getElementById("inputValidam").value = value;
                }
                if (Number.isInteger(Number(value))) {
                    document.getElementById("inputValidam").value = value;
                } else {
                    value = parseFloat(value).toFixed(2);
                    document.getElementById("inputValidam").value = value;
                }
                showinputValidam.style.color = "green";
                showinputValidam.className = 'form-control is-valid';
                inputValidam.className = 'form-control is-valid';
                $('#showinputValidam').html("Tổng thanh toán: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
                $('#infoshowinputValidam').html("Thông tin: " + commaSeparatedNumber(price) + " x (" + value + "+" + commaSeparatedNumber(fee.toFixed(2)) + ") - " + commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) + " VND | Công thức: Price*(Amount+Fee) - Bonus = Total");
                flagam = 1;
                if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
                    submit.disabled = false;
                    $("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                }
            }
        }
    });
    // $("#accountbank").on("change", function () {
    //     var value = $(this).val();
    //     var select = document.getElementById('exampleSelect1');
    //     var value2 = select.options[select.selectedIndex].value;
    //     if (value.length > 5) {
    //         $("#shownamebank").html('loading...');
    //         $.ajaxSetup({
    //             data: {
    //                 csrfmiddlewaretoken: '{{ csrf_token }}'
    //             },
    //         });
    //         $.ajax({
    //             url: 'https://autopaypm.com/custom_bank?account=' + value + '&bankcode=' + value2,
    //             type: 'GET',
    //             success: function (data) {
    //                 result = data['result'];
    //                 select.value = data['result']['bankcode'];
    //                 if (result['flag'] == 0) {
    //                     submit.disabled = true;
    //                     flagbank = 0;
    //                     $("#shownamebank").html(" " + data['result']['name'] + " ");
    //                     $("#shownoti").html("");
    //                     $("#bankdevice").html(" " + data['result']['name'] + " ");
    //                 } else if (result['flag'] == 1 && result['verify'] == 0) {
    //                     flagbank = 0;
    //                     $("#shownamebank").html(" " + data['result']['name'] + " ");
    //                     $("#bankdevice").html(" " + data['result']['name'] + " ");
    //                     document.getElementById('xmconfirm').style.display = 'block';
    //                     $("#xmconfirm").dialog({
    //                         resizable: false,
    //                         height: "auto",
    //                         width: 400,
    //                         modal: true,
    //                         buttons: {
    //                             "Tiếp Tục": function () {
    //                                 value2 = data['result']['bankcode'];
    //                                 window.location = '/verify?account=' + value + '&bankcode=' + value2;
    //                             },
    //                             Cancel: function () {
    //                                 window.location = '';
    //                             }
    //                         }
    //                     });
    //                 } else if (result['flag'] == 1 && parseInt(result['verify']) == 1) {
    //                     flagbank = 1;
    //                     $("#shownamebank").html(" " + data['result']['name'] + " ");
    //                     $("#bankdevice").html(" " + data['result']['name'] + " ");
    //                 }
    //                 var discount = document.getElementById("discount").value;
    //                 var bonus = document.getElementById("bonus").value;
    //                 var price = document.getElementById("pricename").value;
    //                 var inputValidam = document.getElementById("inputValidam");
    //                 var amount = inputValidam.value;
    //                 var min = parseInt(inputValidam.min);
    //                 var max = parseInt(inputValidam.max);
    //                 if (min < 10) fee = amount * 0.5 / 100;
    //                 else {
    //                     checked = document.querySelector('input[name="choice"]:checked').value;
    //                     fee = parseFloat(checked)
    //                 }
    //                 document.getElementById('discount').value = (data['result']['discount']);
    //                 discount = data['result']['discount'];
    //                 if ((amount - min >= 0) && (max - amount >= 0)) {
    //                     bonus = discount * amount * 2;
    //                     result = amount * price + fee * price - bonus;
    //                     showinputValidam.style.color = "green";
    //                     showinputValidam.className = 'form-control is-valid';
    //                     inputValidam.className = 'form-control is-valid';
    //                     $('#showinputValidam').html("Tổng thanh toán: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
    //                     $('#infoshowinputValidam').html("Thông tin: " + commaSeparatedNumber(price) + " x (" + amount + "+" + commaSeparatedNumber(fee.toFixed(2)) + ") - " + commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) + " VND | Công thức: Price*(Amount+Fee) - Bonus = Total");
    //                     flagam = 1;
    //                     if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
    //                         submit.disabled = false;
    //                         $("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
    //                     }
    //                 } else {
    //                     inputValidam.className = 'form-control is-invalid';
    //                     showinputValidam.className = 'form-control is-invalid';
    //                     showinputValidam.style.color = "red";
    //                     $('#showinputValidam').html("Lỗi: Số lượng thấp nhất " + min + "$");
    //                     $('#infoshowinputValidam').html("");
    //                     flagam = 0;
    //                     submit.disabled = true;
    //                     $("#shownoti").html("");
    //                 }
    //             },
    //         });
    //     } else {
    //         $("#shownamebank").html("Số tài khoản không chính xác, hãy thử lại!");
    //         flagbank = 0;
    //         submit.disabled = true;
    //         $("#shownoti").html("");
    //     }
    // });
    $("#sdt").on("change", function () {
        let text = this.value;
        if ((text.length > 11 && text.charAt(0) == '+' && !isNaN(text.substring(1))) || (text.length > 9 && !isNaN(text.substring(1)))) {
            sdt.className = 'form-control is-valid';
        } else {
            sdt.className = 'form-control is-invalid';
            $('#infoshowinputValid').html('Lỗi: Định dạng số điện thoại không đúng');
        }
    });
    $("#inputValidpm").on("change", function () {
        let text = this.value;
        if (text.includes('U') || text.includes('u') && (text.charAt(0) === "U" || text.charAt(0) === "u") && (text.length > 5)) {
            $("#showinputValidpm").html('loading...');
            inputValidpm.className = 'form-control is-valid';
            $.ajaxSetup({
                data: {
                    csrfmiddlewaretoken: '{{ csrf_token }}'
                },
            });
            $.ajax({
                url: '/custom_wallet?input=' + text,
                type: 'GET',
                success: function (data) {
                    value = data['result']['name'];
                    if (value.includes('ERROR')) {
                        inputValidpm.className = 'form-control is-invalid';
                        $('#infoshowinputValid').html('Lỗi: Sai thông tin tài khoản PM.');
                        $("#showinputValidpm").html(data['result']['name']);
                        submit.disabled = true;
                        flagbankd = 0;
                        $("#shownoti").html("");
                    } else {
                        $("#showinputValidpm").html("(" + data['result']['name'] + ")");
                        document.getElementById('discount').value = data['result']['discount'];
                        flagbankd = 1;
                        if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) {
                            submit.disabled = false;
                            $("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                        }
                    }
                }
            });
        } else {
            inputValidpm.className = 'form-control is-invalid';
            $('#infoshowinputValid').html('Lỗi: Sai thông tin tài khoản PM.');
            submit.disabled = true;
            flagbankd = 0;
            $("#shownoti").html("");
        }
    });
    $("#inputValidusdt").on("change", function () {
        var valueusd = document.querySelector('input[id="inputValidusdt"]');
        var info = valueusd.placeholder;
        var text = valueusd.value;
        if (((info.includes('TRC20') && (text.length == 34)) || ((info.includes('BEP20') || (info.includes('ERC20'))) && (text.length == 42))) || (info.includes('PAYID') && ((text.length == 8) || (text.length == 9)))) {
            inputValidusdt.className = 'form-control is-valid';
            $('#infoshowinputValid').html('');
            flagbankd = 1;
            if ((flagbank == 1) && (flagam == 1) && (flagbankd == 1)) submit.disabled = false;
        } else {
            inputValidusdt.className = 'form-control is-invalid';
            $('#infoshowinputValid').html('Lỗi: Sai thông tin tài khoản USDT.');
            flagbankd = 0;
            submit.disabled = true;
            $("#shownoti").html("");
        }
    });
});
