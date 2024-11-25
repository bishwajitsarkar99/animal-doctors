<div class="body_area">
    <div class="email-box-header">
        <div class="row">
            <div class="col-xl-2">
                <div class="btn-group draft_group_btn text-skeletone">
                    <button type="button" class="btn btn-light btn-sm btn-top" data-bs-toggle="tooltip"  data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <input class="form-check-input" type="checkbox" id="allSelectionDraft">
                    </button>
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="selectDropdownButton">Select</button>
                    <ul class="dropdown-menu" id="themeMenuListBackground">
                        <li><a type="button" class="dropdown-item" href="#" id="selectButton">All</a></li>
                        <li><a type="button" class="dropdown-item" href="#" id="noneButton">None</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="">
                    <button class="btn btn-light btn-sm btn-top draft_next_btn refrsh-skeletone" type="button" id="refreshDraftBtn"
                    data-bs-toggle="tooltip"  data-bs-placement="top" title="Refresh" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="refresh_rotate_icon fa-solid fa-arrow-rotate-right"></i>
                    </button>
                    <button class="btn btn-light btn-sm show-btn btn-top delete_drft_btn delete_show_btn delete-btn-display" type="button" id="deleteIconBtn"
                    data-bs-toggle="tooltip"  data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                    <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>
            </div>
            <div class="col-xl-8">
                <span class="draft_input5 text-skeletone">
                    <input type="search" class="form-control form-control-sm email_search ps-1" name="user_to" placeholder="Draft Email Search......." id="draft_email_search">
                </span>
            </div>
        </div>
    </div>
    <div class="email-box-body">
        <div class="row mt-2">
            <div class="col-xl-2">
                <span class="draft_input1 text-skeletone">
                    <input type="text" class="form-control form-control-sm draft_start_date ps-1" name="draft_start_date" placeholder="Start Date" autocomplete="off" id="draft_start_date">
                </span>
            </div>
            <div class="col-xl-2">
                <span class="draft_input2 text-skeletone">
                    <input type="text" class="form-control form-control-sm draft_end_date ps-1" name="draft_end_date" placeholder="End Date" autocomplete="off" id="draft_end_date">
                </span>
            </div>
            <div class="col-xl-2">
                <span class="draft_input3 select-catg-skeletone">
                    <select type="text" class="form-control form-control-sm select2" name="attachment_type" id="select_attachment_draft">
                        <option value="">Select Category</option>
                        <option value="draft">Draft</option>
                        <option value="other">Other</option>
                    </select>
                </span>
            </div>
            <div class="col-6" style="text-align:right;">
                <span class="draft_current_month text-skeletone pe-2" id="draft_email_month"></span>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle bg-transparent ord_table center border-1 mt-2">
                <tbody class="bg-transparent permission-head-border" id="draft_data_table">

                </tbody>
            </table>
        </div>
        <p class="mt-2 ps-1" id="success_message"></p>
        <div class="row table_last_row">
            <div class="col-1 pt-2">
                <div class="draft_data_item item-skeletone">
                    <select class="ps-1 skeleton" id="perItemDraftEmail" data-bs-toggle="tooltip"  data-bs-placement="top" title="Per-Item" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                        <option class="skeleton" selected>10</option>
                        <option class="skeleton">20</option>
                        <option class="skeleton">50</option>
                        <option class="skeleton">100</option>
                        <option class="skeleton">200</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <span class="draft_email_sum email-skeletone" id="num_plate">
                <label class="tot-search skeleton" for="tot_cagt">Current Draft :</label>
                <label class="badge rounded-pill bg-primary" for="total_user_email skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_draft_email"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
                </span>
                <div class="progress draft_email_progress email-progress-bar-skeleton" style="height:0.55rem;">
                <div class="progress-bar progress-bar-striped bg-email progress-bar-animated" role="progressbar" aria-valuenow="{{ $draft_email_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $draft_email_percentage }}%;">
                    {{ round($draft_email_percentage, 2) }}%
                </div>
                </div>
                <span class="temp_storage storg_draft text-skeletone">Draft (<span id="draft_emails_progress"></span>) Out Of <span >{{$userEmails}}</span></span>
            </div>
            <div class="col-8">
                <div class="pagination text-skeletone" id="draft_email_data_table_paginate">

                </div>
            </div>
        </div>
    </div>
</div>