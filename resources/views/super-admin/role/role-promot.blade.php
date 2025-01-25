@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="moduleTemplete">
      <div class="card-body" id="table_card_body">
        <table class="module-category-table" id="module_catg_first">
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="role_id" id="roleId">
          <thead class="module-category-table-head-two">
            <tr class="module-category-table-head-row-two" id="module_catg_row_two">
              <th class="module-category-table-head-th-search-label" id="module_searchBar">Search-Bar :</th>
              <th class="module-category-table-head-th-search-bar" colspan="5">
                <input class="table-search-bar input-field" type="search" name="module_category_name" value="" placeholder="Search" id="RoleSearchBar">
              </th>
            </tr>
          </thead>
        </table>
        <div class="table__responsive">
          <table class="module-category-table" id="module_catg">
            <thead class="module-category-table-head-two">
              <tr class="table-heading-row" id="role_row">
                <th class="" id="table_head_sn">ID-NO.</th>
                <th class="" id="row_role_name">Role-Name</th>
                <th class="" id="row_role_condition">Role-Condition</span></th>
                <th class="" id="row_role_status">Status</th>
              </tr>
            </thead>
            <tbody class="module-category-table-body bg-white" id="role_table"></tbody>
          </table>
        </div>
        <table class="footer_box">
          <tfoot class="module-category-table-footer mb-3">
            <tr class="module-category-table-footer-row table-row" id="footerRow">
              <th class="module-category-table-footer-th" colspan="5" id="module_catg_row_total">
                Total Role 
                <!-- <span class="action_message"><span id="success_message"></span></span> -->
              </th>
              <th class="module-category-table-footer-th" id="module_catg_row_amount"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="col-xl-12 action_message">
      <p class="ps-1"><span id="success_message"></span></p>
    </div>
  </div>
  @include('loader.action-loader')
  {{-- Start Action Box Modal--}}
  <div class="modal fade" id="action_box" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="access_modal_box">
        <div class="modal-body" id="processModal_body">
          <div class="role_create_form" id="roleActionBox">
            @csrf
            <input type="hidden" id="table_row_id">
            <li class="act_box ps-1">
              <button type="button" class="btn btn-sm role_create_button btn_key" id="createBtn" hidden>
                <span class="create-btn-text">Save</span>
                <span class="create-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              </button>
              <button type="button" class="btn btn-sm role_create_button btn_key" id="updateBtn" hidden>
                <span class="update-btn-text">Update</span>
                <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              </button>
              <button type="button" class="btn btn-sm role_create_button btn_key" id="promotBtn" hidden>
                <span class="promotion-btn-text">Promot</span>
                <span class="promotion-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              </button>
              <button type="button" class="btn btn-sm role_create_button btn_key" id="nonPromotBtn" hidden>
                <span class="non-promotion-btn-text">Non-Promot</span>
                <span class="non-promotion-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              </button>
              <button type="button" class="btn btn-sm role_delete_button btn_key" id="roleDeleteBtn" hidden>
                <span class="delete-btn-text">Delete</span>
                <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              </button>
              <button type="button" class="btn-sm edit_registration cancel_button cgr_btn edit_btn ms-2" id="actionCancel" data-bs-dismiss="modal" style="font-size: 15px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                <i class="fa-solid fa-xmark can-icon"></i>
              </button>
            </li>
          </div>
          <span id="savForm_error"></span>
        </div>  
      </div>
    </div>
  </div>
  {{-- End Action Box Modal--}}
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
  <div class="modal fade" id="updateconfirmrolemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header header-padding" id="logoutModal_header">
          <h6 class="modal-title admin_title scan modal_header_title pt-1" id="staticBackdropLabel">
            Role-Name : <span id="update_role_name_modal_heading"></span>
          </h6>
          <button type="button" class="btn-close btn-btn-sm modal_header_cancel" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="modal_paragraph" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update role name (<span id="role_name_update_modal"></span>), confirm or cancel ? </label>
            </p>
            <span id="updateForm_error"></span>
          </div>
          <div class="modal-footer action_group footer-padding" id="logoutModal_footer">
            <button type="button" class="module-sm-cancel-btn delete_cancel" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
            <button id="update_btn_confirm" class="module-sm-btn update_confirm">
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
@include('super-admin.role.ajax.role-promot-ajax')
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