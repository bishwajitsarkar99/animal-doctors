{{-- start Inventory Details Table --}}
<!-- Table-top-row -->
<div class="row">
    @csrf
    <div class="col-xl-7">
        <span id="strDateOf">
            <label style="font-size:12px;font-weight:700" for="start_of_date">Start-Date :</label>
            <input class="date_field ps-1" name="start_date" type="text" placeholder="DD-MM-YYYY" id="start_of_date">
        </span>
        <span class="ms-3" id="enDateOf">
            <label style="font-size:12px;font-weight:700" for="end_of_date">End-Date :</label>
            <input class="date_field ps-1" name="end_date" type="text" placeholder="DD-MM-YYYY" id="end_of_date">
        </span>
    </div>
    <div class="col-xl-5" style="text-align:left;">
        <label class="label_margin" for="total_permission" style="font-weight:700;color:black;">Month : 
            <span class="badge rounded-pill bg-white total_users current-month capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight: 800;color:rgb(13, 110, 253);opacity:1;font-size:12px;" id="inventory_month"></span>
        </label>
    </div>
</div>
<!-- Table-Filter -->
<div class="row mt-2">
    <div class="col-xl-3 select-group">
        <div class="form-group custom-select skeleton">
            <select class="supplier_id ps-2" name="supplier_id" id="select_supplier_id">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Supplier</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group">
        <div class="form-group custom-select skeleton">
            <select class="user_id ps-2" name="user_id" id="select_user_id">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Role</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group">
        <div class="form-group custom-select skeleton">
            <select class="status ps-2" name="status" id="select_status">
                <option value="" id="option_value_select_status" style="color:darkgreen;font-weight:600;">Select Status</option>
                <option value="null" id="option_value_pending" style="color:black;font-weight:600;">Pending</option>
                <option value="1" id="option_value_jsustify" style="color:black;font-weight:600;">Authorize</option>
                <option value="0" id="option_value_deny" style="color:black;font-weight:600;">Deny</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group">
        <div class="form-group custom-select skeleton">
            <select class="medicine_group ps-2" name="medicine_group" id="select_medicine_group">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Group</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group mt-1">
        <div class="form-group custom-select skeleton">
            <select class="medicine_dosage ps-2" name="medicine_dosage" id="select_medicine_dosage">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Dosage</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group mt-1">
        <div class="form-group custom-select skeleton">
            <select class="medicine_origin ps-2" name="medicine_origin" id="select_medicine_origin">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Origin</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group mt-1">
        <div class="form-group custom-select skeleton">
            <select class="medicine_name ps-2" name="medicine_name" id="select_medicine_name">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Medicine</option>
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    <div class="col-xl-3 select-group mt-1">
        <input class="input_inventory_id ps-2" type="search" name="inv_id" id="input_inventory_search" placeholder="Inventory ID search......" style="color:black;font-weight:600;font-style:italic"/>
    </div>
</div>
<!-- Table-Calculation -->
<div class="row mid-topbar-auth mt-2">
    <div class="col-xl-3">
        <label class="mt-1" style="color: black; font-size:12px;font-weight:700;font-family:math;" for="start_date">Total Inventory : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:rgb(13, 110, 253);opacity:1;font-size:12px;">
                <span  data-val=""  id="total_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
    <div class="col-xl-2">
        <label class="label_margin" for="total_qty" style="font-weight:700;color:black;padding-top:1px;" id="justifyAmount">Qty : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;font-size:12px;color:rgb(13, 110, 253);">
                <span data-val="" id="total_qty_inventory_records"></span>
                <span></span>
            </span>
        </label>
    </div>
    <div class="col-xl-3">
        <label class="label_margin" for="total_justify" style="color: black; font-size:12px;font-weight:700;font-family:math;" id="denyAmount">Authorize : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:green;opacity:1;font-size:12px;">
                <span data-val="" id="total_justify_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
    <div class="col-xl-2">
        <label class="label_margin" for="total_deny" style="color: black; font-size:12px;font-weight:700;font-family:math;" id="pendingAmount">Deny : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:orangered;opacity:1;font-size:12px;">
                <span data-val="" id="total_deny_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
    <div class="col-xl-2">
        <label class="label_margin" for="total_pending" style="color: black; font-size:12px;font-weight:700;font-family:math;" id="pendingAmount">Pending : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:black;opacity:1;font-size:12px;">
                <span data-val="" id="total_pending_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
</div>
<!-- Inventory Table -->
<span class="skeleton">
    <table class="ord_table center border-1 skeleton mt-2" id="inventoryAuthorizeTable">
        <tr class="table-row order_body acc_setting_table skeleton ">
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton  ps-1">SN.</th>
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">INV-ID</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Mfg.Date</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Exp.Date</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton remove_hidden" style="text-align: left;">Group</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;">Medicine</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;">Dosage</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton">MRP</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton " >Units</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;">Qty</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Amount</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton">Status</th>
        </tr>
        <tbody class="bg-white skeleton" id="inventory_get_data_table"></tbody>
    </table>
</span>
<!-- Authorize Table Footer -->
<div class="row table_last_row">
    <div class="col-1">
        <label class="Authorization">Peritem</label>
        <div class="custom-select skeleton">
            <select class="ps-2" name="per_page" id="perItemControlGet">
                <option value="10" style="color:black;">10</option>
                <option value="25" style="color:black;">25</option>
                <option value="50" style="color:black;">50</option>
                <option value="100" style="color:black;">100</option>
                <option value="200" style="color:black;">200</option>
            </select>
            <span class="custom-inv-drop-item-arrow me-2"></span>
        </div>
    </div>
    <div class="col-3">
        <span class="tot_summ skeleton" id="num_plate">
            <label class="tot-inv-auth mt-2 pt-2" for="tot_cagt"> Total Inventory :</label>
            <label for="total_medic_records skeleton" id="iteam_label4" style="font-size: 14px;line-height: 1;">
                <span class="badge rounded-pill bg-primary skeleton">
                    <span data-val="" style="font-weight: 700;color:white;" id="total_inventory_quatity"></span>
                    <span>.00</span>
                </span>
                
            </label>
        </span>
    </div>
    <div class="col-8">
        <div class="pagination" id="inventory_get_data_table_paginate"></div>
    </div>
</div>
<div class="loader-position">
    <img class="server-loader error-hidden loader-show" id="loaderShow" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...." />
</div>
{{-- end Inventory Details Table --}}