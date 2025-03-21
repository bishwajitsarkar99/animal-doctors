@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<!-- <div class="card form-control form-control-sm" id="category_page">
    <div class="card-body" id="table_card_body">
        <div class="row">
            <div class="col-xl-2">
                <a class="setbtn" href="{{route('access-permission.index')}}" id="suppSetting">Supplier Setting</a>
            </div>
            <p class="col-xl-10 action_message" style="text-align:left;font-size:12px;">
                <span class="ps-1"><span id="success_message"></span></span>
            </p>
        </div>
        <div class="row">
            <div class="accordion accordion-flush" id="seach_type_edit">
                <div class="accordion-item">
                    <h2 class="accordion-header skeleton" id="flush-searchType">
                        <button class="accordion-button collapsed supplier_data_box skeleton" type="button" data-bs-toggle="collapse" data-bs-target="#flush-searchEdit" aria-expanded="false" aria-controls="flush-collapseOne">
                            Supplier Contact Information Data Table <span class="ms-3" id="loadHead"><i class="fa-solid fa-arrows-rotate fa-spin"></i></span>
                        </button>
                    </h2>
                    
                    <div id="flush-searchEdit" class="accordion-collapse collapse" aria-labelledby="flush-searchType" data-bs-parent="#seach_type_edit">
                        <div class="content-body">
                            <div class="card-body focus-color cd cat_form">
                                <p class="catg mb-1">Supplier Or Vendor</span></p>
                                <div class="row">
                                    <div class="col-5">
                                        <span class="form-check form-switch search_ skeleton me-2">
                                            <input class="form-check-input skeleton" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <label class="search ser_labe skeletonl ps-1 pt-1" for="search pe-2">Search Mode :</label>
                                            <label class="form-check-label skeleton badge rounded-pill bg-light text-dark" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span id="search_plate" class="display-hidden">
                                            <input id="supplier_search" type="search" name="search" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="All Search Heare.........">
                                            <i class="supp_search-icon fa fa-spinner fa-spin supp_search-hidden"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle bg-transparent ord_table center border-1 skeleton mt-2">
                                        <thead class="table-light">
                                            <tr class="table-row order_body acc_setting_table">
                                                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1">ID</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1">Act</th>
                                                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">ID-Name</th>
                                                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Type</th>
                                                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Bussiness</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Name</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Contact1</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Contact2</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">WhatsApp</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Email</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton">Permission</th>
                                                <th id="th_sort" class="table_th_color tot_pending_ skeleton pe-2" style="text-align: center;">Check</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white skeleton" id="supplier_data_table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row table_last_row">
                                    <div class="skeleton col-1">
                                        <label class="item_class skeleton">Peritem</label>
                                        <div class="custom-select skeleton">
                                            <select class="ps-1 skeleton" id="perItemControl">
                                                <option class="skeleton" selected>10</option>
                                                <option class="skeleton">20</option>
                                                <option class="skeleton">50</option>
                                                <option class="skeleton">100</option>
                                                <option class="skeleton">200</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <span class="tot_summ skeleton" id="num_plate">
                                            <label class="tot-search skeleton mt-3" for="tot_cagt"> Total Supplier or Vendor :</label>
                                            <label class="badge rounded-pill bg-primary" for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_supplier_records"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
                                        </span>
                                    </div>
                                    <div class="col-7">
                                        <div class="pagination skeleton mt-1" id="supplier_data_table_paginate">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="category-form">
                        <div class="card form-control cat_form">
                            
                            <form class="skeleton" autocomplete="off">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="type">Type :</label>
                                    </div>
                                    
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_type skeleton" type="text" name="type" id="type" placeholder="Source Type" autofocus>
                                        <span class="skeleton"></span>
                                        <input type="hidden" id="supp_id">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="type-icon fa fa-spinner fa-spin type-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="bussiness_type">Bussiness-Type :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_bussiness_type skeleton" type="text" name="bussiness_type" id="bussiness_type" placeholder="Bussiness Type">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="bussiness-icon fa fa-spinner fa-spin bussiness-hidden mt-2"></i>
                                    </div>
                                    
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="name">Name :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_name skeleton" type="text" name="name" id="name" placeholder="Name" required>
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="name-icon fa fa-spinner fa-spin name-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="office_address">Office-Address :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_office_address skeleton" type="text" name="office_address" id="office_address" placeholder="Office Address">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="office-icon fa fa-spinner fa-spin office-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="current_address">Current-Address :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_current_address font_color skeleton" type="text" name="current_address" id="current_address" placeholder="Current Address">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="curradress-icon fa fa-spinner fa-spin curradress-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="contact_number_one">Contact-Number(1) :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_contact_number_one skeleton" type="text" name="contact_number_one" id="contact_number_one" placeholder="Contact Number One">
                                        <span id="savForm_error"></span><span id="updateForm_errorList"></span>
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="contact1-icon fa fa-spinner fa-spin contact1-hidden mt-2"></i>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="contact_number_two">Contact-Number(2) :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_contact_number_two skeleton" type="text" name="contact_number_two" id="contact_number_two" placeholder="Contact Number Two">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="contact2-icon fa fa-spinner fa-spin contact2-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="whatsapp_number">WhatsApp-Number :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_whatsapp_number skeleton" type="text" name="whatsapp_number" id="whatsapp_number" placeholder="WhatsApp Number">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="whatsapp-icon fa fa-spinner fa-spin whatsapp-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="email">Email :</label>
                                    </div>
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_email" type="text" name="email" id="email" placeholder="Email">
                                    </div>
                                    <div class="col-1" style="text-align: left;">
                                        <i class="email-icon fa fa-spinner fa-spin email-hidden mt-2"></i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 offset-9">
                                        <p style="text-align: center;">
                                            <button type="submit" class="btn btn-sm cgt_btn btn_focus skeleton mt-2 ms-2" id="save">
                                                <i class="add-icon fa fa-spinner fa-spin add-hidden"></i>
                                                <span class="btn-text">ADD</span>
                                            </button>
                                            <button id="update_btn" class="btn btn-sm cgt_btn btn_focus skeleton mt-2">
                                                <i class="update-icon fa fa-spinner fa-spin update-hidden"></i>
                                                <span class="btn-text">Update</span>
                                            </button>
                                            <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus skeleton mt-2 me-5">Cancel</button>
                                        </p>
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
    </div>
</div> -->
<div class="container">
    <form autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card form-control-sm left-card">
                    <div class="data-form">
                        <div class="row">
                            <div class="col-xl-6">
                                <select class="form-control form-control-sm select2 edit_branch_type" name="branch_type" id="branch_type">
                                    <option value="">Branch Type</option>
                                    @foreach($branch_categories as $item)
                                        <option value="{{$item->id}}">{{$item->branch_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <select class="form-control form-control-sm select2 edit_select_branch" name="branch_id" id="select_branch">
                                    <option value="">Select Branch ID</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6">
                                <input class="form-control form-control-sm edit_type" type="text" name="type" id="type" placeholder="Supplier Category" autofocus>
                                <input type="hidden" id="supp_id">
                            </div>
                            <div class="col-xl-6">
                                <input class="form-control form-control-sm edit_bussiness_type" type="text" name="bussiness_type" id="bussiness_type" placeholder="Bussiness Type">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6">
                                <input class="form-control form-control-sm edit_name" type="text" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="col-xl-6">
                                <input class="form-control form-control-sm edit_contact_number_one" type="text" name="contact_number_one" id="contact_number_one" placeholder="Contact Number One">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6">
                                <input class="form-control form-control-sm edit_contact_number_two" type="text" name="contact_number_two" id="contact_number_two" placeholder="Contact Number Two">
                            </div>
                            <div class="col-xl-6">
                                <input class="form-control form-control-sm edit_whatsapp_number" type="text" name="whatsapp_number" id="whatsapp_number" placeholder="WhatsApp Number">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12">
                                <input class="form-control form-control-sm edit_email" type="text" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12">
                                <textarea type="text" class="form-control form-control-sm edit_office_address" name="office_address" id="office_address" cols="30" rows="3" placeholder="Office Address"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12">
                                <textarea type="text" class="form-control form-control-sm edit_current_address font_color" name="current_address" id="current_address" cols="30" rows="3" placeholder="Current Address"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card form-control-sm right-card">
                    <div class="mini-right-group">
                        <div class="row g-3">
                            <div class="mb-1">
                                <label for="select-branch" class="form-label select-label">Select Branch Name</label>
                                <select class="form-control form-control-sm select2 edit_branch_type" name="branch_name" id="search_branch">
                                    <option value="">Select Branch Name</option>
                                    @foreach($branches as $item)
                                        <option value="{{$item->branch_name}}">{{$item->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="mb-3">
                                <label for="supplier" class="form-label select-label">Select Supplier Name</label>
                                <select class="form-control form-control-sm select2 edit_search_supplier" name="search_supplier" id="search_supplier">
                                    <option value="">Select Supplier Name</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="btn_box group_btn_box pt-3">
                                <button type="submit" class="btn btn-sm cgt_btn text-white button_width me-1" id="search">
                                    <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="category-btn-text">Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card form-control-sm right-card mt-4">
                    <div class="row row g-2 py-1 px-2">
                        <div class="col-8">
                            <div class="btn_box group_btn_box mt-3">
                                <button type="submit" class="btn btn-sm cgt_btn text-white button_width" id="save">
                                    <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="category-btn-text">ADD</span>
                                </button>
                                <button id="update_btn" class="btn btn-sm cgt_btn text-white button_width" hidden>
                                    <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="update-btn-text">Update</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn text-white button_width mt-3">
                                <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                <span class="cancel-btn-text">Cancel</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card form-control-sm right-card mt-4">
                    <span class="mini-head">Supplier Access</span>
                    <div class="row">
                        <div class="col-5">
                            <span class="child-label ms-3" id="accessLabel">Access-Date : </span>
                            <span class="child-label ms-3" id="denyLabel" hidden>Deny-Date : </span>
                        </div>
                        <div class="col-7">
                            <span class="child-label" id="accessDate" hidden> </span>
                            <span class="child-label" id="denyDate" hidden> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <span class="child-label ms-3" id="createLabel">Create-Date : </span>
                            <span class="child-label ms-3" id="updateLabel" hidden>Update-Date : </span>
                        </div>
                        <div class="col-7">
                            <span class="child-label" id="createDate" hidden> </span>
                            <span class="child-label" id="updateDate" hidden> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Start Delete  Supplier or Vendor Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletesupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title head_title ps-1 pe-1" id="staticBackdropLabels">
                    Delete Supplier Or Vendor
                </h5>
                <button type="button" class="btn-close btn-btn-sm cols_title" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
            </div>

            <div class="modal-body profile-body pb-1" style="background-color:seashell;">

                <div class="row profile-heading pb-3">
                    <div class="col-xl-12">
                        <div class="form-group delete_content" id="supp_delt">
                            <div id="active_loader"></div>
                            <label class="label_user_edit" for="id" id="supp_delt2">ID : </label>
                            <input type="text" class="mt-3 update_id id" id="delete_supplier_id" readonly><br>
                            <span class="label_user_edit" id="supp_delt3">Are you sure? Would you like to delete that, permanently?</span>
                            <input type="hidden" id="delete_supplier_id" name="supplier_id">
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
{{-- End Delete  Supplier or Vendor Modal--}}

{{-- Start Confirm Delete Supplier Modal--}}
<!-- Modal -->
<div class="modal fade" id="deleteconfirmsupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <div class="modal-footer" id="logoutModal_footer">
            <button href="#" type="button" class="btn btn-sm cgt_btn delet_btn_user btn_focus" id="deleteLoader">
                <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
                <span class="btn-text">Delete</span>
            </button>
            <button type="button" class="btn btn-sm cgt_btn delete_cancel btn_focus" id="supp_delt4" data-bs-dismiss="modal">Cancel</button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- Start Confirm Delete Supplier Modal--}}

{{-- Start Update Supplier Modal--}}
<!-- Modal -->
<div class="modal fade" id="updateconfirmsupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-header" id="logoutModal_header">
        <h6 class="modal-title admin_title scan update_title pt-1" id="staticBackdropLabel">
          Update Supplier
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
            <span class="btn-text">Confirm</span>
          </button>
          <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
        </div>    
      </div>
    </div>
  </div>
</div>
{{-- End Update Supplier Modal--}}

{{--Start Supplier or Info View Modal--}}
<div class="modal fade" id="supplierInfoView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content small_modal" id="admin_modal_box">
        <div class="modal-header" id="viewModal_header">
            <span class="modal-title admin_title scan pt-1" id="staticBackHead">
                <input class="view_name" type="text" readonly>
            </span>
            <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
                data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
        </div>
        <div class="modal-body" style="padding:0.5rem 0.5rem;" id="logoutModal_body">
            <table class="table-responsive">
                <tbody class="table_body">
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1" for="supplier_id">Supplier : </label></td>
                        <td class="lable_value"><input style="font-size:11px;width:200px;font-weight:700;background:seashell;" class="supp_vew" type="text" readonly></td>
                    </tr>
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1" for="view_type">Type : </label></td>
                        <td class="lable_value"><input style="font-size:11px;width:200px;font-weight:700;background:seashell;" class="view_type" type="text" readonly></td>
                    </tr>
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1" for="view_bussiness_type">Bussiness : </label></td>
                        <td class="lable_value"><input style="font-size:11px;width:200px;font-weight:700;background:seashell;" class="view_bussiness_type" type="text" readonly></td>
                    </tr>
                    <tr>
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1 address" for="view_office_address">Office-Address : </label></td>
                        <td class="lable_value"><textarea style="font-size:11px;width:200px;font-weight:700;background:seashell;" id="view_office_address"  rows="1" cols="35" class="view_office_address" readonly></textarea></td>
                    </tr>
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1 address" for="view_current_address">Current-Address : </label></td>
                        <td class="lable_value"><textarea style="font-size:11px;width:200px;font-weight:700;background:seashell;" id="view_current_address"  rows="1" cols="35" class="view_current_address" readonly></textarea></td>
                    </tr>
                    <tr class="table=light">
                        <td class="lable_class" style="font-size:11px;width:150px;background:seashell;text-align:left;"><label class="label_font ps-1" for="view_contact_number_one">Contract-1 : </label></td>
                        <td class="lable_value" ><input style="font-size:11px;width:200px;font-weight:700;background:seashell;" class="view_contact_number_one" type="text" readonly></td>
                    </tr>
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1" for="view_contact_number_two">Contract-2 : </label></td>
                        <td class="lable_value"><input style="font-size:11px;width:200px;font-weight:700;background:seashell;"  class="view_contact_number_two" type="text" readonly></td>
                    </tr>
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1" for="view_whatsapp_number">Whats app : </label></td>
                        <td class="lable_value"><input style="font-size:11px;width:200px;font-weight:700;background:seashell;" class="view_whatsapp_number" type="text" readonly></td>
                    </tr>
                    <tr class="table=light">
                        <td style="font-size:11px;width:150px;background:seashell;text-align:left;" class="lable_class"><label class="label_font ps-1" for="view_email">Email : </label></td>
                        <td class="lable_value"><input style="font-size:11px;width:200px;font-weight:700;background:seashell;" class="view_email" type="text" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer" id="logoutModal_footer">
    
        </div>    
    </div>
  </div>
</div>
{{--End Supplier or Info View Modal--}}

@endsection
@section('css')
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('backend_asset') }}/main_asset/jquery-ui-css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/brand/brand.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/supplier/supplier.css">
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('super-admin.supplier.supplier-handel-ajax')

<script>
  $(document).ready(function () {
    // Initialize Select2 for branch type
    $('#branch_type').select2({
      placeholder: 'Select Branch Type',
      allowClear: true,
      width: '100%'
    });

    // Set custom placeholder for the search input inside Select2 dropdown for branch type
    $(document).on('select2:open', '#branch_type', function () {
      setTimeout(() => {
        $('.select2-search__field').attr('placeholder', 'Search branch type...');
      }, 50);
    });

    // Initialize Select2 for branch selection
    $('#select_branch').select2({
      placeholder: 'Select Branch ID',
      allowClear: true,
      width: '100%'
    });

    // Set custom placeholder for the search input inside Select2 dropdown for branch selection
    $(document).on('select2:open', '#select_branch', function () {
      setTimeout(() => {
        $('.select2-search__field').attr('placeholder', 'Search branch id...');
      }, 50);
    });

    // Initialize Select2 for branch selection
    $('#search_branch').select2({
      placeholder: 'Select Branch',
      allowClear: true,
      width: '100%'
    });

    // Set custom placeholder for the search input inside Select2 dropdown for branch selection
    $(document).on('select2:open', '#search_branch', function () {
      setTimeout(() => {
        $('.select2-search__field').attr('placeholder', 'Search branch...');
      }, 50);
    });

    // Initialize Select2 for branch selection
    $('#search_supplier').select2({
      placeholder: 'Select Branch',
      allowClear: true,
      width: '100%'
    });

    // Set custom placeholder for the search input inside Select2 dropdown for supplier selection
    $(document).on('select2:open', '#search_supplier', function () {
      setTimeout(() => {
        $('.select2-search__field').attr('placeholder', 'Search supplier...');
      }, 50);
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

    setTimeout(() => {
        fetchData();
    }, 1000);
</script>

@endsection