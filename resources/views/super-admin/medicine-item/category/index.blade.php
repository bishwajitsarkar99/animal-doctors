@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <p class="catg mb-1 skeleton">
            <span>{{__('translate.Category')}}</span>
            <span class="tot_summ skeleton" id="num_plate">
              <label class="tot-search mt-3 pt-2" for="tot_cagt"> ➤ {{__('translate.Total Category')}} :</label>
              <label for="total_medic_records skeleton" id="iteam_label4"><span class="total_users skeleton" style="font-weight: 600;" id="total_category_records"></span><span id="iteam_label5" style="font-weight: 600;color:darkcyan;font-size: 11px;">.00 {{__('translate.items')}}</span></label>
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
                <input id="search" type="search" name="search" list="datalistOptions" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="{{__('translate.Category Search.........')}}">
                <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden"></i>
                <datalist id="datalistOptions">
                  @foreach($categories as $category)
                  <option value="{{$category->category_name}}">
                  <option value="{{$category->id}}">
                    @endforeach
                </datalist>
              </span>
            </div>
          </div>
          <div>
            <table class="ord_table center border-1 skeleton mt-2" id="myTable">
              <tr class="table-row order_body acc_setting_table skeleton">
                <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="table_th_color skeleton txt col ps-1 pt-1" style="cursor: move;">{{__('translate.ID')}}</th>
                <th id="th_sort" draggable="true" class="table_th_color tot_pending_ skeleton col ps-1 pt-1" style="cursor: move;">{{__('translate.Action')}}</th>
                <th id="th_sort" draggable="true" class="table_th_color tot_pending_ skeleton col ps-1 pt-1" style="text-align: left;cursor: move;">{{__('translate.Category-Name')}}</th>
                <th id="th_sort" draggable="true" class="table_th_color tot_pending_ check_border skeleton col pt-1" style="cursor: move;">{{__('translate.Check')}}</th>
                <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1 pt-1">{{__('translate.Status')}}</th>
              </tr>
              <tbody class="bg-transparent" id="category_data_table">


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
              <div class="pagination skeleton mt-1" id="category_data_table_paginate">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5">
        <div class="row">
          <div class="category-form skeleton">
            <div class="card form-control cat_form">
              <form autocomplete="off">
                @csrf
                <div class="row mt-3">
                  <div class="col-5">
                    <label class="catg_name_label skeleton mt-1" for="category-name">{{__('translate.Category-Name')}} :</label>
                  </div>
                  <div class="col-1">
                    <i class="category-icon fa fa-spinner fa-spin category-hidden mt-2"></i>
                  </div>
                  <div class="col-6">
                    <input class="form-control form-control-sm edit_category_name skeleton" type="text" name="category_name" id="category_name" placeholder="{{__('translate.Category Name')}}" autofocus>
                    <input type="hidden" id="category_id">
                  </div>
                  <span id="savForm_error"></span><span id="updateForm_errorList"></span>
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

{{-- Start Delete User Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletecategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{__('translate.Delete Category')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-palacement="right" title="{{__('translate.Close')}}"></button>
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
        <button href="#" type="button" class="btn btn-sm modal_button delet_btn_user btn_focus" id="deleteLoader">
          <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
          <span class="btn-text">Delete</span>
        </button>
        <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
{{-- End EDelete User Modal---}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('super-admin.medicine-item.category.data-handel_ajax.ajax')
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