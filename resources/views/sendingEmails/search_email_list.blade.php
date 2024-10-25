<!-- Search Email Modal -->
<div class="modal fade" id="emailSearchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header email_modal_header">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #606060;"><i class="fa-regular fa-envelope"></i> Email List</h5>
        <button type="button" class="btn-close btn-btn-sm clos_btn2" data-bs-dismiss="modal" aria-label="Close"
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
        </button>
      </div>
      <div class="modal-body">
        <div class="email-box-header">
          <div class="row">
            <div class="col-xl-1">
              <div class="btn-group">
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="tooltip"  data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                  <input class="form-check-input" type="checkbox" value="" id="allSelectBtn">
                </button>
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton">Select</button>
                <ul class="dropdown-menu" id="themeMenuListBackground">
                  <li><a class="dropdown-item" href="#">All</a></li>
                  <li><a class="dropdown-item" href="#">None</a></li>
                  <li><a class="dropdown-item" href="#">Read</a></li>
                  <li><a class="dropdown-item" href="#">Unread</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-1">
              <button class="btn btn-light btn-sm" type="button" id="refreshIconBtn"
                data-bs-toggle="tooltip"  data-bs-placement="top" title="Refresh" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-arrow-rotate-right"></i>
              </button>
              <button class="btn btn-light btn-sm" type="button" id="deleteIconBtn"
                data-bs-toggle="tooltip"  data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                <i class="fa-regular fa-trash-can"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="email-box-body">
          <div class="row mt-2">
            <div class="col-2">
              <input type="text" class="form-control form-control-sm start_date ps-1" name="start_date" placeholder="Start Date" autocomplete="off" id="start_date">
            </div>
            <div class="col-2">
              <input type="text" class="form-control form-control-sm end_date ps-1" name="end_date" placeholder="End Date" autocomplete="off" id="end_date">
            </div>
            <div class="col-3">
              <select type="text" class="form-control form-control-sm select2" name="attachment_type" id="select_attachment">
                <option value="">Select Attach File</option>
                <option value="attachments">Management Report</option>
                <option value="user_message">User Message</option>
              </select>
            </div>
            <div class="col-2">
              <button id="search_btn" class="btn btn-sm modal_button search_btn">
                <span class="btn-text">Search</span>
                <span class="search-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              </button>
            </div>
            <div class="col-3">
              <input type="search" class="form-control form-control-sm email_search ps-1" name="search" placeholder="Email Search" id="email_search">
            </div>
          </div>
        <div class="table-responsive">
          <table class="table align-middle bg-transparent ord_table center border-1 skeleton mt-2">
            <tbody class="bg-transparent skeleton" id="email_data_table">

            </tbody>
          </table>
        </div>
        <div class="row table_last_row">
          <div class="skeleton col-1 pt-2">
            <div class="custom-select skeleton">
              <select class="ps-1 skeleton" id="perItemControl" data-bs-toggle="tooltip"  data-bs-placement="top" title="Per-Item" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <option class="skeleton" selected>10</option>
                <option class="skeleton">20</option>
                <option class="skeleton">50</option>
                <option class="skeleton">100</option>
                <option class="skeleton">200</option>
              </select>
            </div>
          </div>
          <div class="col-4">
            <span class="tot_summ skeleton" id="num_plate">
              <label class="tot-search skeleton" for="tot_cagt">Current Email :</label>
              <label class="badge rounded-pill bg-primary" for="total_user_email skeleton" id="iteam_label4" style="font-size: 11px;"><span class="total_users skeleton" style="font-weight: 600;color:white;font-family:sans-serif;" id="total_user_email"></span><span id="iteam_label5" style="font-weight: 600;color:white;font-family:sans-serif;">.00</span></label>
            </span>
          </div>
          <div class="col-7">
              <div class="pagination skeleton" id="user_email_get_data_table_paginate">

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