<?php
  $formGroupButtons = [
    ['formGroupButtonLabel'=>'Cancel','formGroupButtonClass'=>'btn btn-sm danger-repl-btn skeleton-button', 'formGroupButtonId'=>'cnl_btn', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Access Promot','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button', 'formGroupButtonId'=>'access_btn', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Access Add','formGroupButtonClass'=>'btn btn-sm success-shadow-btn skeleton-button', 'formGroupButtonId'=>'branch_admin_access_store', 'formGroupButtonType'=>'reset', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
    ['formGroupButtonLabel'=>'Access Delete','formGroupButtonClass'=>'btn btn-sm success-shadow-btn', 'formGroupButtonId'=>'access_delete_btn', 'formGroupButtonType'=>'button', 'formGroupButtonSpinerText'=>'', 'groupIconClass'=>'', 'disabledAttribute'=>'hidden'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class ="card form-control form-control-sm common-custom-card component-focus mb-5">
  <div class="card-body focus-color cd branch_form" id="table_card_body">
    <x-Forms.Form formClass="" formAutoComplete="off" formId="" >
      @csrf
      <div class="row">
        <div class="col-xl-12">
          <div class="form-group mb-1 mt-1 role_nme skeleton access_search" id="accessSearch" hidden>
            <span class="input-label"><label class="group-field-label label_position" for="mail-transport">ADD Access</label></span>
            <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm select_branch_search select2" menuName="branch_name" menuId="select_branch_search" menuSelectLabel="Select Company Branch Name"></x-Dropdown.DropdownMenu>
            <span id="updateForm_error"></span>
            <input type="hidden" name="id" id="branches_id">
            <input type="hidden" name="branch_id" id="get_branch_id">
          </div>
          <div class="form-group role_nme branch mb-1 mt-1 skeleton admin_email_search" id="adminEmail" hidden>
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
      </div>
      <div class="row">
        <div class="col-xl-8 mb-2">
          <x-Modals.SmallModals.Buttons.ConfirmBtn 
            className="btn btn-sm success-shadow-btn display_none ms-1" 
            btnId="amin_banch_change_btn" 
            lableName="Branch Change" 
            lableClass="confirm-btn-text" 
            spinerClass="confirm-icon"
          />
        </div>
        <div class="col-xl-4">
          <div class ="group_action grp_action component-focus me-2 mt-1">
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
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card card-body branch_info_card" id="documents" hidden>
            <div class="table-wrapper">
              <div class="table-responsive">
                <div class="table-container" style="position: relative;">
                  <table class="table info_table component-focus" id="branchCreatorTable">
                    <thead>
                      <tr class="zebra-table-row">
                        <th class="branch_search_font label_position head-border lab_padding">
                          Creator
                          <div class="col-resizer"></div>
                          <div class="row-resizer"></div>
                        </th>
                        <th class="branch_search_font label_position head-border lab_padding" id="updatorHead">
                          Updator
                          <div class="col-resizer"></div>
                          <div class="row-resizer"></div>
                        </th>
                        <th class="branch_search_font label_position head-border lab_padding" id="approverHead">
                          Approver
                          <div class="col-resizer"></div>
                          <div class="row-resizer"></div>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="table-body">
                      <tr class="zebra-table-row">
                        <td class="border-cell" id="creatorContent">
                          <div>
                            <label class="image_position" for="user_image">
                              <span id="creatorUserImage"></span>
                            </label><br>
                            <span id="creatorUserEmail" disabled></span><br>
                            <span id="creatorCreatedBy" disabled></span><br>
                            <span id="creatorCreatedAt" disabled></span><br>
                          </div>
                          <div class="row-resizer"></div>
                        </td>
                        <td class="border-cell" id="updatorContent">
                          <div>
                            <label for="user_image"><span id="updatorUserImage"></span></label><br>
                            <span id="updatorUserEmail" disabled></span><br>
                            <span id="updatorUpdateBy" disabled></span><br>
                            <span id="updatorUpdateAt" disabled></span><br>
                          </div>
                          <div class="row-resizer"></div>
                        </td>
                        <td class="border-cell" id="approverContent">
                          <div>
                            <label for="user_image"><span id="approverUserImage"></span></label><br>
                            <span id="approverUserEmail" disabled></span><br>
                            <span id="approverApprover" disabled></span><br>
                            <span id="approverUpdateAt" disabled></span><br>
                          </div>
                          <div class="row-resizer"></div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="table-wrapper">
              <div class="table-responsive component-focus mt-2">
                <div class="table-container" style="position: relative;">
                  <table class="table info_table" id="branchInfosTable">
                    <thead>
                      <tr class="zebra-table-row">
                        <th class="branch_search_font label_position head-border lab_padding th-bg"> 
                          <div class="col-resizer"></div>
                          <div class="row-resizer"></div>
                        </th>
                        <th class="branch_search_font label_position head-border lab_padding th-bg"> 
                          Branch Information 
                          <button type="button" class="btn-close cols_btn ms-2" data-bs-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
                          <div class="col-resizer"></div>
                          <div class="row-resizer"></div>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="table-body">
                      <tr class="zebra-table-row">
                        <td class="first-init-column-border-cell">
                          <span class="tb_lb" id="brnch_id" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                        <td class="second-init-column-border-cell">
                          <span class="tb_lb" id="district_id" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                      </tr>
                      <tr class="zebra-table-row">
                        <td class="first-column-border-cell">
                          <span class="tb_lb" id="branch_name" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                        <td class="second-column-border-cell">
                          <span class="tb_lb" id="upazila_id" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                      </tr>
                      <tr class="zebra-table-row">
                        <td class="first-column-border-cell">
                          <span class="tb_lb" id="branch_type" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                        <td class="second-column-border-cell">
                          <span class="tb_lb" id="town_name" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                      </tr>
                      <tr class="zebra-table-row">
                        <td class="first-column-border-cell">
                          <span class="tb_lb" id="division_id" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                        <td class="second-column-border-cell">
                          <span class="tb_lb" id="location" disabled></span>
                          <div class="row-resizer"></div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-body branch_info_card component-focus" id="add_documents" hidden>
            <div class="row">
              <div class="col-xl-5 component-focus">
                <label class="label-field label_position" for="branch-id">Branch-ID </label>
                <input class="form-control branch_input add_branch_id" type="text" name="branch_id" id="add_branch_id" placeholder="Branch ID" value="" readonly />
                <span id="savForm_branch_error"></span><span id="updateForm_branch_error" hidden></span>
              </div>
              <div class="col-xl-7 component-focus">
                <label class="label-field label_position" for="district-name">District-Name </label>
                <input class="form-control branch_input add_district_id" type="text" name="district_name" id="add_district_id" placeholder="District Name" value="" readonly/>
                <span id="savForm_branch_error2"></span><span id="updateForm_branch_error2" hidden></span>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-5 component-focus">
                <label class="label-field label_position" for="branch-name">Branch-Name </label>
                <input class="form-control branch_input add_branch_name" type="text" name="branch_name" id="add_branch_name" placeholder="Branch Name" value="" readonly/>
                <span id="savForm_branch_error3"></span><span id="updateForm_branch_error3" hidden></span>
              </div>
              <div class="col-xl-7 component-focus">
                <label class="label-field label_position" for="upazila-or-thana">Upazila/Thana </label>
                <input class="form-control branch_input add_upazila_id" type="text" name="upazila_name" id="add_upazila_id" placeholder="Upazila Name" value="" readonly/>
                <span id="savForm_branch_error4"></span><span id="updateForm_branch_error4" hidden></span>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-5 component-focus">
                <label class="label-field label_position" for="branch-type">Branch-Type </label>
                <input class="form-control branch_input add_branch_type" type="text" name="branch_type" id="add_branch_type" placeholder="Branch Type" value="" readonly/>
                <span id="savForm_branch_error5"></span><span id="updateForm_branch_error5" hidden></span>
              </div>
              <div class="col-xl-7 component-focus">
                <label class="label-field label_position" for="city-name">City-Name </label>
                <input class="form-control branch_input add_town_name" type="text" name="town_name" id="add_town_name" placeholder="City Name" value="" readonly/>
                <span id="savForm_branch_error6"></span><span id="updateForm_branch_error6" hidden></span>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-5 component-focus">
                <label class="label-field label_position" for="division-name">Division-Name </label>
                <input class="form-control branch_input add_division_id" type="text" name="division_name" id="add_division_id" placeholder="Division Name" value="" readonly/>
                <span id="savForm_branch_error7"></span><span id="updateForm_branch_error7" hidden></span>
              </div>
              <div class="col-xl-7 component-focus">
                <label class="label-field label_position" for="location-name">Location </label>
                <input class="form-control branch_input add_location" type="text" name="location" id="add_location" placeholder="Location Name" value="" readonly/>
                <span id="savForm_branch_error8"></span><span id="updateForm_branch_error8" hidden></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </x-Forms.Form>
  </div>
</div>
@include('loader.action-loader')

{{-- start branch change modal --}}
  <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="adminBranchChangeModal">
    <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
      {{-- header --}}
      <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
        <h5 class="modal-title change_title font-white branch-skeleton ps-1 pe-1" id="staticBackdropLabel">
          Admin Branch Change
        </h5>
        <button type="button" class="btn-close-modal head_btn" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
      </x-Modals.SmallModals.Headers.Header>
      {{-- body --}}
      <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
        <div class="branch_access branch_change_access branch-content-skeleton">
          <div class="row profile-heading pb-3">
            @csrf
            <div class="first_part">
              <div class="chng_brnch">
                <label class="group-field-label" for="mail-transport">Admin-Role</label>
                <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm role_id select2" menuName="user_role_id" menuId="admin_roleID" menuSelectLabel="Select Admin Role"></x-Dropdown.DropdownMenu>
              </div>
            </div>
            <div class="second_part">
              <div class="chng_brnch">
                <label class="group-field-label" for="mail-transport">Admin-Email</label>
                <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm role_id select2" menuName="user_email_id" menuId="admin_emailID" menuSelectLabel="Select Admin Email"></x-Dropdown.DropdownMenu>
              </div>
            </div>
            <div>
              <div class="third_part">
                <div class="chng_brnch">
                  <label class="group-field-label" for="mail-transport">Branch-Change</label>
                  <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm role_id select2" menuName="branch_name" menuId="admin_branch_name" menuSelectLabel="Select Branch Name"></x-Dropdown.DropdownMenu>
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
      </x-Modals.SmallModals.Bodies.Body>
      {{-- footer --}}
      <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
        <x-Modals.SmallModals.Buttons.CancelBtn 
          className="btn btn-sm danger-repl-btn" 
          btnId="cancle_change" 
          lableName="Cancel"
        />  
        <x-Modals.SmallModals.Buttons.ConfirmBtn 
          className="btn btn-sm success-shadow-btn update_confirm" 
          btnId="admin_change_btn_confirm" 
          lableName="Confirm" 
          lableClass="confirm-btn-text" 
          spinerClass="confirm-icon"
        />
      </x-Modals.SmallModals.Footers.Footer>
    </x-Modals.SmallModals.SmallModal>
  </x-Modals.Modal>
{{-- end branch change modal --}}

{{-- start delete modal --}}
  <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="delete_admin_branch">
    <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
      {{-- header --}}
      <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
        <h5 class="modal-title head_title font-white branch_name_head branch-skeleton ps-1 pe-1" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close-modal head_btn" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
      </x-Modals.SmallModals.Headers.Header>
      {{-- body --}}
      <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
        <div class="branch_access delete-content">
          <div class="row profile-heading pb-3">
            <div class="col-xl-12">
              <div class="form-group" id="load_id">
                <div>
                  <span class="usrImage mini_cricle_skeletone" id="usrImage"></span><br>
                  <span class="group-field text-field branch-line-content-skeleton" id="usrRole"></span><br>
                  <span class="group-field text-field branch-line-content-skeleton" id="usrEmail"></span>
                </div>
                <label class="group-field text-field branch-line-content-skeleton" id="cate_delete" for="id">
                  Branch-ID : <span id="admin_branch_id"></span>
                </label><br><br>
                <label class="group-field text-field branch-line-content-skeleton" id="cate_delete2">Are you sure, Would you like to delete branch access (<span class="group-field">branch-id : <span id="branch_delete_id"></span></span>) , permanently?</label>
                <!-- Hidden Input Fields for Storing Selected Branch Data -->
                <input type="hidden" id="admin_delete_id">
                <input type="hidden" id="admin_delete_branch_id">
              </div>
            </div>
          </div>
        </div>
      </x-Modals.SmallModals.Bodies.Body>
      {{-- footer --}}
      <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
        <x-Modals.SmallModals.Buttons.CancelBtn 
          className="btn btn-sm danger-repl-btn" 
          btnId="noButton" 
          lableName="No"
        />  
        <x-Modals.SmallModals.Buttons.ConfirmBtn 
          className="btn btn-sm success-shadow-btn update_confirm" 
          btnId="yesButton" 
          lableName="Yes" 
          lableClass="confirm-btn-text" 
          spinerClass="confirm-icon"
        />
      </x-Modals.SmallModals.Footers.Footer>
    </x-Modals.SmallModals.SmallModal>
  </x-Modals.Modal>
{{-- end delete modal --}}

{{-- start delete confirm modal --}}
  <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="delete_admin_confirm_branch">
    <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
      {{-- header --}}
      <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
        <h5 class="modal-title font-white confrim__head branch-skeleton ps-1 pe-1" id="staticBackdropLabel">
          Confirm Delete
        </h5>
        <button type="button" class="btn-close-modal head_btn" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
      </x-Modals.SmallModals.Headers.Header>
      {{-- body --}}
      <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
        <div class="branch_access delete-content">
          <span class="usrConfrmImage cricle_skeletone" id="usrConfrmImage"></span>
          <span class="block_title group-field branch-line-content-skeleton" id="usrConfrmRole"></span><br>
          <span class="block_title group-field branch-line-content-skeleton" id="usrConfrmEmail"></span><br>
          <p class="admin_paragraph branch-skeleton" id="delete_text_message">
            <label class="group-field" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
          </p>
        </div>
      </x-Modals.SmallModals.Bodies.Body>
      {{-- footer --}}
      <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
        <x-Modals.SmallModals.Buttons.CancelBtn 
          className="btn btn-sm danger-repl-btn" 
          btnId="cancle_delete" 
          lableName="Cancel"
        />  
        <x-Modals.SmallModals.Buttons.ConfirmBtn 
          className="btn btn-sm success-shadow-btn update_confirm" 
          btnId="delete_branch" 
          lableName="Confirm" 
          lableClass="confirm-btn-text" 
          spinerClass="confirm-icon"
        />
      </x-Modals.SmallModals.Footers.Footer>
    </x-Modals.SmallModals.SmallModal>
  </x-Modals.Modal>
{{-- end delete confirm modal --}}

<!-- Tostar Message Show -->
<x-TostarMessage.Tostar messageId="toast-body-message" tostarId="liveToast" />
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@include('fetch-api.branch.branch-role-user-fetch.ajax')
@include('super-admin.branch.ajax.admin-access-ajax')
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>

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