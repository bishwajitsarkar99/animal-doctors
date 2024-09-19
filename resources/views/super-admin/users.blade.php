@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body skeleton" id="table_card_body">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-12 ps-2">
          <div class="card-body focus-color user_details cd pb-3">
            <p class="users_heading skeleton mb-1">Users <span class="ms-1 skeleton">Update and Permission</span></p>
            <div class="row">
              <div class="col-5">
                <span class="form-check form-switch search_ me-2 skeleton">
                  <input class="form-check-input skeleton" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="search ser_label skeleton ps-1 pt-1" for="search pe-2">Search Mode :</label>
                  <label class="form-check-label skeleton" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
                </span>
              </div>
              <div class="col-6">
                <span id="search_plate">
                  <input id="search" type="search" name="search" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="All Search Heare.........">
                </span>
              </div>
              <div class="col-1">
                <div class="search-icon spinner-border spinner-border-sm text-primary search-hidden" role="status">
                  <span class="visually-hidden">Searching...</span>
                </div>
              </div>
              <!-- <img id="locker" class="checking_lock skeleton pt-1" src="{{ asset('image/lock/lock.png')}}" alt="lock"> -->
            </div>
            <div class="table-responsive">
              <table class="ord_table center border-1 mt-1 skeleton">
                <tr class="table-row order_body acc_setting_table skeleton">
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="id" data-order="desc" class="table_th_color txt col font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> ID</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="image" data-order="desc" class="table_th_color txt col font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Image</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="id" data-order="desc" class="table_th_color tot_pending_ col font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Action</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="name" data-order="desc" class="table_th_color tot_order_ font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Name</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="email" data-order="desc" class="table_th_color tot_order_ font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Email</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="contract_number" data-order="desc" class="table_th_color font_sid skeleton tot_order_ ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Contract</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="role" data-order="desc" class="table_th_color tot_order_ font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Role</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="email_verified_at" data-order="desc" class="table_th_color tot_order_ font_sid skeleton ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Verification</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="id" data-order="desc" class="table_th_color tot_pending_ col font_sid skeleton"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Check</th>
                  <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="status" data-order="desc" class="table_th_color tot_pending_ font_sid ps-2  skeleton"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Status</th>
                </tr>
                <tbody class="bg-transparent skeleton tab" id="user_data_table">

                </tbody>
              </table>
            </div>
            <div class="row table_last_row">
              <div class="col-2">
                <label class="item_class skeleton">Peritem</label>
                <select class="ps-1 mt-3" id="perItemControl">
                  <option selected>10</option>
                  <option>20</option>
                  <option>50</option>
                  <option>100</option>
                  <option>200</option>
                </select>
                <!-- <span class="custom-list-item-arrow me-4"></span> -->
              </div>
              <div class="skeleton col-3">
                <span class="tot_summ skeleton" id="num_plate">
                  <label class="tot-search mt-3 skeleton" for="tot_cagt"> Total Users :</label>
                  <label class="badge rounded-pill bg-primary" for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_user_records"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
                </span>
              </div>
              <div class="col-7">
                <div class="pagination skeleton mt-1" id="user_data_table_paginate">

                </div>
              </div>
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
<!-- User Delete Modal -->
<div class="modal fade" id="deletecategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          Delete User
        </h5>
        <button type="button" class="btn-close btn-btn-sm clos_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body profile-body pb-1" style="background:aliceblue;">

        <div class="row profile-heading pb-3">
          <div class="col-xl-12" id="usrdelt5">
            <div id="loader_userdelete" class="mt-1"></div>
            <div class="form-group delete_content" id="usrdelt">
              <label class="label_user_edit" for="id" id="usrdelt2">User-ID : </label>
              <input type="text" class="mt-3 update_id id" id="user_id" style="background:aliceblue;" readonly><br>
              <span class="label_user_edit" id="usrdelt3">Are you sure? Would you like to delete this user account, permanently?</span>
              <input type="hidden" id="user_id" name="user_id">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer">
        <p id="btn_group2">
          <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button" id="yesButton">
            <i class="loading-icon fa fa-spinner fa-spin hidden"></i>
            <span class="btn-text">{{__('translate.Yes')}}</span>
          </a>
        </p>
        <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal" id="noButton">No</a>
        </p>
      </div>
    </div>
  </div>
</div>
{{-- End Delete User Modal---}}

{{-- Start Delete  User Modal--}}
<!-- Confirm Delete Modal -->
<div class="modal fade" id="deleteuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content" id="admin_modal_box">
          <div class="modal-header profile_modal_header profilesetting_modal_header">
              <h5 class="modal-title head_btn2 ps-1 pe-1" id="staticBackdropLabels">
                Confirm Delete
              </h5>
              <button type="button" class="btn-close btn-btn-sm clos_btn2" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
          </div>

          <div class="modal-body profile-body pb-1" style="background:aliceblue;">
            <div class="row profile-heading pb-3">
              <div class="col-xl-12">
                <div class="form-group delete_content" id="supp_delt">
                  <div id="active_loader"></div>
                  <span class="label_user_edit" id="supp_delt3">Delete or Cancel ?</span>
                  <input type="hidden" id="user_id" name="user_id">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer profile_modal_footer">
            <button href="#" type="button" class="btn btn-sm modal_button delet_btn_user" id="deleteLoader">
              <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
              <span class="btn-text">Delete</span>
            </button>
            <button type="button" class="btn btn-sm text-warning modal_button delete_cancel" id="usrdelt4" data-bs-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
</div>
{{-- End Delete  User Modal--}}

@include('super-admin._user-view')
@include('super-admin._edit-user')
@include('super-admin._confirm-update-user')
@endsection

@push('scripts')
@include('super-admin._users-fetch')
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-image-upload-function-min.js')}}"></script>
<script type="module">
  import { imageUpload } from "/module/module-min-js/helper-image-upload-function-min.js";
</script>
<script>
  // Update Button Loader
  $(document).ready(() => {
    $("#userUpdate").on('click', () => {
      $('.updated-icon').removeClass('updated-hidden');
      $(this).attr('disabled', true);
      $('btn-text').text('Update...');

      setTimeout(() => {
        $('.updated-icon').addClass('updated-hidden');
        $(this).attr('disabled', false);
        $('btn-text').text('Update');
      }, 3000);
    })
  });

  // Image Upload Button Loader
  $(document).ready(() => {
    $("#uploadButton").on('click', () => {
      $('.image-icon').removeClass('image-hidden');
      $(this).attr('disabled', true);
      $('btn-text').text('Upload...');

      setTimeout(() => {
        $('.image-icon').addClass('image-hidden');
        $(this).attr('disabled', false);
        $('btn-text').text('Upload');
      }, 3000);
    })
  });

  // Search Button Loader
  $(document).ready(() => {
    $(".searchform").on('keyup', () => {
      $('.search-icon').removeClass('search-hidden');
      $(this).attr('disabled', true);

      setTimeout(() => {
        $('.search-icon').addClass('search-hidden');
        $(this).attr('disabled', false);
      }, 3000);
    })
  });

  // Delete Button Loader
  $(document).ready(() => {
    $("#deleteLoader").on('click', () => {
      $('.delete-icon').removeClass('delete-hidden');
      $(this).attr('disabled', true);
      $('btn-text').text('Delete...');

      setTimeout(() => {
        $('.delete-icon').addClass('delete-hidden');
        $(this).attr('disabled', false);
        $('btn-text').text('Delete');
      }, 3000);
    })
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

  setTimeout(() => {
    fetchData();
  }, 1000);
</script>
@endpush