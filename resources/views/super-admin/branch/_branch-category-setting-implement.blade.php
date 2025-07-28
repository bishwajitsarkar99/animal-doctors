<?php 
  $formGroupButtons = [
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm danger-repl-btn me-5 skeleton-button', 'formGroupButtonId'=>'branch_type_cancel', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Create','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button', 'formGroupButtonId'=>'branch_type_create', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Update','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button display_none', 'formGroupButtonId'=>'branch_type_update', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Delete','formGroupButtonClass'=>'btn btn-sm success-shadow-btn display_none', 'formGroupButtonId'=>'branch_type_delete', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
  ];
  $optationGroupBtns = [
    ['label'=>'Enable Category', 'btnType'=>'button', 'btnClass'=>'btn btn-sm success-shadow-btn', 'enableBtnId'=>'enableCategoryBranch', 'enableCheck'=>'enableChecking', 'loader'=>'newEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Category', 'btnType'=>'button', 'btnClass'=>'btn btn-sm success-shadow-btn', 'enableBtnId'=>'disabledCategoryBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'newDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Enable Update', 'btnType'=>'button', 'btnClass'=>'btn btn-sm success-shadow-btn', 'enableBtnId'=>'enableUpdateCategory', 'enableCheck'=>'enableChecking', 'loader'=>'updateEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Update', 'btnType'=>'button', 'btnClass'=>'btn btn-sm success-shadow-btn', 'enableBtnId'=>'disabledUpdatedCategory', 'enableCheck'=>'disabledChecking', 'loader'=>'updateDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Enable Delete', 'btnType'=>'button', 'btnClass'=>'btn btn-sm success-shadow-btn', 'enableBtnId'=>'enableDeleteCategory', 'enableCheck'=>'enableChecking', 'loader'=>'deleteEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Delete', 'btnType'=>'button', 'btnClass'=>'btn btn-sm success-shadow-btn', 'enableBtnId'=>'disabledDeleteCategory', 'enableCheck'=>'disabledChecking', 'loader'=>'deleteDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
  ];

?>
<div>
    <div class="loader-position" id="loading" hidden>
        <div class="spinner-border text-success spinner-width" role="status" id="loadingSpin" hidden>
            <span class="visually-hidden"></span>
        </div>
    </div>
    <x-CustomCards.Card cardClass="card custom-card component-focus group-card" drag="true" cardId="settingCard" hiddenAttr="hidden">
        <x-CustomCards.CardHeaders.CardHeader cardHeaderClass="card-header custom-header" cardHeaderId="" hiddenAttr="">
            <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="15" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
            Branch Category Settings
        </x-CustomCards.CardHeaders.CardHeader>
        <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body responsive-card pt-3" cardBodyId="" hiddenAttr="">
            <div class="optation-group-btn" id="SettingActionButton">
                @foreach($optationGroupBtns as $data)
                    <?php
                        $hiddenAttrBtn = $data['hiddenAttributeBtn'] === 'hidden' ? 'hidden' : '';
                        $hiddenAttrLoader = $data['hiddenAttributeLoader'] === 'hidden' ? 'hidden' : '';
                        $hiddenAttrCheckMark = $data['hiddenAttributeCheckMark'] === 'hidden' ? 'hidden' : '';
                    ?>
                    <button type="{{ $data['btnType'] }}" class="{{ $data['btnClass'] }}" id="{{ $data['enableBtnId'] }}" {{$hiddenAttrBtn}}>
                        <i class="fa-solid fa-check {{ $data['enableCheck'] }}" style="color:white;" {{$hiddenAttrCheckMark}}></i>
                        {{ $data['label'] }}
                    </button>
                @endforeach
                <div class="spinner-border text-success spinner-width" role="status" id="loadingSpinner" hidden>
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <x-CustomCards.Card cardClass="card form-control form-control-sm component-focus" cardId="setting__card" hiddenAttr="hidden">
                <!-- overlay-loader -->
                <div id="loadingBox" class="card-message-overlay display_none">
                    <div class="animate_box">
                        <img class="box-animation-size" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                    </div>
                </div>
                <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body focus-color cd branch_form" cardBodyId="table_card_body" hiddenAttr="">
                    <!-- input-form -->
                    <x-Forms.Form formClass="" formAutoComplete="off" formId="" >
                        @csrf
                        <div class="row" id="formContent">
                            <div class="col-xl-12">
                                <div class="form-group role_nme form-field-padding branch_select display_none mb-3" id="dropBox">
                                    <x-Dropdown.DropdownMenu 
                                        menuType="text" 
                                        menuClass="form-control select_branch branch_category_name select2" 
                                        menuName="branch_category_name" 
                                        menuId="branch_category_name" 
                                        menuSelectLabel="Select Branch Category Name">
                                        <input type="hidden" id="branch_category_id">
                                    </x-Dropdown.DropdownMenu>
                                </div>
                                <div class="form-group role_nme form-field-padding skeleton display_none" id="inputBranchCategory">
                                    <x-Inputs.FormInputs.FormInputField 
                                        formInputFieldClass="form-control branch_input edit_branch_category_name" 
                                        formInputFieldType="text" 
                                        formInputFieldName="branch_category_name" 
                                        formInputFieldId="branchTypeName" 
                                        formInputFieldPlaceHolder="Branch Category Name" 
                                    />
                                    <label class="branch_label label_position" for="branch-category">
                                        <span id="savForm_error_branch" hidden></span><span id="updateForm_error_branch" hidden></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex pe-1 setting_btn_group">
                            @foreach($formGroupButtons as $data)
                                <?php
                                $disabledAttr = $data['disabledAttribute'] === 'disabled' ? 'disabled' : '';
                                ?>
                                <x-Buttons.FormMediumButton 
                                label="{{ $data['formGroupButtonLabel'] }}" 
                                buttonParentClass="{{ $data['formGroupButtonClass'] }}" 
                                buttonChildClass="" 
                                buttonId="{{ $data['formGroupButtonId'] }}" 
                                iconClass="{{ $data['groupIconClass'] }}" 
                                labelClass="{{ $data['formGroupButtonSpinerText'] }}"
                                :disabledAttr="$disabledAttr"
                                />
                            @endforeach
                        </div>
                    </x-Forms.Form>
                </x-CustomCards.CardBodies.CardBody>
            </x-CustomCards.Card>
        </x-CustomCards.CardBodies.CardBody>
    </x-CustomCards.Card>
</div>