@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="container">
    <form autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card form-control-sm left-card">
                    <div class="data-form">
                        <input type="hidden" id="supp_id">
                        <div class="row">
                            <div class="col-xl-6 branch_type_nme">
                                <select class="form-control form-control-sm select2 edit_branch_type branch_type" name="branch_category" id="branch_type">
                                    <option value="">Branch Category</option>
                                    @foreach($branch_categories as $item)
                                        <option value="{{$item->id}}">{{$item->branch_category_name}}</option>
                                    @endforeach
                                </select>
                                <span id="savForm_error" hidden></span><span id="updateForm_errorList" hidden></span>
                            </div>
                            <div class="col-xl-6 branch_id_nme">
                                <select class="form-control form-control-sm select2 edit_select_branch" name="branch_id" id="select_branch">
                                    <option value="">Select Branch ID</option>
                                </select>
                                <span id="savForm_error2" hidden></span><span id="updateForm_errorList2" hidden></span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6 type_nme">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_type" type="text" name="type" id="type" placeholder="">
                                    <label for="supplier_type">Supplier or Vendor</label>
                                    <input type="hidden" id="supp_id">
                                </div>
                                <span id="savForm_error3" hidden></span><span id="updateForm_errorList3" hidden></span>
                            </div>
                            <div class="col-xl-6 branch_type_nme">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_bussiness_type" type="text" name="bussiness_type" id="bussiness_type" placeholder="">
                                    <label for="bussiness_type">Bussiness Type</label>
                                </div>
                                <span id="savForm_error4" hidden></span><span id="updateForm_errorList4" hidden></span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6 sup_nme">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_name" type="text" name="name" id="name" placeholder="">
                                    <label for="name">Supplier or Vendor Name</label>
                                </div>
                                <span id="savForm_error5" hidden></span><span id="updateForm_errorList5" hidden></span>
                            </div>
                            <div class="col-xl-6 contract_nme">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_contact_number_one" type="text" name="contact_number_one" id="contact_number_one" placeholder="">
                                    <label for="contractNumberOne">Contact Number One</label>
                                </div>
                                <span id="savForm_error6" hidden></span><span id="updateForm_errorList6" hidden></span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6 contract_two_nme">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_contact_number_two" type="text" name="contact_number_two" id="contact_number_two" placeholder="">
                                    <label for="contractNumberTwo">Contact Number Two</label>
                                </div>
                                <span id="savForm_error7" hidden></span><span id="updateForm_errorList7" hidden></span>
                            </div>
                            <div class="col-xl-6">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_whatsapp_number" type="text" name="whatsapp_number" id="whatsapp_number" placeholder="">
                                    <label for="whatsappNumber">WhatsApp Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12">
                                <div class="input-group">
                                    <input class="form-control form-control-sm edit_email" type="text" name="email" id="email" placeholder="">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12 office_address_nme">
                                <div class="input-group">
                                    <textarea type="text" class="form-control form-control-sm edit_office_address" name="office_address" id="office_address" cols="30" rows="3" placeholder=""></textarea>
                                    <label for="officeAddress">Office Address</label>
                                </div>
                                <span id="savForm_error7" hidden></span><span id="updateForm_errorList7" hidden></span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12 current_address_nme">
                                <div class="input-group">
                                    <textarea type="text" class="form-control form-control-sm edit_current_address font_color" name="current_address" id="current_address" cols="30" rows="3" placeholder=""></textarea>
                                    <label for="crrentAddress">Current Address</label>
                                </div>
                                <span id="savForm_error8" hidden></span><span id="updateForm_errorList8" hidden></span>
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
                                <select class="form-control form-control-sm select2 edit_search_branch_type search_type" name="branch_id" id="search_branch">
                                    <option value="">Select Branch Name</option>
                                    @foreach($branches as $item)
                                        <option value="{{$item->branch_id}}">{{$item->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="mb-3 select_name">
                                <label for="supplier" class="form-label select-label">Select Supplier Or Vendor Name</label>
                                <select class="form-control form-control-sm select2 edit_name search_name" name="name" id="search_supplier">
                                    <option value="">Select Supplier Or Vendor Name</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="btn_box group_btn_box pt-3">
                                <button id="search_btn" class="btn btn-sm cgt_btn text-white button_width me-1">
                                    <span class="search-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="search-btn-text">Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card form-control-sm right-card mt-4">
                    <div class="row g-2 py-1 px-2">
                        <div class="col-4">
                            <div class="btn_box group_btn_box mt-3">
                                <button id="save" class="btn btn-sm cgt_btn text-white button_width">
                                    <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="add-btn-text">ADD</span>
                                </button>
                                <button id="update_btn" class="btn btn-sm cgt_btn text-white button_width" hidden>
                                    <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="update-btn-text">Update</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="btn_box group_btn_box mt-3">
                                <button id="delete_btn" class="btn btn-sm cgt_btn text-white button_width" hidden>
                                    <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    <span class="delete-btn-text">Delete</span>
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
                <div class="card form-control-sm right-card mt-4 pb-3" hidden id="accessCard">
                    <span class="mini-head">Supplier or Vendor</span>
                    <div class="row checkbox">
                        <div class="col-5 pt-1">
                            <span class="child-label ms-2" id="accessLabel">
                                Access : <input class="form-switch form-check-input supplier_check_permission ms-2" type="checkbox" name="supplier_status" value="1" id="accessCheck">
                            </span>
                        </div>
                        <div class="col-4">
                            <span class="pill-success-rounded ms-1" id="justifyLabel" hidden> justify</span>
                            <span class="pill-danger-rounded ms-1" id="deny_label" hidden> Deny</span>
                        </div>
                        <div class="col-3">
                            <button id="view_btn" class="btn btn-sm cgt_btn text-white button_width">
                                <span class="view-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                <span class="view-btn-text">View</span>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3" hidden>
                        <div class="col-5">
                            <span class="child-label ms-3" id="accessLabel">Access-Date : </span>
                            <span class="child-label ms-3" id="denyLabel" hidden>Deny-Date : </span>
                        </div>
                        <div class="col-7">
                            <span class="child-label" id="accessDate" hidden> </span>
                            <span class="child-label" id="denyDate" hidden> </span>
                        </div>
                    </div>
                    <div class="row mt-2" hidden>
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
    <div class="row">
        <div class="col-xl-12 action_message">
        <p class="mt-1"><span id="success_message"></span></p>
        </div>
    </div>
</div>

{{-- Start Delete  Supplier or Vendor Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletesupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title head_title ps-1 pe-1" id="staticBackdropLabels" style="color:black;">
                    Delete Supplier Or Vendor
                </h5>
                <button type="button" class="btn-close btn-btn-sm cols_title" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
            </div>

            <div class="modal-body pb-1">
                <div class="row profile-heading pb-3">
                    <div class="col-xl-12">
                        <div class="form-group delete_content" id="supp_delt">
                            <div id="active_loader"></div>
                            <label class="label_user_edit" for="id" id="supp_delt2">ID : </label>
                            <input type="text" class="mt-3 update_id id" id="delete_supplier_id" readonly><br>
                            <span class="label_user_edit" id="supp_delt3">Are you sure? Would you like to delete the <span id="suppName"></span> (<span id="suppType"></span>), permanently?</span>
                            <input type="hidden" id="delete_supplier_id" name="supplier_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer profile_modal_footer btn_box group_btn_box">
                <p id="btn_group">
                    <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal" id="noButton">No</a>
                </p>
                <p id="btn_group2">
                    <a href="#" type="button" class="btn btn-success modal_button logout_button yes_button" id="yesButton">
                        <i class="loading-icon fa fa-spinner fa-spin hidden"></i>
                        <span class="btn-text">{{__('translate.Yes')}}</span>
                    </a>
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
        <div class="modal-footer btn_box group_btn_box" id="logoutModal_footer">
            <button type="button" class="btn btn-sm cgt_cancel_btn text-white delt_cancel" id="supp_delt4" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-sm cgt_btn text-white delet_btn_user" id="deleteConfirm">
                <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
                <span class="btn-text">Delete</span>
            </button>
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
          Update <span id="headName"></span>
        </h6>
        <button type="button" class="btn-close btn-btn-sm head_btn3" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
        </div>
        <div class="modal-body" id="logoutModal_body">
          <p class="admin_paragraph" style="text-align:left;" id="text_message">
            <label class="label_user_edit" id="cate_confirm_update" for="id">
            <span id="bodyName"></span> - are you updated, confirm or cancel ? 
            </label>
          </p>
        </div>
        <div class="modal-footer btn_box group_btn_box" id="logoutModal_footer">
            <button type="button" class="btn btn-sm cgt_cancel_btn text-white" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
            <button id="update_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus mt-1">
                <span class="btn-text">Confirm</span>
            </button>
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
                <span class="supp_heading_name" id="view_name"></span>
            </span>
            <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
                data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
        </div>
        <div class="modal-body" style="padding:0.5rem 0.5rem;background-color: white;" id="logoutModal_body">
            <ul id="supplier_menu_head">
                <li><span>Supplier/Vendor Information</span></li>
            </ul>
            <ul id="supplier_menu">
                <li><label class="label_font ps-1" for="supplier_id" id="supp_vew"></label></li>
                <li><label class="label_font ps-1" for="view_type" id="view_type"></label></li>
                <li><label class="label_font ps-1" for="view_bussiness_type" id="view_bussiness_type"></label></li>
                <li><label class="label_font ps-1" for="supplier_name" id="supplier_name"></label></li>
                <li><label class="label_font ps-1" for="view_office_address" id="view_office_address"></label></li>
                <li><label class="label_font ps-1" for="view_current_address" id="view_current_address"></label></li>
                <li><label class="label_font ps-1" for="view_contact_number_one" id="view_contact_number_one"></label></li>
                <li><label class="label_font ps-1" for="view_contact_number_two" id="view_contact_number_two"></label></li>
                <li><label class="label_font ps-1" for="view_whatsapp_number" id="view_whatsapp_number"></label></li>
                <li><label class="label_font ps-1" for="view_email" id="view_email"></label></li>
            </ul>
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
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
@include('super-admin.supplier.supplier-handel-ajax')

<script>
  $(document).ready(function () {
    // Initialize Select2 for branch type
    $('#branch_type').select2({
      placeholder: 'Select Branch Category',
      allowClear: true,
      width: '100%'
    });

    // Set custom placeholder for the search input inside Select2 dropdown for branch type
    $(document).on('select2:open', '#branch_type', function () {
      setTimeout(() => {
        $('.select2-search__field').attr('placeholder', 'Search branch category...');
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
      placeholder: 'Select Supplier Or Vendor Name',
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