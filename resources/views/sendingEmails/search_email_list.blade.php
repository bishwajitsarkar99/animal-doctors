<!-- Search Email Modal -->
<div class="modal fade" id="emailSearchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header email_modal_header">
        <h5 class="modal-title selection" id="staticBackdropLabel" style="color: black;"><i class="fa-regular fa-envelope"></i> Email List</h5>
        <button type="button" class="btn-close btn-btn-sm clos_btn2" data-bs-dismiss="modal" aria-label="Close"
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
        </button>
      </div>
      <div class="modal-body body_area">
        <div class="email-box-header">
          <div class="row">
            <div class="col-xl-1">
              <div class="btn-group group_btn">
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="tooltip"  data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                  <input class="form-check-input" type="checkbox" id="allSelectBtn">
                </button>
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton">Select</button>
                <ul class="dropdown-menu" id="themeMenuListBackground">
                  <li><a type="button" class="dropdown-item" href="#" id="selectButton">All</a></li>
                  <li><a type="button" class="dropdown-item" href="#" id="noneButton">None</a></li>
                  <li><a type="button" class="dropdown-item" href="#" data-status="1" id="readButton">Read</a></li>
                  <li><a type="button" class="dropdown-item" href="#" id="unreadButton">Unread</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-1">
              <div class="group_btn next_btn">
                <button class="btn btn-light btn-sm" type="button" id="refreshIconBtn"
                  data-bs-toggle="tooltip"  data-bs-placement="top" title="Refresh" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                  <i class="refresh_rotate_icon fa-solid fa-arrow-rotate-right"></i>
                </button>
                <button class="btn btn-light btn-sm show-btn delete_show_btn delete-btn-display" type="button" id="deleteIconBtn"
                  data-bs-toggle="tooltip"  data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </div>
            </div>
            <div class="col-xl-8"></div>
            <div class="col-xl-2">
              <span class="current_month pe-2" id="email_month"></span>
            </div>
          </div>
        </div>
        <div class="email-box-body">
          <div class="row mt-2">
            <div class="col-2">
              <span class="input1">
                <input type="text" class="form-control form-control-sm start_date ps-1" name="start_date" placeholder="Start Date" autocomplete="off" id="start_date">
              </span>
            </div>
            <div class="col-2">
              <span class="input2">
                <input type="text" class="form-control form-control-sm end_date ps-1" name="end_date" placeholder="End Date" autocomplete="off" id="end_date">
              </span>
            </div>
            <div class="col-3">
              <span class="input3">
                <select type="text" class="form-control form-control-sm" name="attachment_type" id="select_attachment">
                  <option value="">Select Attach File</option>
                  <option value="attachments">Management Report</option>
                  <option value="user_message">User Message</option>
                </select>
              </span>
            </div>
            <div class="col-xl-2">
              <span class="input4">
                <select type="text" class="form-control form-control-sm" name="status" id="select_status">
                  <option value="">Select Email</option>
                  <option value="0">New</option>
                  <option value="1">Old</option>
                </select>
              </span>
            </div>
            <div class="col-3 margin_search">
              <span class="input5">
                <input type="search" class="form-control form-control-sm email_search ps-1" name="user_to" placeholder="Email Search" id="email_search">
              </span>
            </div>
          </div>
        <div class="table-responsive">
          <table class="table align-middle bg-transparent ord_table center border-1 mt-2">
            <tbody class="bg-transparent" id="email_data_table">

            </tbody>
          </table>
        </div>
        <div class="row table_last_row">
          <div class="col-1 pt-2">
            <div class="custom-select">
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
            <span class="tot_summ" id="num_plate">
              <label class="tot-search skeleton" for="tot_cagt">Current Email :</label>
              <label class="badge rounded-pill bg-primary" for="total_user_email skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_user_email"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
            </span>
            <div class="progress" style="height:0.3rem;"> <!-- progress-bar-skeleton -->
              <div class="progress-bar progress-bar-striped bg-email progress-bar-animated" role="progressbar" aria-valuenow="{{ $user_email_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user_email_percentage }}%;">
                {{ round($user_email_percentage, 2) }}%
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="pagination" id="user_email_get_data_table_paginate">

            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer email_modal_footer">
        <button type="button" class="btn btn-sm modal_button delete_cancel" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>