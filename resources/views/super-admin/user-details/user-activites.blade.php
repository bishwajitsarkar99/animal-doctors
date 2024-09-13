<!-- ==== User-Activities ======= -->
<div class="container">
    <div class="row">
        <div class="col-xl-3">
            <input type="text" class="date form-control form-control-sm" name="start_date" placeholder="Start Date : DD-MM-YYY" id="date_start" autocomplete="off">
        </div>
        <div class="col-xl-3">
            <input type="text" class="date form-control form-control-sm" name="end_date" placeholder="End Date : DD-MM-YYY" id="date_end" autocomplete="off">
        </div>
        <div class="col-xl-3">
            <select type="text" class="form-control form-control-sm select2" name="role" id="select_role">
                <option value="">Select Role</option>
                @foreach($roles as $item)
                    <option value="{{$item->id}}">{{ $item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-3">
            <select type="text" class="form-control form-control-sm select2" name="email" id="select_email">
                <option value="">Select Email</option>
                @foreach($emails as $item)
                    <option value="{{$item->id}}">{{ $item->email}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="bg-transparent ord_table center border-1 mt-2">
            <tr class="table-row order_body acc_setting_table">
                <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-2 pe-1">ID</th>
                <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">Role</th>
                <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1" hidden>Name</th>
                <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">Email</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">IP-Address</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;" hidden>User Agent</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">User-Mode</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;" hidden>Last_activity</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Login</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Logout</th>
                <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Last-Activity</th>
            </tr>
            <tbody class="bg-transparent " id="user_activites_data_table">
    
            </tbody>
        </table>
    </div>
    <div class="row table_last_row mb-1">
        <div class="col-3">
            <label class="item_class">Peritem</label>
            <div class="custom-select ">
                <select class="ps-1" id="perItemControl" style="background: linear-gradient(to bottom, #3b71ca, transparent 3%, #3b71ca, #3b71ca);border:1px solid darkblue;">
                    <option class="" selected>10</option>
                    <option class="">20</option>
                    <option class="">50</option>
                    <option class="">100</option>
                    <option class="">200</option>
                </select>
                <span class="custom-list-item-arrow-mini me-2"></span>
            </div>
        </div>
        <div class="col-9">
            <div class="pagination  mt-1" id="activities_users_data_table_paginate" style="float: right;padding-top:3px;">

            </div>
        </div>
    </div>
</div>