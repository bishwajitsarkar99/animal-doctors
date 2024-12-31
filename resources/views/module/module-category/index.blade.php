@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="moduleTemplete">
      <div class="card-body" id="table_card_body">
        <table class="module-category-table" id="module_catg_first">
          @csrf
          <input type="hidden" name="module_category_id" id="moduleCategoryId">
          <thead class="module-category-table-head-one" id="module_catg_thead_one">
            <tr class="module-category-table-head-row" id="module_catg_row">
              <th class="module-category-table-head-th-label" id="thCatgName">Category-Name :</th>
              <th class="module-category-table-head-th-input" colspan="3" id="thCateg">
                <input class="module-category-input edit-module-category-input" type="text" name="module_category_name" value="" placeholder="Category Name" id="moduleCategoryName">
              </th>
              <th  class="module-category-table-head-th-action action_th" colspan="3" id="thAction" hidden>
                <button class="module-sm-btn" id="catgCreateBtn" hidden>Create</button>
                <button class="module-sm-btn" id="catgUpdateBtn" hidden>Update</button>
                <button class="module-sm-delete-btn" id="catgDeleteBtn" hidden>Delete</button>
                <button class="module-sm-cancel-btn" id="catgCancelBtn" hidden>Cancel</button>
              </th>
            </tr>
          </thead>
          <thead class="module-category-table-head-two">
            <tr class="module-category-table-head-row-two" id="module_catg_row_two">
              <th class="module-category-table-head-th-search-label" id="module_searchBar">Search-Bar :</th>
              <th class="module-category-table-head-th-search-bar" colspan="5">
                <input class="table-search-bar input-field" type="search" name="module_category_name" value="" placeholder="Search" id="CategorySearchBar">
              </th>
            </tr>
          </thead>
          <thead class="module-category-table-head-two">
            <tr class="module-category-table-head-row-two" id="module_catg_row_three">
              <th class="module-category-table-head-th-search-bar" id="module_catg_row_sn">SN.</th>
              <th class="module-category-table-head-th-search-bar" colspan="5" id="module_catg_row_catname">Category-Name</th>
            </tr>
          </thead>
        </table>
        <div class="table-responsive">
          <table class="module-category-table mb-3" id="module_catg">
            <tbody class="module-category-table-body bg-white" id="module_category_table"></tbody>
          </table>
        </div>
        <table class="footer_box">
          <tfoot class="module-category-table-footer mb-3">
            <tr class="module-category-table-footer-row table-row" id="footerRow">
              <th class="module-category-table-footer-th" colspan="5" id="module_catg_row_total">Total Category </th>
              <th class="module-category-table-footer-th" id="module_catg_row_amount"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  @include('loader.action-loader')
  
  {{-- start delete modal --}}
  <div class="modal fade" id="deletebranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  <div class="modal fade" id="deleteconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  <div class="modal fade" id="updateconfirmmodule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header header-padding" id="logoutModal_header">
          <h6 class="modal-title admin_title scan update_title branch-skeleton pt-1" id="staticBackdropLabel">
            Module Category : <span id="module_update_modal_heading"></span>
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update module category (<span id="module_catg_update_modal"></span>), confirm or cancel ? </label>
            </p>
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
  <div class="modal fade" id="branchTypeCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title branch_type_head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
           Branch Category
          </h5>
          <button type="button" class="btn-close btn-btn-sm branch_type_head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body">
          @csrf
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group mb-1 role_nme branch_select_type branch-skeleton">
                <span class="input-label"><label class="catg_name_label label_position" for="branch-category-name">Searching...</label></span>
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
                <label class="catg_name_label label_position" for="mail-transport">Category Name</label>
                <input class="form-control form-control-sm branch_input edit_branch_category_name" type="text" name="branch_category_name" id="branchTypeName" placeholder="Branch Category Name" value="" autocomplete="off"/>
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
  <div class="modal fade" id="branchTypeDeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <label class="catg_name_label label_position" for="mail-transport">
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
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/module-asset/module.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('module.module-category.ajax.category_module-ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<!-- <script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script> -->

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