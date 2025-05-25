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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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