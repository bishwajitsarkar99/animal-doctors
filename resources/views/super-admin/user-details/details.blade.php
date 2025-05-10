@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <ul class="nav nav-tabs tab_bg" role="tablist" style="background-image:linear-gradient(to bottom, rgba(230, 230, 230, 0.05) 0%, transparent 50%, rgba(0, 0, 0, 0.05) 100%);border-top: 1px solid #dee2e6;">
      <li class="nav-item tab-skeletone">
        <a class="nav-link setting active home-text" data-bs-toggle="tab" href="#home" id="tabHome"> User Analysis</a>
      </li>
      <li class="nav-item tab-skeletone">
        <a class="nav-link setting" data-bs-toggle="tab" href="#userActivity" id="tabActivity">User Activity</a>
      </li>
      <li class="nav-item tab-skeletone">
        <a class="nav-link setting home-text" data-bs-toggle="tab" href="#userDetails" id="tabDetails">User Activity Graph</a>
      </li>
      <li class="nav-item tab-skeletone">
        <button type="button" class="btn btn-sm refresh-btn ripple-surface " id="refresh">
          <span class="refresh-icon spinner-border spinner-border-sm text-white refrsh-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
          <span class="btn-text ms-1">Refresh</span>
        </button>
      </li>
    </ul>
    <div class="tab-content" id="showCard" style="background:white;padding-bottom:15px;" hidden>
      <div id="home" class="container tab-pane active"><br>
        @include('super-admin.user-details.user-graph')
      </div>
      <div id="userActivity" class="container tab-pane" hidden><br>
      @include('super-admin.user-details.user-activites')
    </div>
    <div id="userDetails" class="container tab-pane" hidden><br>
      @include('super-admin.user-details.activities-graph')
    </div>
    <div id="userPermission" class="container tab-pane"><br>

    </div>
    </div>
  </div>
  <div class="loader-position">
    <img class="server-loader loader-show" id="loaderShow" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...."/>
  </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/user-details/user-details.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
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
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#date_end').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#chartStartDate').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#chartEndDate').datepicker({
      dateFormat: "dd-mm-yy",
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
  requestAnimationFrame(()=> {
    setTimeout(() => {
      removeSkeletons('.head-skeletone');
      removeSkeletons('.body-skeletone');
      removeSkeletons('.cricale-number-skeleton');
      removeSkeletons('.loader_skeleton');
      removeSkeletons('.percentage-skeletone');
      removeSkeletons('.result-skeletone');
      removeSkeletons('.total-number-skeletone');
      removeSkeletons('.tab-skeletone');
      $("#loaderShow").addClass('loader-show');
      
    }, 1800);
    setTimeout(() => {
      $("#showCard").removeAttr('hidden');
    }, 500);
  });
</script>
@endpush