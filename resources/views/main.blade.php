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
</body>


</html>
