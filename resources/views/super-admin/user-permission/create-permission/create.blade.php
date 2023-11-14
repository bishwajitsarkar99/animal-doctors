@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card-body permission-card">
  <form class="gx-2" action="{{route('permission.store')}}" method="post">
    @csrf
    <div class="row">
      <div class="col-1"></div>
      <div class="col-xl-4">
        <div class="mt-2">
          <span class="">
            <a class="form-control-sm add_btn back_btn skeleton" href="{{route('permission.show')}}">
              <i class="back-icon fa fa-spinner fa-spin back-hidden"></i>
              <span class="btn-text">Back</span>
            </a>
          </span>
          <span class="permission_text skeleton ms-1">Permission List</span>
        </div>
        <div class="form-group custom-select skeleton">
          <select class="ms-5 ps-2" name="role_id" id="select_role">
            <option value="" id="option_value1">Select Role</option>
            @foreach(\App\Models\Role::all() as $role)
            <option value="{{$role->id}}" id="option_value2">{{$role->name}}</option>
            @endforeach
          </select>
          <span class="custom-role-arrow"></span>
        </div>
        <div class="mb-2 mt-2 skeleton">
          <input type="submit" class="form-control-sm subm_btn ms-5" value="Submit">
          <i class="submt-icon fa fa-spinner fa-spin submt-hidden"></i>
        </input>
        @error('role_id')
        <span class="text-danger" style="font-weight: 700;font-size:12px;font-style:italic;">
          {{$message}}
        </span>
        @enderror
        </div>
      </div>
      <div class="col-xl-6 mt-4">
        <table class="ord_table center border-1 mt-2 me-2 mb-3" id="myTable">
          <tr class="table-row order_body acc_setting_table skeleton">
            <th id="th_sort" class="table_th_color skeleton txt col ps-2" style="text-align:left;">Access</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">Add</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">Edit</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">View</th>
            <th id="th_sort" class="table_th_color tot_pending_ check_border skeleton col" style="text-align:center;">Delete</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">List</th>
          </tr>
          <tbody class="bg-transparent" id="permission_data_table">
            <tr class="btn-hover table_body">
              <td style="border-bottom: 1px solid lightblue;" class="skeleton ps-2">Role</td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[role][add]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[role][edit]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[role][view]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[role][delete]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[role][list]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
            </tr>
            <tr class="btn-hover table_body">
              <td class="skeleton ps-2">Permission</td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[permission][add]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[permission][edit]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[permission][view]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[permission][delete]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="name[permission][list]" value="1" class="skeleton mt-1" style="cursor: pointer;">
              </td>
            </tr>
            <tr class="btn-hover table_body">
              <td class="error_data" colspan="6" style="border-bottom: 1px solid lightblue;">
                @error('name')
                <span class="text-danger" style="font-weight: 700;font-size:12px;font-style:italic;">
                  {{$message}}
                </span>
                @enderror
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-1"></div>
    </div>
  </form>
</div>


@endsection

@section('css')
<!-- ================ permission-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/permission/permission.css">
@endsection
@section('script')
@include('super-admin.user-permission.permission-ajax.ajax')
@endsection