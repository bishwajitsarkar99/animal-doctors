@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <ul class="nav nav-tabs tab_bg" role="tablist" style="background:aliceblue;">
      <li class="nav-item tab-skeletone">
        <a class="nav-link setting active home-text" data-bs-toggle="tab" href="#userActivity" id="tabActivity"> User Email Verification</a>
      </li>
      <li class="nav-item">
        <!-- <input class="form-control from-control-sm" type="search" name="role_id" placeholder="Search-role-id" id="roleSearch">
        <span class="inp_ser_skeletone ms-1"></span> -->
        <select type="text" class="form-control form-control-sm select2" name="role_id" id="select_role">
          <option value="">Select Role</option>
          @foreach($roles as $role)
              <option value="{{ $role->id }}">{{ $role->name }}</option>
          @endforeach
        </select>
        <span class="inp_ser_skeletone ms-1"></span>
      </li>
      <li class="nav-item tab-skeletone">
        <button type="button" class="btn btn-sm refresh-btn ripple-surface " id="refresh">
          <i class="refresh-icon fa fa-solid fa-asterisk fa-spin refrsh-hidden" style="color:white;opacity:1;"></i>
          <span class="btn-text ms-1">Refresh</span>
        </button>
      </li>
    </ul>
    <div class="tab-content" id="showCard" style="background:aliceblue;padding-bottom:15px;" hidden>
      <div id="userActivity" class="container tab-pane active"><br>
        @include('super-admin.email-verification._email-verification-home-page')
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
@endsection

@push('scripts')
@include('super-admin.user-details.ajax.user-details-ajax')
@include('super-admin.email-verification.ajax.email_verification_ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    // Initialize Select2 for all elements with the 'select2' class
    //$('.select2').select2();
    $('.select2').each(function() {
      // Check the ID or name to set specific options
      if ($(this).attr('id') === 'select_role') {
        $(this).select2({
          placeholder: 'Select Role',
          allowClear: true
        });
      } 
      // else if ($(this).attr('id') === 'select_role') {
      //   $(this).select2({
      //     placeholder: 'Select Role',
      //     allowClear: true
      //   });
      // }
    });
    // Set custom placeholder for the search input inside Select2 dropdowns
    // $('#select_user').on('select2:open', function() {
    //   $('.select2-search__field').attr('placeholder', 'Search emails...');
    // });

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

  // Usage
  // $("#tabHome").attr('hidden', true);
  // $("#refresh").attr('hidden', true);
  // $("#roleSearch").attr('hidden', true);
  // $("#item_class").attr('hidden', true);
  // $("#perItemControls").attr('hidden', true);
  // $("#tabSetting").attr('hidden', true);
  // $("#tabCreateSupplier").attr('hidden', true);
  // $("#moduSetting").attr('hidden', true);
  // $("#tabOne").addClass('tab-skeletone');
  $("#showCard").attr('hidden', true);
  $("#loaderShow").removeClass('loader-show');
  setTimeout(() => {
    // removeSkeletons('.skeleton');
    // removeSkeletons('.tab-skeletone');
    // removeSkeletons('.tab_btn_skeletone');
    // removeSkeletons('.long-skeleton');
    // removeSkeletons('.capsule-skeleton');
    // removeSkeletons('.inp_ser_skeletone');
    // removeSkeletons('.peritem-skeleton');
    // removeSkeletons('.tab2-skeletone');
    // removeSkeletons('.tab3-skeletone');
    // removeSkeletons('.tab4-skeletone');
    // $("#tabHome").removeAttr('hidden');
    // $("#refresh").removeAttr('hidden');
    // $("#roleSearch").removeAttr('hidden');
    // $("#item_class").removeAttr('hidden');
    // $("#perItemControls").removeAttr('hidden');
    // $("#tabSetting").removeAttr('hidden');
    // $("#tabCreateSupplier").removeAttr('hidden');
    // $("#moduSetting").removeAttr('hidden');
    
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
</script>
@endpush