@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <x-Buttons.ListTab tabMargin="tab-margin" tabBg="aliceblue">
      <x-Buttons.ListNavItem tabSkeletone="tab-skeletone">
        <x-Buttons.TabSelector label="User Analysis" tablParentClass="nav-link" tablChildClass="setting" tablClass="home-text" tablActiveClass="active" link="#home" tabId="tabHome" />
      </x-Buttons.ListNavItem>

      <x-Buttons.ListNavItem tabSkeletone="tab-skeletone">
        <x-Buttons.TabSelector label="User Activity" tablParentClass="nav-link" tablChildClass="setting" btnDisabled="{{$user_activity_authorize != 1 ? 'disabled' : '' }}" link="#userActivity" tabId="tabActivity" />
      </x-Buttons.ListNavItem>

      <x-Buttons.ListNavItem tabSkeletone="tab-skeletone">
        <x-Buttons.TabSelector label="User Activity Graph" tablParentClass="nav-link" tablChildClass="setting" tablClass="home-text" btnDisabled="{{$user_activity_graph_authorize != 1 ? 'disabled' : '' }}" link="#userDetails" tabId="tabDetails" />
      </x-Buttons.ListNavItem>

      <x-Buttons.ListNavItem tabSkeletone="tab-skeletone">
        <x-Buttons.TabRefreshButton label="Refresh" buttonParentClass="refresh-btn" buttonChildClass="ripple-surface" buttonId="refresh" />
      </x-Buttons.ListNavItem>
    </x-Buttons.ListTab>

    <x-Buttons.TabContent tabResponse="activity-tab-responsive" bg="white" tabPadding="15px" tabId="showCard">
      <x-Buttons.TabContentPanel tabPanel="tab-pane" tabClass="active" conentId="home">
        @include('super-admin.user-details.user-graph')
      </x-Buttons.TabContentPanel>

      <x-Buttons.TabContentPanel tabPanel="tab-pane" tabClass="" conentId="userActivity">
        @include('super-admin.user-details.user-activites')
      </x-Buttons.TabContentPanel>

      <x-Buttons.TabContentPanel tabPanel="tab-pane" tabClass="" conentId="userDetails">
        @include('super-admin.user-details.activities-graph')
      </x-Buttons.TabContentPanel>
    </x-Buttons.TabContent>
  </div>
  <x-PageLoader.Loader loaderName="server-loader" loaderPosition="loader-position" />

  <!-- Download Modal -->
  <div class="modal fade" id="downloadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header modal-heading" id="logoutModal_header">
          <!-- Modal Header -->
          <span class="heading-text" id="head_info"></span>
          <button type="button" class="btn-close-modal" 
            data-bs-dismiss="modal" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="cancelPrintModal">
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body center-modal-content" id="SM_Modal_body">
          <div class="row mb-2">
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <x-Downloads.PdfDownload pdfClassName="download-link-btn" pdfId="exportPdf" svgWidth="30" svgHeight="30" />
                </span>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <x-Downloads.ExcelDownload excelClassName="download-link-btn" excelId="exportExcel" svgWidth="30" svgHeight="30" /> 
                </span>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <x-Downloads.ExcelCvsFormat excelCvsClassName="download-link-btn" excelCvsId="exportExcelCsv" svgWidth="30" svgHeight="30" />
                </span>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <x-Downloads.DataPrint dataPrintClassName="download-link-btn" dataPrintId="dataPrint" svgWidth="30" svgHeight="30" />
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <ul id="downloadInfo">
              <li><span id="branhInfo">ID: </span>
                <ul>
                  <li id="roleInfo"></li>
                  <ul id="emailInfo"></ul>
                </ul>
              </li>
            </ul>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <iframe id="printFrame" style="display:none;"></iframe>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/user-details/user-details-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/suspended-page-asset/suspended-asset.css">
@endsection

@push('scripts')
@include('super-admin.user-details.ajax.user-details-ajax')
@include('super-admin.user-details.ajax.user-activities-ajax')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#date_start').datepicker({
      dateFormat: "dd-M-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#date_end').datepicker({
      dateFormat: "dd-M-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#chartStartDate').datepicker({
      dateFormat: "dd-M-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#chartEndDate').datepicker({
      dateFormat: "dd-M-yy",
      changeMonth: true,
      changeYear: true,
    });
    // Tab on click action
    $(document).on('click', '[data-target]', function(e) {
      e.preventDefault();
      const target = $(this).data('target');

      // Remove 'active' from all
      $('.tab-pane').removeClass('active');
      $('[data-target]').removeClass('active');

      // Add 'active' to the current
      $(target).addClass('active');
      $(this).addClass('active');
    });
  });
</script>
<script>
  $(document).ready(function() {
    // Initialize Select2 for all elements with the 'select2' class
    //$('.select2').select2();
    $('.select2').each(function() {
      if ($(this).attr('id') === 'select_role') {
        $(this).select2({
          placeholder: 'Select User Role.............................',
          allowClear: true
        });
      }
    });
    $('#select_role').on('select2:open', function() {
      $('.select2-search__field').attr('placeholder', 'Search roles...');
    });
  });
</script>
<script>
  // skeleton
  function removeSkeletons(selector) {
    const allSkeletons = document.querySelectorAll(selector);

    allSkeletons.forEach(item => {
      item.classList.remove(selector.substring(1));
    });
  }
  $("#showCard").attr('hidden', true);
  $("#loaderShow").removeClass('loader-show');
  $("#svgIcon").removeAttr('hidden');
  $("#svgIcon2").removeAttr('hidden');
  $(".svg_chart_body").removeClass('chart-svg-display');
  $(".svg_icon_branch").addClass('chart-svg-display');
  $(".svg_icon_chart").addClass('chart-svg-display');
  requestAnimationFrame(()=> {
    setTimeout(() => {
      removeSkeletons('.head-skeletone');
      removeSkeletons('.chart-body-skeletone');
      removeSkeletons('.body-skeletone');
      removeSkeletons('.cricale-number-skeleton');
      removeSkeletons('.loader_skeleton');
      removeSkeletons('.percentage-skeletone');
      removeSkeletons('.result-skeletone');
      removeSkeletons('.total-number-skeletone');
      removeSkeletons('.tab-skeletone');
      removeSkeletons('.branch-card-skeletone');
      $("#loaderShow").addClass('loader-show');
      $("#svgIcon").attr('hidden', true);
      $("#svgIcon2").attr('hidden', true);
      $(".svg_chart_body").addClass('chart-svg-display');
      $(".svg_icon_branch").removeClass('chart-svg-display');
      $(".svg_icon_chart").removeClass('chart-svg-display');
      
    }, 2500);
    setTimeout(() => {
      $("#showCard").removeAttr('hidden');
    }, 500);
  });
</script>
<script>
  // skeleton
  function pageTopBar() {
      const allSkeleton = document.querySelectorAll('.top-skeleton')

      allSkeleton.forEach(item => {
        item.classList.remove('top-skeleton')
      });
  }
  function imageSkeletone() {
      const allSkeleton = document.querySelectorAll('.image-skeletone')

      allSkeleton.forEach(item => {
        item.classList.remove('image-skeletone')
      });
  }
  function forbidenSkeletone() {
      const allSkeleton = document.querySelectorAll('.forbiden_skeletone')

      allSkeleton.forEach(item => {
        item.classList.remove('forbiden_skeletone')
      });
  }
  function codeSkeletone() {
      const allSkeleton = document.querySelectorAll('.code-skeletone')

      allSkeleton.forEach(item => {
        item.classList.remove('code-skeletone')
      });
  }
  function leftCapsule() {
      const allSkeleton = document.querySelectorAll('.text-capsule')

      allSkeleton.forEach(item => {
        item.classList.remove('text-capsule')
      });
  }
  function boldText(){
      const allSkeleton = document.querySelectorAll('.text-bold-skeletone')

      allSkeleton.forEach(item => {
        item.classList.remove('text-bold-skeletone')
      });
  }
  function btnCapsule() {
      const allSkeleton = document.querySelectorAll('.btn-capsule')

      allSkeleton.forEach(item => {
        item.classList.remove('btn-capsule')
      });
  }

  setTimeout(() => {
    pageTopBar();
    imageSkeletone();
    //forbidenSkeletone();
    codeSkeletone();
    leftCapsule();
    boldText();
    btnCapsule();
  }, 2000);
</script>
@endpush