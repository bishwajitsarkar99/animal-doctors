<div class="row">
    <div class="col-xl-5">
        <div class="card card-body permission-card">
            <form class="form-control form-control-sm gx-2" style="border:none;">
                @csrf
                <div class="row">
                    <div class="col-xl-12 role_nme">
                        <div class="form-group custom-select skeleton">
                            <select class="select_supplier_role ps-2" name="user_roles_id" id="select_supplier_role"></select>
                            <span class="custom-role-arrow"></span>
                        </div>
                    </div>
                    <input id="permission_id" hidden>
                </div>
                <div class="row mt-2">
                    <div class="col-xl-12 role_nme">
                        <div class="form-group custom-select skeleton">
                            <select class="select_supplier_email ps-2" name="user_emails_id" id="select_supplier_email"></select>
                            <span class="custom-role-arrow"></span>
                        </div>
                        <span id="savForm_error"></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xl-12">
                        <table class="ord_table center border-1" id="myTable">
                            <tr class="table-row order_body acc_setting_table long-skeleton">
                                <th id="th_sort" class="table_th_color long-skeleton txt col ps-2" style="text-align:left;">Access</th>
                                <th id="th_sort" class="table_th_color tot_pending_ long-skeleton col ps-1" style="text-align:center;">
                                    Permission
                                    <span style="color:darkgreen;" id="statusJustify" hidden>[Justify] <span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span></span> 
                                    <span style="color:orangered;" id="statusDeny" hidden>[Deny] ❌</span>
                                </th>
                            </tr>
                            <tbody class="bg-transparent" id="permission_data_table">
                                <tr class="btn-hover table_body long-skeleton">
                                    <td class="table_body2 ps-2">Create</td>
                                    <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="create_status" value="1" class="create_status create_status skeleton mt-1" id="create_status" style="cursor: pointer;">
                                    </td>
                                </tr>
                                <tr class="btn-hover table_body long-skeleton">
                                    <td class="table_body2 ps-2">Update</td>
                                    <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="update_status" value="1" class="statusChecking update_status skeleton mt-1" id="update_status" style="cursor: pointer;">
                                    </td>
                                </tr>
                                <tr class="btn-hover table_body long-skeleton">
                                    <td class="table_body2 ps-2">Delete</td>
                                    <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="delete_status" value="1" class="statusChecking delete_status skeleton mt-1" id="delete_status" style="cursor: pointer;">
                                    </td>
                                </tr>
                                <tr class="btn-hover table_body long-skeleton">
                                    <td class="table_body2 ps-2">View</td>
                                    <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="view_status" value="1" class="statusChecking view_status skeleton mt-1" id="view_status" style="cursor: pointer;">
                                    </td>
                                </tr>
                                <tr class="btn-hover table_body long-skeleton">
                                    <td class="table_body2 ps-2">My Sql Database</td>
                                    <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                        <input type="checkbox" name="data_export_status" value="1" class="dataStatusChecking data_export_status skeleton mt-1" id="data_export_status" style="cursor: pointer;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2 ">
                    <button type="button" class="btn btn-sm subm_btn skeleton permission_submit" id="PermissionSubmit">
                        <i class="submt-icon fa fa-spinner fa-spin submt-hidden"></i>
                        Submit
                    </button>
                    <button type="button" class="btn btn-sm updt_btn permission_update" id="PermissionUpdate" hidden>
                        <i class="updt-icon fa fa-spinner fa-spin updt-hidden"></i>
                        Update
                    </button>
                    <button type="button" class="btn btn-sm cancel_btn skeleton permission_calncel" id="PermissionCancel">
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
            <table class="ord_table center border-1 long-skeleton" id="myTable">
                <tr class="table-row order_body acc_setting_table ">
                    <th id="th_sort_head" class="table_th_color  txt col ps-1" style="text-align: left;padding-top: 62px;">ID</th>
                    <th id="th_sort_head" class="table_th_color tot_pending_  col ps-1" style="text-align: left;padding-top: 62px;">Role</th>
                    <th id="th_sort_head" class="table_th_color tot_pending_  col ps-1" style="text-align: left;padding-top: 62px;">Email</th>
                    <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                        Create
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </th>
                    <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                        Update
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </th>
                    <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                        View
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </th>
                    <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                        Delete
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </th>
                    <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                        My Sql Database
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </th>
                    <th id="th_sorts" class="table_th_color tot_pending_  col ps-1" style="text-align:center;padding-top: 62px;">Action</th>
                </tr>
                <tbody class="bg-transparent" id="access_permission_data_table">

                </tbody>
            </table>
            <div class="row table_last_row mb-1">
                <div class="col-xl-2">
                    <label class="item_class text-place mt-1" id="item_class" hidden></label>
                    <div class="custom-select peritem-skeleton">
                        <select class="ps-1 peritem-skeleton" id="perItemControls" hidden>
                            <option class="peritem-skeleton" style="color:black;" selected>10</option>
                            <option class="peritem-skeleton" style="color:black;">20</option>
                            <option class="peritem-skeleton" style="color:black;">50</option>
                            <option class="peritem-skeleton" style="color:black;">100</option>
                            <option class="peritem-skeleton" style="color:black;">200</option>
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
                        <label class="tot-search skeleton" for="tot_cagt"> Total Role :</label>
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