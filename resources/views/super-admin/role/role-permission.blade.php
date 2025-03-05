@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="moduleTemplete">
      <div class="card-body" id="table_card_body">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-xl-12">
            <div class="form-group mb-1 role_nme skeleton access_search" id="roleSearch">
              <label class="role_permission_label" for="role-search">Role Permission Search</label>
              <select type="text" class="form-control form-control-sm select_user_email_search select2" name="branch_name" id="select_user_email_search">
                <option value="">Select User Email</option>
              </select>
              <input type="hidden" name="id" id="role_permission_id">
              <input type="hidden" name="branch_id" id="get_branch_id">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-4">
            <div class="form-group role_nme branch mb-1 skeleton admin_email_search" id="select_Branch">
              <label class="role_permission_label" for="branch">Select Branch <span class="confrm">*</span><span id="savForm_error"></span><span id="updateForm_error"></span></label><br>
              <select type="text" class="form-control form-control-sm edit_select_user_branch select2" name="branch_id" id="select_user_branch">
                <option value="">Select Branch</option>
              </select>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="form-group role_nme branch mb-1 skeleton admin_email_search" id="select_User">
              <label class="role_permission_label" for="email">Select User <span class="confrm">*</span><span id="savForm_error2"></span><span id="updateForm_error2"></span></label><br>
              <select type="text" class="form-control form-control-sm edit_select_user_email select2" name="login_email" id="select_user_email">
                <option value="">Select User Email Address</option>
              </select>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="form-group role_nme branch mb-1 skeleton admin_email_search" id="select_Role">
              <label class="role_permission_label" for="role">Select Role <span class="confrm">*</span><span id="savForm_error3"><span id="updateForm_error3"></span></span></label><br>
              <select type="text" class="form-control form-control-sm edit_select_user_role select2" name="role_id" id="select_user_role">
                <option value="">Select Role</option>
              </select>
              <input type="hidden" name="role" value="role_id" id="user_role">
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-xl-4">
            <label class="role_permission_label ps-3" for="permission-access">Role Permission Access <span class="confrm">*</span> :</label> 
            <input type="checkbox" class="form-switch form-check-input check_permission" name="status" value="1" id="rolePermission">
            <span id="savForm_error4"></span>
          </div>
          <div class="col-xl-5"></div>
          <div class="col-xl-3 act_bx">
            <button type="button" class="btn btn-sm role_create_button btn_key" id="updateBtn" disabled>
              <span class="update-btn-text">Update</span>
              <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" hidden></span>
            </button>
            <button type="button" class="btn btn-sm role_delete_button btn_key" id="roleDeleteBtn" disabled>
              <span class="delete-btn-text">Delete</span>
              <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" hidden></span>
            </button>
            <button type="button" class="btn btn-sm role_create_button btn_key" id="createBtn" disabled>
              <span class="create-sm-btn-text">Save</span>
              <span class="create-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" hidden></span>
            </button>
            <button type="button" class="btn btn-sm role_cancel_button btn_key" id="roleCancelBtn">
              <span class="delete-btn-text">Cancel</span>
              <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" hidden></span>
            </button>
          </div>
        </div>
        <div class="table-sm-responsive mt-2">
          <table class="module-category-table" id="module_catg">
            <thead class="module-category-table-head-two">
              <tr class="module-category-table-head-row-two" id="table_header">
                <th class="module-category-table-head-th-search-bar ps-1" id="role_permission_table_label_sn">SN.</th>
                <th class="module-category-table-head-th-search-bar" id="role_permission_table_label">Branch-ID</th>
                <th class="module-category-table-head-th-search-bar" id="role_permission_table_label">Role-Name</th>
                <th class="module-category-table-head-th-search-bar" id="role_permission_table_label">Email</th>
                <th class="module-category-table-head-th-search-bar" id="role_permission_table_label">Status</th>
                <th class="module-category-table-head-th-search-bar" id="role_permission_table_label">Creator</th>
                <th class="module-category-table-head-th-search-bar" id="role_permission_table_last_label">updator</th>
              </tr>
            </thead>
            <tbody class="module-category-table-body bg-white" id="role_permission_table"></tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="table_footers act_bx">
              <span class="ps-3"> Total Role Permission </span>
              <span class="pe-2" id="role_permission_row_amount">0.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-12 action_message mb-5">
        <p class="mt-1"><span id="success_message"></span></p>
      </div>
    </div>
  </div>
  @include('loader.action-loader')
  
  {{-- start confirm create modal --}}
  <div class="modal fade" id="createconfirmmodulecategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header header-padding" id="logoutModal_header">
          <h6 class="modal-title admin_title scan create_title branch-skeleton pt-1" id="staticBackdropLabel">
            Module Category : <span id="module_create_modal_heading"></span>
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn_create_close head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="module_category_create_paragraph branch-skeleton" style="text-align:center;" id="access_text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to create module category (<span id="module_catg_create_modal"></span>), confirm or cancel ? </label>
            </p>
            <span id="savForm_error"></span>
          </div>
          <div class="modal-footer action_group footer-padding" id="logoutModal_footer">
            <button type="button" class="module-sm-cancel-btn branch-skeleton" id="create_cancel" data-bs-dismiss="modal">Cancel</button>
            <button id="create_btn_confirm" class="module-sm-btn branch-skeleton">
              <span class="create-confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="create-confirm-btn-text">Confirm</span>
            </button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm create modal --}}

  {{-- start confirm update modal --}}
  <div class="modal fade" id="updateconfirmmodule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header header-padding" id="logoutModal_header">
          <h6 class="modal-title admin_title scan modal_header_title branch-skeleton pt-1" id="staticBackdropLabel">
            Module Category : <span id="module_update_modal_heading"></span>
          </h6>
          <button type="button" class="btn-close btn-btn-sm modal_header_cancel branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="modal_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update module category (<span id="module_catg_update_modal"></span>), confirm or cancel ? </label>
            </p>
            <span id="updateForm_error"></span>
          </div>
          <div class="modal-footer action_group footer-padding" id="logoutModal_footer">
            <button type="button" class="module-sm-cancel-btn delete_cancel branch-skeleton" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
            <button id="update_btn_confirm" class="module-sm-btn update_confirm branch-skeleton">
              <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="confirm-btn-text">Confirm</span>
            </button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm update modal --}}

  {{-- start delete confirm modal --}}
  <div class="modal fade" id="deleteconfirmmodulecategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header header-padding" id="logoutModal_header">
          <h6 class="modal-title module_category_delete_title scan confirm_title branch-skeleton pt-1" id="staticBackdropLabel">
            Module Category : <span id="module_delete_modal_heading"></span>
          </h6>
          <button type="button" class="btn-close btn-btn-sm modal_delete_header_cancel branch-skeleton delete_confrm_canl" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="module_category_delete_paragraph branch-skeleton" style="text-align:center;" id="delete_text_message">
              <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, module category (<span id="module_catg_delete_modal"></span>) delete or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer action_group footer-padding" id="logoutModal_footer">
            <button type="button" class="module-sm-cancel-btn branch-skeleton" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="module-sm-btn branch-skeleton delete_module_category" id="delete_module_category">
              <span class="delete-confrm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="delete-confrm-btn-text">Delete</span>
            </button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end delete confirm modal --}}

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/module-asset/module.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('super-admin.role.ajax.role-permission-ajax')
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