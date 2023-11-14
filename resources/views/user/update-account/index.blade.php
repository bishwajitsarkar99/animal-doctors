@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="set_table">

  <!-- <div class="card-body" id="table_card_body">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-12 ps-2">
          <div class="card-body focus-color order_details cd">
            <p class="users_heading mb-1">Doctors <span class="ms-3">Account</span></p>
            <div class="row">
              <div class="col-xl-8">
                <div class="form-group">
                  <input type="hidden" id="edit_doctors_id" name="edit_doctors_id" class="edit_doctors_id">
                </div>
                <div class="form-group">
                  <label class="label_user_edit" for="name">Name :</label>
                  <input id="edit_user_name" class="mt-3 ps-1 update_doctors edit_doctors_name name" type="text" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label class="label_user_edit" for="contract_number">Contract-Number :</label>
                  <input id="edit_doctors_contract" class="mt-3 ps-1 update_doctors_contract contract_number edit_doctors_contract_number" type="text" name="contract_number" placeholder="Enter contract number">
                </div>
                <div class="form-group mt-3">
                  <a href="#" type="button" class="btn btn-sm modal_button update_btn">Update</a>
                  <button type="button" class="btn btn-sm text-danger modal_button cancel_btn" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
              <div class="col-xl-4">
                <div class="form-group">
                  <div class="img-area">
                    <img class="register_img " id="output" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500">
                  </div>
                  <input accept="image/*" type='file' id="imgInput" class="image mt-2" name="image" onchange="loadFile(event)">
                </div>
              </div>
            </div>
            <div>
              <table class="ord_table center border-1 mt-2">
                <thead>
                  <tr class="doctors_sl order_body acc_setting_table">
                    <th class="table_th_color doctors_sl ps-1" style="border-left: 1px solid lightblue;">Action</th>
                    <th class="table_th_color doctors_sl ps-1">Image</th>
                    <th class="table_th_color doctors_sl ps-1">Name</th>
                    <th class="table_th_color doctors_sl ps-1" style="border-right: 1px solid lightblue;">Contract</th>
                  </tr>
                </thead>
                <tbody id="myUserTable">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row table-footer">
      <div class="alert-info brand_message ">

      </div>
    </div>
  </div>
  <p class="pt-3 ps-1"><span id="success_message"></span></p> -->
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('backend_asset') }}/main_asset/custom-css/paginate-css/doctors_users_table.css">
@endsection

@section('script')
@include('user.update-account.fetch-data-ajax._fetch-data-ajax')
@endsection