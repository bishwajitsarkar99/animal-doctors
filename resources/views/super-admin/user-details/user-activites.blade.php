<!-- ==== User-Activities ======= -->
<div class="container table-container-card">
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
            <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="Search.........." id="search" />
        </div>
    </div>
    <div class="table-responsive">
        <table class="bg-transparent ord_table center border-1 mt-2">
            <tr class="table-row order_body acc_setting_table">
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-2 pe-1"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> ID</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="role" data-order="desc" class="table_th_color txt ps-1"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Role</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="name" data-order="desc" class="table_th_color txt ps-1" hidden><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Name</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="email" data-order="desc" class="table_th_color txt ps-1"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Email</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="ip_address" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> IP-Address</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="user_agent" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;" hidden><i class="toggle-icon fa-solid fa-arrow-down-long"></i> User Agent</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="payload" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Payload</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="last_activity" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;" hidden><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Last_activity</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="login" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Login</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="logout" data-order="desc" class="table_th_color tot_pending_ ps-1"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Logout</th>
                <th id="th_sort" style="background-color: honeydew;cursor: pointer;" data-coloumn="last_activity" data-order="desc" class="table_th_color tot_pending_ ps-1"><i class="toggle-icon fa-solid fa-arrow-down-long"></i> Last-Activity</th>
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
            <div class="pagination  mt-1" id="activities_users_data_table_paginate" style="float: right;padding-top:3px;"> </div>
        </div>
    </div>
</div>