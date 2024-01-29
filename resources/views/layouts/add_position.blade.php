<div id="addPositionModal" class="k-widget k-window k-window-poup k-window-addShelves kv-window" data-role="draggable" style="padding-top: 62px; min-width: 90px; min-height: 50px; width: 500px; display: none;z-index:null; touch-action: pan-y; opacity: 1; transform: scale(1); left: 514px; top: 419.2px;">
    <div class="k-window-titlebar k-header" style="margin-top: -62px;">&nbsp;<span class="k-window-title">Thêm mới vị trí</span>
        <div class="k-window-actions"><a role="button" href="javascript:void(0)" class="k-window-action k-link"><span role="presentation" class="close-position k-icon k-i-close">Close</span></a></div>
    </div>
    <div kendo-window="myKendoWindow" k-options="options" modal-render="true" role="dialog" uib-modal-window="modal-window" index="1" animate="animate" class="ng-isolate-scope k-window-content k-content" data-role="window" tabindex="-1" style="">
        <div uib-modal-transclude=""><kv-shelves-add-or-edit shelves="shelves" on-cancel="onCancel()" on-delete="onDelete(shelvesId)" on-save="onSave(savedShelves)" class="ng-scope ng-isolate-scope">
                <div class="form-wrapper form-labels-90">
                    <div class="form-group"><label class="form-label control-label ng-binding">Tên vị trí</label>
                        <div class="form-wrap"><input id="shelvesAddOrEdit" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-model="shelves.Name"></div>
                    </div>
                </div>
                <div class="kv-window-footer"><a href="javascript:void(0);" ng-click="save()" ng-enter="save()" kv-taga-disabled="saving" class="btn btn-success ng-binding"><i class="fas fa-save"></i>Lưu</a> <a href="javascript:void(0);" id="closePositionModal" class="btn btn-default ng-binding"><i class="far fa-ban"></i>Bỏ qua</a> <!-- ngIf: isEdit --></div>
            </kv-shelves-add-or-edit></div>
    </div>
</div>