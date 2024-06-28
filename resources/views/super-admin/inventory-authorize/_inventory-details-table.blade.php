<div class="row">
    <div class="col-xl-5">
        <div class="card card-body permission-card">
            <form class="form-control form-control-sm gx-2" style="border:none;">
                @csrf
                <div class="row">
                    <div class="col-xl-12 role_nme">
                        <div class="form-group custom-select skeleton">
                            <select class="select_role ps-2" name="roles_id" id="select_role"></select>
                            <span class="custom-role-arrow"></span>
                        </div>
                    </div>
                    <input id="permission_id" hidden>
                </div>
                <div class="row mt-2">
                    <div class="col-xl-12 role_nme">
                        <div class="form-group custom-select skeleton">
                            <select class="select_email ps-2" name="emails_id" id="select_email"></select>
                            <span class="custom-role-arrow"></span>
                        </div>
                        <span id="savForm_error"></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xl-12">
                        <table class="ord_table center border-1" id="myTable">
                            <tr class="table-row order_body acc_setting_table skeleton">
                                <th id="th_sort" class="table_th_color skeleton txt col ps-2" style="text-align:left;">Access</th>
                                <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">
                                    Status
                                    <span style="color:darkgreen;" id="statusJustify" hidden>[Justify] ✅</span> 
                                    <span style="color:orangered;" id="statusDeny" hidden>[Deny] ❌</span>
                                </th>
                            </tr>
                            <tbody class="bg-transparent" id="permission_data_table">
                                <tr class="btn-hover table_body skeleton">
                                    <td class="table_body2 skeleton ps-2">Permission</td>
                                    <td class="table_body2 skeleton role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="permission_status" value="1" class="statusChecking permission_status skeleton mt-1" id="statusChecking" style="cursor: pointer;">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table_body2 skeleton ps-2">Data Export</td>
                                    <td class="table_body2 skeleton role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="data_export_status" value="1" class="dataStatusChecking data_export_status skeleton mt-1" id="dataStatusChecking" style="cursor: pointer;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2 ">
                    <button type="button" class="btn btn-sm subm_btn skeleton" id="PermissionSubmit">
                        <i class="submt-icon fa fa-spinner fa-spin submt-hidden"></i>
                        Submit
                    </button>
                    <button type="button" class="btn btn-sm updt_btn" id="PermissionUpdate" hidden>
                        <i class="updt-icon fa fa-spinner fa-spin updt-hidden"></i>
                        Update
                    </button>
                    <button type="button" class="btn btn-sm cancel_btn skeleton" id="PermissionCancel">
                        <i class="cancel-icon fa fa-spinner fa-spin cancel-hidden"></i>
                        Cancel
                    </button>
                    <span class="text-danger" style="font-weight: 700;font-size:12px;font-style:italic;"></span>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-7">
        <div class="card card-body permission-card">
            <div class="search-box mb-2">
                <input class="ps-2" type="search" name="search" placeholder="search id" id="searchID" hidden>
                <span class="search-skeletone"></span>
            </div>
            <table class="ord_table center border-1 skeleton" id="myTable">
                <tr class="table-row order_body acc_setting_table skeleton">
                    <th id="th_sort" class="table_th_color skeleton txt col ps-1" style="text-align: left;">ID</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Role</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Email</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Permission</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Data Export</th>
                    <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align: left;">Action</th>
                </tr>
                <tbody class="bg-transparent" id="access_permission_data_table">

                </tbody>
            </table>
            <div class="row table_last_row mb-1">
                <div class="col-xl-2">
                    <label class="item_class skeleton">Peritem</label>
                    <div class="custom-select skeleton">
                        <select class="ps-1 skeleton" id="perItemControls">
                            <option class="skeleton" style="color:black;" selected>10</option>
                            <option class="skeleton" style="color:black;">20</option>
                            <option class="skeleton" style="color:black;">50</option>
                            <option class="skeleton" style="color:black;">100</option>
                            <option class="skeleton" style="color:black;">200</option>
                        </select>
                        <span class="custom-list-items-arrow me-2"></span>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="pagination pb-1" id="access_permission_data_table_paginate">

                    </div>
                </div>
                <div class="col-xl-3">
                    <span class="tot_summ" id="num_plate">
                        <label class="tot-search skeleton" for="tot_cagt"> Total Entry :</label>
                        <label class="badge rounded-pill bg-primary skeleton mt-4" for="total_medic_records" id="iteam_label4" style="font-size: 11px;">
                            <span class="total_users skeleton" style="font-weight: 700;color:white;" id="total_inventory_access_permission_records"></span>
                            <span id="iteam_label5" style="font-weight: 600;color:white;"><span>.00</span></span>
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

