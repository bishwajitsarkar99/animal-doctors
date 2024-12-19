@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <div class="row">
            <div class="col-xl-9">
              <p class="catg mb-1">
                <span class="skeleton-card-head-two">{{__('translate.Sub-Category')}}</span>
                <span class="tot_summ" id="num_plate">
                  <label class="tot-search skeleton-card-head-labl-two mt-3 pt-2" for="tot_cagt"> ➤ {{__('translate.Total Sub-Category')}} :</label>
                  <label class="badge rounded-pill bg-primary skeleton-card-head-capsule-two" for="total_medic_records" style="font-weight: 600;color:white;" id="iteam_label4"><span class="total_users" style="font-weight: 600;" id="total_subcategory_records"></span><span class="skeleton" id="iteam_label5" style="font-weight: 600;color:white;">.00 {{__('translate.items')}}</span></label>
                </span>
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden" style="margin-top:14px;"></i>
              </p>
            </div>
            <div class="col-xl-3 link">
              <button class="btn btn-sm cgt_btn btn_focus min-skeleton" href="#" type="button" id="showCategory">
                <span class="get-cat-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="get-cat-btn-text">{{__('translate.Category')}}</span>
              </button>
            </div>
          </div>
          
          <div class="row">
            <div class="col-3">
              <span class="form-check form-switch skeleton search_ me-2">
                <input class="form-check-input" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <label class="search ser_label ps-1 pt-1" for="search pe-2">{{__('translate.Search')}} :</label>
                <label class="form-check-label" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
              </span>
            </div>
            <div class="col-9">
              <span id="search_plate">
                <input id="search" type="search" name="search" id="exampleDataList" class="category-all-search searchform display_hidden ps-1" placeholder="{{__('translate.Search Sub-Category.........')}}">
              </span>
            </div>
          </div>
          <div class="table-responsive">
            <table class="ord_table center border-1 skeleton mt-2">
              <tr class="table-row order_body acc_setting_table">
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.ID')}}</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color tot_pending_ col skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Action')}}</th>
                <th id="th_sort" data-coloumn="category_id" data-order="desc" class="table_th_color txt skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Category')}}</th>
                <th id="th_sort" data-coloumn="sub_category_name" data-order="desc" class="table_th_color tot_pending_ col skeleton ps-1 pt-1" style="text-align: left;cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.sub-Category-Name')}}</th>
                <th id="th_sort" data-coloumn="status" data-order="desc" class="table_th_color tot_pending_ skeleton ps-2 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Status')}}</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color tot_pending_ col skeleton check_border pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Check')}}</th>
              </tr>
              <tbody class="bg-white" id="subcategory_data_table">

              </tbody>
            </table>
          </div>
          <div class="row table_last_row">
            <div class=" col-2">
              <label class="item_class skeleton">Peritem</label>
              <div class="custom-select skeleton">
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
              <div class="pagination pagination-skeleton mt-1" id="subcategory_data_table_paginate">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5">
        <div class="row">
          <div class="category-form">
            <div class="card form-control cat_form">
              <form autocomplete="off">
                @csrf
                <div class="row mt-3">
                  <div class="col-5 skeleton-input-label">
                    <label class="catg_name_label sub_catg mt-1" for="sub-category-name">{{__('translate.Sub-Category-Name')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="subcategory-icon fa fa-spinner fa-spin subcategory-hidden mt-2"></i>
                  </div>
                  <div class="col-6 skeleton-input">
                    <span class=""><input class="form-control form-control-sm edit_sub_category_name" type="text" name="sub_category_name" id="sub_category_name" placeholder="{{__('translate.Sub Category')}}" autofocus></span>
                    <input type="hidden" id="sub_category_id">
                  </div>
                  <span id="savForm_error"></span></span><span id="updateForm_errorList" style="text-align:right;"></span>
                </div>
                <div class="row mt-2">
                  <div class="col-5 skeleton-input-label">
                    <label class="catg_name_label sub_catg mt-1" for="category-name">{{__('translate.Category-ID')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="subcategoryid-icon fa fa-spinner fa-spin subcategoryid-hidden mt-2"></i>
                  </div>
                  <div class="col-6 role_nme cat_nme skeleton-input">
                    <span class="">
                      <input class="form-control form-control-sm categ_id edit_category_id" list="datalistOptions2" type="number" name="category_id" id="category_id" placeholder="{{__('translate.Category ID')}}" required>
                      <datalist id="datalistOptions2">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                      </datalist>
                    </span>
                  </div>
                </div>
                <p style="text-align: end;">
                  <button type="submit" class="btn btn-sm cgt_btn btn_focus skeleton mt-2" id="save">
                    <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                    <span class="category-btn-text">ADD</span>
                  </button>
                  <button id="update_btn" class="btn btn-sm cgt_btn btn_focus skeleton mt-2" hidden>
                    <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                    <span class="update-btn-text">Update</span>
                  </button>
                  <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus skeleton mt-2">
                    <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                    <span class="cancel-btn-text">Cancel</span>
                  </button>
                </p>
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
@include('loader.action-loader')
{{-- Start Category Modal--}}
<!-- Modal -->
<div class="modal fade" id="category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Category-List')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm head_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="card form-control form-control-sm" id="tb_subcatg">
          <div class="card-body" id="tb_subcatg2">
            <div class="row">
              <div class="col-12">
                <span class="form-check form-switch search_" id="src_box">
                  <input class="form-check-input mt-2 skeleton" type="checkbox" id="search_area_" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="search catg_ser_label ps-1 pt-1" for="search pe-2" id="tb_group2">{{__('translate.Search')}} :</label>
                  <label class="form-check-label skeleton" for="collapseExample">
                    <span class="search_on skeleton" id="search_off_" style="color: darkcyan;font-weight:600;font-size: 12px;">OFF</span>
                    <span class="search_on skeleton" id="search_on_" style="color: darkcyan;font-weight:600;font-size: 12px;" hidden>ON</span>
                  </label>
                  <i class="cat-search-icon fa fa-spinner fa-spin cat-search-hidden"></i>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <span id="search_plate">
                  <input id="cat_search" type="search" name="search" list="datalistOptions2" id="exampleDataList" class="category-all-search searchform2 catSearch ps-1" placeholder="{{__('translate.Category Search.........')}}" hidden>
                  <datalist id="datalistOptions2">
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}">
                    @endforeach
                  </datalist>
                </span>
              </div>
            </div>
            <div class="table-responsive">
              <table class="ord_table center border-1 mt-2" id="medic_nam">
                <thead id="group_nam2">
                  <tr id="group_nam3" style="color:black;">
                    <th id="group_nam4" class="tableHead back_color align">{{__('translate.ID')}}</th>
                    <th id="group_nam5" data-coloumn="id" data-order="desc" class="sortable-header tableHead back_color ps-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Cateogry Name')}}</th>
                  </tr>
                </thead>
                <tbody class="bg-white" id="cat_table" style="color:black;font-weight:500;cursor:alias;">
  
                </tbody>
                
              </table>
            </div>
            <div class="row table_last_row">
              <div class="item_box col-3">
                <label class="item_class" id="perPage">Peritem</label>
                <div class="custom-select" id="pagesBox">
                  <select class="ps-1" id="perItemControls">
                    <option selected>10</option>
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                  </select>
                </div>
              </div>
              <div class="col-9">
                <span class="tot_summ" style="float: right;">
                  <label class="tot-search tot_record mt-3" for="tot_cagt"> {{__('translate.Total Category')}} :</label>
                  <label class="badge rounded-pill bg-primary badge_label badg" for="total_medic_records" id="iteam_label4"><span class="total_result" id="total_cat_records" style="color:white;font-size:11px;"></span><span id="iteam_label6" style="font-weight: 600;color:white;">.00 {{__('translate.items')}}</span></label>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="pagination mt-" style="float: right;" id="cat_table_paginate">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Start Category Modal--}}

{{-- Start Delete SubCategory Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletesubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Delete Sub Category')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm cols_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-1">

        <div class="row profile-heading pb-3">
          <div class="col-xl-12">
            <div class="form-group delete_content" id="delt_content">
              <div id="active_loader" class="loader_chart mt-1"></div>
              <label class="label_user_edit" id="sub_id" for="id">{{__('translate.Sub Category-ID')}} : </label>
              <span id="sub_id2"><input type="text" class="mt-3 update_id id" id="delete_sub_category_id" readonly></span><br>
              <span class="label_user_edit" id="sub_id3">{{__('translate.Are you sure, Would you like to delete this sub category, permanently?')}}</span>
              <input type="hidden" id="delete_sub_category_id" name="sub_category_id">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer">
        <p id="btn_group2">
          <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button" id="yesButton">
            <span class="delete-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="delete-yes-btn-text">{{__('translate.Yes')}}</span>
          </a>
        </p>
        <p id="btn_group">
          <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal" id="noButton">No</a>
        </p>
      </div>
    </div>
  </div>
</div>
{{-- End Delete SubCategory Modal---}}

{{-- Start Confirm Delete Category Modal--}}
<!-- Modal -->
<div class="modal fade" id="deleteconfirmsubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-header" id="logoutModal_header">
        <h6 class="modal-title admin_title scan confirm_title pt-1" id="staticBackdropLabel">
          Confirm Delete
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn_confirm" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body" id="logoutModal_body">
          <p class="admin_paragraph" style="text-align:center;" id="text_message">
            <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
          </p>
        </div>
        <div class="modal-footer" id="logoutModal_footer">
          <button type="button" class="btn btn-sm modal_button delet_btn_user btn_focus delete_confirm" id="deleteLoader">
            <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="delete-btn-text">Delete</span>
          </button>
          <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="sub_id4" data-bs-dismiss="modal">Cancel</button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- End Confirm Delete Category Modal--}}

{{-- Start Update Category Modal--}}
<!-- Modal -->
<div class="modal fade" id="updateconfirmsubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-header" id="logoutModal_header">
        <h6 class="modal-title admin_title scan update_title pt-1" id="staticBackdropLabel">
          Update Sub-Category
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn3" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body" id="logoutModal_body">
          <p class="admin_paragraph" style="text-align:center;" id="text_message">
            <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
          </p>
        </div>
        <div class="modal-footer" id="logoutModal_footer">
          <button id="update_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus">
            <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-btn-text">Confirm</span>
          </button>
          <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- End Update Category Modal--}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/sub-category/sub-category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
@include('super-admin.medicine-item.sub-category.data-handel-ajax.data-handel-ajax')
@include('super-admin.medicine-item.sub-category.data-handel-ajax.get-category-ajax')
<script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }
  function focuCardHead() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head-two')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head-two')
    });
  }
  function focuCardHeadLabl() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head-labl-two')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head-labl-two')
    });
  }

  function focuCardHeadCapsule() {
    const allSkeleton = document.querySelectorAll('.skeleton-card-head-capsule-two')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-card-head-capsule-two')
    });
  }
  function categoryData() {
    const allSkeleton = document.querySelectorAll('.min-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('min-skeleton')
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
  function focuInput() {
    const allSkeleton = document.querySelectorAll('.skeleton-input')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-input')
    });
  }

  setTimeout(() => {
    fetchData();
    focuCardHead();
    focuCardHeadLabl();
    focuCardHeadCapsule();
    categoryData();
    focuCardTablePagination();
    focuInputLabel();
    focuInput();
  }, 1000);
</script>
@endsection