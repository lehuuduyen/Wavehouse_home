@extends('main',['pageTitle' => 'Danh mục sản phẩm'])
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
            $(document.body).append('<div class="k-overlay ' + current_element + '" style="display: block; opacity: 0.5; z-index: ' + index_highest + '"></div>');
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
        <section class="mainLeft ng-scope">
            @include('layouts.productleft')
        </section>
        <section class="mainRight ng-scope">
            <section class="mainWrap fll w100">
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
                                    <div class="form-group ng-hide" ng-show="!isSuggestProductForSearchProduct"><input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterProduct" placeholder="Theo mã, tên hàng"></div>
                                    <div class="form-group" ng-show="isSuggestProductForSearchProduct" id="divSuggestProductForSearchProduct"></div>
                                    <div class="form-group ng-hide" ng-show="retailer.isActiveGppDrugStore">
                                        <input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterMedicineRegistrationNo" placeholder="Theo số đăng ký" kv-select-text="">
                                    </div>
                                    <div class="form-group" ng-show="appSetting.UseImei"><input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterSerialKey" placeholder="Theo Serial/IMEI" kv-select-text=""></div>
                                    <div class="form-group ng-hide" ng-show="appSetting.UseBatchExpire">
                                        <input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterBatchExpire" placeholder="Theo lô, hạn sử dụng" kv-select-text="">
                                    </div>
                                    <div class="form-group"><input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterDescriptionAndOrderTemplate" placeholder="Theo ghi chú, mô tả đặt hàng" kv-select-text="">
                                    </div>
                                    <div class="form-group ng-hide" ng-show="retailer.isActiveGppDrugStore">
                                        <input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterActiveElementOrContent" placeholder="Theo hoạt chất, hàm lượng" kv-select-text="">
                                    </div>
                                    <div class="form-group ng-hide" ng-show="retailer.isActiveGppDrugStore">
                                        <input ng-enter="quickSearch()" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="filterManufacturerNameKey" placeholder="Theo hãng sản xuất" kv-select-text="">
                                    </div>
                                    <div class="kv-window-footer"><button type="button" class="btn btn-success ng-binding" ng-click="quickSearch()"><i class="far fa-search"></i>Tìm kiếm</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="header-filter-buttons"><a class="btn btn-success kvopenSyncSalesChannel ng-hide" ng-show="(_p.has('Product_Update') || _p.has('Product_Create')) &amp;&amp; _p.has('Product_Read') &amp;&amp; quantityProductSyncError != null &amp;&amp; quantityProductSyncError > 0 &amp;&amp; omniIsShowOnKv" ng-click="openSyncSalesChannel()"><i class="fas fa-sync-alt"></i> <span class="badge badge-danger ng-binding">0</span></a><!-- ngIf: selectedProduct.length > 0 -->
                        <div class="addProductBtn"><a ng-show="_p.has('Product_Create')" href="javascript:void(0)" class="btn btn-success"><i class="far fa-plus"></i> <span class="text-btn ng-binding">Thêm
                                    mới</span> <i class="fa fa-caret-down"></i></a>
                            <ul ng-if="!retailer.isActiveGppDrugStore" class="ng-scope">
                                <li><a id="addProduct"><i class="far fa-fw fa-plus"></i> Thêm hàng
                                        hóa</a></li>
                                <li><a ng-click="AddProduct(pTypeValue.Service)" kv-btn-scroll="" class="ng-binding"><i class="far fa-fw fa-plus"></i> Thêm dịch
                                        vụ</a></li>
                                <li><a ng-click="AddProduct(pTypeValue.Manufactured)" kv-btn-scroll="" class="ng-binding"><i class="far fa-fw fa-plus"></i> Thêm Combo -
                                        đóng gói</a></li>
                            </ul>
                        </div><a ng-show="_p.has('Product_Import')" title="Import" href="javascript:void(0)" ng-click="importProduct()" class="btn btn-success kv2BtnImport"><i class="fas fa-fw fa-file-import"></i> <span class="text-btn ng-binding">Import</span></a> <a ng-show="_p.has('Product_Export')" title="Xuất  file" href="javascript:void(0)" ng-click="exportProduct()" class="btn btn-success kv2BtnExport"><i class="fas fa-fw fa-file-export"></i> <span class="text-btn ng-binding">Xuất
                                file</span></a>
                        <div id="columnSelection" kv-column-selection="" class="columnView k-widget k-reset k-header k-menu k-menu-horizontal" binded-grid="bindedGrid" title="Tùy chọn" data-role="menu" role="menubar" tabindex="0">
                            <li class="k-item k-state-default k-first k-last" role="menuitem" aria-haspopup="true"><span class="k-link"><span class="k-icon k-i-arrow-s"></span></span>
                                <ul class="k-group k-menu-group" style="display:none" role="menu" aria-hidden="true">
                                    <li class="k-item k-state-default k-first" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="Image"><span></span>Hình ảnh</label></span>
                                    </li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="Code"><span></span>Mã hàng</label></span>
                                    </li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="Barcode"><span></span>Mã vạch</label></span>
                                    </li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="Name"><span></span>Tên hàng</label></span>
                                    </li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="CategoryName"><span></span>Nhóm
                                                hàng</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="ProType"><span></span>Loại
                                                hàng</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="OmniChannel"><span></span>Liên kết kênh
                                                bán</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="BasePrice"><span></span>Giá
                                                bán</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="Cost"><span></span>Giá vốn</label></span>
                                    </li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="TradeMarkName"><span></span>Thương
                                                hiệu</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="OnHand"><span></span>Tồn kho</label></span>
                                    </li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="ProductShelvesArr"><span></span>Vị
                                                trí</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="Reserved"><span></span>Khách
                                                đặt</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="StockoutForecast"><span></span>Dự kiến hết
                                                hàng</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="MinQuantity"><span></span>Định mức tồn ít
                                                nhất</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="MaxQuantity"><span></span>Định mức tồn nhiều
                                                nhất</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="isActive"><span></span>Trạng
                                                thái</label></span></li>
                                    <li class="k-item k-state-default" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="WarrantyStatus"><span></span>Bảo
                                                hành</label></span></li>
                                    <li class="k-item k-state-default k-last" role="menuitem"><span class="k-link"><label title=" " class="quickaction_chk undefined"><input type="checkbox" checked="checked" class="check_row" data-field="MaintenanceStatus"><span></span>Bảo
                                                trì</label></span></li>
                                </ul>
                            </li>
                        </div>
                    </aside>
                </article>
                <article class="fll w100 k-gridNone productList k-grid-Scroll" ng-class="{'productListTable' : products.dataSource._data.length < 5}">
                    <div id="products" kendo-grid="products" kv-multi-select-grid="" k-data-source="productsGridDataSource" ng-mouseover="handleHoverTable()" k-data-bound="productsGridDataBound" k-options="baseProductGridOptions" k-sortable="true" k-resizable="true" k-pageable="{ &quot;pageSize&quot;: 50, &quot;refresh&quot;: false, &quot;pageSizes&quot;: false , buttonCount: 5,messages:{display:_l.pagerInfo + _l.product_Paging, first:_l.paging_First, previous:_l.paging_Prev, next: _l.paging_Next, last: _l.paging_Last}}" kv-grid-expan-row="" data-title="product_Paging" data-headerformat="{0}" data-role="grid" class="k-grid k-widget multicheck-added" style="">
                        <div class="k-grid-header" style="padding-right: 8px;">
                            <div class="k-grid-header-wrap k-auto-scrollable" data-role="resizable" style="touch-action: pan-y;">
                                <table role="grid">
                                    <colgroup>
                                        <col class="k-hierarchy-col">
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                    </colgroup>
                                    <thead role="rowgroup">
                                        <tr role="row">
                                            <th class="k-hierarchy-cell k-header ng-scope" scope="col">
                                                &nbsp;</th>
                                            <th scope="col" role="columnheader" data-field="Id" rowspan="1" data-index="0" id="c09a369f-b624-49d1-9cbd-a930aad2a4d7" class="cell-check k-header ng-scope"><label class="radiocheck check"><input id="kvSelectAllItem" type="checkbox"><span class="chkrad"></span></label>
                                            </th>
                                            <th scope="col" role="columnheader" data-field="IsFavourite" rowspan="1" data-index="1" id="d28e8636-ab86-44fc-834e-a5288ddf1f51" class="cell-star k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#"><span class="starFilter" ng-click="sortFavouriteItem($event)"><i class="fal fa-star"></i></span></a></th>
                                            <th scope="col" role="columnheader" data-field="Image" rowspan="1" data-title="Hình ảnh" data-index="2" id="e043ea74-9621-4d1e-8f95-292ac686f28d" class="tdImage k-header ng-scope"></th>
                                            <th scope="col" role="columnheader" data-field="Code" rowspan="1" data-title="Mã hàng" data-index="3" id="bb220694-822e-4dfa-8e55-c1d7e7f54603" class="cell-code tdCodeDoctor k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Mã
                                                    hàng</a></th>
                                            <th scope="col" role="columnheader" data-field="Barcode" rowspan="1" data-title="Mã vạch" data-index="4" id="54efefe4-8540-4135-94b6-2f030b73cb69" class="cell-code k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Mã
                                                    vạch</a></th>
                                            <th scope="col" role="columnheader" data-field="Name" rowspan="1" data-title="Tên hàng" data-index="5" id="2d3c161f-3a8d-49fc-93e0-4326d4e17b82" class="cell-auto k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Tên
                                                    hàng</a></th>
                                            <th scope="col" role="columnheader" data-field="CategoryName" rowspan="1" data-title="Nhóm hàng" data-index="6" id="e025e697-fb13-477f-9dd0-6ca0a64142ca" class="cell-name k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Nhóm
                                                    hàng</a></th>
                                            <th scope="col" role="columnheader" data-field="ProType" rowspan="1" data-title="Loại hàng" data-index="7" id="236dba94-e617-4d6d-b18f-38be34c4f4f4" class="cell-auto k-header ng-scope" style="display:none">
                                                Loại hàng</th>
                                            <th scope="col" role="columnheader" data-field="OmniChannel" rowspan="1" data-title="Liên kết kênh bán" data-index="8" id="faa480e6-4cf0-41f4-b1d3-3d6f83ac3876" class="tdProductType k-header ng-scope" style="display:none">Liên kết kênh bán</th>
                                            <th scope="col" role="columnheader" data-field="BasePrice" rowspan="1" data-title="Giá bán" data-index="9" id="9ab2aa31-937a-422c-9b3c-668d56be684c" class="cell-total txtR k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Giá
                                                    bán</a></th>
                                            <th scope="col" role="columnheader" data-field="Cost" rowspan="1" data-title="Giá vốn" data-index="10" id="4b02d5d2-04d9-4f04-bf2f-6b9f2a989a86" class="cell-total txtR tdMobile k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Giá
                                                    vốn</a></th>
                                            <th scope="col" role="columnheader" data-field="TradeMarkName" rowspan="1" data-title="Thương hiệu" data-index="11" id="1d16a245-b42d-4294-a2f5-8caa20f689d8" class="cell-name k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Thương
                                                    hiệu</a></th>
                                            <th scope="col" role="columnheader" data-field="OnHand" rowspan="1" data-title="Tồn kho" data-index="12" id="e8703697-3521-4cf7-a07a-d2c6a4c1dcfa" class="cell-total txtR k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Tồn
                                                    kho</a></th>
                                            <th scope="col" role="columnheader" data-field="ProductShelvesArr" rowspan="1" data-title="Vị trí" data-index="13" id="8e5bed37-2134-472b-8796-75030ba5a51b" class="cell-name k-header ng-scope" style="display:none">Vị
                                                trí</th>
                                            <th scope="col" role="columnheader" data-field="Reserved" rowspan="1" data-title="Khách đặt" data-index="14" id="aa81aa12-8d3a-4e4c-ae67-b38944f4e231" class="cell-total txtR k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Khách
                                                    đặt</a></th>
                                            <th scope="col" role="columnheader" data-field="StockoutForecast" rowspan="1" data-title="Dự kiến hết hàng" data-index="15" id="90750809-ebf8-4d4f-85df-48c7436d1665" class="cell-date-time k-header ng-scope th-show" data-role="columnsorter"><a class="k-link" href="#">Dự kiến
                                                    hết hàng</a></th>
                                            <th scope="col" role="columnheader" data-field="MinQuantity" rowspan="1" data-title="Định mức tồn ít nhất" data-index="16" id="1911a390-f1ee-4319-83a1-7d450b730807" class="cell-total-final txtR k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Định mức tồn ít nhất</a></th>
                                            <th scope="col" role="columnheader" data-field="MaxQuantity" rowspan="1" data-title="Định mức tồn nhiều nhất" data-index="17" id="a0e3e4e4-0d47-463f-9751-331de4262519" class="cell-total-final txtR k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Định mức tồn nhiều nhất</a></th>
                                            <th scope="col" role="columnheader" data-field="isActive" rowspan="1" data-title="Trạng thái" data-index="18" id="7dd827d4-00b0-46a4-b88b-4aff6c61b9e7" class="cell-status k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Trạng
                                                    thái</a></th>
                                            <th scope="col" role="columnheader" data-field="WarrantyStatus" rowspan="1" data-title="Bảo hành" data-index="19" id="24762c45-e397-4970-888a-db056cc098de" class="tdStatusST k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Bảo
                                                    hành</a></th>
                                            <th scope="col" role="columnheader" data-field="MaintenanceStatus" rowspan="1" data-title="Bảo trì" data-index="20" id="8cd73130-7171-4b7c-a9c0-922190a43e32" class="tdStatusST k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Bảo
                                                    trì</a></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="k-grid-content k-auto-scrollable" style="max-height: 703px;">
                            <table role="treegrid">
                                <colgroup>
                                    <col class="k-hierarchy-col">
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <tbody role="rowgroup">
                                    <tr class="k-master-row ng-scope cssSummaryRow" data-uid="75d607db-86e3-4497-96e6-8c8a0ae9295b" role="row" style="background: rgb(254, 252, 237); font-weight: bold;">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1" style="display: none;"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;&quot;);"><img ng-src=""></div>
                                                <div ng-show="dataItem.Image" class="img-preview ng-hide">
                                                    <img data-code="" ng-src="">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="-1" class="ng-binding">
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding"></span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">
                                            <!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding"></span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-75d607db-86e3-4497-96e6-8c8a0ae9295b">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR" role="gridcell"></td>
                                        <td class="cell-total txtR tdMobile" role="gridcell"></td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">304</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=undefined&amp;ForFrodFiter=1" ng-show="" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell"></td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="beaf260a-7b18-444d-9008-216f7fe71e16" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://d20j6k246s3hs4.cloudfront.net/kvimg/8938503903042_original.jpg&quot;);">
                                                    <img ng-src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8938503903042_original.jpg" src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8938503903042_original.jpg">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://d20j6k246s3hs4.cloudfront.net/kvimg/8938503903042_original.jpg" ng-src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8938503903042_original.jpg" src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8938503903042_original.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386677" class="ng-binding">TBDCN009
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8938503903042</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Máy phát điện Rato
                                            R7000d B1
                                            5.5kva-kg<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-beaf260a-7b18-444d-9008-216f7fe71e16">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 15,950,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            14,500,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">100</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN009&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">0 ngày</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope" data-uid="297dd228-cb5c-44b7-be3e-c6d3f486b553" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/24.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/24.png" src="https://cdn-app.kiotviet.vn/sample/machine/24.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/24.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/24.png" src="https://cdn-app.kiotviet.vn/sample/machine/24.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386676" class="ng-binding">TBDCN008
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">4024941212380</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Ổ cắm
                                            Bals<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-297dd228-cb5c-44b7-be3e-c6d3f486b553">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 455,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            167,900.40</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">10</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN008&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="fd4551ef-7fc7-4529-b6dc-0ac31ff32be8" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/23.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/23.png" src="https://cdn-app.kiotviet.vn/sample/machine/23.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/23.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/23.png" src="https://cdn-app.kiotviet.vn/sample/machine/23.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386675" class="ng-binding">TBDCN007
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">4015394011187</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Ổ cắm âm dạng thẳng
                                            IP44<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-fd4551ef-7fc7-4529-b6dc-0ac31ff32be8">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 185,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            152,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN007&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope" data-uid="bfe35197-5156-4e02-9fbe-fc9b146ca245" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://d20j6k246s3hs4.cloudfront.net/kvimg/8936112560069_original.jpg&quot;);">
                                                    <img ng-src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8936112560069_original.jpg" src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8936112560069_original.jpg">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://d20j6k246s3hs4.cloudfront.net/kvimg/8936112560069_original.jpg" ng-src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8936112560069_original.jpg" src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8936112560069_original.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386674" class="ng-binding">TBDCN006
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8936112560069</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Cáp trục Rg59
                                            Gipco<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-bfe35197-5156-4e02-9fbe-fc9b146ca245">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 80,000 </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            55,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN006&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="1015fb94-9735-47af-9408-8bebaabd665f" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://d20j6k246s3hs4.cloudfront.net/kvimg/8935095200153_original.jpg&quot;);">
                                                    <img ng-src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8935095200153_original.jpg" src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8935095200153_original.jpg">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://d20j6k246s3hs4.cloudfront.net/kvimg/8935095200153_original.jpg" ng-src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8935095200153_original.jpg" src="https://d20j6k246s3hs4.cloudfront.net/kvimg/8935095200153_original.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386673" class="ng-binding">TBDCN005
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8935095200153</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Ổn áp LiOA 1p Drii
                                            -
                                            1kva<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-1015fb94-9735-47af-9408-8bebaabd665f">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 1,299,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            989,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN005&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope" data-uid="ce1b8055-a493-4c34-a98b-80fefb8d540d" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/20.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/20.png" src="https://cdn-app.kiotviet.vn/sample/machine/20.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/20.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/20.png" src="https://cdn-app.kiotviet.vn/sample/machine/20.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386672" class="ng-binding">TBDCN004
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8935095206582</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Ổn áp Lioa
                                            SH-25000-25KVA<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-ce1b8055-a493-4c34-a98b-80fefb8d540d">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 11,700,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            7,300,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">95</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN004&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="b0db689f-4d75-4f07-bf5b-0a5487f7d19f" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/19.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/19.png" src="https://cdn-app.kiotviet.vn/sample/machine/19.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/19.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/19.png" src="https://cdn-app.kiotviet.vn/sample/machine/19.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386671" class="ng-binding">TBDCN003
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding"></span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Máy phát điện
                                            Elemax<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-b0db689f-4d75-4f07-bf5b-0a5487f7d19f">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 37,200,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            20,100,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">97</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN003&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope" data-uid="e92c9cdd-3e71-49a3-911b-d740b35ad86b" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/18.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/18.png" src="https://cdn-app.kiotviet.vn/sample/machine/18.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/18.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/18.png" src="https://cdn-app.kiotviet.vn/sample/machine/18.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386670" class="ng-binding">TBDCN002
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding"></span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Máy phát điện
                                            Hyundai
                                            DHY9KSEM<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-e92c9cdd-3e71-49a3-911b-d740b35ad86b">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 170,800,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            112,000,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN002&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="c6e4ab1b-4360-4258-b0cc-694bbb823b31" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/17.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/17.png" src="https://cdn-app.kiotviet.vn/sample/machine/17.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/17.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/17.png" src="https://cdn-app.kiotviet.vn/sample/machine/17.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386669" class="ng-binding">TBDCN001
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding"></span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Máy phát điện
                                            KAMA<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Điện công
                                                nghiệp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-c6e4ab1b-4360-4258-b0cc-694bbb823b31">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 19,500,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            12,200,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=TBDCN001&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope" data-uid="4a4386cb-0140-471e-ae4b-48655151a3e7" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/16.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/16.png" src="https://cdn-app.kiotviet.vn/sample/machine/16.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/16.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/16.png" src="https://cdn-app.kiotviet.vn/sample/machine/16.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386668" class="ng-binding">NB005
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8936020959474</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Nồi hấp đa năng
                                            Sunhouse
                                            4402<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Nhà
                                                bếp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-4a4386cb-0140-471e-ae4b-48655151a3e7">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 1,350,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            1,050,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=NB005&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="b00b9d4c-2eb1-4cdc-898d-de7920b5872a" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/15.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/15.png" src="https://cdn-app.kiotviet.vn/sample/machine/15.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/15.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/15.png" src="https://cdn-app.kiotviet.vn/sample/machine/15.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386667" class="ng-binding">NB004
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8888236017304</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Nồi thủy tinh
                                            Visions
                                            1.25l<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Nhà
                                                bếp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-b00b9d4c-2eb1-4cdc-898d-de7920b5872a">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 750,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            320,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=NB004&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope" data-uid="1c882a42-8d8e-447a-901b-6dabc417ed46" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/14.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/14.png" src="https://cdn-app.kiotviet.vn/sample/machine/14.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/14.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/14.png" src="https://cdn-app.kiotviet.vn/sample/machine/14.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386666" class="ng-binding">NB003
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8851456105601</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Nồi cơm điện Sharp
                                            KSH-322V<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Nhà
                                                bếp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-1c882a42-8d8e-447a-901b-6dabc417ed46">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 750,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            440,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=NB003&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope" data-uid="c17d5862-23cc-4b19-8b54-b511ecb7490d" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/13.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/13.png" src="https://cdn-app.kiotviet.vn/sample/machine/13.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/13.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/13.png" src="https://cdn-app.kiotviet.vn/sample/machine/13.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386665" class="ng-binding">NB002
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding"></span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Nồi cơm điện Tiger
                                            JCC-2700<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Nhà
                                                bếp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-c17d5862-23cc-4b19-8b54-b511ecb7490d">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 4,539,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            3,100,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=NB002&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-master-row ng-scope last-row" data-uid="3bf268ed-efb7-42cd-bd4f-7e3f0956b7ca" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/12.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/12.png" src="https://cdn-app.kiotviet.vn/sample/machine/12.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/12.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/12.png" src="https://cdn-app.kiotviet.vn/sample/machine/12.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386664" class="ng-binding">NB001
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8936131170720</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Nồi cơm điện Cuckoo
                                            0331<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Nhà
                                                bếp</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-3bf268ed-efb7-42cd-bd4f-7e3f0956b7ca">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 1,290,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            820,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=NB001&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                    <tr class="k-alt k-master-row ng-scope last-row" data-uid="d98cee71-50d6-45d6-99f5-1bf595619d32" role="row">
                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#" tabindex="-1"></a></td>
                                        <td class="cell-check" role="gridcell"><label class="quickaction_chk dpb has-pretty-child" ng-click="eventStop($event)">
                                                <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" class="kvMultiSelect ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" checklist-change="kvOnChangeMultiSelectItem(dataItem)" ng-checked="productIsChecked(dataItem)" checklist-comparator=".Id" checklist-value="dataItem" kv-pretty-check="" ng-model="checked" style="display: none;" checklist-model="kvSelectedItems"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                    <label for="undefined" class=""></label>
                                                </div> <span class="chkrad"></span>
                                            </label></td>
                                        <td class="cell-star" role="gridcell"><label class="quickaction_chk star"> <input type="checkbox" class="chkrad ng-pristine ng-untouched ng-valid ng-empty" ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1" ng-false-value="0" ng-checked="dataItem.IsFavourite > 0" ng-model="dataItem.IsFavourite"> <span></span> </label>
                                        </td>
                                        <td class="tdImage" role="gridcell">
                                            <div class="cell-img hide-summaryRow">
                                                <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}" ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)" class="img-thumb" data-code="" style="background-image: url(&quot;https://cdn-app.kiotviet.vn/sample/machine/11.png&quot;);">
                                                    <img ng-src="https://cdn-app.kiotviet.vn/sample/machine/11.png" src="https://cdn-app.kiotviet.vn/sample/machine/11.png">
                                                </div>
                                                <div ng-show="dataItem.Image" class="img-preview"><img data-code="https://cdn-app.kiotviet.vn/sample/machine/11.png" ng-src="https://cdn-app.kiotviet.vn/sample/machine/11.png" src="https://cdn-app.kiotviet.vn/sample/machine/11.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cell-code tdCodeDoctor" role="gridcell"><span ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}" data-code="17386663" class="ng-binding">GD011
                                                <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                        </td>
                                        <td class="cell-code" style="display:none" role="gridcell"><span ng-bind="dataItem.Barcode" class="ng-binding">8004399771550</span></td>
                                        <td class="cell-auto ng-binding" role="gridcell">Ấm đun
                                            KBO2001<!-- ngIf: dataItem.GroupProductType === groupProductTypes.Unit -->
                                        </td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.CategoryName" class="ng-binding">Gia
                                                dụng</span></td>
                                        <td class="cell-auto" style="display:none" role="gridcell"><span ng-bind="dataItem.ProType" class="ng-binding">Hàng
                                                hóa</span></td>
                                        <td class="tdProductType" style="display:none" role="gridcell">
                                            <div id="ChannelType-d98cee71-50d6-45d6-99f5-1bf595619d32">
                                            </div>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell"> 1,650,000
                                        </td>
                                        <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                            1,050,000</td>
                                        <td class="cell-name" style="display:none" role="gridcell"><span ng-bind="dataItem.TradeMarkName" class="ng-binding"></span>
                                        </td>
                                        <td class="cell-total txtR ng-binding" role="gridcell">0</td>
                                        <td class="cell-name ng-binding" style="display:none" role="gridcell"></td>
                                        <td class="cell-total txtR onOrderReserved" role="gridcell"><span ng-show="false" class="ng-binding ng-hide">0</span><a href="#/Orders?ProductCode=GD011&amp;ForFrodFiter=1" ng-show="false" target="_blank" class="ng-binding ng-hide">0</a><span ng-show="false" class="ng-binding ng-hide">0</span><span ng-show="true" class="ng-binding">0</span></td>
                                        <td class="cell-date-time" role="gridcell">---</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">0</td>
                                        <td class="cell-total-final txtR ng-binding" style="display:none" role="gridcell">10</td>
                                        <td class="cell-status ng-binding" style="display:none" role="gridcell">Cho phép kinh doanh</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo hành</td>
                                        <td class="tdStatusST ng-binding" style="display:none" role="gridcell">Không bảo trì</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="paging-box">
                            <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap" data-role="pager"><a href="#" title="Trang đầu" class="k-link k-pager-nav k-pager-first k-state-disabled" data-page="1" tabindex="-1"><span class="k-icon k-i-seek-w">Trang đầu</span></a><a href="#" title="Trang trước" class="k-link k-pager-nav  k-state-disabled" data-page="1" tabindex="-1"><span class="k-icon k-i-arrow-w">Trang trước</span></a>
                                <ul class="k-pager-numbers k-reset">
                                    <li class="k-current-page"><span class="k-link k-pager-nav">1</span>
                                    </li>
                                    <li><span class="k-state-selected">1</span></li>
                                    <li><a tabindex="-1" href="#" class="k-link" data-page="2">2</a></li>
                                </ul><a href="#" title="Trang sau" class="k-link k-pager-nav" data-page="2" tabindex="-1"><span class="k-icon k-i-arrow-e">Trang sau</span></a><a href="#" title="Trang cuối" class="k-link k-pager-nav k-pager-last" data-page="2" tabindex="-1"><span class="k-icon k-i-seek-e">Trang
                                        cuối</span></a><span class="k-pager-info k-label">Hiển thị 1 - 15 /
                                    Tổng số 25 hàng hóa</span>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        </section>
    </section>
</section>
@endsection