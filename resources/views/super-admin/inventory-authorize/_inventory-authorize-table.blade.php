{{-- start Inventory Authorize Table --}}
<div class="row">
    <div class="col-xl-3">
        <label style="color: #08a05c; font-size:12px;font-weight:700" for="start_date">Start-Date :</label>
        <input class="date_field ps-1" type="text" placeholder="DD-MM-YYYY" id="start_date">
        <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
    </div>
    <div class="col-xl-3">
        <label style="color: #08a05c; font-size:12px;font-weight:700" for="start_date">End-Date :</label>
        <input class="date_field ps-1" type="text" placeholder="DD-MM-YYYY" id="end_date">
        <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
    </div>
    <div class="col-xl-2">
        <button type="submit" class="btn btn-sm cgt_btn btn_focus add_button" id="data_search">
            <i class="search-icon fa fa-spinner fa-spin search-hidden"></i>
            <span class="btn-text">Search</span>
        </button>
    </div>
    <div class="col-xl-4">
        <div class="sumary-note ms-3">
            <span style="border-bottom:double;color:lightgray;">
                <label style="color: #7c7979; font-size:12px;font-weight:700;font-family:math;" for="start_date">Current-Week : ৳ {{$weekly_inventories}}</label>
                <label class="ms-5" style="color: #7c7979; font-size:12px;font-weight:700;font-family:math;" for="start_date">Qty : {{$weekly_quantity}} items</label>
            </span><br>
            <span style="border-bottom:double;color:lightgray;">
                <label style="color: #7c7979; font-size:12px;font-weight:700;font-family:math;" for="start_date">Total-Inventory : ৳ {{$monthly_inventories}}</label>
                <label class="ms-4" style="color: #7c7979; font-size:12px;font-weight:700;font-family:math;" for="start_date">Qty : {{$monthly_quantity}} items</label>
            </span>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-xl-12">

        <table border="1" id="myTable">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="cell11">Row 1, Column 1</td>
                    <td id="cell12">Row 1, Column 2</td>
                    <td id="cell13">Row 1, Column 3</td>
                </tr>
                <tr>
                    <td id="cell21">Row 2, Column 1</td>
                    <td id="cell22">Row 2, Column 2</td>
                    <td id="cell23">Row 2, Column 3</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xl-12">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="multiSelectDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Select
            </button>
            <ul class="dropdown-menu" aria-labelledby="multiSelectDropdown">
                <li>
                    <label><input type="checkbox" id="toggleElement"> Toggle Element</label>
                </li>
                <li>
                    <label><input type="checkbox" id="toggleColumn"> Toggle Column</label>
                </li>
                <li>
                    <label><input type="checkbox" data-column="0"> Column 1</label>
                </li>
                <li>
                    <label><input type="checkbox" data-column="1"> Column 2</label>
                </li>
                <li>
                    <label><input type="checkbox" data-column="2"> Column 3</label>
                </li>

            </ul>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-xl-3">
        <span class="form-check form-switch search_ me-2 skeleton">
            <input class="form-check-input skeleton" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <label class="search ser_label skeleton ps-1 pt-1" for="search pe-2">Search Mode :</label>
            <label class="form-check-label skeleton" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
        </span>
    </div>
    <div class="col-xl-3">
        <span id="search_plate">
            <input id="search" type="search" name="search" list="datalistOptions" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="All Search Heare.........">
            <i class="search-icon fa fa-spinner fa-spin search-hidden"></i>
            <datalist id="datalistOptions">
                <option value="#">
            </datalist>
        </span>
    </div>
    <div class="col-xl-6">
        <div class="dropdown head_set mt-2">
            <button class="btn btn-sm select_button dropdown-toggle" type="button" id="multiSelectDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Select
            </button>
            <ul class="dropdown-menu table_head_set" aria-labelledby="multiSelectDropdown">
                <li>
                    <label class="ps-2"><input type="checkbox" id="toggleElement"> Toggle Element</label>
                </li>
                <li>
                    <label class="ps-2"><input type="checkbox" id="toggleColumn"> Toggle Column</label>
                </li>
                <li>
                    <label class="ps-2"><input type="checkbox" data-column="0"> Column 1</label>
                </li>
                <li>
                    <label class="ps-2"><input type="checkbox" data-column="1"> Column 2</label>
                </li>
                <li>
                    <label class="ps-2"><input type="checkbox" data-column="2"> Column 3</label>
                </li>

            </ul>
        </div>
    </div>
</div>
<span class="skeleton">
    <table class="ord_table center border-1 skeleton mt-2" id="inventoryAuthorizeTable">
        <tr class="table-row order_body acc_setting_table skeleton ">
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton  ps-2">S.N</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton  ps-1" style="text-align: left;">Group</th>
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton  ps-1">INV-ID</th>
            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton  ps-1">Stock-ID</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton   ps-1">Mfg.Date</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton   ps-1">Exp.Date</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton  ps-1" style="text-align: left;">Medicine</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton  ps-1" style="text-align: left;">Dosage</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton  ps-1">MRP</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton  ps-1" style="text-align: left;" hidden>Price</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton  ps-1" style="text-align: left;">Qty</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Amount</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton " hidden>Updated By</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton " hidden>Status-Inv</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Stock-Status</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton ">Status</th>
        </tr>
        <tbody class="bg-transparent skeleton" id="inventory_authorize_data_table">
            @foreach ($medicine_groups as $group)
            <tr class="parent-row table-row skeleton" data-parent="{{ $group->id }}">
                <td class="skeleton ps-1" style="cursor: pointer;"><i class="fa-solid fa-circle-plus ps-1 mt-1" style="color: #08a05c;font-weight:800"></i></td>
                <td class="skeleton ps-1" style="cursor: pointer;" colspan="8">{{ $group->group_name }}</td>
                <td class="skeleton">
                    @if($group->quantity >0)
                    <span>{{$group->quantity}} items</span>
                    @else
                    <span></span>
                    @endif
                </td>
                <td class="skeleton" colspan="">
                    @if($group->sub_total >0)
                    <span>৳ {{$group->sub_total}}</span>
                    @else
                    <span></span>
                    @endif
                </td>
                <td></td>
                <td></td>
            </tr>
            @foreach ($group->inventories as $child)
            <tr class="child-row child-row table-row user-table-row skeleton" data-parent="{{ $group->id }}">
                <td></td>
                <td class="line-height-td skeleton">
                    <a type="button" class="ps-1" href="#">{{$child->id}}</a>
                    <a class="btn-sm delete_button ms-2 delt_button" value="" type="button" id="dltBtn" style="font-size: 10px;">
                        <i class="fa-solid fa-trash-can" style="color: #fa0000; font-size:small"></i>
                    </a>
                    <input class="form-check-input check_permission ms-2" type="checkbox" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Check Authorize">
                </td>
                <!-- <td>{{date('d M Y h:i:sA'),strtotime($child->created_at)}}</td> -->
                <td class="skeleton">{{ $child->inv_id }}</td>
                <td class="skeleton">{{ $child->stock_id }}</td>
                <td class="skeleton">{{date('d-M-Y'),strtotime($child->manufacture_date)}}</td>
                <td class="skeleton">{{date('d-M-Y'),strtotime($child->expiry_date)}}</td>
                <td class="skeleton">{{ $child->medicine_name }}</td>
                <td class="skeleton">{{ $child->medicine_dogs }}</td>
                <td class="skeleton" hidden></td>
                <td class="skeleton">৳ {{ $child->price }}</td>
                <td class="skeleton">{{ $child->quantity }}</td>
                <td class="skeleton">৳ {{ $child->sub_total }}</td>
                <td class="skeleton" hidden>{{ $child->updated_by }}</td>
                <td class="skeleton" hidden>{{ $child->status_inv }}</td>
                <td class="skeleton">
                    @if($child->status_stock ==0)
                    <span class="badge rounded-pill bg-info text-dark">
                        Pending
                        <span class="fbox"><input id="light_focus" type="text" class="light3-focus" readonly></input></span>
                    </span>
                    @else
                    <span class="badge rounded-pill bg-primary">
                        Stock-In
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                    </span>
                    @endif
                </td>
                <td class="skeleton">
                    @if($child->status ==0)
                    <span class="badge rounded-pill bg-info text-dark">
                        Pending
                        <span class="fbox"><input id="light_focus" type="text" class="light3-focus" readonly></input></span>
                    </span>
                    @else
                    <span class="badge rounded-pill bg-success">
                        Authorize
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                    </span>
                    @endif
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</span>
<div class="row table_last_row">
    <div class="col-2">
        <label class="peritem mt-2">Peritem</label>
        <select id="perItemControl">
            <option selected>10</option>
            <option>20</option>
            <option>50</option>
            <option>100</option>
            <option>200</option>
        </select>
    </div>
    <div class="col-3">
        <span class="tot_summ skeleton" id="num_plate">
            <label class="tot-search skeleton mt-1 pt-1" for="tot_cagt"> Total Inventory :</label>
            <label for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;" id="total_inventory_records"></span><span id="iteam_label5" style="font-weight: 600;color:darkcyan;">.00 pics</span></label>
        </span>
    </div>
    <div class="col-7">
        <div class="pagination" id="inventory_authorize_data_table_paginate">

        </div>
    </div>
</div>

{{-- end Inventory Authorize Table --}}