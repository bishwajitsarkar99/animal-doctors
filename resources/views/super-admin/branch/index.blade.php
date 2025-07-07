<?php 
  $dropdowmMenuData = [
    ['groupBox'=>'form-group role_nme form-field-padding skeleton display_none mt-3', 'label'=>'', 'labelClass'=>'branch_label label_position', 'labelFor'=>'branch-search', 'menuLabel'=>'Select Company Branch Name', 'Menusname'=>'select_branch', 'MenusId'=>'select_branch', 'menusClass'=>'form-control select_branch select2', 'menusType'=>'text'],
    ['groupBox'=>'form-group role_nme form-field-padding branch skeleton mt-3','label'=>'', 'labelClass'=>'branch_label label_position branch_type_nme', 'labelFor'=>'branch-type', 'menuLabel'=>'Select Branch Type', 'Menusname'=>'branch_type', 'MenusId'=>'branch_type', 'menusClass'=>'form-control edit_branch_type select2', 'menusType'=>'text'],
  ];
  $inputGroup = [
    ['inputGroupBox'=>'form-group role_nme form-field-padding skeleton display_none','label'=>'', 'inputGroupId'=>'inputBranchNameGroup',
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'branch-name', 
    'formInputLabel'=>'Branch Name', 'formInputName'=>'branch_name', 'formInputId'=>'branchName', 
    'formInputClass'=>'form-control branch_input edit_branch_name', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Branch Name', 'formInputErrorId'=>'savForm_error', 'formInputUpdateError'=>'updateForm_error'],
    ['inputGroupBox'=>'form-group role_nme form-field-padding branch skeleton display_none','label'=>'', 'inputGroupId'=>'inputCityNameGroup',
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'city-name', 
    'formInputLabel'=>'Branch Name', 'formInputName'=>'town_name', 'formInputId'=>'townName', 
    'formInputClass'=>'form-control branch_input edit_town_name', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Town Name', 'formInputErrorId'=>'savForm_error6', 'formInputUpdateError'=>'updateForm_error6'],
    ['inputGroupBox'=>'form-group role_nme form-field-padding branch skeleton display_none','label'=>'', 'inputGroupId'=>'inputLocatioinNameGroup',
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'branch-location', 
    'formInputLabel'=>'Location', 'formInputName'=>'location', 'formInputId'=>'location', 
    'formInputClass'=>'form-control branch_input edit_location', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Location', 'formInputErrorId'=>'savForm_error7', 'formInputUpdateError'=>'updateForm_error7'],

  ];
  $secondColumnDropdownData = [
    ['secondGroupBox'=>'form-group role_nme form-field-padding branch skeleton display_none','secondLabel'=>'', 'dropdownGroupId'=>'dropdwonDivisionNameGroup',
    'secondLabelClass'=>'branch_label label_position division_nme', 'secondLabelFor'=>'division-name', 
    'secondMenuLabel'=>'Select Division', 'secondMenusname'=>'division_id', 'secondMenusId'=>'select_division', 
    'secondMenusClass'=>'form-control edit_division_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error3', 'dropdownUpdateError'=>'updateForm_error3'],
    ['secondGroupBox'=>'form-group role_nme form-field-padding branch skeleton display_none','secondLabel'=>'', 'dropdownGroupId'=>'dropdwonDistrictNameGroup',
    'secondLabelClass'=>'branch_label label_position district_nme', 'secondLabelFor'=>'district-name', 
    'secondMenuLabel'=>'Select District', 'secondMenusname'=>'district_id', 'secondMenusId'=>'select_district', 
    'secondMenusClass'=>'form-control edit_district_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error4', 'dropdownUpdateError'=>'updateForm_error4'],
    ['secondGroupBox'=>'form-group role_nme form-field-padding branch skeleton display_none','secondLabel'=>'', 'dropdownGroupId'=>'dropdwonUpazilaNameGroup',
    'secondLabelClass'=>'branch_label label_position upazila_nme', 'secondLabelFor'=>'upazila-name', 
    'secondMenuLabel'=>'Select Upazila', 'secondMenusname'=>'upazila_id', 'secondMenusId'=>'select_upazila', 
    'secondMenusClass'=>'form-control edit_upazila_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error5', 'dropdownUpdateError'=>'updateForm_error5']
  ];
  $formGroupButtons = [
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus me-5 skeleton-button', 'formGroupButtonId'=>'cancel_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Next','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button', 'formGroupButtonId'=>'next', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Finish','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button display_none', 'formGroupButtonId'=>'save', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
    ['formGroupButtonLabel'=>'Update','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button display_none', 'formGroupButtonId'=>'update_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
    ['formGroupButtonLabel'=>'Delete','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus display_none', 'formGroupButtonId'=>'deleteBranch', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
  ];
  $optationGroupBtns = [
    ['label'=>'Enable New Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'enableNewBranch', 'enableCheck'=>'enableChecking', 'loader'=>'newEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled New Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'disabledNewBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'newDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Enable Update Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'enableUpdateBranch', 'enableCheck'=>'enableChecking', 'loader'=>'updateEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Update Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'disabledUpdatedBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'updateDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Enable Delete Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'enableDeleteBranch', 'enableCheck'=>'enableChecking', 'loader'=>'deleteEnableLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
    ['label'=>'Disabled Delete Branch', 'btnType'=>'button', 'btnClass'=>'btn btn-sm cgt_btn', 'enableBtnId'=>'disabledDeleteBranch', 'enableCheck'=>'disabledChecking', 'loader'=>'deleteDisabledLoader', 'hiddenAttributeBtn'=>'hidden', 'hiddenAttributeLoader'=>'hidden', 'hiddenAttributeCheckMark'=>'hidden'],
  ];
  // Table-Head-th
  $headThRows = [
    ['label'=>'SN.', 'className'=>'th-head skeleton', 'styleShow'=>'width:5%;text-align:center;'],
    ['label'=>'Branch-Type', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Branch-ID', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Branch-Name', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Division', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'District', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Upazila', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'City', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Location', 'className'=>'th-head skeleton', 'styleShow'=>''],
  ];
  $hiddenAttr = 'hidden';
  // Custom Left Side Tab Panel Button
  $customLeftSideTabPanelGroupBtns = [
    ['labelName'=>'Home', 'btnClass'=>'btn btn-sm custom-tab-btn active','btnType'=>'button', 'btnId'=>'v-pills-home-tab', 'toggle'=>'pill', 'target'=>'#v-pills-home', 'btnRole'=>'tab', 'controls'=>'v-pills-home', 'selected'=>'true'],
    ['labelName'=>'Branch', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-branch-tab', 'toggle'=>'pill', 'target'=>'#v-pills-branch', 'btnRole'=>'tab', 'controls'=>'v-pills-branch', 'selected'=>'true'],
    ['labelName'=>'Category', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-category-tab', 'toggle'=>'pill', 'target'=>'#v-pills-category', 'btnRole'=>'tab', 'controls'=>'v-pills-category', 'selected'=>'false'],
    ['labelName'=>'Search', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-search-tab', 'toggle'=>'pill', 'target'=>'#v-pills-search', 'btnRole'=>'tab', 'controls'=>'v-pills-search', 'selected'=>'false'],
    ['labelName'=>'Replace', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-replace-tab', 'toggle'=>'pill', 'target'=>'#v-pills-replace', 'btnRole'=>'tab', 'controls'=>'v-pills-replace', 'selected'=>'false'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
  <div class="container">
    <!-- =========== Tap Panel Top Bar =========== -->
    <x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar topBarClass="tab-panel" topBarRowClass="row tab-panel-topbar" topBarId="branchListPage" :hiddenAttr="$hiddenAttr">
      <div class="col-xl-8 group-btn">
        <x-Buttons.FormMediumButton label="Branch List" buttonParentClass="btn btn-sm branch-tab-btn active-button" buttonChildClass="skeleton-button" buttonId="branchList" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.FormMediumButton label="Create Branch Category" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeModalView" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.FormMediumButton label="Branch Setting" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchSettingPageView" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.CommonRefreshPageBtn label="Refresh" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeRefresh" iconClass="type-icon" labelClass="type-btn-text" />
      </div>
      <div class="col-xl-4"></div>
    </x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar>
    <!-- =========== Tap Content Panel Home Page =========== -->
    <x-CustomTabPanels.TabPanelContents.TabContentPanel contentTabClass="tab-content-panel-bg" contentTabId="branchListTab" :hiddenAttr="$hiddenAttr">
      <!-- =========== Home Tab Content Panel Header =========== -->
      <x-CustomTabPanels.TabPanelContents.TabContentPanelHeader contentTabHeaderClass="table-heading">
        <span>
          <span class="skeleton">
            <x-Tables.Icon.TableIcon iconWidth="26" iconHeight="24" fillColor="#413571a6" />
          </span>
        </span>
        <span class="skeleton"><strong>Branch List Table</strong></span>
      </x-CustomTabPanels.TabPanelContents.TabContentPanelHeader>
      <!-- =========== Home Tab Content =========== -->
      <x-Tables.ViewDataTables.DataTableWrappers.DataTableWrapper wrapperClass="table-wrapper">
        <x-Tables.ViewDataTables.DataTableResponsives.DataTableResponsive tableResponsiveClass="table-responsive">
          <!-- ========== Branch-List Table =============== table-striped-->
          <x-Tables.ViewDataTables.ViewDataTable tableClass="table">
            <x-Tables.ViewDataTables.DataTableHeads.DataTableHead className="table-head" >
              <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow rowClass="table-head-row">
                @foreach($headThRows as $data)
                  <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadTh 
                    thClassName="{{ $data['className'] }}" 
                    thStyle="{{ $data['styleShow'] }}" 
                    lableName="{{ $data['label'] }}"
                  />
                @endforeach
              </x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow>
            </x-Tables.ViewDataTables.DataTableHeads.DataTableHead>
            <x-Tables.ViewDataTables.DataTableBody.TableBody bodyClassName="table-body table-light" tableId="BranchListTableBody">
              <!-- Loader Overlay -->
              <x-Tables.Icon.LoaderOverlay 
                tableOverlayClass="table-loader-overlay display_none" 
                loaderId="tableOverlayLoader" 
                loaderClass="data-table-loader" 
                loaderWidth="24" 
                loaderHeight="24" 
                loaderStroke="currentColor" 
                loaderStrokeWidth="2" 
                loaderText="Loading...." 
                loaderTextClass="loader-text ms-1" 
                loaderFill="none"
              />
            </x-Tables.ViewDataTables.DataTableBody.TableBody>
          </x-Tables.ViewDataTables.ViewDataTable>
        </x-Tables.ViewDataTables.DataTableResponsives.DataTableResponsive>
        <x-Tables.TableFooter footerClass="row table_last_row mb-1">
          <div class="col-1">
            <x-Tables.TableFooterSelectDropdown 
              labelClass="item_class skeleton"
              labelName="Peritem"
              dropdownBox="custom-select skeleton"
              selectClass="ps-1"
              selectId="perItemControl"
              selectStyle="background: linear-gradient(5deg, gray, transparent 3%, lightgray, silver);border:1px ridge rgba(135, 206, 250, 0.74);"
              selectedValue="10"
            />
          </div>
          <div class="col-3">
            <x-Tables.TableEntries
              labelClass="per_item_class table-footer-label"
              entryId="total_per_branch_items"
              showId="per_branch_items_num"
              totalIems="total_branch_items" 
            />
          </div>
          <div class="col-8">
            <x-Tables.TablePagination
              paginationClass="pagination mt-1 skeleton"
              paginationId="branch_data_table_paginate" 
              paginationStyle="float: right;padding-top:0px;"
            />
          </div>
        </x-Tables.TableFooter>
      </x-Tables.ViewDataTables.DataTableWrappers.DataTableWrapper>
    </x-CustomTabPanels.TabPanelContents.TabContentPanel>
    <!-- =========== Tap Panel Branch Setting =========== -->
    <x-CustomTabPanels.TabPanelContents.TabContentPanel contentTabClass="setting-page-container" contentTabId="BranchSettingPage" :hiddenAttr="$hiddenAttr">
      <x-CustomLeftSideTabPanels.LeftSideTabPanelTopBars.LeftSideTabPanelTopBar className="setting-top-area">
        <div class="logo_size">
          <img src="{{ asset('/image/setting-two.png') }}" alt="setting-logo">
        </div>
        <div class="head-word">
          <strong>Setting</strong>
        </div>
      </x-CustomLeftSideTabPanels.LeftSideTabPanelTopBars.LeftSideTabPanelTopBar>
      <!-- =========== Left Side Tab Panel =========== -->
      <x-CustomLeftSideTabPanels.LeftSideTabPanel className="d-flex align-items-start">
        <x-CustomLeftSideTabPanels.LeftSideTabPanelNavBars.LeftSideTabPanelNavBar className="nav flex-column nav-pills me-3" navBarId="v-pills-tab" navBarRole="tablist" ariaOrientation="vertical">
          @foreach($customLeftSideTabPanelGroupBtns as $data)
          <x-CustomLeftSideTabPanels.LeftSideTabPanelBtn 
            labe="{{ $data['labelName'] }}" 
            buttonType="{{ $data['btnType'] }}" 
            className="{{ $data['btnClass'] }}" 
            buttonID="{{ $data['btnId'] }}" 
            dataBsToggle="{{ $data['toggle'] }}" 
            dataBsTarget="{{ $data['target'] }}" 
            buttonRole="{{ $data['btnRole'] }}" 
            ariaControl="{{ $data['controls'] }}" 
            ariaSelect="{{ $data['selected'] }}" 
          />
          @endforeach
        </x-CustomLeftSideTabPanels.LeftSideTabPanel>
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="home-icon-box">
              <x-Tables.Icon.SettingIcon iconWidth="80" iconHeight="80" firstFill="#686868" secondFill="#DEDEDE" thirdFill="#C8C8C8" fourFill="#8F9094" />
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-branch" role="tabpanel" aria-labelledby="v-pills-branch-tab">
            <div class="row">
              <div class="col-sm-3">
                  <div class="card custom-card">
                    <div class="card-header custom-header">
                      <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="20" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
                      Setting Operation
                    </div>
                    <div class="card-body">
                      <ul class="optation-box">
                        <ul id="SettingMode">
                          <li>
                            <label class="form-check-label custom-label" for="flexRadioDefault1">
                              <input class="form-check-input input-triger" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                              New Branch
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label custom-label" for="flexRadioDefault2">
                              <input class="form-check-input input-triger" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                              Branch Update
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label custom-label" for="flexRadioDefault3">
                              <input class="form-check-input input-triger" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                              Branch Delete
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label custom-label" for="flexRadioDefault4">
                              <input class="form-check-input input-triger" type="radio" name="flexRadioDefault" id="flexRadioDefault4" checked>
                              None
                            </label>
                          </li>
                        </ul>
                      </ul>
                    </div>
                  </div>
              </div>
              <div class="col-sm-5">
                <div class="loader-position" id="boxLoading" hidden>
                  <div class="spinner-border text-success spinner-width" role="status" id="loaderSpin" hidden>
                    <span class="visually-hidden"></span>
                  </div>
                </div>
                <div class="card custom-card" id="settingImplementCard" hidden>
                  <div class="card-header custom-header">
                    <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="20" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
                    Setting Implement
                  </div>
                  <div class="card-body">
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
                    <div class="card form-control form-control-sm" id="setting_card" hidden>
                      
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
                      <div id="loaderBox" class="card-message-overlay display_none">
                        <div class="animate_box">
                          <img class="box-animation-size" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                        </div>
                      </div>
                      <div class="card-body focus-color cd branch_form" id="table_card_body">
                        <input id="branch_id_field" type="text" name="branch_id_field" value="" hidden />
                        <input id="generate_id" type="text" name="generate_id" hidden />
                        <input id="branch_id" type="text" name="branch_id" class="branch_id_field branch_id" hidden />
                        <form autocomplete="off">
                          @csrf
                          <div class="row" id="formContent">
                            <div class="col-xl-12">
                              @foreach($dropdowmMenuData as $data)
                                @if($data['groupBox'] === 'form-group role_nme form-field-padding skeleton mt-3' || $data['groupBox'] === 'form-group role_nme form-field-padding branch skeleton mt-3')
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
                                @if($data['inputGroupBox'] === 'form-group role_nme form-field-padding skeleton display_none' || $data['inputGroupBox'] === 'form-group role_nme form-field-padding branch skeleton display_none')
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
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="loader-position" id="displayLoading" hidden>
                  <div class="spinner-border text-success spinner-width" role="status" id="displayLoader" hidden>
                    <span class="visually-hidden"></span>
                  </div>
                </div>
                <div class="card custom-card" id="settingDisplayCard">
                  <div class="card-header custom-header">
                    <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="20" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
                    Display
                  </div>
                  <div class="card-body">
                    <ul class="optation-box">
                        <ul id="SettingMode">
                          <li>
                            <label class="form-check-label line-label" for="branch-type">
                              Branch-Type : dfdsf
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label line-label" for="branch-id">
                              Branch-ID :
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label line-label" for="branch-name">
                              Branch-Name :
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label line-label" for="division">
                              Division :
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label line-label" for="district">
                              District :
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label line-label" for="upazila">
                              Upazila :
                            </label>
                          </li>
                          <li>
                            <label class="form-check-label line-label" for="location">
                              Location :
                            </label>
                          </li>
                        </ul>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-category" role="tabpanel" aria-labelledby="v-pills-category-tab">...</div>
          <div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">...</div>
          <div class="tab-pane fade" id="v-pills-replace" role="tabpanel" aria-labelledby="v-pills-replace-tab">...</div>
          <div class="message-show">
            <p class="ps-3 mt-1"><span id="success_message_show"></span></p>
          </div>
        </div>
      </x-CustomLeftSideTabPanels.LeftSideTabPanel>
    </x-CustomTabPanels.TabPanelContents.TabContentPanel>
  </div>
  @include('loader.action-loader')
  
  {{-- start delete modal --}}
  <div class="modal fade" id="deletebranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
            Delete [<span id="delete_branch"></span>]
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1" id="SM_Modal_body">
          <div class="row profile-heading pb-3">
            <div class="col-xl-12">
              <div class="form-group delete_content branch-skeleton" id="load_id">
                <span><div id="active_loader" class="loader_chart mt-1"></div></span>
                <label class="label_user_edit" id="cate_delete" for="id">Branch-ID : </label>
                <label class="label_user_edit" id="cat_id"> <span id="delete_branch_id"></span><br></label>
                <label class="label_user_edit" id="cate_delete2">Are you sure, Would you like to delete <span id="delete_branch_body"></span>, permanently?</label>
                <input type="hidden" id="delete_branch_id" name="branches_id">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer">
          <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
          </p>
          <p id="btn_group2">
            <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesButton">
              <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="yes-btn-text">{{__('translate.Yes')}}</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  {{-- end delete modal --}}

  {{-- start delete confirm modal --}}
  <div class="modal fade" id="deleteconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan confirm_title branch-skeleton pt-1" id="staticBackdropLabel">
            Confirm Delete
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn2 branch-skeleton delete_confrm_canl" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="delete_text_message">
              <label class="label_user_edit" id="cate_delete" for="id">Branch-ID : </label>
              <label class="label_user_edit" id="cat_id"> <span id="delete_confrm_branch_id"></span><br></label>
              <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer action_group" id="logoutModal_footer">
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-sm modal_button delet_btn_user btn_focus branch-skeleton delete_branch" id="delete_branch">
              <span class="delete-confrm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="delete-confrm-btn-text">Delete</span>
            </button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end delete confirm modal --}}

  {{-- start confirm update modal --}}
  <div class="modal fade" id="updateconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan update_title branch-skeleton pt-1" id="staticBackdropLabel">
            Update [<span id="branch_update_modal_heading"></span>]
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update <span id="branch_update_modal"></span>, confirm or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer action_group" id="logoutModal_footer">
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
            <button id="update_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus branch-skeleton">
              <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="confirm-btn-text">Confirm</span>
            </button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm update modal --}}

  {{-- start confirm access modal --}}
  <div class="modal fade" id="accessconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan access_title branch-skeleton pt-1" id="staticBackdropLabel">
            Branch Access
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn_access_close head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="access_text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button id="access_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus branch-skeleton">
              <span class="access-confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="access-confirm-btn-text">Confirm</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="acces_delete" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm access modal --}}

  <!-- ======= Branch-Type-Create-Modal ========= -->
  {{-- start branch type create modal --}}
  <div class="modal fade" id="branchTypeCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title branch_type_head_title ps-1 pe-1 branch-skeleton" id="staticBackdropLabel">
           Branch Category
          </h5>
          <button type="button" class="btn-close btn-btn-sm branch_type_head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body">
          @csrf
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group mb-1 role_nme branch_select_type branch-skeleton">
                <span class="input-label"><label class="branch_label label_position" for="branch-category-name">Searching...</label></span>
                <select type="text" class="form-control form-control-sm branch_category_name select2" name="branch_category_name" id="branch_category_name">
                  <option value="">Select Branch Category Name</option>
                </select>
                <input type="hidden" id="branch_category_id">
              </div>
            </div>
          </div>
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group branch role_nme mb-1 branch_type_name branch-skeleton">
                <label class="branch_label label_position" for="mail-transport">Category Name</label>
                <input class="form-control branch_input edit_branch_category_name" type="text" name="branch_category_name" id="branchTypeName" placeholder="Branch Category Name" value="" autocomplete="off"/>
                <span id="savForm_error_branch" hidden></span><span id="updateForm_error_branch" hidden></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action action_group">
          <button id="branch_type_cancel" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" data-bs-dismiss="modal" hidden>
            <span class="branch-type-cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-cancel-btn-text">Cancel</span>
          </button>
          <button type="button" id="branch_type_update" class="btn btn-sm cgt_btn btn_focus skeleton-button" hidden>
            <span class="branch-type-update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-update-btn-text">Update</span>
          </button>
          <button type="button" id="branch_type_delete" class="btn btn-sm cgt_btn btn_focus skeleton-button" hidden>
            <span class="branch-type-delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-delete-btn-text">Delete</span>
          </button>
          <button type="button" class="btn btn-sm cgt_btn btn_focus branch-skeleton" id="branch_type_create" hidden>
            <span class="branch-type-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-btn-text">Create</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  {{-- end branch type create modal --}}

  {{-- start branch type confirm delete modal --}}
  <div class="modal fade" id="branchTypeDeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title branch_type_head_delete ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
           Branch Category [<span id="Heading"></span>]
          </h5>
          <button type="button" class="btn-close btn-btn-sm branch_type_head_delete_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body" id="SM_Modal_body">
          @csrf
          <input type="hidden" id="branch_delete_category_id">
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group branch role_nme mb-1 branch_category_name branch-skeleton">
                <label class="branch_label label_position" for="mail-transport">
                  Would you like to delete <span id="delete_label"></span>, confirm or cancel ? 
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action action_group">
          <button id="branch_type_delete_cancel" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" data-bs-dismiss="modal">
            <span class="branch-type-confirm-cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-confirm-cancel-btn-text">Cancel</span>
          </button>
          <button type="button" class="btn btn-sm cgt_btn btn_focus branch-skeleton" id="branch_type_delete_confirm">
            <span class="branch-type-confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-confirm-btn-text">Confirm</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  {{-- end branch type confirm delete modal --}}

  <!-- Flexbox container for aligning the toasts -->
  <!-- Then put toasts within -->
  <!-- <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
    </div>
  </div> -->
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/table/zebra-table/zebra-table-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('fetch-api.branch.branch-division-district-upazila.ajax')
@include('super-admin.branch.ajax.branch-ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>

<!-- <script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }
  function focuButton() {
    const allSkeleton = document.querySelectorAll('.skeleton-button')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-button')
    });
  }

  setTimeout(() => {
    requestAnimationFrame(() => {
      fetchData();
      focuButton();
    });
  }, 2500);
</script> -->
<script>
  $(document).ready(function(){
    $("#branchListPage").removeAttr('hidden');
    $("#branchListTab").removeAttr('hidden');
    // Branch List click
    $(document).on('click', '#branchList', function (e) {
      e.preventDefault();
      // Hide setting page with animation, then set hidden
      $("#BranchSettingPage").slideUp("slow", function () {
        $(this).attr("hidden", true);
      });
      // Show branch list with animation and remove hidden before show
      $("#branchListTab").removeAttr("hidden").hide().slideDown("slow");
    });
    // Branch Setting click
    $(document).on('click', '#branchSettingPageView', function (e) {
      e.preventDefault();
      // Hide branch list with animation, then set hidden
      $("#branchListTab").slideUp("slow", function () {
        $(this).attr("hidden", true);
      });
      // Show setting page
      $("#BranchSettingPage").removeAttr("hidden").hide().slideDown("slow");
    });
  });
</script>
@endpush('scripts')