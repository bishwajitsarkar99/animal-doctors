@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm inventory-details-record-card">
  <div class="card-body">
    <ul class="nav nav-tabs tab_bg" role="tablist" style="background:aliceblue;">
      <li class="nav-item">
        <a class="nav-link setting active home-text" data-bs-toggle="tab" href="#home" id="tabHome" hidden> Supplier Role</a>
        <span class="tab-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <input class="form-control from-control-sm" type="search" name="role_id" placeholder="Search-role-id" id="roleSearch" hidden>
        <span class="inp_ser_skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <a class="nav-link setting home-text" data-bs-toggle="tab" href="#supplierSetting" id="tabSetting" hidden>Supplier Permission</a>
        <span class="tab2-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <a class="nav-link setting" data-bs-toggle="tab" href="#moduleSetting" id="moduSetting" hidden>Module Permission</a>
        <span class="tab4-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <a class="nav-link setting home-text" href="/supplier" id="tabCreateSupplier" hidden> Create Supplier</a>
        <span class="tab3-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-sm supplier_tab btn_focus add_button  mt-2 ms-2" id="refresh" hidden>
          <i class="refresh-icon fa fa-solid fa-asterisk fa-spin refrsh-hidden" style="color:white;opacity:1;"></i>
          <span class="btn-text ms-1">Refresh</span>
        </button>
        <span class="tab_btn_skeletone ms-1"></span>
      </li>
    </ul>
    <div class="tab-content" id="showCard" style="background:aliceblue;padding-bottom:15px;" hidden>
      <div id="home" class="container tab-pane active"><br>
        @include('super-admin.supplier._permission_home')
      </div>
      <div id="supplierSetting" class="container tab-pane" hidden><br>
        @include('super-admin.supplier._supplier-status-table')
      </div>
      <div id="moduleSetting" class="container tab-pane"><br>
        @include('super-admin.supplier.module.module-permission')
      </div>
      <div id="createSupplier" class="container tab-pane" hidden><br>

      </div>
      <div class="col-xl-12 action_message">
        <p class="ps-1 ms-4 mt-3 alert_show" style= "color:green;font-weight:700;font-size:13px;">
          <span id="success_message" style= "color:green;font-weight:700;font-size:13px;"></span>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="loader-position">
  <img class="server-loader loader-show" id="loaderShow" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...."/>
</div>


{{-- Start Update Modal --}}
<div class="modal fade" id="accessPermissionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
            <span class="pro_image"><img class="img-profile rounded-circle" id="output" src="/image/{{auth()->user()->image}}"></span>
            <h6 class="modal-title admin_title scan ms-3 pt-1" id="staticBackdropLabel">
                @if(auth()->user()->role ==1)
                    Super Admin
                @endif
                @if(auth()->user()->role ==2)
                    Sub Admin
                @endif
                @if(auth()->user()->role ==3)
                    Admin
                @endif
                @if(auth()->user()->role ==5)
                    Accounts
                @endif
                @if(auth()->user()->role ==6)
                    Marketing
                @endif
                @if(auth()->user()->role ==0)
                    Doctors
                @endif
            </h6>
            <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
                data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
            </div>
            <div class="modal-body" id="logoutModal_body">
                <p class="admin_paragraph" id="text_message" style="font-weight:600;font-size:13px;">
                    Do you want to update the access permission ?
                </p> 
                <span id="updateForm_errorList"></span>
                <p class="admin_paragraph" id="text_message" style="text-align:center;"> 
                    <button id="confirm_btn" class="btn btn-sm cgt_btn btn_focus permission_confirm_btn">
                        <span class="btn-text">Yes</span>
                    </button>

                    <span style="font-weight:600;font-size:13px;">Or</span>

                    <a type="button" class="btn btn-sm canl_button" data-bs-dismiss="modal">No</a>
                </p>
            </div>
            <div class="modal-footer" id="logoutModal_footer"></div>    
        </div>
    </div>
  </div>
</div>
{{-- End Update Modal --}}

{{-- Start Delete Modal --}}
<div class="modal fade" id="accessPermissionDeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
            <span class="pro_image"><img class="img-profile rounded-circle" id="output" src="/image/{{auth()->user()->image}}"></span>
            <h6 class="modal-title admin_title scan ms-3 pt-1" id="staticBackdropLabel">
              @if(auth()->user()->role ==1)
                    Super Admin
                @endif
                @if(auth()->user()->role ==2)
                    Sub Admin
                @endif
                @if(auth()->user()->role ==3)
                    Admin
                @endif
                @if(auth()->user()->role ==5)
                    Accounts
                @endif
                @if(auth()->user()->role ==6)
                    Marketing
                @endif
                @if(auth()->user()->role ==0)
                    Doctors
                @endif
            </h6>
            <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
                data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
            </div>
            <div class="modal-body" id="logoutModal_body">
                <p class="admin_paragraph" id="text_message" style="font-weight:600;font-size:12px;">
                  Do you want to delete the inventory access permission [ ID : <input type="text" id="delete_access_permission_id">] ?
                </p> 
                <p class="admin_paragraph" id="text_message" style="text-align:center;"> 
                  <button id="confirm_delete_btn" class="btn btn-sm cgt_btn btn_focus permission_confirm_btn">
                      <span class="btn-text">Yes</span>
                  </button>

                  <span style="font-weight:600;font-size:13px;">Or</span>

                  <a type="button" class="btn btn-sm canl_button" data-bs-dismiss="modal">No</a>
                </p>
            </div>
            <div class="modal-footer" id="logoutModal_footer"></div>    
        </div>
    </div>
  </div>
</div>
{{-- End Delete Modal --}}

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/medicine-inventory.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/authorize_table.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/inventory-details.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/inventory-details.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/supplier/permission.css">
@endsection
@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('super-admin.supplier.permission-ajax')
@include('super-admin.supplier.supplier-handel-ajax')
@include('super-admin.supplier.module.module-permission-ajax')
<script>
    function removeSkeletons(selector) {
        const allSkeletons = document.querySelectorAll(selector);

        allSkeletons.forEach(item => {
            item.classList.remove(selector.substring(1));
        });
    }

    // Usage
    $("#tabHome").attr('hidden', true);
    $("#refresh").attr('hidden', true);
    $("#roleSearch").attr('hidden', true);
    $("#item_class").attr('hidden', true);
    $("#perItemControls").attr('hidden', true);
    $("#tabSetting").attr('hidden', true);
    $("#tabCreateSupplier").attr('hidden', true);
    $("#showCard").attr('hidden', true);
    $("#moduSetting").attr('hidden', true);
    $("#loaderShow").removeClass('loader-show');
    setTimeout(() => {
      removeSkeletons('.skeleton');
      removeSkeletons('.tab-skeletone');
      removeSkeletons('.tab_btn_skeletone');
      removeSkeletons('.long-skeleton');
      removeSkeletons('.capsule-skeleton');
      removeSkeletons('.inp_ser_skeletone');
      removeSkeletons('.peritem-skeleton');
      removeSkeletons('.tab2-skeletone');
      removeSkeletons('.tab3-skeletone');
      removeSkeletons('.tab4-skeletone');
      $("#tabHome").removeAttr('hidden');
      $("#refresh").removeAttr('hidden');
      $("#roleSearch").removeAttr('hidden');
      $("#item_class").removeAttr('hidden');
      $("#perItemControls").removeAttr('hidden');
      $("#tabSetting").removeAttr('hidden');
      $("#tabCreateSupplier").removeAttr('hidden');
      $("#moduSetting").removeAttr('hidden');
      $("#loaderShow").addClass('loader-show');
      
    }, 1800);
    setTimeout(() => {
      $("#showCard").removeAttr('hidden');
    }, 500);
</script>
<script>
  $(document).ready(function(){

    $(document).on('click', '#tabHome', function() {
      
      $("#showCard").attr('hidden', true);
      $("#loaderShow").removeClass('loader-show');
      setTimeout(() => {
        $("#showCard").removeAttr('hidden');
        $("#loaderShow").addClass('loader-show');
      }, 800);
  
    });
  
    $(document).on('click', '#tabSetting', function() {
      
      $("#supplierSetting").attr('hidden', true);
      $("#loaderShow").removeClass('loader-show');
      setTimeout(() => {
        $("#supplierSetting").removeAttr('hidden');
        $("#loaderShow").addClass('loader-show');
      }, 800);
  
    });
  
    // Tab Loading Module Permission
    $(document).on('click', '#moduSetting', function(){
  
      $("#moduleSetting").attr('hidden', true);
      $("#loaderShow").removeClass('loader-show');
      setTimeout(() => {
        $("#moduleSetting").removeAttr('hidden');
        $("#loaderShow").addClass('loader-show');
      }, 800);
        
    });
  
    // Change url create supplier from supplier setting
    $(document).on('click', '#tabCreateSupplier', function(e) {
      e.preventDefault();
      var changeURL = '/supplier';
      window.location.href = changeURL;
      $("#loaderShow").removeClass('loader-show');
      $("#createSupplier").attr('hidden', true);
        setTimeout(() => {
        $("#loaderShow").addClass('loader-show');
        $("#createSupplier").removeAttr('hidden');
      }, 800);
    });  
  });
</script>
@endsection