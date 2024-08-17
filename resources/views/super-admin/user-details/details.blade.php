@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <ul class="nav nav-tabs tab_bg" role="tablist" style="background:aliceblue;">
      <li class="nav-item">
        <a class="nav-link setting active home-text" data-bs-toggle="tab" href="#home" id="tabHome"> User Analysis</a>
        <span class="tab-skeletone ms-1"></span>
      </li>
      <!-- <li class="nav-item">
        <input class="form-control from-control-sm" type="search" name="role_id" placeholder="Search-role-id" id="roleSearch">
        <span class="inp_ser_skeletone ms-1"></span>
      </li> -->
      <li class="nav-item">
        <a class="nav-link setting home-text" data-bs-toggle="tab" href="#userDetails" id="tabDetails">User Details</a>
        <span class="tab2-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <a class="nav-link setting" data-bs-toggle="tab" href="#userActivity" id="tabActivity">User Activity</a>
        <span class="tab4-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <a class="nav-link setting home-text" href="#" id="tabUserPermission"> User Permission</a>
        <span class="tab3-skeletone ms-1"></span>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-sm refresh-btn" id="refresh">
          <i class="refresh-icon fa fa-solid fa-asterisk fa-spin refrsh-hidden" style="color:white;opacity:1;"></i>
          <span class="btn-text ms-1">Refresh</span>
        </button>
        <span class="tab_btn_skeletone ms-1"></span>
      </li>
    </ul>
    <div class="tab-content" id="showCard" style="background:aliceblue;padding-bottom:15px;" hidden>
      <div id="home" class="container tab-pane active"><br>
        @include('super-admin.user-details.user-graph')
      </div>
      <div id="userDetails" class="container tab-pane"><br>
        <span>page1</span>
      </div>
      <div id="userActivity" class="container tab-pane"><br>
        <span>page2</span>
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
@endsection

@push('scripts')
@include('super-admin.user-details.ajax.user-details-ajax')
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
    $("#loaderShow").addClass('loader-show');
    
  }, 1800);
  setTimeout(() => {
    $("#showCard").removeAttr('hidden');
  }, 500);
</script>
@endpush

<!-- <div class="user-loaction">
    <div class="loaction-table">
        <table class="ord_table center border-1">
          <tr class="table-row order_body acc_setting_table">
            <th>S.N</th>
            <th>IP Address</th>
            <th>Country Name</th>
            <th>Country Code</th>
            <th>Region Name</th>
            <th>Region Code</th>
            <th>City Name</th>
            <th>Zip Code</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Area Code</th>
            <th>TimeZone</th>
          </tr>
            <tbody class="bg-transparent" id="userLocationTable">

            </tbody>
        </table>
    </div>
</div> -->