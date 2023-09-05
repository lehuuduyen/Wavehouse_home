@extends('main', ['pageTitle' => 'Danh mục sản phẩm'])
@section('content')
    <!-- ngIf: $root.isAuthenticated === true -->
    <section class="container main_wrapper kma-wrapper ng-scope" ng-if="$root.isAuthenticated === true">
        <!-- ngView:  -->
        <section class="clb main main-content ng-scope" ng-view="">
            <section class="mainLeft ng-scope">
                <h1 class="heading-page"><span class="ng-binding">Phiếu nhập hàng</span></h1><kv-order-filter>
                    <div id="kVCWidgetPurchaseOrder" ng-show="isShowKVCWidgetPurchaseOrder" class="" data-v-app="">
                        <!----></div>
                    <article class="boxLeft ng-hide" ng-show="isShowKfinTouch">
                        <h3 class="leftTitle"><img src="https://logo.kiotviet.vn/Kiotviet-Finance-Logo-Horizontal.svg"
                                height="24" alt=""> <a class="showhideicon" ng-click="hideKfinTouch()"><i
                                    class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showKfinTouch">
                            <div id="kfin-touch-point-order-chart"></div>
                        </aside>
                    </article>
                    <article class="boxLeft uln sortBranch branchLeft ng-hide" ng-show="branches.Data.length>1">
                        <h3 class="leftTitle ng-binding">Chi nhánh <a class="showhideicon"
                                ng-click="showOrderBranch = !showOrderBranch"><i class="fa fa-chevron-circle-up"></i></a>
                        </h3>
                        <aside class="boxLeftC" ng-hide="showOrderBranch">
                            <div class="form-group">
                                <div class="k-widget k-multiselect k-header form-control" unselectable="on" title=""
                                    style="">
                                    <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                        <ul role="listbox" unselectable="on" class="k-reset" id="sortBranch_taglist">
                                            <li class="k-button ng-scope" unselectable="on"><span unselectable="on">Chi
                                                    nhánh trung tâm</span><span unselectable="on" class="k-select"><span
                                                        unselectable="on" class="k-icon k-i-close">delete</span></span></li>
                                        </ul><input class="k-input" style="width: 25px;" accesskey="" autocomplete="off"
                                            role="listbox" aria-expanded="false" tabindex="0"
                                            aria-owns="sortBranch_taglist sortBranch_listbox" aria-disabled="false"
                                            aria-readonly="false" aria-busy="false"
                                            aria-activedescendant="4a71a404-86e3-4490-a41e-a67a3ed8862b"><span
                                            class="k-icon k-loading k-loading-hidden"></span>
                                    </div><select k-data-source="branches.Data" auto-close="false" k-filter="'contains'"
                                        class="form-control" data-placeholder="_l.lblBranchFilterHolder"
                                        k-data-text-field="'Name'" k-data-value-field="'Id'" k-on-change="filterbyBranch()"
                                        k-ng-model="branchids" id="sortBranch" k-value-primitive="true"
                                        kendo-multi-select="" data-role="multiselect" multiple="multiple"
                                        aria-disabled="false" aria-readonly="false" style="display: none;">
                                        <option value="61820" selected="selected">Chi nhánh trung tâm</option>
                                    </select><span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;"></span>
                                </div>
                            </div>
                        </aside>
                    </article>
                 
                    <article class="boxLeft uln sortDeliveryPartner ng-hide" ng-show="userList.length > 1">
                        <h3 class="leftTitle ng-binding">Người tạo<a class="showhideicon"
                                ng-click="showCreatedBy = !showCreatedBy"><i class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showCreatedBy">
                            <div class="form-group">
                                <div class="k-widget k-multiselect k-header form-control" unselectable="on"
                                    title="" style="">
                                    <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                        <ul role="listbox" unselectable="on" class="k-reset"
                                            id="sortUserCreate_taglist"></ul><input class="k-input k-readonly"
                                            style="width: 116px;" accesskey="" autocomplete="off" role="listbox"
                                            aria-expanded="false" tabindex="0"
                                            aria-owns="sortUserCreate_taglist sortUserCreate_listbox"
                                            aria-disabled="false" aria-readonly="false" aria-busy="false"
                                            aria-activedescendant="91cabd89-00db-4239-ad00-9c4b02f89bd6"><span
                                            class="k-icon k-loading k-loading-hidden"></span>
                                    </div><select k-data-source="userList" data-placeholder="_l.lblCreatedByFilterHolder"
                                        k-data-text-field="'GivenName'" k-data-value-field="'Id'"
                                        k-ng-model="userCreateIds" class="form-control" k-filter="'contains'"
                                        k-value-primitive="true" k-on-change="userFilterUpdated()" id="sortUserCreate"
                                        auto-close="false" kendo-multi-select="" data-role="multiselect"
                                        multiple="multiple" aria-disabled="false" aria-readonly="false"
                                        style="display: none;">
                                        <option value="125057">admin</option>
                                    </select><span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;">Chọn
                                        người tạo</span>
                                </div>
                            </div>
                        </aside>
                    </article>
                    <article class="boxLeft uln sortDeliveryPartner ng-hide"
                        ng-show="!isPurchaseOrder &amp;&amp; userList.length > 1">
                        <h3 class="leftTitle ng-binding">Người nhận đặt<a class="showhideicon"
                                ng-click="showEmployeeOrder = !showEmployeeOrder"><i
                                    class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showEmployeeOrder">
                            <div class="form-group">
                                <div class="k-widget k-multiselect k-header form-control" unselectable="on"
                                    title="" style="">
                                    <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                        <ul role="listbox" unselectable="on" class="k-reset"
                                            id="sortUserCreate_taglist"></ul><input class="k-input k-readonly"
                                            style="width: 148px;" accesskey="" autocomplete="off" role="listbox"
                                            aria-expanded="false" tabindex="0"
                                            aria-owns="sortUserCreate_taglist sortUserCreate_listbox"
                                            aria-disabled="false" aria-readonly="false" aria-busy="false"
                                            aria-activedescendant="be8976a8-64aa-4dd2-b784-5f7893ac245c"><span
                                            class="k-icon k-loading k-loading-hidden"></span>
                                    </div><select k-data-source="userList" data-placeholder="_l.choose_employeeOrder"
                                        k-data-text-field="'GivenName'" k-data-value-field="'Id'"
                                        k-ng-model="userEmployeeOrderIds" class="form-control" k-filter="'contains'"
                                        k-value-primitive="true" k-on-change="userEmployeeOrderFilterUpdated()"
                                        id="sortUserCreate" auto-close="false" kendo-multi-select=""
                                        data-role="multiselect" multiple="multiple" aria-disabled="false"
                                        aria-readonly="false" style="display: none;">
                                        <option value="125057">admin</option>
                                    </select><span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;">Chọn
                                        người nhận đặt</span>
                                </div>
                            </div>
                        </aside>
                    </article>
                    <article class="boxLeft uln sortDeliveryPartner ng-hide"
                        ng-show="isPurchaseOrder &amp;&amp; userList.length > 1">
                        <h3 class="leftTitle ng-binding">Người nhập<a class="showhideicon"
                                ng-click="showEmployeeOrder = !showEmployeeOrder"><i
                                    class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showEmployeeOrder">
                            <div class="form-group">
                                <div class="k-widget k-multiselect k-header form-control" unselectable="on"
                                    title="" style="">
                                    <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                        <ul role="listbox" unselectable="on" class="k-reset"
                                            id="sortUserCreate_taglist"></ul><input class="k-input k-readonly"
                                            style="width: 127px;" accesskey="" autocomplete="off" role="listbox"
                                            aria-expanded="false" tabindex="0"
                                            aria-owns="sortUserCreate_taglist sortUserCreate_listbox"
                                            aria-disabled="false" aria-readonly="false" aria-busy="false"
                                            aria-activedescendant="13fed30d-ed46-4d10-bd59-11fe440b7ea3"><span
                                            class="k-icon k-loading k-loading-hidden"></span>
                                    </div><select k-data-source="userList" data-placeholder="_l.choose_purchaseOrder"
                                        k-data-text-field="'GivenName'" k-data-value-field="'Id'"
                                        k-ng-model="userPurchaseOrderIds" class="form-control" k-filter="'contains'"
                                        k-value-primitive="true" k-on-change="userPurchaseOrderFilterUpdated()"
                                        id="sortUserCreate" auto-close="false" kendo-multi-select=""
                                        data-role="multiselect" multiple="multiple" aria-disabled="false"
                                        aria-readonly="false" style="display: none;">
                                        <option value="125057">admin</option>
                                    </select><span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;">Chọn
                                        người nhập</span>
                                </div>
                            </div>
                        </aside>
                    </article>
                    <div ng-hide="isPurchaseOrder" class="ng-hide"><kv-sale-channel-filter
                            on-selected="filterbySaleChannel" is-purchase-order="isPurchaseOrder"
                            class="ng-isolate-scope">
                            <article class="boxLeft uln sortTime proGroup sortView posR">
                                <div ng-show="isHideButton" class="ng-hide">
                                    <h3 class="leftTitle ng-binding">Kênh bán</h3>
                                </div>
                                <div ng-show="!isHideButton">
                                    <h3 class="leftTitle ng-binding">Kênh bán <span class="left-group-btn"><a
                                                ng-click="EditSaleChannel()" href="javascript:void(0)"
                                                class="btn-icon" title="Thêm kênh bán" ng-hide="isHideButton"><i
                                                    class="far fa-plus-circle"></i></a> <a class="showhideicon"
                                                ng-click="showGroup = !showGroup"><i
                                                    class="fa fa-chevron-circle-up"></i></a></span></h3>
                                </div>
                                <aside class="boxLeftC" ng-hide="showGroup">
                                    <div class="form-group">
                                        <div class="k-widget k-multiselect k-header form-control ng-scope"
                                            unselectable="on" title="" style="">
                                            <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                                <ul role="listbox" unselectable="on" class="k-reset"
                                                    id="SaleChannel_taglist"></ul><input class="k-input k-readonly"
                                                    style="width: 113px;" accesskey="" autocomplete="off"
                                                    role="listbox" aria-expanded="false" tabindex="0"
                                                    aria-owns="SaleChannel_taglist SaleChannel_listbox"
                                                    aria-disabled="false" aria-readonly="false"
                                                    aria-activedescendant="1ef2b8a3-b644-4dba-ad3a-cb7c5efa4b62"
                                                    aria-busy="false"><span
                                                    class="k-icon k-loading k-loading-hidden"></span>
                                            </div><select k-data-source="salechannels.Data" k-filter="'contains'"
                                                data-placeholder="_l.sc_selectChannel" k-data-text-field="'Name'"
                                                k-data-value-field="'Id'" k-on-change="filterbySaleChannel()"
                                                k-ng-model="salechannelids" id="SaleChannel"
                                                class="form-control ng-scope" k-value-primitive="true"
                                                k-options="multiselectOption" kendo-multi-select="" auto-close="false"
                                                k-rebind="salechannels.Data" k-item-template="mutilSelectTemplate"
                                                data-role="multiselect" multiple="multiple" aria-disabled="false"
                                                aria-readonly="false" style="display: none;">
                                                <option value="0">Bán trực tiếp</option>
                                                <option value="65918">Khác</option>
                                            </select><span
                                                style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;">Chọn
                                                kênh bán</span>
                                        </div>
                                    </div>
                                </aside>
                            </article><kv-sale-channel-form form-name="saleChannelForm"
                                on-save-channel="onSaveChannelFormPopup"
                                class="ng-isolate-scope"></kv-sale-channel-form>
                        </kv-sale-channel-filter></div>
                    <article class="boxLeft uln sortDeliveryPartner ng-hide"
                        ng-show="settings.UseCod &amp;&amp; !notShowDeliveryFilter">
                        <h3 class="leftTitle ng-binding">Đối tác giao hàng<a class="showhideicon"
                                ng-click="showDeliveryPartner = !showDeliveryPartner"><i
                                    class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showDeliveryPartner">
                            <div class="form-group"><select k-data-source="deliveries"
                                    data-placeholder="_l.lblDeliveryFilterHolder" k-data-text-field="'Name'"
                                    k-data-value-field="'Id'" k-on-change="deliveryFilterUpdated()"
                                    k-ng-model="deliveryIds" class="form-control" k-filter="'contains'"
                                    k-options="deliveryOptions" auto-close="false" id="sortDeliveryPartner"
                                    kendo-multi-select=""></select></div>
                        </aside>
                    </article><!-- ngIf: expectedDeliveryFilter -->
                    <article class="boxLeft uln ng-hide" ng-show="!isPurchaseOrder &amp;&amp; settings.UseCod">
                        <h3 class="leftTitle ng-binding">Khu vực giao hàng<a class="showhideicon"
                                ng-click="showLocation = !showLocation"><i class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showLocation">
                            <div class="form-group"><select id="mulSelOrderLocation"
                                    data-placeholder="_l.lblLocationPlace" kendo-multi-select=""
                                    k-options="comboLocation" class="groupselect form-control"
                                    k-ng-model="LocationIds" k-on-change="filterByLocation()" auto-close="false"
                                    k-filter="'contains'"></select></div>
                        </aside>
                    </article>
                    <article class="boxLeft uln sortDeliveryPartner ng-hide" ng-hide="isPurchaseOrder">
                        <h3 class="leftTitle ng-binding">Phương thức<a class="showhideicon"
                                ng-click="showPaymentMethod = !showPaymentMethod"><i
                                    class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showPaymentMethod">
                            <div class="form-group">
                                <div class="k-widget k-multiselect k-header form-control" unselectable="on"
                                    title="" style="">
                                    <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                        <ul role="listbox" unselectable="on" class="k-reset"
                                            id="sortPaymentMethod_taglist"></ul><input class="k-input k-readonly"
                                            style="width: 211px;" accesskey="" autocomplete="off" role="listbox"
                                            aria-expanded="false" tabindex="0"
                                            aria-owns="sortPaymentMethod_taglist sortPaymentMethod_listbox"
                                            aria-disabled="false" aria-readonly="false" aria-busy="false"><span
                                            class="k-icon k-loading k-loading-hidden"></span>
                                    </div><select k-data-source="paymentMethods"
                                        data-placeholder="_l.lblPaymentMethodHolder" k-data-text-field="'Name'"
                                        k-data-value-field="'Key'" k-on-change="paymentMethodFilterUpdated()"
                                        k-ng-model="PaymentMethods" class="form-control" auto-close="false"
                                        id="sortPaymentMethod" kendo-multi-select="" data-role="multiselect"
                                        multiple="multiple" aria-disabled="false" aria-readonly="false"
                                        style="display: none;"></select><span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;">Chọn
                                        phương thức thanh toán...</span>
                                </div>
                            </div>
                        </aside>
                    </article>
                    <article class="boxLeft uln sortDeliveryPartner ng-hide"
                        ng-show="settings.ExpensesOther &amp;&amp; isPurchaseOrder &amp;&amp; viewPrice">
                        <h3 class="leftTitle ng-binding">Chi phí nhập trả NCC<a class="showhideicon"
                                ng-click="showExpensesOtherFilter = !showExpensesOtherFilter"><i
                                    class="fa fa-chevron-circle-up"></i></a></h3>
                        <aside class="boxLeftC" ng-hide="showExpensesOtherFilter">
                            <div class="form-group">
                                <div class="k-widget k-multiselect k-header form-control" unselectable="on"
                                    title="" style="">
                                    <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                        <ul role="listbox" unselectable="on" class="k-reset"
                                            id="multiExpensesOther_taglist"></ul><input class="k-input k-readonly"
                                            style="width: 216px;" accesskey="" autocomplete="off" role="listbox"
                                            aria-expanded="false" tabindex="0"
                                            aria-owns="multiExpensesOther_taglist multiExpensesOther_listbox"
                                            aria-disabled="false" aria-readonly="false" aria-busy="false"><span
                                            class="k-icon k-loading k-loading-hidden"></span>
                                    </div><select k-data-source="expensesOthers" k-data-text-field="'Name'"
                                        k-data-value-field="'Id'" k-on-change="filterbyExpensesOther()"
                                        k-ng-model="expensesOthersIds" class="form-control" k-filter="'contains'"
                                        data-placeholder="_l.purchaseOrder_ExpensesOtherLbl" auto-close="false"
                                        id="multiExpensesOther" kendo-multi-select="" data-role="multiselect"
                                        multiple="multiple" aria-disabled="false" aria-readonly="false"
                                        style="display: none;"></select><span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;">Chọn
                                        loại chi phí nhập trả NCC...</span>
                                </div>
                            </div>
                        </aside>
                    </article>
                 
                </kv-order-filter>
                <div class="wrap-button-footer"><button kv-mobile="" type="button" class="kv2Btn">Hoàn
                        tất</button></div>
            </section>
            <section class="mainRight ng-scope">
                <section class="mainWrap fll w100" ng-class="{ 'has-expire' : showExpireMessage.isActive === true}"
                    style="position: relative; top: auto; bottom: auto; width: auto;">
                    <article class="header-filter headerContent columnViewTwo">
                        <div class="header-filter-search"><kv-mobile-new on-click-call-back="refresh()"
                                class="ng-isolate-scope"><a href="javascript:void(0);"
                                    class="mobileIcon"></a></kv-mobile-new>
                            <div class="input-group"><input kv-filter-search="" ng-enter="quickSearch(true)"
                                    ng-change="changeQuickSearch()"
                                    class="form-control input-focus ng-pristine ng-untouched ng-valid ng-empty"
                                    type="text" ng-model="filterQuickSearch" placeholder="Theo mã phiếu nhập">
                                <div id="idDropdownSearch" class="input-group-append dropdown" uib-dropdown=""
                                    auto-close="disabled" is-open="isOpenDropdownSearch" kv-input-focus="">
                                    <!-- ngIf: filterQuickSearch && filterQuickSearch.length > 0 --> <button
                                        type="button" id="idDropdownBtnSearch" class="btn-icon dropdown-toggle"
                                        uib-dropdown-toggle="" aria-haspopup="true" aria-expanded="false"><i
                                            class="fas fa-caret-down"></i></button>
                                    <div id="idDropdownMenuSearch" class="dropdown-content dropdown-menu"
                                        uib-dropdown-menu="">
                                        <div class="form-group"><input ng-enter="quickSearch()"
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                type="text" ng-model="filterName" placeholder="Theo mã phiếu nhập">
                                        </div>
                                        <div class="form-group ng-hide"
                                            ng-show="isPurchaseOrder &amp;&amp; settings.UseOrderSupplier">
                                            <input ng-enter="quickSearch()"
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                type="text" ng-model="filterOrderSupplierCode"
                                                placeholder="Theo mã phiếu đặt hàng nhập ">
                                        </div>
                                        <aside ng-hide="showOrderSearch">
                                            <div class="form-group" ng-show="isSuggestProductForSearchPurchaseOrder">
                                                <kv-multi-select-search-product control-css-id="suggestProductSearch"
                                                    control-css-class="form-control kv-multi-select-search"
                                                    icon-remove-css-class="icon-remove-search-product"
                                                    filter-ids="filterProductIds" filter-keyword="filterProductKey"
                                                    filter-text="filterProductCodes" on-type="quickSearch()"
                                                    check-permission-onhand="true" id="purchaseOrderFilterMultiSelect"
                                                    class="ng-isolate-scope"><kv-multi-select-search
                                                        control-css-id="suggestProductSearch"
                                                        control-css-class="form-control kv-multi-select-search"
                                                        icon-remove-css-class="icon-remove-search-product"
                                                        input-placeholder="Theo mã, tên hàng"
                                                        option-data-text-field="Code" option-data-value-field="Id"
                                                        option-item-template="itemTemplate"
                                                        option-data-source="products" filter-ids="filterIds"
                                                        filter-keyword="filterKeyword" filter-text="filterText"
                                                        limit-filter-ids="10"
                                                        message-limit-filter-ids="Bạn chỉ được chọn tối đa 10 hàng hóa"
                                                        on-type="onType()" field-compare-get-first-by-enter="Code"
                                                        class="ng-isolate-scope">
                                                        <div class="k-widget k-multiselect k-header form-control kv-multi-select-search"
                                                            unselectable="on" title="" style="">
                                                            <div class="k-multiselect-wrap k-floatwrap"
                                                                unselectable="on">
                                                                <ul role="listbox" unselectable="on" class="k-reset"
                                                                    id="suggestProductSearch_taglist"></ul>
                                                                <input class="k-input k-readonly" style="width: 25px"
                                                                    accesskey="" autocomplete="off" role="listbox"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-owns="suggestProductSearch_taglist suggestProductSearch_listbox"
                                                                    aria-disabled="false" aria-readonly="false"
                                                                    placeholder="Theo mã, tên hàng"><span
                                                                    class="k-icon k-loading k-loading-hidden"></span>
                                                            </div><select id="suggestProductSearch"
                                                                class="form-control kv-multi-select-search"
                                                                data-role="multiselect" multiple="multiple"
                                                                aria-disabled="false" aria-readonly="false"
                                                                style="display: none;"></select><span
                                                                style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;"></span>
                                                        </div>
                                                    </kv-multi-select-search></kv-multi-select-search-product>
                                            </div>
                                            <div class="form-group ng-hide"
                                                ng-show="!isSuggestProductForSearchPurchaseOrder"><input
                                                    ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterProductCode"
                                                    placeholder="Theo mã hàng"></div>
                                            <div class="form-group ng-hide"
                                                ng-show="!isSuggestProductForSearchPurchaseOrder"><input
                                                    ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterProductName"
                                                    placeholder="Theo tên hàng"></div>
                                            <div class="form-group"
                                                ng-show="settings.UseImei &amp;&amp; isPurchaseOrder"><input
                                                    ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterSerial"
                                                    placeholder="Theo Serial/IMEI" kv-select-text=""></div>
                                            <div class="form-group ng-hide"
                                                ng-show="showInput &amp;&amp; settings.UseBatchExpire &amp;&amp; isPurchaseOrder">
                                                <input ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterBatchExpire"
                                                    placeholder="Theo lô, hạn sử dụng" kv-select-text="">
                                            </div>
                                            <div class="form-group"><input ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterCustomer"
                                                    placeholder="Theo mã, tên NCC" kv-select-text=""></div>
                                            <div class="form-group ng-hide" ng-show="showInput &amp;&amp; isOrder">
                                                <input ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterInvoiceCode"
                                                    placeholder="Theo mã hóa đơn" kv-select-text=""></div>
                                            <div class="form-group ng-hide"
                                                ng-show="showInput &amp;&amp; isOrder &amp;&amp; settings.UseCod">
                                                <input ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterDeliveryCode"
                                                    placeholder="Theo mã vận đơn">
                                            </div>
                                            <div class="form-group ng-hide" ng-show="showInput"><input
                                                    ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterDescription"
                                                    placeholder="Theo ghi chú"></div>
                                            <div class="form-group ng-hide" ng-show="showInput"><input
                                                    ng-enter="quickSearch()"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                    type="text" ng-model="filterDescriptionProduct"
                                                    placeholder="Theo ghi chú hàng hóa"></div>
                                        </aside>
                                        <div class="kv-window-footer"><a class="ng-binding"
                                                ng-hide="showPurchaseReturnSearch" href="javascript:void(0)"
                                                ng-click="showInput = !showInput">Mở rộng <i
                                                    class="far fa-arrow-down"></i></a> <button type="button"
                                                class="btn btn-success ng-binding" ng-click="quickSearch()"><i
                                                    class="far fa-search"></i>Tìm
                                                kiếm</button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="choosed-items ng-binding ng-hide" ng-show="selectedPurchaseOrder.length > 0">Đã
                                chọn 0 <a href="javascript:void(0);" ng-click="removeAllSelected()"
                                    class="btn-icon"><i class="fal fa-times"></i></a></div>
                        </div>
                        <aside class="header-filter-buttons"><!-- ngIf: selectedPurchaseOrder.length > 0 --><a
                                href="/wavehouse/create" title="Nhập hàng" ng-show="hasAdd"
                                class="btn btn-success"><i class="far fa-plus"></i><span
                                    class="text-btn ng-binding">Nhập hàng</span></a>
                      
                        </aside>
                    </article>
                    <article class="ovh clb k-gridNone purchaseorderList k-grid-Scroll">
                        <div id="grdPurchaseOrders" kendo-grid="" k-data-source="orders" k-sortable="true"
                            k-resizable="true"
                            k-pageable="{ &quot;pageSize&quot;: 10, &quot;refresh&quot;: false, &quot;pageSizes&quot;: false , buttonCount: 5,&quot;messages&quot;:{&quot;display&quot;:_l.pagerInfo + _l.purchaseOrder_paging, first:_l.paging_First, previous:_l.paging_Prev, next: _l.paging_Next, last: _l.paging_Last}}"
                            k-columns="gridcolumns" kv-grid-expan-row="" k-data-bound="grvInvoicesDataBound"
                            data-title="purchaseOrder_closeBookMessage" data-headerformat="{0}"
                            k-data-binding="grvdataBinding" k-detail-template="detailTemplate"
                            k-detail-init="grvDetailInit" k-detail-expand="grvDetailExpand" data-role="grid"
                            class="k-grid k-widget k-grid-noscroll" style="">
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
                                                <th scope="col" role="columnheader" data-field="Id"
                                                    rowspan="1" data-index="0"
                                                    id="08417bb4-19bc-45df-ab04-741faba12d52"
                                                    class="cell-check k-header ng-scope has-pretty-child">
                                                    <div class="clearfix prettycheckbox labelright  blue">
                                                        <input type="checkbox" ng-change="orderGridCheckAll()"
                                                            ng-model="checkbox.checkAll" ng-checked="checkbox.checkAll"
                                                            ng-true-value="true" ng-false-value="false"
                                                            kv-pretty-check="" kv-data-label=""
                                                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"
                                                            style="display: none;"><a href="javascript:void(0)"
                                                            tabindex="0" class=""></a>
                                                        <label for="undefined" class=""></label>
                                                    </div>
                                                </th>
                                                <th scope="col" role="columnheader" data-field="IsFavourite"
                                                    rowspan="1" data-index="1"
                                                    id="beed140f-bdc2-4aaa-9791-a2b984543bac"
                                                    class="cell-star k-header ng-scope" data-role="columnsorter"><a
                                                        class="k-link" href="#"><span class="starFilter"
                                                            ng-click="sortFavouriteItem($event)"><i
                                                                class="fal fa-star"></i></span></a></th>
                                                <th scope="col" role="columnheader" data-field="Code"
                                                    rowspan="1" data-title="Mã nhập hàng" data-index="2"
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
                                                    class="cell-total-final txtR k-header ng-scope"
                                                    style="display:none">Tổng số mặt hàng</th>
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
                                                <th scope="col" role="columnheader" data-field="Total"
                                                    rowspan="1" data-title="Cần trả NCC" data-index="15"
                                                    id="2c892bb1-2ad3-45da-9d77-0e0c722bbc87"
                                                    class="cell-total-final txtR k-header ng-scope">Cần trả
                                                    NCC</th>
                                                <th scope="col" role="columnheader" data-field="PaidAmount"
                                                    rowspan="1" data-title="Tiền đã trả NCC" data-index="16"
                                                    id="5f6dc51f-54b2-491e-aefe-a374f1821e84"
                                                    class="cell-total-final txtR k-header ng-scope"
                                                    style="display:none">Tiền đã trả NCC</th>
                                                <th scope="col" role="columnheader" data-field="ShortDescription"
                                                    rowspan="1" data-title="Ghi chú" data-index="17"
                                                    id="c1d1aaf2-39ce-42a7-b9e5-4c294193f2b8"
                                                    class="cell-description k-header ng-scope" style="display:none">Ghi
                                                    chú</th>
                                                <th scope="col" role="columnheader" data-field="Status"
                                                    rowspan="1" data-title="Trạng thái" data-index="18"
                                                    id="06de29c1-e310-4a72-9288-30cde8c85619"
                                                    class="cell-status k-header ng-scope th-show"
                                                    data-role="columnsorter"><a class="k-link" href="#">Trạng
                                                        thái</a></th>
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
                                    <tbody role="rowgroup">
                                        <tr class="k-master-row ng-scope cssSummaryRow k-master-prev"
                                            data-uid="caba277f-1236-4e7c-87d7-7808046491e5" role="row"
                                            style="background: rgb(254, 252, 237); font-weight: bold;">
                                            <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#"
                                                    tabindex="-1" style="display: none;"></a></td>
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
                                                    data-code=""> <i class="fa fa-envelope ng-hide"
                                                        ng-show="undefined"></i></span></td>
                                            <td class="cell-code" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.ReturnCode" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-date-time" role="gridcell"></td>
                                            <td class="cell-date-time" style="display:none" role="gridcell"></td>
                                            <td class="cell-date-time" style="display:none" role="gridcell"></td>
                                            <td class="cell-auto" role="gridcell"><span
                                                    ng-bind="dataItem.Supplier.Name" class="ng-binding"></span></td>
                                            <td class="cell-unit" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.Branch.Name" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-name" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.User.GivenName" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-name" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.User1.GivenName" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-total txtR" style="display:none" role="gridcell">11.00
                                            </td>
                                            <td class="cell-total-final txtR" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.TotalProductType" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-total txtR ng-binding" style="display:none"
                                                role="gridcell">550,000</td>
                                            <td class="cell-total txtR ng-binding" style="display:none"
                                                role="gridcell">0</td>
                                            <td class="cell-total-final txtR ng-binding" role="gridcell">
                                                550,000</td>
                                            <td class="cell-total-final txtR ng-binding" style="display:none"
                                                role="gridcell">0</td>
                                            <td class="cell-description" style="display:none" role="gridcell"><span
                                                    ng-bind="dataItem.ShortDescription" class="ng-binding"></span></td>
                                            <td class="cell-status" role="gridcell"><span ng-bind="dataItem.Status"
                                                    class="ng-binding"></span>
                                            </td>
                                        </tr>
                                        <tr class=" k-master-row ng-scope table-data " data-stt="1"
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
                                                    data-code="PN000003">PN000003 <i class="fa fa-envelope ng-hide"
                                                        ng-show="undefined"></i></span></td>
                                            <td class="cell-code" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.ReturnCode" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-date-time" role="gridcell">01/09/2023 17:18</td>
                                            <td class="cell-date-time" style="display:none" role="gridcell">01/09/2023
                                                17:18</td>
                                            <td class="cell-date-time" style="display:none" role="gridcell"></td>
                                            <td class="cell-auto" role="gridcell"><span
                                                    ng-bind="dataItem.Supplier.Name" class="ng-binding">nha
                                                    cung cap</span></td>
                                            <td class="cell-unit" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.Branch.Name" class="ng-binding">Chi
                                                    nhánh trung tâm</span>
                                            </td>
                                            <td class="cell-name" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.User.GivenName" class="ng-binding">admin</span>
                                            </td>
                                            <td class="cell-name" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.User1.GivenName" class="ng-binding">admin</span>
                                            </td>
                                            <td class="cell-total txtR" style="display:none" role="gridcell">5.00</td>
                                            <td class="cell-total-final txtR" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.TotalProductType" class="ng-binding">1</span>
                                            </td>
                                            <td class="cell-total txtR ng-binding" style="display:none"
                                                role="gridcell">250,000</td>
                                            <td class="cell-total txtR ng-binding" style="display:none"
                                                role="gridcell">0</td>
                                            <td class="cell-total-final txtR ng-binding" role="gridcell">
                                                250,000</td>
                                            <td class="cell-total-final txtR ng-binding"
                                                style="display: none; color: rgb(255, 0, 0);" role="gridcell">0</td>
                                            <td class="cell-description" style="display:none" role="gridcell"><span
                                                    ng-bind="dataItem.ShortDescription" class="ng-binding"></span></td>
                                            <td class="cell-status" role="gridcell"><span ng-bind="dataItem.Status"
                                                    class="ng-binding">Đã nhập
                                                    hàng</span></td>
                                        </tr>
                                        {{-- <tr class="k-detail-row k-alt ng-scope" style="display: table-row;">
                                                        <td class="k-hierarchy-cell"></td>
                                                        <td class="k-detail-cell" colspan="7">
                                                            <div class="k-tabstrip-wrapper">
                                                                <div class="tabstrip k-widget k-header k-tabstrip k-floatwrap k-tabstrip-top"
                                                                    data-role="tabstrip" tabindex="0"
                                                                    role="tablist">
                                                                    <ul class="k-tabstrip-items k-reset">
                                                                        <li class="k-state-active ng-binding k-item k-tab-on-top k-state-default k-first"
                                                                            role="tab" aria-selected="true"
                                                                            aria-controls="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-1">
                                                                            <span
                                                                                class="k-loading k-complete"></span><span
                                                                                class="k-link">Thông tin</span></li>
                                                                        <li class="ng-binding k-item k-state-default"
                                                                            role="tab"
                                                                            aria-controls="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-2"
                                                                            style="display:none"><span
                                                                                class="k-loading k-complete"></span><span
                                                                                class="k-link">Lịch sử thanh toán</span>
                                                                        </li>
                                                                        <li class="ng-binding k-item k-state-default k-last"
                                                                            role="tab"
                                                                            aria-controls="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-3"
                                                                            style="display:none"><span
                                                                                class="k-loading k-complete"></span><span
                                                                                class="k-link">Lịch sử trả hàng</span>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="k-content k-state-active"
                                                                        id="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-1"
                                                                        role="tabpanel" aria-expanded="true"
                                                                        style="display: block; width: 1006px;">
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
                                                                                                    class="ng-binding">PN000003</strong>
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
                                                                                                            k-ng-model="dataItem.PurchaseDate"
                                                                                                            k-format="'dd/MM/yyyy HH:mm'"
                                                                                                            k-time-format="'HH:mm'"
                                                                                                            ng-show="!disabled"
                                                                                                            ng-disabled="(disabled||disableDate)"
                                                                                                            k-on-change="purchaseDateChanged()"
                                                                                                            data-role="datetimepicker"
                                                                                                            type="text"
                                                                                                            role="combobox"
                                                                                                            aria-expanded="false"
                                                                                                            aria-disabled="false"
                                                                                                            aria-readonly="false"
                                                                                                            style="width: 100%;"><span
                                                                                                            unselectable="on"
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
                                                                                                cấp:</label><!-- ngIf: !dataItem.Supplier.Code && (dataItem.OrderSupplierCode || FromOrderSupplier) --><!-- ngIf: dataItem.Supplier.Code -->
                                                                                            <div class="form-wrap form-control-static ng-scope"
                                                                                                ng-if="dataItem.Supplier.Code"
                                                                                                ng-show="dataItem.Supplier.Code"
                                                                                                ng-hide="dataItem.isShowSupplier">
                                                                                                <a href="#/Suppliers?Code=NCC000001"
                                                                                                    ng-show="dataItem.Supplier.Code &amp;&amp; (!dataItem.Supplier.isDeleted)"
                                                                                                    target="_blank"
                                                                                                    class="ng-binding">nha
                                                                                                    cung cap</a> <label
                                                                                                    ng-show="!dataItem.Supplier.Code || dataItem.Supplier.isDeleted"
                                                                                                    class="ng-binding ng-hide">nha
                                                                                                    cung cap</label></div>
                                                                                            <!-- end ngIf: dataItem.Supplier.Code -->
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
                                                                                                Chi nhánh trung tâm</div>
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
                                                                                            ng-disabled="disabled"
                                                                                            class="tblBox_Des tblBox_Des2 ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                                                            kv-textarea-enter=""></textarea>
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
                                                                                                            data-field="Discount"
                                                                                                            rowspan="1"
                                                                                                            data-title="Giảm giá"
                                                                                                            data-index="4"
                                                                                                            id="68c47ed5-b586-49ed-852c-66a0dbdf1c18"
                                                                                                            class="cell-total txtR k-header">
                                                                                                            Giảm giá</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="PriceSale"
                                                                                                            rowspan="1"
                                                                                                            data-title="Giá nhập"
                                                                                                            data-index="5"
                                                                                                            id="8e2b1dbb-9305-407b-90c2-18d1d4dd4ddc"
                                                                                                            class="cell-total txtR k-header">
                                                                                                            Giá nhập</th>
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
                                                                                                    <tr class="k-filter-row"
                                                                                                        style="">
                                                                                                        <th><span
                                                                                                                data-field="ProductCode"
                                                                                                                class="k-filtercell"
                                                                                                                data-role="filtercell"><span
                                                                                                                    class="k-operator-hidden"><input
                                                                                                                        data-bind="value: value"
                                                                                                                        placeholder="Tìm mã hàng"
                                                                                                                        class="form-control"><button
                                                                                                                        type="button"
                                                                                                                        class="k-button k-button-icon"
                                                                                                                        title="Clear"
                                                                                                                        data-bind="visible:operatorVisible"
                                                                                                                        style="display: none;"><span
                                                                                                                            class="k-icon k-i-close"></span></button></span></span>
                                                                                                        </th>
                                                                                                        <th><span
                                                                                                                data-field="ProductName"
                                                                                                                class="k-filtercell"
                                                                                                                data-role="filtercell"><span
                                                                                                                    class="k-operator-hidden"><input
                                                                                                                        data-bind="value: value"
                                                                                                                        placeholder="Tìm tên hàng"
                                                                                                                        class="form-control"><button
                                                                                                                        type="button"
                                                                                                                        class="k-button k-button-icon"
                                                                                                                        title="Clear"
                                                                                                                        data-bind="visible:operatorVisible"
                                                                                                                        style="display: none;"><span
                                                                                                                            class="k-icon k-i-close"></span></button></span></span>
                                                                                                        </th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th
                                                                                                            class="th-show">
                                                                                                            &nbsp;</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                        style="max-height: 789px;">
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
                                                                                            <tbody role="rowgroup">
                                                                                                <tr data-uid="cfa1b491-d417-43f2-babc-c96e4a9b2cd0"
                                                                                                    role="row">
                                                                                                    <td class="cell-code"
                                                                                                        role="gridcell"><a
                                                                                                            href="#/Products?Code=SP000001"
                                                                                                            target="_blank">SP000001</a>
                                                                                                    </td>
                                                                                                    <td class="cell-auto"
                                                                                                        role="gridcell">
                                                                                                        airpod<span
                                                                                                            class="txtN txtI fs11 dpb txtGray txtNote"></span>
                                                                                                    </td>
                                                                                                    <td class="cell-quantity"
                                                                                                        role="gridcell">5
                                                                                                    </td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        50,000</td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        <span
                                                                                                            class="txtN txtI dpb fs11 txtGray ng-hide">
                                                                                                        </span></td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        50,000</td>
                                                                                                    <td class="cell-total txtR txtB"
                                                                                                        role="gridcell">
                                                                                                        250,000</td>
                                                                                                    <td class="cell-adddel"
                                                                                                        role="gridcell"><a
                                                                                                            href="javascript:void(0)"
                                                                                                            data-productid="19171940"
                                                                                                            data-masterunitid="undefined"
                                                                                                            class="btn-icon priceBookClick"><i
                                                                                                                class="fa fa-tag"></i></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table><span class="line"
                                                                                            style="height: 727px; top: 86.7969px;"></span><span
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
                                                                                                        5</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng số mặt hàng:
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        1</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng tiền hàng:</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        250,000</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        <a href="javascript:void(0)"
                                                                                                            tabindex="0"
                                                                                                            class="help icon"
                                                                                                            kv-tooltip=""
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="right"
                                                                                                            data-original-title="Giảm giá phiếu nhập sẽ được phân bổ vào giá nhập theo tỉ lệ Thành tiền của mỗi mặt hàng"><i
                                                                                                                class="fas fa-info-circle"></i></a>
                                                                                                        Giảm giá :</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        0</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                            <!-- ngRepeat: sur in dataItem.PurchaseOrderExpensesOthersRs -->
                                                                                            <tbody>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng cộng:</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        250,000</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tiền đã trả NCC:
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        0</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                            <!-- ngRepeat: sur in dataItem.PurchaseOrderExpensesOthersRtp -->
                                                                                        </table>
                                                                                    </div>
                                                                                </aside>
                                                                            </article>
                                                                            <article class="kv-group-btn"><span
                                                                                    class="kv-group-btn-editable"
                                                                                    ng-show="!noteditable"><a
                                                                                        ng-click="updatePurchaseOrder()"
                                                                                        class="btn btn-success ng-binding"
                                                                                        ng-show="showUpdate"><i
                                                                                            class="fa fa-share"></i>Mở
                                                                                        phiếu</a> <a ng-click="update()"
                                                                                        ng-hide="disabled"
                                                                                        ng-disabled="submitLock"
                                                                                        class="btn btn-success ng-binding"><i
                                                                                            class="fas fa-save"></i>
                                                                                        Lưu</a> <a ng-click="edit()"
                                                                                        ng-show="hasFinish"
                                                                                        class="btn btn-success ng-binding ng-hide"><i
                                                                                            class="fa fa-share"></i> Mở
                                                                                        phiếu</a> <a ng-click="return()"
                                                                                        ng-show="hasReturn"
                                                                                        class="btn btn-success ng-binding"><i
                                                                                            class="fa fa-reply-all"></i>
                                                                                        Trả hàng nhập</a> <a
                                                                                        class="btn btn-default ng-binding"
                                                                                        ng-click="PrintProduct(dataItem)"><i
                                                                                            class="fa fa-barcode"></i>In
                                                                                        tem mã</a> <a
                                                                                        ng-show="hasVoid || (hasAdd &amp;&amp; !dataItem.Id)"
                                                                                        ng-click="voidOrder(dataItem)"
                                                                                        class="btn btn-danger ng-binding"><i
                                                                                            class="fas fa-times"></i> Hủy
                                                                                        bỏ</a></span> <a
                                                                                    ng-show="noteditable"
                                                                                    ng-href="#/PurchaseOrder?Code=PN000003"
                                                                                    target="_blank"
                                                                                    class="btn btn-success ng-binding ng-hide"
                                                                                    href="#/PurchaseOrder?Code=PN000003"><i
                                                                                        class="fa fa-share"></i> Mở
                                                                                    phiếu</a>
                                                                                <div class="btn-group dropup dropup-right"
                                                                                    role="group"><button
                                                                                        id="btnGroupDrop1"
                                                                                        type="button"
                                                                                        class="btn btn-more dropdown-toggle"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"><i
                                                                                            class="far fa-ellipsis-v mr-0"></i></button>
                                                                                    <ul class="dropdown-menu"
                                                                                        aria-labelledby="btnGroupDrop1">
                                                                                        <li><a class="dropdown-item ng-binding ng-hide"
                                                                                                ng-click="openSendEmailWindow(dataItem)"
                                                                                                ng-show="isEmailPermitted"><i
                                                                                                    class="fa fa-envelope"></i>Gửi
                                                                                                Email</a></li>
                                                                                        <li><a class="dropdown-item ng-binding"
                                                                                                ng-click="exportDetail()"><i
                                                                                                    class="fa fa-sign-out"></i>
                                                                                                Xuất file</a></li>
                                                                                        <li><a class="dropdown-item ng-binding"
                                                                                                ng-click="clone()"
                                                                                                ng-show="canClonePurChaseOrder"><i
                                                                                                    class="fa fa-clone"></i>
                                                                                                Sao chép</a></li>
                                                                                        <li><a class="dropdown-item ng-binding ng-isolate-scope"
                                                                                                kv-choose-print-template-default=""
                                                                                                print-func="printContent()"
                                                                                                ng-click="printLog()"
                                                                                                print-type="8"><i
                                                                                                    class="fa fa-print"></i>
                                                                                                In</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </article>
                                                                            <div style="display:none">
                                                                                <kv-purchaseorder-pricebook-form
                                                                                    form-name="purchaseOrderPricebookPopup"
                                                                                    class="ng-isolate-scope"></kv-purchaseorder-pricebook-form>
                                                                                <script type="text/x-angular-template" id="supplierItemTempl">
                                                                                    <li suggestion ng-repeat="suggestion in suggestions track by $index" index="" val="" ng-class="" ng-click="itemClicked(suggestion)"> <span></span> <span class="dpb pull-right"></span> </li></script>
                                                                            </div>
                                                                        </purchase-order-form> </div>
                                                                    <div class="k-content"
                                                                        id="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-2"
                                                                        role="tabpanel" aria-hidden="true"
                                                                        aria-expanded="false" style="width: 1006px;">
                                                                        <div id="tblpayment" data-role="grid"
                                                                            class="k-grid k-widget k-grid-noscroll">
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
                                                                                                    data-title="Mã phiếu"
                                                                                                    data-index="0"
                                                                                                    id="e53dd8ef-d8d5-48bf-9e89-49df219d3c87"
                                                                                                    class="cell-code k-header">
                                                                                                    Mã phiếu</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="TransDate"
                                                                                                    rowspan="1"
                                                                                                    data-title="Thời gian"
                                                                                                    data-index="1"
                                                                                                    id="4ba51bd2-c729-4fc9-9b4d-f77093933bd4"
                                                                                                    class="cell-date-time k-header">
                                                                                                    Thời gian</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="CreatedName"
                                                                                                    rowspan="1"
                                                                                                    data-title="Người tạo"
                                                                                                    data-index="2"
                                                                                                    id="742b0a6e-8e3b-4f3d-bdab-73fd9503ecc4"
                                                                                                    class="cell-name k-header">
                                                                                                    Người tạo</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Method"
                                                                                                    rowspan="1"
                                                                                                    data-title="Phương thức"
                                                                                                    data-index="3"
                                                                                                    id="33ac1ee8-2818-4830-bd80-df23549a7a73"
                                                                                                    class="cell-status k-header">
                                                                                                    Phương thức</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Status"
                                                                                                    rowspan="1"
                                                                                                    data-title="Trạng thái"
                                                                                                    data-index="4"
                                                                                                    id="ec85d053-2a35-44f5-9436-88e4bfcb1873"
                                                                                                    class="cell-status k-header">
                                                                                                    Trạng thái</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Amount"
                                                                                                    rowspan="1"
                                                                                                    data-title="Tiền chi"
                                                                                                    data-index="5"
                                                                                                    id="81bd9204-df60-4d85-b29d-a64173ef89f6"
                                                                                                    class="txtR cell-price k-header">
                                                                                                    Tiền chi</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                style="max-height: 789px;">
                                                                                <table role="grid"
                                                                                    style="display: none;">
                                                                                    <colgroup>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                    </colgroup>
                                                                                    <tbody role="rowgroup"></tbody>
                                                                                </table>
                                                                                <div class="no-data"><span>Không tìm thấy
                                                                                        kết quả nào phù hợp</span></div>
                                                                                <span class="line"
                                                                                    style="height: 727px; top: 86.7969px;"></span><span
                                                                                    class="line line2"
                                                                                    style="height: 727px; top: 86.7969px;"></span>
                                                                            </div>
                                                                            <div class="paging-box"
                                                                                style="display: none;">
                                                                                <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap"
                                                                                    data-role="pager"><a href="#"
                                                                                        title="Go to the first page"
                                                                                        class="k-link k-pager-nav k-pager-first k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-w">Go
                                                                                            to the first page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the previous page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-w">Go
                                                                                            to the previous page</span></a>
                                                                                    <ul class="k-pager-numbers k-reset">
                                                                                        <li class="k-current-page"><span
                                                                                                class="k-link k-pager-nav">0</span>
                                                                                        </li>
                                                                                        <li><span
                                                                                                class="k-state-selected">0</span>
                                                                                        </li>
                                                                                    </ul><a href="#"
                                                                                        title="Go to the next page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-e">Go
                                                                                            to the next page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the last page"
                                                                                        class="k-link k-pager-nav k-pager-last k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-e">Go
                                                                                            to the last page</span></a><span
                                                                                        class="k-pager-info k-label">No
                                                                                        items to display</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="k-content"
                                                                        id="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-3"
                                                                        role="tabpanel" aria-hidden="true"
                                                                        aria-expanded="false" style="width: 1006px;">
                                                                        <div id="tblPurchaseReturnsHistory"
                                                                            data-role="grid"
                                                                            class="k-grid k-widget k-grid-noscroll">
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
                                                                                        </colgroup>
                                                                                        <thead role="rowgroup">
                                                                                            <tr role="row">
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Code"
                                                                                                    rowspan="1"
                                                                                                    data-title="Mã trả hàng nhập"
                                                                                                    data-index="0"
                                                                                                    id="f79102e9-20e4-4d85-a697-640600c79fdb"
                                                                                                    class="cell-code k-header">
                                                                                                    Mã trả hàng nhập</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="ReturnDate"
                                                                                                    rowspan="1"
                                                                                                    data-title="Thời gian"
                                                                                                    data-index="1"
                                                                                                    id="49b18ad3-8b00-44be-aad2-791d5abd21e9"
                                                                                                    class="cell-date-time k-header">
                                                                                                    Thời gian</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Receiver"
                                                                                                    rowspan="1"
                                                                                                    data-title="Người trả"
                                                                                                    data-index="2"
                                                                                                    id="870033fa-5dca-48ff-bc33-6184d472faf2"
                                                                                                    class="cell-auto k-header">
                                                                                                    Người trả</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="SubTotal"
                                                                                                    rowspan="1"
                                                                                                    data-title="Tổng cộng"
                                                                                                    data-index="3"
                                                                                                    id="21f0e9d9-4a5c-4f43-8e69-d574982828e9"
                                                                                                    class="txtR cell-total k-header">
                                                                                                    Tổng cộng</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Status"
                                                                                                    rowspan="1"
                                                                                                    data-title="Trạng thái"
                                                                                                    data-index="4"
                                                                                                    id="4d66a669-e61b-449d-a220-0a902e150987"
                                                                                                    class="cell-status k-header">
                                                                                                    Trạng thái</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                style="max-height: 789px;">
                                                                                <table role="grid"
                                                                                    style="display: none;">
                                                                                    <colgroup>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                    </colgroup>
                                                                                    <tbody role="rowgroup"></tbody>
                                                                                </table>
                                                                                <div class="no-data"><span>Không tìm thấy
                                                                                        kết quả nào phù hợp</span></div>
                                                                                <span class="line"
                                                                                    style="height: 727px; top: 86.7969px;"></span><span
                                                                                    class="line line2"
                                                                                    style="height: 727px; top: 86.7969px;"></span>
                                                                            </div>
                                                                            <div class="paging-box"
                                                                                style="display: none;">
                                                                                <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap"
                                                                                    data-role="pager"><a href="#"
                                                                                        title="Go to the first page"
                                                                                        class="k-link k-pager-nav k-pager-first k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-w">Go
                                                                                            to the first page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the previous page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-w">Go
                                                                                            to the previous page</span></a>
                                                                                    <ul class="k-pager-numbers k-reset">
                                                                                        <li class="k-current-page"><span
                                                                                                class="k-link k-pager-nav">0</span>
                                                                                        </li>
                                                                                        <li><span
                                                                                                class="k-state-selected">0</span>
                                                                                        </li>
                                                                                    </ul><a href="#"
                                                                                        title="Go to the next page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-e">Go
                                                                                            to the next page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the last page"
                                                                                        class="k-link k-pager-nav k-pager-last k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-e">Go
                                                                                            to the last page</span></a><span
                                                                                        class="k-pager-info k-label">No
                                                                                        items to display</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr> --}}
                                        <tr class="k-master-row ng-scope table-data "data-stt="2"
                                            data-uid="5067cf23-f038-44c9-9ddc-d0112caf8f9e" role="row">
                                            <td class="k-hierarchy-cell"><a class="k-icon k-plus" href="#"
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
                                                    data-code="PN000002">PN000002 <i class="fa fa-envelope ng-hide"
                                                        ng-show="undefined"></i></span></td>
                                            <td class="cell-code" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.ReturnCode" class="ng-binding"></span>
                                            </td>
                                            <td class="cell-date-time" role="gridcell">01/09/2023 17:00</td>
                                            <td class="cell-date-time" style="display:none" role="gridcell">01/09/2023
                                                17:00</td>
                                            <td class="cell-date-time" style="display:none" role="gridcell"></td>
                                            <td class="cell-auto" role="gridcell"><span
                                                    ng-bind="dataItem.Supplier.Name" class="ng-binding"></span></td>
                                            <td class="cell-unit" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.Branch.Name" class="ng-binding">Chi
                                                    nhánh trung tâm</span>
                                            </td>
                                            <td class="cell-name" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.User.GivenName" class="ng-binding">admin</span>
                                            </td>
                                            <td class="cell-name" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.User1.GivenName" class="ng-binding">admin</span>
                                            </td>
                                            <td class="cell-total txtR" style="display:none" role="gridcell">1.00</td>
                                            <td class="cell-total-final txtR" style="display:none" role="gridcell">
                                                <span ng-bind="dataItem.TotalProductType" class="ng-binding">1</span>
                                            </td>
                                            <td class="cell-total txtR ng-binding" style="display:none"
                                                role="gridcell">50,000</td>
                                            <td class="cell-total txtR ng-binding" style="display:none"
                                                role="gridcell">0</td>
                                            <td class="cell-total-final txtR ng-binding" role="gridcell">
                                                50,000</td>
                                            <td class="cell-total-final txtR ng-binding"
                                                style="display: none; color: rgb(255, 0, 0);" role="gridcell">0</td>
                                            <td class="cell-description" style="display:none" role="gridcell"><span
                                                    ng-bind="dataItem.ShortDescription" class="ng-binding"></span></td>
                                            <td class="cell-status" role="gridcell"><span ng-bind="dataItem.Status"
                                                    class="ng-binding">Đã nhập
                                                    hàng</span></td>
                                        </tr>

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
                                </table><span class="line" ></span>
                                <span class="line line2"
                                    style=""></span>
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
                                        <li class="k-current-page"><span class="k-link k-pager-nav">1</span>
                                        </li>
                                        <li><span class="k-state-selected">1</span></li>
                                    </ul><a href="#" title="Trang sau"
                                        class="k-link k-pager-nav  k-state-disabled" data-page="1"
                                        tabindex="-1"><span class="k-icon k-i-arrow-e">Trang
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
                                    id="empty-grid-head"></span><a href="javascript:void(0);"
                                    style="font-weight: bold;" ng-click="filterbyRange('alltime')"
                                    class="ng-binding">&nbsp;vào đây&nbsp;</a><span id="empty-grid-last"></span></span>
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
        


        let temp =0
        $(document).on("click", ".table-data", function() {
            let stt = $(this).data('stt')

            let descriptionData= `
                                                    <tr class="k-detail-row k-alt ng-scope" id="detail-row" data-stt="${stt}" style="display: table-row;">
                                                        <td class="k-hierarchy-cell"></td>
                                                        <td class="k-detail-cell" colspan="7">
                                                            <div class="k-tabstrip-wrapper">
                                                                <div class="tabstrip k-widget k-header k-tabstrip k-floatwrap k-tabstrip-top"
                                                                    data-role="tabstrip" tabindex="0"
                                                                    role="tablist">
                                                                    <ul class="k-tabstrip-items k-reset">
                                                                        <li class="k-state-active ng-binding k-item k-tab-on-top k-state-default k-first"
                                                                            role="tab" aria-selected="true"
                                                                            aria-controls="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-1">
                                                                            <span
                                                                                class="k-loading k-complete"></span><span
                                                                                class="k-link">Thông tin</span></li>
                                                                        <li class="ng-binding k-item k-state-default"
                                                                            role="tab"
                                                                            aria-controls="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-2"
                                                                            style="display:none"><span
                                                                                class="k-loading k-complete"></span><span
                                                                                class="k-link">Lịch sử thanh toán</span>
                                                                        </li>
                                                                        <li class="ng-binding k-item k-state-default k-last"
                                                                            role="tab"
                                                                            aria-controls="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-3"
                                                                            style="display:none"><span
                                                                                class="k-loading k-complete"></span><span
                                                                                class="k-link">Lịch sử trả hàng</span>
                                                                        </li>
                                                                    </ul>
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
                                                                                                    class="ng-binding">PN000003</strong>
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
                                                                                                            k-ng-model="dataItem.PurchaseDate"
                                                                                                            k-format="'dd/MM/yyyy HH:mm'"
                                                                                                            k-time-format="'HH:mm'"
                                                                                                            ng-show="!disabled"
                                                                                                            ng-disabled="(disabled||disableDate)"
                                                                                                            k-on-change="purchaseDateChanged()"
                                                                                                            data-role="datetimepicker"
                                                                                                            type="text"
                                                                                                            role="combobox"
                                                                                                            aria-expanded="false"
                                                                                                            aria-disabled="false"
                                                                                                            aria-readonly="false"
                                                                                                            style="width: 100%;"><span
                                                                                                            unselectable="on"
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
                                                                                                cấp:</label><!-- ngIf: !dataItem.Supplier.Code && (dataItem.OrderSupplierCode || FromOrderSupplier) --><!-- ngIf: dataItem.Supplier.Code -->
                                                                                            <div class="form-wrap form-control-static ng-scope"
                                                                                                ng-if="dataItem.Supplier.Code"
                                                                                                ng-show="dataItem.Supplier.Code"
                                                                                                ng-hide="dataItem.isShowSupplier">
                                                                                                <a href="#/Suppliers?Code=NCC000001"
                                                                                                    ng-show="dataItem.Supplier.Code &amp;&amp; (!dataItem.Supplier.isDeleted)"
                                                                                                    target="_blank"
                                                                                                    class="ng-binding">nha
                                                                                                    cung cap</a> <label
                                                                                                    ng-show="!dataItem.Supplier.Code || dataItem.Supplier.isDeleted"
                                                                                                    class="ng-binding ng-hide">nha
                                                                                                    cung cap</label></div>
                                                                                            <!-- end ngIf: dataItem.Supplier.Code -->
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
                                                                                                Chi nhánh trung tâm</div>
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
                                                                                            ng-disabled="disabled"
                                                                                            class="tblBox_Des tblBox_Des2 ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                                                            kv-textarea-enter=""></textarea>
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
                                                                                                            data-field="Discount"
                                                                                                            rowspan="1"
                                                                                                            data-title="Giảm giá"
                                                                                                            data-index="4"
                                                                                                            id="68c47ed5-b586-49ed-852c-66a0dbdf1c18"
                                                                                                            class="cell-total txtR k-header">
                                                                                                            Giảm giá</th>
                                                                                                        <th scope="col"
                                                                                                            role="columnheader"
                                                                                                            data-field="PriceSale"
                                                                                                            rowspan="1"
                                                                                                            data-title="Giá nhập"
                                                                                                            data-index="5"
                                                                                                            id="8e2b1dbb-9305-407b-90c2-18d1d4dd4ddc"
                                                                                                            class="cell-total txtR k-header">
                                                                                                            Giá nhập</th>
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
                                                                                                    <tr class="k-filter-row"
                                                                                                        style="">
                                                                                                        <th><span
                                                                                                                data-field="ProductCode"
                                                                                                                class="k-filtercell"
                                                                                                                data-role="filtercell"><span
                                                                                                                    class="k-operator-hidden"><input
                                                                                                                        data-bind="value: value"
                                                                                                                        placeholder="Tìm mã hàng"
                                                                                                                        class="form-control"><button
                                                                                                                        type="button"
                                                                                                                        class="k-button k-button-icon"
                                                                                                                        title="Clear"
                                                                                                                        data-bind="visible:operatorVisible"
                                                                                                                        style="display: none;"><span
                                                                                                                            class="k-icon k-i-close"></span></button></span></span>
                                                                                                        </th>
                                                                                                        <th><span
                                                                                                                data-field="ProductName"
                                                                                                                class="k-filtercell"
                                                                                                                data-role="filtercell"><span
                                                                                                                    class="k-operator-hidden"><input
                                                                                                                        data-bind="value: value"
                                                                                                                        placeholder="Tìm tên hàng"
                                                                                                                        class="form-control"><button
                                                                                                                        type="button"
                                                                                                                        class="k-button k-button-icon"
                                                                                                                        title="Clear"
                                                                                                                        data-bind="visible:operatorVisible"
                                                                                                                        style="display: none;"><span
                                                                                                                            class="k-icon k-i-close"></span></button></span></span>
                                                                                                        </th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th>&nbsp;</th>
                                                                                                        <th
                                                                                                            class="th-show">
                                                                                                            &nbsp;</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                        style="max-height: 789px;">
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
                                                                                            <tbody role="rowgroup">
                                                                                                <tr data-uid="cfa1b491-d417-43f2-babc-c96e4a9b2cd0"
                                                                                                    role="row">
                                                                                                    <td class="cell-code"
                                                                                                        role="gridcell"><a
                                                                                                            href="#/Products?Code=SP000001"
                                                                                                            target="_blank">SP000001</a>
                                                                                                    </td>
                                                                                                    <td class="cell-auto"
                                                                                                        role="gridcell">
                                                                                                        airpod<span
                                                                                                            class="txtN txtI fs11 dpb txtGray txtNote"></span>
                                                                                                    </td>
                                                                                                    <td class="cell-quantity"
                                                                                                        role="gridcell">5
                                                                                                    </td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        50,000</td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        <span
                                                                                                            class="txtN txtI dpb fs11 txtGray ng-hide">
                                                                                                        </span></td>
                                                                                                    <td class="cell-total txtR"
                                                                                                        role="gridcell">
                                                                                                        50,000</td>
                                                                                                    <td class="cell-total txtR txtB"
                                                                                                        role="gridcell">
                                                                                                        250,000</td>
                                                                                                    <td class="cell-adddel"
                                                                                                        role="gridcell"><a
                                                                                                            href="javascript:void(0)"
                                                                                                            data-productid="19171940"
                                                                                                            data-masterunitid="undefined"
                                                                                                            class="btn-icon priceBookClick"><i
                                                                                                                class="fa fa-tag"></i></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table><span class="line"
                                                                                            style="height: 727px; top: 86.7969px;"></span><span
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
                                                                                                        5</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng số mặt hàng:
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        1</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng tiền hàng:</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        250,000</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        <a href="javascript:void(0)"
                                                                                                            tabindex="0"
                                                                                                            class="help icon"
                                                                                                            kv-tooltip=""
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="right"
                                                                                                            data-original-title="Giảm giá phiếu nhập sẽ được phân bổ vào giá nhập theo tỉ lệ Thành tiền của mỗi mặt hàng"><i
                                                                                                                class="fas fa-info-circle"></i></a>
                                                                                                        Giảm giá :</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        0</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                            <!-- ngRepeat: sur in dataItem.PurchaseOrderExpensesOthersRs -->
                                                                                            <tbody>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tổng cộng:</td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        250,000</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    ng-show="viewPurchasePrice">
                                                                                                    <td
                                                                                                        class="ng-binding">
                                                                                                        Tiền đã trả NCC:
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="totalPrice ng-binding">
                                                                                                        0</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                            <!-- ngRepeat: sur in dataItem.PurchaseOrderExpensesOthersRtp -->
                                                                                        </table>
                                                                                    </div>
                                                                                </aside>
                                                                            </article>
                                                                            <article class="kv-group-btn"><span
                                                                                    class="kv-group-btn-editable"
                                                                                    ng-show="!noteditable"><a
                                                                                        ng-click="updatePurchaseOrder()"
                                                                                        class="btn btn-success ng-binding"
                                                                                        ng-show="showUpdate"><i
                                                                                            class="fa fa-share"></i>Mở
                                                                                        phiếu</a> <a ng-click="update()"
                                                                                        ng-hide="disabled"
                                                                                        ng-disabled="submitLock"
                                                                                        class="btn btn-success ng-binding"><i
                                                                                            class="fas fa-save"></i>
                                                                                        Lưu</a> <a ng-click="edit()"
                                                                                        ng-show="hasFinish"
                                                                                        class="btn btn-success ng-binding ng-hide"><i
                                                                                            class="fa fa-share"></i> Mở
                                                                                        phiếu</a> <a ng-click="return()"
                                                                                        ng-show="hasReturn"
                                                                                        class="btn btn-success ng-binding"><i
                                                                                            class="fa fa-reply-all"></i>
                                                                                        Trả hàng nhập</a> <a
                                                                                        class="btn btn-default ng-binding"
                                                                                        ng-click="PrintProduct(dataItem)"><i
                                                                                            class="fa fa-barcode"></i>In
                                                                                        tem mã</a> <a
                                                                                        ng-show="hasVoid || (hasAdd &amp;&amp; !dataItem.Id)"
                                                                                        ng-click="voidOrder(dataItem)"
                                                                                        class="btn btn-danger ng-binding"><i
                                                                                            class="fas fa-times"></i> Hủy
                                                                                        bỏ</a></span> <a
                                                                                    ng-show="noteditable"
                                                                                    ng-href="#/PurchaseOrder?Code=PN000003"
                                                                                    target="_blank"
                                                                                    class="btn btn-success ng-binding ng-hide"
                                                                                    href="#/PurchaseOrder?Code=PN000003"><i
                                                                                        class="fa fa-share"></i> Mở
                                                                                    phiếu</a>
                                                                                <div class="btn-group dropup dropup-right"
                                                                                    role="group"><button
                                                                                        id="btnGroupDrop1"
                                                                                        type="button"
                                                                                        class="btn btn-more dropdown-toggle"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"><i
                                                                                            class="far fa-ellipsis-v mr-0"></i></button>
                                                                                    <ul class="dropdown-menu"
                                                                                        aria-labelledby="btnGroupDrop1">
                                                                                        <li><a class="dropdown-item ng-binding ng-hide"
                                                                                                ng-click="openSendEmailWindow(dataItem)"
                                                                                                ng-show="isEmailPermitted"><i
                                                                                                    class="fa fa-envelope"></i>Gửi
                                                                                                Email</a></li>
                                                                                        <li><a class="dropdown-item ng-binding"
                                                                                                ng-click="exportDetail()"><i
                                                                                                    class="fa fa-sign-out"></i>
                                                                                                Xuất file</a></li>
                                                                                        <li><a class="dropdown-item ng-binding"
                                                                                                ng-click="clone()"
                                                                                                ng-show="canClonePurChaseOrder"><i
                                                                                                    class="fa fa-clone"></i>
                                                                                                Sao chép</a></li>
                                                                                        <li><a class="dropdown-item ng-binding ng-isolate-scope"
                                                                                                kv-choose-print-template-default=""
                                                                                                print-func="printContent()"
                                                                                                ng-click="printLog()"
                                                                                                print-type="8"><i
                                                                                                    class="fa fa-print"></i>
                                                                                                In</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </article>
                                                                            <div style="display:none">
                                                                                <kv-purchaseorder-pricebook-form
                                                                                    form-name="purchaseOrderPricebookPopup"
                                                                                    class="ng-isolate-scope"></kv-purchaseorder-pricebook-form>
                                                                                
                                                                            </div>
                                                                        </purchase-order-form> </div>
                                                                    <div class="k-content"
                                                                        id="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-2"
                                                                        role="tabpanel" aria-hidden="true"
                                                                        aria-expanded="false" style="width: 1006px;">
                                                                        <div id="tblpayment" data-role="grid"
                                                                            class="k-grid k-widget k-grid-noscroll">
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
                                                                                                    data-title="Mã phiếu"
                                                                                                    data-index="0"
                                                                                                    id="e53dd8ef-d8d5-48bf-9e89-49df219d3c87"
                                                                                                    class="cell-code k-header">
                                                                                                    Mã phiếu</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="TransDate"
                                                                                                    rowspan="1"
                                                                                                    data-title="Thời gian"
                                                                                                    data-index="1"
                                                                                                    id="4ba51bd2-c729-4fc9-9b4d-f77093933bd4"
                                                                                                    class="cell-date-time k-header">
                                                                                                    Thời gian</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="CreatedName"
                                                                                                    rowspan="1"
                                                                                                    data-title="Người tạo"
                                                                                                    data-index="2"
                                                                                                    id="742b0a6e-8e3b-4f3d-bdab-73fd9503ecc4"
                                                                                                    class="cell-name k-header">
                                                                                                    Người tạo</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Method"
                                                                                                    rowspan="1"
                                                                                                    data-title="Phương thức"
                                                                                                    data-index="3"
                                                                                                    id="33ac1ee8-2818-4830-bd80-df23549a7a73"
                                                                                                    class="cell-status k-header">
                                                                                                    Phương thức</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Status"
                                                                                                    rowspan="1"
                                                                                                    data-title="Trạng thái"
                                                                                                    data-index="4"
                                                                                                    id="ec85d053-2a35-44f5-9436-88e4bfcb1873"
                                                                                                    class="cell-status k-header">
                                                                                                    Trạng thái</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Amount"
                                                                                                    rowspan="1"
                                                                                                    data-title="Tiền chi"
                                                                                                    data-index="5"
                                                                                                    id="81bd9204-df60-4d85-b29d-a64173ef89f6"
                                                                                                    class="txtR cell-price k-header">
                                                                                                    Tiền chi</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                style="max-height: 789px;">
                                                                                <table role="grid"
                                                                                    style="display: none;">
                                                                                    <colgroup>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                    </colgroup>
                                                                                    <tbody role="rowgroup"></tbody>
                                                                                </table>
                                                                                <div class="no-data"><span>Không tìm thấy
                                                                                        kết quả nào phù hợp</span></div>
                                                                                <span class="line"
                                                                                    style="height: 727px; top: 86.7969px;"></span><span
                                                                                    class="line line2"
                                                                                    style="height: 727px; top: 86.7969px;"></span>
                                                                            </div>
                                                                            <div class="paging-box"
                                                                                style="display: none;">
                                                                                <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap"
                                                                                    data-role="pager"><a href="#"
                                                                                        title="Go to the first page"
                                                                                        class="k-link k-pager-nav k-pager-first k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-w">Go
                                                                                            to the first page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the previous page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-w">Go
                                                                                            to the previous page</span></a>
                                                                                    <ul class="k-pager-numbers k-reset">
                                                                                        <li class="k-current-page"><span
                                                                                                class="k-link k-pager-nav">0</span>
                                                                                        </li>
                                                                                        <li><span
                                                                                                class="k-state-selected">0</span>
                                                                                        </li>
                                                                                    </ul><a href="#"
                                                                                        title="Go to the next page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-e">Go
                                                                                            to the next page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the last page"
                                                                                        class="k-link k-pager-nav k-pager-last k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-e">Go
                                                                                            to the last page</span></a><span
                                                                                        class="k-pager-info k-label">No
                                                                                        items to display</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="k-content"
                                                                        id="b13a6cc8-4c4c-4ed9-a3dd-1cad0a3a9fbe-3"
                                                                        role="tabpanel" aria-hidden="true"
                                                                        aria-expanded="false" style="width: 1006px;">
                                                                        <div id="tblPurchaseReturnsHistory"
                                                                            data-role="grid"
                                                                            class="k-grid k-widget k-grid-noscroll">
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
                                                                                        </colgroup>
                                                                                        <thead role="rowgroup">
                                                                                            <tr role="row">
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Code"
                                                                                                    rowspan="1"
                                                                                                    data-title="Mã trả hàng nhập"
                                                                                                    data-index="0"
                                                                                                    id="f79102e9-20e4-4d85-a697-640600c79fdb"
                                                                                                    class="cell-code k-header">
                                                                                                    Mã trả hàng nhập</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="ReturnDate"
                                                                                                    rowspan="1"
                                                                                                    data-title="Thời gian"
                                                                                                    data-index="1"
                                                                                                    id="49b18ad3-8b00-44be-aad2-791d5abd21e9"
                                                                                                    class="cell-date-time k-header">
                                                                                                    Thời gian</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Receiver"
                                                                                                    rowspan="1"
                                                                                                    data-title="Người trả"
                                                                                                    data-index="2"
                                                                                                    id="870033fa-5dca-48ff-bc33-6184d472faf2"
                                                                                                    class="cell-auto k-header">
                                                                                                    Người trả</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="SubTotal"
                                                                                                    rowspan="1"
                                                                                                    data-title="Tổng cộng"
                                                                                                    data-index="3"
                                                                                                    id="21f0e9d9-4a5c-4f43-8e69-d574982828e9"
                                                                                                    class="txtR cell-total k-header">
                                                                                                    Tổng cộng</th>
                                                                                                <th scope="col"
                                                                                                    role="columnheader"
                                                                                                    data-field="Status"
                                                                                                    rowspan="1"
                                                                                                    data-title="Trạng thái"
                                                                                                    data-index="4"
                                                                                                    id="4d66a669-e61b-449d-a220-0a902e150987"
                                                                                                    class="cell-status k-header">
                                                                                                    Trạng thái</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="k-grid-content k-auto-scrollable k-grid-content-ac"
                                                                                style="max-height: 789px;">
                                                                                <table role="grid"
                                                                                    style="display: none;">
                                                                                    <colgroup>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                        <col>
                                                                                    </colgroup>
                                                                                    <tbody role="rowgroup"></tbody>
                                                                                </table>
                                                                                <div class="no-data"><span>Không tìm thấy
                                                                                        kết quả nào phù hợp</span></div>
                                                                                <span class="line"
                                                                                    style="height: 727px; top: 86.7969px;"></span><span
                                                                                    class="line line2"
                                                                                    style="height: 727px; top: 86.7969px;"></span>
                                                                            </div>
                                                                            <div class="paging-box"
                                                                                style="display: none;">
                                                                                <div class="k-pager-wrap k-grid-pager k-widget k-floatwrap"
                                                                                    data-role="pager"><a href="#"
                                                                                        title="Go to the first page"
                                                                                        class="k-link k-pager-nav k-pager-first k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-w">Go
                                                                                            to the first page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the previous page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="1"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-w">Go
                                                                                            to the previous page</span></a>
                                                                                    <ul class="k-pager-numbers k-reset">
                                                                                        <li class="k-current-page"><span
                                                                                                class="k-link k-pager-nav">0</span>
                                                                                        </li>
                                                                                        <li><span
                                                                                                class="k-state-selected">0</span>
                                                                                        </li>
                                                                                    </ul><a href="#"
                                                                                        title="Go to the next page"
                                                                                        class="k-link k-pager-nav  k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-arrow-e">Go
                                                                                            to the next page</span></a><a
                                                                                        href="#"
                                                                                        title="Go to the last page"
                                                                                        class="k-link k-pager-nav k-pager-last k-state-disabled"
                                                                                        data-page="0"
                                                                                        tabindex="-1"><span
                                                                                            class="k-icon k-i-seek-e">Go
                                                                                            to the last page</span></a><span
                                                                                        class="k-pager-info k-label">No
                                                                                        items to display</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>`

            
            let position = 86.9969 + (stt - 1) *  83.7
            $('.table-data').each(function(i, obj) {
                $(this).removeClass('k-alt');
                $(this).removeClass('k-master-state');
            });
            console.log(stt);
            console.log($('#detail-row').data('stt'));
            if(stt != $('#detail-row').data('stt') ){
                $('.k-detail-row').remove()

                $(this).addClass('k-alt');
                $(this).addClass('k-master-state');
                $(this).after(descriptionData)
                $('.line').css('top', position +'px')
                $('.line').css('height','785px')
                temp =stt
            }else{
            $('.k-detail-row').remove()
            $('.line').css('top', '')
            $('.line').css('height','') 
            }

           
        });
    </script>
@endsection