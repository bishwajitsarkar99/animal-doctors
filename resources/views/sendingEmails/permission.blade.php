<div class="body_area">
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-body permission-card">
                <form class="form-control form-control-sm gx-2" style="border:none;">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 role_nme">
                            <div class="form-group setting_input3 select-catg-skeletone">
                                <select type="text" class="form-control form-control-sm select_user_role select2" name="user_roles_id" id="select_user_role">
                                    <option value="">Select User Role</option>
                                </select>
                            </div>
                        </div>
                        <input id="permission_id" hidden>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xl-12 role_nme">
                            <div class="form-group setting_input4 select-catg-skeletone">
                                <select type="text" class="form-control form-control-sm select_user_email select2" name="user_emails_id" id="select_user_email">
                                    <option value="">Select User Email</option>
                                </select>
                            </div>
                            <span id="savForm_error"></span>
                            <span id="updateForm_errorList"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <table class="ord_table center text-skeletone" id="myTable">
                                <tr class="order_body acc_setting_table permission-head-border">
                                    <th id="th_sort" class="table_th_color long-skeleton txt col ps-2" style="text-align:left;">Setting</th>
                                    <th id="th_sort" class="table_th_color tot_pending_ long-skeleton col ps-1" style="text-align:left;height:25px;width:130px;">
                                        Permission
                                        <span style="color:darkgreen;" id="statusJustify" hidden>[<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>]</span> 
                                        <span style="color:orangered; font-size:12px;" id="statusDeny" hidden></span>
                                    </th>
                                </tr>
                                <tbody class="bg-transparent table_bottom_border" id="permission_data_table">
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2">Email Service</td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="email_service" value="1" class="email_service skeleton mt-1" id="email_service" style="cursor: pointer;">
                                            Active
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2">Inbox</td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="report_status" value="1" class="report_status skeleton mt-1" id="report_status" style="cursor: pointer;">
                                            Delete(Report)
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2"></td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="report_email_forward" value="1" class="statusChecking report_email_forward skeleton mt-1" id="report_email_forward" style="cursor: pointer;">
                                            Forward(Report)
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2"></td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="message_status" value="1" class="statusChecking message_status skeleton mt-1" id="message_status" style="cursor: pointer;">
                                            Delete(Message)
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2"></td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="message_email_forward" value="1" class="statusChecking message_email_forward skeleton mt-1" id="message_email_forward" style="cursor: pointer;">
                                            Forward(Message)
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2">Sendbox</td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="report_email_forward_sendbox" value="1" class="statusChecking report_email_forward_sendbox skeleton mt-1" id="report_email_forward_sendbox" style="cursor: pointer;">
                                            Forward(Report)
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2"></td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="report_status_sendbox" value="1" class="statusChecking report_status_sendbox skeleton mt-1" id="report_status_sendbox" style="cursor: pointer;">
                                            Delete(Report)
                                        </td>
                                    </tr>
                                    <tr class="btn-hover table_body user-table-row long-skeleton">
                                        <td class="table_body2 email_row ps-2">Draft Email</td>
                                        <td class="table_body2 email_row role_nme" style="text-align: left;line-height: 1.5;">
                                            <input type="checkbox" name="darft_status" value="1" class="statusChecking darft_status skeleton mt-1" id="darft_status" style="cursor: pointer;">
                                            Delete
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-sm cancel_btn setting-cancel-btn-skeletone permission_calncel" id="PermissionCancel">
                            <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="cancel-btn-text">Cancel</span>
                        </button>
                        <button type="button" class="btn btn-sm subm_btn setting-cancel-btn-skeletone permission_submit" id="PermissionSubmit">
                            <span class="submt-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="submt-btn-text">Submit</span>
                        </button>
                        <button type="button" class="btn btn-sm updt_btn setting-cancel-btn-skeletone permission_update" id="PermissionUpdate" hidden>
                            <span class="updt-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="setting-update-btn-text">Setting Update</span>
                        </button>
                        <span class="text-danger" style="font-weight: 700;font-size:12px;font-style:italic;"></span>
                    </div>
                </form>
            </div>
            <span class="" id="permission_success_message"></span>
        </div>
        <div class="col-xl-8">
            <div class="card card-body permission-data-card">
                <div class="row">
                    <div class="col-xl-2">
                        <button type="button" class="btn btn-sm data_get setting-cancel-btn-skeletone" style="text-align:left;letter-spacing: 0px;" id="DataGet">
                            <span class="data-get-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="data-get-btn-text">Data Get</span>
                        </button>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group setting_input5 select-catg-skeletone">
                            <select type="text" class="form-control form-control-sm select_roles select2" name="user_roles_id" id="select_roles">
                                <option value="">Select User Role</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group setting_input6 select-catg-skeletone">
                            <select type="text" class="form-control form-control-sm select_emails select2" name="user_emails_id" id="select_emails">
                                <option value="">Select User Email</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-1">
                    <table class="table table-sm ord_table center" id="SupplierSettingTable">
                        <thead class="table-light tb_head tabskeletone">
                            <tr class="table-row order_body acc_setting_table ">
                                <th id="th_sort_head" class="table_th_color  txt col tb_start_th ps-1" style="text-align: left;padding-top: 100px;">ID</th>
                                <th id="th_sort_head" class="table_th_color tot_pending_ tb_middle_th col ps-1" style="text-align: left;padding-top: 100px;">Role</th>
                                <th id="th_sort_head" class="table_th_color tot_pending_ tb_end_th col ps-1" style="text-align: left;padding-top: 100px;">Email</th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Email Service
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Report Email Delete (Inbox)
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Report Email Forward (Inbox)
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Message Email Delete (Inbox)
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Message Email Forward (Inbox)
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Report Email Delete (Sendbox)
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Report Email Forward (Sendbox)
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Draft Email Delete
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                                <th id="th_sorts" class="table_th_color tot_pending_  col ps-1 vertical-line" style="text-align:left;background-color: white;">
                                    Action
                                    <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-transparent tabskeletone table_bottom_border" id="delete_permission_data_table">
        
                        </tbody>
                    </table>
                </div>
                <div class="row table_last_row mb-3">
                    <div class="col-xl-2">
                        <div class="setting_data_item setting-peritem-skeletone">
                            <label class="item_class text-place mt-1" id="item_class">PerItem</label>
                            <div class="">
                                <select class="ps-1 peritem-skeleton" id="perItemControls">
                                    <option class="peritem-skeleton" selected>10</option>
                                    <option class="peritem-skeleton">20</option>
                                    <option class="peritem-skeleton">50</option>
                                    <option class="peritem-skeleton">100</option>
                                    <option class="peritem-skeleton">200</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="pagination text-skeletone mt-2" id="delete_email_data_table_paginate">

                        </div>
                    </div>
                    <div class="col-xl-2">
                        <span class="setting_email_sum eml-skeletone" id="num_plate">
                            <label class="tot-search" for="tot_cagt"> Email :</label>
                            <label class="badge rounded-pill bg-primary" for="total_medic_records" id="iteam_label4" style="font-size: 11px;">
                                <span class="total_users" style="font-weight: 700;color:white;" id="total_user_permission_records"></span>
                                <span id="iteam_label5" style="font-weight: 600;color:white;"><span>.00</span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>