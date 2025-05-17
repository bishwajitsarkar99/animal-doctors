@if($user_log_data_authorize ==1 )
<!-- ==== User-Activities ======= -->
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
            </thead>
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
@elseif($user_log_data_authorize ==0)
<div class="card card-message form-control form-control-sm">
    <div class="card-body" id="table_card_body">
    <div class="row">
        <div class="col-xl-12">
        <div class="card-body focus-color cd branch_form">
            <div class="row">
                <div style="justify-content:center;align-items:center;display:flex;">
                    @auth
                        <h4 class="display-6 text-bold top-skeleton" style="color:#555;font-size: 1.5vw;font-weight: 700;font-family: 'Poppins', Sans-serif;">
                            <svg viewBox="0 0 24 24" width="30" height="30" stroke="orange" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            You are not able to access the {{$page_name}} page !
                        </h4>
                    @endauth
                </div>
                <div class="col-xl-5">
                    @auth
                        <span class="image-skeletone">
                            <img class="img-profile rounded-circle" id="userOutput" src="/storage/image/user-image/{{auth()->user()->image}}" alt="error-image"><br>
                        </span><br>
                        <span class="auth_user text-capsule" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;font-size:0.9rem">Name : {{ auth()->user()->name}}</span><br>
                        <span class="auth_user text-capsule" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;font-size:0.9rem">Email : {{ auth()->user()->login_email}}</span>
                    @else
                        <span class="image-skeletone">
                            <img class="img-profile rounded-circle" id="userOutput" src="/image/828.jpg" alt="user-image">
                        </span>
                    @endauth
                </div>
                <div class="col-xl-3 text-bold-skeletone" style="text-align:center;align-items:center;margin-top:15px;">
                    @auth
                        <img class="" style="width:200px;height:200px;" src="/image/403 Error Forbidden.gif" alt="error-image">
                    @endauth
                </div>
                <div class="col-xl-4" style="text-align:center;">
                    @auth
                        <h1 class="mt-4  display-1 fw-6 px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider error-code code-skeletone">403</h1>
                        <span class="text-bold-skeletone" style="color:#555;font-size: 3vw;font-family: 'Poppins', Sans-serif;">
                            <strong>Unauthorized</strong>  
                        </span>
                    @endauth
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endif
