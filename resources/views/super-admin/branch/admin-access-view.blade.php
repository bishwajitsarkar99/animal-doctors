@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="category_page">
      <div class="card-body" id="table_card_body">
        <div class="row">
          <div class="col-xl-12">
            <div class="card-body focus-color cd branch_form">
              <form autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-xl-4">
                    <div class="form-group mb-1 role_nme skeleton">
                      <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Searching...</label></span>
                      <select type="text" class="form-control form-control-sm select_branch_search select2" name="branch_name" id="select_branch_search">
                        <option value="">Select Company Branch Name</option>
                      </select>
                      <input type="hidden" id="branches_id">
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton">
                      <label class="catg_name_label label_position" for="mail-transport">Select Role</label>
                      <select type="text" class="form-control form-control-sm role_type select2" name="role_type" id="role_type">
                        <option value="">Select Role Type</option>
                        <option value="Admin Role">Admin Role</option>
                        <option value="Sub Admin Role">Sub Admin Role</option>
                      </select>
                      <span id="savForm_error2"></span><span id="updateForm_error2"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="adminRole" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Role Name</label><br>
                      <select type="text" class="form-control form-control-sm admin_role_id select2" name="admin_role_id" id="admin_role_id">
                        <option value="">Select Admin Role Name...................................</option>
                      </select>
                      <span id="savForm_error3"></span><span id="updateForm_error3"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="subAdminRole" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Role Name</label><br>
                      <select type="text" class="form-control form-control-sm sub_admin_role_id select2" name="sub_admin_role_id" id="sub_admin_role_id">
                        <option value="">Select Sub Role Name........................................</option>
                      </select>
                      <span id="savForm_error3"></span><span id="updateForm_error3"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="adminEmail" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Email Address</label><br>
                      <select type="text" class="form-control form-control-sm admin_email_id select2" name="admin_email_id" id="admin_email_id">
                        <option value="">Select Admin Email Address.............................</option>
                      </select>
                      <span id="savForm_error4"></span><span id="updateForm_error4"></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="subAdminEmail" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Email Address</label><br>
                      <select type="text" class="form-control form-control-sm sub_admin_email_id select2" name="sub_admin_email_id" id="sub_admin_email_id">
                        <option value="">Select Sub Admin Email Address....................</option>
                      </select>
                      <span id="savForm_error4"></span><span id="updateForm_error4"></span>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="card card-body branch_info_card" id="documents" hidden>
                        <div class="row">
                            <div class="col-xl-6">

                            </div>
                            <div class="col-xl-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
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
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-9 action_message">
                    <p class="ps-1 mt-2"><span id="success_message"></span></p>
                  </div>
                  <div class="col-xl-3">
                    <p style="text-align: end;">
                      <button type="button" id="access_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2">
                        <span class="access-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="access-btn-text">Access</span>
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
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('division-district-upazila.ajax')
@include('super-admin.branch.ajax.admin-access-ajax')
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