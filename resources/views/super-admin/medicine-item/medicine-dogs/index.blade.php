@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <p class="catg skeleton  mb-1">
            <span class="">{{__('translate.Medicine-Dosage')}}</span>
            <span class="tot_summ skeleton" id="num_plate">
              <label class="tot-search medic skeleton mt-3 pt-1" for="tot_cagt"> ➤ {{__('translate.Total')}} :</label>
              <label for="total_medicinedogs_records" id="iteam_label4">
                <span class="total_result" id="total_medicinedogs_records"></span>
                <span style="font-weight: 600;color:darkcyan;font-size: 11px;">.00 {{__('translate.dosage')}}</span>
              </label>
            </span>
          </p>
          <div class="row">
            <div class="col-5">
              <span class="form-check form-switch search_ skeleton  me-2">
                <input class="form-check-input " onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <label class="search ser_label  ps-1 pt-1" for="search pe-2">{{__('translate.Search Mode')}} :</label>
                <label class="form-check-label " for="collapseExample"><span class="search_on " id="search_off">OFF</span></label>
              </span>
            </div>
            <div class="col-5">
              <span id="search_plate">
                <input id="search" type="search" name="search" id="exampleDataList" class="category-all-search searchform search ps-1" placeholder="{{__('translate.Search.........')}}">
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden"></i>
              </span>
            </div>

            <div class="col-2 link">
              <button class="btn btn-sm cgt_btn btn_focus ms-1" href="#" type="button" id="showMedicine">{{__('translate.Medicine')}}</button>
            </div>
          </div>
          <div>
            <table class="ord_table center border-1 skeleton mt-2">
              <tr class="table-row order_body acc_setting_table skeleton">
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1 pt-1">{{__('translate.ID')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1 pt-1">{{__('translate.Action')}}</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1 pt-1">{{__('translate.Medicine')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1 pt-1" style="text-align: left;">{{__('translate.Medicine-Dosage')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton pt-1">{{__('translate.Check')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1 pt-1">{{__('translate.Status')}}</th>
              </tr>
              <tbody class="bg-transparent skeleton" id="medicine_dogs_data_table" style="color:black;font-weight:500;">

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
              <div class="pagination skeleton mt-1 pt-1" id="medicine_dogs_data_table_paginate">

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
                    <label class="catg_name_label dogs skeleton mt-1" for="sub-category-name">{{__('translate.Medicine-Dosage')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="medicinedogs-icon fa fa-spinner fa-spin medicinedogs-hidden mt-2"></i>
                  </div>
                  <div class="col-6">
                    <span class="skeleton"><input class="form-control form-control-sm edit_medicine_dogs" type="text" name="medicine_dogs" id="medicine_dogs" placeholder="{{__('translate.Medicine Dosage')}}" autofocus></span>
                    <input type="hidden" id="medicinedogs_id">
                  </div>
                  <span id="savForm_error"></span><span id="updateForm_errorList" style="text-align:right;"></span>
                </div>
                <div class="row mt-2">
                  <div class="col-5">
                    <label class="catg_name_label dogs skeleton mt-1" for="medicine-id">{{__('translate.Medicine-ID')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="medicineid-icon fa fa-spinner fa-spin medicineid-hidden mt-2"></i>
                  </div>
                  <div class="col-6">
                    <span class="skeleton"><input class="form-control form-control-sm edit_medicine_id skeleton" list="datalistOptions3" type="number" name="medicine_id" id="medicine_id" placeholder="{{__('translate.Medicine ID')}}" required></span>
                    <datalist id="datalistOptions3">
                      @foreach($medicines as $medicine)
                      <option value="{{$medicine->id}}">
                      <option value="{{$medicine->medicine_name}}">
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
{{-- Start Medicine Name Modal--}}
<!-- Modal -->
<div class="modal fade" id="MedicineName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Medicine-List')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="card form-control form-control-sm" id="tb_subcatg">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <span class="form-check form-switch search_ me-2" id="med">
                  <input class="form-check-input mt-2 skeleton" type="checkbox" id="search_area_" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="search catg_ser_label ps-1 pt-1" id="med_label" for="search pe-2">{{__('translate.Search Mode')}} :</label>
                  <label class="form-check-label skeleton" id="med_label2" for="collapseExample"><span class="search_on skeleton" id="search_off_">OFF</span><span class="search_on skeleton" id="search_on_">ON</span></label>
                </span>
              </div>
              <div class="col-6">
                <span id="search_plate">
                  <input id="name_search" type="search" name="search" list="datalistOptions2" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="{{__('translate.Search.........')}}">
                  <i class="prd-search-icon fa fa-spinner fa-spin prd-search-hidden"></i>
                  <datalist id="datalistOptions2">
                    @foreach($medicines as $medicine)
                      <option value="{{$medicine->medicine_name}}">
                    @endforeach
                  </datalist>
                </span>
              </div>
            </div>
            <table class="mt-1" id="medic_nam">
              <thead id="medic_nam2">
                <tr id="medic_nam3" style="color:darkcyan;">
                  <th id="medic_nam4" class="back_color align">{{__('translate.ID')}}</th>
                  <th id="medic_nam5" class="back_color ps-1">{{__('translate.Medicine Name')}}</th>
                </tr>
              </thead>
              <tbody class="bg-transparnet tbody" id="medic_nam6" style="color:black;font-weight:500;cursor:alias;">

              </tbody>
              <div class="row table_last_row">
                <div class="item_box col-2">
                  <label class="item_class">Peritem</label>
                  <div class="custom-select">
                    <select class="ps-1" id="perItemControl2">
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
                    <label class="tot-search mt-3" style="font-size: 11px;" for="tot_cagt" id="iteam_label3"> {{__('translate.Total Medicine Entry')}} :</label>
                    <label for="total_medic_records" id="iteam_label4"><span class="total_result" id="total_medic_records"></span>
                      <span id="iteam_label5" style="font-weight: 600;color:darkcyan;font-size:11px;">.00 {{__('translate.pics')}}</span>
                    </label>
                  </span>
                </div>
              </div>
            </table>
            <div class="row">
              <div class="col-12">
                <div class="pagination mt-" style="float: right;" id="medicine_table_paginate">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Start  Medicine Name Modal--}}

{{-- Start Delete  Medicine Dogs Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletemedicinedogs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Delete Medicine Dosage')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-1">
        <div class="row profile-heading pb-3">
          <div class="col-xl-12">
            <div class="form-group delete_content" id="dosage">
              <div id="active_loader" class="loader_chart mt-1"></div>
              <label class="label_user_edit" id="dosage2" for="id">{{__('translate.Medicine-Dosage-ID')}} : </label>
              <input type="text" class="mt-3 update_id id" id="delete_medicine_dogs_id" readonly><br>
              <span class="label_user_edit" id="dosage3">{{__('translate.Are you sure, Would you like to delete this medicine dosage, permanently?')}}</span>
              <input type="hidden" id="delete_medicine_dogs_id" name="medicinedogs_id">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer">
        <button href="#" type="button" class="btn btn-sm modal_button delet_btn_user btn_focus" id="deleteLoader">
          <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
          <span class="btn-text">Delete</span>
        </button>
        <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="dosage4" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
{{-- End Delete  Medicine Dogs Modal---}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/medicine-dogs/medicine-dogs.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('super-admin.medicine-item.medicine-dogs.data-handel-ajax.data-ajax')
@include('super-admin.medicine-item.medicine-dogs.data-handel-ajax.get-medicine-ajax')
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