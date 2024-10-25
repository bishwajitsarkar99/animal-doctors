@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-md-4">
        <div class="card-body focus-color user_details cd skeleton">
          <p class="email_list">Email Send List</p>
          <p style="text-align:center;">
            <span><img class="img-profile rounded-circle" style="margin-top: 0px;" id="output" src="/image/{{auth()->user()->image}}"></span>
            <span class="user_eml" style="color:gray;font-weight:700;font-size: .9rem;">{{Auth::user()->email}} </span>
          </p>
          <div class="email-send-box-list">
            @if(auth()->user()->role == 1)
              <a type="button" href="#" class="btn btn-sm" id="email_search_page">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class="btn-text email_search_page"> Email-Search</span>
              </a><br>
              <a type="button" href="#" class="btn btn-sm" id="file_directory_page">
                <i class="fa-solid fa-folder-open"></i>
                <span class="btn-text file_directory_page"> File-Directory</span>
              </a><br>
            @endif
            <a type="button" href="#" class="btn btn-sm" id="email_send_page">
              <i class="fa-solid fa-share"></i>
              <span class="btn-text email_send_page"> Send Email-List</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body focus-color user_details cd skeleton">
          <form id="emailForm" action="{{route('email.send')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_to" id="inputTo" placeholder="To" value="" data-role="tagsinput"/>
              <span class="text-danger input_message show-error remove-user-error ms-2">@error('user_to')
                {{$message}}@enderror
              </span>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_cc" id="inputCC" placeholder="CC" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_bcc" id="inputBCC" placeholder="BCC" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="subject" id="inputSubject" placeholder="Subject"/>
              <span class="text-danger input_message show-error remove-user-error ms-2">@error('subject')
                {{$message}}@enderror
              </span>
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
                        Add Attach File
                        <span class="more__button">
                          <button class="btn btn-group-sm" href="#" id="moreBtn" disabled>
                            <span style="font-size:20px;color:#0056b3;"><i class="fa-solid fa-circle-plus"></i></span>
                          </button>
                        </span>
                      </th>
                      <th class="file-head">
                        Remove Attach File
                        <span class="more__button">
                          <button class="btn btn-group-sm" href="#" id="decrementBtn" disabled>
                            <span style="font-size:20px;color:orangered;"><i class="fa-solid fa-circle-minus"></i></span>
                          </button>
                        </span>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="fileTable">
                    <tr class="file-row">
                      <td class="file-column" colspan="2">
                        <input type="file" class="form-control form-control-sm attachment hidden" name="email_attachments[]" id="email_attachment" multiple />
                      </td>
                      <td class="file-column"></td>
                    </tr>
                  </tbody>
                </table>
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
@include('sendingEmails.file-directory')
@include('sendingEmails.image_show')
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/email/email.css">
<link href=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css " rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-date-ui.min.css">
@endsection
@push('scripts')
@include('sendingEmails.ajax.email-ajax')
<!-- Summar-Note -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/js/date-formate.js"></script>

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
    
    setTimeout(() => {
      removeSkeletonClass(skeletonClasses);
    }, 1000);

    // Initialize the button loader for the login button
    buttonLoader('#submit', '.loading-icon', '.btn-text', 'Send...', 'Send', 6000);
    // Initialize the message
    handleSuccessMessage('#success_message');

    // Table row increment
    document.getElementById('moreBtn').addEventListener('click', function(e) {
      e.preventDefault();

      var tableBody = document.querySelector('#fileTable');
      
      var firstRow = document.querySelector('#fileTable tr:first-child');
      // Clone the last row
      var newRow = firstRow.cloneNode(true);

      newRow.querySelector('.attachment').value = '';

      tableBody.appendChild(newRow);
    });
    // Table row decrement
    document.getElementById('decrementBtn').addEventListener('click', function(e) {
      e.preventDefault();
      
      var tableBody = document.querySelector('#fileTable');

      if (tableBody.rows.length > 1) {
          tableBody.deleteRow(-1);
      }
    });

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
    // Initialize Bloodhound for typeahead with email suggestions
    // var useremails = new Bloodhound({
    //   datumTokenizer: Bloodhound.tokenizers.whitespace,
    //   queryTokenizer: Bloodhound.tokenizers.whitespace,
    //   prefetch: {
    //     url: '/email', // Ensure this endpoint returns the expected array of email strings
    //     cache: false,
    //     filter: function(emails) {
    //       return $.map(emails, function(email) {
    //         return { name: email };
    //       });
    //     }
    //   }
    // });

    // useremails.initialize();

    // Initialize Tagsinput with Typeahead.js
    $('input[data-role="tagsinput"]').tagsinput({
      typeaheadjs: [{
        hint: true,
        highlight: true,
        minLength: 1
      },
      // {
      //   name: 'useremails',
      //   displayKey: 'name',
      //   valueKey: 'name',
      //   source: useremails.ttAdapter()
      // }
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
  // select item
  $(document).ready(function(){
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
@endpush