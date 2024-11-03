@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-md-4">
        <div class="card-body focus-color user_details cd skeleton">
          <p class="email_list"><span style="font-size:20px;"><i class="fa-regular fa-envelope"></i></span> mail</p>
          <p style="text-align:center;">
            <span><img class="img-profile rounded-circle" style="margin-top: 0px;" id="output" src="/image/{{auth()->user()->image}}"></span>
            <span class="user_eml" style="color:gray;font-weight:700;font-size: .9rem;">{{Auth::user()->email}} </span>
          </p>
          <div class="email-send-box-list">
            @if(auth()->user()->role == 1)
              <span class="new_box">
                <i class="fa-regular fa-envelope"></i>
                <span class="btn-text new_email_bage pe-2"><span class="ms-1" id="total_new_emails"></span> new</span>
              </span><br>
              <a type="button" href="#" class="btn btn-sm email_search_page" id="email_search_page">
                <i class="fa-solid fa-inbox"></i>
                <span class="btn-text email_search_page"> Inbox (<span class="ms-1 me-1" id="total_emails"></span>)</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="email_send_page">
                <i class="fa-solid fa-share"></i>
                <span class="btn-text email_send_page"> Send (<span class="ms-1 me-1" id="emailSend"></span>)</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="email_draft_page">
                <i class="fa-solid fa-file"></i>
                <span class="btn-text email_draft_page"> Drafts (<span class="ms-1 me-1" id="emailDrafts"></span>)</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="file_directory_page">
                <i class="fa-solid fa-folder-open"></i>
                <span class="btn-text file_directory_page"> Attachment Folder</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="email_setting">
                <i class="fa-solid fa-gear"></i>
                <span class="btn-text email_setting"> Setting</span>
              </a><br>
            @endif
            @if(auth()->user()->role == 2 || auth()->user()->role == 3 || auth()->user()->role == 5 || auth()->user()->role == 6 || auth()->user()->role == 7 || auth()->user()->role == 0)
              <span class="new_box">
                <i class="fa-regular fa-envelope"></i>
                <span class="btn-text new_email_bage pe-2"><span class="ms-1" id="total_new_emails"></span> new</span>
              </span><br>
              <a type="button" href="#" class="btn btn-sm email_search_page" id="email_search_page">
                <i class="fa-solid fa-inbox"></i>
                <span class="btn-text email_search_page"> Inbox (<span class="ms-1 me-1" id="total_emails"></span>)</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="email_send_page">
                <i class="fa-solid fa-share"></i>
                <span class="btn-text email_send_page"> Send (<span class="ms-1 me-1" id="emailSend"></span>)</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="email_draft_page">
                <i class="fa-solid fa-file"></i>
                <span class="btn-text email_draft_page"> Drafts (<span class="ms-1 me-1" id="emailDrafts"></span>)</span>
              </a><br>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body focus-color user_details cd skeleton">
          <form id="emailForm" action="{{route('email.send')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <span id="emailForwardID" hidden></span>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_to" id="inputTo" placeholder="To" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_cc" id="inputCC" placeholder="CC" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_bcc" id="inputBCC" placeholder="BCC" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="subject" id="inputSubject" placeholder="Subject"/>
            </div>
            <div class="form-group mb-1">
              <textarea class="form-control form-control-sm main_content" id="email_summernote" name="main_content" cols="30" rows="10" placeholder="Email Content"></textarea>
            </div>
            <div class="row">
              <div class="col-xl-12">
                <table>
                  <thead>
                    <tr>
                      <th class="file-head">
                        <span class="more__button">
                          <select type="text" class="form-control form-control-sm" name="attachment_type" id="selectAttachFile">
                            <option value="" >Select Attachment Type</option>
                            <option value="attachments">Management Report</option>
                            <option value="user_message">User Message</option>
                          </select>
                        </span>
                      </th>
                      <th class="file-head">
                        <span class="more__button">
                          <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="clearBtn" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Clear Form" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                            <i class="fa-solid fa-ban fa-beat" style="color:orangered;"></i>
                          </button>
                        </span>
                      </th>
                      <th class="file-head">
                        Add Attach File
                        <span class="more__button">
                          <button class="btn btn-group-sm" id="moreBtn" disabled type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Row" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <span style="font-size:20px;color:#0056b3;"><i class="fa-solid fa-circle-plus"></i></span>
                          </button>
                        </span>
                      </th>
                      <th class="file-head">
                        Remove Attach File
                        <span class="more__button">
                          <button class="btn btn-group-sm" id="decrementBtn" disabled type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove Row" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                            <span style="font-size:20px;color:orangered;"><i class="fa-solid fa-circle-minus"></i></span>
                          </button>
                        </span>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="fileTable">
                    <tr class="file-row">
                      <td class="file-column" colspan="3">
                        <input type="file" class="form-control form-control-sm attachment hidden" name="email_attachments[]" id="email_attachment" multiple />
                      </td>
                      <td class="file-column"></td>
                    </tr>
                  </tbody>
                </table>
                <!-- Attachments loaded via AJAX will be displayed here -->
                <div class="row mt-1">
                  <div id="attachmentPreview"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-10 action_message">
                @if(session('success'))
                  <p class="background_success mt-2 ps-1" id="success_message">{{session('success')}}</p>
                @endif
              </div>
              <div class="col-xl-2" style="text-align:right;">
                <button id="submit" type="submit" class="btn btn-sm btn-primary send_button button-skeleton mt-2">
                  <span class="loading-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                  <span class="btn-text">Send</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('sendingEmails.search_email_list')
@include('sendingEmails.send_email_list')
<!-- Image Modal Structure -->
<div class="modal fade" id="imageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content image_preview">
            <div class="modal-header email_modal_header">
                <h5 class="modal-title img_title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close btn-btn-sm img_close" data-bs-dismiss="modal" aria-label="Close"
                    data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                </button>
            </div>
            <div class="modal-body">
                <div class="svg__doted" id="imgSkeltone">
                    <svg id="svg_mode" style="width:100%;height:200px;" viewBox="0 0 1024 1024" class="icon popular-svg" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M878.3 192.9H145.7c-16.5 0-30 13.5-30 30V706c0 16.5 13.5 30 30 30h732.6c16.5 0 30-13.5 30-30V222.9c0-16.5-13.5-30-30-30z" fill="#FFFFFF" />
                        <path d="M145.7 736h732.6c16.5 0 30-13.5 30-30v-22.1H115.7V706c0 16.6 13.5 30 30 30z" fill="#f3f3f3" />
                        <path d="M878.3 152.9H145.7c-38.6 0-70 31.4-70 70V706c0 38.6 31.4 70 70 70h732.6c38.6 0 70-31.4 70-70V222.9c0-38.6-31.4-70-70-70z m30 531V706c0 16.5-13.5 30-30 30H145.7c-16.5 0-30-13.5-30-30V222.9c0-16.5 13.5-30 30-30h732.6c16.5 0 30 13.5 30 30v461zM678 871.1H346c-11 0-20-9-20-20s9-20 20-20h332c11 0 20 9 20 20s-9 20-20 20z" fill="lightgray" />
                        <path d="M127.1 662.7c-2.7 0-5.4-1.1-7.3-3.2-3.7-4.1-3.5-10.4 0.6-14.1l236.5-219.6L463 541.9l258.9-290.7 183.7 196.3c3.8 4 3.6 10.4-0.4 14.1-4 3.8-10.3 3.6-14.1-0.4L722.3 280.8l-259 290.9L355.7 454 133.9 660c-2 1.8-4.4 2.7-6.8 2.7z" fill="lightgray" />
                        <path d="M156.4 541.9a82.7 82.8 0 1 0 165.4 0 82.7 82.8 0 1 0-165.4 0Z" fill="#f3f3f3" />
                        <path d="M179.8 541.9a59.3 59.3 0 1 0 118.6 0 59.3 59.3 0 1 0-118.6 0Z" fill="lightgray" />
                        <path d="M208.9 541.9a30.2 30.3 0 1 0 60.4 0 30.2 30.3 0 1 0-60.4 0Z" fill="#f3f3f3" />
                        <path d="M580.9 329.9a82.7 82.8 0 1 0 165.4 0 82.7 82.8 0 1 0-165.4 0Z" fill="#f1f1f1" />
                        <path d="M604.3 329.9a59.3 59.3 0 1 0 118.6 0 59.3 59.3 0 1 0-118.6 0Z" fill="lightgray" />
                        <path d="M633.4 329.9a30.2 30.3 0 1 0 60.4 0 30.2 30.3 0 1 0-60.4 0Z" fill="white" />
                        <path d="M719.3 539.6a46.3 46.4 0 1 0 92.6 0 46.3 46.4 0 1 0-92.6 0Z" fill="lightgray" />
                        <path d="M732.4 539.6a33.2 33.2 0 1 0 66.4 0 33.2 33.2 0 1 0-66.4 0Z" fill="lightgray" />
                        <path d="M748.7 539.6a16.9 17 0 1 0 33.8 0 16.9 17 0 1 0-33.8 0Z" fill="white" />
                        <path d="M436.8 720.1H275.2c-5 0-9-4-9-9s4-9 9-9h161.6c5 0 9 4 9 9 0 4.9-4.1 9-9 9zM220.6 720.1h-26.5c-5 0-9-4-9-9s4-9 9-9h26.5c5 0 9 4 9 9 0 4.9-4.1 9-9 9z" fill="#FFFFFF" />
                    </svg>
                </div>
                <div class="att_image" id="showAttImage">
                    <img class="img-fluid" id="modalImage" src="" alt="Attachment Image" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- File Directory Modal -->
<div class="modal fade" id="fileDirectoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">User Attachment List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Attachment File Modal Show (pdf,excle,csv) -->
<div class="modal fade" id="attachmentFileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content image_preview">
      <div class="modal-header">
        <h5 class="modal-title attach_header" id="fileModalLabel"><span id="fileNam"></span> Attachment File</h5>
        <span class="logo_skeletone">
          <img class="logo_attachment_file" src="" alt="Attachment Image" id="logoFile" />
        </span>
        <button type="button" class="btn-close btn-btn-sm atth_close" data-bs-dismiss="modal" aria-label="Close"
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
        </button>
      </div>
      <div class="modal-body" id="modalContent">
        <!-- Content (image or iframe) will be dynamically inserted here -->
      </div>
    </div>
  </div>
</div>
<!-- Modal Loader -->
<div class="modal fade" id="loader_email_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content small_modal loader_modal" style="border:none;" id="admin_modal_box">
      <div class="modal-body" id="loader_modalBody">
        <div class="">
          <img class="modal-loader" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
        </div> 
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/email/email-min.css">
<link href=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css " rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
@endsection
@push('scripts')
@include('sendingEmails.ajax.email-ajax')
@include('sendingEmails.ajax.show-modal-page-minify')
@include('sendingEmails.ajax.send-email-ajax')
<!-- @include('sendingEmails.ajax.show-modal-page-ajax') -->
<!-- Summar-Note -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/js/date-formate.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
<script type="module">
  import { 
    removeSkeletonClass, 
    buttonLoader, 
    handleSuccessMessage, 
    toolTip,
  } from "{{asset('/module/module-min-js/design-helper-function-min.js')}}";
  buttonLoader();
  toolTip();
  $(document).ready(function(){
    // skeletone
    const skeletonClasses = [
      'skeleton',
    ];
    
    let time = requestAnimationFrame(() => {
      removeSkeletonClass(skeletonClasses);
    }, 1000);

    return ()=>{
      cancelAnimationFrame(time);
    }

    // Initialize the button loader for the login button
    buttonLoader('#submit', '.loading-icon', '.btn-text', 'Send...', 'Send', 6000);
    // Initialize the message
    handleSuccessMessage('#success_message');

    // Table row increment
    document.getElementById('moreBtn').addEventListener('click', function(e) {
      e.preventDefault();
      $(this).tooltip('hide');
      var tableBody = document.querySelector('#fileTable');
      
      var firstRow = document.querySelector('#fileTable tr:first-child');
      // Clone the last row
      var newRow = firstRow.cloneNode(true);

      newRow.querySelector('.attachment').value = '';

      tableBody.appendChild(newRow);
    }, { passive: true });
    // Table row decrement
    document.getElementById('decrementBtn').addEventListener('click', function(e) {
      e.preventDefault();
      $(this).tooltip('hide');
      $("#email_attachment").val("");
      var tableBody = document.querySelector('#fileTable');

      if (tableBody.rows.length > 1) {
        tableBody.deleteRow(-1);
      }
    }, { passive: true });
  });
</script>
<script>
  $(document).ready(function(){
    // Date Picker
    $('#start_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#end_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    // Send Email Date Picker
    $('#send_start_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#send_end_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
  });
</script>
<!-- Summary Note Initialize -->
<script>
  $(document).ready(function() {
    $("#email_summernote").summernote({
      placeholder: 'Email content',
      tabsize: 2,
      height: 100,
      minHeight: null,
      maxHeight: null,
      toolbar: null,
    });
    $('.dropdown-toggle').dropdown();
  });
</script>
<script>
  $(document).ready(function () {
    // Initialize Tagsinput with Typeahead.js
    $('input[data-role="tagsinput"]').tagsinput({
      typeaheadjs: [{
        hint: true,
        highlight: true,
        minLength: 1
      }
      ]
    });

    // Check if items are being added correctly
    $('input[data-role="tagsinput"]').on('itemAdded', function(event) {
      //console.log('Item added:', event.item); // Log the added item to ensure it's captured
      $(this).tagsinput('refresh');  // Refresh tagsinput to ensure the items are properly displayed
    });
  });
</script>
<script>
  $(document).ready(function(){
    // Select Attachment Type
    $(document).on('change', '#selectAttachFile', function(){
      var selectAttachment = $(this).val();
      if(selectAttachment){
        $("#moreBtn").removeAttr('disabled');
        $("#decrementBtn").removeAttr('disabled');
        $("#email_attachment").removeClass('hidden');
      } else {
        $("#moreBtn").attr('disabled', true);
        $("#decrementBtn").attr('disabled', true);
        $("#email_attachment").addClass('hidden');
      }
    });
  });
</script>
<script>
  // show modal for pdf,excle,csv,docx 
  window.openAttachmentModal = function(fileSrc) {
    const modalContent = document.getElementById('modalContent');
    const attachmentFileModal = new bootstrap.Modal(document.getElementById('attachmentFileModal'));

    if (!modalContent) {
      console.error("Modal content element with ID 'modalContent' was not found.");
      return;
    }

    // Check file extension and handle accordingly
    const fileExtension = fileSrc.split('.').pop().toLowerCase();
    
    if (fileExtension === 'pdf') {
      // Inline display for PDF files
      modalContent.innerHTML = `<iframe class="atth_fl text-skeletone" src="${fileSrc}" style="width:100%; height:80vh;" frameborder="0"></iframe>`;
    } else if (['png', 'jpg', 'jpeg'].includes(fileExtension)) {
      // Inline display for image files
      modalContent.innerHTML = `<img class="atth_fl2 text-skeletone" src="${fileSrc}" alt="Attachment" style="width:100%; height:auto;">`;
    } else if (['xls', 'xlsx', 'csv', 'docx'].includes(fileExtension)) {
      // Download link for Excel and CSV files
      modalContent.innerHTML = `<p class="modal_text"><span class="attch_text text-skeletone">This file cannot be previewed :</span> <a class="link-btn-skeletone downloadBtn" href="${fileSrc}" download>Click here to download - ${fileSrc.split('/').pop()}</a></p>`;
    } else {
      // Fallback for unsupported file types
      modalContent.innerHTML = `<p>Unsupported file type.</p>`;
    }

    // Show the modal
    attachmentFileModal.show();
  };
</script>
@endpush