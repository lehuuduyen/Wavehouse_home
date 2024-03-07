@extends('main', ['pageTitle' => 'Danh mục sản phẩm'])
@section('content')
    <script type="text/javascript" class="ng-scope">
        $('body').on('click', '#addGroupBtn, #addBrandBtn, #AddPositionBtn', function(e) {
            var index_highest = 0;
            var current_element = "";
            $(".k-window-poup").each(function() {
                // always use a radix when using parseInt
                var index_current = parseInt($(this).css("zIndex"), 10);
                if (index_current > index_highest) {
                    index_highest = index_current - 1;
                }

                if ($(this).css('display') == 'block') {
                    current_element = $(this).attr('id') + "Overlay";
                }
            });

            var existsOverlay = 0;
            $(".k-overlay").each(function() {
                if ($(this).css("z-index") == index_highest) {
                    existsOverlay++;
                }
            });

            console.log(index_highest)
            if (existsOverlay == 0) {
                $(document.body).append('<div class="k-overlay ' + current_element +
                    '" style="display: block; opacity: 0.5; z-index: ' + index_highest + '"></div>');
            }
        });
    </script>
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1001;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: #aaa;
            filter: alpha(opacity=50);
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script src="{{ asset('assets/js/products/index.js') }}"></script>
    <section class="container main_wrapper kma-wrapper ng-scope">
        <section class="clb main main-content ng-scope" ng-view="">
            <section class="mainRight ng-scope">
                <section class="mainWrap fll w100">
                    <h1>Giao dịch bán</h1>

                    <article class="header-filter header-filter-product headerContent columnViewTwo">
                        @include('layouts.add_product')
                        @include('layouts.add_supplier')
                        @include('layouts.add_brand')
                        @include('layouts.add_position')
                        <div class="header-filter-search">

                            <form action="/admin/history/sell" id="formall" method="get">
                                <div class="input-group">

                                    <input type="text" name="s" kv-filter-search="" ng-model="filterQuickSearch"
                                        placeholder="Theo Sdt" class="form-control "
                                        value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>">
                                </div>


                            </form>

                        </div>


                    </article>
                    <article class="fll w100 k-gridNone productList k-grid-Scroll"
                        ng-class="{'productListTable' : products.dataSource._data.length < 5}">
                        <div id="products" kendo-grid="products" kv-multi-select-grid=""
                            k-data-source="productsGridDataSource" ng-mouseover="handleHoverTable()"
                            k-data-bound="productsGridDataBound" k-options="baseProductGridOptions" k-sortable="true"
                            k-resizable="true"
                            k-pageable="{ &quot;pageSize&quot;: 50, &quot;refresh&quot;: false, &quot;pageSizes&quot;: false , buttonCount: 5,messages:{display:_l.pagerInfo + _l.product_Paging, first:_l.paging_First, previous:_l.paging_Prev, next: _l.paging_Next, last: _l.paging_Last}}"
                            kv-grid-expan-row="" data-title="product_Paging" data-headerformat="{0}" data-role="grid"
                            class="k-grid k-widget multicheck-added" style="">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Network</th>
                                        <th scope="col">Số lượng coin</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Thông tin</th>
                                        <th scope="col">Lý do</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-product">
                                    <tr>
                                        <th colspan="9" style="text-align: center">Không có giao dịch</th>

                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </article>
                </section>
            </section>
        </section>
    </section>
    <script>
        let temp = 0
        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);
        const search = (urlParams.get('s')) ? urlParams.get('s') : ''
        getProducts(search)

        function number_format(number, decimals, dec_point, thousands_point) {

            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }

            if (!decimals) {
                var len = number.toString().split('.').length;
                decimals = len > 1 ? len : 0;
            }

            if (!dec_point) {
                dec_point = '.';
            }

            if (!thousands_point) {
                thousands_point = ',';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(".", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
        }

        function number_format(number, decimals, dec_point, thousands_point) {

            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }

            if (!decimals) {
                var len = number.toString().split('.').length;
                decimals = len > 1 ? len : 0;
            }

            if (!dec_point) {
                dec_point = '.';
            }

            if (!thousands_point) {
                thousands_point = ',';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(".", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
        }

        function getProducts(s = "") {
            let html = ``;
            $.ajax({
                url: "/api/sell?s=" + s,
                type: "get",
                success: function(response) {
                    let data = response.data
                    if (data.length > 0) {
                        data.map(function(val, key) {
                            let stt = key + 1

                            html += `
                            <tr>
                                <td>${stt}</td>
                                <td>${val.network}</td>
                                <td>${val.amount}</td>
                                <td>${number_format(val.price)}</td>
                                <td>${number_format(val.total)}</td>
                                <td>
                                    <p>Ngân hàng: ${val.bank}</p>
                                    <p>STK: ${val.stk}</p>
                                    <p>SĐT: ${val.sdt}</p>
                                    </td>
                                <td><textarea id="textarea${val.id}" class="form-control">${(val.description)?val.description:""}</textarea></td>
                                <td style="text-align:center">
                                    <select id="statusprocess${val.id}">
                                    <option ${(val.status_process == 1)?'selected':''} value="1">Trong quá trình</option>
                                    <option ${(val.status_process == 2)?'selected':''} value="2">Đã xử lý</option>
                                    <option ${(val.status_process == 3)?'selected':''}  value="3">Hủy</option>
                                    </select>
                                    <hr></hr>
                                    <button onclick="save(${val.id})" class="btn btn-primary">Xác nhận</button>
                                </td>
                            </tr>
                           `
                        })
                        $('#tbody-product').html(html)
                    }

                }
            });
        }

        function save(id) {
            let textArea = $("#textarea" + id).val();
            let select = $("#statusprocess" + id).val();
            let data = {
                select: select,
                textArea: textArea,
                id: id,
            }
            $.ajax({
                url: "/api/update_history",
                type: "post",
                data: JSON.stringify(data),
                dataType: 'json',
                contentType: 'application/json',
                success: function(response) {
                    let data = response.data
                    toastr.success('Cập nhật thành công')


                }
            });
        }
    </script>
@endsection
