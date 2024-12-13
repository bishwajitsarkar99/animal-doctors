@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body" id="table_card_body">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-9 ps-2">
              <div class="card-body focus-color auth-page-table-card cd pb-3">
                <p class="users_heading skeleton mb-1"><span class="ms-1 skeleton">Auth Page Permission List</span></p>
                <div class="table-responsive mt-2">
                  <table class="bg-transparent ord_table center border-1 mt-1 skeleton">
                    <thead>
                      <tr class="table-row order_body acc_setting_table skeleton">
                        <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1">ID</th>
                        <th id="th_sort" data-coloumn="image" data-order="desc" class="table_th_color txt skeleton ps-1">Auth Page</th>
                        <th id="th_sort" data-coloumn="name" data-order="desc" class="table_th_color tot_order_ skeleton ps-1">Local Host Auth Url</th>
                        <th id="th_sort" data-coloumn="email" data-order="desc" class="table_th_color tot_order_ skeleton ps-1">Domain Auth Url</th>
                        <th id="th_sort" class="table_th_color tot_pending_ ps-2  skeleton">Status</th>
                      </tr>
                    </thead>
                    <tbody class="bg-transparent skeleton tab" id="auth_page_data_table">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-body" id="form_card">
                <form>
                  @csrf
                  <input type="text" name="page_id" id="edit_page_id" hidden>
                  <div class="mb-2">
                    <select class="form-select form-select-sm select-dropdown" name="page_name" aria-label=".form-select-sm example" id="pageSelect">
                      <option value="" selected>Select Page Item</option>
                      @foreach($auth_lists as $item)
                        <option value="{{$item->id}}">{{$item->page_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-2">
                    <label class="form-label skeleton" for="domain">Domain</label>
                    <input class="form-control form-control-sm update_domain" type="text" name="domain_name" placeholder="Domain" id="input-field-one">
                  </div>
                  <div class="mb-2">
                    <label class="form-label skeleton" for="ip-address">IP Address</label>
                    <input class="form-control form-control-sm update_ip" type="text" name="ip_name" placeholder="IP address" id="input-field-two">
                  </div>
                  <div class="mb-2">
                    <label class="form-check-label form-label skeleton" for="permission">Page</label>
                    <div class="form-check form-switch ms-1">
                      <input class="form-check-input form-label update_status check-skeleton" type="checkbox" name="status" value="0" id="permissionCheck">
                      <label class="form-check-label form-label skeleton" style="color:gray;" for="check" id="statusValue">Permission</label>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="button-box mb-1 mt-1">
                      <button id="page_submit" type="submit" class="btn btn-sm submt_button button-skeleton">
                        <span class="auth-icon spinner-border spinner-border-sm text-white hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                        <span class="btn-text">Permission</span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 action_message">
      <p class="ps-1"><span id="success_message"></span></p>
    </div>
  </div>
</div>
@include('loader.action-loader')
@endsection

@section('css')
<!-- ================ auth-page-permission-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/auth-page-permission/auth-permission.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
@endsection

@push('scripts')
@include('super-admin.auth-page.ajax.auth-page-ajax')
<script type="module" src="/module/module-min-js/helper-function-min.js"></script>
<script>
  // Update Button Loader
  $(document).ready(() => {
    $("#page_submit").on('click', () => {
      $('.auth-icon').removeClass('hidden');
      $(this).attr('disabled', true);
      $('btn-text').text('Permission...');

      setTimeout(() => {
        $('.auth-icon').addClass('hidden');
        $(this).attr('disabled', false);
        $('btn-text').text('Permission');
      }, 3000);
    })
  });
</script>
<script>
  // User Edit Form(Modal)
  $(document).ready(() => {
    // User update input field
    $(".usersearch").on('keyup', () => {
      $('.uname-icon').removeClass('uname-hidden');
      $(this).attr('disabled', true);

      setTimeout(() => {
        $('.uname-icon').addClass('uname-hidden');
        $(this).attr('disabled', false);
      }, 3000);
    });
    // User update email input field
    $(".useremailsearch").on('keyup', () => {
      $('.uemail-icon').removeClass('uemail-hidden');
      $(this).attr('disabled', true);

      setTimeout(() => {
        $('.uemail-icon').addClass('uemail-hidden');
        $(this).attr('disabled', false);
      }, 3000);
    });
    // User update contract input field
    $(".usercontractsearch").on('keyup', () => {
      $('.ucontract-icon').removeClass('ucontract-hidden');
      $(this).attr('disabled', true);

      setTimeout(() => {
        $('.ucontract-icon').addClass('ucontract-hidden');
        $(this).attr('disabled', false);
      }, 3000);
    });
  });
</script>
<script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }
  // button skeleton
  function buttonSkeleton() {
    const allSkeleton = document.querySelectorAll('.button-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('button-skeleton')
    });
  }
  // checkbox skeleton
  function checkBoxSkeleton() {
    const allSkeleton = document.querySelectorAll('.check-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('check-skeleton')
    });
  }
  setTimeout(() => {
    fetchData();
    buttonSkeleton();
    checkBoxSkeleton();
  }, 1000);
</script>
@endpush