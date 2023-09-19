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
                                                        class="k-link" href="#">Họ tên</a></th>
                                              
                                                <th scope="col" role="columnheader" data-field="Branch.Name"
                                                    rowspan="1" data-title="Chi nhánh" data-index="8"
                                                    id="4c3a2ccd-9e9e-437d-90f2-8ad1ddd31df7"
                                                    class="cell-unit k-header ng-scope" 
                                                    data-role="columnsorter"><a class="k-link" href="#">Số điện thoại</a></th>
                                                    <th scope="col" role="columnheader" data-field="Supplier.Name"
                                                    rowspan="1" data-title="Nhà cung cấp" data-index="7"
                                                    id="3392e826-7699-42b4-98ec-cae2b62368f7"
                                                    class="cell-auto k-header ng-scope" data-role="columnsorter"><a
                                                        class="k-link" href="#">Địa chỉ</a></th>
                                                <th scope="col" role="columnheader" data-field="Status"
                                                    rowspan="1" data-title="Trạng thái" data-index="18"
                                                    id="06de29c1-e310-4a72-9288-30cde8c85619"
                                                    class="cell-status k-header ng-scope th-show"
                                                    data-role="columnsorter"><a class="k-link" href="#">
                                                        </a></th>
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
      
        let temp = 0
        $("#input-search").on('keyup', function(e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                // Do something
                getCustomer()

            }
        });
        getCustomer()

        function getCustomer(_this) {
            let selected = $(_this).val();
            if (selected == undefined) {
                selected = ""
            }
            let s = $("#input-search").val()

            let html = ``;
            $.ajax({
                url: "/api/customer?s="+s,
                type: "get",
                success: function(response) {
                    let data = response.data
                    if (data && response.status == "success") {
                        data.map(function(val, key) {
                           
                            html += `
                            <tr class=" k-master-row ng-scope table-data "
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
                                                    data-code="PN000003">${val.name} <i class="fa fa-envelope ng-hide"
                                                        ng-show="undefined"></i></span></td>
                                            <td class="cell-code" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.ReturnCode" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-date-time" role="gridcell">${val.phone}</td>
                                           
                                            <td class="cell-auto" role="gridcell"><span
                                                    ng-bind="dataItem.Supplier.Name" class="ng-binding">${val.address}</span></td>
                                            
                                            
                                            
                                            <td class="cell-status" role="gridcell"><a href="customer/detail?id=${val.id}">Chi tiết</a></td>
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
