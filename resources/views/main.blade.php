<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Danh mục sản phẩm</title>
    <meta content="BQ Evaluation" property="og:title">
    <meta content="BQ Evaluation" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrsity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/a60e3c87cb.js" crossorigin="anonymous"></script>

    <script>
        function BtnLoading(elem) {
            $(elem).attr("data-original-text", $(elem).html());
            $(elem).prop("disabled", true);
            $(elem).html('<i class="spinner-border spinner-border-sm"></i> Loading...');
        }

        function BtnReset(elem) {
            $(elem).prop("disabled", false);
            $(elem).html($(elem).attr("data-original-text"));
        }

        function closePopupSupplier() {
            $(".k-overlay,.click-modal").css('display', 'none')
            const inputs = document.querySelectorAll('.formInsert');
            inputs.forEach(input => {
                input.value = '';
            });
            $("#output").attr('src', "https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg")

        }
        $(document).on("click", ".k-overlay,.k-i-close", function() {
            closePopupSupplier()
        })

        function formatCurrency(price, symbol = "$") {

            return symbol + price.toString().replaceAll(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        function formatCurrencyKeyup(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal


                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
        $(document).on('keyup', "input[data-type='currency']", function() {
            //stuff happens
            formatCurrencyKeyup($(this));

        });



        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replaceAll(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
    </script>


</head>

<body kv-body class="vn" style="left: 0px;">
    <div class="mainWrap-container">
        <div class="mainWrap ">
            <header id="mainHeader" class="mainHeader clearfix posR">
                @include('layouts.navbar')
            </header>
            <div class="container">
                @yield('content')
            </div>

        </div>
    </div>
    <div class="k-overlay" style="display: none; z-index: 10002; opacity: 0.5;"></div>

</body>


</html>
