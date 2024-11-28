<div class="body_area">
    <div class="email-box-header">
        <div class="row">
            <div class="col-xl-1">
                <div class="group_btn next_btn">
                    <button class="btn btn-light btn-sm chck record_next_btn refrsh-skeletone" type="button" id="refreshrecordBtn"
                        data-bs-toggle="tooltip"  data-bs-placement="top" title="Refresh" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                        <i class="refresh_rotate_icon fa-solid fa-arrow-rotate-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-xl-2">
                <span class="record_input_one text-skeletone">
                    <input type="text" class="form-control form-control-sm record_start_date ps-1" name="record_start_date" placeholder="Start Date" autocomplete="off" id="record_start_date">
                </span>
            </div>
            <div class="col-xl-2">
                <span class="record_input_two text-skeletone">
                    <input type="text" class="form-control form-control-sm record_end_date ps-1" name="record_end_date" placeholder="End Date" autocomplete="off" id="record_end_date">
                </span>
            </div>
            <div class="col-7" style="text-align:right;">
                <span class="email_record_month text-skeletone pe-2" id="email_record_month"></span>
            </div>
        </div>
    </div>
    <div class="email-box-body">
        <div class="row mt-2">
            <div class="col-xl-3">
                <div class="form-group record_input3 select-catg-skeletone">
                    <select type="text" class="form-control form-control-sm user_roles select2" name="sender_user" id="user_roles">
                        <option value="">Select User Role</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-group record_input4 select-catg-skeletone">
                    <select type="text" class="form-control form-control-sm user_emails select2" name="sender_email" id="user_emails">
                        <option value="">Select User Email</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group record_input5 select-catg-skeletone">
                    <select type="text" class="form-control form-control-sm user_emails select2" name="attachment_type" id="selectAttachment">
                        <option value="">Select Email Category</option>
                        <option value="report">Management Report</option>
                        <option value="message">User Message</option>
                        <option value="draft">Draft</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle bg-transparent ord_table center border-1 mt-2">
                <tbody class="bg-transparent tabskeletone permission-head-border" id="email_record_table">

                </tbody>
            </table>
        </div>
        <div class="row table_last_row">
            <div class="col-1 pt-2">
                <div class="record_data_item item-skeletone">
                    <select class="ps-1 skeleton" id="perItemEmailControl" data-bs-toggle="tooltip"  data-bs-placement="top" title="Per-Item" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                        <option class="skeleton" selected>10</option>
                        <option class="skeleton">20</option>
                        <option class="skeleton">50</option>
                        <option class="skeleton">100</option>
                        <option class="skeleton">200</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <span class="record_email_sum email-skeletone" id="num_plate">
                    <label class="tot-search" for="tot_cagt">Current Email :</label>
                    <label class="badge rounded-pill bg-primary" for="total_user_email" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_emails_record"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
                </span>
                <div class="progress record_email_progress email-progress-bar-skeleton" style="height:0.55rem;">
                    <div class="progress-bar progress-bar-striped bg-email progress-bar-animated" role="progressbar" aria-valuenow="{{ $inbox_email_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $inbox_email_percentage }}%;">
                    {{ round($inbox_email_percentage, 2) }}%
                    </div>
                </div>
                <span class="email_storg_record text-skeletone">Email (<span id="total_emails_progress"></span>) Out Of <span >{{$userEmails}}</span></span>
            </div>
            <div class="col-8">
                <div class="pagination" id="user_email_record_table_paginate">

                </div>
            </div>
        </div>
    </div>
</div>