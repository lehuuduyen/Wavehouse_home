<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script src="{{ asset('assets/js/dist_n2vi.min.js') }}" crossorigin="anonymous"></script>

    <style>
        @media print {

            /* Hide the header and footer */
            @page {
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
            }

            header,
            footer {
                display: none;
            }
        }

        table,
        table thead tr th {
            border-bottom: 1px dashed #000000;
        }

        .strikethrough {
            text-decoration: line-through;
        }

        .new-line {
            white-space: nowrap;
            white-space: pre-line;
        }
    </style>
</head>

<body>
    <div title="" class="barcode1 s2-013057-52c4013057-6558" style="position:absolute;overflow:hidden;top:15px;">
        <div>
            <svg id="barcode" width="100%" height="100%">

            </svg>
        </div>
        <div style="text-align: center;font-weight: 700">Biên nhận thu tiền</div>
        <hr style="width: 90%;">
        <div style="margin: 15px">
            <div>
                Ngày in: <span id="created_at"></span>
            </div>
            <div>
                Kho xuất: <span id="wavehouse"></span>
            </div>
            <div>
                Khách hàng: <span id="customer"></span>
            </div>
            <div>
                Địa chỉ: <span id="address">84/2 bùi viện</span>
            </div>
            <div>
                Điện thoại: <span id="phone">24/12/2019 16:17</span>
            </div>
            <table style="margin-top: 10px;width: 100%;">
                <thead style="    text-align: left;">
                    <tr>
                        <th>Đơn giá</th>
                        <th>Số lượng </th>
                        <th>Thành tiền </th>
                    </tr>

                </thead>
                <tbody>
                </tbody>
            </table>

            <div style="margin-left:107px;margin-top: 10px">
                Tổng tiền: <span style="text-align: center;" id="total"></span>
            </div>

            <div style="margin-left:107px;margin-top: 10px">
                Giảm giá: <span style="text-align: center" id="discount"></span>
            </div>
            <hr style="width: 90%;">

            <div style="margin-left:107px;margin-top: 10px;font-weight: 700">
                Thành tiền: <span style="text-align: center;" id="thanh_tien"></span>
            </div>

            <div style="margin-left:107px;margin-top: 3px;font-size: 10px;text-align: center">
                (<span style="" id="string"></span>)
            </div>
        </div>


    </div>
    <script>
        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);
        let couponId = urlParams.get('coupon_id')

        $.ajax({
            url: "/api/coupon/" + couponId,
            type: "get",
            success: function(response) {

                if (response.data == null) {
                    toastr.error("Hóa đơn không tồn tại")

                } else {
                    let data = response.data
                    $("#created_at").html(data.created_at)
                    $("#wavehouse").html(data.wavehouse.name + " - " + data.wavehouse.address)
                    $("#customer").html(data.customer.name)
                    $("#phone").html(data.customer.phone)
                    $("#address").html(data.customer.address)

                    let discount = 0
                    let total = 0
                    let html = ``;
                    data.coupon_product.map(function(val, key) {
                        discount = discount + (val.price_old * val.quantity) - (val.price * val
                            .quantity)
                        total = total + (val.price_old * val.quantity)
                        html += `
                        <tr>
                        <td colspan="1"><u>${val.product.name}</u></td>
                    </tr>
                    <tr>
                        <td>
                            <span class="new-line">${formatCurrency(val.price)}</span><br>
                            <span class="strikethrough">${formatCurrency(val.price_old)}</span>
                        </td>
                        <td>${val.quantity}</td>
                        <td>${formatCurrency(val.price * val.quantity)}</td>
                    </tr>`

                    })
                    $("#total").html(formatCurrency(total))
                    $("#thanh_tien").html(formatCurrency(data.price))
                    let string = to_vietnamese(data.price)
                    $("#string").html(string)

                    $("#discount").html(formatCurrency(discount))

                    $('tbody').html(html)
                    JsBarcode("#barcode", data.code, {
                        lineColor: "#000000",
                        height: 40,
                    });
                    var css = '@page { size: 80mm 150mm; }',
                        head = document.head || document.getElementsByTagName('head')[0],
                        style = document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    } else {
                        style.appendChild(document.createTextNode(css));
                    }

                    head.appendChild(style);

                    window.print();
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                BtnReset(_this)
                toastr.error("Hóa đơn không tồn tại")

            }
        });

        function formatCurrency(price) {

            return price.toString().replaceAll(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
    </script>
    <script></script>
</body>

</html>
