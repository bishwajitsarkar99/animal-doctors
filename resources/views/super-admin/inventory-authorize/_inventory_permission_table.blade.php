<div class="row">
    <div class="row">
        <div class="col-xl-3 mt-1">
            <label style="font-size:12px;font-weight:700" for="start_date">Start-Date :</label>
            <input class="date_field ps-1" name="start_date" type="text" placeholder="DD-MM-YYYY" id="start_get_date">
            <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
        </div>
        <div class="col-xl-3 mt-1">
            <label style="font-size:12px;font-weight:700" for="end_date">End-Date :</label>
            <input class="date_field ps-1" name="end_date" type="text" placeholder="DD-MM-YYYY" id="end_get_date">
            <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
        </div>
        <div class="col-2">
            <div class="form-group custom-select skeleton mt-1">
                <select class="ps-2" name="role_id" id="select_role">
                    <option value="" id="option_value1">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" id="option_value2">{{$role->name}}</option>
                    @endforeach
                </select>
                <span class="custom-role-arrow3"></span>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group custom-select skeleton mt-1">
                <select class="ps-2" name="role_id" id="select_role">
                    <option value="" id="option_value1">Select Status</option>
                    <option value="null" id="option_value2">Pending</option>
                    <option value="1" id="option_value2">Justify</option>
                    <option value="0" id="option_value2">Deny</option>
                </select>
                <span class="custom-role-arrow4"></span>
            </div>
        </div>
        <div class="col-xl-2">
            <button type="submit" class="btn btn-sm cgt_btn btn_focus add_button mt-1" id="data_permission">
                <i class="search-icon fa fa-spinner fa-spin search-hidden"></i>
                <span class="btn-text">Search</span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <div class="form-group custom-select skeleton mt-2">
                <select class="ps-2" name="role_id" id="select_role">
                    <option value="" id="option_value1">Select Inventory ID</option>
                    <option value="" id="option_value2"></option>
                </select>
                <span class="custom-role-arrow5"></span>
            </div>
        </div>
        <div class="col-xl-5"></div>
    </div>
    <div>
        <table class="bg-transparent ord_table center border-1 skeleton mt-2">
            <tr class="table-row order_body acc_setting_table">
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
            <tbody class="bg-transparent skeleton" id="inventory_permission_data_table">

            </tbody>
        </table>
    </div>
    <div class="row table_last_row mb-1">
        <div class="skeleton col-1">
            <label class="item_class skeleton">Peritem</label>
            <div class="custom-select skeleton">
                <select class="ps-1 skeleton" id="perItemControl">
                    <option class="skeleton" selected>10</option>
                    <option class="skeleton">20</option>
                    <option class="skeleton">50</option>
                    <option class="skeleton">100</option>
                    <option class="skeleton">200</option>
                </select>
                <span class="custom-list-items-arrow me-2"></span>
            </div>
        </div>
        <div class="col-2">
            <span class="tot_summ skeleton" id="num_plate">
                <label class="tot-search skeleton mt-3" for="tot_cagt"> Total Entry :</label>
                <label class="badge rounded-pill bg-primary" for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;" id="total_inventory_permission_records"></span><span id="iteam_label5" style="font-weight: 600;color:white;">.00</span></label>
            </span>
        </div>
        <div class="col-9">
            <div class="pagination skeleton pb-1" id="inventory_permission_data_table_paginate">

            </div>
        </div>
    </div>
</div>