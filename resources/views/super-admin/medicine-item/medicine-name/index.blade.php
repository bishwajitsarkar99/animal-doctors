@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <p class="catg skeleton mb-1">
            <span>{{__('translate.Medicine-Name')}}</span>
            <span class="tot_summ skeleton" id="num_plate">
              <label class="tot-search skeleton mt-3 pt-1" for="tot_cagt"> ➤ {{__('translate.Total Medicine')}} :</label>
              <label class="badge rounded-pill bg-primary tot-search"><span class="total_users skeleton" style="font-weight: 600;color:white;" id="total_medicine_records"></span><span style="font-weight: 600;font-size:11px;color:white;">.00 {{__('translate.pics')}}</span></label>
            </span>
          </p>
          <div class="row">
            <div class="col-5">
              <span class="form-check form-switch search_ skeleton me-2">
                <input class="form-check-input" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <label class="search ser_label ps-1 pt-1" for="search pe-2">{{__('translate.Search Mode')}} :</label>
                <label class="form-check-label" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
              </span>
            </div>
            <div class="col-5">
              <span id="search_plate">
                <input id="search" type="search" name="search" id="exampleDataList" class="category-all-search search searchform ps-1" placeholder="{{__('translate.Search.........')}}">
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden"></i>
              </span>
            </div>
            <div class="col-2 link">
              <button class="btn btn-sm cgt_btn btn_focus ms-3" href="#" type="button" id="showGroup">{{__('translate.Group')}}</button>
            </div>
          </div>
          <div>
            <table class="ord_table center border-1 skeleton mt-2">
              <tr class="table-row order_body acc_setting_table">
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1 pt-1">{{__('translate.ID')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1 pt-1">{{__('translate.Action')}}</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1 pt-1">{{__('translate.Group')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1 pt-1" style="text-align: left;">{{__('translate.Medicine-Name')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton pt-1">{{__('translate.Check')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton pt-1">{{__('translate.Status')}}</th>
              </tr>
              <tbody class="bg-transparent" id="medicine_data_table" style="color: black;font-weight:500;">

              </tbody>
            </table>
          </div>
          <div class="row table_last_row">
            <div class=" col-2">
              <label class="item_class ">Peritem</label>
              <div class="custom-select">
                <select class="ps-1" id="perItemControl">
                  <option class="" selected>10</option>
                  <option class="">20</option>
                  <option class="">50</option>
                  <option class="">100</option>
                  <option class="">200</option>
                </select>
                <span class="custom-list-item-arrow me-4"></span>
              </div>
            </div>
            <div class="col-10">
              <div class="pagination skeleton mt-1 pt-1" id="medicine_data_table_paginate">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5">
        <div class="row">
          <div class="category-form">
            <div class="card form-control cat_form skeleton">
              <form autocomplete="off">
                @csrf
                <div class="row mt-3">
                  <div class="col-5">
                    <label class="catg_name_label medicine_name skeleton mt-1" for="medicine-name">{{__('translate.Medicine-Name')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="medicine-icon fa fa-spinner fa-spin medicine-hidden mt-2"></i>
                  </div>
                  <div class="col-6">
                    <input class="form-control form-control-sm edit_medicine_name skeleton" type="text" name="medicine_name" id="medicine_name" placeholder="{{__('translate.Medicine Name')}}" autofocus>
                    <input type="hidden" id="medicine_id">
                  </div>
                  <span id="savForm_error"></span><span id="updateForm_errorList" style="text-align:right;"></span>
                </div>
                <div class="row mt-2">
                  <div class="col-5">
                    <label class="catg_name_label medicine_name skeleton mt-1" for="group-id">{{__('translate.Group-ID')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="medicineid-icon fa fa-spinner fa-spin medicineid-hidden mt-2"></i>
                  </div>
                  <div class="col-6">
                    <input class="form-control form-control-sm edit_group_id skeleton" list="datalistOptions3" type="number" name="group_id" id="group_id" placeholder="{{__('translate.Group ID')}}" required>
                    <datalist id="datalistOptions3">
                    @foreach($medicinegroups as $medicinegroup)
                      <option value="{{$medicinegroup->id}}">
                      <option value="{{$medicinegroup->group_name}}">
                    @endforeach
                  </datalist>
                  </div>
                  <span id="savForm_error"></span><span id="updateForm_errorList" style="text-align:right;"></span>
                </div>
                <p style="text-align: end;">
                  <button type="submit" class="btn btn-sm cgt_btn btn_focus skeleton mt-2" id="save">
                    <i class="add-icon fa fa-spinner fa-spin add-hidden"></i>
                    <span class="btn-text">ADD</span>
                  </button>
                  <button id="update_btn" class="btn btn-sm cgt_btn btn_focus skeleton mt-2">
                    <i class="update-icon fa fa-spinner fa-spin update-hidden"></i>
                    <span class="btn-text">Update</span>
                  </button>
                  <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus skeleton mt-2">Cancel</button>
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
{{-- Start Medicine Group Modal--}}
<!-- Modal -->
<div class="modal fade" id="group" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Group-List')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="card form-control form-control-sm" id="tb_subcatg">
          <div class="card-body" id="tb_subcatg2">
            <div class="row">
              <div class="col-6">
                <span class="form-check form-switch search_ me-2" id="tb_group">
                  <input class="form-check-input mt-2 skeleton" type="checkbox" id="search_area_" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="search catg_ser_label ps-1 pt-1" id="med_label" for="search pe-2" id="tb_group2">{{__('translate.Search Mode')}} :</label>
                  <label class="form-check-label skeleton" id="med_label2" for="collapseExample"><span class="search_on skeleton" id="search_off_" style="color: darkcyan;font-weight:500;font-size:11px">OFF</span><span class="search_on skeleton" id="search_on_" style="color: darkcyan;font-weight:600">ON</span></label>
                </span>
              </div>
              <div class="col-6">
                <span id="search_plate">
                  <input id="group_search" type="search" name="search" list="datalistOptions2" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="{{__('translate.Search.........')}}">
                  <i class="medic-search-icon fa fa-spinner fa-spin medic-search-hidden"></i>
                  <datalist id="datalistOptions2">
                    @foreach($medicinegroups as $medicinegroup)
                      <option value="{{$medicinegroup->group_name}}">
                    @endforeach
                  </datalist>
                </span>
              </div>
            </div>
            <table class="ord_table center border-1 mt-1" id="medic_nam">
              <thead id="group_nam2">
                <tr id="group_nam3" style="color:black;">
                  <th id="group_nam4" class="back_color align">{{__('translate.ID')}}</th>
                  <th id="group_nam5" class="back_color ps-2">{{__('translate.Group Name')}}</th>
                </tr>
              </thead>
              <tbody class="bg-trnasparent" id="group_table" style="color:black;font-weight:500;cursor:alias;">

              </tbody>
              <div class="row table_last_row">
                <div class="item_box col-2">
                  <label class="item_class">Peritem</label>
                  <div class="custom-select">
                    <select class="ps-1" id="perItemControl3">
                      <option selected>10</option>
                      <option>20</option>
                      <option>50</option>
                      <option>100</option>
                      <option>200</option>
                    </select>
                    <span class="custom-list-item-arrow"></span>
                  </div>
                </div>
                <div class="col-10">
                  <span class="tot_summ" style="float: right;" id="num_plate">
                    <label class="tot-search mt-3" style="font-size: 12px;" for="tot_cagt" id="iteam_label3"> {{__('translate.Total Group Entry')}} :</label>
                    <label class="badge rounded-pill bg-primary" for="total_medic_records" id="iteam_label4"><span class="total_result" id="total_groups_records"></span><span id="iteam_label5" style="font-weight: 600;color:white;">.00 {{__('translate.items')}}</span></label>
                  </span>
                </div>
              </div>
            </table>
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
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Delete Medicine Name')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
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
        <button href="#" type="button" class="btn btn-sm modal_button delet_btn_user btn_focus" id="deleteLoader">
          <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
          <span class="btn-text">Delete</span>
        </button>
        <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="medi_delt4" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
{{-- End Delete  Medicine Modal---}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/medicine-name/medicine_name.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
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

  setTimeout(() => {
    fetchData();
  }, 1000);
</script>
@endsection