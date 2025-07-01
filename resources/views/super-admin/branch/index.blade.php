<?php 
  $dropdowmMenuData = [
    ['groupBox'=>'form-group role_nme skeleton', 'label'=>'Searching...', 'labelClass'=>'branch_label label_position', 'labelFor'=>'branch-search', 'menuLabel'=>'Select Company Branch Name', 'Menusname'=>'select_branch', 'MenusId'=>'select_branch', 'menusClass'=>'form-control select_branch select2', 'menusType'=>'text'],
    ['groupBox'=>'form-group role_nme branch skeleton','label'=>'Branch Type', 'labelClass'=>'branch_label label_position branch_type_nme', 'labelFor'=>'branch-type', 'menuLabel'=>'Select Branch Type', 'Menusname'=>'branch_type', 'MenusId'=>'branch_type', 'menusClass'=>'form-control edit_branch_type select2', 'menusType'=>'text'],
  ];
  $inputGroup = [
    ['inputGroupBox'=>'form-group role_nme skeleton','label'=>'Branch Name', 
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'branch-name', 
    'formInputLabel'=>'Branch Name', 'formInputName'=>'branch_name', 'formInputId'=>'branchName', 
    'formInputClass'=>'form-control branch_input edit_branch_name', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Branch Name', 'formInputErrorId'=>'savForm_error', 'formInputUpdateError'=>'updateForm_error'],
    ['inputGroupBox'=>'form-group role_nme branch skeleton','label'=>'City Name', 
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'city-name', 
    'formInputLabel'=>'Branch Name', 'formInputName'=>'town_name', 'formInputId'=>'townName', 
    'formInputClass'=>'form-control branch_input edit_town_name', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Town Name', 'formInputErrorId'=>'savForm_error6', 'formInputUpdateError'=>'updateForm_error6'],
    ['inputGroupBox'=>'form-group role_nme branch skeleton','label'=>'Location', 
    'formInputLabelClass'=>'branch_label label_position', 'inputLabelFor'=>'branch-location', 
    'formInputLabel'=>'Location', 'formInputName'=>'location', 'formInputId'=>'location', 
    'formInputClass'=>'form-control branch_input edit_location', 'formInputType'=>'text', 
    'formInputPlaceHolder'=> 'Location', 'formInputErrorId'=>'savForm_error7', 'formInputUpdateError'=>'updateForm_error7'],

  ];
  $secondColumnDropdownData = [
    ['secondGroupBox'=>'form-group role_nme branch skeleton','secondLabel'=>'Division Name', 
    'secondLabelClass'=>'branch_label label_position division_nme', 'secondLabelFor'=>'division-name', 
    'secondMenuLabel'=>'Select Division', 'secondMenusname'=>'division_id', 'secondMenusId'=>'select_division', 
    'secondMenusClass'=>'form-control edit_division_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error3', 'dropdownUpdateError'=>'updateForm_error3'],
    ['secondGroupBox'=>'form-group role_nme branch skeleton','secondLabel'=>'District Name', 
    'secondLabelClass'=>'branch_label label_position division_nme', 'secondLabelFor'=>'district-name', 
    'secondMenuLabel'=>'Select District', 'secondMenusname'=>'district_id', 'secondMenusId'=>'select_district', 
    'secondMenusClass'=>'form-control edit_district_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error4', 'dropdownUpdateError'=>'updateForm_error4'],
    ['secondGroupBox'=>'form-group role_nme branch skeleton','secondLabel'=>'Upazila/Thana Name', 
    'secondLabelClass'=>'branch_label label_position division_nme', 'secondLabelFor'=>'upazila-name', 
    'secondMenuLabel'=>'Select Upazila', 'secondMenusname'=>'upazila_id', 'secondMenusId'=>'select_upazila', 
    'secondMenusClass'=>'form-control edit_upazila_id select2', 'secondMenusType'=>'text', 'dropdownError'=>'savForm_error5', 'dropdownUpdateError'=>'updateForm_error5']
  ];
  $formGroupButtons = [
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus skeleton-button', 'formGroupButtonId'=>'cancel_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'hiddenAttribute'=>''],
    ['formGroupButtonLabel'=>'Add','formGroupButtonClass'=>'btn btn-sm cgt_btn btn_focus skeleton-button', 'formGroupButtonId'=>'save', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'hiddenAttribute'=>''],
    ['formGroupButtonLabel'=>'Update','formGroupButtonClass'=>'btn btn-sm cgt_btn btn_focus skeleton-button', 'formGroupButtonId'=>'update_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'hiddenAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Delete','formGroupButtonClass'=>'btn btn-sm cgt_cancel_btn btn_focus', 'formGroupButtonId'=>'deleteBranch', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'hiddenAttribute'=>'hidden'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
  <div class="container">
    <div class="card form-control form-control-sm" id="branch_page">
      <div class="card-body" id="table_card_body">
        <div class="row">
          <div class="col-xl-12">
            <div class="card-body focus-color cd branch_form">
              <input id="branch_id_field" type="text" name="branch_id_field" value="" hidden />
              <input id="generate_id" type="text" name="generate_id" hidden />
              <input id="branch_id" type="text" name="branch_id" class="branch_id_field branch_id" hidden />
              <form autocomplete="off">
                @csrf
                <div class="row form-topbar">
                  <div class="col-xl-1 fist_btn">
                    <x-buttons.form-medium-button label="Create" buttonParentClass="btn btn-sm cgt_btn btn_focus" buttonChildClass="skeleton-button" buttonId="branchTypeModalView" iconClass="icon" labelClass="btn-text" />
                  </div>
                  <div class="col-xl-2">
                    <x-buttons.common-refresh-page-btn label="Refresh" buttonParentClass="btn btn-sm cgt_btn btn_focus" buttonChildClass="skeleton-button" buttonId="branchTypeRefresh" iconClass="type-icon" labelClass="type-btn-text" />
                  </div>
                  <div class="col-xl-9"></div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    @foreach($dropdowmMenuData as $data)
                      @if($data['groupBox'] === 'form-group role_nme skeleton' || $data['groupBox'] === 'form-group role_nme branch skeleton')
                        <div class="{{ $data['groupBox'] }}">
                          <span class="input-label">
                            <label class="{{ $data['labelClass'] }}" for="{{ $data['labelFor'] }}">
                              {{ $data['label'] }}
                            </label>
                          </span>
                          <x-dropdown.dropdown-menu 
                            menuType="{{ $data['menusType'] }}" 
                            menuClass="{{ $data['menusClass'] }}" 
                            menuName="{{ $data['Menusname'] }}" 
                            menuId="{{ $data['MenusId'] }}" 
                            menuSelectLabel="{{ $data['menuLabel'] }}">
                            <input type="hidden" id="branches_id">
                          </x-dropdown.dropdown-menu>
                        </div>
                      @endif
                    @endforeach
                    @foreach($inputGroup as $data)
                      @if($data['inputGroupBox'] === 'form-group role_nme skeleton' || $data['inputGroupBox'] === 'form-group role_nme branch skeleton')
                        <div class="{{ $data['inputGroupBox'] }}">
                          <label class="{{ $data['formInputLabelClass'] }}" for="{{ $data['inputLabelFor'] }}">
                            {{ $data['label'] }}
                            <span id="{{ $data['formInputErrorId'] }}" hidden></span><span id="{{ $data['formInputUpdateError'] }}" hidden></span>
                          </label>
                          <x-input.form-input.form-input-field formInputFieldClass="{{ $data['formInputClass'] }}" formInputFieldType="{{ $data ['formInputType'] }}" formInputFieldName="{{ $data['formInputName'] }}" formInputFieldId="{{ $data['formInputId'] }}" formInputFieldPlaceHolder="{{ $data['formInputPlaceHolder'] }}" />
                        </div>
                      @endif
                    @endforeach
                  </div>
                  <div class="col-xl-6">
                    @foreach($secondColumnDropdownData as $data)
                      <div class="{{ $data['secondGroupBox'] }}">
                        <span class="input-label">
                          <label class="{{ $data['secondLabelClass'] }}" for="{{ $data['secondLabelFor'] }}">
                            {{ $data['secondLabel'] }}
                          </label>
                        </span>
                        <x-dropdown.dropdown-menu 
                          menuType="{{ $data['secondMenusType'] }}" 
                          menuClass="{{ $data['secondMenusClass'] }}" 
                          menuName="{{ $data['secondMenusname'] }}" 
                          menuId="{{ $data['secondMenusId'] }}" 
                          menuSelectLabel="{{ $data['secondMenuLabel'] }}">
                          <input type="hidden" id="branches_id">
                        </x-dropdown.dropdown-menu>
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
                <div class="row mb-2">
                  <div class="col-xl-10 action_message">
                    <p class="ps-1 mt-1"><span id="success_message"></span></p>
                  </div>
                  <div class="col-xl-2 action_group">
                    @foreach($formGroupButtons as $data)
                      <?php
                        $hiddenAttr = $data['hiddenAttribute'] === 'hidden' ? 'hidden' : '';
                      ?>
                      <x-buttons.form-medium-button 
                        label="{{ $data['formGroupButtonLabel'] }}" 
                        buttonParentClass="{{ $data['formGroupButtonClass'] }}" 
                        buttonChildClass="" 
                        buttonId="{{ $data['formGroupButtonId'] }}" 
                        iconClass="{{ $data['groupIconClass'] }}" 
                        labelClass="{{ $data['formGroupButtonSpinerText'] }}"
                        :hiddenAttr="$hiddenAttr"
                      />
                    @endforeach
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
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

<script>
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
  }, 1000);
</script>
@endpush('scripts')