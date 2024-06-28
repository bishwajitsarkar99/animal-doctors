@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="inventory-bg-color">
  <button class="tablinkinventory ms-1 ps-2 pe-2 mb-1 mt-1" onclick="openinventoryLink(event,'inventory_authorize')" id="inventory_active">Inventory-Authorize</button>
  <button class="tablinkinventory ps-2 pe-2" onclick="openinventoryLink(event,'inventory_permission')" id="inventory_inactive">Permission</button>
  <button class="tablinkinventory ps-2 pe-2" onclick="openinventoryLink(event,'inventory_delete')" id="inventory_inactive">Access & Export</button>
</div>
<div id="inventory_authorize" class="supp">
  <div class="card form-control card-body form-control-sm pb-4" id="inventory_page">
    @include('super-admin.inventory-authorize._inventory-authorize-table')
  </div>
</div>
<div id="inventory_delete" class="container-fluid bg-transparent px-4 supp" style="display: none;">
  @include('super-admin.inventory-authorize._inventory-details-table')
</div>
<div id="inventory_permission" class="container-fluid bg-transparent px-4 supp" style="display: none;">
  <div class="card form-control card-body form-control-sm" id="permission_access_page">
    @include('super-admin.inventory-authorize._permission')
    @include('super-admin.inventory-authorize._inventory_permission_table')
  </div>
</div>

<!-- show-message -->
<div class="col-xl-12 action_message">
  <p class="ps-1"><span id="success_message"></span></p>
  <p class="ps-1"><span id="success_messages"></span></p>
  <p class="ps-1 ms-2"><span id="success_messages_permission"></span></p>
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


{{-- Start Delete Inventory Modal--}}
@include('super-admin.inventory-authorize.data-handel-ajax._delete_permission')
{{-- End Delete Inventory Modal---}}

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/medicine-inventory.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/authorize_table.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
<!-- ================ permission-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/permission/permission.css">
<!-- ================ permission-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/permission/permission.css">
@endsection

@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/scrollbar-table-js/jquery-scrollbar-table-1.00.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/js/inventory-counter.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/js/date-formate.js"></script>
@include('super-admin.inventory-authorize.data-handel-ajax._inventory-authorize-table')
@include('super-admin.inventory-authorize.data-handel-ajax._filter-permission-data-ajax')
@include('super-admin.inventory-authorize._get-all-inventory')
@include('super-admin.inventory-authorize.access-export-permission-ajax.ajax')
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
<script>
  //date-picker
  $(document).ready(function() {
    $('#start_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#end_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#start_get_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#end_get_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#start_of_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#end_of_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
  });
</script>
<script>
  $(document).ready(function() {
    // search button loader
    $("#data_search").on('click', () => {
      $('.search-icon').removeClass('search-hidden');
      $(this).attr('disabled', true);

      var time = null;
      time = setTimeout(() => {
        $('.search-icon').addClass('search-hidden');
        $(this).attr('disabled', false);
      }, 3000);
      return () => {
        clearTimeout(time);
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#inventory_active").addClass('inventory-seeblue');
  });
  // Tabl Link =======
  function openinventoryLink(evt, animName) {
    var i, x, tablinkinventory;
    x = document.getElementsByClassName("supp");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinkinventory = document.getElementsByClassName("tablinkinventory");
    for (i = 0; i < x.length; i++) {
      tablinkinventory[i].className = tablinkinventory[i].className.replace(" inventory-seeblue", "");
    }
    document.getElementById(animName).style.display = "block";
    evt.currentTarget.className += " inventory-seeblue";
  }
</script>
<script type="text/javascript">
  // $(function() {
  //   $('#inventoryAuthorizeTable').scrollTableBody();
  // });
</script>
<script>
  $(document).ready(function() {
    // Add an event listener to the table to handle collapsing/expanding
    $('#inventoryAuthorizeTable tbody').on('click', 'tr.parent-row', function() {
      var parentRow = $(this);
      var parentID = parentRow.data('parent');

      // Toggle the child rows visibility
      var childRows = $('#inventoryAuthorizeTable tbody').find('tr.child-row[data-parent="' + parentID + '"]');
      childRows.toggle();

      // Change the icon based on visibility
      var icon = parentRow.find('td:first-child');
      icon.html(childRows.is(':visible') ? '▼' : '➤');
    });
  });
</script>

@endsection