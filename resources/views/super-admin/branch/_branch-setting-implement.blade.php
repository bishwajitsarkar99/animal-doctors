<?php 
  $dropdowmMenuData = [
    ['groupBox'=>'form-group role_nme form-field-padding branch_select display_none mt-3', 'label'=>'', 'labelClass'=>'branch_label label_position', 'labelFor'=>'branch-search', 'menuLabel'=>'Select Company Branch Name', 'Menusname'=>'select_branch', 'MenusId'=>'select_branch', 'menusClass'=>'form-control select_branch select2', 'menusType'=>'text'],
    ['groupBox'=>'form-group role_nme form-field-padding branch branch_type mt-3','label'=>'', 'labelClass'=>'branch_label label_position branch_type_nme', 'labelFor'=>'branch-type', 'menuLabel'=>'Select Branch Type', 'Menusname'=>'branch_type', 'MenusId'=>'branch_type', 'menusClass'=>'form-control edit_branch_type select2', 'menusType'=>'text'],
  ];
  $inputGroup = [
    ['inputGroupBox'=>'form-group role_nme form-field-padding skeleton open_field display_none','label'=>'', 'inputGroupId'=>'inputBranchNameGroup',
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'branch-name', 
    'formInputLabel'=>'Branch Name', 'formInputName'=>'branch_name', 'formInputId'=>'branchName', 
    'formInputClass'=>'form-control branch_input edit_branch_name', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Branch Name', 'formInputErrorId'=>'savForm_error', 'formInputUpdateError'=>'updateForm_error'],
    ['inputGroupBox'=>'form-group role_nme form-field-padding branch skeleton open_field display_none','label'=>'', 'inputGroupId'=>'inputCityNameGroup',
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'city-name', 
    'formInputLabel'=>'Branch Name', 'formInputName'=>'town_name', 'formInputId'=>'townName', 
    'formInputClass'=>'form-control branch_input edit_town_name', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Town Name', 'formInputErrorId'=>'savForm_error6', 'formInputUpdateError'=>'updateForm_error6'],
    ['inputGroupBox'=>'form-group role_nme form-field-padding branch skeleton open_field display_none','label'=>'', 'inputGroupId'=>'inputLocatioinNameGroup',
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'branch-location', 
    'formInputLabel'=>'Location', 'formInputName'=>'location', 'formInputId'=>'location', 
    'formInputClass'=>'form-control branch_input edit_location', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Location', 'formInputErrorId'=>'savForm_error7', 'formInputUpdateError'=>'updateForm_error7'],

  ];
  $secondColumnDropdownData = [
    ['secondGroupBox'=>'form-group role_nme form-field-padding branch skeleton open_field display_none','secondLabel'=>'', 'dropdownGroupId'=>'dropdwonDivisionNameGroup',
    'secondLabelClass'=>'branch_label label_position division_nme', 'secondLabelFor'=>'division-name', 
    'secondMenuLabel'=>'Select Division', 'secondMenusname'=>'division_id', 'secondMenusId'=>'select_division', 
    'secondMenusClass'=>'form-control edit_division_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error3', 'dropdownUpdateError'=>'updateForm_error3'],
    ['secondGroupBox'=>'form-group role_nme form-field-padding branch skeleton open_field display_none','secondLabel'=>'', 'dropdownGroupId'=>'dropdwonDistrictNameGroup',
    'secondLabelClass'=>'branch_label label_position district_nme', 'secondLabelFor'=>'district-name', 
    'secondMenuLabel'=>'Select District', 'secondMenusname'=>'district_id', 'secondMenusId'=>'select_district', 
    'secondMenusClass'=>'form-control edit_district_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error4', 'dropdownUpdateError'=>'updateForm_error4'],
    ['secondGroupBox'=>'form-group role_nme form-field-padding branch skeleton open_field display_none','secondLabel'=>'', 'dropdownGroupId'=>'dropdwonUpazilaNameGroup',
    'secondLabelClass'=>'branch_label label_position upazila_nme', 'secondLabelFor'=>'upazila-name', 
    'secondMenuLabel'=>'Select Upazila', 'secondMenusname'=>'upazila_id', 'secondMenusId'=>'select_upazila', 
    'secondMenusClass'=>'form-control edit_upazila_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error5', 'dropdownUpdateError'=>'updateForm_error5']
  ];
  $formGroupButtons = [
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus me-5 skeleton-button', 'formGroupButtonId'=>'cancel_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Next','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button', 'formGroupButtonId'=>'next', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Finish','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button display_none', 'formGroupButtonId'=>'save', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
    ['formGroupButtonLabel'=>'Update','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button display_none', 'formGroupButtonId'=>'update_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Delete','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus display_none', 'formGroupButtonId'=>'deleteBranch', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
  ];
  $optationGroupBtns = [
    ['label'=>'Enable New Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'enableNewBranch', 'enableCheck'=>'enableChecking', 'loader'=>'newEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled New Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'disabledNewBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'newDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Enable Update Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'enableUpdateBranch', 'enableCheck'=>'enableChecking', 'loader'=>'updateEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Update Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'disabledUpdatedBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'updateDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Enable Delete Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'enableDeleteBranch', 'enableCheck'=>'enableChecking', 'loader'=>'deleteEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Delete Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'disabledDeleteBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'deleteDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
  ];

?>
<div class="loader-position" id="boxLoading" hidden>
    <div class="spinner-border text-success spinner-width" role="status" id="loaderSpin" hidden>
        <span class="visually-hidden"></span>
    </div>
</div>
<x-CustomCards.Card cardClass="card custom-card component-focus" cardId="settingImplementCard" hiddenAttr="hidden">
    <x-CustomCards.CardHeaders.CardHeader cardHeaderClass="card-header custom-header" cardHeaderId="" hiddenAttr="">
        <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="20" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
        Branch Settings
    </x-CustomCards.CardHeaders.CardHeader>
    <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body" cardBodyId="" hiddenAttr="">
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
            <div class="spinner-border text-success spinner-width" role="status" id="loaderSpinner" hidden>
                <span class="visually-hidden"></span>
            </div>
        </div>
        <x-CustomCards.Card cardClass="card form-control form-control-sm component-focus" cardId="setting_card" hiddenAttr="hidden">
            <div id="formMessage" class="card-message-overlay display_none">
                <div class="animate_box">
                    <img class="box-animation-size" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                </div>
                <svg id="Layer_1" width="35" height="35" data-name="Layer 1" viewBox="0 0 122.88 106.08">
                    <defs>
                    <style>.cls-1{fill-rule:evenodd;}</style>
                    </defs>
                    <title>chat-settings</title>
                    <path class="cls-1" fill="purple" d="M114.07,54.18a29.78,29.78,0,0,0-11.86-7.3V9a9,9,0,0,0-9-9H9A9,9,0,0,0,0,9V75.47a9,9,0,0,0,2.65,6.34l.28.26A9,9,0,0,0,9,84.46H20v17.91a3.71,3.71,0,0,0,3.7,3.71,3.76,3.76,0,0,0,2.78-1.25L47.68,84.46H64.11a30.5,30.5,0,0,0,7.43,12.25,30.07,30.07,0,0,0,42.53-42.53ZM94.8,45.43a30.08,30.08,0,0,0-32,31.63H46.21a3.68,3.68,0,0,0-2.56,1L27.37,93.7v-13A3.71,3.71,0,0,0,23.66,77H9a1.64,1.64,0,0,1-1-.36l-.1-.1a1.58,1.58,0,0,1-.47-1.11V9A1.64,1.64,0,0,1,9,7.41H93.23a1.59,1.59,0,0,1,1.11.48A1.56,1.56,0,0,1,94.8,9V45.43ZM25.43,55.24a3.71,3.71,0,1,1,0-7.41H59.82a3.71,3.71,0,0,1,0,7.41Zm0-21.93a3.71,3.71,0,1,1,0-7.41H76.79a3.71,3.71,0,1,1,0,7.41Zm79.51,28a1.8,1.8,0,0,0-2.57,0l-2,2a12.7,12.7,0,0,0-1.66-.91c-.58-.26-1.18-.49-1.78-.69v-3a1.79,1.79,0,0,0-1.81-1.81H91.39a1.75,1.75,0,0,0-1.27.53,1.72,1.72,0,0,0-.54,1.28v2.76a12.89,12.89,0,0,0-1.83.56,15.32,15.32,0,0,0-1.69.78l-2.17-2.14a1.64,1.64,0,0,0-1.25-.54,1.78,1.78,0,0,0-1.29.54l-2.64,2.65a1.8,1.8,0,0,0,0,2.57l2,2a13.26,13.26,0,0,0-.91,1.66q-.39.87-.69,1.77h-3a1.81,1.81,0,0,0-1.82,1.82v3.77a1.8,1.8,0,0,0,.53,1.27,1.73,1.73,0,0,0,1.29.54h2.75a13.72,13.72,0,0,0,.56,1.82,16.89,16.89,0,0,0,.78,1.73L78,84.35a1.66,1.66,0,0,0-.54,1.26A1.75,1.75,0,0,0,78,86.89l2.65,2.68a1.87,1.87,0,0,0,2.57,0l2-2a12.64,12.64,0,0,0,1.66.9,16.84,16.84,0,0,0,1.78.7v3A1.78,1.78,0,0,0,90.45,94h3.77a1.79,1.79,0,0,0,1.27-.52A1.74,1.74,0,0,0,96,92.18V89.43a13.27,13.27,0,0,0,1.82-.56,16,16,0,0,0,1.73-.78l2.14,2.14a1.76,1.76,0,0,0,2.54,0l2.67-2.65a1.79,1.79,0,0,0,.51-1.29,1.77,1.77,0,0,0-.51-1.28l-2-2a13.39,13.39,0,0,0,.91-1.67q.39-.87.69-1.77h3a1.78,1.78,0,0,0,1.81-1.81V74a1.77,1.77,0,0,0-.52-1.27,1.74,1.74,0,0,0-1.29-.54h-2.75a15.67,15.67,0,0,0-.56-1.81,14.83,14.83,0,0,0-.78-1.71l2.14-2.17a1.64,1.64,0,0,0,.54-1.25,1.78,1.78,0,0,0-.54-1.29l-2.65-2.64ZM92.8,68.05A7.38,7.38,0,0,1,98,70.21a7.53,7.53,0,0,1,1.58,2.35,7.44,7.44,0,0,1,0,5.76,7.34,7.34,0,0,1-3.93,3.94,7.41,7.41,0,0,1-2.89.57,7.31,7.31,0,0,1-2.87-.57,7.46,7.46,0,0,1-2.36-1.58A7.58,7.58,0,0,1,86,78.32a7.56,7.56,0,0,1,0-5.76,7.53,7.53,0,0,1,1.58-2.35,7.43,7.43,0,0,1,5.23-2.16Z"/>
                </svg>
                <span class="loader-text ms-1" id="messgText"></span>
            </div>
            <!-- overlay-loader -->
            <div id="loaderBox" class="card-message-overlay display_none">
                <div class="animate_box">
                    <img class="box-animation-size" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                </div>
            </div>
            <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body focus-color cd branch_form" cardBodyId="table_card_body" hiddenAttr="">
                <input id="branch_id_field" type="text" name="branch_id_field" value="" hidden />
                <input id="generate_id" type="text" name="generate_id" hidden />
                <input id="branch_id" type="text" name="branch_id" class="branch_id_field branch_id" hidden />
                <input type="text" name="branch_id" class="update_branch_id" id="edit_branch_id" hidden>
                <!-- input-form -->
                <x-Forms.Form formClass="" formAutoComplete="off" formId="" >
                    @csrf
                    <div class="row" id="formContent">
                        <div class="col-xl-12">
                            @foreach($dropdowmMenuData as $data)
                                @if($data['groupBox'] === 'form-group role_nme form-field-padding branch_select display_none mt-3' || $data['groupBox'] === 'form-group role_nme form-field-padding branch branch_type mt-3')
                                    <div class="{{ $data['groupBox'] }}">
                                        <x-Dropdown.DropdownMenu 
                                            menuType="{{ $data['menusType'] }}" 
                                            menuClass="{{ $data['menusClass'] }}" 
                                            menuName="{{ $data['Menusname'] }}" 
                                            menuId="{{ $data['MenusId'] }}" 
                                            menuSelectLabel="{{ $data['menuLabel'] }}">
                                            <input type="hidden" id="branches_id">
                                        </x-Dropdown.DropdownMenu>
                                        <span class="input-label">
                                            <label class="{{ $data['labelClass'] }}" for="{{ $data['labelFor'] }}">
                                            {{ $data['label'] }}
                                            </label>
                                        </span>
                                    </div>
                                @endif
                            @endforeach
                            @foreach($inputGroup as $data)
                            @if($data['inputGroupBox'] === 'form-group role_nme form-field-padding skeleton open_field display_none' || $data['inputGroupBox'] === 'form-group role_nme form-field-padding branch skeleton open_field display_none')
                                <div class="{{ $data['inputGroupBox'] }}" id="{{ $data['inputGroupId'] }}">
                                    <x-Inputs.FormInputs.FormInputField formInputFieldClass="{{ $data['formInputClass'] }}" formInputFieldType="{{ $data ['formInputType'] }}" formInputFieldName="{{ $data['formInputName'] }}" formInputFieldId="{{ $data['formInputId'] }}" formInputFieldPlaceHolder="{{ $data['formInputPlaceHolder'] }}" />
                                    <label class="{{ $data['formInputLabelClass'] }}" for="{{ $data['inputLabelFor'] }}">
                                        {{ $data['label'] }}
                                        <span id="{{ $data['formInputErrorId'] }}" hidden></span><span id="{{ $data['formInputUpdateError'] }}" hidden></span>
                                    </label>
                                </div>
                            @endif
                            @endforeach
                            @foreach($secondColumnDropdownData as $data)
                                <div class="{{ $data['secondGroupBox'] }}" id="{{ $data['dropdownGroupId'] }}">
                                    <x-Dropdown.DropdownMenu 
                                        menuType="{{ $data['secondMenusType'] }}" 
                                        menuClass="{{ $data['secondMenusClass'] }}" 
                                        menuName="{{ $data['secondMenusname'] }}" 
                                        menuId="{{ $data['secondMenusId'] }}" 
                                        menuSelectLabel="{{ $data['secondMenuLabel'] }}">
                                        <input type="hidden" id="branches_id">
                                    </x-Dropdown.DropdownMenu>
                                    <span class="input-label">
                                        <label class="{{ $data['secondLabelClass'] }}" for="{{ $data['secondLabelFor'] }}">
                                            {{ $data['secondLabel'] }}
                                            <span id="{{ $data['dropdownUpdateError'] }}" hidden></span>
                                            <span id="{{ $data['dropdownError'] }}" hidden></span>
                                        </label>
                                    </span>
                                </div>
                            @endforeach
                            <div class="form-group role_nme branch mb-1" id="documents" hidden>
                                <table class="info_table">
                                    <thead class="info_table_head">
                                        <tr>
                                            <th class="branch_font label_position">Creator</th>
                                            <th class="branch_font label_position" id="secondHead" hidden>Updator</th>
                                            <th class="branch_font label_position" id="thirdHead" hidden>Approver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="branch_font" id="firstContent">
                                                <label class="image_position" for="user_image"><span id="firstUserImage"></span></label>
                                                <input id="firstUserEmail" disabled>
                                                <input id="firstCreatedBy" disabled>
                                                <input id="firstCreatedAt" disabled>
                                            </td>
                                            <td class="branch_font" id="secondContent" hidden>
                                                <label for="user_image"><span id="secondUserImage"></span></label>
                                                <input id="secondUserEmail" disabled>
                                                <input id="secondUpdateBy" disabled>
                                                <input id="secondUpdateAt" disabled>
                                            </td>
                                            <td class="branch_font" id="thirdContent" hidden>
                                                <label for="user_image"><span id="thirdUserImage"></span></label>
                                                <input id="thirdUserEmail" disabled>
                                                <input id="thirdApprover" disabled>
                                                <input id="thirdUpdateAt" disabled>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="content-view display_none" id="ContentView">
                        <div class="content-text">
                            <span>All data has already been switched to the new branch.</span><br>
                            <span>Please select the branch ID.</span>
                        </div>
                        <div class="select-menu-box">
                            <div>
                                <select class="form-select select-box" size="3" aria-label="size 3 select example" id="SelectBranchID"></select> 
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