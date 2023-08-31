<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Danh mục sản phẩm</title>
    <meta content="BQ Evaluation" property="og:title">
    <meta content="BQ Evaluation" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="mainWrap-container">
        <div class="mainWrap ">
            <header class="mainHeader clearfix  posR">
                @include('layouts.navbar')
            </header>
        </div>

    </div>
</body>

</html>