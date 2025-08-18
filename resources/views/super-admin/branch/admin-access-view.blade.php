<?php
  $formGroupButtons = [
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm danger-repl-btn me-5 skeleton-button mt-2', 'formGroupButtonId'=>'cnl_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Access Promot','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button mt-2', 'formGroupButtonId'=>'access_btn', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Branch Change','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button mt-2', 'formGroupButtonId'=>'amin_banch_change_btn', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Access Add','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button mt-2', 'formGroupButtonId'=>'branch_admin_access_store', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Access Delete','formGroupButtonClass'=>'btn btn-sm success-shadow-btn mt-2', 'formGroupButtonId'=>'access_delete_btn', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <x-CustomCards.Card cardClass="card form-control form-control-sm common-custom-card component-focus" cardId="" hiddenAttr="">
      <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body focus-color cd branch_form" cardBodyId="table_card_body" hiddenAttr="">
        <x-Forms.Form formClass="" formAutoComplete="off" formId="" >
          @csrf
          <div class="row">
            <div class="col-xl-4">
              <div class="form-group mb-1 role_nme skeleton access_search" id="accessSearch" hidden>
                <span class="input-label"><label class="group-field-label label_position" for="mail-transport">ADD Access</label></span>
                <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm select_branch_search select2" menuName="branch_name" menuId="select_branch_search" menuSelectLabel="Select Company Branch Name"></x-Dropdown.DropdownMenu>
                <span id="updateForm_error"></span>
                <input type="hidden" name="id" id="branches_id">
                <input type="hidden" name="branch_id" id="get_branch_id">
              </div>
              <div class="form-group role_nme branch mb-1 skeleton admin_email_search" id="adminEmail" hidden>
                <label class="group-field-label label_position" for="mail-transport">Access Promot</label><br>
                <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm select_user_email select2" menuName="user_email_id" menuId="select_user_email" menuSelectLabel="Select User Email"></x-Dropdown.DropdownMenu>
              </div>
              <div class="form-group role_nme branch mb-1 skeleton" id="admin_role" hidden>
                <label class="group-field-label label_position" for="mail-transport">Role Name</label><br>
                <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm user_role_id select2" menuName="user_role_id" menuId="select_role_one" menuSelectLabel="Select Role Name"></x-Dropdown.DropdownMenu>
                <span id="savForm_branch_error9" hidden><span id="updateForm_branch_error" hidden></span>
              </div>
              <div class="form-group role_nme branch mb-1 skeleton" id="admin_email" hidden>
                <label class="group-field-label label_position" for="mail-transport">Email Address</label><br>
                <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm user_email_id select2" menuName="user_email_id" menuId="select_email_one" menuSelectLabel="Select Email Address"></x-Dropdown.DropdownMenu>
                <span id="savForm_branch_error10" hidden><span id="updateForm_branch_error" hidden></span>
              </div>
              <div class="form-group role_nme branch mb-1 skeleton ps-2" id="adminstatus" hidden>
                <label class="text_label label_position" for="status">Sataus</label>
                <input type="checkbox" class="admin_approval_status" name="status" id="admin_approval_status" value="1" />
                <span id="updateForm_branch_error" hidden></span>
                <span class="text_label label_position" for="status" id="adminSt" hidden>Justify</span>
                <span class="text_label label_position" for="status" id="adminStTwo" hidden>Deny</span>
              </div>
            </div>
            <div class="col-xl-8">
              <div class="card card-body branch_info_card" id="documents" hidden>
                <div class="row">
                  <div class="col-xl-12">
                    <table class="info_table">
                      <thead>
                        <tr>
                          <th class="branch_search_font label_position lab_padding">Creator</th>
                          <th class="branch_search_font label_position lab_padding" id="updatorHead">Updator</th>
                          <th class="branch_search_font label_position lab_padding" id="approverHead">Approver</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td id="creatorContent">
                            <label class="image_position" for="user_image"><span id="creatorUserImage"></span></label>
                            <input id="creatorUserEmail" disabled>
                            <input id="creatorCreatedBy" disabled>
                            <input id="creatorCreatedAt" disabled>
                          </td>
                          <td id="updatorContent">
                            <label for="user_image"><span id="updatorUserImage"></span></label>
                            <input id="updatorUserEmail" disabled>
                            <input id="updatorUpdateBy" disabled>
                            <input id="updatorUpdateAt" disabled>
                          </td>
                          <td id="approverContent">
                            <label for="user_image"><span id="approverUserImage"></span></label>
                            <input id="approverUserEmail" disabled>
                            <input id="approverApprover" disabled>
                            <input id="approverUpdateAt" disabled>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-xl-12">
                    <div class="table-response">
                      <table class="branch_table brn_info_tb">
                        <thead>
                          <tr>
                            <th class="branch_search_font label_position"></th>
                            <th class="branch_search_font label_position"></th>
                            <th class="branch_search_font label_position"></th>
                            <th class="branch_search_font label_position"></th>
                          </tr>
                          <tr>
                            <th colspan="2" class="branch_info_head"> 
                              Branch Information 
                              <button type="button" class="btn-close cols_btn" data-bs-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="branch_table_body">
                          <tr class="fist_row">
                            <td class="first_column"><span class="tb_lb">Branch-ID</span><input type="text" id="brnch_id" disabled></td>
                            <td class="second_column"><span class="tb_lb">District</span><input type="text" id="district_id" disabled></td>
                          </tr>
                          <tr>
                            <td class="first_column"><span class="tb_lb">Branch-Name</span><input type="text" id="branch_name" disabled></td>
                            <td class="second_column"><span class="tb_lb">Upazila</span><input type="text" id="upazila_id" disabled></td>
                          </tr>
                          <tr>
                            <td class="first_column"><span class="tb_lb">Branch-Type</span><input type="text" id="branch_type" disabled></td>
                            <td class="second_column"><span class="tb_lb">City-Name</span><input type="text" id="town_name" disabled></td>
                          </tr>
                          <tr>
                            <td class="first_column"><span class="tb_lb">Division</span><input type="text" id="division_id" disabled></td>
                            <td colspan="2" class="second_column"><span class="tb_lb">Loaction</span><input type="text" id="location" disabled></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-body branch_info_card" id="add_documents" hidden>
                <div class="row">
                  <div class="col-xl-5">
                    <label class="catg_name_label label_position" for="branch-id">Branch-ID</label>
                    <input class="form-control branch_input add_branch_id" type="text" name="branch_id" id="add_branch_id" placeholder="Branch ID" value="" readonly />
                    <span id="savForm_branch_error"></span><span id="updateForm_branch_error" hidden></span>
                  </div>
                  <div class="col-xl-7">
                    <label class="catg_name_label label_position" for="district-name">District-Name</label>
                    <input class="form-control branch_input add_district_id" type="text" name="district_name" id="add_district_id" placeholder="District Name" value="" readonly/>
                    <span id="savForm_branch_error2"></span><span id="updateForm_branch_error2" hidden></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-5">
                    <label class="catg_name_label label_position" for="branch-name">Branch-Name</label>
                    <input class="form-control branch_input add_branch_name" type="text" name="branch_name" id="add_branch_name" placeholder="Branch Name" value="" readonly/>
                    <span id="savForm_branch_error3"></span><span id="updateForm_branch_error3" hidden></span>
                  </div>
                  <div class="col-xl-7">
                    <label class="catg_name_label label_position" for="upazila-or-thana">Upazila/Thana</label>
                    <input class="form-control branch_input add_upazila_id" type="text" name="upazila_name" id="add_upazila_id" placeholder="Upazila Name" value="" readonly/>
                    <span id="savForm_branch_error4"></span><span id="updateForm_branch_error4" hidden></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-5">
                    <label class="catg_name_label label_position" for="branch-type">Branch-Type</label>
                    <input class="form-control branch_input add_branch_type" type="text" name="branch_type" id="add_branch_type" placeholder="Branch Type" value="" readonly/>
                    <span id="savForm_branch_error5"></span><span id="updateForm_branch_error5" hidden></span>
                  </div>
                  <div class="col-xl-7">
                    <label class="catg_name_label label_position" for="city-name">City-Name</label>
                    <input class="form-control branch_input add_town_name" type="text" name="town_name" id="add_town_name" placeholder="City Name" value="" readonly/>
                    <span id="savForm_branch_error6"></span><span id="updateForm_branch_error6" hidden></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-5">
                    <label class="catg_name_label label_position" for="division-name">Division-Name</label>
                    <input class="form-control branch_input add_division_id" type="text" name="division_name" id="add_division_id" placeholder="Division Name" value="" readonly/>
                    <span id="savForm_branch_error7"></span><span id="updateForm_branch_error7" hidden></span>
                  </div>
                  <div class="col-xl-7">
                    <label class="catg_name_label label_position" for="location-name">Location</label>
                    <input class="form-control branch_input add_location" type="text" name="location" id="add_location" placeholder="Location Name" value="" readonly/>
                    <span id="savForm_branch_error8"></span><span id="updateForm_branch_error8" hidden></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6 action_message mb-2">
              <p class=""><span id="success_message"></span></p>
            </div>
            <div class="col-xl-6">
              <p class ="group_action grp_action me-2">
                @foreach($formGroupButtons as $data)
                  <?php
                    $disabledAttr = $data['disabledAttribute'] === 'hidden' ? 'hidden' : '';
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
              </p>
            </div>
          </div>
        </x-Forms.Form>
      </x-CustomCards.CardBodies.CardBody>
    </x-CustomCards.Card>
  </div>
@include('loader.action-loader')

{{-- start branch change modal --}}
  <div class="modal fade" id="adminBranchChangeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch_name_heading hd-branch-skeleton branch_name_hd" id="staticBackdropLabel">
            Admin Branch Change
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton cancel_change_box" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="branch_access">
            <div class="row profile-heading pb-3">
              @csrf
              <div class="action_group first_part branch-content-skeleton">
                <span class="branch_chang">
                  <label class="catg_name_label" for="mail-transport">Admin-Role</label>
                </span><br>
                <div class="chng_brnch">
                  <select type="text" class="form-control form-control-sm role_id select2" name="user_role_id" id="admin_roleID">
                    <option value="">Select Admin Role</option>
                  </select>
                </div>
              </div>
              <div class="action_group second_part branch-content-skeleton">
                <span class="branch_chang">
                  <label class="catg_name_label" for="mail-transport">Admin-Email</label>
                </span><br>
                <div class="chng_brnch">
                  <select type="text" class="form-control form-control-sm role_id select2" name="user_email_id" id="admin_emailID">
                    <option value="">Select Admin Email</option>
                  </select>
                </div>
              </div>
              <div class="action_group">
                <div class="third_part branch-content-footer-skeleton">
                  <span class="branch_chang">
                    <label class="catg_name_label" for="mail-transport">Branch-Change</label>
                  </span><br>
                  <div class="chng_brnch">
                    <select type="text" class="form-control form-control-sm role_id select2" name="branch_name" id="admin_branch_name">
                      <option value="">Select Branch Name</option>
                    </select>
                  </div>
                </div>
                <!-- Hidden Input Fields for Storing Selected Branch Data -->
                <input type="hidden" id="admin_change_id">
                <input type="hidden" id="admin_change_branch_id">
                <input type="hidden" id="admin_change_branch_type">
                <input type="hidden" id="admin_change_branch_name">
                <input type="hidden" id="admin_change_division_id">
                <input type="hidden" id="admin_change_district_id">
                <input type="hidden" id="admin_change_upazila_id">
                <input type="hidden" id="admin_change_town_name">
                <input type="hidden" id="admin_change_location">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action_group">
          <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel mn-branch-skeleton back_change_box" id="cancle_change" data-bs-dismiss="modal">Access Cancel</button>
          <button id="admin_change_btn_confirm" class="btn btn-sm cgt_btn btn_focus admin_change_btn_confirm mn-branch-skeleton">
            <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-btn-text">Confirm</span>
          </button>
        </div>
      </div>
    </div>
  </div>
{{-- end branch change modal --}}

{{-- start delete modal --}}
  <div class="modal fade" id="delete_admin_branch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <span><div id="active_loader" class="loader_chart mt-1"></div></span>
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch_name_head hedng hd-branch-skeleton" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close btn-btn-sm hedng_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="row profile-heading pb-3">
            <div class="col-xl-12">
              <div class="form-group branch-skeleton" id="load_id">
                <div class="action_group group">
                  <span id="usrImage"></span>
                  <span id="usrRole"></span>
                  <span id="usrEmail"></span>
                </div>
                <label class="label_user_edit" id="cate_delete" for="id">
                  Branch-ID : <span id="admin_branch_id"></span>
                </label><br><br>
                <label class="label_user_edit" id="cate_delete2">Are you sure, Would you like to delete <span class="highlight_branch">branch-id: <span id="branch_delete_id"></span></span> , permanently?</label>
                <!-- Hidden Input Fields for Storing Selected Branch Data -->
                <input type="hidden" id="admin_delete_id">
                <input type="hidden" id="admin_delete_branch_id">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer">
          <p id="btn_group2">
            <a type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesButton">
              <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" hidden></span>
              <span class="btn-text">{{__('translate.Yes')}}</span>
            </a>
          </p>
          <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
          </p>
        </div>
      </div>
    </div>
  </div>
{{-- end delete modal --}}

{{-- start delete confirm modal --}}
  <div class="modal fade" id="delete_admin_confirm_branch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <span class="modal-title admin_title scan confirm_title branch-skeleton pt-1">
            <span id="usrConfrmImage"></span>
            <span id="usrConfrmRole"></span>
            <span id="usrConfrmEmail"></span>
          </span>
          <button type="button" class="btn-close btn-btn-sm head_btn2 branch-skeleton back_btn" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="logoutModal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="delete_text_message">
              <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button type="button" class="btn btn-sm modal_button delet_btn_user btn_focus branch-skeleton delete_branch" id="delete_branch">
              <span class="delete-confrm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="delete-confrm-btn-text">Confirm Delete</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
{{-- end delete confirm modal --}}

@endsection

@section('css')
<!-- <link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css"> -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<!-- <link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css"> -->
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@include('fetch-api.branch.branch-role-user-fetch.ajax')
@include('super-admin.branch.ajax.admin-access-ajax')
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