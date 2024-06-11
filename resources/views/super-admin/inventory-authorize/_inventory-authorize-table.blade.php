{{-- start Inventory Authorize Table --}}
<div class="row">
    <div class="col-xl-7 select-group">
        <div class="card card-body inv_reslt user_info" id="user_permissions" hidden>
            <div class="row">
                <div class="col-xl-3">
                    <label for="user_image"><span id="user_image"></span></label>
                </div>
                <div class="col-xl-9">
                    <label class="mt-1" for="user_name" style="color:black;font-weight:700;font-size:13px;">User :</label>
                    <input class="mt-1" type="text" id="role_name" readonly>
                    <label class="mt-1" for="user_name" style="color:black;font-weight:700;font-size:13px;">Email :</label>
                    <input class="mt-1" type="text" id="user_email" readonly>
                </div>
            </div>
            <div class="row user_info_bg pb-1">
                <div class="col-xl-12">
                    <label class="" for="user_name" style="color:black;font-weight:700;font-size:12px;">Permission-Date :</label>
                    <input class="mt-1" type="text" id="permission_date" readonly>
                    <label class="" for="user_name" style="color:black;font-weight:700;font-size:12px;">Inventory-ID :</label>
                    <input class="mt-1" type="text" id="inven_id" readonly>
                    <label class="" for="user_name" style="color:black;font-weight:700;font-size:12px;">Permission :</label>
                    <input class="mt-1" type="text" id="permission" readonly><br>
                    <label class="" for="user_name" style="color:black;font-weight:700;font-size:12px;">Issue :</label>
                    <input class="mt-1" type="text" id="issue" readonly><br>
                    <label class="" for="user_name" style="color:black;font-weight:700;font-size:12px;">Approved-By :</label>
                    <input class="mt-1" type="text" id="approv_by" readonly>
                </div>
            </div>
            <div class="row pb-1 mt-1">
                <div class="col-xl-12">
                    @csrf
                    <label class="" for="user_name" style="color:black;font-weight:700;font-size:12px;" hidden>Permission-Date :</label>
                    <input class="inv_id ps-2" type="text" name="inv_id" id="input_inventory_id" placeholder="Inventory ID" style="color:black;font-weight:600;" readonly hidden>
                    <input type="text" name="inventory_id" id="inventory_id" hidden>
                    <label class="" for="user_name" style="color:black;font-weight:800;font-size:12px;">Token :</label>
                    <input class="generate_id permission_token ps-2" type="text" name="permission_token" id="input_token" placeholder="Token" style="color:black;font-weight:600;" readonly hidden>
                    <input id="generate_id" type="text" name="generate_id" hidden />
                    <input id="token_field" type="text" name="token_field" value="Token" hidden />
                </div>
            </div>
        </div>
        <div class="form-group custom-select skeleton">
            <select class="inventory-id ps-2" name="inv_permission_id" id="select_inventory_id">
                <option value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Inventory ID</option>
                @foreach($Inventory_permission_references as $item)
                    <option value="{{$item['inv_permission_id']}}" id="option_value2" style="color:black;font-weight:600;">
                        {{$item->roles->name}} - {{$item->users->email}} - [ {{ $item->inventories->inv_id}} ] - [ {{$item->permission_status == 0 ? 'Deny' : 'Justify'}} ] -
                        @if ($item->permission_status == 1)
                            ✅
                        @elseif($item->permission_status == 0)
                            ❌ 
                        @endif
                    </option>
                @endforeach
            </select>
            <span class="custom-role-arrow5"></span>
        </div>
    </div>
    
    <div class="col-xl-5">
        <div class="row">
            <div class="col-xl-5"> 
                <label class="label_margin" for="total_permission" style="font-weight:700;color:black;">Month : 
                    <span class="badge rounded-pill bg-white total_users current-month capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight: 800;color:rgb(13, 110, 253);opacity:1;font-size:12px;" id="inventory_month"></span>
                </label>
            </div>
            <div class="col-xl-7">
                <div class="form-group custom-select skeleton mt- mb-">
                    <input class="input_inventory_id ps-2" type="search" name="inv_id" id="input_permission_inventory_id" placeholder="INV search......" style="color:black;font-weight:600;"/>
                </div>
            </div>
        </div> 
        <!-- <div class="card card-body inv_reslt skeleton">
        </div> -->
    </div>
</div>
<div class="row mid-topbar-auth mt-2">
    <div class="col-xl-3">
        <label class="mt-1" style="color: black; font-size:12px;font-weight:700;font-family:math;" for="start_date">Total Inventory : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:rgb(13, 110, 253);opacity:1;font-size:12px;">
                <span  data-val=""  id="total_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
    <div class="col-xl-3 mt-">
        <label class="label_margin" for="total_qty" style="font-weight:700;color:black;padding-top:1px;" id="justifyAmount">Quantity : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;font-size:12px;color:rgb(13, 110, 253);">
                <span data-val="" id="total_qty_inventory_records"></span>
            </span>
        </label>
    </div>
    <div class="col-xl-2 mt-">
        <label class="label_margin" for="total_justify" style="color: black; font-size:12px;font-weight:700;font-family:math;" id="denyAmount">Justify : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:darkcyan;opacity:1;font-size:12px;">
                <span data-val="" id="total_justify_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
    <div class="col-xl-2 mt-">
        <label class="label_margin" for="total_deny" style="color: black; font-size:12px;font-weight:700;font-family:math;" id="pendingAmount">Deny : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:rgb(209 157 0);opacity:1;font-size:12px;">
                <span data-val="" id="total_deny_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
    <div class="col-xl-2 mt-">
        <label class="label_margin" for="total_pending" style="color: black; font-size:12px;font-weight:700;font-family:math;" id="pendingAmount">Pending : 
            <span class="badge rounded-pill bg-white total_users capsule-sm-skeleton capsule-sm-skeleton-focus" style="font-weight:800;color:gray;opacity:1;font-size:12px;">
                <span data-val="" id="total_pending_inventory_records"></span>
                <span>৳</span>
            </span>
        </label>
    </div>
</div>
<!-- Table-top-row -->
<div class="row">
    @csrf
    <div class="col-xl-6">
        <input class="inv_id ps-2" type="text" name="inv_id" id="input_inventory_id" placeholder="Inventory ID" style="color:black;font-weight:600;" readonly hidden>
        <input type="text" name="inventory_id" id="inventory_id" hidden>
        <div class="mt-2 date">
            <span id="strDateOf" hidden>
                <label style="font-size:12px;font-weight:700" for="start_of_date">Start-Date :</label>
                <input class="date_field ps-1" name="start_of_date" type="text" placeholder="DD-MM-YYYY" id="start_of_date">
            </span>
            <span id="enDateOf" hidden>
                <label style="font-size:12px;font-weight:700" for="end_of_date">End-Date :</label>
                <input class="date_field ps-1" name="end_of_date" type="text" placeholder="DD-MM-YYYY" id="end_of_date">
            </span>
        </div>
    </div>
    <div class="col-xl-2">
        <input class="generate_id permission_token ps-2" type="text" name="permission_token" id="input_token" placeholder="Token" style="color:black;font-weight:600;" readonly hidden>
        <input id="generate_id" type="text" name="generate_id" hidden />
        <input id="token_field" type="text" name="token_field" value="Token" hidden />
        <div class="form-group custom-select role-select mt-2" hidden>
            <select class="select-box-animation ps-2" name="user_id" id="filter_select_role_id">
                <option class="" value="" id="option_value1" style="color:darkgreen;font-weight:600;">Select Role</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" id="option_value2" style="color:black;font-weight:600;">{{$role->name}}</option>
                @endforeach
            </select>
            <span class="custom-role-arrow3"></span>
        </div>
        <span class="" id="role_Filter"></span>
        <span class="" id="role_Filter_init" hidden></span>
    </div>
    <div class="col-xl-2">
        <div class="form-group custom-select select_status mt-2" hidden>
            <select class="role_status select-box-animation ps-2" name="status" id="role_permission_status">
                <option value="" id="option_value_select_status" style="color:darkgreen;font-weight:600;">Select Status</option>
                <option value="" id="option_value_pending" style="color:black;font-weight:600;" hidden>Pending</option>
                <option value="" id="option_value_jsustify" style="color:black;font-weight:600;" hidden>Justify</option>
                <option value="" id="option_value_deny" style="color:black;font-weight:600;" hidden>Deny</option>
            </select>
            <span class="custom-role-arrow6"></span>
        </div>
        <span class="" id="status_Filter"></span>
    </div>
    <div class="col-xl-2">
        <div class="dropdown head_set mt-2">
            <button type="button" class="btn btn-sm cgt_btn btn_focus add_button skeleton" id="refresh">
                <i class="refresh-icon fa fa-solid fa-asterisk fa-spin perm-hidden" style="color:white;opacity:1;"></i>
                <span class="btn-text ms-1">Refresh</span>
            </button>
            <button class="btn btn-sm select_button dropdown-toggle filter-menu skeleton" type="button" id="multiSelectDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu table_head_set" aria-labelledby="multiSelectDropdown">
                <li>
                    <a type="button" class="toggle_value ps-2" id="toggleRole">
                        <span class="background badge rounded-pill bg-green text-white" style="font-size: 11px;font-weight:700;color:darkblue;" id="roleText"> </span>
                        <span class="roleIcon" id="roleIcon"></span>
                    </a>
                </li>
                <li>
                    <a type="button" class="toggle_value_status ps-2" id="toggleStatus">
                        <span class="background-status badge rounded-pill bg-green text-white" style="font-size: 11px;font-weight:700;color:darkblue;" id="statusText"> </span>
                        <span class="statusIcon" id="statusIcon"></span>
                        
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Authorize Table -->
<span class="skeleton">
    <table class="ord_table center border-1 skeleton mt-2" id="inventoryAuthorizeTable">
        <tr class="table-row order_body acc_setting_table skeleton ">
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton  ps-1">ID</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton replace_hidden ps-1" style="text-align: left;">Group</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton add_hidden ps-1" style="text-align: left;" hidden>Act</th>
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">INV-ID</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Mfg.Date</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Exp.Date</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton remove_hidden" style="text-align: left;" hidden>Group</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;">Medicine</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;">Dosage</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton">MRP</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;" hidden>Price</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton " >Units</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: left;">Qty</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Amount</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton " hidden>Updated By</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton " hidden>Status-Inv</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton">Status</th>
        </tr>
        <tbody class="bg-transparent skeleton" id="inventory_authorize_data_table"></tbody>
    </table>
</span>
<!-- Authorize Table Footer -->
<div class="row table_last_row">
    <div class="col-1">
        <label class="Authorization">Peritem</label>
        <div class="custom-select skeleton">
            <select class="ps-2" name="per_page" id="perItemControlAuthorization">
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
                </span>
                
            </label>
        </span>
    </div>
    <div class="col-8">
        <div class="pagination" id="inventory_authorize_data_table_paginate"></div>
    </div>
</div>

{{-- end Inventory Authorize Table --}}