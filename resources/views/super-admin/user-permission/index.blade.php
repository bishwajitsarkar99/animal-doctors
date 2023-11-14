@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="row">
    <div class="col-xl-5">

    </div>
    <div class="col-xl-7">
        <div class="card card-body permission-card">
            <span class="skeleton">
                <a type="button" class="form-control-sm btn-sm add_btn" href="{{route('permission.create')}}">
                    <i class="add-icon fa fa-spinner fa-spin add-hidden"></i>
                    <span class="btn-text">Add Permission</span>
                </a>
            </span>
            <table class="ord_table center border-1 skeleton mt-2" id="myTable">
                <tr class="table-row order_body acc_setting_table skeleton">
                    <th id="th_sort" class="table_th_color skeleton txt col ps-1" style="text-align: left;">S.N</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Role-Name</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Action</th>
                </tr>
                <tbody class="bg-transparent" id="permission_data_table">
                    @php($i=1)
                    @foreach($permissions as $permission)
                    <tr class="btn-hover table_body">
                        <td class="ps-1 skeleton table_body">{{$i++}}</td>
                        <td class="ps-1 skeleton table_body2">{{$permission->role->name}}</td>
                        <td class="ps-1 skeleton table_body3">
                            <a class="skeleton" href="{{route('permission.edit',$permission->id)}}">
                                <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                            </a>
                            <a class="skeleton ms-3" id="deleteBtn" href="{{route('permission.delete',$permission->id)}}">
                                <i class="fa-solid fa-trash-can" style="color: orangered;"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if(Session::has('success'))
<div class="messg_box mt-3">
    <p class="">
        <span id="role_update_message" class="update_message fadeout">{{ Session::get('success') }}</span>
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