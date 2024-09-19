<!-- ==== User-Email-Verification-Page ======= -->
<div class="container email-container">
    <div class="row">
        <div class="col-xl-3">
            <select type="text" class="form-control form-control-sm select2" name="role" id="verification_select_role">
                <option value="">Select Role</option>
                @foreach($emails as $item)
                    <option value="{{ $item->id }}">{{ $item->roles->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-9">
            <span>
                <input class="form-control from-control-sm" type="search" name="search" placeholder="Search........" id="search">
            </span>
        </div>
    </div>
    <div class="table-responsive">
        <table class="bg-transparent ord_table center border-1 mt-2">
            <tr class="table-row order_body acc_setting_table">
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="id" data-order="desc" class="table_th_color col txt ps-2 pe-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> ID</th>
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="role" data-order="desc" class="table_th_color txt ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Role</th>
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="email" data-order="desc" class="table_th_color txt ps-1"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Email</th>
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="email_verified_session" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Email-Verified</th>
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="account_create_session" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Account-Create</th>
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="status" data-order="desc" class="table_th_color tot_pending_ col ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Status</th>
                <th id="th_sort" style="background-color: honeydew; cursor: pointer;" data-coloumn="created_at" data-order="desc" class="table_th_color tot_pending_ ps-1" style="text-align: left;"><i class="toggle-icon fa-solid fa-arrow-up-long"></i> Update-Email-Verified</th>
            </tr>
            <tbody class="bg-transparent " id="user_email_verification_data_table">
    
            </tbody>
        </table>
    </div>
    <div class="row table_last_row mb-1">
        <div class="col-3">
            <label class="item_class">Peritem</label>
            <div class="custom-select ">
                <select class="ps-1" id="perItemControl" style="background: linear-gradient(to bottom, #3b71ca, transparent 3%, #3b71ca, #3b71ca);border:1px solid darkblue;">
                    <option class="" selected>10</option>
                    <option class="">20</option>
                    <option class="">50</option>
                    <option class="">100</option>
                    <option class="">200</option>
                </select>
                <span class="custom-list-item-arrow-mini me-2"></span>
            </div>
        </div>
        <div class="col-9">
            <div class="pagination  mt-1" id="email_verification_users_data_table_paginate" style="float: right;padding-top:3px;">

            </div>
        </div>
    </div>
</div>