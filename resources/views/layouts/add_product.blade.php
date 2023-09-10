<div id="myModal" k-options="options" modal-render="true" role="dialog" uib-modal-window="modal-window" index="0"
    animate="animate"
    class="click-modal k-window-addProduct k-window k-window-poup ng-isolate-scope k-window-content k-content"
    style="width:80%;display: none; min-width: 90px; min-height: 50px;  top: 260px; left: 48.5px; position: fixed; touch-action: pan-y; z-index: 10005; transform: scale(1); opacity: 1;">
    <div class="modal-content k-window-addProduct">
        <div class="modal-header" onclick="closePopupSupplier()" style="padding: 20px;  background-color: #ededed;">
            <span class="close">×</span>
            <div class="headertext header-fixed">
                <span style="font-size: 20px;font-weight: bold">Thêm hàng</span>
            </div>
        </div>

        <div uib-modal-transclude="" style="padding: 20px;"><kv-add-new-product from-order-supplier="false"
                from-purchase-order="false" form-name="productForm" product-listeners="listeners" product-popup="popup"
                product-on-save="onSave(resp)" product-on-cancel="onCancel()" product-on-delete="onDelete(resp)"
                class="ng-scope ng-isolate-scope">
                <form name="formInsert" id="product-add"
                    class="ng-pristine ng-valid ng-valid-maxlength ng-valid-parse">
                    <input type="hidden" name="id" class="formInsert">
                    <!-- ngIf: !isActiveGppDrugStore || product.ProductType ==3 || product.ProductType == 1 -->
                    <section class="boxInfo addProduct uln fr  addProductNotDrug"
                        ng-if="!isActiveGppDrugStore || product.ProductType ==3 || product.ProductType == 1"><kv-tabs
                            id="pro_tabs" ng-model="proTabs"
                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
                            <div class="kvTabs clearfix ulN">
                                <ul class="mr-bg"><!-- ngRepeat: pane in panes -->
                                    <li ng-repeat="pane in panes" class="ng-scope"><a skip-disable="" tabindex="-1"
                                            kv-focus-item="tabBut_0" ng-click="select(pane, false, $index)"
                                            class="tabBut_0  tabbut_new active"
                                            ng-class="{'active':pane.selected}">Thông tin</a></li>

                                </ul>
                                <div class="tabBg"></div>
                                <div ng-transclude=""><kv-tab-pane kvtitle="_l.baseProductInfo" kv-tab-id="1"
                                        class="ng-scope ng-isolate-scope">
                                        <div ng-show="selected" ng-transclude="">
                                            <div class="form-wrapper ng-scope">
                                                <div class="row pro_baseForm">
                                                    <div class="col-md-6 addPro-left">
                                                        <div class="form-group"><label
                                                                class="form-label control-label ng-binding">Mã hàng<a
                                                                    tabindex="-1" class="help icon" kv-tooltip=""
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    data-original-title="Mã hàng là thông tin duy nhất"><i
                                                                        class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <div class="autocomplete suggest-product-search"
                                                                    id=""><input type="text"
                                                                        maxlength="40"
                                                                        placeholder="Mã hàng tự động"
                                                                        class="formInsert iptCode tabBut_0 form-control iptUnitName_  ng-empty ng-valid-maxlength ng-touched"
                                                                        tabindex="" name="code">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" ng-show="appSetting.UseBarcode"><label
                                                                class="form-label control-label ng-binding">Mã vạch<a
                                                                    tabindex="-1" class="help icon" kv-tooltip=""
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    data-original-title="Mã vạch của hàng hóa thường được tạo ra bởi nhà sản xuất"><i
                                                                        class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <div class="autocomplete suggest-product-search"
                                                                    id="">
                                                                    <input type="text" 
                                                                        autocomplete="off" name="barcode"
                                                                        maxlength="16" placeholder=""
                                                                        class="formInsert form-control iptUnitName_  ng-empty ng-valid-maxlength"
                                                                        id="idSuggestProductBarcodeSearchTerm"
                                                                        tabindex="" ng-disabled="kvDisable"
                                                                        kv-valid-special-chars="Mã vạch">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label
                                                                class="form-label control-label ng-binding">Tên hàng<a
                                                                    tabindex="-1" class="help icon" kv-tooltip=""
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    data-original-title="Tên hàng là tên của sản phẩm"><i
                                                                        class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <div class="autocomplete suggest-product-search"
                                                                    id=""><input type="text"
                                                                    name="name"
                                                                        ng-model="searchParam" maxlength="255"
                                                                        placeholder=""
                                                                        class="formInsert form-control iptUnitName_  ng-empty ng-valid-maxlength"
                                                                        id="idSuggestProductNameSearchTerm"
                                                                        tabindex="" ng-disabled="kvDisable"
                                                                        kv-valid-special-chars="Tên hàng"
                                                                        required="required">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- ngIf: appSetting.TimeSheet && !timeSheetPosParameter.isExpired && _p.has('Commission_Update') -->
                                                        <div class="form-group wrap-upload--image">
                                                            <article
                                                                class="product-upload product-upload-new posR ng-scope"
                                                                ng-controller="ProductImageUploadCtrl">
                                                                <ul class="">
                                                                    <li class="li-odd ProductImageUpload">
                                                                        <div>
                                                                            <article class="proListImg uln posR">
                                                                                <kv-swiper kv-page-load="loadPage"
                                                                                    kv-count-page="updateTotalPage"
                                                                                    template-id="productListTmpl"
                                                                                    kv-height="80"
                                                                                    item-per-page="pageSize"
                                                                                    swiper-name="productSwiper"
                                                                                    kv-item-selected="imageActionHandler"
                                                                                    class="ng-isolate-scope">
                                                                                    <div
                                                                                        class="swiper-container swiperList">
                                                                                        <div class="swiper-wrapper"
                                                                                            style="height: 10px; width: 0px;">
                                                                                            <!-- ngRepeat: slide in slides track by slide.Id -->
                                                                                        </div>
                                                                                    </div>
                                                                                </kv-swiper>
                                                                            </article>
                                                                        </div>
                                                                        <div class="img-pr"><label
                                                                                class="img-pr-left custom-upload">
                                                                                <input
                                                                                    class="formInsert chooseImageFocus ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty"
                                                                                    style="display: none;"
                                                                                    name="files" id="new-files"
                                                                                    type="file"
                                                                                    placeholder="Chọn ảnh"
                                                                                    onchange="loadFile(event)">
                                                                                <span class="kv2Btn ng-binding"
                                                                                    style="display: none;">Chọn
                                                                                    ảnh</span> <span
                                                                                    class="upload-error overSizeFile ng-binding"
                                                                                    style="display: none"
                                                                                    ng-bind-html="UploadError"></span></label>
                                                                        </div>
                                                                    </li>
                                                                </ul>

                                                                <ul class="uploadImageButton">
                                                                    <!-- ngRepeat: i in [].constructor(5) track by $index -->
                                                                    <li class="show ng-scope"><label for="new-files"
                                                                            ng-keyup="openFileDialog($event)"
                                                                            tabindex="0"><span
                                                                                class="kv2Btn ng-binding" id="text-add">+ Thêm</span>
                                                                            <img id="output"  src="https://cdn-app.kiotviet.vn/retailler/Content/img/default-product-img.jpg"
                                                                                alt=""></label></li>
                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->

                                                                    <!-- end ngRepeat: i in [].constructor(5) track by $index -->
                                                                </ul>
                                                            </article>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 addPro-right">
                                                        <div ng-show="((!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; (!fromPurchaseOrder &amp;&amp; !fromOrderSupplier)) &amp;&amp; (!appSetting.UseAvgCost||product.Id==0&amp;&amp;appSetting.UseAvgCost)&amp;&amp;product.ProductType!=pTypeValue.Manufactured &amp;&amp; rights.viewCost)&amp;&amp;((!product.ProductFormulas||product.ProductFormulas.length==0) || product.IsBatchExpireControl)"
                                                            class="form-group"><label
                                                                class="form-label control-label ng-binding">Giá vốn<a
                                                                    tabindex="-1" class="help icon" kv-tooltip=""
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    data-original-title="Giá vốn dùng để tính lợi nhuận cho sản phẩm (sẽ tự động thay đổi khi thay đổi phương pháp tính giá vốn)"><i
                                                                        class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap"><input data-type="currency" type="text" name="price_capital" min="0"
                                                                    class="formInsert form-control text-right iptPriceCost ng-pristine ng-untouched ng-valid ng-not-empty"
                                                                    ></div>
                                                        </div>
                                                        <div class="form-group isShowAdd"><label
                                                                class="form-label control-label ng-binding">Giá
                                                                bán</label>
                                                            <div class="form-wrap input-group">
                                                                <input id="iptBasePriceMaster" type="text" name="price_sell"
                                                                    class="formInsert form-control text-right iptPriceSale ng-pristine ng-untouched ng-valid ng-not-empty"
                                                                    data-type="currency"  min="0" title="Bảng giá chung">
                                                                <div class="input-group-append"><a
                                                                        ng-click="addPricebook()"
                                                                        ng-enter="addPricebook()" class="btn-icon"
                                                                        tabindex="0"><i class="fa fa-tags"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"
                                                            ng-show="(!fromPurchaseOrder &amp;&amp; !fromOrderSupplier &amp;&amp; (!fromPurchaseOrder &amp;&amp; !fromOrderSupplier)) &amp;&amp; product.ProductType==pTypeValue.Purchased &amp;&amp; !product.IsLotSerialControl &amp;&amp; !product.IsBatchExpireControl">
                                                            <label class="form-label control-label ng-binding">Tồn
                                                                kho<a tabindex="-1" class="help icon"><i
                                                                        class="fas fa-info-circle"></i></a></label>
                                                            <div class="form-wrap">
                                                                <input type="text"  value="0"
                                                                    class="formInsert form-control text-right iptOnHand ng-pristine ng-untouched ng-valid ng-not-empty"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                        <!-- ngIf: isShowConstructionMaterial && pTypeValue && productType == pTypeValue.Purchased --><!-- ngIf: isShowConstructionMaterial && isShowSuggestMatAttr && suggestMaterialAttribute && suggestMaterialAttribute.length > 0 -->

                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                </div>
                        </kv-tabs></section>
                    <!-- end ngIf: !isActiveGppDrugStore || product.ProductType ==3 || product.ProductType == 1 --><!-- ngIf: isActiveGppDrugStore && product.ProductType !=3 && product.ProductType != 1 -->
                    <div class="kv-window-footer"><a id="insert-click" class="btn btn-success ng-binding"
                            kv-taga-disabled="saving"><i class="fas fa-save"></i>Lưu</a> <a id="closeProductModal"
                            onclick="closePopupSupplier()" class="btn btn-default ng-binding"><i class="fa fa-ban"></i>Bỏ
                            qua</a></div>
                </form>
            </kv-add-new-product>
        </div>
    </div>

</div>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
            document.getElementById('text-add').innerHTML =""
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    $(document).on("click", "#insert-click", function() {
        var values = new FormData($("form[name='formInsert']")[0]);

        let _this = this
        BtnLoading(_this)

        $.ajax({
            url: "/api/product",
            type: "post",
            data: values,
            processData: false,  // Prevent jQuery from processing the data
            contentType: false,  // Prevent jQuery from setting the content type
            success: function(response) {
                BtnReset(_this)
                toastr.success(response.message)
                getProducts()
                closePopupSupplier()

            },
            error: function(jqXHR, textStatus, errorThrown) {
                BtnReset(_this)
                toastr.error(jqXHR.responseJSON.message)

            }
        });
    })

   
</script>
