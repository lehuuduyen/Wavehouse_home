@extends('main',['pageTitle' => 'Danh mục sản phẩm'])
@section('content')
<section class="container main_wrapper kma-wrapper ng-scope">
    <section class="clb main main-content ng-scope" ng-view="">
        <section class="mainLeft ng-scope">
            @include('layouts.navleft')
        </section>
        <section class="mainRight ng-scope">
            <section class="mainWrap fll w100">
                <article class="header-filter header-filter-product headerContent columnViewTwo">
                    <div class="header-filter-search"><kv-mobile-new on-click-call-back="refresh()" class="ng-isolate-scope"><a href="javascript:void(0);" class="mobileIcon"></a></kv-mobile-new>
                        <div class="input-group"><input type="text" kv-filter-search="" ng-model="filterQuickSearch" placeholder="Theo mã, tên hàng" class="form-control input-focus ng-pristine ng-untouched ng-valid ng-empty ng-hide" id="inputQuickSearch" ng-enter="quickSearch(true)" ng-show="isOpenDropdownSearch || !isSuggestProductForSearchProduct || isCombineSearch" ng-change="changeQuickSearch()">
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
                                <li><a ng-click="AddProduct(pTypeValue.Purchased)" kv-btn-scroll="" class="ng-binding"><i class="far fa-fw fa-plus"></i> Thêm hàng
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
            </section>
        </section>
    </section>
</section>
@endsection