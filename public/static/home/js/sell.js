

function commaSeparatedNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var flagbank;
var flagam;
$(document).ready(function () {
    function onchangeinfo(value_) {
        console.log(value_);
        a = document.getElementById('typechosse').innerHTML = value_;
        b = document.getElementById('choicename').value = value_;

    }
    var submit = document.getElementById("submit");

    // $("#accountbank").on("change", function () {
    //     var value = $(this).val();
    //     var select = document.getElementById('exampleSelect1');
    //     var select1 = select.options[select.selectedIndex];
    //     var value2 = select.options[select.selectedIndex].value;
    //     if (value.length > 5) {
    //         $("#shownamebank").html('loading...');
    //         $.ajaxSetup({
    //             data: {
    //                 csrfmiddlewaretoken: '{{ csrf_token }}'
    //             },
    //         });
    //         $.ajax({
    //             url: '/custom_bank?account=' + value + '&bankcode=' + value2,
    //             type: 'GET',
    //             success: function (data) {
    //                 result = data['result'];
    //                 select.value = data['result']['bankcode'];
    //                 if (result['flag'] == 0) {
    //                     flagbank = 0;
    //                     $("#shownoti").html("");
    //                     $("#bankdevice").html(" " + data['result']['name'] + " ");
    //                 } else if (result['flag'] == 1) {
    //                     flagbank = 1;
    //                 }
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
    //                     $('#showinputValidam').html("Bạn nhận: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
    //                     $('#infoshowinputValidam').html("Thông tin chi tiết: " + commaSeparatedNumber(price) + " x " + amount + " + " + commaSeparatedNumber(bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) + " VND | Công thức: Price*Amount + Bonus = Total");
    //                     if ((flagbank == 1) && (flagam == 1)) {
    //                         submit.disabled = false;
    //                         $("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
    //                     }
    //                 } else {
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
    var showinputValidam = document.getElementById("showinputValidam");
    var inputValidam = document.getElementById("inputValidam");
    $("#inputValidam").on("change", function () {
        var value = this.value;
        var price = $('#pricename').val();
        var min = parseInt(inputValidam.min);
        var max = parseInt(inputValidam.max);
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
                if (value - max > 0) {
                    document.getElementById("inputValidam").value = max;
                    value = max;
                }
                if (Number.isInteger(Number(value))) {
                    document.getElementById("inputValidam").value = value;
                } else {
                    value = parseFloat(value).toFixed(6);
                    document.getElementById("inputValidam").value = value;
                }
                discount = document.getElementById("discount").value;
                bonus = discount * value * 2;
                result = value * price + bonus;
                showinputValidam.style.color = "green";
                showinputValidam.className = 'form-control is-valid';
                inputValidam.className = 'form-control is-valid';
                $('#showinputValidam').html("Bạn nhận: " + commaSeparatedNumber(result.toFixed(0)) + "VND");
                $('#infoshowinputValidam').html("Thông tin chi tiết: " + commaSeparatedNumber(price) + " x " + value + " + " + (bonus) + " = " + commaSeparatedNumber(result.toFixed(0)) + " VND | Công thức: Price*Amount=Total");
                flagam = 1;
                if ( (flagam == 1)) {
                    submit.disabled = false;
                    $("#shownoti").html("<u>Chú ý:</u> <i>Hãy kiểm tra kỹ lại các thông tin của bạn trước khi Tiếp Tục!</i>");
                }
            }
        }
    });
});
