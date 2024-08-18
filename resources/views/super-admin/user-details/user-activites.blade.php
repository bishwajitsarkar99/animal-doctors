<!-- ==== User-Activities ======= -->
<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <span class="login-user-title">Login Users</span>
        </div>
        <div class="col-xl-6">
            <div class="progress mt-2" style="height:0.8rem;">
                <div class="progress-bar progress-bar-striped bg-login progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
        </div>
        <div class="col-xl-2">
            <span class="login-user-title pt-1">50</span>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <span class="login-user-title">Logout Users</span>
        </div>
        <div class="col-xl-6">
            <div class="progress mt-2" style="height:0.8rem;">
                <div class="progress-bar progress-bar-striped bg-alert progress-bar-animated" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
            </div>
        </div>
        <div class="col-xl-2">
            <span class="login-user-title pt-1">70</span>
        </div>
    </div>
    <table class="bg-transparent ord_table center border-1 mt-2">
        <tr class="table-row order_body acc_setting_table">
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1 pe-1">ID</th>
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">Name</th>
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">Email</th>
            <th id="th_sort" style="background-color: white;" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">Role</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">IP</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">User Agent</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Payload</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Last_activity</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Login</th>
            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Logout</th>
        </tr>
        <tbody class="bg-transparent " id="user_activites_data_table">

        </tbody>
    </table>
    <div class="row table_last_row">
        <div class="col-1">
            <label class="item_class">Peritem</label>
            <div class="custom-select ">
                <select class="ps-1" id="perItemControl" style="background: linear-gradient(to bottom, rgb(5, 5, 248), transparent 3%, rgb(5, 5, 248), rgb(5, 5, 248));border:1px solid darkblue;">
                    <option class="" selected>10</option>
                    <option class="">20</option>
                    <option class="">50</option>
                    <option class="">100</option>
                    <option class="">200</option>
                </select>
                <span class="custom-list-item-arrow-mini me-2"></span>
            </div>
        </div>
        <div class="col-4">
            <span class="tot_summ" id="num_plate">
                <label class="tot-search  mt-3" for="tot_cagt"> Total Activity Users :</label>
                <label class="badge rounded-pill bg-primary" for="total_medic_records " id="iteam_label4" style="font-size: 11px;"><span class="total_users " style="font-weight: 600;color:white;" id="total_activites_records"></span><span id="iteam_label5" style="font-weight: 600;color:white;">.00</span></label>
            </span>
        </div>
        <div class="col-7">
            <div class="pagination  mt-1" id="activities_users_data_table_paginate" style="float: right;padding-top:3px;">

            </div>
        </div>
    </div>
</div>