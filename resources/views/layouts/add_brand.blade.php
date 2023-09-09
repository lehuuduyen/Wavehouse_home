<div id="addBrandModal" class="k-widget k-window k-window-poup k-window-addTrademark kv-window" data-role="draggable" style="padding-top: 62px; min-width: 90px; min-height: 50px; width: 500px; display: none;z-index:null; touch-action: pan-y; opacity: 1; transform: scale(1); left: 514px; top: 221.6px;">
    <div class="k-window-titlebar k-header" style="margin-top: -62px;">&nbsp;<span class="k-window-title">Thêm mới thương hiệu</span>
        <div class="k-window-actions"><a role="button" href="javascript:void(0)" class="k-window-action k-link"><span role="presentation" class="close-brand k-icon k-i-close">Close</span></a></div>
    </div>
    <div kendo-window="myKendoWindow" k-options="options" modal-render="true" role="dialog" uib-modal-window="modal-window" index="1" animate="animate" class="ng-isolate-scope k-window-content k-content" data-role="window" tabindex="-1" style="">
        <div uib-modal-transclude=""><kv-trademark-add-or-edit trademark-json="" on-cancel="onCancel()" on-delete="onDelete()" on-save="onSave(savedTrademark)" class="ng-scope ng-isolate-scope">
                <div class="form-wrapper">
                    <div class="form-group"><label class="form-label control-label ng-binding">Tên thương hiệu</label>
                        <div class="form-wrap">
                            <input type="text" id="brandName" maxlength="255" placeholder="" class="form-control  iptUnitName_ " id="idCategorySearchTerm" tabindex="">
                        </div>
                    </div>
                </div>
                <div class="kv-window-footer">
                    <a href="javascript:void(0);" id="saveBrand" class="btn btn-success ng-binding"><i class="fas fa-save"></i>Lưu</a>
                    <a href="javascript:void(0);" id="closeBrandModal" class="btn btn-default ng-binding"><i class="fa fa-ban"></i>Bỏ qua</a>
                </div>
            </kv-trademark-add-or-edit></div>
    </div>
</div>