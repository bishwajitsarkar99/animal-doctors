@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <div class="row">
            <div class="col-xl-12">
              <p class="catg mb-1">
                <span class="">{{__('translate.Sub-Category')}}</span>
                <span class="tot_summ" id="num_plate">
                  <label class="tot-search mt-3 pt-2" for="tot_cagt"> ➤ {{__('translate.Total Sub-Category')}} :</label>
                  <label class="badge pill-rounded skeleton-table-head-capsule" for="total_medic_records" style="font-weight: 700;color:black;" id="iteam_label4"><span class="total_users" style="font-weight: 700;color:black;" id="total_subcategory_records"></span><span class="skeleton" id="iteam_label5" style="font-weight: 700;color:black;">.00 {{__('translate.items')}}</span></label>
                </span>
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden" style="margin-top:14px;"></i>
              </p>
            </div>
          </div>
          
          <div class="row">
            <div class="col-3">
              <span class="form-check form-switch search_ me-2">
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
            <table class="table-light center border-1">
              <thead class="table-fixed table-light">
                <tr class="table-row order_body acc_setting_table">
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col" style="cursor: pointer;"> 
                    {{__('translate.ID')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color tot_pending_ col" style="cursor: pointer;">
                    {{__('translate.Action')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="category_id" data-order="desc" class="table_th_color txt" style="cursor: pointer;">
                    {{__('translate.Category')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="sub_category_name" data-order="desc" class="table_th_color tot_pending_ col" style="text-align: left;cursor: pointer;">
                    {{__('translate.sub-Category-Name')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="status" data-order="desc" class="table_th_color tot_pending_" style="cursor: pointer;">
                    {{__('translate.Status')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color tot_pending_ col check_border" style="cursor: pointer;"> 
                    {{__('translate.Check')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                </tr>
              </thead>
              <tbody class="table-light bg-white skeleton" id="subcategory_data_table">

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
              <form class="mini-form" autocomplete="off">
                @csrf
                <div class="row mt-3">
                  <div class="col-12">
                    <span class=""><input class="form-control form-control-sm edit_sub_category_name" type="text" name="sub_category_name" id="sub_category_name" placeholder="{{__('translate.Sub Category')}}" autofocus></span>
                    <input type="hidden" id="sub_category_id">
                  </div>
                </div>
                <!-- show-error -->
                <div class="row">
                  <div class="col-12" style="text-align:left;">
                    <span id="savForm_error"></span><span id="updateForm_errorList"></span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12 role_nme cat_nme">
                    <select type="number" class="form-control form-control-sm select2 edit_category_id" name="category_id" id="category_id">
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-5">
                    <div class="btn_box mt-2">
                      <button type="submit" class="btn btn-sm cgt_btn btn_focus button_width me-2" id="save">
                        <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="category-btn-text">ADD</span>
                      </button>
                      <button id="update_btn" class="btn btn-sm cgt_btn btn_focus button_width me-2" hidden>
                        <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="update-btn-text">Update</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-4"></div>
                  <div class="col-3">
                    <div class="">
                      <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus button_width mt-2">
                        <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
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
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/sub-category/sub-category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
@include('super-admin.medicine-item.sub-category.data-handel-ajax.data-handel-ajax')
@include('super-admin.medicine-item.sub-category.data-handel-ajax.get-category-ajax')
<script>
  $(document).ready(function(){
    //$('.select2').select2();
    $('.select2').select2({
      placeholder: 'Select Category',
      allowClear: true
    });
    // Set custom placeholder for the search input inside Select2 dropdowns
    $('#category_id').on('select2:open', function() {
      $('.select2-search__field').attr('placeholder', 'Search category...');
    });
  });
</script>
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
    const allSkeleton = document.querySelectorAll('.skeleton-table-head-capsule')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-table-head-capsule')
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