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
                <span class="skeleton-card-head-two">{{__('translate.Medicine-Name')}}</span>
                <span class="tot_summ" id="num_plate">
                  <label class="tot-search skeleton-card-head-labl-two mt-3 pt-1" for="tot_cagt"> ➤ {{__('translate.Total Medicine')}} :</label>
                  <label class="badge rounded-pill bg-primary tot-search skeleton-card-head-capsule-two"><span class="total_users" style="font-weight: 600;color:white;" id="total_medicine_records"></span><span style="font-weight: 600;font-size:11px;color:white;">.00 {{__('translate.pics')}}</span></label>
                </span>
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden" style="margin-top:11px;"></i>
              </p>
            </div>
            <div class="col-xl-3 link">
              <button class="btn btn-sm cgt_btn btn_focus min-skeleton ms-3 mt-1" href="#" type="button" id="showGroup">
                <span class="get-group-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="get-group-btn-text">{{__('translate.Group')}}</span>
              </button>
            </div>
          </div>
          
          <div class="row">
            <div class="col-3">
              <span class="form-check form-switch search_ skeleton me-2">
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
            <table class="ord_table center border-1 skeleton">
              <thead>
                <tr class="table-row order_body acc_setting_table">
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="tableHead table_th_color txt col skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.ID')}}</th>
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ col skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Action')}}</th>
                  <th id="th_sort" data-coloumn="group_id data-order="desc" class="tableHead table_th_color txt skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Group')}}</th>
                  <th id="th_sort" data-coloumn="medicine_name" data-order="desc" class="tableHead table_th_color tot_pending_ col skeleton ps-1 pt-1" style="text-align: left;cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Medicine-Name')}}</th>
                  <th id="th_sort" data-coloumn="statis" data-order="desc" class="tableHead table_th_color tot_pending_ skeleton ps-1 pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Status')}}</th>
                  <th id="th_sort" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ col skeleton pt-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Check')}}</th>
                </tr>
              </thead>
              <tbody class="bg-transparent" id="medicine_data_table" style="color: black;font-weight:500;">

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
              <div class="pagination pagination-skeleton mt-1 pt-1" id="medicine_data_table_paginate">

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
                    <label class="catg_name_label medicine_name mt-1" for="medicine-name">{{__('translate.Medicine-Name')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="medicine-icon fa fa-spinner fa-spin medicine-hidden mt-2"></i>
                  </div>
                  <div class="col-6 skeleton-input">
                    <input class="form-control form-control-sm edit_medicine_name" type="text" name="medicine_name" id="medicine_name" placeholder="{{__('translate.Medicine Name')}}" autofocus>
                    <input type="hidden" id="medicine_id">
                  </div>
                  <span id="savForm_error"></span><span id="updateForm_errorList" style="text-align:right;"></span>
                </div>
                <div class="row mt-2">
                  <div class="col-5 skeleton-input-label">
                    <label class="catg_name_label medicine_name mt-1" for="group-id">{{__('translate.Group-ID')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="medicineid-icon fa fa-spinner fa-spin medicineid-hidden mt-2"></i>
                  </div>
                  <div class="col-6 skeleton-input group_nme">
                    <input class="form-control form-control-sm group_id edit_group_id" list="datalistOptions2" type="number" name="group_id" id="group_id" placeholder="{{__('translate.Group ID')}}" required>
                    <datalist id="datalistOptions2">
                      @foreach($medicinegroups as $medicinegroup)
                        <option value="{{$medicinegroup->id}}">{{$medicinegroup->group_name}}</option>
                      @endforeach
                    </datalist>
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
{{-- Start Medicine Group Modal--}}
<!-- Modal -->
<div class="modal fade" id="group" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Group-List')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm clos_title" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="card form-control form-control-sm" id="tb_subcatg">
          <div class="card-body" id="tb_subcatg2">
            <div class="row">
              <div class="col-12">
                <span class="form-check form-switch search_" id="tb_group">
                  <input class="form-check-input mt-2 skeleton" type="checkbox" id="search_area_" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="search catg_ser_label ps-1 pt-1" id="med_label" for="search pe-2" id="tb_group2">{{__('translate.Search')}} :</label>
                  <label class="form-check-label skeleton" id="med_label2" for="collapseExample">
                    <span class="search_on skeleton" id="search_off_" style="color: darkcyan;font-weight:500;font-size:11px;">OFF</span>
                    <span class="search_on skeleton" id="search_on_" style="color: darkcyan;font-weight:600;" hidden>ON</span>
                  </label>
                  <i class="medic-search-icon fa fa-spinner fa-spin medic-search-hidden"></i>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <span id="search_plate">
                  <input id="group_search" type="search" name="search" list="datalistOptions3" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="{{__('translate.Search.........')}}" hidden>
                  <datalist id="datalistOptions3">
                    @foreach($medicinegroups as $medicinegroup)
                      <option value="{{$medicinegroup->group_name}}">
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
                    <th id="group_nam5" data-coloumn="id" data-order="desc" class="tableHead sortable-header back_color ps-1" style="cursor: pointer;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> {{__('translate.Group Name')}}</th>
                  </tr>
                </thead>
                <tbody class="bg-trnasparent" id="group_table" style="color:black;font-weight:500;cursor:alias;">
  
                </tbody>
              </table>
            </div>
            <div class="row table_last_row">
              <div class="item_box col-2">
                <label class="item_class per_page">Peritem</label>
                <div class="custom-select item_select">
                  <select class="ps-1" id="perItemControl3">
                    <option selected>10</option>
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                  </select>
                </div>
              </div>
              <div class="col-10">
                <span class="tot_summ" style="float: right;" id="num_plate">
                  <label class="group-search mt-3" for="tot_cagt" id="iteam_label3"> {{__('translate.Total Group Entry')}} :</label>
                  <label class="badge rounded-pill bg-primary" for="total_medic_records" id="iteam_label4"><span class="total_result" id="total_groups_records"></span><span id="iteam_label5">.00 {{__('translate.items')}}</span></label>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="pagination mt-" style="float: right;" id="groups_table_paginate">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Start  Medicine Group Modal--}}

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
              <div id="active_loader" class="loader_chart mt-1"></div>
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
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/medicine-name/medicine_name.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
@include('super-admin.medicine-item.medicine-name.data-handel-ajax.data-ajax')
@include('super-admin.medicine-item.medicine-name.data-handel-ajax.get-group-ajax')
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
  function medicineData() {
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
    medicineData();
    focuCardHead();
    focuCardHeadLabl();
    focuCardHeadCapsule();
    focuCardTablePagination();
    focuInputLabel();
    focuInput();
  }, 1000);
</script>
@endsection