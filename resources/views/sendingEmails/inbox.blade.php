<div class="body_area">
    <div class="email-box-header">
        <div class="row">
            <div class="col-xl-2">
                <div class="btn-group group_btn select-skeletone">
                    <button type="button" class="btn btn-light btn-sm chck" data-bs-toggle="tooltip"  data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                        <input class="form-check-input" type="checkbox" id="allSelectBtn">
                    </button>
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton">Select</button>
                    <ul class="dropdown-menu" id="themeMenuListBackground">
                        <li><a type="button" class="dropdown-item" href="#" id="selectButton">All</a></li>
                        <li><a type="button" class="dropdown-item" href="#" data-status="1" id="readButton">Read</a></li>
                        <li><a type="button" class="dropdown-item" href="#" data-status ="1" id="unReadButton">Un Read</a></li>
                        <li><a type="button" class="dropdown-item" href="#" id="noneButton">None</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2">
                <span class="email__select min-dropdown-skeletone">
                    <select type="text" class="email_select select2" name="read_mail" id="select_read_email">
                        <option value="">Email Filter</option>
                        <option value="1">Current</option>
                        <option value="0">Previous</option>
                    </select>
                </span>
            </div>
            <div class="col-xl-2">
                <div class="group_btn">
                    <button class="btn btn-light btn-sm chck next_btn refrsh-skeletone" type="button" id="refreshIconBtn"
                        data-bs-toggle="tooltip"  data-bs-placement="top" title="Refresh" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                        <i class="refresh_rotate_icon fa-solid fa-arrow-rotate-right"></i>
                    </button>
                    <button class="btn btn-light btn-sm chck show-btn delete_inbox_btn delete_show_btn delete-btn-display" type="button" id="deleteIconBtn"
                        data-bs-toggle="tooltip"  data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>
            </div>
            <div class="col-xl-6">
                <span class="input5 text-skeletone">
                    <input type="search" class="form-control form-control-sm email_search ps-1" name="user_to" placeholder="Email Search......." id="email_search">
                </span>
            </div>
        </div>
    </div>
    <div class="email-box-body">
        <div class="row mt-2">
            <div class="col-xl-2">
                <span class="input1 text-skeletone">
                    <input type="text" class="form-control form-control-sm start_date ps-1" name="start_date" placeholder="Start Date" autocomplete="off" id="start_date">
                </span>
            </div>
            <div class="col-xl-2">
                <span class="input2 text-skeletone">
                    <input type="text" class="form-control form-control-sm end_date ps-1" name="end_date" placeholder="End Date" autocomplete="off" id="end_date">
                </span>
            </div>
            <div class="col-xl-2">
                <span class="input3 select-catg-skeletone">
                    <select type="text" class="form-control form-control-sm select2" name="attachment_type" id="select_attachment">
                        <option value="">Select Category</option>
                        <option value="report">User Report</option>
                        <option value="message">User Message</option>
                    </select>
                </span>
            </div>
            <div class="col-xl-2">
                <span class="input_4 select-catg-skeletone">
                    <select type="text" class="form-control form-control-sm select2" name="status" id="select_status">
                        <option value="">Select Email</option>
                        <option value="0">New</option>
                        <option value="1">Old</option>
                    </select>
                </span>
            </div>
            <div class="col-4" style="text-align:right;">
                <span class="current_month text-skeletone pe-2" id="email_month"></span>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle bg-transparent ord_table center mt-2">
                <tbody class="bg-transparent permission-head-border" id="email_data_table">

                </tbody>
            </table>
        </div>
        <p class="delete_success ps-1" id="success_message"></p>
        <div class="row table_last_row">
            <div class="col-1 pt-2">
                <div class="custom-select item-skeletone">
                    <select class="ps-1 skeleton" id="perItemControl" data-bs-toggle="tooltip"  data-bs-placement="top" title="Per-Item" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <option class="skeleton" selected>10</option>
                    <option class="skeleton">20</option>
                    <option class="skeleton">50</option>
                    <option class="skeleton">100</option>
                    <option class="skeleton">200</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <span class="tot_summ email-skeletone" id="num_plate">
                    <label class="tot-search skeleton" for="tot_cagt">Current Email :</label>
                    <label class="badge rounded-pill bg-primary" for="total_user_email skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_user_email"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
                </span>
                <div class="progress progress-bar-skeleton" style="height:0.55rem;">
                    <div class="progress-bar progress-bar-striped bg-email progress-bar-animated" role="progressbar" aria-valuenow="{{ $inbox_email_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $inbox_email_percentage }}%;">
                    {{ round($inbox_email_percentage, 2) }}%
                    </div>
                </div>
                <span class="temp_storage storg_inbox text-skeletone">Inbox (<span id="inbox_emails_progress"></span>) Out Of <span >{{$userEmails}}</span></span>
            </div>
            <div class="col-8">
                <div class="pagination text-skeletone" id="user_email_get_data_table_paginate">

                </div>
            </div>
        </div>
    </div>
</div>