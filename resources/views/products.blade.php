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
                    <aside class="header-filter-buttons"><a class="btn btn-success kvopenSyncSalesChannel ng-hide"><i class="fas fa-sync-alt"></i> <span class="badge badge-danger ng-binding">0</span></a>
                        <div class="importBtn">
                            <a ng-show="_p.has('Product_Create')" href="javascript:void(0)" class="btn btn-success"><i class="far fa-plus"></i> <span class="text-btn ng-binding">
                                    Import Excel</span></a>
                        </div>
                    </aside>
                    <aside class="header-filter-buttons"><a class="btn btn-success kvopenSyncSalesChannel ng-hide" ng-show="(_p.has('Product_Update') || _p.has('Product_Create')) &amp;&amp; _p.has('Product_Read') &amp;&amp; quantityProductSyncError != null &amp;&amp; quantityProductSyncError > 0 &amp;&amp; omniIsShowOnKv" ng-click="openSyncSalesChannel()"><i class="fas fa-sync-alt"></i> <span class="badge badge-danger ng-binding">0</span></a><!-- ngIf: selectedProduct.length > 0 -->
                        <div class="addProductBtn"><a ng-show="_p.has('Product_Create')" href="javascript:void(0)" class="btn btn-success"><i class="far fa-plus"></i> <span class="text-btn ng-binding">Thêm
                                    mới</span> <i class="fa fa-caret-down"></i></a>
                            <ul ng-if="!retailer.isActiveGppDrugStore" class="ng-scope">
                                <li><a id="addProduct"><i class="far fa-fw fa-plus"></i> Thêm hàng
                                        hóa</a></li>

                            </ul>
                        </div>
                        <div id="columnSelection" kv-column-selection="" class="columnView k-widget k-reset k-header k-menu k-menu-horizontal" binded-grid="bindedGrid" title="Tùy chọn" data-role="menu" role="menubar" tabindex="0">

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

                                            <th scope="col" rowspan="1" data-index="1" id="d28e8636-ab86-44fc-834e-a5288ddf1f51" class="cell-star k-header ng-scope" data-role="columnsorter"><a class="k-link" style="padding-left: 10px !important;" href="#"><span class="starFilter" ng-click="sortFavouriteItem($event)"><i class="fal fa-star"></i></span></a></th>
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
                                            <th scope="col" role="columnheader" data-field="OmniChannel" rowspan="1" data-title="Liên kết kênh bán" data-index="8" id="faa480e6-4cf0-41f4-b1d3-3d6f83ac3876" class="tdProductType k-header ng-scope" style="display:none">Liên kết
                                                kênh bán</th>
                                            <th scope="col" role="columnheader" data-field="BasePrice" rowspan="1" data-title="Giá bán khuyến mãi" data-index="9" id="9ab2aa31-937a-422c-9b3c-668d56be684c" class="cell-total txtR k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Giá bán khuyến mãi</a></th>
                                            <th scope="col" role="columnheader" data-field="Cost" rowspan="1" data-title="Giá vốn" data-index="10" id="4b02d5d2-04d9-4f04-bf2f-6b9f2a989a86" class="cell-total txtR tdMobile k-header ng-scope" data-role="columnsorter"><a class="k-link" href="#">Giá
                                                    vốn</a></th>
                                            <th scope="col" role="columnheader" data-field="TradeMarkName" rowspan="1" data-title="Thương hiệu" data-index="11" id="1d16a245-b42d-4294-a2f5-8caa20f689d8" class="cell-name k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Thương
                                                    hiệu</a></th>
                                    
                                            <th scope="col" role="columnheader" data-field="ProductShelvesArr" rowspan="1" data-title="Vị trí" data-index="13" id="8e5bed37-2134-472b-8796-75030ba5a51b" class="cell-name k-header ng-scope" style="display:none">Vị
                                                trí</th>
                                            <th scope="col" role="columnheader" data-field="MinQuantity" rowspan="1" data-title="Định mức tồn ít nhất" data-index="16" id="1911a390-f1ee-4319-83a1-7d450b730807" class="cell-total-final txtR k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Định mức
                                                    tồn ít nhất</a></th>
                                            <th scope="col" role="columnheader" data-field="MaxQuantity" rowspan="1" data-title="Định mức tồn nhiều nhất" data-index="17" id="a0e3e4e4-0d47-463f-9751-331de4262519" class="cell-total-final txtR k-header ng-scope" style="display:none" data-role="columnsorter"><a class="k-link" href="#">Định mức
                                                    tồn nhiều nhất</a></th>
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
                                <tbody id="tbody-product">






                                </tbody>
                            </table>
                            <span class="line"></span>
                            <span class="line line2" style=""></span>
                        </div>

                    </div>
                </article>
            </section>
        </section>
    </section>
</section>
<script>
    let temp = 0
    $(document).on("click", ".table-data", function() {
        let stt = $(this).data('stt')
        let json = $(this).data('json')
        let descriptionData = `
            <tr class="k-detail-row k-alt" id="detail-row" data-stt="${stt}" style="display: table-row;">
                                            <td class="k-hierarchy-cell"></td>
                                            <td class="k-detail-cell" colspan="10">
                                                <div ng-if="dataItem.GroupProductType !== groupProductTypes.Attribute"
                                                    class="k-detail-sub ng-scope">
                                                    <div class="k-tabstrip-wrapper">
                                                        <div class="tabstrip k-widget k-header k-tabstrip k-floatwrap k-tabstrip-top"
                                                            id="tabstrip" data-role="tabstrip" role="tablist"
                                                            tabindex="0">
                                                            <ul class="k-tabstrip-items k-reset">
                                                                <li class="k-state-active ng-binding k-item k-tab-on-top k-state-default k-first"
                                                                    id="tblProductInfo" role="tab"
                                                                    aria-selected="true" aria-controls="tabstrip-1">
                                                                    <span class="k-loading k-complete"></span><span
                                                                        class="k-link">Thông tin</span></li>
                                                                <li id="tabInventory"
                                                                    class="ng-binding k-item k-state-default"
                                                                    role="tab" aria-controls="tabstrip-2"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Thẻ kho</span></li>
                                                                <li id="tabOnHand"
                                                                    ng-show="dataItem.ProductType==pTypeValue.Purchased"
                                                                    class="ng-binding k-item k-state-default"
                                                                    role="tab" aria-controls="tabstrip-3"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Tồn kho</span></li>
                                                                <li ng-show="appSetting.UseVariants &amp;&amp; (dataItem.VariantCount > 1 || dataItem.UnitList &amp;&amp; dataItem.UnitList.length) &amp;&amp; !dataItem.IsLotSerialControl &amp;&amp; !dataItem.IsBatchExpireControl"
                                                                    id="tabVariants"
                                                                    class="tabVariants20337528 ng-hide k-item k-state-default"
                                                                    role="tab" aria-controls="tabstrip-4"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Hàng hóa cùng loại</span></li>
                                                                <li class="tabFormula20337528 ng-hide k-item k-state-default"
                                                                    ng-show="false" id="tabFormula" role="tab"
                                                                    aria-controls="tabstrip-5"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Thành phần</span></li>
                                                                <li id="tabSerialList"
                                                                    ng-show="dataItem.IsLotSerialControl"
                                                                    class="ng-binding ng-hide k-item k-state-default"
                                                                    role="tab" aria-controls="tabstrip-6"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Serial/Imei</span></li>
                                                                <li id="tabBatchExpireList"
                                                                    ng-show="dataItem.IsBatchExpireControl"
                                                                    class="ng-binding ng-hide k-item k-state-default"
                                                                    role="tab" aria-controls="tabstrip-7"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Lô – hạn sử dụng</span></li>
                                                                <li id="tabWarrantyList"
                                                                    ng-show="dataItem.IsWarranty &amp;&amp; appSetting.Warranty"
                                                                    class="ng-binding ng-hide k-item k-state-default"
                                                                    role="tab" aria-controls="tabstrip-8"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Bảo hành, bảo trì</span></li>
                                                                <li id="tabChannel"
                                                                    ng-show="channelTypes.length > 0 &amp;&amp; omniIsShowOnKv"
                                                                    class="ng-hide k-item k-state-default k-last"
                                                                    role="tab" aria-controls="tabstrip-9"><span
                                                                        class="k-loading k-complete"></span><span
                                                                        class="k-link">Liên kết kênh bán</span></li>
                                                            </ul>
                                                            <div id="tabstrip-1" class="k-content k-state-active"
                                                                role="tabpanel" aria-expanded="true"
                                                                style="display: block; ">
                                                                <div class="product-detail form-wrapper content-list">
                                                                    <h3 class="title ng-binding">${json.name}</h3>
                                                                    <ul>
                                                                        <li class="ng-binding"><i
                                                                                class="fa fa-check txtGreen"></i>Bán trực
                                                                            tiếp</li>
                                                                        <li class="ng-binding"><i
                                                                                class="fa fa-times txtRed"></i>Không tích
                                                                            điểm</li>
                                                                        <!-- ngIf: dataItem.IsProductMedicineNational -->
                                                                    </ul>
                                                                    <div class="row row-padding-15">
                                                                        <div class="col-lg-4 col-sm-6 image-detail"> <img
                                                                                class="img-responsive"
                                                                                title="Xem ảnh phóng to"
                                                                                src="${json.file}">
                                                                            <article class="proListImg uln ng-scope"
                                                                                ng-controller="ProductImageListCtrl"
                                                                                data="dataItem"> <kv-swiper
                                                                                    kv-page-load="loadPage"
                                                                                    kv-count-page="updateTotalPage"
                                                                                    template-id="productListTmplDetailProduct"
                                                                                    kv-height="240" kv-width="50"
                                                                                    item-per-page="pageSize"
                                                                                    swiper-name="productSwiper"
                                                                                    kv-item-selected="changeImage"
                                                                                    class="ng-isolate-scope">
                                                                                    
                                                                                </kv-swiper> </article>
                                                                        </div>
                                                                        <!-- ngIf: !isActiveGppDrugStore || dataItem.ProductType == 3 || dataItem.ProductType == 1 -->
                                                                        <div class="col-lg-4 col-sm-6 form-labels-110 ng-scope"
                                                                            ng-if="!isActiveGppDrugStore || dataItem.ProductType == 3 || dataItem.ProductType == 1">
                                                                            <div class="form-group"> <label
                                                                                    class="form-label control-label ng-binding">Mã
                                                                                    hàng:</label>
                                                                                <div
                                                                                    class="form-wrap form-control-static">
                                                                                    <strong
                                                                                        class="ng-binding">${json.code}</strong>
                                                                                </div>
                                                                            </div> <!--Barcode-->
                                                                            <div class="form-group"
                                                                                ng-show="appSetting.UseBarcode"> <label
                                                                                    class="form-label control-label ng-binding">Mã
                                                                                    vạch:</label>
                                                                                <div
                                                                                    class="form-wrap form-control-static ng-binding">
                                                                                    ${json.barcode}
                                                                                </div>
                                                                            </div> <!--End Barcode-->
                                                                            <div class="form-group"> <label
                                                                                    class="form-label control-label ng-binding">Giá
                                                                                    bán :</label>
                                                                                <div
                                                                                    class="form-wrap form-control-static ng-binding">
                                                                                    ${formatCurrency(json.price_old)}</div>
                                                                            </div>
                                                                            <div class="form-group"> <label
                                                                                    class="form-label control-label ng-binding">Giá
                                                                                    bán khuyến mãi:</label>
                                                                                <div
                                                                                    class="form-wrap form-control-static ng-binding">
                                                                                    ${formatCurrency(json.price_sell)}</div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                ng-show="(!dataItem.MasterUnitId || dataItem.MasterUnitId === 0) &amp;&amp; rights.viewCost">
                                                                                <label
                                                                                    class="form-label control-label ng-binding">Giá
                                                                                    vốn:</label>
                                                                                <div
                                                                                    class="form-wrap form-control-static ng-binding">
                                                                                    ${formatCurrency(json.price_capital)}</div>
                                                                            </div>
                                                                           
                                                                        </div>
                                                                     
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div class="kv-group-btn"> <a id="updateProduct"
                                                                        data-json='${JSON.stringify(json)}'
                                                                        class="btn btn-success ng-binding"
                                                                        ng-show="_p.has('Product_Update')"><i
                                                                            class="fa fa-check-square"></i> Cập nhật</a>
                                                                    <a target="_blank" href="/print?code=${json.barcode}"
                                                                        class="btn btn-default ng-binding"><i
                                                                            class="fa fa-barcode"></i> In tem mã</a> 
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="k-content" id="tabstrip-2" role="tabpanel"
                                                                aria-hidden="true" aria-expanded="false"
                                                                style="width: 100%;">
                                                                <article class="clb ovh"> <span
                                                                        class="dpb mb10 ng-binding ng-hide"
                                                                        ng-show="dataItem.MasterUnitId!=null">Lưu ý: Thẻ
                                                                        kho được tính trên đơn vị cơ bản, tồn cuối tương ứng
                                                                        với đơn vị (<strong class="ng-binding"></strong>)
                                                                        là : 0</span>
                                                                    <div id="tblInvenroty"></div>
                                                                    <article class="kv-window-footer ng-hide"
                                                                        ng-show="dataItem.hasExport"> <a
                                                                            ng-click="exportInventory()"
                                                                            class="btn btn-default kv2BtnExport ng-binding"><i
                                                                                class="fas fa-file-export"></i> Xuất
                                                                            file</a> </article>
                                                                </article>
                                                            </div>
                                                            <div class="tblOnHand k-content" id="tabstrip-3"
                                                                role="tabpanel" aria-hidden="true"
                                                                aria-expanded="false" style="width: 100%;">
                                                                <div id="tblOnHand-20337528" class="k-grid-noscroll">
                                                                </div>
                                                            </div>
                                                            <div id="tabstrip-4" class="productSame k-content"
                                                                role="tabpanel" aria-hidden="true"
                                                                aria-expanded="false" style="width: 100%;">
                                                                <article class="clb posR ovh"> <a
                                                                        ng-show="viewOrderSupplier" tabindex="-1"
                                                                        class="help icon posA helpSamePro help-totalqty ng-hide"
                                                                        kv-tooltip="" data-toggle="tooltip"
                                                                        data-placement="left"
                                                                        data-original-title="Tổng số lượng chỉ tính trên đơn vị cơ bản"><i
                                                                            class="fas fa-info-circle-circle"></i></a> <a
                                                                        tabindex="-1"
                                                                        class="help icon posA helpSamePro help-onorder"
                                                                        kv-tooltip="" data-toggle="tooltip"
                                                                        data-placement="left"
                                                                        data-original-title="Tổng số lượng chỉ tính trên đơn vị cơ bản"><i
                                                                            class="fas fa-info-circle-circle"></i></a> <a
                                                                        tabindex="-1"
                                                                        class="help icon posA helpSamePro help-order"
                                                                        kv-tooltip="" data-toggle="tooltip"
                                                                        data-placement="left"
                                                                        data-original-title="Tổng số lượng đặt hàng trên đơn vị tính"><i
                                                                            class="fas fa-info-circle-circle"></i></a>
                                                                    <div id="tblVariantUnit" kendo-grid="tblVariantUnit"
                                                                        k-options="tblVariantUnitOpts" data-role="grid"
                                                                        class="k-grid k-widget k-grid-noscroll"
                                                                        style="">
                                                                        <div class="k-grid-header"
                                                                            style="padding-right: 8px;">
                                                                            <div
                                                                                class="k-grid-header-wrap k-auto-scrollable">
                                                                                <table role="grid">
                                                                                    <colgroup>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                    </colgroup>
                                                                                    <thead role="rowgroup">
                                                                                        <tr role="row">
                                                                                            <th scope="col"
                                                                                                role="columnheader"
                                                                                                data-field="Code"
                                                                                                rowspan="1"
                                                                                                data-title="Mã hàng"
                                                                                                data-index="0"
                                                                                                id="0199ad2a-cf16-4419-94cd-412b3adbd052"
                                                                                                class="cell-code txtL k-header ng-scope">
                                                                                                Mã hàng</th>
                                                                                            <th scope="col"
                                                                                                role="columnheader"
                                                                                                data-field="Name"
                                                                                                rowspan="1"
                                                                                                data-title="Tên hàng"
                                                                                                data-index="1"
                                                                                                id="77dc66fc-4b94-4e53-8239-bdbbf3438566"
                                                                                                class="cell-auto k-header ng-scope">
                                                                                                Tên hàng</th>
                                                                                            <th scope="col"
                                                                                                role="columnheader"
                                                                                                data-field="BasePrice"
                                                                                                rowspan="1"
                                                                                                data-title="Giá bán khuyến mãi"
                                                                                                data-index="2"
                                                                                                id="3852caa0-36bf-42b3-9885-ce9a5e8fd767"
                                                                                                class="cell-total txtR k-header ng-scope">
                                                                                                Giá bán khuyến mãi</th>
                                                                                            <th scope="col"
                                                                                                role="columnheader"
                                                                                                data-field="Cost"
                                                                                                rowspan="1"
                                                                                                data-title="Giá vốn"
                                                                                                data-index="3"
                                                                                                id="ea89fed6-fad0-4522-978b-5b094c493f47"
                                                                                                class="cell-total txtR k-header ng-scope">
                                                                                                Giá vốn</th>
                                                                                            <th scope="col"
                                                                                                role="columnheader"
                                                                                                data-field="OnHand"
                                                                                                rowspan="1"
                                                                                                data-title="Tồn kho"
                                                                                                data-index="4"
                                                                                                id="24e3f1a1-8f6a-4a38-b006-9b9986951b3e"
                                                                                                class="cell-quantity k-header ng-scope">
                                                                                                Tồn kho</th>
                                                                                            <th scope="col"
                                                                                                role="columnheader"
                                                                                                data-field="Reserved"
                                                                                                rowspan="1"
                                                                                                data-title="Khách đặt"
                                                                                                data-index="5"
                                                                                                id="1bfc01dd-3a3a-4adf-8de4-f8ee5946d55b"
                                                                                                class="cell-sale-channel txtR k-header ng-scope">
                                                                                                Khách đặt</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="kv-group-btn"
                                                                        ng-show="!dataItem.hasMasterProduct">
                                                                        <a ng-click="AddRelateProduct(dataItem)"
                                                                            ng-show="_p.has('Product_Create')"
                                                                            class="btn btn-success ng-binding"><i
                                                                                class="far fa-plus"></i> Thêm hàng hóa
                                                                            cùng loại</a> </div>
                                                                </article>
                                                            </div>
                                                            <div class="k-content" id="tabstrip-5" role="tabpanel"
                                                                aria-hidden="true" aria-expanded="false"
                                                                style="width: 100%;">
                                                                <article class="clb ovh">
                                                                    <div id="tblFormula" class="k-grid-noscroll"></div>
                                                                    <article class="kv-group-btn"> <button
                                                                            ng-click="exportFormulas(dataItem)"
                                                                            class="btn btn-default kv2BtnExport ng-binding"><i
                                                                                class="fas fa-file-export"></i> Xuất
                                                                            file</button> <a
                                                                            ng-show="_p.has('Product_Update')"
                                                                            ng-click="UpdateProduct(dataItem)"
                                                                            class="btn btn-success ng-binding"
                                                                            kv-btn-scroll=""><i
                                                                                class="fa fa-check-square"></i> Cập
                                                                            nhật</a> </article>
                                                                </article>
                                                            </div>
                                                            <div class="k-content" id="tabstrip-6" role="tabpanel"
                                                                aria-hidden="true" aria-expanded="false"
                                                                style="width: 100%;">
                                                                <div id="tblSerial" class="k-grid-noscroll"></div>
                                                                <article class="kv-group-btn ng-hide"
                                                                    ng-show="dataItem.hasSerialExport"> <button
                                                                        ng-click="exportSerial()"
                                                                        class="btn btn-default kv2BtnExport ng-binding"><i
                                                                            class="fas fa-file-export"></i> Xuất
                                                                        file</button> </article>
                                                            </div>
                                                            <div class="k-content" id="tabstrip-7" role="tabpanel"
                                                                aria-hidden="true" aria-expanded="false"
                                                                style="width: 100%;">
                                                                <div id="tblBatchExpire" class="k-grid-noscroll"></div>
                                                                <article class="kv-group-btn"> <a
                                                                        ng-click="exportBatchExpire()"
                                                                        class="btn btn-default kv2BtnExport ng-binding"><i
                                                                            class="fas fa-file-export"></i> Xuất file</a>
                                                                </article>
                                                            </div>
                                                            <div class="k-content" id="tabstrip-8" role="tabpanel"
                                                                aria-hidden="true" aria-expanded="false"
                                                                style="width: 100%;">
                                                                <!-- ngIf: appSetting.Warranty --><kv-warranty-details
                                                                    ng-if="appSetting.Warranty" product="dataItem"
                                                                    invoice-id="777" on-update-product="UpdateProduct"
                                                                    has-permission="_p.has('Product_Update')"
                                                                    class="ng-scope ng-isolate-scope">
                                                                    <div
                                                                        class="form-wrapper form-labels-150 guarantee-productDetail fr">
                                                                        <!-- ngIf: vm.isUpdate || (product.GenuineGuarantees.length > 0) --><!-- ngIf: product.RepeatGuarantee.NumberTime --><!-- ngIf: vm.onUpdateProduct && vm.hasPermission -->
                                                                        <div class="kv-window-footer ng-scope"
                                                                            ng-if="vm.onUpdateProduct &amp;&amp; vm.hasPermission">
                                                                            <a ng-click="vm.onUpdateProduct(product, true)"
                                                                                class="btn btn-success ng-binding"
                                                                                kv-btn-scroll=""><i
                                                                                    class="fa fa-check-square"></i> Cập
                                                                                nhật</a></div>
                                                                        <!-- end ngIf: vm.onUpdateProduct && vm.hasPermission -->
                                                                    </div>
                                                                </kv-warranty-details><!-- end ngIf: appSetting.Warranty -->
                                                            </div>
                                                            <div class="k-content" id="tabstrip-9" role="tabpanel"
                                                                aria-hidden="true" aria-expanded="false"
                                                                style="width: 100%;">
                                                                <!-- ngRepeat: channelType in channelTypes -->
                                                                <div ng-repeat="channelType in channelTypes"
                                                                    class="clb kv-channelType ng-scope">
                                                                    <div id="tblChannelTiktok20337528">
                                                                        <p class="kv-title-channelType kv-Tiktok Shop"><b
                                                                                class="ng-binding">Tiktok Shop</b></p>
                                                                    </div>
                                                                </div><!-- end ngRepeat: channelType in channelTypes -->
                                                                <div ng-repeat="channelType in channelTypes"
                                                                    class="clb kv-channelType ng-scope">
                                                                    <div id="tblChannelTiki20337528">
                                                                        <p class="kv-title-channelType kv-Tiki"><b
                                                                                class="ng-binding">Tiki</b></p>
                                                                    </div>
                                                                </div><!-- end ngRepeat: channelType in channelTypes -->
                                                                <div ng-repeat="channelType in channelTypes"
                                                                    class="clb kv-channelType ng-scope">
                                                                    <div id="tblChannelLazada20337528">
                                                                        <p class="kv-title-channelType kv-Lazada"><b
                                                                                class="ng-binding">Lazada</b></p>
                                                                    </div>
                                                                </div><!-- end ngRepeat: channelType in channelTypes -->
                                                                <div ng-repeat="channelType in channelTypes"
                                                                    class="clb kv-channelType ng-scope">
                                                                    <div id="tblChannelShopee20337528">
                                                                        <p class="kv-title-channelType kv-Shopee"><b
                                                                                class="ng-binding">Shopee</b></p>
                                                                    </div>
                                                                </div><!-- end ngRepeat: channelType in channelTypes -->
                                                                <div ng-repeat="channelType in channelTypes"
                                                                    class="clb kv-channelType ng-scope">
                                                                    <div id="tblChannelSendo20337528">
                                                                        <p class="kv-title-channelType kv-Sendo"><b
                                                                                class="ng-binding">Sendo</b></p>
                                                                    </div>
                                                                </div><!-- end ngRepeat: channelType in channelTypes -->
                                                                <div id="areaConnectChannel20337528"></div>
                                                                <div class="kv-group-btn ng-hide"
                                                                    ng-show="dataChannels.length > 0">
                                                                    <!-- ngIf: _p.has('Product_Update') --><a
                                                                        ng-if="_p.has('Product_Update')"
                                                                        ng-click="RelatedToEcommerce(dataItem)"
                                                                        class="btn btn-success ng-binding ng-scope"
                                                                        kv-btn-scroll=""><i
                                                                            class="fa fa-check-square"></i> Cập
                                                                        nhật</a><!-- end ngIf: _p.has('Product_Update') -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end ngIf: dataItem.GroupProductType !== groupProductTypes.Attribute -->
                                            </td>
                                        </tr>              `






        let position = 86.9969 + (stt - 1) * 83.7
        $('.table-data').each(function(i, obj) {
            $(this).removeClass('k-alt k-master-state');
        });
        if (stt != $('#detail-row').data('stt')) {
            $('.k-detail-row').remove()

            $(this).addClass('k-master-state k-alt');
            $(this).after(descriptionData)
            $('.line').css('top', position + 'px')
            temp = stt
        } else {
            $('.k-detail-row').remove()
            $('.line').css('top', '')
            $('.line').css('height', '')
        }


    });
    getProducts()



    function getProducts(s = "") {
        let html = ``;
        $.ajax({
            url: "/api/product?s=" + s,
            type: "get",
            success: function(response) {
                let data = response.data
                if (data) {
                    data.map(function(val, key) {
                        let stt = key + 1

                        html += `
                            <tr class="k-master-row ng-scope table-data" data-stt="${stt}" data-id="${val.id}" data-json='${JSON.stringify(val)}'>
                                            <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#"
                                                    tabindex="-1"></a></td>
                                            
                                            <td class="cell-star" role="gridcell"><label class="quickaction_chk star">
                                                    <input type="checkbox"
                                                        class="chkrad ng-pristine ng-untouched ng-valid ng-empty"
                                                        ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1"
                                                        ng-false-value="0" ng-checked="dataItem.IsFavourite > 0"
                                                        ng-model="dataItem.IsFavourite"> <span></span> </label>
                                            </td>
                                            <td class="tdImage" role="gridcell">
                                                <div class="cell-img hide-summaryRow">
                                                    <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : (dataItem.ProductId <= 0 ? '' : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png')) + ')'}"
                                                        ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)"
                                                        class="img-thumb" data-code=""
                                                        style="background-image: url(&quot;${val.file}&quot;);">
                                                        <img ng-src="${val.file}"
                                                            src="${val.file}">
                                                    </div>
                                                    <div ng-show="dataItem.Image" class="img-preview"><img
                                                            data-code="${val.file}"
                                                            ng-src="${val.file}"
                                                            src="${val.file}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cell-code tdCodeDoctor" role="gridcell"><span
                                                    ng-class="{&quot;has-icon&quot;:dataItem.IsMedicineProduct &amp;&amp; (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational)}"
                                                    data-code="17386671" class="ng-binding">${val.code}
                                                    <!-- ngIf: dataItem.IsMedicineProduct && (dataItem.GlobalMedicineId > 0 || dataItem.IsProductMedicineNational) --></span>
                                            </td>
                                            <td class="cell-code" style="display:none" role="gridcell"><span
                                                    ng-bind="dataItem.Barcode" class="ng-binding"></span></td>
                                            <td class="cell-auto ng-binding" role="gridcell">${val.name}
                                            </td>
                                          
                                            <td class="cell-total txtR ng-binding" role="gridcell"> ${formatCurrency(val.price_sell)}
                                            </td>
                                            <td class="cell-total txtR tdMobile ng-binding" role="gridcell">
                                                ${formatCurrency(val.price_capital)}</td>
                                          
                                           
                                           
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