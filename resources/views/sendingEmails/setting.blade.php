<div class="body_area">
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-body permission-card">
                <form class="form-control form-control-sm gx-2" style="border:none;">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 role_nme">
                            <div class="form-group custom-select skeleton">
                                <select type="text" class="form-control form-control-sm select_user_role select2" name="user_roles_id" id="select_user_role">
                                    <option value="">Select User Role</option>
                                </select>
                            </div>
                        </div>
                        <input id="permission_id" hidden>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xl-12 role_nme">
                            <div class="form-group custom-select skeleton">
                                <select type="text" class="form-control form-control-sm select_user_email select2" name="user_emails_id" id="select_user_email">
                                    <option value="">Select User Email</option>
                                </select>
                            </div>
                            <span id="savForm_error"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <table class="ord_table center border-1" id="myTable">
                                <tr class="table-row order_body acc_setting_table long-skeleton">
                                    <th id="th_sort" class="table_th_color long-skeleton txt col ps-2" style="text-align:left;">Access</th>
                                    <th id="th_sort" class="table_th_color tot_pending_ long-skeleton col ps-1" style="text-align:center;height:40px;width:150px;">
                                        Permission
                                        <span style="color:darkgreen;" id="statusJustify" hidden>[<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>]</span> 
                                        <span style="color:orangered; font-size:12px;" id="statusDeny" hidden></span>
                                    </th>
                                </tr>
                                <tbody class="bg-transparent" id="permission_data_table">
                                    <tr class="btn-hover table_body table-row user-table-row long-skeleton">
                                        <td class="table_body2 ps-2">Report</td>
                                        <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                            <input type="checkbox" name="report_status" value="1" class="report_status report_status skeleton mt-1" id="report_status" style="cursor: pointer;">
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body table-row user-table-row long-skeleton">
                                        <td class="table_body2 ps-2">Message</td>
                                        <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                            <input type="checkbox" name="message_status" value="1" class="statusChecking message_status skeleton mt-1" id="message_status" style="cursor: pointer;">
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body table-row user-table-row long-skeleton">
                                        <td class="table_body2 ps-2">Draft</td>
                                        <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                            <input type="checkbox" name="darft_status" value="1" class="statusChecking darft_status skeleton mt-1" id="darft_status" style="cursor: pointer;">
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body table-row user-table-row long-skeleton">
                                        <td class="table_body2 ps-2">Other</td>
                                        <td class="table_body2 role_nme" style="text-align: center;line-height: .9;">
                                            <input type="checkbox" name="other_status" value="1" class="statusChecking other_status skeleton mt-1" id="other_status" style="cursor: pointer;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-sm cancel_btn skeleton permission_calncel" id="PermissionCancel">
                            <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="cancel-btn-text">Cancel</span>
                        </button>
                        <button type="button" class="btn btn-sm subm_btn skeleton permission_submit" id="PermissionSubmit">
                            <span class="submt-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="btn-text">Submit</span>
                        </button>
                        <button type="button" class="btn btn-sm updt_btn permission_update" id="PermissionUpdate" hidden>
                            <span class="updt-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="setting-update-btn-text">Setting Update</span>
                        </button>
                        <span class="text-danger" style="font-weight: 700;font-size:12px;font-style:italic;"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card card-body permission-data-card">
                <span id="permission_success_message"></span>
                <div class="search-box mb-2">
                    <input class="ps-2" type="search" name="search" placeholder="search email" id="searchEamil" hidden>
                    <span class="search-skeletone"></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm ord_table center border-1 long-skeleton" id="SupplierSettingTable">
                        <thead class="table-light">
                            <tr class="table-row order_body acc_setting_table ">
                                <th id="th_sort_head" class="table_th_color  txt col ps-1" style="text-align: left;padding-top: 100px;">ID</th>
                                <th id="th_sort_head" class="table_th_color tot_pending_  col ps-1" style="text-align: left;padding-top: 100px;">Role</th>
                                <th id="th_sort_head" class="table_th_color tot_pending_  col ps-1" style="text-align: left;padding-top: 100px;">Email</th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                                    Report
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                                    Message
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                                    Draft
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                                    Other
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;">
                                    Action
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-transparent" id="delete_permission_data_table">
        
                        </tbody>
                    </table>
                </div>
                <div class="row table_last_row mb-1">
                    <div class="col-xl-2">
                        <label class="item_class text-place mt-1" id="item_class" hidden></label>
                        <div class="custom-select peritem-skeleton">
                            <select class="ps-1 peritem-skeleton" id="perItemControls" hidden>
                                <option class="peritem-skeleton" selected>10</option>
                                <option class="peritem-skeleton">20</option>
                                <option class="peritem-skeleton">50</option>
                                <option class="peritem-skeleton">100</option>
                                <option class="peritem-skeleton">200</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="pagination pb-1" id="delete_permission_data_table_paginate">

                        </div>
                    </div>
                    <div class="col-xl-3">
                        <span class="tot_summ" id="num_plate">
                            <label class="tot-search skeleton" for="tot_cagt"> Permission :</label>
                            <label class="badge rounded-pill bg-primary skeleton mt-4" for="total_medic_records" id="iteam_label4" style="font-size: 11px;">
                                <span class="total_users skeleton" style="font-weight: 700;color:white;" id="total_user_permission_records"></span>
                                <span id="iteam_label5" style="font-weight: 600;color:white;"><span>.00</span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>