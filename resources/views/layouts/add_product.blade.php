<div class="modal"></div>
<div kendo-window="myKendoWindow" id="myModal" k-options="options" modal-render="true" role="dialog" uib-modal-window="modal-window" index="0" animate="animate" class="modal ng-isolate-scope k-window-content k-content" data-role="window" tabindex="-1" style="position: absolute;">
    <div class="modal-content k-window-addProduct">
        <div class="modal-header" style="padding: 20px;  background-color: #ededed;">
            <span class="close">×</span>
            <div class="headertext header-fixed">
                <span style="font-size: 20px;font-weight: bold">Thêm hàng</span>
            </div>
        </div>

        <div uib-modal-transclude="" style="padding: 20px;"><kv-add-new-product from-order-supplier="false" from-purchase-order="false" form-name="productForm" product-listeners="listeners" product-popup="popup" product-on-save="onSave(resp)" product-on-cancel="onCancel()" product-on-delete="onDelete(resp)" class="ng-scope ng-isolate-scope">
                <form name="productForm" id="product-add" class="ng-pristine ng-valid ng-valid-maxlength ng-valid-parse">
                    <!-- ngIf: !isActiveGppDrugStore || product.ProductType ==3 || product.ProductType == 1 -->
                    <section class="boxInfo addProduct uln fr  addProductNotDrug" ng-if="!isActiveGppDrugStore || product.ProductType ==3 || product.ProductType == 1"><kv-tabs id="pro_tabs" ng-model="proTabs" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                            <div class="kvTabs clearfix ulN">
                                <ul class="mr-bg"><!-- ngRepeat: pane in panes -->
                                    <li ng-repeat="pane in panes" class="ng-scope"><a skip-disable="" tabindex="-1" kv-focus-item="tabBut_0" ng-click="select(pane, false, $index)" class="tabBut_0  tabbut_new active" ng-class="{'active':pane.selected}">Thông tin</a></li>
                                    <!-- end ngRepeat: pane in panes -->
                                    <li ng-repeat="pane in panes" class="ng-scope"><a skip-disable="" tabindex="-1" kv-focus-item="tabBut_1" ng-click="select(pane, false, $index)" class="tabBut_1  tabbut_new" ng-class="{'active':pane.selected}">Mô tả chi
                                            tiết</a></li><!-- end ngRepeat: pane in panes -->
                                    <li ng-repeat="pane in panes" class="ng-scope"><a skip-disable="" tabindex="-1" kv-focus-item="tabBut_2" ng-click="select(pane, false, $index)" class="tabBut_2  tabbut_new" ng-class="{'active':pane.selected}">Thành
                                            phần</a></li><!-- end ngRepeat: pane in panes -->
                                    <li ng-repeat="pane in panes" class="ng-scope"><a skip-disable="" tabindex="-1" kv-focus-item="tabBut_3" ng-click="select(pane, false, $index)" class="tabBut_3  tabbut_new" ng-class="{'active':pane.selected}">Bảo hành,
                                            bảo trì</a></li><!-- end ngRepeat: pane in panes -->
                                </ul>
                                <div class="tabBg"></div>
                                <div ng-transclude=""><kv-tab-pane kvtitle="_l.baseProductInfo" kv-tab-id="1" class="ng-scope ng-isolate-scope">
                                        <div ng-show="selected" ng-transclude="">
                                            <div class="form-wrapper ng-scope">
                                                <div class="row pro_baseForm">
                                                    <div class="col-md-6 addPro-left">
                                                        <div class="form-group"><label class="form-label control-label ng-binding">Mã hàng<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Mã hàng là thông tin duy nhất"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <autocomplete id="idSuggestProductCodeSearch" attr-class="suggest-product-search" attr-inputid="idSuggestProductCodeSearchTerm" attr-inputclass="iptCode tabBut_0 form-control" attr-placeholder="Mã hàng tự động" attr-maxlength="40" attr-validspecialchar="Mã hàng" ng-model="product.Code" template-id="suggestProductTemp" data="suggestProductList" on-type="suggestProductSearchTermChanged" input-blur="updateListProducts('Code'); updateCodeProductsUnits(); validateAddProduct(typeValidateCode);" on-select="selectSuggestProductByCode" is-disable-enter-bar-scanner="true" do-not-get-first-by-enter="true" is-not-show-not-found="true" external-query-search="product_code" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                                                                    <div class="autocomplete suggest-product-search" id=""><input type="text" ng-blur="inputBlur()" autocomplete="off" ng-model="searchParam" maxlength="40" placeholder="Mã hàng tự động" class="iptCode tabBut_0 form-control iptUnitName_  ng-empty ng-valid-maxlength ng-touched" id="idSuggestProductCodeSearchTerm" tabindex="" ng-disabled="kvDisable" kv-valid-special-chars="Mã hàng">
                                                                        <div ng-show="completing" class="output-complete ng-hide" ng-mousedown="autocompleFocus($event)">
                                                                            <ul ng-hide="suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; isNotShowNotFound">
                                                                                <!-- ngRepeat: suggestion in suggestions track by $index -->
                                                                            </ul>
                                                                            <div class="autoNotFound ng-hide" ng-show="searchParam &amp;&amp; suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; !isNotShowNotFound">
                                                                                Không tìm thấy kết quả nào phù hợp</div>
                                                                        </div>
                                                                    </div>
                                                                </autocomplete>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" ng-show="appSetting.UseBarcode"><label class="form-label control-label ng-binding">Mã vạch<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Mã vạch của hàng hóa thường được tạo ra bởi nhà sản xuất"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <autocomplete id="idSuggestProductBarcodeSearch" attr-class="suggest-product-search" attr-inputid="idSuggestProductBarcodeSearchTerm" attr-inputclass="form-control" attr-placeholder="" attr-maxlength="16" attr-validspecialchar="Mã vạch" ng-model="product.Barcode" template-id="suggestProductTemp" data="suggestProductList" on-type="suggestProductSearchTermChanged" input-blur="updateListProducts('Barcode'); validateAddProduct(typeValidateBarcode);" on-select="selectSuggestProductByBarcode" is-disable-enter-bar-scanner="true" do-not-get-first-by-enter="true" is-not-show-not-found="true" external-query-search="barcode" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                                                                    <div class="autocomplete suggest-product-search" id=""><input type="text" ng-blur="inputBlur()" autocomplete="off" ng-model="searchParam" maxlength="16" placeholder="" class="form-control iptUnitName_  ng-empty ng-valid-maxlength" id="idSuggestProductBarcodeSearchTerm" tabindex="" ng-disabled="kvDisable" kv-valid-special-chars="Mã vạch">
                                                                        <div ng-show="completing" class="output-complete ng-hide" ng-mousedown="autocompleFocus($event)">
                                                                            <ul ng-hide="suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; isNotShowNotFound">
                                                                                <!-- ngRepeat: suggestion in suggestions track by $index -->
                                                                            </ul>
                                                                            <div class="autoNotFound ng-hide" ng-show="searchParam &amp;&amp; suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; !isNotShowNotFound">
                                                                                Không tìm thấy kết quả nào phù hợp</div>
                                                                        </div>
                                                                    </div>
                                                                </autocomplete>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label class="form-label control-label ng-binding">Tên hàng<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Tên hàng là tên của sản phẩm"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <autocomplete id="idSuggestProductNameSearch" attr-class="suggest-product-search" attr-inputid="idSuggestProductNameSearchTerm" attr-inputclass="form-control" attr-placeholder="" attr-validspecialchar="Tên hàng" attr-required="true" attr-maxlength="255" ng-model="product.Name" template-id="suggestProductTemp" data="suggestProductList" on-type="suggestProductSearchTermChanged" input-blur="updateListProductWithMaterial('Name')" on-select="selectSuggestProductByName" is-disable-enter-bar-scanner="true" do-not-get-first-by-enter="true" is-not-show-not-found="true" external-query-search="product_name" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                                                                    <div class="autocomplete suggest-product-search" id=""><input type="text" ng-blur="inputBlur()" autocomplete="off" ng-model="searchParam" maxlength="255" placeholder="" class="form-control iptUnitName_  ng-empty ng-valid-maxlength" id="idSuggestProductNameSearchTerm" tabindex="" ng-disabled="kvDisable" kv-valid-special-chars="Tên hàng" required="required">
                                                                        <div ng-show="completing" class="output-complete ng-hide" ng-mousedown="autocompleFocus($event)">
                                                                            <ul ng-hide="suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; isNotShowNotFound">
                                                                                <!-- ngRepeat: suggestion in suggestions track by $index -->
                                                                            </ul>
                                                                            <div class="autoNotFound ng-hide" ng-show="searchParam &amp;&amp; suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; !isNotShowNotFound">
                                                                                Không tìm thấy kết quả nào phù hợp</div>
                                                                        </div>
                                                                    </div>
                                                                </autocomplete>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label class="form-label control-label ng-binding">Nhóm hàng<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Lựa chọn nhóm hàng cho sản phẩm"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap"><kv-category-dropdownlist selected-id="product.CategoryId" css-class="product-select" class="input-group ng-isolate-scope" include-add="true" on-add="EditCategory"><span title="" class="k-widget k-dropdown k-header form-control product-select" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-readonly="false" style="width: 100%;" aria-busy="false" aria-activedescendant="048588fe-2cfc-49f1-9251-0c442efabfdd"><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input ng-scope"> ---Lựa
                                                                                chọn---</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select kendo-drop-down-list="" id="ddlCat2367" class="product-select form-control" k-options="categorySelectOptions" k-ng-model="selectedId" k-filter="'contains'" k-value-primitive="true" data-option-label="{Name: _l.globalSelect1,Id:null}" style="width: 100%; display: none;" data-role="dropdownlist">
                                                                            <option value="null" selected="selected"> ---Lựa chọn---
                                                                            </option>
                                                                            <option value="558704">tai nghe</option>
                                                                        </select></span>
                                                                    <div class="input-group-append ng-scope">
                                                                        <!-- ngIf: includeAdd --><a ng-if="includeAdd" ng-click="onAdd &amp;&amp; onAdd()" ng-enter="onAdd &amp;&amp; onAdd()" class="btn-icon ng-scope" title="Thêm nhóm hàng" tabindex="0"><i class="far fa-plus"></i></a><!-- end ngIf: includeAdd -->
                                                                    </div>
                                                                </kv-category-dropdownlist></div>
                                                        </div>
                                                        <div class="form-group" ng-hide="isActiveGppDrugStore"><label class="form-label control-label ng-binding">Thương
                                                                hiệu<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Thương hiệu, nhãn hiệu của sản phẩm"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap" ng-class="product.TradeMarkId > 0 ? 'wrap-icon-edit': ''">
                                                                <kv-trademark-drop-down-list trademark="TradeMark" class="input-group ng-isolate-scope" on-trademark-change="changeTrademark(trademarkId)"><span title="" class="k-widget k-dropdown k-header form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-parse" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-owns="ddlTradeMark_listbox" aria-disabled="false" aria-readonly="false" aria-busy="false" style="" aria-activedescendant="2fa10269-d141-4587-95a6-6ab553cadb04"><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input ng-scope">---Chọn thương
                                                                                hiệu---</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select kendo-drop-down-list="" id="ddlTradeMark" k-data-source="tradeMarkList" k-option-label="'---Chọn thương hiệu---'" k-data-text-field="'Name'" k-data-value-field="'Id'" ng-model="tradeMarkSelectedId" k-value-primitive="true" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-parse" k-filter="'contains'" k-on-change="changeTradeMark()" height="266" data-role="dropdownlist" style="display: none;">
                                                                            <option value="" selected="selected">---Chọn thương
                                                                                hiệu---</option>
                                                                        </select></span>
                                                                    <div class="input-group-append">
                                                                        <!-- ngIf: tradeMarkSelectedId > 0 --> <a class="btn-icon" ng-click="openAddOrEditTrademark(false)" ng-enter="openAddOrEditTrademark(false)" tabindex="0"><i class="far fa-plus"></i></a>
                                                                    </div>
                                                                </kv-trademark-drop-down-list>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" ng-show="product.ProductType!=pTypeValue.Service"><label class="form-label control-label ng-binding">Vị trí<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Sử dụng để ghi lại vị trí mà hàng hóa được cất giữ hoặc trưng bày. Ví dụ: kệ số 1, số 2..."><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap"><kv-shelves-drop-down-list class="input-group ng-isolate-scope" product-shelves-list="product.ProductShelves" on-shelves-list-change="changeShelvesList(shelvesIds)">
                                                                    <div class="k-widget k-multiselect k-header form-control" unselectable="on" title="" style="">
                                                                        <div class="k-multiselect-wrap k-floatwrap" unselectable="on">
                                                                            <ul role="listbox" unselectable="on" class="k-reset"></ul><input class="k-input k-readonly" style="width: 25px" accesskey="" autocomplete="off" role="listbox" aria-expanded="false" tabindex="0" aria-owns="" aria-disabled="false" aria-readonly="false"><span class="k-icon k-loading k-loading-hidden"></span>
                                                                        </div><select kendo-multi-select="multiSlShelves" auto-close="false" height="230" k-data-source="shelvesDataSource" k-filter="'contains'" k-ignore-case="false" k-data-text-field="'Name'" k-data-value-field="'Id'" k-on-change="onChange()" class="form-control" k-value-primitive="true" k-ng-model="shelvestList" k-item-template="'<div>#:data.Name#</div>'" k-tag-template="'<div>#:data.Name#</div>'" k-auto-bind="false" data-role="multiselect" multiple="multiple" aria-disabled="false" aria-readonly="false" style="display: none;"></select><span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-stretch: 100%; font-style: normal; font-weight: 400; letter-spacing: normal; text-transform: none; line-height: 17.03px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;"></span>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <!-- ngIf: (shelvestList && shelvestList.length > 0) -->
                                                                        <a class="btn-icon" ng-click="openAddOrEditShelves(false)" ng-enter="openAddOrEditShelves(false)" tabindex="0"><i class="far fa-plus"></i></a>
                                                                    </div>
                                                                </kv-shelves-drop-down-list></div>
                                                        </div>
                                                        <!-- ngIf: appSetting.TimeSheet && !timeSheetPosParameter.isExpired && _p.has('Commission_Update') -->
                                                        <div class="form-group wrap-upload--image">
                                                            <article class="product-upload product-upload-new posR ng-scope" ng-controller="ProductImageUploadCtrl">
                                                                <ul class="">
                                                                    <li class="li-odd ProductImageUpload">
                                                                        <div>
                                                                            <article class="proListImg uln posR">
                                                                                <kv-swiper kv-page-load="loadPage" kv-count-page="updateTotalPage" template-id="productListTmpl" kv-height="80" item-per-page="pageSize" swiper-name="productSwiper" kv-item-selected="imageActionHandler" class="ng-isolate-scope">
                                                                                    <div class="swiper-container swiperList">
                                                                                        <div class="swiper-wrapper" style="height: 10px; width: 0px;">
                                                                                            <!-- ngRepeat: slide in slides track by slide.Id -->
                                                                                        </div>
                                                                                    </div>
                                                                                </kv-swiper>
                                                                            </article>
                                                                        </div>
                                                                        <div class="img-pr"><label class="img-pr-left custom-upload"><input class="chooseImageFocus ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty" style="display: none;" name="files" id="new-files" type="file" placeholder="Chọn ảnh" kv-file-upload="" ng-model="kvProductAddCtrl.productImages" kv-options="uploadImages" multiple=""> <span class="kv2Btn ng-binding" style="display: none;">Chọn
                                                                                    ảnh</span> <span class="upload-error overSizeFile ng-binding" style="display: none" ng-bind-html="UploadError"></span></label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="uploadImageButton">
                                                                    <!-- ngRepeat: i in [].constructor(5) track by $index -->
                                                                    <li class="show ng-scope"><label for="new-files" ng-keyup="openFileDialog($event)" tabindex="0"><span class="kv2Btn ng-binding">+ Thêm</span>
                                                                            <img src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg" alt=""></label></li>
                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->
                                                                    <li class="show ng-scope"><label for="new-files" ng-keyup="openFileDialog($event)"><span class="kv2Btn ng-binding">+ Thêm</span>
                                                                            <img src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg" alt=""></label></li>
                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->
                                                                    <li class="show ng-scope"><label for="new-files" ng-keyup="openFileDialog($event)"><span class="kv2Btn ng-binding">+ Thêm</span>
                                                                            <img src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg" alt=""></label></li>
                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->
                                                                    <li class="show ng-scope"><label for="new-files" ng-keyup="openFileDialog($event)"><span class="kv2Btn ng-binding">+ Thêm</span>
                                                                            <img src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg" alt=""></label></li>
                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->
                                                                    <li class="show ng-scope"><label for="new-files" ng-keyup="openFileDialog($event)"><span class="kv2Btn ng-binding">+ Thêm</span>
                                                                            <img src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg" alt=""></label></li>
                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->
                                                                </ul>
                                                            </article>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 addPro-right">
                                                        <div ng-show="((!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; (!fromPurchaseOrder &amp;&amp; !fromOrderSupplier)) &amp;&amp; (!appSetting.UseAvgCost||product.Id==0&amp;&amp;appSetting.UseAvgCost)&amp;&amp;product.ProductType!=pTypeValue.Manufactured &amp;&amp; rights.viewCost)&amp;&amp;((!product.ProductFormulas||product.ProductFormulas.length==0) || product.IsBatchExpireControl)" class="form-group"><label class="form-label control-label ng-binding">Giá vốn<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Giá vốn dùng để tính lợi nhuận cho sản phẩm (sẽ tự động thay đổi khi thay đổi phương pháp tính giá vốn)"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap"><input type="text" class="form-control text-right iptPriceCost ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="product.Cost" ng-blur="CalcProductCostAndOnHand();updateListProducts('Cost')" kv-auto-numeric="{isProductPrice: true}" k-min="0"></div>
                                                        </div>
                                                        <div class="form-group isShowAdd"><label class="form-label control-label ng-binding">Giá
                                                                bán</label>
                                                            <div class="form-wrap input-group"><input id="iptBasePriceMaster" type="text" class="form-control text-right iptPriceSale ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="product.BasePrice" ng-blur="updateListProducts('BasePrice'); calPoint('BasePrice', product)" title="Bảng giá chung" kv-auto-numeric="{isProductPrice: true}" k-min="0">
                                                                <div class="input-group-append"><a ng-click="addPricebook()" ng-enter="addPricebook()" class="btn-icon" tabindex="0"><i class="fa fa-tags"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" ng-show="(!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; (!fromPurchaseOrder &amp;&amp; !fromOrderSupplier)) &amp;&amp; product.ProductType==pTypeValue.Purchased &amp;&amp; !product.IsLotSerialControl &amp;&amp; !product.IsBatchExpireControl">
                                                            <label class="form-label control-label ng-binding">Tồn
                                                                kho<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Số lượng tồn kho của sản phẩm (sẽ tự động tạo ra phiếu kiểm kho cho sản phẩm)"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap"><input type="text" class="form-control text-right iptOnHand ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="product.OnHand" ng-blur="CalcProductCostAndOnHand();updateListProducts('OnHand')" kv-auto-numeric="{mDec:3}" k-min="0" ng-disabled="!rights.editOnHand"></div>
                                                        </div>
                                                        <div class="form-group form-cal-size-wrap" ng-show="(appSetting.UseCod || isShowConstructionMaterial) &amp;&amp; product.ProductType!=pTypeValue.Service">
                                                            <label class="form-label control-label ng-binding">Trọng
                                                                lượng<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Sử dụng để tính trọng lượng khi giao hàng"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <!-- ngIf: !isShowConstructionMaterial --><input ng-if="!isShowConstructionMaterial" type="text" class="form-control text-right ng-pristine ng-untouched ng-valid ng-scope ng-empty" ng-model="product.Weight" ng-blur="updateListProducts('Weight')" kv-auto-numeric="{mDec:3}" k-min="0"><!-- end ngIf: !isShowConstructionMaterial --><!-- ngIf: isShowConstructionMaterial -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group ng-hide" ng-show="product.IsRewardPoint &amp;&amp; appSetting.RewardPoint_Type == _rewardPointType.Product">
                                                            <label class="form-label control-label ng-binding">Điểm
                                                                thưởng</label>
                                                            <div class="form-wrap"><input type="text" class="form-control text-right reward-point ng-pristine ng-untouched ng-valid ng-empty" ng-model="product.RewardPoint" ng-blur="calPoint('RewardPoint', product)" kv-auto-numeric="{mDec:0, vMax: 999999}" k-min="0"></div>
                                                        </div>
                                                        <!-- ngIf: isShowConstructionMaterial && pTypeValue && productType == pTypeValue.Purchased --><!-- ngIf: isShowConstructionMaterial && isShowSuggestMatAttr && suggestMaterialAttribute && suggestMaterialAttribute.length > 0 -->
                                                        <div class="selectProductType">
                                                            <!-- ngIf: !(product.ProductUnits && product.ProductUnits.length > 0) || product.IsLotSerialControl || !appSetting.UseMultiUnit -->
                                                            <aside class="pro_chk proSale mb10 ng-scope has-pretty-child" ng-if="!(product.ProductUnits &amp;&amp; product.ProductUnits.length > 0) || product.IsLotSerialControl || !appSetting.UseMultiUnit">
                                                                <div class="clearfix prettycheckbox labelright  blue">
                                                                    <input tabindex="0" type="checkbox" ng-checked="product.AllowsSale" ng-change="updateListProducts('AllowsSale')" kv-pretty-check="" kv-data-label="_l.productAllowsSale" ng-model="product.AllowsSale" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty" data-label="Bán trực tiếp" style="display: none;" checked="checked"><a href="javascript:void(0)" tabindex="0" class="checked"></a>
                                                                    <label for="undefined" class="checked">Bán trực
                                                                        tiếp</label>
                                                                </div> <a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Sản phẩm sẽ xuất hiện trên màn hình bán hàng"><i class="fas fa-info-circle"></i></a>
                                                            </aside>
                                                            <!-- end ngIf: !(product.ProductUnits && product.ProductUnits.length > 0) || product.IsLotSerialControl || !appSetting.UseMultiUnit -->
                                                            <aside class="mb10 pro_chk proSerial has-pretty-child" ng-show="product.ProductType==pTypeValue.Purchased &amp;&amp; appSetting.UseImei &amp;&amp; !isCafe">
                                                                <div class="clearfix prettycheckbox labelright  blue">
                                                                    <input tabindex="0" type="checkbox" kv-pretty-check="" kv-data-label="'Serial/Imei'" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                                    <label for="undefined" class="">Serial/Imei</label>
                                                                </div> <a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Quản lý tồn kho theo mã máy (Serial/IMEI)"><i class="fas fa-info-circle"></i></a>
                                                            </aside><!-- ngIf: appSetting.RewardPoint -->
                                                            <aside class="mb10 pro_chk proSerial has-pretty-child ng-hide" ng-show="product.ProductType==pTypeValue.Purchased &amp;&amp; appSetting.UseBatchExpire &amp;&amp; !isCafe">
                                                                <div class="clearfix prettycheckbox labelright  blue">
                                                                    <input tabindex="0" type="checkbox" kv-pretty-check="" kv-data-label="'Lô, hạn sử dụng'" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                                                                    <label for="undefined" class="">Lô, hạn sử
                                                                        dụng</label>
                                                                </div> <a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Quản lý theo lô, hạn sử dụng"><i class="fas fa-info-circle"></i></a>
                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <article class="proBox product-formPrice ng-scope mb15" ng-show="appSetting.UseVariants" title="" ng-class="product.ProductType==pTypeValue.Purchased&amp;&amp;appSetting.UseMultiUnit?'mb15':''">
                                                <h3 class="cursor " ng-click="activeVariant()" ng-enter="activeVariant()"><a href="" tabindex="0" class="ng-binding">Thuộc tính<i class="fa flr fs14 fa-chevron-down"></i></a></h3>
                                                <!-- ngIf: showInputVariant -->
                                            </article>
                                            <article class="proBox product-UseMultiUnit ng-scope" ng-show="appSetting.UseMultiUnit" title="">
                                                <h3 class="cursor " kv-focus-item="iptUnit" ng-click="showProductUnit = !showProductUnit" ng-enter="showProductUnit = !showProductUnit"><a href="" tabindex="0" class="ng-binding">Đơn vị tính <i class="fa flr fs14 fa-chevron-down"></i></a></h3>
                                                <article class="showUnit proBoxItems ng-hide" ng-show="showProductUnit">
                                                    <div class="form-wrapper form-labels-block mb5">
                                                        <div class="form-inline">
                                                            <div class="form-group"><label class="form-label control-label ng-binding">Đơn vị
                                                                    cơ bản<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Đơn vị của hàng hóa như: hộp, lốc, thùng…"><i class="fas fa-info-circle"></i></a></label>
                                                                <div class="form-wrap">
                                                                    <unit-product-suggestion-input-form all-product-units="product.ProductUnits" unit="product" unit-index="$index" on-select-unit-suggestion="onSelectUnitSuggestion(unit, unitIndex)" is-base-unit="true" on-callback-blur="checkUnitName(item, oldConversionUnit, $index, isBaseUnit)" class="ng-isolate-scope">
                                                                        <autocomplete id="idUnitSuggestSearch" attr-class="dropdown-list-autocomplete" attr-inputid="idSuggestProductNameSearchTerm" attr-inputclass="form-control form-control-sm" attr-baseunitclass="base-unit-class" attr-placeholder="" attr-validspecialchar="Tên đơn vị" attr-required="true" attr-maxlength="50" attr-index="" ng-model="unit.Unit" kv-disabled="formDisabled" template-id="unitSuggestionTempl" data="unitProductSuggestions" on-type="unitProductSuggestionChanged" on-blur="callbackOnBlur" on-select="selectUnitProductSuggestion" is-disable-enter-bar-scanner="true" kv-blocked-search="skipFirstInit" is-not-show-not-found="true" do-not-get-first-by-enter="true" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                                                                            <div class="autocomplete dropdown-list-autocomplete" id=""><input type="text" ng-blur="inputBlur()" autocomplete="off" ng-model="searchParam" maxlength="50" placeholder="" class="form-control form-control-sm iptUnitName_ base-unit-class ng-empty ng-valid-maxlength" id="idSuggestProductNameSearchTerm" tabindex="" ng-disabled="kvDisable" kv-valid-special-chars="Tên đơn vị" required="required">
                                                                                <div ng-show="completing" class="output-complete ng-hide" ng-mousedown="autocompleFocus($event)">
                                                                                    <ul ng-hide="suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; isNotShowNotFound">
                                                                                        <!-- ngRepeat: suggestion in suggestions track by $index -->
                                                                                    </ul>
                                                                                    <div class="autoNotFound ng-hide" ng-show="searchParam &amp;&amp; suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; !isNotShowNotFound">
                                                                                        Không tìm thấy kết quả nào phù
                                                                                        hợp</div>
                                                                                </div>
                                                                            </div>
                                                                        </autocomplete>
                                                                    </unit-product-suggestion-input-form>
                                                                </div>
                                                            </div>
                                                            <!-- ngIf: !product.IsLotSerialControl && product.ProductUnits && product.ProductUnits.length > 0 -->
                                                        </div>
                                                    </div>
                                                    <div class="tblProduct-wrap">
                                                        <!-- ngIf: !product.IsLotSerialControl && appSetting.UseMultiUnit && product.ProductType == pTypeValue.Purchased -->
                                                        <table class="tblProduct mb10 ng-scope ng-hide" ng-if="!product.IsLotSerialControl &amp;&amp; appSetting.UseMultiUnit &amp;&amp; product.ProductType == pTypeValue.Purchased" ng-show="product.ProductUnits.length >0">
                                                            <tbody>
                                                                <tr ng-show="product.ProductUnits.length >0" class="ng-hide">
                                                                    <th class="cell-name"><span class="titleFr ng-binding">Tên đơn
                                                                            vị</span></th>
                                                                    <th class="cell-unit"><span class="titleFr ng-binding">Giá trị quy
                                                                            đổi</span></th>
                                                                    <th class=""><span class="titleFr ng-binding">Giá bán</span>
                                                                    </th>
                                                                    <th class="cell-code" ng-hide="isShowAttrList">
                                                                        <span class="titleFr ng-binding">Mã hàng</span>
                                                                    </th>
                                                                    <th class="cell-code" ng-show="appSetting.UseBarcode &amp;&amp; !isShowAttrList">
                                                                        <span class="titleFr ng-binding">Mã vạch</span>
                                                                    </th>
                                                                    <th class="cell-quantity ng-hide" ng-show="appSetting.RewardPoint_Type == _rewardPointType.Product &amp;&amp; product.IsRewardPoint &amp;&amp; !isShowAttrList">
                                                                        <span class="titleFr ng-binding">Điểm</span>
                                                                    </th>
                                                                    <th><span class="titleFr"></span></th>
                                                                    <th></th>
                                                                </tr><!-- ngRepeat: item in product.ProductUnits -->
                                                            </tbody>
                                                        </table>
                                                        <!-- end ngIf: !product.IsLotSerialControl && appSetting.UseMultiUnit && product.ProductType == pTypeValue.Purchased -->
                                                    </div>
                                                    <!-- ngIf: !product.IsLotSerialControl && appSetting.UseMultiUnit && product.ProductType == pTypeValue.Purchased -->
                                                    <aside class="ovh mb15 ng-scope" ng-if="!product.IsLotSerialControl &amp;&amp; appSetting.UseMultiUnit &amp;&amp; product.ProductType == pTypeValue.Purchased">
                                                        <button type="button" ng-click="addMoreUnit()" ng-enter="addMoreUnit()" class="btn btn-white ng-binding" kv-focus-item="iptUnitName_-1"><i class="far fa-plus"></i>Thêm đơn vị</button>
                                                    </aside>
                                                    <!-- end ngIf: !product.IsLotSerialControl && appSetting.UseMultiUnit && product.ProductType == pTypeValue.Purchased -->
                                                </article>
                                            </article>
                                            <article class="proBox pro-unitList ng-scope ng-hide" ng-show="isShowAttrList">
                                                <h3 class="ng-binding">Danh sách hàng hóa cùng loại</h3>
                                                <kv-attribute-list-table show-cost-price="showCostPrice" from-purchase-order="fromPurchaseOrder" list-products="listProducts" product-type="productType" on-edit-auto-code="onEditAutoGenCode" remove-attr-value="removeTagAttrWhenChangeListProduct()" edit-on-hand="rights.editOnHand" remove-units="removeUnitWhenChangeListProduct()" list-deleted-products="listDeletedProducts" class="ng-isolate-scope">
                                                    <div class="srcUnit proBoxItems">
                                                        <table class="tblUnit">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="ng-binding">Tên</th>
                                                                    <th scope="col" ng-show="listProducts[0].Unit" class="cell-unitUnit ng-binding ng-hide">Đơn vị
                                                                    </th>
                                                                    <th scope="col" class="cell-code ng-binding">Mã
                                                                        hàng</th>
                                                                    <th scope="col" ng-show="$parent.appSetting.UseBarcode" class="ng-binding">Mã vạch</th>
                                                                    <th scope="col" ng-hide="!showCostPrice ||productType == 1 || (listProducts[0].ProductFormulas &amp;&amp; listProducts[0].ProductFormulas.length > 0)" class="ng-binding">Giá vốn</th>
                                                                    <th scope="col" class="ng-binding">Giá bán</th>
                                                                    <th scope="col" ng-hide="productType == 3 || productType == 1 || fromPurchaseOrder || (listProducts[0].IsBatchExpireControl) || listProducts[0].IsLotSerialControl" class="ng-binding">Tồn kho</th>
                                                                    <th scope="col" ng-show="$parent.product.IsRewardPoint &amp;&amp; $parent.appSetting.RewardPoint_Type == $parent._rewardPointType.Product" class="tdPointInput ng-binding ng-hide">Điểm
                                                                    </th>
                                                                    <th class="unitDel"></th>
                                                                </tr>
                                                            </thead>
                                                            <!-- ngRepeat: item in listProducts track by $index -->
                                                        </table>
                                                    </div>
                                                    <div class="txtR txtI proBoxItems ng-binding">Danh sách bao gồm
                                                        hàng hóa cùng loại</div>
                                                    <div>&nbsp;</div>
                                                    <div style="display: none"><kv-product-pricebook-form form-name="productPricebookPopup" class="ng-isolate-scope"></kv-product-pricebook-form></div>
                                                </kv-attribute-list-table>
                                            </article>
                                        </div>
                                    </kv-tab-pane><kv-tab-pane kvtitle="_l.product_desDetailTitle" class="ng-scope ng-isolate-scope" kv-tab-id="2">
                                        <div ng-show="selected" ng-transclude="" class="ng-hide">
                                            <div ng-show="product.ProductType==pTypeValue.Purchased" class="panel panel-default ng-scope">
                                                <h5 class="panel-heading ng-binding">Định mức tồn</h5>
                                                <div class="panel-body">
                                                    <div class="row form-wrapper">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="form-label control-label ng-binding">Ít
                                                                    nhất<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Hệ thống sẽ dựa vào thông tin này để cảnh báo hàng dưới định mức tồn nếu tồn kho < Tồn ít nhất"><i class="fas fa-info-circle"></i></a></label>
                                                                <div class="form-wrap"><input type="text" ng-model="product.MinQuantity" ng-blur="updateListProducts('MinQuantity')" kv-auto-numeric="{mDec:3}" k-min="0" class="tabBut_1 form-control text-right ng-pristine ng-untouched ng-valid ng-not-empty">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="form-label control-label ng-binding">Nhiều
                                                                    nhất<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Hệ thống sẽ dựa vào thông tin này để cảnh báo hàng vượt định mức tồn nếu tồn kho > Tồn nhiều nhất"><i class="fas fa-info-circle"></i></a></label>
                                                                <div class="form-wrap"><input type="text" ng-model="product.MaxQuantity" ng-blur="updateListProducts('MaxQuantity')" kv-auto-numeric="{mDec:3}" k-min="0" class="form-control text-right ng-pristine ng-untouched ng-valid ng-not-empty">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <article class="proBox product-Des mb15 posR ng-scope" title="">
                                                <h3 class="ng-binding">Mô tả</h3>
                                                <div class="proBoxItems">
                                                    <table cellspacing="4" cellpadding="0" class="k-widget k-editor k-header k-editor-widget" role="presentation">
                                                        <tbody>
                                                            <tr role="presentation">
                                                                <td class="k-editor-toolbar-wrap" role="presentation">
                                                                    <ul class="k-editor-toolbar ng-scope" role="toolbar" data-role="editortoolbar">
                                                                        <li class="k-tool-group" role="presentation" tabindex="-1"><span class="k-editor-dropdown k-group-start k-group-end" tabindex="-1"><span title="Format" class="k-widget k-dropdown k-header k-editor-widget" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-owns="" aria-disabled="false" aria-readonly="false" aria-busy="false" style="width: 110px;" aria-activedescendant="57d68efe-beae-4ea0-b03c-2631299b2f94"><span unselectable="on" class="k-dropdown-wrap k-state-default" tabindex="-1"><span unselectable="on" class="k-input" tabindex="-1">Format</span><span unselectable="on" class="k-select" tabindex="-1"><span unselectable="on" class="k-icon k-i-arrow-s" tabindex="-1">select</span></span></span><select title="Format" class="k-formatting k-decorated" data-role="selectbox" unselectable="on" style="width: 110px; display: none;" tabindex="-1">
                                                                                        <option value="p" tabindex="-1">Paragraph
                                                                                        </option>
                                                                                        <option value="blockquote" tabindex="-1">Quotation
                                                                                        </option>
                                                                                        <option value="h1" tabindex="-1">Heading 1
                                                                                        </option>
                                                                                        <option value="h2" tabindex="-1">Heading 2
                                                                                        </option>
                                                                                        <option value="h3" tabindex="-1">Heading 3
                                                                                        </option>
                                                                                        <option value="h4" tabindex="-1">Heading 4
                                                                                        </option>
                                                                                        <option value="h5" tabindex="-1">Heading 5
                                                                                        </option>
                                                                                        <option value="h6" tabindex="-1">Heading 6
                                                                                        </option>
                                                                                    </select></span></span></li>
                                                                        <li class="k-tool-group k-button-group" role="presentation" tabindex="-1"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Bold" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-bold" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Bold</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Italic" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-italic" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Italic</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Underline" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-underline" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Underline</span></a>
                                                                        </li>
                                                                        <li class="k-tool-group k-button-group" role="presentation" tabindex="-1"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Align text left" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-justifyLeft" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Align text
                                                                                    left</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Center text" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-justifyCenter" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Center
                                                                                    text</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Align text right" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-justifyRight" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Align text
                                                                                    right</span></a></li>
                                                                        <li class="k-tool-group k-button-group" role="presentation" tabindex="-1"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Insert unordered list" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-insertUnorderedList" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Insert unordered
                                                                                    list</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Insert ordered list" aria-pressed="false" tabindex="-1"><span unselectable="on" class="k-tool-icon k-insertOrderedList" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Insert ordered
                                                                                    list</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Indent" tabindex="-1"><span unselectable="on" class="k-tool-icon k-indent" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Indent</span></a><a href="" role="button" class="k-tool k-group-end k-state-disabled" unselectable="on" title="Outdent" tabindex="-1"><span unselectable="on" class="k-tool-icon k-outdent" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Outdent</span></a>
                                                                        </li>
                                                                        <li class="k-tool-group k-button-group" role="presentation" tabindex="-1"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Insert hyperlink" tabindex="-1"><span unselectable="on" class="k-tool-icon k-createLink" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Insert
                                                                                    hyperlink</span></a><a href="" role="button" class="k-tool k-state-disabled" unselectable="on" title="Remove hyperlink" tabindex="-1"><span unselectable="on" class="k-tool-icon k-unlink" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Remove
                                                                                    hyperlink</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Insert image" tabindex="-1"><span unselectable="on" class="k-tool-icon k-insertImage" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Insert
                                                                                    image</span></a></li>
                                                                        <li class="k-tool-group k-button-group" role="presentation" tabindex="-1" style="display: none;"><a href="" role="button" class="k-tool k-group-start k-group-end" data-popup="" unselectable="on" title="Create table" tabindex="-1"><span unselectable="on" class="k-tool-icon k-createTable" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Create
                                                                                    table</span></a><a href="" role="button" class="k-tool k-state-disabled" unselectable="on" title="Add column on the left" tabindex="-1"><span unselectable="on" class="k-tool-icon k-addColumnLeft" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Add column on the
                                                                                    left</span></a><a href="" role="button" class="k-tool k-state-disabled" unselectable="on" title="Add column on the right" tabindex="-1"><span unselectable="on" class="k-tool-icon k-addColumnRight" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Add column on the
                                                                                    right</span></a><a href="" role="button" class="k-tool k-state-disabled" unselectable="on" title="Add row above" tabindex="-1"><span unselectable="on" class="k-tool-icon k-addRowAbove" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Add row
                                                                                    above</span></a><a href="" role="button" class="k-tool k-state-disabled" unselectable="on" title="Add row below" tabindex="-1"><span unselectable="on" class="k-tool-icon k-addRowBelow" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Add row
                                                                                    below</span></a><a href="" role="button" class="k-tool k-state-disabled" unselectable="on" title="Delete row" tabindex="-1"><span unselectable="on" class="k-tool-icon k-deleteRow" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Delete
                                                                                    row</span></a><a href="" role="button" class="k-tool k-group-end k-state-disabled" unselectable="on" title="Delete column" tabindex="-1"><span unselectable="on" class="k-tool-icon k-deleteColumn" tabindex="-1"></span><span class="k-tool-text" tabindex="-1">Delete
                                                                                    column</span></a></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="k-editable-area"><iframe title="Editable area. Press F10 for toolbar." frameborder="0" class="k-content" tabindex="0" src="javascript:&quot;&quot;"></iframe>
                                                                    <textarea placeholder="Ghi chú" k-encoded="true" kendo-editor="" k-ng-model="product.Description" k-options="descriptionOptions" maxlength="30000" data-role="editor" autocomplete="off" class="k-content k-raw-content" style="display: none;"></textarea>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </article>
                                            <div class="panel panel-default proBox ng-scope">
                                                <h5 class="panel-heading ng-binding">Mẫu ghi chú (hóa đơn, đặt hàng)
                                                </h5>
                                                <div class="proBoxItems">
                                                    <textarea ng-model="product.OrderTemplate" ng-blur="updateListProducts('OrderTemplate')" class="form-control form-control-noborder ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" rows="5" maxlength="300"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </kv-tab-pane><kv-tab-pane kvtitle="_l.product_RawMaterial" kv-invisible="pTypeValue.Service == productType || product.IsLotSerialControl || product.IsBatchExpireControl || product.ProductType == pTypeValue.Service" kv-tab-id="3" class="ng-scope ng-isolate-scope">
                                        <div ng-show="selected" ng-transclude="" class="ng-hide">
                                            <div class="form-wrapper form-labels-190 ng-scope">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group"><label class="form-label control-label ng-binding">Hàng hóa
                                                                thành phần<a tabindex="-1" class="help icon" kv-tooltip="" data-toggle="tooltip" data-placement="right" data-original-title="Hàng hóa được tạo thành từ nhiều hàng hóa hoặc dịch vụ khác"><i class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <div class="rawName search-autocomplete ng-scope" ng-controller="ProductFormulaAutoCompleteCtrl">
                                                                    <autocomplete ng-model="productSearchTerm" attr-placeholder="Thêm hàng hóa thành phần" template-id="productSearchItemTempl" attr-inputid="productSearchInput" attr-inputclass="tabBut_2" data="products" on-type="searchTermChanged" on-select="addFormula" is-old-style="true" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                                                                        <div class="autocomplete " id=""><i class="far fa-search"></i><input type="text" autocomplete="off" ng-model="searchParam" maxlength="" ng-change="onInputChange(searchParam)" placeholder="Thêm hàng hóa thành phần" class="form-control form-control tabBut_2 iptUnitName_  ng-empty ng-valid-maxlength" id="productSearchInput" tabindex="" ng-disabled="kvDisable" kv-filter-search="">
                                                                            <div class="output-complete ng-hide" ng-show="completing || alwaysOpen" ng-class="{'show-only': showSelectMulti(listSelectMulti, searchParam), 'isMultiSelect': showMultiSelect, 'notFoundMulti' : isNotFoundMultiSelect }" ng-mousedown="autocompleFocus($event)">
                                                                                <ul ng-hide="suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; isNotShowNotFound">
                                                                                    <!-- ngRepeat: suggestion in suggestions track by $index -->
                                                                                </ul>
                                                                                <!-- ngIf: getStateSelectMulti(listSelectMulti, isMultiSelect, suggestions) -->
                                                                                <div class="autoNotFound ng-hide" ng-show="searchParam &amp;&amp; suggestions &amp;&amp; suggestions.length == 0 &amp;&amp; !isNotShowNotFound">
                                                                                    Không tìm thấy kết quả nào phù hợp
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </autocomplete>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group product-RawMaterial ng-hide" ng-show="product.ProductFormulas.length > 0">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <th width="30"></th>
                                                                <th width="60" class="txtC ng-binding">STT</th>
                                                                <th class="tdSLC ng-binding">Mã hàng</th>
                                                                <th class="ng-binding">Tên hàng thành phần</th>
                                                                <th class="txtC tdCKF ng-binding">Số lượng</th>
                                                                <th class="txtR cell-total ng-binding" ng-show="rights.viewCost">Giá vốn</th>
                                                                <th class="txtR tdSLC ng-binding" ng-show="rights.viewCost">Thành tiền</th>
                                                            </tr><!-- ngRepeat: item in product.ProductFormulas -->
                                                            <tr ng-show="rights.viewCost" class="trTotal">
                                                                <td colspan="6" class="txtB txtR ng-binding">Tổng
                                                                    giá vốn thành phần:</td>
                                                                <td class="txtR ng-binding">0</td>
                                                            </tr>
                                                            <tr class="trTotal">
                                                                <td colspan="6" class="txtB txtR ng-binding">Tổng
                                                                    giá bán thành phần:</td>
                                                                <td class="txtR ng-binding">0</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group" ng-show="product.ProductFormulas==null||product.ProductFormulas.length ==0">
                                                    <div class="form-wrap">
                                                        <div class="txtGray txtI ng-binding">Hàng hóa này chưa có định
                                                            lượng nguyên liệu.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </kv-tab-pane><kv-tab-pane kvtitle="_l.warranty_tab_name" kv-invisible="!appSetting.Warranty || pTypeValue.Manufactured == productType || pTypeValue.Manufactured == product.ProductType" kv-tab-id="4" class="ng-scope ng-isolate-scope">
                                        <div ng-show="selected" ng-transclude="" class="ng-hide">
                                            <div class="form-wrapper form-labels-150 guarantee-addProduct ng-scope">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <article class="proBox guarantee-proBox product-form none-guarantees" title="" ng-class="{'none-guarantees': product.GenuineGuarantees.length === 0 &amp;&amp; product.GenuineGuarantees.length === 0}">
                                                            <div class="proBoxItems">
                                                                <aside class="form-group">
                                                                    <div class="window-wrap-table">
                                                                        <table class="guarantee-table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="tdDetail ng-binding">
                                                                                        Bảo hành</th>
                                                                                    <th class="tdExpire"><span class="titleFr ng-binding">Thời
                                                                                            hạn bảo hành</span></th>
                                                                                </tr>
                                                                                <tr ng-hide="product.GenuineGuarantees &amp;&amp; product.GenuineGuarantees.length > 0">
                                                                                    <td colspan="2" class="guarantee-td--custom ng-binding">
                                                                                        Chưa có bảo hành nào</td>
                                                                                </tr>
                                                                                <!-- ngRepeat: item in product.GenuineGuarantees -->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </aside>
                                                                <aside class=""><button type="button" ng-click="addMoreGenuineGuarantees()" class="btn btn-small btn-white focusAMA ng-binding" kv-focus-item="genuine_guarantee_-1" kv-focus-kendo-widget="kendoDropDownList"><i class="far fa-plus"></i>Thêm mốc</button>
                                                                </aside>
                                                            </div>
                                                        </article>
                                                        <article class="proBox guarantee-proBox product-form periodic none-guarantees" ng-class="{'none-guarantees': !product.showMaintenance}">
                                                            <div class="proBoxItems">
                                                                <aside class="form-group">
                                                                    <div class="window-wrap-table">
                                                                        <table class="guarantee-table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="tdDetail ng-binding">
                                                                                        Bảo trì định kỳ</th>
                                                                                    <th class="tdExpire"><span class="titleFr ng-binding">Thời
                                                                                            hạn bảo trì</span></th>
                                                                                </tr>
                                                                                <tr ng-hide="product.showMaintenance">
                                                                                    <td colspan="2" class="guarantee-td--custom ng-binding">
                                                                                        Chưa có bảo trì nào</td>
                                                                                </tr>
                                                                                <!-- ngIf: product.showMaintenance -->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </aside><!-- ngIf: !product.showMaintenance -->
                                                                <aside class="ng-scope" ng-if="!product.showMaintenance"><button type="button" ng-click="product.showMaintenance = true" class="btn btn-small btn-white focusAMA ng-binding" kv-focus-item="periodic_guarantee" kv-focus-kendo-widget="kendoDropDownList"><i class="far fa-plus"></i>Thêm mốc</button>
                                                                </aside><!-- end ngIf: !product.showMaintenance -->
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </kv-tab-pane></div>
                            </div>
                        </kv-tabs></section>
                    <!-- end ngIf: !isActiveGppDrugStore || product.ProductType ==3 || product.ProductType == 1 --><!-- ngIf: isActiveGppDrugStore && product.ProductType !=3 && product.ProductType != 1 -->
                    <div class="kv-window-footer"><a ng-enter="SaveProduct()" ng-click="SaveProduct()" href="javascript:void(0);" class="btn btn-success ng-binding" kv-taga-disabled="saving"><i class="fas fa-save"></i>Lưu</a> <a ng-show="!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; !fromSaleChannel &amp;&amp; omniIsShowOnKv" ng-enter="SaveProductAndRelatedToEcommerce()" ng-click="SaveProductAndRelatedToEcommerce()" href="javascript:void(0);" class="btn btn-success ng-binding ng-hide" kv-taga-disabled="saving"><i class="fas fa-save"></i>Lưu &amp; Liên kết kênh bán</a> <a ng-show="(!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; (!fromPurchaseOrder &amp;&amp; !fromOrderSupplier) &amp;&amp; !fromSaleChannel)" ng-enter="SaveAndContinue()" ng-click="SaveAndContinue()" href="javascript:void(0);" class="btn btn-success ng-binding" kv-taga-disabled="saving"><i class="fas fa-save"></i>Lưu &amp; Thêm mới</a> <a ng-show="(!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; (!fromPurchaseOrder &amp;&amp; !fromOrderSupplier) &amp;&amp; !fromSaleChannel)" ng-enter="SaveAndClone()" ng-click="SaveAndClone()" href="javascript:void(0);" class="btn btn-success ng-binding" kv-taga-disabled="saving"><i class="fas fa-save"></i>Lưu &amp; Sao chép</a><a ng-click="onCancel()" ng-enter="onCancel()" href="javascript:void(0);" class="btn btn-default ng-binding"><i class="fa fa-ban"></i>Bỏ qua</a></div>
                </form><kv-popup id="addProductHelp" class="ng-isolate-scope popupWrapper">
                    <div class="kv2Pop pop popArrow" ng-transclude="">
                        <div data-notify="showtext" class="ng-scope"></div>
                    </div>
                </kv-popup>
            </kv-add-new-product>
        </div>
    </div>

</div>