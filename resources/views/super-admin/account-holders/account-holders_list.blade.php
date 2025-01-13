@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm mange_background">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-12 ps-2 page">
                <div class="card-body focus-color cd pt-2">
                    <div class="row">
                        <div class="heading">
                            <span class="history page-heading-skeleton">User History</span>
                        </div>
                        <form class="search_form" action="" style="float: right;">
                            <div class="row">
                                <div class="col-xl-8">
                                    <select type="email" class="form-control form-control-sm select2" name="search" id="email">
                                        <option value="">Select Email</option>
                                        @foreach($data as $user)
                                            <option value="{{ $user->email }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4">
                                    <button class="btn btn-success btn-btn-sm" id="btnFormSearch" disabled>
                                        <span class="search-btn"><i class="fas fa-search"></i></span>
                                    </button>
                                    <button type="submit" class="btn btn-success btn-btn-sm btn-refresh" id="btn_refresh">
                                        <i class="loading-icon fa-solid fa-rotate fa-spin" hidden></i>
                                        <span class="text-btn">Refresh</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="bg-transparent ord_table center border-1 skeleton mt-2">
                            <thead>
                                <tr class="table-row order_body acc_setting_table skeleton">
                                    <th class="table_th_color th-bg us_td sn border_ord setting_sn skeleton ps-1 pe-1">S.N</th>
                                    <th class="table_th_color th-bg us_td txt skeleton ps-1 pe-1" style="text-align: center;">ID</th>
                                    <th class="table_th_color th-bg us_td txt skeleton ps-1 pe-1" style="text-align: center;">Image</th>
                                    <th class="table_th_color th-bg us_td txt skeleton ps-1 pe-1">User Information</th>
                                    <th class="table_th_color th-bg us_td tot_pending_ skeleton" style="text-align: center;">Role</th>
                                    <th class="table_th_color th-bg us_td tot_pending_ skeleton" style="text-align: center;">Access Permission</th>
                                    <th class="table_th_color th-bg us_td tot_pending_ skeleton" style="text-align: center;">Authorization</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white skeleton" id="user_data_table">
                                @if(count($users)> 0)
                                    @foreach($users as $user)
                                    <tr class="table-row user-table-row histroy skeleton" style="font-weight: 600;">
                                        <td class="sn border_ord us_td skeleton">{{($i++)+1}}</td>
                                        <td class="sn border_ord us_td skeleton">{{$user->id}}</td>
                                        <td class="tot_order_ center us_td skeleton ">
                                            <img class="user_img mt-1 mb-1" src="/storage/image/user-image/{{$user->image}}">
                                        </td>
                                        <td class="txt_  us_td skeleton ps-1">
                                            <label for="name">Name : <span style="font-size:small;letter-spacing:0.5px;">{{$user->name}}</span></label><br>
                                            <label for="email">Email : 
                                                <span style="font-size:small;letter-spacing:0.5px;"><span style="color:gray"><i class="fa fa-envelope"></i></span> {{$user->email}}</span>
                                                <span style="font-size:small;letter-spacing:0.5px;">
                                                    @if ($user->email_verified_at != null)
                                                        <span class="badge text-white bg-success" style="letter-spacing: 1px;">Verified</span>
                                                        <span style="color:blue;font-size:11px;font-weight:700;">
                                                            <span style="color:blue;font-size:11px;font-weight:700;" id="verificationTime_{{ $user->id }}"></span> 
                                                            ago
                                                        </span>
                                                    @else
                                                        <span class="badge text-white bg-danger" style="letter-spacing: 1px;">Not Verified</span>
                                                        <span style="color:orangered;font-size:14px;font-weight:700;" id="verificationTime_{{ $user->id }}"> - </span>
                                                    @endif
                                                </span>
                                            </label><br>
                                            <label for="contact">Contract Number : <span style="font-size:small;letter-spacing:0.5px;">{{$user->contract_number}}</span><br></label><br>
                                            <label for="create">Account Created : <span style="font-size:small;letter-spacing:0.5px;">{{ date('d l M Y h:i:sA', strtotime($user->created_at)) }}</span><br></label><br>
                                            <label for="create">Email Verification : 
                                                @if ($user->email_verified_at == null)
                                                    <span class="badge text-danger" style="letter-spacing: 1px;">- - - - - - - - - - Null - - - - - - - - - - - </span>
                                                @else
                                                    <span style="font-size:small;letter-spacing:0.5px;">
                                                        {{ date('d l M Y h:i:sA', strtotime($user->email_verified_at)) }}
                                                    </span>
                                                @endif
                                            </label><br>
                                            <label for="update">Account Last Updated : 
                                                @if($user->remember_token == null)
                                                    <span class="badge text-danger" style="letter-spacing: 1px;">- - - - - - - Null - - - - - - - - - - - </span>
                                                @else
                                                    <span style="font-size:small;letter-spacing:0.5px;">{{ date('d l M Y h:i:sA', strtotime($user->updated_at)) }}</span><br>
                                                @endif
                                            </label>
                                        </td>
                                        <td class="sn border_ord us_td skeleton">
                                            @if ($user->roles == null)
                                            User
                                            @else
                                            {{ $user->roles->name }}
                                            @endif
                                        </td>
                                        <td class="tot_complete_ us_td skeleton" style="text-align:center">
                                            @if($user->status ==1)
                                            <span class="badge text-white bg-danger" style="letter-spacing: 1px;">No</span>
                                            @else
                                            <span class="badge text-white bg-success" style="letter-spacing: 1px;">Yes</span>
                                            @endif
                                        </td>
                                        <td class="tot_complete_ skeleton" style="text-align:center">
                                            @if($user->status ==1)
                                            <span class="badge text-white bg-danger" style="letter-spacing: 1px; font-weight:600;">Unauthorized</span>
                                            @else
                                            <span class="badge text-white bg-success" style="letter-spacing: 1px;">Authorized</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="error_data text-danger" style="text-align: center;" colspan="11">
                                            User Information Data Not Exists On Server!
                                        </td>
                                    </tr>
                                @endif
                                
                            </tbody>
                        </table>
                        <div class="pagination">
                            <span class="user_record page-heading-skeleton ps-2 pe-2">Current User : {{$users->count()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<!-- ================ manage-role-css ================= -->
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/manage-role-css/manage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@include('super-admin.account-holders.helper-function-support')
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="/module/module-min-js/design-helper-function-min.js"></script>
<script type="module">
    import { buttonLoader, removeSkeletonClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    // initialize the document
    $(document).ready(() =>{
        // Initialize the refresh button loader for the login button
        buttonLoader('#btn_refresh', '.loading-icon', '.text-btn', 'Refresh...', 'Refresh', 3000);
        // Array of skeleton class names
        const skeletonClasses = [
            'skeleton', // General skeleton
            'page-heading-skeleton'
        ];
        // Remove skeleton
        setTimeout(() => {
            removeSkeletonClass(skeletonClasses);
        }, 1000);
    });
</script>
<script>
    // select dropdown initialize
    $(document).ready(function(){
        //$('.select2').select2();
        $('.select2').select2({
            placeholder: 'Select Email',
            allowClear: true
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#email').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search emails...');
        });
        // when email dropdown selected then search button will be disabled or enabled
        $('#email').on('change', function() {
            var email = $(this).val();
            if (email !== '') {
                $("#btnFormSearch").attr('disabled', false);
            } else {
                $("#btnFormSearch").attr('disabled', true);
            }
        });
    });
</script>
@endsection