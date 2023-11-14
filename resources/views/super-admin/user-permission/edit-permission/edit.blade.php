@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<form action="{{route('permission.update',$permissions->id)}}" method="post">
  @csrf
  <div class="card permission-card">
    <div class="row">
      <div class="col-xl-6 mt-3">
        <a class="form-control-sm edit_back skeleton ms-3 mt-2" href="{{route('permission.show')}}">
          <i class="edit-back-icon fa fa-spinner fa-spin edit-back-hidden"></i>
          <span class="btn-text">Back</span>
        </a>
      </div>
      <div class="col-xl-6 mt-3">
        <span class="permission_text skeleton">Permission Update</span>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group custom-select skeleton">
            <select class="ps-2" name="role_id" id="select_role">
              <option value="">Select Role</option>
              @foreach(\App\Models\Role::all() as $role)
              <option value="{{$role->id}}" @if($role->id == $permissions->role_id) selected @endif >{{$role->name}}</option>
              @endforeach
            </select>
            <span class="custom-role-arrow me-5"></span>
          </div>
          <div class="mt-2 mb-2 skeleton">
            <input type="submit" class="update_btn pt-1" value="Update" id="update_role_btn">
            <i class="update-icon fa fa-spinner fa-spin update-hidden"></i>
            @error('role_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-6">
          <table class="ord_table center border-1" id="myTable">
            <tr class="table-row order_body acc_setting_table skeleton">
              <th id="th_sort" class="table_th_color skeleton txt col ps-1" style="text-align:left;">Access</th>
              <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">Add</th>
              <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">Edit</th>
              <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">View</th>
              <th id="th_sort" class="table_th_color tot_pending_ check_border skeleton col" style="text-align:center;">Delete</th>
              <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">List</th>
            </tr>
            <tbody class="bg-transparent" id="permission_data_table">
              <tr class="btn-hover table_body">
                <td class="skeleton ps-1" style="font-weight:700;border-bottom:1px solid lightblue;">Role</td>
                <td class="pt-1" style="text-align: center;border-bottom:1px solid lightblue;">
                  <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[role][add]" value="1" @isset($permissions['name']['role']['add']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;border-bottom:1px solid lightblue;">
                  <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[role][edit]" value="1" @isset($permissions['name']['role']['edit']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;border-bottom:1px solid lightblue;">
                  <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[role][view]" value="1" @isset($permissions['name']['role']['view']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;border-bottom:1px solid lightblue;">
                  <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[role][delete]" value="1" @isset($permissions['name']['role']['delete']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;border-bottom:1px solid lightblue;">
                  <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[role][list]" value="1" @isset($permissions['name']['role']['list']) checked @endisset>
                </td>
              </tr>
              <tr class="btn-hover table_body">
                <td class="skeleton ps-1" style="font-weight:700;">Permission</td>
                <td class="pt-1" style="text-align: center;">
                <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[permission][add]" value="1" @isset($permissions['name']['permission']['add']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;">
                <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[permission][edit]" value="1" @isset($permissions['name']['permission']['edit']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;">
                <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[permission][view]" value="1" @isset($permissions['name']['permission']['view']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;">
                <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[permission][delete]" value="1" @isset($permissions['name']['permission']['delete']) checked @endisset>
                </td>
                <td class="pt-1" style="text-align: center;">
                <input class="skeleton" style="cursor:pointer;" type="checkbox" name="name[permission][list]" value="1" @isset($permissions['name']['permission']['list']) checked @endisset>
                </td>
              </tr>
              <tr>
                @error('name')
                <span class="text-danger update_message">{{$message}}</span>
                @enderror
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>
@if(Session::has('success'))
<div class="messg_box mt-3">
  <p style="color:green;">
    <label id="update_message" class="role_success_message" for="message">{{ Session::get('success') }}</label>
  </p>
</div>
@endif
@endsection

@section('css')
<!-- ================ permission-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/permission/permission.css">
@endsection
@section('script')
@include('super-admin.user-permission.permission-ajax.ajax')
@endsection