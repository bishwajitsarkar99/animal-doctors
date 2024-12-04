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
                  <div class="col-xl-6">
                    <div class="form-group mb-1 role_nme">
                      <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Searching...</label></span>
                      <select type="text" class="form-control form-control-sm select_branch select2" name="branch_name" id="select_branch">
                        <option value="">Select Company Branch Name</option>
                      </select>
                    </div>
                    <div class="form-group role_nme mb-1">
                      <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Branch Name</label></span>
                      <input class="form-control form-control-sm branch_input branch_name" type="text" name="branch_name" id="branchName" placeholder="Branch Name" value="" />
                    </div>
                    <div class="form-group role_nme mb-1">
                      <label class="catg_name_label label_position" for="mail-transport">Branch Type</label>
                      <select type="text" class="form-control form-control-sm branch_type select2" name="branch_type" id="branch_type">
                        <option value="">Select Branch Type</option>
                        <option value="Main Branch">Main Branch</option>
                        <option value="Corporate Branch">Corporate Branch</option>
                        <option value="Local Branch">Local Branch</option>
                      </select>
                    </div>
                    <div class="form-group role_nme mb-1">
                      <label class="catg_name_label label_position" for="mail-transport">Division Name</label>
                      <select type="text" class="form-control form-control-sm division_name select2" name="division_name" id="select_division">
                        <option value="">Select Division</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group role_nme mb-1">
                      <label class="catg_name_label label_position" for="mail-transport">District Name</label>
                      <select type="text" class="form-control form-control-sm district_name select2" name="district_name" id="select_district">
                        <option value="">Select District</option>
                      </select>
                    </div>
                    <div class="form-group role_nme mb-1">
                      <label class="catg_name_label label_position" for="mail-transport">Upazila Name</label>
                      <select type="text" class="form-control form-control-sm thana_or_upazila_name select2" name="upazila_name" id="select_upazila">
                        <option value="">Select Upazila</option>
                      </select>
                    </div>
                    <div class="form-group role_nme mb-1">
                      <label class="catg_name_label label_position" for="mail-transport">Town Name</label>
                      <input class="form-control form-control-sm branch_input town_name" type="text" name="town_name" id="townName" placeholder="Town Name" value=""/>
                    </div>
                    <div class="form-group role_nme mb-1">
                      <label class="catg_name_label label_position" for="mail-transport">Location</label>
                      <input class="form-control form-control-sm branch_input location" type="text" name="location" id="location" placeholder="Location" value=""/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-9"></div>
                  <div class="col-xl-3">
                    <p style="text-align: end;">
                      <button type="submit" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" id="save">
                        <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="category-btn-text">ADD</span>
                      </button>
                      <button id="update_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="update-btn-text">Update</span>
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
        <div class="col-xl-12 action_message">
          <p class="ps-1"><span id="success_message"></span></p>
        </div>
      </div>
      
    </div>
  </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('division-district-upazila.ajax')
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

  function focuCardHead() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head')
    });
  } 

  function focuCardHeadLabel() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head-label')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head-label')
    });
  }

  function focuCardHeadLabl() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head-labl')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head-labl')
    });
  }

  function focuCardHeadCapsule() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head-capsule')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head-capsule')
    });
  }

  function focuCardTable() {
    const allSkeleton = document.querySelectorAll('.skeleton-table')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-table')
    });
  }

  function focuCardTablePeritemLabel() {
    const allSkeleton = document.querySelectorAll('.peritem-label-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('peritem-label-skeleton')
    });
  }

  function focuCardTablePeritem() {
    const allSkeleton = document.querySelectorAll('.peritem-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('peritem-skeleton')
    });
  }

  function focuCardTablePagination() {
    const allSkeleton = document.querySelectorAll('.pagination-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('pagination-skeleton')
    });
  }

  function focuInputLabel() {
    const allSkeleton = document.querySelectorAll('.skeleton-input-label')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-input-label')
    });
  }
  function focuButton() {
    const allSkeleton = document.querySelectorAll('.skeleton-button')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-button')
    });
  }

  function focuInput() {
    const allSkeleton = document.querySelectorAll('.skeleton-input')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-input')
    });
  }

  setTimeout(() => {
    fetchData();
    focuCardHead();
    focuCardHeadLabel();
    focuCardHeadLabl();
    focuCardHeadCapsule();
    focuCardTable();
    focuCardTablePeritemLabel();
    focuCardTablePeritem();
    focuCardTablePagination();
    focuInputLabel();
    focuButton();
    focuInput();
  }, 1000);
</script>
@endpush('scripts')