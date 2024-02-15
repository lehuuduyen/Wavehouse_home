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
        <h1>Giao dịch mua</h1>

                <article class="header-filter header-filter-product headerContent columnViewTwo">
                    @include('layouts.add_product')
                    @include('layouts.add_supplier')
                    @include('layouts.add_brand')
                    @include('layouts.add_position')
                    <div class="header-filter-search">
                        <kv-mobile-new on-click-call-back="refresh()" class="ng-isolate-scope">
                            <a href="javascript:void(0);" class="mobileIcon"></a>
                        </kv-mobile-new>
                        <div class="input-group">
                            <input type="text" kv-filter-search="" ng-model="filterQuickSearch" placeholder="Theo mã, tên hàng" class="form-control input-focus ng-pristine ng-untouched ng-valid ng-empty ng-hide" id="inputQuickSearch" ng-enter="quickSearch(true)" ng-show="isOpenDropdownSearch || !isSuggestProductForSearchProduct || isCombineSearch" ng-change="changeQuickSearch()">
                            <div id="divSuggestProductForQuickSearchProduct" ng-style="{'flex': '1 1 auto', 'padding-left': '2.9rem'}" ng-show="!(isOpenDropdownSearch || !isSuggestProductForSearchProduct || isCombineSearch)" style="flex: 1 1 auto; padding-left: 2.9rem;">
                                <kv-multi-select-search-product control-css-id="suggestProductSearch" control-css-class="form-control kv-multi-select-search" icon-remove-css-class="icon-remove-search-product" filter-ids="filterProductIds" filter-keyword="filterProductKey" filter-text="filterProductCodes" on-type="quickSearch()" is-show-on-hand="true" is-show-all-item="false" id="filterMultiSelect" ng-enter="quickSearchEmpty()" class="ng-isolate-scope"><kv-multi-select-search control-css-id="suggestProductSearch" control-css-class="form-control kv-multi-select-search" icon-remove-css-class="icon-remove-search-product" input-placeholder="Theo mã, tên hàng" option-data-text-field="Code" option-data-value-field="Id" option-item-template="itemTemplate" option-data-source="products" filter-ids="filterIds" filter-keyword="filterKeyword" filter-text="filterText" limit-filter-ids="10" message-limit-filter-ids="Bạn chỉ được chọn tối đa 10 hàng hóa" on-type="onType()" field-compare-get-first-by-enter="Code" class="ng-isolate-scope">
                                        <div class="k-widget k-multiselect k-header form-control kv-multi-select-search" unselectable="on" title="" style="">
                                            <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                                <ul role="listbox" unselectable="on" class="k-reset" id="suggestProductSearch_taglist"></ul><input class="k-input k-readonly" style="width: 25px" accesskey="" autocomplete="off" role="listbox" aria-expanded="false" tabindex="0" aria-owns="suggestProductSearch_taglist suggestProductSearch_listbox" aria-disabled="false" aria-readonly="false" placeholder="Theo mã, tên hàng" fdprocessedid="ix59da"><span class="k-icon k-loading k-loading-hidden"></span>
                                            </div><select id="suggestProductSearch" class="form-control kv-multi-select-search" fdprocessedid="bjm5nb" data-role="multiselect" multiple="multiple" aria-disabled="false" aria-readonly="false" style="display: none;"></select><span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 32px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;"></span>
                                        </div>
                                    </kv-multi-select-search></kv-multi-select-search-product>
                            </div>
                            <div id="idDropdownSearch" class="input-group-append dropdown" uib-dropdown="" auto-close="disabled" is-open="isOpenDropdownSearch" kv-input-focus="">
                                <button type="button" id="idDropdownBtnSearch" class="btn-icon dropdown-toggle" uib-dropdown-toggle="" aria-haspopup="true" aria-expanded="false" fdprocessedid="ww799qm"><i class="fas fa-caret-down"></i></button>
                                <div id="idDropdownMenuSearch" class="dropdown-content dropdown-menu" uib-dropdown-menu="">
                                    <div class="form-group ng-hide" ng-show="!isSuggestProductForSearchProduct"><input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterProduct" placeholder="Theo mã, tên hàng">
                                    </div>

                                    <div class="kv-window-footer"><button type="button" class="btn btn-success ng-binding" ng-click="quickSearch()"><i class="far fa-search"></i>Tìm kiếm</button></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </article>
                <article class="fll w100 k-gridNone productList k-grid-Scroll" ng-class="{'productListTable' : products.dataSource._data.length < 5}">
                    <div id="products" kendo-grid="products" kv-multi-select-grid="" k-data-source="productsGridDataSource" ng-mouseover="handleHoverTable()" k-data-bound="productsGridDataBound" k-options="baseProductGridOptions" k-sortable="true" k-resizable="true" k-pageable="{ &quot;pageSize&quot;: 50, &quot;refresh&quot;: false, &quot;pageSizes&quot;: false , buttonCount: 5,messages:{display:_l.pagerInfo + _l.product_Paging, first:_l.paging_First, previous:_l.paging_Prev, next: _l.paging_Next, last: _l.paging_Last}}" kv-grid-expan-row="" data-title="product_Paging" data-headerformat="{0}" data-role="grid" class="k-grid k-widget multicheck-added" style="">

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Network</th>
                                <th scope="col">Số lượng coin</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Total</th>
                                <th scope="col">Thông tin</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody id="tbody-product">
                              <tr>
                                <th colspan="7" style="text-align: center">Không có giao dịch</th>

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

    getProducts()



    function getProducts(s = "") {
        let html = ``;
        $.ajax({
            url: "/api/buy?s=" + s,
            type: "get",
            success: function(response) {
                let data = response.data
                if (data) {
                    data.map(function(val, key) {
                        let stt = key + 1

                        html += `
                            <tr>
                                <td>${stt}</td>
                                <td>${val.network}</td>
                                <td>${val.amount}</td>
                                <td>${val.network}</td>
                                <td>${val.network}</td>
                                <td>
                                    <p>Ngân hàng: ${val.bank}</p>
                                    <p>STK: ${val.stk}</p>
                                    <p>Địa chỉ ví: ${val.wallet}</p>
                                    <p>SĐT: ${val.sdt}</p>
                                    </td>

                                    <td><select>
                                    <option>Trong quá trình</option>
                                    <option>Đã xử lý</option>
                                    <option>Hủy</option>
                                    </select></td>
                            </tr>
                           `
                    })
                    $('#tbody-product').html(html)
                }

            }
        });
    }
</script>
@endsection
