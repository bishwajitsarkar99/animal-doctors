@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
  <div class="card-body page-card-body" id="table_card_body">
    <div class="row">
      <div class="col-xl-7">
        <div class="card-body focus-color cd cat_form">
          <p class="catg mb-1">
            <span class="skeleton-card-head" style="color:black;">{{__('translate.Category')}}</span>
            <span class="tot_summ" id="num_plate">
              <label class="tot-search skeleton-card-head-labl mt-3 pt-2" style="color:black;" for="tot_cagt"> ➤ {{__('translate.Total Category')}} :</label>
              <label class="badge pill-rounded skeleton-card-head-capsule" for="total_medic_records" id="iteam_label4"><span class="total_users" style="font-weight:700;color:black;" id="total_category_records"></span><span id="iteam_label5" style="font-weight: 700;color:black;font-size: 11px;">.00 {{__('translate.items')}}</span></label>
            </span>
            <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden" style="color:#333333ab;opacity:1;"></i>
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
                  <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="tableHead table_th_color txt col th_sort ps-1 pt-1" style="cursor: pointer;">
                    <!-- Up arrow  -->
                    {{__('translate.ID')}}
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ col th_sort ps-1 pt-1" style="cursor: pointer;">
                    {{__('translate.Action')}}
                    <!-- Up arrow  -->
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" draggable="true" data-coloumn="category_name" data-order="desc" class="tableHead table_th_color tot_pending_ col th_sort ps-1 pt-1" style="text-align: left;cursor: pointer;">
                    {{__('translate.Category-Name')}}
                    <!-- Up arrow  -->
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" draggable="true" data-coloumn="status" data-order="desc" class="tableHead table_th_color tot_pending_ th_sort ps-1 pt-1" style="text-align: left;cursor: pointer;">
                    {{__('translate.Status')}}
                    <!-- Up arrow  -->
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                  <th id="th_sort" draggable="true" data-coloumn="id" data-order="desc" class="tableHead table_th_color tot_pending_ check_border col th_sort pt-1" style="cursor: pointer;">
                    {{__('translate.Check')}}
                    <!-- Up arrow  -->
                    <svg width="12px" height="12px" fill="#333" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                  </th>
                </tr>
              </thead>
              <tbody class="table-light bg-white" id="category_data_table">


              </tbody>
            </table>
          </div>
          <div class="row">
            <div class=" col-xl-2">
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
            <div class="col-xl-10">
              <div class="pagination pagination-skeleton" id="category_data_table_paginate">

              </div>
            </div>
          </div>
          <!-- <span class="page-limit"></span> -->
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
      <div class="modal-header modal-header-bg profile_modal_header profilesetting_modal_header">
        <h5 class="modal-title admin_title head_title" id="staticBackdropLabel">
          {{__('translate.Delete Category')}}
        </h5>
        <button type="button" class="btn-close btn-btn-sm head_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
      </div>

      <div class="modal-body modal-bg profile-body pb-1" style="background-image:none;background-color:white;">
        <div class="row profile-heading pb-3">
          <div class="col-xl-12">
            <div class="form-group delete_content" id="load_id">
              <label class="label_user_edit label_font" id="cate_delete" for="id">{{__('translate.Category-ID')}} : </label>
              <span id="cat_id"> <input type="text" class="mt-3 update_id id" id="delete_category_id" readonly><br></span>
              <span class="label_user_edit" id="cate_delete2">{{__('translate.Are you sure, would you like to delete this category, permanently?')}}</span>
              <input type="hidden" id="delete_category_id" name="category_id">
              <span class="modal_icon_position mt-3" id="center_box">
                <span>
                  <svg width="40px" height="40px" fill="#198754" id="Layer_1" data-name="Layer 1" viewBox="0 0 76.2 122.88"><defs><style>.cls-1{fill:#00a912;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:#fff;}</style></defs><title>yes-checkmark</title><path class="" d="M38.1,0A38.1,38.1,0,1,1,0,38.1,38.1,38.1,0,0,1,38.1,0Z"/><path class="cls-2" d="M26.28,32.05,33,38.42,49,22.25c1.32-1.35,2.15-2.42,3.78-.74l5.29,5.42c1.74,1.72,1.65,2.72,0,4.32l-22,21.67c-3.45,3.39-2.85,3.59-6.36.12L17.37,40.78a1.52,1.52,0,0,1,.15-2.37L23.66,32c.93-1,1.67-.9,2.62,0Z"/><path d="M9.59,122.63v-8.86l-9-22.32H9l4.83,14,4.82-14h8.1l-9,22.32v8.86Zm27.17.25a16.59,16.59,0,0,1-2.41-.21,8.4,8.4,0,0,1-2.73-.92,5.69,5.69,0,0,1-2.2-2.21,8,8,0,0,1-.89-4.09V99.17a8.71,8.71,0,0,1,.72-3.77A6.31,6.31,0,0,1,31.09,93a7.17,7.17,0,0,1,2.52-1.21,10.66,10.66,0,0,1,2.69-.36q3.53,0,6.06.11c1.69.07,3.16.14,4.41.23s2.34.18,3.29.29V99H38.81a2.45,2.45,0,0,0-1.59.46,1.73,1.73,0,0,0-.55,1.39v2.6l11.29.42v6.46l-11.29.42v2.35a2.8,2.8,0,0,0,.24,1.24,1.5,1.5,0,0,0,.65.71,1.8,1.8,0,0,0,.92.23H50.06v6.88q-1.8.25-4.11.42c-1.54.12-3.11.2-4.7.26s-3.09.08-4.49.08Zm27.42,0c-.92,0-1.83,0-2.71-.08s-1.75-.14-2.6-.26-1.67-.23-2.45-.37-1.54-.31-2.27-.51V115.2c1,.08,2,.15,3.08.21s2.23.1,3.36.13,2.19,0,3.17,0a10.71,10.71,0,0,0,2.31-.21,2.79,2.79,0,0,0,1.38-.67,1.7,1.7,0,0,0,.46-1.26v-.5a1.58,1.58,0,0,0-.65-1.39,2.54,2.54,0,0,0-1.53-.46H63.51c-3.25,0-5.71-.72-7.39-2.14s-2.51-3.82-2.51-7.18v-1.38q0-4.62,2.76-6.9t8-2.29a33.45,33.45,0,0,1,3.71.19c1.16.12,2.25.28,3.27.46s1.94.37,2.75.57v6.46c-1.29-.11-2.73-.2-4.34-.27s-3.07-.11-4.39-.11a11.86,11.86,0,0,0-2.09.17,2.56,2.56,0,0,0-1.43.67,2,2,0,0,0-.51,1.47v.42a1.92,1.92,0,0,0,.68,1.59,3.16,3.16,0,0,0,2,.55h2.77a9.77,9.77,0,0,1,4.89,1.11,7.3,7.3,0,0,1,2.94,3,9.4,9.4,0,0,1,1,4.34v1.39a11.08,11.08,0,0,1-1.38,6.08,6.74,6.74,0,0,1-4,2.83,22.28,22.28,0,0,1-6.12.74Z"/></svg>
                </span>
                <span class="icon_text pe-2 ps-1">or</span>
                <span>
                  <svg width="40px" height="40px" fill="#f44336" id="Layer_1" data-name="Layer 1" viewBox="0 0 76.19 122.88"><defs><style>.cls-1{fill:#f44336;fill-rule:evenodd;}</style></defs><title>no-cross</title><path class="cls-1" d="M38.1,0A38.1,38.1,0,1,1,0,38.09,38.09,38.09,0,0,1,38.1,0ZM21.94,30.83c-1.34-1.32-2.42-2.15-.74-3.78l5.42-5.29c1.71-1.74,2.72-1.65,4.32,0l7.31,7.3,7.26-7.26c1.32-1.34,2.15-2.42,3.78-.74l5.29,5.42c1.74,1.72,1.65,2.73,0,4.32l-7.3,7.3,7.3,7.31c1.64,1.59,1.73,2.6,0,4.32l-5.29,5.42c-1.63,1.68-2.46.6-3.78-.74l-7.26-7.26-7.31,7.3c-1.6,1.64-2.61,1.73-4.32,0L21.2,49.14c-1.68-1.63-.6-2.46.74-3.78l7.26-7.27-7.26-7.26Z"/><path d="M9.81,122.63V91.46h6.46l11,17.36V91.46h8.14v31.17H28.9L18,105.26v17.37Zm43.23.25a23.38,23.38,0,0,1-5.81-.65,8.9,8.9,0,0,1-4.17-2.33,10.51,10.51,0,0,1-2.52-4.8A32,32,0,0,1,39.7,107a32,32,0,0,1,.84-8.08,10.51,10.51,0,0,1,2.52-4.8,9,9,0,0,1,4.17-2.33A23.38,23.38,0,0,1,53,91.16a23.32,23.32,0,0,1,5.81.65A9,9,0,0,1,63,94.14a10.5,10.5,0,0,1,2.51,4.8,32,32,0,0,1,.84,8.08,32,32,0,0,1-.84,8.08A10.5,10.5,0,0,1,63,119.9a8.93,8.93,0,0,1-4.18,2.33,23.32,23.32,0,0,1-5.81.65Zm0-7.3a7.56,7.56,0,0,0,2.6-.38,3.06,3.06,0,0,0,1.58-1.3,6.84,6.84,0,0,0,.79-2.6,31.4,31.4,0,0,0,.23-4.28,32.44,32.44,0,0,0-.23-4.4,6.67,6.67,0,0,0-.79-2.58,2.86,2.86,0,0,0-1.58-1.24,10,10,0,0,0-5.18,0A2.81,2.81,0,0,0,48.87,100a6.49,6.49,0,0,0-.8,2.58,34.17,34.17,0,0,0-.23,4.4,33.11,33.11,0,0,0,.23,4.28,6.65,6.65,0,0,0,.8,2.6,3,3,0,0,0,1.59,1.3,7.64,7.64,0,0,0,2.58.38Z"/></svg>
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer btn_box profile_modal_footer" style="line-height: 1;">
        <p id="btn_group2">
          <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal" id="noButton">No</a>
          </p>
          <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button" id="yesButton">
            <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="btn-text">{{__('translate.Yes')}}</span>
          </a>
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
      <div class="modal-header modal-header-bg" id="logoutModal_header">
        <h6 class="modal-title admin_title scan confirm_title pt-1" id="staticBackdropLabel">
          Confirm Delete
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn2" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body modal-bg" id="logoutModal_body">
          <p class="admin_paragraph" style="text-align:center;" id="text_message">
            <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, to delete about the category ?</label>
          </p>
          <span class="modal_icon_position">
            <span class="init_skeln">
              <svg version="1.1" id="Layer_1" x="0px" y="0px" width="45px" height="45px" fill="#f44336" viewBox="0 0 108.294 122.88" enable-background="new 0 0 108.294 122.88" xml:space="preserve"><g><path d="M4.873,9.058h33.35V6.2V6.187c0-0.095,0.002-0.186,0.014-0.279c0.075-1.592,0.762-3.037,1.816-4.086l-0.007-0.007 c1.104-1.104,2.637-1.79,4.325-1.806l0.023,0.002V0h0.031h19.884h0.016c0.106,0,0.207,0.009,0.309,0.022 c1.583,0.084,3.019,0.76,4.064,1.81c1.102,1.104,1.786,2.635,1.803,4.315l-0.003,0.021h0.014V6.2v2.857h32.909h0.017 c0.138,0,0.268,0.014,0.401,0.034c1.182,0.106,2.254,0.625,3.034,1.41l0.004,0.007l0.005-0.007 c0.851,0.857,1.386,2.048,1.401,3.368l-0.002,0.032h0.014v0.032v10.829c0,1.472-1.195,2.665-2.667,2.665h-0.07H2.667 C1.195,27.426,0,26.233,0,24.762v-0.063V13.933v-0.014c0-0.106,0.004-0.211,0.018-0.315v-0.021 c0.089-1.207,0.624-2.304,1.422-3.098l-0.007-0.002C2.295,9.622,3.49,9.087,4.81,9.069l0.032,0.002V9.058H4.873L4.873,9.058z M77.79,49.097h-5.945v56.093h5.945V49.097L77.79,49.097z M58.46,49.097h-5.948v56.093h5.948V49.097L58.46,49.097z M39.13,49.097 h-5.946v56.093h5.946V49.097L39.13,49.097z M10.837,31.569h87.385l0.279,0.018l0.127,0.007l0.134,0.011h0.009l0.163,0.023 c1.363,0.163,2.638,0.789,3.572,1.708c1.04,1.025,1.705,2.415,1.705,3.964c0,0.098-0.009,0.193-0.019,0.286l-0.002,0.068 l-0.014,0.154l-7.393,79.335l-0.007,0.043h0.007l-0.016,0.139l-0.051,0.283l-0.002,0.005l-0.002,0.018 c-0.055,0.331-0.12,0.646-0.209,0.928l-0.007,0.022l-0.002,0.005l-0.009,0.018l-0.023,0.062l-0.004,0.021 c-0.118,0.354-0.264,0.698-0.432,1.009c-1.009,1.88-2.879,3.187-5.204,3.187H18.13l-0.247-0.014v0.003l-0.011-0.003l-0.032-0.004 c-0.46-0.023-0.889-0.091-1.288-0.202c-0.415-0.116-0.818-0.286-1.197-0.495l-0.009-0.002l-0.002,0.002 c-1.785-0.977-2.975-2.882-3.17-5.022L4.88,37.79l-0.011-0.125l-0.011-0.247l-0.004-0.116H4.849c0-1.553,0.664-2.946,1.707-3.971 c0.976-0.955,2.32-1.599,3.756-1.726l0.122-0.004v-0.007l0.3-0.013l0.104,0.002V31.569L10.837,31.569z M98.223,36.903H10.837 v-0.007l-0.116,0.004c-0.163,0.022-0.322,0.106-0.438,0.222c-0.063,0.063-0.104,0.132-0.104,0.179h-0.007l0.007,0.118l7.282,79.244 h-0.002l0.002,0.012c0.032,0.376,0.202,0.691,0.447,0.825l-0.002,0.004l0.084,0.032l0.063,0.012h0.077h72.695 c0.207,0,0.399-0.157,0.518-0.377l0.084-0.197l0.054-0.216l0.014-0.138h0.005l7.384-79.21L98.881,37.3 c0-0.045-0.041-0.111-0.103-0.172c-0.12-0.118-0.286-0.202-0.451-0.227L98.223,36.903L98.223,36.903z M98.334,36.901h-0.016H98.334 L98.334,36.901z M98.883,37.413v-0.004V37.413L98.883,37.413z M104.18,37.79l-0.002,0.018L104.18,37.79L104.18,37.79z M40.887,14.389H5.332v7.706h97.63v-7.706H67.907h-0.063c-1.472,0-2.664-1.192-2.664-2.664V6.2V6.168h0.007 c-0.007-0.22-0.106-0.433-0.259-0.585c-0.137-0.141-0.324-0.229-0.521-0.252h-0.082h-0.016H44.425h-0.031V5.325 c-0.213,0.007-0.422,0.104-0.576,0.259l-0.004-0.004l-0.007,0.004c-0.131,0.134-0.231,0.313-0.259,0.501l0.007,0.102V6.2v5.524 C43.554,13.196,42.359,14.389,40.887,14.389L40.887,14.389z"/></g></svg>
            </span>
          </span>
        </div>
        <div class="modal-footer btn_box" id="logoutModal_footer">
          <button type="button" class="btn btn-sm cgt_cancel_btn btn_focus" id="cate_delete_cancel" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-sm cgt_btn btn_focus delete_btn_category" id="confirmDeleteBtn">
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
      <div class="modal-header modal-header-bg" id="logoutModal_header">
        <h6 class="modal-title admin_title scan update_title pt-1" id="staticBackdropLabel">
          Update Category
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn3" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body modal-bg" id="logoutModal_body">
          <span id="categry_id"></span><br>
          <span id="categry_name"></span><br>
          <p class="admin_paragraph" id="text_message">
            <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update ? </label><br>
          </p>
          <span class="modal_icon">
            <span class="modal_icon_one">
              <svg width="30px" height="30px" fill="#333" id="Layer_1" data-name="Layer 1" viewBox="0 0 120.09 122.88"><title>data-update</title><path d="M16.83,25.39C24.55,28,35.28,29.55,47.2,29.55S69.86,28,77.57,25.39c6.77-2.26,11-5,11-7.68s-4.19-5.41-11-7.67C69.86,7.47,59.13,5.88,47.2,5.88S24.55,7.47,16.83,10c-14.36,4.8-14.75,10.42,0,15.35Zm70.1,31.17a33.09,33.09,0,0,1,23.44,9.71v0a33.12,33.12,0,0,1,0,46.86l0,0a33.12,33.12,0,0,1-46.86,0l0,0a33.12,33.12,0,0,1,0-46.86l0,0a33.06,33.06,0,0,1,23.43-9.71Zm1.88,17.52L86,88.12l-2.8-4.22c-6,2.42-9.42,6.42-9.92,12.56-5-8.66-1.95-16.43,4.33-21l-2.86-4.3,14,2.9Zm-4.49,32.13,2.76-14,2.81,4.22c6-2.42,9.42-6.42,9.92-12.56,5,8.66,2,16.43-4.33,21l2.86,4.3-14-2.9ZM106.7,70a28,28,0,1,0,8.19,19.77A27.84,27.84,0,0,0,106.7,70ZM43.92,91C32.69,90.77,22.55,89.12,15,86.6a37.06,37.06,0,0,1-9-4.26v19.18c.53,2.49,4.59,5,10.89,7.11,7.72,2.58,18.45,4.17,30.37,4.17,1.15,0,2.29,0,3.42,0a43.68,43.68,0,0,0,4.32,5.69q-3.78.22-7.74.22c-12.52,0-23.92-1.71-32.23-4.48-4.38-1.47-14.91-6.27-14.91-12V100.3C.06,74.09,0,43.92,0,17.71,0,12.23,5.72,7.58,15,4.49,23.28,1.71,34.68,0,47.2,0S71.12,1.71,79.43,4.49s13.92,6.92,14.84,11.77a2.93,2.93,0,0,1,.17,1V47.35a42.18,42.18,0,0,0-6.08-.64,2.77,2.77,0,0,0,.17-.93h0V26.62a37,37,0,0,1-9.13,4.32c-8.31,2.77-19.71,4.49-32.23,4.49S23.28,33.71,15,30.94a37.44,37.44,0,0,1-9-4.25V46.34c.53,2.49,4.59,5,10.89,7.11C24.55,56,35.28,57.62,47.2,57.62c4.08,0,8-.19,11.74-.54-.62.53-1.22,1.08-1.8,1.64-.22.18-.42.37-.62.56l0,0,0,0,0,0a43.9,43.9,0,0,0-3.55,4c-1.89.08-3.8.12-5.75.12C34.68,63.49,23.28,61.78,15,59a37.06,37.06,0,0,1-9-4.25V73.93c.53,2.49,4.59,5,10.89,7.11,7.05,2.35,16.61,3.88,27.31,4.13a42.92,42.92,0,0,0-.24,4.55c0,.44,0,.88,0,1.32Z"/></svg> 
            </span>
            <span class="icon_text modal_icon_two pe-2 ps-1">confirm or cancel</span>
            <span class="modal_icon_three">
              <svg width="30px" height="30px" fill="#cb0e0e" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 120.54" style="enable-background:new 0 0 122.88 120.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M95.7,65.5c15.01,0,27.18,12.17,27.18,27.18c0,15.01-12.17,27.18-27.18,27.18 c-15.01,0-27.18-12.17-27.18-27.18C68.52,77.67,80.69,65.5,95.7,65.5L95.7,65.5z M102.8,81.44c1.46-1.48,3.83-1.49,5.3-0.01 c1.47,1.47,1.47,3.87,0.01,5.35l-6.4,6.49l6.41,6.5c1.45,1.47,1.43,3.85-0.04,5.32c-1.47,1.47-3.84,1.46-5.28-0.01l-6.36-6.45 l-6.38,6.47c-1.46,1.48-3.83,1.49-5.3,0.01c-1.47-1.47-1.47-3.87-0.01-5.35l6.4-6.49l-6.41-6.5c-1.45-1.47-1.43-3.85,0.04-5.32 c1.47-1.47,3.84-1.46,5.28,0.01l6.36,6.45L102.8,81.44L102.8,81.44z M17.69,26.67c8.1,2.71,19.38,4.38,31.91,4.38 c12.53,0,23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06c0-2.81-4.4-5.69-11.51-8.06c-8.1-2.7-19.38-4.38-31.91-4.38 c-12.53,0-23.81,1.67-31.91,4.38C2.6,15.59,2.18,21.5,17.69,26.67L17.69,26.67z M6.24,47.86c0.56,2.62,4.83,5.26,11.45,7.47 c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06h0.03v-19.3 c-2.53,1.73-5.78,3.26-9.59,4.53c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72c-3.77-1.26-6.98-2.76-9.49-4.47 V47.86L6.24,47.86z M63.3,92.54c-4.35,0.44-8.95,0.67-13.7,0.67c-13.16,0-25.13-1.8-33.86-4.72c-3.77-1.26-6.98-2.76-9.49-4.47 v18.49c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c7.52,0,14.58-0.6,20.78-1.67c1.56,1.94,3.33,3.7,5.29,5.24 c-7.53,1.65-16.49,2.6-26.07,2.6c-13.16,0-25.13-1.8-33.86-4.72c-4.6-1.54-15.67-6.58-15.67-12.62c0-0.71,0-1.3,0-1.98 C0.06,73.69,0,46.15,0,18.61c0-5.76,6.01-10.65,15.73-13.9C24.46,1.8,36.44,0,49.6,0c13.16,0,25.13,1.8,33.86,4.72 c8.85,2.95,14.62,7.27,15.59,12.37c0.12,0.32,0.18,0.67,0.18,1.04v42.37c-1.2-0.14-2.42-0.21-3.66-0.21c-0.85,0-1.68,0.03-2.51,0.1 v-3.74c-2.53,1.73-5.78,3.26-9.59,4.53c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47v18.49c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c5.01,0,9.82-0.27,14.31-0.76 C63.51,88.3,63.3,90.4,63.3,92.54L63.3,92.54z"/></g></svg>
            </span>
          </span>
        </div>
        <div class="modal-footer btn_box" id="logoutModal_footer">
          <button type="button" class="btn btn-sm cgt_btn delete_cancel btn_focus" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
          <button id="update_btn_confirm" class="btn btn-sm cgt_btn update_confirm btn_focus">
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