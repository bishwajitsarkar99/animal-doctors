@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="inventory-bg-color">
  <button class="tablinkinventory ms-1 ps-2 pe-2 mb-1 mt-1" onclick="openinventoryLink(event,'inventory_authorize')" id="inventory_active">Inventory-Authorize</button>
  <button class="tablinkinventory ps-2 pe-2" onclick="openinventoryLink(event,'inventory_delete')" id="inventory_inactive">Inventory-Details</button>
  <button class="tablinkinventory ps-2 pe-2" onclick="openinventoryLink(event,'inventory_permission')" id="inventory_inactive">Permission</button>
</div>
<div id="inventory_authorize" class="supp">
  <div class="card form-control card-body form-control-sm pb-4" id="inventory_page">
    @include('super-admin.inventory-authorize._inventory-authorize-table')
  </div>
</div>
<div id="inventory_delete" class="supp mt-" style="display: none;">
  <div class="card form-control form-control-sm" id="category_page">
    @include('super-admin.inventory-authorize._inventory-details-table')
  </div>
</div>
<div id="inventory_permission" class="supp mt-" style="display: none;">
  <!-- <div class="card form-control form-control-sm" id="permission_page">
    
  </div> -->
  <div class="card form-control form-control-sm mt-" id="permission_access_page">
    @include('super-admin.inventory-authorize._permission')
    @include('super-admin.inventory-authorize._inventory_permission_table')
  </div>
</div>
<!-- show-message -->
<div class="col-xl-12 action_message">
  <p class="ps-1"><span id="success_message"></span></p>
</div>
{{-- Start Delete Inventory Modal--}}
@include('super-admin.inventory-authorize._delete-inventory')
@include('super-admin.inventory-authorize.data-handel-ajax._delete_permission')
{{-- End Delete Inventory Modal---}}

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/medicine-inventory.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/authorize_table.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
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