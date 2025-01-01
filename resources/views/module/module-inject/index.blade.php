@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="moduleTemplete">
      <div class="card-body" id="table_card_body">
        <table class="module-category-table" id="module_catg_first">
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="module_category_id" id="moduleNameId">
          <thead class="module-category-table-head-two">
            <tr class="module-category-table-head-row-two" id="module_catg_row_two">
              <th class="module-category-table-head-th-search-label" id="module_searchBar">Search-Bar :</th>
              <th class="module-category-table-head-th-search-bar" colspan="5">
                <input class="table-search-bar input-field" type="search" name="module_name" value="" placeholder="Search" id="ModuleSearchBar">
              </th>
            </tr>
          </thead>
          <thead class="module-category-table-head-one" id="module_catg_thead_one">
            <tr class="module-category-table-head-row" id="module_catg_row">
              <th class="module-category-table-head-th-input" id="thModule">
                <input class="module-name-input edit_module_name" type="text" name="module_name" value="" placeholder="Module Name" id="module_name">
              </th>
              <th class="module-category-table-head-th-input" id="thModule">
                <input class="module-category-input edit_module_category" type="text" name="module_category" value="" placeholder="Module Category" id="module_category">
              </th>
              <th class="module-category-table-head-th-input" colspan="2" id="thModule">
                <input class="module-url-input edit_module_url" type="text" name="module_url" value="" placeholder="Module URL" id="module_url">
              </th>
            </tr>
            <tr class="module-category-table-head-row" id="module_catg_row">
              <th>
                <input class="module-domain-input edit_module_url_prefix" type="text" name="module_url_prefix" value="" placeholder="URL Prefix" id="module_url_prefix">
              </th>
              <th class="module-category-table-head-th-input" id="thModule">
                <input class="module-domain-input edit_module_domain" type="text" name="module_domain" value="" placeholder="Module Domain" id="module_domain">
              </th>
              <th class="module-category-table-head-th-input" id="thModule">
                <input class="module-ip-address-input edit_module_ip_address" type="text" name="module_ip_address" value="" placeholder="Module IP Address" id="module_ip_address">
              </th>
              <th  class="module-table-th-action action_th" colspan="3" id="thAction" hidden>
                <input class="module-sm-btn" type="button" value="Create" id="catgCreateBtn" hidden>
                <input class="module-sm-btn" type="button" value="Update" id="catgUpdateBtn" hidden>
                <input class="module-sm-delete-btn" type="button" value="Delete" id="catgDeleteBtn" hidden>
                <input class="module-sm-cancel-btn" type="button" value="Cancel" id="catgCancelBtn" hidden>
              </th>
            </tr>
          </thead>
        </table>
        <div class="table-responsive">
          <table class="module-category-table mb-3" id="module_catg">
            <thead class="module-category-table-head-two">
              <tr class="module-category-table-head-row-two" id="module_catg_row_three">
                <th class="module-table-index ps-1" id="module_catg_row_sn">SN.</th>
                <th class="module-table-index" id="module_catg_row_catname">Module-Name</th>
                <th class="module-table-index" id="module_catg_row_catname">Module-Category</th>
                <th class="module-table-index" id="module_catg_row_catname">Module-URL</th>
                <th class="module-table-index" id="module_catg_row_catname">Domain</th>
                <th class="module-table-index" id="module_catg_row_catname">Ip-Address</th>
              </tr>
            </thead>
            <tbody class="module-category-table-body bg-white" id="module_inject_table"></tbody>
          </table>
        </div>
        <table class="footer_box">
          <tfoot class="module-category-table-footer mb-3">
            <tr class="module-category-table-footer-row table-row" id="footerRow">
              <th class="module-category-table-footer-th" colspan="5" id="module_catg_row_total">
                Total Module <span class="action_message"><span id="success_message"></span></span>
              </th>
              <th class="module-category-table-footer-th" id="module_nam_row_amount"></th>
            </tr>
          </tfoot>
        </table>
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
@include('module.module-name.ajax.module-name-ajax')
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