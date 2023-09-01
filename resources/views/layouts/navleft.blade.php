<h1 class="heading-page"><span class="ng-binding">Hàng hóa</span></h1><kv-product-filter>
    <article class="boxLeft uln leftStatus" ng-show="pTypeFilter.length>1">
        <h3 class="leftTitle ng-binding">Loại hàng <a class="showhideicon" ng-click="showTypeFilter = !showTypeFilter"><i class="fa fa-chevron-circle-up"></i></a></h3>
        <aside class="boxLeftC" ng-hide="showTypeFilter">
            <ul class="pretty-checkbox-mobile ng-scope" ng-if="!isActiveGppDrugStore">
                <li class="has-pretty-child">
                    <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" ng-model="filter.pTypeFilterValues[pTypeFilter[0].key]" kv-change="filterbyProductType" kv-pretty-check="" kv-data-label="(appSetting.UseImei || appSetting.UseManufacturing) ? _l.normalProduct :pTypeFilter[0].value" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" data-label="Hàng hóa thường" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                        <label for="undefined" class="">Hàng hóa thường</label>
                    </div>
                </li>
                <li ng-show="appSetting.UseImei" class="has-pretty-child">
                    <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" ng-model="filter.pImeiFilter" kv-change="filterbyProductType" kv-pretty-check="" kv-data-label="_l.imeiProduct" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" data-label="Hàng hóa - Serial/IMEI" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                        <label for="undefined" class="">Hàng hóa - Serial/IMEI</label>
                    </div>
                </li>
                <li ng-show="appSetting.UseBatchExpire" class="has-pretty-child ng-hide">
                    <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" ng-model="filter.pBatchExpire" kv-change="filterbyProductType" kv-pretty-check="" kv-data-label="_l.batchExpireProduct" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" data-label="Hàng hóa - lô, hạn sử dụng" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                        <label for="undefined" class="">Hàng hóa - lô, hạn sử dụng</label>
                    </div>
                </li>
                <li ng-show="appSetting.UseManufacturing" class="has-pretty-child ng-hide">
                    <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" ng-model="filter.pFormulasFilter" kv-change="filterbyProductType" kv-pretty-check="" kv-data-label="_l.manufacturingProduct" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" data-label="Hàng hóa - sản xuất" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                        <label for="undefined" class="">Hàng hóa - sản xuất</label>
                    </div>
                </li>
                <li class="has-pretty-child">
                    <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" ng-model="filter.pTypeFilterValues[pTypeFilter[1].key]" kv-change="filterbyProductType" kv-pretty-check="" kv-data-label="pTypeFilter[1].value" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" data-label="Dịch vụ" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                        <label for="undefined" class="">Dịch vụ</label>
                    </div>
                </li>
                <li class="has-pretty-child">
                    <div class="clearfix prettycheckbox labelright  blue"><input type="checkbox" ng-model="filter.pTypeFilterValues[pTypeFilter[2].key]" kv-change="filterbyProductType" kv-pretty-check="" kv-data-label="pTypeFilter[2].value" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" data-label="Combo - Đóng gói" style="display: none;"><a href="javascript:void(0)" tabindex="0" class=""></a>
                        <label for="undefined" class="">Combo - Đóng gói</label>
                    </div>
                </li>
            </ul>
        </aside>
    </article>