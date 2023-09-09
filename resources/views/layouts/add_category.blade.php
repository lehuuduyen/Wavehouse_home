<div id="addCategoryModal" class="k-widget k-window k-window-poup k-window-fix k-window-categoryProduct kv-window" data-role="draggable" style="padding-top: 62px; min-width: 90px; min-height: 50px; width: 460px; display: none; top: 163.5px; left: 534px; position: fixed; touch-action: pan-y; z-index: 10005; transform: scale(0.7);">
    <div class="k-window-titlebar k-header" style="margin-top: -62px;">&nbsp;<span class="k-window-title">Thêm nhóm hàng</span>
        <div class="k-window-actions"><a role="button" href="javascript:void(0)" class="k-window-action k-link"><span role="presentation" class="close-group k-icon k-i-close">Close</span></a></div>
    </div>
    <div kendo-window="categoryWindow" k-visible="false" k-resizable="false" k-draggable="true" k-pinned="true" k-width="460" k-modal="true" data-role="window" class="k-window-content k-content" style="display: block;" tabindex="0">
        <div class="form-wrapper">
            <div class="form-group"><label class="form-label control-label ng-binding">Tên nhóm</label>
                <div class="form-wrap">
                <input type="text" id="categoryName" maxlength="255" placeholder="" class="form-control  iptUnitName_ " id="idCategorySearchTerm" tabindex="">
                </div>
            </div>
            <!-- <div class="form-group"><label class="form-label control-label ng-binding">Nhóm cha</label>
                <div class="form-wrap"><kv-category-dropdownlist class="input-group ng-isolate-scope" selected-id="category.ParentId" child-id="category.Id"><span title="" class="k-widget k-dropdown k-header form-control" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-readonly="false" style="width: 100%;" aria-busy="false" aria-activedescendant="a0d645d2-bdf1-4ad1-8f69-915e23374a04"><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input ng-scope"> ---Lựa chọn---</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select kendo-drop-down-list="" id="ddlCat448" class=" form-control" k-options="categorySelectOptions" k-ng-model="selectedId" k-filter="'contains'" k-value-primitive="true" data-option-label="{Name: _l.globalSelect1,Id:null}" style="width: 100%; display: none;" data-role="dropdownlist">
                                <option value="null"> ---Lựa chọn---</option>
                                <option value="558704">tai nghe</option>
                            </select></span></kv-category-dropdownlist></div>
            </div> -->
        </div>
        <div class="kv-window-footer"><a class="btn btn-success ng-binding" id="saveCategory">
                <i class="fas fa-save"></i>Lưu</a> <a href="javascript:void(0);" class="btn btn-default ng-binding" id="closeSupplierModal"><i class="far fa-ban"></i>Bỏ qua</a> <a href="" class="btn btn-danger ng-binding ng-hide" ng-show="category.Id>0" ng-click="delete()" ng-enter="delete()" ng-keydown="$event.keyCode == 27 &amp;&amp; cancel()"><i class="far fa-trash-alt"></i>Xóa</a>
        </div>
    </div>
</div>