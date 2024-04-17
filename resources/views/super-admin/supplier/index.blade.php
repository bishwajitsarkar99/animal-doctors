@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
    <div class="card-body skeleton" id="table_card_body">
        <div class="row">
            <div class="accordion accordion-flush" id="seach_type_edit">
                <div class="accordion-item">
                    <h2 class="accordion-header skeleton" id="flush-searchType">
                        <button class="accordion-button collapsed supplier_data_box skeleton" type="button" data-bs-toggle="collapse" data-bs-target="#flush-searchEdit" aria-expanded="false" aria-controls="flush-collapseOne">
                            Supplier Contact Information Data Table <span class="ms-3" id="loadHead"><i class="fa-solid fa-arrows-rotate fa-spin"></i></span>
                        </button>
                    </h2>
                    <div id="flush-searchEdit" class="accordion-collapse collapse" aria-labelledby="flush-searchType" data-bs-parent="#seach_type_edit">
                        <div class="accordion-body">
                            <div class="card-body focus-color cd cat_form">
                                <p class="catg mb-1">Supplier Or Vendor</span></p>
                                <div class="row">
                                    <div class="col-5">
                                        <span class="form-check form-switch search_ skeleton me-2">
                                            <input class="form-check-input skeleton" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <label class="search ser_labe skeletonl ps-1 pt-1" for="search pe-2">Search Mode :</label>
                                            <label class="form-check-label skeleton" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span id="search_plate">
                                            <input id="search" type="search" name="search" list="datalistOptions" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="All Search Heare.........">
                                            <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden"></i>
                                            <datalist id="datalistOptions">
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->supplier_id}}">
                                                    <option value="{{$supplier->bussiness_type}}">
                                                    <option value="{{$supplier->contact_number_one}}">
                                                    <option value="{{$supplier->contact_number_two}}">
                                                    <option value="{{$supplier->whatsapp_number}}">
                                                @endforeach
                                            </datalist>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <table class="bg-transparent ord_table center border-1 skeleton mt-2">
                                        <tr class="table-row order_body acc_setting_table">
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1">ID</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1">Action</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Type-ID</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Type</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Bussiness</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Name</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Contact1</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Contact1</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">WhatsApp</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Email</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton pe-2">Check</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ skeleton">Status</th>
                                        </tr>
                                        <tbody class="bg-transparent skeleton" id="supplier_data_table">

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
                                            <span class="custom-list-item-arrow me-2"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <span class="tot_summ skeleton" id="num_plate">
                                            <label class="tot-search skeleton mt-3" for="tot_cagt"> Total Supplier or Vendor :</label>
                                            <label for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;" id="total_supplier_records"></span><span id="iteam_label5" style="font-weight: 600;color:darkcyan;">.00</span></label>
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
                    <div class="category-form skeleton">
                        <div class="card form-control cat_form">
                            <form autocomplete="off">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-3 offset-1">
                                        <label class="supp_name_label brand skeleton mt-1" for="type">Type :</label>
                                    </div>
                                    
                                    <div class="col-7">
                                        <input class="form-control form-control-sm edit_type skeleton" type="text" name="type" id="type" placeholder="Source Type" autofocus>
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

{{-- Start Delete  Supplier or Vendor Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletesupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    Delete Supplier Or Vendor
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
            </div>

            <div class="modal-body profile-body pb-1">

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
                <button href="#" type="button" class="btn btn-sm cgt_btn delet_btn_user btn_focus" id="deleteLoader">
                    <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
                    <span class="btn-text">Delete</span>
                </button>
                <button type="button" class="btn btn-sm cgt_btn delete_cancel btn_focus" id="supp_delt4" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End Delete  Supplier or Vendor Modal---}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/brand/brand.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/supplier/supplier.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('super-admin.supplier.supplier-handel-ajax')

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