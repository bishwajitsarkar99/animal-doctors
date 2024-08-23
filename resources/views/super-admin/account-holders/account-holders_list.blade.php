@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm mange_background">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-12 ps-2 page">
                <div class="card-body focus-color cd pt-2">
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="heading">
                                <span class="history page-heading-skeleton">User History</span>
                            </div>
                        </div>
                        <div class="col-xl-10">
                            <form class="search_form" action="" style="float: right;">
                                <span>
                                    <span><i class="search-loader fa fa-spinner fa-spin search-hidden"></i></span>
                                    <input class="form-control-sm search user-search" id="searchInput" name="search" type="search" list="datalistOptions" id="exampleDataList" placeholder="Search User Eamil">
                                    <button class="btn btn-success btn-btn-sm" id="btnFormSearch">
                                        <span class="search-btn"><i class="fas fa-search"></i></span>
                                    </button>
                                </span>
                                <datalist id="datalistOptions">
                                    @foreach($data as $user)
                                        <option value="{{$user->email}}">
                                    @endforeach
                                </datalist>
                                <button type="submit" class="btn btn-success btn-btn-sm btn-refresh" id="btn_refresh">
                                    <i class="loading-icon fa-solid fa-rotate fa-spin hidden"></i>
                                    <span class="text-btn">Refresh</span>
                                </button>
                            </form>
                        </div>
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
                                    <th class="table_th_color th-bg tot_pending_ skeleton" style="text-align: center;">Authorization</th>
                                </tr>
                            </thead>
                            <tbody class="bg-transparent skeleton" id="user_data_table">
                                @if(count($users)> 0)
                                    @foreach($users as $user)
                                    <tr class="table-row user-table-row histroy skeleton" style="font-weight: 600;">
                                        <td class="sn border_ord us_td skeleton">{{($i++)+1}}</td>
                                        <td class="sn border_ord us_td skeleton">{{$user->id}}</td>
                                        <td class="tot_order_ center us_td skeleton ">
                                            <img class="user_img mt-1 mb-1" src="/image/{{$user->image}}">
                                        </td>
                                        <td class="txt_  us_td skeleton ps-1">
                                            <label for="name">Name : <span style="font-size:small;letter-spacing:0.5px;">{{$user->name}}</span></label><br>
                                            <label for="email">Email : <span style="font-size:small;letter-spacing:0.5px;">{{$user->email}}</span><br></label><br>
                                            <label for="contact">Contract Number : <span style="font-size:small;letter-spacing:0.5px;">{{$user->contract_number}}</span><br></label><br>
                                            <label for="create">Account Created : <span style="font-size:small;letter-spacing:0.5px;">{{ date('d l M Y h:i:sA', strtotime($user->created_at)) }}</span><br></label><br>
                                            <label for="update">Account Last Updated : <span style="font-size:small;letter-spacing:0.5px;">{{ date('d l M Y h:i:sA', strtotime($user->updated_at)) }}</span><br></label>
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
                                            <span class="badge text-white" style="background-color: darkgreen; letter-spacing: 1px;">Yes</span>
                                            @endif
                                        </td>
                                        <td class="tot_complete_ skeleton" style="text-align:center">
                                            @if($user->status ==1)
                                            <span class="badge text-white" style="letter-spacing: 1px; font-weight:600;background-color: purple;">Unauthorized</span>
                                            @else
                                            <span class="badge text-white bg-primary" style="letter-spacing: 1px;">Authorized</span>
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
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/manage-role-css/manage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
@endsection
@section('script')
<script>
    //Filter
    $(function() {
        $(document).ready(()=> {
            $("#input1").on("keyup", ()=> {
                var value = $(this).val().toLowerCase();
                $("#user_data_table tr").filter(()=> {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    });
    //refresh loader
    $(document).ready(() =>{
        $("#btnRefresh").on('click', ()=>{
            $('.loading-icon').removeClass('hidden');
            $(this).attr('disabled', true);
            $('text-btn').text('Refresh...');

            setTimeout(() => {
                $('.loading-icon').addClass('hidden');
                $(this).attr('disabled', false);
                $('text-btn').text('Refresh');
            }, 3000);
        });
    });
    // search-loader
    $(document).ready(() =>{
        $("#btnFormSearch").on('click', ()=>{
            $('.search-loader').removeClass('search-hidden');
            $(this).attr('disabled', true);

            setTimeout(() => {
                $('.search-loader').addClass('search-hidden');
                $(this).attr('disabled', false);
            }, 3000);
        });
    });
</script>
<script>
  // skeleton
  function pageSkeleton() {
    const allSkeleton = document.querySelectorAll('.page-heading-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('page-heading-skeleton')
    });
  }
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }
  setTimeout(() => {
    fetchData();
    pageSkeleton();
  }, 1000);
</script>
@endsection