<?php
  // Modals
  $modals = [
    // user access action modal
    ['modal_id'=>'userAccessActionModal'],
    // add access modal
    ['modal_id'=>'roleemailbranch'],
    // user access permission modal
    ['modal_id'=>'userAccessPermissionModal'],
    // branch change modal
    ['modal_id'=>'userBranchChangeModal'],
    // user access permission confirm modal
    ['modal_id'=>'userAccessPermissionConfirmModal'],
    // delete modal
    ['modal_id'=>'deletebranch'],
    // delete confirm modal
    ['modal_id'=>'deleteconfirmbranch'],
    // Branch Change modal
    ['modal_id'=>'branchChange'],
    // confirm Branch Change modal
    ['modal_id'=>'updateconfirmbranch'],
    // confirm access modal
    ['modal_id'=>'accessconfirmbranch'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <ul class="nav nav-tabs tab_bg" role="tablist" style="background:white;">
    <li class="nav-item tab-skeletone">
      <a class="nav-link branch active home-text" data-bs-toggle="tab" data-url="#home" id="tabHome"> Create Access</a>
    </li>
    <li class="nav-item tab-skeletone">
      <a class="nav-link branch ms-1" data-bs-toggle="tab" data-url="#userBranchPermission" id="tabAccess" hidden>Access Permission</a>
    </li>
  </ul>
  <div class="tab-content" id="showCard" style="background:white;padding-bottom:15px;">
    <div id="home" class="container tab-pane active">
      @include('super-admin.branch.create-user-branch-access')
    </div>
    <div id="userBranchPermission" class="container tab-pane">
      @include('super-admin.branch.user-branch-access-permission')
  </div>
  @include('loader.action-loader')
    {{-- start modal --}}
  @foreach($modals as $data)
    <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="{{ $data['modal_id'] }}">
      <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
        {{-- header --}}
        <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
          @if($data['modal_id'] === 'userAccessActionModal')
            <h5 class="modal-title admin_title head_title ps-1 pe-1 branch-skeleton" style="color:white;" id="staticBackdropLabel">
              Action Dialogue Box
            </h5>
            <button type="button" class="btn-close-modal head_btn" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'roleemailbranch')
            <h5 class="modal-title admin_title head_title ps-1 pe-1 modal-head-skeleton" id="staticBackdropLabel">
              <input class="modal_heading" type="text" id="branch_head_name" readonly>
            </h5>
            <button type="button" class="btn-close-modal head_btn" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'userAccessPermissionModal')
            <h5 class="modal-title admin_title head_title ps-1 pe-1 branch-skeleton branch_name_head" style="color: white;" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close-modal head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'userBranchChangeModal')
            <h5 class="modal-title admin_title head_title ps-1 pe-1 branch_name_heading hd-branch-skeleton branch_name_hd" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close-modal head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'userAccessPermissionConfirmModal')
            <h5 class="modal-title admin_title access_confirm_head_title ps-1 pe-1 head-branch-skeleton" id="staticBackdropLabel">
              Confirm User Branch Access
            </h5>
            <button type="button" class="btn-close-modal head_btn2 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'deletebranch')
            <h5 class="modal-title ps-1 pe-1 branch_name_head hedng branch-skeleton" style="color: white;" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close-modal hedng_btn" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'deleteconfirmbranch')
            <span class="modal-title admin_title scan confirm_title branch-skeleton pt-1">
              <span class="group-field" style="color: white;" id="usrConfrmRole"></span>
            </span>
            <button type="button" class="btn-close-modal head_btn2" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'branchChange')
            <h6 class="modal-title admin_title scan change_title branch-skeleton pt-1" id="staticBackdropLabel">
              <span style="color:white;">Branch Change</span>
            </h6>
            <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'updateconfirmbranch')
            <h6 class="modal-title admin_title scan update_title branch-skeleton pt-1" id="staticBackdropLabel">
              Update Branch
            </h6>
            <button type="button" class="btn-close-modal head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'accessconfirmbranch')
            <h6 class="modal-title admin_title scan access_title branch-skeleton pt-1" id="staticBackdropLabel">
              Branch Access
            </h6>
            <button type="button" class="btn-close-modal head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @endif
        </x-Modals.SmallModals.Headers.Header>
        {{-- body --}}
        <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
          @if($data['modal_id'] === 'userAccessActionModal')
            <div class="row profile-heading pb-3">
              <div class="col-xl-12">
                @csrf
                <input type="hidden" id="user_email_id">
                <div class="action_group">
                  <x-Modals.SmallModals.Buttons.ConfirmBtn 
                    className="btn btn-sm success-shadow-btn access_branch_delete" 
                    btnId="access_branch_delete" 
                    lableName="Access Delete" 
                    lableClass="delete-confrm-icon" 
                    spinerClass="delete-confrm-btn-text"
                  />  
                  <x-Modals.SmallModals.Buttons.ConfirmBtn 
                    className="btn btn-sm success-shadow-btn permission_btn ms-2" 
                    btnId="permission_btn" 
                    lableName="Access Permission" 
                    lableClass="confirm-icon" 
                    spinerClass="confirm-btn-text"
                  />
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'roleemailbranch')
            <div class="content_body">
              <div class="row profile-heading">
                @csrf
                <input type="hidden" id="add_branches_id">
                <input type="hidden" id="add_branch_id">
                <input type="hidden" id="add_branch_type">
                <input type="hidden" id="add_branch_name">
                <input type="hidden" id="add_division_id">
                <input type="hidden" id="add_district_id">
                <input type="hidden" id="add_upazila_id">
                <input type="hidden" id="add_town_name">
                <input type="hidden" id="add_location">
                <div class="content_message branch-nmT branch-skeleton">
                  <label class="group-field" for="branch-name">Branch-name </label>
                  <input type="text" class="branch_name_sub_title group-field branch-rest" id="confirm_branch_name" readonly>
                </div>
                <div class="form-group content_message role_nme branch-skeleton">
                  <label class="group-field ms-2" for="mail-transport">Role Name</label><br>
                  <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm role_id select2" menuName="role_id" menuId="role_id" menuSelectLabel="Select Role Name"></x-Dropdown.DropdownMenu>
                  <label class="group-field ms-2" for="mail-transport">Email Address</label><br>
                  <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm email_id select2" menuName="email_id" menuId="email_id" menuSelectLabel="Select Email Address"></x-Dropdown.DropdownMenu>
                  <p class="group-field mt-2 ms-2">Would you like to add branch for access, confirm or cancel ?</p>
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'userAccessPermissionModal')
            <div class="branch_access">
              <div class="">
                <span id="usrImage"></span>
                <span class="group-field" id="usrRole"></span><br>
                <span class="group-field" id="usrEmail"></span>
              </div>
              <div class="row profile-heading pb-3">
                @csrf
                <input type="hidden" id="users_email_id">
                <div class="action_group">
                  <ul id="user_branch_menu" class="list_group menu table-responsive"></ul>
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'userBranchChangeModal')
            <div class="branch_access">
              <div class="action_group group first_part branch-skeleton">
                <span id="usrImage3"></span>
                <span id="usrRole3"></span>
                <span id="usrEmail3"></span>
              </div>
              <div class="row profile-heading pb-3">
                @csrf
                <input type="hidden" id="users_branch_change_id">
                <input type="hidden" id="users_branch_email_id">
                <input type="hidden" id="branch_change_role_id">
                <div class="action_group second_part branch-content-skeleton">
                  <ul id="user_branch_menu_change" class="list_group menu table-responsive"></ul>
                </div>
                <div class="action_group">
                  <div class="third_part branch-content-footer-skeleton">
                    <div class="branch_chang">
                      <label class="catg_name_label" style="color:white;">Branch-Change</label>
                    </div>
                    <div class="chng_brnch">
                      <select type="text" class="form-control form-control-sm role_id select2" name="branch_name" id="branch_name_id">
                        <option value="">Select Branch Name</option>
                      </select>
                    </div>
                  </div>
                  <!-- Hidden Input Fields for Storing Selected Branch Data -->
                  <input type="hidden" id="change_branch_id">
                  <input type="hidden" id="change_branch_type">
                  <input type="hidden" id="change_branch_name">
                  <input type="hidden" id="change_division_id">
                  <input type="hidden" id="change_district_id">
                  <input type="hidden" id="change_upazila_id">
                  <input type="hidden" id="change_town_name">
                  <input type="hidden" id="change_location">
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'userAccessPermissionConfirmModal')
            <form class="add_access_form" autocomplete="off">
              @csrf
              <input type="hidden" id="users_email_id">
              <div class="modal-body profile-body pb-1">
                <div class="action_group group">
                  <span class="img-branch-skeleton" id="usrConfrmImage"></span>
                  <span class="branch-skeleton" id="usrConfrmRole"></span>
                  <span class="branch-skeleton" id="usrConfrmEmail"></span>
                </div>
                <span class="confirm-label branch-skeleton">Would you like to access, confirm or cancel ?</span>
              </div>
            </form>
          @elseif($data['modal_id'] === 'deletebranch')
            <div class="row profile-heading">
              <div class="col-xl-12">
                <div class="form-group" id="load_id">
                  <div class="group">
                    <span class="img-branch-skeleton" id="usrImage4"></span>
                    <span class="group-field branch-skeleton ms-2" id="usrRole4"></span><br>
                    <span class="group-field branch-skeleton" id="usrEmail4"></span><br>
                  </div>
                  <label class="group-field branch-skeleton" id="cate_delete" for="id">
                    Branch-ID : <span id="delete_branch_id"></span>
                  </label><br>
                  <label class="group-field branch-skeleton" id="cate_delete2">Are you sure, Would you like to delete, permanently?</label>
                  <input type="hidden" id="branch_delete_id">
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'deleteconfirmbranch')
            @csrf
            <input type="hidden" id="branch_delete_category_id">
            <div class="row profile-heading">
              <div class="col-xl-12">
                <div class="form-group branch role_nme mb-1 branch__category_name">
                  <span class="img-branch-skeleton" id="usrConfrmImage"></span><br>
                  <span class="group-field narrow-skeleton" id="usrConfrmEmail"></span>
                  <p class="admin_paragraph branch-skeleton" id="delete_text_message">
                    <label class="group-field" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
                  </p>
                  <input type="hidden" id="branch_delete_id">
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'branchChange')
            <div class="content_body">
              <div class="row profile-heading">
                <div class="content_message change_head branch-skeleton">
                  <label class="group-field ms-2" for="branch-name">User branch change </label>
                </div>
                <div class="form-group content_message change_head branch-skeleton">
                  <label class="group-field ms-2" for="mail-transport">Role</label><br>
                  <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm role_id select2" menuName="role_id" menuId="branch_role_id" menuSelectLabel="Select Role Name"></x-Dropdown.DropdownMenu>
                  <label class="group-field ms-2" for="mail-transport">Email Address</label><br>
                  <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm email_id select2" menuName="email_id" menuId="branch_email_id" menuSelectLabel="Select Email Address"></x-Dropdown.DropdownMenu>
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'updateconfirmbranch')
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
          @elseif($data['modal_id'] === 'accessconfirmbranch')
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="access_text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
          @endif
        </x-Modals.SmallModals.Bodies.Body>
        {{-- footer --}}
        <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
          @if($data['modal_id'] === 'userAccessActionModal')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="cancle_access" 
              lableName="Access Cancel"
            />
          @elseif($data['modal_id'] === 'roleemailbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="cancle_access" 
              lableName="Access Cancel"
            /> 
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn save_btn_confirm" 
              btnId="save_btn_confirm" 
              lableName="Confirm" 
              lableClass="confirm-access-btn-text" 
              spinerClass="confirm-access-btn-text"
            /> 
          @elseif($data['modal_id'] === 'userAccessPermissionModal')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn back_action_box" 
              btnId="cancle_access" 
              lableName="Access Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn permission_accss_btn" 
              btnId="permission_accss_btn" 
              lableName="Permission" 
              lableClass="confirm-btn-text" 
              spinerClass="confirm-icon"
            />
          @elseif($data['modal_id'] === 'userBranchChangeModal')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn branch-skeleton back_change_box" 
              btnId="cancle_change" 
              lableName="Access Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn change_btn_confirm branch-skeleton" 
              btnId="change_btn_confirm" 
              lableName="Confirm" 
              lableClass="confirm-btn-text" 
              spinerClass="confirm-icon"
            />
          @elseif($data['modal_id'] === 'userAccessPermissionConfirmModal')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="cancel_btn" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn access_confirm_button" 
              btnId="access_confirm_button" 
              lableName="Confirm" 
              lableClass="save-btn-text" 
              spinerClass="save-icon"
              />
          @elseif($data['modal_id'] === 'deletebranch')
            <p id="btn_group">
              <button type="button" class="btn btn-sm danger-repl-btn" data-bs-dismiss="modal" id="noButton">No</button>
            </p>
            <p id="btn_group2">
              <button type="button" class="btn btn-sm success-shadow-btn yes_button" id="yesButton">
                <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="btn-text">{{__('translate.Yes')}}</span>
              </button>
            </p> 
          @elseif($data['modal_id'] === 'updateconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="cate_delete5" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn update_confirm" 
              btnId="update_btn_confirm" 
              lableName="Confirm" 
              lableClass="confirm-btn-text" 
              spinerClass="confirm-icon"
            />
          @elseif($data['modal_id'] === 'deleteconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="cancel_delete_confrm" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn delete_branch" 
              btnId="delete_branch" 
              lableName="Confirm Delete" 
              lableClass="delete-confrm-btn-text" 
              spinerClass="delete-confrm-icon"
            />
          @elseif($data['modal_id'] === 'branchChange')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="cancel_change" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn update_confirm branch_id_btn" 
              btnId="branch_id_btn" 
              lableName="Change" 
              lableClass="branch-change-btn-text" 
              spinerClass="branch-change-icon"
            />
          @elseif($data['modal_id'] === 'accessconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn" 
              btnId="acces_delete" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn update_confirm" 
              btnId="access_btn_confirm" 
              lableName="Confirm" 
              lableClass="access-confirm-btn-text" 
              spinerClass="access-confirm-icon"
            />
          @endif
        </x-Modals.SmallModals.Footers.Footer>
      </x-Modals.SmallModals.SmallModal>
    </x-Modals.Modal>
  @endforeach
  {{-- end modal --}}
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('fetch-api.branch.branch-role-user-fetch.ajax')
@include('super-admin.branch.ajax.user-access-ajax')
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