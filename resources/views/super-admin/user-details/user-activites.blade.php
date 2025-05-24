@if($user_activity_authorize == 1)
<!-- ==== User-Activities ======= -->
@if($user_log_data_table_permission == 1)
<div class="container table-container-card">
    <div class="row">
        <div class="col-xl-2">
            <span class="input-search-box">
                <span class="icon-box">
                    <svg viewBox="0 0 24 24" width="18" height="20" stroke="white" stroke-width="2" fill="rgb(170, 170, 170)" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </span>
                <input type="text" class="date form-control form-control-sm" name="start_date" placeholder="From:DD-MM-YYYY" id="date_start" autocomplete="off">
            </span>
        </div>
        <div class="col-xl-2">
            <span class="input-search-box">
                <span class="icon-box">
                    <svg viewBox="0 0 24 24" width="18" height="20" stroke="white" stroke-width="2" fill="rgb(170, 170, 170)" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </span>
                <input type="text" class="date form-control form-control-sm" name="end_date" placeholder="To:DD-MM-YYYY" id="date_end" autocomplete="off">
            </span>
        </div>
        <div class="col-xl-3" style="justify-content:start;display:flex;padding-top:2px;">
            <span class="filter-box">
                <svg viewBox="0 0 24 24" width="24" height="18" stroke="rgb(170, 170, 170)" stroke-width="2" fill="white" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
            </span>
            <select type="text" class="form-control form-control-sm select2" name="role" id="select_role">
                <option value="">Select Role</option>
                @foreach($roles as $item)
                <option value="{{$item->id}}">{{ $item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-5">
            <span class="input-search-box">
                <span class="icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="rgb(170, 170, 170)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </span>
                <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="User Search" id="search" />
            </span>
        </div>
    </div>
    <div class="table-light activity-table-responsive">
        <table class="bg-white table-light ord_table center border-1 mt-2">
            <thead>
                <tr class="table-light table-row order_body acc_setting_table">
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-2 pe-1 label-svg">
                        <span class="label-svg">
                            ID
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="name" data-order="desc" class="table_th_color txt ps-1 label-svg" hidden>
                        <span class="label-svg">
                            Name
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="email" data-order="desc" class="table_th_color txt ps-1 label-svg">
                        <span class="label-svg">
                            Email
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="ip_address" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg" style="text-align: center;">
                        <span class="label-svg">
                            IP
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="user_agent" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg" style="text-align: left;" hidden>
                        <span class="label-svg">
                            User Agent
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="payload" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg" style="text-align: left;">
                        <span class="label-svg">
                            Payload
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="last_activity" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg" style="text-align: left;" hidden>
                        Last_activity
                        <span class="label-svg">
                            Last_activity
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="login" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg" style="text-align: left;">
                        <span class="label-svg">
                            Login
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="logout" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg">
                        <span class="label-svg">
                            Logout
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                    <th id="th_sort" style="background-color: white;cursor: pointer;padding: 2px;" data-coloumn="last_activity" data-order="desc" class="table_th_color tot_pending_ ps-1 label-svg">
                        <span class="label-svg">
                            Activity
                            <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white table-light" id="user_activites_data_table"> </tbody>
        </table>
    </div>
    <div class="row table_last_row mb-1">
        <div class="col-1">
            <label class="item_class">Peritem</label>
            <div class="custom-select ">
                <select class="ps-1" id="perItemControl" style="background: linear-gradient(5deg, gray, transparent 3%, lightgray, silver);border:1px solid lightgray;">
                    <option class="" selected>10</option>
                    <option class="">20</option>
                    <option class="">50</option>
                    <option class="">100</option>
                    <option class="">200</option>
                </select>
                <span class="custom-list-item-arrow-mini me-2"></span>
            </div>
        </div>
        <div class="col-3">
            <label class="per_item_class">
                Entries <span id="total_per_items"></span>
                show <span id="per_items_num"></span>
                out of
                <span id="total_items"></span>
            </label>
        </div>
        <div class="col-8">
            <div class="pagination  mt-1" id="activities_users_data_table_paginate" style="float: right;padding-top:1px;"> </div>
        </div>
    </div>
</div>
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif
@elseif($user_activity_authorize == 0)
@include('super-admin.user-details.error.unauthorize')
@endif
