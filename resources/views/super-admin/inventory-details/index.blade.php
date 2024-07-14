@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm inventory-details-record-card">
  <div class="card-body">
    <ul class="nav nav-tabs tab_bg skeleton" role="tablist">
      <li class="nav-item">
        <a class="nav-link setting active skeleton" data-bs-toggle="tab" href="#home">Inventory Details</a>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-sm cgt_btn btn_focus add_button skeleton  mt-1 ms-2" id="refresh">
          <i class="refresh-icon fa fa-solid fa-asterisk fa-spin refrsh-hidden" style="color:white;opacity:1;"></i>
          <span class="btn-text ms-1">Refresh</span>
        </button>
      </li>
      <li class="nav-item">
        <button class="btn btn-sm cgt_btn btn_focus add_button skeleton  mt-1 ms-2 dropdown-toggle ord_btn exportDropdown" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="export-signal history-signal-classic-hidden"></span>
          Export
          <i class="fa-solid fa-cloud-arrow-down"></i>
        </button>
        <ul class="dropdown-menu export-dropdown-menu" aria-labelledby="exportDropdown">
          <li>
            <a class="dropdown-item btn btn-sm btn-success ord_btn exportPdf" href="#" id="export">
              <span class="pdf" id="pdfText"></span>
              <span class="icon" id="pdfIcon"></span>
            </a>
          </li>
          <li>
            <a class="dropdown-item btn btn-sm btn-success ord_btn" href="#" id="exportExcel">
              <span class="excel" id="excelText"></span>
              <span class="icon" id="excelIcon"></span>
            </a>
          </li>
          <li>
            <a class="dropdown-item btn btn-sm btn-success ord_btn printBtn" href="#" id="exportCsv">
              <span class="cvs" id="cvsText"></span>
              <span class="icon" id="csvIcon"></span>
            </a>
          </li>
          <li>
            <a type="button" class="dropdown-item btn btn-sm btn-success ord_btn printBtn" id="printBtn" name="print">
              <span class="print" id="printText"></span>
              <span class="icon" id="printIcon"></span>
            </a> 
          </li>
        </ul>
      </li>
    </ul>
    <div class="tab-content">
      <div id="home" class="container tab-pane active skeleton"><br>
        @include('super-admin.inventory-details._inventory-data-get-ajax')
      </div>
    </div>
  </div>
</div>

<!-- Print Preview Modal Structure -->
<div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="printModalLabel">Print Preview</h5>
              <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="modal-content"></div>
            </div>
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/medicine-inventory.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/authorize_table.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/inventory-details.css">
@endsection
@section('script')
@include('super-admin.inventory-details.data-handel-ajax.get-inventory-ajax')
@include('super-admin.inventory-details.data-handel-ajax.data-export')
<script src="{{asset('backend_asset')}}/main_asset/js/date-formate.js"></script>
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
@endsection