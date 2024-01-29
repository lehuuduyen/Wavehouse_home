@extends('main', ['pageTitle' => 'Danh mục sản phẩm'])
@section('content')
    <style>
        .select2-selection__arrow {
            display: none !important;
        }

        select {
            -webkit-appearance: none;
        }
    </style>
    <section class="container main_wrapper kma-wrapper ng-scope" ng-if="$root.isAuthenticated === true">
        <!-- ngView:  -->
        <section class="clb main main-content ng-scope" ng-view="">
            <div class="wrapper-form "><kv-enter-serial-popup-new kv-name="serialpopup"
                    class="ng-isolate-scope"></kv-enter-serial-popup-new><kv-enter-batchexpire-popup-multiple
                    kv-name="batchexpirepopup" class="ng-isolate-scope"></kv-enter-batchexpire-popup-multiple>
                <div class="kv2Left purchaseorder" kv-form-load="" ng-class="{'has-expired' : showExpireMessage.isActive }">
                    <div class="header-page-inline"><button class="btn-icon" ng-click="goBack()" title="Trở về"
                            ng-enter="goBack()"><i class="fas fa-arrow-left"></i></button>
                        <h1 class="ng-binding">Nhập hàng</h1>
                        <div class="form-header">
                            <div class="form-header-content">
                                <select class="search-product" multiple="multiple" style="width: 100%">

                                </select>
                                <div class="header-fast ng-hide"
                                    ng-show="isNormalMode &amp;&amp; !$scope.isUseElectronicScales"><input
                                        id="purchaseOderProductCount" tabindex="3"
                                        class="form-control-border form-control-border-lg ng-pristine ng-untouched ng-valid ng-empty ng-hide"
                                        ng-show="isNormalMode &amp;&amp; !$scope.isUseElectronicScales" type="text"
                                        ng-model="productCount" kv-auto-numeric="{mDec:3, isJumpOnEnter : false}"
                                        placeholder="Số lượng" ng-enter="SaveProductToPurchaseOder()"><span title=""
                                        class="k-widget k-dropdown k-header form-control-border form-control-border-lg"
                                        unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false"
                                        tabindex="4" aria-owns="idProductUnit_listbox" aria-disabled="false"
                                        aria-readonly="false" aria-busy="false" style=""><span unselectable="on"
                                            class="k-dropdown-wrap k-state-default"><span unselectable="on"
                                                class="k-input ng-scope"></span><span unselectable="on"
                                                class="k-select"><span unselectable="on"
                                                    class="k-icon k-i-arrow-s">select</span></span></span><select
                                            ng-disabled="disableProductUnit" ng-enter="SaveProductToPurchaseOder"
                                            id="idProductUnit" kendo-drop-down-list="" k-data-source="chooseProductUnit"
                                            k-data-text-field="'Name'" class="form-control-border form-control-border-lg"
                                            k-data-value-field="'Id'" k-rebind="chooseProductUnit" k-auto-bind="true"
                                            k-value-primitive="true" k-ng-model="productUnit" height="266"
                                            k-change="productUnitChanged" data-role="dropdownlist"
                                            style="display: none;"></select></span></div>
                            </div>
                            <kv-popup id="shortcutHelp" class="uln shortcutBox ng-isolate-scope popupWrapper">
                                <div class="kv2Pop pop popArrow" ng-transclude="">
                                    <h3 class="ng-binding ng-scope">Phím tắt chức năng</h3>
                                    <ul class="ng-scope">
                                        <li class="ng-binding"><span class="titleFr txtB">F2:</span>Bật/tắt chế độ in tự
                                            động</li>
                                        <li class="ng-binding"><span class="titleFr txtB">F3:</span>Tìm hàng hóa</li>
                                        <li class="ng-binding"><span class="titleFr txtB">F4:</span>Tìm nhà cung cấp</li>
                                        <li class="ng-binding"><span class="titleFr txtB">F6:</span>Thay đổi chế độ nhập
                                            số lượng</li>
                                        <li class="ng-binding"><span class="titleFr txtB">F8:</span>Tiền nhà cung cấp trả
                                        </li>
                                        <li class="ng-binding"><span class="titleFr txtB">F9:</span>Hoàn thành</li>
                                        <li class="ng-binding"><span class="titleFr txtB">F10:</span>Chế độ sử dụng cân
                                            điện tử</li>
                                        <li class="ng-binding"><span class="titleFr txtB">Home:</span>Thay đổi số lượng
                                            sản phẩm</li>
                                        <li class="ng-binding"><span class="titleFr txtB"><i
                                                    class="fa fa-arrow-up"></i></span>Tăng số lượng sản phẩm</li>
                                        <li class="ng-binding"><span class="titleFr txtB"><i
                                                    class="fa fa-arrow-down"></i></span>Giảm số lượng sản phẩm</li>
                                        <li class="ng-binding"><span class="titleFr txtB">Enter:</span>Di chuyển xuống ô
                                            Số lượng của sản phẩm tiếp theo</li>
                                        <li class="ng-binding"><span class="titleFr txtB">Shift:</span>Di chuyển lên ô Số
                                            lượng của sản phẩm phía trên</li>
                                    </ul>
                                </div>
                            </kv-popup><kv-auto-print-popover><kv-popup id="autoPrint"
                                    class="uln shortcutBox ng-isolate-scope popupWrapper">
                                    <div class="kv2Pop pop popArrow" ng-transclude="">
                                        <div class="form-warper ng-scope">
                                            <div class="form-group mb10"><label
                                                    class="form-label control-label ng-binding">Tự động in khi phiếu hoàn
                                                    thành</label>
                                                <div class="form-wrap"><span class="toogle" id="printToggle"
                                                        ng-click="autoPrintVM.toggleAutoPrint()"
                                                        ng-class="{active: autoPrintVM.autoPrintEnabled}"></span></div>
                                            </div>
                                            <div class="form-group"><label class="form-label control-label ng-binding">Số
                                                    bản in (Liên)</label>
                                                <div class="form-wrap">
                                                    <div class="qtyBox"><input type="text" kv-select-text=""
                                                            kv-select-text-quantity=""
                                                            kv-auto-numeric="{isQuantity: true, vMin:1, vMax:(item.SellQuantity?item.BuyAndReturnQuantity:int.MaxValue), mDec:3, isJumpOnEnter : false}"
                                                            class="txtR iptQty form-control form-control-sm ng-pristine ng-untouched ng-valid ng-not-empty"
                                                            ng-model="autoPrintVM.numberPrintCopy"
                                                            ng-focus="onChangeBatchItem(item.Id)"
                                                            ng-click="onChangeBatchItem(item.Id)"
                                                            ng-change="autoPrintVM.updateNumberCopy()" tabindex="5000"
                                                            ng-disabled="!autoPrintVM.autoPrintEnabled"
                                                            disabled="disabled"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </kv-popup></kv-auto-print-popover><kv-toogle-action-popover><kv-popup id="toogleAction"
                                    class="uln shortcutBox ng-isolate-scope popupWrapper">
                                    <div class="kv2Pop pop popArrow" ng-transclude="">
                                        <h3 class="ng-binding ng-scope">Tùy chọn hiển thị</h3>
                                        <div class="form-warper ng-scope"><!-- ngIf: toogleActionVM.useMultiLine -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useMultiLine">
                                                <label class="form-label control-label ng-binding">Thêm dòng</label>
                                                <div class="form-wrap"><span class="toogle" id="toggleMultiLine"
                                                        ng-click="toogleActionVM.toggleMultiLine()"
                                                        ng-class="{active: toogleActionVM.toggleMultiLineEnabled}"></span>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useMultiLine --><!-- ngIf: toogleActionVM.useSetPriceBook -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useSetPriceBook">
                                                <label class="form-label control-label ng-binding">Thiết lập giá</label>
                                                <div class="form-wrap"><span class="toogle" id="toggleSetPriceBook"
                                                        ng-click="toogleActionVM.toggleSetPriceBook()"
                                                        ng-class="{active: toogleActionVM.toggleSetPriceBookEnabled}"></span>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useSetPriceBook --><!-- ngIf: toogleActionVM.useFilterData -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useFilterData">
                                                <label class="form-label control-label ng-binding">Chế độ lọc</label>
                                                <div class="form-wrap"><span class="toogle" id="toggleFilterData"
                                                        ng-click="toogleActionVM.toggleFilterData()"
                                                        ng-class="{active: toogleActionVM.toggleFilterDataEnabled}"></span>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useFilterData --><!-- ngIf: toogleActionVM.useProductOnHand -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useProductOnHand">
                                                <label class="form-label control-label ng-binding">Tồn Kho</label>
                                                <div class="form-wrap"><span class="toogle" id="toggleOnHand"
                                                        ng-click="toogleActionVM.toggleProductOnHand()"
                                                        ng-class="{active: toogleActionVM.toggleProductOnHandEnabled}"></span>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useProductOnHand --><!-- ngIf: toogleActionVM.defaultFullReceive --><!-- ngIf: toogleActionVM.useProductImage -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useProductImage">
                                                <label class="form-label control-label ng-binding">Ảnh hàng hóa</label>
                                                <div class="form-wrap"><span class="toogle" id="toggleDefaultImage"
                                                        ng-click="toogleActionVM.toggleProductImage()"
                                                        ng-class="{active: toogleActionVM.toggleProductImageEnabled}"></span>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useProductImage --><!-- ngIf: toogleActionVM.useChangePrice -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useChangePrice">
                                                <label class="form-label control-label ng-binding">Chỉnh sửa thành
                                                    tiền</label>
                                                <div class="form-wrap"><span class="toogle active"
                                                        id="toggleDefaultChangePrice"
                                                        ng-click="toogleActionVM.toggleChangePrice()"
                                                        ng-class="{active: toogleActionVM.toggleChangePriceEnabled}"></span>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useChangePrice --><!-- ngIf: toogleActionVM.useMultiSelect -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useMultiSelect">
                                                <label class="form-label control-label ng-binding">Chọn nhiều hàng
                                                    hóa</label>
                                                <div class="form-wrap"><span class="toogle" id="toggleDefaultMultiSelect"
                                                        ng-click="toogleActionVM.toggleMultiSelect()"
                                                        ng-class="{active: toogleActionVM.multiSelect}"></span></div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useMultiSelect --><!-- ngIf: toogleActionVM.useDiscount -->
                                            <div class="form-group mb20 ng-scope" ng-if="toogleActionVM.useDiscount">
                                                <label class="form-label control-label ng-binding">Giảm giá <a
                                                        href="javascript:void(0)" tabindex="0"
                                                        class="help icon icon-custom" kv-tooltip=""
                                                        data-toggle="tooltip" data-placement="right" data-html="true"
                                                        data-original-title="Chọn mặc định giảm giá theo VND hoặc %"><i
                                                            class="fas fa-info-circle"></i></a></label>
                                                <div class="form-wrap"><kv-toggle
                                                        ng-model="toogleActionVM.CommonDiscountType"
                                                        kv-on-change="toogleActionVM.commonDiscountTypeChanged"
                                                        kv-options="toogleActionVM.commonDiscountTypes"
                                                        class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><!-- ngRepeat: item in items track by $index --><a
                                                            href="" ng-repeat="item in items track by $index"
                                                            class="btn-toggle ng-binding ng-scope ng-isolate-scope active"
                                                            ng-class="{active:(selected==item)}" tabindex=""
                                                            ng-click="select(item)" ng-enter="select(item)"
                                                            kv-next-focus="">VND</a><!-- end ngRepeat: item in items track by $index --><a
                                                            href="" ng-repeat="item in items track by $index"
                                                            class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                            ng-class="{active:(selected==item)}" tabindex=""
                                                            ng-click="select(item)" ng-enter="select(item)"
                                                            kv-next-focus="">%</a><!-- end ngRepeat: item in items track by $index --></kv-toggle>
                                                </div>
                                            </div>
                                            <!-- end ngIf: toogleActionVM.useDiscount --><!-- ngIf: toogleActionVM.useProductArrangement -->
                                            <div class="form-group mb20 ng-scope"
                                                ng-if="toogleActionVM.useProductArrangement"><label
                                                    class="form-label control-label ng-binding">Sắp xếp thứ tự hàng
                                                    hóa</label>
                                                <div class="form-wrap"><kv-toggle ng-model="toogleActionVM.Arrangement"
                                                        kv-on-change="toogleActionVM.arrangementChanged"
                                                        kv-options="toogleActionVM.arrangementTypes" is-kv-sort="true"
                                                        class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><!-- ngRepeat: item in items track by $index --><a
                                                            href="" ng-repeat="item in items track by $index"
                                                            class="btn-toggle ng-scope ng-isolate-scope active"
                                                            ng-class="{active:(selected==item)}" tabindex=""
                                                            ng-click="select(item)" ng-enter="select(item)"
                                                            kv-next-focus="" value="up"><i
                                                                class="far fa-arrow-up"></i></a><!-- end ngRepeat: item in items track by $index --><a
                                                            href="" ng-repeat="item in items track by $index"
                                                            class="btn-toggle ng-scope ng-isolate-scope"
                                                            ng-class="{active:(selected==item)}" tabindex=""
                                                            ng-click="select(item)" ng-enter="select(item)"
                                                            kv-next-focus="" value="down"><i
                                                                class="far fa-arrow-down"></i></a><!-- end ngRepeat: item in items track by $index --></kv-toggle>
                                                </div>
                                            </div><!-- end ngIf: toogleActionVM.useProductArrangement -->
                                        </div>
                                    </div>
                                </kv-popup></kv-toogle-action-popover>
                        </div>
                    </div>
                    <div class="k-gridNone tbl purchaseorder-tbl tbl-custom-header">
                        <div class="kv2Left-content" style="">
                            <div kendo-grid="" options="cartGridoption" id="cartGridoption"
                                ng-class="cart.PurchaseOrderDetails.length == 0 || cartGridoption.dataSource.total()==0 &amp;&amp; cart.PurchaseOrderDetails.length? 'gridEmpty':''"
                                class="k-grid k-widget gridEmpty" data-role="grid" style="">
                                <div class="k-grid-header">
                                    <div class="k-grid-header-wrap k-auto-scrollable"style="overflow-x: auto;">
                                        <table role="grid">
                                            <thead role="rowgroup">
                                                <tr role="row">
                                                    <th class="k-hierarchy-cell k-header ng-scope" scope="col">&nbsp;
                                                    </th>

                                                    <th scope="col" role="columnheader" data-field="ViewIndex"
                                                        rowspan="1" data-title="STT" data-index="1"
                                                        id="d6354df3-e12f-4274-a625-ec397f882cf4"
                                                        class="cell-order txtC k-header ng-scope"
                                                        data-role="columnsorter"><a class="k-link" href="#">STT</a>
                                                    </th>
                                                    <th scope="col" role="columnheader" data-field="Image"
                                                        rowspan="1" data-title="Hình ảnh" data-index="2"
                                                        id="2ec79156-2e04-44b7-8894-358ea241c6f3"
                                                        class="tdImage k-header ng-scope"
                                                        style="display:none;display:none"></th>
                                                    <th scope="col" role="columnheader" data-field="Product.Code"
                                                        rowspan="1" data-title="Mã hàng" data-index="3"
                                                        id="636e5453-6714-4d54-8f51-db0300ccfe18"
                                                        class="cell-code k-header ng-scope" data-role="columnsorter"><a
                                                            class="k-link" href="#">Mã hàng</a></th>
                                                    <th scope="col" role="columnheader" data-field="Product.Name"
                                                        rowspan="1" data-title="Tên hàng" data-index="4"
                                                        id="86212efe-5f4e-4890-b45d-7ec137522432"
                                                        class="cell-auto k-header ng-scope" data-role="columnsorter"><a
                                                            class="k-link" href="#">Tên hàng</a></th>
                                                    <th scope="col" role="columnheader" data-field="Unit"
                                                        rowspan="1" data-title="ĐVT" data-index="5"
                                                        id="6e194e53-ea0f-419e-b7c1-aa93cc7ad477"
                                                        class="cell-dvt un-nowrap k-header ng-scope"
                                                        data-role="columnsorter"><a class="k-link" href="#">ĐVT</a>
                                                    </th>
                                                    <th scope="col" role="columnheader" data-field="OnHand"
                                                        rowspan="1" data-title="Tồn kho" data-index="6"
                                                        id="f6bb4be6-3517-4760-b86d-c0def19b270d"
                                                        class="cell-dvt un-nowrap txtR k-header ng-scope"
                                                        style="display:none;display:none" data-role="columnsorter"><a
                                                            class="k-link" href="#">Tồn kho</a></th>
                                                    <th scope="col" role="columnheader" data-field="Quantity"
                                                        rowspan="1" data-title="Số lượng" data-index="7"
                                                        id="6a6f757d-25a6-4b3a-949c-f431530e43b9"
                                                        class="cell-qty-numb txtR cell-header-qty k-header ng-scope"
                                                        data-role="columnsorter"><a class="k-link" href="#">Số
                                                            lượng</a></th>
                                                    <th scope="col" role="columnheader" data-field="Price"
                                                        rowspan="1" data-title="Đơn giá" data-index="8"
                                                        id="1f701d95-0342-43e3-b79e-535cff0ea911"
                                                        class="txtR cell-total k-header ng-scope"
                                                        data-role="columnsorter"><a class="k-link" href="#">Đơn
                                                            giá</a></th>

                                                    <th scope="col" role="columnheader" data-field="TotalValue"
                                                        rowspan="1" data-title="Thành tiền" data-index="10"
                                                        id="336a504d-88fe-4793-b6ec-eace81e06152"
                                                        class="cell-total txtR k-header ng-scope th-show"
                                                        data-role="columnsorter"><a class="k-link" href="#">Thành
                                                            tiền</a></th>
                                                    <th scope="col" role="columnheader" data-field="AddNewLineFld"
                                                        rowspan="1" data-title=" " data-index="11"
                                                        id="c5bcf5f3-c49e-4f24-ba90-22ca041ef308"
                                                        class="cell-adddel bg-none k-header ng-scope"
                                                        style="display:none;display:none" data-role="columnsorter"><a
                                                            class="k-link" href="#"> </a></th>
                                                    <th scope="col" role="columnheader" data-field="PriceBookFld"
                                                        rowspan="1" data-title=" " data-index="12"
                                                        id="ac0a7de6-9b22-4c6a-ab66-f6d288938f4f"
                                                        class="cell-addbook k-header ng-scope"
                                                        style="display:none;display:none" data-role="columnsorter"><a
                                                            class="k-link" href="#"> </a></th>
                                                </tr>
                                            </thead>
                                            <tbody id="add-product">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="k-grid-content k-auto-scrollable" style="overflow: hidden">
                                    {{-- <table role="treegrid" style="">
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
                                        </colgroup>
                                        <tbody role="rowgroup">
                                            <tr class="k-master-row ng-scope productMaster"
                                                data-uid="5639ffe3-98e5-4483-bf18-c07d30113ee3" role="row">
                                                <td class="k-hierarchy-cell"><a class="k-icon k-minus" href="#"
                                                        tabindex="-1"></a></td>
                                                <td class="txtC cell-del" role="gridcell"><a title="Xóa"
                                                        kv-focus-item="productSearchInput" tabindex="100"
                                                        ng-click="removeItem(dataItem)" ng-enter="removeItem(dataItem)"
                                                        class="btn-icon btn-icon-trash"
                                                        ng-show="dataItem.MasterProductId == null"><i
                                                            class="far fa-trash-alt"></i></a></td>
                                                <td class="cell-order txtC" role="gridcell"><span
                                                        ng-show="dataItem.MasterProductId == null"
                                                        class="ng-binding">1</span></td>
                                                <td class="tdImage" style="display:none;display:none" role="gridcell">
                                                    <div class="cell-img">
                                                        <div ng-style="{'background-image': 'url(' + (dataItem.Image ? dataItem.Image : 'https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png') + ')'}"
                                                            ng-mouseover="showImg($event)" ng-mouseleave="hideImg($event)"
                                                            class="img-thumb" data-code=""
                                                            style="background-image: url(&quot;https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png&quot;);">
                                                            <img ng-src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png"
                                                                src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product.png">
                                                        </div>
                                                        <div ng-show="dataItem.Image" class="img-preview ng-hide"><img
                                                                data-code=""></div>
                                                    </div>
                                                </td>
                                                <td class="cell-code"
                                                    title="Tồn: 92 - KH đặt: 0 
                                                "
                                                    role="gridcell"><a ng-show="dataItem.MasterProductId == null"
                                                        href="#/Products?Code=SP000001" target="_blank"
                                                        class="ng-binding">SP000001</a></td>
                                                <td class="cell-auto" role="gridcell"><span
                                                        ng-show="!dataItem.MasterProductId"
                                                        title="Tồn: 92 - KH đặt: 0">airpod</span><a
                                                        class="txtN txtI dpb fs11 txtGray " tabindex="100"
                                                        id="itmDescription1" kv-focus-item="iptNote"
                                                        href="javascript:void(0)" title="Cập nhật ghi chú"
                                                        kv-popup-anchor="desTemplate" kv-placement="bottom"
                                                        ng-click="setCurrentRow($event)"
                                                        ng-enter="setCurrentRow($event)"><span class="veaM ng-binding">Ghi
                                                            chú...<span class="icon edit"><i
                                                                    class="fa fa-pencil"></i></span></span></a></td>
                                                <td class="cell-dvt un-nowrap" role="gridcell"><span
                                                        ng-show="dataItem.MasterProductId == null"> <span
                                                            class="slcUnit slcUnit2 txtL ng-binding"></span> </span></td>
                                                <td class="cell-dvt un-nowrap txtR" style="display:none;display:none"
                                                    role="gridcell"><span ng-show="dataItem.MasterProductId == null"
                                                        class="ng-binding">92</span></td>
                                                <td class="cell-qty-numb txtR" role="gridcell">
                                                    <div class="qtyBox"><input
                                                            ng-disabled="dataItem.Product &amp;&amp; (dataItem.Product.IsLotSerialControl || (dataItem.Product.IsBatchExpireControl &amp;&amp; dataItem.ProductBatchExpireList &amp;&amp; dataItem.ProductBatchExpireList.length > 1))"
                                                            tabindex="100" type="text" kv-select-text=""
                                                            kv-select-text-quantity=""
                                                            kv-auto-numeric="{isQuantity:!(dataItem.Product.IsLotSerialControl || (dataItem.Product.IsBatchExpireControl &amp;&amp; dataItem.ProductBatchExpireList &amp;&amp; dataItem.ProductBatchExpireList.length > 1)), vMin:0, mDec:3, vMax: int.MaxValue,  isCheckEnter : true}"
                                                            id="row-qty-number-19171940"
                                                            class="isQuantity form-control form-control-sm ng-pristine ng-untouched ng-valid ng-not-empty"
                                                            ng-class="dataItem.Product &amp;&amp; (dataItem.Product.IsLotSerialControl || (dataItem.Product.IsBatchExpireControl &amp;&amp; dataItem.ProductBatchExpireList &amp;&amp; dataItem.ProductBatchExpireList.length > 1)) ? 'disable-input':''"
                                                            ng-change="UpdateItemCart(dataItem)"
                                                            ng-model="dataItem.Quantity"></div>
                                                    <div class="qtyBox2"><span
                                                            ng-show="FromOrderSupplier &amp;&amp; dataItem.OrderQuantity != null &amp;&amp; dataItem.OrderQuantity != 0"
                                                            class="ng-binding ng-hide">/</span></div>
                                                </td>
                                                <td class="txtR cell-total" role="gridcell"><input type="text"
                                                        tabindex="100" kv-select-text=""
                                                        kv-auto-numeric="{isProductPrice: true, vMin:0}"
                                                        ng-model="dataItem.Price"
                                                        ng-class="{txtRed :(dataItem.Price > dataItem.BasePrice)}"
                                                        class="txtR form-control form-control-sm purchase-order-price ng-pristine ng-untouched ng-valid ng-not-empty"
                                                        kv-tooltip="" data-toggle="tooltip" data-placement="bottom"
                                                        data-original-title="Cao hơn Giá bán khuyến mãi"
                                                        ng-change="ChangePrice(dataItem)"></td>
                                                <td class="txtR cell-total" role="gridcell">
                                                    <div class="proPrice posR"><button
                                                            class="txtR form-control form-control-sm ng-binding"
                                                            tabindex="100" id="itmDiscount1_"
                                                            kv-popup-anchor="productPrice" kv-placement="bottomright"
                                                            kv-focus-item="iptPrice" ng-click="setCurrentRow($event)"
                                                            ng-enter="setCurrentRow($event)">0</button></div>
                                                </td>
                                                <td class="cell-total txtR" role="gridcell">
                                                    <!-- ngIf: !toogleActionVM.toggleChangePriceEnabled -->
                                                    <!-- ngIf: toogleActionVM.toggleChangePriceEnabled -->
                                                    <div class="proPrice posR ng-scope"
                                                        ng-if="toogleActionVM.toggleChangePriceEnabled"><button
                                                            class="txtR form-control form-control-sm ng-binding"
                                                            tabindex="100" id="itmChangeprice1_"
                                                            kv-popup-anchor-price="productChangePrice"
                                                            kv-placement="bottomright" kv-focus-item="iptChangePrice"
                                                            ng-click="setCurrentRow($event)"
                                                            ng-enter="setCurrentRow($event)">50,000</button></div>
                                                    <!-- end ngIf: toogleActionVM.toggleChangePriceEnabled -->
                                                </td>
                                                <td class="cell-adddel" style="display:none;display:none"
                                                    role="gridcell"><a title="Thêm hàng hóa" tabindex="100"
                                                        ng-click="AddCartChild(dataItem)"
                                                        ng-enter="AddCartChild(dataItem)"
                                                        ng-show="toogleActionVM.toggleMultiLineEnabled &amp;&amp; (dataItem.subItems == null || dataItem.subItems.length < 19) "
                                                        class="btn-icon ng-hide" ng-focus="closePopping(true)"><i
                                                            class="far fa-plus"></i></a></td>
                                                <td class="cell-addbook" style="display:none;display:none"
                                                    role="gridcell"><a title="Thiết lập giá"
                                                        ng-show="toogleActionVM.toggleSetPriceBookEnabled &amp;&amp; dataItem.MasterProductId == null"
                                                        class="btn-icon  ng-hide" tabindex="100"
                                                        ng-click="addPricebook(dataItem)"
                                                        ng-enter="addPricebook(dataItem)" ng-focus="closePopping(true)"><i
                                                            class="fas fa-tag"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table> --}}

                                </div>
                                <div class="paging-box" style="display: none;">
                                    <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap" data-role="pager"><a
                                            href="#" title="Trang đầu"
                                            class="k-link k-pager-nav k-pager-first k-state-disabled" data-page="1"
                                            tabindex="-1"><span class="k-icon k-i-seek-w">Trang đầu</span></a><a
                                            href="#" title="Trang trước"
                                            class="k-link k-pager-nav  k-state-disabled" data-page="1"
                                            tabindex="-1"><span class="k-icon k-i-arrow-w">Trang trước</span></a>
                                        <ul class="k-pager-numbers k-reset">
                                            <li class="k-current-page"><span class="k-link k-pager-nav">0</span></li>
                                            <li><span class="k-state-selected">0</span></li>
                                        </ul><a href="#" title="Trang sau"
                                            class="k-link k-pager-nav  k-state-disabled" data-page="0"
                                            tabindex="-1"><span class="k-icon k-i-arrow-e">Trang sau</span></a><a
                                            href="#" title="Trang cuối"
                                            class="k-link k-pager-nav k-pager-last k-state-disabled" data-page="0"
                                            tabindex="-1"><span class="k-icon k-i-seek-e">Trang cuối</span></a><span
                                            class="k-pager-info k-label">No items to display</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <section class="kv2Right purchaseorder" ng-class="{'has-expired' : showExpireMessage.isActive }"
                    style="height: 854px;">
                    <article class="kv2Right-content">
                        <div class="kv2Box ng-scope" ng-controller="PurchaseOrderSupplierCtrl">
                            <div class="kv2BoxTop">
                                <div class="form-wrapper kv2Box-form-top">
                                    <div class="form-group">
                                        <div class="pull-left user-created"><span><i class="fa fa-user-circle-o"
                                                    title="Người nhập"></i></span><span title=""
                                                class="k-widget k-dropdown k-header form-control" unselectable="on"
                                                role="listbox" aria-haspopup="true" aria-expanded="false"
                                                tabindex="100000" aria-owns="user-drop-down_listbox"
                                                aria-disabled="false" aria-readonly="false" aria-busy="false"
                                                aria-activedescendant="30e4aadc-de88-4940-9afd-11c92ee9fbae"
                                                style=""><span unselectable="on"
                                                    class="k-dropdown-wrap k-state-default"><span unselectable="on"
                                                        class="k-input ng-scope"><span
                                                            class="ng-binding">admin</span></span><span unselectable="on"
                                                        class="k-select"><span unselectable="on"
                                                            class="k-icon k-i-arrow-s">select</span></span></span><select
                                                    kendo-drop-down-list="" k-options="buyerOptions"
                                                    k-filter="'contains'" k-rebind="buyerOptions" class="form-control"
                                                    id="user-drop-down" height="266" k-ng-model="cart.User"
                                                    data-role="dropdownlist" style="display: none;">
                                                    <option value="125057" selected="selected">admin</option>
                                                </select></span></div>
                                        <div class="pull-right"><span
                                                class="k-widget k-datetimepicker k-header form-control break-date-time"
                                                style=""><span class="k-picker-wrap k-state-default"><input
                                                        tabindex="100001" class="form-control break-date-time k-input"
                                                        kendo-date-time-picker="" placeholder="03/09/2023 19:39"
                                                        k-ng-model="cart.PurchaseDate" k-change="UpdatePurchaseDate"
                                                        k-format="'dd/MM/yyyy HH:mm'" k-time-format="'HH:mm'"
                                                        k-max="currentDate"
                                                        ng-disabled="disableDate || !IsUpdatePurchaseOrder"
                                                        data-role="datetimepicker" type="text" role="combobox"
                                                        aria-expanded="false" aria-disabled="false" aria-readonly="false"
                                                        style="width: 100%;"><span unselectable="on"
                                                        class="k-select"><span unselectable="on"
                                                            class="k-icon k-i-calendar" role="button">select</span><span
                                                            unselectable="on" class="k-icon k-i-clock"
                                                            role="button">select</span></span></span></span></div>
                                    </div>
                                    <div class="form-group">
                                        <!-- ngIf: FromOrderSupplier || cart.OrderSupplierCode|| ( !IsUpdatePayment && cart.Supplier) -->
                                        <section
                                            ng-show="!FromOrderSupplier &amp;&amp; !cart.OrderSupplierCode &amp;&amp; (IsUpdatePayment || !cart.Supplier)">
                                            <div class="autocompleteAdd">

                                                <div class="autocomplete " id="">
                                                    <select class="search-supplier" style="width: 100%">
                                                        <option selected="selected" value="">Chọn nhà cung cấp...
                                                        </option>
                                                    </select>

                                                </div>
                                                <a id="idAddSupplier" ng-show="allowAdd &amp;&amp; !cart.Supplier"
                                                    class="btn-icon" ng-enter="addSupplier()" ng-click="addSupplier()"
                                                    title="Thêm nhà cung cấp mới" tabindex="100003"><i
                                                        class="far fa-plus"></i>
                                                </a>
                                                <div class="autocomplete ng-hide" ng-show="cart.Supplier"><i
                                                        class="fa fa-user" aria-hidden="true"></i> <a
                                                        ng-show="!cart.Supplier.isDeleted" id="idEditSupplier"
                                                        ng-click="editSupplier()" ng-enter="editSupplier()"
                                                        class="name form-control ng-binding" tabindex="100002"> - </a>
                                                    <div class="supplierDel ng-binding ng-hide"
                                                        ng-show="cart.Supplier.isDeleted"></div>
                                                </div><a href="" id="idRemoveSupplier" ng-show="cart.Supplier"
                                                    class="btn-icon btn-icon-close ng-hide" ng-click="removeSupplier()"
                                                    ng-enter="removeSupplier()" title="Xóa" tabindex="100003"><i
                                                        class="fal fa-times"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                    <div ng-show="_p.has('SupplierAdjustment_Read') &amp;&amp; cart.Supplier &amp;&amp; cart.Supplier.Debt != null &amp;&amp; cart.Supplier.Debt != 0"
                                        class="form-group ng-hide"><label class="form-label control-label ng-binding">Nợ:
                                        </label></div>
                                    <div class="form-group"><label class="form-label control-label ng-binding">Mã phiếu
                                            nhập</label>
                                        <div class="form-wrap"><input name="code" tabindex="100004"
                                                ng-disabled="!IsUpdatePurchaseOrder" type="text" title=""
                                                ng-change="UpdateCart()" placeholder="Mã phiếu tự động"
                                                ng-model="cart.Code"
                                                class="form-control codeAuto ng-pristine ng-untouched ng-valid ng-empty"
                                                kv-valid-special-chars="Mã phiếu nhập"></div>
                                    </div>

                                    <div class="form-group mb10"><label class="form-label control-label ng-binding">Trạng
                                            thái</label>
                                        <div class="form-wrap form-control-static ng-binding" style="font-weight: 700">
                                            Phiếu nhập</div>
                                    </div>
                                </div>
                                <div class="form-wrapper kv3Pay">
                                    <div class="form-group"><label class="form-label control-label ng-binding">Tổng tiền
                                            hàng
                                            {{-- <span ng-show="settings.UseTotalQuantity"
                                                class="qty ng-binding">0</span> --}}
                                        </label>
                                        <div class="form-wrap form-control-static ng-binding sum-total"
                                            ng-show="viewPrice">0</div>
                                    </div>
                                    {{-- <div class="form-group" ng-show="viewPrice &amp;&amp; !isHideDiscount"><label
                                            class="form-label control-label ng-binding">Giảm giá</label>
                                        <div class="form-wrap"><a id="idDiscountOnOrder" tabindex="100005"
                                                kv-popup-anchor="discountOnOrder" kv-placement="left"
                                                kv-focus-item="iptDiscount" class="form-control ng-binding">0</a></div>
                                    </div> --}}
                                    {{-- <div class="form-group ng-hide" ng-show="viewPrice &amp;&amp; viewExpensesOther">
                                        <label class="form-label control-label ng-binding">Chi phí nhập trả NCC
                                            <!-- ngIf: cart.ExpensesOthersTitle.length > 1 --></label>
                                        <div class="form-wrap"><a href="" class="form-control iptPay ng-binding"
                                                tabindex="100009" ng-click="showExpensesOther(0)"
                                                ng-enter="showExpensesOther(0)" kv-placement="left">0</a></div>
                                    </div> --}}
                                    <div class="form-group ng-hide" ng-show="viewPrice &amp;&amp; cart.PaidAmount > 0">
                                        <label class="form-label control-label ng-binding">Đã trả nhà cung cấp</label>
                                        <div class="form-wrap"><input id="idPaidCustomer" type="text"
                                                tabindex="100010" kv-auto-numeric="{isCurrency: true}"
                                                ng-click="showPaidHistory()" ng-enter="showPaidHistory()"
                                                ng-model="cart.PaidAmount"
                                                class="payCustomer cursorpointer form-control ng-pristine ng-untouched ng-valid ng-not-empty"
                                                ng-readonly="true" ng-focus="closePopping(true)" readonly="readonly">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group ng-hide"
                                        ng-show="viewPrice &amp;&amp; cart.PaidAmount < cart.Total"><strong
                                            class="ng-binding">Cần trả nhà cung cấp</strong> <span
                                            class="txtCurr txtB flr payOrder ng-binding">0</span></div>
                                    <div class="form-group"
                                        ng-show="viewPrice &amp;&amp; cart.PaidAmount >= (cart.Total)"><strong
                                            class="ng-binding">Cần trả nhà cung cấp</strong> <span
                                            class="txtCurr txtB payOrder flr ng-binding">0</span></div> --}}
                                    <div class="form-group ng-hide"
                                        ng-show="viewPrice &amp;&amp; cart.PaidAmount > (cart.Total) &amp;&amp; cart.PaidAmount > 0">
                                        <label class="form-label control-label ng-binding">Hoàn lại tạm ứng</label>
                                        <div class="form-wrap"><input id="advCustomer" tabindex="100011"
                                                class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"
                                                type="text" kv-auto-numeric="{isCurrency: true}"
                                                ng-model="cart.DepositReturn"></div>
                                    </div>
                                    <div class="form-group ng-hide"
                                        ng-show="viewPrice &amp;&amp; cart.PaidAmount<cart.Total"><label
                                            ng-show="!cart.enablePaymentByMultiMethods"
                                            ng-hide="cart.enablePaymentByMultiMethods"
                                            class="form-label control-label cart-payment ng-binding">Tiền trả nhà cung cấp
                                            (F8)
                                            <!-- ngIf: cart.paymentMethod == 'Cash'|| cart.paymentMethod == null || cart.paymentMethod == '' --><span
                                                class="sub-label ng-binding ng-scope"
                                                ng-if="cart.paymentMethod == 'Cash'|| cart.paymentMethod == null || cart.paymentMethod == ''">Tiền
                                                mặt</span><!-- end ngIf: cart.paymentMethod == 'Cash'|| cart.paymentMethod == null || cart.paymentMethod == '' -->
                                            <!-- ngIf: cart.paymentMethod == 'Card' -->
                                            <!-- ngIf: cart.paymentMethod == 'Transfer' --> <a href="javascript:void(0)"
                                                tabindex="100010" id="multiPayIcon" ng-click="showMultiPaymentPopup()"
                                                ng-enter="showMultiPaymentPopup()" class="multiPayIcon"
                                                title="Nhà cung cấp thanh toán" ng-focus="closePopping(true)"><i
                                                    class="far fa-credit-card"></i></a></label> <label
                                            ng-show="cart.enablePaymentByMultiMethods"
                                            ng-hide="!cart.enablePaymentByMultiMethods"
                                            class="form-label control-label cart-payment ng-binding ng-hide">Tiền trả nhà
                                            cung cấp (F8)
                                            <!-- ngIf: !cart.paymentMethod || cart.paymentMethod == '' || cart.paymentMethod == 'Cash' --><span
                                                class="sub-label ng-binding ng-scope"
                                                ng-if="!cart.paymentMethod || cart.paymentMethod == '' || cart.paymentMethod == 'Cash'">Tiền
                                                mặt</span><!-- end ngIf: !cart.paymentMethod || cart.paymentMethod == '' || cart.paymentMethod == 'Cash' -->
                                            <!-- ngIf: cart.paymentMethod && cart.paymentMethod != '' && cart.paymentMethod != 'Cash' -->
                                            <a href="javascript:void(0)" tabindex="100010" id="multiPayIcon"
                                                ng-click="showMultiPaymentPopup()" ng-enter="showMultiPaymentPopup()"
                                                class="multiPayIcon" title="Nhà cung cấp thanh toán"
                                                ng-focus="closePopping(true)"><i
                                                    class="far fa-credit-card"></i></a></label>
                                        <div class="form-wrap"><input id="payGetCustomer" tabindex="100011"
                                                ng-disabled="!IsUpdatePayment || cart.disableSupplierMoney" type="text"
                                                kv-auto-numeric="{isCurrency: true}" ng-change="UpdateCart('outside')"
                                                ng-model="cart.PayingAmount"
                                                class="form-control payCustomer ng-pristine ng-untouched ng-valid ng-not-empty">
                                        </div>
                                    </div>
                                    <div class="form-group ng-hide"
                                        ng-show="viewPrice &amp;&amp; cart.PaidAmount<cart.Total"><label
                                            class="form-label control-label ng-binding">Tính vào công nợ</label>
                                        <div class="form-wrap form-control-static ng-binding">0</div>
                                    </div>
                                    <div class="form-group ng-hide" ng-show="viewPrice &amp;&amp; viewExpensesOther">
                                        <label class="form-label control-label ng-binding">Chi phí nhập khác
                                            <!-- ngIf: cart.ExpensesOthersRtpTitle.length > 1 --></label>
                                        <div class="form-wrap form-control-static"><a href=""
                                                class="cart-payment iptPay ng-binding" tabindex="100012"
                                                ng-click="showExpensesOther(1)" ng-enter="showExpensesOther(1)"
                                                kv-placement="left">0</a></div>
                                    </div><kv-popup id="expensesOthersTitle" class="ng-isolate-scope popupWrapper">
                                        <div class="kv2Pop pop popArrow" ng-transclude="">
                                            <div class="ng-binding ng-scope"></div>
                                        </div>
                                    </kv-popup><kv-popup id="expensesOthersRtpTitle"
                                        class="ng-isolate-scope popupWrapper">
                                        <div class="kv2Pop pop popArrow" ng-transclude="">
                                            <div class="ng-binding ng-scope"></div>
                                        </div>
                                    </kv-popup>
                                </div>
                            </div>
                            <div class="form-wrapper">
                                <div class="form-group wrap-note">
                                    <textarea tabindex="100013" id="purchaseOrderDes" placeholder="Ghi chú" ng-model="cart.Description"
                                        ng-change="UpdateCart()" kv-textarea=""
                                        class="txtDes form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" maxlength="2000"></textarea>
                                </div>
                            </div>
                        </div>
                    </article>
                    <div class="wrap-button">
                        <button tabindex="100016" onclick="submit(this)"
                            class="btn btn-success btn-font--medium ng-binding ng-isolate-scope"
                            kv-next-focus="productSearchInput"><i class="fas fa-check"></i>Hoàn thành</button>
                    </div>
                </section><kv-popup id="discountOrderHelp" class="ng-isolate-scope popupWrapper">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div data-notify="showtext" class="ng-scope"></div>
                    </div>
                </kv-popup><kv-popup id="discountOnOrder" focus-on-close="payGetCustomer"
                    class="ng-isolate-scope popupWrapper">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div class="ovh fr popCK form-custom form-wrapper form-labels-60 ng-scope"
                            ng-controller="DiscountCtrl">
                            <div class="form-group"><label class="form-label control-label ng-binding">Giảm giá</label>
                                <div class="form-wrap input-group"><input id="idDiscountValue" tabindex="100006"
                                        type="text" ng-model="DiscountValue"
                                        kv-auto-numeric="{&quot;vMin&quot;:0,&quot;isJumpOnEnter&quot;:false,&quot;isCurrency&quot;:true}"
                                        ng-change="discountOnOrderChanged()" kv-select-text=""
                                        class="iptDiscount form-control txtR ng-pristine ng-untouched ng-valid ng-not-empty"
                                        ng-enter="closePopping()">
                                    <div class="input-group-text"><kv-toggle begin-tabindex="100008"
                                            ng-model="DiscountType" kv-on-change="discountTypeChanged"
                                            kv-options="discountTypes"
                                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><!-- ngRepeat: item in items track by $index --><a
                                                href="" ng-repeat="item in items track by $index"
                                                class="btn-toggle ng-binding ng-scope ng-isolate-scope active"
                                                ng-class="{active:(selected==item)}" tabindex="100008"
                                                ng-click="select(item)" ng-enter="select(item)"
                                                kv-next-focus="">VND</a><!-- end ngRepeat: item in items track by $index --><a
                                                href="" ng-repeat="item in items track by $index"
                                                class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                ng-class="{active:(selected==item)}" tabindex="100008"
                                                ng-click="select(item)" ng-enter="select(item)"
                                                kv-next-focus="">%</a><!-- end ngRepeat: item in items track by $index --></kv-toggle>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </kv-popup>
                <div style="display:none"><kv-purchaseorder-pricebook-form form-name="purchaseOrderPricebookPopup"
                        class="ng-isolate-scope"></kv-purchaseorder-pricebook-form><kv-add-batchexpire-popup
                        form-name="addbatchExpirePopup" kv-on-discard="focusProductSearch"
                        class="ng-isolate-scope"></kv-add-batchexpire-popup><kv-category-form form-name="categoryForm"
                        class="ng-isolate-scope">
                    </kv-category-form>
                </div>
                <div ng-controller="formPopupCtrl" class="ng-scope"></div><kv-popup id="desTemplate"
                    class="desPop ng-isolate-scope popupWrapper" focus-on-close="row-qty-number-">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div ng-controller="DesCtrl" class="fr ng-scope">
                            <textarea ng-model="currentRow.Description" tabindex="" kv-next-focus="row-qty-number-"
                                ng-change="UpdateItemCart(currentRow)"
                                class="w100 iptNote ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" rows="5" kv-textarea=""
                                placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                </kv-popup><kv-popup id="productPrice" focus-on-close="row-qty-number-"
                    class="ng-isolate-scope popupWrapper">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div ng-controller="DesCtrl" data-notify="onPoppingOut" class="fr ng-scope">
                            <div class="ovh popCK form-wrapper form-labels-60">
                                <div class="form-group"><label class="form-label control-label ng-binding">Giảm
                                        giá</label>
                                    <div class="form-wrap input-group"><input type="text" ng-model="DiscountValue"
                                            tabindex="" ng-change="discountOnItemChanged()"
                                            kv-auto-numeric="{&quot;mDec&quot;:2,&quot;vMin&quot;:0}" id="priceInput"
                                            class="form-control txtR iptPrice ng-pristine ng-untouched ng-valid ng-empty"
                                            ng-enter="closePoping()">
                                        <div class="input-group-text"><kv-toggle ng-model="DiscountType"
                                                begin-tabindex="" focus-cycle="priceInput"
                                                kv-on-change="discountTypeChanged" kv-options="discountTypes"
                                                class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><!-- ngRepeat: item in items track by $index --><a
                                                    href="" ng-repeat="item in items track by $index"
                                                    class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                    ng-class="{active:(selected==item)}" tabindex=""
                                                    ng-click="select(item)" ng-enter="select(item)"
                                                    kv-next-focus="">VND</a><!-- end ngRepeat: item in items track by $index --><a
                                                    href="" ng-repeat="item in items track by $index"
                                                    class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                    ng-class="{active:(selected==item)}" tabindex=""
                                                    ng-click="select(item)" ng-enter="select(item)"
                                                    kv-next-focus="priceInput">%</a><!-- end ngRepeat: item in items track by $index --></kv-toggle>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </kv-popup><kv-popup-price id="productChangePrice" focus-on-close="row-qty-number-"
                    callback-on-close="closePopupChangePrice(dataItem)" class="ng-isolate-scope popupWrapper">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div ng-controller="ChangePriceCtrl" data-notify="onPoppingOut" class="fr ng-scope">
                            <div class="ovh popCK form-wrapper form-labels-110">
                                <div class="form-group"><label class="form-label control-label ng-binding"
                                        style="width: 200px;">Thành tiền cũ</label>
                                    <div class="form-wrap form-control-static text-right ng-binding"></div>
                                </div>
                                <div class="form-group"><label class="form-label control-label ng-binding">Giảm</label>
                                    <div class="form-wrap input-group"><input type="text" ng-model="DiscountValue"
                                            tabindex="" ng-change="discountOnItemChanged()"
                                            kv-auto-numeric="{&quot;mDec&quot;:2,&quot;vMin&quot;:0}" id="priceInput"
                                            class="form-control form-control-sm txtR iptPrice ng-pristine ng-untouched ng-valid ng-empty"
                                            ng-enter="closePopingChangePrice()">
                                        <div class="input-group-text"><kv-toggle ng-model="DiscountType"
                                                begin-tabindex="" focus-cycle="priceInput"
                                                kv-on-change="discountTypeChanged" kv-options="discountTypes"
                                                class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><!-- ngRepeat: item in items track by $index --><a
                                                    href="" ng-repeat="item in items track by $index"
                                                    class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                    ng-class="{active:(selected==item)}" tabindex=""
                                                    ng-click="select(item)" ng-enter="select(item)"
                                                    kv-next-focus="">VND</a><!-- end ngRepeat: item in items track by $index --><a
                                                    href="" ng-repeat="item in items track by $index"
                                                    class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                    ng-class="{active:(selected==item)}" tabindex=""
                                                    ng-click="select(item)" ng-enter="select(item)"
                                                    kv-next-focus="priceInput">%</a><!-- end ngRepeat: item in items track by $index --></kv-toggle>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="form-label control-label ng-binding">Thành tiền
                                        mới</label>
                                    <div class="form-wrap input-group"><input type="text" ng-model="TotalValue"
                                            tabindex="" ng-change="totalValueOnItemChanged()"
                                            kv-auto-numeric="{isJumpOnEnter : false, isCurrency: true}"
                                            id="priceInputTotalValue"
                                            class="form-control form-control-sm txtR iptPrice ng-pristine ng-untouched ng-valid ng-empty"
                                            ng-enter="closePopingChangePrice()"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </kv-popup-price>
                <div ng-controller="PurchaseOrderPaidHistoryCtrl" class="ng-scope"></div>
                <div ng-controller="SupplierMultiPaymentPopupCtrl" class="ng-scope"></div>
                <div ng-controller="SupplierPaymentByMultiMethodsPopupCtrl" class="ng-scope"></div>
            </div>

            <div ng-controller="ExpensesOtherPopupCtrl" class="k-window-custom ng-scope"><kv-popup id="changeExValue"
                    focus-on-close="idExpensesOther" class="ng-isolate-scope popupWrapper">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div data-notify="onPoppingOut" class="fr ng-scope">
                            <div class="ovh popCK form-custom form-wrapper form-labels-80">
                                <div class="form-group"><label class="form-label control-label ng-binding">Mức chi
                                        mới</label>
                                    <div class="form-wrap input-group"><input type="text"
                                            ng-model="formData.ExValueRaw"
                                            kv-auto-numeric="{&quot;mDec&quot;:2,&quot;vMin&quot;:0}"
                                            ng-change="expensesOtherValueChanged()"
                                            class="iptPrice txtR form-control ng-pristine ng-untouched ng-valid ng-empty">
                                        <div class="input-group-text"><kv-toggle
                                                ng-model="formData.ExpensesOtherValueType"
                                                kv-on-change="expensesOtherTypeChanged" kv-options="expensesOtherTypes"
                                                class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><!-- ngRepeat: item in items track by $index --><a
                                                    href="" ng-repeat="item in items track by $index"
                                                    class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                    ng-class="{active:(selected==item)}" tabindex=""
                                                    ng-click="select(item)" ng-enter="select(item)"
                                                    kv-next-focus="">VND</a><!-- end ngRepeat: item in items track by $index --><a
                                                    href="" ng-repeat="item in items track by $index"
                                                    class="btn-toggle ng-binding ng-scope ng-isolate-scope"
                                                    ng-class="{active:(selected==item)}" tabindex=""
                                                    ng-click="select(item)" ng-enter="select(item)"
                                                    kv-next-focus="">%</a><!-- end ngRepeat: item in items track by $index --></kv-toggle>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </kv-popup></div>

        </section>
    </section>







    <div class="click-modal k-widget k-window k-window-poup k-window-supplieriorder kv-window k-window-customer-info"
        data-role="draggable"
        style="display: none;padding-top: 62px; min-width: 90px; min-height: 50px; width: 100%;  top: 260px; left: 48.5px; position: fixed; touch-action: pan-y; z-index: 10005; transform: scale(1); opacity: 1;">
        <div class="k-window-titlebar k-header" style="margin-top: -62px;">&nbsp;<span class="k-window-title">Thêm nhà
                cung cấp</span>
            <div class="k-window-actions"><a role="button" href="javascript:void(0)"
                    class="k-window-action k-link"><span role="presentation" class="k-icon k-i-close">Close</span></a>
            </div>
        </div>
        <div kendo-window="supplierWindow" k-visible="false" k-resizable="false" k-draggable="true" k-pinned="true"
            k-width="780" k-modal="true" k-on-deactivate="focusEditSupplier()" data-role="window"
            class="k-window-content k-content" style="display: block;" tabindex="0"><kv-supplier-form
                form-name="supplierForm" kv-width="780" class="ng-isolate-scope">
                <form name="formInsert" id="supplier-info" class="ng-pristine ng-valid ng-valid-maxlength">
                    <!-- ngIf: isShowDebt && supplier.Id && canViewDebt --><!-- ngIf: !isShowDebt || !supplier.Id || !canViewDebt -->
                    <section ng-if="!isShowDebt || !supplier.Id || !canViewDebt" class="ng-scope">
                        <div class="form-wrapper">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group"><label class="form-label control-label ng-binding">Mã nhà
                                            cung cấp</label>
                                        <div class="form-wrap"><input type="text" name="code"
                                                class="form-control formInsert  iptFocus ng-pristine ng-valid ng-empty ng-touched"
                                                ng-model="supplier.Code" placeholder="Mã mặc định"></div>
                                    </div>
                                    <div class="form-group"><label class="form-label control-label ng-binding">Tên nhà
                                            cung cấp <span style="color: red">*</span></label>
                                        <div class="form-wrap"><input name="name" type="text"
                                                class="form-control formInsert ng-pristine ng-untouched ng-valid ng-empty"
                                                ng-model="supplier.Name"></div>
                                    </div>
                                    <div class="form-group"><label class="form-label control-label ng-binding">Điện
                                            thoại</label>
                                        <div class="form-wrap"><input name="sdt"
                                                onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                type="text"
                                                class="form-control formInsert ng-pristine ng-untouched ng-valid ng-empty"
                                                ng-model="supplier.Phone" ng-trim="false"></div>
                                    </div>
                                    <div class="form-group"><label class="form-label control-label ng-binding">Địa
                                            chỉ</label>
                                        <div class="form-wrap">
                                            <textarea type="text" name="address"
                                                class="form-control formInsert ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                ng-model="supplier.Address" maxlength="255"></textarea>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="kv-window-footer">
                                <a id="insert-click" class="btn btn-success ng-binding ng-scope">
                                    <i class="fas fa-save"></i>Lưu</a>
                                <a class="btn btn-default ng-binding" onclick="closePopupSupplier()"><i
                                        class="far fa-ban"></i>Bỏ qua</a>
                            </div>
                    </section><!-- end ngIf: !isShowDebt || !supplier.Id || !canViewDebt -->
                </form>
            </kv-supplier-form>
        </div>
    </div>

    <script type="text/javascript" class="ng-scope">
        getSupplier()
        getProducts()
        $('b[role="presentation"]').hide();


        $(document).on("click", "#idAddSupplier", function() {
            $(".k-overlay,.click-modal").css('display', 'block')
        })

        // 
        function getSupplier() {
            let html = `<option selected="selected" value="">Chọn nhà cung cấp...</option>`;
            $.ajax({
                url: "/api/supplier",
                type: "get",
                success: function(response) {
                    let data = response.data
                    if (data) {
                        data.map(function(val, key) {
                            html += `<option value="${val.id}">${val.name}</option>`
                        })
                        $('.search-supplier').html(html)
                        $('.search-supplier').select2();
                    }

                }
            });
        }

        function getProducts() {
            let html = ``;
            $.ajax({
                url: "/api/product",
                type: "get",
                success: function(response) {
                    let data = response.data
                    if (data) {
                        data.map(function(val, key) {
                            html += `<option code="${val.code}" value="${val.id}">${val.name}</option>`
                        })
                        $('.search-product').html(html)
                        $('.search-product').select2({
                            closeOnSelect: false,
                            placeholder: "Chọn sản phảm",
                        });
                    }

                }
            });
        }
        $(document).on('change', '.search-product', function() {
            let html = ""
            let list = $(this).select2('data')

            list.map(function(val, key) {
                let stt = key + 1
                let code = val.element.getAttribute('code')
                html += `
                            <tr class="k-master-row ng-scope productMaster" data-id="${val.id}"
                                                    data-uid="5639ffe3-98e5-4483-bf18-c07d30113ee3" role="row">
                                                    <td class="k-hierarchy-cell"><a class="k-icon k-minus" href="#"
                                                            tabindex="-1"></a></td>
                                              
                                                    <td class="cell-order txtC" role="gridcell"><span
                                                            ng-show="dataItem.MasterProductId == null"
                                                            class="ng-binding">${stt}</span></td>
                                                
                                                    <td class="cell-code"
                                                        title="Tồn: 92 - KH đặt: 0 
                                                    "
                                                        role="gridcell"><a ng-show="dataItem.MasterProductId == null"
                                                            href="#/Products?Code=SP000001" target="_blank"
                                                            class="ng-binding">${code}</a></td>
                                                    <td class="cell-auto" role="gridcell"><span
                                                            ng-show="!dataItem.MasterProductId"
                                                            title="Tồn: 92 - KH đặt: 0">${val.text}</span><a
                                                            class="txtN txtI dpb fs11 txtGray " tabindex="100"
                                                            id="itmDescription1" kv-focus-item="iptNote"
                                                            href="javascript:void(0)" title="Cập nhật ghi chú"
                                                            kv-popup-anchor="desTemplate" kv-placement="bottom"
                                                            ng-click="setCurrentRow($event)"
                                                            ng-enter="setCurrentRow($event)"></a></td>
                                                    <td class="cell-dvt un-nowrap" role="gridcell"><span
                                                            ng-show="dataItem.MasterProductId == null"> Cái <span
                                                                class="slcUnit slcUnit2 txtL ng-binding"></span> </span>
                                                    </td>
                                                  
                                                    <td class="cell-qty-numb txtR" role="gridcell">
                                                        <div class="qtyBox">
                                                            <input
                                                                tabindex="100" type="text" kv-select-text=""
                                                                class="quantity form-control form-control-sm ng-pristine ng-untouched ng-valid ng-not-empty" onchange="ChangePrice(this)"></div>
                                                        <div class="qtyBox2"><span
                                                                ng-show="FromOrderSupplier &amp;&amp; dataItem.OrderQuantity != null &amp;&amp; dataItem.OrderQuantity != 0"
                                                                class="ng-binding ng-hide">/</span></div>
                                                    </td>
                                                    <td class="txtR cell-total" role="gridcell"><input data-type='currency' type="text"
                                                            tabindex="100" 
                                                            class="txtR price-sell  form-control form-control-sm purchase-order-price ng-pristine ng-untouched ng-valid ng-not-empty"
                                                            kv-tooltip="" data-toggle="tooltip" data-placement="bottom"
                                                            data-original-title="Cao hơn Giá bán khuyến mãi"
                                                            onchange="ChangePrice(this)"></td>
                                               
                                                    <td class="cell-total txtR" role="gridcell">
                                                     
                                                        <div class="proPrice posR ng-scope"
                                                            ng-if="toogleActionVM.toggleChangePriceEnabled"><button
                                                                class="txtR total form-control form-control-sm ng-binding"
                                                                tabindex="100" >0</button></div>
                                                    </td>
                                                    <td class="cell-adddel" style="display:none;display:none"
                                                        role="gridcell"><a title="Thêm hàng hóa" tabindex="100"
                                                            ng-click="AddCartChild(dataItem)"
                                                            ng-enter="AddCartChild(dataItem)"
                                                            ng-show="toogleActionVM.toggleMultiLineEnabled &amp;&amp; (dataItem.subItems == null || dataItem.subItems.length < 19) "
                                                            class="btn-icon ng-hide" ng-focus="closePopping(true)"><i
                                                                class="far fa-plus"></i></a></td>
                                                    <td class="cell-addbook" style="display:none;display:none"
                                                        role="gridcell"><a title="Thiết lập giá"
                                                            ng-show="toogleActionVM.toggleSetPriceBookEnabled &amp;&amp; dataItem.MasterProductId == null"
                                                            class="btn-icon  ng-hide" tabindex="100"
                                                            ng-click="addPricebook(dataItem)"
                                                            ng-enter="addPricebook(dataItem)"
                                                            ng-focus="closePopping(true)"><i class="fas fa-tag"></i></a>
                                                    </td>
                                                </tr>
                            
                            
                            `
            })
            $('#add-product').html(html)
        })

        function ChangePrice(_this) {
            let elem = $(_this)

            let tr = elem.closest('tr')
            let quantity = tr.find('.quantity').val()
            let price = tr.find('.price-sell').val()
            let priceFormat = 0
            if (price != "") {
                priceFormat = price.replace('$', '')
                priceFormat = priceFormat.replaceAll(',', '')
            }
            let total = priceFormat * quantity

            tr.find('.total').html(formatCurrency(total))
            let sumTotal = 0

            $(".total").map(function(key, elm) {
                let total = elm.innerHTML
                let temp = 0
                if (total != "") {
                    temp = total.replace('$', '')
                    temp = temp.replaceAll(',', '')
                }

                sumTotal = Number(sumTotal) + Number(temp)
            })
            console.log(sumTotal);
            $(".sum-total").html(formatCurrency(sumTotal))
            // sum-total
        }
        $(document).on("click", "#insert-click", function() {
            let values = $("form[name='formInsert']").serialize()
            let _this = this
            BtnLoading(_this)

            $.ajax({
                url: "/api/supplier",
                type: "post",
                data: values,
                success: function(response) {
                    BtnReset(_this)
                    toastr.success(response.message)
                    getSupplier()

                    closePopupSupplier()

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    BtnReset(_this)
                    toastr.error(jqXHR.responseJSON.message)

                }
            });

        })

        function submit(_this) {
            BtnLoading(_this)

            let supplier = $('.search-supplier').val()
            let code = $('input[name="code"]').val()
            let des = $("#purchaseOrderDes").val()
            let sum = $(".sum-total").html()
            let listProduct = []
            $(".productMaster").map(function(key, elm) {
                let id = $(elm).data('id')
                let quantity = $(elm).find('.quantity').val()
                let priceSell = $(elm).find('.price-sell').val()
                let temp = {
                    'id': id,
                    'quantity': quantity,
                    'priceSell': priceSell,
                }
                listProduct.push(temp)
            })
            $.ajax({
                url: "/api/coupon",
                type: "post",
                data: {
                    'supplier_id': supplier,
                    'code': code,
                    'name': des,
                    'sum': sum,
                    'listProduct': JSON.stringify(listProduct),
                },
                success: function(response) {
                    BtnReset(_this)
                    toastr.success(response.message)
                    document.location="/wavehouse"
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    BtnReset(_this)
                    toastr.error(jqXHR.responseJSON.message)

                }
            });
        }
    </script>
@endsection
