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
                    <div class="form-group mb-1 role_nme skeleton access_search" id="accessSearch" hidden>
                      <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Search Branch For Add Access....</label></span>
                      <select type="text" class="form-control form-control-sm select_branch_search select2" name="branch_name" id="select_branch_search">
                        <option value="">Select Company Branch Name</option>
                      </select>
                      <span id="updateForm_error"></span>
                      <input type="hidden" name="id" id="branches_id">
                      <input type="hidden" name="branch_id" id="get_branch_id">
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton admin_email_search" id="adminEmail" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Search User Email For Access Promot....</label><br>
                      <select type="text" class="form-control form-control-sm select_user_email select2" name="user_email_id" id="select_user_email">
                        <option value="">Select User Email</option>
                      </select>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="admin_role" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Role Name</label><br>
                      <select type="text" class="form-control form-control-sm user_role_id select2" name="user_role_id" id="select_role_one">
                        <option value="">Select Role Name</option>
                      </select>
                      <span id="savForm_branch_error9" hidden><span id="updateForm_branch_error" hidden></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="admin_email" hidden>
                      <label class="catg_name_label label_position" for="mail-transport">Email Address</label><br>
                      <select type="text" class="form-control form-control-sm user_email_id select_email_one select2" name="user_email_id" id="select_email_one">
                        <option value="">Select Email Address</option>
                      </select>
                      <span id="savForm_branch_error10" hidden><span id="updateForm_branch_error" hidden></span>
                    </div>
                    <div class="form-group role_nme branch mb-1 skeleton" id="adminstatus" hidden>
                      <label class="catg_name_label label_position" for="status">Sataus</label>
                      <input type="checkbox" class="admin_approval_status" name="status" id="admin_approval_status" value="1" />
                      <span id="updateForm_branch_error" hidden></span>
                      <span class="catg_name_label label_position" for="status" id="adminSt" hidden>Justify</span>
                      <span class="catg_name_label label_position" for="status" id="adminStTwo" hidden>Deny</span>
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
                      <div class="row">
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
                  <div class="col-xl-9 action_message">
                    <p class="ps-1 mt-2"><span id="success_message"></span></p>
                  </div>
                  <div class="col-xl-3">
                    <p style="text-align: end;">
                      <button type="button" id="access_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="access-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="access-btn-text">Access Promot</span>
                      </button>
                      <button type="button" id="branch_admin_access_store" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="access-store-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="access-store-btn-text">Access Add</span>
                      </button>
                      <button id="cnl_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus skeleton-button mt-2" hidden>
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
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('fetch-api.branch.branch-role-user-fetch.ajax')
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