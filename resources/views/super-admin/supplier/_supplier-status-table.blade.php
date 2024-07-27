<div>
    <table class="bg-transparent ord_table center border-1 skeleton mt-2">
        <tr class="table-row order_body acc_setting_table">
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt col skeleton ps-1 pe-1">ID</th>
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">ID-Name</th>
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Type</th>
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt skeleton ps-1">Bussiness</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Name</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Contact1</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Contact2</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">WhatsApp</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton ps-1" style="text-align: left;">Email</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton ps-1">Permission</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ skeleton pe-2 ps-1">Access</th>
        </tr>
        <tbody class="bg-transparent skeleton" id="supplier_data_table_permission">

        </tbody>
    </table>
</div>
<div class="row table_last_row">
    <div class="skeleton col-1">
        <label class="item_class skeleton">Peritem</label>
        <div class="custom-select skeleton">
            <select class="ps-1 skeleton" id="perItemControl" style="background: linear-gradient(to bottom, rgb(5, 5, 248), transparent 3%, rgb(5, 5, 248), rgb(5, 5, 248));">
                <option class="skeleton" selected>10</option>
                <option class="skeleton">20</option>
                <option class="skeleton">50</option>
                <option class="skeleton">100</option>
                <option class="skeleton">200</option>
            </select>
            <span class="custom-list-item-arrow-mini me-2"></span>
        </div>
    </div>
    <div class="col-4">
        <span class="tot_summ skeleton" id="num_plate">
            <label class="tot-search skeleton mt-3" for="tot_cagt"> Total Supplier or Vendor :</label>
            <label class="badge rounded-pill bg-primary" for="total_medic_records skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;" id="total_supplier_records"></span><span id="iteam_label5" style="font-weight: 600;color:white;">.00</span></label>
        </span>
    </div>
    <div class="col-7">
        <div class="pagination skeleton mt-1" id="supplier_data_table_paginate" style="float: right;padding-top:3px;">

        </div>
    </div>
</div>