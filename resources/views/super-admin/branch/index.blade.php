@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="category_page">
      <div class="card-body" id="table_card_body">
        <div class="row">
          <div class="col-xl-12">
            <div class="card-body focus-color cd branch_form">
              <input id="branch_id_field" type="text" name="branch_id_field" value="" hidden />
              <input id="generate_id" type="text" name="generate_id" hidden />
              <input id="branch_id" type="text" name="branch_id" class="branch_id_field branch_id" hidden />
              <form autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-xl-6">
                    <div class="form-group mb-1 role_nme skeleton">
                      <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Searching...</label></span>
                      <select type="text" class="form-control form-control-sm select_branch select2" name="branch_name" id="select_branch">
                        <option value="">Select Company Branch Name</option>
                      </select>
                      <input type="hidden" id="branches_id">
                    </div>
                    <div class="form-group role_nme mb-1 skeleton">
                      <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Branch Name</label></span>
                      <input class="form-control form-control-sm branch_input edit_branch_name" type="text" name="branch_name" id="branchName" placeholder="Branch Name" value="" />
                      <span class="input-label edit_branch_id" hidden><label class="id_label label_position" for="mail-transport">Branch ID : <input class="update_branch_id" name="branch_id" id="edit_branch_id" disabled></label></span>
                      <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">Branch Type</label>
                      <select type="text" class="form-control form-control-sm edit_branch_type select2" name="branch_type" id="branch_type">
                        <option value="">Select Branch Type</option>
                        <option value="Main Branch">Main Branch</option>
                        <option value="Corporate Branch">Corporate Branch</option>
                        <option value="Local Branch">Local Branch</option>
                      </select>
                      <span id="savForm_error2"></span><span id="updateForm_error2"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">Division Name</label>
                      <select type="text" class="form-control form-control-sm edit_division_id select2" name="division_id" id="select_division">
                        <option value="">Select Division</option>
                      </select>
                      <span id="savForm_error3"></span><span id="updateForm_error3"></span>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">District Name</label>
                      <select type="text" class="form-control form-control-sm edit_district_id select2" name="district_id" id="select_district">
                        <option value="">Select District</option>
                      </select>
                      <span id="savForm_error4"></span><span id="updateForm_error4"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">Upazila/Thana Name</label>
                      <select type="text" class="form-control form-control-sm edit_upazila_id select2" name="upazila_id" id="select_upazila">
                        <option value="">Select Upazila</option>
                      </select>
                      <span id="savForm_error5"></span><span id="updateForm_error5"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">City Name</label>
                      <input class="form-control form-control-sm branch_input edit_town_name" type="text" name="town_name" id="townName" placeholder="Town Name" value=""/>
                      <span id="savForm_error6" hidden></span><span id="updateForm_error6" hidden></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">Location</label>
                      <input class="form-control form-control-sm branch_input edit_location" type="text" name="location" id="location" placeholder="Location" value=""/>
                      <span id="savForm_error7" hidden></span><span id="updateForm_error7" hidden></span>
                    </div>
                    <div class="form-group role_nme branch mb-1" id="documents" hidden>
                      <table class="info_table">
                        <thead>
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
                <div class="row">
                  <div class="col-xl-9 action_message">
                    <p class="ps-1 mt-2"><span id="success_message"></span></p>
                  </div>
                  <div class="col-xl-3">
                    <p style="text-align: end;">
                      <button type="button" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" id="save">
                        <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="add-btn-text">ADD</span>
                      </button>
                      <button type="button" id="update_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="update-btn-text">Update</span>
                      </button>
                      <button type="button" id="access_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="access-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="access-btn-text">Access</span>
                      </button>
                      <button type="button" id="deleteLoader" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="delete-btn-text">Delete</span>
                      </button>
                      <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus skeleton-button mt-2">
                        <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="cancel-btn-text">Cancel</span>
                      </button>
                    </p>
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
    fetchData();
    focuButton();
  }, 1000);
</script>
@endpush('scripts')