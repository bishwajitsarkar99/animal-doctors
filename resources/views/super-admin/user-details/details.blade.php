@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <x-buttons.list-tab tabMargin="tab-margin" tabBg="aliceblue">
      <x-buttons.list-nav-item tabSkeletone="tab-skeletone">
        <x-buttons.tab-selector label="User Analysis" tablParentClass="nav-link" tablChildClass="setting" tablClass="home-text" tablActiveClass="active" link="#home" tabId="tabHome" />
      </x-buttons.list-nav-item>

      <x-buttons.list-nav-item tabSkeletone="tab-skeletone">
        <x-buttons.tab-selector label="User Activity" tablParentClass="nav-link" tablChildClass="setting" btnDisabled="{{$user_activity_authorize != 1 ? 'disabled' : '' }}" link="#userActivity" tabId="tabActivity" />
      </x-buttons.list-nav-item>

      <x-buttons.list-nav-item tabSkeletone="tab-skeletone">
        <x-buttons.tab-selector label="User Activity Graph" tablParentClass="nav-link" tablChildClass="setting" tablClass="home-text" btnDisabled="{{$user_activity_graph_authorize != 1 ? 'disabled' : '' }}" link="#userDetails" tabId="tabDetails" />
      </x-buttons.list-nav-item>

      <x-buttons.list-nav-item tabSkeletone="tab-skeletone">
        <x-buttons.tab-refresh-button label="Refresh" buttonParentClass="refresh-btn" buttonChildClass="ripple-surface" buttonId="refresh" />
      </x-buttons.list-nav-item>
    </x-buttons.list-tab>

    <x-buttons.tab-content tabResponse="activity-tab-responsive" bg="white" tabPadding="15px" tabId="showCard">
      <x-buttons.tab-content-panel tabPanel="tab-pane" tabClass="active" conentId="home">
        @include('super-admin.user-details.user-graph')
      </x-buttons.tab-content-panel>

      <x-buttons.tab-content-panel tabPanel="tab-pane" tabClass="" conentId="userActivity">
        @include('super-admin.user-details.user-activites')
      </x-buttons.tab-content-panel>

      <x-buttons.tab-content-panel tabPanel="tab-pane" tabClass="" conentId="userDetails">
        @include('super-admin.user-details.activities-graph')
      </x-buttons.tab-content-panel>
    </x-buttons.tab-content>
  </div>
  <x-page-loader.loader loaderName="server-loader" loaderPosition="loader-position" />

  <!-- Download Modal -->
  <div class="modal fade" id="downloadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header modal-heading" id="logoutModal_header">
          <!-- Modal Header -->
          <span class="heading-text" id="head_info"></span>
          <button type="button" class="btn-close-modal" 
            data-bs-dismiss="modal" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body center-modal-content" id="SM_Modal_body">
          <div class="row mb-2">
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <a class="download-link-btn" href="#" id="exportPdf">
                    <svg width="30" height="30" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 421 511.605">
                      <path fill="#6DBF39" d="M95.705.014h199.094L421 136.548v317.555c0 31.54-25.961 57.502-57.502 57.502H95.705c-31.55 0-57.502-25.873-57.502-57.502V57.515C38.203 25.886 64.076.014 95.705.014z"/>
                      <path fill="#589B2E" d="M341.028 133.408h-.019L421 188.771v-52.066h-54.357c-9.458-.15-17.998-1.274-25.615-3.297z"/>
                      <path fill="#DFFACD" d="M294.8 0L421 136.533v.172h-54.357c-45.068-.718-69.33-23.397-71.843-61.384V0z"/>
                      <path fill="#4F8C29" fill-rule="nonzero" d="M0 431.901V253.404l.028-1.261c.668-16.446 14.333-29.706 30.936-29.706h7.238v50.589h342.975c12.862 0 23.373 10.51 23.373 23.371v135.504c0 12.83-10.543 23.373-23.373 23.373H23.373C10.541 455.274 0 444.75 0 431.901z"/>
                      <path fill="#4F8C29" fill-rule="nonzero" d="M143.448 240.364a8.496 8.496 0 01-8.496-8.497 8.496 8.496 0 018.496-8.497h163.176a8.496 8.496 0 018.496 8.497 8.496 8.496 0 01-8.496 8.497H143.448zm0-59.176a8.496 8.496 0 010-16.993h172.304a8.496 8.496 0 110 16.993H143.448z"/>
                      <path fill="#fff" fill-rule="nonzero" d="M11.329 276.171v154.728c0 7.793 6.38 14.178 14.179 14.178H380.175c7.799 0 14.178-6.379 14.178-14.178V297.405c0-7.798-6.388-14.178-14.178-14.178H37.892c-12.618-.096-19.586-1.638-26.563-7.056z"/>
                      <path fill="#1A1A1A" fill-rule="nonzero" d="M136.343 381.786h-17.035v19.785H93.103v-81.894h41.274c18.782 0 28.171 10.09 28.171 30.269 0 11.093-2.445 19.306-7.336 24.634-1.835 2.008-4.367 3.712-7.6 5.11-3.233 1.396-6.988 2.096-11.269 2.096zm-17.035-41.144v20.179h6.029c3.145 0 5.438-.327 6.878-.982 1.443-.656 2.162-2.163 2.162-4.522v-9.171c0-2.359-.719-3.866-2.162-4.521-1.44-.656-3.733-.983-6.878-.983h-6.029zm53.069 60.929v-81.894h36.689c14.762 0 24.895 3.145 30.399 9.435 5.502 6.289 8.255 16.794 8.255 31.512 0 14.72-2.753 25.223-8.255 31.513-5.504 6.289-15.637 9.434-30.399 9.434h-36.689zm37.083-60.929h-10.878v39.964h10.878c3.581 0 6.178-.415 7.794-1.244 1.616-.83 2.426-2.731 2.426-5.7v-26.075c0-2.969-.81-4.87-2.426-5.699-1.616-.831-4.213-1.246-7.794-1.246zm97.879 30.53h-22.277v30.399h-26.206v-81.894h53.724l-3.276 20.965h-24.242v11.008h22.277v19.522z"/>
                    </svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <a class="download-link-btn" href="#">
                    <svg width="30" height="30" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
                      <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                        <path d="M 80.959 78.79 H 19.13 c -1.588 0 -2.876 -1.288 -2.876 -2.876 V 14.085 c 0 -1.588 1.288 -2.876 2.876 -2.876 h 61.829 c 1.588 0 2.876 1.288 2.876 2.876 v 61.829 C 83.835 77.503 82.547 78.79 80.959 78.79 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                        <path d="M 80.959 80.79 H 19.13 c -2.688 0 -4.876 -2.187 -4.876 -4.875 v -61.83 c 0 -2.688 2.188 -4.876 4.876 -4.876 h 61.829 c 2.688 0 4.876 2.188 4.876 4.876 v 61.83 C 85.835 78.604 83.647 80.79 80.959 80.79 z M 19.13 13.209 c -0.483 0 -0.876 0.393 -0.876 0.876 v 61.83 c 0 0.482 0.393 0.875 0.876 0.875 h 61.829 c 0.483 0 0.876 -0.393 0.876 -0.875 v -61.83 c 0 -0.483 -0.393 -0.876 -0.876 -0.876 H 19.13 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                        <rect x="61.05" y="20.47" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="61.05" y="31.74" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="61.05" y="43" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="61.05" y="54.26" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="61.05" y="65.53" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="39.76" y="20.47" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="39.76" y="31.74" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="39.76" y="43" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="39.76" y="54.26" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <rect x="39.76" y="65.53" rx="0" ry="0" width="15.93" height="4" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                        <polygon points="51.33,90 6.17,78.79 6.17,11.21 51.33,0 " style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(25,117,76); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                        <polygon points="38.15,28.21 31.01,28.62 26.67,37.72 22.56,29.1 15.8,29.48 23.2,45 15.8,60.52 22.56,60.9 26.67,52.28 31.01,61.38 38.15,61.79 30.14,45 " style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                      </g>
                    </svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <a class="download-link-btn" href="#">
                    <svg width="30" height="30" viewBox="0 0 64 64">
                      <!-- File Background -->
                      <rect x="8" y="4" width="48" height="56" rx="6" ry="6" fill="#f4f4f4" stroke="#ccc" stroke-width="1.5"/>
                      <!-- Folded corner -->
                      <polygon points="48,4 56,12 48,12" fill="#ccc"/>
                      <!-- Label Background -->
                      <rect x="16" y="32" width="32" height="24" rx="3" ry="3" fill="#fff"/>
                      <!-- CSV Text -->
                      <text x="32" y="51" font-size="15" font-family="Segoe UI, sans-serif" font-weight="bold" fill="#1d6f42" text-anchor="middle">CSV</text>
                      <!-- File lines for table look -->
                      <line x1="16" y1="20" x2="48" y2="20" stroke="#bbb" stroke-width="1"/>
                      <line x1="16" y1="26" x2="48" y2="26" stroke="#bbb" stroke-width="1"/>
                      <line x1="16" y1="32" x2="48" y2="32" stroke="#bbb" stroke-width="1"/>
                      <line x1="16" y1="38" x2="48" y2="38" stroke="#bbb" stroke-width="1"/>
                    </svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="download-tab">
                <span class="download-group-btn">
                  <a class="download-link-btn" href="#">
                    <svg width="30" height="30" viewBox="0 0 64 64">
                      <!-- Printer body -->
                      <rect x="12" y="20" width="40" height="26" rx="4" ry="4" fill="#555"/>
                      
                      <!-- Paper output -->
                      <rect x="18" y="34" width="28" height="18" rx="2" ry="2" fill="#fff" stroke="#ccc" stroke-width="2"/>
                      
                      <!-- Paper lines -->
                      <line x1="22" y1="40" x2="42" y2="40" stroke="#aaa" stroke-width="2"/>
                      <line x1="22" y1="45" x2="42" y2="45" stroke="#aaa" stroke-width="2"/>
                      
                      <!-- Top panel -->
                      <rect x="16" y="10" width="32" height="14" rx="2" ry="2" fill="#777"/>
                      
                      <!-- Status light -->
                      <circle cx="46" cy="28" r="3" fill="#38b2ac"/>
                    </svg>
                  </a>
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
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/user-details/user-details.css">
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