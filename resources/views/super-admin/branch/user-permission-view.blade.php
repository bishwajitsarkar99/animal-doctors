@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <ul class="nav nav-tabs tab_bg" role="tablist" style="background:white;">
      <li class="nav-item tab-skeletone">
        <a class="nav-link branch active home-text" data-bs-toggle="tab" href="#home" id="tabHome"> Create Access</a>
      </li>
      <li class="nav-item tab-skeletone">
        <a class="nav-link branch" data-bs-toggle="tab" href="#userBranchPermission" id="tabAccess" hidden>Access Permission</a>
      </li>
    </ul>
    <div class="tab-content" id="showCard" style="background:white;padding-bottom:15px;">
      <div id="home" class="container tab-pane active">
        @include('super-admin.branch.create-user-branch-access')
      </div>
      <div id="userBranchPermission" class="container tab-pane">
        @include('super-admin.branch.user-branch-access-permission')
    </div>
  </div>
  @include('loader.action-loader')
  {{-- start role and email modal --}}
  <div class="modal fade" id="roleemailbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
            Confirm User Access
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>
        <form class="add_access_form" autocomplete="off">
          @csrf
          <div class="modal-body profile-body pb-1">
            <div class="row profile-heading">
              <div class="col-xl-12">
                <input class="add_branches_id" name="branches_id" id="add_branches_id" hidden>
                <input type="text" name="branch_id" id="add_branch_id" hidden>
                <span id="savForm_error" hidden></span>
                <input type="text" name="branch_type" id="add_branch_type" hidden>
                <input type="text" name="branch_name" id="add_branch_name" hidden>
                <input type="text" name="division_id" id="add_division_id" hidden>
                <input type="text" name="district_id" id="add_district_id" hidden>
                <input type="text" name="upazila_id" id="add_upazila_id" hidden>
                <input type="text" name="town_name" id="add_town_name" hidden>
                <input type="text" name="location" id="add_location" hidden>
                <div class="form-group role_nme mb-1 branch-skeleton">
                  <span class="input-label"><label class="catg_name_label label_position" for="role">User Role</label></span>
                  <select type="text" class="form-control form-control-sm role_id select2" name="role_id" id="role_id">
                    <option value="">Select User Role</option>
                  </select>
                  <span id="savForm_error2"></span>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="form-group role_nme mb-1 branch-skeleton">
                  <span class="input-label"><label class="catg_name_label label_position" for="email">User Email</label></span>
                  <select type="text" class="form-control form-control-sm email_id select2" name="email_id" id="email_id">
                    <option value="">Select User Email</option>
                  </select>
                  <span id="savForm_error3"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer profile_modal_footer">
            <p id="btn_group2">
              <button id="save_btn_confirm" type="button" class="btn btn-sm cgt_btn btn_focus branch-skeleton mt-2">
                <span class="save-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="save-btn-text">Confirm</span>
              </button>
            </p>
            <p id="btn_group">
              <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton mt-2" data-bs-dismiss="modal">
                <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="cancel-btn-text">Cancel</span>
              </button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end role and email modal --}}

  {{-- start user access action modal --}}
  <div class="modal fade" id="userAccessActionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
            User Access Action Box
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="row profile-heading pb-3">
            @csrf
            <input type="hidden" id="user_email_id">
            <div class="action_group">
              <button id="permission_btn" class="btn btn-sm modal_button update_confirm group-branch-skeleton">
                <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="confirm-btn-text">Access Permission</span>
              </button>
              <button id="branch_change_btn" class="btn btn-sm modal_button update_confirm group-branch-skeleton">
                <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="confirm-btn-text">Branch Change</span>
              </button>
            </div>
            <div class="action_group mt-3">
              <button id="access_update_btn" class="btn btn-sm modal_button update_confirm group-branch-skeleton">
                <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="confirm-btn-text">Access Update</span>
              </button>
              <button type="button" class="btn btn-sm cgt_cancel_btn delete_bg_btn delet_btn_user mn-branch-skeleton access_branch_delete" id="access_branch_delete">
                <span class="delete-confrm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="delete-confrm-btn-text">Access Delete</span>
              </button>
              <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel mn-branch-skeleton" id="cancle_access" data-bs-dismiss="modal">Access Cancel</button>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer">
        </div>
      </div>
    </div>
  </div>
  {{-- end user access action modal --}}

  {{-- start user access permission modal --}}
  <div class="modal fade" id="userAccessPermissionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton branch_name_head" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton cancel_action_box" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="action_group group">
            <span id="usrImage"></span>
            <span id="usrRole"></span>
            <span id="usrEmail"></span>
          </div>
          <div class="row profile-heading pb-3">
            @csrf
            <input type="hidden" id="users_email_id">
            <div class="action_group">
              <ul id="user_branch_menu" class="list_group menu table-responsive"></ul>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action_group">
          <button id="permission_accss_btn" class="btn btn-sm modal_button update_confirm group-branch-skeleton">
            <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-btn-text">Permission</span>
          </button>
          <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel mn-branch-skeleton back_action_box" id="cancle_access" data-bs-dismiss="modal">Access Cancel</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end user access permission modal --}}

  {{-- start delete modal --}}
  <div class="modal fade" id="deletebranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
            Delete Branch
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="row profile-heading pb-3">
            <div class="col-xl-12">
              <div class="form-group delete_content branch-skeleton" id="load_id">
                <span><div id="active_loader" class="loader_chart mt-1"></div></span>
                <label class="label_user_edit" id="cate_delete" for="id">Branch-ID : </label>
                <span id="cat_id"> <input type="text" class="mt-3 update_id id" id="delete_branch_id" readonly><br></span>
                <span class="label_user_edit" id="cate_delete2">{{__('translate.Are you sure, Would you like to delete this category, permanently?')}}</span>
                <input type="hidden" id="delete_branch_id" name="branches_id">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer">
          <p id="btn_group2">
            <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesButton">
              <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
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
  <div class="modal fade" id="deleteconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan confirm_title branch-skeleton pt-1" id="staticBackdropLabel">
            Confirm Delete
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn2 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
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
              <span class="delete-confrm-btn-text">Delete</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end delete confirm modal --}}

  {{-- start confirm update modal --}}
  <div class="modal fade" id="updateconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan update_title branch-skeleton pt-1" id="staticBackdropLabel">
            Update Branch
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="logoutModal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button id="update_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus branch-skeleton">
              <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="confirm-btn-text">Confirm</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm update modal --}}

  {{-- start confirm access modal --}}
  <div class="modal fade" id="accessconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
          <div class="modal-body" id="logoutModal_body">
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
    fetchData();
    focuButton();
  }, 1000);
</script>
@endpush('scripts')