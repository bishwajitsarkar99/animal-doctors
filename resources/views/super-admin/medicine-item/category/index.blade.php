@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <p class="catg mb-1">
            <span class="skeleton-card-head" style="color:black;">{{__('translate.Category')}}</span>
            <span class="tot_summ" id="num_plate">
              <label class="tot-search skeleton-card-head-labl mt-3 pt-2" style="color:black;" for="tot_cagt"> ➤ {{__('translate.Total Category')}} :</label>
              <label class="badge pill-rounded skeleton-card-head-capsule" for="total_medic_records" id="iteam_label4"><span class="total_users" style="font-weight:700;color:black;" id="total_category_records"></span><span id="iteam_label5" style="font-weight: 700;color:black;font-size: 11px;">.00 {{__('translate.items')}}</span></label>
            </span>
            <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden" style="color:rgb(13, 110, 253);opacity:1;"></i>
          </p>
          <div class="row">
            <div class="col-3 skeleton-card-head-label">
              <span class="form-check form-switch search_ me-2">
                <input class="form-check-input" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <label class="search ser_label ps-1 pt-1" style="color:black;" for="search pe-2">{{__('translate.Search')}} :</label>
                <label class="form-check-label" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
              </span>
            </div>
            <div class="col-9">
              <span id="search_plate">
                <input id="search" type="search" name="search" id="exampleDataList" class="category-all-search searchform display_hidden ps-1" placeholder="{{__('translate.Category Search.........')}}">
              </span>
            </div>
          </div>
          <div class="table-responsive">
            <table class="ord_table center border-1 skeleton-table" id="myTable">
              <thead class="table-light">
                <tr class="table-row order_body acc_setting_table skeleton">
                  <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="tableHead table_th_color txt col ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.ID')}}</th>
                  <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ col ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Action')}}</th>
                  <th id="th_sort" draggable="true" data-coloumn="category_name" data-order="desc" class="tableHead table_th_color tot_pending_ col ps-1 pt-1" style="text-align: left;cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Category-Name')}}</th>
                  <th id="th_sort" draggable="true" data-coloumn="status" data-order="desc" class="tableHead table_th_color tot_pending_ ps-1 pt-1" style="text-align: left;cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Status')}}</th>
                  <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ check_border col pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Check')}}</th>
                </tr>
              </thead>
              <tbody class="table-light bg-white" id="category_data_table">


              </tbody>
            </table>
          </div>
          <div class="row table_last_row">
            <div class=" col-2">
              <label class="item_class peritem-label-skeleton">Peritem</label>
              <div class="custom-select peritem-skeleton">
                <select class="ps-1" id="perItemControl">
                  <option class="" selected>10</option>
                  <option class="">20</option>
                  <option class="">50</option>
                  <option class="">100</option>
                  <option class="">200</option>
                </select>
              </div>
            </div>
            <div class="col-10">
              <div class="pagination pagination-skeleton mt-1" id="category_data_table_paginate">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5">
        <div class="row">
          <div class="category-form">
            <div class="card form-control cat_form">
              <form class="mini-form" autocomplete="off">
                @csrf
                <!-- Category-field -->
                <div class="row mt-3">
                  <div class="col-4 skeleton-input-label">
                    <label class="catg_name_label mt-1" for="category-name">{{__('translate.Category-Name')}} : </label>
                  </div>
                  <div class="col-8 skeleton-input">
                    <input class="form-control form-control-sm edit_category_name skeleton" type="text" name="category_name" id="category_name" placeholder="{{__('translate.Category Name')}}" autofocus>
                    <input type="hidden" id="category_id">
                  </div>
                </div>
                <!-- show-error -->
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-8" style="text-align:right;">
                    <span id="savForm_error"></span><span id="updateForm_errorList"></span>
                  </div>
                </div>
                <!-- button -->
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-5">
                    <div class="btn_box mt-2">
                      <button type="submit" class="btn btn-sm cgt_btn btn_focus button_width skeleton-button me-2" id="save">
                        <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:0.8em;height:0.8em;" role="status" hidden></span>
                        <span class="category-btn-text">ADD</span>
                      </button>
                      <button id="update_btn" class="btn btn-sm cgt_btn btn_focus button_width skeleton-button me-2" hidden>
                        <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:0.8em;height:0.8em;" role="status" hidden></span>
                        <span class="update-btn-text">Update</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mt-2">
                      <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus button_width skeleton-button">
                        <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:0.8em;height:0.8em;" role="status" hidden></span>
                        <span class="cancel-btn-text">Cancel</span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row table-footer">
      <div class="alert-info brand_message ">

      </div>
    </div>
    <div class="col-xl-12 action_message">
      <p class="ps-1"><span id="success_message"></span></p>
    </div>
  </div>
  
</div>

{{-- Start Delete Category Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletecategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Delete Category')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm head_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-1">
        <div class="row profile-heading pb-3">
          <div class="col-xl-122">
            <div class="form-group delete_content" id="load_id">
              <span><div id="active_loader" class="loader_chart mt-1"></div></span>
              <label class="label_user_edit" id="cate_delete" for="id">{{__('translate.Category-ID')}} : </label>
              <span id="cat_id"> <input type="text" class="mt-3 update_id id" id="delete_category_id" readonly><br></span>
              <span class="label_user_edit" id="cate_delete2">{{__('translate.Are you sure, Would you like to delete this category, permanently?')}}</span>
              <input type="hidden" id="delete_category_id" name="category_id">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer">
        <p id="btn_group2">
          <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button" id="yesButton">
            <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="btn-text">{{__('translate.Yes')}}</span>
          </a>
          <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal" id="noButton">No</a>
          </p>
        </p>
      </div>
    </div>
  </div>
</div>
@include('loader.action-loader')

{{-- End Delete Category Modal---}}

{{-- Start Confirm Delete Category Modal--}}
<!-- Modal -->
<div class="modal fade" id="deleteconfirmcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-header" id="logoutModal_header">
        <h6 class="modal-title admin_title scan confirm_title pt-1" id="staticBackdropLabel">
          Confirm Delete
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn2" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body" id="logoutModal_body">
          <p class="admin_paragraph" style="text-align:center;" id="text_message">
            <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
          </p>
        </div>
        <div class="modal-footer btn_box" id="logoutModal_footer">
          <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-sm modal_button delet_btn_user btn_focus" id="deleteLoader">
            <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="delete-btn-text">Delete</span>
          </button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- Start Confirm Delete Category Modal--}}

{{-- Start Update Category Modal--}}
<!-- Modal -->
<div class="modal fade" id="updateconfirmcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-header" id="logoutModal_header">
        <h6 class="modal-title admin_title scan update_title pt-1" id="staticBackdropLabel">
          Update Category
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn3" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body" id="logoutModal_body">
          <span id="categry_id"></span><br>
          <span id="categry_name"></span><br>
          <p class="admin_paragraph" style="text-align:center;" id="text_message">
            <label class="label_user_edit" id="cate_confirm_update" for="id">Are you would like to confirm update or cancel ? </label>
          </p>
        </div>
        <div class="modal-footer btn_box" id="logoutModal_footer">
          <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
          <button id="update_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus">
            <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-btn-text">Confirm</span>
          </button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- End Update Category Modal--}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
@include('super-admin.medicine-item.category.data-handel_ajax.ajax')
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
@endsection