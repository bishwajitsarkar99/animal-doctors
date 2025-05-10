<!-- ==== User-Activities ======= -->
<div class="container table-container-card">
    <div class="row">
        <div class="col-xl-2">
            <input type="text" class="date form-control form-control-sm" name="start_date" placeholder="From : DD-MM-YYY" id="date_start" autocomplete="off">
        </div>
        <div class="col-xl-2">
            <input type="text" class="date form-control form-control-sm" name="end_date" placeholder="To : DD-MM-YYY" id="date_end" autocomplete="off">
        </div>
        <div class="col-xl-3">
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
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgb(170, 170, 170)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </span>
                <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="User Search" id="search" />
            </span>
        </div>
    </div>
    <div class="table-responsive">
        <table class="bg-white table-light ord_table center border-1 mt-2">
            <tr class="table-light table-row order_body acc_setting_table">
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-2 pe-1">
                    ID
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="name" data-order="desc" class="table_th_color txt ps-1" hidden>
                    Name
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="email" data-order="desc" class="table_th_color txt ps-1">
                    Email
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="ip_address" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: center;">
                    IP
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="user_agent" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;" hidden>
                    User Agent
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="payload" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;">
                    Payload
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="last_activity" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;" hidden>
                    Last_activity
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="login" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;">
                    Login
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="logout" data-order="desc" class="table_th_color tot_pending_ ps-1">
                    Logout
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
                <th id="th_sort" style="background-color: white;cursor: pointer;" data-coloumn="last_activity" data-order="desc" class="table_th_color tot_pending_ ps-1">
                    Activity
                    <svg width="12px" height="12px" fill="#333333a1" version="1.1" id="Layer_1" x="0px" y="0px" width="122.433px" height="122.88px" viewBox="0 0 122.433 122.88" enable-background="new 0 0 122.433 122.88" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>
                </th>
            </tr>
            <tbody class="bg-white table-light" id="user_activites_data_table">
    
            </tbody>
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