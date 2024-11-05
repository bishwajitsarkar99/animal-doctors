@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
  <div class="card form-control form-control-sm" id="set_table">
    <div class="card-body focus-color email_card cd" id="table_card_body">
      <p class="email-home-header" style="text-align:left;">
        <span class="email_list" style="font-size:15px;"><i class="fa-regular fa-envelope"></i> Mail</span>
        <span class="new_box">
          <span class="btn-text new_email_bage pe-2"><span class="ms-1" id="total_new_emails"></span> new</span>
        </span><br>
        <span><img class="img-profile rounded-circle" style="margin-top: 0px;" id="output" src="/image/{{auth()->user()->image}}"></span>
        <span class="user_eml" style="color:gray;font-weight:700;font-size: .9rem;">{{Auth::user()->email}} </span><br>
      </p>
      <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3 || auth()->user()->role == 5 || auth()->user()->role == 6 || auth()->user()->role == 7 || auth()->user()->role == 0)
          <button class="nav-link active" id="v-pills-email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-email" type="button" role="tab" aria-controls="v-pills-email" aria-selected="true">
            <i class="fa-solid fa-marker"></i>
            <span class="btn-text email_search_page"> Compose</span>
          </button>
          <button class="nav-link" id="v-pills-inbox-tab" data-bs-toggle="pill" data-bs-target="#v-pills-inbox" type="button" role="tab" aria-controls="v-pills-inbox" aria-selected="false">
            <i class="fa-solid fa-inbox"></i>
            <span class="btn-text email_send_page"> Inbox (<span class="ms-1 me-1" id="total_emails"></span>)</span>
          </button>
          <button class="nav-link" id="v-pills-send-tab" data-bs-toggle="pill" data-bs-target="#v-pills-send" type="button" role="tab" aria-controls="v-pills-send" aria-selected="false">
            <i class="fa-solid fa-share"></i>
            <span class="btn-text email_send_page"> Send (<span class="ms-1 me-1" id="emailSend"></span>)</span>
          </button>
          <button class="nav-link" id="v-pills-draft-tab" data-bs-toggle="pill" data-bs-target="#v-pills-draft" type="button" role="tab" aria-controls="v-pills-draft" aria-selected="false">
            <i class="fa-solid fa-file"></i>
            <span class="btn-text email_draft_page"> Drafts (<span class="ms-1 me-1" id="emailDrafts"></span>)</span>
          </button>
          @endif
          @if(auth()->user()->role == 1)
          <button class="nav-link" id="v-pills-file-tab" data-bs-toggle="pill" data-bs-target="#v-pills-file" type="button" role="tab" aria-controls="v-pills-file" aria-selected="false">
            <i class="fa-solid fa-folder-open"></i>
            <span class="btn-text file_directory_page"> Attachment Folder</span>
          </button>
          <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            <i class="fa-solid fa-gear"></i>
            <span class="btn-text email_setting"> Setting</span>
          </button>
          @endif
        </div>
        <div class="tab-content flex-row" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab">
            @include('sendingEmails.compose')
          </div>
          <div class="tab-pane fade" id="v-pills-inbox" role="tabpanel" aria-labelledby="v-pills-inbox-tab">
            @include('sendingEmails.inbox')
          </div>
          <div class="tab-pane fade" id="v-pills-send" role="tabpanel" aria-labelledby="v-pills-send-tab">
            @include('sendingEmails.sendbox')
          </div>
          <div class="tab-pane fade" id="v-pills-draft" role="tabpanel" aria-labelledby="v-pills-draft-tab">
            @include('sendingEmails.draft')
          </div>
          @if(auth()->user()->role == 1)
          <div class="tab-pane fade" id="v-pills-file" role="tabpanel" aria-labelledby="v-pills-file-tab">Attachment Folder</div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Setting</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
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
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/email/email.css">
<link href=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css " rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
@endsection
@push('scripts')
@include('sendingEmails.ajax.inbox-ajax')
@include('sendingEmails.ajax.sendbox-ajax')
@include('sendingEmails.ajax.draft-ajax')
@include('sendingEmails.ajax.show-modal-page-ajax')
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
    // Draft Email Date Picker
    $('#draft_start_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
    $('#draft_end_date').datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.nav-link[data-bs-toggle="pill"]');

    tabs.forEach(tab => {
      // Check if a Bootstrap instance already exists
      const existingInstance = bootstrap.Tab.getInstance(tab);
      if (!existingInstance) {
        new bootstrap.Tab(tab);  // Initialize the tab
      }
    });

    // Observer for dynamically added tabs
    const observer = new MutationObserver(mutations => {
      mutations.forEach(mutation => {
        mutation.addedNodes.forEach(node => {
          if (node.matches && node.matches('.nav-link[data-bs-toggle="pill"]')) {
            // Only initialize if there's no existing instance
            const existingInstance = bootstrap.Tab.getInstance(node);
            if (!existingInstance) {
              new bootstrap.Tab(node);
            }
          }
        });
      });
    });

    observer.observe(document.body, { childList: true, subtree: true });
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