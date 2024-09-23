@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body skeleton" id="table_card_body">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-12 ps-2">
          <div class="card-body focus-color user_details cd pb-3">
            <p class="users_heading skeleton mb-1">Users <span class="ms-1 skeleton">Update and Permission</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-12 action_message">
      <p class="ps-1"><span id="success_message"></span></p>
    </div>
  </div>
</div>

@endsection

@push('scripts')

@endpush