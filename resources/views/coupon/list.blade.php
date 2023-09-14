@extends('main', ['pageTitle' => 'Danh mục sản phẩm'])
@section('content')
    <style>
        .select-box {
            cursor: pointer;
            position: relative;
            max-width: 20em;
            margin: 5em auto;
            width: 100%;
        }

        .select,
        .label {
            color: #414141;
            display: block;
            font: 400 17px/2em 'Source Sans Pro', sans-serif;
        }

        .select {
            width: 100%;
            position: absolute;
            top: 0;
            padding: 5px 0;
            height: 40px;
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            background: none transparent;
            border: 0 none;
        }

        .select-box1 {
            background: #ececec;
        }

        .label {
            position: relative;
            padding: 5px 10px;
            cursor: pointer;
        }

        .open .label::after {
            content: "▲";
        }

        .label::after {
            content: "▼";
            font-size: 12px;
            position: absolute;
            right: 0;
            top: 0;
            padding: 5px 15px;
            border-left: 5px solid #fff;
        }
    </style>
    <!-- ngIf: $root.isAuthenticated === true -->
    <section class="container main_wrapper kma-wrapper ng-scope" ng-if="$root.isAuthenticated === true">
        <!-- ngView:  -->
        <section class="clb main main-content ng-scope" ng-view="">

            <section class="mainRight ng-scope">
                <section class="mainWrap fll w100" ng-class="{ 'has-expire' : showExpireMessage.isActive === true}"
                    style="position: relative; top: auto; bottom: auto; width: auto;">
                    <article class="header-filter headerContent columnViewTwo">
                        <div class="header-filter-search"><kv-mobile-new on-click-call-back="refresh()"
                                class="ng-isolate-scope"><a href="javascript:void(0);"
                                    class="mobileIcon"></a></kv-mobile-new>
                            <div class="input-group"><input id="input-search"
                                    class="form-control input-focus ng-pristine ng-untouched ng-valid ng-empty"
                                    type="text" placeholder="Theo mã phiếu nhập">

                            </div>

                        </div>
                        <aside class="header-filter-buttons">
                            <a href="" id="href-import" title="Nhập hàng" ng-show="hasAdd" class="btn btn-success"><i
                                    class="far fa-plus"></i><span class="text-btn ng-binding">Nhập
                                    hàng</span>
                            </a>
                            <a href="" id="href-export" title="Nhập hàng" ng-show="hasAdd" class="btn btn-primary"><i
                                    class="far fa-plus"></i><span class="text-btn ng-binding">Xuất hàng</span>
                            </a>
                            <a href="" id="href-sell" title="Nhập hàng" ng-show="hasAdd" class="btn btn-danger"><i
                                    class="far fa-plus"></i><span class="text-btn ng-binding">Bán
                                    hàng</span>
                            </a>

                        </aside>

                    </article>


                    <article class="ovh clb k-gridNone purchaseorderList k-grid-Scroll">
                        <div id="grdPurchaseOrders" kendo-grid="" k-data-source="orders" k-sortable="true"
                            k-resizable="true"
                            k-pageable="{ &quot;pageSize&quot;: 10, &quot;refresh&quot;: false, &quot;pageSizes&quot;: false , buttonCount: 5,&quot;messages&quot;:{&quot;display&quot;:_l.pagerInfo + _l.purchaseOrder_paging, first:_l.paging_First, previous:_l.paging_Prev, next: _l.paging_Next, last: _l.paging_Last}}"
                            k-columns="gridcolumns" kv-grid-expan-row="" k-data-bound="grvInvoicesDataBound"
                            data-title="purchaseOrder_closeBookMessage" data-headerformat="{0}"
                            k-data-binding="grvdataBinding" k-detail-template="detailTemplate" k-detail-init="grvDetailInit"
                            k-detail-expand="grvDetailExpand" data-role="grid" class="k-grid k-widget k-grid-noscroll"
                            style="">
                            <div class="k-grid-header" style="padding-right: 8px;">
                                <div class="k-grid-header-wrap k-auto-scrollable" data-role="resizable"
                                    style="touch-action: pan-y;">

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
                                        </colgroup>
                                        <thead role="rowgroup">
                                            <tr role="row">
                                                <th class="k-hierarchy-cell k-header ng-scope" scope="col">&nbsp;
                                                </th>
                                                <th scope="col" role="columnheader" data-field="Id" rowspan="1"
                                                    data-index="0" id="08417bb4-19bc-45df-ab04-741faba12d52"
                                                    class="cell-check k-header ng-scope has-pretty-child">
                                                    <div class="clearfix prettycheckbox labelright  blue">
                                                        <input type="checkbox" ng-change="orderGridCheckAll()"
                                                            ng-model="checkbox.checkAll" ng-checked="checkbox.checkAll"
                                                            ng-true-value="true" ng-false-value="false" kv-pretty-check=""
                                                            kv-data-label=""
                                                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"
                                                            style="display: none;"><a href="javascript:void(0)"
                                                            tabindex="0" class=""></a>
                                                        <label for="undefined" class=""></label>
                                                    </div>
                                                </th>
                                                <th scope="col" role="columnheader" data-field="IsFavourite"
                                                    rowspan="1" data-index="1" id="beed140f-bdc2-4aaa-9791-a2b984543bac"
                                                    class="cell-star k-header ng-scope" data-role="columnsorter"><a
                                                        class="k-link" href="#"><span class="starFilter"
                                                            ng-click="sortFavouriteItem($event)"><i
                                                                class="fal fa-star"></i></span></a></th>
                                                <th scope="col" role="columnheader" data-field="Code" rowspan="1"
                                                    data-title="Mã nhập hàng" data-index="2"
                                                    id="72c2eeed-fc4f-4b97-afa9-96519a48fbb0"
                                                    class="cell-code k-header ng-scope" data-role="columnsorter"><a
                                                        class="k-link" href="#">Mã nhập hàng</a></th>
                                                <th scope="col" role="columnheader" data-field="ReturnCode"
                                                    rowspan="1" data-title="Mã trả hàng nhập" data-index="3"
                                                    id="3619fa4c-3312-41cf-be80-0ebc9a40bf25"
                                                    class="cell-code k-header ng-scope" style="display:none">Mã trả hàng
                                                    nhập</th>
                                                <th scope="col" role="columnheader" data-field="PurchaseDate"
                                                    rowspan="1" data-title="Thời gian" data-index="4"
                                                    id="c3c34fb6-b918-41d2-917f-194fb79460bb"
                                                    class="cell-date-time k-header ng-scope" data-role="columnsorter"><a
                                                        class="k-link" href="#">Thời gian</a></th>
                                                <th scope="col" role="columnheader" data-field="CreatedDate"
                                                    rowspan="1" data-title="Thời gian tạo" data-index="5"
                                                    id="015f06f9-f4c2-48cb-891b-7fa991e95925"
                                                    class="cell-date-time k-header ng-scope" style="display:none"
                                                    data-role="columnsorter"><a class="k-link" href="#">Thời
                                                        gian tạo</a></th>
                                                <th scope="col" role="columnheader" data-field="ModifiedDate"
                                                    rowspan="1" data-title="Ngày cập nhật" data-index="6"
                                                    id="142778ef-c8fb-4506-8997-173ebe8dd303"
                                                    class="cell-date-time k-header ng-scope" style="display:none"
                                                    data-role="columnsorter"><a class="k-link" href="#">Ngày cập
                                                        nhật</a></th>
                                                <th scope="col" role="columnheader" data-field="Supplier.Name"
                                                    rowspan="1" data-title="Nhà cung cấp" data-index="7"
                                                    id="3392e826-7699-42b4-98ec-cae2b62368f7"
                                                    class="cell-auto k-header ng-scope" data-role="columnsorter"><a
                                                        class="k-link" href="#">Nhà cung cấp</a></th>
                                                <th scope="col" role="columnheader" data-field="Branch.Name"
                                                    rowspan="1" data-title="Chi nhánh" data-index="8"
                                                    id="4c3a2ccd-9e9e-437d-90f2-8ad1ddd31df7"
                                                    class="cell-unit k-header ng-scope" style="display:none"
                                                    data-role="columnsorter"><a class="k-link" href="#">Chi
                                                        nhánh</a></th>
                                                <th scope="col" role="columnheader" data-field="User.GivenName"
                                                    rowspan="1" data-title="Người nhập" data-index="9"
                                                    id="bcaa4557-d664-4739-98a5-4b9201f675ec"
                                                    class="cell-name k-header ng-scope" style="display:none"
                                                    data-role="columnsorter"><a class="k-link" href="#">Người
                                                        nhập</a></th>
                                                <th scope="col" role="columnheader" data-field="User1.GivenName"
                                                    rowspan="1" data-title="Người tạo" data-index="10"
                                                    id="72d2c8e3-ccb3-4e08-9bde-a4ddb4c9fa46"
                                                    class="cell-name k-header ng-scope" style="display:none"
                                                    data-role="columnsorter"><a class="k-link" href="#">Người
                                                        tạo</a></th>
                                                <th scope="col" role="columnheader" data-field="TotalQuantity"
                                                    rowspan="1" data-title="Tổng số lượng" data-index="11"
                                                    id="5816b154-6f93-4457-b26e-f5980df8c8e3"
                                                    class="cell-total txtR k-header ng-scope" style="display:none">Tổng
                                                    số lượng</th>
                                                <th scope="col" role="columnheader" data-field="TotalProductType"
                                                    rowspan="1" data-title="Tổng số mặt hàng" data-index="12"
                                                    id="7639de60-b126-456a-aba6-bde4f04ae101"
                                                    class="cell-total-final txtR k-header ng-scope" style="display:none">
                                                    Tổng số mặt hàng</th>
                                                <th scope="col" role="columnheader" data-field="SubTotal"
                                                    rowspan="1" data-title="Tổng tiền hàng" data-index="13"
                                                    id="cb713f02-6a38-48b2-97d9-9136c1c7732e"
                                                    class="cell-total txtR k-header ng-scope" style="display:none">Tổng
                                                    tiền hàng</th>
                                                <th scope="col" role="columnheader" data-field="Discount"
                                                    rowspan="1" data-title="Giảm giá" data-index="14"
                                                    id="c681a308-a4a8-4d59-9ad8-77a93ed045c8"
                                                    class="cell-total txtR k-header ng-scope" style="display:none"
                                                    data-role="columnsorter"><a class="k-link" href="#">Giảm
                                                        giá</a></th>
                                                <th scope="col" role="columnheader" data-field="Total" rowspan="1"
                                                    data-title="Cần trả NCC" data-index="15"
                                                    id="2c892bb1-2ad3-45da-9d77-0e0c722bbc87"
                                                    class="cell-total-final txtR k-header ng-scope">Cần trả
                                                    NCC</th>
                                                <th scope="col" role="columnheader" data-field="PaidAmount"
                                                    rowspan="1" data-title="Tiền đã trả NCC" data-index="16"
                                                    id="5f6dc51f-54b2-491e-aefe-a374f1821e84"
                                                    class="cell-total-final txtR k-header ng-scope" style="display:none">
                                                    Tiền đã trả NCC</th>
                                                <th scope="col" role="columnheader" data-field="ShortDescription"
                                                    rowspan="1" data-title="Ghi chú" data-index="17"
                                                    id="c1d1aaf2-39ce-42a7-b9e5-4c294193f2b8"
                                                    class="cell-description k-header ng-scope" style="display:none">Ghi
                                                    chú</th>
                                                <th scope="col" role="columnheader" data-field="Status"
                                                    rowspan="1" data-title="Trạng thái" data-index="18"
                                                    id="06de29c1-e310-4a72-9288-30cde8c85619"
                                                    class="cell-status k-header ng-scope th-show"
                                                    data-role="columnsorter"><a class="k-link" href="#">
                                                        <select class="form-select form-select-lg"
                                                            onchange="getCoupon(this)">
                                                            <option value="" selected>Trạng thái</option>
                                                            <option value="">Tất cả</option>
                                                            <option value="1">Phiếu nhập</option>
                                                            <option value="2">Phiếu xuất</option>
                                                            <option value="3">Phiếu bán</option>
                                                        </select></a></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="k-grid-content k-auto-scrollable k-grid-content-ac" style="max-height: 789px;">
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
                                    </colgroup>
                                    <tbody id="tbody-coupon">





                                        {{-- <tr class="k-alt k-master-row ng-scope"
                                                        data-uid="495d90d1-6f2f-48d2-b9c1-06f4f88b1c6c" role="row">
                                                        <td class="k-hierarchy-cell"><a class="k-icon k-plus"
                                                                href="#" tabindex="-1"></a></td>
                                                        <td class="cell-check" role="gridcell"><label
                                                                class="quickaction_chk dpb has-pretty-child"
                                                                ng-click="eventStop($event)">
                                                                <div class="clearfix prettycheckbox labelright  blue">
                                                                    <input type="checkbox" checklist-comparator=".Id"
                                                                        checklist-value="dataItem" kv-pretty-check=""
                                                                        kv-data-label="" ng-model="checked"
                                                                        class="ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"
                                                                        style="display: none;"
                                                                        checklist-model="selectedPurchaseOrder"><a
                                                                        href="javascript:void(0)" tabindex="0"
                                                                        class=""></a>
                                                                    <label for="undefined" class=""></label>
                                                                </div>
                                                            </label></td>
                                                        <td class="cell-star" role="gridcell"><label
                                                                class="quickaction_chk star"><input type="checkbox"
                                                                    class="chkrad ng-pristine ng-untouched ng-valid ng-empty"
                                                                    ng-click="onChangeFavouriteItem(dataItem)"
                                                                    ng-true-value="1" ng-false-value="0"
                                                                    ng-checked="dataItem.IsFavourite > 0"
                                                                    ng-model="dataItem.IsFavourite"><span></span></label>
                                                        </td>
                                                        <td class="cell-code" role="gridcell"><span class="ng-binding"
                                                                data-code="PN000001">PN000001 <i
                                                                    class="fa fa-envelope ng-hide"
                                                                    ng-show="undefined"></i></span></td>
                                                        <td class="cell-code" style="display:none" role="gridcell">
                                                            <span ng-bind="dataItem.ReturnCode"
                                                                class="ng-binding"></span></td>
                                                        <td class="cell-date-time" role="gridcell">01/09/2023 16:56</td>
                                                        <td class="cell-date-time" style="display:none"
                                                            role="gridcell">01/09/2023 16:56</td>
                                                        <td class="cell-date-time" style="display:none"
                                                            role="gridcell"></td>
                                                        <td class="cell-auto" role="gridcell"><span
                                                                ng-bind="dataItem.Supplier.Name" class="ng-binding">nha
                                                                cung cap</span></td>
                                                        <td class="cell-unit" style="display:none" role="gridcell">
                                                            <span ng-bind="dataItem.Branch.Name" class="ng-binding">Chi
                                                                nhánh trung tâm</span></td>
                                                        <td class="cell-name" style="display:none" role="gridcell">
                                                            <span ng-bind="dataItem.User.GivenName"
                                                                class="ng-binding">admin</span></td>
                                                        <td class="cell-name" style="display:none" role="gridcell">
                                                            <span ng-bind="dataItem.User1.GivenName"
                                                                class="ng-binding">admin</span></td>
                                                        <td class="cell-total txtR" style="display:none"
                                                            role="gridcell">5.00</td>
                                                        <td class="cell-total-final txtR" style="display:none"
                                                            role="gridcell"><span ng-bind="dataItem.TotalProductType"
                                                                class="ng-binding">1</span></td>
                                                        <td class="cell-total txtR ng-binding" style="display:none"
                                                            role="gridcell">250,000</td>
                                                        <td class="cell-total txtR ng-binding" style="display:none"
                                                            role="gridcell">0</td>
                                                        <td class="cell-total-final txtR ng-binding" role="gridcell">
                                                            250,000</td>
                                                        <td class="cell-total-final txtR ng-binding"
                                                            style="display: none; color: rgb(255, 0, 0);"
                                                            role="gridcell">0</td>
                                                        <td class="cell-description" style="display:none"
                                                            role="gridcell"><span ng-bind="dataItem.ShortDescription"
                                                                class="ng-binding"></span></td>
                                                        <td class="cell-status" role="gridcell"><span
                                                                ng-bind="dataItem.Status" class="ng-binding">Đã nhập
                                                                hàng</span></td>
                                                    </tr> --}}
                                    </tbody>
                                </table><span class="line"></span>
                                <span class="line line2" style=""></span>
                            </div>
                            <div class="paging-box" style="display: none;">
                                <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap" data-role="pager"><a
                                        href="#" title="Trang đầu"
                                        class="k-link k-pager-nav k-pager-first k-state-disabled" data-page="1"
                                        tabindex="-1"><span class="k-icon k-i-seek-w">Trang đầu</span></a><a
                                        href="#" title="Trang trước" class="k-link k-pager-nav  k-state-disabled"
                                        data-page="1" tabindex="-1"><span class="k-icon k-i-arrow-w">Trang
                                            trước</span></a>
                                    <ul class="k-pager-numbers k-reset">
                                        <li class="k-current-page"><span class="k-link k-pager-nav">1</span>
                                        </li>
                                        <li><span class="k-state-selected">1</span></li>
                                    </ul><a href="#" title="Trang sau" class="k-link k-pager-nav  k-state-disabled"
                                        data-page="1" tabindex="-1"><span class="k-icon k-i-arrow-e">Trang
                                            sau</span></a><a href="#" title="Trang cuối"
                                        class="k-link k-pager-nav k-pager-last k-state-disabled" data-page="1"
                                        tabindex="-1"><span class="k-icon k-i-seek-e">Trang cuối</span></a><span
                                        class="k-pager-info k-label">Hiển thị 1 - 3 / Tổng số 3 phiếu nhập
                                        hàng</span>
                                </div>
                            </div>
                        </div>
                    </article><kv-empty-grid-filter-all class="ng-isolate-scope">
                        <div hidden="hidden" id="empty-grid-filter-alltime" class="no-data"><span><span
                                    id="empty-grid-head"></span><a href="javascript:void(0);" style="font-weight: bold;"
                                    ng-click="filterbyRange('alltime')" class="ng-binding">&nbsp;vào đây&nbsp;</a><span
                                    id="empty-grid-last"></span></span>
                        </div>
                    </kv-empty-grid-filter-all>
                    <div style="display: none">
                        <script type="text/ng-template" id="barcodePopupTemplate"><kv-bar-code-form form-name="barcodePopup"></kv-bar-code-form></script>
                        <script type="text/x-kendo-template" id="templDetail"><div class="tabstrip"> <ul> <li class="k-state-active"></li> <li></li> <li></li> </ul> <div> <purchase-order-form kv-data-item="dataItem" kv-data-status="orderStatus" kv-on-save="refresh" kv-ignore-popup-payment="ignorePopupPayment"></purchase-order-form> </div> <div> <div id="tblpayment"></div> </div> <div> <div id="tblPurchaseReturnsHistory"></div> </div> </div></script>
                        <script type="text/ng-template" id="paymentPopupTemplate"><kv-purchase-payment-popup kv-name="paymentPopup"></kv-purchase-payment-popup></script>
                    </div>
                </section>
            </section><kv-popup id="discountOrderHelp" class="ng-scope ng-isolate-scope popupWrapper">
                <div class="kv2Pop pop popArrow" ng-transclude="">
                    <div data-notify="showtext" class="ng-scope"></div>
                </div>
            </kv-popup>
        </section>
    </section><!-- end ngIf: $root.isAuthenticated === true -->
    <div class="overlay" kv-mobile-left=""></div>

    <div id="custom_fc_button" style="visibility: visible;">
        <a id="open_fc_widget" onclick="window.fcWidget.open();" style="cursor:pointer;" class="ng-binding">
            Hỗ trợ 1900 6522
            <span id="notifyFreshchat" style="visibility:hidden;"></span>
        </a>
    </div>

    </div>
    <!-- ngIf: $root.isAuthenticated === false -->
    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const wavehouseId = urlParams.get('wavehouse_id')
        $('#href-import').attr('href', '/coupon/import?wavehouse_id=' + wavehouseId)
        $('#href-export').attr('href', '/coupon/export?wavehouse_id=' + wavehouseId)
        $('#href-sell').attr('href', '/coupon/sell?wavehouse_id=' + wavehouseId)
        let temp = 0
        $(document).on("click", ".table-data", function() {
            let stt = $(this).data('stt');
            let json = $(this).data('json');
            let totalQuantity = 0;
            let totalTypeProduct = 0;
            let text = "";
            if (json.supplier_id !== null) {
                text = json.supplier.name
            }
            let descriptionData = `
                                                    <tr class="k-detail-row k-alt ng-scope" id="detail-row" data-stt="${stt}" style="display: table-row;">
                                                        <td class="k-hierarchy-cell"></td>
                                                        <td class="k-detail-cell" colspan="7">
                                                            <div class="k-tabstrip-wrapper">
                                                                <div class="tabstrip k-widget k-header k-tabstrip k-floatwrap k-tabstrip-top"
                                                                    data-role="tabstrip" tabindex="0"
                                                                    role="tablist">
                                                                 
                                                                    <div class="k-content k-state-active"
                                                                        id="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-1"
                                                                        role="tabpanel" aria-expanded="true"
                                                                        style="display: block; ">
                                                                        <purchase-order-form kv-data-item="dataItem"
                                                                            kv-data-status="orderStatus"
                                                                            kv-on-save="refresh"
                                                                            kv-ignore-popup-payment="ignorePopupPayment"
                                                                            class="ng-isolate-scope">
                                                                            <article
                                                                                class="form-wrapper form-labels-130 content-list purchaseOrder-contentlist">
                                                                                <div
                                                                                    class="row row-padding-15 mb15 row-flex">
                                                                                    <div class="col-md-4 col-sm-12">
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Mã
                                                                                                nhập hàng:</label>
                                                                                            <div
                                                                                                class="form-wrap form-control-static">
                                                                                                <strong
                                                                                                    class="ng-binding">${json.code}</strong>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Thời
                                                                                                gian:</label>
                                                                                            <div class="form-wrap "><span
                                                                                                    class="k-widget k-datetimepicker k-header form-control"
                                                                                                    style=""><span
                                                                                                        class="k-picker-wrap k-state-default"><input
                                                                                                            kendo-date-time-picker=""
                                                                                                            class="form-control k-input"
                                                                                                            type="text"
                                                                                                            style="width: 100%;" value="${json.created_at}"><span
                                                                                                            
                                                                                                            class="k-select"><span
                                                                                                                unselectable="on"
                                                                                                                class="k-icon k-i-calendar"
                                                                                                                role="button">select</span><span
                                                                                                                unselectable="on"
                                                                                                                class="k-icon k-i-clock"
                                                                                                                role="button">select</span></span></span></span>
                                                                                                <span ng-show="disabled"
                                                                                                    class="ng-binding ng-hide">01/09/2023
                                                                                                    17:18</span></div>
                                                                                        </div>
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Nhà
                                                                                                cung
                                                                                                cấp:</label>
                                                                                            <div class="form-wrap form-control-static ng-scope"
                                                                                                ng-if="dataItem.Supplier.Code"
                                                                                                ng-show="dataItem.Supplier.Code"
                                                                                                ng-hide="dataItem.isShowSupplier">
                                                                                                <label
                                                                                                    class="ng-binding">${text}</label></div>
                                                                                            <div class="form-wrap ng-hide"
                                                                                                ng-show="dataItem.isShowSupplier">
                                                                                                <autocomplete
                                                                                                    ng-show="!cart.Supplier"
                                                                                                    attr-inputid="idSupplierSearchTerm"
                                                                                                    attr-inputclass="classSupplierSearchTerm"
                                                                                                    ng-model="supplierSearchTerm"
                                                                                                    title=""
                                                                                                    attr-placeholder="Tìm nhà cung cấp"
                                                                                                    template-id="supplierItemTempl"
                                                                                                    data="suppliers"
                                                                                                    on-type="searchTermChanged"
                                                                                                    on-select="selectSupplier"
                                                                                                    class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                                                                                                    <div class="autocomplete "
                                                                                                        id=""><i
                                                                                                            class="far fa-search"></i><input
                                                                                                            type="text"
                                                                                                            autocomplete="off"
                                                                                                            ng-model="searchParam"
                                                                                                            maxlength=""
                                                                                                            ng-change="onInputChange(searchParam)"
                                                                                                            placeholder="Tìm nhà cung cấp"
                                                                                                            class="form-control form-control-kv classSupplierSearchTerm iptUnitName_  ng-empty ng-valid-maxlength"
                                                                                                            id="idSupplierSearchTerm"
                                                                                                            tabindex=""
                                                                                                            ng-disabled="kvDisable"
                                                                                                            kv-filter-search="">
                                                                                                        <div class="output-complete ng-hide"
                                                                                                            ng-show="completing || alwaysOpen"
                                                                                                            ng-class="{'show-only': showSelectMulti(listSelectMulti, searchParam), 'isMultiSelect': showMultiSelect, 'notFoundMulti' : isNotFoundMultiSelect }"
                                                                                                            ng-mousedown="autocompleFocus($event)">
                                                                                                            <ul
                                                                                                                ng-hide="suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; isNotShowNotFound">
                                                                                                                <!-- ngRepeat: suggestion in suggestions track by $index -->
                                                                                                            </ul>
                                                                                                            <!-- ngIf: getStateSelectMulti(listSelectMulti, isMultiSelect, suggestions) -->
                                                                                                            <div class="autoNotFound ng-hide"
                                                                                                                ng-show="searchParam &amp;&amp; suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; !isNotShowNotFound">
                                                                                                                Không tìm
                                                                                                                thấy kết quả
                                                                                                                nào phù hợp
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </autocomplete>
                                                                                                <div class="autocomplete autocomplete-text ng-hide"
                                                                                                    ng-show="cart.Supplier">
                                                                                                    <i class="fa fa-user"
                                                                                                        aria-hidden="true"></i>
                                                                                                    <span
                                                                                                        class="form-control form-text ng-binding"
                                                                                                        id="idReadOnlySupplier"></span>
                                                                                                    <a href=""
                                                                                                        id="idRemoveSupplier"
                                                                                                        class="btn-icon"
                                                                                                        ng-click="removeSupplier()"
                                                                                                        ng-enter="removeSupplier()"
                                                                                                        title="Xóa"><i
                                                                                                            class="fal fa-remove"></i></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Người
                                                                                                tạo:</label>
                                                                                            <div
                                                                                                class="form-wrap form-control-static ng-binding">
                                                                                                admin</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4 col-sm-12">
                                                                                        <div class="form-group"><label
                                                                                                ng-show="viewOrderSupplier"
                                                                                                class="form-label control-label ng-binding ng-hide">Mã
                                                                                                đặt hàng nhập:</label>
                                                                                            <div ng-show="viewOrderSupplier"
                                                                                                class="form-wrap form-control-static ng-hide">
                                                                                                <a href="#/OrderSupplier?Code=undefined"
                                                                                                    target="_blank"
                                                                                                    class="ng-binding"></a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Trạng
                                                                                                thái:</label>
                                                                                            <div
                                                                                                class="form-wrap form-control-static ng-binding">
                                                                                                Đã nhập hàng</div>
                                                                                        </div>
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Chi
                                                                                                nhánh:</label>
                                                                                            <div
                                                                                                class="form-wrap form-control-static ng-binding">
                                                                                                ${json.wavehouse.name}</div>
                                                                                        </div>
                                                                                        <div class="form-group"><label
                                                                                                class="form-label control-label ng-binding">Người
                                                                                                nhập:</label>
                                                                                            <div class="form-wrap "><span
                                                                                                    title=""
                                                                                                    class="k-widget k-dropdown k-header form-control"
                                                                                                    unselectable="on"
                                                                                                    role="listbox"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false"
                                                                                                    tabindex="0"
                                                                                                    aria-owns=""
                                                                                                    aria-disabled="false"
                                                                                                    aria-readonly="false"
                                                                                                    aria-busy="false"
                                                                                                    aria-activedescendant="4cb70aee-d159-43ba-9693-2e402f148b32"
                                                                                                    style=""><span
                                                                                                        unselectable="on"
                                                                                                        class="k-dropdown-wrap k-state-default"><span
                                                                                                            unselectable="on"
                                                                                                            class="k-input ng-scope">admin</span><span
                                                                                                            unselectable="on"
                                                                                                            class="k-select"><span
                                                                                                                unselectable="on"
                                                                                                                class="k-icon k-i-arrow-s">select</span></span></span><select
                                                                                                        k-data-source="sellers.Data"
                                                                                                        k-data-text-field="'GivenName'"
                                                                                                        k-data-value-field="'Id'"
                                                                                                        class="form-control"
                                                                                                        k-ng-model="createUser"
                                                                                                        k-filter="'contains'"
                                                                                                        ng-show="!disabled"
                                                                                                        ng-disabled="disabled"
                                                                                                        k-on-change="SoldByChanged()"
                                                                                                        height="266"
                                                                                                        kendo-drop-down-list=""
                                                                                                        data-role="dropdownlist"
                                                                                                        style="display: none;">
                                                                                                        <option
                                                                                                            value="125057"
                                                                                                            selected="selected">
                                                                                                            admin</option>
                                                                                                    </select></span><span
                                                                                                    ng-show="disabled"
                                                                                                    class="ng-binding ng-hide">admin</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-md-4 col-sm-12 note-column comment-wrap">
                                                                                        <div ng-modal="dataItem.Description"
                                                                                            ng-bind="dataItem.Description?dataItem.Description:'Ghi chú...'"
                                                                                            ng-show="disabled"
                                                                                            class="tblBox_Des tblBox_Des2 ng-binding ng-hide">
                                                                                            Ghi chú...</div>
                                                                                        <textarea maxlength="2000" ng-model="dataItem.Description" placeholder="Ghi chú..." ng-show="!disabled"
                                                                                            disabled="disabled"
                                                                                            class="tblBox_Des tblBox_Des2 ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                                                            kv-textarea-enter="">${json.name}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                            <article
                                                                                class="form-wrapper mb15 window-wrap-table"
                                                                                ng-class="{'popSrc': disabled}">
                                                                                <div id="tblsub"
                                                                                    class="tbl-custom-header k-grid-filter k-grid k-widget k-grid-noscroll"
                                                                                    data-role="grid" style="">
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
                                                                                                    <col>
                                                                                                    <col>
                                                                                                </colgroup>
                                                                                                <thead role="rowgroup">
                                                                                                    <tr role="row">
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="ProductCode"
                                                                                                            rowspan="1"
                                                                                                            data-title="Mã hàng"
                                                                                                            data-index="0"
                                                                                                            id="97399e23-781f-464d-bf3a-c283df4a2278"
                                                                                                            class="cell-code k-header">
                                                                                                            Mã hàng</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="ProductName"
                                                                                                            rowspan="1"
                                                                                                            data-title="Tên hàng"
                                                                                                            data-index="1"
                                                                                                            id="cc17157b-3f3e-49d4-92c5-93cca65076a6"
                                                                                                            class="cell-auto k-header">
                                                                                                            Tên hàng</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="Quantity"
                                                                                                            rowspan="1"
                                                                                                            data-title="Số lượng"
                                                                                                            data-index="2"
                                                                                                            id="238ff582-9e5e-482b-841e-c51bc7e42dc1"
                                                                                                            class="cell-quantity k-header">
                                                                                                            Số lượng</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="Price"
                                                                                                            rowspan="1"
                                                                                                            data-title="Đơn giá"
                                                                                                            data-index="3"
                                                                                                            id="d8769c39-91c3-4f1f-9c32-6488d3c4a9d2"
                                                                                                            class="cell-total txtR k-header">
                                                                                                            Đơn giá</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="SubTotal"
                                                                                                            rowspan="1"
                                                                                                            data-title="Thành tiền"
                                                                                                            data-index="6"
                                                                                                            id="7a6bc5a9-a018-4c41-8541-73665dc5a9cf"
                                                                                                            class="cell-total txtR bg-none k-header">
                                                                                                            Thành tiền</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="ProductId"
                                                                                                            rowspan="1"
                                                                                                            data-title=" "
                                                                                                            data-index="7"
                                                                                                            id="0d79ae43-8c1f-488f-8e94-7c7449be2f71"
                                                                                                            class="cell-adddel k-header th-show">
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                  
                                                                                                </thead>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                        style="max-height: 789px;">
                                                                                        <table role="grid">
                                                                                           <tbody role="rowgroup">`
            $.each(json.coupon_product, function(key, val) {
                totalTypeProduct++
                totalQuantity = Number(totalQuantity) + Number(val.quantity)
                descriptionData += `
                                                                                                <tr data-uid="cfa1b491-d417-43f2-babc-c96e4a9b2cd0"
                                                                                                    role="row">
                                                                                                    <td class="cell-code"
                                                                                                        role="gridcell"><a
                                                                                                           >${val.product.code}</a>
                                                                                                    </td>
                                                                                                    <td class="cell-auto"
                                                                                                        role="gridcell">
                                                                                                        ${val.product.name}<span
                                                                                                            class="txtN txtI fs11 dpb txtGray txtNote"></span>
                                                                                                    </td>
                                                                                                    <td class="cell-quantity"
                                                                                                        role="gridcell">${val.quantity}
                                                                                                    </td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        ${formatCurrency(val.price)}</td>
                                                                                                
                                                                                                    <td class="cell-total txtR txtB"
                                                                                                        role="gridcell">
                                                                                                        ${formatCurrency(Number(val.price) * Number(val.quantity))}</td>
                                                                                                    <td class="cell-adddel"
                                                                                                        role="gridcell"><a
                                                                                                            href="javascript:void(0)"
                                                                                                            data-productid="19171940"
                                                                                                            data-masterunitid="undefined"
                                                                                                            class="btn-icon priceBookClick"><i
                                                                                                                class="fa fa-tag"></i></a>
                                                                                                    </td>
                                                                                                </tr>`
            })

            descriptionData += `</tbody>
                                                                                        </table><span class="line"
                                                                                            style=" top: 86.7969px;"></span><span
                                                                                            class="line line2"
                                                                                            style="height: 727px; top: 86.7969px;"></span>
                                                                                    </div>
                                                                                    <div class="paging-box"
                                                                                        style="display: none;">
                                                                                        <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap"
                                                                                            data-role="pager"><a
                                                                                                href="#"
                                                                                                title="Go to the first page"
                                                                                                class="k-link k-pager-nav k-pager-first k-state-disabled"
                                                                                                data-page="1"
                                                                                                tabindex="-1"><span
                                                                                                    class="k-icon k-i-seek-w">Go
                                                                                                    to the first
                                                                                                    page</span></a><a
                                                                                                href="#"
                                                                                                title="Go to the previous page"
                                                                                                class="k-link k-pager-nav  k-state-disabled"
                                                                                                data-page="1"
                                                                                                tabindex="-1"><span
                                                                                                    class="k-icon k-i-arrow-w">Go
                                                                                                    to the previous
                                                                                                    page</span></a>
                                                                                            <ul
                                                                                                class="k-pager-numbers k-reset">
                                                                                                <li
                                                                                                    class="k-current-page">
                                                                                                    <span
                                                                                                        class="k-link k-pager-nav">1</span>
                                                                                                </li>
                                                                                                <li><span
                                                                                                        class="k-state-selected">1</span>
                                                                                                </li>
                                                                                            </ul><a href="#"
                                                                                                title="Go to the next page"
                                                                                                class="k-link k-pager-nav  k-state-disabled"
                                                                                                data-page="1"
                                                                                                tabindex="-1"><span
                                                                                                    class="k-icon k-i-arrow-e">Go
                                                                                                    to the next
                                                                                                    page</span></a><a
                                                                                                href="#"
                                                                                                title="Go to the last page"
                                                                                                class="k-link k-pager-nav k-pager-last k-state-disabled"
                                                                                                data-page="1"
                                                                                                tabindex="-1"><span
                                                                                                    class="k-icon k-i-seek-e">Go
                                                                                                    to the last
                                                                                                    page</span></a><span
                                                                                                class="k-pager-info k-label">Hiển
                                                                                                thị 1 - 1 / Tổng số 1
                                                                                                dòng</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                            <article class="form-wrapper">
                                                                                <aside class="flr txtR tblBox boxTotal">
                                                                                    <div class="table-responsive">
                                                                                        <table class="">
                                                                                            <tbody>
                                                                                                <tr
                                                                                                    ng-show="settings.UseTotalQuantity">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng số lượng:</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        ${totalQuantity}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng số mặt hàng:
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        ${totalTypeProduct}</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng tiền hàng:</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        ${formatCurrency(json.price)}</td>
                                                                                                </tr>
                                                                                              
                                                                                            </tbody>
                                                                                 
                                                                                        </table>
                                                                                    </div>
                                                                                </aside>
                                                                            </article>
                                                                          
                                                                           
                                                                        </purchase-order-form> </div>
                                                               
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>`


            let position = 86.9969 + (stt - 1) * 83.7
            $('.table-data').each(function(i, obj) {
                $(this).removeClass('k-alt k-master-state');
            });
            console.log(stt);
            console.log($('#detail-row').data('stt'));
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
        getCoupon()

        function getCoupon(_this) {
            let selected = $(_this).val();
            if (selected == undefined) {
                selected = ""
            }
            let s = $("#input-search").val()

            let html = ``;
            $.ajax({
                url: "/api/coupon?wavehouse_id=" + wavehouseId + "&&s=" + s + "&&status=" + selected,
                type: "get",
                success: function(response) {
                    let data = response.data
                    if (data && response.status == "success") {
                        data.map(function(val, key) {
                            let stt = key + 1
                            let status = `<span ng-bind="dataItem.Status"
                                                    class="ng-binding" style="color:green">Đã Nhập Hàng</span>`

                            if (val.status == 2) {
                                status = `<span ng-bind="dataItem.Status"
                                                    class="ng-binding" style="color:blue">Đã Xuất Hàng</span>`
                            } else if (val.status == 3) {
                                status = `<span ng-bind="dataItem.Status"
                                                    class="ng-binding" style="color:red">Đã Bán</span>`

                            }
                            let text = ""
                            if (val.supplier_id != null) {
                                text = val.supplier.name
                            }
                            html += `
                            <tr data-json='${JSON.stringify(val)}' class=" k-master-row ng-scope table-data " data-stt="${stt}"
                                            data-uid="2d800645-b0de-47c5-a67e-9b929cfd1137" role="row">
                                            <td class="k-hierarchy-cell"><a class="k-icon k-minus" href="#"
                                                    tabindex="-1"></a></td>
                                            <td class="cell-check" role="gridcell"><label
                                                    class="quickaction_chk dpb has-pretty-child"
                                                    ng-click="eventStop($event)">
                                                    <div class="clearfix prettycheckbox labelright  blue">
                                                        <input type="checkbox" checklist-comparator=".Id"
                                                            checklist-value="dataItem" kv-pretty-check=""
                                                            kv-data-label="" ng-model="checked"
                                                            class="ng-scope ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"
                                                            style="display: none;"
                                                            checklist-model="selectedPurchaseOrder"><a
                                                            href="javascript:void(0)" tabindex="0"
                                                            class=""></a>
                                                        <label for="undefined" class=""></label>
                                                    </div>
                                                </label></td>
                                            <td class="cell-star" role="gridcell"><label
                                                    class="quickaction_chk star"><input type="checkbox"
                                                        class="chkrad ng-pristine ng-untouched ng-valid ng-empty"
                                                        ng-click="onChangeFavouriteItem(dataItem)" ng-true-value="1"
                                                        ng-false-value="0" ng-checked="dataItem.IsFavourite > 0"
                                                        ng-model="dataItem.IsFavourite"><span></span></label>
                                            </td>
                                            <td class="cell-code" role="gridcell"><span class="ng-binding"
                                                    data-code="PN000003">${val.code} <i class="fa fa-envelope ng-hide"
                                                        ng-show="undefined"></i></span></td>
                                            <td class="cell-code" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.ReturnCode" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-date-time" role="gridcell">${val.created_at}</td>
                                           
                                            <td class="cell-auto" role="gridcell"><span
                                                    ng-bind="dataItem.Supplier.Name" class="ng-binding">${text}</span></td>
                                            
                                            
                                            <td class="cell-total-final txtR ng-binding" role="gridcell">
                                                ${formatCurrency(val.price)}</td>
                                            <td class="cell-total-final txtR ng-binding"
                                                style="display: none; color: rgb(255, 0, 0);" role="gridcell">0</td>
                                            <td class="cell-description" style="display:none" role="gridcell"><span
                                                    ng-bind="dataItem.ShortDescription" class="ng-binding"></span></td>
                                            <td class="cell-status" role="gridcell">${status}</td>
                                        </tr>
                                        `
                        })
                        $('#tbody-coupon').html(html)
                    } else {
                        toastr.error('Kho không tồn tai')
                    }

                }
            });
        }
    </script>
@endsection
