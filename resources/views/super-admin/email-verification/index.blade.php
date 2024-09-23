@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <ul class="nav nav-tabs tab_bg" role="tablist" style="background:aliceblue;">
      <li class="nav-item tab-skeletone">
        <a class="nav-link setting active home-text" data-bs-toggle="tab" href="#userActivity" id="tabActivity"> User Email Verification</a>
      </li>
      <li class="nav-item tab-skeletone">
        <button type="button" class="btn btn-sm refresh-btn ripple-surface " id="refresh">
          <span class="refresh-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
          <span class="btn-text ms-1">Refresh</span>
        </button>
      </li>
    </ul>
    <div class="tab-content" id="showCard" style="padding-bottom:15px;" hidden>
      <div id="userActivity" class="container tab-pane active"><br>
        @include('super-admin.email-verification._email-verification-home-page')
      </div>
    </div>
  </div>
  <div class="loader-position">
    <img class="server-loader loader-show" id="loaderShow" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...."/>
  </div>
  <div class="col-xl-12 action_message">
    <p class="ps-1"><span id="success_message"></span></p>
  </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/user-details/user-details.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/user-details/email-verification.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('super-admin.user-details.ajax.user-details-ajax')
@include('super-admin.email-verification.ajax.email_verification_ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
<script type="module">
  import { buttonLoader, removeSkeletonClass } from "{{asset('/module/module-min-js/design-helper-function-min.js')}}";
  // initialize
  buttonLoader();

  $(document).ready(function(){
    // Initialize the refresh button loader for the login button
    buttonLoader('#refresh', '.refresh-icon', '.btn-text', 'Refresh...', 'Refresh', 1000);
  });
</script>
<script>
  $(document).ready(function() {
    // Initialize Select2 for all elements with the 'select2' class
    //$('.select2').select2();
    $('.select2').each(function() {
      if ($(this).attr('id') === 'verification_select_role') {
        $(this).select2({
          placeholder: 'Select User Role.............................',
          allowClear: true
        });
      }
    });
    $('#verification_select_role').on('select2:open', function() {
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
  }, 1000);
  setTimeout(() => {
    $("#showCard").removeAttr('hidden');
  }, 50);
</script>
@endpush