<div class="row" id="recordSide" hidden>
    <div class="row mid-topbar mt-2">
        <div class="col-xl-2 mt-1">
            <label class="label_margin" for="total_permission" style="font-weight:700;color:black;">Month : 
                <span class="badge rounded-pill bg-white total_users current-month capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight: 800;color:rgb(13, 110, 253);opacity:1;font-size:12px;" id="permission_month"></span>
            </label>
        </div>
        <div class="col-xl-2 mt-1">
            <label class="label_margin" for="total_permission" style="font-weight:700;color:black;">Total Permission : 
                <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:rgb(13, 110, 253);opacity:1;font-size:12px;">
                    <span  data-val=""  id="total_permission_records"></span>
                    <span>.00</span>
                </span>
            </label>
        </div>
        <div class="col-xl-2 mt-1">
            <label class="label_margin" for="total_permission" style="font-weight:700;color:black;padding-top:1px;" id="justifyAmount">Justify : 
                <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;font-size:12px;color:darkcyan;">
                    <span data-val="" id="total_justify_permission_records"></span>
                    <span>.00</span>
                </span>
            </label>
        </div>
        <div class="col-xl-2 mt-1">
            <label class="label_margin" for="total_permission" style="font-weight:700;color:black;" id="denyAmount">Deny : 
                <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:rgb(209 157 0);opacity:1;font-size:12px;">
                    <span data-val="" id="total_deny_permission_records"></span>
                    <span>.00</span>
                </span>
            </label>
        </div>
        <div class="col-xl-2 mt-1">
            <label class="label_margin" for="total_permission" style="font-weight:700;color:black;" id="pendingAmount">Pending : 
                <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:gray;opacity:1;font-size:12px;">
                    <span data-val="" id="total_pending_permission_records"></span>
                    <span>.00</span>
                </span>
            </label>
        </div>
        <div class="col-xl-2">
            <div class="form-group custom-select skeleton ms-2 mt-1 mb-1">
                <input class="input_permission_inventory_id ps-2" type="search" name="inv_permission_id" id="input_permission_inventory_id" placeholder="search......" style="color:black;font-weight:600;"/>
            </div>
        </div>
    </div>
    
    <div class="row mt-2 pb-1">
        <div class="col-xl-4">
            <span id="strDate" hidden>
                <label style="font-size:12px;font-weight:700" for="start_date">Start-Date :</label>
                <input class="date_field ps-1" name="start_date" type="text" placeholder="DD-MM-YYYY" id="start_get_date">
            </span>
        </div>
        <div class="col-xl-4">
            <span id="enDate" hidden>
                <label style="font-size:12px;font-weight:700" for="end_date">End-Date :</label>
                <input class="date_field ps-1" name="end_date" type="text" placeholder="DD-MM-YYYY" id="end_get_date">
            </span>
        </div>
        <div class="col-xl-2">
            <div class="form-group custom-select skeleton">
                <select class="filter_select_role select-box-animation ps-2 filter_select_role" name="role_id" id="filter_select_role">
                    <option class="" value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" id="option_value2" style="color:black;font-weight:600;">{{$role->name}}</option>
                    @endforeach
                </select>
                <span class="custom-role-arrow3"></span>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group custom-select skeleton">
                <select class="select_permission_status ps-2" name="permission_status" id="select_permission_status">
                    <option value="" id="option_value_select" style="color:darkgreen;font-weight:600;">Select Status</option>
                    <option value="" id="option_value3" style="color:black;font-weight:600;" hidden>Pending</option>
                    <option value="" id="option_value4" style="color:black;font-weight:600;" hidden>Justify</option>
                    <option value="" id="option_value6" style="color:black;font-weight:600;" hidden>Deny</option>
                </select>
                <span class="custom-role-arrow4"></span>
            </div>
        </div>
    </div>
    <div>
        <table class="bg-transparent ord_table outline center border-1 skeleton mt-2">
            <tr class="table-row order_body acc_setting_table table-head">
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1">ID</th>
                <th id="th_sort" class="table_th_color tot_pending_ col skeleton ps-1">Act</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Permission-Date</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Inventory-ID</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">User</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Role</th>
                <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Email</th>
                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Access</th>
                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Permission</th>
                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Approved By</th>
                <th id="th_sort" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Permission Issue</th>

            </tr>
            <tbody class="bg-transparent skeleton inventory_permission_data_table src-data-table" id="inventory_permission_data_table">
                
            </tbody>
        </table>
        <div class="loader-position">
            <img class="server-loader error-hidden loader-show" id="loaderShow" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...." />
        </div>
    </div>
    <div class="row table_last_row mb-1">
        <div class="skeleton col-xl-1">
            <label class="item_class skeleton">Peritem</label>
            <div class="custom-select skeleton">
                <select class="ps-1 skeleton" id="perItemControls">
                    <option class="skeleton" style="color:black;" selected>10</option>
                    <option class="skeleton" style="color:black;">20</option>
                    <option class="skeleton" style="color:black;">50</option>
                    <option class="skeleton" style="color:black;">100</option>
                    <option class="skeleton" style="color:black;">200</option>
                </select>
                <span class="custom-list-items-arrow-two me-2"></span>
            </div>
        </div>
        <div class="col-xl-2">
            <span class="tot_summ skeleton" id="num_plate">
                <label class="tot-search skeleton mt-3" for="tot_cagt"> Total Entry :</label>
                <label class="badge rounded-pill bg-primary" for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;">
                    <span class="total_users skeleton" style="font-weight: 700;color:white;" id="total_inventory_permission_records"></span>
                    <span id="iteam_label5" style="font-weight: 600;color:white;"><span>.00</span></span>
                </label>
            </span>
        </div>
        <div class="col-xl-9">
            <div class="pagination skeleton pb-1" id="inventory_permission_data_table_paginate">

            </div>
        </div>
    </div>
</div>