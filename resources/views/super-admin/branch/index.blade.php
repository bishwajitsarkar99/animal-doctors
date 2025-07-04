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
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus skeleton-button', 'formGroupButtonId'=>'cancel_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Next','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button', 'formGroupButtonId'=>'next', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>''],
    ['formGroupButtonLabel'=>'Finish','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button display_none', 'formGroupButtonId'=>'save', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
    ['formGroupButtonLabel'=>'Update','formGroupButtonClass'=>'btn btn-sm setting-btn setting-btn-focus skeleton-button display_none', 'formGroupButtonId'=>'update_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
    ['formGroupButtonLabel'=>'Delete','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus display_none', 'formGroupButtonId'=>'deleteBranch', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'disabled'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
  <div class="container">
    <div class="form-top-heading" id="branchListPage" hidden>
      <div class="row form-topbar">
        <div class="col-xl-8 group-btn fist_btn">
          <x-buttons.form-medium-button label="Branch List" buttonParentClass="btn btn-sm branch-tab-btn active-button" buttonChildClass="skeleton-button" buttonId="branchList" iconClass="icon" labelClass="btn-text" />
          <x-buttons.form-medium-button label="Create Branch Category" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeModalView" iconClass="icon" labelClass="btn-text" />
          <x-buttons.form-medium-button label="Branch Setting" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchSettingPageView" iconClass="icon" labelClass="btn-text" />
          <x-buttons.common-refresh-page-btn label="Refresh" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeRefresh" iconClass="type-icon" labelClass="type-btn-text" />
        </div>
        <div class="col-xl-4"></div>
      </div>
    </div>
    <div class="branch-list-tab-panel" id="branchListTab" hidden>
      <div class="table-heading">
        <span>
          <span class="skeleton"><svg width="26" height="24" fill="gray" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg></span>
        </span>
        <span class="skeleton"><strong>Branch List Table</strong></span>
      </div>
      <div class="branch-table-wrapper">
        <!-- Loader Overlay -->
        <div id="tableOverlayLoader" class="table-loader-overlay display_none">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="data-table-loader">
            <line x1="12" y1="2" x2="12" y2="6"/>
            <line x1="12" y1="18" x2="12" y2="22"/>
            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/>
            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/>
            <line x1="2" y1="12" x2="6" y2="12"/>
            <line x1="18" y1="12" x2="22" y2="12"/>
            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/>
            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/>
          </svg>
          <span class="loader-text ms-1">Loading....</span>
        </div>
        <table class="branch-table branch-table-responsive">
          <thead class="table-head">
            <tr class="table-head-row">
              <th class="branch-th-head skeleton" style="width:5%;text-align:center;">SN.</th>
              <th class="branch-th-head skeleton">Branch-Type</th>
              <th class="branch-th-head skeleton">Branch-ID</th>
              <th class="branch-th-head skeleton">Branch-Name</th>
              <th class="branch-th-head skeleton">Division</th>
              <th class="branch-th-head skeleton">District</th>
              <th class="branch-th-head skeleton">Upazila</th>
              <th class="branch-th-head skeleton">City</th>
              <th class="branch-th-head skeleton">Loaction</th>
            </tr>
          </thead>
          <tbody class="branch-table-body" id="BranchListTableBody"></tbody>
        </table>
        <x-tables.table-footer footerClass="row table_last_row mb-1">
          <div class="col-1">
            <x-dropdown.table-footer-select-dropdown 
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
            <x-tables.table-entries
              labelClass="per_item_class table-footer-label"
              entryId="total_per_branch_items"
              showId="per_branch_items_num"
              totalIems="total_branch_items" 
            />
          </div>
          <div class="col-8">
            <x-tables.table-pagination
              paginationClass="pagination mt-1 skeleton"
              paginationId="branch_data_table_paginate" 
              paginationStyle="float: right;padding-top:0px;"
            />
          </div>
        </x-tables.table-footer>
      </div>
    </div>
    <!-- =========== Branch Setting =========== -->
    <div class="setting-page-container" id="BranchSettingPage" hidden>
      <div class="setting-top-area">
        <div class="logo_size">
          <img src="{{ asset('/image/setting-two.png') }}" alt="setting-logo">
        </div>
        <div class="head-word">
          <strong>Setting</strong>
        </div>
      </div>
      <div class="setting-table-wrapper">
        <table class="setting-table">
          <thead class="table-head">
            <tr class="table-head-row">
              <th class="th-head space" style="width:30%;">Operation</th>
              <th class="th-head-middle space" style="width:25%;">Mode</th>
              <th class="th-head space" style="width:45%;">Action</th>
            </tr>
          </thead>
          <tbody class="setting-table-body" id="settingTableBody">
            <tr class="setting-table-first-row" id="BranchOption">
              <td class="table-cell">
                <span style="display:flex;justify-content:space-between;">
                  <svg width="30" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                  <p>
                    <span class="stronger">Branch Setting :</span> To add, to update, or to delete a branch, please select the settings mode option form the menu box .
                  </p>
                </span>
              </td>
              <td class="middle-cell">
                <select class="form-select select-box" size="3" aria-label="size 3 select example" id="SettingMode">
                  <option class="custom-optation" selected>Setting Optation Mode</option>
                  <option class="custom-optation" value="1">New</option>
                  <option class="custom-optation" value="2">Update</option>
                  <option class="custom-optation" value="3">Delete</option>
                </select>
              </td>
              <td class="table-cell">
                <select class="form-select select-box" size="3" aria-label="size 3 select example" id="SettingActionButton">
                  <option class="custom-optation" value="1">Enable to new branch action</option>
                  <option class="custom-optation" value="2">Disable to new branch action</option>
                  <option class="custom-optation" value="3" hidden>Enable to update branch action</option>
                  <option class="custom-optation" value="4" hidden>Disable to update branch action</option>
                  <option class="custom-optation" value="5" hidden>Enable to delete branch action</option>
                  <option class="custom-optation" value="6" hidden>Disable to delete branch action</option>
                </select>
                <div class="message-show">
                  <p class="ps-3 mt-1"><span id="success_message_show"></span></p>
                </div>
              </td>
            </tr>
            <tr class="setting-table-second-row" id="AdminOption">
              <td  class="second-row-table-cell"></td>
              <td  class="second-row-table-middle-cell"></td>
              <td  class="second-row-table-cell td-margin">
                <div class="card form-control form-control-sm" id="branch_page">
                  <!-- Message Overlay -->
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
                                <x-dropdown.dropdown-menu 
                                  menuType="{{ $data['menusType'] }}" 
                                  menuClass="{{ $data['menusClass'] }}" 
                                  menuName="{{ $data['Menusname'] }}" 
                                  menuId="{{ $data['MenusId'] }}" 
                                  menuSelectLabel="{{ $data['menuLabel'] }}">
                                  <input type="hidden" id="branches_id">
                                </x-dropdown.dropdown-menu>
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
                                <x-input.form-input.form-input-field formInputFieldClass="{{ $data['formInputClass'] }}" formInputFieldType="{{ $data ['formInputType'] }}" formInputFieldName="{{ $data['formInputName'] }}" formInputFieldId="{{ $data['formInputId'] }}" formInputFieldPlaceHolder="{{ $data['formInputPlaceHolder'] }}" />
                                <label class="{{ $data['formInputLabelClass'] }}" for="{{ $data['inputLabelFor'] }}">
                                  {{ $data['label'] }}
                                  <span id="{{ $data['formInputErrorId'] }}" hidden></span><span id="{{ $data['formInputUpdateError'] }}" hidden></span>
                                </label>
                              </div>
                            @endif
                          @endforeach
                          @foreach($secondColumnDropdownData as $data)
                            <div class="{{ $data['secondGroupBox'] }}" id="{{ $data['dropdownGroupId'] }}">
                              <x-dropdown.dropdown-menu 
                                menuType="{{ $data['secondMenusType'] }}" 
                                menuClass="{{ $data['secondMenusClass'] }}" 
                                menuName="{{ $data['secondMenusname'] }}" 
                                menuId="{{ $data['secondMenusId'] }}" 
                                menuSelectLabel="{{ $data['secondMenuLabel'] }}">
                                <input type="hidden" id="branches_id">
                              </x-dropdown.dropdown-menu>
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
                          <span>All data has been siwtching already for new branch.</span><br>
                          <span>Please select the branch id.</span>
                        </div>
                        <div class="select-menu-box">
                          <div>
                            <select class="form-select select-box" size="3" aria-label="size 3 select example" id="SelectBranchID"></select> 
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2 mt-2">
                        <div class="col-xl-7 action_message">
                          <p class="ps-1 mt-1"><span id="success_message"></span></p>
                        </div>
                        <div class="col-xl-5 pe-3 action_group">
                          @foreach($formGroupButtons as $data)
                            <?php
                              $disabledAttr = $data['disabledAttribute'] === 'disabled' ? 'disabled' : '';
                            ?>
                            <x-buttons.form-medium-button 
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
                      </div>
                    </form>
                  </div>
                  </div>
                </div> 
              </td>
            </tr>
            <tr class="setting-table-row" id="UserOption">
              <td class="table-cell"></td>
              <td class="table-cell"></td>
              <td class="table-cell"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
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
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
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