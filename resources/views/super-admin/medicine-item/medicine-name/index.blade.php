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
                <span class="">{{__('translate.Medicine-Name')}}</span>
                <span class="tot_summ" id="num_plate">
                  <label class="tot-search mt-3 pt-1" for="tot_cagt"> ➤ {{__('translate.Total Medicine')}} :</label>
                  <label class="badge pill-rounded skeleton-table-head-capsule tot-search"><span class="total_users" style="font-weight: 600;color:black;" id="total_medicine_records"></span><span style="font-weight: 600;font-size:11px;color:black;">.00 {{__('translate.pics')}}</span></label>
                </span>
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden" style="margin-top:11px;"></i>
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
                <input id="search" type="search" name="search" id="exampleDataList" class="category-all-search search searchform display_hidden ps-1" placeholder="{{__('translate.Search.........')}}">
              </span>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table-light center border-1 skeleton">
              <thead class="table-fixed table-light">
                <tr class="table-row order_body acc_setting_table">
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="tableHead table_th_color txt col" style="cursor: pointer;">
                    {{__('translate.ID')}}
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ col" style="cursor: pointer;">
                    {{__('translate.Action')}}
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="group_id data-order="desc" class="tableHead table_th_color txt" style="cursor: pointer;">
                    {{__('translate.Group')}}
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>                   
                  </th>
                  <th id="th_sort" data-coloumn="medicine_name" data-order="desc" class="tableHead table_th_color tot_pending_ col" style="cursor: pointer;">
                    {{__('translate.Medicine-Name')}}
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="statis" data-order="desc" class="tableHead table_th_color tot_pending_" style="cursor: pointer;">
                    {{__('translate.Status')}}
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ col" style="cursor: pointer;">
                    {{__('translate.Check')}}
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                </tr>
              </thead>
              <tbody class="table-light bg-white skeleton" id="medicine_data_table"></tbody>
            </table>
          </div>
          <div class="row table-light">
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
              <div class="pagination pagination-skeleton mt-1 pt-1" id="medicine_data_table_paginate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <label class="item_class skeleton">
                Entries <span id="total_per_items"></span>
                show <span id="per_items_num"></span>
                out of
                <span id="total_items"></span>
              </label>
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
                    <input class="form-control form-control-sm edit_medicine_name" type="text" name="medicine_name" id="medicine_name" placeholder="{{__('translate.Medicine Name')}}" autofocus>
                    <input type="hidden" id="medicine_id">
                  </div>
                </div>
                <!-- show-error -->
                <div class="row">
                  <div class="col-12" style="text-align:left;">
                    <span id="savForm_error"></span><span id="updateForm_errorList"></span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12 group_nme">
                    <select type="number" class="form-control form-control-sm select2 edit_group_id" name="group_id" id="group_id">
                      <option value="">Select Group</option>
                      @foreach($medicinegroups as $medicinegroup)
                        <option value="{{$medicinegroup->id}}">{{$medicinegroup->group_name}}</option>
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
                  <div class="col-3"></div>
                  <div class="col-4">
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

{{-- Start Delete  Medicine Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletemedicine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Delete Medicine Name')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm cols_title" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-1">

        <div class="row profile-heading pb-3">
          <div class="col-xl-12">
            <div class="form-group delete_content" id="medi_delt">
              <label class="label_user_edit" id="medi_delt2" for="id">{{__('translate.Medicine-ID')}} : </label>
              <input type="text" class="mt-3 update_id id" id="delete_medicine_id" readonly><br>
              <span class="label_user_edit" id="medi_delt3">{{__('translate.Are you sure, Would you like to delete this medicine, permanently?')}}</span>
              <input type="hidden" id="delete_medicine_id" name="medicine_id">
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
{{-- End Delete  Medicine Modal---}}

{{-- Start Confirm Delete Medicine Modal--}}
<!-- Modal -->
<div class="modal fade" id="deleteconfirmmedicine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
          <button href="#" type="button" class="btn btn-sm modal_button delet_btn_user btn_focus" id="deleteLoader">
            <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="delete-btn-text">Delete</span>
          </button>
          <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="medi_delt4" data-bs-dismiss="modal">Cancel</button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- End Confirm Delete Medicine Modal--}}

{{-- Start Confirm Update Medicine Modal--}}
<!-- Modal -->
<div class="modal fade" id="updateconfirmmedicine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-header" id="logoutModal_header">
        <h6 class="modal-title admin_title scan update_title pt-1" id="staticBackdropLabel">
          Update Medicine Name
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
{{-- End Confirm Update Medicine Modal--}}

@endsection
@section('css')
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/medicine-name/medicine_name.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
@include('super-admin.medicine-item.medicine-name.data-handel-ajax.data-ajax')
@include('super-admin.medicine-item.medicine-name.data-handel-ajax.get-group-ajax')
<script>
  $(document).ready(function () {
    // Initialize Select2
    $('.select2').select2({
      placeholder: 'Select Group',
      allowClear: true,
      width: '100%' // Ensures full width from the start
    });

    // Set custom placeholder for the search input inside Select2 dropdowns
    $(document).on('select2:open', '#group_id', function () {
      setTimeout(() => {
        $('.select2-search__field').attr('placeholder', 'Search group...');
      }, 50); // Small delay ensures the field is available
    });

    // Adjust Select2 width dynamically on sidebar toggle
    function adjustSelect2Width() {
      $('.select2').each(function () {
        $(this).select2('destroy').select2({
          placeholder: 'Select Group',
          allowClear: true,
          width: '100%'
        });
      });
    }

    // Detect sidebar toggle event
    $('.sidebar-toggle-button').on('click', function () {
      setTimeout(adjustSelect2Width, 300); // Delay ensures layout changes are applied
    });

    // Recalculate Select2 width on window resize
    $(window).on('resize', function () {
      adjustSelect2Width();
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

  function focuCardHeadCapsule() {
    const allSkeleton = document.querySelectorAll('.skeleton-table-head-capsule')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-table-head-capsule')
    });
  }
  function focuCardTablePagination() {
    const allSkeleton = document.querySelectorAll('.pagination-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('pagination-skeleton')
    });
  }

  setTimeout(() => {
    fetchData();
    focuCardHeadCapsule();
    focuCardTablePagination();
  }, 1000);
</script>
@endsection